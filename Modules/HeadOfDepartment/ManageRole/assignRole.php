<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();

$adminCode = $_SESSION['adminCode'];
$departmentCode = $_SESSION['departmentCode'];

//$personalDetails = array();
//$admin = unserialize($_SESSION['adminInstance']);
//$personalDetails = $admin->getPersonalDetails();

//echo json_encode($curriculumList);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Student Profile</title>
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../../Assets/Scripts/Master.js" rel="script"></script>
    <script src="../../Teacher/CourseProfile/CourseProfileAssets/js/additionalWork.js"></script>
    <script src="asset/roleScript.js"></script>

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
                        <h2 class="px-3 font-semibold text-base"> Following are the Program Curriculum Outcome which
                            you are following.</h2>
                        <div class="w-full flex flex-col">
                            <form method="post" class="w-full flex flex-row justify-center w-4/12 my-5 gap-10">
                                <div class="textField-label-content w-3/12">
                                    <label for="froleDesignationID"></label>
                                    <select class="select" name="roleDesignation"
                                            onclick="this.setAttribute('value', this.value);"
                                            onchange="this.setAttribute('value', this.value);" value=""
                                            id="froleDesignationID">
                                        <option value="" hidden=""></option>
                                        <option value="1">1</option>
                                    </select>
                                    <label class="select-label top-1/4 sm:top-3">Designation</label>
                                </div>
                                <div class="textField-label-content w-3/12">
                                    <label for="f_role_facultyID"></label>
                                    <select class="select" name="facultycode"
                                            onclick="this.setAttribute('value', this.value);"
                                            onchange="this.setAttribute('value', this.value);" value=""
                                            id="f_role_facultyID">
                                        <option value="" hidden=""></option>
                                        <option value="1">1</option>
                                    </select>
                                    <label class="select-label top-1/4 sm:top-3">Faculty-ID</label>
                                </div>
                                <div class="textField-label-content w-3/12">
                                    <input class="textField" type="text" placeholder="automatically be shown"
                                           name="froleFacultyName" id="froleFacultyNameID"
                                           value="automatically be shown" disabled style="color: gray">
                                    <label class="textField-label" style="top: -20%">Faculty Name</label>
                                </div>
                            </form>
                            <!--  <button type="button" class="text-white rounded-md border-0 p font-medium bg-catalystBlue-l2 px-10 py-2">Update Password</button>-->

                            <div class="w-full flex justify-center">
                                <div class="w-2/5 flex justify-center items-center gap-2 relative shadow-md p-3 rounded-full border-2 border-gray-400 border-solid divide-blue-300">

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
                            </div>
                        </div>
                    </div>
                    <section class="db-table-container my-5">
                        <div class="db-table-header-topic">
                            <h2 id="roleCreationHeader"
                                class="text-base font-semibold text-white tracking-wide text-center capitalize">HOD Role
                                Creation</h2>
                        </div>

                        <h2 class="px-3 py-3 font-normal text-base">Complete the followin</h2>
                        <!--w-full text-left whitespace-no-wrap min-h-0 max-h-40 h-5/6-->
                        <div class="bg-white overflow-hidden sm:rounded-lg">

                            <form method="post" class="flex flex-col overflow-hidden" id="hodRoleCreationFormID">
                                <div class="flex my-2 px-5 w-full justify-center content-center gap-32">
                                    <div class="textField-label-content w-3/12">
                                        <label for="hrcRDepartmentID"></label>
                                        <select class="select" name="hrcRDepartment"
                                                onclick="this.setAttribute('value', this.value);"
                                                onchange="this.setAttribute('value', this.value);" value=""
                                                id="hrcRDepartmentID">
                                            <option value="" hidden=""></option>
                                            <option value="1">1</option>
                                        </select>
                                        <label class="select-label top-1/4 sm:top-3">Department</label>
                                    </div>
                                    <div class="textField-label-content w-3/12">
                                        <label for="hrcRProgramID"></label>
                                        <select class="select" name="hrcRProgram"
                                                onclick="this.setAttribute('value', this.value);"
                                                onchange="this.setAttribute('value', this.value);" value=""
                                                id="hrcRProgramID">
                                            <option value="" hidden=""></option>
                                            <option value="1">1</option>
                                        </select>
                                        <label class="select-label top-1/4 sm:top-3">Program</label>
                                    </div>
                                </div>

                                <div class="flex my-2 px-5 w-full justify-center content-center gap-32">
                                    <div class="textField-label-content w-3/12">
                                        <input class="textField" type="text" placeholder="email here"
                                               name="hrcREmail" id="hrcREmailID" value="">
                                        <label class="textField-label">Email</label>
                                    </div>
                                    <div class="textField-label-content w-3/12 chalJa">
                                        <input class="textField" type="text" placeholder="email password"
                                               name="hrcRPassword" id="hrcPasswordID" value="">
                                        <label class="textField-label">Password</label>
                                    </div>

                                </div>
                            </form>

                            <form method="post" class="hidden flex flex-col overflow-hidden" id="pmRoleCreationFormID">
                                <div class="flex my-2 px-5 w-full justify-center content-center gap-32">
                                    <div class="textField-label-content w-3/12">
                                        <label for="pmrcRDepartmentID"></label>
                                        <select class="select" name="pmrcRDepartment"
                                                onclick="this.setAttribute('value', this.value);"
                                                onchange="this.setAttribute('value', this.value);" value=""
                                                id="pmrcRDepartmentID">
                                            <option value="" hidden=""></option>
                                            <option value="1">1</option>
                                        </select>
                                        <label class="select-label top-1/4 sm:top-3">Department</label>
                                    </div>
                                    <div class="textField-label-content w-3/12">
                                        <label for="pmrcRProgramID"></label>
                                        <select class="select" name="pmrcRProgram"
                                                onclick="this.setAttribute('value', this.value);"
                                                onchange="this.setAttribute('value', this.value);" value=""
                                                id="pmrcRProgramID">
                                            <option value="" hidden=""></option>
                                            <option value="1">1</option>
                                        </select>
                                        <label class="select-label top-1/4 sm:top-3">Program</label>
                                    </div>
                                </div>
                                <div class="flex my-2 px-5 w-full justify-center content-center gap-32">
                                    <div class="textField-label-content w-3/12">
                                        <input class="textField" type="text" placeholder="email here"
                                               name="pmrcREmail" id="pmrcREmailID" value="">
                                        <label class="textField-label">Email</label>
                                    </div>
                                    <div class="textField-label-content w-3/12">
                                        <input class="textField" type="text" placeholder="email password"
                                               name="pmrcRPassword" id="pmrcPasswordID" value="">
                                        <label class="textField-label">Password</label>
                                    </div>

                                </div>
                            </form>

                            <form method="post" class="hidden flex flex-col overflow-hidden" id="caRoleCreationFormID">
                                <div class="flex my-2 px-5 w-full justify-center content-center gap-32">
                                    <div class="textField-label-content w-3/12">
                                        <label for="carcRDepartmentID"></label>
                                        <select class="select" name="carcDepartment"
                                                onclick="this.setAttribute('value', this.value);"
                                                onchange="this.setAttribute('value', this.value);" value=""
                                                id="carcRDepartmentID">
                                            <option value="" hidden=""></option>
                                            <option value="1">1</option>
                                        </select>
                                        <label class="select-label top-1/4 sm:top-3">Department</label>
                                    </div>
                                    <div class="textField-label-content w-3/12">
                                        <label for="carcRDepartmentID"></label>
                                        <select class="select" name="carcProgram"
                                                onclick="this.setAttribute('value', this.value);"
                                                onchange="this.setAttribute('value', this.value);" value=""
                                                id="carcRProgramID">
                                            <option value="" hidden=""></option>
                                            <option value="1">1</option>
                                        </select>
                                        <label class="select-label top-1/4 sm:top-3">Program</label>
                                    </div>
                                </div>
                                <div class="flex my-2 px-5 w-full justify-center content-center gap-32">
                                    <div class="textField-label-content w-3/12">
                                        <label for="carcRSeasonID"></label>
                                        <select class="select" name="carcSeason"
                                                onclick="this.setAttribute('value', this.value);"
                                                onchange="this.setAttribute('value', this.value);" value=""
                                                id="carcRSeasonID">
                                            <option value="" hidden=""></option>
                                            <option value="1">1</option>
                                        </select>
                                        <label class="select-label top-1/4 sm:top-3">Batch/Season</label>
                                    </div>
                                    <div class="textField-label-content w-3/12">
                                        <label for="carcRSectionID"></label>
                                        <select class="select" name="carcSection"
                                                onclick="this.setAttribute('value', this.value);"
                                                onchange="this.setAttribute('value', this.value);" value=""
                                                id="carcRSectionID">
                                            <option value="" hidden=""></option>
                                            <option value="1">1</option>
                                        </select>
                                        <label class="select-label top-1/4 sm:top-3">Section</label>
                                    </div>
                                </div>
                                <div class="flex my-2 px-5 w-full justify-center content-center gap-32">
                                    <div class="textField-label-content w-3/12">
                                        <input class="textField" type="text" placeholder="email here"
                                               name="carcEmail" id="carcEmailID" value="">
                                        <label class="textField-label">Email</label>
                                    </div>
                                    <div class="textField-label-content w-3/12">
                                        <input class="textField" type="text" placeholder="email here"
                                               name="carcPassword" id="carcPasswordID" value="">
                                        <label class="textField-label">Password</label>
                                    </div>
                                </div>
                            </form>

                            <!--absolute inset-y-0 inset-x-full left-r flex items-center w-72-->
                            <div class="absolute inset-x-2/3 m-8 flex items-center" style="bottom: 40%"
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
                            </div>
                            <div class="text-right mx-0 my-2">
                                <button type="button"
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
</html>