<?php
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\CourseProfile\CourseProfile.php";
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DIM\Curriculum.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\ServerPerformance.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";

if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
}

$resultBackServer = array("status" => -1, "message" => 'no message', "errors" => 'no error');

$courseProfile = new CourseProfile();
$curriculum = new Curriculum();

$programCode = $_SESSION['selectedProgram'];
$batchCode = $_SESSION['batchCode'];
$curriculumCode = $_SESSION['selectedCurriculum'];
$ploArray = $_SESSION['ploList'];

$sectionCode = $_SESSION['selectedSection'];

if (isset($_POST['saved']) and $_POST['saved']) {
    if (isset($_POST['arrayCLO']) && isset($_POST['arrayMapping']) && isset($_POST['courseEssentialFieldValue']) && isset($_POST['courseDetailFieldValue'])) {

        $courseEssentialArray = $_POST['courseEssentialFieldValue'];
        $courseDetailArray = $_POST['courseDetailFieldValue'];
        $courseCloDescriptionArray = $_POST['arrayCLO'];
        $courseMappingArray = $_POST['arrayMapping'];
        $courseInstructorList = $_POST['courseInstructorList'];

        $courseProfile->setCourseInfo($courseEssentialArray[0], $courseEssentialArray[1], $courseEssentialArray[2], $courseEssentialArray[3], $courseEssentialArray[4],
            $courseEssentialArray[5], $courseEssentialArray[6], $courseEssentialArray[7], $courseEssentialArray[8], $courseEssentialArray[9], $courseEssentialArray[10],
            $courseDetailArray[0], $courseDetailArray[1], $courseDetailArray[2], $courseDetailArray[3], $programCode, $batchCode);

        $courseProfile->setAssessmentInfo($courseEssentialArray[11], $courseEssentialArray[12], $courseEssentialArray[13], $courseEssentialArray[14], $courseEssentialArray[15]);
        $courseProfile->setInstructorInfo($courseDetailArray[4], $courseDetailArray[5], $courseDetailArray[6], $courseDetailArray[7], $courseDetailArray[8], $courseDetailArray[9]);
        $courseProfile->saveCourseProfileData($courseCloDescriptionArray, $courseMappingArray, $ploArray , $courseInstructorList);
        $_SESSION['cp_id'] = $courseProfile->getCourseProfileCode();
        die((json_encode(array('message' => 'Data Send Successfully'))));

    } else {
        echo $_POST['arrayCLO'];
        echo $_POST['arrayMapping'];
        echo $_POST['courseEssentialFieldValue'];
        echo $_POST['courseDetailFieldValue'];
        die(json_encode(array('message' => 'ERROR')));
    }
} elseif (isset($_POST['del']) and $_POST['del']) {
    $curriculum->fetchCurriculumID($sectionCode);
    $failedToDeleteOutcomeLearningOutcomeList = array();
    $failedToDeleteOutcomeLearningOutcomeMappingList = array();
    $_POST['deletedCLOIdsArray'] = $_POST['deletedCLOIdsArray'] ?? null;  // outcome description IDs and CLO-PLO Mapping array

    if (isset($_POST['remainingCLOIds'])) {
        $mappings = $_POST['remainingCLOIds']; // delete only CLO-PLO Mapping.
        if ($mappings != null and count($mappings) != 0) {
            foreach ($mappings as $currentCLOCode)
                if (!$courseProfile->deleteCourseProfileCLOPLOMapping($currentCLOCode))
                    array_push($failedToDeleteOutcomeLearningOutcomeMappingList, $currentCLOCode);
        }
    } else {
        $resultBackServer = updateServer(400, "Cant get Course Learning Outcome , try again.", "ALERT " . SERVER_STATUS_CODES[400]);
        die(json_encode($resultBackServer));
    }

    if (gettype($_POST['deletedCLOIdsArray']) != NULL and is_array($_POST['deletedCLOIdsArray']) && !empty($_POST['deletedCLOIdsArray'])) // if it is empty.
    {
        $deletedCLO = $_POST['deletedCLOIdsArray'];
        foreach ($deletedCLO as $currentCLOCode) {
            if (!$courseProfile->deleteCourseProfileDistributionRecord($currentCLOCode, $programCode, $batchCode))
                array_push($failedToDeleteOutcomeLearningOutcomeList, $currentCLOCode);

            if (!$courseProfile->deleteCourseProfileCLOPLOMapping($currentCLOCode))
                array_push($failedToDeleteOutcomeLearningOutcomeMappingList, $currentCLOCode);
        }
    }
//            $resultBackServer = updateServer(400, "To Delete Course Learning Outcome is not properly formatted/send. try again " . $_POST['deletedCLOIdsArray'], "ALERT " . SERVER_STATUS_CODES[400]);


    if (empty($failedToDeleteOutcomeLearningOutcomeList) and empty($failedToDeleteOutcomeLearningOutcomeMappingList))
        $resultBackServer = updateServer(200, "Operation performed successfully", SERVER_STATUS_CODES[200] . "|" . SERVER_STATUS_CODES[201]);
    else if (!empty($failedToDeleteOutcomeLearningOutcomeList) and empty($failedToDeleteOutcomeLearningOutcomeMappingList))
        $resultBackServer = updateServer(207, 'Failed to delete some course learning outcome mapping <br>',
            SERVER_STATUS_CODES[207]);


    die(json_encode($resultBackServer));
} elseif (isset($_POST['update']) and $_POST['update']) {

    if (isset($_POST['courseEssentialFieldValue']) && isset($_POST['courseDetailFieldValue']) && isset($_POST['arrayMapping'])
        && isset($_POST['courseCLODescriptionUpdateArray'])) {

        $curriculum->fetchCurriculumID($sectionCode);
        $ploArray = $curriculum->retrievePLOsList($_SESSION['selectedProgram']);

        $courseEssentialArray = $_POST['courseEssentialFieldValue'];
        $courseDetailArray = $_POST['courseDetailFieldValue'];
        $courseInstructorList = $_POST['courseInstructorList'];
        $courseMappingArray = $_POST['arrayMapping']; // mapped Clo to Plo two dimension matrix.

        $cloDescriptionKeyValue = $_POST['courseCLODescriptionUpdateArray'];  // existing Clo description array.

        $courseProfile->setCourseInfo($courseEssentialArray[0], $courseEssentialArray[1], $courseEssentialArray[2], $courseEssentialArray[3], $courseEssentialArray[4],
            $courseEssentialArray[5], $courseEssentialArray[6], $courseEssentialArray[7], $courseEssentialArray[8], $courseEssentialArray[9], $courseEssentialArray[10],
            $courseDetailArray[0], $courseDetailArray[1], $courseDetailArray[2], $courseDetailArray[3], $programCode, $batchCode);

        $courseProfile->setAssessmentInfo($courseEssentialArray[11], $courseEssentialArray[12], $courseEssentialArray[13], $courseEssentialArray[14], $courseEssentialArray[15]);
//        $courseProfile->setInstructorInfo($courseDetailArray[4], $courseDetailArray[5], $courseDetailArray[6], $courseDetailArray[7], $courseDetailArray[8], $courseDetailArray[9]);

        $isModifiedStatus = $courseProfile->modifyCourseProfileData($_SESSION['cp_id'], $courseInstructorList);
        if (!empty($isModifiedStatus)) {
            if (in_array(-1, $isModifiedStatus) and in_array(-2, $isModifiedStatus) and in_array(-3, $isModifiedStatus)) {
                $resultBackServer = updateServer(207, 'Failed to update Entire Course Profile ', SERVER_STATUS_CODES[207]);
                die(json_encode($resultBackServer));
            } elseif (in_array(-1, $isModifiedStatus)) {
                $resultBackServer = updateServer(207, 'Failed to update Course profile Basic Information ', SERVER_STATUS_CODES[207]);
            } elseif (in_array(-1, $isModifiedStatus)) {
                $resultBackServer = updateServer(207, 'Failed to update Course profile Instructors Information ', SERVER_STATUS_CODES[207]);
            } elseif (in_array(-1, $isModifiedStatus)) {
                $resultBackServer = updateServer(207, 'Failed to update Course profile CLO-PLO Mapping Information ', SERVER_STATUS_CODES[207]);
            }
        }


        /** Modifies the Course Essential and Detail page information */
        $cloCodeArrayExisting = array();
        foreach ($cloDescriptionKeyValue as $key => $value)
            if ($courseProfile->updateCourseProfileCLODescription($key, $curriculumCode, $value))
                $cloCodeArrayExisting[] = $key;
        /** update the Course Profile Description */


        if (isset($_POST['recentlyAddedCLOsDescriptionArray'])) {
            $courseCloRecentDescriptionArray = $_POST['recentlyAddedCLOsDescriptionArray']; // newly created clo description array.
            $courseProfile->createCourseCLOs($courseCloRecentDescriptionArray, $courseMappingArray, $ploArray, $cloCodeArrayExisting);
        } else
            $courseProfile->createCourseCLOs(null, $courseMappingArray, $ploArray, $cloCodeArrayExisting);

        if (!empty($isModifiedStatus))
            $resultBackServer = updateServer(200, "Operation performed successfully", SERVER_STATUS_CODES[200] . "" . SERVER_STATUS_CODES[201]);

    } else
        $resultBackServer = updateServer(400, "Can not update Course profile due to missing info. try again", "ALERT " . SERVER_STATUS_CODES[400]);

    die(json_encode($resultBackServer));
}
?>