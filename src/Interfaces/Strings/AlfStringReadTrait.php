<?php

namespace Alf\Interfaces\Strings;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Manipulator\AlfStringManipulator;
use Alf\Services\AlfProgramming;

trait AlfStringReadTrait {

    use AlfStringGetTrait, AlfCharReadTrait {
        AlfCharReadTrait::getAsHtmlAttribute insteadof AlfStringGetTrait;
        AlfCharReadTrait::getAsHtmlInline insteadof AlfStringGetTrait;
        AlfCharReadTrait::getAsHtmlBlock insteadof AlfStringGetTrait;
        AlfCharReadTrait::refHtmlStringManipulator insteadof AlfStringGetTrait;
    }

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfStringRead($obj) : AlfStringRead {
        return AlfProgramming::_()->unused($obj, static::_AlfStringGet($obj), static::_AlfCharRead($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfStringReadTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfStringReadTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfStringReadTraitClone() : void {
    }

}
