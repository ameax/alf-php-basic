<?php

namespace Alf\Interfaces\Strings;

use Alf\Manipulator\AlfStringManipulator;

interface AlfStringRead extends AlfStringGet {

    public function refManipulator() : AlfStringManipulator;

}
