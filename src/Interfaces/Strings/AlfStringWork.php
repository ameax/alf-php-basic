<?php

namespace Alf\Interfaces\Strings;

interface AlfStringWork extends AlfStringRead, AlfStringSet {

    public function toUpperCase() : static;

    public function toLowerCase() : static;

}
