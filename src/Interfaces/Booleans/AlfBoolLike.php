<?php

namespace Alf\Interfaces\Booleans;

use Alf\Attributes\AlfAttrParameterIsBool;
use JetBrains\PhpStorm\Pure;

interface AlfBoolLike extends AlfBoolWork {

    /* getter */

    #[Pure]
    public function getValue() : ?bool;

    #[Pure]
    public function get() : bool;

    #[Pure]
    public function getAsBool() : bool;

    /* setter */

    public function set(#[AlfAttrParameterIsBool] AlfBoolGet|bool|null $value) : static;

    public function setToNull() : static;

    public function setToEmpty() : static;

    public function setFromBool(#[AlfAttrParameterIsBool] AlfBoolGet|bool|null $value) : static;

    /* definitions */

    #[Pure]
    public function getEmptyValue() : bool;

}
