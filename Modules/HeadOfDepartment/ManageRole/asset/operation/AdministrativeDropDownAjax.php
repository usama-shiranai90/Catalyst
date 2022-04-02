<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\ServerPerformance.php";
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
            $programCode = isProgramCodeArray($departmentCode);
            $respectiveRoles = AdministrativeRole::getAssociatedRoles($facultyCode, $programCode);
        }
        $resultBackServer = updateServer(1, $respectiveRoles, "none");
    } else
        $resultBackServer = updateServer(-1, $respectiveRoles, "no-record");

    die(json_encode($resultBackServer));
}


elseif (isset($_POST['fetchBatch']) and $_POST['fetchBatch']) {
    $programCode = isProgramCodeArray($departmentCode);

    $batch = new Batch();
    $batchList = $batch->retrieveBatchList($programCode);

    if ($batchList !== null)
        $resultBackServer = updateServer(1, $batchList, "none");
    else
        $resultBackServer = updateServer(-1, $batchList, "no-record");

    die(json_encode($resultBackServer));
} elseif (isset($_POST['fetchSections']) and $_POST['fetchSections']) {
    $batchCode = $_POST['batchCode'];
    $section = new Section();
    $sectionlist = $section->retrieveSectionsList($batchCode);
    if ($sectionlist !== null)
        $resultBackServer = updateServer(0, $sectionlist, "none");
    else
        $resultBackServer = updateServer(-1, $sectionlist, "no-record");
    die(json_encode($resultBackServer));
}

if (isset($_POST['creation']) and $_POST['creation']) { // for creation section.
    $email = $_POST['email'];
    $password = $_POST['password'];
    $facultyCode = $_POST['facultyCode'];

    if (is_array($email) and sizeof($email) === 1) {
        $email = $email[0];
    }
    $instance = AdministrativeRole::authenticate($email[0], $password);

    // for head of department
    if ($_POST['programCode'] == 'none' and $_POST['seasonCode'] == 'none' and $_POST['sectionCode'] == 'none') {
        if ($instance->assignHeadOfDepartmentRole($email, $password, $facultyCode, $departmentCode) !== false)
            $resultBackServer = updateServer(1, true, "none");
        else
            $resultBackServer = updateServer(-1, false, "can not update profile");

    } // for program manager
    else if ($_POST['seasonCode'] == 'none' and $_POST['sectionCode'] == 'none' and (!empty($_POST['programCode']) and $_POST['programCode'] !== 'none')) {
        $programCode = isProgramCodeArray($departmentCode);

        if (is_array($programCode) and sizeof($programCode) > 1) {
            foreach ($programCode as $index => $value) {
                if ($instance->assignProgramManagerRole($email[$index], $password, $facultyCode, $value->getProgramCode()) === false) {
                    $message[] = false;
                    $resultBackServer = updateServer(-1, $message, "can not update profile manager");
                }
            }
        } else {
            if ($instance->assignProgramManagerRole($email, $password, $facultyCode, $programCode[0]->getProgramCode()) !== false)
                $resultBackServer = updateServer(1, true, "none");
            else
                $resultBackServer = updateServer(-1, false, "can not update profile for program manager");
        }

    } // for course advisor.
    else if ($_POST['programCode'] !== 'none' and $_POST['seasonCode'] !== 'none' and $_POST['sectionCode'] !== 'none') {
        $seasonCode = $_POST['seasonCode'];
        $sectionCode = $_POST['sectionCode'];

        if ($instance->assignCourseAdvisor($email, $password, $facultyCode, $sectionCode) !== false)
            $resultBackServer = updateServer(1, true, "none");
        else
            $resultBackServer = updateServer(-1, false, "can not update course advisor profile");
    }
    die(json_encode($resultBackServer));
}


function isProgramCodeArray($departmentCode): array|string
{
    $program = new Program();
    if ($_POST['programCode'] !== 'all')
        $programCode = hex2bin($_POST['programCode']);
    else
        $programCode = $program->retrieveProgramList($departmentCode);

    return $programCode;
}

?>