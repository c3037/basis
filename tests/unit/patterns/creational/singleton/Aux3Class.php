<?php

namespace c3037\Tests\Unit\Patterns\Creational\Singleton;

class Aux3Class extends Aux2Class
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
