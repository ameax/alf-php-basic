<?php

declare(strict_types = 1);

use Alf\AlfBasicClass;

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

