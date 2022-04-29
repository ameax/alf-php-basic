<?php

namespace Alf\Types\Selects;

use Alf\AlfBasicTypeSelect;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Enums\AlfCharEncodings;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfCharEncoding extends AlfBasicTypeSelect {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfCharEncoding($obj) : AlfCharEncoding {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeSelect($obj));
    }

    protected ?AlfCharEncodings $value = null;

    public function getEnumClass() : string {
        return AlfCharEncodings::class;
    }

    public function __construct(AlfCharEncodings|null $value = null) {
        parent::__construct();
        $this->set($value);
    }

    /* getter */

    #[Pure]
    public function getValue() : ?AlfCharEncodings {
        return $this->value;
    }

    /* setter */

    public function set(AlfCharEncodings|null $value) : static {
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
        if ($this->_checkSimpleEnumCase(AlfCharEncodings::getMysqlName($value), $search)) {
            return true;
        }
        if ($this->_checkSimpleEnumCase(AlfCharEncodings::getMysqlCollate($value), $search)) {
            return true;
        }
        if ($this->_checkSimpleEnumCase(AlfCharEncodings::getMysqlCollateCI($value), $search)) {
            return true;
        }
        return parent::_getEnumValueByStringExt($value, $search);
    }

    protected function _setEnumValue($newValue) : void {
        $this->set($newValue);
    }

    /* class handling */

    #[Pure]
    protected function _convertValueForSet(AlfCharEncodings $value) : ?AlfCharEncodings {
        return $value;
    }

}
