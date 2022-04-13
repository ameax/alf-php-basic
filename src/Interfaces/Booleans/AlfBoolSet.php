<?php

namespace Alf\Interfaces\Booleans;

use Alf\Attributes\AlfAttrParameterIsBool;

interface AlfBoolSet {

    public function setFromBool(#[AlfAttrParameterIsBool] AlfBoolGet|bool|null $value) : static;

}
