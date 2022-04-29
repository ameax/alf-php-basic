<?php

namespace Alf\Interfaces\Strings;

use Alf\Attributes\AlfAttrParameterIsString;
use Stringable;

interface AlfCharSet {

    public function setFromString(#[AlfAttrParameterIsString] AlfCharGet|AlfStringGet|Stringable|string|null $value) : static;

}
