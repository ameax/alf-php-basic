<?php

namespace Alf\Types\Scalars;

use Alf\AlfBasicTypeScalar;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsString;
use Alf\Interfaces\Strings\AlfCharGet;
use Alf\Interfaces\Strings\AlfCharLike;
use Alf\Interfaces\Strings\AlfCharLikeTrait;
use Alf\Interfaces\Strings\AlfStringGet;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Stringable;

class AlfChar extends AlfBasicTypeScalar implements AlfCharLike {

    use AlfCharLikeTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfChar($obj) : AlfChar {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeScalar($obj), static::_AlfCharLike($obj));
    }

    protected ?string $value = null;

    public function __construct(#[AlfAttrParameterIsString] AlfCharGet|AlfStringGet|Stringable|string|null $value = null) {
        parent::__construct();
        $this->set($value);
    }

    /* getter */

    #[Pure]
    public function getValue() : ?string {
        return $this->value;
    }

    /* setter */

    public function set(#[AlfAttrParameterIsString] AlfCharGet|AlfStringGet|Stringable|string|null $value) : static {
        $newValue = AlfProgramming::_()->valueToString($value);
        if (is_null($newValue)) {
            $this->value = null;
            return $this;
        }
        $this->value = $this->refManipulator()->getCharFirst($this->_convertValueForSet($newValue));
        return $this;
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
