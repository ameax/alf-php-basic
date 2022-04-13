<?php

namespace Alf\Types\Scalars;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfInt24U extends AlfIntRange {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfInt24U($obj) : AlfInt24U {
        return AlfProgramming::_()->unused($obj, static::_AlfIntRange($obj));
    }

    #[Pure]
    public function getValueMin() : int {
        return 0;
    }

    #[Pure]
    public function getValueMax() : int {
        return 16777215;
    }

}
