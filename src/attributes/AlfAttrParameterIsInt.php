<?php

namespace Alf\AlfPhp\attributes;

use Alf\AlfPhp\services\AlfProgramming;
use Attribute;
use JetBrains\PhpStorm\Pure;

#[Attribute(Attribute::TARGET_PARAMETER)]
class AlfAttrParameterIsInt extends AlfAttrParameter {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    #[Pure]
    final public static function _AlfAttrParameterIsInt($obj) : AlfAttrParameterIsInt {
        return AlfProgramming::unused($obj, parent::_AlfAttrParameter($obj));
    }

}
