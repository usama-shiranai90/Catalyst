<?php

class Batch{

    protected static int $batchCode;
    protected string $batchYear;

    public function __construct(){
    }

    /**
     * @return int
     */
    public static function getBatchCode(): int
    {
        return self::$batchCode;
    }

    /**
     * @param int $batchCode
     */
    public static function setBatchCode(int $batchCode): void
    {
        self::$batchCode = $batchCode;
    }

    /**
     * @return string
     */
    public function getBatchYear(): string
    {
        return $this->batchYear;
    }

    /**
     * @param string $batchYear
     */
    public function setBatchYear(string $batchYear): void
    {
        $this->batchYear = $batchYear;
    }





}


?>