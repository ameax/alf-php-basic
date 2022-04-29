<?php

namespace Alf\Interfaces\Properties;

use Alf\Enums\AlfCharEncodings;
use Alf\Types\Selects\AlfCharEncoding;
use JetBrains\PhpStorm\Pure;

interface AlfCharEncodingProperty {

    #[Pure]
    public function refCharset() : ?AlfCharEncoding;

    #[Pure]
    public function getCharsetValue() : ?AlfCharEncodings;

}
