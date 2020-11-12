<?php

namespace YubabaPhp;

/**
 * 湯婆婆
 */
class Yubaba
{
    // 湯婆婆の持つ契約書
    private Contract $_contract;

    public function __construct(Contract $contract)
    {
        $this->_contract = $contract;
    }

    // 契約を開始する (記入のため契約書を返す)
    public function startNewContract(): Contract
    {
        echo '契約書だよ。そこに名前を書きな。' . PHP_EOL;
        return $this->_contract;
    }

    // 強制的に改名させる
    public function forciblyRename(You $you): void
    {
        $name = $you->getName();
        echo sprintf('フン。%sというのかい。贅沢な名だねぇ。', $name);

        $newName = static::_pickOneCharacter($name);
        echo sprintf('今からお前の名前は%1$sだ。いいかい、%1$sだよ。分かったら返事をするんだ、%1$s!!', $newName);
        $you->setName($newName);
    }

    // 入力文字列からランダムに一文字を選択する
    private static function _pickOneCharacter(string $str): string
    {
        $randomIndex = random_int(0, mb_strlen($str) - 1);
        return $str[$randomIndex];
    }
}