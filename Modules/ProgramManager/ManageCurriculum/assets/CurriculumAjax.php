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
        $assignCurriculumYear = $_POST['assignCurriculumYear']; //  2022
        $curriculumName = $_POST['curriculumName']; // spring 2022
        $updateCurriculumOutcomeList = $_POST['curriculumPloArray'];

        if ($curriculum->createCurriculum($programCode, $assignCurriculumYear, $curriculumName)) { // create the curriculum and store the CurriculumCode.
            $curriculumCode = $curriculum->getCurriculumCode(); // newly created curriculum ID/ CurriculumCode.
            /** Removed. */
            /*   $program = new Program();
              $program->createProgram($curriculumCode, $departmentCode, $programType);
              $programCode = $program->getProgramCode();*/

            if ($plo->createProgramOutcomeCurriculum($programCode, $curriculumCode, $updateCurriculumOutcomeList))
                $resultBackServer = updateServer(1, "successfully", "none");
            else
                $resultBackServer = updateServer(0, "Can not create Program Learning Outcome , please try again.", "Failed");
        } else
            $resultBackServer = updateServer(0, "Can not create curriculum , please try again.", "Failed");

        die(json_encode($resultBackServer));
    }
}


/** Curriculum Program Outcome Deletion */
elseif (isset($_POST['deletionOutcome']) and $_POST['deletionOutcome']) {

    if ($_POST['deletedCurriculumList'] !== "" and isset($_POST['deletedCurriculumList'])) {
        $toDeleteCurriculumList = $_POST['deletedCurriculumList'];
        $curriculumCode = $_POST['curriculumCode'];

        if (is_array($toDeleteCurriculumList)) // if it is empty.
            foreach ($toDeleteCurriculumList as $currentPloCode) {
                $status = $plo->removeProgramOutcome($programCode, $curriculumCode , $currentPloCode);
                if ($status === false)
                    $message[] = "PLO Code : " . $currentPloCode . " could not be delete";
            }
        if (!empty($message)) // operation fail to delete.
            $resultBackServer = updateServer(0, $message, "error");

        $resultBackServer = updateServer(1, "successfully", "none");
    } else
        $resultBackServer = updateServer(0, $message, "no-record");
    die(json_encode($resultBackServer));

}


/** Curriculum Program Outcome Update and creates recently added once. */
elseif (isset($_POST['modifyOutcome']) and $_POST['modifyOutcome']) {

    if (isset($_POST['updateCurriculumOutcomeList'])) { // is your updated List not empty or null ?
        $updateCurriculumOutcomeList = $_POST['updateCurriculumOutcomeList'];
        $curriculumOutcomeUpdateArrayKeyList = $_POST['curriculumOutcomeUpdateArrayKeyList'];
        $curriculumCode = $_POST['curriculumCode'];

        foreach ($updateCurriculumOutcomeList as $key => $currentPlo) {
//            $ploCode = $curriculumOutcomeUpdateArrayKeyList[$key];
            $ploCode = $key;
            if ($plo->updateProgramOutcome($curriculumCode , $ploCode, $currentPlo) === false)
                $message[] = "PLO Code : " . $ploCode . " could not be updated.";
        }

        /*if (isset($_POST['recentlyAddedCurriculumOutcomeList'])) { // is your recently added list not empty nor null
            $recentlyAddedCurriculumOutcomeList = $_POST['recentlyAddedCurriculumOutcomeList'];

            if ($plo->createProgramOutcomeCurriculum($programCode, $curriculumCode, $recentlyAddedCurriculumOutcomeList))
                $resultBackServer = updateServer(1, "successfully", "none");
            else
                $resultBackServer = updateServer(0, "Some-time went wrong ,try again.", "no-record");
        }*/

        die(json_encode($resultBackServer));
    }
}

/** Respective Curriculum Against Us ky PLOs List. */
elseif (isset($_POST['requestPlo']) and $_POST['requestPlo']) {

    $curriculumCode = $_POST['curriculumCode'];

    $programLearningOutcomeList = $plo->retrieveSelectedCurriculumPlo($curriculumCode, $programCode);
    if ($programLearningOutcomeList !== null)
        $resultBackServer = updateServer(1, $programLearningOutcomeList, "none");
    else
        $resultBackServer = updateServer(0, "No Program Learning Outcome list is available, try again.", "no-record");
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