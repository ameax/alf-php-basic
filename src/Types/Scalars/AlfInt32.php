<?php

namespace Alf\Types\Scalars;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfInt32 extends AlfIntRange {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfInt32($obj) : AlfInt32 {
        return AlfProgramming::_()->unused($obj, static::_AlfIntRange($obj));
    }

    #[Pure]
    public function getValueMin() : int {
        return -2147483648;
    }

    #[Pure]
    public function getValueMax() : int {
        return 2147483647;
    }

}
