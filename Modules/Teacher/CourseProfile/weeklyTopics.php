<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
}

$programCode = $_SESSION['selectedProgram'];
$curriculumCode = $_SESSION['selectedCurriculum'];
$batchCode = $_SESSION['selectedBatch'];
$sectionCode = $_SESSION['selectedSection'];
$courseCode = $_SESSION['selectedCourse'];
$facultyCode = $_SESSION['facultyCode'];

$courseProfile = new CourseProfile();
$weeklyInfo = new WeeklyTopic();
$curriculum = new Curriculum();
$cloObject = new CLO();

$profileExist = $courseProfile->isCourseProfileExist($programCode, $batchCode, $courseCode);

$courseLearningOutcomeList = '';
$viewWeeklyTopics = '';

if ($profileExist) {
    $curriculum->fetchCurriculumID($sectionCode);   // provide with ongoing section code.

    if ($curriculum->getCurriculumCode() == $curriculumCode) {
        $courseLearningOutcomeList = $cloObject->retrieveCLOlist($programCode, $curriculumCode, $batchCode, $courseCode); // array of clo-code and name.
        foreach ($courseLearningOutcomeList as $index => $value) // value is an array storing [ CLOKey , CloName , CloDescription ]
            $courseLearningOutcomeList[$index][1] = removeCloDash($value[1]);
    }
//    print json_encode($courseLearningOutcomeList);
    $_SESSION['courseProfileCode'] = $courseProfile->getCourseProfileCode();
    $viewWeeklyTopics = $weeklyInfo->retrieveWeeklyTopic($courseProfile->getCourseProfileCode());

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
                    <textarea type="text"
                              class="cell-input py-4  px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                              value=""
                              placeholder="Write weekly description here..."
                              onkeyup="autoHeight('detail-r-<?php echo $counter ?>')"
                              id="detail-r-<?php echo $counter ?>" readonly="readonly"
                              style="height: 100px;"><?php echo $rowData[2]; ?>
                    </textarea>
                            </label>
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
            <textarea type="text"
                      class="cell-input py-4  px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0" value=""
                      placeholder="Write week assessment here..."
                      id="assessment-clo-<?php echo $counter ?>"
                      onkeyup="autoHeight('assessment-clo-<?php echo $counter ?>')"
                      readonly="readonly"><?php echo $rowData[4]; ?></textarea></label>

                        </div>
                        <div class="lweek-column ">
                            <label for="clo-1-bt-level">
                                <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                    <img class="h-10 w-6 transform transition hover:scale-90 fill-current  cursor-pointer" alt=""
                                         src="../../../../../Assets/Images/vectorFiles/Icons/edit-button.svg"
                                         data-wtc-modify='modify'>
                                    <img class="h-10 w-6 transform transition hover:scale-90 fill-current  cursor-pointer" alt=""
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
    <!--    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>-->
    <!--    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>-->

    <script src="../../../Assets/Scripts/InterfaceUtil.js"></script>
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

                        <div id="courseweekParentDivID" class="flex flex-col p-0">
                            <div id="courseLearningHeaderID"
                                 class="learning-outcome-head learning-week-header-dp overflow-hidden m-0">
                                <div class="lweek-column bg-catalystBlue-l6 text-white col-start-1 col-end-2">
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
                                setExistingWeeklyRow($viewWeeklyTopics, $courseLearningOutcomeList);
                            }
                            ?>
                        </div>

                    </div>

                    <div class="flex justify-center">
                        <button type="button" aria-label="add_clos_button_label" class="max-w-2xl rounded-full my-2"
                                id="add-clo-btn" aria-expanded="false" aria-haspopup="true">
                            <img id="createWeeklyBtn" class="h-8 w-8 transform transition duration-300 ease-in-out hover:scale-110 cursor-pointer"
                                 src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" alt="">
                        </button>
                    </div>
                </div>
                <!-- Update Button-->


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

</body>
<script>
    let courseLearningOutcomeList = <?php echo json_encode($courseLearningOutcomeList, JSON_HEX_TAG) ?>;
    let courseWeeklyTopicList = <?php echo json_encode($viewWeeklyTopics, JSON_HEX_TAG)  ?>;
    console.log(courseLearningOutcomeList, courseWeeklyTopicList)
</script>
<?php
if ($profileExist) {
    print ('<script src="CourseProfileAssets/js/weeklyTopicsScript.js" rel="script"></script>');
} else
    print ('<script rel="script">
                let removal = document.querySelector("main");
                $(removal).children().remove();
                $("main").append(` <div class="flex flex-col my-5 rounded-lg shadow bg-white">
                <div class="db-table-header-topic items-center border-b-0 rounded-b-none pb-5" style="background-color: rgba(220,71,71,0.92)">
                    <div class="flex flex-row justify-center items-center">
                        <h2 class="flex items-center justify-center text-lg text-center font-semibold  text-white tracking-wide text-center capitalize">Weekly Covered Topics</h2>
                    </div>
                </div>
                <div class="h-60 text-center text-red-400 font-medium text-2xl flex justify-center items-center">
                Please create Course profile before assigning weekly topic.
                </div>

        </div>`);
                
                </script>');

?>

</html>