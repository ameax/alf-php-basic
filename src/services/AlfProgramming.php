<?php

namespace Alf\AlfPhp\services;

use Alf\AlfPhp\AlfBasicSingleton;
use Alf\AlfPhp\attributes\AlfAttrAutoComplete;
use JetBrains\PhpStorm\Pure;

final class AlfProgramming extends AlfBasicSingleton {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    #[Pure]
    public static function _AlfProgramming($obj) : AlfProgramming {
        return AlfProgramming::unused($obj, parent::_AlfBasicSingleton($obj));
    }

    #[Pure]
    public static function unused($one, $two = null, $three = null, $four = null, $five = null) {
        return AlfProgramming::unusedRef($one, $two, $three, $four, $five);
    }

    #[Pure]
    public static function unusedRef(&$one, &$two = null, &$three = null, &$four = null, &$five = null) {
        if ((!empty($one)) || (!empty($two)) || (!empty($three)) || (!empty($four)) || (!empty($five))) {
            return $one;
        }
        return null;
    }

}
