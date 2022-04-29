# Changelog

All notable changes to `alf-php-basic` will be documented in this file.

## 1.3.0 - 2022-04-29

- AlfException
- AlfExceptionRuntime
- AlfBasicTypeStructure implements AlfNullOrEmptyWork
- rename select: AlfCharset to AlfCharEncoding
- rename enum: AlfCharsets to AlfCharEncodings
- rename interface: AlfCharsetProperty to AlfCharEncodingProperty
- interface: AlfCharGet
- interface: AlfCharSet
- interface: AlfCharRead
- interface: AlfCharWork
- interface: AlfCharLike
- scalar: AlfChar
- scalar: AlfCharW

## 1.2.0 - 2022-04-13

- scalar type: AlfInt24
- scalar type: AlfInt24U
- enhanced type: AlfColorRGB
- enhanced type: AlfColorRGBValue
- enhanced type: AlfColorRGBRef
- interface: AlfIntLike
- interface: AlfBoolLike
- interface: AlfStringLike
- AlfColorRGBChannels: enum names to long names (e.g. "r" to "red")
- enum: AlfCountries
- select: AlfCountry
- enum: AlfLanguageCodes
- select: AlfLanguageCode
- structure: AlfLanguage

## 1.1.8 - 2022-04-12

- manipulator: AlfStringWManipulator
- interface: AlfCharsetProperty

## 1.1.7 - 2022-04-11

- interface: AlfStringRead
- manipulator: AlfStringManipulator

## 1.1.6 - 2022-04-07

- AlfProgramming: valueIsNull
- enum: AlfColorRGBChannels
- enum: AlfCharsets
- basic class: AlfBasicTypeSelect
- select type: AlfCharset
- interface: AlfStringGet
- interface: AlfStringSet
- interface: AlfStringWork
- attribute: AlfAttrParameterIsString
- scalar type: AlfString
- attribute: AlfAttrEnumValue
- tests

## 1.1.5 - 2022-03-11

- tests with declare(strict_types = 1);
- interface: AlfIntGet
- interface: AlfIntSet
- interface: AlfIntWork
- calculation functions at AlfIntWork
- AlfInt extends AlfIntWork
- scalar type: AlfInt16
- scalar type: AlfInt16U
- scalar type: AlfInt32
- scalar type: AlfInt32U
- scalar type: AlfBool
- interface: AlfBoolGet
- interface: AlfBoolSet
- interface: AlfBoolWork
- attribute: AlfAttrParameterIsBool

## 1.1.4 - 2022-03-09

- tests
- code cleanup by tests
- resort functions in classes
- AlfBasicTypeScalar implements AlfNullWork
- interface: AlfEmptyGet
- interface: AlfEmptySet
- interface: AlfEmptyWork
- interface: AlfNullOrEmptyWork

## 1.1.3 - 2022-02-17

- scalar type: AlfInt8U

## 1.1.2 - 2022-02-17

- AlfBasicClass::getPhpParentClass() - rename from AlfBasicClass::getParentClass()
- AlfBasicClass::listPhpParentClasses()
- AlfBasicClass::listPhpTraits()
- scalar type: AlfInt8
- abstract scalar type: AlfIntRange
- service: AlfCache
- service: AlfPhpClassManager
- AlfPhpClassManager::getParent()
- AlfPhpClassManager::listParents()
- AlfPhpClassManager::listTraits()

## 1.1.1 - 2022-02-11

- bugfix: directory first uppercase letter problem on GitHub

## 1.1.0 - 2022-02-10

- refactor namespaces
- interface: AlfValueGet
- interface: AlfNullGet
- interface: AlfNullSet
- interface: AlfNullWork
- attribute: AlfAttrTraitAutoCall
- update: AlfInt extends AlfNullWork
- AlfProgramming::valueToInt()
- AlfBasicClass::getParentClass()
- bugfix: service calls are now by object, no static functions even more
- @AlfAttrAutoComplete functions are no longer #[Pure]. All these functions are now calling AlfProgramming::_()->
  unused()

## 1.0.3 to 1.0.7 - 2022-02-10

- update for Packagist
- update for GitHub

## 1.0.2 - 2022-02-09

- scalar type: alfInt
- basic attribute: AlfAttrParameter
- parameter attribute: AlfAttrParameterIsInt

## 1.0.1 - 2022-02-09

- basic class: AlfBasicSingleton
- basic class: AlfBasicAttribute
- basic class: AlfBasicType
- basic class: AlfBasicTypeScalar
- service: AlfProgramming
- attribute: AlfAttrAutoComplete
- bugfix: changelog date for v1.0.0

## 1.0.0 - 2022-02-03

- initial release
- basic class: AlfBasicClass
