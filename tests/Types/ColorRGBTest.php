<?php

use Alf\Enums\AlfColorRGBChannels;
use Alf\Types\Enhanced\Colors\AlfColorRGB;
use Alf\Types\Enhanced\Colors\AlfColorRGBRef;
use Alf\Types\Enhanced\Colors\AlfColorRGBValue;
use Alf\Types\Scalars\AlfInt;

test('AlfColorRGB basic functions',
    function () : void {
        $color1 = new AlfColorRGB();
        $this->assertTrue($color1->isNull(),
                          '(1c) color1->isNull()');
        $this->assertFalse($color1->isEmpty(),
                           '(1c) color1->isEmpty()');
        $this->assertTrue($color1->getRed()->isNull(),
                          '(1r) color1->getRed()->isNull()');
        $this->assertFalse($color1->getRed()->isEmpty(),
                           '(1r) color1->getRed()->isEmpty()');
        $this->assertTrue($color1->getGreen()->isNull(),
                          '(1g) color1->getGreen()->isNull()');
        $this->assertFalse($color1->getGreen()->isEmpty(),
                           '(1g) color1->getGreen()->isEmpty()');
        $this->assertTrue($color1->getBlue()->isNull(),
                          '(1b) color1->getBlue()->isNull()');
        $this->assertFalse($color1->getBlue()->isEmpty(),
                           '(1b) color1->getBlue()->isEmpty()');

        // -
        $color1->setGray(0);
        $this->assertFalse($color1->isNull(),
                           '(2c) color1->isNull()');
        $this->assertTrue($color1->isEmpty(),
                          '(2c) color1->isEmpty()');
        $this->assertFalse($color1->getRed()->isNull(),
                           '(2r) color1->getRed()->isNull()');
        $this->assertTrue($color1->getRed()->isEmpty(),
                          '(2r) color1->getRed()->isEmpty()');
        $this->assertFalse($color1->getGreen()->isNull(),
                           '(2g) color1->getGreen()->isNull()');
        $this->assertTrue($color1->getGreen()->isEmpty(),
                          '(2g) color1->getGreen()->isEmpty()');
        $this->assertFalse($color1->getBlue()->isNull(),
                           '(2b) color1->getBlue()->isNull()');
        $this->assertTrue($color1->getBlue()->isEmpty(),
                          '(2b) color1->getBlue()->isEmpty()');

        // -
        $color1->setGray(1);
        $this->assertFalse($color1->isNull(),
                           '(3c) color1->isNull()');
        $this->assertFalse($color1->isEmpty(),
                           '(3c) color1->isEmpty()');
        $this->assertFalse($color1->getRed()->isNull(),
                           '(3r) color1->getRed()->isNull()');
        $this->assertFalse($color1->getRed()->isEmpty(),
                           '(3r) color1->getRed()->isEmpty()');
        $this->assertFalse($color1->getGreen()->isNull(),
                           '(3g) color1->getGreen()->isNull()');
        $this->assertFalse($color1->getGreen()->isEmpty(),
                           '(3g) color1->getGreen()->isEmpty()');
        $this->assertFalse($color1->getBlue()->isNull(),
                           '(3b) color1->getBlue()->isNull()');
        $this->assertFalse($color1->getBlue()->isEmpty(),
                           '(3b) color1->getBlue()->isEmpty()');
    });

test('AlfColorRGBRef check',
    function () : void {
        // -
        $color2 = new AlfColorRGB();
        $color2->setRGB(10, 20, 30);

        $colorValue = new AlfColorRGBRef();
        $this->assertTrue($colorValue->isNull(),
                          '(5a) colorValue()->isNull()');
        $this->assertFalse($colorValue->isEmpty(),
                           '(5a) colorValue()->isEmpty()');
        $this->assertTrue($colorValue->isNullOrEmpty(),
                          '(5a) colorValue()->isNullOrEmpty()');
        $this->assertNull($colorValue->getValue(),
                          '(5a) colorValue()->getValue()!==NULL');

        // -
        $colorValue->set(35);
        $this->assertTrue($colorValue->isNull(),
                          '(5b) colorValue()->isNull()');
        $this->assertFalse($colorValue->isEmpty(),
                           '(5b) colorValue()->isEmpty()');
        $this->assertTrue($colorValue->isNullOrEmpty(),
                          '(5b) colorValue()->isNullOrEmpty()');
        $this->assertNull($colorValue->getValue(),
                          '(5b) colorValue()->getValue()!==NULL');

        // -
        $colorValue->setAlfColorRGB($color2);
        $this->assertTrue($colorValue->isNull(),
                          '(6) colorValue()->setAlfColorRGB(color2)->isNull()');
        $this->assertFalse($colorValue->isEmpty(),
                           '(6) colorValue()->setAlfColorRGB(color2)->isEmpty()');
        $this->assertTrue($colorValue->isNullOrEmpty(),
                          '(6) colorValue()->setAlfColorRGB(color2)->isNullOrEmpty()');
        $this->assertNull($colorValue->getValue(),
                          '(6) colorValue()->getValue()!==NULL');

        // -
        $colorValue->setChannel(AlfColorRGBChannels::BLUE);
        $this->assertFalse($colorValue->isNull(),
                           '(7) colorValue()->setChannel(BLUE)->isNull()');
        $this->assertFalse($colorValue->isEmpty(),
                           '(7) colorValue()->setChannel(BLUE)->isEmpty()');
        $this->assertFalse($colorValue->isNullOrEmpty(),
                           '(7) colorValue()->setChannel(BLUE)->isNullOrEmpty()');
        $this->assertSame(30, $colorValue->getValue(),
                          '(7) colorValue()->setChannel(BLUE)->getValue()!==30');

        // -
        $colorValue->setChannel(AlfColorRGBChannels::RED);
        $this->assertFalse($colorValue->isNull(),
                           '(8) colorValue()->setChannel(RED)->isNull()');
        $this->assertFalse($colorValue->isEmpty(),
                           '(8) colorValue()->setChannel(RED)->isEmpty()');
        $this->assertFalse($colorValue->isNullOrEmpty(),
                           '(8) colorValue()->setChannel(RED)->isNullOrEmpty()');
        $this->assertSame(10, $colorValue->getValue(),
                          '(8) colorValue()->setChannel(RED)->getValue()!==10');

        // -
        $colorValue2 = clone $colorValue;
        $this->assertFalse($colorValue2->isNull(),
                           '(9) colorValue2()->clone()->isNull()');
        $this->assertFalse($colorValue2->isEmpty(),
                           '(9) colorValue2()->clone()->isEmpty()');
        $this->assertFalse($colorValue2->isNullOrEmpty(),
                           '(9) colorValue2()->clone()->isNullOrEmpty()');
        $this->assertSame(10, $colorValue2->getValue(),
                          '(9) colorValue2()->clone()->getValue()!==10');

        // -
        $color2->setToNull();
        $this->assertTrue($colorValue2->isNull(),
                          '(10) color2()->setToNull()->isNull()');
        $this->assertFalse($colorValue2->isEmpty(),
                           '(10) color2()->setToNull()->isEmpty()');
        $this->assertTrue($colorValue2->isNullOrEmpty(),
                          '(10) color2()->setToNull()->isNullOrEmpty()');
        $this->assertNull($colorValue2->getValue(),
                          '(10) color2()->setToNull()->getValue()!==NULL');

        // -
        $color2->setToEmpty();
        $this->assertFalse($colorValue2->isNull(),
                           '(11) color2()->setToEmpty()->isNull()');
        $this->assertTrue($colorValue2->isEmpty(),
                          '(11) color2()->setToEmpty()->isEmpty()');
        $this->assertTrue($colorValue2->isNullOrEmpty(),
                          '(11) color2()->setToEmpty()->isNullOrEmpty()');
        $this->assertSame(0, $colorValue2->getValue(),
                          '(11) color2()->setToEmpty()->getValue()!==0');

        // -
        $colorValue2->set(25);
        $this->assertFalse($colorValue2->isNull(),
                           '(12) colorValue2()->set(25)->isNull()');
        $this->assertFalse($colorValue2->isEmpty(),
                           '(12) colorValue2()->set(25)->isEmpty()');
        $this->assertFalse($colorValue2->isNullOrEmpty(),
                           '(12) colorValue2()->set(25)->isNullOrEmpty()');
        $this->assertSame(25, $colorValue2->getValue(),
                          '(12) colorValue2()->set(25)->getValue()!==25');
    });

test('AlfColorRGB pseudo-random values',
    function () : void {
        $color1 = new AlfColorRGB();

        // -
        for ($tryRed = 1; $tryRed <= 255; $tryRed += 59) {
            for ($tryGreen = 1; $tryGreen <= 255; $tryGreen += 79) {
                for ($tryBlue = 1; $tryBlue <= 255; $tryBlue += 97) {
                    $color1->setRGB($tryRed, new AlfInt($tryGreen), new AlfColorRGBValue($tryBlue));

                    $this->assertFalse($color1->isNull(),
                                       '(4c) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->isNull()');
                    $this->assertFalse($color1->isEmpty(),
                                       '(4c) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->isEmpty()');

                    // -
                    $this->assertFalse($color1->getRed()->isNull(),
                                       '(4r) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->getRed()->isNull()');
                    $this->assertFalse($color1->getRed()->isEmpty(),
                                       '(4r) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->getRed()->isEmpty()');
                    $this->assertSame($tryRed, $color1->getRed()->getAsInt(),
                                      '(4r) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->getRed()->getAsInt()');

                    $this->assertFalse($color1->refRed()->isNull(),
                                       '(4r) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->refRed()->isNull()');
                    $this->assertFalse($color1->refRed()->isEmpty(),
                                       '(4r) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->refRed()->isEmpty()');
                    $this->assertSame($tryRed, $color1->refRed()->getAsInt(),
                                      '(4r) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->refRed()->getAsInt()');

                    // -
                    $this->assertFalse($color1->getGreen()->isNull(),
                                       '(4g) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->getGreen()->isNull()');
                    $this->assertFalse($color1->getGreen()->isEmpty(),
                                       '(4g) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->getGreen()->isEmpty()');
                    $this->assertSame($tryGreen, $color1->getGreen()->getAsInt(),
                                      '(4g) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->getGreen()->getAsInt()');

                    $this->assertFalse($color1->refGreen()->isNull(),
                                       '(4g) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->refGreen()->isNull()');
                    $this->assertFalse($color1->refGreen()->isEmpty(),
                                       '(4g) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->refGreen()->isEmpty()');
                    $this->assertSame($tryGreen, $color1->refGreen()->getAsInt(),
                                      '(4g) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->refGreen()->getAsInt()');

                    // -
                    $this->assertFalse($color1->getBlue()->isNull(),
                                       '(4b) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->getBlue()->isNull()');
                    $this->assertFalse($color1->getBlue()->isEmpty(),
                                       '(4b) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->getBlue()->isEmpty()');
                    $this->assertSame($tryBlue, $color1->getBlue()->getAsInt(),
                                      '(4b) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->getBlue()->getAsInt()');

                    $this->assertFalse($color1->refBlue()->isNull(),
                                       '(4b) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->refBlue()->isNull()');
                    $this->assertFalse($color1->refBlue()->isEmpty(),
                                       '(4b) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->refBlue()->isEmpty()');
                    $this->assertSame($tryBlue, $color1->refBlue()->getAsInt(),
                                      '(4b) color1('.$tryRed.','.$tryGreen.','.$tryBlue.')->refBlue()->getAsInt()');

                    // -
                    $color1->refRed()->inc();
                    $newRed = $tryRed + 1;
                    $this->assertSame($newRed, $color1->getRed()->getAsInt(),
                                      '(5r) color1('.$tryRed.'::inc(),'.$tryGreen.','.$tryBlue.')->getGreen()->getAsInt()!=='.$newRed);

                    // -
                    $color1->refGreen()->dec();
                    $newGreen = $tryGreen - 1;
                    $this->assertSame($newGreen, $color1->getGreen()->getAsInt(),
                                      '(6g) color1('.$tryRed.','.$tryGreen.'::dec(),'.$tryBlue.')->getGreen()->getAsInt()!=='.$newGreen);

                    // -
                    $color1->refBlue()->setToEmpty();
                    $this->assertSame(0, $color1->getBlue()->getAsInt(),
                                      '(7b) color1('.$tryRed.','.$tryGreen.','.$tryBlue.'::setToEmpty())->getBlue()->getAsInt()!==0');
                }
            }
        }

    });

test('AlfColorRGB CSS-String',
    function () : void {
        $colorTransparent = new AlfColorRGB();
        $colorTransparent->setToNull();

        $this->assertSame('', $colorTransparent->getAsString(),
                          '(0a) transparent()->getAsString() !== "" === "'.$colorTransparent->getAsString().'"');
        $this->assertSame('transparent', $colorTransparent->getAsStringCssHex(),
                          '(0b) transparent()->getAsStringCssHex() !== "transparent" === "'.$colorTransparent->getAsStringCssHex().'"');
        $this->assertSame('transparent', $colorTransparent->getAsStringCssRGB(),
                          '(0c) transparent()->getAsStringCssHex() !== "transparent" === "'.$colorTransparent->getAsStringCssRGB().'"');
        $this->assertNull($colorTransparent->getAsHumanString(),
                          '(0d) transparent()->getAsHumanString() !== -NULL- === "'.($colorTransparent->getAsHumanString() ?? '-NULL-').'"');
        $this->assertSame('', $colorTransparent->getAsHumanAlfStringMarkup()->getAsString(),
                          '(0e) transparent()->getAsHumanAlfStringMarkup() !== "" ==='
                          .' "'.($colorTransparent->getAsHumanAlfStringMarkup()->getAsString()).'"');

        // -
        $colorBlack = new AlfColorRGB();
        $colorBlack->setRGBInt(0, 0, 0);

        $this->assertSame('#000', $colorBlack->getAsString(),
                          '(1a) black(0,0,0)->getAsString() !== "#000" === "'.$colorBlack->getAsString().'"');
        $this->assertSame('#000', $colorBlack->getAsStringCssHex(),
                          '(1b) black(0,0,0)->getAsStringCssHex() !== "#000" === "'.$colorBlack->getAsStringCssHex().'"');
        $this->assertSame('rgb(0,0,0)', $colorBlack->getAsStringCssRGB(),
                          '(1c) black(0,0,0)->getAsStringCssHex() !== "rgb(0,0,0)" === "'.$colorBlack->getAsStringCssRGB().'"');
        $this->assertSame('#000000', $colorBlack->getAsHumanString(),
                          '(1d) black(0,0,0)->getAsHumanString() !== "#000000" === "'.($colorBlack->getAsHumanString() ?? '-NULL-').'"');

        // -
        $colorRed = new AlfColorRGB();
        $colorRed->setRGBInt(255, 0, 0);

        $this->assertSame('#f00', $colorRed->getAsString(),
                          '(2a) red(255,0,0)->getAsString() !== "#f00" === "'.$colorRed->getAsString().'"');
        $this->assertSame('#f00', $colorRed->getAsStringCssHex(),
                          '(2b) red(255,0,0)->getAsStringCssHex() !== "#f00" === "'.$colorRed->getAsStringCssHex().'"');
        $this->assertSame('rgb(255,0,0)', $colorRed->getAsStringCssRGB(),
                          '(2c) red(255,0,0)->getAsStringCssHex() !== "rgb(255,0,0)" === "'.$colorRed->getAsStringCssRGB().'"');
        $this->assertSame('#ff0000', $colorRed->getAsHumanString(),
                          '(2d) red(255,0,0)->getAsHumanString() !== "#ff0000" === "'.($colorRed->getAsHumanString() ?? '-NULL-').'"');

        // -
        $colorGreen = new AlfColorRGB();
        $colorGreen->setRGBInt(0, 255, 0);

        $this->assertSame('#0f0', $colorGreen->getAsString(),
                          '(3a) green(0,255,0)->getAsString() !== "#0f0" === "'.$colorGreen->getAsString().'"');
        $this->assertSame('#0f0', $colorGreen->getAsStringCssHex(),
                          '(3b) green(0,255,0)->getAsStringCssHex() !== "#0f0" === "'.$colorGreen->getAsStringCssHex().'"');
        $this->assertSame('rgb(0,255,0)', $colorGreen->getAsStringCssRGB(),
                          '(3c) green(0,255,0)->getAsStringCssHex() !== "rgb(0,255,0)" === "'.$colorGreen->getAsStringCssRGB().'"');
        $this->assertSame('#00ff00', $colorGreen->getAsHumanString(),
                          '(3d) green(0,255,0)->getAsHumanString() !== "#00ff00" === "'.($colorGreen->getAsHumanString() ?? '-NULL-').'"');

        // -
        $colorBlue = new AlfColorRGB();
        $colorBlue->setRGBInt(0, 0, 255);

        $this->assertSame('#00f', $colorBlue->getAsString(),
                          '(3a) blue(0,0,255)->getAsString() !== "#00f" === "'.$colorBlue->getAsString().'"');
        $this->assertSame('#00f', $colorBlue->getAsStringCssHex(),
                          '(3b) blue(0,0,255)->getAsStringCssHex() !== "#00f" === "'.$colorBlue->getAsStringCssHex().'"');
        $this->assertSame('rgb(0,0,255)', $colorBlue->getAsStringCssRGB(),
                          '(3c) blue(0,0,255)->getAsStringCssHex() !== "rgb(0,0,255)" === "'.$colorBlue->getAsStringCssRGB().'"');
        $this->assertSame('#0000ff', $colorBlue->getAsHumanString(),
                          '(3d) blue(0,0,255)->getAsHumanString() !== "#0000ff" === "'.($colorBlue->getAsHumanString() ?? '-NULL-').'"');

        // -
        $colorOne = new AlfColorRGB();
        $colorOne->setRGBInt(12, 77, 36);

        $this->assertSame('#0c4d24', $colorOne->getAsString(),
                          '(4a) one(12,77,36)->getAsString() !== "#0c4d24" === "'.$colorOne->getAsString().'"');
        $this->assertSame('#0c4d24', $colorOne->getAsStringCssHex(),
                          '(4b) one(12,77,36)->getAsStringCssHex() !== "#0c4d24" === "'.$colorOne->getAsStringCssHex().'"');
        $this->assertSame('rgb(12,77,36)', $colorOne->getAsStringCssRGB(),
                          '(4c) one(12,77,36)->getAsStringCssHex() !== "rgb(12,77,36)" === "'.$colorOne->getAsStringCssRGB().'"');
        $this->assertSame('#0c4d24', $colorOne->getAsHumanString(),
                          '(4d) one(12,77,36)->getAsHumanString() !== "#0c4d24" === "'.($colorOne->getAsHumanString() ?? '-NULL-').'"');

        // -
        $colorTwo = new AlfColorRGB();
        $colorTwo->setRGBInt(170, 255, 238);

        $this->assertSame('#afe', $colorTwo->getAsString(),
                          '(4a) two(170,255,238)->getAsString() !== "#afe" === "'.$colorTwo->getAsString().'"');
        $this->assertSame('#afe', $colorTwo->getAsStringCssHex(),
                          '(4b) two(170,255,238)->getAsStringCssHex() !== "#afe" === "'.$colorTwo->getAsStringCssHex().'"');
        $this->assertSame('rgb(170,255,238)', $colorTwo->getAsStringCssRGB(),
                          '(4c) two(170,255,238)->getAsStringCssHex() !== "rgb(170,255,238)" === "'.$colorTwo->getAsStringCssRGB().'"');
        $this->assertSame('#aaffee', $colorTwo->getAsHumanString(),
                          '(4d) two(170,255,238)->getAsHumanString() !== "#aaffee" === "'.($colorTwo->getAsHumanString() ?? '-NULL-').'"');
    });
