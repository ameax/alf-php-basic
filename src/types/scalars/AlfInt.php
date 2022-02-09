<?php

namespace Alf\AlfPhp\types\scalars;

use Alf\AlfPhp\AlfBasicTypeScalar;
use Alf\AlfPhp\attributes\AlfAttrAutoComplete;
use Alf\AlfPhp\attributes\AlfAttrParameterIsInt;
use Alf\AlfPhp\services\AlfProgramming;
use JetBrains\PhpStorm\Pure;

class AlfInt extends AlfBasicTypeScalar {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    #[Pure]
    public static function _AlfInt($obj) : AlfInt {
        return AlfProgramming::unused($obj, parent::_AlfBasicTypeScalar($obj));
    }

    protected ?int $value = null;

    public function __construct(#[AlfAttrParameterIsInt] int|null|AlfInt $value = null) {
        parent::__construct();
        $this->set($value);
    }

    public function set(#[AlfAttrParameterIsInt] int|null|AlfInt $value = null) : static {
        if (is_a($value, alfInt::class)) {
            if ($value->isNull()) {
                $this->value = null;
            } else {
                $this->value = $value->get();
            }
        } else {
            $this->value = $value;
        }
        return $this;
    }

    public function isNull() : bool {
        return is_null($this->value);
    }

    public function get() : int {
        return $this->value ?? 0;
    }

}
