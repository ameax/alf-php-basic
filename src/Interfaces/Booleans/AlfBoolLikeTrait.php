<?php

namespace Alf\Interfaces\Booleans;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsBool;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

trait AlfBoolLikeTrait {

    use AlfBoolWorkTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfBoolLike($obj) : AlfBoolLike {
        return AlfProgramming::_()->unused($obj, static::_AlfBoolWork($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfBoolLikeTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfBoolLikeTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfBoolLikeTraitClone() : void {
    }

    /* getter */

    #[Pure]
    abstract public function getValue() : ?bool;

    #[Pure]
    public function get() : bool {
        return $this->getValue() ?? $this->getEmptyValue();
    }

    #[Pure]
    public function getAsBool() : bool {
        return $this->get();
    }

    /* setter */

    abstract public function set(#[AlfAttrParameterIsBool] AlfBoolGet|bool|null $value) : static;

    public function setToNull() : static {
        return $this->set(null);
    }

    public function setToEmpty() : static {
        return $this->set($this->getEmptyValue());
    }

    public function setFromBool(#[AlfAttrParameterIsBool] AlfBoolGet|bool|null $value) : static {
        return $this->set($value);
    }

    /* definitions */

    #[Pure]
    public function getEmptyValue() : bool {
        return false;
    }
}
