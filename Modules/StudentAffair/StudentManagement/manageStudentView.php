<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();

$program = new Program();
//$season = new Season();
$batch = new Batch();
$section = new Section();

$departmentList = $program->retrieveEntireDepartmentList();
$programList = $program->retrieveEntireProgramList();
//$seasonList = $season->retrieveSeasonList();

$batchList = $batch->retrieveEntireBatchList();

/*
 *  TESTING FOR DUPLICATION FOR DIFFERENT SECTIONS.
 *
 * $studentList = $section->retrieveStudentList(82);
print $studentList[0]['studentReg'];
$duplicateList = array();
$student = new StudentRole();
$student->createStudentData(82, 'FUI/FURC-SP-15-BCSE-066', $studentList[0]['name'], $studentList[0]['fatherName'], $studentList[0]['contact'],
    $studentList[0]['bloodGroup'], $studentList[0]['address'], $studentList[0]['dob'], $studentList[0]['officialEmail'], $studentList[0]['personalEmail'], '324324', $duplicateList);
print "wtf :" . json_encode($duplicateList);*/

if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['fetchSections'])) {
    if (isset($_POST['batchCode'])) {
        $batchCode = $_POST['batchCode'];
        $sectionList = $section->retrieveSectionsBasedOnBatch($batchCode);
        if (count($sectionList) !== 0 and !empty($sectionList))
            die(json_encode($sectionList));
        else
            die(json_encode(array("0", "section list empty")));
    } else
        die(json_encode(array("0", "check batch code")));
}

?>


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
    <!--    <script src="../../../node_modules/xlsx/xlsx.mjs" rel="script"></script>-->
    <script src="../../../node_modules/xlsx/dist/xlsx.full.min.js" rel="script"></script>
    <!-- BCSE , FALL-2021 , SECTION    -->
</head>
<body>
<div class="w-full min-h-full" style="background-color: #ECECF3">

    <main class="main-content-alignment min-h-full">
        <section>
            <div class="flex flex-col px-10 py-2 my-5 rounded-lg shadow bg-white">
                <h2 class="font-semibold text-2xl text-gray-700 capitalize">Search Box</h2>
                <p class="font-normal text-base text-gray-700 capitalize">Please select the respective fields to
                    view desired students list of section.
                </p>
                <div class="inline-flex rounded" style="background-color: #F4F8F9">

                    <div class="flex flex-grow justify-center items-center pt-3 pb-2 text-white text-base font-medium mx-20 w-3/4">
                        <div class="textField-label-content w-1/4">
                            <label for="viewStudentDepartmentSelectId"></label>
                            <select class="select" name="viewStudentDepartmentSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="viewStudentDepartmentSelectId">
                                <option value="" hidden=""></option>

                                <?php
                                $refineDepartmentList = array();
                                foreach ($departmentList as $index => $role) {
                                    $currentDep = $role['departmentName'];
                                    if (!in_array($currentDep, $refineDepartmentList)) {
                                        print sprintf("<option  value=\"%s\" >%s</option>", $role['departmentCode'], $role['departmentSN']);
                                        $refineDepartmentList[] = $role['departmentName'];
                                    }
                                }
                                ?>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Department</label>
                        </div>
                        <div class="textField-label-content w-1/4">
                            <label for="viewStudentProgramSelectId"></label>
                            <select class="select" name="viewStudentProgramSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="viewStudentProgramSelectId">
                                <option value="" hidden=""></option>

                            </select>
                            <label class="select-label top-1/4 sm:top-3">Program</label>
                        </div>
                        <!--  <div class="textField-label-content w-1/4">
                            <label for="viewStudentSeasonSelectId"></label>
                            <select class="select" name="viewStudentSeasonSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="viewStudentSeasonSelectId">
                                <option value="" hidden=""></option>
                                <?php
                        /*                                $refineSeasonList = array();
                                                        foreach ($seasonList as $index => $role) {
                                                            $currentDep = $role->getseasonCode();
                                                            if (!in_array($currentDep, $refineSeasonList)) {
                                                                print sprintf("<option  value=\"%s\" >%s</option>", $role->getseasonCode(),  $role->getseasonName());
                                                                $refineSeasonList[] = $role->getseasonName();
                                                            }
                                                        }
                                                        */ ?>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Season</label>
                        </div>-->
                        <div class="textField-label-content w-1/4">
                            <label for="viewStudentBatchSelectId"></label>
                            <select class="select" name="viewStudentBatchSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="viewStudentBatchSelectId">
                                <option value="" hidden=""></option>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Batch</label>
                        </div>

                        <div class="textField-label-content w-1/4">
                            <label for="viewStudentSectionSelectId"></label>
                            <select class="select" name="viewStudentSectionSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="viewStudentSectionSelectId">
                                <option value="" hidden=""></option>

                            </select>
                            <label class="select-label top-1/4 sm:top-3">Section</label>
                        </div>
                    </div>

                </div>
            </div>

            <div id="uploadedTableContainer"
                 class="bg-white outline-none ring-2 ring-catalystLight-e1 text-black rounded-md mt-2 my-5 weeklytopics-primary-border-n">

                <div class="db-table-header-topic items-center border-b-0 rounded-b-none pb-0"
                     style="background-color: #F4F8F9">
                    <div class="flex flex-row justify-center items-center">
                        <img class="mx-2 h-6 transition duration-800 ease-in-out hidden" width="25" height="20"
                             src="../../../Assets/Images/arrow-back.svg" alt="arrow-back-section">
                        <h2 class="flex items-center justify-center text-lg text-center font-semibold  text-gray-700 tracking-wide text-center capitalize">
                            Imported Program Courses and allocation information will be shown here.
                        </h2>
                    </div>

                    <div id="sheetNoId" class="flex mx-auto flex-wrap justify-center work-sheet-container">
                    </div>
                </div>

                <div id="showStudentLoaded"
                     class="bg-white rounded-t-none rounded-b-md border-solid px-5 pt-4 pb-4 border-t-0 transform transition ease-out duration-700">

                </div>

                <div class="text-right mx-10 my-0">
                    <button id="updateStudentRecordBtn" class="my-4 sm:mt-0 inline-flex
                     items-start justify-start px-10 py-2.5 bg-blue-500 hover:bg-blue-600
                        focus:outline-none rounded hidden">
                        <label class="text-sm font-medium leading-none text-white">Update</label>
                    </button>
                </div>

            </div>

        </section>
    </main>

</div>

<script>
    let departmentList = <?php echo json_encode($departmentList);?>;
    let programList =  <?php echo json_encode($programList);?>;
    //let seasonList =  <?php //echo json_encode($seasonList);?>//;
    let batchList =  <?php echo json_encode($batchList);?>;

    console.log("Department List : ", departmentList)
    console.log("program List : ", programList)
    // console.log("season List : " , seasonList)
    console.log("batch List : ", batchList)

</script>

<script src="assets/Js/manageStudent.js"></script>
<script src="assets/Js/manager.js"></script>
</body>
</html>
