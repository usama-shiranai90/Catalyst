<?php

class Semester implements JsonSerializable
{
    public $semesterCode;
    public $semesterName;
    protected $databaseConnection;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();

    }

    public function retrieveSemesterName($semesterCode): void
    {
        $this->setSemesterCode($semesterCode);
        $sql = /** @lang text */
            "select semesterName from semester where semesterCode = \"$semesterCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $this->semesterName = $row["semesterName"];
            }
        } else
            echo "No semester found";
    }

    /**OneEyeOwl*/
    public function retrieveCurrentSemester($batchCode): bool
    {
        $dbStatement = /** @lang text */
            "select * from batch b join semester s on b.batchCode = s.batchCode where
             b.batchCode = \"$batchCode\" order by s.semesterCode desc limit 1; ";

        $result = $this->databaseConnection->query($dbStatement);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->semesterCode = $row["semesterCode"];
                $this->semesterName = $row["semesterName"];
                return true;
            }
        }
        return false;
    }

    public function toString()
    {
        echo "<br>Semester Name:" . $this->getSemesterName();
        echo "<br>Semester Code:" . $this->getSemesterCode();
    }

    public function getSemesterName()
    {
        return $this->semesterName;
    }

    public function setSemesterName($semesterName): void
    {
        $this->semesterName = $semesterName;
    }

    public function getSemesterCode()
    {
        return $this->semesterCode;
    }

    public function setSemesterCode($semesterCode): void
    {
        $this->semesterCode = $semesterCode;
    }

    public function jsonSerialize()
    {
        return array(
            'semesterCode' => $this->semesterCode,
            'semesterName' => $this->semesterName
        );
    }
}

?>