<?php
include 'AssessmentWeight.php';
include 'CourseInstructor.php';
include 'Persistable.php';

class CourseProfile implements Persistable
{

    private $courseTitle;
    private $courseCode;
    private $courseCreditHr;
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


    public static function create()
    {
        return new self();
    }


    public function __construct($courseTitle, $courseCode, $courseCreditHr, $courseSemester, $courseProgramLevel, $courseProgram, $courseCourseEffective, $courseCoordination, $courseTeachingMythology, $courseModel, $courseReferenceBook, $courseTextBook, $courseDescription, $courseOtherReference, $instructorInfo, $assessmentInfo)
    {
        $this->courseTitle = $courseTitle;
        $this->courseCode = $courseCode;
        $this->courseCreditHr = $courseCreditHr;
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


    public function saveCourseProfileData($courseProfileID)
    {
        // TODO: Implement saveCourseProfileData() method.  will save data in database and temporary in session variable.


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


header('Content-Type: application/json');

if (!empty($_POST['arrayCLO']) && !empty($_POST['arrayMapping']) &&
    !empty($_POST['courseEssentialFieldValue']) && !empty($_POST['courseDetailFieldValue'])) {

    $array_cCLO = $_POST['arrayCLO'];
    $array_cMapping = $_POST['arrayMapping'];

    $courseProfile = new CourseProfile();

    // apply query to create save data on server.
    //$_SESSION['course1'] = $array_cCLO ;
    //$_SESSION['course2'] = $array_cMapping ;
    $_SESSION['course3_clo'] = $array_cCLO;
    $_SESSION['course4_map'] = $array_cMapping;
    echo json_encode($array_cCLO[0]);
    //print_r($array_cMapping);

} elseif (!isset($_POST['curriculumID']) && !isset($_POST['batchID']) && !isset($_POST['courseCodeID'])) {
//    $courseProfile = new CourseProfile();
}


?>