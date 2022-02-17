<?php

namespace Alf;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;

abstract class AlfBasicTypeScalar extends AlfBasicType {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfBasicTypeScalar($obj) : AlfBasicTypeScalar {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicType($obj));
    }

}
