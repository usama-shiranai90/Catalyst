<?php
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\CourseProfile\CourseProfile.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DIM\Curriculum.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//echo realpath(dirname(__FILE__));

if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
}

$courseProfile = new CourseProfile();
$curriculum = new Curriculum();

if (isset($_POST['update'])) {

    if ($_POST['update']) {

        if (isset($_POST['arrayCLO']) && isset($_POST['arrayMapping']) && isset($_POST['courseEssentialFieldValue']) && isset($_POST['courseDetailFieldValue'])) {

            $array_courseEssential = $_POST['courseEssentialFieldValue'];
            $array_courseDetail = $_POST['courseDetailFieldValue'];
            $array_cCLO = $_POST['arrayCLO'];
            $array_cMapping = $_POST['arrayMapping'];

            $courseProfile->setCourseInfo($array_courseEssential[0], $array_courseEssential[1], $array_courseEssential[2], $array_courseEssential[3], $array_courseEssential[4],
                $array_courseEssential[5], $array_courseEssential[6], $array_courseEssential[7], $array_courseEssential[8], $array_courseEssential[9], $array_courseEssential[10],
                $array_courseDetail[0], $array_courseDetail[1], $array_courseDetail[2], $array_courseDetail[3], $_SESSION['selectedProgram'], $_SESSION['batchCode']);

            $courseProfile->setAssessmentInfo($array_courseEssential[11], $array_courseEssential[12], $array_courseEssential[13], $array_courseEssential[14], $array_courseEssential[15]);
            $courseProfile->setInstructorInfo($array_courseDetail[4], $array_courseDetail[5], $array_courseDetail[6], $array_courseDetail[7], $array_courseDetail[8], $array_courseDetail[9]);

            $courseProfile->modifyCourseProfileData( $_SESSION['cp_id']);

            $_SESSION['cp_id'] = $courseProfile->getCourseProfileCode();
            die((json_encode(array('message' => 'Data Send Successfully'))));

        } else {
            echo $_POST['arrayCLO'];
            echo $_POST['arrayMapping'];
            echo $_POST['courseEssentialFieldValue'];
            echo $_POST['courseDetailFieldValue'];
            die(json_encode(array('message' => 'ERROR')));
        }
    }
    else
        die(json_encode(array('message' => 'Saving data not working fine')));
}
?>