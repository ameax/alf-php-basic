<?php

namespace Alf\Types\Scalars;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfInt8 extends AlfIntRange {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfInt8($obj) : AlfInt8 {
        return AlfProgramming::_()->unused($obj, static::_AlfIntRange($obj));
    }

    #[Pure]
    public function getValueMin() : int {
        return -127;
    }

    #[Pure]
    public function getValueMax() : int {
        return 128;
    }

}
