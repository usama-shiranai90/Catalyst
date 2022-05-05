<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\SearchUtil.php";
session_start();

$adminCode = $_SESSION['adminCode'];
$programCode = $_SESSION['programCode'];

$curriculum = new Curriculum();
$curriculumList = $curriculum->getPreviousCurriculumList($programCode , false);

print json_encode($curriculumList);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Manage Curriculum</title>
    <script src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../../Assets/Scripts/MasterNavigationPanel.js" rel="script"></script>
    <script src="/Assets/Scripts/InterfaceUtil.js" rel="script"></script>
    <script src="../../../Assets/Scripts/Master.js" rel="script"></script>
    <script src="assets/js/controlJs.js" rel="script"></script>
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <style>
        input::placeholder {
            color: white;
        }
    </style>
</head>
<body>
<div class="w-full min-h-full " style="background-color: #ECECF3">
    <main class="main-content-alignment min-h-full">
        <section id="curriculumSearchBoxSectionId">
            <div id="curriculumBoxContainerID" class="flex flex-col rounded-lg shadow bg-white">
                <div class="px-10 my-5">
                    <h2 class="font-semibold text-2xl text-gray-700 capitalize">Search Box</h2>
                    <p class="font-normal text-base text-gray-700">Please select the program learning outcome<span
                                class="capitalize font-semibold"> assigned year</span> and <span
                                class="capitalize font-semibold">Program Name</span>
                </div>
                <div class="inline-flex rounded-lg" style="background-color: #F4F8F9">
                    <h2 class="font-semibold text-lg text-gray-700 flex justify-center items-center w-1/4">Top
                        Filter</h2>
                    <div class="flex justify-center items-center pt-3 pb-2 text-white text-base font-medium w-3/4">
                        <div class="textField-label-content w-3/12">
                            <label for="curriculumProgramId"></label>
                            <select class="select" name="curriculumProgram"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);"
                                    value="<?php echo $_SESSION['programName'] ?>"
                                    id="curriculumProgramId">
                                <option value="" hidden=""></option>
                                <option value="<?php echo $_SESSION['programName'] ?>" selected
                                        disabled><?php echo $_SESSION['programName'] ?></option>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Program</label>
                        </div>
                        <div class="textField-label-content w-3/12">
                            <label for="curriculumAllocationYearId"></label>
                            <select class="select" name="curriculumAllocationYear"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);"
                                    value=""
                                    id="curriculumAllocationYearId">
                                <option value="" hidden=""></option>
                                <?php
                                foreach ($curriculumList as $curriculum)
                                    print sprintf("<option  value=\"%d\" data-select-id=\"%s\">%d</option>",
                                        $curriculum['year'], $curriculum['code'], $curriculum['year']);
                                ?>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Assign Year</label>
                        </div>
                    </div>
                    <div class="flex justify-center items-center w-1/6">
                        <svg id="refreshCurriculumBtn" xmlns="http://www.w3.org/2000/svg" class="h-6 w-8 cursor-pointer" fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                    </div>
                </div>
            </div>


            <!-- ignore -->
            <div class="mt-6 flex justify-between items-center">
                <!--    <div class="flex-1 pr-4 hidden" aria-disabled="true">
                        <div class="relative md:w-1/3">
                            <input type="search"
                                   class="w-full pl-10 pr-4 py-2 rounded-md shadow focus:outline-none focus:shadow-outline text-gray-900 font-medium"
                                   placeholder="Search..." disabled>
                            <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                    <circle cx="10" cy="10" r="7"></circle>
                                    <line x1="21" y1="21" x2="15" y2="15"></line>
                                </svg>
                            </div>
                        </div>
                    </div>-->
            </div>


            <div id="curriculumTabularContainerID"
                 class="bg-white outline-none ring-2 ring-catalystLight-e1 text-black rounded-md mt-2 my-5 weeklytopics-primary-border-n">

                <section class="bg-white rounded-t-none rounded-b-md border-solid px-5 pt-4 pb-4 border-t-0">
                    <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative  rounded">
                        <thead>
                        <tr class="text-center bg-catalystLight-f5">
                            <th class="capitalize px-4 w-1/4 py-3 tracking-wider font-medium text-sm rounded-tl rounded-bl
                                    sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs ">
                                No #
                            </th>
                            <th class="capitalize px-4 w-1/4 py-3  tracking-wider font-medium text-sm rounded-tl rounded-bl">
                                Program
                            </th>
                            <th class="capitalize px-4 py-3 w-2/4  tracking-wider font-medium text-sm">
                                Assign Year
                            </th>
                            <th class="capitalize px-4 py-3 w-1/4 tracking-wider font-medium text-sm"></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $counter = 1;
                        foreach ($curriculumList as $curriculum) {
                            print sprintf('<tr>
                            <td class="border-dashed  w-1/4 border-t border-gray-200 ">
                                <span class="text-gray-700 px-6 py-3 flex justify-center items-center">%d</span>
                            </td>
                            <td class="border-dashed w-1/4 border-t border-gray-200 ">
                                <span class="text-gray-700  px-6 py-3 flex justify-center items-center">%s</span>
                            </td>
                            <td class="border-dashed border-t w-2/4 border-gray-200">
                                <div class="">
                                    <span class="text-gray-700 px-6  py-3 flex justify-center items-center">%s</span>
                                </div>
                            </td>
                            <td class="border-dashed w-1/4 border-t border-gray-200 ">
                              <div class= "flex items-center justify-center gap-1" >
                             <button type="button" id="viewCurriculum-%d">
                           <svg enable-background="new 0 0 32 32"  class="w-6 h-6 text-blue-500 hover:text-blue-600 cursor-pointer transform hover:scale-105" viewBox="0 0 32 32"
                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><polyline fill="none" points="   649,137.999 675,137.999 675,155.999 661,155.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><polyline fill="none" points="   653,155.999 649,155.999 649,141.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><polyline fill="none" points="   661,156 653,162 653,156  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/></g><g><g><path d="M16,25c-4.265,0-8.301-1.807-11.367-5.088c-0.377-0.403-0.355-1.036,0.048-1.413c0.404-0.377,1.036-0.355,1.414,0.048    C8.778,21.419,12.295,23,16,23c4.763,0,9.149-2.605,11.84-7c-2.69-4.395-7.077-7-11.84-7c-4.938,0-9.472,2.801-12.13,7.493    c-0.272,0.481-0.884,0.651-1.363,0.377c-0.481-0.272-0.649-0.882-0.377-1.363C5.147,10.18,10.333,7,16,7    c5.668,0,10.853,3.18,13.87,8.507c0.173,0.306,0.173,0.68,0,0.985C26.853,21.819,21.668,25,16,25z"/></g><g><path d="M16,21c-2.757,0-5-2.243-5-5s2.243-5,5-5s5,2.243,5,5S18.757,21,16,21z M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3    s3-1.346,3-3S17.654,13,16,13z"/></g></g></svg>
                                </button>
                                 <button type="button" id="editCurriculum-%d">
                                   <svg xmlns="http://www.w3.org/2000/svg" 
                                   class="w-6 h-6 text-blue-500 hover:text-blue-600 cursor-pointer transform hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"  />
                            </svg>
                                </button>
                                 <button type="button" id="deleteCurriculum-%d">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-6 h-6 text-red-500 hover:text-red-600 cursor-pointer transform hover:scale-105"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                            </td>
                        </tr>', $counter, "BCSE", $curriculum['year'], $curriculum['code'], $curriculum['code'], $curriculum['code']);
                            $counter++;
                        }
                        ?>
                        </tbody>
                    </table>


                    <div id="selectedProgramOutcomeDetailDivId"
                         class="hidden container px-5 my-5 mx-auto flex flex-col sm:rounded-sm">
                        <h2 class="leading-normal font-medium text-base px-1 py-3">Program Learning Outcome for the
                            selected curriculum </h2>

                        <div class="border-2 border-gray-200 rounded">
                            <div class="learning-outcome-head row-flex w-full mx-0">
                                <div class="cprofile-column h-10 w-24 border-0 border-r-2">
                                    <span class="cprofile-cell-data">PLO #</span>
                                </div>
                                <div class="cprofile-column h-10 w-3/4 border-0">
                                    <span class="cprofile-cell-data">Description</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </section>
            </div>
        </section>

        <div id="editCurriculumSectionId"
             class="hidden bg-white outline-none ring-2 ring-catalystLight-e1 text-black rounded-md mt-2 my-5 weeklytopics-primary-border-n">

            <div class="flex flex-row items-center bg-catalystBlue-l8">
                <label id="backArrowId" class="transform hover:scale-90 cursor-pointer">
                    <svg width="37" height="37" class="mx-2 h-6 transition duration-800 ease-in-out" viewBox="0 0 37 37"
                         fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.3333 7.7085L4.625 15.4168L12.3333 23.1252" stroke="#FFFFFF" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.625 15.417H16.9583C25.473 15.417 32.375 22.319 32.375 30.8337V32.3753"
                              stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </label>
                <div class="db-table-header-topic shadow-l rounded-b-none w-full">
                    <h2 class="text-xl text-center font-bold text-white tracking-wide text-center capitalize">Updation
                        Curriculum</h2>
                </div>

            </div>

            <section
                    class="bg-white rounded-t-none rounded-b-md border-solid px-5 pt-4 pb-4 border-t-0 cprofile-grid">
                <form id="curriculumFormUpdateId" method="post"
                      class="flex flex-col overflow-hidden border-solid border-2 border-catalystLight-e1 rounded-md shadow-none">
                    <div id="cCurriculumHeaderId" class="learning-outcome-head learning-week-header-dp overflow-hidden">
                        <div class="lweek-column border-l-0 bg-catalystLight-f5 col-start-1 col-span-1 rounded-tl-md">
                            <span class="wlearn-cell-data">PLO No</span>
                        </div>
                        <div class="lweek-column col-start-2 col-span-10">
                            <span class="wlearn-cell-data">Description</span>
                        </div>
                        <div class="lweek-column border-r-0 col-start-12 col-span-1">
                            <span class="wlearn-cell-data">Status</span>
                        </div>
                    </div>
                </form>

                <div class="flex justify-center">
                    <button type="button" aria-label="add_clos_button_label" class="max-w-2xl rounded-full"
                            id="add-clo-btn" aria-expanded="false" aria-haspopup="true">
                        <img id="addMoreCurriculumBtn" class="h-8 w-8 rounded-full"
                             src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" alt="">
                    </button>
                </div>
                <div class="text-right mx-4">
                    <button type="button"
                            class="text-white rounded-md border-0  font-medium bg-catalystBlue-l2 px-8 mx-5 py-1"
                            name="updateCurriculumBtn" id="updateCurriculumBtnId">Update
                    </button>
                </div>
            </section>
        </div>
    </main>
</div>

<div id="alertContainer"
     class="hidden shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 w-80 m-auto fixed top-1/3 left-1/3 z-5">
    <div class="w-full h-full text-center">
        <div class="flex h-full flex-col justify-between">
            <img src="../../../Assets/Images/vectorFiles/Others/Dot-section.svg" alt="cross"
                 class="h-12 w-12 mt-4 m-auto" id="cmimageID">
            <p class="text-gray-600 dark:text-gray-100 text-md py-2 px-6">
                Do you wish to delete the selected <span
                        class="text-gray-800 dark:text-white font-bold">Program Learning Outcome</span>?
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
</body>

<script src="assets/js/Common.js"></script>
<script>
    let curriculumList = <?php echo json_encode($curriculumList);?>;
    console.log(curriculumList);
</script>

</html>