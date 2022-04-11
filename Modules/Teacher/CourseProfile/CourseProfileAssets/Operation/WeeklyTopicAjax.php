<?php
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\CourseProfile\WeeklyTopic.php";

if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
}

$weeklyInfo = new WeeklyTopic();
$programCode = $_SESSION['selectedProgram'];
$batchCode = $_SESSION['batchCode'];
$curriculumCode = $_SESSION['selectedCurriculum'];
$courseProfileID = $_SESSION['courseProfileCode'];

/*header('Content-Type: application/json');
$test = utf8_encode($_POST['arrayWeeklyTopics']);
$data = json_decode($test);
echo "hello mello" . $data . "  " . $test;*/

if (isset($_POST['creation']) and $_POST['creation']) {
    if (isset($_POST['arrayWeeklyTopics'])) {

        $arrayWeeklyTopic = $_POST['arrayWeeklyTopics'];
        $weeklyInfo->createWeeklyTopic($courseProfileID, $arrayWeeklyTopic);

        echo(json_encode(array('message' => 'created  Successfully')));
    } else {
        die(json_encode(array('message' => 'ERROR')));
    }


} elseif (isset($_POST['updation']) and $_POST['updation']) {

    if (isset($_POST['updateWeeklyTopics'])) {
        $weeklyTopicKeyValue = $_POST['updateWeeklyTopics'];

        $cloCodeArrayExisting = array();
        foreach ($weeklyTopicKeyValue as $key => $value) {
            $weeklyInfo->updateWeeklyTopicRecord($courseProfileID, $key, $value);
            /** update the Weekly Covered  */
            $cloCodeArrayExisting[] = $key;
        }

        if (isset($_POST['recentlyAddedWeeklyTopics'])) {
            $weeklyTopicRecentArray = $_POST['recentlyAddedWeeklyTopics']; // newly created clo description array.
            $weeklyInfo->createWeeklyTopic($courseProfileID, $weeklyTopicRecentArray);
        }

        echo die((json_encode(array('message' => 'Data Send Successfully'))));
    }

} elseif (isset($_POST['deletion']) and $_POST['deletion']) {

    if ($_POST['deletedWeeklyIdsArray'] ?? null and $_POST['deletedWeeklyIdsArray'] !== "" and isset($_POST['deletedWeeklyIdsArray'])) { // undefined array key when no id of weekly is passed.

        $toDeleteWeeklyTopics = $_POST['deletedWeeklyIdsArray'];
        if (is_array($toDeleteWeeklyTopics)) // if it is empty.
            foreach ($toDeleteWeeklyTopics as $currentWeeklyCode)
                $weeklyInfo->deleteWeeklyTopicRecord($currentWeeklyCode, $courseProfileID);
    }

    if (isset($_POST['remainingWeeklyIds'])) {
        $allocatedClos = $_POST['remainingWeeklyIds'];
        if ($allocatedClos != null and count($allocatedClos) != 0) {
            foreach ($allocatedClos as $currentCode)
                $weeklyInfo->deleteWeeklyTopicClosRecord($currentCode);
        }
        echo(json_encode(array('message' => 'Weekly Covered Topic Respective Clos Mapping Deleted.')));
    } else
        die(json_encode(array('message' => 'Weekly Covered Topic Updation Error.')));

}

?>