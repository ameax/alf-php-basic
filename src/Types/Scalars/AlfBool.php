<?php

namespace Alf\Types\Scalars;

use Alf\AlfBasicTypeScalar;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsBool;
use Alf\Interfaces\Booleans\AlfBoolGet;
use Alf\Interfaces\Booleans\AlfBoolLike;
use Alf\Interfaces\Booleans\AlfBoolLikeTrait;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class AlfBool extends AlfBasicTypeScalar implements AlfBoolLike {

    use AlfBoolLikeTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfBool($obj) : AlfBool {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeScalar($obj), static::_AlfBoolLike($obj));
    }

    protected ?bool $value = null;

    public function __construct(#[AlfAttrParameterIsBool] AlfBoolGet|bool|null $value = null) {
        parent::__construct();
        $this->set($value);
    }

    /* getter */

    #[Pure]
    public function getValue() : ?bool {
        return $this->value;
    }

    /* setter */

    public function set(#[AlfAttrParameterIsBool] AlfBoolGet|bool|null $value) : static {
        $newValue = AlfProgramming::_()->valueToBool($value);
        if (is_null($newValue)) {
            $this->value = null;
            return $this;
        }
        $this->value = $this->_convertValueForSet($newValue);
        return $this;
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
