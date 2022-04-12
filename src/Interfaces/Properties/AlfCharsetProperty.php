<?php

namespace Alf\Interfaces\Properties;

use Alf\Enums\AlfCharsets;
use Alf\Types\Selects\AlfCharset;
use JetBrains\PhpStorm\Pure;

interface AlfCharsetProperty {

    #[Pure]
    public function refCharset() : ?AlfCharset;

    #[Pure]
    public function getCharsetValue() : ?AlfCharsets;

}
