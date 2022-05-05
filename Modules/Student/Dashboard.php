<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();

$studentRegCode = $_SESSION['studentRegistrationCode'];// FUR/12/2019-BSE-0-030
$batchCode = $_SESSION['batchCode']; // 4
$programCode = $_SESSION['programCode'];

$personalDetails = array();
$student = unserialize($_SESSION['studentInstance']);
$personalDetails = $student->getInstance();

// variable declaration:
$programLearningOutcomeList = null;
$enrolledCourseWithCLOArray = null;
$enrolledCourseWithCLOArray = null;
$totalEnrolledCourses = 0;
$totalCreditHour = 0;

// Object Creation for CGPA.
$cgpa = new AccumulatedCGPA();
$hasPreviousRecord = $cgpa->retrieveLatestCGPA($studentRegCode); // true or false.
$studentSemesterGpaArray = $cgpa->studentAllSemesterGPA($studentRegCode); // null or array

// Object Creation for Semester.
$currentSemester = new Semester();
$isPromotedToNewSemester = $currentSemester->retrieveCurrentSemester($batchCode);
if ($isPromotedToNewSemester) { // check if student is promoted to new semester.

    // gets students latest approved PLO List.
    $programLearningOutcomeList = $cgpa->getProgramLearningOutcomeTranscriptStudent($studentRegCode, $currentSemester->getSemesterCode());

    $enrolledCourses = new Course();
    $enrolledCourseWithCLOArray = $enrolledCourses->getEnrolledCourses($studentRegCode, $currentSemester->getSemesterCode(), $batchCode, $programCode);

    if ($enrolledCourseWithCLOArray !== null && sizeof($enrolledCourseWithCLOArray) > 0)
        foreach ($enrolledCourseWithCLOArray as $index => $course) {
            $totalCreditHour += (int)$course->getCourseCreditHour();
            $totalEnrolledCourses++;
        }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script async src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="../../Assets/Scripts/InterfaceUtil.js"></script>
    <script src="../../Assets/Frameworks/apexChart/apexcharts.js"></script>
    <link href="../../Assets/Frameworks/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <script async src="../../Assets/Scripts/MasterNavigationPanel.js" rel="script"></script>
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
</head>
<body>

<div class="w-full min-h-full">
    <main class="container mx-auto py-3 max-w-7xl px-5">
        <section class=" cprofile-grid mx-0 my-0 ">
            <div class="mx-2 p-4 clo-container ">
                <div class="grid grid-cols-4 gap-6">

                    <!-- Top Section , CGPA , CS , CH , EC -->
                    <div class="shadow-lg rounded-2xl w-full h-40 p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <div id="studentCGPA_ProgressCircle" class="rounded-full absolute top-14">
                            </div>
                        </div>
                    </div>
                    <div class="shadow-lg rounded-2xl w-full h-40  p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <div class="rounded-full relative">
                                <p class="text-catalystBlue-d1 text-2xl text-center font-bold mb-4 mt-4">Current <br>Semester
                                </p>
                            </div>
                            <p class="text-3xl font-semibold"
                               style="color: #003C9C"><?php
                                echo $currentSemester->getSemesterName()
                                ?></p>
                        </div>
                    </div>
                    <div class="shadow-lg rounded-2xl w-full h-40  p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <div class="rounded-full relative">
                                <p class="capitalize text-catalystBlue-d1 text-2xl text-center font-bold mb-4 mt-4">
                                    credit<br> hour</p>
                            </div>
                            <p class="text-3xl font-semibold" style="color: #003C9C"><?php echo $totalCreditHour ?></p>
                        </div>
                    </div>
                    <div class="shadow-lg rounded-2xl w-full h-40  p-4 py-4 bg-white">
                        <div class="flex flex-col items-center justify-center">
                            <div class="rounded-full relative">
                                <p class="capitalize text-catalystBlue-d1 text-2xl text-center font-bold mb-4 mt-4">
                                    Enrolled <br>Courses</p>
                            </div>
                            <p class="text-3xl font-semibold"
                               style="color: #003C9C"><?php echo $totalEnrolledCourses ?></p>
                        </div>
                    </div>
                    <div class="col-span-2 bg-white border-2 border-solid rounded-md">
                        <div id="studentCurrentPLOProgress" class="rounded-full">
                        </div>
                    </div>
                    <div class="col-span-2 bg-white border-2 border-solid rounded-md">
                        <div id="studentCurrenGPAProgress" class="rounded-full">
                        </div>
                    </div>


                    <!--   Enrolled Courses.  -->
                    <div class="col-span-4 flex flex-row db-table-container">

                        <!--   register courses list left side.  -->
                        <div class="text-black rounded-t-md rounded-b-md mt-2 w-5/12">
                            <h2 class="text-md pl-5 my-2 font-bold">Register Courses</h2>

                            <section class="py-4 clo-container hidden">
                                <!--  Subjects list -->
                                <div class="mb-10  py-1 gap-5 grid grid-rows-6 font-medium text-sm text-gray-700">
                                    <div class="flex flex-row py-2 justify-start border-b-2 border-solid border-catalystLight-e1 hover:bg-catalystLight-e3">
                                        <p class="px-10">Operation Research</p>
                                        <img class="w-5" id="s-arrow-r" alt="" src="../../Assets/Images/left-arrow.svg">
                                    </div>
                                </div>
                            </section>

                            <section class="flex flex-col mx-auto justify-center gap-5" id="registerCourseDivID">

                            </section>
                        </div>

                        <!--   selected subject table right side.  -->
                        <div class="w-full mx-auto overflow-auto shadow-md">
                            <h2 class="table-head text-center text-black">Selected Course Information</h2>
                            <table id="courseTableID" class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                <tr class="text-center bg-catalystLight-f5">
                                    <th class="capitalize px-4 w-1/4 py-3 title-font tracking-wider font-medium text-sm rounded-tl rounded-bl">
                                        course learning outcome
                                    </th>
                                    <th class="capitalize px-4 py-3 w-full title-font tracking-wider font-medium text-sm">
                                        Description
                                    </th>
                                </tr>
                                </thead>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
</div>

<script async src="assets/js/DashboardGraphicalData.js"></script>
<script>

    let CumulativeGradePointAverageObject = JSON.parse('<?php echo json_encode($cgpa); ?>');
    let hasPreviousGPA = JSON.parse('<?php echo json_encode($hasPreviousRecord); ?>');
    let studentSemesterGpaArray = JSON.parse('<?php echo json_encode($studentSemesterGpaArray); ?>');
    let courseWithCLOArray = JSON.parse('<?php echo json_encode($enrolledCourseWithCLOArray); ?>');
    let programLearningOutcomeList = JSON.parse('<?php echo json_encode($programLearningOutcomeList); ?>');

    console.log("Courses List : " , courseWithCLOArray)
    console.log("CGPA : " , CumulativeGradePointAverageObject)
    console.log("PLO List " , programLearningOutcomeList)
    console.log("Student Semester GPA List ", studentSemesterGpaArray)
</script>
</body>
</html>