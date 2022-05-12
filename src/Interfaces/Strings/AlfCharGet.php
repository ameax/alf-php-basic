<?php

namespace Alf\Interfaces\Strings;

use JetBrains\PhpStorm\Pure;
use Stringable;

interface AlfCharGet extends Stringable {

    #[Pure]
    public function getAsString() : string;

    #[Pure]
    public function __toString() : string;

    public function getAsHtmlAttribute() : string;

    public function getAsHtmlInline(string $tag = null, $tagIsRequired = false) : string;

    public function getAsHtmlBlock(string $tag = null) : string;

}
