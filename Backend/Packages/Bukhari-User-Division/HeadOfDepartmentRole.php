<?php

class HeadOfDepartmentRole extends UserRole
{
    protected $adminCode;
    protected $departmentCode;
    protected $departmentName;

    public function __construct()
    {
        parent::__construct();
        return $this;
    }

    public function login($email, $password): bool
    {
        /** CASES :
         * when the password is same for Same department Then multiple times it will execute.
         * 1. if we provide (resignationDate <=> NULL) it will only select user having empty/null resignationDate
         * 2. If we provide Not .... the opposite will happen.
         */

        $this->email = $email;
        $this->password = $password;
        $sql = /** @lang text  and  (resignationDate <=> NULL); */
            "select facultyCode, d.departmentCode ,departmentName,departmentShortName , officialEmail , resignationDate, password from headofdepartment join department d on d.departmentCode = headofdepartment.departmentCode
             where officialEmail = \"$this->email\" and password = \"$this->password\"";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
//                $this->departmentName = checkDepartmentAbbreviation($row["departmentName"]);
                $this->adminCode = $row["facultyCode"];
                $this->departmentCode = $row["departmentCode"];
                $this->departmentName = $row['departmentShortName'];
                $facultyCode = $row['facultyCode'];

                // check if the current login user has resignation/ start date set.
                if (strlen($row['resignationDate']) > 0) { // date has been set .

                    $resignationDate = $row['resignationDate'];
                    $todayDate = date('Y-m-d');
                    if ($resignationDate >= $todayDate) { // if the current user date matches then remove the value of resignation and delete old HOD account.
                        $isDeleted = $this->deletePreviousAssignHeadOfDepartment($this->departmentCode);
                        if ($isDeleted)
                            $this->moveResignationDateFromNewHOD($this->departmentCode, $facultyCode);
                    } else { // not allow the current user to login as its date has not reached.
                        return false;   // later on pass error message.
                    }
                }
                $this->setUserDataInstance(/** @lang text */ "select * from faculty where facultyCode = '$this->adminCode'", $this->adminCode);
                $this->setNavigationUrl("../HeadOfDepartment/hodPanel.php");
                return true;
            }
        }
        return false;
    }

    function deletePreviousAssignHeadOfDepartment($departmentCode): bool
    {
        $prepareStatementDeleteQuery = $this->databaseConnection->prepare(query: "delete from headofdepartment 
            where departmentCode = ? and resignationDate <=> NULL; ");

        $sanitizeDepartmentCode = FormValidator::sanitizeUserInput($departmentCode, 'int');
        $prepareStatementDeleteQuery->bind_param('i', $sanitizeDepartmentCode);
        if ($prepareStatementDeleteQuery->execute() === TRUE)
            return true;
        return false;
    }

    function moveResignationDateFromNewHOD($departmentCode, $facultyCode): bool
    {
        $prepareStatementDeleteQuery = $this->databaseConnection->prepare(query: "update headofdepartment set 
        resignationDate = null where departmentCode = ? and facultyCode = ? ;");

        $sanitizeDepartmentCode = FormValidator::sanitizeUserInput($departmentCode, 'int');
        $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($facultyCode, 'string'));
        $prepareStatementDeleteQuery->bind_param('is', $sanitizeDepartmentCode, $sanitizeFacultyCode);
        return $prepareStatementDeleteQuery->execute() === TRUE;
    }

    public function getAdminCode()
    {
        return $this->adminCode;
    }

    public function getDepartmentCode()
    {
        return $this->departmentCode;
    }

    public function getDepartmentName()
    {
        return $this->departmentName;
    }

    public function getFacultyRole($facultyCode, &$respectiveRoles): bool
    {
//        $facultyCode = mysqli_real_escape_string($this->databaseConnection, $facultyCode);

        $AdminStat = array("hasRole" => false, "departmentName" => 'none');
        $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($facultyCode, 'string'));

        $prepareStatementWithQuery = $this->databaseConnection->prepare('select facultyCode, d.departmentCode, departmentName,departmentShortName 
            from headofdepartment join department d on d.departmentCode = headofdepartment.departmentCode where facultyCode = ?');
        $prepareStatementWithQuery->bind_param('s', $sanitizeFacultyCode);
        if ($prepareStatementWithQuery->execute()) {
            $result = $prepareStatementWithQuery->get_result();
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
//                $AdminStat['departmentName'] = checkDepartmentAbbreviation($row['departmentName']);
                    $AdminStat['hasRole'] = true;
                    $AdminStat['departmentName'] = $row['departmentShortName'];
                    $respectiveRoles['HOD'][] = $AdminStat;
                }
                return true;
            }
        }
        $respectiveRoles['HOD'][] = $AdminStat;
        return false;
    }


    public function assignHeadOfDepartmentRole($email, $password, $facultyCode, $departmentCode, $startDate): bool
    {
        /** Old approach, first search department multiple times. then update. */
        /*    $flag = false;
         * $sql = "select facultyCode, departmentCode, officialEmail, password from headofdepartment where departmentCode  = \"$departmentCode\"; ";
        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) > 0) {
            foreach ($emailList as $email) {
                $secondSql = "UPDATE headofdepartment  SET facultyCode =  \"$facultyCode\" , officialEmail = \"$email\", password = \"$password\"
                    WHERE departmentCode = \"$departmentCode\";  ";
                    if ($this->databaseConnection->query($secondSql) === TRUE) {
                    $flag = true;
                } else {
                    $flag = false;
                }
            }
        }
        */
        $prepareStatementInsertionQuery = $this->databaseConnection->prepare(query: "insert into 
        headofdepartment(facultyCode, departmentCode, officialEmail, password, resignationDate)  VALUES ( ? , ? , ? , ? , ? );");

        $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($facultyCode, 'string'));
        $sanitizeEmail = FormValidator::sanitizeUserInput($email, 'email');
        $sanitizeDepartmentCode = FormValidator::sanitizeUserInput($departmentCode, 'int');
        $prepareStatementInsertionQuery->bind_param('sisss', $sanitizeFacultyCode, $sanitizeDepartmentCode,
            $sanitizeEmail, $password, $startDate);
        return $prepareStatementInsertionQuery->execute() === TRUE;
    }


    public function retrieveAdminRole($departmentCode, &$respectiveRoles): bool
    {
        $adminStat = array("departmentCode" => '-', "facultyID" => '-', "name" => '-', "designation" => '-', "officialEmail" => '-', "roleName" => '-', 'ofOther' => '-');

        $prepareStatementSearchQuery = $this->databaseConnection->prepare('select f.departmentCode, f.facultyCode, f.officialEmail, name, designation ,
                     departmentName ,departmentShortName from headofdepartment
                     join faculty f on headofdepartment.facultyCode = f.facultyCode
                     join department d on f.departmentCode = d.departmentCode
                     where f.departmentCode = ?');

        $sanitizeDepartmentCode = FormValidator::sanitizeUserInput($departmentCode, 'int');
        $prepareStatementSearchQuery->bind_param('s', $sanitizeDepartmentCode);
        if ($prepareStatementSearchQuery->execute()) {
            $result = $prepareStatementSearchQuery->get_result();
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $adminStat['departmentCode'] = $row['departmentCode'];
                    $adminStat['facultyID'] = $row['facultyCode'];
                    $adminStat['name'] = $row['name'];
                    $adminStat['designation'] = $row['designation'];
                    $adminStat['officialEmail'] = $row['officialEmail'];
                    $adminStat['roleName'] = "Head Of Department";
                    $adminStat['ofOther'] = $row['departmentName'] . "( " . $row['departmentShortName'] . " )";
                    $respectiveRoles['HOD'][] = $adminStat;
                }
                return true;
            }
        }
        $respectiveRoles['HOD'][] = $adminStat;
        return false;
    }

    public function deleteAdministrativeRole($facultyCode, $departmentCode): bool
    {
        $prepareStatementDeleteQuery = $this->databaseConnection->prepare(query: "delete from headofdepartment where 
                                   facultyCode = ? and departmentCode = ? ");

        $sanitizeDepartmentCode = FormValidator::sanitizeUserInput($departmentCode, 'int');
        $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($facultyCode, 'string'));
        $prepareStatementDeleteQuery->bind_param('si', $sanitizeFacultyCode, $sanitizeDepartmentCode);
        return $prepareStatementDeleteQuery->execute() === TRUE;
    }

}