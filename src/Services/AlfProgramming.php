<?php

namespace Alf\Services;

use Alf\AlfBasicSingleton;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Types\Scalars\AlfInt;
use JetBrains\PhpStorm\Pure;

final class AlfProgramming extends AlfBasicSingleton {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfProgramming($obj) : AlfProgramming {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicSingleton($obj));
    }

    #[Pure]
    public function unused($one, $two = null, $three = null, $four = null, $five = null) {
        return $this->unusedRef($one, $two, $three, $four, $five);
    }

    #[Pure]
    public function unusedRef(&$one, &$two = null, &$three = null, &$four = null, &$five = null) {
        if ((!empty($one)) || (!empty($two)) || (!empty($three)) || (!empty($four)) || (!empty($five))) {
            return $one;
        }
        return null;
    }

    #[Pure]
    public function valueToInt(#[AlfAttrParameterIsInt] int|null|AlfInt $value) : ?int {
        if ((is_int($value)) || (is_null($value))) {
            return $value;
        }
        return $value->isNull() ? null : $value->get();
    }

}
