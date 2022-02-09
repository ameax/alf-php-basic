<?php

namespace Alf\AlfPhp;

use Alf\AlfPhp\attributes\AlfAttrAutoComplete;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

abstract class AlfBasicClass {

    public function __construct() { }

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    #[Pure]
    final public static function _AlfBasicClass($obj) : AlfBasicClass {
        return $obj;
    }

    public function __destruct() { }

    public function __clone() { }

    // TODO: public function __wakeup() : void
    // TODO: public function __sleep() : array
    // TODO: public function __serialize() : array
    // TODO: public function __unserialize(array $data) : void

    #[ArrayShape(['class' => "string"])]
    public function __debugInfo() : ?array {
        return [
            'class' => static::class,
        ];
    }

}
