<?php

namespace c3037\Patterns\Creational;

/** Class Singleton. */
abstract class Singleton
{
    /** @var array */
    private static $instances = [];

    /** @return static */
    final public static function getInstance()
    {
        $calledClass = get_called_class();

        if (empty(self::$instances[$calledClass])) {
            self::$instances[$calledClass] = new static();
        }

        return self::$instances[$calledClass];
    }

    final private function __construct()
    {
    }

    final private function __clone()
    {
    }

    /** @noinspection PhpUnusedPrivateMethodInspection */
    final public function __sleep()
    {
        throw new \Error('Serialization is forbidden for ' . get_called_class());
    }

    /** @noinspection PhpUnusedPrivateMethodInspection */
    final public function __wakeup()
    {
        throw new \Error('Unserialization is forbidden for ' . get_called_class());
    }
}
