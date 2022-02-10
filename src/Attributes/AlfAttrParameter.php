<?php

namespace Alf\Attributes;

use Alf\AlfBasicAttribute;
use Alf\Services\AlfProgramming;
use Attribute;

#[Attribute(Attribute::TARGET_PARAMETER)]
abstract class AlfAttrParameter extends AlfBasicAttribute {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfAttrParameter($obj) : AlfAttrParameter {
        return AlfProgramming::_()->unused($obj, parent::_AlfBasicAttribute($obj));
    }

}
