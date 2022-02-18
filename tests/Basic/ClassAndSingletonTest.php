<?php

test('class-singleton-dummy',
    function (string $className) {
        expect(true)->toBeTrue();
    })->with(listAlfClassesAndSingletons());
