<?php

namespace c3037\Tests\Unit\Patterns\Creational\Singleton;

use c3037\Patterns\Creational\Singleton;

class Aux2Class extends Singleton
{
    /** @var mixed */
    private $variable;

    /**
     * @return mixed
     */
    public function getVariable()
    {
        return $this->variable;
    }

    /**
     * @param mixed $variable
     */
    public function setVariable($variable)
    {
        $this->variable = $variable;
    }
}
