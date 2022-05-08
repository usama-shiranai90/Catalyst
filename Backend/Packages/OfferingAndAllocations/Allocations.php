<?php

class Allocations
{
    protected $databaseConnection; // composition of Course-object.
    private $course;// composition of section-object.
    private $section;
    private $programCode;
    private $curriculumCode; // array list of allocations.
    private $allocations;
    private $batchCode;
    private $isCoordinator;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $this->allocations = array();
    }

    public function retrieveAllocations($facultyCode): array
    {
        $sql = /** @lang text */
            "select fa.sectionCode, ca.courseCode,ca.batchCode,ca.programCode, co.curriculumCode,isCoordinator from facultyallocations fa join courseallocation ca on 
            ca.allocationCode = fa.allocationCode join courseoffering co on co.offeringCode = ca.offeringCode where 
            fa.facultyCode = \"$facultyCode\" and fa.seasonCode = 4;";
//(select seasonCode from season order by seasonCode desc limit 1)
        $result = $this->databaseConnection->query($sql);
//        $allocatedCourseCodes = array();
        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $newAllocation = new self();
                $newAllocation->setCourse($row["courseCode"], $row["programCode"], $row["curriculumCode"], $row["batchCode"]);
                $newAllocation->setSection($row["sectionCode"], $row["courseCode"]);
                $newAllocation->setCurriculumCode($row["curriculumCode"]);
                $newAllocation->setProgramCode($row["programCode"]);
                $newAllocation->setBatchCode($row["batchCode"]);
                $newAllocation->setIsCoordinator($row['isCoordinator']);
                array_push($this->allocations, $newAllocation);
            }
        } else
            echo "No Allocations found";

        return $this->allocations;
    }

    public function toString()
    {
        echo "<br>Allocations: \n";
        echo $this->getCourse()->toString();
        echo $this->getSection()->toString() . "<br>";
        echo "<br>Curriculum: " . $this->getCurriculumCode();
        echo "<br>Program: " . $this->getProgramCode();
        echo "<br>Batch: " . $this->getBatchCode();
        echo "<br>isCoordinator: " . $this->getIsCoordinator();
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($courseCode, $programCode, $curriculumCode, $batchCode): void
    {
        $course = new Course();
        $course->retrieveCourseName($courseCode);// title of the course.
        $course->retreiveCourseCLOList($courseCode, $programCode, $curriculumCode, $batchCode);
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
        $section->retrieveSectionName($sectionCode);
        $section->setListOfStudentsInSectionInCourse($sectionCode, $courseCode);

        $this->section = $section;
    }

    public function getCurriculumCode()
    {
        return $this->curriculumCode;
    }

    public function setCurriculumCode($curriculumCode): void
    {
        $this->curriculumCode = $curriculumCode;
    }

    public function getProgramCode()
    {
        return $this->programCode;
    }

    public function setProgramCode($programCode): void
    {
        $this->programCode = $programCode;
    }

    public function getBatchCode()
    {
        return $this->batchCode;
    }

    public function setBatchCode($batchCode): void
    {
        $this->batchCode = $batchCode;
    }

    public function getIsCoordinator()
    {
        return $this->isCoordinator;
    }

    public function setIsCoordinator($isCoordinator): void
    {
        $this->isCoordinator = $isCoordinator;
    }

    public function retrieveSameAllocatedFacultyList($semesterCode, $courseCode): array
    {
        $affiliatedFacultyList = array();
        /*      $sql = "select semesterCode, facultyCode, courseCode, f.sectionCode, sectionName ,isCoordinator from section
                 join facultyallocations f on section.sectionCode = f.sectionCode
                 join courseallocation c on c.allocationCode = f.allocationCode
                 where semesterCode = \"$semesterCode\"
                 and courseCode = \"$courseCode\";";*/

        $prepareStatementSearchQuery = $this->databaseConnection->prepare('select semesterCode, facultyCode, courseCode, f.sectionCode, sectionName ,isCoordinator from section
         join facultyallocations f on section.sectionCode = f.sectionCode
         join courseallocation c on c.allocationCode = f.allocationCode
         where semesterCode = ?    and courseCode = ?');

        $sanitizeSemesterCode = FormValidator::sanitizeUserInput($semesterCode, 'int');
        $sanitizeCourseCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($courseCode, 'string'));
        $prepareStatementSearchQuery->bind_param('is', $sanitizeSemesterCode, $sanitizeCourseCode);

        if ($prepareStatementSearchQuery->execute()) {
            $result = $prepareStatementSearchQuery->get_result();
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $temp = array(
                        "facultyCode" => $row['facultyCode'],
                        "courseCode" => $row['courseCode'],
                        "sectionCode" => $row['sectionCode'],
                        "sectionName" => $row['sectionName'],
                        "isCoordinator" => $row['isCoordinator'],
                    );
                    $affiliatedFacultyList[] = $temp;
                }
            } else
                echo "No Same Faculty Allocations found";
        }
        return $affiliatedFacultyList;
    }
}