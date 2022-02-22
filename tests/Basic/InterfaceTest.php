<?php

test('interface has trait',
    function (string $interfaceName) {

        $needTraitName = $interfaceName.'Trait';
        expect(trait_exists($needTraitName))->toBeTrue();

    })->with(listAlfInterfaces());
