<?php

namespace Alf\Interfaces\Booleans;

use Alf\Attributes\AlfAttrParameterIsBool;
use Alf\Types\Scalars\AlfStringMarkup;
use JetBrains\PhpStorm\Pure;

interface AlfBoolLike extends AlfBoolWork {

    /* getter */

    #[Pure]
    public function getValue() : ?bool;

    #[Pure]
    public function get() : bool;

    #[Pure]
    public function getAsBool() : bool;

    #[Pure]
    public function getAsString() : string;

    public function getAsHumanAlfStringMarkup() : AlfStringMarkup;

    /* setter */

    public function set(#[AlfAttrParameterIsBool] AlfBoolGet|bool|null $value) : static;

    public function setToNull() : static;

    public function setToEmpty() : static;

    public function setFromBool(#[AlfAttrParameterIsBool] AlfBoolGet|bool|null $value) : static;

    /* definitions */

    #[Pure]
    public function getEmptyValue() : bool;

}
