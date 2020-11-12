<?php

namespace YubabaPhp;

class Main
{
    // プログラムのエントリーポイント
    public static function main(): void
    {
        // 白紙の契約書を持たせた状態で「湯婆婆」のインスタンスを生成する
        $yubaba = new Yubaba(Contract::createBlankContract());

        // 契約を開始する (契約書を受け取る)
        $contract = $yubaba->startNewContract();

        // 「あなた」のインスタンスを生成する
        $inputName = static::_getStdinInteractively();
        $you = new You($inputName);

        // 「湯婆婆」から渡された契約書に「あなた」が署名する
        $you->signContract($contract);

        // 強制的に名前を奪う
        $yubaba->forciblyRename($you);
    }

    // 対話的に標準入力から何らかの文字列を得る
    // 元ネタを踏襲し入力値のバリデーションは行わない
    private static function _getStdinInteractively(): string
    {
        $fp = fopen('php://stdin', 'rb');
        return trim(fgets($fp));
    }
}
