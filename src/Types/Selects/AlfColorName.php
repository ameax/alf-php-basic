<?php

namespace Alf\Types\Selects;

use Alf\AlfBasicTypeSelect;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Enums\AlfColorNames;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfColorName extends AlfBasicTypeSelect {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfColorName($obj) : AlfColorName {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeSelect($obj));
    }

    protected ?AlfColorNames $value = null;

    public function getEnumClass() : string {
        return AlfColorNames::class;
    }

    public function __construct(AlfColorNames|null $value = null) {
        parent::__construct();
        $this->set($value);
    }

    /* getter */

    #[Pure]
    public function getValue() : ?AlfColorNames {
        return $this->value;
    }

    /* setter */

    public function set(AlfColorNames|null $value) : static {
        if (is_null($value)) {
            $this->value = null;
            return $this;
        }
        $this->value = $this->_convertValueForSet($value);
        return $this;
    }

    protected function _setToNull() : void {
        $this->set(null);
    }

    protected function _setEnumValue($newValue) : void {
        $this->set($newValue);
    }

    /* class handling */

    #[Pure]
    protected function _convertValueForSet(AlfColorNames $value) : ?AlfColorNames {
        return $value;
    }

}
