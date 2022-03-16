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
//        $programCode = 1; // $_SESSION['programCode']
        $programType = $_POST['programType'];
        $programType = compareProgramType($programType); // get the value from user side by BCSE/ BCIT and convert it into full name.

        if ($curriculum->createCurriculum($assignYear)) { // create the curriculum and store the CurriculumCode.
            $curriculumCode = $curriculum->getCurriculumCode();
            $program = new Program();
            $program->createProgram($curriculumCode, $departmentCode, $programType);
            $programCode = $program->getProgramCode();
            if ($plo->createProgramOutcomeCurriculum($programCode, $curriculumCode,  $curriculumRelatedPlo))
                $resultBackServer = updateServer(1, "successfully", "none");
            else
                $resultBackServer = updateServer(0, "Some-time went wrong ,try again.", "no-record");
        } else
            $resultBackServer = updateServer(0, "Some-time went wrong ,try again.", "no-record");

        die(json_encode($resultBackServer));
    }
} elseif (isset($_POST['requestPlo']) and $_POST['requestPlo']) {
    if (isset($_POST['curriculumId'])) {
        $curriculumCode = $_POST['curriculumId'];
        $programType = $_POST['programType'];
        $plo = new PLO();
        $ploArray = $plo->retrieveSelectedCurriculumPlo($curriculumCode, $programType);
        if (sizeof($ploArray) > 1)
            $resultBackServer = updateServer(1, $ploArray, "none");
        else
            $resultBackServer = updateServer(0, $ploArray, "no-record");
    }
    die(json_encode($resultBackServer));
}

?>