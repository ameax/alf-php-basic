<?php

namespace Alf\Attributes;

use Alf\AlfBasicAttribute;
use Alf\Services\AlfProgramming;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class AlfAttrAutoComplete extends AlfBasicAttribute {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfAttrAutoComplete($obj) : AlfAttrAutoComplete {
        return AlfProgramming::_()->unused($obj, parent::_AlfBasicAttribute($obj));
    }

}
