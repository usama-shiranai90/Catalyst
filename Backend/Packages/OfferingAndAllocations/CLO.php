<?php

class CLO
{
    public $cloCode;
    public $cloName;
    public $cloDescription;

    public function __construct($cloCode,$cloName, $cloDescription)
    {
        $this->cloCode = $cloCode;
        $this->cloName = $cloName;
        $this->cloDescription = $cloDescription;
    }


    public function toString()
    {
        echo "CLOName:" . $this->cloName . ", ";
        echo "CLODescription:" . $this->cloDescription . "<br> ";
    }
}

?>