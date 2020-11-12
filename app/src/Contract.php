<?php
namespace YubabaPhp;

/**
 * 契約書
 */
class Contract
{
    private string $_signatureName;

    // 白紙の契約書を作成する
    public static function createBlankContract(): self
    {
        return new self('');
    }

    private function __construct(string $_signatureName)
    {
        $this->_signatureName = $_signatureName;
    }

    // 契約書にサインをする
    public function sign(string $name): void
    {
        $this->_signatureName = $name;
    }
}