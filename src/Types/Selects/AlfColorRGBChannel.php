<?php

namespace Alf\Types\Selects;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Enums\AlfColorRGBChannels;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfColorRGBChannel extends \Alf\AlfBasicTypeSelect {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfColorRGBChannel($obj) : AlfColorRGBChannel {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeSelect($obj));
    }

    protected ?AlfColorRGBChannels $value = null;

    public function getEnumClass() : string {
        return AlfColorRGBChannels::class;
    }

    public function __construct(AlfColorRGBChannels|null $value = null) {
        parent::__construct();
        $this->set($value);
    }

    /* getter */

    #[Pure]
    public function getValue() : ?AlfColorRGBChannels {
        return $this->value;
    }

    /* setter */

    public function set(AlfColorRGBChannels|null $value) : static {
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

    protected function _getEnumValueByString(string $search) : ?AlfColorRGBChannels {
        $tryFrom = AlfColorRGBChannels::tryFrom($search);
        if (!is_null($tryFrom)) {
            return $tryFrom;
        }

        // -
        foreach (AlfColorRGBChannels::cases() as $value) {
            if ($this->_checkSimpleEnumCase($value->value, $search) || $this->_checkSimpleEnumCase($value->name, $search)) {
                return $value;
            }
        }

        // -
        return null;
    }

    protected function _setEnumValue($newValue) : void {
        $this->set($newValue);
    }

    /* class handling */

    #[Pure]
    protected function _convertValueForSet(AlfColorRGBChannels $value) : ?AlfColorRGBChannels {
        return $value;
    }

}
