<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\SearchUtil.php";

class PLO implements JsonSerializable
{

    protected $ploCode;
    protected $ploName = "";
    protected $ploDescription = "";

    protected $databaseConnection;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
    }

    public function createProgramOutcomeCurriculum($programCode, $curriculumId, $curriculumRelatedPloArray): bool
    {
        //   $curriculumRelatedPloArray  = [ {plo_number :PLO-1 , plo_description : xxxxx } , {plo_number :PLO-2 , plo_description : asdasd } ]
        $errorFlag = false;
        foreach ($curriculumRelatedPloArray as $plo) {
            $ploName = $plo['plo_number'];
            $ploDescription = $plo['plo_description'];
            $sql_statement = /** @lang text */
                "insert into plo(curriculumCode, programCode, ploName, ploDescription) VALUE (\"$curriculumId\",\"$programCode\"  ,\" $ploName\"  ,\" $ploDescription\" )";
            if ($this->databaseConnection->query($sql_statement) == TRUE)
                $errorFlag = true;
        }
        if ($errorFlag == true)
            return true;
        else
            return false;
    }

    public function retrievePLOOsOfProgram($programCode): ?array
    {
        $sql = /** @lang text */
            "select PLOCode, ploName, ploDescription from plo join batch b on plo.curriculumCode = b.curriculumCode where batchCode = 7 and plo.programCode = \"$programCode\"";
        $result = $this->databaseConnection->query($sql);

        $PLOList = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $newPLO = new PLO();
                $newPLO->setPloCode($row["PLOCode"]);
                $newPLO->setPloName($row["ploName"]);
                $newPLO->setPloDescription($row["ploDescription"]);
                $PLOList[] = $newPLO;
            }
        } else {
            echo "No PLOs found for program code: " . $programCode;
            return null;
        }

        return $PLOList;
    }


    public function retrieveSelectedCurriculumPlo($curriculumCode, $programCode): ?array
    {
        $sql = /** @lang text */
            "select * from plo where curriculumCode = \"$curriculumCode\" and programCode = \"$programCode\";";

        $result = $this->databaseConnection->query($sql);
        $PLOList = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $newPLO = new PLO();
                $newPLO->setPloCode($row["PLOCode"]);
                $newPLO->setPloName($row["ploName"]);
                $newPLO->setPloDescription($row["ploDescription"]);
                array_push($PLOList, $newPLO);
            }
            return $PLOList;
        } else
            return null;
    }

    public function retrieveCurriculumPLOsList($programCode): array
    {
        $sql = /** @lang text */
            "select  PLOCode, ploName, ploDescription, c.curriculumName, PLOCode, c.curriculumCode, p.programCode
            from programcurriculum as pc
                     join curriculum c on c.curriculumCode = pc.curriculumCode
                     join plo p on c.curriculumCode = p.curriculumCode
            where p.programCode = \" $programCode \" 
            group by PLOCode;";

        $PLOList = array();
        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp = array(
                    "PLOCode" => $row['PLOCode'],
                    "ploName" => $row['ploName'],
                    "ploDescription" => $row['ploDescription'],
                    "curriculumName" => $row['curriculumName'],
                );
                $PLOList[] = $temp;
            }
        } else
            echo "No Found" . '';
        return $PLOList;
    }


    public function removeProgramOutcome($programCode, $curriculumCode, $ploCode): bool
    {

        $sql = /** @lang text */
            "delete from plo where PLOCode = \"$ploCode\" and programCode = \"$programCode\" and curriculumCode = \"$curriculumCode\" ";
        $result = $this->databaseConnection->query($sql);
        if ($result === TRUE) {
//            echo sprintf("\n<br>Record Deleted successfully for CourseProfile ID:%s .\n<br>", (string)$ploCode);
            return true;
        }
//            echo sprintf("\n<br>Error while deleting record from CLO-Description Table : %s\n<br>Server Error:%s\n<br>", json_encode(array($currentCLOID, $programID, $batchCode)), $this->databaseConnection->error);
        return false;
    }

    public function updateProgramOutcome($curriculumCode , $ploCode, $currentPlo): bool
    {
        $ploName = $currentPlo['plo_number'];
        $ploDescription = $currentPlo['plo_description'];

//        print "PLO-NO :".$ploName."  ".$ploDescription."\n<br>";

        $sql1 = /** @lang text */
            "update plo set ploName =  \"$ploName\", ploDescription = \"$ploDescription\" 
            where PLOCode = \"$ploCode\" and curriculumCode = \"$curriculumCode\" ";

        if ($this->databaseConnection->query($sql1) === TRUE) {
//            echo "Record updated successfully" . "\n<br>";
            return true;
        }
//        echo sprintf("\n<br>Error while updating Course Profile Basic Info : %s\n<br>Server Error:%s\n<br>", json_encode(array($courseProfileID)), $this->databaseConnection->error);
        return false;
    }


    /**
     * @return int
     */
    public function getPloCode(): int
    {
        return $this->ploCode;
    }

    /**
     * @param int $ploCode
     */
    public function setPloCode(int $ploCode): void
    {
        $this->ploCode = $ploCode;
    }

    /**
     * @return string
     */
    public function getPloName(): string
    {
        return $this->ploName;
    }

    /**
     * @param string $ploName
     */
    public function setPloName(string $ploName): void
    {
        $this->ploName = $ploName;
    }

    /**
     * @return string
     */
    public function getPloDescription(): string
    {
        return $this->ploDescription;
    }

    /**
     * @param string $ploDescription
     */
    public function setPloDescription(string $ploDescription): void
    {
        $this->ploDescription = $ploDescription;
    }

    public function jsonSerialize()
    {
        return array(
            'ploCode' => $this->ploCode,
            'ploName' => $this->ploName,
            'ploDescription' => $this->ploDescription
        );
    }

}

?>