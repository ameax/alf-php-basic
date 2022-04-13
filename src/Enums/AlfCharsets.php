<?php

namespace Alf\Enums;

use Alf\Attributes\AlfAttrEnumValue;
use JetBrains\PhpStorm\Pure;

enum AlfCharsets: string {

    case ASCII = 'ASCII';
    case UTF8 = 'UTF-8';
    case ISO_8859_1 = 'ISO-8859-1';
    case ISO_8859_15 = 'ISO-8859-15';

    #[Pure]
    #[AlfAttrEnumValue]
    public function mysqlName() : string {
        return AlfCharsets::getMysqlName($this);
    }

    #[Pure]
    public static function getMysqlName(self $value) : string {
        return match ($value) {
            AlfCharsets::ASCII => 'ascii',
            AlfCharsets::UTF8 => 'utf8',
            AlfCharsets::ISO_8859_1 => 'latin1',
            AlfCharsets::ISO_8859_15 => 'latin9',
        };
    }

    #[Pure]
    #[AlfAttrEnumValue]
    public function mysqlCollate() : string {
        return AlfCharsets::getMysqlCollate($this);
    }

    #[Pure]
    public static function getMysqlCollate(self $value) : string {
        return match ($value) {
            AlfCharsets::ASCII => 'ascii_bin',
            AlfCharsets::UTF8 => 'utf8mb4_bin',
            AlfCharsets::ISO_8859_1 => 'latin1_bin',
            AlfCharsets::ISO_8859_15 => 'latin9_bin',
        };
    }

    #[Pure]
    #[AlfAttrEnumValue]
    public function mysqlCollateCI() : string {
        return AlfCharsets::getMysqlCollateCI($this);
    }

    #[Pure]
    public static function getMysqlCollateCI(self $value) : string {
        return match ($value) {
            AlfCharsets::ASCII => 'ascii_general_ci',
            AlfCharsets::UTF8 => 'utf8mb4_general_ci',
            AlfCharsets::ISO_8859_1 => 'latin1_general_ci',
            AlfCharsets::ISO_8859_15 => 'latin9_general_ci',
        };
    }

}
