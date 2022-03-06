<?php

class Admin extends User implements UserInterface
{

    private $adminCode = "";
    private $departmentCode = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {
        $this->email = $email;
        $this->password = $password;

        $sql = /** @lang text */
            "SELECT facultyCode,departmentCode, additionalResponsibility FROM faculty where additionalEmail = \"$this->email\" and additionalPassword = \"$this->password\"";

        $authenticationResult = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
                if ($row["additionalResponsibility"] == "Head of Department") {
                    $this->adminCode = $row["facultyCode"];
                    $this->departmentCode = $row["departmentCode"];
                    return "HOD";
                }
                else if ($row['additionalResponsibility'] == "Program Manager"){
                    $this->adminCode = $row["facultyCode"];
                    $this->departmentCode = $row["departmentCode"];
                    return "PM";
                }
            }
        } else
            return null;
    }

    public function getDepartmentCode(): string
    {
        return $this->departmentCode;
    }

    public function setDepartmentCode(string $departmentCode): void
    {
        $this->departmentCode = $departmentCode;
    }



    public function getUserCode(): string
    {
        return $this->adminCode;
    }

    public function setPersonalDetails(): void
    {
        $personalDetails = array();
        $sql = /** @lang text */
            "select * from faculty where facultyCode = '$this->adminCode'";

        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) == 1) {
            while ($row = $result->fetch_assoc()) {
                $personalDetails = $row;
            }
//            echo print_r($personalDetails);
        } else
            echo "No admin details found for faculty code: " . $this->adminCode;
        $this->personalDetails = $personalDetails;
    }

    public function getPersonalDetails(): array
    {
        return $this->personalDetails;
    }

    public function logout()
    {
        session_destroy();
        header("Location: ../Authentication/Authentication.php");
    }


}
