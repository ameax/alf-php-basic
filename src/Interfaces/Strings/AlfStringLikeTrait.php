<?php

namespace Alf\Interfaces\Strings;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsString;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;
use Stringable;

trait AlfStringLikeTrait {

    use AlfStringWorkTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfStringLike($obj) : AlfStringLike {
        return AlfProgramming::_()->unused($obj, static::_AlfStringWork($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfStringLikeTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfStringLikeTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfStringLikeTraitClone() : void {
    }

    /* getter */

    #[Pure]
    abstract public function getValue() : ?string;

    #[Pure]
    public function get() : string {
        return $this->getValue() ?? $this->getEmptyValue();
    }

    #[Pure]
    public function getAsString() : string {
        return $this->get();
    }

    /* setter */

    abstract public function set(#[AlfAttrParameterIsString] AlfStringGet|Stringable|string|null $value) : static;

    public function setToNull() : static {
        return $this->set(null);
    }

    public function setToEmpty() : static {
        return $this->set($this->getEmptyValue());
    }

    public function setFromString(#[AlfAttrParameterIsString] AlfStringGet|Stringable|string|null $value) : static {
        return $this->set($value);
    }

    /* definitions */

    #[Pure]
    public function getEmptyValue() : string {
        return '';
    }

}
