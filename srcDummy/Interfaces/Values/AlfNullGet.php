<?php

namespace Alf\Interfaces\Values;

interface AlfNullGet extends AlfValueGet {

    public function isNull() : bool;

}
