<?php

use Alf\AlfPhp\AlfBasicClass;

test('debugInfo is an array', function () {
    $obj = new AlfBasicClass();
    expect($obj->__debugInfo())->toBeArray();
});
