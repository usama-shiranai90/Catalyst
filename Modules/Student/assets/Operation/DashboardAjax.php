<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
if (session_status() === PHP_SESSION_NONE || !isset($_SESSION))
    session_start();

$resultBackServer = array("status" => -1, "message" => 'no message', "errors" => 'no error');
$studentRegCode = $_SESSION['studentRegistrationCode'];
$batchCode = $_SESSION['batchCode'];
$programCode = $_SESSION['programCode'];

$cgpa = new AccumulatedCGPA();

if (isset($_POST['toLoadCgpa']) and $_POST['toLoadCgpa']) {
    $hasPreviousRecord = $cgpa->retrieveLatestCGPA($studentRegCode);
    if ($hasPreviousRecord == false)
        $resultBackServer = updateServer(0, "Some-time went wrong ,try again.", "no-record");
    else
        $resultBackServer = updateServer(1, $cgpa, "none");
    die(json_encode($resultBackServer));

} elseif (isset($_POST['']) and $_POST['']) {

}


function updateServer($status, $message, $error): array
{
    $resultBackServer['status'] = $status;
    $resultBackServer['message'] = $message;
    $resultBackServer['errors'] = $error;
    return $resultBackServer;
}

?>