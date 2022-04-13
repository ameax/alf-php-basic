<?php

namespace Alf\Types\Structures;

use Alf\AlfBasicTypeStructure;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Enums\AlfCountries;
use Alf\Enums\AlfLanguageCodes;
use Alf\Interfaces\Strings\AlfStringGet;
use Alf\Interfaces\Strings\AlfStringGetTrait;
use Alf\Services\AlfProgramming;
use Alf\Types\Selects\AlfCountry;
use Alf\Types\Selects\AlfLanguageCode;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class AlfLanguage extends AlfBasicTypeStructure implements AlfStringGet {

    use AlfStringGetTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfLanguage($obj) : AlfLanguage {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeStructure($obj));
    }

    private AlfLanguageCode $languageCode;
    private AlfCountry      $country;

    public function __construct(AlfLanguageCodes|null $languageCode = null, AlfCountries|null $country = null) {
        parent::__construct();
        $this->languageCode = new AlfLanguageCode($languageCode);
        $this->country = new AlfCountry($country);
    }

    public function __clone() {
        parent::__clone();
        $this->languageCode = clone $this->languageCode;
        $this->country = clone $this->country;
    }

    public function refLanguageCode() : AlfLanguageCode {
        return $this->languageCode;
    }

    public function refCountry() : AlfCountry {
        return $this->country;
    }

    #[Pure]
    public function getAsString() : string {
        if ($this->refLanguageCode()->isNullOrEmpty()) {
            return '';
        }
        $output = (string)$this->refLanguageCode();
        if (!$this->refCountry()->isNullOrEmpty()) {
            $output .= '_'.$this->refCountry();
        }
        return $output;
    }

    #[ArrayShape(['class' => "string", 'parent' => "string", 'country' => "array", 'languageCode' => "array"])]
    public function __debugInfo() : array {
        $output = parent::__debugInfo();
        $output['languageCode'] = $this->refLanguageCode()->__debugInfo();
        $output['country'] = $this->refCountry()->__debugInfo();
        return $output;
    }

}
