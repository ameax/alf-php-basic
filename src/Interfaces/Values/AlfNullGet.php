<?php

namespace Alf\Interfaces\Values;

use JetBrains\PhpStorm\Pure;

interface AlfNullGet extends AlfValueGet {

    #[Pure]
    public function isNull() : bool;

}
