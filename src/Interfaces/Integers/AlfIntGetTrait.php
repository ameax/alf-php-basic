<?php

namespace Alf\Interfaces\Integers;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

trait AlfIntGetTrait {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfIntGet($obj) : AlfIntGet {
        return AlfProgramming::_()->unused($obj);
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfIntGetTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfIntGetTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfIntGetTraitClone() : void {
    }

    #[Pure]
    abstract public function getAsInt() : int;

}
