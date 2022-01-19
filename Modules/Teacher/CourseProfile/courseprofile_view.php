<?php

include "phpcode/CourseProfile.php";
//include "phpcode/CourseInstructor.php";
//include "phpcode/AssessmentWeight.php";

if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
}
$cp_data = $_SESSION['currentSubjectEssential_array'];

$courseProfile  = new CourseProfile("Operation Research", "OR0192", "3", "7th Semester" ,
    "F18 Bachy",  "Undergraduate" , "F-18 and onwards","None"
,"Still None" , "23" , "many reference" ,
    "Dr.Shaheen","xxxxxxxxxxxxxxxxxxxx","none reference" ,null, null);

$profileID = 1;

// fetch data from server.





?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Weekly Covered Topics</title>

    <link href="../../../Assets/Frameworks/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script rel="script" src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="CourseProfileAssets/css/courseInject.css" rel="stylesheet">
    <link href="CourseProfileAssets/css/courseProfileStyle.css" rel="stylesheet">
    <script src="CourseProfileAssets/js/CourseProfileView.js" rel="script"></script>

</head>

<body>
<div class="w-full min-h-full">
    <header class="hidden bg-white shadow-md">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8 flex items-center justify-between h-20">
            <h1 class="text-3xl font-bold text-blue-800 flex-grow text-center">Weekly Covered Topics</h1>

            <!--  Desktop view of top          -->
            <div class="hidden md:block">
                <div class="ml-2 flex items-center md:ml-6">
                    <!-- Profile -->
                    <div class="mr-3 relative">

                        <div class="user-profile-section-desktop">
                            <button type="button" class="max-w-6xl bg-gray-800 rounded-full flex items-center

                            text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-200 focus:ring-white"
                                    id="user-menu-button"
                            ">
                            <!--                            aria-expanded="false" aria-haspopup="true   -->
                            <span class="sr-only">Open user menu</span>
                            <img class="h-14 w-14 rounded-full"
                                 src="../../../Assets/Images/profilePicAvatar.jpg" alt="">
                            </button>
                        </div>
                        <div class="hidden origin-top-right absolute right-0 mt-2 w-48
                                    rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none flex flex-col">
                            <a href="#" class=" px-4 py-2 text-sm text-gray-700">Your Profile</a>
                            <a href="#" class=" px-4 py-2 text-sm text-gray-700">Settings</a>
                            <a href="#" class=" px-4 py-2 text-sm text-gray-700">Sign out</a>
                        </div>
                    </div>
                    <!--                  bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none
                                            focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white-->
                    <div class="flex flex-col relative">
                        <p class="text-sm  text-gray-800 text-center">2321321</p>
                        <div class="w-full self-center border-t-2 border-gray-300 "></div>
                        <p class="text-sm text-gray-800 text-center">Student F18-BCSE-037</p>
                    </div>

                </div>
            </div>
            <!--            Mobile View-->
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                        class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>

                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>

                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <main class="main-content-alignment">
        <div class="cprofile-primary-border text-black rounded-t-md rounded-b-md mt-2 h-full bg-catalystLight-f5">
            <h2 class="cprofile-container-centertxt"> Course-Name Course Profile</h2>

            <!--    course profile whole section     -->
            <section id="cpWholeDetail" class="cprofile-content-box-border cprofile-grid mx-0 my-0 ">
                <!--   base information   -->
                <div class="cprofile-content-division bg-white">

                    <div class="cprofile-left-container mx-3 w-2/5 ml-5">
                        <!--                        course title-->
                        <!--                        <div class="flex flex-row w-full" id="courseTitleDivId">
                            <label class="w-1/2 text-base font-bold">Course Title<span>:&nbsp;</span></label>
                            <label class="w-full text-sm leading-6"> Operation Research</label>
                        </div>-->
                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">Course Title:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2"><?php echo $courseProfile->getCourseTitle() ?></span>
                            </p>
                        </div>

                        <!--                        course Code-->
                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">Course Code:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="courseCodeID-view"><?php echo $courseProfile->getCourseCode() ?></span>
                            </p>
                        </div>

                        <!--                        credit Hour-->
                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">Credit Hour:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="creditHourID-view"><?php echo $courseProfile->getCourseCreditHr() ?></span>
                            </p>
                        </div>



                        <!--                        Pre requisite-->

                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">Course Pre-requisite:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="preRequisiteID-view"><?php echo "ajeeb" ?></span>
                            </p>
                        </div>


                        <!--                       Term (select semester )-->
                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">Term:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="semesterTermID-view"><?php echo $courseProfile->getCourseProgram() ?></span>
                            </p>
                        </div>


                        <!--                       Program level-->
                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">Program level:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="ProgramLevelID-view"><?php echo $courseProfile->getCourseProgramLevel() ?></span>
                            </p>
                        </div>


                        <!--                        program-->

                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">Program:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="programID-view">BCSE</span>
                            </p>
                        </div>

                        <!--                        course effective-->

                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">Course Effective:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="courseEffectiveID-view">Fall-18 Batch Onwards</span>
                            </p>
                        </div>

                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">Coordinating Unit:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="coordinatingUnitID-view">.....</span>
                            </p>
                        </div>

                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">teaching Methodology:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="teachingMethodologyID-view">....</span>
                            </p>
                        </div>

                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">Course Model:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="courseInteractionModelID-view">idk</span>
                            </p>
                        </div>


                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">ReferenceBooks:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="referenceBooksID-view">....</span>
                            </p>
                        </div>



                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">RecommendedTextbooks:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="recommendedTextbooksID-view">.......</span>
                            </p>
                        </div>


                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">Course Description:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="courseDescriptionID-view">CSS SlideShow – Are you looking for CSS based SideShow Plugins, If yes then in this post I am going to share hand-picked CSS SlideShow Examples for you. jQuery sliders, slideshows, and galleries are extremely common on a variety of different types of websites. Portfolio sites, blogs, e-commerce sites, and about any type of site can make use of a jQuery slideshow. Fortunately, there are a number of great plugins already coded that make it easy to add a slideshow</span>
                            </p>
                        </div>

                        <div class="flex flex-row my-2  w-full space-y-0">
                            <p class="font-semibold text-based py-2 text-justify">Other reference Material:&nbsp;
                                <span class="mt-1 font-normal text-sm text-justify text-gray-900 sm:mt-0 sm:col-span-2" id="otherReferenceId-view">Operation Research</span>
                            </p>
                        </div>


                    </div>
                    <div class="cprofile-right-container flex-1 w-2/5 ml-20 pb-5 mr-5">

                        <div class="text-md rounded-t-lg border-gray-300 border-t-2 border-r-2 border-l-2 border-b-2 border-solid mb-10 shadow-md" style="background-color: #0284fc">
                            <h2 class="text-center my-3 font-bold text-white">Course Instructor Details</h2>
                            <div class="grid bg-white border-solid border-t-2 text-center">

                                <div class="assessment-wrap mx-35 space-y-0 my-2">
                                    <h4 class="font-semibold text-based py-2 w-1/3">Name:&nbsp</h4>
                                    <div class="vertical-line"></div>
                                    <span class="w-full mt-1 font-normal text-sm text-justify text-gray-900" id="otherReferenceID-view">hello mello</span>
                                </div>

                                <div class="assessment-wrap mx-35 space-y-0 my-2 ">
                                    <h4 class="font-semibold text-based py-2 w-1/3">Designation:&nbsp</h4>
                                    <div class="vertical-line"></div>
                                    <span class="w-full mt-1 font-normal text-sm text-justify text-gray-900" id="DesignationDetailID-view"></span>
                                </div>

                                <div class="assessment-wrap mx-35 space-y-0 my-2">

                                    <h4 class="font-semibold text-based py-2 w-1/3">Qualification:&nbsp</h4>
                                    <div class="vertical-line"></div>
                                    <span class="w-full mt-1 font-normal text-sm text-justify text-gray-900" id="QualificationDetailID-view"></span>
                                </div>

                                <div class="assessment-wrap mx-35 space-y-0 my-2">
                                    <h4 class="font-semibold text-based py-2 w-1/3">Specialization:&nbsp</h4>
                                    <div class="vertical-line"></div>
                                    <span class="w-full mt-1 font-normal text-sm text-justify text-gray-900" id="specializationID-view"></span>
                                </div>

                                <div class="assessment-wrap mx-35 space-y-0 my-2">

                                    <h4 class="font-semibold text-based py-2 w-1/3">Contacts:&nbsp</h4>
                                    <div class="vertical-line"></div>
                                    <span class="w-full mt-1 font-normal text-sm text-justify text-gray-900" id="ContactsDetailID-view"></span>

                                </div>

                                <div class="assessment-wrap mx-35 space-y-0 my-2">

                                    <h4 class="font-semibold text-based py-2 w-1/3">Personal Email:&nbsp</h4>
                                    <div class="vertical-line"></div>
                                    <span class="w-full mt-1 font-normal text-sm text-justify text-gray-900" id="PersonalEmailDetailID-view"></span>

                                </div>

                            </div>
                        </div>


                        <div class="course-assessment-border shadow-md" style="background-color: #0284FC">
                            <h2 class="table-head">Assessment Instrument with Weights</h2>
                            <div class="grid bg-white  border-solid border-t-2 py-3 text-center">


                                <div class="assessment-wrap mx-35 space-y-0 my-2">
                                    <h4 class="font-semibold text-based py-2 w-1/2">Quizzes (<span class="font-medium text-sm">Weights</span>):&nbsp </h4>
                                    <div class="vertical-line"></div>
                                    <span class="w-full mt-1 font-normal text-sm text-justify text-gray-900" id="quizWeightID-view">2.5%</span>
                                </div>

                                <div class="assessment-wrap mx-35 space-y-0 my-2">
                                    <h4 class="font-semibold text-based py-2 w-1/2">Assignment (<span class="font-medium text-sm">Weights</span>):&nbsp </h4>
                                    <div class="vertical-line"></div>
                                    <span class="w-full mt-1 font-normal text-sm text-justify text-gray-900" id="assignmentWeightID-view">2.5%</span>
                                </div>

                                <div class="assessment-wrap mx-35 space-y-0 my-2">
                                    <h4 class="font-semibold text-based py-2 w-1/2">Projects (<span class="font-medium text-sm">Weights</span>):&nbsp </h4>
                                    <div class="vertical-line"></div>
                                    <span class="w-full mt-1 font-normal text-sm text-justify text-gray-900" id="projectWeightID-view">2.5%</span>
                                </div>

                                <div class="assessment-wrap mx-35 space-y-0 my-2">
                                    <h4 class="font-semibold text-based py-2 w-1/2">Mid-Term (<span class="font-medium text-sm">Weights</span>):&nbsp </h4>
                                    <div class="vertical-line"></div>
                                    <span class="w-full mt-1 font-normal text-sm text-justify text-gray-900" id="midtermWeightID-view">2.5%</span>
                                </div>

                                <div class="assessment-wrap mx-35 space-y-0 my-2">
                                    <h4 class="font-semibold text-based py-2 w-1/2">Final-Term (<span class="font-medium text-sm">Weights</span>):&nbsp </h4>
                                    <div class="vertical-line"></div>
                                    <span class="w-full mt-1 font-normal text-sm text-justify text-gray-900" id="finaltermWeightID-view">2.5%</span>
                                </div>


                            </div>
                        </div>


                        <!--<div class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6"  style="background-color: #0284fc">
                                <h3 class="text-lg leading-6 font-bold text-white text-center" >
                                    Applicant Information
                                </h3>
                            </div>
                            <div class="border-t border-gray-200">

                                <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                    <h4 class="font-semibold text-based w-1/3">Name:&nbsp;</h4>
                                    <span class="w-full mt-1 font-normal text-sm text-justify text-gray-900" id="otherReferenceID-view">hello mello</span>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Application for
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        Backend Developer
                                    </dd>
                                </div>
                                <div class=" px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Email address
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        margotfoster@example.com
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Salary expectation
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        $120,000
                                    </dd>
                                </div>
                                <div class=" px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                    <dt class="text-sm font-medium text-gray-500">
                                        About
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
                                    </dd>
                                </div>

                            </div>
                        </div>-->

                    </div>
                </div>


                <!--   assigned CLO with their respective PLO.   -->
                <div class="mx-2 p-4 clo-container ">
                    <div class="clo-table-border rounded-md shadow-sm" style="background-color: #0284FC">
                        <h2 class="table-head">Assigned CLO's With Mapping</h2>
                        <div id="vCloMappingDivID"
                             class="bg-white p-4  gap-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">


                        </div>
                    </div>
                </div>

                <!--   Update Button   -->
                <div class="text-right mx-4">
                    <button type="button" class="loginButton" name="updatecpbtn" id="updateCourseProfilebtn">Update
                    </button>

                    <script>

                        $('updateCourseProfilebtn').on('click', function () {
                            location.href = "courseprofile.php?profileID="+<?php echo $profileID?>;
                        })
                    </script>
                </div>
            </section>
        </div>
    </main>

<script src="CourseProfileAssets/js/additionalWork.js"></script>
<script>
    let curriculumID = <?php echo json_encode($_SESSION['cpid'], JSON_HEX_TAG) ?>)
    let batchID = <?php echo json_encode($_SESSION['batchcode'], JSON_HEX_TAG) ?>)
    </div>
    </body>
    let courseCodeID = <?php echo json_encode($_SESSION['ccode'], JSON_HEX_TAG) ?>)

    $.ajax({
        type: "POST",
        url: 'phpcode/CourseProfile.php',
        data: {
            curriculumID: curriculumID,
            batchID: batchID,
            courseCodeID: courseCodeID
        },
        success: function (data) {
            clearAllStorage();
            // setLocalStorage("courseCLO_key", arrayCLO)
            // setLocalStorage("courseMap_key", arrayMapping)
            // console.log("getting data from AJAX :", data)
            // location.href = "courseprofile_view.php";
        }
    });

</script>
</html>
