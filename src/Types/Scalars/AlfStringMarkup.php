<?php

namespace Alf\Types\Scalars;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfProgramming;

class AlfStringMarkup extends AlfStringW {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfStringMarkup($obj) : AlfStringMarkup {
        return AlfProgramming::_()->unused($obj, static::_AlfStringW($obj));
    }

    public function getAsHumanAlfStringMarkup() : AlfStringMarkup {
        return clone $this;
    }

}
