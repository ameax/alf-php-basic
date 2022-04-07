<?php

declare(strict_types = 1);

use Alf\Attributes\AlfAttrEnumValue;

test('enums got select',
    /** @throws ReflectionException */
    function (string $enumName) : void {

        $reflectionClass = new ReflectionClass($enumName);
        $shortName = $reflectionClass->getShortName();

        $needSelectName = 'Alf\\Types\\Selects\\'.substr($shortName, 0, -1);
        $this->assertTrue(class_exists($needSelectName), 'Missing select-class for enum '.$shortName);

    })->with(listAlfEnums());

test('enum value functions',
    /** @throws ReflectionException */
    function (string $enumName) : void {

        $reflectionClass = new ReflectionClass($enumName);

        $needStaticFunctions = [];
        $foundStaticFunctions = [];
        foreach ($reflectionClass->getMethods() as $reflectionMethod) {
            if ($reflectionMethod->isStatic()) {
                $foundFuncName = $reflectionMethod->getShortName();
                $foundStaticFunctions[$foundFuncName] = [
                    'returnType' => $reflectionMethod->getReturnType()?->getName(),
                    'isPublic'   => $reflectionMethod->isPublic(),
                    'parameter'  => [],
                ];
                foreach ($reflectionMethod->getParameters() as $reflectionParameter) {
                    $foundStaticFunctions[$foundFuncName]['parameter'][] = (string)$reflectionParameter->getType();
                }
            }

            foreach ($reflectionMethod->getAttributes() as $reflectionAttribute) {
                if ($reflectionAttribute->getName() !== AlfAttrEnumValue::class) {
                    continue;
                }

                // -
                $funcName = 'get'.ucfirst($reflectionMethod->getShortName());
                $returnType = $reflectionMethod->getReturnType()?->getName();
                $needStaticFunctions[$funcName] = $returnType;

                // -
                $this->assertNotNull($returnType, 'return type is null of '.$reflectionMethod->getShortName());
            }
        }

        // -
        if (!count($needStaticFunctions)) {
            expect(true)->toBeTrue();
            return;
        }

        foreach ($needStaticFunctions as $funcName => $returnType) {
            $this->assertArrayHasKey($funcName, $foundStaticFunctions, 'missing function '.$funcName.' in '.$enumName);

            if ($this->hasFailed()) {
                continue;
            }

            $foundFunc = $foundStaticFunctions[$funcName];
            $this->assertTrue($foundFunc['isPublic'], $enumName.'::'.$funcName.' must be public!');
            $this->assertSame($foundFunc['returnType'], $returnType, $enumName.'::'.$funcName.' return type must be "'.$returnType.'"!');
            $this->assertCount(1, $foundFunc['parameter'], $enumName.'::'.$funcName.' must have only one parameter!');

            if ($this->hasFailed()) {
                continue;
            }
            $this->assertSame($foundFunc['parameter'][0], 'self', $enumName.'::'.$funcName.' first parameter need to be "self"!');

        }

    })->with(listAlfEnums());
