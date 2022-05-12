<?php

namespace Alf\Attributes;

use Alf\AlfBasicAttribute;
use Alf\Services\AlfProgramming;
use Attribute;
use ReflectionParameter;

#[Attribute(Attribute::TARGET_PARAMETER)]
abstract class AlfAttrParameter extends AlfBasicAttribute {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfAttrParameter($obj) : AlfAttrParameter {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicAttribute($obj));
    }

    abstract public function isParameterTypeOk(ReflectionParameter $param, string|null &$shouldType = null) : bool;

}
