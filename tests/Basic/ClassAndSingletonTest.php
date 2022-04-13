<?php

declare(strict_types = 1);

use Alf\AlfBasicClass;
use Alf\AlfBasicSingleton;
use Alf\Attributes\AlfAttrAutoComplete;

test('autocomplete function',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);

        // -
        $className = $reflectionClass->getShortName();
        $needFunctionName = '_'.$className;

        // Hab ich die Methode?
        $foundMethod = null;
        foreach ($reflectionClass->getMethods() as $reflectionMethod) {
            if ($reflectionMethod->getShortName() !== $needFunctionName) {
                continue;
            }
            $foundMethod = $reflectionMethod;
            break;
        }

        // -
        $this->assertNotNull($foundMethod, 'method '.$className.'::'.$needFunctionName.'() not found!');
        if ($this->hasFailed()) {
            return;
        }

        // -
        $this->assertTrue($foundMethod->isStatic(), 'method '.$className.'::'.$needFunctionName.'() is not static!');
        $this->assertTrue($foundMethod->isPublic(), 'method '.$className.'::'.$needFunctionName.'() is not public!');
        $this->assertTrue($foundMethod->isFinal() || $reflectionClass->isFinal(), 'method '.$className.'::'.$needFunctionName.'() is not final!');
        $this->assertSame(count($foundMethod->getParameters()), 1, 'the method '.$className.'::'.$needFunctionName.'() must have only 1 parameter!');
        if ($this->hasFailed()) {
            return;
        }

        // -
        $parameterOne = $foundMethod->getParameters()[0];
        $parameterName = $parameterOne->getName();
        $this->assertSame($parameterName, 'obj', 'the first parameter at method '.$className.'::'.$needFunctionName.'() needs to habe the name "$obj"!');
        $parameterType = $parameterOne->getType();
        $this->assertNull($parameterType, 'the first parameter at method '.$className.'::'.$needFunctionName.'() is not allowed to hav a type!');

        // -
        $returnType = $foundMethod->getReturnType();
        $this->assertSame($returnType?->getName(), $reflectionClass->getName(), 'method '.$className.'::'.$needFunctionName.'() needs the return type '.$className.'!');

        // -
        $hasAttributeAlfAutoCompleteCall = false;
        foreach ($foundMethod->getAttributes() as $attributeObject) {
            if ($attributeObject->getName() !== AlfAttrAutoComplete::class) {
                continue;
            }

            // -
            $hasAttributeAlfAutoCompleteCall = true;
            break;
        }
        $this->assertTrue($hasAttributeAlfAutoCompleteCall, 'method '.$className.'::'.$needFunctionName.'() needs #[AlfAttrAutoComplete]');

        // -
        $this->assertTrue(str_contains($foundMethod->getDocComment(), '@AlfAttrAutoComplete '), 'method '.$needFunctionName.' needs /** @AlfAttrAutoComplete */');

        // - Call It
        if (!$reflectionClass->isAbstract()) {
            $fullClassName = $reflectionClass->getName();
            if ($reflectionClass->isSubclassOf(AlfBasicSingleton::class)) {
                $phpCode = $fullClassName.'::_'.$className.'('.$fullClassName.'::_());';
            } else {
                $phpCode = $fullClassName.'::_'.$className.'(new '.$fullClassName.'());';
            }
            eval($phpCode);
        }

        // - finally
        expect($foundMethod)->not()->toBeNull();

    })->with(listAlfClassesAndSingletons());

test('__debugInfo()',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);

        // - Call It
        if ($reflectionClass->isAbstract()) {
            expect(true)->toBeTrue();
            return;
        }

        $fullClassName = $reflectionClass->getName();
        if ($reflectionClass->isSubclassOf(AlfBasicSingleton::class)) {
            $inst = AlfBasicSingleton::_AlfBasicSingleton($fullClassName::_());
        } else {
            $inst = AlfBasicClass::_AlfBasicClass(new $fullClassName());
        }

        $debug = $inst->__debugInfo();

        $this->assertSame($debug['class'] ?? null, $reflectionClass->getName());

    })->with(listAlfClassesAndSingletons());
