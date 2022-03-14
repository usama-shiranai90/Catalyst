<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
if (session_status() === PHP_SESSION_NONE || !isset($_SESSION))
    session_start();

$resultBackServer = array("status" => -1, "message" => 'no message', "errors" => 'no error');
$adminCode = $_SESSION['adminCode'];
$departmentCode = $_SESSION['departmentCode'];

$curriculum = new Curriculum();
$plo = new PLO();
if (isset($_POST['creation']) and $_POST['creation']) {
    if (isset($_POST['curriculumPloArray']) and isset($_POST['assignCurriculumYear'])) {
        $assignYear = $_POST['assignCurriculumYear'];
        $curriculumRelatedPlo = $_POST['curriculumPloArray'];

        if ($curriculum->createCurriculum($assignYear)) {
            if ($plo->createProgramOutcomeCurriculum(1, $curriculum->getCurriculumCode(), $curriculumRelatedPlo))
                $resultBackServer = updateServer(1, "cgpa", "none");
            else
                $resultBackServer = updateServer(0, "Some-time went wrong ,try again.", "no-record");
        } else
            $resultBackServer = updateServer(0, "Some-time went wrong ,try again.", "no-record");

        die(json_encode($resultBackServer));
    }
}


?>