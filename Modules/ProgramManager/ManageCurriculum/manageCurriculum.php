<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\SearchUtil.php";
session_start();

$adminCode = $_SESSION['adminCode'];

$curriculum = new Curriculum();
$curriculumList = $curriculum->getPreviousFewCurriculumYear(false);

echo json_encode($curriculumList) . PHP_EOL . PHP_EOL . "<br>";
//foreach ($curriculumList as $year) {
//    echo json_encode($year['year'])."<br>";
//}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Student Profile</title>
    <link href="/Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="/Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="/Assets/Scripts/Master.js" rel="script"></script>
    <script src="assets/js/creationJs.js" type="text/javascript"></script>
    <script src="/Assets/Frameworks/jQuery/jquery.min.js" type="text/javascript"></script>
    <script src="/Assets/Scripts/MasterNavigationPanel.js" rel="script"></script>
    <script src="assets/js/controlJs.js" rel="script"></script>

</head>
<body>
<div class="w-full min-h-full " style="background-color: #ECECF3">
    <main class="main-content-alignment min-h-full">

        <section id="curriculumSearchBoxSectionId" class="">
            <div id="curriculumBoxContainerID" class="flex flex-col rounded-lg shadow bg-white">
                <div class="px-10 my-5">
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
                                    onchange="this.setAttribute('value', this.value);" value="BCSE"
                                    id="curriculumProgramId">
                                <option value="" hidden=""></option>
                                <option value="BCSE" selected disabled>BCSE</option>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Program</label>
                        </div>
                        <div class="textField-label-content w-3/12">
                            <label for="curriculumAllocationYearId"></label>
                            <select class="select" name="curriculumAllocationYear"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);"
                                    value="<?php echo $currentOnGoingYear = date('Y') ?>"
                                    id="curriculumAllocationYearId">
                                <option value="" hidden=""></option>
                                <?php
                                foreach ($curriculumList as $year)
                                    print sprintf("<option  value=\"%s\" data-select-id=\"%s\">%d</option>", $year['year'], $year['code'], $year['year']);
                                ?>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Assign Year</label>
                        </div>
                    </div>
                    <div class="flex justify-center items-center w-1/6">
                        <svg id="refreshCurriculumBtn" xmlns="http://www.w3.org/2000/svg" class="h-6 w-8 " fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-between items-center">
                <div class="flex-1 pr-4" aria-disabled="true">
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
                </div>
            </div>

            <div id="curriculumContainerId"
                 class="bg-white outline-none ring-2 ring-catalystLight-e1 text-black rounded-md mt-2 my-5 weeklytopics-primary-border-n">
                <!--<div class="h-60 text-center font-medium text-2xl flex justify-center items-center"> Limit for program learning outcome not selected.</div>-->
                <section class=" bg-white rounded-t-none rounded-b-md border-solid px-5 pt-4 pb-4 border-t-0">
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
                                <div class="flex items-center justify-center gap-3">
                                    <button id="viewCurriculum-%d" class="focus:ring-2 focus:ring-offset-2  focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">
                                        View
                                    </button>
                                    <button id="editCurriculum-%d" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                                        <p class="text-sm font-medium leading-none text-white">Edit</p>
                                    </button>
                                </div>
                            </td>
                        </tr>', $counter, "BCSE", $curriculum['year'], $curriculum['code'],  $curriculum['code']);
                            $counter++;
                        }
                        ?>
                        </tbody>
                    </table>

                    <div id="selectedProgramOutcomeDetailDivId"
                         class="hidden container px-5 my-5 mx-auto flex flex-col sm:rounded-sm">
                        <h2>Program Learning Outcome for the selected curriculum </h2>

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


    </main>
</div>

</body>
<script>
    let curriculumArray = <?php echo json_encode($curriculumList);?>;
    console.log(curriculumArray);
</script>

</html>