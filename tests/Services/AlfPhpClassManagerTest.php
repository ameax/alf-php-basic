<?php

use Alf\AlfBasicClass;
use Alf\AlfBasicType;
use Alf\AlfBasicTypeScalar;
use Alf\Interfaces\Values\AlfEmptyGetTrait;
use Alf\Interfaces\Values\AlfEmptySetTrait;
use Alf\Interfaces\Values\AlfEmptyWorkTrait;
use Alf\Interfaces\Values\AlfNullGetTrait;
use Alf\Interfaces\Values\AlfNullOrEmptyWorkTrait;
use Alf\Interfaces\Values\AlfNullSetTrait;
use Alf\Interfaces\Values\AlfNullWorkTrait;
use Alf\Interfaces\Values\AlfValueGetTrait;
use Alf\Services\AlfPhpClassManager;
use Alf\Types\Scalars\AlfInt;

test('getParent AlfInt',
    function () : void {
        $obj = new AlfInt();
        expect(AlfPhpClassManager::_()->getParent($obj))->toBe(AlfBasicTypeScalar::class);
    });

test('listParents AlfInt',
    function () : void {
        $obj = new AlfInt();
        $parents = AlfPhpClassManager::_()->listParents($obj);

        $this->assertCount(3, $parents);

        $this->assertArrayHasKey(AlfBasicTypeScalar::class, $parents);
        $this->assertArrayHasKey(AlfBasicType::class, $parents);
        $this->assertArrayHasKey(AlfBasicClass::class, $parents);

    });

test('listTraits AlfInt',
    function () : void {
        $obj = new AlfInt();
        $traits = AlfPhpClassManager::_()->listTraits($obj);

        $this->assertCount(8, $traits);

        $this->assertArrayHasKey(AlfNullOrEmptyWorkTrait::class, $traits);
        $this->assertArrayHasKey(AlfNullWorkTrait::class, $traits);
        $this->assertArrayHasKey(AlfNullGetTrait::class, $traits);
        $this->assertArrayHasKey(AlfNullSetTrait::class, $traits);
        $this->assertArrayHasKey(AlfEmptyWorkTrait::class, $traits);
        $this->assertArrayHasKey(AlfEmptyGetTrait::class, $traits);
        $this->assertArrayHasKey(AlfEmptySetTrait::class, $traits);
        $this->assertArrayHasKey(AlfValueGetTrait::class, $traits);

    });