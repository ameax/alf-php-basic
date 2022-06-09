<?php

namespace Alf\Services;

use Alf\AlfBasicSingleton;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Enums\AlfLanguageCodes;
use Alf\Exceptions\AlfExceptionRuntime;
use Alf\Types\Scalars\AlfCharW;
use Alf\Types\Scalars\AlfStringMarkup;
use Alf\Types\Structures\AlfLanguage;
use JetBrains\PhpStorm\Pure;
use ReflectionClass;
use ReflectionException;

class AlfEnvironment extends AlfBasicSingleton {

    private static ?string  $_instanceName = null;
    private AlfCharW        $humanNumbersDecimalSeparator;
    private AlfCharW        $humanNumbersThousandsSeparator;
    private AlfStringMarkup $humanTextYes;
    private AlfStringMarkup $humanTextNo;
    private AlfStringMarkup $humanTextTrue;
    private AlfStringMarkup $humanTextFalse;
    private AlfStringMarkup $humanTextEmpty;
    private AlfLanguage     $pageLanguage;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfEnvironment($obj) : AlfEnvironment {
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
        $this->humanTextYes = new AlfStringMarkup();
        $this->humanTextNo = new AlfStringMarkup();
        $this->humanTextTrue = new AlfStringMarkup();
        $this->humanTextFalse = new AlfStringMarkup();
        $this->humanTextEmpty = new AlfStringMarkup();
        $this->pageLanguage = new AlfLanguage();
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
        $this->refPageLanguage()->refLanguageCode()->set(AlfLanguageCodes::ENGLISH);
        $this->refPageLanguage()->refCountry()->setToNull();
    }

    public function refHumanNumbersDecimalSeparator() : AlfCharW {
        return $this->humanNumbersDecimalSeparator;
    }

    public function refHumanNumbersThousandsSeparator() : AlfCharW {
        return $this->humanNumbersThousandsSeparator;
    }

    public function refHumanTextYes() : AlfStringMarkup {
        return $this->humanTextYes;
    }

    public function refHumanTextNo() : AlfStringMarkup {
        return $this->humanTextNo;
    }

    public function refHumanTextTrue() : AlfStringMarkup {
        return $this->humanTextTrue;
    }

    public function refHumanTextFalse() : AlfStringMarkup {
        return $this->humanTextFalse;
    }

    public function refHumanTextEmpty() : AlfStringMarkup {
        return $this->humanTextEmpty;
    }

    public function refPageLanguage() : AlfLanguage {
        return $this->pageLanguage;
    }

}
