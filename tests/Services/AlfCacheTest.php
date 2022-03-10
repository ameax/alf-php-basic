<?php

declare(strict_types = 1);

use Alf\Services\AlfCache;

test('cache bool',
    function () : void {

        AlfCache::_()->setCacheBool('isTrue', true);
        $this->assertTrue(AlfCache::_()->getCacheBool('isTrue'),
                          '(1) AlfCache::getCacheBool(isTrue) ist not true');

        // -
        AlfCache::_()->setCacheBool('isFalse', false);
        $this->assertFalse(AlfCache::_()->getCacheBool('isFalse'),
                           '(2) AlfCache::getCacheBool(isFalse) is not false');

        // -
        AlfCache::_()->cacheBool('isCache', static function () : bool {
            return true;
        });
        $this->assertTrue(AlfCache::_()->getCacheBool('isCache'),
                          '(3) AlfCache::getCacheBool(isCache) is not true');

        // - Cache key already set, so this function should not be called!
        AlfCache::_()->cacheBool('isCache', static function () : bool {
            return false;
        });
        $this->assertTrue(AlfCache::_()->getCacheBool('isCache'),
                          '(4) AlfCache::getCacheBool(isCache) is not true');

        // - Remove cache key, so this function should be called!
        AlfCache::_()->remove('isCache');
        AlfCache::_()->cacheBool('isCache', static function () : bool {
            return false;
        });
        $this->assertFalse(AlfCache::_()->getCacheBool('isCache'),
                           '(5) AlfCache::getCacheBool(isCache) is not false');

        // - Remove cache key, so this function should be called!
        AlfCache::_()->reset();
        $this->assertNull(AlfCache::_()->getCacheBool('isCache'),
                          '(6) AlfCache::getCacheBool(isCache) is not null');

        // -
        AlfCache::_()->cacheBool('isCache', static function () : bool {
            return true;
        });
        $this->assertTrue(AlfCache::_()->getCacheBool('isCache'),
                          '(7) AlfCache::getCacheBool(isCache) is not true');

    });

test('cache int',
    function () : void {

        AlfCache::_()->setCacheInt('isFive', 5);
        $this->assertSame(5,
                          AlfCache::_()->getCacheInt('isFive'),
                          '(1) AlfCache::getCacheInt(isFive) ist not 5');

        // -
        AlfCache::_()->setCacheInt('isNegTen', -10);
        $this->assertSame(-10,
                          AlfCache::_()->getCacheInt('isNegTen'),
                          '(2) AlfCache::getCacheInt(isNegTen) is not -10');

        // -
        AlfCache::_()->cacheInt('isCache', static function () : int {
            return 8;
        });
        $this->assertSame(8,
                          AlfCache::_()->getCacheInt('isCache'),
                          '(3) AlfCache::getCacheInt(isCache) is not 8');

        // - Cache key already set, so this function should not be called!
        AlfCache::_()->cacheInt('isCache', static function () : int {
            return 4;
        });
        $this->assertSame(8,
                          AlfCache::_()->getCacheInt('isCache'),
                          '(4) AlfCache::getCacheInt(isCache) is not 8');

        // - Remove cache key, so this function should be called!
        AlfCache::_()->remove('isCache');
        AlfCache::_()->cacheInt('isCache', static function () : int {
            return 12;
        });
        $this->assertSame(12,
                          AlfCache::_()->getCacheInt('isCache'),
                          '(5) AlfCache::getCacheInt(isCache) is not 12');

        // - Remove cache key, so this function should be called!
        AlfCache::_()->reset();
        $this->assertNull(AlfCache::_()->getCacheInt('isCache'),
                          '(6) AlfCache::getCacheInt(isCache) is not null');

        // -
        AlfCache::_()->cacheInt('isCache', static function () : int {
            return 99;
        });
        $this->assertSame(99,
                          AlfCache::_()->getCacheInt('isCache'),
                          '(7) AlfCache::getCacheInt(isCache) is not 99');

    });

test('cache string',
    function () : void {

        AlfCache::_()->setCacheString('isFive', 'Five');
        $this->assertSame('Five',
                          AlfCache::_()->getCacheString('isFive'),
                          '(1) AlfCache::getCacheString(isFive) ist not "Five"');

        // -
        AlfCache::_()->setCacheString('isNegTen', 'NegTen');
        $this->assertSame('NegTen',
                          AlfCache::_()->getCacheString('isNegTen'),
                          '(2) AlfCache::getCacheString(isNegTen) is not "NegTen"');

        // -
        AlfCache::_()->cacheString('isCache', static function () : string {
            return '8';
        });
        $this->assertSame('8',
                          AlfCache::_()->getCacheString('isCache'),
                          '(3) AlfCache::getCacheString(isCache) is not "8"');

        // - Cache key already set, so this function should not be called!
        AlfCache::_()->cacheString('isCache', static function () : string {
            return '4';
        });
        $this->assertSame('8',
                          AlfCache::_()->getCacheString('isCache'),
                          '(4) AlfCache::getCacheString(isCache) is not "8"');

        // - Remove cache key, so this function should be called!
        AlfCache::_()->remove('isCache');
        AlfCache::_()->cacheString('isCache', static function () : string {
            return 'FooBar';
        });
        $this->assertSame('FooBar',
                          AlfCache::_()->getCacheString('isCache'),
                          '(5) AlfCache::getCacheString(isCache) is not "FooBar"');

        // - Remove cache key, so this function should be called!
        AlfCache::_()->reset();
        $this->assertNull(AlfCache::_()->getCacheString('isCache'),
                          '(6) AlfCache::getCacheString(isCache) is not null');

        // -
        AlfCache::_()->cacheString('isCache', static function () : string {
            return 'WooSaa';
        });
        $this->assertSame('WooSaa',
                          AlfCache::_()->getCacheString('isCache'),
                          '(7) AlfCache::getCacheString(isCache) is not "WooSaa"');

    });

test('cache array',
    function () : void {

        AlfCache::_()->setCacheArray('arrOne', ['one' => 'two', 'three' => 'four']);
        $this->assertSame(['one' => 'two', 'three' => 'four'],
                          AlfCache::_()->getCacheArray('arrOne'),
                          '(1) AlfCache::getCacheArray(arrOne) is not equal to AlfCache::setCacheArray');

        // -
        AlfCache::_()->setCacheArray('arrTwo', [3, 6, 17]);
        $this->assertSame([3, 6, 17],
                          AlfCache::_()->getCacheArray('arrTwo'),
                          '(1) AlfCache::getCacheArray(arrTwo) is not equal to AlfCache::setCacheArray');

        // -
        AlfCache::_()->cacheArray('isCache', static function () : array {
            return [0, 8, 15];
        });
        $this->assertSame([0, 8, 15],
                          AlfCache::_()->getCacheArray('isCache'),
                          '(3) AlfCache::getCacheArray(isCache) is not equal to AlfCache::setCacheArray');

        // - Cache key already set, so this function should not be called!
        AlfCache::_()->cacheArray('isCache', static function () : array {
            return ['Alpha', 'Beta'];
        });
        $this->assertSame([0, 8, 15],
                          AlfCache::_()->getCacheArray('isCache'),
                          '(4) AlfCache::getCacheArray(isCache) is not equal to first AlfCache::setCacheArray');

        // - Remove cache key, so this function should be called!
        AlfCache::_()->remove('isCache');
        AlfCache::_()->cacheArray('isCache', static function () : array {
            return [47, 12];
        });
        $this->assertSame([47, 12],
                          AlfCache::_()->getCacheArray('isCache'),
                          '(5) AlfCache::getCacheArray(isCache) is not equal to AlfCache::setCacheArray');

        // - Remove cache key, so this function should be called!
        AlfCache::_()->reset();
        $this->assertNull(AlfCache::_()->getCacheArray('isCache'),
                          '(6) AlfCache::getCacheString(isCache) is not null');

        // -
        AlfCache::_()->cacheArray('isCache', static function () : array {
            return ['oh' => 'yes'];
        });
        $this->assertSame(['oh' => 'yes'],
                          AlfCache::_()->getCacheArray('isCache'),
                          '(7) AlfCache::getCacheString(isCache) is not equal to AlfCache::setCacheArray');

    });

test('cross type bool',
    function () : void {
        AlfCache::_()->reset();

        AlfCache::_()->setCacheBool('over', true);

        $this->assertNull(AlfCache::_()->getCacheInt('over'), 'cache over is not null for int');
        $this->assertNull(AlfCache::_()->getCacheString('over'), 'cache over is not null for string');
        $this->assertNull(AlfCache::_()->getCacheArray('over'), 'cache over is not null for array');

        expect(AlfCache::_()->getCacheBool('over'))->toBeTrue();
    });

test('cross type int',
    function () : void {
        AlfCache::_()->reset();

        AlfCache::_()->setCacheInt('over', 10);

        $this->assertNull(AlfCache::_()->getCacheBool('over'), 'cache over is not null for bool');
        $this->assertNull(AlfCache::_()->getCacheString('over'), 'cache over is not null for string');
        $this->assertNull(AlfCache::_()->getCacheArray('over'), 'cache over is not null for array');

        expect(AlfCache::_()->getCacheInt('over'))->toBe(10);
    });

test('cross type string',
    function () : void {
        AlfCache::_()->reset();

        AlfCache::_()->setCacheString('over', 'Alf4712');

        $this->assertNull(AlfCache::_()->getCacheBool('over'), 'cache over is not null for bool');
        $this->assertNull(AlfCache::_()->getCacheInt('over'), 'cache over is not null for int');
        $this->assertNull(AlfCache::_()->getCacheArray('over'), 'cache over is not null for array');

        expect(AlfCache::_()->getCacheString('over'))->toBe('Alf4712');
    });

test('cross type array',
    function () : void {
        AlfCache::_()->reset();

        AlfCache::_()->setCacheArray('over', ['alf' => '4712']);

        $this->assertNull(AlfCache::_()->getCacheBool('over'), 'cache over is not null for bool');
        $this->assertNull(AlfCache::_()->getCacheInt('over'), 'cache over is not null for int');
        $this->assertNull(AlfCache::_()->getCacheString('over'), 'cache over is not null for string');

        expect(AlfCache::_()->getCacheArray('over'))->toBe(['alf' => '4712']);
    });
