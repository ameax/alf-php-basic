<?php

namespace Alf;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Interfaces\Values\AlfEmptyGet;
use Alf\Interfaces\Values\AlfEmptyGetTrait;
use Alf\Interfaces\Values\AlfEmptySet;
use Alf\Interfaces\Values\AlfEmptySetTrait;
use Alf\Interfaces\Values\AlfNullWork;
use Alf\Interfaces\Values\AlfNullWorkTrait;
use Alf\Services\AlfProgramming;

abstract class AlfBasicTypeScalar extends AlfBasicType implements AlfNullWork, AlfEmptyGet, AlfEmptySet {

    use AlfNullWorkTrait, AlfEmptyGetTrait, AlfEmptySetTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfBasicTypeScalar($obj) : AlfBasicTypeScalar {
        return AlfProgramming::_()
                             ->unused($obj, static::_AlfBasicType($obj), static::_AlfNullWork($obj), static::_AlfEmptyGet($obj), static::_AlfEmptySet($obj));
    }

}
