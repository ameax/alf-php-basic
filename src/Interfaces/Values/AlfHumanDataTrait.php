<?php

namespace Alf\Interfaces\Values;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Services\AlfProgramming;
use Alf\Types\Scalars\AlfStringMarkup;

trait AlfHumanDataTrait {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfHumanData($obj) : AlfHumanData {
        return AlfProgramming::_()->unused($obj);
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

    abstract public function getAsHumanAlfStringMarkup() : AlfStringMarkup;

    public function getAsHumanString() : ?string {
        $obj = $this->getAsHumanAlfStringMarkup();
        if ($obj->isNull()) {
            return null;
        }
        return $obj->getAsString();
    }

}
