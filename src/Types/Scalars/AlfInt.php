<?php

namespace Alf\Types\Scalars;

use Alf\AlfBasicTypeScalar;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Interfaces\Integers\AlfIntWork;
use Alf\Interfaces\Integers\AlfIntWorkTrait;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class AlfInt extends AlfBasicTypeScalar implements AlfIntWork {

    use AlfIntWorkTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfInt($obj) : AlfInt {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeScalar($obj), static::_AlfIntWork($obj));
    }

    protected ?int $value = null;

    public function __construct(#[AlfAttrParameterIsInt] AlfInt|int|null $value = null) {
        parent::__construct();
        $this->set($value);
    }

    /* getter */

    #[Pure]
    public function getValue() : ?int {
        return $this->value;
    }

    #[Pure]
    public function get() : int {
        return $this->getValue() ?? 0;
    }

    #[Pure]
    public function getAsInt() : int {
        return $this->get();
    }

    /* setter */

    public function set(#[AlfAttrParameterIsInt] AlfInt|int|null $value) : static {
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

    public function setFromInt(#[AlfAttrParameterIsInt] AlfInt|int|null $value) : static {
        return $this->set($value);
    }

    /* definitions */

    #[Pure]
    public function getEmptyValue() : int {
        return 0;
    }

    /* class handling */

    #[Pure]
    protected function _convertValueForSet(int $value) : ?int {
        return $value;
    }

    /* DEBUG */

    #[ArrayShape(['class' => "string", 'parent' => "string", 'value' => "int|string"])]
    public function __debugInfo() : array {
        $output = parent::__debugInfo();
        $output['value'] = ($this->isNull() ? '-NULL-' : $this->getValue());
        return $output;
    }

}
