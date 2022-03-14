<?php

namespace Alf\Types\Scalars;

use Alf\AlfBasicTypeScalar;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsString;
use Alf\Interfaces\Strings\AlfStringGet;
use Alf\Interfaces\Strings\AlfStringWork;
use Alf\Interfaces\Strings\AlfStringWorkTrait;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Stringable;

class AlfString extends AlfBasicTypeScalar implements AlfStringWork {

    use AlfStringWorkTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfString($obj) : AlfString {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeScalar($obj), static::_AlfStringWork($obj));
    }

    protected ?string $value = null;

    public function __construct(#[AlfAttrParameterIsString] AlfStringGet|Stringable|string|null $value = null) {
        parent::__construct();
        $this->set($value);
    }

    /* getter */

    #[Pure]
    public function getValue() : ?string {
        return $this->value;
    }

    #[Pure]
    public function get() : string {
        return $this->getValue() ?? $this->getEmptyValue();
    }

    #[Pure]
    public function getAsString() : string {
        return $this->get();
    }

    /* setter */

    public function set(#[AlfAttrParameterIsString] AlfStringGet|Stringable|string|null $value) : static {
        $newValue = AlfProgramming::_()->valueToString($value);
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

    public function setFromString(#[AlfAttrParameterIsString] AlfStringGet|Stringable|string|null $value) : static {
        return $this->set($value);
    }

    /* definitions */

    #[Pure]
    public function getEmptyValue() : string {
        return '';
    }

    /* class handling */

    #[Pure]
    protected function _convertValueForSet(string $value) : ?string {
        return $value;
    }

    /* DEBUG */

    #[ArrayShape(['class' => "string", 'parent' => "string", 'value' => "null|string"])]
    public function __debugInfo() : array {
        $output = parent::__debugInfo();
        $output['value'] = ($this->isNull() ? '-NULL-' : $this->getValue());
        return $output;
    }

}
