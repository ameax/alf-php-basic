<?php

namespace Alf\AlfPhp;

use Alf\AlfPhp\attributes\AlfAttrAutoComplete;
use Alf\AlfPhp\services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

abstract class AlfBasicType extends AlfBasicClass {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    #[Pure]
    public static function _AlfBasicType($obj) : AlfBasicType {
        return AlfProgramming::unused($obj, parent::_AlfBasicClass($obj));
    }

}
