<?php
/*include 'AssessmentWeight.php';
include 'CourseInstructor.php';
include 'Persistable.php';
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\OfferingAndAllocations\Course.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\OfferingAndAllocations\CLO.php";*/

require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";

class CourseProfile implements Persistable
{
    protected $course;
    protected $courseProfileCode; // composition
    protected $databaseConnection; // composition
    private CourseInstructor $instructorInfo;
    private AssessmentWeight $assessmentInfo;

    private $batchCode;
    private $programCode;

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
    private string $coursePreReq = '';
    private $HasWeightedAssessment;

//    private $coursePreRequisites;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton::getConnection();
        $this->instructorInfo = new CourseInstructor();
        $this->assessmentInfo = new AssessmentWeight();
        $this->course = new Course();
//        $this->coursePreRequisites = array_values($this->course->getPreReqList());
    }

    public function setCourseInfo($courseTitle, $courseCode, $courseCreditHr, $coursePreReq, $courseSemester, $courseProgramLevel, $courseProgram, $courseCourseEffective,
                                  $courseCoordination, $courseTeachingMythology, $courseModel, $courseReferenceBook, $courseTextBook,
                                  $courseDescription, $courseOtherReference, $weightageAssessment, $programCode, $batchCode)
    {
        $this->courseTitle = $courseTitle;
        $this->courseCode = $courseCode;
        $this->courseCreditHr = $courseCreditHr;
//        $this->coursePreRequisites = $coursePreReq;  // separate class.
        $this->coursePreReq = $coursePreReq;
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
        $this->programCode = $programCode;
        $this->batchCode = $batchCode;
        $this->HasWeightedAssessment = $weightageAssessment;
    }

    public function isCourseProfileExist($currentProgramCode, $currentBatchCode, $currentCourseCode): bool
    {
        $this->setCourseCode($currentCourseCode);
        $this->setProgramCode($currentProgramCode);
        $this->setBatchCode($currentBatchCode);
        $this->course->getCreditHourAndTitle($currentCourseCode);
        $this->course->setCourseCode($currentCourseCode);

        $prepareStatementSearchQuery = $this->databaseConnection->prepare(query: 'select courseProfileCode, weightagedAssessment from courseprofile join batch b on b.batchCode = courseprofile.batchCode where
        courseprofile.programCode = ? and courseprofile.batchCode = ? and  courseCode = ?');

        $sanitizeProgramCode = FormValidator::sanitizeUserInput($currentProgramCode, 'int');
        $sanitizeBatchCode = FormValidator::sanitizeUserInput($currentBatchCode, 'int');
        $sanitizeCourseCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($currentCourseCode, 'string'));
        $prepareStatementSearchQuery->bind_param('iis', $sanitizeProgramCode, $sanitizeBatchCode, $sanitizeCourseCode);

        if ($prepareStatementSearchQuery->execute()) {
            $result = $prepareStatementSearchQuery->get_result();
            if (!empty(mysqli_num_rows($result)) && mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cp_id = (int)$row['courseProfileCode'];
                    $this->setHasWeightedAssessment($row['weightagedAssessment']);
                    $this->setCourseProfileCode($cp_id);
                    return true;
//                echo sprintf("\n<br> CourseProfile Code got successfully: %d\n<br>", $cp_id);
                }
            }
        }
        $this->setHasWeightedAssessment(0);
        $this->setCourseProfileCode(-1);
        return false;
    }


    // TODO: Implement saveCourseProfileData() method.  will save data in database and temporary in session variable.
    public function saveCourseProfileData($CLOsPerCourseList, $CLOToPLOMapping, $ploArray, $courseInstructorList)
    {
        $courseProfileCode = $this->saveEssential();
        $this->saveAssessment($courseProfileCode);
        $this->saveCourseInstructor($courseProfileCode);
        $this->createCourseCLOs($CLOsPerCourseList, $CLOToPLOMapping, $ploArray);
    }

    private function saveEssential(): int
    {
        /*        $sql_statement = "INSERT INTO courseprofile(courseCode, programCode, batchCode, courseTitle, creditHours,preReq ,semester,
                                  programName, programLevel, courseEffective, coordinatingUnit, teachingMethodology, courseModel, recommendedBooks,
                                  referenceBooks, courseDescription, otherReferences) VALUES
                                  (\"$this->courseCode\",\"$this->programCode\",\"$this->batchCode\",\"$this->courseTitle\",\"$this->courseCreditHr\",\"$this->coursePreReq\"
                                  ,\"$this->courseSemester\",\"$this->courseProgram\",\"$this->courseProgramLevel\",\"$this->courseCourseEffective\",\"$this->courseCoordination\",\"$this->courseTeachingMythology\",
                                  \"$this->courseModel\",\"$this->courseTextBook\",\"$this->courseOtherReference\",\"$this->courseDescription\",\"$this->courseOtherReference\")";*/
        $prepareStatementInsertionQuery = $this->databaseConnection->prepare(query: "INSERT INTO courseprofile(courseCode, programCode, batchCode, courseTitle, creditHours,preReq ,
                          semester, programName, programLevel, courseEffective, coordinatingUnit, teachingMethodology, courseModel, recommendedBooks, referenceBooks, 
                          courseDescription, otherReferences , weightagedAssessment) VALUES ( ? ,? ,? ,? ,? ,?,?,?,?,?,?,?,?,?,?,?,? , ? );");

        $sanitizeCourseCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($this->courseCode, 'string'));
        $sanitizeProgramCode = FormValidator::sanitizeUserInput($this->programCode, 'int');
        $sanitizeBatchCode = FormValidator::sanitizeUserInput($this->batchCode, 'int');

        $sanitizeCourseTitle = FormValidator::sanitizeStringWithSpace(FormValidator::sanitizeUserInput($this->courseTitle, 'string'));
        $sanitizeCourseCreditHour = FormValidator::sanitizeUserInput($this->courseCreditHr, 'int');
        $sanitizeCoursePreRequisite = FormValidator::sanitizeUserInput($this->coursePreReq, 'string');
        $sanitizeCourseSemester = FormValidator::sanitizeUserInput($this->courseSemester, 'int');
        $sanitizeCourseProgram = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($this->courseProgram, 'string'));
        $sanitizeCourseProgramLevel = FormValidator::sanitizeUserInput($this->courseProgramLevel, 'string');
        $sanitizeCourseEffective = FormValidator::sanitizeUserInput($this->courseCourseEffective, 'string');
        $sanitizeCourseCoordinator = FormValidator::sanitizeUserInput($this->courseCoordination, 'string');
        $sanitizeCourseTeachingMythology = FormValidator::sanitizeUserInput($this->courseTeachingMythology, 'string');
        $sanitizeCourseModel = FormValidator::sanitizeUserInput($this->courseModel, 'string');
        $sanitizeCourseTextBook = FormValidator::sanitizeUserInput($this->courseTextBook, 'string');
        $sanitizeCourseReferenceBook = FormValidator::sanitizeUserInput($this->courseReferenceBook, 'string');
        $sanitizeCourseDescription = FormValidator::sanitizeUserInput($this->courseDescription, 'string');
        $sanitizeCourseOtherReference = FormValidator::sanitizeUserInput($this->courseOtherReference, 'string');

        $prepareStatementInsertionQuery->bind_param('siisisissssssssssi', $sanitizeCourseCode, $sanitizeProgramCode, $sanitizeBatchCode,
            $sanitizeCourseTitle, $sanitizeCourseCreditHour, $sanitizeCoursePreRequisite, $sanitizeCourseSemester, $sanitizeCourseProgram,
            $sanitizeCourseProgramLevel, $sanitizeCourseEffective, $sanitizeCourseCoordinator, $sanitizeCourseTeachingMythology,
            $sanitizeCourseModel, $sanitizeCourseTextBook, $sanitizeCourseReferenceBook, $sanitizeCourseDescription, $sanitizeCourseOtherReference, $this->HasWeightedAssessment);

        $courseProfileCode = 0;
        if ($prepareStatementInsertionQuery->execute()) {
            $this->setCourseProfileCode((int)$this->databaseConnection->insert_id);
            echo sprintf("\n<br>Course Profile record has been added successfully: %s\n<br>", (string)$this->getCourseProfileCode());

            $prepareStatementSearchQuery = $this->databaseConnection->prepare('select courseProfileCode from courseprofile order by courseProfileCode desc limit 1;');
            if ($prepareStatementSearchQuery->execute()) {
                $result = $prepareStatementSearchQuery->get_result();
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc())
                        $courseProfileCode = $row['courseProfileCode'];
                }
            }
        } else
            echo sprintf("\n<br>Error, can not create CourseProfile : %s\n<br>", $this->databaseConnection->error);
        return $courseProfileCode;
    }

    public function getCourseProfileCode()
    {
        return $this->courseProfileCode;
    }

    public function setCourseProfileCode($courseProfileCode): void
    {
        $this->courseProfileCode = $courseProfileCode;
    }

    private function saveAssessment($courseProfileCode)
    {
        $c_quiz_weight = $this->assessmentInfo->getQuizWeightage();
        $c_assignment_weight = $this->assessmentInfo->getAssignmentWeightage();
        $c_project_weight = $this->assessmentInfo->getProjectWeightage();
        $c_mid_weight = $this->assessmentInfo->getMidWeightage();
        $c_final_weight = $this->assessmentInfo->getFinalWeightage();

        $prepareStatementInsertionQuery = $this->databaseConnection->prepare(query: "INSERT INTO courseprofileassessmentinstruments 
    (courseProfileCode, quizWeightage, assignmentWeightage, projectWeightage, midtermWeightage, finalExamWeightage)  VALUES ( ? ,? ,? ,? ,? ,?);");

        $sanitizeCourseProfileCode = FormValidator::sanitizeUserInput($courseProfileCode, 'int');
        $sanitizeAssignmentWeightage = FormValidator::sanitizeUserInput($c_assignment_weight, 'int');
        $sanitizeQuizzWeightage = FormValidator::sanitizeUserInput($c_quiz_weight, 'int');
        $sanitizeProjectWeightage = FormValidator::sanitizeUserInput($c_project_weight, 'int');
        $sanitizeMidWeightage = FormValidator::sanitizeUserInput($c_mid_weight, 'int');
        $sanitizeFinalWeightage = FormValidator::sanitizeUserInput($c_final_weight, 'int');

        $prepareStatementInsertionQuery->bind_param('iiiiii', $sanitizeCourseProfileCode, $sanitizeAssignmentWeightage, $sanitizeQuizzWeightage,
            $sanitizeProjectWeightage, $sanitizeMidWeightage, $sanitizeFinalWeightage);
        if ($prepareStatementInsertionQuery->execute() === TRUE) {
            echo "\n<br> Assessment Record created successfully.\n<br>";
        } else {
            echo sprintf("\n<br>Error, Error, can not create assessment questions: %s.\n<br>", $this->databaseConnection->error);
        }
    }

    private function saveCourseInstructor($courseProfileCode)
    {
        if (!empty($courseInstructorList) and count($courseInstructorList) > 0)
            foreach ($courseInstructorList as $key => $faculty) {
                self::setInstructorInfo($faculty['_name'], $faculty['_designation'], $faculty['_qualification'], $faculty['_specialization'], $faculty['_contactNumber'], $faculty['_personalEmail']);
                $instructor_name = $this->instructorInfo->getInstructorName();
                $instructor_designation = $this->instructorInfo->getInstructorDesignation();
                $instructor_qualification = $this->instructorInfo->getInstructorQualification();
                $instructor_spec = $this->instructorInfo->getInstructorSpecialization();
                $instructor_contact = $this->instructorInfo->getInstructorContactNumber();
                $instructor_email = $this->instructorInfo->getInstructorPersonalEmail();
                $instructorFacultyCode = $faculty['_fkey'];

                $prepareStatementInsertionQuery = $this->databaseConnection->prepare(query: "INSERT INTO courseprofileinstructordetail(courseProfileCode ,facultyCode , instructorName, 
                        designation, qualification, specialization, contactNumber, personalEmail)  VALUES ( ?, ?, ?, ?, ?, ?, ? )");

                $sanitizeCourseProfileCode = FormValidator::sanitizeUserInput($courseProfileCode, 'int');
                $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($instructorFacultyCode, 'string'));

                $sanitizeInstructorName = FormValidator::sanitizeUserInput($instructor_name, 'string');
                $sanitizeInstructorDesignation = FormValidator::sanitizeUserInput($instructor_designation, 'string');
                $sanitizeInstructorQualification = FormValidator::sanitizeUserInput($instructor_qualification, 'string');
                $sanitizeInstructorSpecification = FormValidator::sanitizeUserInput($instructor_spec, 'string');
                $sanitizeInstructorContact = FormValidator::sanitizeUserInput($instructor_contact, 'string');
                $sanitizeInstructorEmail = FormValidator::sanitizeUserInput($instructor_email, 'email');

                $prepareStatementInsertionQuery->bind_param('isssssss', $sanitizeCourseProfileCode, $sanitizeFacultyCode, $sanitizeInstructorName, $sanitizeInstructorDesignation, $sanitizeInstructorQualification,
                    $sanitizeInstructorSpecification, $sanitizeInstructorContact, $sanitizeInstructorEmail);
                if ($prepareStatementInsertionQuery->execute() === TRUE) {
                    echo "\n<br> Assessment Record created successfully.\n<br>";
                } else {
                    echo sprintf("\n<br>Error, Error, can not create assessment questions: %s.\n<br>", $this->databaseConnection->error);
                }

            }
    }

    public function createCourseCLOs($CLOsPerCourseList, $CLOToPLOMapping, $ploArray, $cloIDList = array())
    {
        // creation of clos description and mapping.
        $ongoingCurriculum = $_SESSION['selectedCurriculum'];

        if ($CLOsPerCourseList != null) {
            foreach ($CLOsPerCourseList as $row) {
                $cloObject = new CLO();
                $cloObject->creation(0, $row[0], $row[1], $row[2], $row[3]);

                $prepareStatementInsertionQuery = $this->databaseConnection->prepare(query: "INSERT INTO clo(curriculumCode, programCode,batchCode ,courseCode, cloName, description, domain, btLevel)
                values (? ,?,?,?,?,?,?,?)");

                $prepareStatementInsertionQuery->bind_param('iiissss', $ongoingCurriculum, $this->programCode, $this->batchCode, $cloObject->cloName,
                    $cloObject->cloDescription, $cloObject->cloDomain, $cloObject->cloBtLevel);

                if ($prepareStatementInsertionQuery->execute())
                    $this->setCourseProfileCode((int)$this->databaseConnection->insert_id);
                else {
                    echo sprintf("\n<br>Error clo description: %s\n<br>", $this->databaseConnection->error);
                }
            }
            /*echo "\n<br>New CLO-ID List : " . json_encode($cloIDList) . "\n<br>";
            foreach ($cloIDList as $row) {
                echo "\n" . "CLO-ID is :" . $row . "\n<br>";
            }*/

        }

        foreach ($CLOToPLOMapping as $row) {
            echo "\n" . implode("#", $row);
        }

        echo "\n<br>\n\**************Mapping Info**********\*\n";
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
                            "() VALUES (\"\", \"\")";

                        $prepareStatementInsertionQuery = $this->databaseConnection->prepare(query: "INSERT INTO clotoplomapping(PLOCode, CLOCode) VALUES (? , ?) ;");
                        $prepareStatementInsertionQuery->bind_param('ii', $plo[0], $cloIDList[$cloCounter]);

                        if ($prepareStatementInsertionQuery->execute())
                            echo sprintf("\n<br> CLO to PLO Mapping Successfully for %s.\n<br>", $cloIDList[$cloCounter]);
                        else
                            echo sprintf("\n<br>Error while Mapping Relation btw CLO-PLO: %s.\n<br>", $this->databaseConnection->error);
                    }
                }
            }
            $cloCounter += 1;
        }


    }

    public function updateCourseProfileCLODescription($cloCode, $curriculumCode, $rowData): bool
    {
        $cloName = $rowData[0];
        $cldescription = $rowData[1];
        $clodomain = $rowData[2];
        $clobtlevel = $rowData[3];

        $sql1 = /** @lang text */
            "update clo set cloName = \"$cloName\", description = \"$cldescription\",domain = \"$clodomain\",btLevel =  \"$clobtlevel\"
              where  CLOCode =\"$cloCode\" and curriculumCode = \"$curriculumCode\";";

//        if ($this->databaseConnection->query($sql1) === TRUE) {
//            echo "\n<br> Successfully updated CLO-Description Table.\n<br>";
//        } else {
//            echo sprintf("\n<br>Error while updating CLO-Description : %s\n<br>Server Error:%s\n<br>", json_encode($rowData), $this->databaseConnection->error);
//        }

        return $this->databaseConnection->query($sql1) == TRUE;
    }

    public function loadCourseProfileData($courseProfileID, $facultyCode)
    {
        // TODO: Implement loadCourseProfileData() method.

        $prepareStatementSearchQuery = $this->databaseConnection->prepare('select * from courseprofile as cp inner join courseprofileassessmentinstruments c on cp.courseProfileCode = c.courseProfileCode
            inner join courseprofileinstructordetail c2 on cp.courseProfileCode = c2.courseProfileCode
            where cp.courseProfileCode = ? and facultyCode = ? ;');

        $sanitizeCourseProfileID = FormValidator::sanitizeUserInput($courseProfileID, 'int');
        $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($facultyCode, 'string'));
        $prepareStatementSearchQuery->bind_param('is', $sanitizeCourseProfileID, $sanitizeFacultyCode);

        if ($prepareStatementSearchQuery->execute()) {
            $result = $prepareStatementSearchQuery->get_result();
            if (mysqli_num_rows($result) > 0)
                while ($row = $result->fetch_assoc()) {
                    $this->courseCode = $row['courseCode'];
                    $this->courseTitle = $row['courseTitle'];
                    $this->courseCreditHr = $row['creditHours'];
                    $this->coursePreReq = $row['preReq'];
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
                    $this->HasWeightedAssessment = $row['weightagedAssessment'];
                    $this->setAssessmentInfo($row['quizWeightage'], $row['assignmentWeightage'], $row['projectWeightage'], $row['midtermWeightage'], $row['finalExamWeightage']);
                    $this->setInstructorInfo($row['instructorName'], $row['designation'], $row['qualification'], $row['specialization'], $row['contactNumber'], $row['personalEmail']);
                }
            else
                echo sprintf("\n<br>Error , can not find CourseProfile Information : %s\n<br>Server Error:%s\n<br>", $courseProfileID, $this->databaseConnection->error);
        }

    }

    public function deleteCourseProfileDistributionRecord($currentCLOID, $programCode, $batchCode): bool
    {
        $prepareStatementDeleteQuery = $this->databaseConnection->prepare(query: "delete from clo where CLOCode = ? and programCode = ? and batchCode = ?");

        $sanitizeCLOCode = FormValidator::sanitizeUserInput($currentCLOID, 'int');
        $sanitizeProgramCode = FormValidator::sanitizeUserInput($programCode, 'int');
        $sanitizeBatchCode = FormValidator::sanitizeUserInput($batchCode, 'int');

        $prepareStatementDeleteQuery->bind_param('iii', $sanitizeCLOCode, $sanitizeProgramCode, $sanitizeBatchCode);
        return $prepareStatementDeleteQuery->execute() === TRUE;
    }

    public function deleteCourseProfileCLOPLOMapping($CLOCode): bool
    {
        $prepareStatementDeleteQuery = $this->databaseConnection->prepare(query: "DELETE FROM clotoplomapping WHERE CLOCode= ? ");
        $sanitizeCLOCode = FormValidator::sanitizeUserInput($CLOCode, 'int');

        $prepareStatementDeleteQuery->bind_param('i', $sanitizeCLOCode);
        return $prepareStatementDeleteQuery->execute() === TRUE;
    }

    public function modifyCourseProfileData($courseProfileCode, $courseInstructorList): array
    {
        $failedToPerformUpdation = array();

        $prepareStatementUpdateQuery = $this->databaseConnection->prepare(query: "UPDATE courseprofile SET courseTitle = ?, creditHours = ?, semester =?,
                          programName = ?, programLevel = ?, courseEffective =? , 
                          coordinatingUnit = ?, teachingMethodology = ?, courseModel =? ,  recommendedBooks =? ,  preReq = ? ,
                          referenceBooks = ?, courseDescription = ?, otherReferences =  ? , weightagedAssessment = ?
                           WHERE courseProfileCode = ? ");

        $sanitizeCourseTitle = FormValidator::sanitizeStringWithSpace(FormValidator::sanitizeUserInput($this->courseTitle, 'string'));
        $sanitizeCourseCreditHour = FormValidator::sanitizeUserInput($this->courseCreditHr, 'int');
        $sanitizeCoursePreRequisite = FormValidator::sanitizeUserInput($this->coursePreReq, 'string');
        $sanitizeCourseSemester = FormValidator::sanitizeUserInput($this->courseSemester, 'int');
        $sanitizeCourseProgram = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($this->courseProgram, 'string'));
        $sanitizeCourseProgramLevel = FormValidator::sanitizeUserInput($this->courseProgramLevel, 'string');
        $sanitizeCourseEffective = FormValidator::sanitizeUserInput($this->courseCourseEffective, 'string');
        $sanitizeCourseCoordinator = FormValidator::sanitizeUserInput($this->courseCoordination, 'string');
        $sanitizeCourseTeachingMythology = FormValidator::sanitizeUserInput($this->courseTeachingMythology, 'string');
        $sanitizeCourseModel = FormValidator::sanitizeUserInput($this->courseModel, 'string');
        $sanitizeCourseTextBook = FormValidator::sanitizeUserInput($this->courseTextBook, 'string');
        $sanitizeCourseReferenceBook = FormValidator::sanitizeUserInput($this->courseReferenceBook, 'string');
        $sanitizeCourseDescription = FormValidator::sanitizeUserInput($this->courseDescription, 'string');
        $sanitizeCourseOtherReference = FormValidator::sanitizeUserInput($this->courseOtherReference, 'string');

        $prepareStatementUpdateQuery->bind_param('siissssssssssssi', $sanitizeCourseTitle, $sanitizeCourseCreditHour, $sanitizeCourseSemester, $sanitizeCourseProgram,
            $sanitizeCourseProgramLevel, $sanitizeCourseEffective, $sanitizeCourseCoordinator, $sanitizeCourseTeachingMythology,
            $sanitizeCourseModel, $sanitizeCourseTextBook, $sanitizeCoursePreRequisite, $sanitizeCourseReferenceBook, $sanitizeCourseDescription, $sanitizeCourseOtherReference, $this->HasWeightedAssessment,
            $courseProfileCode);

        if ($prepareStatementUpdateQuery->execute() !== TRUE)
            $failedToPerformUpdation[] = -1;
//              echo sprintf("\n<br>Error while updating Course Profile Basic Info : %s\n<br>Server Error:%s\n<br>", json_encode(array($courseProfileID)), $this->databaseConnection->error);

        if (!empty($courseInstructorList) and count($courseInstructorList) > 0) {
            foreach ($courseInstructorList as $key => $faculty) {
                self::setInstructorInfo($faculty['_name'], $faculty['_designation'], $faculty['_qualification'], $faculty['_specialization'], $faculty['_contactNumber'], $faculty['_personalEmail']);

                $instructor_name = $this->instructorInfo->getInstructorName();
                $instructor_designation = $this->instructorInfo->getInstructorDesignation();
                $instructor_qualification = $this->instructorInfo->getInstructorQualification();
                $instructor_spec = $this->instructorInfo->getInstructorSpecialization();
                $instructor_contact = $this->instructorInfo->getInstructorContactNumber();
                $instructor_email = $this->instructorInfo->getInstructorPersonalEmail();
                $instructorFacultyCode = $faculty['_fkey'];

                $prepareStatementUpdateQuery_2 = $this->databaseConnection->prepare(query: "update courseprofileinstructordetail SET instructorName = ?, designation =?, 
                qualification = ?, specialization = ?, contactNumber = ?,  personalEmail = ? WHERE courseProfileCode = ? and facultyCode = ? ");

                $sanitizeCourseProfileCode = FormValidator::sanitizeUserInput($courseProfileCode, 'int');
                $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($instructorFacultyCode, 'string'));

                $sanitizeInstructorName = FormValidator::sanitizeUserInput($instructor_name, 'string');
                $sanitizeInstructorDesignation = FormValidator::sanitizeUserInput($instructor_designation, 'string');
                $sanitizeInstructorQualification = FormValidator::sanitizeUserInput($instructor_qualification, 'string');
                $sanitizeInstructorSpecification = FormValidator::sanitizeUserInput($instructor_spec, 'string');
                $sanitizeInstructorContact = FormValidator::sanitizeUserInput($instructor_contact, 'string');
                $sanitizeInstructorEmail = FormValidator::sanitizeUserInput($instructor_email, 'email');

                $prepareStatementUpdateQuery_2->bind_param('ssssssis', $sanitizeInstructorName, $sanitizeInstructorDesignation, $sanitizeInstructorQualification,
                    $sanitizeInstructorSpecification, $sanitizeInstructorContact, $sanitizeInstructorEmail, $sanitizeCourseProfileCode, $sanitizeFacultyCode);

                if ($prepareStatementUpdateQuery_2->execute() !== TRUE)
                    $failedToPerformUpdation[] = -2;
//                        echo sprintf("\n<br>Error while Updating Course Profile Instructor Info : %s\n<br>Server Error:%s\n<br>", json_encode(array()), $this->databaseConnection->error);
            }
        }


        $c_quiz_weight = $this->assessmentInfo->getQuizWeightage();
        $c_assignment_weight = $this->assessmentInfo->getAssignmentWeightage();
        $c_project_weight = $this->assessmentInfo->getProjectWeightage();
        $c_mid_weight = $this->assessmentInfo->getMidWeightage();
        $c_final_weight = $this->assessmentInfo->getFinalWeightage();

        $prepareStatementUpdateQuery_3 = $this->databaseConnection->prepare(query: "update courseprofileassessmentinstruments SET quizWeightage = ?, assignmentWeightage = ?, 
            projectWeightage = ?, midtermWeightage = ?, finalExamWeightage = ? WHERE courseProfileCode =  ? ");

        $sanitizeCourseProfileCode = FormValidator::sanitizeUserInput($courseProfileCode, 'int');
        $sanitizeAssignmentWeightage = FormValidator::sanitizeUserInput($c_assignment_weight, 'int');
        $sanitizeQuizzWeightage = FormValidator::sanitizeUserInput($c_quiz_weight, 'int');
        $sanitizeProjectWeightage = FormValidator::sanitizeUserInput($c_project_weight, 'int');
        $sanitizeMidWeightage = FormValidator::sanitizeUserInput($c_mid_weight, 'int');
        $sanitizeFinalWeightage = FormValidator::sanitizeUserInput($c_final_weight, 'int');

        $prepareStatementUpdateQuery_3->bind_param('iiiiii', $sanitizeQuizzWeightage, $sanitizeAssignmentWeightage,
            $sanitizeProjectWeightage, $sanitizeMidWeightage, $sanitizeFinalWeightage, $sanitizeCourseProfileCode);

        if ($prepareStatementUpdateQuery_3->execute() !== TRUE)
            $failedToPerformUpdation[] = -3;
//            echo sprintf("\n<br>Error while Updating Course Profile Assessment Info : %s\n<br>Server Error:%s\n<br>", json_encode(array()), $this->databaseConnection->error);
        return $failedToPerformUpdation;
    }

    public function retrieveAllInstructorDetail($courseProfileCode, $affiliatedFacultyList): array
    {
        $professorList = array();
        /** if all section has same faculty  */
        $noIterate = false;
        $filterFacultyList = array();
        if (!empty($affiliatedFacultyList) and count($affiliatedFacultyList) > 0)
            foreach ($affiliatedFacultyList as $index => $faculty) {
                $currentFaculty = $faculty['facultyCode'];
                if (!in_array($currentFaculty, $filterFacultyList))
                    $filterFacultyList[] = $currentFaculty; // unique or different faculty List.
                else
                    $noIterate = true;
            }

        /** IF ALL SECTION HAS DIFFERENT FACULTY MEMBERS */
        if (!empty($affiliatedFacultyList) and count($affiliatedFacultyList) > 0 and !$noIterate and (count($affiliatedFacultyList) == count($filterFacultyList)))
            foreach ($affiliatedFacultyList as $faculty) {
                $facultyCode = $faculty['facultyCode'];

                $prepareStatementSearchQuery = $this->databaseConnection->prepare('select * from courseprofile as cp inner join courseprofileinstructordetail c2 on cp.courseProfileCode = c2.courseProfileCode
                     where cp.courseProfileCode  = ? and facultyCode = ?  ;');
                $prepareStatementSearchQuery->bind_param('is', $courseProfileCode, $facultyCode);

                if ($prepareStatementSearchQuery->execute()) {
                    $result = $prepareStatementSearchQuery->get_result();
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = $result->fetch_assoc()) {
//                        print "running time :" . $row['instructorName'] . "<br>";
                            $newCourseProfile = new self();
                            $newCourseProfile->setInstructorInfo($row['instructorName'], $row['designation'], $row['qualification'], $row['specialization'], $row['contactNumber'], $row['personalEmail']);
                            $professorList[] = $newCourseProfile;
                        }
                    } else
                        echo sprintf("\n<br>Error , can not find CourseProfile Instructor Information : %s\n<br>Server Error:%s\n<br>", $this->databaseConnection->error);
                }


            }
        /** IF ALL SECTION HAS SAME FACULTY MEMBER  */
        elseif (!empty($affiliatedFacultyList) and count($affiliatedFacultyList) > 0 and $noIterate and count($filterFacultyList) == 1) {
            $facultyCode = $filterFacultyList[0];

            $prepareStatementSearchQuery = $this->databaseConnection->prepare('select * from courseprofile as cp inner join courseprofileinstructordetail c2 on cp.courseProfileCode = c2.courseProfileCode
                     where cp.courseProfileCode = ? and facultyCode = ?  ;');
            $prepareStatementSearchQuery->bind_param('is', $courseProfileCode, $facultyCode);

            if ($prepareStatementSearchQuery->execute()) {
                $result = $prepareStatementSearchQuery->get_result();
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $newCourseProfile = new self();
                        $newCourseProfile->setInstructorInfo($row['instructorName'], $row['designation'], $row['qualification'], $row['specialization'], $row['contactNumber'], $row['personalEmail']);
                        $professorList[] = $newCourseProfile;
                    }
                } else
                    echo sprintf("\n<br>Error , can not find CourseProfile Instructor Information : %s\n<br>Server Error:%s\n<br>", $this->databaseConnection->error);
            }

        } /** IF SOME SECTION HAS SAME AND SOME HAS DIFFERENT FACULTY MEMBER  */
        elseif (!empty($affiliatedFacultyList) and count($affiliatedFacultyList) > 0 and $noIterate and (count($filterFacultyList) > 1 and count($affiliatedFacultyList) > count($filterFacultyList))) {
            foreach ($filterFacultyList as $faculty) {
                $facultyCode = $faculty;

                $prepareStatementSearchQuery = $this->databaseConnection->prepare('select * from courseprofile as cp inner join courseprofileinstructordetail c2 on cp.courseProfileCode = c2.courseProfileCode
                     where cp.courseProfileCode = ? and facultyCode = ?  ;');
                $prepareStatementSearchQuery->bind_param('is', $courseProfileCode, $facultyCode);
                if ($prepareStatementSearchQuery->execute()) {
                    $result = $prepareStatementSearchQuery->get_result();
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $newCourseProfile = new self();
                            $newCourseProfile->setInstructorInfo($row['instructorName'], $row['designation'], $row['qualification'], $row['specialization'], $row['contactNumber'], $row['personalEmail']);
                            $professorList[] = $newCourseProfile;
                        }
                    } else
                        echo sprintf("\n<br>Error , can not find CourseProfile Instructor Information : %s\n<br>Server Error:%s\n<br>", $this->databaseConnection->error);
                }
            }
        }

        return $professorList;
    }

    public function getBatchCode(): mixed
    {
        return $this->batchCode;
    }

    public function setBatchCode(int $batchCode): void
    {
        $this->batchCode = $batchCode;
    }

    public function getCourse(): Course
    {
        return $this->course;
    }


    public function getCourseCode(): string
    {
        return $this->courseCode;
    }


    public function setCourseCode(string $courseCode): void
    {
        $this->courseCode = $courseCode;
    }


    public function getCourseTitle(): string
    {
        return $this->courseTitle;
    }

    public function setCourseTitle(string $courseTitle): void
    {
        $this->courseTitle = $courseTitle;
    }

    public function getCourseCreditHr(): mixed
    {
        return $this->courseCreditHr;
    }


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


    public function getCourseProgram(): string
    {
        return $this->courseProgram;
    }

    public function setCourseProgram(string $courseProgram): void
    {
        $this->courseProgram = $courseProgram;
    }

    public function getCourseProgramLevel(): string
    {
        return $this->courseProgramLevel;
    }

    public function setCourseProgramLevel(string $courseProgramLevel): void
    {
        $this->courseProgramLevel = $courseProgramLevel;
    }

    public function getCourseCourseEffective(): string
    {
        return $this->courseCourseEffective;
    }

    public function setCourseCourseEffective(string $courseCourseEffective): void
    {
        $this->courseCourseEffective = $courseCourseEffective;
    }

    public function getCourseCoordination(): string
    {
        return $this->courseCoordination;
    }

    public function setCourseCoordination(string $courseCoordination): void
    {
        $this->courseCoordination = $courseCoordination;
    }

    public function getCourseTeachingMythology(): string
    {
        return $this->courseTeachingMythology;
    }

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

    public function getCourseReferenceBook(): string
    {
        return $this->courseReferenceBook;
    }

    public function setCourseReferenceBook(string $courseReferenceBook): void
    {
        $this->courseReferenceBook = $courseReferenceBook;
    }


    public function getCourseTextBook(): string
    {
        return $this->courseTextBook;
    }

    public function setCourseTextBook(string $courseTextBook): void
    {
        $this->courseTextBook = $courseTextBook;
    }


    public function getCourseDescription(): string
    {
        return $this->courseDescription;
    }

    public function setCourseDescription(string $courseDescription): void
    {
        $this->courseDescription = $courseDescription;
    }

    public function getCourseOtherReference(): string
    {
        return $this->courseOtherReference;
    }

    public function setCourseOtherReference(string $courseOtherReference): void
    {
        $this->courseOtherReference = $courseOtherReference;
    }

    public function getProgramCode(): mixed
    {
        return $this->programCode;
    }

    public function setProgramCode($programCode): void
    {
        $this->programCode = $programCode;
    }

    public function getCoursePreReq(): string
    {
        return $this->coursePreReq;
    }

    public function setCoursePreReq(string $coursePreReq): void
    {
        $this->coursePreReq = $coursePreReq;
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


    public function getHasWeightedAssessment()
    {
        return $this->HasWeightedAssessment;
    }

    public function setHasWeightedAssessment($HasWeightedAssessment): void
    {
        $this->HasWeightedAssessment = $HasWeightedAssessment;
    }


    public function getDatabaseConnection(): ?mysqli
    {
        return $this->databaseConnection;
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