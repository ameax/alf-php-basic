<?php

namespace Alf;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Services\AlfPhpClassManager;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\ArrayShape;

// https://www.php.net/manual/de/class.stringable
// https://www.php.net/manual/de/class.countable.php
// https://www.php.net/manual/de/class.arrayaccess.php
// https://www.php.net/manual/de/class.serializable.php

abstract class AlfBasicClass {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfBasicClass($obj) : AlfBasicClass {
        return AlfProgramming::_()->unused($obj);
    }

    public function __construct() {
        foreach (array_reverse($this->listPhpTraits()) as $traitName) {
            $callCTorFunc = '_'.$traitName.'CTor';
            $this->$callCTorFunc();
        }
    }

    public function __destruct() {
        foreach ($this->listPhpTraits() as $traitName) {
            $callDTorFunc = '_'.$traitName.'DTor';
            $this->$callDTorFunc();
        }
    }

    public function __clone() {
        foreach (array_reverse($this->listPhpTraits()) as $traitName) {
            $callCloneFunc = '_'.$traitName.'Clone';
            $this->$callCloneFunc();
        }
    }
    // TODO: public function __wakeup() : void
    // TODO: public function __sleep() : array
    // TODO: public function __serialize() : array
    // TODO: public function __unserialize(array $data) : void

    public function getPhpParentClass() : ?string {
        return AlfPhpClassManager::_()->getParent($this);
    }

    public function listPhpParentClasses() : array {
        return AlfPhpClassManager::_()->listParents($this);
    }

    public function listPhpTraits() : array {
        return AlfPhpClassManager::_()->listTraits($this);
    }

    #[ArrayShape(['class' => "string", 'parent' => "string"])]
    public function __debugInfo() : array {
        return [
            'class'  => static::class,
            'parent' => $this->getPhpParentClass(),
        ];
    }

}
