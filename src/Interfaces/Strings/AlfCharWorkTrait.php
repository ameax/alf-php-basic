<?php

namespace Alf\Interfaces\Strings;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;

trait AlfCharWorkTrait {

    use AlfCharReadTrait, AlfCharSetTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfCharWork($obj) : AlfCharWork {
        return AlfProgramming::_()->unused($obj, static::_AlfCharRead($obj), static::_AlfCharRead($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharWorkTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharWorkTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharWorkTraitClone() : void {
    }

    public function toUpperCase() : static {
        return $this->setFromString($this->refManipulator()->getStringAsUpperCase($this->getAsString()));
    }

    public function toLowerCase() : static {
        return $this->setFromString($this->refManipulator()->getStringAsLowerCase($this->getAsString()));
    }

}
