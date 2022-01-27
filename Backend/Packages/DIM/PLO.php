<?php

class PLO{

    protected $ploCode;
    protected $ploName = "";
    protected $ploDescription = "";

    public function __construct(){
    }

    /**
     * @return int
     */
    public function getPloCode(): int
    {
        return $this->ploCode;
    }

    /**
     * @param int $ploCode
     */
    public function setPloCode(int $ploCode): void
    {
        $this->ploCode = $ploCode;
    }

    /**
     * @return string
     */
    public function getPloName(): string
    {
        return $this->ploName;
    }

    /**
     * @param string $ploName
     */
    public function setPloName(string $ploName): void
    {
        $this->ploName = $ploName;
    }

    /**
     * @return string
     */
    public function getPloDescription(): string
    {
        return $this->ploDescription;
    }

    /**
     * @param string $ploDescription
     */
    public function setPloDescription(string $ploDescription): void
    {
        $this->ploDescription = $ploDescription;
    }



}

?>