<?php

namespace Alf\Interfaces\Integers;

use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Types\Scalars\AlfStringMarkup;
use JetBrains\PhpStorm\Pure;

interface AlfIntLike extends AlfIntWork {

    /* getter */

    #[Pure]
    public function getValue() : ?int;

    #[Pure]
    public function get() : int;

    #[Pure]
    public function getAsInt() : int;

    #[Pure]
    public function getAsString() : string;

    public function getAsHumanAlfStringMarkup() : AlfStringMarkup;

    /* setter */

    public function set(#[AlfAttrParameterIsInt] AlfIntGet|int|null $value) : static;

    public function setToNull() : static;

    public function setToEmpty() : static;

    public function setFromInt(#[AlfAttrParameterIsInt] AlfIntGet|int|null $value) : static;

    /* definitions */

    #[Pure]
    public function getEmptyValue() : int;

}
