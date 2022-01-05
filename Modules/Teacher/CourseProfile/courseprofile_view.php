<?php
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
    <link href="CourseProfileAssets/courseInject.css" rel="stylesheet">
    <link href="CourseProfileAssets/courseProfileStyle.css" rel="stylesheet">
    <script src="CourseProfileAssets/courseScript.js" rel="script"></script>

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
                                            id="user-menu-button"">
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
                               <div class="cprofile-left-container mx-3 w-1/4" >
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

                                   <div class="textField-label-content w-full" id="teachingMethodologyDivID">
                                       <label for="teachingMethodologyID"></label>
                                       <input class="textField" type="text" placeholder=" " id="teachingMethodologyID"
                                              name="teachingMethodology">
                                       <label class="textField-label">teaching Methodology</label>
                                   </div>

                                   <div class="textField-label-content w-full" id="courseInteractionModelDivId">
                                       <label for="courseInteractionModelID"></label>
                                       <input class="textField" type="text" placeholder="Interaction model" id="courseInteractionModelID"
                                              name="courseInteractionModel">
                                       <label class="textField-label">Course Model</label>
                                   </div>

                                   <div class="textField-label-content w-full" id="ReferenceBooksDivId">
                                       <label for="referenceBooksID"></label>
                                       <input class="textField" type="text" placeholder=" " id="referenceBooksID"
                                              name="ReferenceBooks">
                                       <label class="textField-label">ReferenceBooks</label>
                                   </div>

                                   <div class="textField-label-content w-full" id="recommendedTextbooksDivId">
                                       <label for="recommendedTextbooksID"></label>
                                       <input class="textField" type="text" placeholder=" " id="recommendedTextbooksID"
                                              name="RecommendedTextbooks">
                                       <label class="textField-label">RecommendedTextbooks</label>
                                   </div>

                                   <div class="textField-label-content w-full" id="courseDescriptionDivId">
                                       <label for="courseDescriptionID"></label>
                                       <textarea class="textarea-h textField" type="text" placeholder=" "
                                                 id="courseDescriptionID" name="assignmentDetail"
                                                 style="height: 9em"></textarea>
                                       <label class="textField-label">Course Description</label>
                                   </div>

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
                                        border-b-2 border-solid mb-10 shadow-md" style="background-color: #0284fc">
                                       <h2 class="text-center my-3 font-bold text-white">Course Instructor Details</h2>
                                       <div class="grid bg-white border-solid border-t-2 text-center">
                                           <div class="assessment-wrap mx-35">
                                               <h3>Name</h3>
                                               <div class="vertical-line"></div>
                                               <div class="textField-label-content w-full" id="nameWeightDivId">
                                                   <label for="quizDetailID"></label>
                                                   <textarea class="textarea-h textField" type="text" placeholder=" "
                                                             id="nameID"
                                                             name="nameDetail"></textarea>
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
                                                             id="designationID"
                                                             name="DesignationDetail"></textarea>
                                                   <label class="textField-label">Detail</label>
                                               </div>
                                           </div>
                                           <!--                                                          Qualification-->
                                           <div class="assessment-wrap mx-35">
                                               <h3>Qualification</h3>
                                               <div class="vertical-line"></div>
                                               <div class="textField-label-content w-full" id=" qualificationWeightDivId">
                                                   <label for=" QualificationDetailID"></label>
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
                                                   <label for=" SpecializationDetailID"></label>
                                                   <textarea class="textarea-h textField" type="text" placeholder=" "
                                                             id="specializationID"
                                                             name=" SpecializationDetail"></textarea>
                                                   <label class="textField-label">Detail</label>
                                               </div>
                                           </div>
                                           <div class="assessment-wrap mx-35">
                                               <h3>Contacts</h3>
                                               <div class="vertical-line"></div>
                                               <div class="textField-label-content w-full" id=" contactsWeightDivId">
                                                   <label for="ContactsDetailID"></label>
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
                                                   <label for="PersonalEmailDetailID"></label>
                                                   <textarea class="textarea-h textField" type="text" placeholder=" "
                                                             id="personalEmailID"
                                                             name="PersonalEmailDetail"></textarea>
                                                   <label class="textField-label">Detail</label>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="course-assessment-border shadow-md" style="background-color: #0284FC">
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
                                                          id="projectWeightID" class="textField px-12" style="padding-left:2.3em ">

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

                               </div>
                           </div>
                           <!--   assigned CLO with their respective PLO.   -->
                           <div class="mx-2 p-4 clo-container ">
                               <div class="clo-table-border rounded-md shadow-sm" style="background-color: #0284FC">
                                   <h2 class="table-head">Assigned CLO's With Mapping</h2>
                                   <div class="bg-white p-4  gap-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">

                                       <div class="w-full rounded-md shadow-sm">
                                           <img class="bg-catalystBlue-l6 bg-cover rounded-md w-full w-16 h-16 hover:bg-catalystBlue-l61" alt="" src="../../../Assets/Images/vectorFiles/CLO_white_svg.svg">
                                           <div class="px-4 py-0">
                                               <p class="font-semibold text-xl py-2">CLO-1</p>
                                               <p class="font-medium text-sm text-gray-700 text-justify">Understand the role of design and its major activities within the OO software
                                                   development process, with focus on the Unified process.</p>
                                               <div class="flex flex-col my-5 space-y-0">
                                                   <p class="font-semibold text-base">Undergraduate</p>
                                                   <p class="font-base text-gray-700 text-sm">BT-Level : <span class="font-semibold">1</span></p>
                                               </div>
                                           </div>
                                           <div class="px-4 border-t-4 border-b-4 border-catalystLight-f6_bg hover:border-catalystLight-89">
                                               <div class="flex flex-row my-5 items-center w-full text-center">
                                                   <a class="font-semibold text-base w-full">PLO - 1</a>
                                                   <a class="font-semibold text-base w-full">PLO - 3</a>
                                                   <a class="font-semibold text-base w-full">PLO - 4</a>


                                               </div>
                                           </div>
                                       </div>
                                       <div class="w-full rounded-md shadow-sm">
                                           <img class="bg-catalystBlue-l6 bg-cover rounded-md w-full w-16 h-16 hover:bg-catalystBlue-l61" alt="" src="../../../Assets/Images/vectorFiles/CLO_white_svg.svg">
                                           <div class="px-4 py-0">
                                               <p class="font-semibold text-xl py-2">CLO-2</p>
                                               <p class="font-medium text-sm text-gray-700 text-justify">Understand the role of design and its major activities within the OO software
                                                   development process, with focus on the Unified process.</p>
                                               <div class="flex flex-col my-5 space-y-0">
                                                   <p class="font-semibold text-base">Undergraduate</p>
                                                   <p class="font-base text-gray-700 text-sm">BT-Level : <span class="font-semibold">1</span></p>
                                               </div>
                                           </div>
                                           <div class="px-4 border-t-4 border-b-4 border-catalystLight-f6_bg hover:border-catalystLight-89">
                                               <div class="flex flex-row my-5 items-center w-full text-center">
                                                   <a class="font-semibold text-base w-full">PLO - 1</a>
                                                   <a class="font-semibold text-base w-full">PLO - 3</a>
                                                   <a class="font-semibold text-base w-full">PLO - 4</a>


                                               </div>
                                           </div>
                                       </div>
                                       <div class="w-full rounded-md shadow-sm">
                                           <img class="bg-catalystBlue-l6 bg-cover rounded-md w-full w-16 h-16 hover:bg-catalystBlue-l61" alt="" src="../../../Assets/Images/vectorFiles/clo_white_svg_2.svg">
                                           <div class="px-4 py-0">
                                               <p class="font-semibold text-xl py-2">CLO-3</p>
                                               <p class="font-medium text-sm text-gray-700 text-justify">Understand the role of design and its major activities within the OO software
                                                   development process, with focus on the Unified process.</p>
                                               <div class="flex flex-col my-5 space-y-0">
                                                   <p class="font-semibold text-base">Undergraduate</p>
                                                   <p class="font-base text-gray-700 text-sm">BT-Level : <span class="font-semibold">1</span></p>
                                               </div>
                                           </div>
                                           <div class="px-4 border-t-4 border-b-4 border-catalystLight-f6_bg hover:border-catalystLight-89">
                                               <div class="flex flex-row my-5 items-center w-full text-center">
                                                   <a class="font-semibold text-base w-full">PLO - 1</a>
                                                   <a class="font-semibold text-base w-full">PLO - 3</a>
                                                   <a class="font-semibold text-base w-full">PLO - 4</a>


                                               </div>
                                           </div>
                                       </div>
                                       <div class="w-full rounded-md shadow-sm">
                                           <img class="bg-catalystBlue-l6 bg-cover rounded-md w-full w-16 h-16 hover:bg-catalystBlue-l61" alt="" src="../../../Assets/Images/vectorFiles/CLO_white_svg.svg">
                                           <div class="px-4 py-0">
                                               <p class="font-semibold text-xl py-2">CLO-1</p>
                                               <p class="font-medium text-sm text-gray-700 text-justify">Understand the role of design and its major activities within the OO software
                                                   development process, with focus on the Unified process.</p>
                                               <div class="flex flex-col my-5 space-y-0">
                                                   <p class="font-semibold text-base">Undergraduate</p>
                                                   <p class="font-base text-gray-700 text-sm">BT-Level : <span class="font-semibold">1</span></p>
                                               </div>
                                           </div>
                                           <div class="px-4 border-t-4 border-b-4 border-catalystLight-f6_bg hover:border-catalystLight-89">
                                               <div class="flex flex-row my-5 items-center w-full text-center">
                                                   <a class="font-semibold text-base w-full">PLO - 1</a>
                                                   <a class="font-semibold text-base w-full">PLO - 3</a>
                                                   <a class="font-semibold text-base w-full">PLO - 4</a>


                                               </div>
                                           </div>
                                       </div>
                                       <div class="w-full rounded-md shadow-sm">
                                           <img class="bg-catalystBlue-l6 bg-cover rounded-md w-full w-16 h-16 hover:bg-catalystBlue-l61" alt="" src="../../../Assets/Images/vectorFiles/CLO_white_svg.svg">
                                           <div class="px-4 py-0">
                                               <p class="font-semibold text-xl py-2">CLO-1</p>
                                               <p class="font-medium text-sm text-gray-700 text-justify">Understand the role of design and its major activities within the OO software
                                                   development process, with focus on the Unified process.</p>
                                               <div class="flex flex-col my-5 space-y-0">
                                                   <p class="font-semibold text-base">Undergraduate</p>
                                                   <p class="font-base text-gray-700 text-sm">BT-Level : <span class="font-semibold">1</span></p>
                                               </div>
                                           </div>
                                           <div class="px-4 border-t-4 border-b-4 border-catalystLight-f6_bg hover:border-catalystLight-89">
                                               <div class="flex flex-row my-5 items-center w-full text-center">
                                                   <a class="font-semibold text-base w-full">PLO - 1</a>
                                                   <a class="font-semibold text-base w-full">PLO - 3</a>
                                                   <a class="font-semibold text-base w-full">PLO - 4</a>


                                               </div>
                                           </div>
                                       </div>
                                       <div class="w-full rounded-md shadow-sm">
                                           <img class="bg-catalystBlue-l6 bg-cover rounded-md w-full w-16 h-16 hover:bg-catalystBlue-l61" alt="" src="../../../Assets/Images/vectorFiles/CLO_white_svg.svg">
                                           <div class="px-4 py-0">
                                               <p class="font-semibold text-xl py-2">CLO-1</p>
                                               <p class="font-medium text-sm text-gray-700 text-justify">Understand the role of design and its major activities within the OO software
                                                   development process, with focus on the Unified process.</p>
                                               <div class="flex flex-col my-5 space-y-0">
                                                   <p class="font-semibold text-base">Undergraduate</p>
                                                   <p class="font-base text-gray-700 text-sm">BT-Level : <span class="font-semibold">1</span></p>
                                               </div>
                                           </div>
                                           <div class="px-4 border-t-4 border-b-4 border-catalystLight-f6_bg hover:border-catalystLight-89">
                                               <div class="flex flex-row my-5 items-center w-full text-center">
                                                   <a class="font-semibold text-base w-full">PLO - 1</a>
                                                   <a class="font-semibold text-base w-full">PLO - 3</a>
                                                   <a class="font-semibold text-base w-full">PLO - 4</a>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <!--   Update Button   -->
                           <div class="text-right mx-4">
                               <button type="button" class="loginButton" name="updatecpbtn" id="updateCourseProfilebtn">Update</button>
                           </div>
                       </section>
                </div>
            </main>

        </div>
</body>
</html>

<!-- <div class="container px-5 py-5">
                               <div class="flex content-between flex-wrap -m-4">

                                   <div class="bg-white m-4 w-1/3 sm:h-48 rounded-md shadow-lg flex flex-col sm:flex-row gap-2 select-none ">
                                       <img class="object-cover w-16 h-16" alt="" src="../../../Assets/Images/vectorFiles/CLO_svg.svg">

                                       <div class="flex flex-col flex-1 gap-2 sm:p-2">
                                           <h2 class="mt-2 text-xl font-semibold md:mt-0 md:text-xl">CLO-1</h2>
                                           <p class="mt-2 text-justify ">Understand the role of design and its major activities within the OO software
                                               development process, with focus on the Unified process</p>
                                           <div class="mt-auto flex gap-3">
                                               <div class="rounded-full">Undergraduate</div>
                                               <div class="ml-auto">BT-Level : 1</div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="bg-white m-4 w-1/3 sm:h-48 rounded-md shadow-lg flex flex-col sm:flex-row gap-2 select-none ">
                                       <img class="object-cover w-16 h-16" alt="" src="../../../Assets/Images/vectorFiles/CLO_svg.svg">

                                       <div class="flex flex-col flex-1 gap-2 sm:p-2">
                                           <h2 class="mt-2 text-xl font-semibold md:mt-0 md:text-xl">CLO-1</h2>
                                           <p class="mt-2 text-justify ">Understand the role of design and its major activities within the OO software
                                               development process, with focus on the Unified process</p>
                                           <div class="mt-auto flex gap-3">
                                               <div class="rounded-full">Undergraduate</div>
                                               <div class="ml-auto">BT-Level : 1</div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="bg-white m-4 w-1/3 sm:h-48 rounded-md shadow-lg flex flex-col sm:flex-row gap-2 select-none ">
                                       <img class="object-cover w-16 h-16" alt="" src="../../../Assets/Images/vectorFiles/CLO_svg.svg">

                                       <div class="flex flex-col flex-1 gap-2 sm:p-2">
                                           <h2 class="mt-2 text-xl font-semibold md:mt-0 md:text-xl">CLO-1</h2>
                                           <p class="mt-2 text-justify ">Understand the role of design and its major activities within the OO software
                                               development process, with focus on the Unified process</p>
                                           <div class="mt-auto flex gap-3">
                                               <div class="rounded-full">Undergraduate</div>
                                               <div class="ml-auto">BT-Level : 1</div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="bg-white m-4 w-1/4 sm:h-48 rounded-md shadow-lg flex flex-col sm:flex-row gap-2 select-none ">
                                       <img class="object-cover w-16 h-16" alt="" src="../../../Assets/Images/vectorFiles/CLO_svg.svg">

                                       <div class="flex flex-col flex-1 gap-2 sm:p-2">
                                           <h2 class="mt-2 text-xl font-semibold md:mt-0 md:text-xl">CLO-1</h2>
                                           <p class="mt-2 text-justify ">Understand the role of design and its major activities within the OO software
                                               development process, with focus on the Unified process</p>
                                           <div class="mt-auto flex gap-3">
                                               <div class="rounded-full">Undergraduate</div>
                                               <div class="ml-auto">BT-Level : 1</div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="bg-white m-4 w-1/4 sm:h-48 rounded-md shadow-lg flex flex-col sm:flex-row gap-2 select-none ">
                                       <img class="object-cover w-16 h-16" alt="" src="../../../Assets/Images/vectorFiles/CLO_svg.svg">

                                       <div class="flex flex-col flex-1 gap-2 sm:p-2">
                                           <h2 class="mt-2 text-xl font-semibold md:mt-0 md:text-xl">CLO-1</h2>
                                           <p class="mt-2 text-justify ">Understand the role of design and its major activities within the OO software
                                               development process, with focus on the Unified process</p>
                                           <div class="mt-auto flex gap-3">
                                               <div class="rounded-full">Undergraduate</div>
                                               <div class="ml-auto">BT-Level : 1</div>
                                           </div>
                                       </div>
                                   </div>

                               </div>
                           </div>-->