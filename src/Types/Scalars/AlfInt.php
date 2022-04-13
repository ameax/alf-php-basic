<?php

namespace Alf\Types\Scalars;

use Alf\AlfBasicTypeScalar;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Interfaces\Integers\AlfIntGet;
use Alf\Interfaces\Integers\AlfIntLike;
use Alf\Interfaces\Integers\AlfIntLikeTrait;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class AlfInt extends AlfBasicTypeScalar implements AlfIntLike {

    use AlfIntLikeTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfInt($obj) : AlfInt {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeScalar($obj), static::_AlfIntLike($obj));
    }

    protected ?int $value = null;

    public function __construct(#[AlfAttrParameterIsInt] AlfIntGet|int|null $value = null) {
        parent::__construct();
        $this->set($value);
    }

    /* getter */

    #[Pure]
    public function getValue() : ?int {
        return $this->value;
    }

    /* setter */

    public function set(#[AlfAttrParameterIsInt] AlfIntGet|int|null $value) : static {
        $newValue = AlfProgramming::_()->valueToInt($value);
        if (is_null($newValue)) {
            $this->value = null;
            return $this;
        }
        $this->value = $this->_convertValueForSet($newValue);
        return $this;
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
