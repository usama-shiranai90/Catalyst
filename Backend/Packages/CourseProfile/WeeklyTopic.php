<?php

//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
use JetBrains\PhpStorm\ArrayShape;

require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";

class WeeklyTopic
{
    protected $weekCode;
    protected $weekNo;
    protected $weekDescription;
    protected $weekAssessment;
    protected $weekCLOList;  // saved per week assigned CLOs.
    protected $databaseConnection;

    public function __construct()
    {
        $this->weekCode = '';
        $this->weekNo = '';
        $this->weekDescription = '';
        $this->weekAssessment = '';
        $this->weekCLOList = array();
        $this->databaseConnection = DatabaseSingleton::getConnection();
    }


    public function createWeeklyTopic($courseProfileCode, $arrayWeeklyTopic): ?array
    {
        $failedToCreateTopic = array("weeklyTopic" => 0, "respectiveOutcome" => 0); // if -1 failed , 1 successful.
        foreach ($arrayWeeklyTopic as $key => $value) {
            $weekTopicCode = '';
            $weekNo = $value[0];
            $description = $value[1];
            $assessment = $value[2];
            $weeklyTopicCourseOutcomeList = $value[3];

            $prepareStatementInsertionQuery = $this->databaseConnection->prepare(query: "insert into weeklytopics(courseProfileCode, weeklyNo, topicDetail, assessmentCriteria , modifiedDate) 
                        VALUES (? ,? ,? ,? , NOW() );");

            $sanitizeCourseProfileCode = FormValidator::sanitizeUserInput($courseProfileCode, 'int');
            $sanitizeWeekNumber = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($weekNo, 'string'));
            $sanitizeWeekDescription = FormValidator::sanitizeStringWithSpace(FormValidator::sanitizeUserInput($description, 'string'));
            $sanitizeWeekAssessment = FormValidator::sanitizeStringWithSpace(FormValidator::sanitizeUserInput($assessment, 'string'));

            $prepareStatementInsertionQuery->bind_param('isss', $sanitizeCourseProfileCode, $sanitizeWeekNumber, $sanitizeWeekDescription, $sanitizeWeekAssessment);
            if ($prepareStatementInsertionQuery->execute()) {
                $weekTopicCode = (int)$this->databaseConnection->insert_id;
                $failedToCreateTopic['weeklyTopic'] = 1;
            } else
                $failedToCreateTopic['weeklyTopic'] = -1;

            foreach ($weeklyTopicCourseOutcomeList as $cloCode) {
                $prepareStatementInsertionQuery = $this->databaseConnection->prepare(query: "insert into weeklytopicclo(weeklyTopicCode, CLOCode) values  (? , ? );");
                $prepareStatementInsertionQuery->bind_param('ii', $weekTopicCode, $cloCode);
                if ($prepareStatementInsertionQuery->execute())
                    $failedToCreateTopic['respectiveOutcome'] = 1;
                else
                    $failedToCreateTopic['respectiveOutcome'] = -1;

            }
        }
        return $failedToCreateTopic;
    }

    public function deleteWeeklyTopicRecord($weeklyCode, $courseProfileID): bool
    {
        $sql = /** @lang text */
            "delete from weeklytopics where courseProfileCode = \"$courseProfileID\" and weeklyTopicCode =\"$weeklyCode\" ";

        $result = $this->databaseConnection->query($sql);
        return $result === TRUE;
    }

    public function deleteWeeklyTopicClosRecord($weeklyCode): bool
    {
        $sql = /** @lang text */
            "delete from weeklytopicclo where weeklyTopicCode = \"$weeklyCode\"";

        $result = $this->databaseConnection->query($sql);
        return $result === TRUE;
    }


    public function updateWeeklyTopicRecord($courseProfileCode, $weeklyID, $weeklyRowData): array
    {
        $failedToUpdateTopic = array("weeklyTopic" => 1, "respectiveOutcome" => 0);

        $weekNo = $weeklyRowData[0];
        $description = $weeklyRowData[1];
        $assessment = $weeklyRowData[2];

        $weeklyTopicCourseOutcomeList = $weeklyRowData[3];
        $prepareStatementUpdateQuery = $this->databaseConnection->prepare(query: "update weeklytopics set weeklyNo = ?,topicDetail = ?,assessmentCriteria =  ? ,
                        modifiedDate = NOW() where  courseProfileCode =? and weeklyTopicCode = ?  ");

        $sanitizeCourseProfileCode = FormValidator::sanitizeUserInput($courseProfileCode, 'int');
        $sanitizeWeekNumber = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($weekNo, 'string'));
        $sanitizeWeekDescription = FormValidator::sanitizeStringWithSpace(FormValidator::sanitizeUserInput($description, 'string'));
        $sanitizeWeekAssessment = FormValidator::sanitizeStringWithSpace(FormValidator::sanitizeUserInput($assessment, 'string'));

        $prepareStatementUpdateQuery->bind_param('sssii', $sanitizeWeekNumber, $sanitizeWeekDescription, $sanitizeWeekAssessment, $sanitizeCourseProfileCode, $weeklyID);

        if (!$prepareStatementUpdateQuery->execute()) {
            $failedToUpdateTopic['weeklyTopic'] = -1;
        }

        if ($weeklyTopicCourseOutcomeList ?? null)
            foreach ($weeklyRowData[3] as $clo_id) {
                $prepareStatementInsertionQuery_2 = $this->databaseConnection->prepare(query: "insert into weeklytopicclo(weeklyTopicCode, CLOCode) values (? , ?) ;");

                $prepareStatementInsertionQuery_2->bind_param('ii', $weeklyID, $clo_id);
                if ($prepareStatementInsertionQuery_2->execute())
                    $failedToUpdateTopic['respectiveOutcome'] = 1;
                else
                    $failedToUpdateTopic['respectiveOutcome'] = -1;
            }

        return $failedToUpdateTopic;
    }


    public function retrieveWeeklyTopic($courseProfileCode): array
    {
        $weeklyTopicListArray = array();
        $sql = /** @lang text */
            "select weeklyTopicCode , weeklyNo , topicDetail , assessmentCriteria , modifiedDate
            from weeklytopics where courseProfileCode = \"$courseProfileCode\";";

        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $weekCLOList = array();
                $w_id = (int)$row['weeklyTopicCode'];

                $statmentSecond = /** @lang text */
                    "select weeklyTopicCode, c.CLOCode, c.cloName from weeklytopicclo join clo c 
                     on c.CLOCode = weeklytopicclo.CLOCode where weeklyTopicCode = \"$w_id\";";
                $result2 = $this->databaseConnection->query($statmentSecond);
                if (!empty(mysqli_num_rows($result2)) && mysqli_num_rows($result2) > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
//                        if ($currentweek != $row2["weeklyTopicCode"]) {
//                            $currentweek = $row2["weeklyTopicCode"];
//                        $weekCLOList[] = $row2['CLOCode'];
                        $weekCLOList[] = $row2['cloName'];
//                        }
                    }
                }
                $weeklyTopicListArray[] = array($row['weeklyTopicCode'], $row['weeklyNo'], $row['topicDetail'], $weekCLOList, $row['assessmentCriteria'], $row['modifiedDate']);
            }
        } else
            echo "No Weekly Information:" . $this->databaseConnection->error;

//        print_r("what is the result" . json_encode($weeklyTopicListArray));

        return $weeklyTopicListArray;
    }


    public function retrieveLastInsertedWeeklyTopic($courseProfileCode): ?array
    {
        $soloWeeklyTopic = array();
        $prepareStatementSearchQuery = $this->databaseConnection->prepare('select weeklyTopicCode , weeklyNo , topicDetail , assessmentCriteria , modifiedDate from weeklytopics
               where courseProfileCode = ? order BY weeklyTopicCode desc limit 1 ;');

        $sanitizeCourseProfileCode = FormValidator::sanitizeUserInput($courseProfileCode, 'int');
        $prepareStatementSearchQuery->bind_param('i', $sanitizeCourseProfileCode);
        if ($prepareStatementSearchQuery->execute()) {
            $result = $prepareStatementSearchQuery->get_result();
            if (!empty(mysqli_num_rows($result)) && mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $weekCLOList = array();
                    $w_id = (int)$row['weeklyTopicCode'];

                    $prepareStatementSearchQuery_2 = $this->databaseConnection->prepare('select weeklyTopicCode, c.CLOCode, c.cloName from weeklytopicclo join clo c 
                     on c.CLOCode = weeklytopicclo.CLOCode where weeklyTopicCode = ?');

                    $prepareStatementSearchQuery_2->bind_param('i', $w_id);
                    if ($prepareStatementSearchQuery_2->execute()) {
                        $result = $prepareStatementSearchQuery_2->get_result();
                        if (!empty(mysqli_num_rows($result)) && mysqli_num_rows($result) > 0) {
                            while ($row2 = $result->fetch_assoc()) {
                                $weekCLOList[] = $row2['cloName'];
                            }
                        }
                    }
                    // add modifiedDate at the end of array.
                    array_push($soloWeeklyTopic, $row['weeklyNo'], $row['topicDetail'], $row['assessmentCriteria'], $weekCLOList);
                    return $soloWeeklyTopic;
                }
            }
        }

        return null;
    }

    /**
     * @return string
     */
    public function getWeekCode(): string
    {
        return $this->weekCode;
    }

    /**
     * @param string $weekCode
     */
    public function setWeekCode(string $weekCode): void
    {
        $this->weekCode = $weekCode;
    }

    /**
     * @return string
     */
    public function getWeekNo(): string
    {
        return $this->weekNo;
    }

    /**
     * @param string $weekNo
     */
    public function setWeekNo(string $weekNo): void
    {
        $this->weekNo = $weekNo;
    }

    /**
     * @return string
     */
    public function getWeekDescription(): string
    {
        return $this->weekDescription;
    }

    /**
     * @param string $weekDescription
     */
    public function setWeekDescription(string $weekDescription): void
    {
        $this->weekDescription = $weekDescription;
    }

    /**
     * @return string
     */
    public function getWeekAssessment(): string
    {
        return $this->weekAssessment;
    }

    /**
     * @param string $weekAssessment
     */
    public function setWeekAssessment(string $weekAssessment): void
    {
        $this->weekAssessment = $weekAssessment;
    }

    /**
     * @return array
     */
    public function getWeekCLOList(): array
    {
        return $this->weekCLOList;
    }

    /**
     * @param array $weekCLOList
     */
    public function setWeekCLOList(array $weekCLOList): void
    {
        $this->weekCLOList = $weekCLOList;
    }

    /**
     * @return mysqli|void|null
     */
    public function getDatabaseConnection(): ?mysqli
    {
        return $this->databaseConnection;
    }


}