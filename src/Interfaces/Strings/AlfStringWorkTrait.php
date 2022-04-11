<?php

namespace Alf\Interfaces\Strings;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;

trait AlfStringWorkTrait {

    use AlfStringReadTrait, AlfStringSetTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfStringWork($obj) : AlfStringWork {
        return AlfProgramming::_()->unused($obj, static::_AlfStringRead($obj), static::_AlfStringSet($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfStringWorkTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfStringWorkTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfStringWorkTraitClone() : void {
    }

    public function getStringLength() : int {
        return $this->refManipulator()->getStringLength($this->getAsString());
    }

    public function getStringByteSize() : int {
        return $this->refManipulator()->getStringByteSize($this->getAsString());
    }

}
