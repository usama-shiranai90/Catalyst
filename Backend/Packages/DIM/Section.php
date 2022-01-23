<?php

class Section
{
    private $sectionName;
    private $sectionCode;
    private $semester;
    private $listOfStudents;
    protected $databaseConnection;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $this->listOfStudents = array();
    }

    public function getSectionName()
    {
        return $this->sectionName;
    }

    public function setSectionName($sectionCode)
    {
        $this->setSectionCode($sectionCode);
        $sql = /** @lang text */
            "select sectionName, semesterCode from section where sectionCode = \"$sectionCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $this->sectionName = $row["sectionName"];
                $newSemester = new Semester();
                $newSemester->setSemesterName($row["semesterCode"]);
                $this->semester = $newSemester;
            }
        } else
            echo "No section found";
    }

    public function setListOfStudentsInSectionInCourse($sectionCode, $courseCode): array
    {
        $sql = /** @lang text */
            "select s.studentRegCode, s.name from student s join section sec on sec.sectionCode = s.sectionCode
                join semester s2 on sec.semesterCode = s2.semesterCode
                join courseregistration c on s.studentRegCode = c.studentRegCode
                join registeredcourses r on c.courseRegistrationCode = r.courseRegistrationCode
                where s.sectionCode = \"$sectionCode\" and r.courseCode = \"$courseCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {

                $student = new Student();
                $student->setRegistrationCode($row["studentRegCode"]);
                $student->setStudentName($row["name"]);
                array_push($this->listOfStudents, $student);
            }
        } else
            echo "No students found for section code: " . $sectionCode . " and course code: " . $courseCode;
        return $this->listOfStudents;
    }

    public function getListOfStudents(): array
    {
        return $this->listOfStudents;
    }

    public function getSectionCode()
    {
        return $this->sectionCode;
    }

    public function setSectionCode($sectionCode): void
    {
        $this->sectionCode = $sectionCode;
    }

    public function getSemester()
    {
        return $this->semester;
    }



    public function toString()
    {
        echo "<br>Section Name:" . $this->getSectionName();
        echo "<br>Semester:" . $this->getSemester()->toString();
        echo "<br>Student List: ";
        for ($x = 0; $x < sizeof($this->listOfStudents); $x++) {
            echo $this->getListOfStudents()[$x]->toString();
        }
    }
}