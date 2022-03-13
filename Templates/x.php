<?php

class Str
{
    private $value = '';

    private $functions = ['xxxxx' => 'strlen', 'upper' => 'strtoupper', 'lower' => 'strtolower'];

    public function __construct(string $s)
    {
        $this->value = $s;
    }

    public function __call($method, $args){
        if (!in_array($method, array_keys($this->functions))) {
            throw new BadMethodCallException();
        }

        array_unshift($args, $this->value);

        return call_user_func_array($this->functions[$method], $args);
    }
}



$object = new Str('Nani ga fakku!');

echo $object->upper() . '<br>';
echo $object->lower() . '<br>';
echo $object->xxxxx() . '<br>';

