<?php

declare(strict_types = 1);

use Alf\AlfBasicTypeSelect;
use Alf\Enums\AlfCharEncodings;
use Alf\Interfaces\Strings\AlfCharGet;
use Alf\Interfaces\Strings\AlfCharRead;
use Alf\Interfaces\Strings\AlfCharSet;
use Alf\Interfaces\Strings\AlfCharWork;
use Alf\Interfaces\Strings\AlfStringGet;
use Alf\Interfaces\Strings\AlfStringRead;
use Alf\Interfaces\Strings\AlfStringSet;
use Alf\Interfaces\Strings\AlfStringWork;
use Alf\Manipulator\AlfStringManipulator;
use Alf\Types\Scalars\AlfCharW;
use Alf\Types\Scalars\AlfString;
use Alf\Types\Scalars\AlfStringW;

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

test('classes extends AlfCharGet and AlfCharSet',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();
        $shortName = $reflectionClass->getShortName();

        $inst = new $fullClassName();
        if ((!is_a($inst, AlfCharGet::class)) || (!is_a($inst, AlfCharSet::class))) {
            // autoComplete for phpStorm
            return;
        }

        foreach (getStringValues() as $valueRow) {
            $isNotASCII = ($valueRow[$shortName]['isNotASCII'] ?? $valueRow['isNotASCII'] ?? null);
            $forSet = $valueRow['set'];

            if (is_a($inst, AlfBasicTypeSelect::class)) {
                $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['AlfBasicTypeSelect']['get'] ?? $valueRow['get'] ?? null);
            } else {
                $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['get'] ?? null);
            }

            // -
            $inst->setFromString($valueRow['set']);
            if ($isNotASCII) {
                $this->assertTrue(true);
            } else {
                $this->assertSame($forGet, $inst->getAsString(),
                                  '(1) '.$shortName.'::setFromString()<>getAsString()'
                                  .' with set('.($forSet ?? '-NULL-').') and get('.($forGet ?? '-NULL-').') on "'.($inst->getAsString() ?? '-NULL-').'"');
            }

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

    })->with(listAlfClasses2Subtype(AlfCharGet::class, AlfCharSet::class));

test('classes extends AlfCharRead and AlfCharSet',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();
        $shortName = $reflectionClass->getShortName();

        $inst = new $fullClassName();
        if ((!is_a($inst, AlfCharRead::class)) || (!is_a($inst, AlfCharSet::class))) {
            // autoComplete for phpStorm
            return;
        }

        foreach (getStringValues() as $valueRow) {
            $isNotASCII = ($valueRow[$shortName]['isNotASCII'] ?? $valueRow['isNotASCII'] ?? null);
            $forSet = $valueRow['set'];

            if (is_a($inst, AlfBasicTypeSelect::class)) {
                $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['AlfBasicTypeSelect']['get'] ?? $valueRow['get'] ?? null);
            } else {
                $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['get'] ?? null);
            }

            // -
            $forGetStringLength = ($valueRow[$shortName]['getStringLength'] ?? $valueRow['getStringLength'] ?? null);
            $forGetStringByteSize = ($valueRow[$shortName]['getStringByteSize'] ?? $valueRow['getStringByteSize'] ?? null);

            // -
            $inst->setFromString($valueRow['set']);
            if ($isNotASCII) {
                $this->assertTrue(true);
            } else {
                $this->assertSame($forGet, $inst->getAsString(),
                                  '(1) '.$shortName.'::setFromString()<>getAsString()'
                                  .' with set('.($forSet ?? '-NULL-').') and get('.($forGet ?? '-NULL-').') on "'.($inst->getAsString() ?? '-NULL-').'"');
            }

            // -
            $instForGetter = clone $inst;
            $this->assertSame($instForGetter->getStringLength(), $forGetStringLength,
                              '(2a) '.$shortName.'('.($forSet ?? '-NULL-').')::getStringLength()='.$instForGetter->getStringLength().'<>'.($forGetStringLength ?? '-NULL-'));
            $this->assertSame($instForGetter->getStringByteSize(), $forGetStringByteSize,
                              '(2b) '.$shortName.'('.($forSet ?? '-NULL-').')::getStringByteSize()='.$instForGetter->getStringByteSize().'<>'.($forGetStringByteSize ?? '-NULL-'));
            $counted = count($instForGetter);
            $this->assertSame($counted, $forGetStringByteSize,
                              '(2c) '.$shortName.'('.($forSet ?? '-NULL-').')::count()='.$counted.'<>'.($forGetStringByteSize ?? '-NULL-'));
        }

    })->with(listAlfClasses2Subtype(AlfCharRead::class, AlfCharSet::class));

test('classes extends AlfCharWork',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();
        $shortName = $reflectionClass->getShortName();

        $inst = new $fullClassName();
        if (!is_a($inst, AlfCharWork::class)) {
            // autoComplete for phpStorm
            return;
        }

        foreach (getStringValues() as $valueRow) {
            $forSet = $valueRow['set'];
            $forGet = ($valueRow[$shortName]['get'] ?? $valueRow['get'] ?? null);
            $isNotASCII = ($valueRow[$shortName]['isNotASCII'] ?? $valueRow['isNotASCII'] ?? null);

            $forAfterUpperCase = ($valueRow[$shortName]['afterUpperCase'] ?? $valueRow['afterUpperCase'] ?? null);
            $forAfterLowerCase = ($valueRow[$shortName]['afterLowerCase'] ?? $valueRow['afterLowerCase'] ?? null);

            // -
            $inst->setFromString($valueRow['set']);

            // -
            if ($isNotASCII) {
                $this->assertTrue(true);
            } else {
                $this->assertSame($forGet, $inst->getAsString(),
                                  '(1) '.$shortName.'::setFromString()<>getAsString()'
                                  .' with set('.($forSet ?? '-NULL-').') and get('.($forGet ?? '-NULL-').') = "'.($inst->getAsString() ?? '-NULL-').'"');

                // -
                $instForAfterUpperCase = clone $inst;
                $instForAfterUpperCase->toUpperCase();
                $this->assertSame($instForAfterUpperCase->getAsString(), $forAfterUpperCase,
                                  '(2) '.$shortName.'('.($forSet ?? '-NULL-').')::toUpperCase()="'.$instForAfterUpperCase->getAsString().'"<>'.($forAfterUpperCase ?? '-NULL-'));

                // -
                $instForAfterLowerCase = clone $inst;
                $instForAfterLowerCase->toLowerCase();
                $this->assertSame($instForAfterLowerCase->getAsString(), $forAfterLowerCase,
                                  '(3) '.$shortName.'('.($forSet ?? '-NULL-').')::toLowerCase()="'.$instForAfterLowerCase->getAsString().'"<>'.($forAfterLowerCase ?? '-NULL-'));
            }

        }

    })->with(listAlfClassesSubtype(AlfCharWork::class));

test('Alf[String|Char]W charset converter',
    function () : void {

        $tryRuns = [
            'sA' => new AlfStringW('äöüß'),
            'sB' => new AlfStringW('É'),
            'sC' => new AlfStringW(''),
            'sD' => new AlfStringW(),
            'cA' => new AlfCharW('ä'),
            'cB' => new AlfCharW('É'),
            'cC' => new AlfCharW(''),
            'cD' => new AlfCharW(),
        ];

        foreach ($tryRuns as $identify => $testString) {
            $tryString = $testString->getAsString();
            $storeCharset = $testString->refCharset()->getValue();
            $tryCharset = $testString->refCharset()->getAsString();

            $isNullOrEmpty = $testString->isNullOrEmpty();

            $testString->convertToCharset(AlfCharEncodings::ISO_8859_15);
            if (!$isNullOrEmpty) {
                $this->assertNotSame($tryString, $testString->getAsString(),
                                     '('.$identify.'::1a) new string should not be equal old string');
                $this->assertNotSame($tryCharset, $testString->refCharset()->getAsString(),
                                     '('.$identify.'::1b) new charset should not be equal old charset');
            }

            $testString->convertToCharset($storeCharset);
            $this->assertSame($tryString, $testString->getAsString(),
                              '('.$identify.'::2a) new string should be equal old string');
            $this->assertSame($tryCharset, $testString->refCharset()->getAsString(),
                              '('.$identify.'::2b) new charset should be equal old charset');

            // -
            $testString->convertToCharset(AlfCharEncodings::ASCII);
            if (!$isNullOrEmpty) {
                $this->assertTrue($testString->isNull(),
                                  '('.$identify.'::3) testString should be NULL');
            }

            // -
            $testString->setToNull();
            $testString->convertToCharset($storeCharset);
            $this->assertTrue($testString->isNull(),
                              '('.$identify.'::4) testString should be NULL');
            $this->assertSame($tryCharset, $testString->refCharset()->getAsString(),
                              '('.$identify.'::5) new charset should be equal old charset');
        }

    });

test('AlfStringManipulator invalid charsets',
    function () : void {

        $manipulator = new AlfStringManipulator();
        $tryString = $manipulator->convertStringToEncoding('abc', 'XYZ');
        $this->assertNull($tryString);

    });
