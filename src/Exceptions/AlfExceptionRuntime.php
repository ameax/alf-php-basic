<?php

namespace Alf\Exceptions;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\ArrayShape;

class AlfExceptionRuntime extends AlfException {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfExceptionRuntime($obj) : AlfExceptionRuntime {
        return AlfProgramming::_()->unused($obj, parent::_AlfException($obj));
    }

}
