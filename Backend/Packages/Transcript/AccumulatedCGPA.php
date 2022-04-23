<?php

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
        $dbStatement = /** @lang text limit 1,1; */
            "select semtranscriptCode, studentRegCode, semesterCode, approvalStatus, sgpa, cgpa from semestertranscript
             where studentRegCode = \"$studentRegistrationCode\" order by semestertranscript.semtranscriptCode desc limit 1,1 ";

        $result = $this->databaseConnection->query($dbStatement);
        if (!empty(mysqli_num_rows($result)) && mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->transcriptCode = $row['semtranscriptCode'];
                $this->approvalStatus = $row['approvalStatus'];
                $this->previousSemesterGPA = $row['sgpa'];
                $this->cgpa = $row['cgpa'];
                return true;
            }
        }
        return false;
//            echo "Cant fetch latest semester Data : " . $this->databaseConnection->error;
    }


    function studentAllSemesterGPA($studentRegistrationCode): ?array
    {
        $gpaArray = [];
        $dbStatement = /** @lang text   limit 1,1; */
            "select cgpa from semestertranscript where studentRegCode =
              \"$studentRegistrationCode\"";

        $result = $this->databaseConnection->query($dbStatement);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->cgpa = $row['cgpa'];
                array_push($gpaArray, $row['cgpa']);
            }
        } else {
//            echo "Cant fetch last semester Data : " . $this->databaseConnection->error;
            return null;
        }

//        array_push($gpaArray, "3.3", "3.9", "2.6" , "1.3");
        return $gpaArray;
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