<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\ServerPerformance.php";
if (session_status() === PHP_SESSION_NONE || !isset($_SESSION))
    session_start();

$resultBackServer = array("status" => -1, "message" => 'no message', "errors" => 'no error');
$message = [];
$adminCode = $_SESSION['adminCode'];
$programCode = $_SESSION['programCode'];
//$departmentCode = $_SESSION['departmentCode'];

$curriculum = new Curriculum();
$plo = new PLO();

/** Curriculum Program Outcome Creation */
if (isset($_POST['creation']) and $_POST['creation']) {
    if (isset($_POST['curriculumPloArray']) and isset($_POST['assignCurriculumYear'])) {
        $assignYear = $_POST['assignCurriculumYear'];
        $curriculumName = $_POST['curriculumName'];
        $curriculumRelatedPlo = $_POST['curriculumPloArray'];

        if ($curriculum->createCurriculum($assignYear, $curriculumName)) { // create the curriculum and store the CurriculumCode.
            $curriculumCode = $curriculum->getCurriculumCode();
            /** Removed. */
            /*   $program = new Program();
              $program->createProgram($curriculumCode, $departmentCode, $programType);
              $programCode = $program->getProgramCode();*/

            if ($plo->createProgramOutcomeCurriculum($programCode, $curriculumCode, $curriculumRelatedPlo))
                $resultBackServer = updateServer(1, "successfully", "none");
            else
                $resultBackServer = updateServer(0, "Some-time went wrong ,try again.", "no-record");
        } else
            $resultBackServer = updateServer(0, "Some-time went wrong ,try again.", "no-record");

        die(json_encode($resultBackServer));
    }
} /** Curriculum Program Outcome Deletion */
elseif (isset($_POST['deletionOutcome']) and $_POST['deletionOutcome']) {

    if ($_POST['deletedCurriculumOutcomeList'] !== "" and isset($_POST['deletedCurriculumOutcomeList'])) {
        $toDeleteCurriculumList = $_POST['deletedCurriculumOutcomeList'];
        $curriculumCode = $_POST['curriculumCode'];

        if (is_array($toDeleteCurriculumList)) // if it is empty.
            foreach ($toDeleteCurriculumList as $currentPloCode) {
                $status = $plo->removeProgramOutcome($currentPloCode, $programCode, $curriculumCode);
                if ($status === false)
                    $message[] = "PLO Code : " . $curriculumCode . " could not be delete";
            }
        if (empty($message))
            $resultBackServer = updateServer(0, $message, "error");

        $resultBackServer = updateServer(1, "successfully", "none");
    } else
        $resultBackServer = updateServer(0, $message, "no-record");
    die(json_encode($resultBackServer));

} /** Curriculum Program Outcome Update and creation of recently create one*/
elseif (isset($_POST['modifyOutcome']) and $_POST['modifyOutcome']) {

    if (isset($_POST['updateCurriculumOutcomeList'])) {
        $curriculumRelatedPlo = $_POST['updateCurriculumOutcomeList'];
        $curriculumPloKeyList = $_POST['curriculumOutcomeKeyList'];
        $curriculumCode = $_POST['curriculumCode'];

        foreach ($curriculumRelatedPlo as $index => $currentPlo) {
            $ploCode = $curriculumPloKeyList[$index];
            if ($plo->updateProgramOutcome($ploCode, $curriculumCode, $currentPlo) === false)
                $message[] = "PLO Code : " . $curriculumCode . " could not be updated.";
        }

        if (isset($_POST['recentlyAddedCurriculumOutcomeList'])) {
            $curriculumOutcomeList = $_POST['recentlyAddedCurriculumOutcomeList'];
            if ($plo->createProgramOutcomeCurriculum($programCode, $curriculumCode, $curriculumOutcomeList))
                $resultBackServer = updateServer(1, "successfully", "none");
            else
                $resultBackServer = updateServer(0, "Some-time went wrong ,try again.", "no-record");
        }

        die(json_encode($resultBackServer));
    }
} /** Curriculum Program Outcome Creation */
elseif (isset($_POST['requestPlo']) and $_POST['requestPlo']) {
    if (isset($_POST['curriculumCode'])) {
        $curriculumCode = $_POST['curriculumCode'];
        $plo = new PLO();
        $ploArray = $plo->retrieveSelectedCurriculumPlo($curriculumCode, $programCode);
        if (sizeof($ploArray) > 1)
            $resultBackServer = updateServer(1, $ploArray, "none");
        else
            $resultBackServer = updateServer(0, $ploArray, "no-record");
    }
    die(json_encode($resultBackServer));
}


/** Ajeeb Testing */
/*elseif (isset($_POST['testing']) and $_POST['testing']) {
    if (isset($_POST['updateCurriculumList'])) {
        $curriculumRelatedPlo = $_POST['updateCurriculumList'];
        foreach ($curriculumRelatedPlo as $currentPlo) {
            $message[] = $currentPlo;
        }
        $resultBackServer = updateServer(0, $message, "idk");
        die(json_encode($resultBackServer));

    }
}*/
?>