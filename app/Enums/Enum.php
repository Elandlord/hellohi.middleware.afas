<?php namespace App\Enums;

use ReflectionClass;
use ReflectionException;

abstract class Enum {
    /**
 * @return array
 * @throws ReflectionException
 */
static function getKeys(){
    $class = new ReflectionClass(get_called_class());
    return array_keys($class->getConstants());
}
}