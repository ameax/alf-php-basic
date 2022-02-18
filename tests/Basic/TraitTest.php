<?php
test('trait-dummy',
    function (string $traitName) {
        expect(true)->toBeTrue();
    })->with(listAlfTraits());
