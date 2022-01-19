<?php
/*
if (isset($_POST['profileContinue3rd'])) {
    print_r(sizeof($_POST['courseCLOs']));

    foreach ($_POST['courseCLOs'] as $fu) {
        print_r($fu);
    }
}*/

if (isset($_GET['profileID'])) {
    echo "im in editing mode";
}
if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
//    $_SESSION['recordExist'] = false;  // will pass PLOlist , each field value to courseprofile View.
}

$hasPLOs = '';
$PLOsArray = [];

if ($_SESSION['typeOfProfile'] == 1) { // if record does not exist then its creation type.
// curriculumID(program) , BatchCode ,  CourseCode server fetch.  if existed.

// fetch on going PLO list from curriculum list.
    $hasPLOs = true;
    $PLOsArray = ['PLO 1' => "Data fetched via a separate HTTP request won't include any information from the HTTP request that fetched the HTML document. You may need this information (e.g., if the HTML document is generated in response to a form submission",
        'PLO 2' => "Allows for asynchronous data transfer - Getting the information from PHP might be time/resources expensive. Sometimes you just don't want to wait for the information, load the page, and have the information reach whenever",
        'PLO 3' => "Allows for asynchronous data transfer - Getting the information from PHP might be time/resources expensive. Sometimes you just don't want to wait for the information, load the page, and have the information reach whenever",
        'PLO 4' => "More readable - JavaScript is JavaScript, PHP is PHP. Without mixing the two, you get more readable code on both languages",
        'PLO 5' => "Better separation between layers - If tomorrow you stop using PHP, and want to move to a servlet, a REST API, or some other service, you don't have to change much of the JavaScript code.",
        'PLO 6' => "Use AJAX to get the data you need from the server.
                                 Echo the data into the page somewhere, and use JavaScript to get the information from the DOM.",
        'PLO 7' => "There are actually several approaches to do this. Some require more overhead than others, and some are considered better than others",
        'PLO 8' => "Post, we'll examine each of the above methods, and see the pros and cons of each, as well as how to implement ",
        'PLO 9' => "Waiting for multiple simultaneous AJAX requests to be finished has become quite easy by using the concept of Promises. We change each AJAX call to return a Promise. Promises from all AJAX calls are then passed to the Promise.all() method to find when all Promises are resolved.",
        'PLO 10' => "Date & time for a given IANA timezone (such as America/Chicago, Asia/Kolkata etc) can be found by using the Date.toLocaleString() method",
        'PLO 11' => "This tutorial discusses two ways of removing a property from an object. The first way is using the delete operator, and the second way is object destructuring which is useful to remove multiple object properties in a single",
        'PLO 12' => "Playing & pausing a CSS animation can be done by using the animation-play-state property. Completely restarting the animation can be done by first removing the animation",
    ];
} elseif ($_SESSION['typeOfProfile'] == 2) { // record exist we move to view page.
    if ($_SESSION['recordExist']) { // then record already exist.
        $_SESSION['cpid'] = 'curriculum-18';
        $_SESSION['batchcode'] = 'f18-bcse';
        $_SESSION['ccode'] = 'or011';
        header("Location: courseprofile_view.php");
    }
}

function fetchingPLOs($hasPLOs, $PLOsArray)
{
    // checking list.
    // if exist:
}

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
    <script src="CourseProfileAssets/js/CourseProfileCreationScript.js" rel="script"></script>
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


</head>
<body>
<div class="w-full min-h-full">

    <header class=" bg-white shadow-md">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8 flex items-center justify-between h-20">
            <h1 class="text-3xl font-bold text-blue-800 flex-grow text-center">Course Profile Creation</h1>

            <!--  Desktop view of top          -->
            <div class="hidden md:block">
                <div class="ml-2 flex items-center md:ml-6">
                    <!-- Profile -->
                    <div class="mr-3 relative">

                        <div class="user-profile-section-desktop">
                            <button type="button" class="max-w-6xl bg-gray-800 rounded-full flex items-center

                            text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-200 focus:ring-white"
                                    id="user-menu-button">
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

        <!-- tool-tip -->
        <!--<div class="flex-col md:flex-row flex items-center md:justify-center">

            <a tabindex="0" role="link" aria-label="tooltip 1"
               class="focus:outline-none focus:ring-gray-300 rounded-full focus:ring-offset-2 focus:ring-2 focus:bg-gray-200 relative mt-20 md:mt-0"
               onmouseover="showTooltip(1)" onfocus="showTooltip(1)" onmouseout="hideTooltip(1)">
                <div class=" cursor-pointer" >
                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/with_steps_alternate-svg1.svg" alt="icon"/>
                </div>
                <div id="tooltip1" role="tooltip" class="z-20 -mt-20 w-64 absolute transition duration-150 ease-in-out left-0 ml-8 shadow-lg bg-white p-4 rounded">
                    <p class="text-sm font-bold text-gray-800 pb-1" id="plono-1">PLO 1</p>
                    <p class="text-xs leading-4 text-gray-600 pb-3">Reach out to more prospects at the right moment.</p>
                    <button class="focus:outline-none  focus:text-gray-400 text-xs text-gray-600 underline mr-2 cursor-pointer">Map view</button>
                </div>
            </a>
        </div>-->

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
                    <img class="mx-2 h-6 transition duration-800 ease-in-out"
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
                             class=" cprofile-content-box-border cprofile-content-division mx-0 my-0 transition duration-700 ease-in-out">

                        <div class="cprofile-left-container mx-3 w-1/4">
                            <!--                        course title-->
                            <div class="textField-label-content w-full" id="courseTitleDivId">
                                <label for="courseTitleID"></label>
                                <input class="textField" type="text" placeholder=" " id="courseTitleID"
                                       name="courseTitle">
                                <label class="textField-label">Course Title</label>
                            </div>

                            <!--                        course Code-->
                            <div class="textField-label-content w-full" id="courseCodeDivId">
                                <label for="courseCodeID"></label>
                                <input class="textField" type="text" placeholder=" " id="courseCodeID"
                                       name="courseCode">
                                <label class="textField-label">Course Code</label>
                            </div>

                            <!--                        credit Hour-->
                            <div class="textField-label-content w-full" id="creditHourDivId">
                                <label for="creditHourID"></label>
                                <select class="select" name="creditHour"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);" value=""
                                        id="creditHourID">
                                    <option value="" hidden></option>
                                    <option value="one">1</option>
                                    <option value="two">2</option>
                                    <option value="three">3</option>
                                </select>
                                <label class="select-label top-1/4 sm:top-3">Credit Hour</label>
                            </div>

                            <!--                        Pre requisite-->
                            <div class="textField-label-content w-full" id="preRequisiteDivId">
                                <label for="preRequisiteID"></label>
                                <select class="select" name="preRequisite"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);" value=""
                                        id="preRequisiteID">
                                    <option value="" hidden></option>
                                    <option value="one">Programming Fundamental</option>
                                </select>
                                <label class="select-label top-1/4 sm:top-3">Pre-Requisites</label>
                            </div>

                            <!--                       Term (select semester )-->
                            <div class="select-label-content w-full" id="TermDivId">
                                <label for="semesterTermID"></label>
                                <select class="select" name="semesterTerm"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);" value=""
                                        id="semesterTermID">
                                    <option value="" hidden></option>
                                    <option value="one">Programming Fundamental</option>
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
                                        onchange="this.setAttribute('value', this.value);" value="" id="programID">
                                    <option value="" hidden></option>
                                    <option value="one">BCSE</option>
                                    <option value="one">BSIT</option>
                                </select>

                                <label class="select-label top-1/4 sm:top-3">Program</label>
                            </div>

                            <!--                        course effective-->
                            <div class="textField-label-content w-full" id="courseEffectiveDivId">
                                <label for="courseEffectiveID"></label>
                                <select class="select" name="courseEffective"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);" value=""
                                        id="courseEffectiveID">
                                    <option value="" hidden></option>
                                    <option value="one">Fall-16 Batch Onwards</option>
                                    <option value="one">Fall-18 Batch Onwards</option>
                                </select>
                                <label class="select-label top-1/4 sm:top-3">Course Effective</label>
                            </div>

                            <div class="textField-label-content w-full" id="coordinatingUnitDivID">
                                <label for="coordinatingUnitID"></label>
                                <select class="select" name="courseEffective"
                                        onclick="this.setAttribute('value', this.value);"
                                        onchange="this.setAttribute('value', this.value);" value=""
                                        id="coordinatingUnitID">
                                    <option value="" hidden></option>
                                    <option value="one">Fall-16 Batch Onwards</option>
                                    <option value="one">Fall-18 Batch Onwards</option>
                                </select>
                                <label class="select-label top-1/4 sm:top-3">Co-ordinating Unit</label>
                            </div>


                        </div>
                        <div class="cprofile-right-container flex-1 ml-40 pb-5 mr-5">

                            <div class="course-assessment-border border-t-2 shadow-sm"
                                 style="background-color: #0284FC">
                                <h2 class="table-head">Assessment Instrument with Weights</h2>
                                <div class="grid bg-white  border-solid border-t-2 py-3 -mx-0.5">
                                    <div class="assessment-wrap">
                                        <h3>Quizzes</h3>
                                        <div class="vertical-line"></div>
                                        <div class="textField-label-content w-full" id="quizDetailDivId">
                                            <label for="quizDetailID"></label>
                                            <textarea class="textarea-h textField" type="tex" placeholder=" "
                                                      id="quizDetailID"
                                                      name="quizDetail"></textarea>
                                            <label class="textField-label">Detail</label>
                                        </div>

                                        <div class="textField-label-content w-2/3" id="quizWeightDivId">
                                            <label for="quizWeight"></label>
                                            <input type="text" placeholder=" " name="quizWeight"
                                                   id="quizWeightID"
                                                   class="textField px-12"
                                                   oninput="isNumeric(this)"
                                                   maxlength="2"
                                                   style="padding-left:2.3em ">
                                            <label class="textField-label ml-3">Weights</label>


                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                                <span class="text-gray-500 sm:text-sm">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="assessment-wrap">
                                        <h3>Assignments</h3>
                                        <div class="vertical-line"></div>
                                        <div class="textField-label-content w-full" id="assignmentDetailDivId">
                                            <label for="assignmentDetailID"></label>
                                            <textarea class="textarea-h textField" type="text" placeholder=" "
                                                      id="assignmentDetailID" name="assignmentDetail"></textarea>
                                            <label class="textField-label">Detail</label>
                                        </div>
                                        <div class="textField-label-content w-2/3" id="assignmentWeightDivId">
                                            <label for="assignmentWeightID"></label>
                                            <input type="text" placeholder=" " name="assignmentWeight"
                                                   id="assignmentWeightID" class="textField px-12"
                                                   oninput="isNumeric(this)"
                                                   maxlength="2"
                                                   style="padding-left:2.3em ">

                                            <label class="textField-label ml-3">Weights</label>
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                                <span class="text-gray-500 sm:text-sm">%</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="assessment-wrap">
                                        <h3>Projects</h3>
                                        <div class="vertical-line"></div>
                                        <div class="textField-label-content w-full" id="projectDetailDivId">
                                            <label for="projectDetailID"></label>
                                            <textarea class="textarea-h textField" type="tex" placeholder=" "
                                                      id="projectDetailID" name="projectDetail"></textarea>
                                            <label class="textField-label">Detail</label>
                                        </div>

                                        <div class="textField-label-content w-2/3" id="projectWeightDivId">
                                            <label for="projectWeightID"></label>
                                            <input type="text" placeholder=" " name="projectWeight"
                                                   id="projectWeightID" class="textField px-12"
                                                   oninput="isNumeric(this)"
                                                   maxlength="2"
                                                   style="padding-left:2.3em ">

                                            <label class="textField-label ml-3">Weights</label>
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                                <span class="text-gray-500 sm:text-sm">%</span>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="assessment-wrap">
                                        <h3>Mid Term</h3>

                                        <div class="vertical-line"></div>

                                        <div class="textField-label-content w-full" id="midTermDetailDivId">
                                            <label for="midTermDetailID"></label>
                                            <textarea class="textarea-h textField" type="tex" placeholder=" "
                                                      id="midTermDetailID" name="midTermDetail"></textarea>
                                            <label class="textField-label">Detail</label>
                                        </div>

                                        <div class="textField-label-content w-2/3" id="midTermWeightDivId">
                                            <label for="midWeightID"></label>
                                            <input type="text" placeholder=" "
                                                   oninput="isNumeric(this)"
                                                   maxlength="2"
                                                   name="midWeight" id="midWeightID"
                                                   class="textField px-12" style="padding-left:2.3em ">
                                            <label class="textField-label ml-3">Weights</label>

                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                                <span class="text-gray-500 sm:text-sm">%</span>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="assessment-wrap">
                                        <h3>Final Term</h3>

                                        <div class="vertical-line"></div>

                                        <div class="textField-label-content w-full" id="finalTermDetailDivId">
                                            <label for="finalTermDetailID"></label>
                                            <textarea class="textarea-h textField" type="tex" placeholder=" "
                                                      id="finalTermDetailID" name="finalTermDetail"></textarea>
                                            <label class="textField-label">Detail</label>
                                        </div>

                                        <div class="textField-label-content w-2/3" id="finalTermWeightDivId">
                                            <label for="finalTermtWeight"></label>
                                            <input type="text" placeholder=" "
                                                   oninput="isNumeric(this)"
                                                   maxlength="2"
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
                                           name="teachingMethodology">
                                    <label class="textField-label">teaching Methodology</label>
                                </div>
                                <div class="textField-label-content w-full" id="courseInteractionModelDivId">
                                    <label for="courseInteractionModelID"></label>
                                    <input class="textField" type="text" placeholder="Interaction model"
                                           id="courseInteractionModelID"
                                           oninput="isNumeric(this)"
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
                                       name="ReferenceBooks">
                                <label class="textField-label">ReferenceBooks</label>
                            </div>
                            <!-------------------------------RecommendedTextbooks----------------------->
                            <div class="textField-label-content w-full" id="recommendedTextbooksDivId">
                                <label for="recommendedTextbooksID"></label>
                                <input class="textField" type="text" placeholder=" " id="recommendedTextbooksID"
                                       name="RecommendedTextbooks">
                                <label class="textField-label">RecommendedTextbooks</label>
                            </div>
                            <!--                        course Description-->
                            <div class="textField-label-content w-full" id="courseDescriptionDivId">
                                <label for="courseDescriptionID"></label>
                                <textarea class="textarea-h textField" type="text" placeholder=" "
                                          id="courseDescriptionID" name="assignmentDetail"
                                          style="height: 9em"></textarea>
                                <label class="textField-label">Course Description</label>
                            </div>
                            <!--                        OtherreferenceMaterial-->
                            <div class="textField-label-content w-full" id="otherRefDivId">
                                <label for="otherReferenceId"></label>
                                <textarea class="textarea-h textField" type="text" placeholder=" "
                                          id="otherReferenceId" name="otherReference"
                                          style="height: 9em"></textarea>
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
                                                      id="nameDetailID" name="nameDetail"></textarea>
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
                                                      name="DesignationDetail"></textarea>
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
                                                      id="qualificationID"
                                                      name=" QualificationDetail"></textarea>
                                            <label class="textField-label">Detail</label>
                                        </div>
                                    </div>
                                    <div class="assessment-wrap mx-35">
                                        <h3>Specialization</h3>
                                        <div class="vertical-line"></div>
                                        <div class="textField-label-content w-full" id=" SpecializationWeightDivId">
                                            <label for="specializationID"></label>
                                            <textarea class="textarea-h textField" type="text" placeholder=" "
                                                      id="specializationID"
                                                      name="SpecializationDetail"></textarea>
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
                                                      name="ContactsDetail"></textarea>
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
                                                      name="PersonalEmailDetail"></textarea>
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
                Do you wish to continue without creating any <span
                        class="text-gray-800 dark:text-white font-bold">CLO</span> and map their respective <span
                        class="text-gray-800 dark:text-white font-bold">PLO</span>?
            </p>
            <div id="aboxcontainer" class="flex items-center justify-between gap-4 w-full mt-8">
                <button id="alertBtnCLOCreation" type="button" class="loginButton py-2 px-4 hover:bg-indigo-700
                        text-white w-full transition ease-in duration-200 text-center text-base
                         font-semibold shadow-md rounded-lg">No, add now
                </button>

                <button id="alertBtnCLOContinue" type="button" class="loginButton py-2 px-4 hover:bg-indigo-700
                        text-white w-full transition ease-in duration-200 text-center text-base
                         font-semibold shadow-md rounded-lg">Continue
                </button>

            </div>
        </div>
    </div>
</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"
        type="text/javascript"></script>

<?php

if ($_SESSION['typeOfProfile'] == 1) {

    echo "
<script>
    let hasPLOs, ploArray;
        hasPLOs = " . $hasPLOs . ";
        let ploObject = " . json_encode($PLOsArray, JSON_HEX_TAG) . ";
        ploArray = Object.entries(ploObject);
</script>
<script src='CourseProfileAssets/CourseProfileCreationScript.js'></script>
";
}
?>
</html>

