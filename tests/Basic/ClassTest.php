<?php

use Alf\AlfBasicClass;
use Alf\Interfaces\Values\AlfNullOrEmptyWork;
use Alf\Types\Scalars\AlfInt;

test('class must be a instance of AlfBasicClass',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);

        // -
        $this->assertTrue($reflectionClass->isSubclassOf(AlfBasicClass::class) || ($className === AlfBasicClass::class));

        // -
        if (!$reflectionClass->isAbstract()) {
            $fullClassName = $reflectionClass->getName();
            $inst = AlfBasicClass::_AlfBasicClass(new $fullClassName());
            $parents = $inst->listPhpParentClasses();

            $this->assertArrayHasKey(AlfBasicClass::class, $parents);
        }

    })->with(listAlfClasses());

test('interface AlfNullOrEmpty',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();

        // -
        if ($reflectionClass->isAbstract()) {
            expect(true)->toBeTrue();
            return;
        }

        if (!$reflectionClass->isSubclassOf(AlfNullOrEmptyWork::class)) {
            expect(true)->toBeTrue();
            return;
        }

        // -
        $inst = new $fullClassName();
        $this->assertTrue($inst->isNull(),
                          '(1a) ->isNull()');
        $this->assertFalse($inst->isEmpty(),
                           '(1a) ->isEmpty()');
        $this->assertTrue($inst->isNullOrEmpty(),
                          '(1a) ->isNullOrEmpty()');

        $inst2 = clone $inst;
        $this->assertTrue($inst2->isNull(),
                          '(1b) ->isNull()');
        $this->assertFalse($inst2->isEmpty(),
                           '(1b) ->isEmpty()');
        $this->assertTrue($inst2->isNullOrEmpty(),
                          '(1b) ->isNullOrEmpty()');

        // -
        $inst->setToEmpty();
        $this->assertFalse($inst->isNull(),
                           '(2a) ->isNull()');
        $this->assertTrue($inst->isEmpty(),
                          '(2a) ->isEmpty()');
        $this->assertTrue($inst->isNullOrEmpty(),
                          '(2a) ->isNullOrEmpty()');
        $inst2 = clone $inst;
        $this->assertFalse($inst2->isNull(),
                           '(2b) ->isNull()');
        $this->assertTrue($inst2->isEmpty(),
                          '(2b) ->isEmpty()');
        $this->assertTrue($inst2->isNullOrEmpty(),
                          '(2b) ->isNullOrEmpty()');

        // -
        $inst->setToNull();
        $this->assertTrue($inst->isNull(),
                          '(3a) ->isNull()');
        $this->assertFalse($inst->isEmpty(),
                           '(3a) ->isEmpty()');
        $this->assertTrue($inst->isNullOrEmpty(),
                          '(3a) ->isNullOrEmpty()');

        $inst2 = clone $inst;
        $this->assertTrue($inst2->isNull(),
                          '(3b) ->isNull()');
        $this->assertFalse($inst2->isEmpty(),
                           '(3b) ->isEmpty()');
        $this->assertTrue($inst2->isNullOrEmpty(),
                          '(3b) ->isNullOrEmpty()');

    })->with(listAlfClasses());

test('AlfInt',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();
        $shortName = $reflectionClass->getShortName();

        // -
        if ($reflectionClass->isAbstract()) {
            expect(true)->toBeTrue();
            return;
        }

        if (!$reflectionClass->isSubclassOf(AlfInt::class)) {
            expect(true)->toBeTrue();
            return;
        }

        foreach (getIntValues() as $valueRow) {
            $inst = AlfInt::_AlfInt(new $fullClassName($valueRow['set']));

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
            $inst->set($valueRow['set']);
            $this->assertSame($inst->isNull(), $isNull,
                              '(5) '.$shortName.'::set('.($valueRow['set'] ?? '-NULL-').')->isNull()');
            $this->assertSame($inst->isEmpty(), $isEmpty,
                              '(5) '.$shortName.'::set('.($valueRow['set'] ?? '-NULL-').')->isEmpty()');
            $this->assertSame($inst->isNullOrEmpty(), $isNullOrEmpty,
                              '(5) '.$shortName.'::set('.($valueRow['set'] ?? '-NULL-').')->isNullOrEmpty()');

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
        }

    })->with(listAlfClasses());
