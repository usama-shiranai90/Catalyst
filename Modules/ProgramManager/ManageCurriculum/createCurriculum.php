<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\SearchUtil.php";

session_start();
$adminCode = $_SESSION['adminCode']; // FUI-FURC-057
$programCode = $_SESSION['programCode'];

/** Curriculum Object is created */
$curriculum = new Curriculum();
$curriculumList = $curriculum->getPreviousCurriculumList($programCode ,true); // get latest curriculum list (array/null)
$currentOnGoingYear = date('Y'); // date is a built-in function use to get current year. i.e. 2022

echo json_encode($curriculumList) . PHP_EOL . $currentOnGoingYear . PHP_EOL . "<br>";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Curriculum Creation</title>
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../../Assets/Scripts/Master.js" rel="script"></script>
    <script src="../../../Assets/Scripts/MasterNavigationPanel.js" rel="script"></script>
    <script src="../../../Assets/Scripts/InterfaceUtil.js"></script>
    <script src="assets/js/creationJs.js" type="text/javascript"></script>
    <style>
        input::placeholder {
            color: white;
        }
    </style>
</head>
<body>
<div class="w-full min-h-full " style="background-color: #ECECF3">
    <main class="main-content-alignment min-h-full">
        <!-- Import box section. -->
        <div id="curriculumBoxContainerID" class="flex flex-col px-10 py-2 my-5 rounded-lg shadow bg-white">
            <h2 class="font-semibold text-2xl text-gray-700">Import Box</h2>
            <p class="font-normal text-base text-gray-700">Please select the respective <span
                        class="capitalize font-semibold">program</span> along with the allocated
                <span class="capitalize font-semibold">year</span></p>
            <div class="inline-flex">
                <div class="flex flex-grow justify-end items-center pt-3 pb-2 text-white text-base font-medium ml-20 w-3/4">
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
                        <label for="curriculumAssignYearID"></label>
                        <select class="select" name="curriculumAssignYear"
                                onclick="this.setAttribute('value', this.value);"
                                onchange="this.setAttribute('value', this.value);"
                                value=""
                                id="curriculumAssignYearID">
                            <option value="" hidden=""></option>
                            <?php

                            /** used to generate year range from four years ago to four years after.
                             * i.e. current year is 2022 then its -4 year will be 2018 ,  +4 years will be 2026.
                             *   so we need to create a range set of years from 2018 to 2026.
                             */
                            $tempKeyReference = "";
                            $tempValueReference = "";
                            if ($curriculumList == null)
                                $earliestYear = date('Y', strtotime("-4 year")); // 2018
                            elseif ($curriculumList[0]["year"] > date('Y')) { // check if curriculumList first most
                                $earliestYear = date('Y', strtotime("-4 year")); // 2018
                            } else
                                $earliestYear = reset($curriculumList)['year'];  // reset function is use to get the first index ( value )
                            // of an array and then get by key => year 2020.

                            $nextFourYear = date('Y', strtotime("+4 year")); // 2026
                            foreach (range($earliestYear, $nextFourYear) as $year) {
                                if (iterateAndSearchValue($curriculumList, $year, $tempKeyReference, $tempValueReference)) {
                                    print sprintf("<option  value=\"%s\"%s data-select-id=\"%s\">%s</option>",
                                        $year, $year == $currentOnGoingYear ? '' : '', $tempKeyReference, $year);
                                } else
                                    print '<option value="' . $year . '"' .
                                        ($year == $currentOnGoingYear ? '' : '') . '>' . $year . '</option>';
                            }
                            ?>
                        </select>
                        <label class="select-label top-1/4 sm:top-3">Assign Year</label>
                    </div>
                    <div class="textField-label-content w-3/12">
                        <label for="curriculumSeasonNameId"></label>
                        <select class="select" name="curriculumSeasonName"
                                onclick="this.setAttribute('value', this.value);"
                                onchange="this.setAttribute('value', this.value);" value=""
                                id="curriculumSeasonNameId">
                            <option value="" hidden=""></option>

                        </select>
                        <label class="capitalize select-label top-1/4 sm:top-3">Curriculum Name</label>
                    </div>
                    <div class="textField-label-content w-3/12">
                        <label for="noOfPLOsToCreateId"></label>
                        <select class="select" name="noOfPLOsToCreate"
                                onclick="this.setAttribute('value', this.value);"
                                onchange="this.setAttribute('value', this.value);" value=""
                                id="noOfPLOsToCreateId">
                            <option value="" hidden=""></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>

                        </select>
                        <label class="capitalize select-label top-1/4 sm:top-3">No of PLO</label>
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

        <div id="creationCurriculumSectionId"
             class="bg-white outline-none ring-2 ring-catalystLight-e1 text-black rounded-md mt-2 my-5 weeklytopics-primary-border-n">
            <div class="db-table-header-topic border-b-0 rounded-b-none bg-catalystBlue ">
                <h2 class="text-xl text-center font-bold text-white tracking-wide text-center capitalize">Creation Of
                    Curriculum</h2>
            </div>
            <div class="h-60 text-center font-medium text-2xl flex justify-center items-center"> Limit for
                program
                learning outcome not selected.
            </div>
            <section
                    class="hidden  bg-white rounded-t-none rounded-b-md border-solid px-5 pt-4 pb-4 border-t-0 cprofile-grid">
                <form id="curriculumFormCreationId" method="post"
                      class="flex flex-col overflow-hidden ring-2 ring-catalystLight-e1 rounded-md shadow-none">
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
                            name="saveNewlyCreatedCurriculumBtn" id="saveNewlyCreatedCurriculumBtnId">Save
                    </button>
                </div>
            </section>

        </div>

    </main>
</div>
<div class="hidden">

</div>
</body>

<script src="assets/js/Common.js"></script>
<script>
    function autoHeight(element) {
        const el = document.getElementById(element);
        el.style.height = "5px";
        el.style.height = (el.scrollHeight) + "px";
    }
</script>

</html>




