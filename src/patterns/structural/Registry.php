<?php

namespace c3037\Patterns\Structural;

use c3037\Patterns\Creational\Singleton;

/** Class Registry. */
abstract class Registry extends Singleton
{
    /** @var array */
    private static $storage = [];

    /**
     * @param int|string $index
     * @param mixed      $object
     * @return bool
     */
    public static function set($index, $object)
    {
        if (!is_int($index) && !is_string($index)) {
            return false;
        }
        self::$storage[$index] = $object;
        return true;
    }

    /**
     * @param int|string $index
     * @return bool
     */
    public static function exist($index)
    {
        return array_key_exists($index, self::$storage);
    }

    /**
     * @param int|string $index
     * @return bool|mixed
     */
    public static function get($index)
    {
        if (self::exist($index)) {
            return self::$storage[$index];
        }
        return false;
    }

    /**
     * @param int|string $index
     * @return bool
     */
    public static function remove($index)
    {
        if (self::exist($index)) {
            unset(self::$storage[$index]);
            return true;
        }
        return false;
    }
}
