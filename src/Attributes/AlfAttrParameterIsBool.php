<?php

namespace Alf\Attributes;

use Alf\Interfaces\Booleans\AlfBoolGet;
use Alf\Services\AlfProgramming;
use Attribute;
use ReflectionParameter;

#[Attribute(Attribute::TARGET_PARAMETER)]
class AlfAttrParameterIsBool extends AlfAttrParameter {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfAttrParameterIsBool($obj) : AlfAttrParameterIsBool {
        return AlfProgramming::_()->unused($obj, static::_AlfAttrParameter($obj));
    }

    public function isParameterTypeOk(ReflectionParameter $param, string|null &$shouldType = null) : bool {
        $needParams = [];

        // #[AlfAttrParameterIsBool] AlfBoolGet|bool|null $value = null
        // PHP sorts the parameters! Use the right order by PHP.
        $needParams[] = AlfBoolGet::class;
        $needParams[] = 'bool';
        $needParams[] = 'null';

        // -
        $shouldType = implode('|', $needParams);
        $isType = (string)$param->getType();

        // -
        return ($shouldType === $isType);
    }

}
