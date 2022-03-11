<?php

namespace Alf\Enums;

use JetBrains\PhpStorm\Pure;

enum AlfCharsets: string {

    case UTF8 = 'UTF-8';
    case ISO_8859_1 = 'ISO-8859-1';
    case ISO_8859_15 = 'ISO-8859-15';

    #[Pure]
    public function mysqlName() : string {
        return alfCharsets::getMysqlName($this);
    }

    #[Pure]
    public static function getMysqlName(self $value) : string {
        return match ($value) {
            alfCharsets::UTF8 => 'utf8',
            alfCharsets::ISO_8859_1 => 'latin1',
            alfCharsets::ISO_8859_15 => 'latin9',
        };
    }

    #[Pure]
    public function mysqlCollate() : string {
        return alfCharsets::getMysqlCollate($this);
    }

    #[Pure]
    public static function getMysqlCollate(self $value) : string {
        return match ($value) {
            alfCharsets::UTF8 => 'utf8mb4_bin',
            alfCharsets::ISO_8859_1 => 'latin1_bin',
            alfCharsets::ISO_8859_15 => 'latin9_bin',
        };
    }

    #[Pure]
    public function mysqlCollateCI() : string {
        return alfCharsets::getMysqlCollateCI($this);
    }

    #[Pure]
    public static function getMysqlCollateCI(self $value) : string {
        return match ($value) {
            alfCharsets::UTF8 => 'utf8mb4_general_ci',
            alfCharsets::ISO_8859_1 => 'latin1_general_ci',
            alfCharsets::ISO_8859_15 => 'latin9_general_ci',
        };
    }

}
