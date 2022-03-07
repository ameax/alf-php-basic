<?php

namespace Alf\Interfaces\Values;

use JetBrains\PhpStorm\Pure;

interface AlfNullOrEmptyWork extends AlfNullWork, AlfEmptyWork {

    #[Pure]
    public function isNullOrEmpty() : bool;

}
