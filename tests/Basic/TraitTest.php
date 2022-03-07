<?php

use Alf\AlfBasicAttribute;
use Alf\Attributes\AlfAttrTraitAutoCall;

test('trait has interface',
    function (string $traitName) : void {

        $interfaceName = substr($traitName, 0, -5);
        expect(interface_exists($interfaceName))->toBeTrue();

    })->with(listAlfTraits());

test('trait has auto-trait-functions',
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


