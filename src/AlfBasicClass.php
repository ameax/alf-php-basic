<?php

namespace Alf;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\ArrayShape;
use ReflectionClass;

abstract class AlfBasicClass {

    public function __construct() { }

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfBasicClass($obj) : AlfBasicClass {
        return AlfProgramming::_()->unused($obj);
    }

    public function __destruct() { }

    public function __clone() { }

    // TODO: public function __wakeup() : void
    // TODO: public function __sleep() : array
    // TODO: public function __serialize() : array
    // TODO: public function __unserialize(array $data) : void

    public function getParentClass() : ?string {
        return (new ReflectionClass($this))->getParentClass()?->getName();
    }

    #[ArrayShape(['class' => "string"])]
    public function __debugInfo() : ?array {
        return [
            'class' => static::class,
        ];
    }

}
