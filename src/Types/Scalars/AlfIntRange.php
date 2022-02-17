<?php

namespace Alf\Types\Scalars;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

abstract class AlfIntRange extends AlfInt {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfIntRange($obj) : AlfIntRange {
        return AlfProgramming::_()->unused($obj, static::_AlfInt($obj));
    }

    #[Pure]
    protected function convertValueForSet(int $value) : ?int {
        if ($value > $this->getValueMax()) {
            return $this->getValueMax();
        }
        if ($value < $this->getValueMin()) {
            return $this->getValueMin();
        }
        return $value;
    }

    #[Pure]
    abstract public function getValueMax() : int;

    #[Pure]
    abstract public function getValueMin() : int;

}
