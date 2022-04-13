<?php

use Alf\Enums\AlfCountries;
use Alf\Enums\AlfLanguageCodes;
use Alf\Types\Structures\AlfLanguage;

test('AlfLanguage',
    function () : void {

        $this->assertSame((new AlfLanguage())->getAsString(), '',
                          '(1) AlfLanguage() !== ""');
        $this->assertSame((new AlfLanguage(AlfLanguageCodes::GERMAN))->getAsString(), 'de',
                          '(2) AlfLanguage(GERMAN) !== "de"');
        $this->assertSame((new AlfLanguage(AlfLanguageCodes::ENGLISH, AlfCountries::GERMANY))->getAsString(), 'en_DE',
                          '(3) AlfLanguage(ENGLISH,GERMANY) !== "en_DE"');

        // -
        $test1 = new AlfLanguage();
        $test1->refCountry()->set(AlfCountries::SWISS);
        $test1->refLanguageCode()->set(AlfLanguageCodes::GERMAN);
        $this->assertSame((string)$test1, 'de_CH',
                          '(4) AlfLanguage(SWISS,GERMAN) !== "de_CH"');

        // -
        $test2 = clone $test1;
        $this->assertSame((string)$test2, 'de_CH',
                          '(5) AlfLanguage->clone(SWISS,GERMAN) !== "de_CH"');

    });
