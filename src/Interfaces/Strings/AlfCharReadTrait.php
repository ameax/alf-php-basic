<?php

namespace Alf\Interfaces\Strings;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Manipulator\AlfStringManipulator;
use Alf\Services\AlfProgramming;

trait AlfCharReadTrait {

    use AlfCharGetTrait;

    private ?AlfStringManipulator $stringManipulator = null;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfCharRead($obj) : AlfCharRead {
        return AlfProgramming::_()->unused($obj, static::_AlfCharGet($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharReadTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharReadTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharReadTraitClone() : void {
    }

    protected function getManipulatorClass() : AlfStringManipulator {
        return new AlfStringManipulator();
    }

    public function refManipulator() : AlfStringManipulator {
        if (is_null($this->stringManipulator)) {
            $this->stringManipulator = $this->getManipulatorClass();
        }
        return $this->stringManipulator;
    }

    public function getStringLength() : int {
        return $this->refManipulator()->getStringLength($this->getAsString());
    }

    public function getStringByteSize() : int {
        return $this->refManipulator()->getStringByteSize($this->getAsString());
    }

    public function count() : int {
        return $this->getStringByteSize();
    }

    protected function refHtmlStringManipulator() : AlfStringManipulator {
        return $this->refManipulator();
    }

}
