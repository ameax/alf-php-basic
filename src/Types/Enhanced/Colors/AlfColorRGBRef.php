<?php

namespace Alf\Types\Enhanced\Colors;

use Alf\AlfBasicTypeScalar;
use Alf\Attributes\AlfAttrAutoComplete;
use Alf\Attributes\AlfAttrClassIsRef;
use Alf\Attributes\AlfAttrParameterIsInt;
use Alf\Enums\AlfColorRGBChannels;
use Alf\Interfaces\Integers\AlfIntGet;
use Alf\Interfaces\Integers\AlfIntLike;
use Alf\Interfaces\Integers\AlfIntLikeTrait;
use Alf\Services\AlfProgramming;
use Alf\Types\Selects\AlfColorRGBChannel;
use JetBrains\PhpStorm\Pure;

#[AlfAttrClassIsRef]
class AlfColorRGBRef extends AlfBasicTypeScalar implements AlfIntLike {

    use AlfIntLikeTrait;

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    final public static function _AlfColorRGBRef($obj) : AlfColorRGBRef {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicTypeScalar($obj), static::_AlfIntLike($obj));
    }

    private AlfColorRGBChannel $rgbChannel;

    public function __construct(
        private ?AlfColorRGB $alfColorRGB = null,
        ?AlfColorRGBChannels $channel = null,
    ) {
        parent::__construct();
        $this->rgbChannel = new AlfColorRGBChannel($channel);
    }

    public function __clone() {
        parent::__clone();
        // NOPE: $this->alfColorRGB
        $this->rgbChannel = clone $this->rgbChannel;
    }

    /* ref */

    public function setAlfColorRGB(AlfColorRGB|null $refColorRGB = null) : static {
        $this->alfColorRGB = $refColorRGB;
        return $this;
    }

    #[Pure]
    public function hasRefAlfColorRGB() : bool {
        return !is_null($this->alfColorRGB);
    }

    /* Channel */

    public function setChannel(AlfColorRGBChannels $channel) : static {
        $this->rgbChannel->set($channel);
        return $this;
    }

    /* working */

    #[Pure]
    public function canWork() : bool {
        return $this->hasRefAlfColorRGB() && (!$this->rgbChannel->isNullOrEmpty());
    }

    /* getter */

    #[Pure]
    public function getValue() : ?int {
        if (!$this->canWork()) {
            return null;
        }
        return match ($this->rgbChannel->getValue()) {
            AlfColorRGBChannels::RED => $this->alfColorRGB->getRed()->getValue(),
            AlfColorRGBChannels::GREEN => $this->alfColorRGB->getGreen()->getValue(),
            AlfColorRGBChannels::BLUE => $this->alfColorRGB->getBlue()->getValue(),
            default => 0,
        };
    }

    #[Pure]
    public function isNull() : bool {
        if (!$this->canWork()) {
            return true;
        }
        if ($this->alfColorRGB->isNull()) {
            return true;
        }
        return parent::isNull();
    }

    #[Pure]
    public function isEmpty() : bool {
        if (!$this->canWork()) {
            return false;
        }
        if ($this->alfColorRGB->isEmpty()) {
            return true;
        }
        return parent::isEmpty();
    }

    /* setter */

    public function set(#[AlfAttrParameterIsInt] int|AlfIntGet|null $value) : static {
        if (!$this->canWork()) {
            return $this;
        }

        // -
        switch ($this->rgbChannel->getValue()) {
            case AlfColorRGBChannels::RED:
                $this->alfColorRGB->setRed($value);
                break;
            case AlfColorRGBChannels::GREEN:
                $this->alfColorRGB->setGreen($value);
                break;
            case AlfColorRGBChannels::BLUE:
                $this->alfColorRGB->setBlue($value);
                break;
        }

        // -
        return $this;
    }

}
