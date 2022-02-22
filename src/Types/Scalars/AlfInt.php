<?php

namespace Alf\Types\Scalars;

use Alf\AlfBasicTypeScalar;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class AlfInt extends AlfBasicTypeScalar {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfInt($obj) : AlfInt {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeScalar($obj));
    }

    protected ?int $value = null;

    public function __construct(#[AlfAttrParameterIsInt] int|null|AlfInt $value = null) {
        parent::__construct();
        $this->set($value);
    }

    public function set(#[AlfAttrParameterIsInt] int|null|AlfInt $value) : static {
        $newValue = AlfProgramming::_()->valueToInt($value);
        if (is_null($newValue)) {
            $this->value = null;
            return $this;
        }
        $this->value = $this->_convertValueForSet($newValue);
        return $this;
    }

    public function setToNull() : static {
        return $this->set(null);
    }

    public function setToEmpty() : static {
        return $this->set($this->getEmptyValue());
    }

    #[Pure]
    protected function _convertValueForSet(int $value) : ?int {
        return $value;
    }

    #[Pure]
    public function get() : int {
        return $this->getValue() ?? 0;
    }

    #[Pure]
    public function getValue() : ?int {
        return $this->value;
    }

    #[Pure]
    public function getEmptyValue() : int {
        return 0;
    }

    #[ArrayShape(['class' => "string", 'parent' => "string", 'value' => "int|string"])]
    public function __debugInfo() : array {
        $output = parent::__debugInfo();
        $output['value'] = ($this->isNull() ? '-NULL-' : $this->getValue());
        return $output;
    }

}
