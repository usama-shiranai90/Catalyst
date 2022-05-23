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
    public function isOfferingMade($seasonCode, $batchCode, $semesterCode, $curriculumCode)
    {
        $sql1 = /** @lang text */
            "select * from courseoffering where seasonCode = \"$seasonCode\" and batchCode =\"$batchCode\" and 
            seasonCode = \"$semesterCode\" and curriculumCode = \"$curriculumCode\";";

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
//            $this->createOfferedCourses($courseCodeList);
        }
        return false;
    }

    public function createOfferedCourses($courseCodeList)
    {
        foreach ($courseCodeList as $courseCode){

        $sql1 = /** @lang text */
            "INSERT INTO courseoffered (offeringCode, courseCode)
                VALUES ((select offeringCode from courseoffering order by offeringCode desc limit 1), \"$courseCode\");";
        }

        $result = $this->databaseConnection->query($sql1);

        if ($result === TRUE) {
            return true;
        }
        return false;
    }

}