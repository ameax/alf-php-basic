<?php

namespace Alf\Types\Scalars;

use Alf\AlfBasicTypeScalar;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsBool;
use Alf\Interfaces\Booleans\AlfBoolWork;
use Alf\Interfaces\Booleans\AlfBoolWorkTrait;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class AlfBool extends AlfBasicTypeScalar implements AlfBoolWork {

    use AlfBoolWorkTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfBool($obj) : AlfBool {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeScalar($obj), static::_AlfBoolWork($obj));
    }

    protected ?bool $value = null;

    public function __construct(#[AlfAttrParameterIsBool] AlfBool|bool|null $value = null) {
        parent::__construct();
        $this->set($value);
    }

    /* getter */

    #[Pure]
    public function getValue() : ?bool {
        return $this->value;
    }

    #[Pure]
    public function get() : bool {
        return $this->getValue() ?? $this->getEmptyValue();
    }

    #[Pure]
    public function getAsBool() : bool {
        return $this->get();
    }

    /* setter */

    public function set(#[AlfAttrParameterIsBool] AlfBool|bool|null $value) : static {
        $newValue = AlfProgramming::_()->valueToBool($value);
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

    public function setFromBool(#[AlfAttrParameterIsBool] AlfBool|bool|null $value) : static {
        return $this->set($value);
    }

    /* definitions */

    #[Pure]
    public function getEmptyValue() : bool {
        return false;
    }

    /* class handling */

    #[Pure]
    protected function _convertValueForSet(bool $value) : ?bool {
        return $value;
    }

    /* DEBUG */

    #[ArrayShape(['class' => "string", 'parent' => "string", 'value' => "bool|string"])]
    public function __debugInfo() : array {
        $output = parent::__debugInfo();
        $output['value'] = ($this->isNull() ? '-NULL-' : $this->getValue());
        return $output;
    }

}
