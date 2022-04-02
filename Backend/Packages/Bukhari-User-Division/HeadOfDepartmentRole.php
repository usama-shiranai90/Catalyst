<?php

class HeadOfDepartmentRole extends UserRole
{
    protected $adminCode;
    protected $departmentCode;
    protected $departmentName;

    public function __construct($email, $password)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
        return $this;
    }

    public function login($email, $password)
    {
        $sql = /** @lang text */
            "select facultyCode, d.departmentCode ,departmentName,departmentShortName , officialEmail, password from headofdepartment join department d on d.departmentCode = headofdepartment.departmentCode
             where officialEmail = \"$this->email\" and password = \"$this->password\" ; ";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $this->adminCode = $row["facultyCode"];
                $this->departmentCode = $row["departmentCode"];
//                $this->departmentName = checkDepartmentAbbreviation($row["departmentName"]);
                $this->departmentName = $row['departmentShortName'];


                $this->setUserDataInstance(/** @lang text */ "select * from faculty where facultyCode = '$this->adminCode'", $this->adminCode);
                $this->setNavigationUrl("../HeadOfDepartment/hodPanel.php");
                return true;
            }
        }
        return false;
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


    public function assignHeadOfDepartmentRole($emailList, $password, $facultyCode, $departmentCode): bool
    {
        $flag = false;
        $sql = /** @lang text */
            "select facultyCode, departmentCode, officialEmail, password from headofdepartment where departmentCode  = \"$departmentCode\"; ";
        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) > 0) {

            foreach ($emailList as $email) {
                $secondSql = /** @lang text */
                    "UPDATE headofdepartment  SET facultyCode =  \"$facultyCode\" , officialEmail = \"$email\", password = \"$password\"
                     WHERE departmentCode = \"$departmentCode\";  ";
                if ($this->databaseConnection->query($secondSql) === TRUE) {
                    $flag = true;
                } else {
                    $flag = false;
                }
            }
        }
        return $flag;
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