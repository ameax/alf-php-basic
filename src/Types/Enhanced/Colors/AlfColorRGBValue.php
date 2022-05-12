<?php

namespace Alf\Types\Enhanced\Colors;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;
use Alf\Types\Scalars\AlfInt8U;

class AlfColorRGBValue extends AlfInt8U {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfColorRGBValue($obj) : AlfColorRGBValue {
        return AlfProgramming::_()->unused($obj, static::_AlfInt8U($obj));
    }

}
