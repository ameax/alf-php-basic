<?php

namespace Alf\Interfaces\Values;

use JetBrains\PhpStorm\Pure;

interface AlfNullOrEmptyWork extends AlfNullWork, AlfEmptyWork {

    #[Pure]
    public function isNullOrEmpty() : bool;

    #[Pure]
    public function isEmptyOrNull() : bool;

    public function setToEmptyIfNull() : static;

}
