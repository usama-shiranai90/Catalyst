<?php
/*include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\ClassActivity.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\OfferingAndAllocations\CLO.php";*/

require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";

class Sessional extends ClassActivity
{
//    protected $databaseConnection;

    public function __construct()
    {
        parent::__construct();
    }

    public function getSessionals($sectionCode, $courseCode, $activityType): ?array
    {
        $sql = /** @lang text */
            "select * from assessment where assessmentType = 'Sessional' and assessmentSubType= '$activityType' and sectionCode = \"$sectionCode\" and courseCode = \"$courseCode\"";

        $result = $this->databaseConnection->query($sql);
        $listOfSessionals = array();


        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $newSessional = new Sessional();
                $newSessional->activityCode = $row['assessmentCode'];
                $newSessional->topic = $row['topic'];
                $newSessional->title = $row['title'];
                $newSessional->totalMarks = $row['totalMarks'];
                $newSessional->weightage = $row['weightage'];
                $newSessional->numberOfQuestions = $row['numberOfQuestions'];
                $newSessional->listOfQuestions = $this->getActivityQuestionsData($row['assessmentCode']);
                $newSessional->listOfMappedCLOs = $this->retrieveCLOList($row['assessmentCode']);

                array_push($listOfSessionals, $newSessional);
            }
            return $listOfSessionals;

        } else {
//            echo "No sessional found with sectionCode: " . $sectionCode . " and courseCode: " . $courseCode;
            return null;
        }
    }


    public function getAccumulatedSessionalWeightage($sectionCode, $courseCode)
    {
        $sql = /** @lang text */
            "select SUM(weightage) from assessment where sectionCode = \"$sectionCode\" and courseCode = \"$courseCode\" and  assessmentType = 'Sessional'";

        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {
            $sumOfWeightages = 0;
            while ($row = $result->fetch_assoc()) {
                $sumOfWeightages = $row['SUM(weightage)'];
            }

            if ($sumOfWeightages == null) {
                return 0;
            }
            return $sumOfWeightages;
        } else {
            echo "No sum of weightages found for sectionCode: " . $sectionCode;
            return 0;
        }

    }

    public function getAccumulatedWeightageForParticularSessional($sectionCode, $courseCode, $sessionalType)
    {
        $sql = /** @lang text */
            "select SUM(weightage) from assessment where sectionCode = \"$sectionCode\" and courseCode = \"$courseCode\" and assessmentSubType = \"$sessionalType\"";

        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {
            $sumOfWeightages = 0;
            while ($row = $result->fetch_assoc()) {
                $sumOfWeightages = $row['SUM(weightage)'];
            }
            if ($sumOfWeightages == null)
                return 0;

            return $sumOfWeightages;

        } else {
            echo "No sum of \"$sessionalType\" weightage found for sectionCode: " . $sectionCode . " and course code: " . $courseCode;
            return null;
        }

        return $this->databaseConnection;
    }

    public function getProposedWeightageForParticularSessional($batchCode, $programCode, $courseCode, $sessionalType)
    {
        $sessionalType = strtolower($sessionalType);
        $neededWeightage = $sessionalType . "Weightage";

        $sql = "";
        if ($sessionalType == "assignment") {
            $sql = /** @lang text */
                "select assignmentWeightage from courseprofileassessmentinstruments where courseProfileCode = 
            (select courseProfileCode from courseprofile where batchCode = \"$batchCode\" and programCode = \"$programCode\" and courseCode = \"$courseCode\");";

        } elseif ($sessionalType == "quiz") {
            $sql = /** @lang text */
                "select quizWeightage from courseprofileassessmentinstruments where courseProfileCode = 
            (select courseProfileCode from courseprofile where batchCode = \"$batchCode\" and programCode = \"$programCode\" and courseCode = \"$courseCode\");";

        } else {
            $sql = /** @lang text */
                "select projectWeightage from courseprofileassessmentinstruments where courseProfileCode = 
            (select courseProfileCode from courseprofile where batchCode = \"$batchCode\" and programCode = \"$programCode\" and courseCode = \"$courseCode\");";
        }


        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $weightages = $row[$neededWeightage];
            }
            return $weightages;
        } else {
            echo "No  \"$sessionalType\"Weightage  found for batchCode: " . $batchCode . " and course code: " . $courseCode . " and programCode: " . $programCode;
            return null;
        }
    }


    public function toString()
    {
        echo "<br>SessionalDetails: <br>";
        echo "<br> Sessional Code:" . $this->activityCode;
        echo "<br>Topic: " . $this->topic;
        echo "<br>Title: " . $this->title;
        echo "<br>Total Marks: " . $this->totalMarks;
        echo "<br>Weightage: " . $this->weightage;
        echo "<br>Number of Questions: " . $this->numberOfQuestions;
        echo "<br>Questions: ";


        foreach ($this->listOfQuestions as $question) {
            echo "<br>";
            echo "<br>QuestionCode: " . $question[0];
            echo "<br>Detail: " . $question['Detail'];
            echo "<br>Marks: " . $question["Marks"];
            echo "<br>CLO: " . $question['CLO'];
        }

    }

    public function hasSessionalForAllSections($affiliatedFacultyList, $courseCode): bool
    {
        $hasPreAssessment = false;
        //{"facultyCode":"FUI-FURC-060","courseCode":"SEN-28","sectionCode":"42","sectionName":"A","isCoordinator":"0"}
        foreach ($affiliatedFacultyList as $faculty) {
            $sectionCode = $faculty['sectionCode'];

            $prepareStatementSearchQuery = $this->databaseConnection->prepare("select * from assessment where assessmentType = 'Sessional' and sectionCode = ? and courseCode = ? and 
                 (assessmentSubType= 'Assignment' or assessmentSubType='Project'  or assessmentSubType= 'Quiz')");

            $sanitizeCourseCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($courseCode, 'string'));
            $sanitizeSectionCode = FormValidator::sanitizeUserInput($sectionCode, 'int');
            $prepareStatementSearchQuery->bind_param('is', $sanitizeSectionCode, $sanitizeCourseCode);
            if ($prepareStatementSearchQuery->execute()) {
                $result = $prepareStatementSearchQuery->get_result();
                if (mysqli_num_rows($result) > 0) {
                    $hasPreAssessment = true;
                    break;
                }
            }
        }
//                echo "size :" . mysqli_num_rows($result) . " " . $sectionCode . "  " . $courseCode . "<br><br>";
        return $hasPreAssessment;
    }
}