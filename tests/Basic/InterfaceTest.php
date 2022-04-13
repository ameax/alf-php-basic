<?php

declare(strict_types = 1);

test('interface has a trait with same name',
    function (string $interfaceName) : void {

        $needTraitName = $interfaceName.'Trait';
        $this->assertTrue(trait_exists($needTraitName));

    })->with(listAlfInterfaces());
