<?php

namespace Alf\Enums;

use Alf\Attributes\AlfAttrEnumValue;
use JetBrains\PhpStorm\Pure;

enum AlfLanguageCodes: string {

    case GERMAN = 'de';
    case ENGLISH = 'en';

    #[Pure]
    #[AlfAttrEnumValue]
    public function inGerman() : string {
        return AlfLanguageCodes::getInGerman($this);
    }

    #[Pure]
    public static function getInGerman(self $value) : string {
        return match ($value) {
            AlfLanguageCodes::GERMAN => 'Deutsch',
            AlfLanguageCodes::ENGLISH => 'Englisch',
        };
    }

}
