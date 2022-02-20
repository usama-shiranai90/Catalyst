<?php
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\ClassActivity.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\OfferingAndAllocations\CLO.php";
require_once $_SERVER['DOCUMENT_ROOT']."\Modules\autoloader.php";

class Midterm extends ClassActivity
{
//    protected $databaseConnection;

    public function __construct()
    {
        parent::__construct();
    }

    public function getMidterm($sectionCode, $courseCode): ?array
    {
        $sql = /** @lang text */
            "select * from assessment where assessmentType = 'Midterm' and sectionCode = \"$sectionCode\" and courseCode = \"$courseCode\"";

        $result = $this->databaseConnection->query($sql);
        $listOfMidterms = array();


        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $newMidterm = new Midterm();
                $newMidterm->activityCode = $row['assessmentCode'];
                $newMidterm->topic = $row['topic'];
                $newMidterm->title = $row['title'];
                $newMidterm->totalMarks = $row['totalMarks'];
                $newMidterm->weightage = $row['weightage'];
                $newMidterm->numberOfQuestions = $row['numberOfQuestions'];
                $newMidterm->listOfQuestions = $this->getActivityQuestionsData($row['assessmentCode']);
                $newMidterm->listOfMappedCLOs = $this->retrieveCLOList($row['assessmentCode']);
                array_push($listOfMidterms, $newMidterm);
            }
            return $listOfMidterms;

        } else {
//            echo "No midterm found with sectionCode: " . $sectionCode . " and courseCode: " . $courseCode;
            return $listOfMidterms;
        }
    }

    public function getAccumulatedMidtermWeightage($sectionCode, $courseCode)
    {
        $sql = /** @lang text */
            "select weightage from assessment where sectionCode = \"$sectionCode\" and courseCode = \"$courseCode\" and assessmentType = 'Midterm'";

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
        echo "<br>Midterm Details: <br>";
        echo "<br>Midterm Code:" . $this->activityCode;
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