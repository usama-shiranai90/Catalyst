<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();

$studentRegCode = $_SESSION['studentRegistrationCode'];
$batchCode = $_SESSION['batchCode'];
$programCode = $_SESSION['programCode'];

$personalDetails = array();
$student = unserialize($_SESSION['studentInstance']);
$personalDetails = $student->getPersonalDetails();

//echo json_encode($personalDetails) . "<br><br>";
$personalDetails = str_replace('\\', '', $personalDetails);
echo json_encode($personalDetails) . "<br><br>";

$securePass = password_hash($personalDetails['password'], PASSWORD_DEFAULT);

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
    <!--    <script src="../../Assets/Scripts/Master.js" rel="script"></script>-->
    <!--    <script src="../Teacher/CourseProfile/CourseProfileAssets/js/additionalWork.js"></script>-->
</head>
<body>
<div class="w-full min-h-full">
    <main class="main-content-alignment">
        <div class="cprofile-primary-border text-black rounded-t-md rounded-b-md mt-2 bg-catalystLight-f5 deleted-min-full-height">
            <div class="flex mx-auto flex-wrap justify-center">
                <a id="myProfileSettingTabID"
                   class="sm:px-6 sm:w-auto sm:justify-start cursor-pointer inline-flex justify-center
                   items-center py-3 w-1/2 rounded-t border-b-2 border-indigo-500 text-black
                   tracking-wide leading-none student-profile-header-text my-0 ">
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
                     class="cprofile-content-box-border cprofile-grid mx-0 my-0 border-0 rounded-none">
                <div class="container px-5 mx-auto flex flex-col">
                    <!-- Image , student name , department/ reg number. -->
                    <div class="grid grid-cols-8 items-center place-content-center p-3 my-5 bg-catalystBlue-l2 rounded-md">
                        <div class="col-span-2">
                            <img class="rounded-full " src="../../Assets/Images/vectorFiles/Others/author-at-desk.svg"
                                 width="100" alt="User profile">
                        </div>
                        <div class="flex flex-col justify-center items-center pl-4 pt-1 text-white col-span-4 text-base font-medium">
                            <label class="my-2"><?php echo $personalDetails['name'] ?></label>
                            <hr class="w-96 h-0.5  bg-white">
                            <label class="my-2"><?php echo $personalDetails['studentRegCode'] ?></label>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden sm:rounded-lg">
                        <div class=" border-2 border-gray-200" id="smpViewSectionId">
                            <!-- editable info -->
                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Student Name:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="smpStudentNameId-view"><?php echo $personalDetails['name'] ?></span>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Personal Email:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="smpStudentEmailId-view"><?php echo $personalDetails['personalEmail'] ?></span>
                            </div>
                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Contact:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="smpStudentContactId-view"><?php echo $personalDetails['contactNumber'] ?></span>
                            </div>

                            <!-- static personal info -->
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Father Name:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="otherReferenceID-view"><?php echo $personalDetails['fatherName'] ?></span>
                            </div>
                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Blood Group:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="otherReferenceID-view"><?php echo $personalDetails['bloodGroup'] ?></span>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Date Of Birth:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="otherReferenceID-view"><?php echo $personalDetails['dateOfBirth'] ?></span>
                            </div>
                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid border-b-2">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Official Email:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="otherReferenceID-view"><?php echo $personalDetails['officialEmail'] ?></span>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-solid">
                                <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Home Address:</h4>
                                <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                      id="otherReferenceID-view"><?php echo $personalDetails['address'] ?></span>
                            </div>
                        </div>
                        <div id="smpUpdateSectionId" class="hidden w-full flex pl-10">
                            <form method="post" class="w-full flex flex-col justify-center">
                                <div class="mt-3 w-3/6 flex flex-col">
                                    <div class="textField-label-content w-full">
                                        <input class="textField" type="text" placeholder=" " id="studentNameFieldID"
                                               name="studentNameField" value="<?php echo $personalDetails['name'] ?>">
                                        <label class="textField-label">Student Name</label>
                                    </div>
                                    <div class="textField-label-content w-full">
                                        <input class="textField" type="email" placeholder=" "
                                               name="studentPersonalEmailField" id="studentPersonalEmailFieldID"
                                               value="<?php echo $personalDetails['personalEmail'] ?>">
                                        <label class="textField-label">Personal Email</label>
                                    </div>
                                    <!-- onkeyup="this.value=this.value.replace(/(\d{4})(\d{4})/, '$1-$2')"-->
                                    <div class="textField-label-content w-full">
                                        <input class="textField" type="email" placeholder=" "
                                               name="studentContactField" id="studentContactFieldID"
                                               oninput="isNumeric(this);
                                                this.value=this.value.replace(/(\d{4})(\d{0})/, '$1-$2')"
                                               value="<?php echo $personalDetails['contactNumber'] ?>">
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
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CURRICULUM -->
            <section id="studentCurriculumSectionID"
                     class="hidden cprofile-content-box-border cprofile-grid mx-0 my-0 border-0 rounded-none">

                <h2 class="px-5 font-semibold text-base"> Following are the Program Curriculum Outcome which you are
                    following.</h2>
                <div class="container px-5 mx-auto flex flex-col sm:rounded-sm">
                    <div class=" border-2 border-gray-200 rounded">
                        <div class="learning-outcome-head row-flex w-full mx-0 ">
                            <div class="cprofile-column h-10 w-24 border-0 border-r-2">
                                <span class="cprofile-cell-data">PLO #</span>
                            </div>
                            <div class="cprofile-column h-10 w-3/4 border-0">
                                <span class="cprofile-cell-data">Description</span>
                            </div>
                        </div>

                        <div class="flex flex-row w-full bg-white border-solid">
                            <div class="text-md text-gray-500 text-left font-semibold border-0 w-48 border-r-2">
                                <span class="cprofile-cell-data">PLO-1</span>
                            </div>
                            <div class="col-span-1 w-10/12 border-0 p-2">
                           <span class="w-full font-normal text-sm text-justify text-gray-900"
                                 id="smpStudentEmailId-view">This forces the writer to use creativity to complete one of three common writing challenges. The writer can use the paragraph as the first one of a short story
                           This forces the writer to use creativity to complete one of three common writing challenges. The writer can use the paragraph as the first one of a short story
                           </span>
                            </div>
                        </div>


                        <!--<div class="bg-white px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6 border-solid">
                            <h4 class="text-md text-gray-500 text-left font-semibold w-1/3">Home Address:</h4>
                            <span class=" w-full mt-1 font-normal text-sm text-justify text-gray-900"
                                  id="otherReferenceID-view">what</span>
                        </div>-->
                    </div>
            </section>

            <!-- PASSWORD -->
            <section id="studentPasswordSectionID"
                     class="hidden cprofile-content-box-border cprofile-grid mx-0 my-0 border-0 rounded-none">
                <div class="container px-5 mx-auto flex flex-col">
                    <div class="bg-white overflow-hidden sm:rounded-lg">
                        <div class=" w-full pl-10">
                            <h2 class="px-3 font-semibold text-base"> Following are the Program Curriculum Outcome which
                                you are following.</h2>
                            <form method="post" class="w-full flex flex-col justify-center">
                                <div class="mt-3 flex flex-col w-4/12">
                                    <div class="textField-label-content w-full">
                                        <input class="textField" type="password" placeholder=" "
                                               id="studentOldPasswordFieldID"
                                               name="studentOldPasswordField" value=""
                                               data-ref="<?php echo $securePass ?>">
                                        <label class="textField-label">Old Password</label>
                                    </div>
                                    <div class="textField-label-content w-full">
                                        <input class="textField" type="password" placeholder=" "
                                               name="studentNewPasswordField" id="studentNewPasswordFieldID"
                                               value="">
                                        <label class="textField-label">New Password</label>
                                    </div>
                                    <div class="textField-label-content w-full">
                                        <label for="studentConfirmPasswordFieldID"></label>
                                        <input class="textField" type="password" placeholder=" "
                                               name="studentConfirmPasswordField" id="studentConfirmPasswordFieldID"
                                               value="">
                                        <label class="textField-label">Confirm Password</label>

                                    </div>

                                </div>
                            </form>

                        </div>
                        <div class="text-right mx-0 my-2">
                            <button type="button"
                                    class="text-white rounded-md border-0 p font-medium bg-catalystBlue-l2 px-10 py-2"
                                    name="updateStudentPasswordProfileBtn" id="updateStudentPasswordProfileBtn">Update
                                Password
                            </button><!--style=" padding: 0.5% 4%"-->
                        </div>
                    </div>
                </div>

            </section>

            <!-- LOGIN HISTORY -->
            <section id="studentloginHistorySectionID">

            </section>

        </div>
    </main>
</div>

<div id="errorMessageDiv"
     class="hidden fixed bottom-0 right-0 z-50 flex p-4 mb-4 text-md w-auto font-sm text-red-700 bg-red-100 rounded-lg">
    <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
         xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0
                     001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
    </svg>
    <div id="errorID" class="w-11/12">
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

<script>
    // const studentProfileViewSectionViewSection = document.getElementById('registerCourseDivID'); // .
    // const studentProfileViewSectionUpdatableSection = document.getElementById('registerCourseDivID'); // .
    // const studentProfileStaticOtherDataSection = document.getElementById('smpViewStaticDataSectionId'); // .

    // let studentProfileViewLabelStudentName = document.getElementById('smpStudentNameId-view');
    // let studentProfileViewLabelStudentEmail = document.getElementById('smpStudentEmailId-view');
    // let studentProfileViewLabelStudentContact = document.getElementById('smpStudentContactId-view');
    /*Script would load when the whole page it is associated to is loaded along with its contents*/

    let containsError = false;
    let isValidMail = true;
    let newStudentName = "";
    let newStudentPersonalEmail = "";
    let newStudentContact = "";

    let ops = '';
    let oldPass = '';
    let newPass = '';
    let confirmPass = '';

    window.onload = function () {

        const tabsArray = [document.getElementById('myProfileSettingTabID'), document.getElementById('curriculumSettingTabID'),
            document.getElementById('passwordSettingTabID'), document.getElementById('loginHistorySettingTabID')];

        const sectionsArray = [document.getElementById('studentMyProfileSectionID'), document.getElementById('studentCurriculumSectionID'),
            document.getElementById('studentPasswordSectionID'), document.getElementById('studentloginHistorySectionID')]

        /** My Profile */
        const studentProfileViewSectionSection = document.getElementById('smpViewSectionId');
        const studentProfileInputSectionSection = document.getElementById('smpUpdateSectionId');

        const studentProfileStudentNameField = document.getElementById('studentNameFieldID');
        const studentProfileStudentEmailField = document.getElementById('studentPersonalEmailFieldID');
        const studentProfileStudentContactField = document.getElementById('studentContactFieldID');

        const myprofileArray = [studentProfileStudentNameField, studentProfileStudentEmailField, studentProfileStudentContactField];

        const viewStudentProfileButton = document.getElementById('viewStudentProfileBtn');
        const updateStudentProfileButton = document.getElementById('updateStudentProfileBtn');

        /** Password */

        let oldPasswordField = document.getElementById('studentOldPasswordFieldID');
        let newPasswordField = document.getElementById('studentNewPasswordFieldID');
        let confirmNewPasswordField = document.getElementById('studentConfirmPasswordFieldID');
        const passwordArray = [oldPasswordField, newPasswordField, confirmNewPasswordField];
        ops = $(oldPasswordField).attr("data-ref");

        let studentPassBtn = document.getElementById('updateStudentPasswordProfileBtn');
        $(document).ready(function () {
            /** click to hide view section and show input section. */
            $(viewStudentProfileButton).on('click', function () {
                $(studentProfileViewSectionSection).addClass("hidden");
                $(viewStudentProfileButton).addClass("hidden");

                $(updateStudentProfileButton).removeClass("hidden");
                $(studentProfileInputSectionSection).removeClass("hidden");
            });

            $(myprofileArray).add(passwordArray).each(function () {
                $(this).on("input", function () {
                    $(this).closest('div').removeClass('textField-error-input')
                    $(this).closest("div.mt-3").find("label.text-red-900").addClass("hidden")
                    containsErrors = false
                });
            })

            $(updateStudentProfileButton).on('click', function () {
                $(myprofileArray).each(function () {
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

            $(studentPassBtn).on('click', function (e) {
                e.stopPropagation();
                $(passwordArray).each(function () {
                    checkEmptyField(this)
                });

                if (($(newPasswordField).val() !== $(confirmNewPasswordField).val()) && containsError) {
                    $(newPasswordField).closest('div').addClass('textField-error-input')
                    $(confirmNewPasswordField).closest('div').addClass('textField-error-input')
                    showErrorBox("Password mismatch", "please check your new password.")

                } else if (!checkEmptyField($(newPasswordField)) && $(newPasswordField).val().length <= 8) {
                    $(newPasswordField).closest('div').addClass('textField-error-input')
                    showErrorBox("Invalid Password Length", "Password should be greater than 8 characters.")
                } else if ($(oldPasswordField).val() === '' && $(newPasswordField).val() === '' && $(confirmNewPasswordField).val() === '') {
                    showErrorBox("Empty Field ", 'please complete all fields to continue.')
                } else {
                    console.log("working fine now.")
                    oldPass = $(oldPasswordField).val();
                    newPass = $(newPasswordField).val();
                    confirmPass = $(confirmNewPasswordField).val();
                    updateStudentPasswordAjax(oldPass, newPass)
                }

            })

            $(tabsArray).each(function (index, node) {
                $(this).on('click', function (e) {
                    e.stopImmediatePropagation();
                    navigateStudentSettingTabs(index, tabsArray, sectionsArray);
                })
            });

        });

        $(document).ajaxSend(function () {
            $("#loader").fadeIn(1000);
        });

    }

    function navigateStudentSettingTabs(i, tabs, sectionsArray) {

        $(tabs).each(function (index, node) {
            if (index === i) {
                $(this).removeClass().addClass('sm:px-6 sm:w-auto sm:justify-start cursor-pointer inline-flex justify-center items-center py-3 w-1/2 rounded-t border-b-2 border-indigo-500 text-black tracking-wide leading-none student-profile-header-text my-0 ')
                tabsSectionVisibility(sectionsArray[index], true)
            } else {
                $(this).removeClass().addClass("sm:px-6 sm:w-auto cursor-pointer inline-flex justify-center items-center py-3 w-1/2 rounded-t border-b-2 text-gray-400 font-semibold tracking-normal leading-none student-profile-header-text my-0 transform transition ease-out duration-300 hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black")
                tabsSectionVisibility(sectionsArray[index], false)
            }

        });
    }

    function checkEmptyField(currentField) {
        if ($(currentField).val() === '') {
            $(currentField).closest('div').addClass('textField-error-input')
            containsError = true
            return true;
        }
        return false;
    }

    function tabsSectionVisibility(currentSection, visibility) {
        if (visibility)
            $(currentSection).removeClass("hidden") //transform transition ease-out duration-500 scale-100 -translate-y-0 translate-x-0 text-black font-normal border-black
        else
            $(currentSection).addClass("hidden");
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
                $(this).delay(1000).fadeOut();
            });
    }

    function updateStudentProfileAjax(newStudentName, newStudentContact, newStudentPersonalEmail) {

        console.log(newStudentName, newStudentContact, newStudentPersonalEmail)

        $.ajax({
            type: "POST",
            url: 'Operation/assets/studentProfileAjax.php',
            timeout: 500,
            cache: false,
            data: {
                stuName: newStudentName,
                stuContact: newStudentContact,
                stuEmail: newStudentPersonalEmail,
                update_student_p: true
            },
            beforeSend: function () {
                $("main").toggleClass("blur-filter");
                $('#loader').toggleClass('hidden')
            },
            error: function (xhr, desc, err) {
                console.log("not working fine" + xhr + "\n" + desc + "\n" + err)
            },
            success: function (data, status) {
                const result = JSON.parse(data)
                console.log(result)

                if (result.status === 1 && result.errors === 'none') {
                    alert("updated successfully.");
                    $('#smpStudentNameId-view').html(newStudentName);
                    $('#smpStudentEmailId-view').html(newStudentPersonalEmail);
                    $('#smpStudentContactId-view').html(newStudentContact);

                    // navigateStudentSettingTabs(0, tabsArray, sectionsArray);
                    $(studentProfileViewSectionSection).removeClass("hidden");
                    $(viewStudentProfileButton).removeClass("hidden");
                    $(updateStudentProfileButton).addClass("hidden");
                    $(studentProfileInputSectionSection).addClass("hidden");


                } else if (result.status === 0 && result.errors === "wrong-password") {
                    $("#studentNameFieldID , #studentPersonalEmailFieldID , #studentContactFieldID").closest('div').addClass('textField-error-input');
                    showErrorBox("Server Problem", "Something went wrong.")
                }
            },
            complete: function () {
                // setInterval(function () {
                //     $("main").toggleClass("blur-filter");
                //     $('#loader').toggleClass('hidden');
                //     location.href = "StudentProfile.php";
                // }, 2000);
            },
        });
    }

    function updateStudentPasswordAjax(oldPass, newPass) {
        $.ajax({
            type: "POST",
            url: 'Operation/assets/studentProfileAjax.php',
            timeout: 500,
            cache: false,
            data: {
                ops: ops,
                oldpass: oldPass,
                newpass: newPass,
                update_p: true
            },
            beforeSend: function () {
                $("main").toggleClass("blur-filter");
                $('#loader').toggleClass('hidden')
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (data, status) {
                const result = JSON.parse(data)
                console.log(result)

                if (result.status === 1 && result.errors === 'none') {
                    alert("Please Logout for change password to work.")
                } else if (result.status === 0 && result.errors === "wrong-password") {
                    $("#studentOldPasswordFieldID").closest('div').addClass('textField-error-input');
                    showErrorBox("Incorrect password", "please check your old password and make sure its correct.")
                    console.log("hello ?")
                }
            },
            complete: function (data) {
                console.log(data['responseText'])

                // setInterval(function () {
                //     $("main").toggleClass("blur-filter");
                //     $('#loader').toggleClass('hidden');
                //     location.href = "StudentProfile.php";
                // }, 2000);
            },
        });
    }

    $.fn.textNodes = function () {
        return this.contents().filter(function () {
            return (this.nodeType === Node.TEXT_NODE && this.nodeValue.trim() !== "");
        });
    }
</script>
</body>
</html>
