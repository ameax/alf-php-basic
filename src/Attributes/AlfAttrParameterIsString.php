<?php

namespace Alf\Attributes;

use Alf\Interfaces\Strings\AlfStringGet;
use Alf\Services\AlfProgramming;
use Attribute;
use ReflectionParameter;
use Stringable;

#[Attribute(Attribute::TARGET_PARAMETER)]
class AlfAttrParameterIsString extends AlfAttrParameter {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfAttrParameterIsString($obj) : AlfAttrParameterIsString {
        return AlfProgramming::_()->unused($obj, static::_AlfAttrParameter($obj));
    }

    public function isParameterTypeOk(ReflectionParameter $param, ?string &$shouldType = null) : bool {
        $needParams = [];

        // #[AlfAttrParameterIsString] AlfStringGet|Stringable|string|null $value = null
        // PHP sorts the parameters! Use the right order by PHP.
        $needParams[] = AlfStringGet::class;
        $needParams[] = Stringable::class;
        $needParams[] = 'string';
        $needParams[] = 'null';

        // -
        $shouldType = implode('|', $needParams);
        $isType = (string)$param->getType();

        // -
        return ($shouldType === $isType);
    }

}
