<?php

include 'AssessmentWeight.php';
include 'CourseInstructor.php';
include 'Persistable.php';
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\OfferingAndAllocations\Course.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\OfferingAndAllocations\CLO.php";

//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DIM\PLO.php";


class CourseProfile implements Persistable
{
    protected $course;
    private $batchCode;
    private $programCode;

    protected $courseProfileCode;
    protected $databaseConnection;
    private string $courseCode = '';
    private string $courseTitle = '';
    private $courseCreditHr; // may change to array if multiple.
    private $courseSemester;
    private string $courseProgram = '';
    private string $courseProgramLevel = '';
    private string $courseCourseEffective = '';
    private string $courseCoordination = '';
    private string $courseTeachingMythology = '';
    private string $courseModel = '';
    private string $courseTextBook = ''; // recommended book
    private string $courseReferenceBook = '';
    private string $courseDescription = '';
    private string $courseOtherReference = '';

    private $coursePreRequisites;
    private CourseInstructor $instructorInfo; // composition
    private AssessmentWeight $assessmentInfo; // composition

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton::getConnection();
        $this->instructorInfo = new CourseInstructor();
        $this->assessmentInfo = new AssessmentWeight();
        $this->course = new Course();
        $this->coursePreRequisites = array_values($this->course->getPreReqList());


    }

    public function setCourseInfo($courseTitle, $courseCode, $courseCreditHr, $coursePreReq, $courseSemester, $courseProgramLevel, $courseProgram, $courseCourseEffective,
                                  $courseCoordination, $courseTeachingMythology, $courseModel, $courseReferenceBook, $courseTextBook,
                                  $courseDescription, $courseOtherReference, $pcode, $bcode)
    {
        $this->courseTitle = $courseTitle;
        $this->courseCode = $courseCode;
        $this->courseCreditHr = $courseCreditHr;
        $this->coursePreRequisites = $coursePreReq;  // separate class.
        $this->courseSemester = $courseSemester;
        $this->courseProgramLevel = $courseProgramLevel;
        $this->courseProgram = $courseProgram;
        $this->courseCourseEffective = $courseCourseEffective;
        $this->courseCoordination = $courseCoordination;
        $this->courseTeachingMythology = $courseTeachingMythology;
        $this->courseModel = $courseModel;
        $this->courseReferenceBook = $courseReferenceBook;
        $this->courseTextBook = $courseTextBook;
        $this->courseDescription = $courseDescription;
        $this->courseOtherReference = $courseOtherReference;
        $this->courseOtherReference = $courseOtherReference;
        $this->programCode = $pcode;
        $this->batchCode = $bcode;
    }

    public function profileExist($currentCourseCode, $currentProgramCode, $currentCurriculumCode): bool
    {
        $this->setCourseCode($currentCourseCode);
        $this->setProgramCode($currentProgramCode);
        $this->course->getCreditHourAndTitle($currentCourseCode);
        $this->course->setCourseCode($currentCourseCode);

        $sql = /** @lang text to fetch current batch and program */
            "select batchCode from batch where curriculumCode = \"$currentCurriculumCode\" and programCode = \"$currentProgramCode\"";

        $result = $this->databaseConnection->query($sql);
        if (!empty(mysqli_num_rows($result)) && mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $currentBatchCode = (int)$row['batchCode'];
                $this->setBatchCode($currentBatchCode);
//                echo "my-batch is :" . $this->getBatchCode();
            }
        } else
            echo "Cant fetch the batch ...";

        $sql = /** @lang text */
            "select courseProfileCode
        from courseprofile join batch b on b.batchCode = courseprofile.batchCode where
        courseprofile.batchCode =" . $this->getBatchCode() . " and courseCode ='" . $currentCourseCode . "' and courseprofile.programCode =" . $currentProgramCode . "";

        $result = $this->databaseConnection->query($sql);
        if (!empty(mysqli_num_rows($result)) && mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $cp_id = (int)$row['courseProfileCode'];
                $this->setCourseProfileCode($cp_id);
                return true;
            }
        }
        return false;
    }

    public function saveCourseProfileData($CLOsPerCourseList, $CLOToPLOMapping, $ploArray)       // TODO: Implement saveCourseProfileData() method.  will save data in database and temporary in session variable.
    {
        $courseID = $this->saveEssential();
        $this->saveAssessment($courseID);
        $this->saveCourseInstructor($courseID);
        $this->createCourseCLOs($CLOsPerCourseList, $CLOToPLOMapping, $ploArray);
    }

    private function saveEssential(): int
    {
        $sql_statement = /** @lang text */
            "INSERT INTO courseprofile(courseCode, programCode, batchCode, courseTitle, creditHours, semester,
                          programName, programLevel, courseEffective, coordinatingUnit, teachingMethodology, courseModel, recommendedBooks,
                          referenceBooks, courseDescription, otherReferences) VALUES 
                          (\"$this->courseCode\",\"$this->programCode\",\"$this->batchCode\",\"$this->courseTitle\",\"$this->courseCreditHr\"
                          ,\"$this->courseSemester\",\"$this->courseProgram\",\"$this->courseProgramLevel\",\"$this->courseCourseEffective\",\"$this->courseCoordination\",\"$this->courseTeachingMythology\",
                          \"$this->courseModel\",\"$this->courseTextBook\",\"$this->courseOtherReference\",\"$this->courseDescription\",\"$this->courseOtherReference\")";

        $result = $this->databaseConnection->query($sql_statement);
        if ($result) {
            $this->setCourseProfileCode((int)$this->databaseConnection->insert_id);
            echo "New record has been added successfully !" . $this->getCourseProfileCode();
        } else
            echo "Error on the wall" . $this->databaseConnection->error;


        $sql2 = /** @lang text */
            "select courseProfileCode from courseprofile order by courseProfileCode desc limit 1;";
        $result = $this->databaseConnection->query($sql2);
        $courseID = 0;
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $courseID = $row['courseProfileCode'];
            }
        } else {
            echo "No Course profile found with sectionCode: " . $this->databaseConnection->error;
        }
        return $courseID;
    }

    private function saveAssessment($cCourseCode)
    {

        $c_quiz_weight = $this->assessmentInfo->getQuizWeightage();
        $c_assignment_weight = $this->assessmentInfo->getAssignmentWeightage();
        $c_project_weight = $this->assessmentInfo->getProjectWeightage();
        $c_mid_weight = $this->assessmentInfo->getMidWeightage();
        $c_final_weight = $this->assessmentInfo->getFinalWeightage();

        $sql_statement = /** @lang text */
            "INSERT INTO courseprofileassessmentinstruments (courseProfileCode, quizWeightage, assignmentWeightage, projectWeightage, midtermWeightage, finalExamWeightage)
                VALUES (\"$cCourseCode\",\"$c_quiz_weight\", \"$c_assignment_weight\", \"$c_project_weight\", \"$c_mid_weight\", \"$c_final_weight\")";

        if ($this->databaseConnection->query($sql_statement) === TRUE) {
            echo "New assessment created successfully";
        } else {
            echo sprintf("Error assessment questions: %s<br>%s", $sql_statement, $this->databaseConnection->error);
        }
    }

    private function saveCourseInstructor($cCourseCode)
    {
        $instructor_name = $this->instructorInfo->getInstructorName();
        $instructor_designation = $this->instructorInfo->getInstructorDesignation();
        $instructor_qualification = $this->instructorInfo->getInstructorQualification();
        $instructor_spec = $this->instructorInfo->getInstructorSpecialization();
        $instructor_contact = $this->instructorInfo->getInstructorContactNumber();
        $instructor_email = $this->instructorInfo->getInstructorPersonalEmail();

        $sql_statement = /** @lang text */
            "INSERT INTO courseprofileinstructordetail(courseProfileCode, instructorName, designation, qualification, specialization, contactNumber, personalEmail)
                 VALUES  (\"$cCourseCode\",\"$instructor_name\",\"$instructor_designation\", \"$instructor_qualification\", \"$instructor_spec\", \"$instructor_contact\", \"$instructor_email\")";

        if ($this->databaseConnection->query($sql_statement) === TRUE) {
            echo "New Instructor information  created successfully";
        } else {
            echo "Error Instructor information: " . $sql_statement . "<br>" . $this->databaseConnection->error;
        }

    }

    private function createCourseCLOs($CLOsPerCourseList, $CLOToPLOMapping, $ploArray)
    {
        // creation of clos description and mapping.
        $ongoingCurriculum = $_SESSION['selectedCurriculum'];
        $cloIDList = array();
        foreach ($CLOsPerCourseList as $row) {
            $cloObject = new CLO();
            $cloObject->creation(0, $row[0], $row[1], $row[2], $row[3]);

            $sql_statement = /** @lang text */
                "INSERT INTO clo(curriculumCode, programCode, courseCode, cloName, description, domain, btLevel)
                values(\"$ongoingCurriculum\",\"$this->programCode\",\"$this->courseCode\", \"$cloObject->cloName\", \"$cloObject->cloDescription\", \"$cloObject->cloDomain\", \"$cloObject->cloBtLevel\")";

            if ($this->databaseConnection->query($sql_statement) === TRUE) {
//                $cloIDList [] = mysqli_insert_id($this->databaseConnection);
                $cloIDList [] = (int)$this->databaseConnection->insert_id;
            } else {
                echo sprintf("Error clo description: %s<br>%s", $sql_statement, $this->databaseConnection->error);
            }
        }
        echo "New CLO-ID List : " . json_encode($cloIDList);

        foreach ($cloIDList as $row) {
            echo "\n" . "CLO-ID is :" . $row . "\n";
        }
        foreach ($ploArray as $row) {
            echo "\n" . implode("|", $row);
        }
        foreach ($CLOToPLOMapping as $row) {
            echo "\n" . implode("#", $row);
//            $headers = explode(',', $row);
        }

        echo "\n\**************Mapping Info**********\*\n";
        $cloCounter = 0;
        foreach ($CLOToPLOMapping as $rowData) {
            foreach ($rowData as $cloplo) {  // extract Mapping each row data containing multiple PLO-list
                $headers = explode('_', $cloplo); // [0]-> clo-1 ,  [1]-> plo-1;
                echo "Data is :" . $headers[0] . '    ' . $headers[1] . "\n";

                foreach ($ploArray as $plo) {
                    $plo[1] = str_replace(" ", "-", $plo[1]);
                    if ($plo[1] == strtoupper($headers[1])) {
                        echo "Current-CLO-ID:" . $cloIDList[$cloCounter] . '   and PLO-ID: ' . $plo[0] . "\n";

                        $sql_statement = /** @lang text */
                            "INSERT INTO clotoplomapping(PLOCode, CLOCode) VALUES (\"$plo[0]\",\"$cloIDList[$cloCounter]\")";
                        $result = $this->databaseConnection->query($sql_statement);
                        if ($result) {
                            echo "Mapping Successfully !";
                        } else
                            echo "CLO-PLO Mapping Error : " . $this->databaseConnection->error;

                    }
                }
            }
            $cloCounter += 1;
        }

        //

    }

    public function loadCourseProfileData($courseProfileID)
    {
        // TODO: Implement loadCourseProfileData() method.

        $sql = /** @lang text */
            "select * from courseprofile as cp inner join courseprofileassessmentinstruments c on cp.courseProfileCode = c.courseProfileCode
            inner join courseprofileinstructordetail c2 on cp.courseProfileCode = c2.courseProfileCode
            where cp.courseProfileCode =\"$courseProfileID\";";

        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->courseCode = $row['courseCode'];
                $this->courseTitle = $row['courseTitle'];
                $this->courseCreditHr = $row['creditHours'];
                $this->courseSemester = $row['semester'];
                $this->courseProgram = $row['programName'];
                $this->courseProgramLevel = $row['programLevel'];
                $this->courseCourseEffective = $row['courseEffective'];
                $this->courseCoordination = $row['coordinatingUnit'];
                $this->courseTeachingMythology = $row['teachingMethodology'];
                $this->courseModel = $row['courseModel'];
                $this->courseTextBook = $row['recommendedBooks'];
                $this->courseReferenceBook = $row['referenceBooks'];
                $this->courseOtherReference = $row['otherReferences'];
                $this->courseDescription = $row['courseDescription'];
                $this->setAssessmentInfo($row['quizWeightage'], $row['assignmentWeightage'], $row['projectWeightage'], $row['midtermWeightage'], $row['finalExamWeightage']);
                $this->setInstructorInfo($row['instructorName'], $row['designation'], $row['qualification'], $row['specialization'], $row['contactNumber'], $row['personalEmail']);
            }
        } else
            echo "cant find user information: ", $courseProfileID . '            ' . $this->databaseConnection->error;

    }

    public function deleteCLORow($currentCLOID, $programID, $CurriculumID)
    {
        $sql = /** @lang text */
            "delete from clo where CLOCode = \"$currentCLOID\" and programCode =\"$programID\" and curriculumCode=\"$CurriculumID\"";

        $result = $this->databaseConnection->query($sql);

        if ($result === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record from clo-row: " . $this->databaseConnection->error;
        }
    }

    public function modifyCourseProfileData($courseProfileID)
    {
        // TODO: Implement modifyCourseProfileData() method.

        $sql1 = /** @lang text */
            "UPDATE courseprofile SET  courseTitle = \"$this->courseTitle\", creditHours = \"$this->courseCreditHr\", semester = \"$this->courseSemester\",
                          programName = \"$this->courseProgram\", programLevel = \"$this->courseProgramLevel\", courseEffective = \"$this->courseCourseEffective\", 
                          coordinatingUnit = \"$this->courseCoordination\", teachingMethodology = \"$this->courseTeachingMythology\", courseModel = \"$this->courseModel\",
                           recommendedBooks = \"$this->courseTextBook\",
                          referenceBooks = \"$this->courseReferenceBook\", courseDescription = \"$this->courseDescription\", otherReferences = \"$this->courseOtherReference\"
                           WHERE courseProfileCode = \"$courseProfileID\"";

        if ($this->databaseConnection->query($sql1) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating Course Profile basic: " . $this->databaseConnection->error;
        }

        $instructor_name = $this->instructorInfo->getInstructorName();
        $instructor_designation = $this->instructorInfo->getInstructorDesignation();
        $instructor_qualification = $this->instructorInfo->getInstructorQualification();
        $instructor_spec = $this->instructorInfo->getInstructorSpecialization();
        $instructor_contact = $this->instructorInfo->getInstructorContactNumber();
        $instructor_email = $this->instructorInfo->getInstructorPersonalEmail();

        $sql2 = /** @lang text */
            "update courseprofileinstructordetail SET instructorName = \"$instructor_name\", designation = \"$instructor_designation\", 
            qualification = \"$instructor_qualification\", specialization = \"$instructor_spec\", contactNumber = \"$instructor_contact\", 
            personalEmail = \"$instructor_email\" WHERE courseProfileCode = \"$courseProfileID\"";

        if ($this->databaseConnection->query($sql2) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating Course Profile Instructor information: " . $this->databaseConnection->error;
        }


        $c_quiz_weight = $this->assessmentInfo->getQuizWeightage();
        $c_assignment_weight = $this->assessmentInfo->getAssignmentWeightage();
        $c_project_weight = $this->assessmentInfo->getProjectWeightage();
        $c_mid_weight = $this->assessmentInfo->getMidWeightage();
        $c_final_weight = $this->assessmentInfo->getFinalWeightage();

        $sql2 = /** @lang text */
            "update courseprofileassessmentinstruments SET quizWeightage = \"$c_quiz_weight\", assignmentWeightage = \"$c_assignment_weight\", 
            projectWeightage = \"$c_project_weight\", midtermWeightage = \"$c_mid_weight\", finalExamWeightage = \"$c_final_weight\" 
            WHERE courseProfileCode = \"$courseProfileID\";";

        if ($this->databaseConnection->query($sql2) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating Course Profile Assessment Info: " . $this->databaseConnection->error;
        }

    }


    public function getCourseProfileCode()
    {
        return $this->courseProfileCode;
    }


    public function setCourseProfileCode($courseProfileCode): void
    {
        $this->courseProfileCode = $courseProfileCode;
    }

    /**
     * @return Course
     */
    public function getCourse(): Course
    {
        return $this->course;
    }


    /**
     * @return string
     */
    public function getCourseCode(): string
    {
        return $this->courseCode;
    }

    /**
     * @param string $courseCode
     */
    public function setCourseCode(string $courseCode): void
    {
        $this->courseCode = $courseCode;
    }

    /**
     * @return string
     */
    public function getCourseTitle(): string
    {
        return $this->courseTitle;
    }

    /**
     * @param string $courseTitle
     */
    public function setCourseTitle(string $courseTitle): void
    {
        $this->courseTitle = $courseTitle;
    }


    public function getCourseCreditHr(): mixed
    {
        return $this->courseCreditHr;
    }

    /**
     * @param int $courseCreditHr
     */
    public function setCourseCreditHr(int $courseCreditHr): void
    {
        $this->courseCreditHr = $courseCreditHr;
    }


    public function getCourseSemester(): mixed
    {
        return $this->courseSemester;
    }

    public function setCourseSemester($courseSemester): void
    {
        $this->courseSemester = $courseSemester;
    }

    /**
     * @return string
     */
    public function getCourseProgram(): string
    {
        return $this->courseProgram;
    }

    /**
     * @param string $courseProgram
     */
    public function setCourseProgram(string $courseProgram): void
    {
        $this->courseProgram = $courseProgram;
    }

    /**
     * @return string
     */
    public function getCourseProgramLevel(): string
    {
        return $this->courseProgramLevel;
    }

    /**
     * @param string $courseProgramLevel
     */
    public function setCourseProgramLevel(string $courseProgramLevel): void
    {
        $this->courseProgramLevel = $courseProgramLevel;
    }

    /**
     * @return string
     */
    public function getCourseCourseEffective(): string
    {
        return $this->courseCourseEffective;
    }

    /**
     * @param string $courseCourseEffective
     */
    public function setCourseCourseEffective(string $courseCourseEffective): void
    {
        $this->courseCourseEffective = $courseCourseEffective;
    }

    /**
     * @return string
     */
    public function getCourseCoordination(): string
    {
        return $this->courseCoordination;
    }

    /**
     * @param string $courseCoordination
     */
    public function setCourseCoordination(string $courseCoordination): void
    {
        $this->courseCoordination = $courseCoordination;
    }

    /**
     * @return string
     */
    public function getCourseTeachingMythology(): string
    {
        return $this->courseTeachingMythology;
    }

    /**
     * @param string $courseTeachingMythology
     */
    public function setCourseTeachingMythology(string $courseTeachingMythology): void
    {
        $this->courseTeachingMythology = $courseTeachingMythology;
    }


    public function getCourseModel()
    {
        return $this->courseModel;
    }


    public function setCourseModel(string $courseModel): void
    {
        $this->courseModel = $courseModel;
    }

    /**
     * @return string
     */
    public function getCourseReferenceBook(): string
    {
        return $this->courseReferenceBook;
    }

    /**
     * @param string $courseReferenceBook
     */
    public function setCourseReferenceBook(string $courseReferenceBook): void
    {
        $this->courseReferenceBook = $courseReferenceBook;
    }

    /**
     * @return string
     */
    public function getCourseTextBook(): string
    {
        return $this->courseTextBook;
    }

    /**
     * @param string $courseTextBook
     */
    public function setCourseTextBook(string $courseTextBook): void
    {
        $this->courseTextBook = $courseTextBook;
    }

    /**
     * @return string
     */
    public function getCourseDescription(): string
    {
        return $this->courseDescription;
    }

    /**
     * @param string $courseDescription
     */
    public function setCourseDescription(string $courseDescription): void
    {
        $this->courseDescription = $courseDescription;
    }

    /**
     * @return string
     */
    public function getCourseOtherReference(): string
    {
        return $this->courseOtherReference;
    }

    /**
     * @param string $courseOtherReference
     */
    public function setCourseOtherReference(string $courseOtherReference): void
    {
        $this->courseOtherReference = $courseOtherReference;
    }

    /**
     * @return mixed
     */
    public function getCoursePreRequisites()
    {
        return $this->coursePreRequisites;
    }

    /**
     * @param mixed $coursePreRequisites
     */
    public function setCoursePreRequisites($coursePreRequisites): void
    {
        $this->coursePreRequisites = $coursePreRequisites;
    }


    public function getBatchCode(): mixed
    {
        return $this->batchCode;
    }

    /**
     * @param int $batchCode
     */
    public function setBatchCode(int $batchCode): void
    {
        $this->batchCode = $batchCode;
    }


    public function getProgramCode(): mixed
    {
        return $this->programCode;
    }

    /**
     * @param mixed $programCode
     */
    public function setProgramCode($programCode): void
    {
        $this->programCode = $programCode;
    }


    public function getInstructorInfo(): CourseInstructor
    {
        return $this->instructorInfo;
    }

    public function setInstructorInfo($name, $designation, $qualification, $specialization, $contact, $personalEmail)
    {
        $this->instructorInfo->setAll($name, $designation, $qualification, $specialization, $contact, $personalEmail);
    }

    /**
     * @return AssessmentWeight
     */
    public function getAssessmentInfo(): AssessmentWeight
    {
        return $this->assessmentInfo;
    }

    public function setAssessmentInfo($quizWeight, $assignmentWeight, $projectWeight, $midsWeight, $finalWeight)
    {
        $this->assessmentInfo->setAll($quizWeight, $assignmentWeight, $projectWeight, $midsWeight, $finalWeight);
    }


}

/*
switch (@$_GET['p']) {
    case 'saved':
        //header('Content-Type: application/json');
        if (isset($_POST['arrayCLO']) && isset($_POST['arrayMapping']) && isset($_POST['courseEssentialFieldValue']) && isset($_POST['courseDetailFieldValue'])) {
            session_start();
            $array_courseEssential = $_POST['courseEssentialFieldValue'];
            $array_courseDetail = $_POST['courseDetailFieldValue'];
            $array_cCLO = $_POST['arrayCLO'];
            $array_cMapping = $_POST['arrayMapping'];

            // apply query to create save data on server.
            $_SESSION['currentSubjectEssential_array'] = $array_courseEssential;
            $_SESSION['currentSubjectDetail_array'] = $array_courseDetail;
            $_SESSION['currentSubject_outcomeDetail_array'] = $array_cCLO;
            $_SESSION['currentSubject_cloToPlo_array'] = $array_cMapping;
        }
        break;

    case '':

}*/


?>