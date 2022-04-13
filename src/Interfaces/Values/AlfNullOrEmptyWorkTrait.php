<?php

namespace Alf\Interfaces\Values;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

trait AlfNullOrEmptyWorkTrait {

    use AlfNullWorkTrait, AlfEmptyWorkTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfNullOrEmptyWork($obj) : AlfNullOrEmptyWork {
        return AlfProgramming::_()->unused($obj, static::_AlfNullWork($obj), static::_AlfEmptyWork($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfNullOrEmptyWorkTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfNullOrEmptyWorkTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfNullOrEmptyWorkTraitClone() : void {
    }

    #[Pure]
    public function isNullOrEmpty() : bool {
        return $this->isNull() || $this->isEmpty();
    }

    #[Pure]
    public function isEmptyOrNull() : bool {
        return $this->isEmpty() || $this->isNull();
    }

    public function setToEmptyIfNull() : static {
        if ($this->isNull()) {
            return $this->setToEmpty();
        }
        return $this;
    }

}
