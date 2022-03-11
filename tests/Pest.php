<?php

declare(strict_types = 1);

// uses(Tests\TestCase::class)->in('Feature');
// expect()->extend('toBeOne', function () { return $this->toBe(1); });

// ToDo: Find all files and check if tested
// ToDo: Test AlfBool

use Alf\AlfBasicAttribute;
use Alf\AlfBasicClass;
use Alf\AlfBasicSingleton;
use Alf\AlfBasicType;
use Alf\AlfBasicTypeScalar;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameter;
use Alf\Attributes\AlfAttrParameterIsBool;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Interfaces\Booleans\AlfBoolGet;
use Alf\Interfaces\Booleans\AlfBoolGetTrait;
use Alf\Interfaces\Booleans\AlfBoolSet;
use Alf\Interfaces\Booleans\AlfBoolSetTrait;
use Alf\Interfaces\Booleans\AlfBoolWork;
use Alf\Interfaces\Booleans\AlfBoolWorkTrait;
use Alf\Interfaces\Integers\AlfIntGet;
use Alf\Interfaces\Integers\AlfIntGetTrait;
use Alf\Interfaces\Integers\AlfIntSet;
use Alf\Interfaces\Integers\AlfIntSetTrait;
use Alf\Interfaces\Integers\AlfIntWork;
use Alf\Interfaces\Integers\AlfIntWorkTrait;
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
use Alf\Types\Scalars\AlfBool;
use Alf\Types\Scalars\AlfInt;
use Alf\Types\Scalars\AlfInt16;
use Alf\Types\Scalars\AlfInt16U;
use Alf\Types\Scalars\AlfInt32;
use Alf\Types\Scalars\AlfInt32U;
use Alf\Types\Scalars\AlfInt8;
use Alf\Types\Scalars\AlfInt8U;
use Alf\Types\Scalars\AlfIntRange;
use JetBrains\PhpStorm\Pure;

#[Pure]
function listAlfInterfaces() : array {
    return [
        // Interfaces/Booleans
        AlfBoolGet::class,
        AlfBoolSet::class,
        AlfBoolWork::class,
        // Interfaces/Integers
        AlfIntGet::class,
        AlfIntSet::class,
        AlfIntWork::class,
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
        // Interfaces/Booleans
        AlfBoolGetTrait::class,
        AlfBoolSetTrait::class,
        AlfBoolWorkTrait::class,
        // Interfaces/Integers
        AlfIntGetTrait::class,
        AlfIntSetTrait::class,
        AlfIntWorkTrait::class,
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
        AlfAttrParameterIsBool::class,
        AlfAttrTraitAutoCall::class,
        // Types/Scalars
        AlfBool::class,
        AlfInt::class,
        AlfInt8::class,
        AlfInt8U::class,
        AlfInt16::class,
        AlfInt16U::class,
        AlfInt32::class,
        AlfInt32U::class,
        AlfIntRange::class,
    ];
}

function listAlfClassesSubtype(string $subTypeOf, bool $andAbstract = false) : array {
    $output = [];
    foreach (listAlfClasses() as $className) {
        try {
            $reflectionClass = new ReflectionClass($className);
            if ((!$andAbstract) && ($reflectionClass->isAbstract())) {
                continue;
            }
            if ((!$reflectionClass->isSubclassOf($subTypeOf)) && ($reflectionClass->getName() !== $subTypeOf)) {
                continue;
            }
        } catch (ReflectionException) {
            continue;
        }

        $output[] = $className;
    }
    return $output;
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

function getBoolValues() : array {
    return [
        [
            'set'         => null,
            'isNull'      => true,
            'isEmpty'     => false,
            'get'         => false,
            'getValue'    => null,
            'afterInvert' => true,
        ],
        [
            'set'         => false,
            'isNull'      => false,
            'isEmpty'     => true,
            'get'         => false,
            'getValue'    => false,
            'afterInvert' => true,
        ],
        [
            'set'         => true,
            'isNull'      => false,
            'isEmpty'     => false,
            'get'         => true,
            'getValue'    => true,
            'afterInvert' => false,
        ],
    ];
}

#[Pure]
function getIntValues() : array {
    return [
        [
            'set'       => null,
            'isNull'    => true,
            'isEmpty'   => false,
            'get'       => 0,
            'getValue'  => null,
            'afterAdd5' => 5,
            'afterInc'  => 1,
            'afterSub9' => -9,
            'afterDec'  => -1,
            'AlfInt8U'  => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
            'AlfInt16U' => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
            'AlfInt32U' => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
        ],
        [
            'set'       => 0,
            'isNull'    => false,
            'isEmpty'   => true,
            'get'       => 0,
            'getValue'  => 0,
            'afterAdd5' => 5,
            'afterInc'  => 1,
            'afterSub9' => -9,
            'afterDec'  => -1,
            'AlfInt8U'  => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
            'AlfInt16U' => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
            'AlfInt32U' => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
        ],
        [
            'set'       => 5,
            'isNull'    => false,
            'isEmpty'   => false,
            'get'       => 5,
            'getValue'  => 5,
            'afterAdd5' => 10,
            'afterInc'  => 6,
            'afterSub9' => -4,
            'afterDec'  => 4,
            'AlfInt8U'  => [
                'afterSub9' => 0,
            ],
            'AlfInt16U' => [
                'afterSub9' => 0,
            ],
            'AlfInt32U' => [
                'afterSub9' => 0,
            ],
        ],
        [
            'set'       => 25,
            'isNull'    => false,
            'isEmpty'   => false,
            'get'       => 25,
            'getValue'  => 25,
            'afterAdd5' => 30,
            'afterInc'  => 26,
            'afterSub9' => 16,
            'afterDec'  => 24,
        ],
        [
            'set'       => -7,
            'isNull'    => false,
            'isEmpty'   => false,
            'get'       => -7,
            'getValue'  => -7,
            'afterAdd5' => -2,
            'afterInc'  => -6,
            'afterSub9' => -16,
            'afterDec'  => -8,
            'AlfInt8U'  => [
                'isEmpty'   => true,
                'get'       => 0,
                'getValue'  => 0,
                'afterAdd5' => 5,
                'afterInc'  => 1,
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
            'AlfInt16U' => [
                'isEmpty'   => true,
                'get'       => 0,
                'getValue'  => 0,
                'afterAdd5' => 5,
                'afterInc'  => 1,
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
            'AlfInt32U' => [
                'isEmpty'   => true,
                'get'       => 0,
                'getValue'  => 0,
                'afterAdd5' => 5,
                'afterInc'  => 1,
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
        ],
        [
            'set'       => 500,
            'isNull'    => false,
            'isEmpty'   => false,
            'get'       => 500,
            'getValue'  => 500,
            'afterAdd5' => 505,
            'afterInc'  => 501,
            'afterSub9' => 491,
            'afterDec'  => 499,
            'AlfInt8U'  => [
                'get'       => 255,
                'getValue'  => 255,
                'afterAdd5' => 255,
                'afterInc'  => 255,
                'afterSub9' => 246,
                'afterDec'  => 254,
            ],
            'AlfInt8'   => [
                'get'       => 128,
                'getValue'  => 128,
                'afterAdd5' => 128,
                'afterInc'  => 128,
                'afterSub9' => 119,
                'afterDec'  => 127,
            ],
        ],
        [
            'set'       => 70000,
            'isNull'    => false,
            'isEmpty'   => false,
            'get'       => 70000,
            'getValue'  => 70000,
            'afterAdd5' => 70005,
            'afterInc'  => 70001,
            'afterSub9' => 69991,
            'afterDec'  => 69999,
            'AlfInt8'   => [
                'get'       => 128,
                'getValue'  => 128,
                'afterAdd5' => 128,
                'afterInc'  => 128,
                'afterSub9' => 119,
                'afterDec'  => 127,
            ],
            'AlfInt8U'  => [
                'get'       => 255,
                'getValue'  => 255,
                'afterAdd5' => 255,
                'afterInc'  => 255,
                'afterSub9' => 246,
                'afterDec'  => 254,
            ],
            'AlfInt16'  => [
                'get'       => 32767,
                'getValue'  => 32767,
                'afterAdd5' => 32767,
                'afterInc'  => 32767,
                'afterSub9' => 32758,
                'afterDec'  => 32766,
            ],
            'AlfInt16U' => [
                'get'       => 65535,
                'getValue'  => 65535,
                'afterAdd5' => 65535,
                'afterInc'  => 65535,
                'afterSub9' => 65526,
                'afterDec'  => 65534,
            ],
        ],
        [
            'set'       => 5000000000,
            'isNull'    => false,
            'isEmpty'   => false,
            'get'       => 5000000000,
            'getValue'  => 5000000000,
            'afterAdd5' => 5000000005,
            'afterInc'  => 5000000001,
            'afterSub9' => 4999999991,
            'afterDec'  => 4999999999,
            'AlfInt8'   => [
                'get'       => 128,
                'getValue'  => 128,
                'afterAdd5' => 128,
                'afterInc'  => 128,
                'afterSub9' => 119,
                'afterDec'  => 127,
            ],
            'AlfInt8U'  => [
                'get'       => 255,
                'getValue'  => 255,
                'afterAdd5' => 255,
                'afterInc'  => 255,
                'afterSub9' => 246,
                'afterDec'  => 254,
            ],
            'AlfInt16'  => [
                'get'       => 32767,
                'getValue'  => 32767,
                'afterAdd5' => 32767,
                'afterInc'  => 32767,
                'afterSub9' => 32758,
                'afterDec'  => 32766,
            ],
            'AlfInt16U' => [
                'get'       => 65535,
                'getValue'  => 65535,
                'afterAdd5' => 65535,
                'afterInc'  => 65535,
                'afterSub9' => 65526,
                'afterDec'  => 65534,
            ],
            'AlfInt32'  => [
                'get'       => 2147483647,
                'getValue'  => 2147483647,
                'afterAdd5' => 2147483647,
                'afterInc'  => 2147483647,
                'afterSub9' => 2147483638,
                'afterDec'  => 2147483646,
            ],
            'AlfInt32U' => [
                'get'       => 4294967295,
                'getValue'  => 4294967295,
                'afterAdd5' => 4294967295,
                'afterInc'  => 4294967295,
                'afterSub9' => 4294967286,
                'afterDec'  => 4294967294,
            ],
        ],
    ];
}

