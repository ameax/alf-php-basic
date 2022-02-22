<?php

namespace Alf;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Interfaces\Values\AlfNullWork;
use Alf\Interfaces\Values\AlfNullWorkTrait;
use Alf\Services\AlfProgramming;

abstract class AlfBasicTypeScalar extends AlfBasicType implements AlfNullWork {

    use AlfNullWorkTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfBasicTypeScalar($obj) : AlfBasicTypeScalar {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicType($obj));
    }

}
