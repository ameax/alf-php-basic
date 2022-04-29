<?php

namespace Alf\Exceptions;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfPhpClassManager;
use Alf\Services\AlfProgramming;
use Exception;
use JetBrains\PhpStorm\ArrayShape;

abstract class AlfException extends Exception {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfException($obj) : AlfException {
        return AlfProgramming::_()->unused($obj);
    }

    public function getPhpParentClass() : ?string {
        return AlfPhpClassManager::_()->getParent($this);
    }

    #[ArrayShape(['class' => "string", 'parent' => "string", 'message' => "string", 'code' => "int|mixed", 'file' => "string", 'line' => "int"])]
    public function __debugInfo() : array {
        return [
            'class'   => static::class,
            'parent'  => $this->getPhpParentClass(),
            'message' => $this->getMessage(),
            'code'    => $this->getCode(),
            'file'    => $this->getFile(),
            'line'    => $this->getLine(),
        ];
    }

}
