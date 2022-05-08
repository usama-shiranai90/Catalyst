<?php
//include "../../Backend/Packages/DIM/Faculty.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();
//Stores title of allotted courses

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
$allottedUserIsCoordinator = array();

for ($x = 0; $x < sizeof($listOfAllocations); $x++) {
    print $listOfAllocations[$x]->getIsCoordinator()."  ".$listOfAllocations[$x]->getCourse()->getCourseTitle()."  " .$listOfAllocations[$x]->getSection()->getSectionName() ."<br>";
    array_push($allottedUserIsCoordinator, $listOfAllocations[$x]->getIsCoordinator());
    print $listOfAllocations[$x]->getIsCoordinator();

    array_push($allottedCourseNames, $listOfAllocations[$x]->getCourse()->getCourseTitle());
    array_push($allottedCourseCodes, $listOfAllocations[$x]->getCourse()->getCourseCode());
    array_push($allottedSectionNames, $listOfAllocations[$x]->getSection()->getSectionName());
    array_push($allottedSectionCodes, $listOfAllocations[$x]->getSection()->getSectionCode());
    array_push($allottedSemesterNames, $listOfAllocations[$x]->getSection()->getSemester()->getSemesterName());
    array_push($allottedSemesterCodes, $listOfAllocations[$x]->getSection()->getSemester()->getSemesterCode());

    array_push($allottedCurriculumCodes, $listOfAllocations[$x]->getCurriculumCode());
    array_push($allottedProgramCodes, $listOfAllocations[$x]->getProgramCode());
    array_push($allottedBatchCodes, $listOfAllocations[$x]->getBatchCode());
}

echo json_encode($allottedUserIsCoordinator) . "<br>";


/*echo "Curriculum: <br>" . PHP_EOL;
print_r($allottedCurriculumCodes);
echo "<br>Programs: <br>";
print_r($allottedProgramCodes);
echo "<br>Batch: <br>";
print_r($allottedBatchCodes);*/
/*echo "<br>Total Allocations:" . sizeof($listOfAllocations);
for ($x = 0; $x < sizeof($listOfAllocations); $x++) {
    $listOfAllocations[$x]->toString();
}*/

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="../../Assets/Scripts/Master.js" rel="script"></script>
    <script src="../../Assets/Scripts/MasterNavigationPanel.js" rel="script"></script>
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
<main class="bg-blue-50 h-full">
    <form method="post" class="w-full flex justify-center items-center h-full" action="TeacherDashboard.php"
          target="_parent">

        <div class="flex flex-col items-center rounded-xl bg-white h-1/3 w-1/3 px-5 py-2"
             style="box-shadow: 0px 0px 20px 2px rgb(0 0 0 / 20%)">
            <div class="flex justify-between w-full">
                <div class="w-full text-center">
                    <label class="text-xl font-semibold">Select Course and Section</label>
                </div>
                <div class="pt-1 cursor-pointer">
                    <img id="closeClassSelectBtnID" width="20"
                         src="../../Assets/Images/vectorFiles/Icons/crossIcon.svg">
                </div>
            </div>
            <hr class="bg-gray-500 w-full my-2">
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

                    <!--                        Hidden Fields-->
                    <input class="hidden" type="text" id="curr" name="curriculumCode">
                    <input class="hidden" type="text" name="programCode">
                    <input class="hidden" type="text" name="batchCode">
                    <input class="hidden" type="text" name="facultyAllocationStatus">

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

        //Setting semesters to show on course selection
        $('#courseSelectorID').on('change', function () {
            var allottedCoursesCodes = <?php echo json_encode($allottedCourseCodes);?>;
            var allottedSemesterCodes = <?php echo json_encode($allottedSemesterCodes);?>;
            var allottedSemesterNames = <?php echo json_encode($allottedSemesterNames);?>;
            var allottedIsCoordinator = <?php echo json_encode($allottedUserIsCoordinator);?>;
            var selectedCourseCode = $(this).val();
            console.log("Allocation Info : \nCourseCode:", allottedCoursesCodes, "\nSemesterCode : ", allottedSemesterCodes, "\nSemesterNames : ", allottedSemesterNames)

            var options = '<option value="" hidden></option>';
            /*I'll push section codes into this, because if I ush section names, then it would create confusion
             when same section names from different programs appear, it won't show them except the first of them */
            /*Though we are actually showing section names and not codes*/
            var sectionCodesBeingShown = [];

            for (let i = 0; i < allottedSemesterCodes.length; i++) {
                if (selectedCourseCode == allottedCoursesCodes[i]) {

                    if (!sectionCodesBeingShown.includes(allottedSemesterCodes[i])) {
                        options += '<option value="' + allottedSemesterCodes[i] + '">' + allottedSemesterNames[i] + '</option>'
                        sectionCodesBeingShown.push(allottedSemesterCodes[i])
                    }
                }
            }
            $('#semesterSelectorID').html(options)
        })

        //Setting sections to show on semester selection
        $('#semesterSelectorID').on('change', function () {
            var allottedCoursesCodes = <?php echo json_encode($allottedCourseCodes);?>;
            var allottedSemesterCodes = <?php echo json_encode($allottedSemesterCodes);?>;

            var allottedSectionNames = <?php echo json_encode($allottedSectionNames);?>;
            var allottedSectionCodes = <?php echo json_encode($allottedSectionCodes);?>;
            var selectedCourseCode = $('#courseSelectorID').val();
            var selectedSemesterCode = $(this).val();

            console.log(selectedSemesterCode)

            var options = '<option value="" hidden></option>';

            for (let i = 0; i < allottedSectionCodes.length; i++) {
                if (selectedCourseCode == allottedCoursesCodes[i] && selectedSemesterCode == allottedSemesterCodes[i]) {
                    options += '<option value="' + allottedSectionCodes[i] + '">' + allottedSectionNames[i] + '</option>'
                }
            }
            $('#sectionSelectorID').html(options)
        })


        /*Setting curriculumCode, programCode and batch code of the selected class*/

        $('#sectionSelectorID').on('change', function () {

            var allottedSectionCodes = <?php echo json_encode($allottedSectionCodes);?>;
            var allottedCurriculumCodes = <?php echo json_encode($allottedCurriculumCodes);?>;
            var allottedProgramCodes = <?php echo json_encode($allottedProgramCodes);?>;
            var allottedBatchCodes = <?php echo json_encode($allottedBatchCodes);?>;
            var allottedIsCoordinator = <?php echo json_encode($allottedUserIsCoordinator);?>;
            var selectedSectionCode = $('#sectionSelectorID').val();
            let i;
            for (i = 0; i < allottedSectionCodes.length; i++) {
                if (selectedSectionCode == allottedSectionCodes[i]) {
                    $('input[name="curriculumCode"]').val(allottedCurriculumCodes[i])
                    $('input[name="programCode"]').val(allottedProgramCodes[i])
                    $('input[name="batchCode"]').val(allottedBatchCodes[i])
                    $('input[name="facultyAllocationStatus"]').val(allottedIsCoordinator[i])
                    break;
                }
            }
            // console.log($('input[name="curriculumCode"]').val())
            // console.log($('input[name="programCode"]').val())
            // console.log("Batch Codes: ", allottedBatchCodes)
            console.log("status of corridantor", $('input[name="facultyAllocationStatus"]').val())
        })

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