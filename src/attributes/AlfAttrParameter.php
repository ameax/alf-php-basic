<?php

namespace Alf\AlfPhp\attributes;

use Alf\AlfPhp\AlfBasicAttribute;
use Alf\AlfPhp\services\AlfProgramming;
use Attribute;
use JetBrains\PhpStorm\Pure;

#[Attribute(Attribute::TARGET_PARAMETER)]
abstract class AlfAttrParameter extends AlfBasicAttribute {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    #[Pure]
    final public static function _AlfAttrParameter($obj) : AlfAttrParameter {
        return AlfProgramming::unused($obj, parent::_AlfBasicAttribute($obj));
    }

}
