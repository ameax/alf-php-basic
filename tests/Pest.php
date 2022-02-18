<?php

// uses(Tests\TestCase::class)->in('Feature');
// expect()->extend('toBeOne', function () { return $this->toBe(1); });

use Alf\AlfBasicAttribute;
use Alf\AlfBasicClass;
use Alf\AlfBasicType;
use Alf\AlfBasicTypeScalar;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameter;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Interfaces\Values\AlfNullGet;
use Alf\Interfaces\Values\AlfNullGetTrait;
use Alf\Interfaces\Values\AlfNullSet;
use Alf\Interfaces\Values\AlfNullSetTrait;
use Alf\Interfaces\Values\AlfNullWork;
use Alf\Interfaces\Values\AlfNullWorkTrait;
use Alf\Interfaces\Values\AlfValueGet;
use Alf\Interfaces\Values\AlfValueGetTrait;
use Alf\Services\AlfCache;
use Alf\Services\AlfPhpClassManager;
use Alf\Services\AlfProgramming;
use Alf\Types\Scalars\AlfInt;
use Alf\Types\Scalars\AlfInt8;
use Alf\Types\Scalars\AlfInt8U;
use Alf\Types\Scalars\AlfIntRange;

function listAlfInterfaces() : array {
    return [
        // Interfaces/Values
        AlfNullGet::class,
        AlfNullSet::class,
        AlfNullWork::class,
        AlfValueGet::class,
    ];
}

function listAlfTraits() : array {
    return [
        // Interfaces/Values
        AlfNullGetTrait::class,
        AlfNullSetTrait::class,
        AlfNullWorkTrait::class,
        AlfValueGetTrait::class,
    ];
}

function listAlfClasses() : array {
    return [
        AlfBasicAttribute::class,
        AlfBasicClass::class,
        AlfBasicType::class,
        AlfBasicTypeScalar::class,
        // Attributes
        AlfAttrAutoComplete::class,
        AlfAttrParameter::class,
        AlfAttrParameterIsInt::class,
        AlfAttrTraitAutoCall::class,
        // Types/Scalars
        AlfInt::class,
        AlfInt8::class,
        AlfInt8U::class,
        AlfIntRange::class,
    ];
}


function listAlfSingleton() : array {
    return [
        \Alf\AlfBasicSingleton::class,
        // Services
        AlfCache::class,
        AlfPhpClassManager::class,
        AlfProgramming::class,
    ];
}
