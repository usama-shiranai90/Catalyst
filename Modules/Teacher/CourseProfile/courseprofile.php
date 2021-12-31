<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!--    <link href="../../../Assets/Frameworks/Tailwind/tailwind.css" rel="stylesheet">-->
    <link href="../../../Assets/Frameworks/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script rel="script" src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="CourseProfileAssets/courseInject.css" rel="stylesheet">
    <link href="CourseProfileAssets/courseProfileStyle.css" rel="stylesheet">
    <script src="CourseProfileAssets/courseScript.js" rel="script"></script>

</head>
<body>
<div class="w-full min-h-full">
    <header class="bg-white shadow-md">
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

        <div class="max-w-full grid grid-rows-2 gap-3.5 grid-flow-row
                        px-4 py-6 sm:px-0">

            <!--       Course-Profile-Main-Heading         -->
            <div class="cprofile-content-head">
                <h3 class="text-2xl font-bold" id="subjectTopic">Course Profile Creation</h3>
                <p class="text-sm">Following data needs to be completed before manipulating student data
                    course.</p>
            </div>

            <!--        Course-Profile Container -->
            <div class="cprofile-primary-border text-black rounded-t-md rounded-b-md mt-2 h-full"
                 style="background-color: #F4F8F9">

                <h2 class="cprofile-creation-content">Course Profile Creation</h2>

                <form method="post">
                    <!--                        start page-1 -->
                    <div id="cpID-1" class="cprofile-content-box-border cprofile-content-division mx-0">
                        <div class="cprofile-left-container mx-3 pb-5 w-1/4">
                            <!--                        course title-->
                            <div class="textField-label-content w-full" id="courseTitleDivId">
                                <label for="courseTitleID"></label>
                                <input class="textField" type="text" placeholder=" " id="courseTitleID"
                                       name="courseTitle">
                                <label class="textField-label">Course Title</label>
                            </div>

                            <!--                        course Code-->
                            <div class="textField-label-content w-full" id="courseCodeDivId">
                                <label for="courseCode"></label>
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
                                <label for="courseEffective"></label>
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

                        </div>
                        <div class="cprofile-right-container flex-1 mx-3 pb-5">

                            <div class="course-assessment-border" style="background-color: #0284FC">

                                <h2 class="table-head">Assessment Instrument with Weights</h2>
                                <div class="grid grid-rows-5 bg-white -rounded-t-md border-solid border-t-2">

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

                                        <div class="textField-label-content w-full" id="quizWeightDivId">
                                            <input type="text" placeholder=" " name="price" id="quizWeight"
                                                   class="textField block w-full pl-12 pr-12"
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
                                        <div class="textField-label-content w-full" id="assignmentWeightDivId">
                                            <input type="text" placeholder=" " name="price" id="assignmentWeight"
                                                   class="textField block w-full pl-12 pr-12"
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

                                        <div class="textField-label-content w-full" id="projectWeightDivId">
                                            <input type="text" placeholder=" " name="price" id="projectWeight"
                                                   class="textField block w-full pl-12 pr-12"
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

                                        <div class="textField-label-content w-full" id="midTermWeightDivId">
                                            <input type="text" placeholder=" " name="price" id="midTermWeight"
                                                   class="textField block w-full pl-12 pr-12"
                                                   style="padding-left:2.3em ">
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

                                        <div class="textField-label-content w-full" id="finalTermWeightDivId">
                                            <input type="text" placeholder=" " name="price" id="finalTermtWeight"
                                                   class="textField block w-full pl-12 pr-12"
                                                   style="padding-left:2.3em ">
                                            <label class="textField-label ml-3">Weights</label>

                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                                <span class="text-gray-500 sm:text-sm">%</span>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class=" assessment-wrap flex-1 mt-4">
                                <div class="textField-label-content w-full" id="coordinatingUnitDivId">
                                    <label for="coordinatingUnitID"></label>
                                    <select class="select" name="coordinatingUnit"
                                            onclick="this.setAttribute('value', this.value);"
                                            onchange="this.setAttribute('value', this.value);" value=""
                                            id="coordinatingUnitID">
                                        <option value=" " hidden></option>
                                        <option value="one">BCSE</option>
                                        <option value="two">BSCS</option>
                                        <option value="three">BSIT</option>
                                    </select>
                                    <label class="select-label top-1/4 sm:top-3">Coordinating Unit</label>
                                </div>

                                <!----------------------- TeachingMethadology--------------------->
                                <div class="textField-label-content w-full" id="teachingMethodologyDivID">
                                    <label for="teachingMethodologyID"></label>
                                    <input class="textField" type="text" placeholder=" " id="teachingMethodologyID"
                                           name="teachingMethodology">
                                    <label class="textField-label">teaching Methodology</label>
                                </div>
                                <!--                                    CourseinteractionModel-->
                                <div class="textField-label-content w-full" id="courseInteractionModelDivId">
                                    <label for="courseInteractionModelID"></label>
                                    <input class="textField" type="text" placeholder=" " id="courseInteractionModelID"
                                           name="courseInteractionModel">
                                    <label class="textField-label">Course Interaction Model</label>
                                </div>

                            </div>

                        </div>

                        <div class="text-right">
                            <button type="button" class="loginButton" name="profileComplete" id="continue-btn-1">
                                Continue
                            </button>
                        </div>
                    </div>
                    <!--                        end page-1-->

                    <div id="cpID-2" class=" hidden cprofile-content-box-border grid grid-rows-2">

                        <!--                                Course Learning Outcome-->

                        <div class="clo-container">
                            <div class="clo-table-border " style="background-color: #0284FC">
                                <h2 class="table-head">Course Learning Outcome</h2>
                                <div id="courseLearningDiv" class="flex flex-wrap p-0">
                                    <div class="flex w-full items-start text-black uppercase text-center text-md font-medium bg-gray-200 h-10 ">
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

                                    <div id="clo-div-1"
                                         class="flex w-full items-start capitalize text-black bg-white font-medium h-10 text-center text-sm">
                                        <div class="cprofile-column h-10 w-24 bg-blue-500 text-white">
                                            <span class="cprofile-cell-data">CLO-1</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-3/4">
                                            <!--                                                <span class="cprofile-cell-data">Understanding the role of Indesign and its major activities within the OO software</span>-->
                                            <label for="clo-1-description">
                                                <input type="text" class="text-center min-h-full min-w-full" value=""
                                                       placeholder="Enter CLO description" id="clo-1-description">
                                            </label>
                                        </div>

                                        <div class="cprofile-column h-10 w-1/6">
                                            <label for="clo-1-undergraduate">
                                                <input type="text" class="text-center min-h-full min-w-full"
                                                       value="Undergraduate"
                                                       id="clo-1-undergraduate">
                                            </label>
                                        </div>

                                        <div class="cprofile-column h-10 w-1/6">
                                            <label for="clo-1-bt-level">

                                                <div class="flex flex-row">
                                                    <input type="text" class="text-center h-10 min-w-0" value=""
                                                           placeholder="Enter BT-Level" id="clo-1-bt-level">
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg">
                                                </div>
                                            </label>

                                        </div>
                                    </div>

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

                        <div class="cloMapping-container mt-5">
                            <div class="clo-table-border" style="background-color: #0284FC">

                                <h2 class="table-head">CLO's & PLO's Mapping</h2>
                                <div id="courseMappingDiv" class="flex flex-wrap p-0">

                                    <div class="flex w-full items-start text-black uppercase text-center text-md font-medium bg-gray-200 h-10 ">
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">PLOs</span>
                                        </div>

                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">1</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">2</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">4</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">5</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">6</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">7</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">8</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">9</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">10</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">11</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">10</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">11</span>
                                        </div>
                                    </div>

                                    <div id="clo-map-div-1"
                                         class="flex w-full items-start text-black uppercase text-center text-md font-medium bg-gray-200 h-10">

                                        <div class="cprofile-column h-10 bg-blue-500 text-white w-1/6">
                                            <span class="cprofile-cell-data">CLO-1</span>
                                        </div>

                                        <div class="cprofile-column h-10 w-1/6">
                                            <input type="text" class="cprofile-cell-data text-center max-w-0" value=""
                                                   placeholder="" id="clo-1-PLO-1">
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <input type="text" class="cprofile-cell-data text-center max-w-0" value=""
                                                   placeholder="" id="clo-1-PLO-2">
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <input type="text" class="cprofile-cell-data text-center max-w-0" value=""
                                                   placeholder="" id="clo-1-PLO-3">
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <input type="text" class="cprofile-cell-data text-center max-w-0" value=""
                                                   placeholder="" id="clo-1-PLO-4">
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <input type="text" class="cprofile-cell-data text-center max-w-0" value=""
                                                   placeholder="" id="clo-1-PLO-5">
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <input type="text" class="cprofile-cell-data text-center max-w-0" value=""
                                                   placeholder="" id="clo-1-PLO-6">
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <input type="text" class="cprofile-cell-data text-center max-w-0" value=""
                                                   placeholder="" id="clo-1-PLO-7">
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <input type="text" class="cprofile-cell-data text-center max-w-0" value=""
                                                   placeholder="" id="clo-1-PLO-8">
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <input type="text" class="cprofile-cell-data text-center max-w-0" value=""
                                                   placeholder="" id="clo-1-PLO-9">
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <input type="text" class="cprofile-cell-data text-center max-w-0" value=""
                                                   placeholder="" id="clo-1-PLO-10">
                                        </div>

                                        <div class="cprofile-column h-10 w-1/6">
                                            <input type="text" class="cprofile-cell-data text-center max-w-0" value=""
                                                   placeholder="" id="clo-1-PLO-11">
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <input type="text" class="cprofile-cell-data text-center max-w-0" value=""
                                                   placeholder="" id="clo-1-PLO-12">
                                        </div>

                                        <!--<div class="cprofile-column h-10 w-1/6">
                                            <label for="clo-1-PLO-1">
                                                <input type="text" class="text-center" value=""
                                                       placeholder="" id="clo-1-PLO-1">
                                            </label>
                                        </div>-->
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="loginButton" name="profileComplete"
                                    id="finish-btn">Finish
                            </button>
                        </div>
                    </div>

                </form>
            </div>

            <!--                progress status-->
            <div class="my-4">
                <div class="flex-center pb-3">

                    <div id="progressCircle-1" class="flex-grow-0 ">
                        <div class="progress-circle progress-circle-filled">
                                <span class="circular-span">
                                    <i class="fa fa-check"></i>
                                </span>
                        </div>
                    </div>

                    <div class="w-1/6 items-center flex">
                        <!-- w-1/6 align-center items-center align-middle content-center flex-->
                        <div class="bg-gray-200  flex-1">
                            <!-- w-full bg-gray-200 items-center align-middle align-center flex-1 -->
                            <div class="progress-circle-filled py-1 w-full"></div>
                        </div>
                    </div>

                    <div id="progressCircle-2" class="flex-grow-0 ">
                        <div class="progress-circle progress-circle-unfilled">
                            <span class="text-gray-400 circular-span">2</span>
                        </div>
                    </div>

                    <div class="w-1/6 items-center flex">
                        <div class="bg-gray-200  flex-1">
                            <div class="progress-circle-unfilled py-1 w-0"></div>
                        </div>
                    </div>
                    <div id="progressCircle-3" class="flex-grow-0 ">
                        <div class="progress-circle progress-circle-unfilled">
                            <span class="text-gray-400 circular-span">3</span>
                        </div>
                    </div>
                </div>

                <div class="flex-center text-center">
                    <div class="w-1/5">
                        Course Essential
                    </div>
                    <div class="w-1/5">
                        Course Detail
                    </div>
                    <div class="w-1/5">
                        CLO Distribution
                    </div>
                </div>
            </div>

        </div>

    </main>
</div>
</body>

</html>