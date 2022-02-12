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

        $curriculum->fetchCurriculumID($_SESSION['selectedSection']);

        if (isset($_POST['deletedCLOIdsArray'])) {

            $deletedCLO = $_POST['deletedCLOIdsArray']; // outcome description and CLO-PLO Mapping
            $selectedProgram = $_SESSION['selectedProgram'];
            $batchCode = $_SESSION['batchCode'];
            $selectedCurriculum = $_SESSION['selectedCurriculum'];

            if (is_array($deletedCLO)) { // if it is empty.
                foreach ($deletedCLO as $currentCLOCode)
                    $courseProfile->deleteCLOPLOMapping($currentCLOCode);

                // create a method to delete CLO from table , work on 9-feb-2022 10 pm .
            }

            if (isset($_POST['remainingCLOIds'])){
                $mappings = $_POST['remainingCLOIds']; // delete only CLO-PLO Mapping.
                if ($mappings != null and count($mappings) != 0) {
                    foreach ($mappings as $currentCLOCode)
                        $courseProfile->deleteCLOPLOMapping($currentCLOCode);
                }
            }

            echo(json_encode(array('message' => 'Course Profile Description and Mapping Relation Deleted.')));

        } else {
            echo print_r(json_encode($_POST['deletedCLOIdsArray'])) . "<br>";
            echo print_r($_POST['remainingCLOIds']) . "<br>";
            die(json_encode(array('message' => 'ERROR123')));
        }
    } else
        die(json_encode(array('message' => 'deleting data not working fine')));
}
?>