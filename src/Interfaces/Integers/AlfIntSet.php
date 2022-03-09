<?php

namespace Alf\Interfaces\Integers;

use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Types\Scalars\AlfInt;

interface AlfIntSet {

    public function setFromInt(#[AlfAttrParameterIsInt] AlfInt|int|null $value) : static;

}
