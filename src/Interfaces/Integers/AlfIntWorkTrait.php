<?php

namespace Alf\Interfaces\Integers;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;

trait AlfIntWorkTrait {

    use AlfIntGetTrait, AlfIntSetTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfIntWork($obj) : AlfIntWork {
        return AlfProgramming::_()->unused($obj, static::_AlfIntGet($obj), static::_AlfIntSet($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfIntWorkTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfIntWorkTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfIntWorkTraitClone() : void {
    }

    public function add(#[AlfAttrParameterIsInt] AlfIntGet|int|null $value) : static {
        $this->setFromInt($this->getAsInt() + (AlfProgramming::_()->valueToInt($value) ?? 0));
        return $this;
    }

    public function inc() : static {
        return $this->add(1);
    }

    public function sub(#[AlfAttrParameterIsInt] AlfIntGet|int|null $value) : static {
        $this->setFromInt($this->getAsInt() - (AlfProgramming::_()->valueToInt($value) ?? 0));
        return $this;
    }

    public function dec() : static {
        return $this->sub(1);
    }

}
