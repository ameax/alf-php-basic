<?php

namespace Alf\Interfaces\Booleans;

use Alf\Attributes\AlfAttrParameterIsBool;
use Alf\Types\Scalars\AlfBool;

interface AlfBoolSet {

    public function setFromBool(#[AlfAttrParameterIsBool] AlfBool|bool|null $value) : static;

}
