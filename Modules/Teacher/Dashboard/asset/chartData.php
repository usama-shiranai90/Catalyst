<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\SearchUtil.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\ServerPerformance.php";

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
    /*        // applying the standard deviation.
                $resultantArrayList = array(); // storing the accumulated values for each result.
                $uniqueCLOList = array();
                foreach ($getCourseOutcomeAveragePerformanceArray as $key => $value) { // loop is used to get Unique CLO Name.
                    if (!in_array($value['cloName'], $uniqueCLOList)) { // for each time getting unique clo name then adding :
                        array_push($uniqueCLOList, $value['cloName']);

                        $temp = array(); // storing CLO-1 to n respective scores.
                        foreach ($getCourseOutcomeAveragePerformanceArray as $k => $v) {
                            if ($value['cloName'] === $v['cloName']) {
                                $temp[] = $v['obtainMarks'];
                            }
                        }
                        $resultantArrayList[] = standardDeviation($temp);
                    }
                }*/
    $getCourseOutcomeAveragePerformanceArray = $cloObject->retrieveCLOAveragePerCourse($courseCode, $sectionCode, $batchCode, $curriculumCode);
    if ($getCourseOutcomeAveragePerformanceArray == null)
        $resultBackServer = updateServer(400, "No Related Course Learning Outcome Found For Student. No Found !", SERVER_STATUS_CODES[400]);
    else
        $resultBackServer = updateServer(200, $getCourseOutcomeAveragePerformanceArray, SERVER_STATUS_CODES[200] . " " . SERVER_STATUS_CODES[201]);
    die(json_encode($resultBackServer));

} elseif (isset($_POST['toLoadStudentAverageCLO']) and $_POST['toLoadStudentAverageCLO']) {
    $getStudentAverageCourseOutcomeArray = $cloObject->retrieveCLOAveragePerStudent($courseCode, $sectionCode);
    if ($getStudentAverageCourseOutcomeArray == null)
        $resultBackServer = updateServer(400, "No Related Course Learning Outcome Found For Student. No Found !", SERVER_STATUS_CODES[400]);
    else
        $resultBackServer = updateServer(200, $getStudentAverageCourseOutcomeArray, SERVER_STATUS_CODES[200] . " " . SERVER_STATUS_CODES[201]);
    die(json_encode($resultBackServer));
}

?>