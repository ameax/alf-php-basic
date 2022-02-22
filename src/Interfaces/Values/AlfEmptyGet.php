<?php

namespace Alf\Interfaces\Values;

use JetBrains\PhpStorm\Pure;

interface AlfEmptyGet extends AlfValueGet {

    #[Pure]
    public function isEmpty() : bool;

    #[Pure]
    public function getEmptyValue();

}
