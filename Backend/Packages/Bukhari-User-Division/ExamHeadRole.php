<?php

class ExamHeadRole extends UserRole
{
    protected $examHeadCode;

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
            "select examHeadCode, name, CNIC, officialEmail, picture, address, contactNumber, password 
             from examhead where officialEmail = \"$email\" and password = \"$password\" ; ";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $this->examHeadCode = $row["examHeadCode"];
                $personalDetails = $row;
                $this->personalInfo = $personalDetails;
                $this->setNavigationUrl("../ExamHead/examPanel.php");
                return true;
            }
        }
        return false;
    }


}