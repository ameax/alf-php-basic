<?php

namespace Alf\Types\Enhanced\Colors;

use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Enums\AlfColorRGBChannels;
use Alf\Interfaces\Integers\AlfIntGet;
use Alf\Services\AlfProgramming;
use Alf\Types\Scalars\AlfInt24U;
use Alf\Types\Scalars\AlfStringMarkup;
use JetBrains\PhpStorm\Pure;

class AlfColorRGB extends AlfInt24U {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfColorRGB($obj) : AlfColorRGB {
        return AlfProgramming::_()->unused($obj, static::_AlfInt24U($obj));
    }

    public function setRGBInt(int $red, int $green, int $blue) : static {
        $useRGB = $red;
        $useRGB = ($useRGB << 8) + $green;
        $useRGB = ($useRGB << 8) + $blue;

        // -
        return $this->set($useRGB);
    }

    public function setRGB(#[AlfAttrParameterIsInt] AlfIntGet|int|null $red, #[AlfAttrParameterIsInt] AlfIntGet|int|null $green, #[AlfAttrParameterIsInt] AlfIntGet|int|null $blue) : static {
        $useRed = (new AlfColorRGBValue($red))->getAsInt();
        $useGreen = (new AlfColorRGBValue($green))->getAsInt();
        $useBlue = (new AlfColorRGBValue($blue))->getAsInt();
        return $this->setRGBInt($useRed, $useGreen, $useBlue);
    }

    public function setGray(#[AlfAttrParameterIsInt] AlfIntGet|int|null $gray) : static {
        $useGray = (new AlfColorRGBValue($gray))->getAsInt();
        return $this->setRGBInt($useGray, $useGray, $useGray);
    }

    #[Pure]
    public function getRed() : AlfColorRGBValue {
        if ($this->isNull()) {
            return new AlfColorRGBValue();
        }
        return new AlfColorRGBValue(($this->getAsInt() >> 16) & 0xFF);
    }

    public function refRed() : AlfColorRGBRef {
        return new AlfColorRGBRef($this, AlfColorRGBChannels::RED);
    }

    public function setRed(#[AlfAttrParameterIsInt] AlfIntGet|int|null $red) : static {
        $useRed = (new AlfColorRGBValue($red))->getAsInt();
        $useGreen = $this->getGreen()->getAsInt();
        $useBlue = $this->getBlue()->getAsInt();
        return $this->setRGBInt($useRed, $useGreen, $useBlue);
    }

    #[Pure]
    public function getGreen() : AlfColorRGBValue {
        if ($this->isNull()) {
            return new AlfColorRGBValue();
        }
        return new AlfColorRGBValue(($this->getAsInt() >> 8) & 0xFF);
    }

    public function refGreen() : AlfColorRGBRef {
        return new AlfColorRGBRef($this, AlfColorRGBChannels::GREEN);
    }

    public function setGreen(#[AlfAttrParameterIsInt] AlfIntGet|int|null $green) : static {
        $useRed = $this->getRed()->getAsInt();
        $useGreen = (new AlfColorRGBValue($green))->getAsInt();
        $useBlue = $this->getBlue()->getAsInt();
        return $this->setRGBInt($useRed, $useGreen, $useBlue);
    }

    #[Pure]
    public function getBlue() : AlfColorRGBValue {
        if ($this->isNull()) {
            return new AlfColorRGBValue();
        }
        return new AlfColorRGBValue($this->getAsInt() & 0xFF);
    }

    public function refBlue() : AlfColorRGBRef {
        return new AlfColorRGBRef($this, AlfColorRGBChannels::BLUE);
    }

    public function setBlue(#[AlfAttrParameterIsInt] AlfIntGet|int|null $blue) : static {
        $useRed = $this->getRed()->getAsInt();
        $useGreen = $this->getGreen()->getAsInt();
        $useBlue = (new AlfColorRGBValue($blue))->getAsInt();
        return $this->setRGBInt($useRed, $useGreen, $useBlue);
    }

    #[Pure]
    public function getAsStringCssRGB() : string {
        if ($this->isNull()) {
            return 'transparent';
        }
        return 'rgb('.$this->getRed()->getAsInt()
               .','.$this->getGreen()->getAsInt()
               .','.$this->getBlue()->getAsInt().')';
    }

    #[Pure]
    public function getAsStringCssHex(bool $allowShort = true) : string {
        if ($this->isNull()) {
            return 'transparent';
        }

        // -
        $valHex = substr('000000'.dechex($this->getAsInt()), -6);
        if ($allowShort && ($valHex[0] === $valHex[1]) && ($valHex[2] === $valHex[3]) && ($valHex[4] === $valHex[5])) {
            return '#'.$valHex[0].$valHex[2].$valHex[4];
        }
        return '#'.$valHex;
    }

    #[Pure]
    public function getAsString() : string {
        if ($this->isNull()) {
            return '';
        }
        return $this->getAsStringCssHex();
    }

    public function getAsHumanAlfStringMarkup() : AlfStringMarkup {
        if ($this->isNull()) {
            return new AlfStringMarkup();
        }
        return new AlfStringMarkup($this->getAsStringCssHex(false));
    }

}
