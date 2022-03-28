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

}