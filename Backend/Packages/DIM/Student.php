<?php

class Student extends User implements UserInterface
{
    private $studentRegistrationCode;
    private $studentName;

    public function __construct()
    {
        parent::__construct();
    }

    public function getStudentRegistrationCode()
    {
        return $this->studentRegistrationCode;
    }

    public function setStudentRegistrationCode($studentRegistrationCode): void
    {
        $this->studentRegistrationCode = $studentRegistrationCode;
    }

    public function getStudentName()
    {
        return $this->studentName;
    }

    public function setStudentName($studentName): void
    {
        $this->studentName = $studentName;
    }

    public function toString()
    {
        echo "Student Name: " . $this->studentName;
        echo "Student Roll No: " . $this->studentRegistrationCode;
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
            }
            return true;
        } else
            return false;
    }

    public function getUserCode()
    {
        return $this->studentRegistrationCode;
    }

    public function setPersonalDetails(): void
    {
        $personalDetails = array();
        $sql = /** @lang text */
            "select * from student where studentRegCode = '$this->studentRegistrationCode'";

        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) == 1) {
            while ($row = $result->fetch_assoc()) {
                $personalDetails = $row;
            }
        } else
            echo "No details found for Student Registration Code: " . $this->studentRegistrationCode;

        $this->personalDetails = $personalDetails;
    }

    function updateProfileInfo($name, $email, $contact , $regCode): bool
    {
        $this->studentRegistrationCode = $regCode;

        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $sql = /** @lang text */
            "UPDATE student stu    SET stu.name = '$name', stu.personalEmail = '$email', stu.contactNumber = '$contact'
            WHERE stu.studentRegCode = '$this->studentRegistrationCode'";

        if ($this->databaseConnection->query($sql) === TRUE) {
            $this->setPersonalDetails();
            return true;
        } else {
            echo "Error updating record: " . $this->databaseConnection->error;
            return false;
        }

    }

    function updatePassword($password, $idk): bool
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $sql = /** @lang text */
            "UPDATE student stu SET stu.password = '$password' WHERE stu.studentRegCode = '$idk'";

        if ($this->databaseConnection->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error updating Password: " . $this->databaseConnection->error;
            return false;
        }

    }


}