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

    /**
     * S# function is used to get students latest cgpa.
     * if no record found false.
     * if record found true.
     */
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

    /**
     * S# function is used to get students all semester GPA List.
     * if no record exist then return null
     * if record exist/found return array.
     * we only need to get student CGPA.
     */
    function studentAllSemesterGPA($studentRegistrationCode): ?array
    {
        $gpaArray = [];
        $dbStatement = /** @lang text   limit 1,1; */
            "select cgpa from semestertranscript where studentRegCode =
              \"$studentRegistrationCode\"";

        $result = $this->databaseConnection->query($dbStatement);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($gpaArray, $row['cgpa']);
            }
            return $gpaArray;
        } else
            return null;
    }

    /**
     * S# function is used to get Student all Program Learning outcome PLO.
     * if no record exist then return null
     * if record exist/found return array.
     */
    function getProgramLearningOutcomeTranscriptStudent($studentCode, $semesterCode): ?array
    {
        $programLearningOutcomeArray = [];
        $dbStatement = /** @lang text */
            "select semesterCode, studentRegCode, semesterCode, p.ploCode, ploName, percentage
            from semestertranscript
            join semesterobetranscriptplos s on semestertranscript.semtranscriptCode = s.semtranscriptCode
            join plo p on s.ploCode = p.PLOCode
            where studentRegCode = \"$studentCode\"
            and semesterCode = (select max(semesterCode)
            from semester
            where batchCode = (select batchCode from semester where semesterCode = \"$semesterCode\")
            and semesterCode < (select max(semesterCode)
            from semester
            where batchCode = (select batchCode from semester where semesterCode = \"$semesterCode\"))); ";

        $result = $this->databaseConnection->query($dbStatement);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp = array(
                    "regNumber" => $row['studentRegCode'],
                    "ploName" => $row['ploName'],
                    "percentage" => $row['percentage'],
                );

                array_push($programLearningOutcomeArray, $temp);
            }
            return $programLearningOutcomeArray;
        } else
            return null;
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