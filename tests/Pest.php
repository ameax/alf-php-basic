<?php

declare(strict_types = 1);

use Alf\AlfBasicAttribute;
use Alf\AlfBasicClass;
use Alf\AlfBasicSingleton;
use Alf\AlfBasicType;
use Alf\AlfBasicTypeScalar;
use Alf\AlfBasicTypeSelect;
use Alf\AlfBasicTypeStructure;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrClassIsRef;
use Alf\Attributes\AlfAttrEnumValue;
use Alf\Attributes\AlfAttrParameter;
use Alf\Attributes\AlfAttrParameterIsBool;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Attributes\AlfAttrParameterIsString;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Enums\AlfCharEncodings;
use Alf\Enums\AlfColorNames;
use Alf\Enums\AlfColorRGBChannels;
use Alf\Enums\AlfCountries;
use Alf\Enums\AlfLanguageCodes;
use Alf\Exceptions\AlfException;
use Alf\Exceptions\AlfExceptionRuntime;
use Alf\Interfaces\Booleans\AlfBoolGet;
use Alf\Interfaces\Booleans\AlfBoolGetTrait;
use Alf\Interfaces\Booleans\AlfBoolLike;
use Alf\Interfaces\Booleans\AlfBoolLikeTrait;
use Alf\Interfaces\Booleans\AlfBoolSet;
use Alf\Interfaces\Booleans\AlfBoolSetTrait;
use Alf\Interfaces\Booleans\AlfBoolWork;
use Alf\Interfaces\Booleans\AlfBoolWorkTrait;
use Alf\Interfaces\Integers\AlfIntGet;
use Alf\Interfaces\Integers\AlfIntGetTrait;
use Alf\Interfaces\Integers\AlfIntLike;
use Alf\Interfaces\Integers\AlfIntLikeTrait;
use Alf\Interfaces\Integers\AlfIntSet;
use Alf\Interfaces\Integers\AlfIntSetTrait;
use Alf\Interfaces\Integers\AlfIntWork;
use Alf\Interfaces\Integers\AlfIntWorkTrait;
use Alf\Interfaces\Strings\AlfCharGet;
use Alf\Interfaces\Strings\AlfCharGetTrait;
use Alf\Interfaces\Strings\AlfCharLike;
use Alf\Interfaces\Strings\AlfCharLikeTrait;
use Alf\Interfaces\Strings\AlfCharRead;
use Alf\Interfaces\Strings\AlfCharReadTrait;
use Alf\Interfaces\Strings\AlfCharSet;
use Alf\Interfaces\Strings\AlfCharSetTrait;
use Alf\Interfaces\Strings\AlfCharWork;
use Alf\Interfaces\Strings\AlfCharWorkTrait;
use Alf\Interfaces\Strings\AlfStringGet;
use Alf\Interfaces\Strings\AlfStringGetTrait;
use Alf\Interfaces\Strings\AlfStringLike;
use Alf\Interfaces\Strings\AlfStringLikeTrait;
use Alf\Interfaces\Strings\AlfStringRead;
use Alf\Interfaces\Strings\AlfStringReadTrait;
use Alf\Interfaces\Strings\AlfStringSet;
use Alf\Interfaces\Strings\AlfStringSetTrait;
use Alf\Interfaces\Strings\AlfStringWork;
use Alf\Interfaces\Strings\AlfStringWorkTrait;
use Alf\Interfaces\Values\AlfEmptyGet;
use Alf\Interfaces\Values\AlfEmptyGetTrait;
use Alf\Interfaces\Values\AlfEmptySet;
use Alf\Interfaces\Values\AlfEmptySetTrait;
use Alf\Interfaces\Values\AlfEmptyWork;
use Alf\Interfaces\Values\AlfEmptyWorkTrait;
use Alf\Interfaces\Values\AlfHumanData;
use Alf\Interfaces\Values\AlfHumanDataTrait;
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
use Alf\Manipulator\AlfStringManipulator;
use Alf\Manipulator\AlfStringWManipulator;
use Alf\Services\AlfCache;
use Alf\Services\AlfEnvironment;
use Alf\Services\AlfPhpClassManager;
use Alf\Services\AlfProgramming;
use Alf\Types\Enhanced\Colors\AlfColorRGB;
use Alf\Types\Enhanced\Colors\AlfColorRGBRef;
use Alf\Types\Enhanced\Colors\AlfColorRGBValue;
use Alf\Types\Scalars\AlfBool;
use Alf\Types\Scalars\AlfChar;
use Alf\Types\Scalars\AlfCharW;
use Alf\Types\Scalars\AlfInt;
use Alf\Types\Scalars\AlfInt16;
use Alf\Types\Scalars\AlfInt16U;
use Alf\Types\Scalars\AlfInt24;
use Alf\Types\Scalars\AlfInt24U;
use Alf\Types\Scalars\AlfInt32;
use Alf\Types\Scalars\AlfInt32U;
use Alf\Types\Scalars\AlfInt8;
use Alf\Types\Scalars\AlfInt8U;
use Alf\Types\Scalars\AlfIntRange;
use Alf\Types\Scalars\AlfString;
use Alf\Types\Scalars\AlfStringMarkup;
use Alf\Types\Scalars\AlfStringW;
use Alf\Types\Selects\AlfCharEncoding;
use Alf\Types\Selects\AlfColorName;
use Alf\Types\Selects\AlfColorRGBChannel;
use Alf\Types\Selects\AlfCountry;
use Alf\Types\Selects\AlfLanguageCode;
use Alf\Types\Structures\AlfLanguage;
use JetBrains\PhpStorm\Pure;

#[Pure]
function listAlfInterfaces() : array {
    return [
        // Interfaces/Booleans
        AlfBoolGet::class,
        AlfBoolLike::class,
        AlfBoolSet::class,
        AlfBoolWork::class,
        // Interfaces/Integers
        AlfIntGet::class,
        AlfIntLike::class,
        AlfIntSet::class,
        AlfIntWork::class,
        // Interfaces/String
        AlfCharGet::class,
        AlfCharLike::class,
        AlfCharRead::class,
        AlfCharSet::class,
        AlfCharWork::class,
        AlfStringGet::class,
        AlfStringLike::class,
        AlfStringRead::class,
        AlfStringSet::class,
        AlfStringWork::class,
        // Interfaces/Values
        AlfEmptyGet::class,
        AlfEmptySet::class,
        AlfEmptyWork::class,
        AlfHumanData::class,
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
        AlfBoolLikeTrait::class,
        AlfBoolSetTrait::class,
        AlfBoolWorkTrait::class,
        // Interfaces/Integers
        AlfIntGetTrait::class,
        AlfIntLikeTrait::class,
        AlfIntSetTrait::class,
        AlfIntWorkTrait::class,
        // Interfaces/String
        AlfCharGetTrait::class,
        AlfCharLikeTrait::class,
        AlfCharReadTrait::class,
        AlfCharSetTrait::class,
        AlfCharWorkTrait::class,
        AlfStringGetTrait::class,
        AlfStringLikeTrait::class,
        AlfStringReadTrait::class,
        AlfStringSetTrait::class,
        AlfStringWorkTrait::class,
        // Interfaces/Values
        AlfEmptyGetTrait::class,
        AlfEmptySetTrait::class,
        AlfEmptyWorkTrait::class,
        AlfHumanDataTrait::class,
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
        AlfBasicTypeSelect::class,
        AlfBasicTypeStructure::class,
        // Attributes
        AlfAttrAutoComplete::class,
        AlfAttrClassIsRef::class,
        AlfAttrEnumValue::class,
        AlfAttrParameter::class,
        AlfAttrParameterIsBool::class,
        AlfAttrParameterIsInt::class,
        AlfAttrParameterIsString::class,
        AlfAttrTraitAutoCall::class,
        // Manipulator
        AlfStringManipulator::class,
        AlfStringWManipulator::class,
        // Types/Enhanced
        AlfColorRGB::class,
        AlfColorRGBValue::class,
        AlfColorRGBRef::class,
        // Types/Scalars
        AlfBool::class,
        AlfChar::class,
        AlfCharW::class,
        AlfInt::class,
        AlfInt8::class,
        AlfInt8U::class,
        AlfInt16::class,
        AlfInt16U::class,
        AlfInt24::class,
        AlfInt24U::class,
        AlfInt32::class,
        AlfInt32U::class,
        AlfIntRange::class,
        AlfString::class,
        AlfStringMarkup::class,
        AlfStringW::class,
        // Types/Selects
        AlfCharEncoding::class,
        AlfColorName::class,
        AlfColorRGBChannel::class,
        AlfCountry::class,
        AlfLanguageCode::class,
        // Type/Structures
        AlfLanguage::class,
    ];
}

#[Pure]
function listAlfSingletons() : array {
    return [
        AlfBasicSingleton::class,
        // Services
        AlfCache::class,
        AlfEnvironment::class,
        AlfPhpClassManager::class,
        AlfProgramming::class,
    ];
}

#[Pure]
function listAlfEnums() : array {
    return [
        AlfCharEncodings::class,
        AlfColorNames::class,
        AlfColorRGBChannels::class,
        AlfCountries::class,
        AlfLanguageCodes::class,
    ];
}

function listAlfExceptions() : array {
    return [
        AlfException::class,
        AlfExceptionRuntime::class,
    ];
}

#[Pure]
function listAlfClassesAndSingletons() : array {
    return array_merge(listAlfClasses(), listAlfSingletons(), listAlfExceptions());
}

#[Pure]
function listAlfAll() : array {
    return array_merge(listAlfClasses(), listAlfSingletons(), listAlfInterfaces(), listAlfTraits(), listAlfEnums(), listAlfExceptions());
}

function listAlfClassesSubtype(string $subTypeOf, bool $andAbstract = false, bool $withRef = true) : array {
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
            if (!$withRef) {
                $useThisClass = true;
                foreach ($reflectionClass->getAttributes() as $attributeObject) {
                    if ($attributeObject->getName() !== AlfAttrClassIsRef::class) {
                        continue;
                    }
                    $useThisClass = false;
                    break;
                }
                if (!$useThisClass) {
                    continue;
                }
            }
        } catch (ReflectionException) {
            continue;
        }

        $output[] = $className;
    }
    return $output;
}

function listAlfClasses2Subtype(string $subTypeOfOne, string $subTypeOfTwo, bool $andAbstract = false, bool $withRef = true) : array {
    $output = [];
    foreach (listAlfClasses() as $className) {
        $gotTypeOne = false;
        $gotTypeTwo = false;
        $useByRef = true;
        try {
            $reflectionClass = new ReflectionClass($className);
            if ((!$andAbstract) && ($reflectionClass->isAbstract())) {
                continue;
            }
            if (($reflectionClass->isSubclassOf($subTypeOfOne)) || ($reflectionClass->getName() === $subTypeOfOne)) {
                $gotTypeOne = true;
            }
            if (($reflectionClass->isSubclassOf($subTypeOfTwo)) || ($reflectionClass->getName() === $subTypeOfTwo)) {
                $gotTypeTwo = true;
            }
            if (!$withRef) {
                foreach ($reflectionClass->getAttributes() as $attributeObject) {
                    if ($attributeObject->getName() !== AlfAttrClassIsRef::class) {
                        continue;
                    }
                    $useByRef = false;
                    break;
                }
            }
        } catch (ReflectionException) {
            continue;
        }

        if ((!$gotTypeOne) || (!$gotTypeTwo) || (!$useByRef)) {
            continue;
        }

        $output[] = $className;
    }
    return $output;
}

#[Pure]
function getBoolValues() : array {
    return [
        [
            'set'              => null,
            'isNull'           => true,
            'isEmpty'          => false,
            'get'              => false,
            'getValue'         => null,
            'getAsString'      => '',
            'getAsHumanString' => null,
            'afterInvert'      => true,
        ],
        [
            'set'              => false,
            'isNull'           => false,
            'isEmpty'          => true,
            'get'              => false,
            'getValue'         => false,
            'getAsString'      => '0',
            'getAsHumanString' => 'no',
            'afterInvert'      => true,
        ],
        [
            'set'              => true,
            'isNull'           => false,
            'isEmpty'          => false,
            'get'              => true,
            'getValue'         => true,
            'getAsString'      => '1',
            'getAsHumanString' => 'yes',
            'afterInvert'      => false,
        ],
    ];
}

#[Pure]
function getIntValues() : array {
    $output = [
        [
            'set'              => null,
            'isNull'           => true,
            'isEmpty'          => false,
            'get'              => 0,
            'getValue'         => null,
            'getAsString'      => '',
            'getAsHumanString' => null,
            'afterAdd5'        => 5,
            'afterInc'         => 1,
            'afterSub9'        => -9,
            'afterDec'         => -1,
            'AlfInt8U'         => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
            'AlfInt16U'        => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
            'AlfInt24U'        => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
            'AlfInt32U'        => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
        ],
        [
            'set'              => 0,
            'isNull'           => false,
            'isEmpty'          => true,
            'get'              => 0,
            'getValue'         => 0,
            'getAsString'      => '0',
            'getAsHumanString' => '0',
            'afterAdd5'        => 5,
            'afterInc'         => 1,
            'afterSub9'        => -9,
            'afterDec'         => -1,
            'AlfInt8U'         => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
            'AlfInt16U'        => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
            'AlfInt24U'        => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
            'AlfInt32U'        => [
                'afterSub9' => 0,
                'afterDec'  => 0,
            ],
            'AlfColorRGB'      => [
                'getAsString'      => '#000',
                'getAsHumanString' => '#000000',
            ],
        ],
        [
            'set'              => 5,
            'isNull'           => false,
            'isEmpty'          => false,
            'get'              => 5,
            'getValue'         => 5,
            'getAsString'      => '5',
            'getAsHumanString' => '5',
            'afterAdd5'        => 10,
            'afterInc'         => 6,
            'afterSub9'        => -4,
            'afterDec'         => 4,
            'AlfInt8U'         => [
                'afterSub9' => 0,
            ],
            'AlfInt16U'        => [
                'afterSub9' => 0,
            ],
            'AlfInt24U'        => [
                'afterSub9' => 0,
            ],
            'AlfInt32U'        => [
                'afterSub9' => 0,
            ],
            'AlfColorRGB'      => [
                'getAsString'      => '#000005',
                'getAsHumanString' => '#000005',
            ],
        ],
        [
            'set'              => 25,
            'isNull'           => false,
            'isEmpty'          => false,
            'get'              => 25,
            'getValue'         => 25,
            'getAsString'      => '25',
            'getAsHumanString' => '25',
            'afterAdd5'        => 30,
            'afterInc'         => 26,
            'afterSub9'        => 16,
            'afterDec'         => 24,
            'AlfColorRGB'      => [
                'getAsString'      => '#000019',
                'getAsHumanString' => '#000019',
            ],
        ],
        [
            'set'              => -7,
            'isNull'           => false,
            'isEmpty'          => false,
            'get'              => -7,
            'getValue'         => -7,
            'getAsString'      => '-7',
            'getAsHumanString' => '-7',
            'afterAdd5'        => -2,
            'afterInc'         => -6,
            'afterSub9'        => -16,
            'afterDec'         => -8,
            'AlfInt8U'         => [
                'isEmpty'          => true,
                'get'              => 0,
                'getValue'         => 0,
                'getAsString'      => '0',
                'getAsHumanString' => '0',
                'afterAdd5'        => 5,
                'afterInc'         => 1,
                'afterSub9'        => 0,
                'afterDec'         => 0,
            ],
            'AlfInt16U'        => [
                'isEmpty'          => true,
                'get'              => 0,
                'getValue'         => 0,
                'getAsString'      => '0',
                'getAsHumanString' => '0',
                'afterAdd5'        => 5,
                'afterInc'         => 1,
                'afterSub9'        => 0,
                'afterDec'         => 0,
            ],
            'AlfInt24U'        => [
                'isEmpty'          => true,
                'get'              => 0,
                'getValue'         => 0,
                'getAsString'      => '0',
                'getAsHumanString' => '0',
                'afterAdd5'        => 5,
                'afterInc'         => 1,
                'afterSub9'        => 0,
                'afterDec'         => 0,
            ],
            'AlfInt32U'        => [
                'isEmpty'          => true,
                'get'              => 0,
                'getValue'         => 0,
                'getAsString'      => '0',
                'getAsHumanString' => '0',
                'afterAdd5'        => 5,
                'afterInc'         => 1,
                'afterSub9'        => 0,
                'afterDec'         => 0,
            ],
            'AlfColorRGB'      => [
                'getAsString'      => '#000',
                'getAsHumanString' => '#000000',
            ],
        ],
        [
            'set'              => 500,
            'isNull'           => false,
            'isEmpty'          => false,
            'get'              => 500,
            'getValue'         => 500,
            'getAsString'      => '500',
            'getAsHumanString' => '500',
            'afterAdd5'        => 505,
            'afterInc'         => 501,
            'afterSub9'        => 491,
            'afterDec'         => 499,
            'AlfInt8'          => [
                'get'              => 128,
                'getValue'         => 128,
                'getAsString'      => '128',
                'getAsHumanString' => '128',
                'afterAdd5'        => 128,
                'afterInc'         => 128,
                'afterSub9'        => 119,
                'afterDec'         => 127,
            ],
            'AlfInt8U'         => [
                'get'              => 255,
                'getValue'         => 255,
                'getAsString'      => '255',
                'getAsHumanString' => '255',
                'afterAdd5'        => 255,
                'afterInc'         => 255,
                'afterSub9'        => 246,
                'afterDec'         => 254,
            ],
            'AlfColorRGB'      => [
                'getAsString'      => '#0001f4',
                'getAsHumanString' => '#0001f4',
            ],

        ],
        [
            'set'              => 70000,
            'isNull'           => false,
            'isEmpty'          => false,
            'get'              => 70000,
            'getValue'         => 70000,
            'getAsString'      => '70000',
            'getAsHumanString' => '70,000',
            'afterAdd5'        => 70005,
            'afterInc'         => 70001,
            'afterSub9'        => 69991,
            'afterDec'         => 69999,
            'AlfInt8'          => [
                'get'              => 128,
                'getValue'         => 128,
                'getAsString'      => '128',
                'getAsHumanString' => '128',
                'afterAdd5'        => 128,
                'afterInc'         => 128,
                'afterSub9'        => 119,
                'afterDec'         => 127,
            ],
            'AlfInt8U'         => [
                'get'              => 255,
                'getValue'         => 255,
                'getAsString'      => '255',
                'getAsHumanString' => '255',
                'afterAdd5'        => 255,
                'afterInc'         => 255,
                'afterSub9'        => 246,
                'afterDec'         => 254,
            ],
            'AlfInt16'         => [
                'get'              => 32767,
                'getValue'         => 32767,
                'getAsString'      => '32767',
                'getAsHumanString' => '32,767',
                'afterAdd5'        => 32767,
                'afterInc'         => 32767,
                'afterSub9'        => 32758,
                'afterDec'         => 32766,
            ],
            'AlfInt16U'        => [
                'get'              => 65535,
                'getValue'         => 65535,
                'getAsString'      => '65535',
                'getAsHumanString' => '65,535',
                'afterAdd5'        => 65535,
                'afterInc'         => 65535,
                'afterSub9'        => 65526,
                'afterDec'         => 65534,
            ],
            'AlfColorRGB'      => [
                'getAsString'      => '#011170',
                'getAsHumanString' => '#011170',
            ],
        ],
        [
            'set'              => 17000000,
            'isNull'           => false,
            'isEmpty'          => false,
            'get'              => 17000000,
            'getValue'         => 17000000,
            'getAsString'      => '17000000',
            'getAsHumanString' => '17,000,000',
            'afterAdd5'        => 17000005,
            'afterInc'         => 17000001,
            'afterSub9'        => 16999991,
            'afterDec'         => 16999999,
            'AlfInt8'          => [
                'get'              => 128,
                'getValue'         => 128,
                'getAsString'      => '128',
                'getAsHumanString' => '128',
                'afterAdd5'        => 128,
                'afterInc'         => 128,
                'afterSub9'        => 119,
                'afterDec'         => 127,
            ],
            'AlfInt8U'         => [
                'get'              => 255,
                'getValue'         => 255,
                'getAsString'      => '255',
                'getAsHumanString' => '255',
                'afterAdd5'        => 255,
                'afterInc'         => 255,
                'afterSub9'        => 246,
                'afterDec'         => 254,
            ],
            'AlfInt16'         => [
                'get'              => 32767,
                'getValue'         => 32767,
                'getAsString'      => '32767',
                'getAsHumanString' => '32,767',
                'afterAdd5'        => 32767,
                'afterInc'         => 32767,
                'afterSub9'        => 32758,
                'afterDec'         => 32766,
            ],
            'AlfInt16U'        => [
                'get'              => 65535,
                'getValue'         => 65535,
                'getAsString'      => '65535',
                'getAsHumanString' => '65,535',
                'afterAdd5'        => 65535,
                'afterInc'         => 65535,
                'afterSub9'        => 65526,
                'afterDec'         => 65534,
            ],
            'AlfInt24'         => [
                'get'              => 8388607,
                'getValue'         => 8388607,
                'getAsString'      => '8388607',
                'getAsHumanString' => '8,388,607',
                'afterAdd5'        => 8388607,
                'afterInc'         => 8388607,
                'afterSub9'        => 8388598,
                'afterDec'         => 8388606,
            ],
            'AlfInt24U'        => [
                'get'              => 16777215,
                'getValue'         => 16777215,
                'getAsString'      => '16777215',
                'getAsHumanString' => '16,777,215',
                'afterAdd5'        => 16777215,
                'afterInc'         => 16777215,
                'afterSub9'        => 16777206,
                'afterDec'         => 16777214,
            ],
            'AlfColorRGB'      => [
                'getAsString'      => '#fff',
                'getAsHumanString' => '#ffffff',
            ],
        ],
        [
            'set'              => 5000000000,
            'isNull'           => false,
            'isEmpty'          => false,
            'get'              => 5000000000,
            'getValue'         => 5000000000,
            'getAsString'      => '5000000000',
            'getAsHumanString' => '5,000,000,000',
            'afterAdd5'        => 5000000005,
            'afterInc'         => 5000000001,
            'afterSub9'        => 4999999991,
            'afterDec'         => 4999999999,
            'AlfInt8'          => [
                'get'              => 128,
                'getValue'         => 128,
                'getAsString'      => '128',
                'getAsHumanString' => '128',
                'afterAdd5'        => 128,
                'afterInc'         => 128,
                'afterSub9'        => 119,
                'afterDec'         => 127,
            ],
            'AlfInt8U'         => [
                'get'              => 255,
                'getValue'         => 255,
                'getAsString'      => '255',
                'getAsHumanString' => '255',
                'afterAdd5'        => 255,
                'afterInc'         => 255,
                'afterSub9'        => 246,
                'afterDec'         => 254,
            ],
            'AlfInt16'         => [
                'get'              => 32767,
                'getValue'         => 32767,
                'getAsString'      => '32767',
                'getAsHumanString' => '32,767',
                'afterAdd5'        => 32767,
                'afterInc'         => 32767,
                'afterSub9'        => 32758,
                'afterDec'         => 32766,
            ],
            'AlfInt16U'        => [
                'get'              => 65535,
                'getValue'         => 65535,
                'getAsString'      => '65535',
                'getAsHumanString' => '65,535',
                'afterAdd5'        => 65535,
                'afterInc'         => 65535,
                'afterSub9'        => 65526,
                'afterDec'         => 65534,
            ],
            'AlfInt24'         => [
                'get'              => 8388607,
                'getValue'         => 8388607,
                'getAsString'      => '8388607',
                'getAsHumanString' => '8,388,607',
                'afterAdd5'        => 8388607,
                'afterInc'         => 8388607,
                'afterSub9'        => 8388598,
                'afterDec'         => 8388606,
            ],
            'AlfInt24U'        => [
                'get'              => 16777215,
                'getValue'         => 16777215,
                'getAsString'      => '16777215',
                'getAsHumanString' => '16,777,215',
                'afterAdd5'        => 16777215,
                'afterInc'         => 16777215,
                'afterSub9'        => 16777206,
                'afterDec'         => 16777214,
            ],
            'AlfInt32'         => [
                'get'              => 2147483647,
                'getValue'         => 2147483647,
                'getAsString'      => '2147483647',
                'getAsHumanString' => '2,147,483,647',
                'afterAdd5'        => 2147483647,
                'afterInc'         => 2147483647,
                'afterSub9'        => 2147483638,
                'afterDec'         => 2147483646,
            ],
            'AlfInt32U'        => [
                'get'              => 4294967295,
                'getValue'         => 4294967295,
                'getAsString'      => '4294967295',
                'getAsHumanString' => '4,294,967,295',
                'afterAdd5'        => 4294967295,
                'afterInc'         => 4294967295,
                'afterSub9'        => 4294967286,
                'afterDec'         => 4294967294,
            ],
            'AlfColorRGB'      => [
                'getAsString'      => '#fff',
                'getAsHumanString' => '#ffffff',
            ],
        ],
    ];
    foreach (array_keys($output) as $inx) {
        if (isset($output[$inx]['AlfInt24U'])) {
            $storeStringValue = null;
            $hasStringValue = false;
            if ((isset($output[$inx]['AlfColorRGB'])) && (array_key_exists('getAsString', $output[$inx]['AlfColorRGB']))) {
                $storeStringValue = $output[$inx]['AlfColorRGB']['getAsString'];
                $hasStringValue = true;
            }

            // -
            $storeHumanValue = null;
            $hasHumanValue = false;
            if ((isset($output[$inx]['AlfColorRGB'])) && (array_key_exists('getAsHumanString', $output[$inx]['AlfColorRGB']))) {
                $storeHumanValue = $output[$inx]['AlfColorRGB']['getAsHumanString'];
                $hasHumanValue = true;
            }

            // -
            $output[$inx]['AlfColorRGB'] = $output[$inx]['AlfInt24U'];

            // -
            if ($hasHumanValue) {
                $output[$inx]['AlfColorRGB']['getAsHumanString'] = $storeHumanValue;
            }
            if ($hasStringValue) {
                $output[$inx]['AlfColorRGB']['getAsString'] = $storeStringValue;
            }
        }
        if (isset($output[$inx]['AlfInt8U'])) {
            $output[$inx]['AlfColorRGBValue'] = $output[$inx]['AlfInt8U'];
        }
    }
    return $output;
}

#[Pure]
function getStringValues() : array {
    return [
        [
            'set'               => null,
            'isNull'            => true,
            'isEmpty'           => false,
            'get'               => '',
            'getValue'          => null,
            'getAsHumanString'  => null,
            'getStringLength'   => 0,
            'getStringByteSize' => 0,
            'afterUpperCase'    => '',
            'afterLowerCase'    => '',
        ],
        [
            'set'               => '',
            'isNull'            => false,
            'isEmpty'           => true,
            'get'               => '',
            'getValue'          => '',
            'getAsHumanString'  => '',
            'getStringLength'   => 0,
            'getStringByteSize' => 0,
            'afterUpperCase'    => '',
            'afterLowerCase'    => '',
        ],
        [
            'set'                => 'abc',
            'isNull'             => false,
            'isEmpty'            => false,
            'get'                => 'abc',
            'getValue'           => 'abc',
            'getAsHumanString'   => 'abc',
            'getStringLength'    => 3,
            'getStringByteSize'  => 3,
            'afterUpperCase'     => 'ABC',
            'afterLowerCase'     => 'abc',
            'AlfBasicTypeSelect' => [
                'get' => '',
            ],
            'AlfChar'            => [
                'get'               => 'a',
                'getValue'          => 'a',
                'getAsHumanString'  => 'a',
                'getStringLength'   => 1,
                'getStringByteSize' => 1,
                'afterUpperCase'    => 'A',
                'afterLowerCase'    => 'a',
            ],
            'AlfCharW'           => [
                'get'               => 'a',
                'getValue'          => 'a',
                'getAsHumanString'  => 'a',
                'getStringLength'   => 1,
                'getStringByteSize' => 1,
                'afterUpperCase'    => 'A',
                'afterLowerCase'    => 'a',
            ],
        ],
        [
            'set'                => 'slug-TOKEN-module',
            'isNull'             => false,
            'isEmpty'            => false,
            'get'                => 'slug-TOKEN-module',
            'getValue'           => 'slug-TOKEN-module',
            'getAsHumanString'   => 'slug-TOKEN-module',
            'getStringLength'    => 17,
            'getStringByteSize'  => 17,
            'afterUpperCase'     => 'SLUG-TOKEN-MODULE',
            'afterLowerCase'     => 'slug-token-module',
            'AlfBasicTypeSelect' => [
                'get' => '',
            ],
            'AlfChar'            => [
                'get'               => 's',
                'getValue'          => 's',
                'getAsHumanString'  => 's',
                'getStringLength'   => 1,
                'getStringByteSize' => 1,
                'afterUpperCase'    => 'S',
                'afterLowerCase'    => 's',
            ],
            'AlfCharW'           => [
                'get'               => 's',
                'getValue'          => 's',
                'getAsHumanString'  => 's',
                'getStringLength'   => 1,
                'getStringByteSize' => 1,
                'afterUpperCase'    => 'S',
                'afterLowerCase'    => 's',
            ],
        ],
        [
            'set'                => 'ONE two Three',
            'isNull'             => false,
            'isEmpty'            => false,
            'get'                => 'ONE two Three',
            'getValue'           => 'ONE two Three',
            'getAsHumanString'   => 'ONE two Three',
            'getStringLength'    => 13,
            'getStringByteSize'  => 13,
            'afterUpperCase'     => 'ONE TWO THREE',
            'afterLowerCase'     => 'one two three',
            'AlfBasicTypeSelect' => [
                'get' => '',
            ],
            'AlfChar'            => [
                'get'               => 'O',
                'getValue'          => 'O',
                'getAsHumanString'  => 'O',
                'getStringLength'   => 1,
                'getStringByteSize' => 1,
                'afterUpperCase'    => 'O',
                'afterLowerCase'    => 'o',
            ],
            'AlfCharW'           => [
                'get'               => 'O',
                'getValue'          => 'O',
                'getAsHumanString'  => 'O',
                'getStringLength'   => 1,
                'getStringByteSize' => 1,
                'afterUpperCase'    => 'O',
                'afterLowerCase'    => 'o',
            ],
        ],
        [
            'set'                => '??????',
            'isNull'             => false,
            'isEmpty'            => false,
            'get'                => '??????',
            'getValue'           => '??????',
            'getAsHumanString'   => '??????',
            'getStringLength'    => 6,
            'getStringByteSize'  => 6,
            'afterUpperCase'     => '??????',
            'afterLowerCase'     => '??????',
            'isNotASCII'         => true,
            'AlfBasicTypeSelect' => [
                'get'              => '',
                'getValue'         => '',
                'getAsHumanString' => '',
            ],
            'AlfStringW'         => [
                'getStringLength' => 3,
                'isNotASCII'      => false,
            ],
            'AlfStringMarkup'    => [
                'getStringLength' => 3,
                'isNotASCII'      => false,
            ],
            'AlfChar'            => [
                'getStringLength'   => 1,
                'getStringByteSize' => 1,
            ],
            'AlfCharW'           => [
                'get'               => '??',
                'getValue'          => '??',
                'getAsHumanString'  => '??',
                'isNotASCII'        => false,
                'getStringLength'   => 1,
                'getStringByteSize' => 2,
                'afterUpperCase'    => '??',
                'afterLowerCase'    => '??',
            ],
        ],
        [
            'set'                => '??pfel ??ber ??STERREICH', // "apples over austria". Even in German, this phrase is senseless, but it has the requirements for the test.
            'isNull'             => false,
            'isEmpty'            => false,
            'get'                => '??pfel ??ber ??STERREICH',
            'getValue'           => '??pfel ??ber ??STERREICH',
            'getAsHumanString'   => '??pfel ??ber ??STERREICH',
            'getStringLength'    => 24,
            'getStringByteSize'  => 24,
            'afterUpperCase'     => '??PFEL ??BER ??STERREICH',
            'afterLowerCase'     => '??pfel ??ber ??sterreich',
            'isNotASCII'         => true,
            'AlfBasicTypeSelect' => [
                'get'              => '',
                'getValue'         => '',
                'getAsHumanString' => '',
            ],
            'AlfStringW'         => [
                'getStringLength' => 21,
                'isNotASCII'      => false,
            ],
            'AlfStringMarkup'    => [
                'getStringLength' => 21,
                'isNotASCII'      => false,
            ],
            'AlfChar'            => [
                'getStringLength'   => 1,
                'getStringByteSize' => 1,
            ],
            'AlfCharW'           => [
                'get'               => '??',
                'getValue'          => '??',
                'getAsHumanString'  => '??',
                'isNotASCII'        => false,
                'getStringLength'   => 1,
                'getStringByteSize' => 2,
                'afterUpperCase'    => '??',
                'afterLowerCase'    => '??',
            ],
        ],
        [
            'set'                => '0',
            'isNull'             => false,
            'isEmpty'            => false,
            'get'                => '0',
            'getValue'           => '0',
            'getAsHumanString'   => '0',
            'getStringLength'    => 1,
            'getStringByteSize'  => 1,
            'afterUpperCase'     => '0',
            'afterLowerCase'     => '0',
            'AlfBasicTypeSelect' => [
                'get' => '',
            ],
        ],
        [
            'set'                => '1',
            'isNull'             => false,
            'isEmpty'            => false,
            'get'                => '1',
            'getValue'           => '1',
            'getAsHumanString'   => '1',
            'getStringLength'    => 1,
            'getStringByteSize'  => 1,
            'afterUpperCase'     => '1',
            'afterLowerCase'     => '1',
            'AlfBasicTypeSelect' => [
                'get' => '',
            ],
        ],
    ];
}

class AlfProgrammingTestDummyForNullHasNoFunction {

}

class AlfProgrammingTestDummyForNullIsNull {

    public function isNull() : bool {
        return true;
    }

}

class AlfProgrammingTestDummyForNullIsNotNull {

    public function isNull() : bool {
        return false;
    }

}

class AlfProgrammingTestDummyForStringable {

    public function __toString() : string {
        return 'X';
    }

}

class AlfEnvironmentOwnTest extends AlfEnvironment {

    public function refHumanNumbersDecimalSeparator() : AlfCharW {
        return new AlfCharW('??');
    }

}
