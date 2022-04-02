<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();

$adminCode = $_SESSION['adminCode'];
$departmentCode = $_SESSION['adminCode'];
$programCode = $_SESSION['programCode'];
$batchCode = $_SESSION['batchCode'];
$sectionCode = $_SESSION['sectionCode'];

$admin = unserialize($_SESSION['adminInstance']);
$personalDetails = $admin->getInstance();
print $departmentCode . " " . $programCode . " " . $batchCode . "  " . $sectionCode;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="../../../Assets/Scripts/Master.js" rel="script"></script>
    <script src="../../../Assets/Scripts/InterfaceUtil.js"></script>
    <script src=""></script>

</head>
<body>
<div class="w-full min-h-full" style="background-color: #ECECF3">

    <main class="main-content-alignment min-h-full">
        <section>
            <div class="flex flex-col px-10 py-2 my-5 rounded-lg shadow bg-white">
                <h2 class="font-semibold text-2xl text-gray-700 capitalize">Import Box</h2>
                <p class="font-normal text-base text-gray-700 capitalize">Please select the respective <span
                            class="capitalize font-semibold">Batch/Season , semester </span> along with the allocated
                    <span class="capitalize font-semibold">curriculum year</span></p>
                <div class="inline-flex rounded" style="background-color: #F4F8F9">
                    <div class="flex flex-grow justify-end items-center pt-3 pb-2 text-white text-base font-medium ml-20 w-3/4">
                        <div class="textField-label-content w-3/12">
                            <label for="importCourseOfferingProgramSelectId"></label>
                            <select class="select" name="importCourseOfferingProgramSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="importCourseOfferingProgramSelectId">
                                <option value="" hidden=""></option>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Program</label>
                        </div>
                        <div class="textField-label-content w-3/12">
                            <label for="importCourseOfferingBatchSelectId"></label>
                            <select class="select" name="importCourseOfferingBatchSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="importCourseOfferingBatchSelectId">
                                <option value="" hidden=""></option>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Batch/Season</label>
                        </div>
                        <div class="textField-label-content w-3/12">
                            <label for="importCourseOfferingSemesterSelectId"></label>
                            <select class="select" name="importCourseOfferingSemesterSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="importCourseOfferingSemesterSelectId">
                                <option value="" hidden=""></option>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Semester</label>
                        </div>
                        <div class="textField-label-content w-3/12">
                            <label for="importCourseOfferingCurriculumSelectId"></label>
                            <select class="select" name="importCourseOfferingCurriculumSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="importCourseOfferingCurriculumSelectId">
                                <option value="" hidden=""></option>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Curriculum</label>
                        </div>
                    </div>
                    <div class="flex justify-end items-center w-1/6">
                        <button type="button"
                                class="text-white rounded-md border-0  font-medium bg-catalystBlue-l2 px-8 mx-5 py-1"
                                name="importBoxCreateBtn" id="importBoxCreateBtnID">Create
                        </button>
                    </div>
                </div>
            </div>


            <div id="importedTableContainer"
                 class="bg-white outline-none ring-2 ring-catalystLight-e1 text-black rounded-md mt-2 my-5 h-1/2 weeklytopics-primary-border-n">
                <div class="db-table-header-topic border-b-0 rounded-b-none" style="background-color: #F4F8F9">
                    <h2 class="flex items-center justify-center text-lg text-center font-semibold  text-gray-700 h-14 tracking-wide text-center capitalize">
                        Imported
                        Program Courses and allocation information will be shown here.</h2>
                </div>

                <section
                        class="hidden bg-white rounded-t-none rounded-b-md border-solid px-5 pt-4 pb-4 border-t-0 cprofile-grid">
                    <form id="curriculumFormCreationId" method="post"
                          class="flex flex-col overflow-hidden border-solid border-2 border-catalystLight-e1 rounded-md shadow-none">
                        <div id="cCurriculumHeaderId"
                             class="learning-outcome-head learning-week-header-dp overflow-hidden">
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
                                name="saveNewlyCreatedCurriculumBtn" id="saveNewlyCreatedCurriculumBtnId">Save
                        </button>
                    </div>
                </section>
            </div>


        </section>
    </main>

</div>
</body>
</html>
