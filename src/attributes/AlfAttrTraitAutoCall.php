<?php

namespace Alf\Attributes;

use Alf\AlfBasicAttribute;
use Alf\Services\AlfProgramming;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class AlfAttrTraitAutoCall extends AlfBasicAttribute {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfAttrTraitAutoCall($obj) : AlfAttrTraitAutoCall {
        return AlfProgramming::_()->unused($obj, parent::_AlfBasicAttribute($obj));
    }

}
