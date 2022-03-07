<?php

test('parameter-dummy',
    function (string $className) : void {

        expect(true)->toBeTrue();

    })->with(listAlfAll());

