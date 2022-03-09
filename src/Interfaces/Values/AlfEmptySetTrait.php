<?php

namespace Alf\Interfaces\Values;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;

trait AlfEmptySetTrait {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfEmptySet($obj) : AlfEmptySet {
        return AlfProgramming::_()->unused($obj);
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfEmptySetTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfEmptySetTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfEmptySetTraitClone() : void {
    }

    abstract public function setToEmpty() : static;

}
