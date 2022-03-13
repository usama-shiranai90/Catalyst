<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();

$studentRegCode = $_SESSION['studentRegistrationCode'];
//$batchCode = $_SESSION['batchCode'];
$_SESSION['batchCode'] = 4;
$batchCode = 4;
$programCode = $_SESSION['programCode'];

$personalDetails = array();
$student = unserialize($_SESSION['studentInstance']);
$personalDetails = $student->getPersonalDetails();

$totalEnrolledCourses = 0;
$totalCreditHour = 0;

$currentSemester = new Semester();
$isPromotedToNewSemester = $currentSemester->retrieveCurrentSemester($batchCode);

//echo sprintf("%s    %d    %s<br>", $studentRegCode, $batchCode, $programCode);
//echo $currentSemester->getSemesterName()."th  ".$currentSemester->getSemesterCode();

if ($isPromotedToNewSemester) {
    $enrolledCourses = new Course();
    $enrolledCourseWithOutcomeArray = $enrolledCourses->getEnrolledCourses($studentRegCode, $currentSemester->getSemesterCode() , $batchCode , $programCode);
    /*    echo json_encode($enrolledCourseWithOutcomeArray);
        echo json_encode($enrolledCourseWithOutcomeArray[0]->getCourseCLOList())."<br>";
        echo json_encode($enrolledCourseWithOutcomeArray[0]->getCourseCLOList()[0]['cloName'])."<br>";*/

    foreach ($enrolledCourseWithOutcomeArray as $course) {
        $totalCreditHour += (int)$course->getCourseCreditHour();
        $totalEnrolledCourses++;
    }
} else {
    echo "Not promoted to next Semester Error.";
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

    <link href="/Assets/Frameworks/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <link href="/Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="/Assets/Stylesheets/Master.css" rel="stylesheet">
    <script async src="/Assets/Frameworks/apexChart/apexcharts.js"></script>
    <script async src="assets/js/DashboardGraphicalData.js"></script>
    <script async rel="script" src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/Assets/Scripts/MasterNavigationPanel.js" rel="script"></script>

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
                            <!--  <div class="w-24 h-24 rounded-full relative">
                                  <svg width="120"  height="120" viewBox="0 0 174 188" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                      <path opacity="0.253397" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M31.0745 134.469C31.0745 134.469 31.9461 129.681 35.3737 140.939C38.8013 152.197 77.5592 176.837 90.533 156.882C103.507 136.927 121.849 159.319 134.52 153.33C147.19 147.341 149.197 139.437 139.753 120.393C130.309 101.348 153.54 78.1413 130.382 63.2216C107.225 48.302 125.153 51.9673 125.153 51.9673L125.035 112.879L94.036 140.825L31.0745 134.469Z"
                                            fill="url(#paint0_linear_147_8174)"/>
                                      <path opacity="0.518059" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M122.982 75.1806C122.982 75.1806 120.289 75.0248 126.252 72.369C132.215 69.7131 143.159 46.6544 131.307 40.8514C119.454 35.0484 130.538 23.4069 126.389 16.8226C122.241 10.2384 117.757 9.6679 107.916 16.1724C98.0744 22.677 79.0883 5.30399 72.4403 19.0948C65.7923 32.8856 77.0847 16.142 77.0847 16.142L104.774 24.8037L122.237 40.0093L122.982 75.1806Z"
                                            fill="url(#paint1_linear_147_8174)"/>
                                      <path d="M131.891 81.6732C131.891 116.474 103.512 144.734 68.4457 144.734C33.379 144.734 5 116.474 5 81.6732C5 46.8722 33.379 18.6123 68.4457 18.6123C103.512 18.6123 131.891 46.8722 131.891 81.6732Z"
                                            stroke="#89DEFE" stroke-width="10"/>
                                      <path d="M64.1495 18.757C73.2611 18.1424 82.3983 19.4901 90.9368 22.7076C99.4752 25.925 107.213 30.9358 113.622 37.3961C120.031 43.8564 124.961 51.6139 128.077 60.1383C131.193 68.6626 132.423 77.7542 131.682 86.7928"
                                            stroke="url(#paint2_linear_147_8174)" stroke-width="10" stroke-linecap="round"/>
                                      <defs>
                                          <linearGradient id="paint0_linear_147_8174" x1="35.7478" y1="76.6855" x2="217.106" y2="144.119"
                                                          gradientUnits="userSpaceOnUse">
                                              <stop stop-color="#C2E2FF"/>
                                              <stop offset="1" stop-color="#5092F8"/>
                                          </linearGradient>
                                          <linearGradient id="paint1_linear_147_8174" x1="89.6826" y1="76.2067" x2="114.736" y2="-28.4012"
                                                          gradientUnits="userSpaceOnUse">
                                              <stop stop-color="#C3D7EE"/>
                                              <stop offset="1" stop-color="#5092F8"/>
                                          </linearGradient>
                                          <linearGradient id="paint2_linear_147_8174" x1="75.2903" y1="-7.81427" x2="82.927" y2="233.325"
                                                          gradientUnits="userSpaceOnUse">
                                              <stop stop-color="#0184FC"/>
                                              <stop offset="1" stop-color="#016BDD"/>
                                          </linearGradient>
                                      </defs>
                                  </svg>
                              </div>-->
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

<script>

    let courseWithOutcomeArray = JSON.parse('<?php echo json_encode($enrolledCourseWithOutcomeArray); ?>');
    console.log(courseWithOutcomeArray)

</script>
</body>
</html>
