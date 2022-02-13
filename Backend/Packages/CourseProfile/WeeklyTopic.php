<?php

include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";

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


    public function createWeeklyTopic($courseProfileCode, $arrayWeeklyTopic)
    {
        foreach ($arrayWeeklyTopic as $key => $value) {
            $weekID = '';
            $weekNo = $value[0];
            $description = $value[1];
            $assessment = $value[2];

            $sql_statement = /** @lang text */
                "insert into weeklytopics(courseProfileCode, weeklyNo, topicDetail, assessmentCriteria) 
                        VALUES (\"$courseProfileCode\",\"$weekNo\",\"$description\",\"$assessment\")";

            $result = $this->databaseConnection->query($sql_statement);
            if ($result) {
                $weekID = (int)$this->databaseConnection->insert_id;
                echo "New record has been added successfully !";
            } else
                echo "Error on the wall" . $this->databaseConnection->error;

            foreach ($value[3] as $clo_id) {
                $sql_statement1 = /** @lang text */
                    "insert into weeklytopicclo(weeklyTopicCode, CLOCode) values
                    (\"$weekID\",\"$clo_id\")";

                $result1 = $this->databaseConnection->query($sql_statement1);
                if (!$result1)
                    echo "Weekly Row Clos not created" . $this->databaseConnection->error . "   " . $clo_id . "   " . $weekID;
                else
                    echo "Checking if data of Weekly row is created : ". $clo_id . "   " . $weekID;
            }

        }

    }

    public function deleteWeeklyTopicRecord($weeklyCode, $courseProfileID)
    {
        $sql = /** @lang text */
            "delete from weeklytopics where courseProfileCode = \"$courseProfileID\" and weeklyTopicCode =\"$weeklyCode\" ";

        $result = $this->databaseConnection->query($sql);
        if ($result === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record from Weekly Record: " . $this->databaseConnection->error;
        }
    }

    public function deleteWeeklyTopicClosRecord($weeklyCode)
    {
        $sql = /** @lang text */
            "delete from weeklytopicclo where weeklyTopicCode = \"$weeklyCode\"";

        $result = $this->databaseConnection->query($sql);
        if ($result === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record from Weekly Allocated Clos Record: " . $this->databaseConnection->error;
        }
    }


    public function updateWeeklyTopicRecord($courseProfileID, $weeklyID, $weeklyRowData)
    {
        $weekNo = $weeklyRowData[0];
        $description = $weeklyRowData[1];
        $assessment = $weeklyRowData[2];


        $sql1 = /** @lang text */
            "update weeklytopics set weeklyNo = \"$weekNo\",topicDetail = \"$description\",assessmentCriteria =  \"$assessment\"
              where  courseProfileCode =\"$courseProfileID\" and weeklyTopicCode = \"$weeklyID\";";

        if ($this->databaseConnection->query($sql1) === TRUE) {
            echo " weekly topic updated";
        } else {
            echo "Error weekly topic updated : " . $this->databaseConnection->error . "<br>" . $weeklyRowData;
        }

        foreach ($weeklyRowData[3] as $clo_id) {
            $sql_statement1 = /** @lang text */
                "insert into weeklytopicclo(weeklyTopicCode, CLOCode) values
                    (\"$weeklyID\",\"$clo_id\")";

            $result1 = $this->databaseConnection->query($sql_statement1);
            if (!$result1)
                echo "Weekly Row Clos not created" . $this->databaseConnection->error . "   " . $clo_id . "   " . $weeklyID;
        }


    }


    public function retrieveWeeklyTopic($courseProfileCode): array
    {
        $weeklyTopicListArray = array();
        $sql = /** @lang text */
            "select weeklyTopicCode , weeklyNo , topicDetail , assessmentCriteria
            from weeklytopics where courseProfileCode = \"$courseProfileCode\";";

        $result = $this->databaseConnection->query($sql);
        if (!empty(mysqli_num_rows($result)) && mysqli_num_rows($result) > 0) {

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
                $weeklyTopicListArray[] = array($row['weeklyTopicCode'], $row['weeklyNo'], $row['topicDetail'], $weekCLOList, $row['assessmentCriteria']);
            }
        } else
            echo "No Weekly Information:" . $this->databaseConnection->error;

        print_r("what is the result" . json_encode($weeklyTopicListArray));

        return $weeklyTopicListArray;
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


}