<?php

namespace c3037\Tests\Unit\Patterns\Creational\Singleton;

use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function testPattern()
    {
        $object1a = Aux1Class::getInstance();
        $object1a->setVariable(uniqid());

        $object1b = Aux1Class::getInstance();
        $object1b->setVariable(uniqid());

        $this->assertInstanceOf(Aux1Class::class, $object1a);
        $this->assertInstanceOf(Aux1Class::class, $object1b);
        $this->assertSame($object1a->getVariable(), $object1b->getVariable());

        $object2 = Aux2Class::getInstance();
        $object2->setVariable(uniqid());

        $object3 = Aux3Class::getInstance();
        $object3->setVariable(uniqid());

        $this->assertInstanceOf(Aux2Class::class, $object2);
        $this->assertInstanceOf(Aux3Class::class, $object3);
        $this->assertNotSame($object1a->getVariable(), $object2->getVariable());
        $this->assertNotSame($object1a->getVariable(), $object3->getVariable());
        $this->assertNotSame($object2->getVariable(), $object3->getVariable());
    }

    /**
     * @expectedException \Error
     */
    public function testCanNotInstantiate()
    {
        $class = Aux1Class::class;
        (new $class);
    }

    /**
     * @expectedException \Error
     */
    public function testCanNotClone()
    {
        $object = Aux1Class::getInstance();
        (clone $object);
    }

    /**
     * @expectedException \Error
     */
    public function testCanNotSerialize()
    {
        $object = Aux1Class::getInstance();
        $string = (serialize($object));
        (unserialize($string));
    }
}
