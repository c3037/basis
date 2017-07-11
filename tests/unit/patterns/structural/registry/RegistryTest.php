<?php

namespace c3037\Tests\Unit\Patterns\Structural\Registry;

use c3037\Patterns\Structural\Registry;
use PHPUnit\Framework\TestCase;

class RegistryTest extends TestCase
{
    public function testPattern()
    {
        $this->assertFalse(Registry::exist('UnexpectedKey'));
        $this->assertFalse(Registry::get('UnexpectedKey'));

        /** @noinspection PhpParamsInspection */
        $this->assertFalse(Registry::set([], false));

        $key   = 'testKey';
        $value = 'testValue';

        Registry::set($key, $value);
        $this->assertEquals($value, Registry::get($key));

        $this->assertTrue(Registry::remove($key));
        $this->assertFalse(Registry::get($key));
    }
}
