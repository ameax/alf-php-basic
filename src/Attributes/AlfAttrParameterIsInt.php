<?php

namespace Alf\Attributes;

use Alf\Services\AlfProgramming;
use Alf\Types\Scalars\AlfInt;
use Attribute;
use ReflectionParameter;

#[Attribute(Attribute::TARGET_PARAMETER)]
class AlfAttrParameterIsInt extends AlfAttrParameter {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfAttrParameterIsInt($obj) : AlfAttrParameterIsInt {
        return AlfProgramming::_()->unused($obj, static::_AlfAttrParameter($obj));
    }

    public function isParameterTypeOk(ReflectionParameter $param, string|null &$shouldType = null) : bool {
        $needParams = [];

        // #[AlfAttrParameterIsInt] AlfInt|int|null $value = null
        // PHP sorts the parameters! Use the right order by PHP.
        $needParams[] = AlfInt::class;
        $needParams[] = 'int';
        $needParams[] = 'null';

        // -
        $shouldType = implode('|', $needParams);
        $isType = (string)$param->getType();

        // -
        return ($shouldType === $isType);
    }

}
