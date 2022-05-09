<?php

namespace Alf\Services;

use Alf\AlfBasicSingleton;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Exceptions\AlfExceptionRuntime;
use Alf\Types\Scalars\AlfCharW;
use Alf\Types\Scalars\AlfString;
use Alf\Types\Scalars\AlfStringW;
use JetBrains\PhpStorm\Pure;
use ReflectionClass;
use ReflectionException;

class AlfEnvironment extends AlfBasicSingleton {

    private static ?string $_instanceName = null;
    private AlfCharW       $humanNumbersDecimalSeparator;
    private AlfCharW       $humanNumbersThousandsSeparator;
    private AlfStringW     $humanTextYes;
    private AlfStringW     $humanTextNo;
    private AlfStringW     $humanTextTrue;
    private AlfStringW     $humanTextFalse;
    private AlfStringW     $humanTextEmpty;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfEnvironment($obj) : AlfEnvironment {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicSingleton($obj));
    }

    #[Pure]
    protected static function getInstanceName() : string {
        return 'Alf\Services::AlfEnvironment';
    }

    /**
     * @throws AlfExceptionRuntime
     */
    protected static function getInstanceObject() : static {
        $className = static::$_instanceName ?? static::class;
        try {
            $reflectionClass = new ReflectionClass($className);
            if ($reflectionClass->getName() !== AlfEnvironment::class && !$reflectionClass->isSubclassOf(AlfEnvironment::class)) {
                static::$_instanceName = null;
                throw new AlfExceptionRuntime(__METHOD__.' - $_instanceName must be a '.AlfEnvironment::class);
            }
        } catch (ReflectionException $exception) {
            static::$_instanceName = null;
            throw new AlfExceptionRuntime(__METHOD__.' - ReflectionException: '.$exception->getMessage());
        }
        return new $className();
    }

    public static function setInstanceObjectName(string $instanceName = null) : void {
        static::$_instanceName = $instanceName;
        static::_reset();
    }

    protected function cTor() : void {
        parent::cTor();
        $this->humanNumbersDecimalSeparator = new AlfCharW();
        $this->humanNumbersThousandsSeparator = new AlfCharW();
        $this->humanTextYes = new AlfStringW();
        $this->humanTextNo = new AlfStringW();
        $this->humanTextTrue = new AlfStringW();
        $this->humanTextFalse = new AlfStringW();
        $this->humanTextEmpty = new AlfStringW();
        $this->reInit();
    }

    public function reInit() : void {
        $this->refHumanNumbersDecimalSeparator()->setFromString('.');
        $this->refHumanNumbersThousandsSeparator()->setFromString(',');
        $this->refHumanTextYes()->setFromString('yes');
        $this->refHumanTextNo()->setFromString('no');
        $this->refHumanTextTrue()->setFromString('true');
        $this->refHumanTextFalse()->setFromString('false');
        $this->refHumanTextEmpty()->setFromString('empty');
    }

    public function refHumanNumbersDecimalSeparator() : AlfCharW {
        return $this->humanNumbersDecimalSeparator;
    }

    public function refHumanNumbersThousandsSeparator() : AlfCharW {
        return $this->humanNumbersThousandsSeparator;
    }

    public function refHumanTextYes() : AlfStringW {
        return $this->humanTextYes;
    }

    public function refHumanTextNo() : AlfStringW {
        return $this->humanTextNo;
    }

    public function refHumanTextTrue() : AlfStringW {
        return $this->humanTextTrue;
    }

    public function refHumanTextFalse() : AlfStringW {
        return $this->humanTextFalse;
    }

    public function refHumanTextEmpty() : AlfStringW {
        return $this->humanTextEmpty;
    }

}
