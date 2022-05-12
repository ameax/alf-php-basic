<?php

namespace Alf\Interfaces\Integers;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfEnvironment;
use Alf\Services\AlfProgramming;
use Alf\Types\Scalars\AlfStringMarkup;
use JetBrains\PhpStorm\Pure;

trait AlfIntLikeTrait {

    use AlfIntWorkTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfIntLike($obj) : AlfIntLike {
        return AlfProgramming::_()->unused($obj, static::_AlfIntWork($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfIntLikeTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfIntLikeTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfIntLikeTraitClone() : void {
    }

    /* getter */

    #[Pure]
    abstract public function getValue() : ?int;

    #[Pure]
    public function get() : int {
        return $this->getValue() ?? $this->getEmptyValue();
    }

    #[Pure]
    public function getAsInt() : int {
        return $this->get();
    }

    #[Pure]
    public function getAsString() : string {
        return (string)($this->getValue() ?? '');
    }

    public function getAsHumanAlfStringMarkup() : AlfStringMarkup {
        if ($this->isNull()) {
            return new AlfStringMarkup();
        }
        $asString = number_format($this->getAsInt(), 0,
                                  AlfEnvironment::_()->refHumanNumbersDecimalSeparator(),
                                  AlfEnvironment::_()->refHumanNumbersThousandsSeparator());
        return new AlfStringMarkup($asString);
    }

    /* setter */

    abstract public function set(#[AlfAttrParameterIsInt] AlfIntGet|int|null $value) : static;

    public function setToNull() : static {
        return $this->set(null);
    }

    public function setToEmpty() : static {
        return $this->set($this->getEmptyValue());
    }

    public function setFromInt(#[AlfAttrParameterIsInt] AlfIntGet|int|null $value) : static {
        return $this->set($value);
    }

    /* definitions */

    #[Pure]
    public function getEmptyValue() : int {
        return 0;
    }

}
