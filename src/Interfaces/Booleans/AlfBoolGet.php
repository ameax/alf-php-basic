<?php

namespace Alf\Interfaces\Booleans;

use JetBrains\PhpStorm\Pure;

interface AlfBoolGet {

    #[Pure]
    public function getAsBool() : bool;

}
