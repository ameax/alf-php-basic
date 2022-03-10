<?php

declare(strict_types = 1);

test('interface has a trait with same name',
    function (string $interfaceName) : void {

        $needTraitName = $interfaceName.'Trait';
        expect(trait_exists($needTraitName))->toBeTrue();

    })->with(listAlfInterfaces());
