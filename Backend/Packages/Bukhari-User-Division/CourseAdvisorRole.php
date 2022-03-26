<?php

class CourseAdvisorRole extends UserRole
{
    protected $adminCode;
    protected $sectionCode;

    public function __construct($email, $password)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }

    public function login($email, $password)
    {
        $sql = /** @lang text */
            "select facultyCode, sectionCode, officialEmail, password from courseadvisor where officialEmail = \"$this->email\" and password = \"$this->email\" ; ";
        $authenticationResult = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $this->adminCode = $row["facultyCode"];
                $this->sectionCode = $row["sectionCode"];
                $this->setUserDataInstance(/** @lang text */  "select * from faculty where facultyCode = '$this->adminCode'", $this->adminCode);
                $this->setNavigationUrl("../CourseAdvisor/caPanel.php");
                return true;
            }
        }
        return false;
    }

    public function getAdminCode()
    {
        return $this->adminCode;
    }

    public function getSectionCode()
    {
        return $this->sectionCode;
    }




}