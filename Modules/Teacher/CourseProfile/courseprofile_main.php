<?php
/*echo realpath(dirname(__FILE__));
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\CourseProfile\CourseProfile.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";*/
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";

if (session_status() === PHP_SESSION_NONE || !isset($_SESSION))
    session_start();

$personalDetails = array();
$facultyInstance = unserialize($_SESSION['facultyInstance']);
//$personalDetails = $facultyInstance->getInstance();

$programCode = $_SESSION['selectedProgram'];
$curriculumCode = $_SESSION['selectedCurriculum'];
$batchCode = $_SESSION['selectedBatch'];
$sectionCode = $_SESSION['selectedSection'];
$courseCode = $_SESSION['selectedCourse'];
$facultyCode = $_SESSION['facultyCode'];
$semesterCode = $_SESSION['selectedSemester'];
$programOutcomeList = $_SESSION['ploList'];
$isCoordinator = $_SESSION['courseCoordinatorStatus'];
//print $sectionCode."  ".$courseCode."  ".$semesterCode."<br>" ;
$courseProfile = new CourseProfile();
$viewCLODescription = '';
$viewCLOMapping = '';

$isFailedToPerformCourseProfile = array();
$affiliatedFacultyList = array();
$courseProfileInstructorList = array();
$containsSessional = false;

$isProfileCreated = '';
/** check if there exist Program learning outcome (curriculum) */
if (count($programOutcomeList) != 0 ) {
    $isProfileCreated = $courseProfile->isCourseProfileExist($programCode, $batchCode, $courseCode);
    $_SESSION['batchCode'] = $courseProfile->getBatchCode();
    if ($courseProfile->getBatchCode() != $batchCode)
        echo "course profile returning different batch code (something went wrong) : " . $courseProfile->getBatchCode() . "<br>";


    /** To check if profile exist or not.
     *  if exist return with code and #typeOfProfile with two
     *  otherwise return #typeOfProfile with one.
     */
    if ($isProfileCreated !== true)
        $_SESSION['typeOfProfile'] = 1; // CREATION COURSE PROFILE
    else {
        $_SESSION['typeOfProfile'] = 2; // UPDATE COURSE PROFILE
        $_SESSION['cp_id'] = $courseProfile->getCourseProfileCode();
    }

    /** function is used to return faculty List belonging to this course */
    $affiliatedFacultyList = (new Allocations())->retrieveSameAllocatedFacultyList($semesterCode, $courseCode); // $affiliatedFacultyList is only use to return sectionName , code , facultyCode etc.
    $prerequisiteList = (new Course())->retrieveCoursePrerequisite($courseCode);

    /** Has sessional been created before for any of the given sections then disable the toggle button. */
    $containsSessional = (new Sessional())->hasSessionalForAllSections($affiliatedFacultyList, $courseCode);

    /** Is executed when faculty member is in update mode. */
    if ($_SESSION['typeOfProfile'] != 1) { // in Update Mode.
        if (isset($_GET['profileID'])) {
            $courseProfile->loadCourseProfileData($_SESSION['cp_id'], $facultyCode);
            $courseProfileInstructorList = $courseProfile->retrieveAllInstructorDetail($_SESSION['cp_id'], $affiliatedFacultyList);

            $cloObject = new CLO();
            $viewCLODescription = $cloObject->retrieveAllCLOPerCourse($_SESSION['selectedCurriculum'],
                $_SESSION['selectedProgram'], $_SESSION['selectedCourse'], $_SESSION['selectedBatch'], 'PLODescription');  // add batchCode in the future.
            $viewCLOMapping = $cloObject->mappedPLOs;

        } // if in editor mode.
        else
            header("Location: courseprofile_view.php");
    }
}
if (count($programOutcomeList) == 0 and ($isCoordinator == 0 && !$isProfileCreated)) {
    $isFailedToPerformCourseProfile[] = array("alert-1" => "No Curriculum related found or Program Learning outcome has not been set"
    , "alert-2" => "Only Coordinator are allow to create profile for this course.");
}
elseif ($isCoordinator == 0 && !$isProfileCreated){
    $isFailedToPerformCourseProfile[] = array("alert-2" => "Only Coordinator are allow to create profile for this course.");
}
elseif ($isCoordinator == 0 && $isProfileCreated) {
    $isFailedToPerformCourseProfile[] = array("alert-2" => "Only Coordinator are allow to create profile for this course.");
} else {
    $isFailedToPerformCourseProfile[] = array("alert-1" => "No Curriculum related found or Program Learning outcome has not been set");
}

//print $isCoordinator ."  ".var_dump($isProfileCreated)."<br><br><br>";
//print $isCoordinator ."  ".$isProfileCreated == false."<br><br><br>";
//print json_encode($isFailedToPerformCourseProfile);

//$mem_usage = memory_get_usage();
//$mem_peak = memory_get_peak_usage();
//echo 'The script is now using: <strong>' . round(memory_get_usage() / 1024) . 'KB</strong> of memory.<br>';
//echo 'Peak usage: <strong>' . round($mem_peak / 1024) . 'KB</strong> of memory.<br><br>';
/*$PLOsArray = ['PLO 1' => "Data fetched via a separate HTTP request won't include any information from the HTTP request that fetched the HTML document. You may need this information (e.g., if the HTML document is generated in response to a form submission",
  'PLO 2' => "Allows for asynchronous data transfer - Getting the information from PHP might be time/resources expensive. Sometimes you just don't want to wait for the information, load the page, and have the information reach whenever",
  'PLO 3' => "Allows for asynchronous data transfer - Getting the information from PHP might be time/resources expensive. Sometimes you just don't want to wait for the information, load the page, and have the information reach whenever",
  'PLO 4' => "More readable - JavaScript is JavaScript, PHP is PHP. Without mixing the two, you get more readable code on both languages",
  'PLO 5' => "Better separation between layers - If tomorrow you stop using PHP, and want to move to a servlet, a REST API, or some other service, you don't have to change much of the JavaScript code.",
  'PLO 6' => "Use AJAX to get the data you need from the server. Echo the data into the page somewhere, and use JavaScript to get the information from the DOM.",
  'PLO 7' => "There are actually several approaches to do this. Some require more overhead than others, and some are considered better than others",
  'PLO 8' => "Post, we'll examine each of the above methods, and see the pros and cons of each, as well as how to implement ",
  'PLO 9' => "Waiting for multiple simultaneous AJAX requests to be finished has become quite easy by using the concept of Promises. We change each AJAX call to return a Promise. Promises from all AJAX calls are then passed to the Promise.all() method to find when all Promises are resolved.",
  'PLO 10' => "Date & time for a given IANA timezone (such as America/Chicago, Asia/Kolkata etc) can be found by using the Date.toLocaleString() method",
  'PLO 11' => "This tutorial discusses two ways of removing a property from an object. The first way is using the delete operator, and the second way is object destructuring which is useful to remove multiple object properties in a single",
  'PLO 12' => "Playing & pausing a CSS animation can be done by using the animation-play-state property. Completely restarting the animation can be done by first removing the animation"];*/
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Course Profile Management</title>

    <!--    <link href="../../../Assets/Frameworks/Tailwind/tailwind.css" rel="stylesheet">-->
    <link href="../../../Assets/Frameworks/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script rel="script" src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="CourseProfileAssets/css/courseProfileStyle.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="CourseProfileAssets/js/cpm_common.js" rel="script"></script>
    <link href="../../../Assets/Frameworks/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <script src="../../../Assets/Scripts/InterfaceUtil.js"></script>
    <style>

        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 23px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 17px;
            width: 17px;
            left: 2px;
            bottom: 3px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(17px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }


    </style>
    <script src="../../../Assets/Scripts/MasterNavigationPanel.js" rel="script"></script>
</head>
<body>
<div class="w-full min-h-full">
    <main class="main-content-alignment">
        <div class="cprofile-grid">

            <!--       Course-Profile-Main-Head         -->
            <div class="cprofile-content-head">
                <h3 class="text-2xl font-bold" id="subjectTopic">Course Profile Creation</h3>
                <p class="text-sm">Following data needs to be completed before manipulating student data
                    course.</p>
            </div>

            <!--        Course-Profile Container -->
            <div class="cprofile-primary-border text-black rounded-t-md rounded-b-md mt-2 h-full bg-catalystLight-f5">
                <div class="flex flex-row items-center">
                    <img class="hidden mx-2 h-6 transition duration-800 ease-in-out"
                         src="../../../Assets/Images/arrow-back.svg" alt="arrow-back-section">
                    <h2 class="min-w-full cprofile-container-centertxt">Course Profile Creation</h2>
                </div>

                <form method="post">

                    <!--     course essential section -->
                    <section id="cpEssentialID"
                             class="cprofile-content-box-border cprofile-content-division mx-0 my-0 transition duration-700 ease-in-out">

                        <div class="cprofile-left-container mx-3 w-1/4">
                            <!--                        course title-->
                            <div class="textField-label-content w-full" id="courseTitleDivId">
                                <label for="courseTitleID"></label>
                                <input class="textField" type="text" placeholder=" " id="courseTitleID"
                                       name="courseTitle"
                                       value="<?php echo $courseProfile->getCourse()->getCourseTitle() ?>">
                                <label class="textField-label">Course Title</label>
                            </div>

                            <!-- course Code-->
                            <div class="textField-label-content w-full" id="courseCodeDivId">
                                <label for="courseCodeID"></label>
                                <input class="textField" type="text" placeholder=" " id="courseCodeID"
                                       name="courseCode" value="<?php echo $courseProfile->getCourseCode() ?>">
                                <label class="textField-label">Course Code</label>
                            </div>

                            <!--                        credit Hour-->
                            <div class="textField-label-content w-full" id="creditHourDivId">
                                <label for="creditHourID"></label>
                                <select class="select" name="creditHour"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);"
                                        value="<?php echo $courseProfile->getCourse()->getCourseCreditHour() ?>"
                                        id="creditHourID">
                                    <option value="" hidden></option>
                                    <?php
                                    $chours = array('1', '2', '3');
                                    foreach ($chours as $value) {
                                        if ($value === $courseProfile->getCourse()->getCourseCreditHour())
                                            print sprintf('<option value="%s" selected> %s</option> ', htmlspecialchars($value), htmlspecialchars($value));
                                        else
                                            print sprintf('<option value="%s" > %s</option> ', htmlspecialchars($value), htmlspecialchars($value));
                                    }
                                    ?>
                                </select>
                                <label class="select-label top-1/4 sm:top-3">Credit Hour</label>
                            </div>

                            <!--                        Pre requisite-->
                            <div class="textField-label-content w-full" id="preRequisiteDivId">
                                <label for="preRequisiteID"></label>
                                <select class="select" name="preRequisite"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);"
                                        value="<?php echo $courseProfile->getCoursePreReq(); ?>"
                                        id="preRequisiteID">
                                    <option value="" hidden></option>
                                    <?php
                                    foreach ($courseProfile->getCourse()->getPreReqList() as $index => $value) {
                                        if (in_array($value, $prerequisiteList) || $prerequisiteList[$index] == $value)
                                            print sprintf('<option value="%s" selected> %s</option> ', htmlspecialchars($value), htmlspecialchars($value));
                                        else
                                            print sprintf('<option value="%s" > %s</option> ', htmlspecialchars($value), htmlspecialchars($value));
                                    }
                                    ?>

                                </select>
                                <label class="select-label top-1/4 sm:top-3">Pre-Requisites</label>
                            </div>

                            <!-- Term (select semester )-->
                            <div class="select-label-content w-full" id="TermDivId">
                                <label for="semesterTermID"></label>
                                <select class="select" name="semesterTerm"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);"
                                        value="<?php echo $courseProfile->getCourseSemester() ?>"
                                        id="semesterTermID">
                                    <option value="" hidden></option>
                                    <?php
                                    $semesters = array('1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th');
                                    foreach ($semesters as $value) {
                                        $value = (int)filter_var($value, FILTER_SANITIZE_NUMBER_INT);
                                        if ($value == $courseProfile->getCourseSemester())
                                            print sprintf('<option value="%s" selected> %s</option> ', htmlspecialchars($value), htmlspecialchars($value));
                                        else
                                            print sprintf('<option value="%s" > %s</option> ', htmlspecialchars($value), htmlspecialchars($value));
                                    }
                                    ?>
                                </select>
                                <label class="select-label top-1/4 sm:top-3">Term</label>
                            </div>

                            <!-- Program level-->
                            <div class="textField-label-content w-full" id="programLevelDivId">
                                <label for="ProgramLevelID"></label>
                                <input class="textField" type="text" id="ProgramLevelID" name="ProgramLevel"
                                       value="Undergraduate" readonly>
                                <label class="textField-label">Program level</label>
                            </div>

                            <!-- program-->
                            <div class="textField-label-content w-full" id="programDivId">
                                <label for="programID"></label>
                                <select class="select" name="program"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);"
                                        value="<?php echo $courseProfile->getCourseProgram() ?>"
                                        id="programID">
                                    <option value="" hidden></option>
                                    <?php

                                    foreach ((new Program())->retrieveProgramList($personalDetails['departmentCode']) as $value) {
                                        if ($value === $courseProfile->getCourseProgram())
                                            print sprintf('<option value="%s" selected> %s</option> ', htmlspecialchars($value), htmlspecialchars($value));
                                        else
                                            print sprintf('<option value="%s" > %s</option> ', htmlspecialchars($value), htmlspecialchars($value));
                                    }
                                    ?>
                                    <option value="BCSE" SELECTED>BCSE</option>
                                </select>

                                <label class="select-label top-1/4 sm:top-3">Program</label>
                            </div>

                            <!-- course effective-->
                            <div class="textField-label-content w-full" id="courseEffectiveDivId">
                                <label for="courseEffectiveID"></label>
                                <select class="select" name="courseEffective"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);"
                                        value="<?php echo $courseProfile->getCourseCourseEffective() ?>"
                                        id="courseEffectiveID">
                                    <option value="" hidden></option>

                                    <?php
                                    $programs = array("Fall-16 Batch Onwards", 'Fall-18 Batch Onwards', 'Fall-22 Batch Onwards');
                                    foreach ($programs as $value) {
                                        if ($value == $courseProfile->getCourseCourseEffective())
                                            print sprintf('<option value="%s" selected> %s</option> ', htmlspecialchars($value), htmlspecialchars($value));
                                        else
                                            print sprintf('<option value="%s" > %s</option> ', htmlspecialchars($value), htmlspecialchars($value));
                                    }
                                    ?>

                                </select>
                                <label class="select-label top-1/4 sm:top-3">Course Effective</label>
                            </div>

                            <!-- course coordination -->
                            <div class="textField-label-content w-full" id="coordinatingUnitDivID">
                                <label for="coordinatingUnitID"></label>
                                <input class="textField" type="text" placeholder=" " id="coordinatingUnitID"
                                       name="coordinatingUnit"
                                       value="<?php echo $courseProfile->getCourseCoordination() ?>">
                                <label class="textField-label sm:top-2">Co-ordinating Unit</label>
                            </div>
                            <!--<div class="textField-label-content w-full" id="coordinatingUnitDivID">
                                <label for="coordinatingUnitID"></label>
                                <select class="select" name="courseEffective"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);"
                                        value="<?php /*echo $courseProfile->getCourseCoordination() */ ?>"
                                        id="coordinatingUnitID">
                                    <option value="" hidden></option>
                                    <option value="1st unit majid">Sajid Ali</option>
                                    <option value="2nd unit majid">Dr.Fatima</option>
                                </select>
                                <label class="select-label top-1/4 sm:top-3">Co-ordinating Unit</label>
                            </div>-->
                        </div>
                        <div class="cprofile-right-container flex-1 ml-40 sm:ml-10 pb-5 mr-5">

                            <div class="course-assessment-border border-t-2 shadow-sm px-1 pb-1"
                                 style="background-color: #0284FC">
                                <h2 class="table-head">Assessment Instrument with Weights</h2>
                                <div class="grid bg-white  border-solid border-t-2 py-3 -mb-0.5 -mx-0.5">
                                    <div class="assessment-wrap px-12">
                                        <h3>Quizzes</h3>
                                        <div class="vertical-line"></div>

                                        <div class="textField-label-content  w-2/5" id="quizWeightDivId">
                                            <label for="quizWeight"></label>
                                            <input type="text" placeholder=" " name="quizWeight"
                                                   id="quizWeightID"
                                                   class="textField px-12"
                                                   oninput="isNumeric(this)"
                                                   maxlength="2"
                                                   value="<?php echo $courseProfile->getAssessmentInfo()->getQuizWeightage() ?>"
                                                   style="padding-left:2.3em ">
                                            <label class="textField-label ml-3">Weights</label>


                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                                <span class="text-gray-500 sm:text-sm">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="assessment-wrap px-12">
                                        <h3>Assignments</h3>
                                        <div class="vertical-line"></div>

                                        <div class="textField-label-content  w-2/5" id="assignmentWeightDivId">
                                            <label for="assignmentWeightID"></label>
                                            <input type="text" placeholder=" " name="assignmentWeight"
                                                   id="assignmentWeightID" class="textField px-12"
                                                   oninput="isNumeric(this)"
                                                   maxlength="2"
                                                   value="<?php echo $courseProfile->getAssessmentInfo()->getAssignmentWeightage() ?>"
                                                   style="padding-left:2.3em ">

                                            <label class="textField-label ml-3">Weights</label>
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                                <span class="text-gray-500 sm:text-sm">%</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="assessment-wrap px-12">
                                        <h3>Projects</h3>
                                        <div class="vertical-line"></div>


                                        <div class="textField-label-content  w-2/5" id="projectWeightDivId">
                                            <label for="projectWeightID"></label>
                                            <input type="text" placeholder=" " name="projectWeight"
                                                   id="projectWeightID" class="textField px-12"
                                                   oninput="isNumeric(this)"
                                                   maxlength="2"
                                                   value="<?php echo $courseProfile->getAssessmentInfo()->getProjectWeightage() ?>"
                                                   style="padding-left:2.3em ">

                                            <label class="textField-label ml-3">Weights</label>
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                                <span class="text-gray-500 sm:text-sm">%</span>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="assessment-wrap px-12">
                                        <h3>Mid Term</h3>

                                        <div class="vertical-line"></div>


                                        <div class="textField-label-content  w-2/5" id="midTermWeightDivId">
                                            <label for="midWeightID"></label>
                                            <input type="text" placeholder=" "
                                                   oninput="isNumeric(this)"
                                                   maxlength="2"
                                                   name="midWeight" id="midWeightID"
                                                   value="<?php echo $courseProfile->getAssessmentInfo()->getMidWeightage() ?>"
                                                   class="textField px-12" style="padding-left:2.3em ">
                                            <label class="textField-label ml-3">Weights</label>

                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                                <span class="text-gray-500 sm:text-sm">%</span>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="assessment-wrap px-12">
                                        <h3>Final Term</h3>

                                        <div class="vertical-line"></div>


                                        <div class="textField-label-content  w-2/5" id="finalTermWeightDivId">
                                            <label for="finalTermtWeight"></label>
                                            <input type="text" placeholder=" "
                                                   oninput="isNumeric(this)"
                                                   maxlength="2"
                                                   value="<?php echo $courseProfile->getAssessmentInfo()->getFinalWeightage() ?>"
                                                   name="finalWeight" id="finalWeightID"
                                                   class="textField px-12" style="padding-left:2.3em ">
                                            <label class="textField-label ml-3">Weights</label>

                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                                <span class="text-gray-500 sm:text-sm">%</span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="assessment-wrap px-12 py-2">
                                        <h3>Allow Assessment</h3>
                                        <div class="vertical-line"></div>
                                        <label class="switch">
                                            <input class="cursor-not-allowed" type="checkbox"
                                                   id="allowWeightAssessmentToggleId"
                                                   name="allowWeightAssessmentToggle"
                                                   disabled
                                                <?php
                                                $toCheck = '';
                                                if ($courseProfile->getHasWeightedAssessment() !== 0) {
                                                    $toCheck = 'checked';
                                                }
                                                print $toCheck;
                                                ?> >
                                            <span class="slider round"></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <!-- unit , method and model of course -->
                            <div class="row-flex flex-1 my-4">

                                <div class="textField-label-content w-full" id="teachingMethodologyDivID">
                                    <label for="teachingMethodologyID"></label>
                                    <input class="textField" type="text" placeholder=" " id="teachingMethodologyID"
                                           name="teachingMethodology"
                                           value="<?php echo($courseProfile->getCourseTeachingMythology()); ?>">
                                    <label class="textField-label">teaching Methodology</label>
                                </div>
                                <div class="textField-label-content w-full" id="courseInteractionModelDivId">
                                    <label for="courseInteractionModelID"></label>
                                    <input class="textField" type="text" placeholder="Interaction model"
                                           id="courseInteractionModelID"
                                           oninput="isNumeric(this)"
                                           value="<?php echo((string)$courseProfile->getCourseModel()); ?>"
                                           maxlength="2"
                                           name="courseInteractionModel">
                                    <label class="textField-label">Course Model</label>
                                </div>

                            </div>
                            <!-- 1st coutinue button -->
                            <div class="text-right mx-4">
                                <button type="button" class="loginButton" name="profileContinue1st"
                                        id="coursepContinuebtn-1">Continue
                                </button>
                            </div>
                        </div>
                    </section>

                    <section class="hidden bg-white rounded-t-md border-solid border-t-2 px-5 pt-4 pb-4
                    flex max-w-full mx-2 flex-col flex  mx-0 my-0 transition duration-700 ease-in-out" id="cpDetaillID">

                        <div class="cprofile-left-container flex flex-row mx-3 items-center justify-center">
                            <!---------------------Reference Books--------------------------->
                            <div class="textField-label-content w-full" id="ReferenceBooksDivId">
                                <label for="referenceBooksID"></label>
                                <input class="textField" id="referenceBooksID" name="ReferenceBooks" placeholder=" "
                                       type="text" value="Programming Fundamental 2">
                                <label class="textField-label">ReferenceBooks</label>
                            </div>
                            <!-------------------------------RecommendedTextbooks----------------------->
                            <div class="textField-label-content w-full" id="recommendedTextbooksDivId">
                                <label for="recommendedTextbooksID"></label>
                                <input class="textField" id="recommendedTextbooksID" name="RecommendedTextbooks"
                                       placeholder=" "
                                       type="text" value="<?php echo $courseProfile->getCourseReferenceBook() ?>">

                                <label class="textField-label">RecommendedTextbooks</label>
                            </div>
                            <!--                        course Description-->
                            <div class="textField-label-content w-full" id="courseDescriptionDivId">
                                <label for="courseDescriptionID"></label>
                                <textarea class="textarea-h textField" id="courseDescriptionID" name="assignmentDetail"
                                          placeholder=" " style="height: 36px" type="text"
                                          value="ABC"><?php echo $courseProfile->getCourseDescription() ?></textarea>
                                <label class="textField-label">Course Description</label>
                            </div>
                            <!--                        OtherreferenceMaterial-->
                            <div class="textField-label-content w-full" id="otherRefDivId">
                                <label for="otherReferenceId"></label>
                                <textarea class="textarea-h textField" id="otherReferenceId" name="otherReference"
                                          placeholder=" "
                                          style="height: 36px" type="text"
                                          value="<?php echo $courseProfile->getCourseOtherReference() ?>"><?php echo $courseProfile->getCourseOtherReference() ?></textarea>
                                <label class="textField-label">Other reference Material</label>
                            </div>
                        </div>

                        <div class="cprofile-right-container flex-1 pb-5 mx-5">

                            <div class="course-assessment-border border-t-2 shadow-sm mb-5"
                                 style="background-color: #0284fc">
                                <h2 class="text-center my-3 font-bold text-white">Course Instructor Details</h2>
                                <div class="grid bg-white border-solid">
                                    <div class="learning-outcome-head learning-week-header-dp overflow-hidden">
                                        <div class="lweek-column text-black col-start-1 col-end-3">
                                            <span class="wlearn-cell-data">Name</span>
                                        </div>
                                        <div class="lweek-column col-start-3 col-end-5">
                                            <span class="wlearn-cell-data">Designation</span>
                                        </div>
                                        <div class="lweek-column col-start-5 col-end-7">
                                            <span class="wlearn-cell-data">Qualification</span>
                                        </div>
                                        <div class="lweek-column col-start-7 col-end-9">
                                            <span class="wlearn-cell-data">Specialization</span>
                                        </div>
                                        <div class="lweek-column col-start-9 col-end-11">
                                            <span class="wlearn-cell-data">Contacts</span>
                                        </div>
                                        <div class="lweek-column col-start-11 col-end-13">
                                            <span class="wlearn-cell-data">Personal Email</span>
                                        </div>
                                    </div>


                                    <?php
                                    // $affiliatedFacultyList

                                    if (!empty($courseProfileInstructorList))
                                        foreach ($courseProfileInstructorList as $index => $value) {
                                            $counter = $index + 1;
                                            readInstructorDetail($counter, $value->getInstructorInfo());
                                        }
                                    else
                                        readInstructorDetail(1, $courseProfile->getInstructorInfo());
                                    ?>
                                </div>

                            </div>
                            <div class="text-right mx-4">
                                <button class="loginButton" id="coursepContinuebtn-2" name="profileContinue1st"
                                        type="button">Continue
                                </button>
                            </div>

                        </div>
                    </section>

                    <section id="cpDistributionID" class="hidden cprofile-content-box-border mx-0 my-0  ">

                        <!--                                Course Learning Outcome-->
                        <div class="mx-3 mr-5 clo-container">
                            <div class="clo-table-border " style="background-color: #0284FC">
                                <h2 class="table-head">Course Learning Outcome</h2>
                                <div id="courseLearningDivID" class="flex flex-wrap p-0">
                                    <div id="courseLearningHeaderID"
                                         class="learning-outcome-head text-md row-flex w-full mx-0">
                                        <div class="cprofile-column h-10 w-24">
                                            <span class="cprofile-cell-data">CLO's</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-3/4">
                                            <span class="cprofile-cell-data">Description of clo's</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">Domain</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">BT-level</span>
                                        </div>
                                    </div>
                                    <!--  creating your first CLO -row des, btlvel etc. -->

                                </div>
                            </div>
                            <div class="flex justify-center">
                                <button type="button" aria-label="add_clos_button_label" class="max-w-2xl rounded-full"
                                        id="add-clo-btn" aria-expanded="false" aria-haspopup="true">
                                    <img class="h-8 w-8 rounded-full"
                                         src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" alt="">
                                </button>
                            </div>
                        </div>
                        <div class="mx-3 mr-5 cloMapping-container mt-5">
                            <div class="clo-table-border" style="background-color: #0284FC">

                                <h2 class="table-head">CLO's & PLO's Mapping</h2>
                                <div id="courseMappingDivID" class="flex flex-wrap p-0">

                                    <div id="cloMapHeaderID"
                                         class="flex w-full items-start text-black uppercase text-center text-md font-medium bg-gray-200 h-10 ">
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">PLOs</span>
                                        </div>
                                    </div>
                                    <!--  placing your first CLO Map here-->

                                </div>
                            </div>
                        </div>

                        <div class="text-right mt-5 mx-8 mr-5">
                            <button type="submit" class="loginButton" name="profileContinue3rd"
                                    id="coursepContinuebtn-3">Finish
                            </button>
                            <button type="submit" class="hidden loginButton" name="profileUpdationBtn"
                                    id="courseProfileUpdationBtn">Update
                            </button>

                        </div>
                    </section>

                </form>
            </div>

            <!-- progress status-->
            <div class="my-5">
                <div class="flex-center pb-3">

                    <div id="progressCircle-1" class="flex-grow-0">
                        <div class="progress-circle progress-circle-filled bg-white rounded-full shadow -mr-3 animate-spin">
                            <span class="circular-span "><i class="fa fa-check"></i></span>
                            <!--                             <div class="h-3 w-3 bg-indigo-700 rounded-full animate-ping"></div>-->
                        </div>
                    </div>
                    <div class="w-1/6 items-center flex">
                        <div class="bg-gray-200 flex-1">
                            <div class="progress-circle-unfilled py-1 w-0"></div>
                        </div>
                    </div>

                    <div id="progressCircle-2" class="flex-grow-0 ">

                        <div class="progress-circle progress-circle-unfilled">
                            <span class="circular-span">2</span>
                        </div>
                    </div>
                    <div class="w-1/6 items-center flex">
                        <div class="bg-gray-200  flex-1">
                            <div class="progress-circle-unfilled py-1 w-0"></div>
                        </div>
                    </div>

                    <div id="progressCircle-3" class="flex-grow-0 ">
                        <div class="progress-circle progress-circle-unfilled">
                            <span class="circular-span">3</span>
                        </div>
                    </div>

                </div>
                <div class="flex-center text-center">
                    <p class="w-1/5">Course Essential</p>

                    <div class="w-1/5">Course Detail</div>
                    <div class="w-1/5">CLO Distribution</div>
                </div>
            </div>

        </div>
    </main>
    <?php
    if ($isCoordinator == 0 and empty($programOutcomeList))
        print showErrorMessage($isFailedToPerformCourseProfile[0]['alert-1'] . "<br>" . $isFailedToPerformCourseProfile[0]['alert-2']);
    elseif ($isCoordinator != 0 and empty($programOutcomeList))
        print showErrorMessage($isFailedToPerformCourseProfile[0]['alert-1']);
    elseif ($isCoordinator == 0 and !empty($programOutcomeList))
        print showErrorMessage($isFailedToPerformCourseProfile[0]['alert-2']);
    ?>
</div>

<div id="loader" class="hidden m-auto fixed top-1/4 left-1/2 z-5">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class=" transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- inline-block align-bottom bg-white rounded-lg text-center overflow-hidden-->
            <div class=" px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <svg class="animate-spin fill-current text-catalystBlue-d2 opacity-100"
                     xmlns="http://www.w3.org/2000/svg"
                     width="55" height="55" viewBox="0 0 24 24">
                    <path d="M13.75 22c0 .966-.783 1.75-1.75 1.75s-1.75-.784-1.75-1.75.783-1.75 1.75-1.75 1.75.784 1.75 1.75zm-1.75-22c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 10.75c.689 0 1.249.561 1.249 1.25 0 .69-.56 1.25-1.249 1.25-.69 0-1.249-.559-1.249-1.25 0-.689.559-1.25 1.249-1.25zm-22 1.25c0 1.105.896 2 2 2s2-.895 2-2c0-1.104-.896-2-2-2s-2 .896-2 2zm19-8c.551 0 1 .449 1 1 0 .553-.449 1.002-1 1-.551 0-1-.447-1-.998 0-.553.449-1.002 1-1.002zm0 13.5c.828 0 1.5.672 1.5 1.5s-.672 1.501-1.502 1.5c-.826 0-1.498-.671-1.498-1.499 0-.829.672-1.501 1.5-1.501zm-14-14.5c1.104 0 2 .896 2 2s-.896 2-2.001 2c-1.103 0-1.999-.895-1.999-2s.896-2 2-2zm0 14c1.104 0 2 .896 2 2s-.896 2-2.001 2c-1.103 0-1.999-.895-1.999-2s.896-2 2-2z"/>
                </svg>
                <span class=" text-lg font-medium antialiased tracking-tighter">Loading</span>
            </div>
        </div>

    </div>
</div>

<div id="alertContainer"
     class="hidden shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 w-80 m-auto fixed top-1/3 left-1/3 z-5">
    <div class="w-full h-full text-center">
        <div class="flex h-full flex-col justify-between">
            <img src="../../../Assets/Images/vectorFiles/Others/Dot-section.svg" alt="cross"
                 class="h-12 w-12 mt-4 m-auto" id="cmimageID">
            <p class="text-gray-600 dark:text-gray-100 text-md py-2 px-6">
                Do you wish to delete the selected <span
                        class="text-gray-800 dark:text-white font-bold">CLO</span> and map their respective <span
                        class="text-gray-800 dark:text-white font-bold">PLOs</span>?<br>
                <span class="text-gray-800 dark:text-white font-bold">Note : </span> It will be deleted from database.
            </p>
            <div id="aboxcontainer" class="flex items-center justify-between gap-4 w-full mt-8">
                <button id="alertBtnNo" type="button" class="loginButton py-2 px-4 hover:bg-indigo-700
                        text-white w-full transition ease-in duration-200 text-center text-base
                         font-semibold shadow-md rounded-lg">No
                </button>

                <button id="alertBtndeleteCLO" type="button" class="loginButton py-2 px-4 hover:bg-indigo-700
                        text-white w-full transition ease-in duration-200 text-center text-base
                         font-semibold shadow-md rounded-lg">Yes
                </button>

            </div>
        </div>
    </div>
</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"
        type="text/javascript"></script>

<script>
    let hasPLOs, ploArray;
    let initialCLODescription;
    let initialCLOMapping;
    let viewType, hasSessionalFlag, affiliatedList;

    viewType = <?php echo json_encode($_SESSION['typeOfProfile'], JSON_HEX_TAG)  ?>;
    ploArray = Object.values(<?php echo json_encode($programOutcomeList, JSON_HEX_TAG)  ?>);
    hasSessionalFlag = <?php echo json_encode($containsSessional, JSON_HEX_TAG)  ?>;
    affiliatedFacultyList = <?php echo json_encode($affiliatedFacultyList, JSON_HEX_TAG)  ?>;
    console.log("affiliatedFacultyList :", affiliatedFacultyList);
    if (viewType !== 1) {
        iframeContainUpdate("Course Profile Update", "Catalyst | Course Profile Update");
        initialCLODescription = <?php echo json_encode($viewCLODescription, JSON_HEX_TAG) ?>;
        initialCLOMapping = <?php echo json_encode($viewCLOMapping, JSON_HEX_TAG)  ?>;
        coursTitle = <?php echo json_encode($courseProfile->getCourse()->getCourseTitle()) ?>;
        updationTextSet(coursTitle);
    }

    function updationTextSet(courseTitle) {
        $('#coursepContinuebtn-3').addClass("hidden");
        $('#courseProfileUpdationBtn').removeClass("hidden");
        $('#subjectTopic').text("Course Profile " + courseTitle);
        $('.min-w-full.cprofile-container-centertxt').text(courseTitle + " update");
    }
</script>
<?php
if ($isCoordinator != 0 and !empty($programOutcomeList)) {
    print ('<script src="CourseProfileAssets/js/CourseProfileCreation.js" rel="script"></script>');
} else
    print ('<script rel="script">
            let removal = document.querySelector("main");
            removal.remove();
            </script>');

function showErrorMessage($message): string
{
    return sprintf('<div class="main-content-alignment p-0 bg-white outline-none ring-2 ring-catalystLight-e1 text-black rounded-md mt-2 my-5 h-1/2 weeklytopics-primary-border-n">

                <div class="db-table-header-topic items-center border-b-0 rounded-b-none pb-5" style="background-color: rgba(220,71,71,0.92)">
                    <div class="flex flex-row justify-center items-center">
                        <h2 class="flex items-center justify-center text-lg text-center font-semibold  text-white tracking-wide text-center capitalize">It seems like something has happen</h2>
                    </div>
                </div>
                <div class="h-60 text-center text-red-400 font-medium text-2xl flex justify-center items-center">%s
                            </div>

            </div>', $message);
}

function readInstructorDetail($counter, $getInstructorInfo)
{
    print sprintf('<div class="grid grid-cols-12 grid-rows-1 gap-0  w-auto learning-outcome-row h-auto overflow-hidden">
                                        <div class="lweek-column border-l-0 text-black col-start-1 col-end-3">
                                            <label for="nameDetailID-%d">
                                                <textarea
                                                        class="cell-input py-4 px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                                                        id="nameDetailID-%d" placeholder="Name here"
                                                        type="text" value="">%s</textarea>
                                            </label>
                                        </div>
                                        <div class="lweek-column border-l-0 col-start-3 col-end-5">
                                            <label for="DesignationDetailID-%d">
                                                <textarea
                                                        class="cell-input py-4 px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                                                        id="DesignationDetailID-%d" placeholder="Designation here" type="text" value="">%s</textarea>
                                            </label>
                                        </div>
                                        <div class="lweek-column border-l-0 col-start-5 col-end-7">
                                            <label for="qualificationID-%d">
                                                <textarea
                                                        class="cell-input py-4 px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                                                        id="qualificationID-%d"
                                                        placeholder="Qualification here"
                                                        type="text" value="">%s</textarea>
                                            </label>
                                        </div>
                                        <div class="lweek-column border-l-0 col-start-7 col-end-9">
                                            <label for="specializationID-%d">
                                                <textarea
                                                        class="cell-input py-4 px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                                                        id="specializationID-%d"
                                                        placeholder="Specialization here"
                                                        type="text" value="">%s</textarea>
                                            </label>
                                        </div>
                                        <div class="lweek-column border-l-0 col-start-9 col-end-11">
                                            <label for="contactsID-%d">
                                                <textarea
                                                        class="cell-input py-4 px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                                                        id="contactsID-%d" name="ContactsDetail"
                                                         placeholder="Contacts here"
                                                        type="text" value="">%s</textarea>
                                            </label>
                                        </div>
                                        <div class="lweek-column border-l-0 col-start-11 col-end-13">
                                            <label for="personalEmailID-%d">
                                                <textarea
                                                        class="cell-input py-4 px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                                                        id="personalEmailID-%d"
                                                        placeholder="Personal Email here"
                                                        type="text" value="">%s</textarea>
                                            </label>
                                        </div>
                                    </div>',
        $counter, $counter, $getInstructorInfo->getInstructorName(), $counter, $counter, $getInstructorInfo->getInstructorDesignation(), $counter, $counter, $getInstructorInfo->getInstructorQualification(),
        $counter, $counter, $getInstructorInfo->getInstructorSpecialization(), $counter, $counter, $getInstructorInfo->getInstructorContactNumber(), $counter, $counter, $getInstructorInfo->getInstructorPersonalEmail());
}

?>
</html>
<!-- line 538     old design for course detail section  -->
<!--<section id="cpDetaillID" class="hidden cprofile-content-box-border cprofile-content-division mx-0 my-0 transition duration-700 ease-in-out">
                        <div class="cprofile-left-container mx-3 w-1/4">

                            <div class="textField-label-content w-full" id="ReferenceBooksDivId">
                                <label for="referenceBooksID"></label>
                                <input class="textField" type="text" placeholder=" " id="referenceBooksID"
                                       value="<?php /*echo $courseProfile->getCourseReferenceBook() */ ?>"
                                       name="ReferenceBooks">
                                <label class="textField-label">ReferenceBooks</label>
                            </div>

                            <div class="textField-label-content w-full" id="recommendedTextbooksDivId">
                                <label for="recommendedTextbooksID"></label>
                                <input class="textField" type="text" placeholder=" " id="recommendedTextbooksID"
                                       value="<?php /*echo $courseProfile->getCourseTextBook() */ ?>"
                                       name="RecommendedTextbooks">

                                <label class="textField-label">RecommendedTextbooks</label>
                            </div>

                            <div class="textField-label-content w-full" id="courseDescriptionDivId">
                                <label for="courseDescriptionID"></label>
                                <textarea class="textarea-h textField" type="text" placeholder=" "
                                          id="courseDescriptionID" name="assignmentDetail"
                                          value="<?php /*echo $courseProfile->getCourseDescription() */ ?>"
                                          style="height: 9em"><?php /*echo $courseProfile->getCourseDescription() */ ?></textarea>
                                <label class="textField-label">Course Description</label>
                            </div>

                            <div class="textField-label-content w-full" id="otherRefDivId">
                                <label for="otherReferenceId"></label>
                                <textarea class="textarea-h textField" type="text" placeholder=" "
                                          id="otherReferenceId" name="otherReference"
                                          value="<?php /*echo $courseProfile->getCourseOtherReference() */ ?>"
                                          style="height: 9em"><?php /*echo $courseProfile->getCourseOtherReference() */ ?></textarea>
                                <label class="textField-label">Other reference Material</label>
                            </div>
                        </div>
                        <div class="cprofile-right-container flex-1 ml-40 pb-5 mr-5">


                            <div class="course-assessment-border border-t-2 shadow-sm mb-5"
                                 style="background-color: #0284fc">
                                <h2 class="text-center my-3 font-bold text-white">Course Instructor Details</h2>
                                <div class="grid bg-white  border-solid border-t-2 py-3 -mx-0.5">

                                    <div class="assessment-wrap mx-35">
                                        <h3>Name</h3>
                                        <div class="vertical-line"></div>
                                        <div class="textField-label-content w-full" id="nameWeightDivId">
                                            <label for="nameDetailID"></label>
                                            <textarea class="textarea-h textField" type="text" placeholder=" "
                                                      value="<?php /*echo $courseProfile->getInstructorInfo()->getInstructorName() */ ?>"
                                                      id="nameDetailID"
                                                      name="nameDetail"
                                                      style="height: 6em"><?php /*echo $courseProfile->getInstructorInfo()->getInstructorName() */ ?></textarea>
                                            <label class="textField-label my-2 sm:my-4">Detail</label>
                                        </div>
                                    </div>

                                    <div class="assessment-wrap mx-35 ">
                                        <h3>Designation</h3>
                                        <div class="vertical-line"></div>
                                        <div class="textField-label-content w-full" id="designationWeightDivId">
                                            <label for="DesignationDetailID"></label>
                                            <textarea class="textarea-h textField" type="text" placeholder=" "
                                                      id="DesignationDetailID"
                                                      name="DesignationDetail"
                                                      style="height: 6em"><?php /*echo $courseProfile->getInstructorInfo()->getInstructorDesignation() */ ?></textarea>
                                            <label class="textField-label">Detail</label>
                                        </div>
                                    </div>

                                    <div class="assessment-wrap mx-35">
                                        <h3>Qualification</h3>
                                        <div class="vertical-line"></div>
                                        <div class="textField-label-content w-full" id=" qualificationWeightDivId">
                                            <label for=" qualificationID"></label>
                                            <textarea class="textarea-h textField" type="text" placeholder=" "
                                                      value="<?php /*echo $courseProfile->getInstructorInfo()->getInstructorQualification() */ ?>"
                                                      id="qualificationID"
                                                      name=" QualificationDetail"
                                                      style="height: 6em"><?php /*echo $courseProfile->getInstructorInfo()->getInstructorQualification() */ ?></textarea>
                                            <label class="textField-label">Detail</label>
                                        </div>
                                    </div>
                                    <div class="assessment-wrap mx-35">
                                        <h3>Specialization</h3>
                                        <div class="vertical-line"></div>
                                        <div class="textField-label-content w-full" id=" SpecializationWeightDivId">
                                            <label for="specializationID"></label>
                                            <textarea class="textarea-h textField" type="text" placeholder=" "
                                                      value="<?php /*echo $courseProfile->getInstructorInfo()->getInstructorSpecialization() */ ?>"
                                                      id="specializationID"
                                                      name="SpecializationDetail"
                                                      style="height: 6em"><?php /*echo $courseProfile->getInstructorInfo()->getInstructorSpecialization() */ ?></textarea>
                                            <label class="textField-label">Detail</label>
                                        </div>
                                    </div>
                                    <div class="assessment-wrap mx-35">
                                        <h3>Contacts</h3>
                                        <div class="vertical-line"></div>
                                        <div class="textField-label-content w-full" id=" contactsWeightDivId">
                                            <label for="contactsID"></label>
                                            <textarea class="textarea-h textField" type="text" placeholder=" "
                                                      id="contactsID"
                                                      value="<?php /*echo $courseProfile->getInstructorInfo()->getInstructorContactNumber() */ ?>"
                                                      name="ContactsDetail"
                                                      style="height: 6em"><?php /*echo $courseProfile->getInstructorInfo()->getInstructorContactNumber() */ ?></textarea>
                                            <label class="textField-label">Detail</label>
                                        </div>
                                    </div>
                                    <div class="assessment-wrap mx-35">
                                        <h3>Personal Email</h3>
                                        <div class="vertical-line"></div>
                                        <div class=" textField-label-content w-full" id=" personalEmailWeightDivId">
                                            <label for="personalEmailID"></label>
                                            <textarea class="textarea-h textField" type="text" placeholder=" "
                                                      id="personalEmailID"
                                                      value="<?php /*echo $courseProfile->getInstructorInfo()->getInstructorPersonalEmail() */ ?>"
                                                      name="PersonalEmailDetail"
                                                      style="height: 6em"><?php /*echo $courseProfile->getInstructorInfo()->getInstructorPersonalEmail() */ ?></textarea>
                                            <label class="textField-label">Detail</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="text-right mx-4">
                                <button type="button" class="loginButton" name="profileContinue1st"
                                        id="coursepContinuebtn-2">Continue
                                </button>
                            </div>

                        </div>
                    </section>-->