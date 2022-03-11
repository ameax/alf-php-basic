<?php

namespace Alf\Interfaces\Strings;

use Alf\Attributes\AlfAttrParameterIsString;
use Stringable;

interface AlfStringSet {

    public function setFromString(#[AlfAttrParameterIsString] AlfStringGet|Stringable|string|null $value) : static;

}
