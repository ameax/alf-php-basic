<?php

use Alf\Attributes\AlfAttrParameter;

test('AlfAttrParameter isParameterTypeOk',
    /** @throws ReflectionException */
    function (string $className) : void {

        $reflectionClass = new ReflectionClass($className);
        $isGood = null;

        foreach ($reflectionClass->getMethods() as $reflectionMethod) {
            foreach ($reflectionMethod->getParameters() as $reflectionParameter) {
                foreach ($reflectionParameter->getAttributes() as $reflectionAttribute) {
                    $inst = $reflectionAttribute->newInstance();
                    $reflectionInst = new ReflectionClass($inst);
                    $isAlfAttrParameter = $reflectionInst->isSubclassOf(AlfAttrParameter::class);
                    if (!$isAlfAttrParameter) {
                        continue;
                    }

                    // -
                    $instParameter = AlfAttrParameter::_AlfAttrParameter($inst);
                    $errorMsgPlain = '';
                    $isGood = $instParameter->isParameterTypeOk($reflectionParameter, $errorMsgPlain);
                    $this->assertTrue($isGood, $reflectionClass->getShortName().'::'.$reflectionMethod->getName().'('.$reflectionParameter->getName().') must be "'.$errorMsgPlain.'" and is "'.$reflectionParameter->getType().'"');
                }

            }
        }

        if (is_null($isGood)) {
            expect(true)->toBeTrue();
        }

    })->with(listAlfAll());
