<?php

namespace Alf\Interfaces\Strings;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Manipulator\AlfStringManipulator;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

trait AlfCharGetTrait {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfCharGet($obj) : AlfCharGet {
        return AlfProgramming::_()->unused($obj);
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharGetTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharGetTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharGetTraitClone() : void {
    }

    #[Pure]
    abstract public function getAsString() : string;

    #[Pure]
    public function __toString() : string {
        return $this->getAsString();
    }

    protected function refHtmlStringManipulator() : AlfStringManipulator {
        return new AlfStringManipulator();
    }

    public function getAsHtmlAttribute() : string {
        return $this->refHtmlStringManipulator()->getAsHtmlString($this->getAsString(), '&NewLine;');
    }

    public function getAsHtmlInline(string $tag = null, $tagIsRequired = false) : string {
        $output = $this->refHtmlStringManipulator()->getAsHtmlString($this->getAsString());
        if (!$tagIsRequired) {
            return $output;
        }
        $tag = $tag ?? 'span';
        return '<'.$tag.'>'.$output.'</'.$tag.'>';
    }

    public function getAsHtmlBlock(string $tag = null) : string {
        $tag = $tag ?? 'p';
        return '<'.$tag.'>'.$this->refHtmlStringManipulator()->getAsHtmlString($this->getAsString()).'</'.$tag.'>';
    }

}
