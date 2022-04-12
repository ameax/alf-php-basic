<?php

namespace Alf\Types\Scalars;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Interfaces\Properties\AlfCharsetProperty;
use Alf\Interfaces\Properties\AlfCharsetPropertyTrait;
use Alf\Manipulator\AlfStringManipulator;
use Alf\Manipulator\AlfStringWManipulator;
use Alf\Services\AlfProgramming;

class AlfStringW extends AlfString implements AlfCharsetProperty {

    use AlfCharsetPropertyTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfStringW($obj) : AlfStringW {
        return AlfProgramming::_()->unused($obj, static::_AlfString($obj), static::_AlfCharsetProperty($obj));
    }

    protected function getManipulatorClass() : AlfStringManipulator {
        return new AlfStringWManipulator($this);
    }

}
