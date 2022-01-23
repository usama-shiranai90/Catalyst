<?php

//namespace backend\package\cp;
//use DatabaseSingleton;
//use Persistable;

include 'AssessmentWeight.php';
include 'CourseInstructor.php';
include 'Persistable.php';

class CourseProfile implements Persistable
{
    protected $courseProfileCode;

    protected $databaseConnection;
    private $courseTitle;
    private $courseCode;
    private $courseCreditHr; // may change to array if multiple.
    private $coursePreRequisities; // term
    private $courseSemester;
    private $courseProgramLevel;
    private $courseProgram;
    private $courseCourseEffective;
    private $courseCoordination;
    private $courseTeachingMythology;
    private $courseModel;
    private $courseReferenceBook;
    private $courseTextBook;
    private $courseDescription;
    private $courseOtherReference; // composition
    private $instructorInfo; // composition
    private $assessmentInfo;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton::getConnection();
        $this->instructorInfo = new CourseInstructor();
        $this->assessmentInfo = new AssessmentWeight();

    }

    public function setCourseInfo($courseTitle, $courseCode, $courseCreditHr, $coursePreReq, $courseSemester, $courseProgramLevel, $courseProgram, $courseCourseEffective,
                                  $courseCoordination, $courseTeachingMythology, $courseModel,
                                  $courseReferenceBook, $courseTextBook, $courseDescription, $courseOtherReference)
    {
        $this->courseTitle = $courseTitle;
        $this->courseCode = $courseCode;
        $this->courseCreditHr = $courseCreditHr;
        $this->coursePreRequisities = $coursePreReq;
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
    }

    public function isProfileExist($sectionCode, $currentCourse): bool
    {
        $sql = /** @lang text */
            "select b.batchCode, b.programCode
    from section
         join semester s on section.semesterCode = s.semesterCode
         join batch b on
    s.batchCode = b.batchCode
         join program p on b.curriculumCode = p.curriculumCode
    where sectionCode =" . $sectionCode . ";";

        $currentBatchCode = "";
        $currentProgramCode = "";

        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $currentBatchCode = $row['batchCode'];
                $currentProgramCode = $row['programCode'];
            }
        } else
            return false;

        $sql = /** @lang text */
//            "select courseProfileCode from courseprofile cp where cp.courseCode = 'SEN-32' and cp.batchCode= 1 and cp.programCode = 1;";
            "select cp.courseProfileCode from courseprofile cp where cp.courseCode =" . $currentCourse . "
            and cp.batchCode=" . $currentBatchCode . " 1 and cp.programCode =" . $currentProgramCode . ";";

        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            mysqli_data_seek($result, 0);
            $this->setCourseProfileCode($row['courseProfileCode']);
            return true;
            /*         while ($row = $result->fetch_assoc()) {

                return true;
            }*/
        }
        return false;
    }

    public function saveCourseProfileData()       // TODO: Implement saveCourseProfileData() method.  will save data in database and temporary in session variable.
    {
        $sql = /** @lang text */
            "INSERT INTO contacts (name,age,email) VALUES(?, ?, ?)";

        $result = $this->databaseConnection->query($sql);

        // Insert new contact


    }

    public function loadCourseProfileData($courseProfileID)
    {
        // TODO: Implement loadCourseProfileData() method.
    }

    public function modifyCourseProfileData($courseProfileID)
    {
        // TODO: Implement modifyCourseProfileData() method.
    }

    public function getCourseTitle()
    {
        return $this->courseTitle;
    }

    public function getCourseCode()
    {
        return $this->courseCode;
    }

    public function getCourseCreditHr()
    {
        return $this->courseCreditHr;
    }

    public function getCourseSemester()
    {
        return $this->courseSemester;
    }

    public function getCourseProgramLevel()
    {
        return $this->courseProgramLevel;
    }

    public function getCourseProgram()
    {
        return $this->courseProgram;
    }

    public function getCourseCourseEffective()
    {
        return $this->courseCourseEffective;
    }

    public function getCourseCoordination()
    {
        return $this->courseCoordination;
    }

    public function getCourseTeachingMythology()
    {
        return $this->courseTeachingMythology;
    }

    public function getCourseModel()
    {
        return $this->courseModel;
    }

    public function getCourseReferenceBook()
    {
        return $this->courseReferenceBook;
    }

    public function getCourseTextBook()
    {
        return $this->courseTextBook;
    }

    public function getCourseDescription()
    {
        return $this->courseDescription;
    }

    public function getCourseOtherReference()
    {
        return $this->courseOtherReference;
    }

    public function getCoursePreRequisities()
    {
        return $this->coursePreRequisities;
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
     * @return CourseInstructor
     */
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