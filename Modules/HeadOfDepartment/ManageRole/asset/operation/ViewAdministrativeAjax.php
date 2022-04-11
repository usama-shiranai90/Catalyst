<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\SearchUtil.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\ServerPerformance.php";

if (session_status() === PHP_SESSION_NONE || !isset($_SESSION))
    session_start();

$resultBackServer = array("status" => -1, "message" => 'no message', "errors" => 'no error');
$message = [];
$departmentCode = $_SESSION['departmentCode'];
$respectiveRoles = [];

if (isset($_POST['refreshSelectedRole']) and $_POST['refreshSelectedRole']) {

    $designation = $_POST['designation'];
    $role = $_POST['role'];

    $listOfAllocatedAdministratorRolesList = AdministrativeRole::retrieveListOfAdminRoles($departmentCode, checkAdministrativePattern($role));

    $resultBackServer = updateServer(1, loadAdminData($listOfAllocatedAdministratorRolesList, $respectiveRoles), "idk");
    die(json_encode($resultBackServer));
} elseif (isset($_POST['deleteAdministrativeRole']) and $_POST['deleteAdministrativeRole']) {

    if (!empty($_POST['facultyId'])) {
        $facultyID = $_POST['facultyId'];
        $departmentId = $_POST['departmentId'];
        $programId = $_POST['programManagerId'];
        $sectionId = $_POST['courseAdvisorId'];

        if ($flag = AdministrativeRole::deleteAdministrativeRole($facultyID, $departmentId, $programId, $sectionId))
            $resultBackServer = updateServer(1, $respectiveRoles[] = $flag, "successful");
        else
            $resultBackServer = updateServer(0, $respectiveRoles[] = false, "no-record");

        die(json_encode($resultBackServer));
    }
}


function loadAdminData($listOfAllocatedAdministratorRolesList, $toStore = 'none'): string
{
    $temp = '';
    $counter = 1;
    foreach ($listOfAllocatedAdministratorRolesList as $index => $role) {
        foreach ($role as $selectedFaculty) {
            $typeOfRole = $selectedFaculty['roleName'];
            $CUSTOM_ROLE_TAG = '';

            $CUSTOM_TAG_PARAGRAPH = '';

            if (preg_match('/\bHead Of Department\b/i', $typeOfRole, $matchSet) === 1) {
                $depCode = $selectedFaculty['departmentCode'];
                $CUSTOM_ROLE_TAG = "data-role-state-hod=" . "\"$depCode\"";
                $CUSTOM_TAG_PARAGRAPH = sprintf('<p class="text-gray-500 leading-6  text-sm">
                    👁️‍🗨️ Faculty member <span class="font-medium text-gray-700"> %s </span> has been appointed as the <span class="font-medium decoration-slice text-gray-700"> %s.</span>
                    </p>', $selectedFaculty['name'], $selectedFaculty['ofOther']);

            } elseif (preg_match('/\bProgram manager\b/i', $typeOfRole, $matchSet) === 1) {
                $programCode = $selectedFaculty['programCode'];
                $CUSTOM_ROLE_TAG = "data-role-state-pm=" . "\"$programCode\"";
                $CUSTOM_TAG_PARAGRAPH = sprintf('<p class="text-gray-500 leading-6  text-sm">
                    👁️‍🗨 Faculty member <span class="font-medium text-gray-700"> %s </span> has been appointed as the <span class="font-medium decoration-slice text-gray-700"> %s for %s</span>
                    </p>', $selectedFaculty['name'], $selectedFaculty['roleName'], $selectedFaculty['ofOther']);

            } elseif (preg_match('/\bCourse Advisor\b/i', $typeOfRole, $matchSet) === 1) {
                $sectionCode = $selectedFaculty['sectionCode'];
                $CUSTOM_ROLE_TAG = "data-role-state-ca=" . "\"$sectionCode\"";
                $CUSTOM_TAG_PARAGRAPH = sprintf('<p class="text-gray-500 leading-6  text-sm">
                    👁️‍ Faculty member <span class="font-medium text-gray-700"> %s </span> has been appointed as the <span class="font-medium decoration-slice text-gray-700"> %s for %s</span>
                    </p>', $selectedFaculty['name'], $selectedFaculty['roleName'], $selectedFaculty['ofOther']);

            }
            $print = sprintf(
                '<tr data-record-target = "#admin-record-%d"  aria-expanded="false" 
   class="cursor-default text-sm tracking-tight transition-all transform hover:bg-catalystLight-89 accordion-toggle collapsed" %s>
                            <td class="rounded-l rounded-t border-dashed border-t-2 border-b-2 w-1/6 border-gray-200">
                                <span class="text-gray-700 px-6 py-3 flex justify-center items-center">%s</span>
                            </td>
                            <td class="border-dashed border-t-2 border-b-2 w-1/4 border-gray-200 ">
                                <span class="text-gray-700  px-6 py-3 flex justify-center items-center">%s</span>
                            </td>
                            <td class="border-dashed border-t-2 border-b-2 w-1/4 border-gray-200">
                                <span class="text-gray-700 px-6  py-3 flex justify-center items-center">%s</span>
                            </td>
                            <td class="border-dashed border-t-2 border-b-2 w-1/4 border-gray-200">
                                <span class="text-gray-700 px-6  py-3 flex justify-center items-center">%s</span>
                            </td>
                            <td class="rounded-r rounded-t border-dashed border-t-2 border-b-2 w-1/6 border-gray-200">
                                <div class="flex items-center justify-center gap-3">
                                       <button id="performRoleDeletion-%d">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500 hover:text-red-600 cursor-pointer transform hover:scale-105" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                    </button>
                                </div>
                            </td>        
                </tr>
            <tr>
            
            <td colspan="5" class="hidden py-5 text-center" id="admin-record-%d" >
                    %s
            </td>
        </tr>
        
        ', ($counter), $CUSTOM_ROLE_TAG, $selectedFaculty['facultyID'], $selectedFaculty['name'], $selectedFaculty['officialEmail'], $selectedFaculty['roleName'],
                $counter, $counter, $CUSTOM_TAG_PARAGRAPH);
            if ($toStore !== 'none')
                $temp .= $print;
            else
                print $print;
            $counter++;
        }
    }
    return $temp;
}

?>

<!--<button id="performRoleEdit-%d"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400 hover:text-blue-600 cursor-pointer transform hover:scale-105" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
    </svg></button>-->
