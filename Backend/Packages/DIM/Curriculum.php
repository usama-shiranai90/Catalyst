<?php
include "PLO.php";

class Curriculum
{

    protected $curriculumCode;
    protected $curriculumyear;
    protected $databaseConnection;
    protected $listOfPLOs;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton::getConnection();
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->listOfPLOs = array();
    }


    /** S# creates new curriculum of a program.
     * if true created successfully.
     * if false not created.
     * programCode is must.
     */
    public function createCurriculum($programCode, $assignYear, $curriculumName): bool
    {
        $sql_statement = "insert into curriculum(curriculumYear, dateCreated , curriculumName) VALUE (\"$assignYear\" ,NOW() , \"$curriculumName\")";
        $result = $this->databaseConnection->query($sql_statement);
        if ($result) {
            $this->setCurriculumCode((int)$this->databaseConnection->insert_id);
            $sql_statement2 = /** @lang text */
                "insert into programcurriculum(programCode , curriculumCode) VALUE (\"$programCode\" , \"$this->curriculumCode\")";
            $result2 = $this->databaseConnection->query($sql_statement2);
            if ($result2)
                return true;
        }
        print $this->databaseConnection->error;
        return false;
    }

    public function fetchCurriculumID($sectionCode)
    {
        $prepareStatementSearchQuery = $this->databaseConnection->prepare('select b.curriculumCode , curriculumYear from section join semester s on section.semesterCode = s.semesterCode join
             batch b on b.batchCode = s.batchCode join curriculum c on b.curriculumCode = c.curriculumCode where sectionCode  = ? ;');

        $sanitizeSectionCode = FormValidator::sanitizeUserInput($sectionCode, 'int');
        $prepareStatementSearchQuery->bind_param('i', $sanitizeSectionCode);

        if ($prepareStatementSearchQuery->execute()) {
            $result = $prepareStatementSearchQuery->get_result();
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $this->setCurriculumCode($row['curriculumCode']);
                }
            }
        }

    }

    public function retrieveCurriculumList($programCode): ?array
    {
        $sql = /** @lang text */
            "select  p.programCode, p.curriculumCode,c.curriculumYear, c.dateCreated, c.curriculumName
            from curriculum c join programcurriculum p on c.curriculumCode = p.curriculumCode where programCode = \"$programCode\" ;";

        $result = $this->databaseConnection->query($sql);
        $curriculumList = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp = array(
                    'programCode' => $row['programCode'],
                    'curriculumCode' => $row['curriculumCode'],
                    'curriculumYear' => $row['curriculumYear'],
                    'curriculumName' => $row['curriculumName']
                );
                array_push($curriculumList, $temp);
            }
            return $curriculumList;
        } else
            echo "No curriculum found";
        return null;
    }

    public function retrieveEntireCurriculumList(): ?array
    {
        $sql = /** @lang text */
            "select  p.programCode, p.curriculumCode,c.curriculumYear, c.dateCreated, c.curriculumName
             from curriculum c join programcurriculum p on c.curriculumCode = p.curriculumCode group by programCode,curriculumName limit 10";

        $result = $this->databaseConnection->query($sql);
        $curriculumList = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp = array(
                    'programCode' => $row['programCode'],
                    'curriculumCode' => $row['curriculumCode'],
                    'curriculumYear' => $row['curriculumYear'],
                    'curriculumName' => $row['curriculumName']
                );
                array_push($curriculumList, $temp);
            }
            return $curriculumList;
        } else
            echo "No curriculum found";
        return null;
    }

    public function retrievePLOsList($programCode): array
    {
        $sql = /** @lang text */
            "select  PLOCode,ploName, ploDescription from plo p where p.curriculumCode =\"$this->curriculumCode\" and p.programCode =\" $programCode \" ;";

        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $plo = new PLO();
                $plo->setPloCode($row['PLOCode']);
                $plo->setPloName($row['ploName']);
                $plo->setPloDescription($row['ploDescription']);
                $this->listOfPLOs[] = array($plo->getPloCode(), $plo->getPloName(), $plo->getPloDescription());
            }
        }
//        else
//            echo "No Curriculum code found" . $this->curriculumCode . '';

        return $this->listOfPLOs;
    }


    /** S# function is used to fetch curriculum list .
     * if limit is true > get latest 4 years curriculum list.
     * if limit is false >  get all curriculum list.
     *  no record found = null.
     *  record found = array.
     */
    public function getPreviousCurriculumList($programCode, $hasLimit): ?array
    {
        $curriculumYearList = array();
        $format = "desc limit 4";
        if (!$hasLimit)
            $format = "";

        $sql = /** @lang text */
            "select * from curriculum join programcurriculum p on curriculum.curriculumCode = p.curriculumCode join program p2 on p.programCode = p2.programCode
             where p.programCode = \"$programCode\"
             order by curriculum.curriculumCode $format ";

        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp = array(
                    "code" => $row['curriculumCode'],
                    "year" => $row['curriculumYear'],
                    "date" => $row['dateCreated'],
                    "programSName" => $row['programShortName']
                );
                array_push($curriculumYearList, $temp);
            }
            return $curriculumYearList;
        } else
            return null;
    }

    public function getCurriculumCode()
    {
        return $this->curriculumCode;
    }

    public function setCurriculumCode($curriculumCode): void
    {
        $this->curriculumCode = $curriculumCode;
    }

}