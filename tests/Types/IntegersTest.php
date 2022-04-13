<?php

declare(strict_types = 1);

use Alf\Interfaces\Integers\AlfIntGet;
use Alf\Interfaces\Integers\AlfIntLike;
use Alf\Interfaces\Integers\AlfIntSet;
use Alf\Interfaces\Integers\AlfIntWork;
use Alf\Types\Scalars\AlfInt;

test('classes extends AlfIntGet and AlfIntSet',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();
        $shortName = $reflectionClass->getShortName();

        $inst = new $fullClassName();
        if (!is_a($inst, AlfIntWork::class)) {
            // autoComplete for phpStorm
            return;
        }

        foreach (getIntValues() as $valueRow) {
            $forSet = $valueRow['set'];
            $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['get'] ?? null);

            // -
            $inst->setFromInt($valueRow['set']);
            $this->assertSame($forGet, $inst->getAsInt(),
                              '(1) '.$shortName.'::setFromInt()<>getAsInt()'
                              .' with set('.($forSet ?? '-NULL-').') and get('.($forGet ?? '-NULL-').')');

            // -
            $inst2 = clone $inst;
            $this->assertSame($inst2->getAsInt(), $inst->getAsInt(),
                              '(2) '.$shortName.'::clone<>org'
                              .' with set('.($forSet ?? '-NULL-').')');
        }

    })->with(listAlfClasses2Subtype(AlfIntGet::class, AlfIntSet::class, false, false));

test('classes extends AlfIntWork',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();
        $shortName = $reflectionClass->getShortName();

        $inst = new $fullClassName();
        if (!is_a($inst, AlfIntWork::class)) {
            // autoComplete for phpStorm
            return;
        }

        foreach (getIntValues() as $valueRow) {
            $forSet = $valueRow['set'];
            $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['get'] ?? null);
            $forAfterAdd5 = ($valueRow[$shortName]['afterAdd5'] ?? $valueRow['afterAdd5'] ?? null);
            $forAfterInc = ($valueRow[$shortName]['afterInc'] ?? $valueRow['afterInc'] ?? null);
            $forAfterSub9 = ($valueRow[$shortName]['afterSub9'] ?? $valueRow['afterSub9'] ?? null);
            $forAfterDec = ($valueRow[$shortName]['afterDec'] ?? $valueRow['afterDec'] ?? null);

            // -
            $inst->setFromInt($valueRow['set']);
            $this->assertSame($forGet, $inst->getAsInt(),
                              '(1) '.$shortName.'::setFromInt()<>getAsInt()'
                              .' with set('.($forSet ?? '-NULL-').') and get('.($forGet ?? '-NULL-').')');

            // -
            $instForAdd5 = clone $inst;
            $instForAdd5->add(5);
            $this->assertSame($instForAdd5->getAsInt(), $forAfterAdd5,
                              '(2) '.$shortName.'('.($forSet ?? '-NULL-').')::add(5) should be '.($forAfterAdd5 ?? '-NULL-')
                              .' but is '.$instForAdd5->getAsInt());

            // -
            $instForInc = clone $inst;
            $instForInc->inc();
            $this->assertSame($instForInc->getAsInt(), $forAfterInc,
                              '(3) '.$shortName.'('.($forSet ?? '-NULL-').')::inc() should be '.($forAfterInc ?? '-NULL-')
                              .' but is '.$instForInc->getAsInt());

            // -
            $instForSub9 = clone $inst;
            $instForSub9->sub(9);
            $this->assertSame($instForSub9->getAsInt(), $forAfterSub9,
                              '(4) '.$shortName.'('.($forSet ?? '-NULL-').')::sub(9) should be '.($forAfterSub9 ?? '-NULL-')
                              .' but is '.$instForSub9->getAsInt());

            // -
            $instForDec = clone $inst;
            $instForDec->dec();
            $this->assertSame($instForDec->getAsInt(), $forAfterDec,
                              '(5) '.$shortName.'('.($forSet ?? '-NULL-').')::dec() should be '.($forAfterDec ?? '-NULL-')
                              .' but is '.$instForDec->getAsInt());
        }

    })->with(listAlfClassesSubtype(AlfIntWork::class, false, false));

test('classes extends AlfIntLike',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();
        $shortName = $reflectionClass->getShortName();

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
            $this->assertTrue($inst->isEmptyOrNull(),
                              '(2) '.$shortName.'::setToNull()->isEmptyOrNull()');

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
            $this->assertTrue($inst->isEmptyOrNull(),
                              '(4) '.$shortName.'::setToNull()->isEmptyOrNull()');

            // -
            $inst->setFromInt($valueRow['set']);
            $this->assertSame($inst->isNull(), $isNull,
                              '(5) '.$shortName.'::setFromInt('.($valueRow['set'] ?? '-NULL-').')->isNull()');
            $this->assertSame($inst->isEmpty(), $isEmpty,
                              '(5) '.$shortName.'::setFromInt('.($valueRow['set'] ?? '-NULL-').')->isEmpty()');
            $this->assertSame($inst->isNullOrEmpty(), $isNullOrEmpty,
                              '(5) '.$shortName.'::setFromInt('.($valueRow['set'] ?? '-NULL-').')->isNullOrEmpty()');
            $this->assertSame($inst->isEmptyOrNull(), $isNullOrEmpty,
                              '(5) '.$shortName.'::setFromInt('.($valueRow['set'] ?? '-NULL-').')->isEmptyOrNull()');

            // -
            $inst2 = clone $inst;
            $this->assertSame($inst2->isNull(), $isNull,
                              '(6) '.$shortName.'::clone('.($valueRow['set'] ?? '-NULL-').')->isNull()');
            $this->assertSame($inst2->isEmpty(), $isEmpty,
                              '(6) '.$shortName.'::clone('.($valueRow['set'] ?? '-NULL-').')->isEmpty()');
            $this->assertSame($inst2->isNullOrEmpty(), $isNullOrEmpty,
                              '(6) '.$shortName.'::clone('.($valueRow['set'] ?? '-NULL-').')->isNullOrEmpty()');
            $this->assertSame($inst2->isEmptyOrNull(), $isNullOrEmpty,
                              '(6) '.$shortName.'::clone('.($valueRow['set'] ?? '-NULL-').')->isEmptyOrNull()');

            // -
            $this->assertSame($inst2->get(), $forGet,
                              '(7) '.$shortName.'::set('.($valueRow['set'] ?? '-NULL-').')->get('.($forGet ?? '-NULL-').')');
            $this->assertSame($inst2->getValue(), $forValue,
                              '(7) '.$shortName.'::set('.($valueRow['set'] ?? '-NULL-').')->getValue('.($forValue ?? '-NULL-').')');

            // -
            $this->assertSame($inst2->get(), $inst2->getAsInt(),
                              '(8) '.$shortName.'::get()<>getAsInt()');

            // -
            $inst->setFromInt(1); // the "ONE" must pass always, or there is no reason for a class.
            $this->assertFalse($inst->isNull(),
                               '(9) '.$shortName.'::setFromInt(1)->isNull()');
            $this->assertFalse($inst->isEmpty(),
                               '(9) '.$shortName.'::setFromInt(1)->isEmpty()');
            $this->assertFalse($inst->isNullOrEmpty(),
                               '(9) '.$shortName.'::setFromInt(1)->isNullOrEmpty()');
            $this->assertFalse($inst->isEmptyOrNull(),
                               '(9) '.$shortName.'::setFromInt(1)->isEmptyOrNull()');

            // -
            $inst->setToEmptyIfNull();
            $this->assertFalse($inst->isNull(),
                               '(10) '.$shortName.'::setFromInt(1)::setToEmptyIfNull()->isNull()');
            $this->assertFalse($inst->isEmpty(),
                               '(10) '.$shortName.'::setFromInt(1)::setToEmptyIfNull()->isEmpty()');
            $this->assertFalse($inst->isNullOrEmpty(),
                               '(10) '.$shortName.'::setFromInt(1)::setToEmptyIfNull()->isNullOrEmpty()');
            $this->assertFalse($inst->isEmptyOrNull(),
                               '(10) '.$shortName.'::setFromInt(1)::setToEmptyIfNull()->isEmptyOrNull()');

            // -
            $inst->setToNull();
            $this->assertTrue($inst->isNull(),
                              '(11) '.$shortName.'::setToNull()->isNull()');
            $this->assertFalse($inst->isEmpty(),
                               '(11) '.$shortName.'::setToNull()->isEmpty()');
            $this->assertTrue($inst->isNullOrEmpty(),
                              '(11) '.$shortName.'::setToNull()->isNullOrEmpty()');
            $this->assertTrue($inst->isEmptyOrNull(),
                              '(11) '.$shortName.'::setToNull()->isEmptyOrNull()');

            // -
            $inst->setToEmptyIfNull();
            $this->assertFalse($inst->isNull(),
                               '(12) '.$shortName.'::setFromInt(1)::setToEmptyIfNull()->isNull()');
            $this->assertTrue($inst->isEmpty(),
                              '(12) '.$shortName.'::setFromInt(1)::setToEmptyIfNull()->isEmpty()');
            $this->assertTrue($inst->isNullOrEmpty(),
                              '(12) '.$shortName.'::setFromInt(1)::setToEmptyIfNull()->isNullOrEmpty()');
            $this->assertTrue($inst->isEmptyOrNull(),
                              '(12) '.$shortName.'::setFromInt(1)::setToEmptyIfNull()->isEmptyOrNull()');
        }

    })->with(listAlfClassesSubtype(AlfIntLike::class, false, false));
