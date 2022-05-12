<?php

namespace Alf\Interfaces\Values;

use Alf\Interfaces\Strings\AlfStringGet;
use Alf\Types\Scalars\AlfStringMarkup;

interface AlfHumanData extends AlfStringGet {

    public function getAsHumanAlfStringMarkup() : AlfStringMarkup;

    public function getAsHumanString() : ?string;

}
