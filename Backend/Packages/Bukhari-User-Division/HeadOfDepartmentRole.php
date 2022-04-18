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
        $deleteSqlStatement = /** @lang text */
            "delete from headofdepartment where departmentCode = \" $departmentCode \" and resignationDate <=> NULL;";
        $resultDeletion = $this->databaseConnection->query($deleteSqlStatement);
        if ($resultDeletion === TRUE)
            return true;
        return false;
    }

    function moveResignationDateFromNewHOD($departmentCode, $facultyCode): bool
    {
        $sqlStatement = /** @lang text */
            "update headofdepartment set resignationDate = null where departmentCode = \"$departmentCode\" and facultyCode = \"$facultyCode\" ;  ";
        return $this->databaseConnection->query($sqlStatement) === TRUE;
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
        $temp = array("hasRole" => false, "departmentName" => 'none');

        $sql = /** @lang text */
            "select facultyCode, d.departmentCode, departmentName,departmentShortName from headofdepartment join department d on
             d.departmentCode = headofdepartment.departmentCode where facultyCode = \"$facultyCode\"; ";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) > 0) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $temp['hasRole'] = true;
//                $temp['departmentName'] = checkDepartmentAbbreviation($row['departmentName']);
                $temp['departmentName'] = $row['departmentShortName'];
                $respectiveRoles['HOD'][] = $temp;
            }
            return true;
        }
        $respectiveRoles['HOD'][] = $temp;
        return false;
    }


    public function assignHeadOfDepartmentRole($email, $password, $facultyCode, $departmentCode ,$startDate): bool
    {
        $flag = false;
        /** Old approach, first search department multiple times. then update. */
        /*$sql = "select facultyCode, departmentCode, officialEmail, password from headofdepartment where departmentCode  = \"$departmentCode\"; ";
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

        $sql = /** @lang text */
            "insert into headofdepartment(facultyCode, departmentCode, officialEmail, password, resignationDate)
            VALUES ( \"$facultyCode\" , \"$departmentCode\" , \"$email\" , \"$password\" , \"$startDate\" );";
        return ($this->databaseConnection->query($sql) === TRUE);
    }


    public function retrieveAdminRole($departmentCode, &$respectiveRoles): bool
    {
        $temp = array("departmentCode" => '-', "facultyID" => '-', "name" => '-', "designation" => '-', "officialEmail" => '-', "roleName" => '-', 'ofOther' => '-');
        $sql = /** @lang text */
            "select f.departmentCode, f.facultyCode, f.officialEmail, name, designation , departmentName ,departmentShortName
             from headofdepartment
                     join faculty f on headofdepartment.facultyCode = f.facultyCode
                     join department d on f.departmentCode = d.departmentCode
             where f.departmentCode  = \"$departmentCode\"; ";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) > 0) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $temp['departmentCode'] = $row['departmentCode'];
                $temp['facultyID'] = $row['facultyCode'];
                $temp['name'] = $row['name'];
                $temp['designation'] = $row['designation'];
                $temp['officialEmail'] = $row['officialEmail'];
                $temp['roleName'] = "Head Of Department";
                $temp['ofOther'] = $row['departmentName'] . "( " . $row['departmentShortName'] . " )";
                $respectiveRoles['HOD'][] = $temp;
            }
            return true;
        }
        $respectiveRoles['HOD'][] = $temp;
        return false;
    }

    public function deleteAdministrativeRole($facultyId, $departmentCode): bool
    {
        $sql = /** @lang text */
            "delete from headofdepartment where facultyCode = \"$facultyId\" and departmentCode =  \"$departmentCode\" ;";
        $result = $this->databaseConnection->query($sql);
        if ($result === TRUE)
//            echo sprintf("\n<br>Administrative record for department :%s .\n<br>", (string)$fac);

            return true;
        else
            return false;
    }

}