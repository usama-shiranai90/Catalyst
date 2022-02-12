<?php
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\CourseProfile\CourseProfile.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\CourseProfile\WeeklyTopic.php";
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DIM\Curriculum.php";

if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
    $weeklyInfo = new WeeklyTopic();
    //    $courseProfile = new CourseProfile();
    //    $curriculum = new Curriculum();
    //    $cloObject = new CLO();
}

//$profileExist = $courseProfile->profileExist($_SESSION['selectedCourse'], $_SESSION['selectedProgram'], $_SESSION['selectedCurriculum']);
//if ($profileExist) {
//    $curriculum->fetchCurriculumID($_SESSION['selectedSection']);   // provide with ongoing section code.
//
//    $CLOList = $cloObject->retrieveCLOlist($curriculum->getCurriculumCode(), $_SESSION['selectedProgram'], $_SESSION['selectedCourse']); // array of clo-code and name.
//    foreach ($CLOList as $key => $value) {
//        $CLOList[$key][1] = removeCLODash($value[1]);;
//    }
//    $WeeklyTopicsArray = $weeklyInfo->retrieveWeeklyTopic($courseProfile->getCourseProfileCode());
//}

if (isset($_POST['creationW'])) {
    if ($_POST['creationW']) {
        if (isset($_POST['twoDimensionalWeeklyRecord'])) {
            $weeklyInfo->createWeeklyTopic($_SESSION['courseProfileCode'], $_POST['twoDimensionalWeeklyRecord']);
            echo(json_encode(array('message' => 'created  Successfully')));
        } else {
            die(json_encode(array('message' => 'ERROR')));
        }
    }

}

?>
