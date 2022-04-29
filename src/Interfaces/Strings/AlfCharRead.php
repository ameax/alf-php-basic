<?php

namespace Alf\Interfaces\Strings;

use Alf\Manipulator\AlfStringManipulator;
use Countable;

interface AlfCharRead extends AlfCharGet, Countable {

    public function refManipulator() : AlfStringManipulator;

    public function getStringLength() : int;

    public function getStringByteSize() : int;

    public function count() : int;

}
