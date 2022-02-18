<?php

test('parameter-dummy',
    function (string $className) {
        expect(true)->toBeTrue();
    })->with(listAlfAll());

