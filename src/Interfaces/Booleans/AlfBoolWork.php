<?php

namespace Alf\Interfaces\Booleans;

interface AlfBoolWork extends AlfBoolGet, AlfBoolSet {

    public function invert() : static;

}
