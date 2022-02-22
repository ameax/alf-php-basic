<?php

namespace Alf\Types\Scalars;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfInt8U extends AlfIntRange {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfInt8U($obj) : AlfInt8U {
        return AlfProgramming::_()->unused($obj, static::_AlfIntRange($obj));
    }

    #[Pure]
    public function getValueMin() : int {
        return 0;
    }

    #[Pure]
    public function getValueMax() : int {
        return 255;
    }

}
