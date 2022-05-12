<?php

namespace Alf\Interfaces\Values;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Interfaces\Strings\AlfStringGetTrait;
use Alf\Services\AlfProgramming;
use Alf\Types\Scalars\AlfStringMarkup;

trait AlfHumanDataTrait {

    use AlfStringGetTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfHumanData($obj) : AlfHumanData {
        return AlfProgramming::_()->unused($obj, static::_AlfStringGet($obj));
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfHumanDataTraitCTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfHumanDataTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfHumanDataTraitClone() : void {
    }

    public function getAsHumanAlfStringMarkup() : AlfStringMarkup {
        return new AlfStringMarkup($this->getAsString());
    }

    public function getAsHumanString() : ?string {
        $obj = $this->getAsHumanAlfStringMarkup();
        if ($obj->isNull()) {
            return null;
        }
        return $obj->getAsString();
    }

}
