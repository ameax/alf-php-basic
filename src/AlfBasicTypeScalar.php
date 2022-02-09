<?php

namespace Alf\AlfPhp;

use Alf\AlfPhp\attributes\AlfAttrAutoComplete;
use Alf\AlfPhp\services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

abstract class AlfBasicTypeScalar extends AlfBasicType {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    #[Pure]
    public static function _AlfBasicTypeScalar($obj) : AlfBasicTypeScalar {
        return AlfProgramming::unused($obj, parent::_AlfBasicType($obj));
    }

}
