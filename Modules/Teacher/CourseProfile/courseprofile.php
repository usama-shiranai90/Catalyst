<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="../../../Assets/Frameworks/Tailwind/tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Frameworks/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script rel="script" src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="CourseProfileAssets/courseInject.css" rel="stylesheet">
    <script rel="CourseProfileAssets/courseScript.js"></script>
    <link href="CourseProfileAssets/courseProfileStyle.css" rel="stylesheet">

</head>
<body class="min-h-full">
<div class="w-full">


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
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
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
                    <!--
                      Heroicon name: outline/menu

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <!--
                      Heroicon name: outline/x

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <main class="container mx-auto py-3 sm:px-3 lg:px-5  max-w-7xl sm:max-w-xl md:max-w-3xl lg:max-w-7xl">
        <div class="px-4 py-6 sm:px-0">

            <div class="max-w-full grid grid-rows-2 gap-3.5 grid-flow-row">

                <!--       Course-Profile-Main-Heading         -->
                <div class="middle-section-topic row-span-2 space-y-2">
                    <h3 class="text-2xl font-bold" id="subject-topic-ID">Course Profile Creation</h3>
                    <p class="text-sm">Following data needs to be completed before manipulating student data
                        course.</p>
                </div>

                <!--        Course-Profile Container -->
                <div class="parent-container-box-border text-black rounded-t-md rounded-b-md mt-2 h-full"
                     style="background-color: #F4F8F9">

                    <h2 class="parent-container-header" id="subject-topic-ID">Course Profile Creation</h2>

                    <form method="post">
                        <div class="bg-white rounded-t-md  border-solid border-t-2 flex flex-row px-5 pt-4 pb-4">

                            <div class="left-container w-1/4">

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
                                    <input class="textField" type="text" placeholder=" " id="courseCode"
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
                                <div class="textField-label-content w-full" id="courseTitleDivId">
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

                            <!--                            my right container-->
                            <div class="right-container flex-1 mx-3 pb-5 ml-10">
                                <div class="text-md rounded-t-lg border-gray-300 border-t-2 border-r-2 border-l-2
                                            border-b-2 border-solid" style="background-color: #0284FC">

                                    <h2 class="text-center my-2 font-bold text-white">Assessment Instrument with
                                        Weights</h2>

                                    <div class="grid grid-rows-5 bg-white -rounded-t-md  border-solid border-t-2">

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
                                            <div class="textField-label-content w-full" id="assignmentDetailDivId">
                                                <label for="assignmentDetailID"></label>
                                                <textarea class="textarea-h textField" type="tex" placeholder=" "
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
                                            <h3>Mid Term</h3>

                                            <div class="vertical-line"></div>

                                            <div class="textField-label-content w-full" id="assignmentDetailDivId">
                                                <label for="assignmentDetailID"></label>
                                                <textarea class="textarea-h textField" type="tex" placeholder=" "
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
                                            <h3>Final Term</h3>

                                            <div class="vertical-line"></div>

                                            <div class="textField-label-content w-full" id="assignmentDetailDivId">
                                                <label for="assignmentDetailID"></label>
                                                <textarea class="textarea-h textField" type="tex" placeholder=" "
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
                                    </div>

                                </div>
                                <div class=" assessment-wrap flex-1 mt-4">
                                    <div class="textField-label-content w-full" id="cordinatingUnitDivId">
                                        <label for="CordinatingUnitID"></label>
                                        <select class="select" name="Coordinating Unit"
                                                onclick="this.setAttribute('value', this.value);"
                                                onchange="this.setAttribute('value', this.value);" value=""
                                                id="cordinatingUnitDivId">
                                            <option value=" " hidden></option>
                                            <option value="one">BCSE</option>
                                            <option value="two">BSCS</option>
                                            <option value="three">BSIT</option>
                                        </select>
                                        <label class="select-label top-1/4 sm:top-3">Coordinating Unit</label>
                                    </div>

<!----------------------- TeachingMethadology--------------------->
                                    <div class="textField-label-content w-full" id="teachingMethadologyDivId">
                                        <label for="TeachingMethadologyID"></label>
                                        <input class="textField" type="text" placeholder=" " id="teachingMethadologyID"
                                               name="teachingMethadology">
                                        <label class="textField-label">teaching Methadology</label>
                                    </div>
<!--                                    CourseinteractionModel-->
                                    <div class="textField-label-content w-full" id="courseInteractionModelDivId">
                                        <label for="CourseInteractionModelID"></label>
                                        <input class="textField" type="text" placeholder=" " id="courseInteractionModelID"
                                               name="CourseInteractionModel">
                                        <label class="textField-label">Course Interaction Model</label>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="" id="checkout-progress"
                     data-current-step="1">

                    <!--<div class="progress-bar">
                        <div class="step step-1 active"><span> 1</span>
                            <div class="fa fa-check opaque"></div>
                            <div class="step-label "> Course Essential</div>
                        </div>
                        <div class="step step-2"><span> 2</span>
                            <div class="fa fa-check opaque"></div>
                            <div class="step-label"> Course Detail</div>
                        </div>
                        <div class="step step-3"><span> 3</span>
                            <div class="fa fa-check opaque"></div>
                            <div class="step-label"> CLO Distribution</div>
                        </div>
                    </div>-->
                </div>

                <!--                Course Profile Progress bar-->
                <div class="my-4">
                    <div class="flex-center pb-3">
                        <div id="progressCircle-1" class="flex-grow-0 ">
                            <div class="w-10 h-10 bg-black mx-auto rounded-full text-lg text-white flex items-center">
                                <span class="text-white text-center w-full"><i
                                            class="fa fa-check w-full fill-current white"></i></span>
                            </div>
                        </div>
                        <div class="w-1/6 align-center items-center align-middle content-center flex">
                            <div class="w-full bg-gray-200 items-center align-middle align-center flex-1">
                                <div class="bg-black text-xs leading-none py-1 text-center text-grey-900"
                                     style="width: 100%"></div>
                            </div>
                        </div>

                        <div id="progressCircle-2" class="flex-grow-0 ">
                            <div class="w-10 h-10 bg-black mx-auto rounded-full text-lg text-white flex items-center">
                                <span class="text-white text-center w-full"><i
                                            class="fa fa-check w-full fill-current white"></i></span>
                            </div>
                        </div>
                        <div class="w-1/6 align-center items-center align-middle content-center flex">
                            <div class="w-full bg-gray-200 items-center align-middle align-center flex-1">
                                <div class="bg-black text-xs leading-none py-1 text-center"
                                     style="width: 20%"></div>
                            </div>
                        </div>

                        <div id="progressCircle-3" class="flex-grow-0 ">
                            <div class="w-10 h-10 bg-white border-2 border-grey-light mx-auto rounded-full text-lg text-white flex items-center">
                                <span class="text-gray-400 text-center w-full">3</span>
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
        </div>

    </main>
</div>

</body>
</html>