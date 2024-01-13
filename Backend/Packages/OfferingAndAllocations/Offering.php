<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";

class Offering
{
    protected $databaseConnection;

    public function __construct()
    {
        $this->databaseConnection = DatabaseSingleton:: getConnection();
    }

    function retrieveCoursesOfferedToABatchInSemester($batchCode, $semesterCode, $programCode): array
    {
        $sql1 = /** @lang text */
            "select c2.courseCode, creditHours  from courseoffered co
            join courseoffering c on c.offeringCode = co.offeringCode
            join course c2 on c2.courseCode = co.courseCode
            where semesterCode = \"$semesterCode\" and batchCode = \"$batchCode\" and programCode = \"$programCode\"";

        $result = $this->databaseConnection->query($sql1);

        $offeredCourses = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $course = new Course();
                $course->setCourseCode($row['courseCode']);
                $course->setCreditHours($row['creditHours']);
                array_push($offeredCourses, $course);
//                echo "kkk";
            }
        }
//        print_r($offeredCourses);
        return $offeredCourses;

    }

//    Bukhari's

    function retrieveLatestSeasons(): array
    {
        $sql1 = /** @lang text */
            "select * from season where dateCreated between (select date(date_sub(curdate(), interval 6 MONTH ))) and curdate()";

        $result = $this->databaseConnection->query($sql1);

        $seasonsList = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $season = new Season();
                $season->setSeasonCode($row['seasonCode']);
                $season->setSeasonName($row['seasonName']);
                $season->setDateCreated($row['dateCreated']);
                array_push($seasonsList, $season);
            }
        }
        return $seasonsList;
    }
    
    public function isOfferingMade($seasonCode, $batchCode, $semesterCode, $curriculumCode)
    {
        $sql1 = /** @lang text */
            "select * from courseoffering where seasonCode = \"$seasonCode\" and batchCode =\"$batchCode\" and 
            semesterCode = \"$semesterCode\" and curriculumCode = \"$curriculumCode\";";

        $result = $this->databaseConnection->query($sql1);

        if (mysqli_num_rows($result) == 1) {
            return true;
        }
        return false;
    }

    public function createOffering($seasonCode, $batchCode, $semesterCode, $curriculumCode, $courseCodeList)
    {
        $sql1 = /** @lang text */
            "INSERT INTO courseoffering (semesterCode, curriculumCode, batchCode, seasonCode, monthModified)
                VALUES (\"$semesterCode\", \"$curriculumCode\", \"$batchCode\", \"$seasonCode\", curdate());";

        $result = $this->databaseConnection->query($sql1);

        if ($result === TRUE) {
            return true;
        }
        return false;
    }


    public function createCourses($courseCode, $courseTitle, $programCode, $creditHours, $curriclumCode)
    {
        $sql1 = /** @lang text */
            "INSERT IGNORE INTO course (courseCode, programCode, courseTitle, creditHours, curriculumCode) 
            VALUES (\"$courseCode\", \"$programCode\", \"$courseTitle\", \"$creditHours\", \"$curriclumCode\");";

        $result = $this->databaseConnection->query($sql1);

        if ($result === TRUE) {
            return true;
        }
        return false;
    }


    public function createOfferedCourses($courseCodeList)
    {
        foreach ($courseCodeList as $courseCode) {

            $sql1 = /** @lang text */
                "INSERT IGNORE INTO courseoffered (offeringCode, courseCode)
                VALUES ((select offeringCode from courseoffering order by offeringCode desc limit 1), \"$courseCode\");";

            $result = $this->databaseConnection->query($sql1);

            if ($result === FALSE) {
                return false;
            }
        }
        return true;
    }

}