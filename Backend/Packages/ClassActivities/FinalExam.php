<?php
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\ClassActivity.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\OfferingAndAllocations\CLO.php";
require_once $_SERVER['DOCUMENT_ROOT']."\Modules\autoloader.php";

class FinalExam extends ClassActivity
{
//    protected $databaseConnection;

    public function __construct()
    {
        parent::__construct();
    }

    public function getFinalExam($sectionCode, $courseCode): ?array
    {
        $sql = /** @lang text */
            "select * from assessment where assessmentType = 'FinalExam' and sectionCode = \"$sectionCode\" and courseCode = \"$courseCode\"";

        $result = $this->databaseConnection->query($sql);
        $listOfFinalExams = array();


        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $newFinalExam = new FinalExam();
                $newFinalExam->activityCode = $row['assessmentCode'];
                $newFinalExam->topic = $row['topic'];
                $newFinalExam->title = $row['title'];
                $newFinalExam->totalMarks = $row['totalMarks'];
                $newFinalExam->weightage = $row['weightage'];
                $newFinalExam->numberOfQuestions = $row['numberOfQuestions'];
                $newFinalExam->listOfQuestions = $this->getActivityQuestionsData($row['assessmentCode']);
                $newFinalExam->listOfMappedCLOs = $this->retrieveCLOList($row['assessmentCode']);
                array_push($listOfFinalExams, $newFinalExam);
            }
            return $listOfFinalExams;

        } else {
//            echo "No finalExam found with sectionCode: " . $sectionCode . " and courseCode: " . $courseCode;
            return $listOfFinalExams;
        }
    }

    public function getAccumulatedFinalExamWeightage($sectionCode, $courseCode)
    {
        $sql = /** @lang text */
            "select weightage from assessment where sectionCode = \"$sectionCode\" and courseCode = \"$courseCode\" and assessmentType = 'FinalExam'";

        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {
            $sumOfWeightages = 0;
            while ($row = $result->fetch_assoc()) {
                $sumOfWeightages = $row['weightage'];
            }
            return $sumOfWeightages;
        } else {
//            echo "No sum of weightages found for sectionCode: " . $sectionCode;
            return "0";
        }

    }

    public function toString()
    {
        echo "<br>FinalExam Details: <br>";
        echo "<br>FinalExam Code:" . $this->activityCode;
        echo "<br>Topic: " . $this->topic;
        echo "<br>Title: " . $this->title;
        echo "<br>Total Marks: " . $this->totalMarks;
        echo "<br>Weightage: " . $this->weightage;
        echo "<br>Number of Questions: " . $this->numberOfQuestions;
        echo "<br>Questions: ";


        foreach ($this->listOfQuestions as $question) {
            echo "<br>";
//            echo "<br>QuestionCode: " . $question[0];
            echo "<br>Detail: " . $question['Detail'];
            echo "<br>Marks: " . $question["Marks"];
            echo "<br>CLO: " . $question['CLO'];
        }

    }


}