<?php

declare(strict_types = 1);

use Alf\Services\AlfProgramming;
use Alf\Types\Scalars\AlfBool;
use Alf\Types\Scalars\AlfChar;
use Alf\Types\Scalars\AlfInt;
use Alf\Types\Scalars\AlfString;

test('unused',
    function () : void {

        $firstUnUsed = 5;
        $secondUnUsed = 10;
        $this->assertSame(AlfProgramming::_()->unused($firstUnUsed, $secondUnUsed), 5);

    });

test('unusedRef',
    function () : void {

        $firstUnUsed = null;
        $this->assertSame(AlfProgramming::_()->unusedRef($firstUnUsed), $firstUnUsed);

    });

test('valueIsNull',
    function () {

        $this->assertTrue(AlfProgramming::_()->valueIsNull(null),
                          '(1a) valueIsNull(null)');
        $this->assertTrue(AlfProgramming::_()->valueIsNull(null, false),
                          '(1b) valueIsNull(null)');

        $this->assertFalse(AlfProgramming::_()->valueIsNull(false),
                           '(2a) valueIsNull(false)');
        $this->assertFalse(AlfProgramming::_()->valueIsNull(false, false),
                           '(2b) valueIsNull(false)');

        $this->assertFalse(AlfProgramming::_()->valueIsNull(0),
                           '(3a) valueIsNull(false)');
        $this->assertFalse(AlfProgramming::_()->valueIsNull(0, false),
                           '(3b) valueIsNull(false)');

        $obj = new AlfInt();
        $this->assertTrue(AlfProgramming::_()->valueIsNull($obj),
                          '(4a) valueIsNull(AlfInt())');
        $this->assertFalse(AlfProgramming::_()->valueIsNull($obj, false),
                           '(4b) valueIsNull(AlfInt())');

        $objDummyHasNot = new AlfProgrammingTestDummyForNullHasNoFunction();
        $this->assertFalse(AlfProgramming::_()->valueIsNull($objDummyHasNot),
                           '(5a) valueIsNull(-HasNoFunc-)');
        $this->assertFalse(AlfProgramming::_()->valueIsNull($objDummyHasNot, false),
                           '(5b) valueIsNull(-HasNoFunc-)');

        $objDummyHasAndIs = new AlfProgrammingTestDummyForNullIsNull();
        $this->assertTrue(AlfProgramming::_()->valueIsNull($objDummyHasAndIs),
                          '(6a) valueIsNull(-HasFuncIsNull-)');
        $this->assertFalse(AlfProgramming::_()->valueIsNull($objDummyHasAndIs, false),
                           '(6b) valueIsNull(-HasFuncIsNull-)');

        $objDummyHasAndIsNot = new AlfProgrammingTestDummyForNullIsNotNull();
        $this->assertFalse(AlfProgramming::_()->valueIsNull($objDummyHasAndIsNot),
                           '(6a) valueIsNull(-HasFuncIsNotNull-)');
        $this->assertFalse(AlfProgramming::_()->valueIsNull($objDummyHasAndIsNot, false),
                           '(6b) valueIsNull(-HasFuncIsNotNull-)');

    });

test('valueToInt should be null',
    function () : void {

        $this->assertNull(AlfProgramming::_()->valueToInt(null),
                          '(1) valueToInt(null)');

        $alfInt = new AlfInt();
        $this->assertNull(AlfProgramming::_()->valueToInt($alfInt),
                          '(2) AlfInt(null)');

        $alfInt->setToNull();
        $this->assertNull(AlfProgramming::_()->valueToInt($alfInt),
                          '(3) AlfInt()->setToNull()');

    });

test('valueToInt should be a number',
    function () : void {

        $this->assertSame(5, AlfProgramming::_()->valueToInt(5),
                          '(1) valueToInt(5)');

        $alfInt = new AlfInt(10);
        $this->assertSame(10, AlfProgramming::_()->valueToInt($alfInt),
                          '(1) AlfInt(10)');

        $alfInt->set(15);
        $this->assertSame(15, AlfProgramming::_()->valueToInt($alfInt),
                          '(1) AlfInt()->set(15)');

    });

test('valueToBool should be null',
    function () : void {

        $this->assertNull(AlfProgramming::_()->valueToBool(null),
                          '(1) valueToBool(null)');

        $alfBool = new AlfBool();
        $this->assertNull(AlfProgramming::_()->valueToBool($alfBool),
                          '(2) AlfBool(null)');

        $alfBool->setToNull();
        $this->assertNull(AlfProgramming::_()->valueToBool($alfBool),
                          '(3) AlfBool()->setToNull()');

    });

test('valueToBool should be a boolean',
    function () : void {

        $this->assertTrue(AlfProgramming::_()->valueToBool(true), '(1a) valueToBool(true)');
        $this->assertFalse(AlfProgramming::_()->valueToBool(false), '(1b) valueToBool(false)');

        $alfBool = new AlfBool(true);
        $this->assertTrue(AlfProgramming::_()->valueToBool($alfBool), '(1) AlfBool(true)');

        $alfBool->set(false);
        $this->assertFalse(AlfProgramming::_()->valueToBool($alfBool), '(1) AlfBool()->set(false)');

    });

test('valueToString should be null',
    function () : void {

        $this->assertNull(AlfProgramming::_()->valueToString(null),
                          '(1) valueToString(null)');

        $alfString = new AlfString();
        $this->assertNull(AlfProgramming::_()->valueToString($alfString),
                          '(2) AlfString(null)');

        $alfChar = new AlfChar();
        $this->assertNull(AlfProgramming::_()->valueToString($alfChar),
                          '(3) AlfChar(null)');

        $alfString->setToNull();
        $this->assertNull(AlfProgramming::_()->valueToString($alfString),
                          '(4) AlfString()->setToNull()');

    });

test('valueToString should be a string',
    function () : void {

        $this->assertSame(AlfProgramming::_()->valueToString('A'), 'A',
                          '(1) valueToString(A)');

        $alfString = new AlfString('B');
        $this->assertSame(AlfProgramming::_()->valueToString($alfString), $alfString->getAsString(),
                          '(2) valueToString(AlfString(B))');

        $alfChar = new AlfChar('C');
        $this->assertSame(AlfProgramming::_()->valueToString($alfChar), $alfChar->getAsString(),
                          '(2) valueToString(AlfChar(C))');

        $dummy = new AlfProgrammingTestDummyForStringable();
        $this->assertSame(AlfProgramming::_()->valueToString($dummy), 'X',
                          '(3) valueToString(AlfProgrammingTestDummyForStringable())');

    });
