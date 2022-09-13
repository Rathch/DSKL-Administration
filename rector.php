<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonySetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([__DIR__ . '/src', __DIR__ . '/tests']);
    $rectorConfig->sets([
        SetList::TYPE_DECLARATION,
        SetList::NAMING,
        SetList::PHP_81,
        SetList::CODE_QUALITY,
        SetList::PRIVATIZATION,
        SetList::CODING_STYLE,
        SetList::DEAD_CODE,
        SymfonySetList::SYMFONY_52,
        SymfonySetList::SYMFONY_CODE_QUALITY,
        SymfonySetList::SYMFONY_CONSTRUCTOR_INJECTION,
    ]);

    $rectorConfig->rule(Rector\EarlyReturn\Rector\Foreach_\ChangeNestedForeachIfsToEarlyContinueRector::class);
    $rectorConfig->rule(Rector\EarlyReturn\Rector\If_\ChangeAndIfToEarlyReturnRector::class);
    $rectorConfig->rule(Rector\EarlyReturn\Rector\If_\ChangeIfElseValueAssignToEarlyReturnRector::class);
    $rectorConfig->rule(Rector\EarlyReturn\Rector\If_\ChangeNestedIfsToEarlyReturnRector::class);
    $rectorConfig->rule(Rector\EarlyReturn\Rector\If_\RemoveAlwaysElseRector::class);
    $rectorConfig->rule(Rector\EarlyReturn\Rector\Return_\ReturnBinaryAndToEarlyReturnRector::class);
    $rectorConfig->rule(Rector\EarlyReturn\Rector\If_\ChangeOrIfReturnToEarlyReturnRector::class);
    $rectorConfig->rule(Rector\EarlyReturn\Rector\If_\ChangeOrIfContinueToMultiContinueRector::class);
    $rectorConfig->rule(Rector\EarlyReturn\Rector\Foreach_\ReturnAfterToEarlyOnBreakRector::class);
    $rectorConfig->rule(Rector\EarlyReturn\Rector\Return_\PreparedValueToEarlyReturnRector::class);
    $rectorConfig->rule(Rector\EarlyReturn\Rector\Return_\ReturnBinaryOrToEarlyReturnRector::class);

    // register a single rule
    $rectorConfig->rule(Rector\CodingStyle\Rector\ClassConst\VarConstantCommentRector::class);
    $rectorConfig->rule(Rector\CodingStyle\Rector\Assign\PHPStormVarAnnotationRector::class);
    $rectorConfig->rule(Rector\CodingStyle\Rector\ClassMethod\NewlineBeforeNewAssignSetRector::class);
    $rectorConfig->rule(Rector\CodeQuality\Rector\If_\ShortenElseIfRector::class);
    $rectorConfig->rule(Rector\CodeQuality\Rector\Concat\JoinStringConcatRector::class);
    $rectorConfig->rule(Rector\CodeQuality\Rector\ClassMethod\InlineArrayReturnAssignRector::class);
    $rectorConfig->rule(Rector\CodeQuality\Rector\Foreach_\ForeachToInArrayRector::class);
    $rectorConfig->rule(Rector\CodeQuality\Rector\Foreach_\ForeachItemsAssignToEmptyArrayToAssignRector::class);
    $rectorConfig->rule(Rector\CodeQuality\Rector\For_\ForToForeachRector::class);
    $rectorConfig->rule(Rector\CodeQuality\Rector\For_\ForRepeatedCountToOwnVariableRector::class);
    $rectorConfig->rule(Rector\CodeQuality\Rector\Class_\CompleteDynamicPropertiesRector::class);
    $rectorConfig->rule(Rector\CodeQuality\Rector\If_\CombineIfRector::class);
    $rectorConfig->rule(Rector\CodeQuality\Rector\NotEqual\CommonNotEqualRector::class);
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
    $rectorConfig->rule(Rector\CodeQuality\Rector\FuncCall\AddPregQuoteDelimiterRector::class);
    $rectorConfig->rule(Rector\CodeQuality\Rector\LogicalAnd\AndAssignsToSeparateLinesRector::class);

    $rectorConfig->phpVersion(PhpVersion::PHP_81);
    // define sets of rules
    //    $rectorConfig->sets([
    //        LevelSetList::UP_TO_PHP_81
    //    ]);
};
