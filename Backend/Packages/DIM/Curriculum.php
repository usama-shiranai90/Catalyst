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
        $sql = /** @lang text */
            "select b.curriculumCode , curriculumYear from section join semester s on section.semesterCode = s.semesterCode join
             batch b on b.batchCode = s.batchCode join curriculum c on b.curriculumCode = c.curriculumCode where sectionCode =\"$sectionCode\";";
        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->setCurriculumCode($row['curriculumCode']);
            }
        } else {
            echo "No Curriculum exist";
        }
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
        } else
            echo "No Curriculum code found" . $this->curriculumCode . '';

        return $this->listOfPLOs;
    }


    public function getPreviousFewCurriculumYear($hasLimit): ?array
    {
        $curriculumYearList = array();
        $format = "desc limit 4";
        if (!$hasLimit)
            $format = "";

        $sql = /** @lang text */
            "select * from curriculum order by curriculumCode $format ";

        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp = array(
                    "code" => $row['curriculumCode'],
                    "year" => $row['curriculumYear'],
                    "date" => $row['dateCreated']
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