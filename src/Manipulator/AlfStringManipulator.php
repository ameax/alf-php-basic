<?php

namespace Alf\Manipulator;

use Alf\AlfBasicClass;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Enums\AlfCharsets;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;
use ValueError;

class AlfStringManipulator extends AlfBasicClass {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfStringManipulator($obj) : AlfStringManipulator {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicClass($obj));
    }

    #[Pure]
    public function getCharsetString() : string {
        return AlfCharsets::ASCII->value;
    }

    public function getStringLength(string $str) : int {
        // without a charset, the length = the byte size.
        return strlen($str);
    }

    public function getStringByteSize(string $str) : int {
        // without a charset, the length = the byte size.
        return strlen($str);
    }

    public function getStringAsUpperCase(string $str) : string {
        return strtoupper($str);
    }

    public function getStringAsLowerCase(string $str) : string {
        return strtolower($str);
    }

    public function convertStringToCharset(string $str, string $toEncoding, string|null $fromEncoding = null) : ?string {
        $fromEncoding = $fromEncoding ?? $this->getCharsetString();
        try {
            $tryValue = mb_convert_encoding($str, $toEncoding, $fromEncoding);
        } catch (ValueError) {
            $tryValue = false;
        }
        if ($tryValue === false) {
            return null;
        }

        // - reverse check
        $shouldValue = mb_convert_encoding($tryValue, $fromEncoding, $toEncoding);
        if ($shouldValue !== $str) {
            return null;
        }

        // -
        return $tryValue;
    }

}
