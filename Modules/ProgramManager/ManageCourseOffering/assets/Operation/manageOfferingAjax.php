<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\ServerPerformance.php";

session_start();

$resultBackServer = array("status" => -1, "message" => 'no message', "errors" => 'no error');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['fetchBatch']) and $_POST['fetchBatch']) {
        if ((isset($_POST['seasonCode']) and ($_POST['seasonCode'])) and isset($_POST['curriculumCode']) and ($_POST['curriculumCode'])
            and isset($_POST['programCode']) and ($_POST['programCode'])) {
            $seasonCode = $_POST['seasonCode'];
            $curriculumCode = $_POST['curriculumCode'];
            $programCode = $_POST['programCode'];
            $batch = new Batch();
            $batchList = $batch->retrieveBatchListOfProgram($seasonCode, $programCode, $curriculumCode);
            if (!empty($batchList))
                $resultBackServer = updateServer(200, $batchList, SERVER_STATUS_CODES[200] . "|" . SERVER_STATUS_CODES[201]);
            else
                $resultBackServer = updateServer(500, "Error while fetching batch list : " . $batch->getDatabaseConnection()->error, "ERROR " . SERVER_STATUS_CODES[500]);
            die(json_encode($resultBackServer));
        }


    }

}


?>