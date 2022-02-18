<?php

namespace Alf\Interfaces\Values;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

trait AlfNullGetTrait {

    use AlfValueGetTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfNullGet($obj) : AlfNullGet {
        return AlfProgramming::_()->unused($obj, static::_AlfValueGet($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfNullGetTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfNullGetTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfNullGetTraitClone() : void {
    }

    #[Pure]
    public function isNull() : bool {
        return is_null($this->getValue());
    }

}
