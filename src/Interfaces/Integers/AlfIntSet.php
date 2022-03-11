<?php

namespace Alf\Interfaces\Integers;

use Alf\Attributes\AlfAttrParameterIsInt;

interface AlfIntSet {

    public function setFromInt(#[AlfAttrParameterIsInt] AlfIntGet|int|null $value) : static;

}
