<?php

// uses(Tests\TestCase::class)->in('Feature');
// expect()->extend('toBeOne', function () { return $this->toBe(1); });

// ToDo: Attribute AlfAttrParamsIsInt
// ToDo: autocomplete for interface in traits

use Alf\AlfBasicAttribute;
use Alf\AlfBasicClass;
use Alf\AlfBasicSingleton;
use Alf\AlfBasicType;
use Alf\AlfBasicTypeScalar;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameter;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Interfaces\Values\AlfEmptyGet;
use Alf\Interfaces\Values\AlfEmptyGetTrait;
use Alf\Interfaces\Values\AlfEmptySet;
use Alf\Interfaces\Values\AlfEmptySetTrait;
use Alf\Interfaces\Values\AlfEmptyWork;
use Alf\Interfaces\Values\AlfEmptyWorkTrait;
use Alf\Interfaces\Values\AlfNullGet;
use Alf\Interfaces\Values\AlfNullGetTrait;
use Alf\Interfaces\Values\AlfNullOrEmptyWork;
use Alf\Interfaces\Values\AlfNullOrEmptyWorkTrait;
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
use JetBrains\PhpStorm\Pure;

#[Pure]
function listAlfInterfaces() : array {
    return [
        // Interfaces/Values
        AlfEmptyGet::class,
        AlfEmptySet::class,
        AlfEmptyWork::class,
        AlfNullGet::class,
        AlfNullOrEmptyWork::class,
        AlfNullSet::class,
        AlfNullWork::class,
        AlfValueGet::class,
    ];
}

#[Pure]
function listAlfTraits() : array {
    return [
        // Interfaces/Values
        AlfEmptyGetTrait::class,
        AlfEmptySetTrait::class,
        AlfEmptyWorkTrait::class,
        AlfNullGetTrait::class,
        AlfNullOrEmptyWorkTrait::class,
        AlfNullSetTrait::class,
        AlfNullWorkTrait::class,
        AlfValueGetTrait::class,
    ];
}

#[Pure]
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

#[Pure]
function listAlfSingletons() : array {
    return [
        AlfBasicSingleton::class,
        // Services
        AlfCache::class,
        AlfPhpClassManager::class,
        AlfProgramming::class,
    ];
}

#[Pure]
function listAlfClassesAndSingletons() : array {
    return array_merge(listAlfClasses(), listAlfSingletons());
}

#[Pure]
function listAlfAll() : array {
    return array_merge(listAlfClasses(), listAlfSingletons(), listAlfInterfaces(), listAlfTraits());
}

#[Pure]
function getIntValues() : array {
    return [
        [
            'set'      => null,
            'isNull'   => true,
            'isEmpty'  => false,
            'get'      => 0,
            'getValue' => null,
        ],
        [
            'set'      => 0,
            'isNull'   => false,
            'isEmpty'  => true,
            'get'      => 0,
            'getValue' => 0,
        ],
        [
            'set'      => 5,
            'isNull'   => false,
            'isEmpty'  => false,
            'get'      => 5,
            'getValue' => 5,
        ],
        [
            'set'      => -5,
            'isNull'   => false,
            'isEmpty'  => false,
            'get'      => -5,
            'getValue' => -5,
            'AlfInt8U' => [
                'isEmpty'  => true,
                'get'      => 0,
                'getValue' => 0,
            ],
        ],
        [
            'set'      => 500,
            'isNull'   => false,
            'isEmpty'  => false,
            'get'      => 500,
            'getValue' => 500,
            'AlfInt8U' => [
                'get'      => 255,
                'getValue' => 255,
            ],
            'AlfInt8'  => [
                'get'      => 128,
                'getValue' => 128,
            ],
        ],
    ];
}
