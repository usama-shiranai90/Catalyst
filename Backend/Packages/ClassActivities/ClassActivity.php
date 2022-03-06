<?php

class ClassActivity
{
    protected $databaseConnection;

    protected $activityCode;
    protected $activityType;
    protected $activitySubType;
    protected $topic;
    protected $title;
    protected $totalMarks;
    protected $weightage;
    protected $numberOfQuestions;
    protected $listOfQuestions;
    protected $listOfMappedCLOs;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $this->listOfQuestions = array();
        $this->listOfMappedCLOs = array();
    }

    public function getActivityCode()
    {
        return $this->activityCode;
    }

    public function setActivityCode($activityCode): void
    {
        $this->activityCode = $activityCode;
    }

    public function getActivityType()
    {
        return $this->activityType;
    }

    public function setActivityType($activityType): void
    {
        $this->activityType = $activityType;
    }

    public function getActivitySubType()
    {
        return $this->activitySubType;
    }

    public function setActivitySubType($activitySubType): void
    {
        $this->activitySubType = $activitySubType;
    }


    public function getTopic()
    {
        return $this->topic;
    }

    public function setTopic($topic): void
    {
        $this->topic = $topic;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getTotalMarks()
    {
        return $this->totalMarks;
    }

    public function setTotalMarks($totalMarks): void
    {
        $this->totalMarks = $totalMarks;
    }

    public function getWeightage()
    {
        return $this->weightage;
    }

    public function setWeightage($weightage): void
    {
        $this->weightage = $weightage;
    }

    public function getNumberOfQuestions()
    {
        return $this->numberOfQuestions;
    }

    public function setNumberOfQuestions($numberOfQuestions): void
    {
        $this->numberOfQuestions = $numberOfQuestions;
    }

    public function getListOfMappedCLOs(): array
    {
        return $this->listOfMappedCLOs;
    }

    public function setListOfMappedCLOs(array $listOfMappedCLOs): void
    {
        $this->listOfMappedCLOs = $listOfMappedCLOs;
    }

    public function getActivity($activityCode): ?ClassActivity
    {
        $sql = /** @lang text */
            "select * from assessment where assessmentCode = \"$activityCode\"";

        $result = $this->databaseConnection->query($sql);


        $newclassActivity = new ClassActivity();
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $newclassActivity->activityCode = $row['assessmentCode'];
                $newclassActivity->activitySubType = $row['assessmentSubType'];
                $newclassActivity->topic = $row['topic'];
                $newclassActivity->title = $row['title'];
                $newclassActivity->totalMarks = $row['totalMarks'];
                $newclassActivity->weightage = $row['weightage'];
                $newclassActivity->numberOfQuestions = $row['numberOfQuestions'];
                $newclassActivity->listOfQuestions = $this->getActivityQuestionsData($row['assessmentCode']);
                $newclassActivity->listOfMappedCLOs = $this->retrieveCLOList($row['assessmentCode']);
            }
            return $newclassActivity;
        } else {
            echo "No activity found with activityCode: " . $activityCode;
            return null;
        }
    }

    public function getActivityQuestionsData($activityCode): ?array
    {
        $sql = /** @lang text */
            "select questionCode, detail, totalQuestionMarks, cloCode from assessmentquestion where assessmentCode = \"$activityCode\"";

        $result = $this->databaseConnection->query($sql);

        $listOfQuestions = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                /*                $newSessional = new Sessional();
                                $newSessional->activityCode = $row['assessmentCode'];
                                $newSessional->topic = $row['topic'];
                                $newSessional->title = $row['title'];
                                $newSessional->totalMarks = $row['totalMarks'];
                                $newSessional->weightage = $row['weightage'];
                                $newSessional->numberOfQuestions = $row['numberOfQuestions'];*/
                $question = array();
                array_push($question, $row['questionCode']);
                array_push($question, $row['detail']);
                array_push($question, $row['totalQuestionMarks']);

                $clo = new CLO();
                $cloName = $clo->retrieveCloName($row['cloCode']);
                array_push($question, $cloName);

                array_push($listOfQuestions, $question);
            }
            return $listOfQuestions;
        } else {
            echo "No questions found with sessionalCode: " . $activityCode;
            return null;
        }
    }

    public function retrieveCLOList($activityCode): ?array
    {
        $sql = /** @lang text */
            "select cloCode from assessmentquestion where assessmentCode = \"$activityCode\"";

        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {
            $cloList = array();
            while ($row = $result->fetch_assoc()) {
                $clo = new CLO();
                $cloName = $clo->retrieveCloName($row['cloCode']);
                array_push($cloList, $cloName);
            }
            return $cloList;
        } else {
            echo "No CLOs found with activityCode: " . $activityCode;
            return null;
        }

    }

    public function createActivity($activity, $sectionCode, $courseCode): bool
    {
        $createdSuccessfully = false;

        $sql = /** @lang text */
            "INSERT INTO assessment (sectionCode, courseCode, assessmentType, assessmentSubType, title, totalMarks, weightage, numberOfQuestions, topic)
            VALUES (\"$sectionCode\", \"$courseCode\", \"$activity->activityType\", \"$activity->activitySubType\", \"$activity->title\", \"$activity->totalMarks\", \"$activity->weightage\", \"$activity->numberOfQuestions\", \"$activity->topic\");";

        if ($this->databaseConnection->query($sql) === TRUE) {
//            echo "New record created successfully";
        } else {
            echo "Error inserting sessional: " . $sql . "<br>" . $this->databaseConnection->error;
            $createdSuccessfully = false;
        }

        $sql2 = /** @lang text */
            "select assessmentCode from assessment order by assessmentCode desc limit 1;";

        $result = $this->databaseConnection->query($sql2);

        $insertedAssessmentCode = 0;
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $insertedAssessmentCode = $row['assessmentCode'];
            }

        } else {
            echo "No assessmentCode found with sectionCode: " . $sectionCode . " and courseCode: " . $courseCode;
            $createdSuccessfully = false;
        }

        foreach ($activity->getListOfQuestions() as $question) {
            $detail = $question['Detail'];
            $marks = $question['Marks'];
            $CLO = $question['CLO'];
            $sql1 = /** @lang text */
                "INSERT INTO assessmentquestion (assessmentCode, detail, totalQuestionMarks,cloCode)
                VALUES (\"$insertedAssessmentCode\", \"$detail\", \"$marks\", \"$CLO\")";

            if ($this->databaseConnection->query($sql1) === TRUE) {
                echo "New questions for sessional created successfully";
                $createdSuccessfully = true;
            } else {
                echo "Error inserting sessional questions: " . $sql . "<br>" . $this->databaseConnection->error;
                $createdSuccessfully = false;
            }
        }
        return $createdSuccessfully;
    }

    //    Returns a single activity

    public function updateActivity($activityID, $activityData, $activityQuestions, $actionToPerform)
    {

        $sql1 = /** @lang text */
            "UPDATE assessment SET topic = \"$activityData[0]\", title = \"$activityData[1]\", 
                totalMarks = \"$activityData[2]\", weightage = \"$activityData[3]\", 
                numberOfQuestions = \"$activityData[4]\" WHERE assessmentCode = \"$activityID\"";

        if ($this->databaseConnection->query($sql1) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating activity with activityCode: " . $this->databaseConnection->error;
        }


//        /************************ Getting previously added question marks *******************************/
//            $previousQuestionMarks = array();
//
//            $sql1 = /** @lang text */
//                "select totalQuestionMarks from assessmentquestion where assessmentCode = \"$activityID\"";
//
//            $result = $this->databaseConnection->query($sql1);
//
//            if (mysqli_num_rows($result) > 0) {
//                while ($row = $result->fetch_assoc()) {
//                    array_push($previousQuestionMarks, $row['totalQuestionMarks']);
//                }
//            } else {
//                echo "No previous question marks found for assessment Code: " . $activityID;
//            }

        $sql3 = /** @lang text */
            "delete from assessmentstudentmarks where assessmentCode = \"$activityID\"";

        if ($this->databaseConnection->query($sql3) === TRUE) {
            echo "Total marks deleted successfully";
        } else {
            echo "Error deleting total marks for activity: " . $activityID . "******" . $sql3 . "<br>" . $this->databaseConnection->error;
        }

        $activityQuestionsCodes = array();

        $sql1 = /** @lang text */
            "select  questionCode from assessmentquestion where assessmentCode = \"$activityID\"";

        $result = $this->databaseConnection->query($sql1);

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($activityQuestionsCodes, $row['questionCode']);
            }
        } else {
            echo "No question codes found for assessment Code: " . $activityID;
        }

        /******************** Deleting student marks ************************/

        for ($i = 0; $i < sizeof($activityQuestionsCodes); $i++) {
            $sql = /** @lang text */
                "delete  from assessmentquestionstudentmarks where questionCode = \"$activityQuestionsCodes[$i]\"";
            if ($this->databaseConnection->query($sql) === TRUE) {
                echo "Marks entered successfully";
                $insertedSuccessfully = true;
            } else {
                echo "Error inserting marks for activity: " . $activityID . "******" . $sql . "<br>" . $this->databaseConnection->error;
                $insertedSuccessfully = false;
            }
        }


        if ($actionToPerform == "Update") {

            foreach ($activityQuestions as $question) {

                $sql2 = /** @lang text */
                    "UPDATE assessmentquestion SET detail = \"$question[1]\", totalQuestionMarks = \"$question[2]\",
                 cloCode = \"$question[3]\" WHERE questionCode = \"$question[0]\"";

                if ($this->databaseConnection->query($sql2) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating activity with activityCode: " . $this->databaseConnection->error;
                }
            }
        } elseif ($actionToPerform == "Insert") {
            foreach ($activityQuestions as $question) {

                $sql2 = /** @lang text */
                    "INSERT INTO assessmentquestion (assessmentCode,  detail, totalQuestionMarks, cloCode) 
                    VALUES (\"$activityID\", \"$question[1]\", \"$question[2]\", \"$question[3]\")";

                if ($this->databaseConnection->query($sql2) === TRUE) {
                    echo "New Questions Inserted Successfully";
                } else {
                    echo "Error updating activity with activityCode: " . $activityID . $this->databaseConnection->error;
                }
            }
        } elseif ($actionToPerform == "Delete") {
//            For this part, I only passes IDs to the activityQuestions array;

            $IDsOfQuestionsToDelete = $activityQuestions;
            foreach ($IDsOfQuestionsToDelete as $questionID) {

                $sql2 = /** @lang text */
                    "DELETE FROM assessmentquestion WHERE questionCode = \"$questionID\"";

                if ($this->databaseConnection->query($sql2) === TRUE) {
                    echo "Question Deleted Successfully<br>";
                } else {
                    echo "Error updating activity with activityCode: " . $activityID . $this->databaseConnection->error;
                }
            }
        }

    }

    public function deleteActivity($activityCode)
    {
        $sql = /** @lang text */
            "delete from assessment where assessmentCode = \"$activityCode\"";

        $result = $this->databaseConnection->query($sql);

        if ($result === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record for sessional: " . $this->databaseConnection->error;
        }
    }

    public function getLatestActivityCode()
    {
        $sql1 = /** @lang text */
            "select assessmentCode from assessment order by assessmentCode desc limit 1";

        $result = $this->databaseConnection->query($sql1);
        $latestActivityCode = 0;
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $latestActivityCode = $row['assessmentCode'];
            }
        } else {
            echo "Error while finding latest activity code:";
        }
        return $latestActivityCode;
    }

    public function enterStudentMarksForActivity($studentRegNumber, $activityCode, $obtainedQuestionMarks): bool
    {
        $insertedSuccessfully = false;

        /************************************** Getting Question Codes for the activity**************************************/
        $activityQuestionsCodes = array();

        $sql1 = /** @lang text */
            "select  questionCode from assessmentquestion where assessmentCode = \"$activityCode\"";

        $result = $this->databaseConnection->query($sql1);

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($activityQuestionsCodes, $row['questionCode']);
            }
        } else {
            echo "No question codes found for assessment Code: " . $activityCode;
            $insertedSuccessfully = false;
        }

        /************************************* Inserting marks for questions *******************************/

        for ($i = 0; $i < sizeof($activityQuestionsCodes); $i++) {
            $index = "question" . ($i + 1);
            $sql = /** @lang text */
                "INSERT INTO assessmentquestionstudentmarks (studentRegCode, questionCode, obtainedMarks)
                VALUES (\"$studentRegNumber\", \"$activityQuestionsCodes[$i]\", \"$obtainedQuestionMarks[$index]\")";

            if ($this->databaseConnection->query($sql) === TRUE) {
                echo "Marks entered successfully";
                $insertedSuccessfully = true;
            } else {
                echo "Error inserting marks for activity: " . $activityCode . "******" . $sql . "<br>" . $this->databaseConnection->error;
                $insertedSuccessfully = false;
            }
        }

        /************************************************ Inserting total activity marks ******************************************/

        $sql3 = /** @lang text */
            "insert into assessmentstudentmarks (studentRegCode, assessmentCode, totalObtainedMarks) 
            values (\"$studentRegNumber\",$activityCode, (select SUM(obtainedMarks) from assessmentquestionstudentmarks 
            join assessmentquestion a on a.questionCode = assessmentquestionstudentmarks.questionCode 
            where studentRegCode = \"$studentRegNumber\" and assessmentCode = \"$activityCode\"));";

        if ($this->databaseConnection->query($sql3) === TRUE) {
            echo "Total marks obtained in activity inserted successfully";
            $insertedSuccessfully = true;
        } else {
            echo "Error inserting marks for activity: " . $activityCode . "******" . $sql3 . "<br>" . $this->databaseConnection->error;
            $insertedSuccessfully = false;
        }

        return $insertedSuccessfully;
    }

    public function getStudentMarksInActivity($activityCode, $studentRegNumber)
    {
        $obtainedMarksOfQuestions = array();

        $activityQuestionsCodes = array();

        $sql1 = /** @lang text */
            "select questionCode from assessmentquestion where assessmentCode = \"$activityCode\"";

        $result = $this->databaseConnection->query($sql1);

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($activityQuestionsCodes, $row['questionCode']);
            }
        } else {
            echo "No question codes found for assessment Code: " . $activityCode;
        }

        /********************************** Getting Marks obtained in Questions *********************************/

        for ($i = 0; $i < sizeof($activityQuestionsCodes); $i++) {
            $sql = /** @lang text */
                "select obtainedMarks from assessmentquestionstudentmarks where questionCode = \"$activityQuestionsCodes[$i]\" and studentRegCode = \"$studentRegNumber\"";
            $result = $this->databaseConnection->query($sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($obtainedMarksOfQuestions, $row['obtainedMarks']);
                }
            } elseif (mysqli_num_rows($result) == 0) {
                array_push($obtainedMarksOfQuestions, "0");
            } else {
                echo "Error finding marks for activity: " . $activityCode . "******" . $sql . "<br>" . $this->databaseConnection->error;
            }
        }
        return $obtainedMarksOfQuestions;
    }

    /** OneEyeOwl */
    public function getSelectedAssessment($assessmentCode, $sectionCode, $courseCode): array
    {
        $sql = /** @lang text */
            "select a2.studentRegCode , a.topic , a.totalMarks , a2.totalObtainedMarks from assessment as a join assessmentstudentmarks 
            a2 on a.assessmentCode = a2.assessmentCode where a.assessmentCode= \"$assessmentCode\" and a.sectionCode = \"$sectionCode\" and a.courseCode = \"$courseCode\" ";

        $studentsAssessmentArrayList = array();
        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $studentRegCode = $row['studentRegCode'];
                $studentsAssessment = new StudentAssessmentAverage();
                $studentsAssessment->setStudentRegistrationNo($studentRegCode);
                $studentsAssessment->setTopicDescription($row['topic']);
                $studentsAssessment->setAssessmentTotalMarks($row['totalMarks']);
                $studentsAssessment->setAssessmentObtainMarks($row['totalObtainedMarks']);
                $studentsAssessment->setAssessmentQuestionsList(array());

                // for each Student respective questions with marks.
                $sql_statement_second = /** @lang text */
                    "select * from assessmentquestion as aq join assessmentquestionstudentmarks a on aq.questionCode = a.questionCode 
                    where a.studentRegCode = \"$studentRegCode\" and aq.assessmentCode = \"$assessmentCode\";";
                $result_second = $this->databaseConnection->query($sql_statement_second);
                if (mysqli_num_rows($result_second) > 0) {
                    $counter = 1;
                    while ($innerRow = $result_second->fetch_assoc()) {
                        $questions = new AssessmentQuestion();
                        $questions->setQuestionCode($innerRow['questionCode']);
                        $questions->setQuestionNo('Question ' . $counter); // generate order of sequence.
                        $questions->setQuestionDetail($innerRow['detail']);
                        $questions->setQuestionTotalMarks($innerRow['totalQuestionMarks']);
                        $questions->setRespectiveCLO($innerRow['cloCode']);
                        $questions->setQuestionAchieveMarks($innerRow['obtainedMarks']);
                        $percentage = number_format((float)($innerRow['obtainedMarks'] / $innerRow['totalQuestionMarks'] * 100), 2, '.', '');  // Outputs -> 105.00
                        $questions->setQuestionAchievePercentage($percentage . " %");
                        $studentsAssessment->assessmentQuestionsList[] = $questions;
                        ++$counter;
//                        return array($studentsAssessment->getAssessmentQuestionsList() ,  $studentsAssessment ,  $questions);
                    }
                }
                /*                else{
                                    return array($studentRegCode , $assessmentCode , mysqli_num_rows($result_second));
                                }*/
                $studentsAssessmentArrayList[] = $studentsAssessment;
            }
        }

        return $studentsAssessmentArrayList;
    }

    public function getLatestCourseSpecificAssessment($sectionCode, $courseCode): ?ClassActivity
    {
        $storeAssessmentCode = 0;
        $counter = 1;
        $activity = new ClassActivity();
        $sql = /** @lang text */
            "select * from assessment where sectionCode = \"$sectionCode\"  and courseCode = \"$courseCode\" order by assessmentCode desc limit 1;";

        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $storeAssessmentCode = $row['assessmentCode'];
                $activity->setActivityType($row['assessmentType']);
                $activity->setActivitySubType($row['assessmentSubType']);
                $activity->setTitle($row['title']);
                $activity->setWeightage($row['weightage']);
                $activity->setTopic($row['topic']);
                $activity->setListOfQuestions(array());

                $statement_second = /** @lang text */
                    "select questionCode , c.cloName , detail , totalMarks
                     from assessment as a join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode join clo c on a2.cloCode = c.CLOCode where
                     sectionCode = \"$sectionCode\" and a.courseCode = \"$courseCode\" and a.assessmentCode = \"$storeAssessmentCode\" ";

                $result_second = $this->databaseConnection->query($statement_second);
                if (!empty(mysqli_num_rows($result)) && mysqli_num_rows($result) > 0) {
                    while ($r = $result_second->fetch_assoc()) {
                        $temp = array(
                            "questionNo" => 'Question ' . $counter,
                            "questionDetail" => $r['detail'],
                            "questionClo" => $r['cloName']
                        );
                        $activity->listOfQuestions[] = $temp;
                        $counter++;
                    }
                } else {
                    echo "exuse me " . $sectionCode . "    " . $courseCode . "      " . $storeAssessmentCode;
                }
                break;
            }
            return $activity;
        } else {
            echo "No assessmentCode found with sectionCode: " . $sectionCode . " and courseCode: " . $courseCode;
            return null;
        }
    }

    public function getListOfQuestions(): array
    {
        return $this->listOfQuestions;
    }

    public function setListOfQuestions(array $listOfQuestions): void
    {
        $this->listOfQuestions = $listOfQuestions;
    }

    public function updateStudentMarksInActivity($studentRegNumber, $activityCode, $obtainedQuestionMarks)
    {

//        Works for a single student

        $updatedSuccessfully = false;

        /************************************** Getting Question Codes **************************************/
        $activityQuestionsCodes = array();

        $sql1 = /** @lang text */
            "select questionCode from assessmentquestion where assessmentCode = \"$activityCode\"";

        $result = $this->databaseConnection->query($sql1);

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($activityQuestionsCodes, $row['questionCode']);
            }
        } else {
            echo "No question codes found for assessment Code: " . $activityCode;
            $updatedSuccessfully = false;
        }

        /************************************ Checking if marks already exist **********************************/
        $marksExist = false;

        $sql1 = /** @lang text */
            "select totalObtainedMarks from assessmentstudentmarks where assessmentCode = \"$activityCode\" and 
            studentRegCode = \"$studentRegNumber\"";

        $result = $this->databaseConnection->query($sql1);

        if (mysqli_num_rows($result) > 0) {
            $marksExist = true;
        } else {
            $marksExist = false;
        }

        if ($marksExist == false) {

            /************************************* Inserting marks for questions *******************************/

            for ($i = 0; $i < sizeof($activityQuestionsCodes); $i++) {
                $index = "question" . ($i + 1);
                $sql = /** @lang text */
                    "INSERT INTO assessmentquestionstudentmarks (studentRegCode, questionCode, obtainedMarks)
                VALUES (\"$studentRegNumber\", \"$activityQuestionsCodes[$i]\", \"$obtainedQuestionMarks[$index]\")";

                if ($this->databaseConnection->query($sql) === TRUE) {
                    echo "Marks entered successfully for student " . $studentRegNumber;
                    $insertedSuccessfully = true;
                } else {
                    echo "Error inserting marks for activity: " . $activityCode . "******" . $sql . "<br>" . $this->databaseConnection->error;
                    $insertedSuccessfully = false;
                }
            }

            /************************************************ Inserting total activity marks ******************************************/

            $sql3 = /** @lang text */
                "insert into assessmentstudentmarks (studentRegCode, assessmentCode, totalObtainedMarks) 
            values (\"$studentRegNumber\",$activityCode, (select SUM(obtainedMarks) from assessmentquestionstudentmarks 
            join assessmentquestion a on a.questionCode = assessmentquestionstudentmarks.questionCode 
            where studentRegCode = \"$studentRegNumber\" and assessmentCode = \"$activityCode\"));";

            if ($this->databaseConnection->query($sql3) === TRUE) {
                echo "Total marks obtained in activity inserted successfully";
                $insertedSuccessfully = true;
            } else {
//            echo "Error inserting marks for activity: " . $activityCode . "******" . $sql3 . "<br>" . $this->databaseConnection->error;
                echo "Error inserting marks for activity: " . $activityCode . "****** Student ***" . $studentRegNumber;
                $insertedSuccessfully = false;
            }


        } elseif ($marksExist == true) {
            /***************************** Updating marks obtained for questions ****************************/

            for ($i = 0; $i < sizeof($activityQuestionsCodes); $i++) {
                $index = "question" . ($i + 1);
                $sql = /** @lang text */
                    "UPDATE assessmentquestionstudentmarks SET obtainedMarks = \"$obtainedQuestionMarks[$index]\" 
                WHERE studentRegCode = \"$studentRegNumber\" AND questionCode = \"$activityQuestionsCodes[$i]\"";

                if ($this->databaseConnection->query($sql) === TRUE) {
                    echo "Marks updated successfully";
                    $insertedSuccessfully = true;
                } else {
                    echo "Error updating marks for activity: " . $activityCode . "******" . $sql . "<br>" . $this->databaseConnection->error;
                    $insertedSuccessfully = false;
                }
            }


            /************************************************ Updating total activity marks ******************************************/

            $sql3 = /** @lang text */
                "update assessmentstudentmarks set totalObtainedMarks = (select SUM(obtainedMarks) from assessmentquestionstudentmarks 
                join assessmentquestion a on a.questionCode = assessmentquestionstudentmarks.questionCode 
                where studentRegCode = \"$studentRegNumber\" and assessmentCode = \"$activityCode\") 
                where assessmentCode = \"$activityCode\" and studentRegCode = \"$studentRegNumber\";";

            if ($this->databaseConnection->query($sql3) === TRUE) {
                echo "Total marks obtained in activity inserted successfully";
                $insertedSuccessfully = true;
            } else {
//            echo "Error inserting marks for activity: " . $activityCode . "******" . $sql3 . "<br>" . $this->databaseConnection->error;
                echo "Error inserting marks for activity: " . $activityCode . "****** Student ***" . $studentRegNumber;
                $insertedSuccessfully = false;
            }
        }
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.

        return "Topic :" . $this->topic . "<br>" .
            "title :" . $this->title . "<br>" .
            "total marks :" . $this->totalMarks . "<br>" .
            "weightage :" . $this->weightage . "<br>" .
            "numberOfQuestion :" . $this->numberOfQuestions . "<br>" .
            "list of questions:" . json_encode($this->listOfQuestions) . "<br>" .
            "list of Mapped CLOs:" . json_encode($this->listOfMappedCLOs) . "<br>";
    }


}