<?php

declare(strict_types = 1);

use Alf\AlfBasicAttribute;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;

test('trait has interface with same name',
    function (string $traitName) : void {

        $interfaceName = substr($traitName, 0, -5);
        $this->assertTrue(interface_exists($interfaceName));

    })->with(listAlfTraits());

test('trait has auto-trait-functions with attributes',
    /** @throws ReflectionException */
    function (string $traitName) : void {

        $reflectionTrait = new ReflectionClass($traitName);
        $traitShortName = $reflectionTrait->getShortName();

        $checkFunctions = [
            '_'.$traitShortName.'CTor'  => false,
            '_'.$traitShortName.'DTor'  => false,
            '_'.$traitShortName.'Clone' => false
        ];

        foreach ($reflectionTrait->getMethods() as $methodObject) {
            $methodShortName = $methodObject->getShortName();
            if (!array_key_exists($methodShortName, $checkFunctions)) {
                continue;
            }
            $checkFunctions[$methodShortName] = true;

            // -
            $hasAttributeAlfTraitAutoCall = false;
            foreach ($methodObject->getAttributes() as $attributeObject) {
                if ($attributeObject->getName() !== AlfAttrTraitAutoCall::class) {
                    continue;
                }

                $this->assertSame(count($attributeObject->getArguments()), 0, $traitShortName.'::'.$methodShortName.'::'.$attributeObject->getName().' has arguments');

                // -
                $attr = $attributeObject->newInstance();
                $attrReflection = new ReflectionClass($attr);
                $this->assertTrue($attrReflection->isSubclassOf(AlfBasicAttribute::class), $traitShortName.'::'.$methodShortName.'::'.$attributeObject->getName().' is not a kind of AlfBasicAttribute');

                // -
                $hasAttributeAlfTraitAutoCall = true;
                break;
            }
            $this->assertTrue($hasAttributeAlfTraitAutoCall, $traitShortName.'::'.$methodShortName.' missing #[AlfAttrTraitAutoCall]');

            // -
            $this->assertTrue(str_contains($methodObject->getDocComment(), '@AlfAttrTraitAutoCall '), $traitShortName.'::'.$methodShortName.' missing /** @AlfAttrTraitAutoCall */');
        }

        // -
        foreach ($checkFunctions as $checkFunction => $isOn) {
            if ($isOn) {
                continue;
            }
            $this->fail($traitShortName.'::'.$checkFunction.' is missing');
        }

    })->with(listAlfTraits());

test('trait and the autocomplete interface function',
    /** @throws ReflectionException */
    function (string $traitName) : void {

        $reflectionClass = new ReflectionClass($traitName);

        // -
        $traitName = $reflectionClass->getShortName();
        $interfaceName = substr($traitName, 0, -5);
        $needFunctionName = '_'.$interfaceName;

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
        $this->assertNotNull($foundMethod, 'method '.$traitName.'::'.$needFunctionName.'() not found!');
        if ($this->hasFailed()) {
            return;
        }

        // -
        $this->assertTrue($foundMethod->isStatic(), 'method '.$traitName.'::'.$needFunctionName.'() is not static!');
        $this->assertTrue($foundMethod->isPublic(), 'method '.$traitName.'::'.$needFunctionName.'() is not public!');
        $this->assertFalse($foundMethod->isFinal(), 'method '.$traitName.'::'.$needFunctionName.'() is final!');
        $this->assertSame(count($foundMethod->getParameters()), 1, 'the method '.$traitName.'::'.$needFunctionName.'() must have only 1 parameter!');
        if ($this->hasFailed()) {
            return;
        }

        // -
        $parameterOne = $foundMethod->getParameters()[0];
        $parameterName = $parameterOne->getName();
        $this->assertSame($parameterName, 'obj', 'the first parameter at method '.$traitName.'::'.$needFunctionName.'() needs to habe the name "$obj"!');
        $parameterType = $parameterOne->getType();
        $this->assertNull($parameterType, 'the first parameter at method '.$traitName.'::'.$needFunctionName.'() is not allowed to hav a type!');

        // -
        $returnType = $foundMethod->getReturnType();
        $this->assertSame($returnType?->getName(), substr($reflectionClass->getName(), 0, -5), 'method '.$traitName.'::'.$needFunctionName.'() needs the return type '.$interfaceName.'!');

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
        $this->assertTrue($hasAttributeAlfAutoCompleteCall, 'method '.$traitName.'::'.$needFunctionName.'() needs #[AlfAttrAutoComplete]');

        // -
        $this->assertTrue(str_contains($foundMethod->getDocComment(), '@AlfAttrAutoComplete '), 'method '.$needFunctionName.' needs /** @AlfAttrAutoComplete */');

        // - finally
        expect($foundMethod)->not()->toBeNull();

    })->with(listAlfTraits());
