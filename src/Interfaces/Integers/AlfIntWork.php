<?php

namespace Alf\Interfaces\Integers;

use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Types\Scalars\AlfInt;

interface AlfIntWork extends AlfIntGet, AlfIntSet {

    public function add(#[AlfAttrParameterIsInt] AlfInt|int|null $value) : static;

    public function inc() : static;

}
