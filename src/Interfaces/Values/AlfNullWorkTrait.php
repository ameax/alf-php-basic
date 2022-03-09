<?php

namespace Alf\Interfaces\Values;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;

trait AlfNullWorkTrait {

    use AlfNullGetTrait, AlfNullSetTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfNullWork($obj) : AlfNullWork {
        return AlfProgramming::_()->unused($obj, static::_AlfNullGet($obj), static::_AlfNullSet($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfNullWorkTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfNullWorkTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfNullWorkTraitClone() : void {
    }

}
