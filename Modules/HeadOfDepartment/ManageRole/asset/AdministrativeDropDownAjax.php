<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\SearchUtil.php";


if (session_status() === PHP_SESSION_NONE || !isset($_SESSION))
    session_start();

$resultBackServer = array("status" => -1, "message" => 'no message', "errors" => 'no error');
$message = [];
$departmentCode = $_SESSION['departmentCode'];
$respectiveRoles = [];
if (isset($_POST['fetchAssociatedRole']) and $_POST['fetchAssociatedRole']) {
    if (isset($_POST['facultyCode'])) {
        $facultyCode = $_POST['facultyCode'];

        if (empty($_POST['programCode'])) { // When no program Code is pass.
            $respectiveRoles = AdministrativeRole::getAssociatedRoles($facultyCode);
        } else if (!empty($_POST['programCode'])) {
            $programCode = hex2bin($_POST['programCode']);
            $respectiveRoles = AdministrativeRole::getAssociatedRoles($facultyCode, $programCode);
        }
        $resultBackServer = updateServer(0, $respectiveRoles, "none");
    } else
        $resultBackServer = updateServer(-1, $respectiveRoles, "no-record");

    die(json_encode($resultBackServer));
}

?>