<?php

namespace Alf\Attributes;

use Alf\Services\AlfProgramming;
use Alf\Types\Scalars\AlfBool;
use Attribute;
use ReflectionParameter;

#[Attribute(Attribute::TARGET_PARAMETER)]
class AlfAttrParameterIsBool extends AlfAttrParameter {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfAttrParameterIsBool($obj) : AlfAttrParameterIsBool {
        return AlfProgramming::_()->unused($obj, static::_AlfAttrParameter($obj));
    }

    public function isParameterTypeOk(ReflectionParameter $param, string|null &$shouldType = null) : bool {
        $needParams = [];

        // #[AlfAttrParameterIsBool] AlfBool|bool|null $value = null
        // PHP sorts the parameters! Use the right order by PHP.
        $needParams[] = AlfBool::class;
        $needParams[] = 'bool';
        $needParams[] = 'null';

        // -
        $shouldType = implode('|', $needParams);
        $isType = (string)$param->getType();

        // -
        return ($shouldType === $isType);
    }

}
