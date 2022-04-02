<?php
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\SearchUtil.php";

class ProgramManagerRole extends UserRole
{
    protected $adminCode;
    protected $programCode;

    public function __construct($email, $password)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }

    public function login($email, $password): bool
    {
        $sql = /** @lang text */
            "select facultyCode, programCode, officialEmail, password from programmanager where officialEmail = \"$this->email\" and password = \"$this->password\" ; ";
        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $this->adminCode = $row["facultyCode"];
                $this->programCode = $row["programCode"];
                $this->setUserDataInstance(/** @lang text */ "select * from faculty where facultyCode = '$this->adminCode'", $this->adminCode);
                $this->setNavigationUrl("../ProgramManager/pmPanel.php");
                return true;
            }
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getAdminCode()
    {
        return $this->adminCode;
    }

    /**
     * @return mixed
     */
    public function getProgramCode()
    {
        return $this->programCode;
    }

    public function getFacultyRole($facultyCode, &$respectiveRoles, $programCode = 'none'): bool
    {
        $flag = false;
        $temp = array(
            "hasRole" => false,
            "programCode" => 'none',
            "programName" => 'none',
        );
        if (strcasecmp($programCode, 'none') === 0) {
            $sql = /** @lang text */
                "select facultyCode, p.programCode, departmentCode, programName from programmanager join program p on 
                p.programCode = programmanager.programCode where facultyCode = \"$facultyCode\"; ";

        } else {
            $sql = /** @lang text */
                "select facultyCode, p.programCode, departmentCode, programName from programmanager join program p on 
                p.programCode = programmanager.programCode where facultyCode = \"$facultyCode\" and p.programCode = \"$programCode\" ";
        }
        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) > 0) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $temp['hasRole'] = true;
                $temp['programCode'] = $row['programCode'];
                $temp['programName'] = checkProgramAbbreviation($row['programName']);
                $respectiveRoles['PM'][] = $temp;
            }
            $flag = true;
        } else
            $respectiveRoles['PM'][] = $temp;

        return $flag;
    }


    public function assignProgramManagerRole($email, $password, $facultyCode, $programCode): bool
    {
        $sql = /** @lang text */
            "select facultyCode, programCode, officialEmail, password from programmanager where programCode = \"$programCode\"; ";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) > 0) {
            $secondSql = /** @lang text */
                "UPDATE programmanager  SET facultyCode =  \"$facultyCode\" , officialEmail = \"$email\", password = \"$password\"
            WHERE programCode = \"$programCode\";  ";
            if ($this->databaseConnection->query($secondSql) === TRUE)
                return true;
        } else if (mysqli_num_rows($authenticationResult) === 0) {

            $sql = /** @lang text */
                "insert into programmanager(facultyCode, programCode, officialEmail, password)
            VALUES (\"$facultyCode\" , \"$programCode\" , \"$email\", \"$password\"  );";
            if ($this->databaseConnection->query($sql) === TRUE)
                return true;
        }
        return false;
    }


    public function retrieveAdminRole($departmentCode, &$respectiveRoles): bool
    {
        $temp = array("programCode" => '-', "facultyID" => '-', "name" => '-', "designation" => '-', "officialEmail" => '-', "roleName" => '-', 'ofOther' => '-');
        $sql = /** @lang text */
            "select pm.facultyCode, pm.programCode, pm.officialEmail, name, f.departmentCode ,designation , programName , programShortName
            from programmanager pm
                     join faculty f on pm.facultyCode = f.facultyCode join program p on pm.programCode = p.programCode
            where f.departmentCode = \"$departmentCode\"; ";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) > 0) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $temp['programCode'] = $row['programCode'];
                $temp['facultyID'] = $row['facultyCode'];
                $temp['name'] = $row['name'];
                $temp['designation'] = $row['designation'];
                $temp['officialEmail'] = $row['officialEmail'];
                $temp['roleName'] = "Program Manager";
//                $temp['ofOther'] = $row['programName'] . "( " . $row['programShortName'] . " )";
                $temp['ofOther'] = $row['programShortName'];
                $respectiveRoles['PM'][] = $temp;
            }
            return true;
        }
        $respectiveRoles['HOD'][] = $temp;
        return false;
    }


    public function deleteAdministrativeRole($facultyId, $programCode): bool
    {
        $sql = /** @lang text */
            "delete from programmanager where facultyCode = \"$facultyId\" and programCode =\"$programCode\" ;";
        $result = $this->databaseConnection->query($sql);
        if ($result === TRUE) {
            return true;
        } else
            return false;
    }

}