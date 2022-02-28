<?php
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Student Profile</title>
    <link href="../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../Assets/Scripts/Master.js" rel="script"></script>
</head>
<body>
<div class="w-full min-h-full">
    <main class="main-content-alignment">
        <div class="cprofile-primary-border text-black rounded-t-md rounded-b-md mt-2 min-h-full bg-catalystLight-f5">
            <div class="flex mx-auto flex-wrap justify-center">
                <a id="myProfileSettingTabID"
                   class="sm:px-6 sm:w-auto sm:justify-start cursor-pointer inline-flex justify-center items-center py-3 w-1/2 rounded-t border-b-2 border-indigo-500 text-black tracking-wide leading-none student-profile-header-text my-0 ">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    My Profile
                </a>
                <a id="curriculumSettingTabID" class="sm:px-6 sm:w-auto cursor-pointer inline-flex justify-center items-center py-3 w-1/2 rounded-t border-b-2 text-gray-400 font-semibold tracking-normal leading-none student-profile-header-text my-0
                     transform transition ease-out duration-300 hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black ">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                    Curriculum
                </a>
                <a id="passwordSettingTabID"
                   class="sm:px-6 sm:w-auto cursor-pointer inline-flex justify-center items-center py-3 w-1/2 rounded-t border-b-2 text-gray-400 font-semibold tracking-normal leading-none student-profile-header-text my-0   transform transition ease-out duration-300 hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                        <circle cx="12" cy="5" r="3"></circle>
                        <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
                    </svg>
                    Password
                </a>
                <a id="loginHistorySettingTabID"
                   class="sm:px-6 sm:w-auto cursor-pointer inline-flex justify-center items-center py-3 w-1/2 rounded-t border-b-2 text-gray-400 font-semibold tracking-normal leading-none student-profile-header-text my-0   transform transition ease-out duration-300 hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    Login history
                </a>
            </div>

            <!-- MY PROFILE -->
            <section id="studentMyProfileSectionID"
                     class="hidden cprofile-content-box-border cprofile-grid mx-0 my-0 border-0 rounded-none">
                <div class="container px-5 mx-auto flex flex-wrap flex-col">
                    <!-- Image , student name , department/ reg number. -->
                    <div class="grid grid-cols-8 items-center place-content-center p-3 my-5 bg-catalystBlue-l2 rounded-md">
                        <div class="col-span-2">
                            <img class="rounded-full " src="../../Assets/Images/vectorFiles/Others/author-at-desk.svg"
                                 width="100" alt="User profile">
                        </div>
                        <div class="flex flex-col justify-center items-center pl-4 pt-1 text-white col-span-4 text-base font-medium">
                            <label class="my-2">Syed Usama Hussain Shah Bukhari</label>
                            <hr class="w-96 h-0.5  bg-white">
                            <label class="my-2">Fall-18 BCSE-040</label>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden sm:rounded-lg">
                        <div class=" border-2 border-gray-200" id="smpViewSectionId">
                            <!-- editable info -->
                            <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Student Name:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="smpStudentNameId-view">what</span>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Personal Email:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="smpStudentEmailId-view">what</span>
                            </div>
                            <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Contact:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="smpStudentContactId-view">what</span>
                            </div>

                            <!-- static personal info -->
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Father Name:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="otherReferenceID-view">what</span>
                            </div>
                            <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Blood Group:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="otherReferenceID-view">what</span>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Date Of Birth:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="otherReferenceID-view">what</span>
                            </div>
                            <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Official Email:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="otherReferenceID-view">what</span>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Home Address:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="otherReferenceID-view">what</span>
                            </div>
                        </div>
                        <div id="smpUpdateSectionId" class="hidden w-full flex pl-10">
                            <form method="post" class="w-full flex flex-col justify-center">
                                <div class="mt-3 w-3/6 flex flex-col">
                                    <div class="textField-label-content w-full pb-3">
                                        <input class="textField" type="text" placeholder=" " id="studentNameFieldID"
                                               name="studentNameField" value="">
                                        <label class="textField-label">Student Name</label>
                                    </div>
                                    <div class="textField-label-content w-full pb-3">
                                        <input class="textField" type="email" placeholder=" "
                                               name="studentPersonalEmailField" id="studentPersonalEmailFieldID"
                                               value="">
                                        <label class="textField-label">Personal Email</label>
                                    </div>
                                    <div class="textField-label-content w-full pb-3">
                                        <input class="textField" type="email" placeholder=" "
                                               name="studentContactField" id="studentContactFieldID"
                                               value="">
                                        <label class="textField-label">Contact</label>

                                    </div>

                                </div>
                            </form>
                            <div id="smpViewStaticDataSectionId" class="w-3/6 flex pl-10 justify-end">
                                <div class="flex flex-col justify-center">
                                    <label class="font-sans text-md text-gray-500 font-semibold m-2 text-left capitalize">father
                                        name</label>
                                    <label class="font-sans text-md text-gray-500 font-semibold m-2 text-left capitalize">blood
                                        group</label>
                                    <label class="font-sans text-md text-gray-500 font-semibold m-2 text-left capitalize">date
                                        of
                                        birth</label>
                                    <label class="font-sans text-md text-gray-500 font-semibold m-2 text-left capitalize">official
                                        email</label>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <label class="m-2 font-sans text-md text-gray-500 text-left" id="nameOfUser">Syed
                                        Mehboob Bukhari</label>
                                    <label class="m-2 font-sans text-md text-gray-500"
                                           id="viewFinalExamTitleID">A+</label>
                                    <label class="m-2 font-sans text-md text-gray-500" id="viewFinalExamTitleID">12/12/2022</label>
                                    <label class="m-2 font-sans text-md text-gray-500" id="viewFinalExamTitleID">syedusama78@gmail.com</label>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-right mx-0 my-2">
                            <button type="button"
                                    class="text-white rounded-md border-0 p font-medium bg-catalystBlue-l2 px-10 py-2"
                                    name="viewStudentProfileBtn" id="viewStudentProfileBtn">Update Profile
                            </button><!--style=" padding: 0.5% 4%"-->

                            <button type="button"
                                    class="hidden text-white rounded-md border-0 p font-medium bg-catalystBlue-l2 px-10 py-2"
                                    name="updateStudentProfileBtn" id="updateStudentProfileBtn">Continue
                            </button><!--style=" padding: 0.5% 4%"-->
                        </div>
                    </div>
                </div>
            </section>

            <!-- CURRICULUM -->
            <section id="studentCurriculumSectionID"
                     class="cprofile-content-box-border cprofile-grid mx-0 my-0 border-0 rounded-none">

            </section>

            <!-- PASSWORD -->
            <section id="studentPasswordSectionID">

            </section>

            <!-- LOGIN HISTORY -->
            <section id="studentloginHistorySectionID">

            </section>

        </div>
    </main>
</div>

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

<div class="hidden">
    <h1 class="text-xl font-medium  mb-4 text-gray-900">Master Cleanse Reliac
        Heirloom</h1>
    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon
        brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't
        heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac
        humblebrag.</p>
</div>

</body>
<script>
    // const studentProfileViewSectionViewSection = document.getElementById('registerCourseDivID'); // .
    // const studentProfileViewSectionUpdatableSection = document.getElementById('registerCourseDivID'); // .
    // const studentProfileStaticOtherDataSection = document.getElementById('smpViewStaticDataSectionId'); // .
    /*Script would load when the whole page it is associated to is loaded along with its contents*/

    let containsError = false;
    let isValidMail = true;
    let newStudentName = "";
    let newStudentPersonalEmail = "";
    let newStudentContact = "";

    window.onload = function () {

        const tabs = [document.getElementById('myProfileSettingTabID'), document.getElementById('curriculumSettingTabID'),
            document.getElementById('passwordSettingTabID'), document.getElementById('loginHistorySettingTabID')];

        const studentProfileViewSectionSection = document.getElementById('smpViewSectionId');
        const studentProfileInputSectionSection = document.getElementById('smpUpdateSectionId');

        let studentProfileViewLabelStudentName = document.getElementById('smpStudentNameId-view');
        let studentProfileViewLabelStudentEmail = document.getElementById('smpStudentEmailId-view');
        let studentProfileViewLabelStudentContact = document.getElementById('smpStudentContactId-view');

        const studentProfileStudentNameField = document.getElementById('studentNameFieldID');
        const studentProfileStudentEmailField = document.getElementById('studentPersonalEmailFieldID');
        const studentProfileStudentContactField = document.getElementById('studentContactFieldID');

        const fieldsArray = [studentProfileStudentNameField, studentProfileStudentEmailField, studentProfileStudentContactField];

        const viewStudentProfileButton = document.getElementById('viewStudentProfileBtn');
        const updateStudentProfileButton = document.getElementById('updateStudentProfileBtn');


        $(document).ready(function () {
            /** click to hide view section and show input section. */
            $(viewStudentProfileButton).on('click', function () {
                $(studentProfileViewSectionSection).addClass("hidden");
                $(viewStudentProfileButton).addClass("hidden");

                $(updateStudentProfileButton).removeClass("hidden");
                $(studentProfileInputSectionSection).removeClass("hidden");
            });

            $(fieldsArray).each(function () {
                $(this).on("input", function () {
                    $(this).closest('div').removeClass('textField-error-input')
                    $(this).closest("div.mt-3").find("label.text-red-900").addClass("hidden")
                    containsErrors = false
                });
            })

            $(updateStudentProfileButton).on('click', function () {
                $(fieldsArray).each(function () {
                    checkEmptyField(this)
                    if ($(this).attr("name") === 'studentPersonalEmailField')
                        isValidMail = validateEmail(this)
                });

                if (isValidMail && containsError)
                    showErrorBox("Empty Fields Alert!", "Please complete all fields to continue.")
                else {
                    newStudentName = $(studentProfileStudentNameField).val();
                    newStudentContact = $(studentProfileStudentContactField).val();
                    newStudentPersonalEmail = $(studentProfileStudentEmailField).val();
                    updateStudentProfileAjax(newStudentName, newStudentContact, newStudentPersonalEmail)
                }

            });


            $(tabs).each(function (index, node) {
                $(this).on('click', function (e) {
                    e.stopImmediatePropagation();
                    navigateStudentSettingTabs(index , tabs);
                })
            });

        });
    }

    function navigateStudentSettingTabs(i , tabs) {

        $(tabs).each(function (index, node) {
            if (index === i )
                $(this).removeClass().addClass('sm:px-6 sm:w-auto sm:justify-start cursor-pointer inline-flex justify-center items-center py-3 w-1/2 rounded-t border-b-2 border-indigo-500 text-black tracking-wide leading-none student-profile-header-text my-0 ')
            else
                $(this).removeClass().addClass("sm:px-6 sm:w-auto cursor-pointer inline-flex justify-center items-center py-3 w-1/2 rounded-t border-b-2 text-gray-400 font-semibold tracking-normal leading-none student-profile-header-text my-0 transform transition ease-out duration-300 hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black")
        });

    }

    function checkEmptyField(currentField) {
        if ($(currentField).val() === '') {
            $(currentField).closest('div').addClass('textField-error-input')
            containsError = true
        }
    }

    function validateEmail(currentField) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(currentField).val())) {
            containsError = false;
            return true
        } else {
            $(currentField).closest('div').addClass('textField-error-input');
            $(currentField).closest("div.mt-3").find("label").removeClass("hidden")
            containsError = true;
            showErrorBox("Invalid Email", "Please provide a valid address to continue")
            return false
        }
    }

    function showErrorBox(header = 'Empty Alert!', message) {
        $('#errorID span').text(header)
        $('#errorID').textNodes().first().replaceWith(message);
        $("#errorMessageDiv").toggle("hidden").animate(
            {right: 0,}, 3000, function () {
                $(this).delay(500).fadeOut();
            });
    }

    function updateStudentProfileAjax() {

    }

    $.fn.textNodes = function () {
        return this.contents().filter(function () {
            return (this.nodeType === Node.TEXT_NODE && this.nodeValue.trim() !== "");
        });
    }
</script>
</html>
