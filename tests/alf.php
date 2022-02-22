<?php

use Alf\Types\Scalars\AlfInt;

if (file_exists('../vendor/autoload.php')) {
    require_once('../vendor/autoload.php');
} else {
    require_once('./vendor/autoload.php');
}

$foo = new AlfInt(5);
print_r($foo);

eval('$x = new Alf\Types\Scalars\AlfInt(3);');
$bar = AlfInt::_AlfInt($x);
var_dump($bar->isEmpty());
