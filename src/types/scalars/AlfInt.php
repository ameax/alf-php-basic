<?php

namespace Alf\Types\Scalars;

use Alf\AlfBasicTypeScalar;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Interfaces\Values\AlfNullWork;
use Alf\Interfaces\Values\AlfNullWorkTrait;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfInt extends AlfBasicTypeScalar implements AlfNullWork {

    use AlfNullWorkTrait;

    protected ?int $value = null;

    public function __construct(#[AlfAttrParameterIsInt] int|null|AlfInt $value = null) {
        parent::__construct();
        $this->set($value);
    }

    public function set(#[AlfAttrParameterIsInt] int|null|AlfInt $value) : static {
        $this->value = AlfProgramming::_()->valueToInt($value);
        return $this;
    }

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfInt($obj) : AlfInt {
        return AlfProgramming::_()->unused($obj, parent::_AlfBasicTypeScalar($obj), static::_AlfNullGet($obj));
    }

    #[Pure]
    public function get() : int {
        return $this->getValue() ?? 0;
    }

    #[Pure]
    public function getValue() : ?int {
        return $this->value;
    }

    public function setToNull() : static {
        $this->set(null);
        return $this;
    }

}
