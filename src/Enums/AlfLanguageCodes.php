<?php

namespace Alf\Enums;

use Alf\Attributes\AlfAttrEnumValue;
use JetBrains\PhpStorm\Pure;

enum AlfLanguageCodes: string {

    case ABKHAZIAN = 'ab';
    case AFAR = 'aa';
    case AFRIKAANS = 'af';
    case AKAN = 'ak';
    case ALBANIAN = 'sq';
    case AMHARIC = 'am';
    case ARABIC = 'ar';
    case ARAGONESE = 'an';
    case ARMENIAN = 'hy';
    case ASSAMESE = 'as';
    case AVARIC = 'av';
    case AVESTAN = 'ae';
    case AYMARA = 'ay';
    case AZERBAIJANI = 'az';
    case BAMBARA = 'bm';
    case BASHKIR = 'ba';
    case BASQUE = 'eu';
    case BELARUSIAN = 'be';
    case BENGALI_BANGLA = 'bn';
    case BIHARI = 'bh';
    case BISLAMA = 'bi';
    case BOSNIAN = 'bs';
    case BRETON = 'br';
    case BULGARIAN = 'bg';
    case BURMESE = 'my';
    case CATALAN = 'ca';
    case CHAMORRO = 'ch';
    case CHECHEN = 'ce';
    case CHICHEWA_CHEWA_NYANJA = 'ny';
    case CHINESE = 'zh';
    case CHUVASH = 'cv';
    case CORNISH = 'kw';
    case CORSICAN = 'co';
    case CREE = 'cr';
    case CROATIAN = 'hr';
    case CZECH = 'cs';
    case DANISH = 'da';
    case DIVEHI_DHIVEHI_MALDIVIAN = 'dv';
    case DUTCH = 'nl';
    case DZONGKHA = 'dz';
    case ENGLISH = 'en';
    case ESPERANTO = 'eo';
    case ESTONIAN = 'et';
    case EWE = 'ee';
    case FAROESE = 'fo';
    case FIJIAN = 'fj';
    case FINNISH = 'fi';
    case FRENCH = 'fr';
    case FULA_FULAH_PULAAR_PULAR = 'ff';
    case GALICIAN = 'gl';
    case GAELIC_SCOTTISH = 'gd';
    case GAELIC_MANX_MANX = 'gv';
    case GEORGIAN = 'ka';
    case GERMAN = 'de';
    case GREEK = 'el';
    case GREENLANDIC_KALAALLISUT_GREENLANDIC = 'kl';
    case GUARANI = 'gn';
    case GUJARATI = 'gu';
    case HAITIAN_CREOLE = 'ht';
    case HAUSA = 'ha';
    case HEBREW = 'he';
    case HERERO = 'hz';
    case HINDI = 'hi';
    case HIRI_MOTU = 'ho';
    case HUNGARIAN = 'hu';
    case ICELANDIC = 'is';
    case IDO = 'io';
    case IGBO = 'ig';
    case INDONESIAN_ID = 'id';
    case INDONESIAN_IN = 'in';
    case INTERLINGUA = 'ia';
    case INTERLINGUE = 'ie';
    case INUKTITUT = 'iu';
    case INUPIAK = 'ik';
    case IRISH = 'ga';
    case ITALIAN = 'it';
    case JAPANESE = 'ja';
    case JAVANESE = 'jv';
    case KANNADA = 'kn';
    case KANURI = 'kr';
    case KASHMIRI = 'ks';
    case KAZAKH = '	kk';
    case KHMER = 'km';
    case KIKUYU = 'ki';
    case KINYARWANDA_RWANDA = 'rw';
    case KIRUNDI = 'rn';
    case KYRGYZ = 'ky';
    case KOMI = 'kv';
    case KONGO = 'kg';
    case KOREAN = 'ko';
    case KURDISH = 'ku';
    case KWANYAMA = 'kj';
    case LAO = 'lo';
    case LATIN = 'la';
    case LATVIAN_LETTISH = 'lv';
    case LIMBURGISH_LIMBURGER = 'li';
    case LINGALA = 'ln';
    case LITHUANIAN = 'lt';
    case LUGA_KATANGA = 'lu';
    case LUGANDA_GANDA = 'lg';
    case LUXEMBOURGISH = 'lb';
    case MACEDONIAN = 'mk';
    case MALAGASY = 'mg';
    case MALAY = 'ms';
    case MALAYALAM = 'ml';
    case MALTESE = 'mt';
    case MAORI = 'mi';
    case MARATHI = 'mr';
    case MARSHALLESE = 'mh';
    case MOLDAVIAN = 'mo';
    case MONGOLIAN = 'mn';
    case NAURU = 'na';
    case NAVAJO = 'nv';
    case NDONGA = 'ng';
    case NORTHERN_NDEBELE = 'nd';
    case NEPALI = 'ne';
    case NORWEGIAN = 'no';
    case NORWEGIAN_BOKMAL = 'nb';
    case NORWEGIAN_NYNORSK = 'nn';
    case NUOSU_SICHUAN_YI = 'ii';
    case OCCITAN = 'oc';
    case OJIBWE = 'oj';
    case OLD_CHURCH_SLAVONIC_OLD_BULGARIAN = 'cu';
    case ORIYA = 'or';
    case OROMO_AFAAN_OROMO = 'om';
    case OSSETIAN = 'os';
    case PALI = 'pi';
    case PASHTO_PUSHTO = 'ps';
    case PERSIAN_FARSI = 'fa';
    case POLISH = 'pl';
    case PORTUGUESE = 'pt';
    case PUNJABI_EASTERN = 'pa';
    case QUECHUA = 'qu';
    case ROMANSH = 'rm';
    case ROMANIAN = 'ro';
    case RUSSIAN = 'ru';
    case SAMI = 'se';
    case SAMOAN = 'sm';
    case SANGO = 'sg';
    case SANSKRIT = 'sa';
    case SERBIAN = 'sr';
    case SERBO_CROATIAN = 'sh';
    case SESOTHO = 'st';
    case SETSWANA = 'tn';
    case SHONA = 'sn';
    case SINDHI = 'sd';
    case SINHALESE = 'si';
    case SISWATI_SWATI = 'ss';
    case SLOVAK = 'sk';
    case SLOVENIAN = 'sl';
    case SOMALI = 'so';
    case SOUTHERN_NDEBELE = 'nr';
    case SPANISH = 'es';
    case SUNDANESE = 'su';
    case SWAHILI_KISWAHILI = 'sw';
    case SWEDISH = 'sv';
    case TAGALOG = 'tl';
    case TAHITIAN = 'ty';
    case TAJIK = 'tg';
    case TAMIL = 'ta';
    case TATAR = 'tt';
    case TELUGU = 'te';
    case THAI = 'th';
    case TIBETAN = 'bo';
    case TIGRINYA = 'ti';
    case TONGA = 'to';
    case TSONGA = 'ts';
    case TURKISH = 'tr';
    case TURKMEN = 'tk';
    case TWI = 'tw';
    case UYGHUR = 'ug';
    case UKRAINIAN = 'uk';
    case URDU = 'ur';
    case UZBEK = 'uz';
    case VENDA = 've';
    case VIETNAMESE = 'vi';
    case VOLAPUK = 'vo';
    case WALLON = 'wa';
    case WELSH = 'cy';
    case WOLOF = 'wo';
    case WESTERN_FRISIAN = 'fy';
    case XHOSA = 'xh';
    case YIDDISH_YI = 'yi';
    case YIDDISH_JI = 'ji';
    case YORUBA = 'yo';
    case ZHUANG_CHUANG = 'za';
    case ZULU = 'zu';

    #[Pure]
    #[AlfAttrEnumValue]
    public function inGerman() : string {
        return AlfLanguageCodes::getInGerman($this);
    }

    #[Pure]
    public static function getInGerman(self $value) : string {
        return match ($value) {
            AlfLanguageCodes::ENGLISH => 'englisch',
            AlfLanguageCodes::FRENCH => 'französisch',
            AlfLanguageCodes::GERMAN => 'deutsch',
            AlfLanguageCodes::ITALIAN => 'italienisch',
            AlfLanguageCodes::PORTUGUESE => 'portugiesisch',
            AlfLanguageCodes::ROMANIAN => 'rumänisch',
            AlfLanguageCodes::SPANISH => 'spanisch',
            AlfLanguageCodes::TURKISH => 'türkisch',
            default => $value->name
        };
    }

}
