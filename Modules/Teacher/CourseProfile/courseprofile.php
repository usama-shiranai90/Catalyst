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
    <link href="CourseProfileAssets/courseInject.css" rel="stylesheet">
    <link href="CourseProfileAssets/courseProfileStyle.css" rel="stylesheet">
    <script src="CourseProfileAssets/courseScript.js" rel="script"></script>
    <link href="../../../Assets/Frameworks/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">

</head>
<body>
<div class="w-full min-h-full">
    <header class="hidden bg-white shadow-md">
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

        <div class="cprofile-grid">

            <div id="errorMessageDiv"
                 class="fixed bottom-0 right-0 z-50 w-1/5 flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
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
                    <img class="mx-2 h-6" src="../../../Assets/Images/arrow-back.svg" alt="arrow-back-section">
                    <!--<svg  class="mx-2 h-6 hover:bg-gray-700 relative" width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.3333 7.7085L4.625 15.4168L12.3333 23.1252" stroke="#3B3E43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.625 15.417H16.9583C25.473 15.417 32.375 22.319 32.375 30.8337V32.3753" stroke="#3B3E43" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>-->
                    <h2 class="min-w-full cprofile-container-centertxt">Course Profile Creation</h2>
                </div>
                <form method="post">

                    <!--     course essential section            -->
                    <section id="cpEssentialID"
                             class="hidden cprofile-content-box-border cprofile-content-division mx-0 my-0">

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

                            <div class="course-assessment-border" style="background-color: #0284FC">
                                <h2 class="table-head">Assessment Instrument with Weights</h2>
                                <div class="grid bg-white  border-solid border-t-2 py-3">
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
                                            <input type="text" placeholder=" " name="midWeight" id="midWeightID"
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
                                            <input type="text" placeholder=" " name="finalWeight" id="finalWeightID"
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
                             class="hidden cprofile-content-box-border cprofile-content-division mx-0 my-0 ">

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
                            <div class="text-md rounded-t-lg border-gray-300 border-t-2 border-r-2 border-l-2
                                        border-b-2 border-solid mb-10" style="background-color: #0284fc">
                                <h2 class="text-center my-3 font-bold text-white">Course Instructor Details</h2>
                                <div class="grid bg-white border-solid border-t-2 text-center">
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
                                        <div class="textField-label-content w-full" id=" personalEmailWeightDivId">
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

                                    <!--     <div class="cprofile-column h-10 w-1/6">
                                                                           <input class="clo-toggle hidden" id="clo-1-plo-2" name="clo1" type="checkbox" />
                                                                           <label class="inside-label cprofile-cell-data" for="clo-1-plo-2">
                                                                               <span>
                                                                                   <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg>
                                                                               </span>
                                                                           </label>
                                                                       </div>
                                                                       <div class="cprofile-column h-10 w-1/6">
                                                                           <input class="clo-toggle hidden" id="clo-1-plo-3" name="clo1" type="checkbox" />
                                                                           <label class="inside-label cprofile-cell-data" for="clo-1-plo-3">
                                                                               <span>
                                                                                   <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg>
                                                                               </span>
                                                                           </label>

                                                                       </div>
                                                                       <div class="cprofile-column h-10 w-1/6">
                                                                           <input class="clo-toggle hidden" id="clo-1-plo-4" name="clo1" type="checkbox" />
                                                                           <label class="inside-label cprofile-cell-data" for="clo-1-plo-4">
                                                                               <span>
                                                                                   <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg>
                                                                               </span>
                                                                           </label>

                                                                       </div>
                                                                       <div class="cprofile-column h-10 w-1/6">
                                                                           <input class="clo-toggle hidden" id="clo-1-plo-5" name="clo1" type="checkbox" />
                                                                           <label class="inside-label cprofile-cell-data" for="clo-1-plo-5">
                                                                               <span>
                                                                                   <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg>
                                                                               </span>
                                                                           </label>

                                                                       </div>
                                                                       <div class="cprofile-column h-10 w-1/6">
                                                                           <input class="clo-toggle hidden" id="clo-1-plo-6" name="clo1" type="checkbox" />
                                                                           <label class="inside-label cprofile-cell-data" for="clo-1-plo-6">
                                                                               <span>
                                                                                   <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg>
                                                                               </span>
                                                                           </label>

                                                                       </div>
                                                                       <div class="cprofile-column h-10 w-1/6">
                                                                           <input class="clo-toggle hidden" id="clo-1-plo-7" name="clo1" type="checkbox" />
                                                                           <label class="inside-label cprofile-cell-data" for="clo-1-plo-7">
                                                                               <span>
                                                                                   <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg>
                                                                               </span>
                                                                           </label>

                                                                       </div>
                                                                       <div class="cprofile-column h-10 w-1/6">
                                                                           <input class="clo-toggle hidden" id="clo-1-plo-8" name="clo1" type="checkbox" />
                                                                           <label class="inside-label cprofile-cell-data" for="clo-1-plo-8">
                                                                               <span>
                                                                                   <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg>
                                                                               </span>
                                                                           </label>

                                                                       </div>
                                                                       <div class="cprofile-column h-10 w-1/6">
                                                                           <input class="clo-toggle hidden" id="clo-1-plo-9" name="clo1" type="checkbox" />
                                                                           <label class="inside-label cprofile-cell-data" for="clo-1-plo-9">
                                                                               <span>
                                                                                   <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg>
                                                                               </span>
                                                                           </label>

                                                                       </div>
                                                                       <div class="cprofile-column h-10 w-1/6">
                                                                           <input class="clo-toggle hidden" id="clo-1-plo-10" name="clo1" type="checkbox" />
                                                                           <label class="inside-label cprofile-cell-data" for="clo-1-plo-10">
                                                                               <span>
                                                                                   <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg>
                                                                               </span>
                                                                           </label>

                                                                       </div>
                                                                       <div class="cprofile-column h-10 w-1/6">
                                                                           <input class="clo-toggle hidden" id="clo-1-plo-11" name="clo1" type="checkbox" />
                                                                           <label class="inside-label cprofile-cell-data" for="clo-1-plo-11">
                                                                               <span>
                                                                                   <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg>
                                                                               </span>
                                                                           </label>

                                                                       </div>
                                                                       <div class="cprofile-column h-10 w-1/6">
                                                                           <input class="clo-toggle hidden" id="clo-1-plo-12" name="clo1" type="checkbox" />
                                                                           <label class="inside-label cprofile-cell-data" for="clo-1-plo-12">
                                                                               <span>
                                                                                   <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg>
                                                                               </span>
                                                                           </label>

                                                                       </div>-->

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
                            <span class="text-white circular-span">2</span>
                        </div>
                    </div>

                    <div class="w-1/6 items-center flex">
                        <div class="bg-gray-200  flex-1">
                            <div class="progress-circle-unfilled py-1 w-0"></div>
                        </div>
                    </div>
                    <div id="progressCircle-3" class="flex-grow-0 ">
                        <div class="progress-circle progress-circle-unfilled">
                            <span class="text-white circular-span">3</span>
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


<!--<div id="tooltip-animation" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                Tooltip content
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>-->