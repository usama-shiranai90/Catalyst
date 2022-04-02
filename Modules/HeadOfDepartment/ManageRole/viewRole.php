<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();
$admin = unserialize($_SESSION['adminInstance']);
$personalDetails = $admin->getInstance();
$adminCode = $_SESSION['adminCode'];
$departmentCode = $_SESSION['departmentCode'];

$listOfAllocatedAdministratorRolesList = AdministrativeRole::retrieveListOfAdminRoles($departmentCode);
///*foreach ($listOfAllocatedAdministratorRolesList as $index => $role)
//    foreach ($role as $selectedFaculty)
//        print json_encode($selectedFaculty);*/

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Administration View Role</title>
    <script src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="../../../Assets/Scripts/Master.js" rel="script"></script>
    <script src="../../../Assets/Scripts/InterfaceUtil.js"></script>
    <script src="asset/js/adminstrativeRoleView.js"></script>

</head>
<body>
<div class="w-full min-h-full " style="background-color: #ECECF3">
    <main class="main-content-alignment min-h-full">

        <section>
            <div class="flex flex-col rounded-t-lg shadow bg-white">
                <div class="px-10 my-5">
                    <p class="font-semibold text-2xl text-gray-700">Faculty Information
                    </p></div>


                <div class="inline-flex rounded-t-lg" style="background-color: #F4F8F9">
                    <h2 class="font-semibold text-lg text-gray-700 flex justify-center items-center w-1/4">Top
                        Filter</h2>
                    <div class="flex justify-center items-center pt-3 pb-2 text-white text-base font-medium w-3/4">

                        <div class="textField-label-content w-3/12">
                            <label for="administrativeDesignation"></label>
                            <select class="select" name="administrativeDesignation"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="administrativeDesignationId">
                                <option value="" hidden=""></option>
                                <?php
                                $designationList = array();
                                foreach ($listOfAllocatedAdministratorRolesList as $index => $role) {
                                    foreach ($role as $selectedFaculty) {
                                        $currentDesignation = $selectedFaculty['designation'];
                                        if (!in_array($currentDesignation, $designationList)) {
                                            print sprintf("<option  value=\"%s\" >%s</option>", $selectedFaculty['designation'], $selectedFaculty['designation']);
                                            $designationList[] = $selectedFaculty['designation'];
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Designation</label>
                        </div>

                        <div class="textField-label-content w-3/12">
                            <label for="administrativeRole"></label>
                            <select class="select" name="administrativeRoleId"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="administrativeRoleId">
                                <option value="" hidden=""></option>


                                <!--                                <option value="2018" data-select-id="1">2018</option>-->
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Role</label>
                        </div>
                    </div>
                    <div class="flex justify-center items-center w-1/6">
                        <svg id="refreshAdministrativeRoleBtn" xmlns="http://www.w3.org/2000/svg"
                             class="h-6 w-8 transform transition hover:scale-90"
                             fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                    </div>
                </div>
            </div>


            <div class="bg-white outline-none ring-2 ring-catalystLight-e1 text-black rounded-md mt-0.5 my-5 weeklytopics-primary-border-n">
                <!--                <div class="h-60 text-center font-medium text-2xl flex justify-center items-center"> Limit for program learning outcome not selected.</div>-->
                <section class=" bg-white rounded-t-none rounded-b-md border-solid px-5 pt-4 pb-4 border-t-0">
                    <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative  rounded">
                        <thead>
                        <tr class="text-center bg-catalystLight-f5">
                            <th class="capitalize px-4 py-3 w-1/6 tracking-wider font-medium text-sm rounded-tl rounded-bl  sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs ">
                                Faculty ID #
                            </th>
                            <th class="capitalize px-4 py-3 w-1/4 tracking-wider font-medium text-sm rounded-tl rounded-bl">
                                Name
                            </th>
                            <th class="capitalize px-4 py-3 w-1/4 tracking-wider font-medium text-sm">
                                Email
                            </th>
                            <th class="capitalize px-4 py-3 w-1/4 tracking-wider font-medium text-sm">
                                Role
                            </th>
                            <th class="capitalize px-4 py-3 w-1/6 tracking-wider font-medium text-sm"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        include $_SERVER['DOCUMENT_ROOT']."\Modules\HeadOfDepartment\ManageRole\asset\operation\ViewAdministrativeAjax.php";
                        loadAdminData($listOfAllocatedAdministratorRolesList);
                        ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>
    </main>
</div>


<div id="alertContainer"
     class="hidden shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 w-80 m-auto fixed top-1/3 left-1/3 z-5">
    <div class="w-full h-full text-center">
        <div class="flex h-full flex-col justify-between">
            <img src="../../../Assets/Images/vectorFiles/Others/Dot-section.svg" alt="cross"
                 class="h-12 w-12 mt-4 m-auto" id="cmimageID">
            <p class="text-gray-600 dark:text-gray-100 text-md py-2 px-6">
                Do you wish to delete the selected <span class="text-gray-800 dark:text-white font-bold">Program Learning Outcome</span>?
                <span class="text-gray-800 dark:text-white font-bold">Note : </span> It will be deleted from database.
                <span class="text-red-500 dark:text-white font-semibold italic">By removing any PLO , it may affect the course or program relation. Please contact HOD.</span>
            </p>
            <div id="aboxcontainer" class="flex items-center justify-between gap-4 w-full mt-8">
                <button id="alertBtnNoCurriculum" type="button" class="loginButton py-2 px-4 hover:bg-indigo-700
                        text-black w-full transition ease-in duration-200 text-center text-base
                         font-semibold shadow-md rounded-lg">No
                </button>

                <button id="alertBtndeleteCurriculum" type="button" class="loginButton py-2 px-4 hover:bg-indigo-700
                        text-black w-full transition ease-in duration-200 text-center text-base
                         font-semibold shadow-md rounded-lg">Yes
                </button>

            </div>
        </div>
    </div>
</div>


<script>

</script>

</body>
</html>

