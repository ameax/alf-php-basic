<?php

namespace Alf\Interfaces\Strings;

use JetBrains\PhpStorm\Pure;
use Stringable;

interface AlfStringGet extends Stringable {

    #[Pure]
    public function getAsString() : string;

    #[Pure]
    public function __toString() : string;

}
