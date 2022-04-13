<?php

declare(strict_types = 1);

use Alf\AlfBasicSingleton;
use Alf\Services\AlfProgramming;

test('class must be a instance of AlfBasicSingleton',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflection = new ReflectionClass($className);
        $isAlfBasicSingleton = $reflection->isSubclassOf(AlfBasicSingleton::class) || ($className === AlfBasicSingleton::class);
        $this->assertTrue($isAlfBasicSingleton);

    })->with(listAlfSingletons());

test('exception if clone',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        if ($reflectionClass->isAbstract()) {
            throw new RuntimeException('abstract class');
        }

        $fullClassName = $reflectionClass->getName();
        $inst = AlfBasicSingleton::_AlfBasicSingleton($fullClassName::_());
        $inst2 = clone $inst;
        AlfProgramming::_()->unusedRef($inst2);
        $this->assertTrue(true);

    })->with(listAlfSingletons())->throws(RuntimeException::class);

test('exception if serialize',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        if ($reflectionClass->isAbstract()) {
            throw new RuntimeException('abstract class');
        }

        $fullClassName = $reflectionClass->getName();
        $inst = AlfBasicSingleton::_AlfBasicSingleton($fullClassName::_());
        serialize($inst);
        $this->assertTrue(true);

    })->with(listAlfSingletons())->throws(RuntimeException::class);

test('exception if call __wakeup()',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        if ($reflectionClass->isAbstract()) {
            throw new RuntimeException('abstract class');
        }

        if ($this->hasFailed()) {
            throw new RuntimeException('hasFailed');
        }

        $fullClassName = $reflectionClass->getName();
        $inst = AlfBasicSingleton::_AlfBasicSingleton($fullClassName::_());
        $inst->__wakeup();

    })->with(listAlfSingletons())->throws(RuntimeException::class);

test('exception if call __sleep()',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        if ($reflectionClass->isAbstract()) {
            throw new RuntimeException('abstract class');
        }

        if ($this->hasFailed()) {
            throw new RuntimeException('hasFailed');
        }

        $fullClassName = $reflectionClass->getName();
        $inst = AlfBasicSingleton::_AlfBasicSingleton($fullClassName::_());
        $inst->__sleep();

    })->with(listAlfSingletons())->throws(RuntimeException::class);

test('exception if call __serialize()',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        if ($reflectionClass->isAbstract()) {
            throw new RuntimeException('abstract class');
        }

        if ($this->hasFailed()) {
            throw new RuntimeException('hasFailed');
        }

        $fullClassName = $reflectionClass->getName();
        $inst = AlfBasicSingleton::_AlfBasicSingleton($fullClassName::_());
        $inst->__serialize();

    })->with(listAlfSingletons())->throws(RuntimeException::class);

test('exception if call __unserialize()',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        if ($reflectionClass->isAbstract()) {
            throw new RuntimeException('abstract class');
        }

        if ($this->hasFailed()) {
            throw new RuntimeException('hasFailed');
        }

        $fullClassName = $reflectionClass->getName();
        $inst = AlfBasicSingleton::_AlfBasicSingleton($fullClassName::_());
        $inst->__unserialize([]);

    })->with(listAlfSingletons())->throws(RuntimeException::class);
