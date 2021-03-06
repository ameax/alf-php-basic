<?php

declare(strict_types = 1);

use Alf\Interfaces\Booleans\AlfBoolGet;
use Alf\Interfaces\Booleans\AlfBoolLike;
use Alf\Interfaces\Booleans\AlfBoolSet;
use Alf\Interfaces\Booleans\AlfBoolWork;
use Alf\Types\Scalars\AlfBool;

test('classes extends AlfBoolGet and AlfBoolSet',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();
        $shortName = $reflectionClass->getShortName();

        $inst = new $fullClassName();
        if ((!is_a($inst, AlfBoolGet::class)) || (!is_a($inst, AlfBoolSet::class))) {
            // autoComplete for phpStorm
            return;
        }

        foreach (getBoolValues() as $valueRow) {
            $forSet = $valueRow['set'];
            $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['get'] ?? null);

            // -
            $inst->setFromBool($valueRow['set']);
            $this->assertSame($forGet, $inst->getAsBool(),
                              '(1) '.$shortName.'::setFromBool()<>getAsBool()'
                              .' with set('.($forSet ?? '-NULL-').') and get('.($forGet ?? '-NULL-').')');

            // -
            $inst2 = clone $inst;
            $this->assertSame($inst2->getAsBool(), $inst->getAsBool(),
                              '(2) '.$shortName.'::clone<>org'
                              .' with set('.($forSet ?? '-NULL-').')');
        }

    })->with(listAlfClasses2Subtype(AlfBoolGet::class, AlfBoolSet::class));

test('classes extends AlfBoolWork',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();
        $shortName = $reflectionClass->getShortName();

        $inst = new $fullClassName();
        if (!is_a($inst, AlfBoolWork::class)) {
            // autoComplete for phpStorm
            return;
        }

        foreach (getBoolValues() as $valueRow) {
            $forSet = $valueRow['set'];
            $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['get'] ?? null);
            $forAfterInvert = ($valueRow[$shortName]['afterInvert'] ?? $valueRow['afterInvert'] ?? null);

            // -
            $inst->setFromBool($valueRow['set']);
            $this->assertSame($forGet, $inst->getAsBool(),
                              '(1) '.$shortName.'::setFromBool()<>getAsBool()'
                              .' with set('.($forSet ?? '-NULL-').') and get('.($forGet ?? '-NULL-').')');

            // -
            $instForInvert = clone $inst;
            $instForInvert->invert();
            $this->assertSame($instForInvert->getAsBool(), $forAfterInvert,
                              '(2) '.$shortName.'('.($forSet ?? '-NULL-').')::add(5) should be '.($forAfterInvert ?? '-NULL-')
                              .' but is '.$instForInvert->getAsBool());
        }

    })->with(listAlfClassesSubtype(AlfBoolWork::class));

test('classes extends AlfBoolLike',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();
        $shortName = $reflectionClass->getShortName();

        foreach (getBoolValues() as $valueRow) {
            $inst = AlfBool::_AlfBool(new $fullClassName($valueRow['set']));

            $isNull = ($valueRow[$shortName]['isNull'] ?? $valueRow['isNull'] ?? null);
            $isEmpty = ($valueRow[$shortName]['isEmpty'] ?? $valueRow['isEmpty'] ?? null);
            $isNullOrEmpty = $isNull || $isEmpty;
            $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['get'] ?? null);
            $forValue = ($valueRow[$shortName]['getValue'] ?? $valueRow['getValue'] ?? null);
            $asString = ($valueRow[$shortName]['getAsString'] ?? $valueRow['getAsString'] ?? null);
            $humanString = ($valueRow[$shortName]['getAsHumanString'] ?? $valueRow['getAsHumanString'] ?? null);

            // -
            $this->assertSame($inst->isNull(), $isNull,
                              '(1) '.$shortName.'::cTor('.($valueRow['set'] ?? '-NULL-').')->isNull()');
            $this->assertSame($inst->isEmpty(), $isEmpty,
                              '(1) '.$shortName.'::cTor('.($valueRow['set'] ?? '-NULL-').')->isEmpty()');
            $this->assertSame($inst->isNullOrEmpty(), $isNullOrEmpty,
                              '(1) '.$shortName.'::cTor('.($valueRow['set'] ?? '-NULL-').')->isNullOrEmpty()');

            // -
            $this->assertSame($inst->getAsHumanString(), $humanString,
                              '(h) human string is different: "'.($humanString ?? '-NULL-').'" and "'.($inst->getAsHumanString() ?? '-NULL-').'"');
            $this->assertSame($inst->getAsString(), $asString,
                              '(s) string is different: "'.($asString ?? '-NULL-').'" and "'.($inst->getAsString() ?? '-NULL-').'"');

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
            $inst->setFromBool($valueRow['set']);
            $this->assertSame($inst->isNull(), $isNull,
                              '(5) '.$shortName.'::setFromBool('.($valueRow['set'] ?? '-NULL-').')->isNull()');
            $this->assertSame($inst->isEmpty(), $isEmpty,
                              '(5) '.$shortName.'::setFromBool('.($valueRow['set'] ?? '-NULL-').')->isEmpty()');
            $this->assertSame($inst->isNullOrEmpty(), $isNullOrEmpty,
                              '(5) '.$shortName.'::setFromBool('.($valueRow['set'] ?? '-NULL-').')->isNullOrEmpty()');

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
                              '(7) '.$shortName.'::set('.($valueRow['set'] ?? '-NULL-').')->get('.($forGet ?? '-NULL-').')');
            $this->assertSame($inst2->getValue(), $forValue,
                              '(7) '.$shortName.'::set('.($valueRow['set'] ?? '-NULL-').')->getValue('.($forValue ?? '-NULL-').')');

            // -
            $this->assertSame($inst2->get(), $inst2->getAsBool(),
                              '(8) '.$shortName.'::get()<>getAsBool()');
        }

    })->with(listAlfClassesSubtype(AlfBoolLike::class));
