<?php

namespace YubabaPhp;

class Main
{
    // プログラムのエントリーポイント
    public static function main(): void
    {
        // 登場人物のインスタンスを生成
        // 湯婆婆は白紙の契約書を持たせた状態で生成する
        $yubaba = new Yubaba(Contract::createBlankContract());
        // あなたの名前はまだ不明
        $you = You::createAsAnonymous();

        // 契約を開始する
        $contract = $yubaba->startNewContract();

        // 湯婆婆から渡された契約書にあなたの名前を署名する
        $inputName = static::_getStdinInteractively();
        $you->setName($inputName);
        $you->signContract($contract);

        // 強制的に名前を奪う
        $yubaba->forciblyRename($you);
    }

    // 対話的に標準入力から何らかの文字列を得る
    private static function _getStdinInteractively(): string
    {
        $fp = fopen('php://stdin', 'rb');
        $inputName = trim(fgets($fp));
        return $inputName;
    }
}
