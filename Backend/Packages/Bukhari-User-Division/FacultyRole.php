<?php

use JetBrains\PhpStorm\Pure;

class FacultyRole extends UserRole implements JsonSerializable
{

    protected $facultyCode;

    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
        $sql = /** @lang text */
            "SELECT facultyCode FROM faculty where officialEmail = \"$this->email\" and password = \"$this->password\"";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $this->facultyCode = $row["facultyCode"];
                $this->setUserDataInstance(/** @lang text */ "select * from faculty where facultyCode = '$this->facultyCode'", $this->facultyCode);
                $this->setNavigationUrl("../Teacher/TeacherDashboard.php");
                return true;
            }
        }
        return false;
    }

    public function retrieveFacultyListDepartment($departmentCode): ?array
    {
        $facultyList = array();
        $dbStatement = /** @lang text */
            "select facultyCode, name, CNIC, officialEmail, personalEmail, address, contactNumber, 
             designation, departmentCode from faculty where departmentCode = \"$departmentCode\"";

        $result = $this->databaseConnection->query($dbStatement);
        if (!empty(mysqli_num_rows($result)) && mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $facultyObject = new FacultyRole();
                $facultyObject->facultyCode = $row["facultyCode"] . "<br>";
                $facultyObject->setPersonalInfo($row);
                $facultyList[] = $facultyObject;
                //                echo json_encode($row)."<br><br><br><br>";
                //                $facultyObject->setUserDataInstance(/** @lang text */ "select * from faculty where facultyCode = '$facultyObject->facultyCode'", $facultyObject->facultyCode);
                //                print_r(json_encode($facultyList)."<br><br>");
            }
            return $facultyList;
        }
        return null;

    }


    public function logout()
    {
        session_destroy();
    }

    public function getFacultyCode()
    {
        return $this->facultyCode;
    }

    public function jsonSerialize(): mixed
    {
        return array(
            'facultyCode' => $this->getInstance()['facultyCode'],
            'name' => $this->getInstance()['name'],
            'officialEmail' => $this->getInstance()['officialEmail'],
            'PersonalEmail' => $this->getInstance()['personalEmail'],
            'CNIC' => $this->getInstance()['CNIC'],
            'address' => $this->getInstance()['address'],
            'contactNumber' => $this->getInstance()['contactNumber'],
            'designation' => $this->getInstance()['designation'],
            'departmentCode' => $this->getInstance()['departmentCode'],
        );

    }
}


?>