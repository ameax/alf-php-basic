<?php

namespace Alf\Interfaces\Strings;

interface AlfCharWork extends AlfCharRead, AlfCharSet {

    public function toUpperCase() : static;

    public function toLowerCase() : static;

}
