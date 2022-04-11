<?php

namespace Alf\Interfaces\Strings;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Manipulator\AlfStringManipulator;
use Alf\Services\AlfProgramming;

trait AlfStringReadTrait {

    use AlfStringGetTrait;

    private ?AlfStringManipulator $stringManipulator = null;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfStringRead($obj) : AlfStringRead {
        return AlfProgramming::_()->unused($obj, static::_AlfStringGet($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfStringReadTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfStringReadTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfStringReadTraitClone() : void {
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

}
