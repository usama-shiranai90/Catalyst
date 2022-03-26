<?php

class HeadOfDepartmentRole extends UserRole
{
    protected $adminCode;
    protected $departmentCode;

    public function __construct($email, $password){
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }

    public function login($email, $password)
    {
        $sql = /** @lang text */
            "select facultyCode, departmentCode, officialEmail, password from headofdepartment where officialEmail = \"$this->email\" and password = \"$this->password\" ; ";
        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $this->adminCode = $row["facultyCode"];
                $this->departmentCode = $row["departmentCode"];
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

}