<?php

namespace Alf\Manipulator;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Interfaces\Properties\AlfCharsetProperty;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfStringWManipulator extends AlfStringManipulator {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfStringWManipulator($obj) : AlfStringWManipulator {
        return AlfProgramming::_()->unused($obj, static::_AlfStringManipulator($obj));
    }

    public function __construct(
        private ?AlfCharsetProperty $charsetHandler = null,
    ) {
        parent::__construct();
    }

    #[Pure]
    final public function getCharsetString() : string {
        return $this->charsetHandler?->getCharsetValue()?->value ?? 'UTF-8';
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

}
