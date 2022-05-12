<?php
declare(strict_types = 1);

use Alf\Types\Scalars\AlfChar;
use Alf\Types\Scalars\AlfCharW;
use Alf\Types\Scalars\AlfInt32U;
use Alf\Types\Scalars\AlfString;
use Alf\Types\Scalars\AlfStringMarkup;
use Alf\Types\Scalars\AlfStringW;

test('html encoding',
    function () : void {

        $strTests = [
            'X'                              => [
                'isGoodForChar'          => true,
                'isGoodWithoutCharset'   => true,
                'getAsHtmlAttribute'     => 'X',
                'getAsHtmlInlineNoTag'   => 'X',
                'getAsHtmlInlineWithTag' => '<span>X</span>',
                'getAsHtmlBlock'         => '<p>X</p>',
                'getAsHtmlBlockDiv'      => '<div>X</div>',
            ],
            'ä'                              => [
                'isGoodForChar'          => true,
                'isGoodWithoutCharset'   => false,
                'getAsHtmlAttribute'     => 'ä',
                'getAsHtmlInlineNoTag'   => 'ä',
                'getAsHtmlInlineWithTag' => '<span>ä</span>',
                'getAsHtmlBlock'         => '<p>ä</p>',
                'getAsHtmlBlockDiv'      => '<div>ä</div>',
            ],
            'Alf4712 <sj@aranes.de>'         => [
                'isGoodForChar'          => false,
                'isGoodWithoutCharset'   => true,
                'getAsHtmlAttribute'     => 'Alf4712 &lt;sj@aranes.de&gt;',
                'getAsHtmlInlineNoTag'   => 'Alf4712 &lt;sj@aranes.de&gt;',
                'getAsHtmlInlineWithTag' => '<span>Alf4712 &lt;sj@aranes.de&gt;</span>',
                'getAsHtmlBlock'         => '<p>Alf4712 &lt;sj@aranes.de&gt;</p>',
                'getAsHtmlBlockDiv'      => '<div>Alf4712 &lt;sj@aranes.de&gt;</div>',
            ],
            'line'."\n".'line'."\r\n".'line' => [
                'isGoodForChar'          => false,
                'isGoodWithoutCharset'   => true,
                'getAsHtmlAttribute'     => 'line&NewLine;line&NewLine;line',
                'getAsHtmlInlineNoTag'   => 'line<br>line<br>line',
                'getAsHtmlInlineWithTag' => '<span>line<br>line<br>line</span>',
                'getAsHtmlBlock'         => '<p>line<br>line<br>line</p>',
                'getAsHtmlBlockDiv'      => '<div>line<br>line<br>line</div>',
            ],
            'Äpfel und Birnen'               => [
                'isGoodForChar'          => false,
                'isGoodWithoutCharset'   => false,
                'getAsHtmlAttribute'     => 'Äpfel und Birnen', // apples and pears
                'getAsHtmlInlineNoTag'   => 'Äpfel und Birnen',
                'getAsHtmlInlineWithTag' => '<span>Äpfel und Birnen</span>',
                'getAsHtmlBlock'         => '<p>Äpfel und Birnen</p>',
                'getAsHtmlBlockDiv'      => '<div>Äpfel und Birnen</div>',
            ],
        ];

        foreach ($strTests as $plain => $data) {
            $isGoodForChar = $data['isGoodForChar'];
            $isGoodWithoutCharset = $data['isGoodWithoutCharset'];

            if ($isGoodWithoutCharset) {
                $str = new AlfString($plain);
                $this->assertSame($data['getAsHtmlAttribute'], $str->getAsHtmlAttribute(),
                                  '(1a) invalid html encoding on AlfString::getAsHtmlAttribute(): "'.$str->getAsHtmlAttribute().'" <> "'.$data['getAsHtmlAttribute'].'"');
                $this->assertSame($data['getAsHtmlInlineNoTag'], $str->getAsHtmlInline(tagIsRequired: false),
                                  '(1b) invalid html encoding on AlfString::getAsHtmlInline(tagIsRequired:false): "'.$str->getAsHtmlInline(tagIsRequired: false).'" <> "'.$data['getAsHtmlInlineNoTag'].'"');
                $this->assertSame($data['getAsHtmlInlineWithTag'], $str->getAsHtmlInline(tagIsRequired: true),
                                  '(1c) invalid html encoding on AlfString::getAsHtmlInline(tagIsRequired:true): "'.$str->getAsHtmlInline(tagIsRequired: true).'" <> "'.$data['getAsHtmlInlineWithTag'].'"');
                $this->assertSame($data['getAsHtmlBlock'], $str->getAsHtmlBlock(),
                                  '(1d) invalid html encoding on AlfString::getAsHtmlBlock(): "'.$str->getAsHtmlBlock().'" <> "'.$data['getAsHtmlBlock'].'"');
                $this->assertSame($data['getAsHtmlBlockDiv'], $str->getAsHtmlBlock('div'),
                                  '(1e) invalid html encoding on AlfString::getAsHtmlBlock(div): "'.$str->getAsHtmlBlock('div').'" <> "'.$data['getAsHtmlBlockDiv'].'"');
            }

            $str2 = new AlfStringW($plain);
            $this->assertSame($data['getAsHtmlAttribute'], $str2->getAsHtmlAttribute(),
                              '(2a) invalid html encoding on AlfStringW::getAsHtmlAttribute(): "'.$str2->getAsHtmlAttribute().'" <> "'.$data['getAsHtmlAttribute'].'"');
            $this->assertSame($data['getAsHtmlInlineNoTag'], $str2->getAsHtmlInline(tagIsRequired: false),
                              '(2b) invalid html encoding on AlfStringW::getAsHtmlInline(tagIsRequired:false): "'.$str2->getAsHtmlInline(tagIsRequired: false).'" <> "'.$data['getAsHtmlInlineNoTag'].'"');
            $this->assertSame($data['getAsHtmlInlineWithTag'], $str2->getAsHtmlInline(tagIsRequired: true),
                              '(2c) invalid html encoding on AlfStringW::getAsHtmlInline(tagIsRequired:true): "'.$str2->getAsHtmlInline(tagIsRequired: true).'" <> "'.$data['getAsHtmlInlineWithTag'].'"');
            $this->assertSame($data['getAsHtmlBlock'], $str2->getAsHtmlBlock(),
                              '(2d) invalid html encoding on AlfStringW::getAsHtmlBlock(): "'.$str2->getAsHtmlBlock().'" <> "'.$data['getAsHtmlBlock'].'"');
            $this->assertSame($data['getAsHtmlBlockDiv'], $str2->getAsHtmlBlock('div'),
                              '(2e) invalid html encoding on AlfStringW::getAsHtmlBlock(div): "'.$str2->getAsHtmlBlock('div').'" <> "'.$data['getAsHtmlBlockDiv'].'"');

            $str3 = new AlfStringMarkup($plain);
            $this->assertSame($data['getAsHtmlAttribute'], $str3->getAsHtmlAttribute(),
                              '(3a) invalid html encoding on AlfStringMarkup::getAsHtmlAttribute(): "'.$str3->getAsHtmlAttribute().'" <> "'.$data['getAsHtmlAttribute'].'"');
            $this->assertSame($data['getAsHtmlInlineNoTag'], $str3->getAsHtmlInline(tagIsRequired: false),
                              '(3b) invalid html encoding on AlfStringMarkup::getAsHtmlInline(tagIsRequired:false): "'.$str3->getAsHtmlInline(tagIsRequired: false).'" <> "'.$data['getAsHtmlInlineNoTag'].'"');
            $this->assertSame($data['getAsHtmlInlineWithTag'], $str3->getAsHtmlInline(tagIsRequired: true),
                              '(3c) invalid html encoding on AlfStringMarkup::getAsHtmlInline(tagIsRequired:true): "'.$str3->getAsHtmlInline(tagIsRequired: true).'" <> "'.$data['getAsHtmlInlineWithTag'].'"');
            $this->assertSame($data['getAsHtmlBlock'], $str3->getAsHtmlBlock(),
                              '(3d) invalid html encoding on AlfStringMarkup::getAsHtmlBlock(): "'.$str3->getAsHtmlBlock().'" <> "'.$data['getAsHtmlBlock'].'"');
            $this->assertSame($data['getAsHtmlBlockDiv'], $str3->getAsHtmlBlock('div'),
                              '(3e) invalid html encoding on AlfStringMarkup::getAsHtmlBlock(div): "'.$str3->getAsHtmlBlock('div').'" <> "'.$data['getAsHtmlBlockDiv'].'"');

            if ($isGoodForChar) {
                if ($isGoodWithoutCharset) {
                    $char = new AlfChar($plain);
                    $this->assertSame($data['getAsHtmlAttribute'], $char->getAsHtmlAttribute(),
                                      '(4a) invalid html encoding on AlfChar::getAsHtmlAttribute(): "'.$char->getAsHtmlAttribute().'" <> "'.$data['getAsHtmlAttribute'].'"');
                    $this->assertSame($data['getAsHtmlInlineNoTag'], $char->getAsHtmlInline(tagIsRequired: false),
                                      '(4b) invalid html encoding on AlfChar::getAsHtmlInline(tagIsRequired:false): "'.$char->getAsHtmlInline(tagIsRequired: false).'" <> "'.$data['getAsHtmlInlineNoTag'].'"');
                    $this->assertSame($data['getAsHtmlInlineWithTag'], $char->getAsHtmlInline(tagIsRequired: true),
                                      '(4c) invalid html encoding on AlfChar::getAsHtmlInline(tagIsRequired:true): "'.$char->getAsHtmlInline(tagIsRequired: true).'" <> "'.$data['getAsHtmlInlineWithTag'].'"');
                    $this->assertSame($data['getAsHtmlBlock'], $char->getAsHtmlBlock(),
                                      '(4d) invalid html encoding on AlfChar::getAsHtmlBlock(): "'.$char->getAsHtmlBlock().'" <> "'.$data['getAsHtmlBlock'].'"');
                    $this->assertSame($data['getAsHtmlBlockDiv'], $char->getAsHtmlBlock('div'),
                                      '(4e) invalid html encoding on AlfChar::getAsHtmlBlock(div): "'.$char->getAsHtmlBlock('div').'" <> "'.$data['getAsHtmlBlockDiv'].'"');
                }

                $char2 = new AlfCharW($plain);
                $this->assertSame($data['getAsHtmlAttribute'], $char2->getAsHtmlAttribute(),
                                  '(5a) invalid html encoding on AlfCharW::getAsHtmlAttribute(): "'.$char2->getAsHtmlAttribute().'" <> "'.$data['getAsHtmlAttribute'].'"');
                $this->assertSame($data['getAsHtmlInlineNoTag'], $char2->getAsHtmlInline(tagIsRequired: false),
                                  '(5b) invalid html encoding on AlfCharW::getAsHtmlInline(tagIsRequired:false): "'.$char2->getAsHtmlInline(tagIsRequired: false).'" <> "'.$data['getAsHtmlInlineNoTag'].'"');
                $this->assertSame($data['getAsHtmlInlineWithTag'], $char2->getAsHtmlInline(tagIsRequired: true),
                                  '(5c) invalid html encoding on AlfCharW::getAsHtmlInline(tagIsRequired:true): "'.$char2->getAsHtmlInline(tagIsRequired: true).'" <> "'.$data['getAsHtmlInlineWithTag'].'"');
                $this->assertSame($data['getAsHtmlBlock'], $char2->getAsHtmlBlock(),
                                  '(5d) invalid html encoding on AlfCharW::getAsHtmlBlock(): "'.$char2->getAsHtmlBlock().'" <> "'.$data['getAsHtmlBlock'].'"');
                $this->assertSame($data['getAsHtmlBlockDiv'], $char2->getAsHtmlBlock('div'),
                                  '(5e) invalid html encoding on AlfCharW::getAsHtmlBlock(div): "'.$char2->getAsHtmlBlock('div').'" <> "'.$data['getAsHtmlBlockDiv'].'"');
            }
        }

        $int32U = new AlfInt32U(52143);
        $this->assertSame('52143', $int32U->getAsHtmlAttribute(),
                          '(6a) invalid html encoding on AlfInt32U::getAsHtmlAttribute(): "'.$int32U->getAsHtmlAttribute().'" <> "52143"');
        $this->assertSame('52143', $int32U->getAsHtmlInline(tagIsRequired: false),
                          '(6b) invalid html encoding on AlfInt32U::getAsHtmlInline(tagIsRequired:false): "'.$int32U->getAsHtmlInline(tagIsRequired: false).'" <> "52143"');
        $this->assertSame('<span>52143</span>', $int32U->getAsHtmlInline(tagIsRequired: true),
                          '(6c) invalid html encoding on AlfInt32U::getAsHtmlInline(tagIsRequired:true): "'.$int32U->getAsHtmlInline(tagIsRequired: true).'" <> "<span>52143</span>"');
        $this->assertSame('<p>52143</p>', $int32U->getAsHtmlBlock(),
                          '(6d) invalid html encoding on AlfInt32U::getAsHtmlBlock(): "'.$int32U->getAsHtmlBlock().'" <> "<p>52143</p>"');
        $this->assertSame('<div>52143</div>', $int32U->getAsHtmlBlock('div'),
                          '(6e) invalid html encoding on AlfInt32U::getAsHtmlBlock(div): "'.$int32U->getAsHtmlBlock('div').'" <> "<div>52143</div>"');
    });
