<?php

namespace YubabaPhp;

/**
 * あなた (作中で言うところの千尋）
 */
class You
{
    private ?string $_name;

    public function __construct(string $_name)
    {
        $this->_name = $_name;
    }

    public function changeName(string $name): void
    {
        $this->_name = $name;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    // 契約書を受け取り署名する
    public function signContract(Contract $contract): void
    {
        $contract->sign($this->_name);
    }
}