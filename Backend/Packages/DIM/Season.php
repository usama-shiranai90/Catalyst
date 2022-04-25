<?php

class Season implements JsonSerializable
{

    protected $seasonCode;
    protected $seasonName;
    protected $databaseConnection;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton::getConnection();
    }

    public function createNewSeason($seasonName): bool
    {
        $sql = /** @lang text */
            "insert into season(seasonName) VALUES ( \"$seasonName\");";

        $result = $this->databaseConnection->query($sql);
        if ($result) {
            $this->setSeasonCode($this->databaseConnection->insert_id);
            return true;
        }
        return false;
    }

    public function retrieveLatestSeasonForAllocation(): ?array
    {
        $seasonList = array();
//        $sql ="select seasonCode, seasonName from Season;";

        $sql = /** @lang text */
            "select * from season where dateCreated between
                              DATE_SUB(current_date, INTERVAL 4 month)
                              and
                              current_date;";

        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $newSeason = new Season();
                $newSeason->seasonCode = $row["seasonCode"];
                $newSeason->seasonName = $row["seasonName"];
                array_push($seasonList, $newSeason);
            }
        } else
            return null;
        return $seasonList;
    }


    public function getSeasonCode()
    {
        return $this->seasonCode;
    }

    public function setSeasonCode($seasonCode): void
    {
        $this->seasonCode = $seasonCode;
    }

    public function getSeasonName()
    {
        return $this->seasonName;
    }

    public function setSeasonName($seasonName): void
    {
        $this->seasonName = $seasonName;
    }

    public function getDatabaseConnection(): ?mysqli
    {
        return $this->databaseConnection;
    }

    public function jsonSerialize()
    {
        return array(
            'seasonCode' => $this->seasonCode,
            'seasonName' => $this->seasonName
        );
    }
}

?>