<?php

declare(strict_types = 1);

use Alf\AlfBasicClass;
use Alf\AlfBasicType;
use Alf\AlfBasicTypeScalar;
use Alf\Interfaces\Integers\AlfIntGetTrait;
use Alf\Interfaces\Integers\AlfIntLikeTrait;
use Alf\Interfaces\Integers\AlfIntSetTrait;
use Alf\Interfaces\Integers\AlfIntWorkTrait;
use Alf\Interfaces\Values\AlfEmptyGetTrait;
use Alf\Interfaces\Values\AlfEmptySetTrait;
use Alf\Interfaces\Values\AlfEmptyWorkTrait;
use Alf\Interfaces\Values\AlfHumanDataTrait;
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
        $this->assertSame(AlfPhpClassManager::_()->getParent($obj), AlfBasicTypeScalar::class);

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

        $this->assertCount(13, $traits);

        $this->assertArrayHasKey(AlfNullOrEmptyWorkTrait::class, $traits);
        $this->assertArrayHasKey(AlfNullWorkTrait::class, $traits);
        $this->assertArrayHasKey(AlfNullGetTrait::class, $traits);
        $this->assertArrayHasKey(AlfNullSetTrait::class, $traits);
        $this->assertArrayHasKey(AlfEmptyWorkTrait::class, $traits);
        $this->assertArrayHasKey(AlfEmptyGetTrait::class, $traits);
        $this->assertArrayHasKey(AlfEmptySetTrait::class, $traits);
        $this->assertArrayHasKey(AlfValueGetTrait::class, $traits);
        $this->assertArrayHasKey(AlfIntGetTrait::class, $traits);
        $this->assertArrayHasKey(AlfIntSetTrait::class, $traits);
        $this->assertArrayHasKey(AlfIntWorkTrait::class, $traits);
        $this->assertArrayHasKey(AlfIntLikeTrait::class, $traits);
        $this->assertArrayHasKey(AlfHumanDataTrait::class, $traits);

    });
