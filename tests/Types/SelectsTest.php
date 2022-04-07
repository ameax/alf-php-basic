<?php

declare(strict_types = 1);

use Alf\AlfBasicTypeSelect;
use Alf\Attributes\AlfAttrEnumValue;
use Alf\Types\Scalars\AlfString;

test('select got enums',
    /** @throws ReflectionException */
    function (string $selectName) : void {

        $reflectionClass = new ReflectionClass($selectName);
        $shortName = $reflectionClass->getShortName();

        $needEnumName = 'Alf\\Enums\\'.$shortName.'s';
        $this->assertTrue(enum_exists($needEnumName), 'Missing enum for select-class '.$shortName);

        // -
        $obj = AlfBasicTypeSelect::_AlfBasicTypeSelect(new $selectName());
        $enumClass = $obj->getEnumClass();
        $this->assertSame($enumClass, $needEnumName, 'Different name by getEnumClass(): '.$selectName.' vs '.$enumClass);

        // - try all values
        foreach ($enumClass::cases() as $caseValue) {
            $obj->set($caseValue);
            $this->assertSame($obj->getValue(), $caseValue, '(1) set!==getValue: "'.($caseValue?->name ?? '-NULL->name-').'"');

            // -
            $obj->setToNull();
            $this->assertTrue($obj->isNull(), '(2a) not null but should be!');
            $this->assertFalse($obj->isEmpty(), '(2b) is empty but should not be, should be null!');
            $this->assertTrue($obj->isNullOrEmpty(), '(2c) not nullOrEmpty but should be!');

            // -
            $obj->setToEmpty();
            $this->assertTrue($obj->isEmpty(), '(3a) not empty but should be!');
            $this->assertFalse($obj->isNull(), '(3b) is null but should not be, should be empty!');
            $this->assertTrue($obj->isNullOrEmpty(), '(3c) not nullOrEmpty but should be!');

            // -
            $obj->set($caseValue);
            $this->assertSame($obj->getValue(), $caseValue, '(4) set!==getValue: "'.($caseValue?->name ?? '-NULL->name-').'"');

            // - value as string
            $tryStrings = [];
            $tryStrings[] = $caseValue->name;
            $tryStrings[] = $caseValue->value;

            $reflectionEnum = new ReflectionClass($enumClass);
            foreach ($reflectionEnum->getMethods() as $enumMethod) {
                foreach ($enumMethod->getAttributes() as $enumAttribute) {
                    if ($enumAttribute->getName() !== AlfAttrEnumValue::class) {
                        continue;
                    }
                    $func = $enumMethod->getName();
                    $tryStrings[] = $caseValue->$func();
                    break;
                }
            }

            foreach ($tryStrings as $tryString) {
                $obj->setToNull();
                $this->assertTrue($obj->isNull(), '(5a) not null but should be!');

                // -
                $obj->setFromString($tryString);
                $this->assertSame($obj->getValue(), $caseValue, '(5b) setFromString!==getValue: "'.($caseValue?->name ?? '-NULL->name-').'" vs "'.$tryString.'"');

                $obj->setToNull();
                $this->assertTrue($obj->isNull(), '(5c) not null but should be!');

                // -
                $alfStringObj = new AlfString($tryString);
                $obj->setFromString($alfStringObj);
                $this->assertSame($obj->getValue(), $caseValue, '(5d) setFromString!==getValue: "'.($caseValue?->name ?? '-NULL->name-').'" vs "'.$alfStringObj->getAsString().'"');
            }

            $obj->setFromString('ThisValueIsNotAtTheEnumBecauseThisValueIsALongDummyValue');
            $this->assertTrue($obj->isEmpty(), '(6a) not empty but should be!');
            $this->assertFalse($obj->isNull(), '(6b) is null but should not be, should be empty!');
            $this->assertTrue($obj->isNullOrEmpty(), '(6c) not nullOrEmpty but should be!');
        }

    })->with(listAlfClassesSubtype(AlfBasicTypeSelect::class));

