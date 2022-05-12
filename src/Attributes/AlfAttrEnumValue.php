<?php

namespace Alf\Attributes;

use Alf\AlfBasicAttribute;
use Alf\Services\AlfProgramming;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class AlfAttrEnumValue extends AlfBasicAttribute {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfAttrEnumValue($obj) : AlfAttrEnumValue {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicAttribute($obj));
    }

}
