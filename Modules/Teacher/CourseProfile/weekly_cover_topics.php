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
    <script src="CourseProfileAssets/weeklyTopicsScript.js" rel="script"></script>


    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

</head>
<body style="background-color: #F9F8FE">
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
                <div class="weeklytopics-primary-border text-black rounded-t-md rounded-b-md mt-2 h-full bg-catalystLight-f5">
                    <h2 class="weekly-topic-container-centertxt">Covered Topics</h2>

                    <!--    Weekly Topics Section     -->
                    <section id="weeklyTopicsID" class="cprofile-content-box-border cprofile-grid mx-0 my-0 ">

                        <div class="mx-2 weekly-container">  <!-- remove p-4 for less inner size -->
                            <div class="clo-table-border rounded-md shadow-sm bg-catalystBlue-l8">
                                  <h2 class="table-head font-semibold">Weekly Covered Topics</h2>
                                <div id="courseLearningDivID" class="flex flex-wrap p-0">           <!--flex flex-wrap p-0-->
                                    <div id="courseLearningHeaderID" class="learning-outcome-head text-md row-flex w-full mx-0">
                                        <div class="cprofile-column h-10 w-20">
                                            <span class="cprofile-cell-data">Week</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/2">
                                            <span class="cprofile-cell-data">Detail of topics covered</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-14">
                                            <span class="cprofile-cell-data">CLO</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">Assessment</span>
                                        </div>
                                        <div class="cprofile-column h-10 w-14">
                                            <span class="cprofile-cell-data">Status</span>
                                        </div>
                                    </div>
                                    <div id="CourseLearningRow-1"
                                         class="flex w-full learning-outcome-row h-16">
                                        <div class="cprofile-column h-16 w-20 bg-catalystBlue-l61 text-white" id="nameCLO-1">
                                            <span class="cprofile-cell-data ">01</span>
                                        </div>
                                        <div class="cprofile-column h-16 w-1/2">
                                           <!--<label for="clo-1-description">
                                                <input type="text" class="cell-input min-w-full" value=""
                                                       placeholder="Per week description" id="descriptionWeek-1" />
                                            </label>-->
                                                   <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm"
                                                             value="" placeholder="Per week description" id="detail-1"></textarea>

                                        </div>
                                        <div class="cprofile-column h-16 w-14">
<!--                                            <label for="clo-1-description"><input type="text" class="cell-input w-full font-medium text-sm" value="" placeholder="CLO" id="descriptionWeek-1" /></label>-->
                                            <select class="cell-input w-full font-medium text-sm" name="creditHour"
                                                    onclick="this.setAttribute('value', this.value);"
                                                    onchange="this.setAttribute('value', this.value);" value=""
                                                    id="creditHourID">
                                                <option value="" hidden></option>
                                                <option value="one">1</option>
                                                <option value="two">2</option>
                                                <option value="three">3</option>
                                            </select>
                                            <!--  https://stackoverflow.com/questions/30190588/html-select-multiple-as-dropdown-->
                                        </div>

                                        <div class="cprofile-column h-16 w-1/6">
                                            <label for="clo-1-description">
                                                <input type="text" class="cell-input w-full font-medium text-sm" value=""
                                                       placeholder="" id="descriptionWeek-1" />
                                            </label>
                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <label for="clo-1-bt-level">
                                                <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" >
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" >
                                                </div>
                                            </label>

                                        </div>
                                    </div>
                                    <div id="CourseLearningRow-1"
                                         class="flex w-full learning-outcome-row h-16">
                                        <div class="cprofile-column h-16 w-20 bg-catalystBlue-l61 text-white" id="nameCLO-1">
                                            <span class="cprofile-cell-data ">01</span>
                                        </div>
                                        <div class="cprofile-column h-16 w-1/2">
                                            <!--<label for="clo-1-description">
                                                 <input type="text" class="cell-input min-w-full" value=""
                                                        placeholder="Per week description" id="descriptionWeek-1" />
                                             </label>-->
                                            <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm"
                                                      value="" placeholder="Per week description" id="detail-1"></textarea>

                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <!--                                            <label for="clo-1-description"><input type="text" class="cell-input w-full font-medium text-sm" value="" placeholder="CLO" id="descriptionWeek-1" /></label>-->
                                            <select class="cell-input w-full font-medium text-sm" name="creditHour"
                                                    onclick="this.setAttribute('value', this.value);"
                                                    onchange="this.setAttribute('value', this.value);" value=""
                                                    id="creditHourID">
                                                <option value="" hidden></option>
                                                <option value="one">1</option>
                                                <option value="two">2</option>
                                                <option value="three">3</option>
                                            </select>
                                        </div>

                                        <div class="cprofile-column h-16 w-1/6">
                                            <label for="clo-1-description">
                                                <input type="text" class="cell-input w-full font-medium text-sm" value=""
                                                       placeholder="" id="descriptionWeek-1" />
                                            </label>
                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <label for="clo-1-bt-level">
                                                <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" >
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" >
                                                </div>
                                            </label>

                                        </div>
                                    </div>
                                    <div id="CourseLearningRow-1"
                                         class="flex w-full learning-outcome-row h-16">
                                        <div class="cprofile-column h-16 w-20 bg-catalystBlue-l61 text-white" id="nameCLO-1">
                                            <span class="cprofile-cell-data ">01</span>
                                        </div>
                                        <div class="cprofile-column h-16 w-1/2">
                                            <!--<label for="clo-1-description">
                                                 <input type="text" class="cell-input min-w-full" value=""
                                                        placeholder="Per week description" id="descriptionWeek-1" />
                                             </label>-->
                                            <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm"
                                                      value="" placeholder="Per week description" id="detail-1"></textarea>

                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <!--                                            <label for="clo-1-description"><input type="text" class="cell-input w-full font-medium text-sm" value="" placeholder="CLO" id="descriptionWeek-1" /></label>-->
                                            <select class="cell-input w-full font-medium text-sm" name="creditHour"
                                                    onclick="this.setAttribute('value', this.value);"
                                                    onchange="this.setAttribute('value', this.value);" value=""
                                                    id="creditHourID">
                                                <option value="" hidden></option>
                                                <option value="one">1</option>
                                                <option value="two">2</option>
                                                <option value="three">3</option>
                                            </select>
                                        </div>

                                        <div class="cprofile-column h-16 w-1/6">
                                            <label for="clo-1-description">
                                                <input type="text" class="cell-input w-full font-medium text-sm" value=""
                                                       placeholder="" id="descriptionWeek-1" />
                                            </label>
                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <label for="clo-1-bt-level">
                                                <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" >
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" >
                                                </div>
                                            </label>

                                        </div>
                                    </div>
                                    <div id="CourseLearningRow-1"
                                         class="flex w-full learning-outcome-row h-16">
                                        <div class="cprofile-column h-16 w-20 bg-catalystBlue-l61 text-white" id="nameCLO-1">
                                            <span class="cprofile-cell-data ">01</span>
                                        </div>
                                        <div class="cprofile-column h-16 w-1/2">
                                            <!--<label for="clo-1-description">
                                                 <input type="text" class="cell-input min-w-full" value=""
                                                        placeholder="Per week description" id="descriptionWeek-1" />
                                             </label>-->
                                            <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm"
                                                      value="" placeholder="Per week description" id="detail-1"></textarea>

                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <!--                                            <label for="clo-1-description"><input type="text" class="cell-input w-full font-medium text-sm" value="" placeholder="CLO" id="descriptionWeek-1" /></label>-->
                                            <select class="cell-input w-full font-medium text-sm" name="creditHour"
                                                    onclick="this.setAttribute('value', this.value);"
                                                    onchange="this.setAttribute('value', this.value);" value=""
                                                    id="creditHourID">
                                                <option value="" hidden></option>
                                                <option value="one">1</option>
                                                <option value="two">2</option>
                                                <option value="three">3</option>
                                            </select>
                                        </div>

                                        <div class="cprofile-column h-16 w-1/6">
                                            <label for="clo-1-description">
                                                <input type="text" class="cell-input w-full font-medium text-sm" value=""
                                                       placeholder="" id="descriptionWeek-1" />
                                            </label>
                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <label for="clo-1-bt-level">
                                                <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" >
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" >
                                                </div>
                                            </label>

                                        </div>
                                    </div>
                                    <div id="CourseLearningRow-1"
                                         class="flex w-full learning-outcome-row h-16">
                                        <div class="cprofile-column h-16 w-20 bg-catalystBlue-l61 text-white" id="nameCLO-1">
                                            <span class="cprofile-cell-data ">01</span>
                                        </div>
                                        <div class="cprofile-column h-16 w-1/2">
                                            <!--<label for="clo-1-description">
                                                 <input type="text" class="cell-input min-w-full" value=""
                                                        placeholder="Per week description" id="descriptionWeek-1" />
                                             </label>-->
                                            <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm"
                                                      value="" placeholder="Per week description" id="detail-1"></textarea>

                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <!--                                            <label for="clo-1-description"><input type="text" class="cell-input w-full font-medium text-sm" value="" placeholder="CLO" id="descriptionWeek-1" /></label>-->
                                            <select class="cell-input w-full font-medium text-sm" name="creditHour"
                                                    onclick="this.setAttribute('value', this.value);"
                                                    onchange="this.setAttribute('value', this.value);" value=""
                                                    id="creditHourID">
                                                <option value="" hidden></option>
                                                <option value="one">1</option>
                                                <option value="two">2</option>
                                                <option value="three">3</option>
                                            </select>
                                        </div>

                                        <div class="cprofile-column h-16 w-1/6">
                                            <label for="clo-1-description">
                                                <input type="text" class="cell-input w-full font-medium text-sm" value=""
                                                       placeholder="" id="descriptionWeek-1" />
                                            </label>
                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <label for="clo-1-bt-level">
                                                <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" >
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" >
                                                </div>
                                            </label>

                                        </div>
                                    </div>
                                    <div id="CourseLearningRow-1"
                                         class="flex w-full learning-outcome-row h-16">
                                        <div class="cprofile-column h-16 w-20 bg-catalystBlue-l61 text-white" id="nameCLO-1">
                                            <span class="cprofile-cell-data ">01</span>
                                        </div>
                                        <div class="cprofile-column h-16 w-1/2">
                                            <!--<label for="clo-1-description">
                                                 <input type="text" class="cell-input min-w-full" value=""
                                                        placeholder="Per week description" id="descriptionWeek-1" />
                                             </label>-->
                                            <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm"
                                                      value="" placeholder="Per week description" id="detail-1"></textarea>

                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <!--                                            <label for="clo-1-description"><input type="text" class="cell-input w-full font-medium text-sm" value="" placeholder="CLO" id="descriptionWeek-1" /></label>-->
                                            <select class="cell-input w-full font-medium text-sm" name="creditHour"
                                                    onclick="this.setAttribute('value', this.value);"
                                                    onchange="this.setAttribute('value', this.value);" value=""
                                                    id="creditHourID">
                                                <option value="" hidden></option>
                                                <option value="one">1</option>
                                                <option value="two">2</option>
                                                <option value="three">3</option>
                                            </select>
                                        </div>

                                        <div class="cprofile-column h-16 w-1/6">
                                            <label for="clo-1-description">
                                                <input type="text" class="cell-input w-full font-medium text-sm" value=""
                                                       placeholder="" id="descriptionWeek-1" />
                                            </label>
                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <label for="clo-1-bt-level">
                                                <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" >
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" >
                                                </div>
                                            </label>

                                        </div>
                                    </div>
                                    <div id="CourseLearningRow-1"
                                         class="flex w-full learning-outcome-row h-16">
                                        <div class="cprofile-column h-16 w-20 bg-catalystBlue-l61 text-white" id="nameCLO-1">
                                            <span class="cprofile-cell-data ">01</span>
                                        </div>
                                        <div class="cprofile-column h-16 w-1/2">
                                            <!--<label for="clo-1-description">
                                                 <input type="text" class="cell-input min-w-full" value=""
                                                        placeholder="Per week description" id="descriptionWeek-1" />
                                             </label>-->
                                            <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm"
                                                      value="" placeholder="Per week description" id="detail-1"></textarea>

                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <!--                                            <label for="clo-1-description"><input type="text" class="cell-input w-full font-medium text-sm" value="" placeholder="CLO" id="descriptionWeek-1" /></label>-->
                                            <select class="cell-input w-full font-medium text-sm" name="creditHour"
                                                    onclick="this.setAttribute('value', this.value);"
                                                    onchange="this.setAttribute('value', this.value);" value=""
                                                    id="creditHourID">
                                                <option value="" hidden></option>
                                                <option value="one">1</option>
                                                <option value="two">2</option>
                                                <option value="three">3</option>
                                            </select>
                                        </div>

                                        <div class="cprofile-column h-16 w-1/6">
                                            <label for="clo-1-description">
                                                <input type="text" class="cell-input w-full font-medium text-sm" value=""
                                                       placeholder="" id="descriptionWeek-1" />
                                            </label>
                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <label for="clo-1-bt-level">
                                                <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" >
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" >
                                                </div>
                                            </label>

                                        </div>
                                    </div>
                                    <div id="CourseLearningRow-1"
                                         class="flex w-full learning-outcome-row h-16">
                                        <div class="cprofile-column h-16 w-20 bg-catalystBlue-l61 text-white" id="nameCLO-1">
                                            <span class="cprofile-cell-data ">01</span>
                                        </div>
                                        <div class="cprofile-column h-16 w-1/2">
                                            <!--<label for="clo-1-description">
                                                 <input type="text" class="cell-input min-w-full" value=""
                                                        placeholder="Per week description" id="descriptionWeek-1" />
                                             </label>-->
                                            <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm"
                                                      value="" placeholder="Per week description" id="detail-1"></textarea>

                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <!--                                            <label for="clo-1-description"><input type="text" class="cell-input w-full font-medium text-sm" value="" placeholder="CLO" id="descriptionWeek-1" /></label>-->
                                            <select class="cell-input w-full font-medium text-sm" name="creditHour"
                                                    onclick="this.setAttribute('value', this.value);"
                                                    onchange="this.setAttribute('value', this.value);" value=""
                                                    id="creditHourID">
                                                <option value="" hidden></option>
                                                <option value="one">1</option>
                                                <option value="two">2</option>
                                                <option value="three">3</option>
                                            </select>
                                        </div>

                                        <div class="cprofile-column h-16 w-1/6">
                                            <label for="clo-1-description">
                                                <input type="text" class="cell-input w-full font-medium text-sm" value=""
                                                       placeholder="" id="descriptionWeek-1" />
                                            </label>
                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <label for="clo-1-bt-level">
                                                <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" >
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" >
                                                </div>
                                            </label>

                                        </div>
                                    </div>
                                    <div id="CourseLearningRow-1"
                                         class="flex w-full learning-outcome-row h-16">
                                        <div class="cprofile-column h-16 w-20 bg-catalystBlue-l61 text-white" id="nameCLO-1">
                                            <span class="cprofile-cell-data ">01</span>
                                        </div>
                                        <div class="cprofile-column h-16 w-1/2">
                                            <!--<label for="clo-1-description">
                                                 <input type="text" class="cell-input min-w-full" value=""
                                                        placeholder="Per week description" id="descriptionWeek-1" />
                                             </label>-->
                                            <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm"
                                                      value="" placeholder="Per week description" id="detail-1"></textarea>

                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <!--                                            <label for="clo-1-description"><input type="text" class="cell-input w-full font-medium text-sm" value="" placeholder="CLO" id="descriptionWeek-1" /></label>-->
                                            <select class="cell-input w-full font-medium text-sm" name="creditHour"
                                                    onclick="this.setAttribute('value', this.value);"
                                                    onchange="this.setAttribute('value', this.value);" value=""
                                                    id="creditHourID">
                                                <option value="" hidden></option>
                                                <option value="one">1</option>
                                                <option value="two">2</option>
                                                <option value="three">3</option>
                                            </select>
                                        </div>

                                        <div class="cprofile-column h-16 w-1/6">
                                            <label for="clo-1-description">
                                                <input type="text" class="cell-input w-full font-medium text-sm" value=""
                                                       placeholder="" id="descriptionWeek-1" />
                                            </label>
                                        </div>
                                        <div class="cprofile-column h-16 w-14">
                                            <label for="clo-1-bt-level">
                                                <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" >
                                                    <img class="h-10 w-6" alt=""
                                                         src="../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" >
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

                        <!--   Update Button   -->
                        <div class="text-right mx-4">
                            <button type="button" class="loginButton" name="updatecpbtn" id="updateCourseProfilebtn">Save</button>
                        </div>
                    </section>
                </div>

            </main>

        </div>

</body>
</html>