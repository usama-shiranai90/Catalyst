<?php
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\CourseProfile\CourseProfile.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DIM\Curriculum.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
session_start();


if (isset($_POST['saved'])) {
    if ($_POST['saved']) {

        if (isset($_POST['arrayCLO']) && isset($_POST['arrayMapping']) && isset($_POST['courseEssentialFieldValue']) && isset($_POST['courseDetailFieldValue'])) {
            $courseProfile = new CourseProfile();
            $curriculum = new Curriculum();

            $courseEssentialArray = $_POST['courseEssentialFieldValue'];
            $courseDetailArray = $_POST['courseDetailFieldValue'];
            $courseCloDescriptionArray = $_POST['arrayCLO'];
            $courseMappingArray = $_POST['arrayMapping'];

            $courseProfile->setCourseInfo($courseEssentialArray[0], $courseEssentialArray[1], $courseEssentialArray[2], $courseEssentialArray[3], $courseEssentialArray[4],
                $courseEssentialArray[5], $courseEssentialArray[6], $courseEssentialArray[7], $courseEssentialArray[8], $courseEssentialArray[9], $courseEssentialArray[10],
                $courseDetailArray[0], $courseDetailArray[1], $courseDetailArray[2], $courseDetailArray[3], $_SESSION['selectedProgram'], $_SESSION['batchCode']);

            $courseProfile->setAssessmentInfo($courseEssentialArray[11], $courseEssentialArray[12], $courseEssentialArray[13], $courseEssentialArray[14], $courseEssentialArray[15]);
            $courseProfile->setInstructorInfo($courseDetailArray[4], $courseDetailArray[5], $courseDetailArray[6], $courseDetailArray[7], $courseDetailArray[8], $courseDetailArray[9]);
            $courseProfile->saveCourseProfileData($courseCloDescriptionArray, $courseMappingArray, $_SESSION['ploList']);
            $_SESSION['cp_id'] = $courseProfile->getCourseProfileCode();
            die((json_encode(array('message' => 'Data Send Successfully'))));

        }
        else {
            echo $_POST['arrayCLO'];
            echo $_POST['arrayMapping'];
            echo $_POST['courseEssentialFieldValue'];
            echo $_POST['courseDetailFieldValue'];
            die(json_encode(array('message' => 'ERROR')));
        }


    } else
        die(json_encode(array('message' => 'Saving data not working fine')));
}
?>