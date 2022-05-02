<?php

class StudentRole extends UserRole
{
    private $studentRegistrationCode;

    public function __construct()
    {
        parent::__construct();
    }

    public function createStudentData($sectionCode, $registrationNumber, $name, $fatherName, $contact, $bloodGroup, $address, $dob, $officialMail, $personalMail, $authenticateCode): bool
    {
        /*        print sprintf("%s , %s , %s , %s , %s , %s , %s , %s , %s ,  %s ,  %s <br>\n", $sectionCode, $registrationNumber, $name, $fatherName, $contact,
            $bloodGroup, $address, $dob, $officialMail, $personalMail, $authenticateCode);*/
        $sql = /** @lang text */
            "insert into student(studentRegCode, sectionCode, name, fatherName, contactNumber, officialEmail, personalEmail, bloodGroup, address, dateOfBirth, password, authenticationCode)
             VALUES (\"$registrationNumber\" , \"$sectionCode\" ,\"$name\" ,\"$fatherName\" , \"$contact\",\"$officialMail\",\"$personalMail\",\"$bloodGroup\" , \"$address\",
              \"$dob\" , \"123456789\" , \"$authenticateCode\");";
        $result = $this->databaseConnection->query($sql);
        if ($result) {
            $this->setStudentRegistrationCode(($this->databaseConnection->insert_id));
            return true;
        }
        return false;
    }

    function checkDuplication($studentCode, &$duplicateList): bool
    {
        $sql = /** @lang text */
            "select * from student where studentRegCode = '$studentCode'";

        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
//            array_push($duplicateList, array($studentCode, true));
            array_push($duplicateList, $studentCode);
            return true;
        }
        return false;
    }

    function modifiedStudentRecord($oldReg, $sectionCode, $registrationNumber, $name, $fatherName, $contact, $bloodGroup, $address, $dob, $officialMail, $personalMail, $authenticateCode): mysqli_result|bool
    {
        $sql = /** @lang text */
            "UPDATE student SET studentRegCode= \"$registrationNumber\", name= \"$name\", fatherName= \"$fatherName\", contactNumber= \"$contact\", officialEmail= \"$officialMail\"
            , personalEmail= \"$personalMail\", bloodGroup= \"$bloodGroup\", address= \"$address\", dateOfBirth= \"$dob\", authenticationCode = \"$authenticateCode\"
             WHERE studentRegCode = \"$oldReg\" and  sectionCode= \"$sectionCode\"";

        return $this->databaseConnection->query($sql);
    }

    public function deleteStudentRecord($studentRegCode): bool
    {
        $sql = /** @lang text */
            "delete from student where studentRegCode = \"$studentRegCode\";";
        $result = $this->databaseConnection->query($sql);
        if ($result === TRUE)
            return true;
        else
            return false;
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

    function updateProfileInfo($name, $email, $contact , $regCode): bool
    {
        $this->studentRegistrationCode = $regCode;

        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $sql = /** @lang text */
            "UPDATE student stu    SET stu.name = '$name', stu.personalEmail = '$email', stu.contactNumber = '$contact'
            WHERE stu.studentRegCode = '$this->studentRegistrationCode'";

        if ($this->databaseConnection->query($sql) === TRUE) {
            $this->setUserDataInstance(/** @lang text */ "select * from student where studentRegCode = '$this->studentRegistrationCode'", $this->studentRegistrationCode);
            return true;
        } else {
            echo "Error updating record: " . $this->databaseConnection->error;
            return false;
        }

    }

    function updatePassword($password, $studentRegCode): bool
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $sql = /** @lang text */
            "UPDATE student stu SET stu.password = '$password' WHERE stu.studentRegCode = '$studentRegCode'";

        if ($this->databaseConnection->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error updating Password: " . $this->databaseConnection->error;
            return false;
        }

    }



    public function logout()
    {
        session_destroy();
    }

    public function getInstance()
    {
        return $this->personalInfo;
    }

    public function getStudentRegistrationCode()
    {
        return $this->studentRegistrationCode;
    }


    public function setStudentRegistrationCode($studentRegistrationCode): void
    {
        $this->studentRegistrationCode = $studentRegistrationCode;
    }


}


?>