<?php
include $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
if (session_status() === PHP_SESSION_NONE || !isset($_SESSION))
    session_start();

$programCode = $_SESSION['selectedProgram'];
$curriculumCode = $_SESSION['selectedCurriculum'];
$batchCode = $_SESSION['selectedBatch'];
$sectionCode = $_SESSION['selectedSection'];
$courseCode = $_SESSION['selectedCourse'];
$facultyCode = $_SESSION['facultyCode'];
$faculty = unserialize($_SESSION['facultyInstance']);
$listOfAllocations = $faculty->retrieveAllocations($facultyCode);

//print sprintf("Program Code : %s <br> Curriculum Code : %s <br> batchCode : %s <br> sectionCode : %s <br> courseCode %s \n<br>", $programCode, $curriculumCode, $batchCode, $sectionCode, $courseCode);
//print "Allocation LIST :" .json_encode($listOfAllocations)."<br>";

$courseProfile = new CourseProfile();
$courseLearningOutcome = new CLO();
$activity = new ClassActivity();

$courseOutcomeList = $courseLearningOutcome->retrieveCLOlist($programCode, $curriculumCode, $batchCode, $courseCode); // 1 , 1  ,4, SEN-28
//print json_encode($courseOutcomeList);

/** the following function may change depending on our current scenario (for coordinator) */
$isProfileCreated = $courseProfile->isCourseProfileExist($programCode, $batchCode, $courseCode);  //$_SESSION['selectedCourse'], $_SESSION['selectedProgram'], $_SESSION['selectedBatch']        //  ,$_SESSION['selectedCurriculum']

$allottedCourseNames = array();
$courseNamesBeingShown = array();
for ($x = 0; $x < sizeof($listOfAllocations); $x++) {
    $allottedCourseNames[] = $listOfAllocations[$x]->getCourse()->getCourseTitle();
    if (!in_array($allottedCourseNames[$x], $courseNamesBeingShown))
        $courseNamesBeingShown[] = $allottedCourseNames[$x];
}
$allottedCourseNames = $courseNamesBeingShown;
unset($courseNamesBeingShown);
//print "allotted course name :".json_encode($allottedCourseNames);

$fetchWeeklyTopic = null;
if ($isProfileCreated === TRUE) {
    $courseProfileCode = $courseProfile->getCourseProfileCode();
    $weeklyTopic = new WeeklyTopic();
    $fetchWeeklyTopic = $weeklyTopic->retrieveLastInsertedWeeklyTopic($courseProfileCode);
}

$assessmentObject = $activity->getLatestCourseSpecificAssessment($_SESSION['selectedSection'], $_SESSION['selectedCourse']);
$fetchAssessment = array();
if ($assessmentObject != null)
    $fetchAssessment = array($assessmentObject->getActivityType(),
        $assessmentObject->getTitle(), $assessmentObject->getWeightage(),
        $assessmentObject->getTopic(), $assessmentObject->getListOfQuestions(),
    );

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalyst | Dashboard</title>
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <link href="../asset/TeacherDashboardStyles.css" rel="stylesheet">
    <script src="../../../Assets/Frameworks/jQuery/jquery.min.js" type="text/javascript"></script>
    <script src="../../../Assets/Scripts/Master.js" rel="script"></script>
    <script src="../../../Assets/Scripts/MasterNavigationPanel.js" rel="script"></script>
    <script>
        window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
        )
        window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
        )
        window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
        )
    </script>
    <script src="../../../Assets/Frameworks/apexChart/apexcharts.js"></script>
</head>

<body>
<div class="w-full min-h-full">
    <main class="container mx-auto py-3 max-w-7xl px-5">
        <section class=" cprofile-grid mx-0 my-0 ">
            <div class="mx-2 p-4 clo-container ">
                <div class="grid grid-cols-4 gap-6">

                    <!-- Top Section , CGPA , CS , CH , EC -->
                    <div class="hidden shadow-lg col-span-1 rounded-2xl w-full h-40  p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <div class="rounded-full relative">
                                <p class="text-catalystBlue-d1 text-2xl text-center font-bold mb-4 mt-4">Student
                                    <br>Strength</p>
                            </div>
                            <p id="teacherDashboardTotalStudentID" class="text-3xl font-semibold"
                               style="color: #003C9C"></p>
                        </div>
                    </div>
                    <div class="hidden shadow-lg col-span-2 rounded-2xl w-full h-40  p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <div class="rounded-full relative">
                                <p class="capitalize text-catalystBlue-d1 text-2xl text-center font-bold mb-12 mt-4">
                                    Assign Sections</p>
                            </div>
                            <p class="text-3xl font-semibold" style="color: #003C9C"></p>
                        </div>
                    </div>
                    <div class="hidden shadow-lg col-span-1 rounded-2xl w-full h-40  p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <div class="rounded-full relative">
                                <p class="capitalize text-catalystBlue-d1 text-2xl text-center font-bold mb-4 mt-4">
                                    ---</p>
                            </div>
                            <p class="text-3xl font-semibold" style="color: #003C9C">-</p>
                        </div>
                    </div>

                    <!-- CLO Graph.  -->
                    <div class="col-span-2 bg-white border-2 border-solid rounded-md">
                        <div id="averageCLOAchievedID" class="rounded-full">
                            <!--                                    <apexchart type="radialBar" height="390" :options="chartOptions" :series="series"></apexchart>-->
                            <div class="px-2 py-2 sm:px-4 border-b border-gray-200">
                                <h2 class=" font-bold text-center">Average Achieved CLO Score</h2>
                            </div>
                        </div>
                    </div>

                    <!-- CLO list -->
                    <div class="col-span-2 db-table-container">
                        <div class="db-table-header-topic">
                            <h2 class="db-table-header-text">CLO's List</h2>
                        </div>

                        <table class="table-fixed w-full text-left whitespace-no-wrap min-h-0 REMOVED-h-5/6">
                            <thead>
                            <tr class="text-center bg-catalystLight-f5">
                                <th class="capitalize px-4 w-1/5 py-3  tracking-wider font-medium text-sm rounded-tl rounded-bl">
                                    CLO No
                                </th>
                                <th class="capitalize px-4 py-3 w-full  tracking-wider font-medium text-sm">
                                    Description
                                </th>
                            </tr>
                            </thead>
                            <tbody id="cloDashboardTableBodyID">


                            </tbody>
                        </table>

                    </div>

                    <!-- Latest Assessment Created. -->
                    <div class="col-span-2 db-table-container" id="assessmentDashboardContainerID">
                        <div class="db-table-header-topic">
                            <h2 class="db-table-header-text">Latest Assessment Created</h2>
                        </div>
                        <div class="px-4 py-2" id="assessmentDashboardBodyID">
                            <h2 class="font-semibold text-base py-2 tracking-widest text-gray-500 uppercase">
                                Mid Term</h2>
                            <p class="font-semibold text-based mb-3 text-justify text-gray-700">Topic :
                                <span class="text-sm font-normal leading-relaxed mb-3 text-gray-900">topic detail here </span>
                            </p>
                            <div class="flex flex-col space-y-0">
                                <p class="font-semibold text-based py-2 text-gray-700">Weightage : <span
                                            class="text-sm font-normal leading-relaxed mb-3 text-gray-900 sm:mt-0 sm:col-span-2">3.5%</span>
                                </p>
                            </div>

                        </div>
                        <div class="border-t-4">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                <tr class="text-center bg-catalystLight-f5">
                                    <th class="capitalize px-4 w-1/4 py-3  tracking-wider font-medium text-sm rounded-tl rounded-bl">
                                        Question No
                                    </th>
                                    <th class="capitalize px-4 w-3/5 py-3  tracking-wider font-medium text-sm rounded-tl rounded-bl">
                                        Question
                                    </th>
                                    <th class="capitalize px-4 py-3 w-1/3  tracking-wider font-medium text-sm">
                                        CLO
                                    </th>
                                </tr>
                                </thead>

                                <tbody id="assessmentDashboardBodyTableQuestionID">

                                </tbody>
                            </table>

                        </div>
                    </div>

                    <!-- Student performance Status. -->
                    <div id="studentPerformanceContainerID"
                         class="col-span-2 row-span-4 flex flex-col db-table-container">
                        <div class="db-table-header-topic">
                            <h2 class="db-table-header-text">Students Performance Matrix</h2>
                        </div>

                        <div class="w-full mx-auto overflow-auto">
                            <table class="table-fixed border-collapse w-full text-left whitespace-no-wrap transition duration-500 ease-in-out">
                                <thead>
                                <tr class="text-center bg-catalystLight-f5">
                                    <th rowspan="2" colspan="1"
                                        class="capitalize px-4 py-3 title-font tracking-wider font-medium text-sm rounded-tl rounded-bl">
                                        Registration no
                                    </th>
                                    <th rowspan="1" colspan="2"
                                        class="capitalize px-4 py-3 title-font tracking-wider font-medium text-sm">
                                        Outcome Performance
                                    </th>
                                </tr>
                                <tr id="studentPerformanceDashboardTableSubHeaderID"
                                    class="text-center bg-catalystLight-f5">
                                    <th class="capitalize px-4 py-3 title-font tracking-wider font-medium text-sm">CLO
                                        1
                                    </th>
                                    <th class="capitalize px-4 py-3 title-font tracking-wider font-medium text-sm">CLO
                                        2
                                    </th>
                                </tr>
                                </thead>

                                <tbody id="studentPerformanceDashboardBodyID"
                                       class="transition transform duration-500 ease-in-out">
                                <!-- <td class="px-1 py-3 w-full font-medium text-green-500">100.00 %</td>

                                                                    <td class="px-1 py-3 w-full font-medium ">
                                                            <div class="flex flex-row flex-wrap space-x-2 justify-between items-center">
                                                                <p class="ordinal slashed-zero tabular-nums font-semibold text-base">1st</p>
                                                                <p class="ordinal font-semibold text-base">2nd</p>
                                                            </div>

                                                        </td>
                    -->
                                <!--                                <tr class="text-center hover:bg-catalystLight-e3 text-sm font-base tracking-tight" data-assessment="4"></tr>-->


                                </tbody>
                            </table>


                        </div>
                    </div>

                    <!--  Latest Created Weekly Topics. -->
                    <div class="col-span-2 row-span-3 db-table-container relative" id="weeklyTopicDashboardContainerID">
                        <div class="db-table-header-topic">
                            <h2 class="db-table-header-text">Latest Created Weekly Topic</h2>
                        </div>
                        <div class="px-4 py-2" id="weeklyTopicDashboardBodyID">
                            <p class="font-semibold text-base py-2 tracking-widest text-gray-500 uppercase">Week : 1</p>
                            <p class="text-justify text-sm font-normal leading-relaxed mb-3 text-gray-900">
                                description here</p>
                            <div class="flex flex-col space-y-0">
                                <p class="font-semibold text-based py-2 text-gray-700">Assessment:
                                    <span class="text-sm font-normal leading-relaxed mb-3 text-gray-900 sm:mt-0 sm:col-span-2">enter detail of assessment here</span>
                                </p>
                            </div>
                        </div>
                        <div class="w-full border-t-4"> <!--absolute bottom-0-->
                            <div id="weeklyTopicDashboardBodyCloListID"
                                 class="flex flex-row my-3 items-center w-full text-center">
                            </div>
                        </div>
                    </div>

                    <!--  Register / Enrolled Courses.  -->
                    <!--                   <div class="col-span-2 row-span-4 flex flex-row border-2 border-solid rounded-md">
                                            <div class="text-black rounded-t-md rounded-b-md mt-2 w-5/12">
                                                <h2 class=" pl-5 my-2 font-bold">Register Courses</h2>

                                                <section class="py-4 clo-container">


                                                    <div class="mb-10  py-1 gap-5 grid grid-rows-6 font-medium text-sm text-gray-700">
                                                        <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                                            <p class="px-10">Operation Research</p>
                                                            <img class="w-5" id="s-arrow-r" alt=""
                                                                 src="../../../Assets/Images/left-arrow.svg">
                                                        </div>
                                                        <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                                            <p class=" px-10">Operation Research</p>
                                                            <img class="w-5" id="s-arrow-r" alt=""
                                                                 src="../../../Assets/Images/left-arrow.svg">
                                                        </div>
                                                        <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                                            <p class="px-10">Operation Research</p>
                                                            <img class="w-5" id="s-arrow-r" alt=""
                                                                 src="../../../Assets/Images/left-arrow.svg">
                                                        </div>
                                                        <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                                            <p class="px-10">Operation Research</p>
                                                            <img class="w-5" id="s-arrow-r" alt=""
                                                                 src="../../../Assets/Images/left-arrow.svg">
                                                        </div>
                                                        <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                                            <p class="px-10">Operation Research</p>
                                                            <img class="w-5" id="s-arrow-r" alt=""
                                                                 src="../../../Assets/Images/left-arrow.svg">
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                         <div class="w-full mx-auto overflow-auto shadow-md">
                                                    <h2 class="table-head text-center text-black">Selected Course Information</h2>
                                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                                        <thead>
                                                        <tr class="text-center bg-catalystLight-f5">
                                                            <th class="capitalize px-4 w-1/4 py-3  tracking-wider font-medium text-sm rounded-tl rounded-bl">
                                                                course learning outcome
                                                            </th>
                                                            <th class="capitalize px-4 py-3 w-full  tracking-wider font-medium text-sm">
                                                                Description
                                                            </th>
                                                            <th class="capitalize px-4 py-3 w-1/6  tracking-wider font-medium text-sm">
                                                                More
                                                            </th>
                                                        </tr>
                                                        </thead>

                                                        <tbody id="courseTableBodyID">
                                                        <tr class="text-center text-sm font-base tracking-tight">
                                                            <td class="px-4 py-3">CLO-1</td>
                                                            <td class="px-4 py-3 ">To control the letter spacing of an element at a
                                                                specific breakpoint
                                                            </td>
                                                            <td class="px-4 py-3"><i
                                                                        class="fa text-gray-600 fa-ellipsis-v hover:text-catalystBlue-l61"></i>
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>-->

                </div>
            </div>
        </section>
    </main>
</div>
</body>
<script>
    // ploArray = [24, 55, 99.9, 52, 72, 57, 0, 0, 0, 18, 51, 38]; // fetch from server.
    // totalCLO = ['CLO-1', 'CLO-2', 'CLO-3', 'CLO-4'];  // fetch from server
    // avgScorePerCLO = [66, 51, 33, 10];  // fetch from server
    //const courseLearningArray = <?php //echo json_encode($courseOutcomeList);?>//;
    //const recentWeeklyCoveredTopic = JSON.parse(<?php //echo json_encode($fetchWeeklyTopic);?>//);
    //const recentAssessmentArray = <?php //echo json_encode($fetchAssessment);?>//;

    <?php echo " const courseLearningArray = " . json_encode($courseOutcomeList) . ";"; ?>
    <?php echo " const recentWeeklyCoveredTopic = " . json_encode($fetchWeeklyTopic) . ";"; ?>
    <?php echo " const recentAssessmentArray = " . json_encode($fetchAssessment) . ";"; ?>

</script>
<script src="asset/dashboardScript.js" rel="script" async></script>
</html>


