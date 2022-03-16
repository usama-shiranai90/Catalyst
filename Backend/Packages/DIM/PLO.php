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

    public function createProgramOutcomeCurriculum($programCode, $curriculumId, $curriculumRelatedPlo): bool
    {
        $errorFlag = false;
        foreach ($curriculumRelatedPlo as $plo) {
            $ploName = $plo['plo_number'];
            $ploDescription = $plo['plo_description'];
            $sql_statement = /** @lang text */
                "insert into plo(curriculumCode, programCode, ploName, ploDescription) VALUE (\"$programCode\" ,  \"$curriculumId\" ,\" $ploName\"  ,\" $ploDescription\" )";
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


    public function retrieveSelectedCurriculumPlo($curriculumCode, $programType): ?array
    {
        $programName = compareProgramType($programType);
        $sql = /** @lang text */
            "select * from plo join program p on plo.programCode = p.programCode 
            where programName = \"$programName\" and p.curriculumCode = \"$curriculumCode\"; ";

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
            return $PLOList;
        } else
            return array($programName);
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