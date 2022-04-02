<?php

class Section implements JsonSerializable
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

    public function retrieveSectionsList($batchCode): ?array
    {
        $sql = /** @lang text */
            "select sectionCode, s.semesterCode, sectionName
            from section as s
             inner join (select se.semesterCode, se.batchCode, se.semesterName
                     from semester as se
                     where batchCode =  \"$batchCode\"
                     group by semesterCode desc
                     limit 1) as sCbCsN where sCbCsN.semesterCode = s.semesterCode;";
        $result = $this->databaseConnection->query($sql);

        $batchList = [];

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $section = new Section();
                $section->sectionCode = $row['sectionCode'];
                $section->sectionName = $row['sectionName'];
                $batchList[] = $section;
            }
        } else
            return null;

        return $batchList;
    }


    public function retrieveSectionName($sectionCode)
    {
        $this->setSectionCode($sectionCode);
        $sql = /** @lang text */
            "select sectionName, semesterCode from section where sectionCode = \"$sectionCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $this->sectionName = $row["sectionName"];
                $newSemester = new Semester();
                $newSemester->retrieveSemesterName($row["semesterCode"]);
                $this->semester = $newSemester;
            }
        } else
            echo "No section found";
    }

    public function setSectionName($sectionName): void
    {
        $this->sectionName = $sectionName;
    }

    public function setListOfStudentsInSectionInCourse($sectionCode, $courseCode): array
    {
        $sql = /** @lang text */
            "select s.studentRegCode, s.name from student s 
                join section sec on sec.sectionCode = s.sectionCode
                join courseregistration c on s.studentRegCode = c.studentRegCode
                join registeredcourses r on c.courseRegistrationCode = r.courseRegistrationCode
                where s.sectionCode = \"$sectionCode\" and r.courseCode = \"$courseCode\" order by s.studentRegCode";

        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {

                $student = new Student();
                $student->setStudentRegistrationCode($row["studentRegCode"]);
                $student->setStudentName($row["name"]);
                array_push($this->listOfStudents, $student);
            }
        }
//        else
//            echo "No students found for section code: " . $sectionCode . " and course code: " . $courseCode;
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


    public function retrieveSectionsInSemester($semesterCode)
    {
        $sql = /** @lang text */
            "select sectionCode, sectionName from section where semesterCode = \"$semesterCode\"";
        $result = $this->databaseConnection->query($sql);

        $sectionsList = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $newSection = new Section();
                $newSection->setSectionName($row["sectionName"]);
                $newSection->setSectionCode($row["sectionCode"]);
                array_push($sectionsList, $newSection);
            }
        } else {
//            echo "No sections found for semesterCode: ".$semesterCode."<br>";

        }

        return $sectionsList;
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

    public function jsonSerialize()
    {
        return array(
            'sectionCode' => $this->sectionCode,
            'sectionName' => $this->sectionName
        );
    }
}