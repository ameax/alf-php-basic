<?php

use Alf\AlfBasicClass;

test('class must be a instance of AlfBasicClass',
    /** @throws ReflectionException */
    function (string $className) {

        $reflectionClass = new ReflectionClass($className);

        // -
        $isAlfBasicClass = $reflectionClass->isSubclassOf(AlfBasicClass::class) || ($className === AlfBasicClass::class);
        expect($isAlfBasicClass)->toBeTrue();

    })->with(listAlfClasses());
