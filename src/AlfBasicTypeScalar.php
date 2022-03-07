<?php

namespace Alf;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Interfaces\Values\AlfNullOrEmptyWork;
use Alf\Interfaces\Values\AlfNullOrEmptyWorkTrait;
use Alf\Services\AlfProgramming;

abstract class AlfBasicTypeScalar extends AlfBasicType implements AlfNullOrEmptyWork {

    use AlfNullOrEmptyWorkTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfBasicTypeScalar($obj) : AlfBasicTypeScalar {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicType($obj), static::_AlfNullOrEmptyWork($obj));
    }

}
