<?php

declare(strict_types = 1);

use Alf\AlfBasicSingleton;

test('class must be a instance of AlfBasicSingleton',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflection = new ReflectionClass($className);
        $isAlfBasicSingleton = $reflection->isSubclassOf(AlfBasicSingleton::class) || ($className === AlfBasicSingleton::class);
        expect($isAlfBasicSingleton)->toBeTrue();

    })->with(listAlfSingletons());

test('exception if clone',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        if ($reflectionClass->isAbstract()) {
            throw new RuntimeException('abstract class');
            expect(true)->toBeTrue();
            return;
        }

        $fullClassName = $reflectionClass->getName();
        $inst = AlfBasicSingleton::_AlfBasicSingleton($fullClassName::_());
        clone $inst;

    })->with(listAlfSingletons())->throws(RuntimeException::class);

test('exception if serialize',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        if ($reflectionClass->isAbstract()) {
            throw new RuntimeException('abstract class');
            expect(true)->toBeTrue();
            return;
        }

        $fullClassName = $reflectionClass->getName();
        $inst = AlfBasicSingleton::_AlfBasicSingleton($fullClassName::_());
        serialize($inst);

    })->with(listAlfSingletons())->throws(RuntimeException::class);

test('exception if call __wakeup()',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        if ($reflectionClass->isAbstract()) {
            throw new RuntimeException('abstract class');
            expect(true)->toBeTrue();
            return;
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
            expect(true)->toBeTrue();
            return;
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
            expect(true)->toBeTrue();
            return;
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
            expect(true)->toBeTrue();
            return;
        }

        $fullClassName = $reflectionClass->getName();
        $inst = AlfBasicSingleton::_AlfBasicSingleton($fullClassName::_());
        $inst->__unserialize([]);

    })->with(listAlfSingletons())->throws(RuntimeException::class);
