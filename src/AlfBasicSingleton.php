<?php

namespace Alf;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Exceptions\AlfExceptionRuntime;
use Alf\Services\AlfProgramming;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

abstract class AlfBasicSingleton {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfBasicSingleton($obj) : AlfBasicSingleton {
        return AlfProgramming::_()->unused($obj);
    }

    private static array $_instances = [];

    public static function _() : static {
        if (!isset(static::$_instances[static::getInstanceName()])) {
            static::$_instances[static::getInstanceName()] = new static();
        }
        return static::$_instances[static::getInstanceName()];
    }

    #[Pure]
    final protected static function getInstanceName() : string {
        return static::class;
    }

    final private function __construct() {
        $this->cTor();
    }

    protected function cTor() : void { }

    public function __destruct() { }

    /**
     * @throws AlfExceptionRuntime
     */
    final public function __clone() : void {
        throw new AlfExceptionRuntime(__METHOD__);
    }

    /**
     * @throws AlfExceptionRuntime
     */
    final public function __wakeup() : void {
        throw new AlfExceptionRuntime(__METHOD__);
    }

    /**
     * @throws AlfExceptionRuntime
     */
    final public function __sleep() : array {
        throw new AlfExceptionRuntime(__METHOD__);
    }

    /**
     * @throws AlfExceptionRuntime
     */
    final public function __serialize() : array {
        throw new AlfExceptionRuntime(__METHOD__);
    }

    /**
     * @throws AlfExceptionRuntime
     */
    final public function __unserialize(array $data) : void {
        throw new AlfExceptionRuntime(__METHOD__);
    }

    #[ArrayShape(['class' => "string"])]
    public function __debugInfo() : array {
        return [
            'class' => static::class,
        ];
    }

}
