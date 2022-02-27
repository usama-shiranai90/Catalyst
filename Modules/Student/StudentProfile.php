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
            <!--            <h2 class="cprofile-container-centertxt"> Course-Name Course Profile</h2>-->

            <!-- sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2  font-medium
            bg-gray-100 inline-flex items-center leading-none border-indigo-500 text-indigo-500 tracking-wider rounded-t -->

            <!-- sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2  font-medium
            inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider -->

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

            <section class="cprofile-content-box-border cprofile-grid mx-0 my-0 border-0 rounded-none">

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

                    <!-- My Profile Section -->
                    <div class="flex flex-col w-full bg-white">

                        <div class="flex">
                            <div id="smpViewSectionId" class="w-3/6 flex pl-10 hidden">
                                <div class="flex flex-col justify-center">
                                    <label class="font-sans text-md text-gray-500 font-semibold m-2 text-left">Name</label>
                                    <label class="font-sans text-md text-gray-500 font-semibold m-2 text-left">Email</label>
                                    <label class="font-sans text-md text-gray-500 font-semibold m-2 text-left">Contact</label>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <label class="m-2 font-sans text-md text-gray-500 text-left" id="nameOfUser">Syed
                                        Usama</label>
                                    <label class="m-2 font-sans text-md text-gray-500" id="viewFinalExamTitleID">syedusama78@gmail.com</label>
                                    <label class="m-2 font-sans text-md text-gray-500" id="viewFinalExamTitleID">03101204294</label>

                                </div>
                            </div>


                            <div id="smpUpdateSectionId" class="w-3/6 flex pl-10">
                                <form method="post" class="w-full flex flex-col justify-center">
                                    <div class="mt-3 w-3/6 flex flex-col">
                                        <div class="textField-label-content w-full pb-3">
                                            <input class="textField" type="text" placeholder=" "
                                                   name="studentNameField" value="Sajid Majid">
                                            <label class="textField-label">Student Name</label>
                                        </div>
                                        <div class="textField-label-content w-full pb-3">
                                            <input class="textField" type="email" placeholder=" "
                                                   name="studentPersonalEmailField" value="syedusama78@gmail.com">
                                            <label class="textField-label">Personal Email</label>
                                            <label id="studentPersonalInvalidEmailFormat"
                                                   class="text-red-900 hidden ml-3">Invalid email format</label>
                                        </div>
                                        <div class="textField-label-content w-full pb-3">
                                            <input class="textField" type="email" placeholder=" "
                                                   name="studentContactField" value="maqeelIqbal@fui.edu.pk">
                                            <label class="textField-label">Contact</label>
                                            <label id="studentContactInvalidEmailFormat"
                                                   class="text-red-900 hidden ml-3">Invalid Contact format</label>
                                        </div>
                                        <div class="textField-label-content w-full pb-3">
                                            <textarea class="textarea-h textField" type="text" placeholder=" "
                                                      name="studentHomeAddressField"
                                                      value="Utilities for controlling how content is justified and aligned at the same time"
                                                      style="height: 9em">Utilities for controlling how content is justified and aligned at the same time</textarea>

                                            <label class="textField-label">Email</label>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="" class="w-3/6 flex pl-10 justify-end">

                                <div class="flex flex-col justify-center">
                                    <label class="font-sans text-md text-gray-500 font-semibold m-2 text-left">father
                                        name</label>
                                    <label class="font-sans text-md text-gray-500 font-semibold m-2 text-left">blood
                                        group</label>
                                    <label class="font-sans text-md text-gray-500 font-semibold m-2 text-left">date of
                                        birth</label>
                                    <label class="font-sans text-md text-gray-500 font-semibold m-2 text-left">official
                                        email</label>
                                </div>


                                <div class="flex flex-col justify-center">
                                    <label class="m-2 font-sans text-md text-gray-500 text-left" id="nameOfUser">Syed
                                        Mehboob Bukhari</label>
                                    <label class="m-2 font-sans text-md text-gray-500"
                                           id="viewFinalExamTitleID">A+</label>
                                    <label class="m-2 font-sans text-md text-gray-500" id="viewFinalExamTitleID">12/12/2022</label>
                                    <label class="m-2 font-sans text-md text-gray-500" id="viewFinalExamTitleID">syedusama78@gmail.com</label>

                                </div>

                            </div>

                            <!--                Editing Section                     -->
                            <div id="teacherProfileEditingSectionID" class="w-3/6 hidden">
                                <form method="post" class="w-full  flex flex-col pl-10">
                                    <div class="mt-3 w-3/6">
                                        <div class="textField-label-content w-full">
                                            <input class="textField" type="text" placeholder=" "
                                                   name="teacherNameToShowToStudents" value="Dr. M. Aqeel Iqbal">
                                            <label class="textField-label">Name</label>
                                        </div>
                                    </div>
                                    <div class="mt-3 w-3/6">
                                        <div class="textField-label-content w-full">
                                            <input class="textField" type="email" placeholder=" "
                                                   name="emailToShowToStudents" value="maqeelIqbal@fui.edu.pk">
                                            <label class="textField-label">Email</label>
                                        </div>
                                        <label id="teacherProfileInvalidEmailFormat"
                                               class="text-red-900 hidden ml-3">Invalid email
                                            format</label>
                                    </div>

                                    <div class="flex items-center">
                                        <label class="text-md text-gray-500 font-bold m-2">Show email to
                                            students</label>
                                        <div>
                                            <label class="switch">
                                                <input type="checkbox" name="showEmailToStudents" checked="">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>


                                </form>
                            </div>
                            <!--                Password Section-->
                            <div id="teacherProfilePasswordSection" class="w-3/6 hidden">
                                <form method="post" class="w-full flex flex-col items-center p-5">

                                    <div class="mt-3 w-3/6">
                                        <div class="textField-label-content w-full">
                                            <input class="textField" type="password" placeholder=" "
                                                   name="currentPassword">
                                            <label class="textField-label">Current Password</label>
                                        </div>
                                        <label id="wrongTeacherCurrPass" class="text-red-900 hidden">Current
                                            password is
                                            wrong</label>
                                    </div>

                                    <div class="mt-3 w-3/6">
                                        <div class="textField-label-content w-full">
                                            <input class="textField" type="password" placeholder=" "
                                                   name="newPassword">
                                            <label class="textField-label">New Password</label>
                                        </div>
                                    </div>

                                    <div class="mt-3 w-3/6">
                                        <div class="textField-label-content w-full">
                                            <input class="textField" type="password" placeholder=" "
                                                   name="confirmPassword">
                                            <label class="textField-label">Confirm Password</label>
                                        </div>
                                        <label id="teacherNewPassDontMatch" class="text-red-900 hidden">New
                                            passwords do not
                                            match</label>
                                    </div>

                                    <button type="submit"
                                            class="rounded-full text-white p-1 my-5 text-sm w-32 cursor-pointer bg-blue-500"
                                            id="updateTeacherPasswordID" name="updateTeacherPassword">
                                        Update Password
                                    </button>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>

    </main>

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
</html>
