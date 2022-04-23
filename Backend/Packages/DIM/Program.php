<?php
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\SearchUtil.php";

class Program implements JsonSerializable
{

    private $programName;
    private $programCode;

    protected $databaseConnection;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
    }

    public function createProgram($departmentCode, $programName, $programShortName): bool
    {
        $sqlStatement = /** @lang text */
            "INSERT INTO program(departmentCode, programName ,programShortName) VALUE ( \"$departmentCode\" ,\"$programName\" , \"$programShortName\" );";

        if ($this->databaseConnection->query($sqlStatement) === TRUE) {
            $this->programCode = ((int)$this->databaseConnection->insert_id);
            return true;
        } else
            return false;
    }

    public function deleteProgram($programCode): bool
    {
        $sql = /** @lang text */
            "delete from program where programCode = \"$programCode\" ";
        $result = $this->databaseConnection->query($sql);
        if ($result === TRUE) {
            return true;
        }
        return false;
    }

    public function modifyProgram($programCode , $programName , $programSName)
    {
        $sql = /** @lang text */
            "UPDATE program p    SET p.programName = \"$programName\" , p.programShortName = \"$programSName\"
            WHERE p.programCode = \"$programCode\"  ";

        if ($this->databaseConnection->query($sql) === TRUE) {
            return true;
        } else
            return false.$this->databaseConnection->error;
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

    public function retrieveProgramList($departmentCode): array
    {
        $programList = array();
        $dbStatement = /** @lang text */
            "select * from program where departmentCode = \"$departmentCode\"";
        $result = $this->databaseConnection->query($dbStatement);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $program = new Program();
                $program->programCode = $row["programCode"];
                $program->programName = $row["programShortName"];
                /*$programName = preg_split("/[\s,_-]+/", $program->getProgramName());;
                $programNameAcronym = "";
                foreach ($programName as $w)
                    if (ctype_upper($w[0]))
                        $programNameAcronym .= $w[0];
                $program->programName = $programNameAcronym;*/
                array_push($programList, $program);
            }
        } else
            echo "No program found related to current department: " . $departmentCode;

        return $programList;

    }

    public function getProgramAbbreviation($programCode): ?string
    {
        $sql = /** @lang text */
            "select programCode, departmentCode, programName, programShortName from program where programCode = \"$programCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
//                return checkProgramAbbreviation($programName);
                return $row['programShortName'];
            }
        } else
            echo "No program found for program code: " . $programCode;

        return null;
    }


    public function retrieveEntireProgramList(): ?array
    {
        $sql = /** @lang text */
            "select programCode, departmentCode, programName, programShortName from program;";

        $result = $this->databaseConnection->query($sql);
        $programList = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {

                $temp = array(
                    'programCode' => $row['programCode'],
                    'departmentCode' => $row['departmentCode'],
                    'programName' => $row['programName'],
                    'programSN' => $row['programShortName']
                );
                array_push($programList, $temp);
            }
            return $programList;
        } else
            echo "Please Program List.";

        return null;
    }

    public function retrieveEntireDepartmentList(): ?array
    {
        $sql = /** @lang text */
            "select departmentCode, departmentName, departmentShortName from department;";

        $result = $this->databaseConnection->query($sql);
        $departmentList = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp = array(
                    'departmentCode' => $row['departmentCode'],
                    'departmentName' => $row['departmentName'],
                    'departmentSN' => $row['departmentShortName']
                );
                array_push($departmentList, $temp);
            }
            return $departmentList;
        } else
            echo "Please Department List";

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


    public function jsonSerialize()
    {
        return array(
            'programCode' => $this->programCode,
            'programName' => $this->programName
        );
    }
}