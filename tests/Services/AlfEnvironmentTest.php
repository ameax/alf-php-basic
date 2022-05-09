<?php

declare(strict_types = 1);

use Alf\Exceptions\AlfExceptionRuntime;
use Alf\Services\AlfEnvironment;
use Alf\Types\Scalars\AlfString;

test('default values',
    function () : void {

        // -
        AlfEnvironment::_()->setInstanceObjectName();

        // -
        $this->assertSame('.', (string)AlfEnvironment::_()->refHumanNumbersDecimalSeparator(),
                          '"human numbers  decimals" is not a dot!');
        $this->assertSame(',', (string)AlfEnvironment::_()->refHumanNumbersThousandsSeparator(),
                          '"human numbers thousands" is not a comma!');
        $this->assertSame('yes', (string)AlfEnvironment::_()->refHumanTextYes(),
                          '"human text yes" is not "yes"!');
        $this->assertSame('no', (string)AlfEnvironment::_()->refHumanTextNo(),
                          '"human text yes" is not "no"!');
        $this->assertSame('true', (string)AlfEnvironment::_()->refHumanTextTrue(),
                          '"human text true" is not "true"!');
        $this->assertSame('false', (string)AlfEnvironment::_()->refHumanTextFalse(),
                          '"human text true" is not "false"!');
        $this->assertSame('empty', (string)AlfEnvironment::_()->refHumanTextEmpty(),
                          '"human text true" is not "empty"!');

    });

test('invalid instance name',
    function () : void {

        AlfEnvironment::_()->setInstanceObjectName('dummyDontExists');
        AlfEnvironment::_();
        $this->assertTrue(true);

    })->throws(AlfExceptionRuntime::class);

test('instance name is not a kind of AlfEnvironment',
    function () : void {

        AlfEnvironment::_()->setInstanceObjectName(AlfString::class);
        AlfEnvironment::_();
        $this->assertTrue(true);

    })->throws(AlfExceptionRuntime::class);

test('use own child of AlfEnvironment',
    function () : void {

        AlfEnvironment::_()->setInstanceObjectName(AlfEnvironmentOwnTest::class);
        $this->assertSame('ß', (string)AlfEnvironment::_()->refHumanNumbersDecimalSeparator(),
                          '"human numbers  decimals" is not a "ß" on AlfEnvironment!');
        $this->assertSame('ß', (string)AlfEnvironmentOwnTest::_()->refHumanNumbersDecimalSeparator(),
                          '"human numbers  decimals" is not a "ß" on AlfEnvironmentOwnTest!');

        // -
        AlfEnvironment::_()->setInstanceObjectName();
        $this->assertSame('.', (string)AlfEnvironment::_()->refHumanNumbersDecimalSeparator(),
                          '"human numbers  decimals" is not a dot on AlfEnvironment!');

    });

test('change default values',
    function () : void {

        // -
        AlfEnvironment::_()->setInstanceObjectName();

        // -
        $this->assertSame('.', (string)AlfEnvironment::_()->refHumanNumbersDecimalSeparator(),
                          '(1) "human numbers  decimals" is not a dot!');

        // -
        AlfEnvironment::_()->refHumanNumbersDecimalSeparator()->setFromString('x');
        $this->assertSame('x', (string)AlfEnvironment::_()->refHumanNumbersDecimalSeparator(),
                          '(2) "human numbers  decimals" is not a "x"!');

        // -
        AlfEnvironment::_()->reInit();
        $this->assertSame('.', (string)AlfEnvironment::_()->refHumanNumbersDecimalSeparator(),
                          '(3) "human numbers  decimals" is not a dot!');

        // - back to the roots!
        AlfEnvironment::_()->setInstanceObjectName();

    });
