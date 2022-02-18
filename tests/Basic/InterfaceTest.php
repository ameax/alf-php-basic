<?php

test('interface-dummy',
    function (string $interfaceName) {
        expect(true)->toBeTrue();
    })->with(listAlfInterfaces());
