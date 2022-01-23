<?php

class Course
{
    private $courseName;
    private $courseCode;
    private $courseCLOList;
    protected $databaseConnection;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $this->courseCLOList = array();
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
            echo "No course found with course code:".$courseCode;
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
                $newCLO = new CLO($row["CLOCode"], $row["cloName"], $row["description"]);
                array_push($this->courseCLOList, $newCLO);
            }
        } else{
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



    public function toString()
    {
        echo "<br>CourseTitle:" . $this->getCourseTitle() . ", ";
        echo "<br>CourseCode:" . $this->getCourseCode() . ", ";
        echo "<br>CLOList: ";
        for ($x = 0; $x < sizeof($this->getCourseCLOList()); $x++) {
            echo $this->getCourseCLOList()[$x]->toString();
        }
    }

}