<?php

namespace Alf\AlfPhp;

use JetBrains\PhpStorm\ArrayShape;

class AlfBasicClass {

    public function __construct() { }

    public function __destruct() { }

    public function __clone() { }

    #[ArrayShape(['class' => "string"])]
    public function __debugInfo() : ?array {
        return [
            'class' => static::class,
        ];
    }

}
