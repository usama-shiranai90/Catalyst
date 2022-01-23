<?php

class Semester
{
    public $semesterCode;
    public $semesterName;
    protected $databaseConnection;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();

    }

    public function getSemesterCode()
    {
        return $this->semesterCode;
    }

    public function setSemesterCode($semesterCode): void
    {
        $this->semesterCode = $semesterCode;
    }

    public function getSemesterName()
    {
        return $this->semesterName;
    }

    public function setSemesterName($semesterCode): void
    {
        $this->setSemesterCode($semesterCode);
        $sql = /** @lang text */
            "select semesterName from semester where semesterCode = \"$semesterCode\"";
        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $this->semesterName = $row["semesterName"];
            }
        } else
            echo "No semester found";
    }


    public function toString()
    {
        echo "<br>Semester Name:" . $this->getSemesterName();
        echo "<br>Semester Code:" . $this->getSemesterCode();
    }

}

?>