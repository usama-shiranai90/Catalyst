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

if (isset($_POST['del'])) {

    if ($_POST['del']) {
        if (isset($_POST['currentCLOID'])) {

            $currentID = $_POST['currentCLOID'];
            $curriculum->fetchCurriculumID($_SESSION['selectedSection']);
            $courseProfile->deleteCLORow($currentID, $_SESSION['selectedProgram'], $curriculum->getCurriculumCode());

            echo(json_encode(array('message' => 'Deleted Successfully')));

        } else {
            die(json_encode(array('message' => 'ERROR')));

        }
    } else
        die(json_encode(array('message' => 'deleting data not working fine')));
}
?>