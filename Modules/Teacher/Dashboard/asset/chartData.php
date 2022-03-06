<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
}

$resultBackServer = array("status" => -1, "message" => 'no message', "errors" => 'no error');
$cloObject = new CLO();
$curriculumCode = $_SESSION['selectedCurriculum'];
$programCode = $_SESSION['selectedProgram'];
$courseCode = $_SESSION['selectedCourse'];
$sectionCode = $_SESSION['selectedSection'];
$batchCode = $_SESSION['selectedBatch'];

if (isset($_POST['toLoadAverageCLO']) and $_POST['toLoadAverageCLO']) {
    $getCourseOutcomeAveragePerformanceArray = $cloObject->retrieveCLOAveragePerCourse($courseCode, $sectionCode, $batchCode, $curriculumCode);;
    if ($getCourseOutcomeAveragePerformanceArray == null)
        $resultBackServer = updateServer(0, "Some-time went wrong ,try again.", "registration-error");
    else
        $resultBackServer = updateServer(1, $getCourseOutcomeAveragePerformanceArray, "none");
    die(json_encode($resultBackServer));
} elseif (isset($_POST['toLoadStudentAverageCLO']) and $_POST['toLoadStudentAverageCLO']) {
    $getStudentAverageCourseOutcomeArray = $cloObject->retrieveCLOAveragePerStudent($courseCode, $sectionCode);
    if ($getStudentAverageCourseOutcomeArray == null)
        $resultBackServer = updateServer(0, "Some-time went wrong ,try again.", "registration-error");
    else
        $resultBackServer = updateServer(1, $getStudentAverageCourseOutcomeArray, "none");
    die(json_encode($resultBackServer));
}


function updateServer($status, $message, $error): array
{
    $resultBackServer['status'] = $status;
    $resultBackServer['message'] = $message;
    $resultBackServer['errors'] = $error;
    return $resultBackServer;
}

?>