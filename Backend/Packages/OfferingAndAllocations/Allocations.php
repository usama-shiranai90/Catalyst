<?php

class Allocations
{
    private $course;
    private $section;
    private $programCode;
    private $curriculumCode;
    private $allocations;

    protected $databaseConnection;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $this->allocations = array();
    }

    public function retrieveAllocations($facultyCode): array
    {
//        $sql = /** @lang text */
//            "select fa.sectionCode, ca.courseCode from facultyallocations fa join courseallocation ca on ca.allocationCode = fa.allocationCode where fa.facultyCode = \"$facultyCode\" and fa.seasonCode = (select seasonCode from season order by seasonCode desc limit 1)";
        $sql = /** @lang text */
            "select fa.sectionCode, ca.courseCode,ca.programCode, co.curriculumCode from facultyallocations fa join courseallocation ca on 
            ca.allocationCode = fa.allocationCode join courseoffering co on co.offeringCode = ca.offeringCode where 
            fa.facultyCode = \"$facultyCode\" and fa.seasonCode = (select seasonCode from season order by seasonCode desc limit 1);";

        $result = $this->databaseConnection->query($sql);
//        $allocatedCourseCodes = array();
        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $newAllocation = new self();
                $newAllocation->setCourse($row["courseCode"], $row["programCode"], $row["curriculumCode"]);
                $newAllocation->setSection($row["sectionCode"], $row["courseCode"]);
                $newAllocation->setCurriculumCode($row["curriculumCode"]);
                $newAllocation->setProgramCode($row["programCode"]);
                array_push($this->allocations, $newAllocation);
            }
        } else
            echo "No Allocations found";

        return $this->allocations;
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($courseCode, $programCode, $curriculumCode): void
    {
        $course = new Course($courseCode);
        $course->setCourseName($courseCode);
        $course->setCourseCLOList($courseCode, $programCode, $curriculumCode);
        $this->course = $course;
//        $course->toString();
    }

    public function getSection()
    {
        return $this->section;
    }

    public function setSection($sectionCode, $courseCode): void
    {
        $section = new Section($sectionCode);
        $section->setSectionName($sectionCode);
        $section->setListOfStudentsInSectionInCourse($sectionCode, $courseCode);

        $this->section = $section;
    }

    public function getProgramCode()
    {
        return $this->programCode;
    }

    public function setProgramCode($programCode): void
    {
        $this->programCode = $programCode;
    }

    public function getCurriculumCode()
    {
        return $this->curriculumCode;
    }

    public function setCurriculumCode($curriculumCode): void
    {
        $this->curriculumCode = $curriculumCode;
    }

    public function toString()
    {
        echo "<br>Allocations: \n";
        echo $this->getCourse()->toString() . ", ";
        echo $this->getSection()->toString() . "\n";
    }

}