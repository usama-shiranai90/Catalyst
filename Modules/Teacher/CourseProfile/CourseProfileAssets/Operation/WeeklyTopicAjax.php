<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\ServerPerformance.php";

if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
    /*header('Content-Type: application/json');
$test = utf8_encode($_POST['arrayWeeklyTopics']);
$data = json_decode($test);
echo "hello mello" . $data . "  " . $test;*/
}

$weeklyInfo = new WeeklyTopic();
$programCode = $_SESSION['selectedProgram'];
$batchCode = $_SESSION['selectedBatch'];
$curriculumCode = $_SESSION['selectedCurriculum'];
$courseProfileID = $_SESSION['courseProfileCode'];
$resultBackServer = array("status" => -1, "message" => 'no message', "errors" => 'no error');

if (isset($_POST['creation']) and $_POST['creation']) {
    if (isset($_POST['arrayWeeklyTopics'])) {

        $arrayWeeklyTopic = $_POST['arrayWeeklyTopics'];
        $statusWeeklyTopic = $weeklyInfo->createWeeklyTopic($courseProfileID, $arrayWeeklyTopic);

        if ($statusWeeklyTopic === null)
            $resultBackServer = updateServer(500, "error while creating new semester.", "ERROR |" . $weeklyInfo->getDatabaseConnection()->error);
        elseif ($statusWeeklyTopic != null and is_array($statusWeeklyTopic)) {

            $weeklyTopicStatus = $statusWeeklyTopic['weeklyTopic'];
            $respectiveOutcomeStatus = $statusWeeklyTopic['respectiveOutcome'];
//            print "statusWeeklyTopic : " . json_encode($statusWeeklyTopic) . "    size : " . count(array_flip($statusWeeklyTopic)) . "\n<br>";

            if ($weeklyTopicStatus === -1 and $respectiveOutcomeStatus === -1) // both operation failed.
                $resultBackServer = updateServer(500, "Failed to Create Weekly Covered Topic with respect to its CLO. try again. ", "ERROR |" . $weeklyInfo->getDatabaseConnection()->error);
            elseif ($weeklyTopicStatus == 1 and $respectiveOutcomeStatus == 1)
                $resultBackServer = updateServer(200, "Weekly Covered Topic has been created Successfully.", SERVER_STATUS_CODES[200] . "|" . SERVER_STATUS_CODES[201]);

            elseif ($weeklyTopicStatus == 1 and $respectiveOutcomeStatus == -1)
                $resultBackServer = updateServer(500, "Failed to CLO of weekly topic ( No Weekly Topic created ). try again. ", "ERROR |" . $weeklyInfo->getDatabaseConnection()->error);
            else
                $resultBackServer = updateServer(500, "Failed to weekly topic. try again. ", "ERROR |" . $weeklyInfo->getDatabaseConnection()->error);
        }
    } else
        $resultBackServer = updateServer(400, "Please check your section code ", SERVER_STATUS_CODES[400] . "|" . SERVER_STATUS_CODES[201]);

    die(json_encode($resultBackServer));

} elseif (isset($_POST['updation']) and $_POST['updation']) {

    if (isset($_POST['updateWeeklyTopics'])) {
        $weeklyTopicKeyValue = $_POST['updateWeeklyTopics'];
        $isFailedToUpdateList = array();
        $isSuccessUpdateList = array();

        $cloCodeArrayExisting = array();
        foreach ($weeklyTopicKeyValue as $key => $value) {
            $statusWeeklyTopic = $weeklyInfo->updateWeeklyTopicRecord($courseProfileID, $key, $value);

            $weeklyTopicStatus = $statusWeeklyTopic['weeklyTopic'];
            $respectiveOutcomeStatus = $statusWeeklyTopic['respectiveOutcome'];

            if ($weeklyTopicStatus === -1 and $respectiveOutcomeStatus === -1) // both operation failed.
                $isFailedToUpdateList[] = $value[0] . " and Its CLO failed to update";
            elseif ($weeklyTopicStatus == 1 and $respectiveOutcomeStatus == 1) // both successful.
                $isSuccessUpdateList[] = true;
            elseif ($weeklyTopicStatus == 1 and $respectiveOutcomeStatus == -1)
                $isFailedToUpdateList[] = $value[0] . "updated fine but Its CLO failed to update.";
            else
                $isFailedToUpdateList[] = $value[0] . " could not be updated.";
        }

        $isFailedToCreateList = array();
        $isSuccessCreateList = array();
        if (isset($_POST['recentlyAddedWeeklyTopics'])) {
            $weeklyTopicRecentArray = $_POST['recentlyAddedWeeklyTopics']; // newly created clo description array.
            $statusWeeklyTopic = $weeklyInfo->createWeeklyTopic($courseProfileID, $weeklyTopicRecentArray);
            $weeklyTopicStatus = $statusWeeklyTopic['weeklyTopic'];
            $respectiveOutcomeStatus = $statusWeeklyTopic['respectiveOutcome'];

            if ($weeklyTopicStatus === -1 and $respectiveOutcomeStatus === -1) // both operation failed.
                $isFailedToCreateList[] = " and Its CLO failed to update";
            elseif ($weeklyTopicStatus == 1 and $respectiveOutcomeStatus == 1) // both successful.
                $isSuccessCreateList[] = true;
            elseif ($weeklyTopicStatus == 1 and $respectiveOutcomeStatus == -1)
                $isFailedToCreateList[] = "updated fine but Its CLO failed to update.";
            else
                $isFailedToCreateList[] = " could not be updated.";
        }

        $weeklyTopicRecentArray = $_POST['recentlyAddedWeeklyTopics'] ?? array();

        // For Both Creation and Update.
        if ((is_array($weeklyTopicKeyValue) && is_array($weeklyTopicRecentArray)) && (count($weeklyTopicKeyValue) > 0 && count($weeklyTopicRecentArray) > 0)) {

            if ((count($isFailedToUpdateList) == 0 && count($isSuccessUpdateList) == count($weeklyTopicKeyValue)) and (count($isFailedToCreateList) == 0 and in_array(true, $isSuccessCreateList))) {// all operation are performed successfully.
                $resultBackServer = updateServer(200, "Weekly Covered Topic has been updated and created Successfully.", SERVER_STATUS_CODES[200] . "|" . SERVER_STATUS_CODES[201]);
            } elseif (count($isFailedToCreateList) > 0 and count($isFailedToUpdateList) > 0) { // failed all operation.
                $resultBackServer = updateServer(501, array_merge($isFailedToCreateList, $isFailedToUpdateList), "ERROR |" . SERVER_STATUS_CODES[501]);
            } elseif (count($isFailedToCreateList) > 0 && (count($isFailedToUpdateList) == 0 && count($isSuccessUpdateList) == count($weeklyTopicKeyValue))) {
                $resultBackServer = updateServer(501, $isFailedToCreateList, "ERROR |" . SERVER_STATUS_CODES[501]);
            } elseif (count($isFailedToUpdateList) > 0 && (count($isFailedToCreateList) == 0)) {
                $resultBackServer = updateServer(501, $isFailedToUpdateList, "ERROR |" . SERVER_STATUS_CODES[501]);
            }

        } else if ( is_array($weeklyTopicKeyValue) && count($weeklyTopicKeyValue) > 0 ) { // Update
            if ((count($isFailedToUpdateList) == 0 and  count($isSuccessUpdateList) == count($weeklyTopicKeyValue) )) {
                $resultBackServer = updateServer(200, "Weekly Covered Topic has been updated Successfully.", SERVER_STATUS_CODES[200] . "|" . SERVER_STATUS_CODES[201]);
            } elseif (count($isFailedToUpdateList) > 0) {
                $resultBackServer = updateServer(501, $isFailedToUpdateList, "ERROR |" . SERVER_STATUS_CODES[501]);
            }
        }
        else if ( is_array($weeklyTopicRecentArray) && count($weeklyTopicRecentArray) > 0 ) { // Creation
            if ((count($isFailedToCreateList) == 0 and in_array(true, $isSuccessCreateList))) {
                $resultBackServer = updateServer(200, "Weekly Covered Topic has been created Successfully.", SERVER_STATUS_CODES[200] . "|" . SERVER_STATUS_CODES[201]);
            } elseif (count($isFailedToCreateList) > 0) {
                $resultBackServer = updateServer(501, $isFailedToCreateList, "ERROR |" . SERVER_STATUS_CODES[501]);
            }
        }

    } else
        $resultBackServer = updateServer(400, "updateWeeklyTopics ", SERVER_STATUS_CODES[400] . "|" . SERVER_STATUS_CODES[201]);

    die(json_encode($resultBackServer));
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