<?php
namespace App\Doctrine\Enum;



enum Injury: string
{
    case leicht = 'Leicht';
    case schwer = 'Schwer';
    case kritisch = 'Kritisch';
    case tot = 'Tot';
}