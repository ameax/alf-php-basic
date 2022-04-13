<?php

namespace Alf\Interfaces\Strings;

use Alf\Attributes\AlfAttrParameterIsString;
use JetBrains\PhpStorm\Pure;
use Stringable;

interface AlfStringLike extends AlfStringWork {

    /* getter */

    #[Pure]
    public function getValue() : ?string;

    #[Pure]
    public function get() : string;

    #[Pure]
    public function getAsString() : string;

    /* setter */

    public function set(#[AlfAttrParameterIsString] AlfStringGet|Stringable|string|null $value) : static;

    public function setToNull() : static;

    public function setToEmpty() : static;

    public function setFromString(#[AlfAttrParameterIsString] AlfStringGet|Stringable|string|null $value) : static;

    /* definitions */

    #[Pure]
    public function getEmptyValue() : string;

}
