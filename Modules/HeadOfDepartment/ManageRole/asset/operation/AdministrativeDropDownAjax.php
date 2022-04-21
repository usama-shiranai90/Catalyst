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
} elseif (isset($_POST['fetchBatch']) and $_POST['fetchBatch']) {
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

if (isset($_POST['creation']) and $_POST['creation']) {

    /**
     * Email is returned in array format
     * if single email is found in array then programCode is also one.
     * if multiple email is found in array then multiple programCode is provided.
     */

    $email = $_POST['email'];
    $password = $_POST['password'];
    $facultyCode = $_POST['facultyCode'];
    $programCode = $_POST['programCode'];
    $seasonCode = $_POST['seasonCode'];
    $sectionCode = $_POST['sectionCode'];

    /** For verification, we need to check the first most email format for verification i.e. to check its belonging Instance. */
    $instance = AdministrativeRole::authenticate($email[0], '');

    /** For Head Of Department */
    if ($programCode == -1 and $seasonCode == -1 and $sectionCode == -1) {
        $startDate = $_POST['startDate'];
        if ($instance->assignHeadOfDepartmentRole($email, $password, $facultyCode, $departmentCode, $startDate) !== false)
            $resultBackServer = updateServer(200, "Head Of Department created successfully.", SERVER_STATUS_CODES[200] . " " . SERVER_STATUS_CODES[201]);
        else
            $resultBackServer = updateServer(500, "Error while performing administrative role for HOD Creation . ", "ERROR " . SERVER_STATUS_CODES[500]);
    } else
        $resultBackServer = updateServer(400, "Incorrect parameter while performing action ", "ALERT " . SERVER_STATUS_CODES[400]);

    /** For Program Manager */
//    print ($seasonCode == -1 and $sectionCode === -1) . " " . ($seasonCode == -1) . " " . ($sectionCode == -1);
    if ($seasonCode == -1 and $sectionCode == -1 and (!empty($programCode) and $programCode != -1)) {
        $programCode = isProgramCodeArray($departmentCode); // is either string for 1 pc or array for multiple pc.

        $failedToPerform = array();
        if (is_array($programCode) and sizeof($programCode) > 1) { // for multiple program creation array
            foreach ($programCode as $index => $value)
                if ($instance->assignProgramManagerRole($email[$index], $password, $facultyCode, $value->getProgramCode()) === false)
                    array_push($failedToPerform, $email[$index]);

        } elseif (is_array($programCode) and sizeof($programCode) === 1) { // for single program creation array.
            if ($instance->assignProgramManagerRole($email[0], $password, $facultyCode, $programCode[0]->getProgramCode()) === false)
                array_push($failedToPerform, $email);
        } elseif (!empty($programCode)) {  // for single program creation string.
            if ($instance->assignProgramManagerRole($email[0], $password, $facultyCode, $programCode) === false)
                array_push($failedToPerform, $email);
        }

        if (empty($failedToPerform))
            $resultBackServer = updateServer(200, "Program Manager created successfully.", SERVER_STATUS_CODES[200] . " " . SERVER_STATUS_CODES[201]);
        else
            $resultBackServer = updateServer(500, "Error while performing administrative role for PM Creation . ", "ERROR " . SERVER_STATUS_CODES[500]);

    } else
        $resultBackServer = updateServer(400, "Incorrect parameter while performing action ", "ALERT " . SERVER_STATUS_CODES[400]);

    // for course advisor.
    if ($programCode !== -1 and $seasonCode != -1 and $sectionCode != -1) {
        if ($instance->assignCourseAdvisor($email, $password, $facultyCode, $sectionCode) !== false)
            $resultBackServer = updateServer(200, "Course Advisor created successfully.", SERVER_STATUS_CODES[200] . " " . SERVER_STATUS_CODES[201]);
        else
            $resultBackServer = updateServer(500, "Error while performing administrative role for CA Creation.", "ERROR " . SERVER_STATUS_CODES[500]);
    }
    die(json_encode($resultBackServer));
}


function isProgramCodeArray($departmentCode): array|string
{
    $program = new Program();
    if ($_POST['programCode'] != 'all') // single program string is returned.
        $programCode = hex2bin($_POST['programCode']);
    else
        $programCode = $program->retrieveProgramList($departmentCode);

    return $programCode;
}

?>