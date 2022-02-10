<?php

use Alf\AlfBasicTypeScalar;
use Alf\Types\Scalars\AlfInt;

test('AlfInt() isNull()', function () {
    $obj = new AlfInt();
    $obj2 = AlfInt::_AlfInt($obj);
    expect($obj2->isNull())->toBeTrue();
});

test('AlfInt()=0', function () {
    $obj = new AlfInt();
    expect($obj->get())->toBe(0);
});

test('AlfInt(5)=5', function () {
    $obj = new AlfInt(5);
    expect($obj->get())->toBe(5);
    expect($obj->get())->not->toBe(0);
});


test('AlfInt(5)->set(null) isNull()', function () {
    $obj = new AlfInt(5);
    $obj->set(null);
    expect($obj->isNull())->toBeTrue();
});

test('AlfInt(5)->set(0)=0', function () {
    $obj = new AlfInt(5);
    $obj->set(0);
    expect($obj->get())->toBe(0);
});

test('AlfInt(0)->set(5)=5', function () {
    $obj = new AlfInt(0);
    $obj->set(5);
    expect($obj->get())->toBe(5);
    expect($obj->get())->not->toBe(0);
});

test('AlfInt(0)->set(AlfInt())=0', function () {
    $obj = new AlfInt(0);
    $obj2 = new AlfInt();
    $obj->set($obj2);
    expect($obj->get())->toBe(0);
});

test('AlfInt(0)->set(AlfInt(5))=5', function () {
    $obj = new AlfInt(0);
    $obj2 = new AlfInt(5);
    $obj->set($obj2);
    expect($obj->get())->toBe(5);
    expect($obj->get())->not->toBe(0);
});

test('AlfInt->getParentClass()', function () {
    $obj = new AlfInt();
    expect($obj->getParentClass())->toBe(AlfBasicTypeScalar::class);
});
