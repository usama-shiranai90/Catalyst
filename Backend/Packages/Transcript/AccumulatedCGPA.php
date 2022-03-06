<?php
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DatabaseConnection\db.php";

class AccumulatedCGPA implements JsonSerializable
{
    protected $transcriptCode;
    protected $approvalStatus;
    protected $previousSemesterGPA;
    protected $cgpa;

    protected $databaseConnection;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton::getConnection();
    }

    function retrieveLatestCGPA($studentRegistrationCode): bool
    {
        $dbStatement = /** @lang text */
            "select semtranscriptCode, studentRegCode, semesterCode, approvalStatus, sgpa, cgpa from semestertranscript  
        where studentRegCode = \"$studentRegistrationCode\" order by studentRegCode limit 1;";

        $result = $this->databaseConnection->query($dbStatement);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->transcriptCode = $row['semtranscriptCode'];
                $this->approvalStatus = $row['approvalStatus'];
                $this->previousSemesterGPA = $row['sgpa'];
                $this->cgpa = $row['cgpa'];
                return true;
            }
        }
        echo "Cant fetch last semester Data : " . $this->databaseConnection->error;
        return false;
    }

    public function jsonSerialize(): mixed
    {
        return array(
            'CGPA' => $this->cgpa,
            'previousGPA' => $this->previousSemesterGPA,
            'transcriptCode' => $this->transcriptCode,
            'approvalStatus' => $this->approvalStatus
        );
    }
}