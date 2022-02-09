<?php

namespace Alf\AlfPhp\attributes;

use Alf\AlfPhp\AlfBasicAttribute;
use Alf\AlfPhp\services\AlfProgramming;
use Attribute;
use JetBrains\PhpStorm\Pure;

#[Attribute(Attribute::TARGET_METHOD)]
class AlfAttrAutoComplete extends AlfBasicAttribute {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    #[Pure]
    final public static function _AlfAttrAutoComplete($obj) : AlfAttrAutoComplete {
        return AlfProgramming::unused($obj, parent::_AlfBasicAttribute($obj));
    }

}
