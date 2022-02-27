<?php

/*$currentAssessment = $_POST['assessmentTypeID'];
// apply query to get specific assessment result in array.  will deal in object of array.
$regNumbers = array("F18-BCSE-001", "F18-BCSE-002", "F18-BCSE-003", "F18-BCSE-004");
$description = "To control the letter spacing of an element at a specific breakpoint";
$total = 10;
$achievement = array(
    "obtain" => array(8, 9, 10, 6),
    "achieved" => array("80%", "90%", "100%", "60%")
);
echo json_encode(array($regNumbers, $description, $total, $achievement));*/

class StudentAssessmentAverage implements JsonSerializable
{
    protected $studentRegistrationNo;
    protected $topicDescription;
    protected $assessmentTotalMarks;
    protected $assessmentObtainMarks;
    protected $achievedPercentage;
    public $assessmentQuestionsList = array(); // AssessmentQuestion composition.


    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
        return array(
            'regNumber' => $this->studentRegistrationNo,
            'description' => $this->topicDescription,
            'totalMarks' => $this->assessmentTotalMarks,
            'obtainMarks' => $this->assessmentObtainMarks,
            'assessmentQuestions' => $this->assessmentQuestionsList,
        );
    }

    public function getAssessmentTotalMarks()
    {
        return $this->assessmentTotalMarks;
    }


    public function setAssessmentTotalMarks($assessmentTotalMarks): void
    {
        $this->assessmentTotalMarks = $assessmentTotalMarks;
    }


    public function getStudentRegistrationNo()
    {
        return $this->studentRegistrationNo;
    }

    /**
     * @param mixed $studentRegistrationNo
     */
    public function setStudentRegistrationNo($studentRegistrationNo): void
    {
        $this->studentRegistrationNo = $studentRegistrationNo;
    }


    public function getTopicDescription()
    {
        return $this->topicDescription;
    }

    /**
     * @param mixed $topicDescription
     */
    public function setTopicDescription($topicDescription): void
    {
        $this->topicDescription = $topicDescription;
    }


    public function getAssessmentObtainMarks()
    {
        return $this->assessmentObtainMarks;
    }

    /**
     * @param mixed $assessmentObtainMarks
     */
    public function setAssessmentObtainMarks($assessmentObtainMarks): void
    {
        $this->assessmentObtainMarks = $assessmentObtainMarks;
    }


    public function getAchievedPercentage()
    {
        return $this->achievedPercentage;
    }


    public function setAchievedPercentage($achievedPercentage): void
    {
        $this->achievedPercentage = $achievedPercentage;
    }


    public function getAssessmentQuestionsList()
    {
        return $this->assessmentQuestionsList;
    }


    public function setAssessmentQuestionsList($assessmentQuestionsList): void
    {
        $this->assessmentQuestionsList = $assessmentQuestionsList;
    } // AssessmentQuestion composite.

}

class AssessmentQuestion implements JsonSerializable
{
    protected $questionCode;
    protected $questionNo;
    protected $questionDetail;
    protected $questionTotalMarks;
    protected $questionAchieveMarks;
    protected $questionAchievePercentage;
    protected $respectiveCLO;

    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
        return array(
            'qCode' => $this->getQuestionCode(),
            'qNo' => $this->getQuestionNo(),
            'qDetail' => $this->getQuestionDetail(),
            'qTotalMarks' => $this->getQuestionTotalMarks(),
            'qObtainMarks' => $this->getQuestionAchieveMarks(),
            'qObtainPercent' => $this->getQuestionAchievePercentage(),
            'qRespectiveClo' => $this->getRespectiveCLO(),
        );
    }

    public function getQuestionCode()
    {
        return $this->questionCode;
    }

    public function setQuestionCode($questionCode): void
    {
        $this->questionCode = $questionCode;
    }


    public function getQuestionNo()
    {
        return $this->questionNo;
    }

    public function setQuestionNo($questionNo): void
    {
        $this->questionNo = $questionNo;
    }


    public function getQuestionDetail()
    {
        return $this->questionDetail;
    }

    public function setQuestionDetail($questionDetail): void
    {
        $this->questionDetail = $questionDetail;
    }


    public function getQuestionTotalMarks()
    {
        return $this->questionTotalMarks;
    }

    public function setQuestionTotalMarks($questionTotalMarks): void
    {
        $this->questionTotalMarks = $questionTotalMarks;
    }


    public function getQuestionAchieveMarks()
    {
        return $this->questionAchieveMarks;
    }


    public function setQuestionAchieveMarks($questionAchieveMarks): void
    {
        $this->questionAchieveMarks = $questionAchieveMarks;
    }


    public function getQuestionAchievePercentage()
    {
        return $this->questionAchievePercentage;
    }

    public function setQuestionAchievePercentage($questionAchievePercentage): void
    {
        $this->questionAchievePercentage = $questionAchievePercentage;
    }


    public function getRespectiveCLO()
    {
        return $this->respectiveCLO;
    }

    public function setRespectiveCLO($respectiveCLO): void
    {
        $this->respectiveCLO = $respectiveCLO;
    }


}

require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
}

//$studentsAssessment = new StudentAssessmentAverage();
$activity = new ClassActivity();

if (isset($_POST['summaryReport']) and $_POST['summaryReport']) {

    if (isset($_POST['assessmentTypeID'])) {
        $assessmentID = $_POST['assessmentTypeID'];
        $courseCode = $_SESSION['selectedCourse'];
        $sectionCode = $_SESSION['selectedSection'];

        $studentArray = $activity->getSelectedAssessment($assessmentID, $sectionCode, $courseCode);
        echo json_encode($studentArray);
    }

}


?>