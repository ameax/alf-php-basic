<?php

namespace Alf\Manipulator;

use Alf\AlfBasicClass;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;

class AlfStringManipulator extends AlfBasicClass {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfStringManipulator($obj) : AlfStringManipulator {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicClass($obj));
    }

    public function getStringLength(string $string) : int {
        // without a charset, the length = the byte size.
        return strlen($string);
    }

    public function getStringByteSize(string $string) : int {
        // without a charset, the length = the byte size.
        return strlen($string);
    }

}
