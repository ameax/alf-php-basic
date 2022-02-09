<?php

namespace Alf\AlfPhp;

use Alf\AlfPhp\attributes\AlfAttrAutoComplete;
use Alf\AlfPhp\services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

abstract class AlfBasicAttribute extends AlfBasicClass {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    #[Pure]
    final public static function _AlfBasicAttribute($obj) : AlfBasicAttribute {
        return AlfProgramming::unused($obj, parent::_AlfBasicClass($obj));
    }

}
