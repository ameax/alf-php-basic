<?php

namespace Alf\Interfaces\Properties;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Enums\AlfCharsets;
use Alf\Services\AlfProgramming;
use Alf\Types\Selects\AlfCharset;
use JetBrains\PhpStorm\Pure;

trait AlfCharsetPropertyTrait {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfCharsetProperty($obj) : AlfCharsetProperty {
        return AlfProgramming::_()->unused($obj);
    }

    protected AlfCharset $propCharset;

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharsetPropertyTraitCTor() : void {
        $this->propCharset = new AlfCharset(AlfCharsets::UTF8);
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharsetPropertyTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharsetPropertyTraitClone() : void {
        $this->propCharset = clone $this->propCharset;
    }

    #[Pure]
    public function refCharset() : AlfCharset {
        return $this->propCharset;
    }

    #[Pure]
    public function getCharsetValue() : ?AlfCharsets {
        return $this->refCharset()->getValue();
    }

}
