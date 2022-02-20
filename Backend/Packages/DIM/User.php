<?php
//include "../DatabaseConnection/DatabaseSingleton.php";

class User
{
    protected $email;
    protected $password;
    protected $personalDetails;
    protected $databaseConnection;

/*    public function __construct($email, $password)
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
        $this->email = $email;
        $this->password = $password;
    }*/

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
    }

    public function getPersonalDetails(): array
    {
        return $this->personalDetails;
    }

    public function logout()
    {
        session_destroy();
    }

}

?>