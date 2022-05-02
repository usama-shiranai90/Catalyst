<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();

$studentRegCode = $_SESSION['studentRegistrationCode'];
$batchCode = $_SESSION['batchCode'];
$programCode = $_SESSION['programCode'];

$personalDetails = array();
$student = unserialize($_SESSION['studentInstance']);
$personalDetails = $student->getInstance();

//echo json_encode($personalDetails) . "<br><br>";

$securePass = password_hash($personalDetails['password'], PASSWORD_DEFAULT);

$curriculumPLO = new PLO();
$programLearningOutcomeList = $curriculumPLO->retrieveCurriculumPLOsList($programCode);
//echo json_encode($programLearningOutcomeList);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Student Profile</title>
    <script async rel="script" src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="../../Assets/Frameworks/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <link href="../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="../../Assets/Scripts/MasterNavigationPanel.js" rel="script"></script>
    <script src="../../Assets/Scripts/InterfaceUtil.js" rel="script"></script>

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
                <a id="curriculumSettingTabID" class="sm:px-6 sm:w-auto cursor-pointer inline-flex justify-center items-center py-3 w-1/2 rounded-t border-b-2 text-gray-400 font-semibold
                 tracking-normal leading-none student-profile-header-text my-0
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
                                    <!-- onkeyup="this.v alue=this.value.replace(/(\d{4})(\d{4})/, '$1-$2')"-->
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


                        <?php
                        foreach ($programLearningOutcomeList as $key => $plo) {
                            print sprintf('
                        <div class="flex flex-row w-full bg-white border-solid border-b-2">
                            <div class="text-md text-gray-500 text-left font-semibold border-0 w-48 border-r-2">
                                <span class="cprofile-cell-data">%s</span>
                            </div>
                            <div class="col-span-1 w-10/12 border-0 p-2">
                           <span class="w-full font-normal text-sm text-justify text-gray-900">%s</span>
                            </div>
                        </div>', $plo['ploName'], $plo['ploDescription']);
                        }
                        ?>

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

<script src="assets/js/studentProfile.js"></script>
</body>
</html>