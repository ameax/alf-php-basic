<?php

namespace Alf\Types\Selects;

use Alf\AlfBasicTypeSelect;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Enums\AlfCountries;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfCountry extends AlfBasicTypeSelect {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfCountry($obj) : AlfCountry {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeSelect($obj));
    }

    protected ?AlfCountries $value = null;

    public function getEnumClass() : string {
        return AlfCountries::class;
    }

    public function __construct(AlfCountries|null $value = null) {
        parent::__construct();
        $this->set($value);
    }

    /* getter */

    #[Pure]
    public function getValue() : ?AlfCountries {
        return $this->value;
    }

    /* setter */

    public function set(AlfCountries|null $value) : static {
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

    protected function _getEnumValueByStringExt($value, string $search) : bool {
        if ($this->_checkSimpleEnumCase(AlfCountries::getInGerman($value), $search)) {
            return true;
        }
        return parent::_getEnumValueByStringExt($value, $search);
    }

    protected function _setEnumValue($newValue) : void {
        $this->set($newValue);
    }

    /* class handling */

    #[Pure]
    protected function _convertValueForSet(AlfCountries $value) : ?AlfCountries {
        return $value;
    }

}
