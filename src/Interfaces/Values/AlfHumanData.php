<?php

namespace Alf\Interfaces\Values;

use Alf\Types\Scalars\AlfStringMarkup;

interface AlfHumanData {

    public function getAsHumanAlfStringMarkup() : AlfStringMarkup;

    public function getAsHumanString() : ?string;

}
