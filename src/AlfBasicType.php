<?php

namespace Alf;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;

abstract class AlfBasicType extends AlfBasicClass {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfBasicType($obj) : AlfBasicType {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicClass($obj));
    }

}
