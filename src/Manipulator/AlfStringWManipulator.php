<?php

namespace Alf\Manipulator;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Enums\AlfCharEncodings;
use Alf\Interfaces\Properties\AlfCharEncodingProperty;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfStringWManipulator extends AlfStringManipulator {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfStringWManipulator($obj) : AlfStringWManipulator {
        return AlfProgramming::_()->unused($obj, static::_AlfStringManipulator($obj));
    }

    public function __construct(
        private readonly ?AlfCharEncodingProperty $charsetHandler = null,
    ) {
        parent::__construct();
    }

    #[Pure]
    public function getCharsetString() : string {
        return $this->charsetHandler?->getCharsetValue()?->value ?? AlfCharEncodings::UTF8->value;
    }

    public function getStringLength(string $str) : int {
        return mb_strlen($str, $this->getCharsetString());
    }

    public function getStringAsUpperCase(string $str) : string {
        return mb_strtoupper($str, $this->getCharsetString());
    }

    public function getStringAsLowerCase(string $str) : string {
        return mb_strtolower($str, $this->getCharsetString());
    }

    public function getCharsFromLeft(string $str, int $count) : string {
        return mb_substr($str, 0, $count);
    }

    public function getAsHtmlString(string $str, string $nlTo = '<br>') : string {
        return str_replace("\n", $nlTo, htmlspecialchars($this->convertNewLines($str), ENT_QUOTES | ENT_DISALLOWED | ENT_HTML5, $this->getCharsetString()));
    }

}
