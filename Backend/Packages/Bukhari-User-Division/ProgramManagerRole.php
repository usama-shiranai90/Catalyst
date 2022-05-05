<?php
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\SearchUtil.php";

class ProgramManagerRole extends UserRole
{
    protected $adminCode;
    protected $programCode;

    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password): bool
    {

        $this->email = $email;
        $this->password = $password;

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
        $adminStat = array(
            "hasRole" => false,
            "programCode" => 'none',
            "programName" => 'none',
        );

        $prepareStatementSearchQuery = '';
        $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($facultyCode, 'string'));
        if (strcasecmp($programCode, 'none') === 0) {
            $prepareStatementSearchQuery = $this->databaseConnection->prepare(query: "select facultyCode, p.programCode, departmentCode, programName from programmanager join program p on 
                p.programCode = programmanager.programCode where facultyCode = ? ");
            $prepareStatementSearchQuery->bind_param('s', $sanitizeFacultyCode);

        } else {
            if (FormValidator::validateItem($programCode, 'int')) {
                $prepareStatementSearchQuery = $this->databaseConnection->prepare(query: "select facultyCode, p.programCode, departmentCode, programName, programShortName from programmanager join program p on 
                     p.programCode = programmanager.programCode where facultyCode = ? and p.programCode = ? ");
                $sanitizeProgramCode = FormValidator::sanitizeUserInput($programCode, 'int');
                $prepareStatementSearchQuery->bind_param('si', $sanitizeFacultyCode, $sanitizeProgramCode);
            }
            // need to handle if invalid input is fetch.
        }

        if ($prepareStatementSearchQuery->execute()) {
            $result = $prepareStatementSearchQuery->get_result();
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $adminStat['hasRole'] = true;
                    $adminStat['programCode'] = $row['programCode'];
                    $adminStat['programName'] = $row['programShortName'];
//                $adminStat['programName'] = checkProgramAbbreviation($row['programName']);
                    $respectiveRoles['PM'][] = $adminStat;
                }
                $flag = true;
            } else
                $respectiveRoles['PM'][] = $adminStat;
        }
        return $flag;
    }


    public function assignProgramManagerRole($email, $password, $facultyCode, $programCode): bool
    {
        $prepareStatementSearchQuery = $this->databaseConnection->prepare('select facultyCode, programCode, officialEmail, password 
            from programmanager where programCode =  ? ;');

        $sanitizeProgramCode = FormValidator::sanitizeUserInput($programCode, 'int');
        $prepareStatementSearchQuery->bind_param('i', $sanitizeProgramCode);
        if ($prepareStatementSearchQuery->execute()) {
            $result = $prepareStatementSearchQuery->get_result();

            $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($facultyCode, 'string'));
            $sanitizeEmail = FormValidator::sanitizeUserInput($email, 'email');

            if (mysqli_num_rows($result) > 0) {
                $prepareStatementUpdateQuery = $this->databaseConnection->prepare(query: "UPDATE programmanager  SET facultyCode = ? , officialEmail = ?,
                  password = ? WHERE programCode = ? ; ");
                $prepareStatementUpdateQuery->bind_param('sssi', $sanitizeFacultyCode, $sanitizeEmail, $password, $sanitizeProgramCode);
                return $prepareStatementUpdateQuery->execute() === TRUE;
            } else if (mysqli_num_rows($result) === 0) {
                $prepareStatementInsertionQuery = $this->databaseConnection->prepare(query: "insert into programmanager(facultyCode, programCode, officialEmail, password)
                     VALUES (? , ? ,? ,?) ;");
                $prepareStatementInsertionQuery->bind_param('siss', $sanitizeFacultyCode, $sanitizeProgramCode, $sanitizeEmail, $password);
                return $prepareStatementInsertionQuery->execute() === TRUE;
            }
        }
        return false;
    }

    public function retrieveAdminRole($departmentCode, &$respectiveRoles): bool
    {
        $adminStat = array("programCode" => '-', "facultyID" => '-', "name" => '-', "designation" => '-', "officialEmail" => '-', "roleName" => '-', 'ofOther' => '-');

        $prepareStatementSearchQuery = $this->databaseConnection->prepare('select pm.facultyCode, pm.programCode, pm.officialEmail, name, f.departmentCode ,
            designation , programName , programShortName from programmanager pm join faculty f on pm.facultyCode = f.facultyCode 
            join program p on pm.programCode = p.programCode where f.departmentCode  = ? ;');

        $sanitizeDepartmentCode = FormValidator::sanitizeUserInput($departmentCode, 'int');
        $prepareStatementSearchQuery->bind_param('i', $sanitizeDepartmentCode);

        if ($prepareStatementSearchQuery->execute()) {
            $result = $prepareStatementSearchQuery->get_result();
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    print json_encode($row)."<br><br><br>";
//                $adminStat['ofOther'] = $row['programName'] . "( " . $row['programShortName'] . " )";
                    $adminStat['programCode'] = $row['programCode'];
                    $adminStat['facultyID'] = $row['facultyCode'];
                    $adminStat['name'] = $row['name'];
                    $adminStat['designation'] = $row['designation'];

                    $adminStat['officialEmail'] = $row['officialEmail'];
                    $adminStat['roleName'] = "Program Manager";
                    $adminStat['ofOther'] = $row['programShortName'];
                    $respectiveRoles['PM'][] = $adminStat;
                }
                return true;
            }
        }
        $respectiveRoles['pm'][] = $adminStat;
        return false;
    }

    public function deleteAdministrativeRole($facultyCode, $programCode): bool
    {
        $prepareStatementDeleteQuery = $this->databaseConnection->prepare(query: "delete from programmanager 
        where facultyCode = ? and programCode = ? ");

        $sanitizeProgramCode = FormValidator::sanitizeUserInput($programCode, 'int');
        $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($facultyCode, 'string'));
        $prepareStatementDeleteQuery->bind_param('si', $sanitizeFacultyCode, $sanitizeProgramCode);
        return $prepareStatementDeleteQuery->execute() === TRUE;
    }

}