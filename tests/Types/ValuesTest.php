<?php

declare(strict_types = 1);

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

    })->with(listAlfClassesSubtype(AlfNullOrEmptyWork::class));
