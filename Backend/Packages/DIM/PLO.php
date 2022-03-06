<?php

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

    public function retreivePLOsOfProgram($programCode){
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
        } else{
            echo "No PLOs found for program code: ".$programCode;
            return null;
        }

        return $PLOList;
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
            'ploCode'=>$this->ploCode,
            'ploName'=>$this->ploName,
            'ploDescription'=>$this->ploDescription
        );
    }

}

?>