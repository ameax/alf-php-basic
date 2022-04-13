<?php

namespace Alf\Enums;

use Alf\Attributes\AlfAttrEnumValue;
use JetBrains\PhpStorm\Pure;

enum AlfCountries: string {

    case GERMANY = 'DE';
    case AUSTRIA = 'AT';
    case SWISS = 'CH';

    #[Pure]
    #[AlfAttrEnumValue]
    public function inGerman() : string {
        return AlfCountries::getInGerman($this);
    }

    #[Pure]
    public static function getInGerman(self $value) : string {
        return match ($value) {
            AlfCountries::GERMANY => 'Deutschland',
            AlfCountries::AUSTRIA => 'Österreich',
            AlfCountries::SWISS => 'Schweiz',
        };
    }

}
