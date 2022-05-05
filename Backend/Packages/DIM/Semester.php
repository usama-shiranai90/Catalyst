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

    public function createNewSemester($batchCode, $semesterName = 1): bool
    {
        $prepareStatementInsertionQuery = $this->databaseConnection->prepare("insert into semester(batchCode, semesterName)
             VALUES (?,?)");

        $sanitizeBatchCode = FormValidator::sanitizeUserInput($batchCode, 'int');
        $sanitizeSemesterName = FormValidator::sanitizeStringWithSpace(FormValidator::sanitizeUserInput($semesterName, 'string'));
        $prepareStatementInsertionQuery->bind_param('is',  $sanitizeBatchCode, $sanitizeSemesterName);
        if ($prepareStatementInsertionQuery->execute()) {
            $this->setSemesterCode($this->databaseConnection->insert_id);
            return true;
        }
        return false;
    }


// SemCode _. sectionCode . Faculty Allocation Ma Search karo...

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
        $prepareStatementSearchQuery = $this->databaseConnection->prepare('select * from batch b join semester s on b.batchCode = s.batchCode where
             b.batchCode = ? order by s.semesterCode desc limit 1; ;');

        $sanitizeBatchCode = FormValidator::sanitizeUserInput($batchCode, 'int');
        $prepareStatementSearchQuery->bind_param('i', $sanitizeBatchCode);
        if ($prepareStatementSearchQuery->execute()) {
            $result = $prepareStatementSearchQuery->get_result();
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $this->semesterCode = $row["semesterCode"];
                    $this->semesterName = $row["semesterName"];
                    return true;
                }
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

    public function getDatabaseConnection(): ?mysqli
    {
        return $this->databaseConnection;
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