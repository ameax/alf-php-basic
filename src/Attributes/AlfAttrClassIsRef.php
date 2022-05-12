<?php

namespace Alf\Attributes;

use Alf\AlfBasicAttribute;
use Alf\Services\AlfProgramming;
use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class AlfAttrClassIsRef extends AlfBasicAttribute {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfAttrClassIsRef($obj) : AlfAttrClassIsRef {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicAttribute($obj));
    }

}
