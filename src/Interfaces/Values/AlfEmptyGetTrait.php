<?php

namespace Alf\Interfaces\Values;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

trait AlfEmptyGetTrait {

    use AlfValueGetTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfEmptyGet($obj) : AlfEmptyGet {
        return AlfProgramming::_()->unused($obj, static::_AlfValueGet($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfEmptyGetTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfEmptyGetTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfEmptyGetTraitClone() : void {
    }

    #[Pure]
    public function isEmpty() : bool {
        return ($this->getValue() === $this->getEmptyValue());
    }

    #[Pure]
    abstract public function getEmptyValue();

}
