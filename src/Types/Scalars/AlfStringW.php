<?php

namespace Alf\Types\Scalars;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Enums\AlfCharsets;
use Alf\Interfaces\Properties\AlfCharsetProperty;
use Alf\Interfaces\Properties\AlfCharsetPropertyTrait;
use Alf\Manipulator\AlfStringManipulator;
use Alf\Manipulator\AlfStringWManipulator;
use Alf\Services\AlfProgramming;

class AlfStringW extends AlfString implements AlfCharsetProperty {

    use AlfCharsetPropertyTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfStringW($obj) : AlfStringW {
        return AlfProgramming::_()->unused($obj, static::_AlfString($obj), static::_AlfCharsetProperty($obj));
    }

    protected function getManipulatorClass() : AlfStringManipulator {
        return new AlfStringWManipulator($this);
    }

    public function convertToCharset(AlfCharsets $newCharset) : static {
        if ($this->isNullOrEmpty()) {
            $this->refCharset()->set($newCharset);
            return $this;
        }

        $this->set($this->refManipulator()->convertStringToCharset($this->getAsString(), $newCharset->value));
        $this->refCharset()->set($newCharset);
        return $this;
    }

    public function __debugInfo() : array {
        $output = parent::__debugInfo();
        $output['charset'] = $this->refCharset()->__debugInfo();
        return $output;
    }

}
