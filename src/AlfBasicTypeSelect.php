<?php

namespace Alf;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsString;
use Alf\Interfaces\Strings\AlfCharGet;
use Alf\Interfaces\Strings\AlfStringGet;
use Alf\Interfaces\Strings\AlfStringGetTrait;
use Alf\Interfaces\Strings\AlfStringSet;
use Alf\Interfaces\Strings\AlfStringSetTrait;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Stringable;

abstract class AlfBasicTypeSelect extends AlfBasicTypeScalar implements AlfStringGet, AlfStringSet { // No AlfStringWork, we can only set and get

    use AlfStringGetTrait, AlfStringSetTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfBasicTypeSelect($obj) : AlfBasicTypeSelect {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeScalar($obj));
    }

    protected bool $stateEmpty = false;

    abstract public function getEnumClass() : string;

    /* setter */

    abstract protected function _setToNull() : void;

    protected function _getEnumValueByStringExt($value, string $search) : bool {
        AlfProgramming::_()->unused($value, $search);
        return false;
    }

    protected function _getEnumValueByString(string $search) {
        $enumClass = $this->getEnumClass();

        // -
        $tryFrom = $enumClass::tryFrom($search);
        if (!is_null($tryFrom)) {
            return $tryFrom;
        }

        // -
        foreach ($enumClass::cases() as $value) {
            if ($this->_checkSimpleEnumCase($value->value, $search) || $this->_checkSimpleEnumCase($value->name, $search)) {
                return $value;
            }
            if ($this->_getEnumValueByStringExt($value, $search)) {
                return $value;
            }
        }

        // -
        return null;
    }

    abstract protected function _setEnumValue($newValue) : void;

    final public function setToNull() : static {
        $this->_setToNull();
        $this->stateEmpty = false;
        return $this;
    }

    final public function setToEmpty() : static {
        $this->_setToNull();
        $this->stateEmpty = true;
        return $this;
    }

    public function setFromString(#[AlfAttrParameterIsString] AlfCharGet|AlfStringGet|Stringable|string|null $value) : static {
        $newValue = AlfProgramming::_()->valueToString($value);
        if (is_null($newValue)) {
            return $this->setToNull();
        }
        if ($newValue === '') {
            return $this->setToEmpty();
        }
        $tryEnumValue = $this->_getEnumValueByString($newValue);
        if (is_null($tryEnumValue)) {
            return $this->setToEmpty();
        }
        $this->_setEnumValue($tryEnumValue);
        return $this;
    }

    /* getter */

    #[Pure]
    final public function isEmpty() : bool {
        return $this->stateEmpty;
    }

    #[Pure]
    final public function isNull() : bool {
        if ($this->isEmpty()) {
            return false;
        }
        return parent::isNull();
    }

    #[Pure]
    final public function isNullOrEmpty() : bool {
        if ($this->stateEmpty) {
            return true;
        }
        return is_null($this->getValue());
    }

    #[Pure]
    final public function getAsString() : string {
        return $this->getValue()?->value ?? $this->getEmptyValue();
    }

    /* definitions */

    #[Pure]
    public function getEmptyValue() : string {
        return '';
    }

    /* helpers */

    final protected function _checkSimpleEnumCase(string $caseString, string $searchString) : bool {
        $cases = [];
        $this->_makeSimpleEnumCases($cases, $caseString);
        $searches = [];
        $this->_makeSimpleEnumCases($searches, $searchString);

        // -
        foreach ($cases as $case) {
            foreach ($searches as $search) {
                if ($case !== $search) {
                    continue;
                }
                return true;
            }
        }

        // -
        return false;
    }

    final protected function _makeSimpleEnumCases(array &$tryValues, string $case) : void {
        $useValue = strtolower($case); // TODO: AlfStringW
        $tryValues[$useValue] = $useValue;

        // -
        $useValue = preg_replace('#[^a-z0-9]#', '', $useValue);
        $tryValues[$useValue] = $useValue;
    }

    /* DEBUG */

    #[ArrayShape(['class' => "string", 'parent' => "string", 'string' => "string", 'value' => "\Alf\Enums\AlfCharsets|null|string"])]
    public function __debugInfo() : array {
        $output = parent::__debugInfo();
        $output['value'] = ($this->isNull() ? '-NULL-' : $this->getValue());
        $output['string'] = ($this->isNull() ? '-NULL-' : $this->getAsString());
        return $output;
    }

}
