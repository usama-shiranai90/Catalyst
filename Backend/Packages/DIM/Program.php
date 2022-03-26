<?php

class Program implements JsonSerializable
{

    private $programName;
    private $programCode;


    protected $databaseConnection;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();

    }

    public function retrieveProgram($programCode): Program
    {
        $sql = /** @lang text */
            "select * from program where programCode = \"$programCode\"";
        $result = $this->databaseConnection->query($sql);

        $programName = array();

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $newProgram = new Program();
                $newProgram->programCode = $row["programCode"];
                $newProgram->programName = $row["programName"];
                $programName = preg_split("/[\s,_-]+/", $newProgram->getProgramName());;
                $programNameAcronym = "";

                foreach ($programName as $w) {
                    if (ctype_upper($w[0]))
                        $programNameAcronym .= $w[0];
                }
                $newProgram->programName = $programNameAcronym;
            }
        } else
            echo "No program found for program code: " . $programCode;

        return $newProgram;
    }


    public function createProgram($curriculumCode, $departmentCode, $programName): bool
    {
        $sqlStatement = /** @lang text */
            "insert into program(curriculumCode, departmentCode, programName) VALUE (\"$curriculumCode\" , \"$departmentCode\" ,\"$programName\");";

        if ($this->databaseConnection->query($sqlStatement) === TRUE) {
            $this->programCode = ((int)$this->databaseConnection->insert_id);
            return true;
        } else
//            echo "Error inserting marks for activity: " . $activityCode . "******" . $sql . "<br>" . $this->databaseConnection->error;
            return false;

    }


    public function getProgramAbbreviation($programCode)
    {
        $sql = /** @lang text */
            "select programCode, departmentCode, programName from program where programCode = \"$programCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $programName = $row['programName'];
                return $this->checkAbbreviation($programName);
            }
        } else
            echo "No program found for program code: " . $programCode;

        return null;
    }

    public function getProgramName()
    {
        return $this->programName;
    }

    public function getProgramCode()
    {
        return $this->programCode;
    }


    protected function checkAbbreviation($value): ?string
    {
        if (str_contains(strtolower($value) , strtolower("Bachelors of Computer in Software Engineering")) !== false
            || ( preg_match('/\bSoftware Engineering\b/', $value, $f) == 1 ) ){
            return 'BCSE';
        }
        elseif (str_contains(strtolower($value) , strtolower("Bachelors of Computer in Computer Science")) !== false
            || preg_match('/\bComputer Science\b/', $value, $f) == 1){
            return 'BCCS';
        }
        elseif (str_contains(strtolower($value) , strtolower("Bachelors in Social Science")) !== false
            || preg_match('/\bSocial Science\b/', $value, $f) == 1){
            return 'BCSS';
        }
        return null;
    }


    public function jsonSerialize()
    {
        return array(
            'programCode' => $this->programCode,
            'programName' => $this->programName
        );
    }
}