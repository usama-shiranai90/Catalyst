<?php

include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\CourseProfile\CourseProfile.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DIM\Curriculum.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//echo realpath(dirname(__FILE__));

if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
    $courseProfile = new CourseProfile();
    $curriculum = new Curriculum();
}
$viewCLODescription = '';
$viewCLOMapping = '';


$curriculum->fetchCurriculumID($_SESSION['selectedSection']);   // provide with ongoing section code.
$ploArray = $curriculum->retrievePLOsList(); // get from server // returns array of PLO.

if (isset($_POST['saved'])) {

    if ($_POST['saved']) {

        if (isset($_POST['arrayCLO']) && isset($_POST['arrayMapping']) && isset($_POST['courseEssentialFieldValue']) && isset($_POST['courseDetailFieldValue'])) {

            $array_courseEssential = $_POST['courseEssentialFieldValue'];
            $array_courseDetail = $_POST['courseDetailFieldValue'];
            $array_cCLO = $_POST['arrayCLO'];
            $array_cMapping = $_POST['arrayMapping'];

            $courseProfile->setCourseInfo($array_courseEssential[0], $array_courseEssential[1], $array_courseEssential[2], $array_courseEssential[3], $array_courseEssential[4],
                $array_courseEssential[5], $array_courseEssential[6], $array_courseEssential[7], $array_courseEssential[8], $array_courseEssential[9], $array_courseEssential[10],
                $array_courseDetail[0], $array_courseDetail[1], $array_courseDetail[2], $array_courseDetail[3], $_SESSION['selectedProgram'], $_SESSION['batchCode']);

            $courseProfile->setAssessmentInfo($array_courseEssential[11], $array_courseEssential[12], $array_courseEssential[13], $array_courseEssential[14], $array_courseEssential[15]);
            $courseProfile->setInstructorInfo($array_courseDetail[4], $array_courseDetail[5], $array_courseDetail[6], $array_courseDetail[7], $array_courseDetail[8], $array_courseDetail[9]);
            $courseProfile->saveCourseProfileData($array_cCLO, $array_cMapping, $ploArray);
            $_SESSION['cp_id'] = $courseProfile->getCourseProfileCode();
            die((json_encode(array('message' => 'Data Send Successfully'))));

        } else {
            echo $_POST['arrayCLO'];
            echo $_POST['arrayMapping'];
            echo $_POST['courseEssentialFieldValue'];
            echo $_POST['courseDetailFieldValue'];
            die(json_encode(array('message' => 'ERROR')));
        }
    } else
        die(json_encode(array('message' => 'Saving data not working fine')));
} else {
    $hasCreated = $courseProfile->profileExist($_SESSION['selectedCourse'], $_SESSION['selectedProgram'], $_SESSION['selectedCurriculum']);

    if (count($ploArray) != 0) { // if we have plo then enter.
        $hasPlo = 1;             /*$PLOsArray = ['PLO 1' => "Data fetched via a separate HTTP request won't include any information from the HTTP request that fetched the HTML document. You may need this information (e.g., if the HTML document is generated in response to a form submission",
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

        if ($hasCreated === false) // not created
            $_SESSION['typeOfProfile'] = 1;
        else  // is created.
        {
            $_SESSION['typeOfProfile'] = 2;
            $_SESSION['cp_id'] = $courseProfile->getCourseProfileCode();
        }

        $_SESSION['batchCode'] = $courseProfile->getBatchCode();
        if ($_SESSION['typeOfProfile'] != 1) { // in Update Mode.
            if (isset($_GET['profileID'])) {
//                $hasCreated = false;
                $courseProfile->loadCourseProfileData($_SESSION['cp_id']);
                $cloObject = new CLO();
                $viewCLODescription = $cloObject->retrieveAllCLOPerCourse($curriculum->getCurriculumCode(), $_SESSION['selectedProgram'], $_SESSION['selectedCourse']);
                $viewCLOMapping = $cloObject->mappedPLOs;

            } // if in editor mode.
            else //  profile exist we move to view page. .
            {
                header("Location: courseprofile_view.php");
            }
        }

    } else
        $hasPlo = 0;
}
//echo "ajeeb ".$courseProfile->getCoursePreRequisites() . "    ". json_encode($courseProfile->getCourse()->getPreReqList());
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
    <link href="CourseProfileAssets/css/courseInject.css" rel="stylesheet">
    <link href="CourseProfileAssets/css/courseProfileStyle.css" rel="stylesheet">

    <script src="CourseProfileAssets/js/cpm_common.js" rel="script"></script>
    <link href="../../../Assets/Frameworks/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <script src="CourseProfileAssets/js/additionalWork.js"></script>
    <script type="text/javascript">
        writeRandomQuote = function () {
            var quotes = new Array();
            quotes[0] = "Action is the real measure of intelligence.";
            quotes[1] = "Baseball has the great advantage over cricket of being sooner ended.";
            quotes[2] = "Every goal, every action, every thought, every feeling one experiences, whether it be consciously or unconsciously known, is an attempt to increase one's level of peace of mind.";
            quotes[3] = "A good head and a good heart are always a formidable combination.";
            var rand = Math.floor(Math.random() * quotes.length);
            document.write(quotes[rand]);
        }
        // writeRandomQuote();
    </script>

    <script src="../asset/TeacherDashScripts.js"> pleaseWork("Course Profile Update", "Catalyst | Course Profile Update")</script>

</head>
<body>
<div class="w-full min-h-full">

    <main class="main-content-alignment">

        <div class="cprofile-grid">

            <div id="errorMessageDiv"
                 class="hidden fixed bottom-0 right-0 z-50 flex p-4 mb-4 text-md w-2/12 font-sm text-red-700 bg-red-100 rounded-lg">
                <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0
                     001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <div id="errorID">
                    <span class="font-medium">missing field alert!</span><br>try submitting again.
                </div>
            </div>

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
                    <!--<svg  class="mx-2 h-6 hover:bg-gray-700 relative" width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.3333 7.7085L4.625 15.4168L12.3333 23.1252" stroke="#3B3E43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.625 15.417H16.9583C25.473 15.417 32.375 22.319 32.375 30.8337V32.3753" stroke="#3B3E43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>-->
                    <h2 class="min-w-full cprofile-container-centertxt">Course Profile Creation</h2>
                </div>
                <form method="post">

                    <!--     course essential section            -->
                    <section id="cpEssentialID"
                             class="hidden cprofile-content-box-border cprofile-content-division mx-0 my-0 transition duration-700 ease-in-out">

                        <div class="cprofile-left-container mx-3 w-1/4">
                            <!--                        course title-->
                            <div class="textField-label-content w-full" id="courseTitleDivId">
                                <label for="courseTitleID"></label>
                                <input class="textField" type="text" placeholder=" " id="courseTitleID"
                                       name="courseTitle"
                                       value="<?php echo $courseProfile->getCourse()->getCourseTitle() ?>">
                                <label class="textField-label">Course Title</label>
                            </div>
                            <!--                            --><?php //echo $courseProfile->getCourseTitle() ?>
                            <!--                        course Code-->
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
                                            echo '<option value=' . $value . ' selected>' . $value . '</option>';
                                        else
                                            echo '<option value=' . $value . '>' . $value . '</option>';
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
                                        value="<?php echo $option = ''; ?>"
                                        id="preRequisiteID">
                                    <option value="" hidden></option>
                                    <?php

                                    foreach ($courseProfile->getCoursePreRequisites() as $value) {
                                        if ($option == $value) {
                                            echo '<option value=' . $value . 'selected>' . $value . '</option>';
                                            $option = $value;
                                        } else
                                            echo '<option value=' . $value . '>' . $value . '</option>';
                                    }
                                    ?>

                                </select>
                                <label class="select-label top-1/4 sm:top-3">Pre-Requisites</label>
                            </div>

                            <!--                       Term (select semester )-->
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
                                            echo '<option value=' . $value . ' selected>' . $value . '</option>';
                                        else
                                            echo '<option value=' . $value . '>' . $value . '</option>';
                                    }
                                    ?>
                                </select>

                                <label class="select-label top-1/4 sm:top-3">Term</label>
                            </div>

                            <!--                       Program level-->
                            <div class="textField-label-content w-full" id="programLevelDivId">
                                <label for="ProgramLevelID"></label>
                                <input class="textField" type="text" id="ProgramLevelID" name="ProgramLevel"
                                       value="Undergraduate" readonly>
                                <label class="textField-label">Program level</label>
                            </div>

                            <!--                        program-->
                            <div class="textField-label-content w-full" id="programDivId">
                                <label for="programID"></label>
                                <select class="select" name="program"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);"
                                        value="<?php echo $courseProfile->getCourseProgram() ?>"
                                        id="programID">
                                    <option value="" hidden></option>
                                    <?php
                                    $programs = array('BCSE', 'BSIT', 'BCCS');
                                    foreach ($programs as $value) {
                                        if ($value === $courseProfile->getCourseProgram())
                                            echo '<option value=' . $value . ' selected>' . $value . '</option>';
                                        else
                                            echo '<option value=' . $value . '>' . $value . '</option>';
                                    }
                                    ?>

                                </select>

                                <label class="select-label top-1/4 sm:top-3">Program</label>
                            </div>

                            <!--                        course effective-->
                            <div class="textField-label-content w-full" id="courseEffectiveDivId">
                                <label for="courseEffectiveID"></label>
                                <select class="select" name="courseEffective"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);"
                                        value="<?php echo $courseProfile->getCourseCourseEffective() ?>"
                                        id="courseEffectiveID">
                                    <option value="" hidden></option>
                                    <option value="Fall-16 Batch">Fall-16 Batch Onwards</option>
                                    <option value="Fall-18 Batch">Fall-18 Batch Onwards</option>
                                    <option value="Fall-22 Batch">Fall-22 Batch Onwards</option>
                                </select>
                                <label class="select-label top-1/4 sm:top-3">Course Effective</label>
                            </div>

                            <div class="textField-label-content w-full" id="coordinatingUnitDivID">
                                <label for="coordinatingUnitID"></label>
                                <select class="select" name="courseEffective"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);"
                                        value="<?php echo $courseProfile->getCourseCoordination() ?>"
                                        id="coordinatingUnitID">
                                    <option value="" hidden></option>
                                    <option value="1st unit majid">Sajid Ali</option>
                                    <option value="2nd unit majid">Dr.Fatima</option>
                                </select>
                                <label class="select-label top-1/4 sm:top-3">Co-ordinating Unit</label>
                            </div>


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

                    <!--        course detail section            -->
                    <section id="cpDetaillID"
                             class="hidden cprofile-content-box-border cprofile-content-division mx-0 my-0 transition duration-700 ease-in-out">

                        <div class="cprofile-left-container mx-3 w-1/4">
                            <!---------------------Reference Books--------------------------->
                            <div class="textField-label-content w-full" id="ReferenceBooksDivId">
                                <label for="referenceBooksID"></label>
                                <input class="textField" type="text" placeholder=" " id="referenceBooksID"
                                       value="<?php echo $courseProfile->getCourseReferenceBook() ?>"
                                       name="ReferenceBooks">
                                <label class="textField-label">ReferenceBooks</label>
                            </div>
                            <!-------------------------------RecommendedTextbooks----------------------->
                            <div class="textField-label-content w-full" id="recommendedTextbooksDivId">
                                <label for="recommendedTextbooksID"></label>
                                <input class="textField" type="text" placeholder=" " id="recommendedTextbooksID"
                                       value="<?php echo $courseProfile->getCourseTextBook() ?>"
                                       name="RecommendedTextbooks">

                                <label class="textField-label">RecommendedTextbooks</label>
                            </div>
                            <!--                        course Description-->
                            <div class="textField-label-content w-full" id="courseDescriptionDivId">
                                <label for="courseDescriptionID"></label>
                                <textarea class="textarea-h textField" type="text" placeholder=" "
                                          id="courseDescriptionID" name="assignmentDetail"
                                          value="<?php echo $courseProfile->getCourseDescription() ?>"
                                          style="height: 9em"><?php echo $courseProfile->getCourseDescription() ?></textarea>
                                <label class="textField-label">Course Description</label>
                            </div>
                            <!--                        OtherreferenceMaterial-->
                            <div class="textField-label-content w-full" id="otherRefDivId">
                                <label for="otherReferenceId"></label>
                                <textarea class="textarea-h textField" type="text" placeholder=" "
                                          id="otherReferenceId" name="otherReference"
                                          value="<?php echo $courseProfile->getCourseOtherReference() ?>"
                                          style="height: 9em"><?php echo $courseProfile->getCourseOtherReference() ?></textarea>
                                <label class="textField-label">Other reference Material</label>
                            </div>
                        </div>
                        <div class="cprofile-right-container flex-1 ml-40 pb-5 mr-5">
                            <!--  text-md rounded-t-lg border-gray-300 border-t-2 border-r-2 border-l-2
                                    border-b-2 border-solid mb-10 -->

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
                                                      value="<?php echo $courseProfile->getInstructorInfo()->getInstructorName() ?>"
                                                      id="nameDetailID"
                                                      name="nameDetail"><?php echo $courseProfile->getInstructorInfo()->getInstructorName() ?></textarea>
                                            <label class="textField-label my-2">Detail</label>
                                        </div>
                                    </div>
                                    <!--                                                           Designation-->
                                    <div class="assessment-wrap mx-35 ">
                                        <h3>Designation</h3>
                                        <div class="vertical-line"></div>
                                        <div class="textField-label-content w-full" id="designationWeightDivId">
                                            <label for="DesignationDetailID"></label>
                                            <textarea class="textarea-h textField" type="text" placeholder=" "
                                                      id="DesignationDetailID"
                                                      name="DesignationDetail"><?php echo $courseProfile->getInstructorInfo()->getInstructorDesignation() ?></textarea>
                                            <label class="textField-label">Detail</label>
                                        </div>
                                    </div>
                                    <!--                                                          Qualification-->
                                    <div class="assessment-wrap mx-35">
                                        <h3>Qualification</h3>
                                        <div class="vertical-line"></div>
                                        <div class="textField-label-content w-full" id=" qualificationWeightDivId">
                                            <label for=" qualificationID"></label>
                                            <textarea class="textarea-h textField" type="text" placeholder=" "
                                                      value="<?php echo $courseProfile->getInstructorInfo()->getInstructorQualification() ?>"
                                                      id="qualificationID"
                                                      name=" QualificationDetail"><?php echo $courseProfile->getInstructorInfo()->getInstructorQualification() ?></textarea>
                                            <label class="textField-label">Detail</label>
                                        </div>
                                    </div>
                                    <div class="assessment-wrap mx-35">
                                        <h3>Specialization</h3>
                                        <div class="vertical-line"></div>
                                        <div class="textField-label-content w-full" id=" SpecializationWeightDivId">
                                            <label for="specializationID"></label>
                                            <textarea class="textarea-h textField" type="text" placeholder=" "
                                                      value="<?php echo $courseProfile->getInstructorInfo()->getInstructorSpecialization() ?>"
                                                      id="specializationID"
                                                      name="SpecializationDetail"><?php echo $courseProfile->getInstructorInfo()->getInstructorSpecialization() ?></textarea>
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
                                                      value="<?php echo $courseProfile->getInstructorInfo()->getInstructorContactNumber() ?>"
                                                      name="ContactsDetail"><?php echo $courseProfile->getInstructorInfo()->getInstructorContactNumber() ?></textarea>
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
                                                      value="<?php echo $courseProfile->getInstructorInfo()->getInstructorPersonalEmail() ?>"
                                                      name="PersonalEmailDetail"><?php echo $courseProfile->getInstructorInfo()->getInstructorPersonalEmail() ?></textarea>
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
                    </section>

                    <!--      course CLO Distribution            -->
                    <section id="cpDistributionID" class=" cprofile-content-box-border mx-0 my-0  ">

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

            <!--                progress status-->
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

</div>

<div id="alertContainer"
     class="hidden shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 w-80 m-auto fixed top-1/3 left-1/3 z-5">
    <div class="w-full h-full text-center">
        <div class="flex h-full flex-col justify-between">
            <img src="../../../Assets/Images/vectorFiles/Others/Dot-section.svg" alt="cross"
                 class="h-12 w-12 mt-4 m-auto">
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
    let existingCLODescription;
    let exisitingCLOMapping;
    let viewType;

    viewType = <?php echo json_encode($_SESSION['typeOfProfile'], JSON_HEX_TAG)  ?>;
    ploObject = <?php echo json_encode($ploArray, JSON_HEX_TAG)  ?>;
    ploArray = Object.values(ploObject);

    if (viewType !== 1) {
        pleaseWork("Course Profile Update", "Catalyst | Course Profile Update");
        existingCLODescription = <?php echo json_encode($viewCLODescription, JSON_HEX_TAG) ?>;
        exisitingCLOMapping = <?php echo json_encode($viewCLOMapping, JSON_HEX_TAG)  ?>;
        coursTitle = <?php echo json_encode($courseProfile->getCourse()->getCourseTitle()) ?>;
        console.log("Description", existingCLODescription);
        console.log("Mapping", exisitingCLOMapping)
        updationTextSet(coursTitle);
    }

    function updationTextSet(courseTitle) {
        $('#coursepContinuebtn-3').addClass("hidden");
        $('#courseProfileUpdationBtn').removeClass("hidden");
        $('#subjectTopic').text("Course Profile " + courseTitle);
        $('.min-w-full.cprofile-container-centertxt').text(courseTitle + " update");

        // $('p.text-sm').text(courseTitle+" update");
    }

</script>
<script src="CourseProfileAssets/js/CourseProfileCreationScript.js" rel="script"></script>
<?php
/*if ($_SESSION['typeOfProfile'] == 1) {

    echo "
<script>
    let hasPLOs, ploArray;
        hasPLOs = " . $hasPlo . ";
        let ploObject = " . json_encode($ploArray, JSON_HEX_TAG) . ";
        ploArray = Object.values(ploObject);
        console.log(ploArray)
</script>
";
}
*/ ?>

</html>