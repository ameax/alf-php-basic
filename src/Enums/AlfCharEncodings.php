<?php

namespace Alf\Enums;

use Alf\Attributes\AlfAttrEnumValue;
use JetBrains\PhpStorm\Pure;

enum AlfCharEncodings: string {

    case ASCII = 'ASCII';
    case UTF8 = 'UTF-8';
    case ISO_8859_1 = 'ISO-8859-1';
    case ISO_8859_15 = 'ISO-8859-15';

    #[Pure]
    #[AlfAttrEnumValue]
    public function mysqlName() : string {
        return AlfCharEncodings::getMysqlName($this);
    }

    #[Pure]
    public static function getMysqlName(self $value) : string {
        return match ($value) {
            AlfCharEncodings::ASCII => 'ascii',
            AlfCharEncodings::UTF8 => 'utf8',
            AlfCharEncodings::ISO_8859_1 => 'latin1',
            AlfCharEncodings::ISO_8859_15 => 'latin9',
        };
    }

    #[Pure]
    #[AlfAttrEnumValue]
    public function mysqlCollate() : string {
        return AlfCharEncodings::getMysqlCollate($this);
    }

    #[Pure]
    public static function getMysqlCollate(self $value) : string {
        return match ($value) {
            AlfCharEncodings::ASCII => 'ascii_bin',
            AlfCharEncodings::UTF8 => 'utf8mb4_bin',
            AlfCharEncodings::ISO_8859_1 => 'latin1_bin',
            AlfCharEncodings::ISO_8859_15 => 'latin9_bin',
        };
    }

    #[Pure]
    #[AlfAttrEnumValue]
    public function mysqlCollateCI() : string {
        return AlfCharEncodings::getMysqlCollateCI($this);
    }

    #[Pure]
    public static function getMysqlCollateCI(self $value) : string {
        return match ($value) {
            AlfCharEncodings::ASCII => 'ascii_general_ci',
            AlfCharEncodings::UTF8 => 'utf8mb4_general_ci',
            AlfCharEncodings::ISO_8859_1 => 'latin1_general_ci',
            AlfCharEncodings::ISO_8859_15 => 'latin9_general_ci',
        };
    }

}
