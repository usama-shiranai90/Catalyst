<?php
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\OfferingAndAllocations\Allocations.php";
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\OfferingAndAllocations\Course.php";
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\OfferingAndAllocations\CLO.php";
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DIM\Section.php";
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DIM\Student.php";
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DIM\Semester.php";
//include "UserInterface.php";
//include "User.php";
require_once $_SERVER['DOCUMENT_ROOT']."\Modules\autoloader.php";

class Faculty extends User implements UserInterface
{

    private static $instance = null;
    private $facultyCode = "";
    private $listOfAllocations;

    private function __construct()
    {
        parent::__construct();
        $this->personalDetails = array();
    }

    public static function getFacultyInstance(): ?Faculty
    {
        if (self::$instance == null) {
            self::$instance = new Faculty();
//            echo "helooooooooooooooo";
        } else {
//            echo "old";
        }

        return self::$instance;
    }

    public function login($email, $password): bool
    {
        $this->email = $email;
        $this->password = $password;

        $sql = "SELECT facultyCode FROM faculty where officialEmail = \"$this->email\" and password = \"$this->password\"";

        $authenticationResult = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $this->facultyCode = $row["facultyCode"];
            }
            return true;
        } else
            return false;
    }

    public function retrieveAllocations($facultyCode): array
    {
        $allocation = new Allocations();
        $this->listOfAllocations = $allocation->retrieveAllocations($facultyCode);

        return $this->listOfAllocations;
    }

    public function getUserCode(): string
    {
        return $this->facultyCode;
    }

    public function getPersonalDetails(): array
    {
        return $this->personalDetails;
    }

    function updateProfile($name, $email, $showEmailStatus): bool
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $sql = /** @lang text */
            "UPDATE faculty t    SET t.name = '$name', t.officialEmail = '$email', t.showEmail = $showEmailStatus
            WHERE t.facultyCode = '$this->facultyCode'";

        if ($this->databaseConnection->query($sql) === TRUE) {
//            echo "Record updated successfully";
            $this->setPersonalDetails();
            return true;
        } else {
            return false;
            echo "Error updating record: " . $this->databaseConnection->error;
        }

    }

    public function setPersonalDetails(): void
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $personalDetails = array();
        $sql = "select * from faculty where facultyCode = '$this->facultyCode'";

        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) == 1) {
            while ($row = $result->fetch_assoc()) {
                $personalDetails = $row;
            }
//            echo print_r($personalDetails);
        } else
            echo "No details found for faculty code: " . $this->facultyCode;


        $this->personalDetails = $personalDetails;
    }

    function updatePassword($password): bool
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $sql = /** @lang text */
            "UPDATE faculty t SET t.password = '$password' WHERE t.facultyCode = '$this->facultyCode'";

        if ($this->databaseConnection->query($sql) === TRUE) {
//            echo "Record updated successfully";
            $this->setPersonalDetails();
            return true;
        } else {
            return false;
            echo "Error updating Password: " . $this->databaseConnection->error;
        }

    }


    public function logout()
    {
        session_destroy();
        header("Location: ../Authentication/Authentication.php");
    }


}