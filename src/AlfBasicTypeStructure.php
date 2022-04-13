<?php

namespace Alf;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;

abstract class AlfBasicTypeStructure extends AlfBasicType {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfBasicTypeStructure($obj) : AlfBasicTypeStructure {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicType($obj));
    }

}
