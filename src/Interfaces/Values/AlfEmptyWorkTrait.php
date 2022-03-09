<?php

namespace Alf\Interfaces\Values;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;

trait AlfEmptyWorkTrait {

    use AlfEmptyGetTrait, AlfEmptySetTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfEmptyWork($obj) : AlfEmptyWork {
        return AlfProgramming::_()->unused($obj, static::_AlfEmptyGet($obj), static::_AlfEmptySet($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfEmptyWorkTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfEmptyWorkTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfEmptyWorkTraitClone() : void {
    }

}
