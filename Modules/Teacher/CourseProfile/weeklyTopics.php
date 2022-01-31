<?php

include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\CourseProfile\CourseProfile.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\CourseProfile\WeeklyTopic.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DIM\Curriculum.php";
//include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";

if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
    $courseProfile = new CourseProfile();
    $weeklyInfo = new WeeklyTopic();
    $curriculum = new Curriculum();
    $cloObject = new CLO();
}

$profileExist = $courseProfile->isCourseProfileExist($_SESSION['selectedCourse'], $_SESSION['selectedProgram'], $_SESSION['selectedCurriculum']);

if ($profileExist) {
    $curriculum->fetchCurriculumID($_SESSION['selectedSection']);   // provide with ongoing section code.

    //$CLOList = ['CLO-1', 'CLO-2', 'CLO-3'];
    $CLOList = $cloObject->retrieveCLOlist($curriculum->getCurriculumCode(), $_SESSION['selectedProgram'], $_SESSION['selectedCourse']); // array of clo-code and name.
    foreach ($CLOList as $key => $value) {
        $CLOList[$key][1] = removeCLODash($value[1]);;
    }

    $_SESSION['courseProfileCode'] = $courseProfile->getCourseProfileCode();

    /*$WeeklyTopicsArray = array( // is a two dimension array f18-or represents the key and has the following data.
        array('week-1', 'By default, Tailwind includes grid-template-column utilities for creating basic grids with up to 12 equal width columns. You change, add,  or remove these by customizing the gridTemplateColumns section of your Tailwind theme config',
            array('CLO-1', 'CLO-2', 'CLO-3'),
            'CSS property here so you can make your custom column values as generic or as complicated and site-specific',
        ),
        array('week-2', 'Tailwind includes grid-template-column utilities for creating basic grids with up to 12 equal width columns. You change, add,  or remove these by customizing the gridTemplateColumns section of your Tailwind theme config',
            array('CLO-2', 'CLO-3'),
            'CSS property here so you can make your custom column.......................................................'),
    );*/
    $WeeklyTopicsArray = $weeklyInfo->retrieveWeeklyTopic($_SESSION['courseProfileCode']);
//    $weeklyInfo->retrieveWeeklyTopic( $_SESSION['courseProfileCode']);
//    $WeeklyTopicsArray = array();

    if (sizeof($WeeklyTopicsArray) != 0 and !empty($WeeklyTopicsArray)) {
        function setExistingWeeklyRow($WeeklyTopicsArray, $CLOList)
        {
            $counter = 1;
            if (sizeof($WeeklyTopicsArray) != 0) {

                foreach ($WeeklyTopicsArray as $rowData) { ?>

                    <div id="weeklyCoveredRow-<?php echo $counter ?>"
                         class="grid grid-cols-12 grid-rows-1 gap-0  w-auto learning-outcome-row h-auto overflow-hidden">
                        <!--        <div id="wct-wno-r--><?php //echo $counter ?><!---c"-->
                        <div id="wct-wno-r<?php echo $counter ?>"
                             class="lweek-column bg-catalystBlue-l61 text-white col-start-1 col-end-2">
                            <span class="wlearn-cell-data"
                                  id="<?php echo $rowData[0] ?>"><?php echo $rowData[1]; ?></span>
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
                      id="assessment-clo-1" readonly="readonly"><?php echo $rowData[4]; ?></textarea></label>

                        </div>
                        <div class="lweek-column ">
                            <label for="clo-1-bt-level">
                                <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                    <img class="h-10 w-6" alt=""
                                         src="../../../../../Assets/Images/vectorFiles/Icons/add-button.svg"
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

        function weeklyCLOCheckbox($CLOList, $checkedClos, $rowCounter)
        {
            $cloCounter = 1;
            foreach ($checkedClos as $c) {
                $checkedClos = removeCLODash($checkedClos);
            }

            foreach ($CLOList as $cloNo) { ?>

                <div id="wtc-clo-r<?php echo $rowCounter ?>-c<?php echo $cloCounter ?>">
                    <?php if (in_array($cloNo[1], $checkedClos)) { ?>

                        <input class="clo-toggle hidden"
                               id="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>ID"
                               value="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>"
                               name="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>"
                               type="checkbox" disabled checked>
                    <?php } else { ?>
                        <input class="clo-toggle hidden"
                               id="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>ID"
                               value="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>"
                               name="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>"
                               type="checkbox">
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

function removeCLODash($cloArray)
{
    return str_replace("-", "", $cloArray);
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
    <link href="CourseProfileAssets/css/courseInject.css" rel="stylesheet">
    <link href="CourseProfileAssets/css/courseProfileStyle.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
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
                            if ($profileExist and sizeof($WeeklyTopicsArray) != 0 and !empty($WeeklyTopicsArray)) {
                                setExistingWeeklyRow($WeeklyTopicsArray, $CLOList);
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


</body>
<script>
    let courseCLOList = <?php echo json_encode($CLOList, JSON_HEX_TAG) ?>;
    let courseWeeklyTopicList = <?php echo json_encode($WeeklyTopicsArray, JSON_HEX_TAG)  ?>;
    console.log(courseCLOList, courseWeeklyTopicList)
    // $('#courseweekParentDivID').load('CourseProfileAssets/record.php');
</script>
<script src="CourseProfileAssets/js/weeklyTopicsScript.js" rel="script"></script>
</html>