<?php

namespace Alf\Interfaces\Integers;

use Alf\Attributes\AlfAttrParameterIsInt;

interface AlfIntWork extends AlfIntGet, AlfIntSet {

    public function add(#[AlfAttrParameterIsInt] AlfIntGet|int|null $value) : static;

    public function inc() : static;

    public function sub(#[AlfAttrParameterIsInt] AlfIntGet|int|null $value) : static;

    public function dec() : static;

}
