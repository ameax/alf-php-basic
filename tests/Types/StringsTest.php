<?php

declare(strict_types = 1);

use Alf\AlfBasicTypeSelect;
use Alf\Interfaces\Strings\AlfStringGet;
use Alf\Interfaces\Strings\AlfStringSet;
use Alf\Interfaces\Strings\AlfStringWork;
use Alf\Types\Scalars\AlfString;

test('classes extends AlfString',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();
        $shortName = $reflectionClass->getShortName();

        foreach (getStringValues() as $valueRow) {
            $inst = AlfString::_AlfString(new $fullClassName($valueRow['set']));

            $isNull = ($valueRow[$shortName]['isNull'] ?? $valueRow['isNull'] ?? null);
            $isEmpty = ($valueRow[$shortName]['isEmpty'] ?? $valueRow['isEmpty'] ?? null);
            $isNullOrEmpty = $isNull || $isEmpty;
            $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['get'] ?? null);
            $forValue = ($valueRow[$shortName]['getValue'] ?? $valueRow['getValue'] ?? null);

            // -
            $this->assertSame($inst->isNull(), $isNull,
                              '(1) '.$shortName.'::cTor('.($valueRow['set'] ?? '-NULL-').')->isNull()');
            $this->assertSame($inst->isEmpty(), $isEmpty,
                              '(1) '.$shortName.'::cTor('.($valueRow['set'] ?? '-NULL-').')->isEmpty()');
            $this->assertSame($inst->isNullOrEmpty(), $isNullOrEmpty,
                              '(1) '.$shortName.'::cTor('.($valueRow['set'] ?? '-NULL-').')->isNullOrEmpty()');

            // -
            $inst->setToNull();
            $this->assertTrue($inst->isNull(),
                              '(2) '.$shortName.'::setToNull()->isNull()');
            $this->assertFalse($inst->isEmpty(),
                               '(2) '.$shortName.'::setToNull()->isEmpty()');
            $this->assertTrue($inst->isNullOrEmpty(),
                              '(2) '.$shortName.'::setToNull()->isNullOrEmpty()');

            // -
            $inst->set($valueRow['set']);
            $this->assertSame($inst->isNull(), $isNull,
                              '(3) '.$shortName.'::set('.($valueRow['set'] ?? '-NULL-').')->isNull()');
            $this->assertSame($inst->isEmpty(), $isEmpty,
                              '(3) '.$shortName.'::set('.($valueRow['set'] ?? '-NULL-').')->isEmpty()');
            $this->assertSame($inst->isNullOrEmpty(), $isNullOrEmpty,
                              '(3) '.$shortName.'::set('.($valueRow['set'] ?? '-NULL-').')->isNullOrEmpty()');

            // -
            $inst->setToEmpty();
            $this->assertFalse($inst->isNull(),
                               '(4) '.$shortName.'::setToNull()->isNull()');
            $this->assertTrue($inst->isEmpty(),
                              '(4) '.$shortName.'::setToNull()->isEmpty()');
            $this->assertTrue($inst->isNullOrEmpty(),
                              '(4) '.$shortName.'::setToNull()->isNullOrEmpty()');

            // -
            $inst->setFromString($valueRow['set']);
            $this->assertSame($inst->isNull(), $isNull,
                              '(5) '.$shortName.'::setFromString('.($valueRow['set'] ?? '-NULL-').')->isNull()');
            $this->assertSame($inst->isEmpty(), $isEmpty,
                              '(5) '.$shortName.'::setFromString('.($valueRow['set'] ?? '-NULL-').')->isEmpty()');
            $this->assertSame($inst->isNullOrEmpty(), $isNullOrEmpty,
                              '(5) '.$shortName.'::setFromString('.($valueRow['set'] ?? '-NULL-').')->isNullOrEmpty()');

            // -
            $inst2 = clone $inst;
            $this->assertSame($inst2->isNull(), $isNull,
                              '(6) '.$shortName.'::clone('.($valueRow['set'] ?? '-NULL-').')->isNull()');
            $this->assertSame($inst2->isEmpty(), $isEmpty,
                              '(6) '.$shortName.'::clone('.($valueRow['set'] ?? '-NULL-').')->isEmpty()');
            $this->assertSame($inst2->isNullOrEmpty(), $isNullOrEmpty,
                              '(6) '.$shortName.'::clone('.($valueRow['set'] ?? '-NULL-').')->isNullOrEmpty()');

            // -
            $this->assertSame($inst2->get(), $forGet,
                              '(7) '.$shortName.'::set('.($valueRow['set'] ?? '-NULL-').')->get('.($forGet ?? '-NULL-').') on "'.($inst2->get() ?? '-NULL-').'"');
            $this->assertSame($inst2->getValue(), $forValue,
                              '(7) '.$shortName.'::set('.($valueRow['set'] ?? '-NULL-').')->getValue('.($forValue ?? '-NULL-').') on "'.($inst2->get() ?? '-NULL-').'"');

            // -
            $this->assertSame($inst2->get(), $inst2->getAsString(),
                              '(8) '.$shortName.'::get()<>getAsString()');
        }

    })->with(listAlfClassesSubtype(AlfString::class));


test('classes extends AlfStringGet and AlfStringSet',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();
        $shortName = $reflectionClass->getShortName();

        $inst = new $fullClassName();
        if ((!is_a($inst, AlfStringGet::class)) || (!is_a($inst, AlfStringSet::class))) {
            // autoComplete for phpStorm
            return;
        }

        foreach (getStringValues() as $valueRow) {
            $forSet = $valueRow['set'];

            if (is_a($inst, AlfBasicTypeSelect::class)) {
                $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['AlfBasicTypeSelect']['get'] ?? $valueRow['get'] ?? null);
            } else {
                $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['get'] ?? null);
            }

            // -
            $inst->setFromString($valueRow['set']);
            $this->assertSame($forGet, $inst->getAsString(),
                              '(1) '.$shortName.'::setFromString()<>getAsString()'
                              .' with set('.($forSet ?? '-NULL-').') and get('.($forGet ?? '-NULL-').') on "'.($inst->getAsString() ?? '-NULL-').'"');

            // -
            $inst2 = clone $inst;
            $this->assertSame($inst2->getAsString(), $inst->getAsString(),
                              '(2) '.$shortName.'::clone<>org'
                              .' with set('.($forSet ?? '-NULL-').')');

            // -
            $this->assertSame((string)$inst, $inst->getAsString(),
                              '(3) '.$shortName.'::org<>(string)'
                              .' with set('.($forSet ?? '-NULL-').')');
        }

    })->with(listAlfClasses2Subtype(AlfStringGet::class, AlfStringSet::class));

test('classes extends AlfStringWork',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();
        $shortName = $reflectionClass->getShortName();

        $inst = new $fullClassName();
        if (!is_a($inst, AlfStringWork::class)) {
            // autoComplete for phpStorm
            return;
        }

        foreach (getStringValues() as $valueRow) {
            $forSet = $valueRow['set'];
            $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['get'] ?? null);
            $forGetStringLength = ($valueRow[$shortName]['getStringLength'] ?? $valueRow['getStringLength'] ?? null);
            $forGetStringByteSize = ($valueRow[$shortName]['getStringByteSize'] ?? $valueRow['getStringByteSize'] ?? null);

            // -
            $inst->setFromString($valueRow['set']);
            $this->assertSame($forGet, $inst->getAsString(),
                              '(1) '.$shortName.'::setFromString()<>getAsString()'
                              .' with set('.($forSet ?? '-NULL-').') and get('.($forGet ?? '-NULL-').')');


            // -
            $instForGetter = clone $inst;
            $this->assertSame($instForGetter->getStringLength(), $forGetStringLength,
                              '(2) '.$shortName.'('.($forSet ?? '-NULL-').')::getStringLength()<>'.($forGetStringLength ?? '-NULL-'));
            $this->assertSame($instForGetter->getStringByteSize(), $forGetStringByteSize,
                              '(2) '.$shortName.'('.($forSet ?? '-NULL-').')::getStringByteSize()<>'.($forGetStringByteSize ?? '-NULL-'));
        }

    })->with(listAlfClassesSubtype(AlfStringWork::class));
