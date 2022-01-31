<?php

include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DatabaseConnection\db.php";

class Course
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

        /*        $db = new db();
                $courseInfo = $db->query('select * from prerequisites where courseCode = ?' , $this->courseCode)->fetchAll();

                foreach ($courseInfo as $itemcp) {
                    echo $itemcp['preRequisiteName'] . '<br>';
                    array_push($this->preReqList , $itemcp['preRequisiteName'] );
                }*/

    }

    public function setPreReqList($preReqList): void
    {
        $this->preReqList = $preReqList;
    }

    public function toString()
    {
        echo "<br>CourseTitle:" . $this->getCourseTitle() . ", ";
        echo "<br>CourseCode:" . $this->getCourseCode() . ", ";
        echo "<br>creditHour:" . $this->getCourseCreditHour() . ", ";
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

    public function getCourseCLOList()
    {
        return $this->courseCLOList;
    }

    public function setCourseCLOList($courseCode, $programCode, $curriculumCode): void
    {
        $sql = /** @lang text */
            "select * from clo where courseCode = \"$courseCode\" and curriculumCode = \"$curriculumCode\" and programCode = \"$programCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $newCLO = new CLO();
                $newCLO->creation($row["CLOCode"], $row["cloName"], $row["description"], $row["domain"], $row["btLevel"]);
                array_push($this->courseCLOList, $newCLO);
            }
        } else {
//            echo "No CLOs found for course code: ".$courseCode;
        }
    }

}