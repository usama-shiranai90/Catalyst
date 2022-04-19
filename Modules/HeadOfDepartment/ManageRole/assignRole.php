<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();

$adminInstance = $_SESSION['adminInstance'];
$admin = unserialize($adminInstance);
$personalDetails = $admin->getInstance();

//print json_encode($personalDetails);

$adminCode = $_SESSION['adminCode'];
$departmentCode = $_SESSION['departmentCode'];


$faculty = new FacultyRole();
$facultyObjectList = $faculty->retrieveFacultyListDepartment($departmentCode);

/*foreach ($facultyObjectList as $facultyDetail) {
    print_r(json_encode($facultyDetail) . "<br><br>");
   echo $facultyDetail->getInstance()['facultyCode'];
}*/

$facultyList = array();
foreach ($facultyObjectList as $faculty) {
    $facultyList[] = array(
        'fc' => $faculty->getInstance()['facultyCode'],
        'name' => $faculty->getInstance()['name'],
        'designation' => $faculty->getInstance()['designation'],
        'dc' => $faculty->getInstance()['departmentCode'],
    );
}
//print json_encode($facultyList);
//print ($personalDetails['facultyCode']);

setcookie("loggedUser", json_encode($personalDetails['facultyCode']), time() + 3600)
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Student Profile</title>

    <script src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="../../../Assets/Scripts/Master.js" rel="script"></script>
    <script src="../../../Assets/Scripts/InterfaceUtil.js"></script>
    <script src="asset/js/adminstrationRoleAssign.js"></script>

    <style>
        /*.tabs * {z-index: 20;}*/

        input[type=radio] {
            display: none;
        }

        input[type=radio]:checked + label {
            color: white;
        }

        input[id=adminRoleDivisionHod]:checked ~ .glider {
            transform: translateX(-105%);
        }

        input[id=adminRoleDivisionPm]:checked ~ .glider {
            transform: translateX(0%);
        }

        input[id=adminRoleDivisionCa]:checked ~ .glider {
            transform: translateX(100%);
            width: 9.3rem;
        }

        .glider {
            background-color: #3E7BFA;
        }
    </style>
</head>
<body>
<div class="w-full min-h-full">
    <main class="main-content-alignment">
        <div class="cprofile-primary-border text-black rounded-t-md rounded-b-md mt-2 bg-catalystLight-f5 deleted-min-full-height">
            <div class="flex mx-auto flex-wrap justify-center">
                <a class="sm:px-6 sm:w-auto sm:justify-start cursor-pointer inline-flex justify-center
                   items-center py-3 w-1/2 rounded-t text-black
                   tracking-wide leading-none student-profile-header-text my-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    Administrative Role Division
                </a>
            </div>

            <div class="cprofile-content-box-border cprofile-grid mx-0 my-0 border-0 rounded-none">
                <div class="container px-5 mx-auto flex flex-col">
                    <!--border-solid border-4 border-opacity-25 border-black-->
                    <div class="items-center place-content-center my-5 pb-10 border-solid border-b-2 border-gray-300">
                        <h2 class="px-3 font-semibold text-base">Select the required fields to create respective
                            role.</h2>
                        <div class="w-full flex flex-col">
                            <form method="post" class="w-full flex flex-row justify-center w-4/12 my-5 gap-5">
                                <!--                                <input class="hidden" id="hdNamae" type="text" name="hdNamae" value="-->
                                <input class="hidden" type="text"
                                       value="<?php echo strtolower($_SESSION['departmentName']) ?>"
                                       data-h-set="departmentName">

                                <div class="textField-label-content w-3/12">
                                    <label for="froleDesignationID"></label>
                                    <select class="select" name="roleDesignation"
                                            onclick="this.setAttribute('value', this.value);"
                                            onchange="this.setAttribute('value', this.value);" value=""
                                            id="froleDesignationID">
                                        <option value="" hidden=""></option>

                                        <?php
                                        $designationList = array();
                                        foreach ($facultyList as $index => $faculty) {
                                            $currentDesignation = $faculty['designation']; // mama
                                            if (!in_array($currentDesignation, $designationList)) {
                                                print sprintf("<option  value=\"%s\" >%s</option>",
                                                    $faculty['designation'], $faculty['designation']);
                                                $designationList[] = $faculty['designation'];
                                            }
                                        }
                                        ?>

                                    </select>
                                    <label class="select-label top-1/4 sm:top-3">Designation *</label>
                                </div>
                                <div class="textField-label-content w-3/12">
                                    <label for="programIDSelect"></label>
                                    <select class="select" name="programIDSelect"
                                            onclick="this.setAttribute('value', this.value);"
                                            onchange="this.setAttribute('value', this.value);" value=""
                                            id="programIDSelect">
                                        <option value="" hidden=""></option>
                                        <option value="all" selected>All</option>

                                        <?php
                                        $program = new Program();
                                        $allocatedProgramList = array();
                                        $options = '';
                                        $getProgramList = $program->retrieveProgramList($departmentCode);

                                        foreach ($getProgramList as $program) {
                                            $options .= sprintf("<option  value=\"%s\" >%s</option>",
                                                bin2hex($program->getProgramCode()), $program->getProgramName());
                                            array_push($allocatedProgramList, $program->getProgramCode());
                                        }
                                        print $options;
                                        ?>

                                    </select>
                                    <label class="select-label top-1/4 sm:top-3">Program</label>
                                </div>

                                <div class="textField-label-content w-3/12">
                                    <label for="facultyNameSelectId"></label>
                                    <select class="select" name="facultyNameSelect"
                                            onclick="this.setAttribute('value', this.value);"
                                            onchange="this.setAttribute('value', this.value);" value=""
                                            id="facultyNameSelectId">
                                        <option value="" hidden=""></option>
                                    </select>
                                    <label class="select-label top-1/4 sm:top-3">Faculty Name *</label>
                                </div>

                            </form>

                            <div class="w-full flex justify-center items-center">
                                <!--ml-64 mr-14-->
                                <div class="flex w-2/5 justify-center items-center h-12 gap-2 relative shadow-md p-3 rounded-full border-2 border-gray-400 border-solid">

                                    <input class="z-20" type="radio" id="adminRoleDivisionHod" name="tabs" checked/>
                                    <label class="z-20 flex items-center justify-center h-30 w-1/2 text-sm font-medium rounded-full cursor-pointer"
                                           for="adminRoleDivisionHod"
                                           style="transition: color 0.15s ease-in">HOD</label>

                                    <input class="z-20" type="radio" id="adminRoleDivisionPm" name="tabs"/>
                                    <label class="z-20 flex items-center justify-center h-30 w-1/2 text-sm font-medium rounded-full cursor-pointer"
                                           for="adminRoleDivisionPm" style="transition: color 0.15s ease-in">Program
                                        Manager</label>

                                    <input class="z-20" type="radio" id="adminRoleDivisionCa" name="tabs"/>
                                    <label class="z-20 flex items-center justify-center h-30 w-1/2 text-sm font-medium rounded-full cursor-pointer"
                                           for="adminRoleDivisionCa" style="transition: color 0.15s ease-in">Course
                                        Advisor</label>


                                    <span class="glider z-10 w-36 h-5/6 absolute flex rounded-full transition duration-500 ease-out"></span>

                                </div>
                                <div id="extraRoleDetailContainerId"
                                     class="hidden bg-white w-1/3 content-end px-2 rounded-lg shadow-md flex bg-catalystLight-f2 border-transparent ">
                                    <div class=" px-5">
                                        <h5 class="text-lg font-semibold py-2 text-gray-600">Role</h5>
                                        <div class="flex items-center justify-between">
                                            <ul class="py-2" id="roleDetailListId">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <section class="db-table-container my-5 ">
                        <div class="db-table-header-topic">
                            <h2 id="roleCreationHeader"
                                class="text-base font-semibold text-white tracking-wide text-center capitalize">HOD Role
                                Creation</h2>
                        </div>

                        <h2 class="px-3 py-3 font-medium text-base">Complete the following fields to create respective
                            role.</h2>
                        <!--w-full text-left whitespace-no-wrap min-h-0 max-h-40 h-5/6-->
                        <div class="bg-white overflow-hidden sm:rounded-lg">

                            <form method="post" class="flex flex-col overflow-hidden" id="hodRoleCreationFormID">

                                <div class="flex my-2 px-5 w-full justify-center content-center gap-32">
                                    <div class="textField-label-content w-3/12">
                                        <input class="textField" type="text" placeholder="email here"
                                               name="hrcREmail" id="hrcREmailID" value="" disabled>
                                        <label class="textField-label">Email</label>
                                    </div>
                                    <div class="textField-label-content w-3/12 relative">

                                        <input class="textField" type="text" placeholder="email password"
                                               name="hrcRPassword" id="hrcPasswordID" value="">
                                        <label class="textField-label">Password</label>

                                        <div class="flex justify-center items-center absolute top-0 -right-1/2 w-32 h-12 box-border cursor-default"
                                             id="roleCreationPasswordGeneratorID">
                                            <span class="flex items-center justify-center text-gray-400 transform transition hover:scale-90 hover:text-indigo-700 cursor-pointer sm:text-sm">
                                                <svg
                                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                              <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/>
                                            </svg>
                                                 <div class="w-32 h-full opacity-0 hover:opacity-100 duration-300 z-10
                                                  flex justify-center items-center capitalize text-xs text-black font-semibold">Dafa ho</div>
                                            </span>
                                        </div>

                                    </div>

                                </div>
                                <div class="flex my-2 px-5 w-full justify-center content-center gap-32">
                                    <div class="textField-label-content w-3/12 relative">
                                        <input class="textField" type="date" placeholder="Expire Date"
                                               name="hrcStartDate" id="hrcStartDateID"
                                               min="<?php echo date("Y-m-d"); ?>">
                                        <label class="textField-label">Start Date</label>
                                    </div>
                                </div>

                            </form>


                            <form method="post" class="hidden flex flex-col overflow-hidden" id="pmRoleCreationFormID">
                                <div class="flex my-2 px-5 w-full justify-center content-center gap-32">
                                    <div class="textField-label-content w-3/12">
                                        <input class="textField" type="text" placeholder="email here"
                                               name="pmrcREmail" id="pmrcREmailID" value="" disabled>
                                        <label class="textField-label">Email</label>
                                    </div>
                                    <div class="textField-label-content w-3/12 relative">
                                        <input class="textField" type="text" placeholder="email password"
                                               name="pmrcRPassword" id="pmrcPasswordID" value="">
                                        <label class="textField-label">Password</label>
                                    </div>

                                </div>
                            </form>

                            <form method="post" class="hidden flex flex-col overflow-hidden" id="caRoleCreationFormID">
                                <div class="flex my-2 px-5 w-full justify-center content-center gap-32">
                                    <div class="textField-label-content w-3/12">
                                        <label for="carcRSeasonID"></label>
                                        <select class="select" name="carcSeason"
                                                onclick="this.setAttribute('value', this.value);"
                                                onchange="this.setAttribute('value', this.value);" value=""
                                                id="carcRSeasonID">
                                            <option value="" hidden=""></option>
                                        </select>
                                        <label class="select-label top-1/4 sm:top-3">Batch/Season</label>
                                    </div>
                                    <div class="textField-label-content w-3/12">
                                        <label for="carcRSectionID"></label>
                                        <select class="select" name="carcSection"
                                                onclick="this.setAttribute('value', this.value);"
                                                onchange="this.setAttribute('value', this.value);" value=""
                                                id="carcRSectionID" style="cursor: no-drop;" disabled>
                                            <option value="" hidden=""></option>
                                        </select>
                                        <label class="select-label top-1/4 sm:top-3">Section</label>
                                    </div>
                                </div>
                                <div class="flex my-2 px-5 w-full justify-center content-center gap-32">
                                    <div class="textField-label-content w-3/12">
                                        <input class="textField" type="text" placeholder="email here"
                                               name="carcEmail" id="carcEmailID" value="" disabled>
                                        <label class="textField-label">Email</label>
                                    </div>
                                    <div class="textField-label-content w-3/12 relative">
                                        <input class="textField" type="text" placeholder="email here"
                                               name="carcPassword" id="carcPasswordID" value="">
                                        <label class="textField-label">Password</label>
                                    </div>
                                </div>
                            </form>
                            <!--absolute inset-y-0 inset-x-full left-r flex items-center w-72-->
                            <!--<div class="hidden absolute inset-x-2/3 m-8 flex items-center" style="bottom: 40%"
                                 id="roleCreationPasswordGeneratorID">
                                            <span class="text-gray-400 transform transition hover:scale-90 hover:text-indigo-700 cursor-pointer sm:text-sm">
                                                <svg
                                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                              <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/>
                                            </svg>
                                                 <div class="w-32 h-full opacity-0 hover:opacity-100 duration-300 absolute inset-0 inset-x-4  z-10
                                                  flex justify-center items-center capitalize text-xs text-black font-semibold">Generate password</div>
                                            </span>
                            </div>-->
                            <div class="text-right mx-0 my-2">
                                <button type="submit"
                                        class="text-white rounded-md border-0 p font-medium bg-catalystBlue-l2 px-8 mx-5 py-1"
                                        name="roleAssignBtn" id="roleAssignBtnID">Assign
                                </button>
                            </div>
                        </div>

                    </section>
                </div>
            </div>

        </div>
    </main>
</div>

</body>

<script>
    // const tester = document.querySelector('meta[name="tester"]').content;
    // let fid = decodeURI(JSON.stringify(fetchedUser[1])).replace(/['"]+/g, '')

    const getCookieValue = (name) => (document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)')?.pop() || '')
    var fetchedUser = getCookieValue('loggedUser')

    let userId = decodeURI(JSON.stringify(fetchedUser)).replace(/['"]+/g, '')


    let facultyInstanceList = <?php echo json_encode($facultyList, JSON_HEX_QUOT | JSON_HEX_APOS);?>;
    let programList = <?php echo json_encode($allocatedProgramList, JSON_HEX_QUOT | JSON_HEX_APOS);?>;
    console.log("User ID : ", userId, "\nFaculty Instance : ", facultyInstanceList, "\nProgram Code List : ", programList)

    // $("main").addClass("blur-filter");
    // $("#alertContainer").removeClass("hidden");
</script>


</html>