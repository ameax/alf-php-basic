<?php

namespace Alf\Services;

use Alf\AlfBasicSingleton;
use Alf\Attributes\AlfAttrAutoComplete;
use JetBrains\PhpStorm\Pure;

class AlfCache extends AlfBasicSingleton {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfCache($obj) : AlfCache {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicSingleton($obj));
    }

    private array $cacheBool   = [];
    private array $cacheInt    = [];
    private array $cacheString = [];
    private array $cacheArray  = [];

    public function reset() : static {
        $this->cacheBool = [];
        $this->cacheInt = [];
        $this->cacheString = [];
        $this->cacheArray = [];
        return $this;
    }

    public function remove(string $key) : static {
        unset(
            $this->cacheBool[$key],
            $this->cacheInt[$key],
            $this->cacheString[$key],
            $this->cacheArray[$key]
        );
        return $this;
    }

    final protected function setCache(string $key, array &$cache, $value) : static {
        $cache[$key] = $value;
        return $this;
    }

    #[Pure]
    final protected function getCache(string $key, array $cache) : bool|int|string|array|null {
        return $cache[$key] ?? null;
    }

    final protected function cache(string $key, array &$cache, callable $funcIfNotExists) : bool|int|string|array {
        if (!array_key_exists($key, $cache)) {
            $cache[$key] = $funcIfNotExists();
        }
        return $cache[$key];
    }

    public function setCacheBool(string $key, bool $value) : static {
        return $this->setCache($key, $this->cacheBool, $value);
    }

    #[Pure]
    public function getCacheBool(string $key) : ?bool {
        return $this->getCache($key, $this->cacheBool);
    }

    public function cacheBool(string $key, callable $funcIfNotExists) : bool {
        return $this->cache($key, $this->cacheBool, $funcIfNotExists);
    }

    public function setCacheInt(string $key, int $value) : static {
        return $this->setCache($key, $this->cacheInt, $value);
    }

    #[Pure]
    public function getCacheInt(string $key) : ?int {
        return $this->getCache($key, $this->cacheInt);
    }

    public function cacheInt(string $key, callable $funcIfNotExists) : int {
        return $this->cache($key, $this->cacheInt, $funcIfNotExists);
    }

    public function setCacheString(string $key, string $value) : static {
        return $this->setCache($key, $this->cacheString, $value);
    }

    #[Pure]
    public function getCacheString(string $key) : ?string {
        return $this->getCache($key, $this->cacheString);
    }

    public function cacheString(string $key, callable $funcIfNotExists) : string {
        return $this->cache($key, $this->cacheString, $funcIfNotExists);
    }

    public function setCacheArray(string $key, array $value) : static {
        return $this->setCache($key, $this->cacheArray, $value);
    }

    #[Pure]
    public function getCacheArray(string $key) : ?array {
        return $this->getCache($key, $this->cacheArray);
    }

    public function cacheArray(string $key, callable $funcIfNotExists) : array {
        return $this->cache($key, $this->cacheArray, $funcIfNotExists);
    }

}
