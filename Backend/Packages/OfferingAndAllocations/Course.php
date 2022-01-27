<?php

class Course
{
    private $courseCode;
    private $courseName;
    private $courseCreditHour;
    private $courseCLOList;
    protected $databaseConnection;
    protected $preReqList;


    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $this->courseCLOList = array();
        $this->preReqList = array();
    }

    public function getCourseTitle()
    {
        return $this->courseName;
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
                $newCLO->creation($row["CLOCode"], $row["cloName"], $row["description"] , $row["domain"], $row["btLevel"]);
                array_push($this->courseCLOList, $newCLO);
            }
        } else {
//            echo "No CLOs found for course code: ".$courseCode;
        }
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


    public function getPreReqList(): array
    {
        $sql = /** @lang text */
            "select preRequisiteName from prerequisites where courseCode = \"$this->courseCode\"";
        $result = $this->databaseConnection->query($sql);

        if ($result !=null && !empty(mysqli_num_rows($result)) && mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->preReqList[] = $row["preRequisiteName"];
            }
        } else {
//            echo "No Pre-Req ";
        }
//        echo json_encode($this->preReqList)."<br>\n";
//        print_r($this->preReqList);
        return $this->preReqList;
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

}