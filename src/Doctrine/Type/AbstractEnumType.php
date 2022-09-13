<?php

namespace App\Doctrine\Type;

use BackedEnum;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use LogicException;

abstract class AbstractEnumType extends Type
{

    protected $name;

    protected array $values = array();

    abstract public static function getEnumsClass(): string;

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        $values = array_map(function($val): string { return "'".$val."'"; }, $this->values);

        return "ENUM(".implode(", ", $values).")";
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof BackedEnum) {
            return $value->value;
        }

        return null;
    }

    public function getName()
    {
        return $this->name;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (!enum_exists($this->getEnumsClass(), true)) {
            throw new LogicException("This class should be an enum");
        }

        // 🔥 https://www.php.net/manual/en/backedenum.tryfrom.php
        return $this::getEnumsClass()::tryFrom($value);
    }
}