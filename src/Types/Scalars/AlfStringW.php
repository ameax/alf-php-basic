<?php

namespace Alf\Types\Scalars;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Enums\AlfCharEncodings;
use Alf\Interfaces\Properties\AlfCharEncodingProperty;
use Alf\Interfaces\Properties\AlfCharEncodingPropertyTrait;
use Alf\Manipulator\AlfStringManipulator;
use Alf\Manipulator\AlfStringWManipulator;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\ArrayShape;

class AlfStringW extends AlfString implements AlfCharEncodingProperty {

    use AlfCharEncodingPropertyTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfStringW($obj) : AlfStringW {
        return AlfProgramming::_()->unused($obj, static::_AlfString($obj), static::_AlfCharEncodingProperty($obj));
    }

    protected function getManipulatorClass() : AlfStringManipulator {
        return new AlfStringWManipulator($this);
    }

    public function convertToCharset(AlfCharEncodings $newCharset) : static {
        if ($this->isNullOrEmpty()) {
            $this->refCharset()->set($newCharset);
            return $this;
        }

        $this->set($this->refManipulator()->convertStringToEncoding($this->getAsString(), $newCharset->value));
        $this->refCharset()->set($newCharset);
        return $this;
    }

    #[ArrayShape(['class' => "string", 'parent' => "string", 'value' => "null|string", 'charset' => "array"])]
    public function __debugInfo() : array {
        $output = parent::__debugInfo();
        $output['charset'] = $this->refCharset()->__debugInfo();
        return $output;
    }

}
