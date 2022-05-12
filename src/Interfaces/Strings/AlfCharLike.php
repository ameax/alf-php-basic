<?php

namespace Alf\Interfaces\Strings;

use Alf\Attributes\AlfAttrParameterIsString;
use Alf\Types\Scalars\AlfStringMarkup;
use JetBrains\PhpStorm\Pure;
use Stringable;

interface AlfCharLike extends AlfCharWork {

    /* getter */

    #[Pure]
    public function getValue() : ?string;

    #[Pure]
    public function get() : string;

    #[Pure]
    public function getAsString() : string;

    public function getAsHumanAlfStringMarkup() : AlfStringMarkup;

    /* setter */

    public function set(#[AlfAttrParameterIsString] AlfCharGet|AlfStringGet|Stringable|string|null $value) : static;

    public function setToNull() : static;

    public function setToEmpty() : static;

    public function setFromString(#[AlfAttrParameterIsString] AlfCharGet|AlfStringGet|Stringable|string|null $value) : static;

    /* definitions */

    #[Pure]
    public function getEmptyValue() : string;

}
