<?php

namespace Alf\Types\Scalars;

use Alf\AlfBasicTypeScalar;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfInt extends AlfBasicTypeScalar {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfInt($obj) : AlfInt {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeScalar($obj), static::_AlfNullGet($obj));
    }

    protected ?int $value = null;

    public function __construct(#[AlfAttrParameterIsInt] int|null|AlfInt $value = null) {
        parent::__construct();
        $this->set($value);
    }

    public function set(#[AlfAttrParameterIsInt] int|null|AlfInt $value) : static {
        $newValue = AlfProgramming::_()->valueToInt($value);
        if (is_null($newValue)) {
            return $this->setToNull();
        }
        $this->value = $this->_convertValueForSet($newValue);
        return $this;
    }

    public function setToNull() : static {
        $this->value = null;
        return $this;
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

}
