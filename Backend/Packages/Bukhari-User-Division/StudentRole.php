<?php

class StudentRole extends UserRole
{
    private $studentRegistrationCode;

    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {
        $this->email = $email;
        $this->password = $password;

        $sql = /** @lang text */
            "SELECT studentRegCode FROM student where authenticationCode = \"$this->email\" and password = \"$this->password\"";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $this->studentRegistrationCode = $row["studentRegCode"];
                $this->setUserDataInstance(/** @lang text */ "select * from student where studentRegCode = '$this->studentRegistrationCode'", $this->studentRegistrationCode);
                $this->setNavigationUrl("../Student/StudentPanel.php");
                return true;
            }
        }
        return false;
    }


    public function logout()
    {
        session_destroy();
    }

    public function getInstance()
    {
        return $this->personalInfo;
    }

    /**
     * @return mixed
     */
    public function getStudentRegistrationCode()
    {
        return $this->studentRegistrationCode;
    }


}


?>