<?php

declare(strict_types = 1);

use Alf\AlfBasicTypeSelect;
use Alf\Interfaces\Values\AlfNullOrEmptyWork;

test('interface AlfNullOrEmpty',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $fullClassName = $reflectionClass->getName();

        // -
        $inst = new $fullClassName();
        $this->assertTrue($inst->isNull(),
                          '(1a) ->isNull()');
        $this->assertFalse($inst->isEmpty(),
                           '(1a) ->isEmpty()');
        $this->assertTrue($inst->isNullOrEmpty(),
                          '(1a) ->isNullOrEmpty()');
        $this->assertTrue($inst->isEmptyOrNull(),
                          '(1a) ->isEmptyOrNull()');

        $inst2 = clone $inst;
        $this->assertTrue($inst2->isNull(),
                          '(1b) ->isNull()');
        $this->assertFalse($inst2->isEmpty(),
                           '(1b) ->isEmpty()');
        $this->assertTrue($inst2->isNullOrEmpty(),
                          '(1b) ->isNullOrEmpty()');
        $this->assertTrue($inst2->isEmptyOrNull(),
                          '(1b) ->isEmptyOrNull()');

        // -
        $inst->setToEmpty();
        $this->assertFalse($inst->isNull(),
                           '(2a) ->isNull()');
        $this->assertTrue($inst->isEmpty(),
                          '(2a) ->isEmpty()');
        $this->assertTrue($inst->isNullOrEmpty(),
                          '(2a) ->isNullOrEmpty()');
        $this->assertTrue($inst->isEmptyOrNull(),
                          '(2a) ->isEmptyOrNull()');
        $inst2 = clone $inst;
        $this->assertFalse($inst2->isNull(),
                           '(2b) ->isNull()');
        $this->assertTrue($inst2->isEmpty(),
                          '(2b) ->isEmpty()');
        $this->assertTrue($inst2->isNullOrEmpty(),
                          '(2b) ->isNullOrEmpty()');
        $this->assertTrue($inst2->isEmptyOrNull(),
                          '(2b) ->isEmptyOrNull()');

        // -
        $inst->setToNull();
        $this->assertTrue($inst->isNull(),
                          '(3a) ->isNull()');
        $this->assertFalse($inst->isEmpty(),
                           '(3a) ->isEmpty()');
        $this->assertTrue($inst->isNullOrEmpty(),
                          '(3a) ->isNullOrEmpty()');
        $this->assertTrue($inst->isEmptyOrNull(),
                          '(3a) ->isEmptyOrNull()');

        $inst2 = clone $inst;
        $this->assertTrue($inst2->isNull(),
                          '(3b) ->isNull()');
        $this->assertFalse($inst2->isEmpty(),
                           '(3b) ->isEmpty()');
        $this->assertTrue($inst2->isNullOrEmpty(),
                          '(3b) ->isNullOrEmpty()');
        $this->assertTrue($inst2->isEmptyOrNull(),
                          '(3b) ->isEmptyOrNull()');

        // -
        $inst->setToEmpty();
        $this->assertFalse($inst->isNull(),
                           '(4a) ->isNull()');
        $this->assertTrue($inst->isEmpty(),
                          '(4a) ->isEmpty()');
        $this->assertTrue($inst->isNullOrEmpty(),
                          '(4a) ->isNullOrEmpty()');
        $this->assertTrue($inst->isEmptyOrNull(),
                          '(4a) ->isEmptyOrNull()');
        $inst2 = clone $inst;
        $this->assertFalse($inst2->isNull(),
                           '(4b) ->isNull()');
        $this->assertTrue($inst2->isEmpty(),
                          '(4b) ->isEmpty()');
        $this->assertTrue($inst2->isNullOrEmpty(),
                          '(4b) ->isNullOrEmpty()');
        $this->assertTrue($inst2->isEmptyOrNull(),
                          '(4b) ->isEmptyOrNull()');

        // -
        $inst->setToNull();
        $this->assertTrue($inst->isNull(),
                          '(5a) ->isNull()');
        $this->assertFalse($inst->isEmpty(),
                           '(5a) ->isEmpty()');
        $this->assertTrue($inst->isNullOrEmpty(),
                          '(5a) ->isNullOrEmpty()');
        $this->assertTrue($inst->isEmptyOrNull(),
                          '(5a) ->isEmptyOrNull()');

        $inst2 = clone $inst;
        $this->assertTrue($inst2->isNull(),
                          '(5b) ->isNull()');
        $this->assertFalse($inst2->isEmpty(),
                           '(5b) ->isEmpty()');
        $this->assertTrue($inst2->isNullOrEmpty(),
                          '(5b) ->isNullOrEmpty()');
        $this->assertTrue($inst2->isEmptyOrNull(),
                          '(5b) ->isEmptyOrNull()');

        // -
        $inst->setToEmptyIfNull();
        $this->assertFalse($inst->isNull(),
                           '(6a) ->isNull()');
        $this->assertTrue($inst->isEmpty(),
                          '(6a) ->isEmpty()');
        $this->assertTrue($inst->isNullOrEmpty(),
                          '(6a) ->isNullOrEmpty()');
        $this->assertTrue($inst->isEmptyOrNull(),
                          '(6a) ->isEmptyOrNull()');

        $inst2 = clone $inst;
        $this->assertFalse($inst2->isNull(),
                           '(6b) ->isNull()');
        $this->assertTrue($inst2->isEmpty(),
                          '(6b) ->isEmpty()');
        $this->assertTrue($inst2->isNullOrEmpty(),
                          '(6b) ->isNullOrEmpty()');
        $this->assertTrue($inst2->isEmptyOrNull(),
                          '(6b) ->isEmptyOrNull()');

        // -
        if ($reflectionClass->isSubclassOf(AlfBasicTypeSelect::class)) {
            $this->assertSame($inst2->getValue() ?? '', $inst2->getEmptyValue(),
                              '(7ts) getValue("'.($inst2->getValue() ?? '-NULL-').'") <> getEmptyValue("'.($inst2->getEmptyValue() ?? '-NULL_').'"))');
        } else {
            $this->assertSame($inst2->getValue(), $inst2->getEmptyValue(),
                              '(7va) getValue("'.($inst2->getValue() ?? '-NULL-').'") <> getEmptyValue("'.($inst2->getEmptyValue() ?? '-NULL_').'"))');
        }

    })->with(listAlfClassesSubtype(AlfNullOrEmptyWork::class, false, false));
