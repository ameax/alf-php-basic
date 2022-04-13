<?php

namespace Alf\Types\Selects;

use Alf\AlfBasicTypeSelect;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Enums\AlfLanguageCodes;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfLanguageCode extends AlfBasicTypeSelect {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfLanguageCode($obj) : AlfLanguageCode {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeSelect($obj));
    }

    protected ?AlfLanguageCodes $value = null;

    public function getEnumClass() : string {
        return AlfLanguageCodes::class;
    }

    public function __construct(AlfLanguageCodes|null $value = null) {
        parent::__construct();
        $this->set($value);
    }

    /* getter */

    #[Pure]
    public function getValue() : ?AlfLanguageCodes {
        return $this->value;
    }

    /* setter */

    public function set(AlfLanguageCodes|null $value) : static {
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
        if ($this->_checkSimpleEnumCase(AlfLanguageCodes::getInGerman($value), $search)) {
            return true;
        }
        return parent::_getEnumValueByStringExt($value, $search);
    }

    protected function _setEnumValue($newValue) : void {
        $this->set($newValue);
    }

    /* class handling */

    #[Pure]
    protected function _convertValueForSet(AlfLanguageCodes $value) : ?AlfLanguageCodes {
        return $value;
    }

}
