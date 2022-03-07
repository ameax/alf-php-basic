<?php

use Alf\Services\AlfProgramming;
use Alf\Types\Scalars\AlfInt;

test('unused',
    function () : void {
        $firstUnUsed = 5;
        $secondUnUsed = 10;
        expect(AlfProgramming::_()->unused($firstUnUsed, $secondUnUsed))->toBe(5);
    });

test('unusedRef',
    function () : void {
        $firstUnUsed = null;
        expect(AlfProgramming::_()->unusedRef($firstUnUsed))->toBe($firstUnUsed);
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

test('valueToInt should a number',
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
