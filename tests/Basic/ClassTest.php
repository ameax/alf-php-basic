<?php

use Alf\AlfBasicClass;

test('class must be a instance of AlfBasicClass',
    /** @throws ReflectionException */
    function (string $className) {
        $reflection = new ReflectionClass($className);
        $isAlfBasicClass = $reflection->isSubclassOf(AlfBasicClass::class) || ($className === AlfBasicClass::class);
        expect($isAlfBasicClass)->toBeTrue();
    })->with(listAlfClasses());
