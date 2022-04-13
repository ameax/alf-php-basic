<?php

namespace Alf\Types\Scalars;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfInt24 extends AlfIntRange {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfInt24($obj) : AlfInt24 {
        return AlfProgramming::_()->unused($obj, static::_AlfIntRange($obj));
    }

    #[Pure]
    public function getValueMin() : int {
        return -8388608;
    }

    #[Pure]
    public function getValueMax() : int {
        return 8388607;
    }

}
