<?php

namespace Alf\Interfaces\Integers;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;
use Alf\Types\Scalars\AlfInt;

trait AlfIntSetTrait {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfIntSet($obj) : AlfIntSet {
        return AlfProgramming::_()->unused($obj);
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfIntSetTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfIntSetTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfIntSetTraitClone() : void {
    }

    abstract public function setFromInt(#[AlfAttrParameterIsInt] AlfInt|int|null $value) : static;

}
