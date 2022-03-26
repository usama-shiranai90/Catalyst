<?php

class ProgramManagerRole extends UserRole{
    protected $adminCode;
    protected $programCode;

    public function __construct($email, $password){
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
                $this->setUserDataInstance(/** @lang text */  "select * from faculty where facultyCode = '$this->adminCode'", $this->adminCode);
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


}