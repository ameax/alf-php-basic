<?php

namespace Alf\Interfaces\Properties;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrTraitAutoCall;
use Alf\Enums\AlfCharEncodings;
use Alf\Services\AlfProgramming;
use Alf\Types\Selects\AlfCharEncoding;
use JetBrains\PhpStorm\Pure;

trait AlfCharEncodingPropertyTrait {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfCharEncodingProperty($obj) : AlfCharEncodingProperty {
        return AlfProgramming::_()->unused($obj);
    }

    protected AlfCharEncoding $propertyCharEncoding;

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharEncodingPropertyTraitCTor() : void {
        $this->propertyCharEncoding = new AlfCharEncoding(AlfCharEncodings::UTF8);
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharEncodingPropertyTraitDTor() : void {
    }

    /** @AlfAttrTraitAutoCall */
    #[AlfAttrTraitAutoCall]
    protected function _AlfCharEncodingPropertyTraitClone() : void {
        $this->propertyCharEncoding = clone $this->propertyCharEncoding;
    }

    #[Pure]
    public function refCharset() : AlfCharEncoding {
        return $this->propertyCharEncoding;
    }

    #[Pure]
    public function getCharsetValue() : ?AlfCharEncodings {
        return $this->refCharset()->getValue();
    }

}
