<?php

namespace Alf;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;

abstract class AlfBasicAttribute extends AlfBasicClass {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfBasicAttribute($obj) : AlfBasicAttribute {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicClass($obj));
    }

}
