<?php
namespace App\Doctrine\Type;

use App\Doctrine\Enum\Injury;
use App\Doctrine\Type\AbstractEnumType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;



final class InjuryType extends AbstractEnumType
{
    /**
     * @var string
     */
    protected $name = 'Injury';

    /**
     * @var string[]
     */
    protected array $values = array('Leicht', 'Schwer','Kritisch','Tot');

    public static function getEnumsClass(): string // the enums class to convert
    {
        return Injury::class;
    }
}