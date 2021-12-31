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
    <link href="CourseProfileAssets/courseProfileStyle.css" rel="stylesheet">

    <script src="CourseProfileAssets/courseScript.js" rel="script"></script>

</head>
<body class="min-h-full">
<div class="w-full">

    <!--    avoid this -->
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


                            <!--                            my right container-->
                            <div class="right-container flex-1  ml-40 pb-5 mr-5 ">
                                <div class="text-md rounded-t-lg border-gray-300 border-t-2 border-r-2 border-l-2
                                            border-b-2 border-solid mb-10" style="background-color: #0284fc">

                                    <h2 class="text-center my-3 font-bold text-white">Course Instructor Details</h2>
                                    <div class="grid grid-rows-5 bg-white -rounded-t-md  border-solid border-t-2">

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

                                <div class="align-left text-right">
                                    <button type="continue"
                                            class="continueButton  bg-blue-600 rounded-md mr-3.5 text-white"
                                            name="continue" id="countinueAction" ; style="width: 90px ; height: 30px">
                                        Continue
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <div>
                    <div class="flex-center pb-3 pt-5">
                        <div id="progressCircle-1" class="flex-grow-0 ">
                            <div class="w-10 h-10 bg-white border-2 border-grey-light mx-auto rounded-full text-lg text-white flex items-center">
                                <span class="text-gray-400 text-center w-full">1</span>
                            </div>
                        </div>
                        <div class="w-1/6 align-center items-center align-middle content-center flex">
                            <div class="w-full bg-gray-200 items-center align-middle align-center flex-1">
                                <div class="bg-gray-500 text-xs leading-none py-1 text-center text-grey-900"
                                     style="width: 0%"></div>
                            </div>
                        </div>

                        <div id="progressCircle-2" class="flex-grow-0 ">
                            <div class="w-10 h-10 bg-blue-700 mx-auto rounded-full text-lg text-white flex items-center">
                                <span class="text-white text-center w-full">2</span>
                            </div>
                        </div>
                        <div class="w-1/6 align-center items-center align-middle content-center flex">
                            <div class="w-full bg-gray-200 items-center align-middle align-center flex-1">
                                <div class="bg-blue-700 text-xs leading-none py-1 text-center"
                                     style="width: 100%"></div>
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