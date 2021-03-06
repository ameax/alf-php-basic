<?php

namespace Alf\Enums;

use Alf\Attributes\AlfAttrEnumValue;
use JetBrains\PhpStorm\Pure;

enum AlfCountries: string {

    case AFGHANISTAN = 'AF';
    case ALBANIA = 'AL';
    case ALGERIA = 'DZ';
    case AMERICAN_SAMOA = 'AS';
    case ANDORRA = 'AD';
    case ANGOLA = 'AO';
    case ANTARCTICA = 'AQ';
    case ANTIGUA_AND_BARBUDA = 'AG';
    case ARGENTINA = 'AR';
    case ARMENIA = 'AM';
    case ARUBA = 'AW';
    case AUSTRALIA = 'AU';
    case AUSTRIA = 'AT';
    case AZERBAIJAN = 'AZ';
    case BAHAMAS = 'BS';
    case BAHRAIN = 'BH';
    case BANGLADESH = 'BD';
    case BARBADOS = 'BB';
    case BELARUS = 'BY';
    case BELGIUM = 'BE';
    case BELIZE = 'BZ';
    case BENIN = 'BJ';
    case BERMUDA = 'BM';
    case BHUTAN = 'BT';
    case BOLIVIA = 'BO';
    case BOSNIA_AND_HERZEGOVINA = 'BA';
    case BOTSWANA = 'BW';
    case BOUVET_ISLAND = 'BV';
    case BRAZIL = 'BR';
    case BRITISH_INDIAN_OCEAN_TERRITORY = 'IO';
    case BRUNEI_DARUSSALAM = 'BN';
    case BULGARIA = 'BG';
    case BURKINA_FASO = 'BF';
    case BURUNDI = 'BI';
    case CAMBODIA = 'KH';
    case CAMEROON = 'CM';
    case CANADA = 'CA';
    case CAPE_VERDE = 'CV';
    case CAYMAN_ISLANDS = 'KY';
    case CENTRAL_AFRICAN_REPUBLIC = 'CF';
    case CHAD = 'TD';
    case CHILE = 'CL';
    case CHINA = 'CN';
    case CHRISTMAS_ISLAND = 'CX';
    case COCOS_KEELING_ISLANDS = 'CC';
    case COLOMBIA = 'CO';
    case COMOROS = 'KM';
    case CONGO = 'CG';
    case CONGO_THE_DEMOCRATIC_REPUBLIC_OF_THE = 'CD';
    case COOK_ISLANDS = 'CK';
    case COSTA_RICA = 'CR';
    case COTE_D_IVOIRE = 'CI';
    case CROATIA = 'HR';
    case CUBA = 'CU';
    case CYPRUS = 'CY';
    case CZECH_REPUBLIC = 'CZ';
    case DENMARK = 'DK';
    case DJIBOUTI = 'DJ';
    case DOMINICA = 'DM';
    case DOMINICAN_REPUBLIC = 'DO';
    case ECUADOR = 'EC';
    case EGYPT = 'EG';
    case EL_SALVADOR = 'SV';
    case EQUATORIAL_GUINEA = 'GQ';
    case ERITREA = 'ER';
    case ESTONIA = 'EE';
    case ETHIOPIA = 'ET';
    case FALKLAND_ISLANDS_MALVINAS = 'FK';
    case FAROE_ISLANDS = 'FO';
    case FIJI = 'FJ';
    case FINLAND = 'FI';
    case FRANCE = 'FR';
    case FRENCH_GUIANA = 'GF';
    case FRENCH_POLYNESIA = 'PF';
    case FRENCH_SOUTHERN_TERRITORIES = 'TF';
    case GABON = 'GA';
    case GAMBIA = 'GM';
    case GEORGIA = 'GE';
    case GERMANY = 'DE';
    case GHANA = 'GH';
    case GIBRALTAR = 'GI';
    case GREECE = 'GR';
    case GREENLAND = 'GL';
    case GRENADA = 'GD';
    case GUADELOUPE = 'GP';
    case GUAM = 'GU';
    case GUATEMALA = 'GT';
    case GUINEA = 'GN';
    case GUINEA_BISSAU = 'GW';
    case GUYANA = 'GY';
    case HAITI = 'HT';
    case HEARD_ISLAND_AND_MCDONALD_ISLANDS = 'HM';
    case HONDURAS = 'HN';
    case HONG_KONG = 'HK';
    case HUNGARY = 'HU';
    case ICELAND = 'IS';
    case INDIA = 'IN';
    case INDONESIA = 'ID';
    case IRAN_ISLAMIC_REPUBLIC_OF = 'IR';
    case IRAQ = 'IQ';
    case IRELAND = 'IE';
    case ISRAEL = 'IL';
    case ITALY = 'IT';
    case JAMAICA = 'JM';
    case JAPAN = 'JP';
    case JORDAN = 'JO';
    case KAZAKHSTAN = 'KZ';
    case KENYA = 'KE';
    case KIRIBATI = 'KI';
    case KOREA_DEMOCRATIC_PEOPLES_REPUBLIC_OF = 'KP';
    case KOREA_REPUBLIC_OF = 'KR';
    case KUWAIT = 'KW';
    case KYRGYZSTAN = 'KG';
    case LAO_PEOPLES_DEMOCRATIC_REPUBLIC_LAOS = 'LA';
    case LATVIA = 'LV';
    case LEBANON = 'LB';
    case LESOTHO = 'LS';
    case LIBERIA = 'LR';
    case LIBYA_STATE_OF = 'LY';
    case LIECHTENSTEIN = 'LI';
    case LITHUANIA = 'LT';
    case LUXEMBOURG = 'LU';
    case MACAO = 'MO';
    case MACEDONIA_THE_FORMER_YUGOSLAV_REPUBLIC_OF = 'MK';
    case MADAGASCAR = 'MG';
    case MALAWI = 'MW';
    case MALAYSIA = 'MY';
    case MALDIVES = 'MV';
    case MALI = 'ML';
    case MALTA = 'MT';
    case MARSHALL_ISLANDS = 'MH';
    case MARTINIQUE = 'MQ';
    case MAURITANIA = 'MR';
    case MAURITIUS = 'MU';
    case MAYOTTE = 'YT';
    case MEXICO = 'MX';
    case MICRONESIA_FEDERATED_STATES_OF = 'FM';
    case MOLDOVA_REPUBLIC_OF = 'MD';
    case MONACO = 'MC';
    case MONGOLIA = 'MN';
    case MONTENEGRO = 'ME';
    case MONTSERRAT = 'MS';
    case MOROCCO = 'MA';
    case MOZAMBIQUE = 'MZ';
    case MYANMAR = 'MM';
    case NAMIBIA = 'NA';
    case NAURU = 'NR';
    case NEPAL_FEDERAL_DEMOCRATIC_REPUBLIC_OF = 'NP';
    case NETHERLANDS = 'NL';
    case NETHERLANDS_ANTILLES = 'AN';
    case NEW_CALEDONIA = 'NC';
    case NEW_ZEALAND = 'NZ';
    case NICARAGUA = 'NI';
    case NIGER = 'NE';
    case NIGERIA = 'NG';
    case NIUE = 'NU';
    case NORFOLK_ISLAND = 'NF';
    case NORTHERN_MARIANA_ISLANDS = 'MP';
    case NORWAY = 'NO';
    case OMAN = 'OM';
    case PAKISTAN = 'PK';
    case PALAU = 'PW';
    case PALESTINE_STATE_OF = 'PS';
    case PANAMA = 'PA';
    case PAPUA_NEW_GUINEA = 'PG';
    case PARAGUAY = 'PY';
    case PERU = 'PE';
    case PHILIPPINES = 'PH';
    case PITCAIRN = 'PN';
    case POLAND = 'PL';
    case PORTUGAL = 'PT';
    case PUERTO_RICO = 'PR';
    case QATAR = 'QA';
    case REUNION = 'RE';
    case ROMANIA = 'RO';
    case RUSSIAN_FEDERATION = 'RU';
    case RWANDA = 'RW';
    case SAINT_HELENA = 'SH';
    case SAINT_KITTS_AND_NEVIS = 'KN';
    case SAINT_LUCIA = 'LC';
    case SAINT_PIERRE_AND_MIQUELON = 'PM';
    case SAINT_VINCENT_AND_THE_GRENADINES = 'VC';
    case SAMOA = 'WS';
    case SAN_MARINO = 'SM';
    case SAO_TOME_AND_PRINCIPE = 'ST';
    case SAUDI_ARABIA = 'SA';
    case SENEGAL = 'SN';
    case SERBIA = 'RS';
    case SEYCHELLES = 'SC';
    case SIERRA_LEONE = 'SL';
    case SINGAPORE = 'SG';
    case SLOVAKIA = 'SK';
    case SLOVENIA = 'SI';
    case SOLOMON_ISLANDS = 'SB';
    case SOMALIA = 'SO';
    case SOUTH_AFRICA = 'ZA';
    case SOUTH_GEORGIA_AND_THE_SOUTH_SANDWICH_ISLANDS = 'GS';
    case SOUTH_SUDAN = 'SS';
    case SPAIN = 'ES';
    case SRI_LANKA = 'LK';
    case SUDAN = 'SD';
    case SURINAME = 'SR';
    case SVALBARD_AND_JAN_MAYEN = 'SJ';
    case SWAZILAND = 'SZ';
    case SWEDEN = 'SE';
    case SWITZERLAND = 'CH';
    case SYRIAN_ARAB_REPUBLIC = 'SY';
    case TAIWAN = 'TW';
    case TAJIKISTAN = 'TJ';
    case TANZANIA_UNITED_REPUBLIC_OF = 'TZ';
    case THAILAND = 'TH';
    case TIMOR_LESTE = 'TL';
    case TOGO = 'TG';
    case TOKELAU = 'TK';
    case TONGA = 'TO';
    case TRINIDAD_AND_TOBAGO = 'TT';
    case TUNISIA = 'TN';
    case TURKEY = 'TR';
    case TURKMENISTAN = 'TM';
    case TURKS_AND_CAICOS_ISLANDS = 'TC';
    case TUVALU = 'TV';
    case UGANDA = 'UG';
    case UKRAINE = 'UA';
    case UNITED_ARAB_EMIRATES = 'AE';
    case UNITED_KINGDOM = 'GB';
    case UNITED_STATES = 'US';
    case UNITED_STATES_MINOR_OUTLYING_ISLANDS = 'UM';
    case URUGUAY = 'UY';
    case UZBEKISTAN = 'UZ';
    case VANUATU = 'VU';
    case VENEZUELA = 'VE';
    case VIET_NAM = 'VN';
    case VIRGIN_ISLANDS_BRITISH = 'VG';
    case VIRGIN_ISLANDS_US = 'VI';
    case WALLIS_AND_FUTUNA = 'WF';
    case WESTERN_SAHARA = 'EH';
    case YEMEN = 'YE';
    case ZAMBIA = 'ZM';
    case ZIMBABWE = 'ZW';

    #[Pure]
    #[AlfAttrEnumValue]
    public function inGerman() : string {
        return AlfCountries::getInGerman($this);
    }

    #[Pure]
    public static function getInGerman(self $value) : string {
        return match ($value) {
            AlfCountries::AUSTRIA => '??sterreich',
            AlfCountries::FRANCE => 'Frankreich',
            AlfCountries::GERMANY => 'Deutschland',
            AlfCountries::ITALY => 'Italien',
            AlfCountries::PORTUGAL => 'Portugal',
            AlfCountries::ROMANIA => 'Rum??nien',
            AlfCountries::SPAIN => 'Spanien',
            AlfCountries::SWITZERLAND => 'Schweiz',
            AlfCountries::TURKEY => 'T??rkei',
            default => $value->name
        };
    }

}
