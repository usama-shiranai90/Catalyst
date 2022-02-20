<?php
//include "../../Backend/Packages/DIM/Faculty.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();

$faculty = Faculty::getFacultyInstance();
$listOfAllocations = $faculty->retrieveAllocations($_SESSION['facultyCode']);


$allottedCourseNames = array();
$allottedCourseCodes = array();
$allottedSectionNames = array();
$allottedSectionCodes = array();
$allottedSemesterCodes = array();
$allottedSemesterNames = array();

$allottedCurriculumCodes = array();
$allottedProgramCodes = array();
$allottedBatchCodes = array();

for ($x = 0; $x < sizeof($listOfAllocations); $x++) {
    $allottedCourseNames[] = $listOfAllocations[$x]->getCourse()->getCourseTitle();
    $allottedCourseCodes[] = $listOfAllocations[$x]->getCourse()->getCourseCode();
    $allottedSectionNames[] = $listOfAllocations[$x]->getSection()->getSectionName();
    $allottedSectionCodes[] = $listOfAllocations[$x]->getSection()->getSectionCode();
    $allottedSemesterNames[] = $listOfAllocations[$x]->getSection()->getSemester()->getSemesterName();
    $allottedSemesterCodes[] = $listOfAllocations[$x]->getSection()->getSemester()->getSemesterCode();

    $allottedCurriculum[] = $listOfAllocations[$x]->getCurriculumCode();
    $allottedProgramCode[] = $listOfAllocations[$x]->getProgramCode();
    $allottedBatchCodes[] = $listOfAllocations[$x]->getBatchCode();
}

//print_r("<br> curriculum :".$allottedCurriclum."     program".$allottedProgramCode);

//var_dump($allottedCurriclum);


/*echo "<br>Total Allocations:" . sizeof($listOfAllocations);
for ($x = 0; $x < sizeof($listOfAllocations); $x++) {
    $listOfAllocations[$x]->toString();
}*/

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../Assets/Scripts/Master.js" rel="script"></script>
    <style>
        .select-label {
            top: 10px;
        }

        button {
            background-color: #0184FC
        }

    </style>
</head>
<body>
<main class="bg-blue-50  h-full">
    <form method="post" class="w-full flex justify-center items-center h-full" action="TeacherDashboard.php"
          target="_parent">

        <div class="flex flex-col items-center rounded-xl bg-white h-1/3 w-1/3 px-5 py-2"
             style="box-shadow: 0px 0px 20px 2px rgb(0 0 0 / 20%)">
            <div class="flex justify-between w-full">
                <div class="w-full text-center">
                    <label class="text-xl font-semibold">Select Course and Section</label>
                </div>
                <div class="pt-1">
                    <img id="closeClassSelectBtnID" width="20"
                         src="../../Assets/Images/vectorFiles/Icons/crossIcon.svg">
                </div>
            </div>
            <hr class="bg-gray-500 w-full my-2">

            <input class="hidden" id="programSelectorID" name="programSelector" hidden>
            <input class="hidden" id="curriculumSelectorID" name="curriculumSelector" hidden>

            <div class="text-center flex flex-col w-full">
                <label class="font-semibold text-md">Please choose your course and section</label>

                <div class="flex justify-around w-full my-3 ">

                    <div class="select-label-content w-2/6" id="">
                        <select class="select" id="courseSelectorID" name="courseSelector"
                                onclick="this.setAttribute('value', this.value);"
                                onchange="this.setAttribute('value', this.value);" value="" id="">
                            <option value="" hidden></option>
                            <?php
                            $courseNamesBeingShown = array();

                            for ($x = 0; $x < sizeof($allottedCourseNames); $x++) {

                                if (!in_array($allottedCourseNames[$x], $courseNamesBeingShown)) {
                                    echo '<option value="' . $allottedCourseCodes[$x] . '">' . $allottedCourseNames[$x] . '</option>';
                                    array_push($courseNamesBeingShown, $allottedCourseNames[$x]);
                                }
                            }
                            ?>

                        </select>
                        <label class="select-label">Course</label>
                    </div>

                    <div class="select-label-content w-2/6" id="">
                        <select class="select" id="semesterSelectorID" name="semesterSelector"
                                onclick="this.setAttribute('value', this.value);"
                                onchange="this.setAttribute('value', this.value);" value="">
                            <option value="" hidden></option>
                        </select>
                        <label class="select-label">Semester</label>
                    </div>


                    <div class="select-label-content w-2/6" id="">
                        <select class="select" id="sectionSelectorID" name="sectionSelector"
                                onclick="this.setAttribute('value', this.value);"
                                onchange="this.setAttribute('value', this.value);" value="">
                            <option value="" hidden></option>
                        </select>
                        <label class="select-label">Section</label>
                    </div>
                </div>

                <div>
                    <div class="mt-5 flex justify-end pr-5">
                        <button class="rounded-md text-white p-1 text-sm w-28" type="submit" name="selectClass">
                            Select
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>

</main>
</body>
</html>
<script>
    $(document).ready(function () {

        var allottedProgramCodes = <?php echo json_encode($allottedProgramCode);?>;
        var allottedCurriculumCodes = <?php echo json_encode($allottedCurriculum);?>;


        $('#courseSelectorID').on('change', function () {
            var allottedCoursesCodes = <?php echo json_encode($allottedCourseCodes);?>;
            var allottedSemesterCodes = <?php echo json_encode($allottedSemesterCodes);?>;
            var allottedSemesterNames = <?php echo json_encode($allottedSemesterNames);?>;
            //var allottedSectionCodes = <?php //echo json_encode($allottedSectionCodes);?>//;
            var selectedCourseCode = $(this).val();

            var options = '<option value="" hidden></option>';

            for (let i = 0; i < allottedSemesterCodes.length; i++) {
                if (selectedCourseCode == allottedCoursesCodes[i]) {
                    options += '<option value="' + allottedSemesterCodes[i] + '">' + allottedSemesterNames[i] + '</option>'
                    $('#programSelectorID').val(allottedProgramCodes[i]);
                    $('#curriculumSelectorID').val(allottedCurriculumCodes[i]);
                }
            }
            $('#semesterSelectorID').html(options)
        })

        $('#semesterSelectorID').on('change', function () {
            var allottedCoursesCodes = <?php echo json_encode($allottedCourseCodes);?>;
            var allottedSemesterCodes = <?php echo json_encode($allottedSemesterCodes);?>;

            var allottedSectionNames = <?php echo json_encode($allottedSectionNames);?>;
            var allottedSectionCodes = <?php echo json_encode($allottedSectionCodes);?>;
            var selectedCourseCode = $('#courseSelectorID').val();
            var selectedSemesterCode = $(this).val();


            var options = '<option value="" hidden></option>';

            for (let i = 0; i < allottedSectionCodes.length; i++) {
                if (selectedCourseCode == allottedCoursesCodes[i] && selectedSemesterCode == allottedSemesterCodes[i]) {
                    options += '<option value="' + allottedSectionCodes[i] + '">' + allottedSectionNames[i] + '</option>'
                    $('#programSelectorID').val(allottedProgramCodes[i]);
                    $('#curriculumSelectorID').val(allottedCurriculumCodes[i]);
                }
            }
            $('#sectionSelectorID').html(options)
        })
        /*
        $('#courseSelectorID').on('change', function () {
                    var allottedCoursesCodes = <?php echo json_encode($allottedCourseCodes);?>;
            var allottedSectionNames = <?php echo json_encode($allottedSectionNames);?>;
            var allottedSectionCodes = <?php echo json_encode($allottedSectionCodes);?>;
            var selectedCourseCode = $(this).val();

            var options = '<option value="" hidden></option>';

            for (let i = 0; i < allottedSectionCodes.length; i++) {
                if (selectedCourseCode == allottedCoursesCodes[i]) {
                    options += '<option value="' + allottedSectionCodes[i] + '">' + allottedSectionNames[i] + '</option>'
                }
            }
            $('#sectionSelectorID').html(options)
        })
*/


        containsErrors = false
        $('button[name="selectClass"]').click(function (event) {
            $("select").each(function (event) {
                if ($(this).val() == "") {
                    containsErrors = true
                    $(this).closest('div').addClass('select-error-input')
                }
            })

            if (containsErrors) {
                event.preventDefault()
            } else {
                window.top.location.reload();
            }

        })

        $("select").on("change", function (event) {
            containsErrors = false
            $(this).closest('div').removeClass('select-error-input')
        })
    });
</script>