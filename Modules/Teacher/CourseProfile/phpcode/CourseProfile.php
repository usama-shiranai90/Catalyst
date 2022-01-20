<?php
include 'AssessmentWeight.php';
include 'CourseInstructor.php';
include 'Persistable.php';

class CourseProfile implements Persistable
{

    private $courseTitle;
    private $courseCode;
    private $courseCreditHr;
    private $coursePreRequisities ; // may change to array if multiple.
    private $courseSemester; // term
    private $courseProgramLevel;
    private $courseProgram;
    private $courseCourseEffective;
    private $courseCoordination;
    private $courseTeachingMythology;
    private $courseModel;
    private $courseReferenceBook;
    private $courseTextBook;
    private $courseDescription;
    private $courseOtherReference;

    private $instructorInfo; // composition
    private $assessmentInfo; // composition

    public function __construct($courseTitle, $courseCode, $courseCreditHr ,$coursePreReq, $courseSemester, $courseProgramLevel, $courseProgram, $courseCourseEffective,
                                $courseCoordination, $courseTeachingMythology, $courseModel, $courseReferenceBook, $courseTextBook, $courseDescription,
                                $courseOtherReference ,$assessmentInfo , $instructorInfo){ // ,

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
        $this->instructorInfo = $instructorInfo;
        $this->assessmentInfo = $assessmentInfo;
    }


    public function getCourseTitle()
    {
        return $this->courseTitle;
    }


    public function setCourseTitle($courseTitle)
    {
        $this->courseTitle = $courseTitle;
    }

    public function getCourseCode()
    {
        return $this->courseCode;
    }

    public function setCourseCode($courseCode)
    {
        $this->courseCode = $courseCode;
    }

    public function getCourseCreditHr()
    {
        return $this->courseCreditHr;
    }

    public function setCourseCreditHr($courseCreditHr)
    {
        $this->courseCreditHr = $courseCreditHr;
    }

    public function getCourseSemester()
    {
        return $this->courseSemester;
    }

    public function setCourseSemester($courseSemester)
    {
        $this->courseSemester = $courseSemester;
    }

    public function getCourseProgramLevel()
    {
        return $this->courseProgramLevel;
    }

    public function setCourseProgramLevel($courseProgramLevel)
    {
        $this->courseProgramLevel = $courseProgramLevel;
    }


    public function getCourseProgram()
    {
        return $this->courseProgram;
    }


    public function setCourseProgram($courseProgram)
    {
        $this->courseProgram = $courseProgram;
    }

    public function getCourseCourseEffective()
    {
        return $this->courseCourseEffective;
    }


    public function setCourseCourseEffective($courseCourseEffective)
    {
        $this->courseCourseEffective = $courseCourseEffective;
    }

    public function getCourseCoordination()
    {
        return $this->courseCoordination;
    }

    public function setCourseCoordination($courseCoordination)
    {
        $this->courseCoordination = $courseCoordination;
    }

    public function getCourseTeachingMythology()
    {
        return $this->courseTeachingMythology;
    }

    /**
     * @param mixed $courseTeachingMythology
     */
    public function setCourseTeachingMythology($courseTeachingMythology)
    {
        $this->courseTeachingMythology = $courseTeachingMythology;
    }

    /**
     * @return mixed
     */
    public function getCourseModel()
    {
        return $this->courseModel;
    }

    /**
     * @param mixed $courseModel
     */
    public function setCourseModel($courseModel)
    {
        $this->courseModel = $courseModel;
    }

    /**
     * @return mixed
     */
    public function getCourseReferenceBook()
    {
        return $this->courseReferenceBook;
    }

    /**
     * @param mixed $courseReferenceBook
     */
    public function setCourseReferenceBook($courseReferenceBook)
    {
        $this->courseReferenceBook = $courseReferenceBook;
    }

    /**
     * @return mixed
     */
    public function getCourseTextBook()
    {
        return $this->courseTextBook;
    }

    /**
     * @param mixed $courseTextBook
     */
    public function setCourseTextBook($courseTextBook)
    {
        $this->courseTextBook = $courseTextBook;
    }

    /**
     * @return mixed
     */
    public function getCourseDescription()
    {
        return $this->courseDescription;
    }

    public function setCourseDescription($courseDescription)
    {
        $this->courseDescription = $courseDescription;
    }

    public function getCourseOtherReference()
    {
        return $this->courseOtherReference;
    }

    public function setCourseOtherReference($courseOtherReference)
    {
        $this->courseOtherReference = $courseOtherReference;
    }

    /**
     * @return mixed
     */
    public function getInstructorInfo()
    {
        return $this->instructorInfo;
    }

    /**
     * @param mixed $instructorInfo
     */
    public function setInstructorInfo($instructorInfo)
    {
        $this->instructorInfo = $instructorInfo;
    }

    /**
     * @return mixed
     */
    public function getAssessmentInfo()
    {
        return $this->assessmentInfo;
    }

    /**
     * @param mixed $assessmentInfo
     */
    public function setAssessmentInfo($assessmentInfo)
    {
        $this->assessmentInfo = $assessmentInfo;
    }


    public function saveCourseProfileData($courseProfileID)
    {
        // TODO: Implement saveCourseProfileData() method.  will save data in database and temporary in session variable.


    }

    /**
     * @return mixed
     */
    public function getCoursePreRequisities()
    {
        return $this->coursePreRequisities;
    }

    public function loadCourseProfileData($courseProfileID)
    {
        // TODO: Implement loadCourseProfileData() method.
    }

    public function modifyCourseProfileData($courseProfileID)
    {
        // TODO: Implement modifyCourseProfileData() method.
    }
}

//header('Content-Type: application/json');

if (isset($_POST['arrayCLO']) && isset($_POST['arrayMapping']) && isset($_POST['courseEssentialFieldValue']) && isset($_POST['courseDetailFieldValue'])) {

    session_start();
    $array_courseEssential = $_POST['courseEssentialFieldValue'];
    $array_courseDetail = $_POST['courseDetailFieldValue'];
    $array_cCLO = $_POST['arrayCLO'];
    $array_cMapping = $_POST['arrayMapping'];

    // apply query to create save data on server.
    $_SESSION['currentSubjectEssential_array'] = $array_courseEssential ;
    $_SESSION['currentSubjectDetail_array'] = $array_courseDetail ;
    $_SESSION['currentSubject_outcomeDetail_array'] = $array_cCLO;
    $_SESSION['currentSubject_cloToPlo_array'] = $array_cMapping;

}

?>