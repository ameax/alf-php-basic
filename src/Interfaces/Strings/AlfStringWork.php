<?php

namespace Alf\Interfaces\Strings;

interface AlfStringWork extends AlfStringRead, AlfStringSet {

    public function getStringLength() : int;

    public function getStringByteSize() : int;

}
