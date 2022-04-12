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

    public function getStringLength(string $str) : int {
        // without a charset, the length = the byte size.
        return strlen($str);
    }

    public function getStringByteSize(string $str) : int {
        // without a charset, the length = the byte size.
        return strlen($str);
    }

    public function getStringAsUpperCase(string $str) : string {
        return strtoupper($str);
    }

    public function getStringAsLowerCase(string $str) : string {
        return strtolower($str);
    }

}
