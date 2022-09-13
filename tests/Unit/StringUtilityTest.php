<?php
namespace App\Tests\Unit;

use App\Service\Importer\Vehicle\Vehicle;
use App\Tests\UnitTester;
use App\Utility\StringUtility;

final class StringUtilityTest extends \Codeception\Test\Unit
{
    protected function _before(): void
    {
    }

    protected function _after(): void
    {
    }

    // tests
    public function testIfRemoveSpecialCharacterRemovesAllMalucesCars(): void
    {
        $spacialCarsToRemove = "ÄÜxÖ&x$)(x+* #-.,★ ♡ ʂ℘ɛƈıąƖ ɬɛҳɬ ♡ ★";
        $keepChar = StringUtility::removeSpecialCharacter($spacialCarsToRemove);
        $this->assertEquals("xxx-------",$keepChar);
    }

    // tests
    public function testIfPrepareStringForUrlTrimsAndLowers(): void
    {
        $spacialCarsToRemove = "   Das ist  KEINE gueltige Url   ";
        $keepChar = StringUtility::prepareStringForUrl($spacialCarsToRemove);
        $this->assertEquals("das ist  keine gueltige url",$keepChar);
    }

}