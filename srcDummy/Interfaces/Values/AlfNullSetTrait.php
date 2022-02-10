<?php

namespace Alf\Interfaces\Values;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;

trait AlfNullSetTrait {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfNullSet($obj) : AlfNullSet {
        return AlfProgramming::_()->unused($obj);
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfNullSetTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfNullSetTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfNullSetTraitClone() : void {
    }

}
