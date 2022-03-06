<?php

use JetBrains\PhpStorm\ArrayShape;

include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DatabaseConnection\db.php";

class Course implements JsonSerializable
{
    protected $databaseConnection;
    protected $preReqList;
    private $courseCode;
    private $courseName;
    private $courseCreditHour;
    private $courseCLOList;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $this->courseCLOList = array();
        $this->preReqList = array();
    }

    public function retrieveCourseName($courseCode): void
    {
        $this->setCourseCode($courseCode);
        $sql = /** @lang text */
            "select courseTitle from course where courseCode = \"$courseCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $this->courseName = $row["courseTitle"];
            }
        } else
            echo "No course found with course code:" . $courseCode;
    }

    public function setCourseName($courseCode): void
    {
        $this->setCourseCode($courseCode);
        $sql = /** @lang text */
            "select courseTitle from course where courseCode = \"$courseCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $this->courseName = $row["courseTitle"];
            }
        } else
            echo "No course found with course code:" . $courseCode;
    }

    public function getCreditHourAndTitle($courseCode): void
    {
        $this->courseCode = $courseCode;
        $sql = /** @lang text */
            "select courseTitle,creditHours from course where courseCode = \"$courseCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $this->courseName = $row["courseTitle"];
                $this->courseCreditHour = $row["creditHours"];
            }
        } else
            echo "No course found with course code:" . $courseCode;
    }

    public function getPreReqList(): array
    {
        /** @lang text */
        $sql =
            "select preRequisiteName from prerequisites where courseCode = \"$this->courseCode\"";
        $result = $this->databaseConnection->query($sql);

        if ($result != null && !empty(mysqli_num_rows($result)) && mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->preReqList[] = $row["preRequisiteName"];
            }
        } else {
//            echo "No Pre-Req ";
        }
        return $this->preReqList;
    }

    public function setPreReqList($preReqList): void
    {
        $this->preReqList = $preReqList;
    }

    public function getEnrolledCourses($studentCode, $semesterCode,$batchCode , $programCode): ?array
    {
        $enrolledCourses = array();
        $dbStatement = /** @lang text */
            "select * from courseregistration inner join registeredcourses r on courseregistration.courseRegistrationCode = r.courseRegistrationCode  
            inner join course c on r.courseCode = c.courseCode where courseregistration.studentRegCode = \"$studentCode\" and courseregistration.semesterCode = \"$semesterCode\";";

        $result = $this->databaseConnection->query($dbStatement);
        if (!empty(mysqli_num_rows($result)) && mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $courseObject = new Course();
                $courseObject->courseCode = $row['courseCode'];
                $courseObject->courseName = $row['courseTitle'];
                $courseObject->courseCreditHour = $row['creditHours'];
                $courseObject->retrieveEntireCLOList($row['courseCode'] , $programCode ,$batchCode); // cc , pm , bc
                array_push($enrolledCourses, $courseObject);
            }
            return $enrolledCourses;
        } else {
            echo sprintf("outside %s<br>%s%s", mysqli_num_rows($result), $studentCode, $semesterCode);
            return null;
        }
    }

    public function retrieveEntireCLOList($courseCode, $programCode, $batchCode)
    {
        $sql = /** @lang text */
            "select * from clo where courseCode = \"$courseCode\" and programCode = \"$programCode\" and batchCode = \"$batchCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->courseCLOList[] = array(
                    "cloCode" => $row["CLOCode"],
                    "cloName" => $row["cloName"],
                    "description" => $row["description"],
                    "domain" => $row["domain"],
                    "btLevel" => $row["btLevel"],
                );
            }
        }
    }


    public function retreiveCourseCLOList($courseCode, $programCode, $curriculumCode, $batchCode): void
    {
        $sql = /** @lang text */
            "select * from clo where courseCode = \"$courseCode\" and curriculumCode = \"$curriculumCode\" 
            and programCode = \"$programCode\" and batchCode = \"$batchCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $newCLO = new CLO();
                $newCLO->setCloCode($row["CLOCode"]);
                $newCLO->setCloName($row["cloName"]);
                $newCLO->setCloDescription($row["description"]);
                array_push($this->courseCLOList, $newCLO);
            }
        } else {
            echo "No CLOs found for course code: " . $courseCode;
            echo "<br>Program Code: " . $programCode;
            echo "<br>Curriculum Code: " . $curriculumCode;
            echo "<br>Batch Code: " . $batchCode;
            echo "<br>Course Code: " . $courseCode;
        }
    }

    /**
     * @return mixed
     */
    public function getCourseCreditHour()
    {
        return $this->courseCreditHour;
    }

    /**
     * @param mixed $courseCreditHour
     */
    public function setCourseCreditHour($courseCreditHour): void
    {
        $this->courseCreditHour = $courseCreditHour;
    }

    public function toString()
    {
        echo "<br>CourseTitle:" . $this->getCourseTitle() . ", ";
        echo "<br>CourseCode:" . $this->getCourseCode() . ", ";
        echo "<br>CLOList: ";
        for ($x = 0; $x < sizeof($this->getCourseCLOList()); $x++) {
            echo $this->getCourseCLOList()[$x]->toString();
        }
    }

    public function getCourseTitle()
    {
        return $this->courseName;
    }

    public function getCourseCode()
    {
        return $this->courseCode;
    }

    public function setCourseCode($courseCode): void
    {
        $this->courseCode = $courseCode;
    }

    public function getCourseCLOList()
    {
        return $this->courseCLOList;
    }

    public function setCourseCLOList($courseCode, $programCode, $curriculumCode, $batchCode): void
    {
        $sql = /** @lang text */
            "select * from clo where courseCode = \"$courseCode\" and curriculumCode = \"$curriculumCode\" 
            and programCode = \"$programCode\" and batchCode = \"$batchCode\"";
//            "select * from clo where courseCode = \"$courseCode\" and curriculumCode = \"$curriculumCode\" and programCode = \"$programCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $newCLO = new CLO();
                $newCLO->creation($row["CLOCode"], $row["cloName"], $row["description"], $row["domain"], $row["btLevel"]);
                array_push($this->courseCLOList, $newCLO);
            }
        } else {
            echo "No CLOs found for course code: " . $courseCode;
            echo "<br>Program Code: " . $programCode;
            echo "<br>Curriculum Code: " . $curriculumCode;
            echo "<br>Batch Code: " . $batchCode;
            echo "<br>Course Code: " . $courseCode;
        }
    }

    public function jsonSerialize(): array
    {
        return array(
            'courseCode' => $this->courseCode,
            'courseName' => $this->courseName,
            'courseCreditHour' => $this->courseCreditHour,
            'CourseCLOList' => $this->courseCLOList
        );
    }
}


//    protected $preReqList;
//    private $courseCode;
//    private $courseName;
//    private $courseCreditHour;
//    private $courseCLOList;