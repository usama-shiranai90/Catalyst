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

        if (isset($_POST['courseEssentialFieldValue']) && isset($_POST['courseDetailFieldValue']) && isset($_POST['arrayMapping'])
            && isset($_POST['recentlyAddedCLOsDescriptionArray']) && isset($_POST['courseCLODescriptionUpdateArray'])) {

            $curriculum->fetchCurriculumID($_SESSION['selectedSection']);
            $ploArray = $curriculum->retrievePLOsList();

            $courseEssentialArray = $_POST['courseEssentialFieldValue'];
            $courseDetailArray = $_POST['courseDetailFieldValue'];
            $courseMappingArray = $_POST['arrayMapping']; // mapped Clo to Plo two dimension matrix.

            $cloDescriptionKeyValue = $_POST['courseCLODescriptionUpdateArray'];  // existing Clo description array.
            $courseCloRecentDescriptionArray = $_POST['recentlyAddedCLOsDescriptionArray']; // newly created clo description array.

            $courseProfile->setCourseInfo($courseEssentialArray[0], $courseEssentialArray[1], $courseEssentialArray[2], $courseEssentialArray[3], $courseEssentialArray[4],
                $courseEssentialArray[5], $courseEssentialArray[6], $courseEssentialArray[7], $courseEssentialArray[8], $courseEssentialArray[9], $courseEssentialArray[10],
                $courseDetailArray[0], $courseDetailArray[1], $courseDetailArray[2], $courseDetailArray[3], $_SESSION['selectedProgram'], $_SESSION['batchCode']);

            $courseProfile->setAssessmentInfo($courseEssentialArray[11], $courseEssentialArray[12], $courseEssentialArray[13], $courseEssentialArray[14], $courseEssentialArray[15]);
            $courseProfile->setInstructorInfo($courseDetailArray[4], $courseDetailArray[5], $courseDetailArray[6], $courseDetailArray[7], $courseDetailArray[8], $courseDetailArray[9]);

            $courseProfile->modifyCourseProfileData($_SESSION['cp_id']);  /** Modifies the Course Essential and Detail page information */

            $cloCodeArrayExisting = array();
            foreach ($cloDescriptionKeyValue as $key => $value) {
                $courseProfile->updateCourseProfileCLODescription($key, $_SESSION['selectedCurriculum'], $value);  /** update the Course Profile Description */
                $cloCodeArrayExisting[] = $key;
            }

            $courseProfile->createCourseCLOs($courseCloRecentDescriptionArray, $courseMappingArray, $_SESSION['ploList'], $cloCodeArrayExisting);
            die((json_encode(array('message' => 'Data Send Successfully'))));

        } else {
            die(json_encode(array('message' => 'Can not update Course profile due to missing info')));
        }
    } else
        die(json_encode(array('message' => 'Saving data not working fine')));
}
?>