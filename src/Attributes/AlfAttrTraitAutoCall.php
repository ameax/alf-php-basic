<?php

namespace Alf\Attributes;

use Alf\AlfBasicAttribute;
use Alf\Services\AlfProgramming;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class AlfAttrTraitAutoCall extends AlfBasicAttribute {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfAttrTraitAutoCall($obj) : AlfAttrTraitAutoCall {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicAttribute($obj));
    }

}
