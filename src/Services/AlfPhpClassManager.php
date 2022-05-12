<?php

namespace Alf\Services;

use Alf\AlfBasicSingleton;
use Alf\Attributes\AlfAttrAutoComplete;
use ReflectionClass;

class AlfPhpClassManager extends AlfBasicSingleton {

    /** @AlfAttrAutoComplete */
    #[AlfAttrAutoComplete]
    public static function _AlfPhpClassManager($obj) : AlfPhpClassManager {
        return AlfProgramming::_()->unused($obj, static::_AlfBasicSingleton($obj));
    }

    public function getParent(object $obj) : ?string {
        return (new ReflectionClass($obj))?->getParentClass()?->getName();
    }

    public function listParents(object $obj) : array {
        $reflection = new ReflectionClass($obj);
        return $this->getParentsByReflection($reflection);
    }

    protected function getParentsByReflection(ReflectionClass $reflection) : array {
        return AlfCache::_()->cacheArray(__METHOD__.'::'.$reflection->getShortName(),
            static function () use ($reflection) : array {
                $parents = [];
                while ($parent = $reflection->getParentClass()) {
                    $parents[$parent->getName()] = $parent->getShortName();
                    $reflection = $parent;
                }
                return $parents;
            });
    }

    public function listTraits(object $obj) : array {
        $reflection = new ReflectionClass($obj);
        return $this->getTraitsByReflection($reflection);
    }

    protected function getTraitsByReflection(ReflectionClass $reflection) : array {
        return AlfCache::_()->cacheArray(__METHOD__.'::'.$reflection->getName(),
            function () use ($reflection) : array {
                $output = [];

                // -
                $parentReflection = $reflection->getParentClass();
                if (is_object($parentReflection)) {
                    foreach ($this->getTraitsByReflection($parentReflection) as $subTraitName => $subTraitShortName) {
                        unset($output[$subTraitName]);
                        $output[$subTraitName] = $subTraitShortName;
                    }
                }

                foreach ($reflection->getTraits() as $traitName => $traitObject) {
                    $output[$traitName] = $traitObject->getShortName();
                    foreach ($this->getTraitsByReflection($traitObject) as $subTraitName => $subTraitShortName) {
                        unset($output[$subTraitName]);
                        $output[$subTraitName] = $subTraitShortName;
                    }
                }

                return $output;
            });
    }

}
