<?php

namespace Alf\Attributes;

use Alf\Services\AlfProgramming;
use Attribute;

#[Attribute(Attribute::TARGET_PARAMETER)]
class AlfAttrParameterIsInt extends AlfAttrParameter {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfAttrParameterIsInt($obj) : AlfAttrParameterIsInt {
        return AlfProgramming::_()->unused($obj, static::_AlfAttrParameter($obj));
    }

}
