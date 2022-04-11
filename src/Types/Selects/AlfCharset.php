<?php

namespace Alf\Types\Selects;

use Alf\AlfBasicTypeSelect;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Enums\AlfCharsets;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfCharset extends AlfBasicTypeSelect {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfCharset($obj) : AlfCharset {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeSelect($obj));
    }

    protected ?AlfCharsets $value = null;

    public function getEnumClass() : string {
        return AlfCharsets::class;
    }

    public function __construct(AlfCharsets|null $value = null) {
        parent::__construct();
        $this->set($value);
    }

    /* getter */

    #[Pure]
    public function getValue() : ?AlfCharsets {
        return $this->value;
    }

    /* setter */

    public function set(AlfCharsets|null $value) : static {
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
        if ($this->_checkSimpleEnumCase(alfCharsets::getMysqlName($value), $search)) {
            return true;
        }
        if ($this->_checkSimpleEnumCase(alfCharsets::getMysqlCollate($value), $search)) {
            return true;
        }
        if ($this->_checkSimpleEnumCase(alfCharsets::getMysqlCollateCI($value), $search)) {
            return true;
        }
        return parent::_getEnumValueByStringExt($value, $search);
    }

    protected function _setEnumValue($newValue) : void {
        $this->set($newValue);
    }

    /* class handling */

    #[Pure]
    protected function _convertValueForSet(AlfCharsets $value) : ?AlfCharsets {
        return $value;
    }

}
