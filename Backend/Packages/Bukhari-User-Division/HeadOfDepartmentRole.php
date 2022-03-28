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
    }

    public function login($email, $password)
    {
        $sql = /** @lang text */
            "select facultyCode, d.departmentCode ,departmentName, officialEmail, password from headofdepartment join department d on d.departmentCode = headofdepartment.departmentCode
             where officialEmail = \"$this->email\" and password = \"$this->password\" ; ";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $this->adminCode = $row["facultyCode"];
                $this->departmentCode = $row["departmentCode"];
                $this->departmentName = checkDepartmentAbbreviation($row["departmentName"]);
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
        $temp = array(
            "hasRole" => false,
            "departmentName" => 'none',
        );

        $sql = /** @lang text */
            "select facultyCode, d.departmentCode, departmentName from headofdepartment join department d on
             d.departmentCode = headofdepartment.departmentCode where facultyCode = \"$facultyCode\"; ";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) > 0) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $temp['hasRole'] = true;
                $temp['departmentName'] = checkDepartmentAbbreviation($row['departmentName']);
                $respectiveRoles['HOD'][] = $temp;
            }
            return true;
        }
        $respectiveRoles['HOD'][] = $temp;
        return false;
    }

}