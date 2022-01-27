<?php
include "PLO.php";

class Curriculum
{

    protected $curriculumID;
    protected $curriculumyear;
    protected $databaseConnection;
    protected $listOfPLOs;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton::getConnection();
        $this->listOfPLOs = array();
    }

    public function fetchCurriculumID($sectionCode)
    {
        $sql = /** @lang text */
            "select b.curriculumCode , curriculumYear from section join catalyst.semester s on section.semesterCode = s.semesterCode join
             batch b on b.batchCode = s.batchCode join curriculum c on b.curriculumCode = c.curriculumCode where sectionCode =" . $sectionCode . ";";
        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->setCurriculumID($row['curriculumCode']);
//                echo " is this then ? ".$this->curriculumID.'          ' .$sectionCode . '            '.$row['curriculumYear'];
            }
        } else {
            echo "No Curriculum exist";
        }
    }

    public function retrievePLOsList(): array
    {
        $sql = /** @lang text */
            "select  PLOCode,ploName, ploDescription from plo p where p.curriculumCode =\"$this->curriculumID\";";

        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $plo = new PLO();
                $plo->setPloCode($row['PLOCode']);
                $plo->setPloName($row['ploName']);
                $plo->setPloDescription($row['ploDescription']);
                $this->listOfPLOs[] = array($plo->getPloCode(),$plo->getPloName(), $plo->getPloDescription());
            }
        } else
            echo "No xxxxxxxxxx found".$this->curriculumID.' the fuck';

        return $this->listOfPLOs;
    }

    public function getCurriculumID()
    {
        return $this->curriculumID;
    }

    public function setCurriculumID($curriculumID): void
    {
        $this->curriculumID = $curriculumID;
    }


}