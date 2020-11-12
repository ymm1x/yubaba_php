<?php

namespace YubabaPhp;

/**
 * あなた (作中で言うところの千尋）
 */
class You
{
    private ?string $_name;

    public static function createAsAnonymous(): self
    {
        return new self('');
    }

    private function __construct(string $_name)
    {
        $this->_name = $_name;
    }

    public function setName(string $name): void
    {
        $this->_name = $name;
    }

    public function signContract(Contract $contract): void
    {
        $contract->sign($this->_name);
    }

    public function getName(): string
    {
        return $this->_name;
    }


}