<?php

include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\CourseProfile\CourseProfile.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\CourseProfile\WeeklyTopic.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DIM\Curriculum.php";
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";

if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
}
$courseProfile = new CourseProfile();
$weeklyInfo = new WeeklyTopic();
$curriculum = new Curriculum();
$cloObject = new CLO();

$profileExist = $courseProfile->isCourseProfileExist($_SESSION['selectedCourse'], $_SESSION['selectedProgram'], $_SESSION['selectedCurriculum']);

$CLOList = '';
$viewWeeklyTopics = '';

if ($profileExist) {
    $curriculum->fetchCurriculumID($_SESSION['selectedSection']);   // provide with ongoing section code.

    //$CLOList = ['CLO-1', 'CLO-2', 'CLO-3'];
    $CLOList = $cloObject->retrieveCLOlist($curriculum->getCurriculumCode(), $_SESSION['selectedProgram'], $_SESSION['selectedCourse']); // array of clo-code and name.
    foreach ($CLOList as $key => $value) {
        $CLOList[$key][1] = removeCloDash($value[1]);;
    }

    $_SESSION['courseProfileCode'] = $courseProfile->getCourseProfileCode();
    $viewWeeklyTopics = $weeklyInfo->retrieveWeeklyTopic($_SESSION['courseProfileCode']);

    if (sizeof($viewWeeklyTopics) != 0 and !empty($viewWeeklyTopics)) {
        /** fetch weekly covered data */
        function setExistingWeeklyRow($viewWeeklyTopics, $CLOList)
        {
            $counter = 1;
            if (sizeof($viewWeeklyTopics) != 0) {

                foreach ($viewWeeklyTopics as $rowData) { ?>

                    <div id="weeklyCoveredRow-<?php echo $counter ?>"
                         class="grid grid-cols-12 grid-rows-1 gap-0  w-auto learning-outcome-row h-auto overflow-hidden">

                        <input class="hidden" id="s-wtc-r<?php echo $counter ?>" value="<?php echo $rowData[0] ?>">
                        <div id="wct-wno-r<?php echo $counter ?>"
                             class="lweek-column bg-catalystBlue-l61 text-white col-start-1 col-end-2">
                            <span class="wlearn-cell-data"><?php echo $rowData[1]; ?></span>
                        </div>
                        <div id="wct-wdescription-r<?php echo $counter ?>" class="lweek-column col-start-2 col-end-7">
                            <label for="detail-<?php echo $counter ?>">
            <textarea type="text" class="pt-4 px-2 h-auto cell-input w-full font-medium text-sm" value=""
                      placeholder="Write weekly description here..."
                      id="detail-r-<?php echo $counter ?>" readonly="readonly"
                      style="height: 100px;"><?php echo $rowData[2]; ?></textarea></label>
                        </div>
                        <div class="lweek-column  col-start-7 col-end-8">
                            <div id="wtc-clos-r<?php echo $counter ?>" class="flex flex-col overflow-y-visible ">

                                <?php
                                weeklyCLOCheckbox($CLOList, $rowData[3], $counter);
                                ?>

                            </div>
                        </div>
                        <div id="wct-wassessment-r<?php echo $counter ?>" class="lweek-column  col-start-8 col-end-12">
                            <label for="assessment-clo-<?php echo $counter ?>">
            <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm" value=""
                      placeholder="Write week assessment here..."
                      id="assessment-clo-<?php echo $counter ?>" readonly="readonly"><?php echo $rowData[4]; ?></textarea></label>

                        </div>
                        <div class="lweek-column ">
                            <label for="clo-1-bt-level">
                                <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                    <img class="h-10 w-6" alt=""
                                         src="../../../../../Assets/Images/vectorFiles/Icons/edit-button.svg"
                                         data-wtc-modify='modify'>
                                    <img class="h-10 w-6" alt=""
                                         src="../../../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg"
                                         data-wtc-remove='remove'>
                                </div>
                            </label>
                        </div>
                    </div>

                    <?php $counter = $counter + 1;
                }
            }
        }

        /** Weekly covered Clos checkbox */
        function weeklyCLOCheckbox($CLOList, $checkedClos, $rowCounter)
        {
            $cloCounter = 1;
            foreach ($checkedClos as $c) {
                $checkedClos = removeCloDash($checkedClos);
            }

            foreach ($CLOList as $cloNo) { ?>

                <div id="wtc-clo-r<?php echo $rowCounter ?>-c<?php echo $cloCounter ?>">
                    <?php if (in_array($cloNo[1], $checkedClos)) { ?>

                        <input class="clo-toggle hidden"
                               id="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>ID"
                               value="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>"
                               name="<?php echo $cloNo[0] ?>"
                               type="checkbox" disabled checked>
                    <?php } else { ?>
                        <input class="clo-toggle hidden"
                               id="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>ID"
                               value="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>"
                               name="<?php echo $cloNo[0] ?>"
                               type="checkbox" disabled>
                    <?php } ?>

                    <label class="inside-label cprofile-cell-data capitalize"
                           for="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>ID">
                        <?php echo $cloNo[1] ?>
                        <span><svg width="50px" height="15px"><use
                                        xlink:href="#check-tick"></use></svg> </span>
                    </label>
                </div>

                <?php $cloCounter++;
            }
        }

    }
}

function removeCloDash($cloArray): array|string
{
    return str_replace("-", "", $cloArray);
}

function callStaticData($viewWeeklyTopics)
{
    $viewWeeklyTopics = array( // is a two dimension array f18-or represents the key and has the following data.
        array('week-1', 'By default, Tailwind includes grid-template-column utilities for creating basic grids with up to 12 equal width columns. You change, add,  or remove these by customizing the gridTemplateColumns section of your Tailwind theme config',
            array('CLO-1', 'CLO-2', 'CLO-3'),
            'CSS property here so you can make your custom column values as generic or as complicated and site-specific',
        ),
        array('week-2', 'Tailwind includes grid-template-column utilities for creating basic grids with up to 12 equal width columns. You change, add,  or remove these by customizing the gridTemplateColumns section of your Tailwind theme config',
            array('CLO-2', 'CLO-3'),
            'CSS property here so you can make your custom column.......................................................'),
    );
}

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
    <link href="CourseProfileAssets/css/courseProfileStyle.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <script src="CourseProfileAssets/js/additionalWork.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
</head>
<body style="background-color: #F9F8FE">
<div class="w-full min-h-full">
    <svg class="hidden tick-icon">
        <symbol id="check-tick" viewbox="0 0 12 10">
            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
        </symbol>
    </svg>
    <main class="main-content-alignment">
        <div class="weeklytopics-primary-border text-black rounded-t-md rounded-b-md mt-2 h-full bg-catalystLight-f5">
            <h2 class="weekly-topic-container-centertxt">Covered Topics</h2>
            <!--    Weekly Topics Section     -->

            <section id="weeklyTopicsID" class="cprofile-content-box-border cprofile-grid mx-0 my-0 ">
                <div class="mx-2 weekly-container">

                    <div class="clo-table-border rounded-md shadow-sm bg-catalystBlue-l8">
                        <h2 class="table-head font-semibold">Weekly Covered Topics</h2>

                        <div id="courseweekParentDivID" class="flex flex-col p-0"> <!--flex flex-wrap p-0-->
                            <div id="courseLearningHeaderID"
                                 class="learning-outcome-head learning-week-header-dp overflow-hidden">
                                <!--  text-md row-flex w-full mx-0-->
                                <div class="lweek-column bg-catalystBlue-l61 text-white col-start-1 col-end-2">
                                    <!--   flex justify-center items-center min-h-full min-w-full  -->
                                    <span class="wlearn-cell-data">Week</span>
                                </div>
                                <div class="lweek-column col-start-2 col-end-7">
                                    <span class="wlearn-cell-data">Detail of topics covered</span>
                                </div>
                                <div class="lweek-column col-start-7 col-end-8">
                                    <span class="wlearn-cell-data">CLO</span>
                                </div>
                                <div class="lweek-column col-start-8 col-end-12">
                                    <span class="wlearn-cell-data">Assessment</span>
                                </div>
                                <div class="lweek-column">
                                    <span class="wlearn-cell-data">Status</span>
                                </div>
                            </div>
                            <?php
                            if ($profileExist and sizeof($viewWeeklyTopics) != 0 and !empty($viewWeeklyTopics)) {
                                setExistingWeeklyRow($viewWeeklyTopics, $CLOList);
                            }
                            ?>
                        </div>

                    </div>

                    <div class="flex justify-center">
                        <button type="button" aria-label="add_clos_button_label" class="max-w-2xl rounded-full"
                                id="add-clo-btn" aria-expanded="false" aria-haspopup="true">
                            <img id="createWeeklyBtn" class="h-8 w-8 rounded-full"
                                 src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" alt="">
                        </button>
                    </div>
                </div>
                <!--   Update Button   -->
                <div class="text-right mx-4">
                    <button type="button" class="loginButton" name="updatecpbtn" id="updateweeklyTopicbtn">Save
                    </button>
                </div>
            </section>
        </div>
    </main>
</div>

<div id="alertContainer"
     class="hidden shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 w-80 m-auto fixed top-1/3 left-1/3 z-5">
    <div class="w-full h-full text-center">
        <div class="flex h-full flex-col justify-between">
            <img src="../../../Assets/Images/vectorFiles/Others/Dot-section.svg" alt="cross"
                 class="h-12 w-12 mt-4 m-auto" id="cmimageID">
            <p class="text-gray-600 dark:text-gray-100 text-md py-2 px-6">
                Do you wish to delete the selected <span
                        class="text-gray-800 dark:text-white font-bold">Weekly Covered Topics</span>?
                <span class="text-gray-800 dark:text-white font-bold">Note : </span> It will be deleted from database.
            </p>
            <div id="aboxcontainer" class="flex items-center justify-between gap-4 w-full mt-8">
                <button id="alertBtnNoWeekly" type="button" class="loginButton py-2 px-4 hover:bg-indigo-700
                        text-white w-full transition ease-in duration-200 text-center text-base
                         font-semibold shadow-md rounded-lg">No
                </button>

                <button id="alertBtndeleteWeekly" type="button" class="loginButton py-2 px-4 hover:bg-indigo-700
                        text-white w-full transition ease-in duration-200 text-center text-base
                         font-semibold shadow-md rounded-lg">Yes
                </button>

            </div>
        </div>
    </div>
</div>

<div id="loader" class="hidden m-auto fixed top-1/4 left-1/2 z-5">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class=" transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- inline-block align-bottom bg-white rounded-lg text-center overflow-hidden-->
            <div class=" px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <svg class="animate-spin fill-current text-catalystBlue-d2 opacity-100"
                     xmlns="http://www.w3.org/2000/svg"
                     width="55" height="55" viewBox="0 0 24 24">
                    <path d="M13.75 22c0 .966-.783 1.75-1.75 1.75s-1.75-.784-1.75-1.75.783-1.75 1.75-1.75 1.75.784 1.75 1.75zm-1.75-22c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 10.75c.689 0 1.249.561 1.249 1.25 0 .69-.56 1.25-1.249 1.25-.69 0-1.249-.559-1.249-1.25 0-.689.559-1.25 1.249-1.25zm-22 1.25c0 1.105.896 2 2 2s2-.895 2-2c0-1.104-.896-2-2-2s-2 .896-2 2zm19-8c.551 0 1 .449 1 1 0 .553-.449 1.002-1 1-.551 0-1-.447-1-.998 0-.553.449-1.002 1-1.002zm0 13.5c.828 0 1.5.672 1.5 1.5s-.672 1.501-1.502 1.5c-.826 0-1.498-.671-1.498-1.499 0-.829.672-1.501 1.5-1.501zm-14-14.5c1.104 0 2 .896 2 2s-.896 2-2.001 2c-1.103 0-1.999-.895-1.999-2s.896-2 2-2zm0 14c1.104 0 2 .896 2 2s-.896 2-2.001 2c-1.103 0-1.999-.895-1.999-2s.896-2 2-2z"/>
                </svg>
                <span class=" text-lg font-medium antialiased tracking-tighter">Loading</span>
            </div>
        </div>

    </div>
</div>

</body>
<script>
    let courseCLOList = <?php echo json_encode($CLOList, JSON_HEX_TAG) ?>;
    let courseWeeklyTopicList = <?php echo json_encode($viewWeeklyTopics, JSON_HEX_TAG)  ?>;
    console.log(courseCLOList, courseWeeklyTopicList)
    // $('#courseweekParentDivID').load('CourseProfileAssets/record.php');
</script>
<script src="CourseProfileAssets/js/weeklyTopicsScript.js" rel="script"></script>
</html>