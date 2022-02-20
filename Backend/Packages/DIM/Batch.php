<?php

class Batch implements JsonSerializable{

    protected static int $batchCode;
    protected string $batchYear;

    private $programCode;
    private $batchName;
    private $curriculumCode;

    protected $databaseConnection;


    public function __construct(){
        $this->databaseConnection = DatabaseSingleton::getConnection();
    }


    public function retrieveAllBatches()
    {
        $sql = /** @lang text */
            "select * from batch";
        $result = $this->databaseConnection->query($sql);

        $listOfBatches = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $newBatch = new Batch();
                $newBatch->batchCode = $row["batchCode"];
                $newBatch->batchName = $row["batchName"];
                $newBatch->curriculumCode = $row["curriculumCode"];
                $newBatch->programCode = $row["programCode"];
                $newBatch->year = $row["year"];

                array_push($listOfBatches, $newBatch);
            }
        } else
            echo "No batches found";

        return $listOfBatches;
    }

    public static function getBatchCode(): int
    {
        return self::$batchCode;
    }

    public static function setBatchCode(int $batchCode): void
    {
        self::$batchCode = $batchCode;
    }

    public function getBatchYear(): string
    {
        return $this->batchYear;
    }

    public function setBatchYear(string $batchYear): void
    {
        $this->batchYear = $batchYear;
    }

    public function getProgramCode()
    {
        return $this->programCode;
    }

    public function setProgramCode($programCode): void
    {
        $this->programCode = $programCode;
    }

    public function getBatchName()
    {
        return $this->batchName;
    }

    public function setBatchName($batchName): void
    {
        $this->batchName = $batchName;
    }

    public function getCurriculumCode()
    {
        return $this->curriculumCode;
    }

    public function setCurriculumCode($curriculumCode): void
    {
        $this->curriculumCode = $curriculumCode;
    }



    public function jsonSerialize()
    {
        return array(
            'programCode'=>$this->programCode,
            'batchName'=>$this->batchName,
            'batchCode'=>self::$batchCode
        );
    }
}


?>