<?php

namespace Alf\AlfPhp;

use Alf\AlfPhp\attributes\AlfAttrAutoComplete;
use JetBrains\PhpStorm\Pure;
use RuntimeException;

abstract class AlfBasicSingleton {

    private static array $_instances = [];

    final private function __construct() {
        $this->cTor();
    }

    protected function cTor() : void { }

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    #[Pure]
    public static function _AlfBasicSingleton($obj) : AlfBasicSingleton {
        return $obj;
    }

    public static function _() : static {
        if (!isset(static::$_instances[static::class])) {
            static::$_instances[static::class] = new static();
        }
        return static::$_instances[static::class];
    }

    public function __destruct() { }

    /**
     * @throws RuntimeException
     */
    final public function __clone() : void {
        throw new RuntimeException(__METHOD__);
    }

    /**
     * @throws RuntimeException
     */
    final public function __wakeup() : void {
        throw new RuntimeException(__METHOD__);
    }

    /**
     * @throws RuntimeException
     */
    final public function __sleep() : array {
        throw new RuntimeException(__METHOD__);
    }

    /**
     * @throws RuntimeException
     */
    final public function __serialize() : array {
        throw new RuntimeException(__METHOD__);
    }

    /**
     * @throws RuntimeException
     */
    final public function __unserialize(array $data) : void {
        throw new RuntimeException(__METHOD__);
    }

}
