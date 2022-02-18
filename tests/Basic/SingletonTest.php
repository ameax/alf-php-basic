<?php

use Alf\AlfBasicSingleton;

test('class must be a instance of AlfBasicSingleton',
    /** @throws ReflectionException */
    function (string $className) : void {
        $reflection = new ReflectionClass($className);
        $isAlfBasicSingleton = $reflection->isSubclassOf(AlfBasicSingleton::class) || ($className === AlfBasicSingleton::class);
        expect($isAlfBasicSingleton)->toBeTrue();
    })->with(listAlfSingleton());
