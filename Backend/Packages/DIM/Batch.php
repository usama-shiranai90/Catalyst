<?php

class Batch implements JsonSerializable
{

    private $batchCode;
    private $batchName;

    protected string $batchYear;
    private $curriculumCode;
    private $programCode;

    public $databaseConnection;


    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton::getConnection();
    }

    public function createNewBatch($curriculumCode, $programCode, $seasonCode, $shortBatchName, $createdYear): bool
    {
        $sql = /** @lang text */
            "insert into batch(curriculumCode, programCode, year, seasonCode, batchName, dateCreated)
             VALUES (\"$curriculumCode\" , \"$programCode\" , \"$createdYear\" ,\"$seasonCode\" ,
             \"$shortBatchName\", NOW());";

        $result = $this->databaseConnection->query($sql);
        if ($result) {
            $this->setBatchCode($this->databaseConnection->insert_id);
            return true;
        }
        return false;
    }


//    Return batches of last 6 years
    public function retrieveAllEligibleBatches(): array
    {
        $sql = /** @lang text */
            "select * from batch where year between
    (select YEAR(DATE_SUB((select dateCreated from batch order by dateCreated desc limit 1), INTERVAL 5 year )))
    and
    (select year from batch order by year desc limit 1) order by dateCreated
";
        $result = $this->databaseConnection->query($sql);

        $listOfBatches = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $newBatch = new Batch();
                $newBatch->batchCode = $row["batchCode"];
                $newBatch->batchName = $row["batchName"];
                $newBatch->curriculumCode = $row["curriculumCode"];
                $newBatch->programCode = $row["programCode"];
                $newBatch->batchYear = $row["year"];
                array_push($listOfBatches, $newBatch);
            }
        } else
            echo "No batches found";

        return $listOfBatches;
    }


    public function retrieveEntireBatchList(): array
    {
        $sql = /** @lang text */
            "select * from batch where year between
    (select YEAR(DATE_SUB((select dateCreated from batch order by dateCreated desc limit 1), INTERVAL 5 year )))
    and
    (select year from batch order by year desc limit 1) order by dateCreated
";
        $result = $this->databaseConnection->query($sql);

        $listOfBatches = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $temp = array(
                    'batchCode' => $row['batchCode'],
                    'batchName' => $row['batchName'],
                    'curriculumCode' => $row['curriculumCode'],
                    'seasonCode' => $row['seasonCode'],
                    'programCode' => $row['programCode'],
                );
                array_push($listOfBatches, $temp);

            }
        } else
            echo "No batches found";

        return $listOfBatches;
    }


    public function retrieveBatchList($programCode): ?array
    {
        $listOfBatches = array();
        if (is_array($programCode) && sizeof($programCode) > 1) {
            foreach ($programCode as $value) {
                $key = $value->getProgramCode();
                $sql = /** @lang text */
                    "select batchCode, seasonCode, batchName, dateCreated from batch where programCode = \"$key \" ";
                $result = $this->databaseConnection->query($sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $newBatch = new Batch();
                        $newBatch->batchCode = $row["batchCode"];
                        $newBatch->batchName = $row["batchName"];
                        array_push($listOfBatches, $newBatch);
                    }
                } else {
                    return $listOfBatches;
                }
            }
        } else {
            $sql = /** @lang text */
                "select batchCode, seasonCode, batchName, dateCreated from batch where programCode = \"$programCode \" ";
            $result = $this->databaseConnection->query($sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $newBatch = new Batch();
                    $newBatch->batchCode = $row["batchCode"];
                    $newBatch->batchName = $row["batchName"];
                    array_push($listOfBatches, $newBatch);
                }
            } else
                return null;
        }

        return $listOfBatches;
    }


    public function setBatchCode($batchCode): void
    {
        $this->batchCode = $batchCode;
    }

    public function getBatchCode()
    {
        return $this->batchCode;
    }

    public function getBatchName()
    {
        return $this->batchName;
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


    public function getDatabaseConnection(): ?mysqli
    {
        return $this->databaseConnection;
    }


    public function jsonSerialize()
    {
        return array(
            'programCode' => $this->programCode,
            'batchName' => $this->batchName,
            'batchCode' => $this->batchCode
        );
    }
}


?>