<?php

namespace Alf\Services;

use Alf\AlfBasicSingleton;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsBool;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Attributes\AlfAttrParameterIsString;
use Alf\Interfaces\Booleans\AlfBoolGet;
use Alf\Interfaces\Integers\AlfIntGet;
use Alf\Interfaces\Strings\AlfCharGet;
use Alf\Interfaces\Strings\AlfStringGet;
use Alf\Interfaces\Values\AlfNullWork;
use JetBrains\PhpStorm\Pure;
use Stringable;

class AlfProgramming extends AlfBasicSingleton {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfProgramming($obj) : AlfProgramming {
        return AlfProgramming::_()->unused($obj, AlfProgramming::_AlfBasicSingleton($obj));
    }

    #[Pure]
    public function unused($one, $two = null, $three = null, $four = null, $five = null) {
        return $this->unusedRef($one, $two, $three, $four, $five);
    }

    #[Pure]
    public function unusedRef(&$one, &$two = null, &$three = null, &$four = null, &$five = null) {
        if ((!empty($one)) || (!empty($two)) || (!empty($three)) || (!empty($four)) || (!empty($five))) {
            return $one;
        }
        return null;
    }

    #[Pure]
    public function valueIsNull(mixed $value, bool $checkViaFunctions = true) : bool {
        if (is_null($value)) {
            return true;
        }
        if ($checkViaFunctions) {
            if (is_a($value, AlfNullWork::class) && $value->isNull()) {
                return true;
            }
            if (is_object($value) && method_exists($value, 'isNull') && $value->isNull()) {
                return true;
            }
        }
        return false;
    }

    #[Pure]
    public function valueToInt(#[AlfAttrParameterIsInt] AlfIntGet|int|null $value) : ?int {
        if (is_int($value)) {
            return $value;
        }
        if ($this->valueIsNull($value)) {
            return null;
        }
        return $value->getAsInt();
    }

    #[Pure]
    public function valueToBool(#[AlfAttrParameterIsBool] AlfBoolGet|bool|null $value) : ?bool {
        if (is_bool($value)) {
            return $value;
        }
        if ($this->valueIsNull($value)) {
            return null;
        }
        return $value->getAsBool();
    }

    #[Pure]
    public function valueToString(#[AlfAttrParameterIsString] AlfCharGet|AlfStringGet|Stringable|string|null $value) : ?string {
        if (is_string($value)) {
            return $value;
        }
        if ($this->valueIsNull($value)) {
            return null;
        }
        if (is_a($value, AlfCharGet::class) || is_a($value, AlfStringGet::class)) {
            return $value->getAsString();
        }
        return (string)$value;
    }

}
