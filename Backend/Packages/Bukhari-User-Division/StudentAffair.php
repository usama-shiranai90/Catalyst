<?php

class StudentAffair extends UserRole
{

    protected $studentAffairCode;

    public function __construct($email, $password)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
        return $this;
    }

    public function login($email, $password): bool
    {
        $sql = /** @lang text */
            "select * from studentaffair where officialEmail = \"$email\" and password = \"$password\" ; ";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $this->studentAffairCode = $row["studentAffairCode"];
                $personalDetails = $row;
                $this->personalInfo = $personalDetails;
                $this->setNavigationUrl("../StudentAffair/studentAffairPanel.php");
                return true;
            }
        }
        return false;
    }

}