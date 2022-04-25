<?php

class UserRole implements Visitor
{
    protected $email;
    protected $password;
    protected $personalInfo;
    protected $databaseConnection;
    protected $navigationUrl;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
    }

    public function setUserDataInstance($query , $userCode): void
    {
        $personalDetails = array();
        $sql = $query;
        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $personalDetails = $row;
            }
        } else
            echo "Not found : " . $userCode."<br><br><br><br>";
        $this->personalInfo = $personalDetails;
    }


    public function login($email, $password)
    {}

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPersonalInfo()
    {
        return $this->personalInfo;
    }

    /**
     * @param mixed $personalInfo
     */
    public function setPersonalInfo($personalInfo): void
    {
        $this->personalInfo = $personalInfo;
    }


    public function getDatabaseConnection(): ?mysqli
    {
        return $this->databaseConnection;
    }



    public function getNavigationUrl()
    {
        return $this->navigationUrl;
    }

    public function setNavigationUrl($navigationUrl): void
    {
        $this->navigationUrl = $navigationUrl;
    }


}


?>