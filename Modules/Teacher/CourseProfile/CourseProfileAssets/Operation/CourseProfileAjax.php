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

        $courseProfile->setCourseInfo($courseEssentialArray[0], $courseEssentialArray[1], $courseEssentialArray[2], $courseEssentialArray[3], $courseEssentialArray[4],
            $courseEssentialArray[5], $courseEssentialArray[6], $courseEssentialArray[7], $courseEssentialArray[8], $courseEssentialArray[9], $courseEssentialArray[10],
            $courseDetailArray[0], $courseDetailArray[1], $courseDetailArray[2], $courseDetailArray[3], $programCode, $batchCode);

        $courseProfile->setAssessmentInfo($courseEssentialArray[11], $courseEssentialArray[12], $courseEssentialArray[13], $courseEssentialArray[14], $courseEssentialArray[15]);
        $courseProfile->setInstructorInfo($courseDetailArray[4], $courseDetailArray[5], $courseDetailArray[6], $courseDetailArray[7], $courseDetailArray[8], $courseDetailArray[9]);
        $courseProfile->saveCourseProfileData($courseCloDescriptionArray, $courseMappingArray, $ploArray);
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

    if ($_POST['deletedCLOIdsArray'] !== "" and isset($_POST['deletedCLOIdsArray'])) {  // Undefined array key when no id for deletion is pass.

        $deletedCLO = $_POST['deletedCLOIdsArray']; // outcome description IDs and CLO-PLO Mapping array

        if (is_array($deletedCLO)) // if it is empty.
            foreach ($deletedCLO as $currentCLOCode) {
                $courseProfile->deleteCourseProfileDistributionRecord($currentCLOCode, $programCode, $batchCode);
                $courseProfile->deleteCourseProfileCLOPLOMapping($currentCLOCode);
            }
    }

    if (isset($_POST['remainingCLOIds'])) {
        $mappings = $_POST['remainingCLOIds']; // delete only CLO-PLO Mapping.
        if ($mappings != null and count($mappings) != 0) {
            foreach ($mappings as $currentCLOCode)
                $courseProfile->deleteCourseProfileCLOPLOMapping($currentCLOCode);
        }
        echo(json_encode(array('message' => 'Course Profile Description and Mapping Relation Deleted.')));
    } else {
        echo print_r(json_encode($_POST['deletedCLOIdsArray'])) . "<br>";
        echo print_r($_POST['remainingCLOIds']) . "<br>";
        die(json_encode(array('message' => 'ERROR123')));
    }

} elseif (isset($_POST['update']) and $_POST['update']) {

    if (isset($_POST['courseEssentialFieldValue']) && isset($_POST['courseDetailFieldValue']) && isset($_POST['arrayMapping'])
        && isset($_POST['courseCLODescriptionUpdateArray'])) {

        $curriculum->fetchCurriculumID($sectionCode);
        $ploArray = $curriculum->retrievePLOsList($_SESSION['selectedProgram']);

        $courseEssentialArray = $_POST['courseEssentialFieldValue'];
        $courseDetailArray = $_POST['courseDetailFieldValue'];
        $courseMappingArray = $_POST['arrayMapping']; // mapped Clo to Plo two dimension matrix.

        $cloDescriptionKeyValue = $_POST['courseCLODescriptionUpdateArray'];  // existing Clo description array.

        $courseProfile->setCourseInfo($courseEssentialArray[0], $courseEssentialArray[1], $courseEssentialArray[2], $courseEssentialArray[3], $courseEssentialArray[4],
            $courseEssentialArray[5], $courseEssentialArray[6], $courseEssentialArray[7], $courseEssentialArray[8], $courseEssentialArray[9], $courseEssentialArray[10],
            $courseDetailArray[0], $courseDetailArray[1], $courseDetailArray[2], $courseDetailArray[3], $programCode, $batchCode);

        $courseProfile->setAssessmentInfo($courseEssentialArray[11], $courseEssentialArray[12], $courseEssentialArray[13], $courseEssentialArray[14], $courseEssentialArray[15]);
        $courseProfile->setInstructorInfo($courseDetailArray[4], $courseDetailArray[5], $courseDetailArray[6], $courseDetailArray[7], $courseDetailArray[8], $courseDetailArray[9]);

        $courseProfile->modifyCourseProfileData($_SESSION['cp_id']);
        /** Modifies the Course Essential and Detail page information */

        $cloCodeArrayExisting = array();
        foreach ($cloDescriptionKeyValue as $key => $value) {
            $courseProfile->updateCourseProfileCLODescription($key, $curriculumCode, $value);
            /** update the Course Profile Description */
            $cloCodeArrayExisting[] = $key;
        }

        if (isset($_POST['recentlyAddedCLOsDescriptionArray'])) {
            $courseCloRecentDescriptionArray = $_POST['recentlyAddedCLOsDescriptionArray']; // newly created clo description array.
            $courseProfile->createCourseCLOs($courseCloRecentDescriptionArray, $courseMappingArray, $ploArray, $cloCodeArrayExisting);
        } else {
//            echo "wtf im here" . json_encode($courseMappingArray);
            $courseProfile->createCourseCLOs(null, $courseMappingArray, $ploArray, $cloCodeArrayExisting);
        }
        die((json_encode(array('message' => 'Data Send Successfully'))));

    } else {
        die(json_encode(array('message' => 'Can not update Course profile due to missing info')));
    }

} else {
    die(json_encode(array('message' => 'operation could not be performed.' . json_encode($_POST))));
}

?>
