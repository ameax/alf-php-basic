<?php

namespace Alf\Manipulator;

use Alf\AlfBasicClass;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Enums\AlfCharEncodings;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;
use ValueError;

class AlfStringManipulator extends AlfBasicClass {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfStringManipulator($obj) : AlfStringManipulator {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicClass($obj));
    }

    #[Pure]
    public function getCharsetString() : string {
        return AlfCharEncodings::ASCII->value;
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

    public function getCharsFromLeft(string $str, int $count) : string {
        return substr($str, 0, $count);
    }

    public function getCharFirst(string $str) : string {
        return $this->getCharsFromLeft($str, 1);
    }

    public function convertStringToEncoding(string $str, string $toEncoding, string|null $fromEncoding = null) : ?string {
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

    public function convertNewLines(string $str) : string {
        return str_replace(["\r\n", "\r"], ["\n", "\n"], $str);
    }

    public function getAsHtmlString(string $str, string $nlTo = '<br>') : string {
        return str_replace(["\n", '<br>', '&NewLine;'], $nlTo, htmlspecialchars($this->convertNewLines($str), ENT_QUOTES | ENT_DISALLOWED | ENT_HTML5));
    }

}
