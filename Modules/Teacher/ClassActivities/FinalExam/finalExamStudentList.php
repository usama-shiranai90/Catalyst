<?php
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DIM\Student.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\DIM\Section.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\ClassActivities\FinalExam.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DIM\Student.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DIM\Section.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\ClassActivities\FinalExam.php";

session_start();


$selectedCourse = $_SESSION['selectedCourse'];
$selectedSemester = $_SESSION['selectedSemester'];
$selectedSection = $_SESSION['selectedSection'];


/****************************************Getting Students who are in the selected section and enrolled in selected course *******************************/
$section = new Section();
$listOfStudents = $section->setListOfStudentsInSectionInCourse($selectedSection, $selectedCourse);
//$regNumbers = ["F18-BCSE-001", "F18-BCSE-002", "F18-BCSE-003", "F18-BCSE-004"];
//$names = ["ABC", "DEF", "GHI", "JKL"];

$regNumbers = array();
$names = array();

foreach ($listOfStudents as $currentStudent) {
    array_push($regNumbers, $currentStudent->getRegistrationCode());
    array_push($names, $currentStudent->getStudentName());
}


//Getting registrationNumbers and names from database
//    run a query for studentsrollnumbers and names
$numberOfStudents = sizeof($regNumbers);
$numberOfFinalExamQuestion = $_SESSION['numberOfFinalExamQuestions'];
$marksOfFinalExamQuestions = $_SESSION['marksOfFinalExamQuestions'];
$detailOfFinalExamQuestions = $_SESSION['detailOfFinalExamQuestions'];


$editingMode = false;
//following condition would be true when we are editing marks because only then we would have sessionalID

if (isset($_GET['finalExamID'])) {
    $editingMode = true;
//    Run a query to get marks of each student, it should return a 2D array of student roll numbers and marks in each question
    $studentObtainedMarks = array();
    $finalExam = new FinalExam();

    foreach ($listOfStudents as $currentStudent) {
        array_push($studentObtainedMarks, $finalExam->getStudentMarksInActivity($_GET['finalExamID'], $currentStudent->getRegistrationCode()));
    }

//    print_r($studentObtainedMarks);


    if (isset($_POST['updateFinalExamMarksUpdate'])) {
        $finalExamObtainedMarks = $_POST['finalExamObtainedMarks'];

        //    For each loop was written to check whether the data is being fetched or not
//        foreach ($finalExamObtainedMarks as $student) {
//            for ($i = 1; $i <= $numberOfFinalExamQuestion; $i++) {
//                echo "CLO: " . $student['question' . $i] . "</br>";
//            }
//        }
        $finalExam = new FinalExam();
        foreach ($regNumbers as $singleStudentRegNum) {
            $finalExam->updateStudentMarksInActivity($singleStudentRegNum, $_GET['finalExamID'], $finalExamObtainedMarks[$singleStudentRegNum]);
        }

        header("Location: viewFinalExamStudentList.php?finalExamID=" . $_GET['finalExamID']);
    }
} else {
    $studentObtainedMarks = "";
}


if (isset($_POST['submitFinalExamMarks'])) {
    $finalExamObtainedMarks = $_POST['finalExamObtainedMarks'];

    //    For each loop was written to check whether the data is being fetched or not
    /*    foreach ($finalExamObtainedMarks as $student) {
            for ($i = 1; $i <= $numberOfFinalExamQuestion; $i++) {
                echo "CLO: " . $student['question' . $i] . "</br>";
            }
        }*/

    //    We are getting the data in array, now we'll pass it into database
    $finalExam = new FinalExam();
    /********************* Getting code for latest inserted activity ******************/
    $latestActivityCode = $finalExam->getLatestActivityCode();

//    print_r($finalExamObtainedMarks);

    foreach ($regNumbers as $singleStudentRegNum) {
        echo "Student";
        $finalExam->enterStudentMarksForActivity($singleStudentRegNum, $latestActivityCode, $finalExamObtainedMarks[$singleStudentRegNum]);
    }


//    header("Location: midTermDashboard.php");
}

if (isset($_POST['cancelFinalExamMarksUpdate'])) {
    header("Location: viewFinalExam.php?finalExamID=" . $_GET['finalExamID']);
}

if (isset($_POST['cancelFinalExamMarks'])) {
    header("Location: midTermDashboard.php");
}
?>

<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Catalyst - Final Exam Student List</title>
    <link href='../../../../Assets/Stylesheets/Master.css' rel='stylesheet'>
    <link href='../../../../Assets/Stylesheets/Tailwind.css' rel='stylesheet'>
    <link href='FinalExamAssets/FinalExamStyles.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
<div class='m-5 border border-gray-300 border-opacity-100 rounded-md'>
    <div class='font-bold text-lg text-center mt-2 mb-2'>Final Exam Students Marks List</div>

    <form method="post">
        <div class='flex justify-evenly text-center' id='teacherFinalExamStudentListDivID'>


            <table class='w-full' style='table-layout: fixed; width: 100%'>
                <thead id=''
                       class='h-12 border border-t-1 border-b-1 border-r-0 border-l-0 border-gray-400 border-opacity-100'
                       style='background-color: #F4F8F9'>
                <tr id='teacherViewFinalExamStudentListTableHeadID'>
                    <th>REG NO</th>
                    <th>Name</th>
                </tr>

                </thead>
                <tbody id="teacherViewFinalExamStudentListTableBodyID" class='w-full'
                       style='table-layout: fixed; width: 100%'>
                </tbody>

            </table>
        </div>

        <div id="submitFinalExamMarksDivID" class='mt-5 mb-1 flex justify-end pr-5'>
            <button class='rounded-md text-white p-1 text-sm w-28 bg-gray-400 mr-5' type="submit"
                    id='cancelFinalExamMarksBtnID'
                    name='cancelFinalExamMarks'>
                Cancel
            </button>

            <button class='rounded-md text-white p-1 text-sm w-28' id='submitFinalExamMarksBtnID'
                    name='submitFinalExamMarks'>
                Submit
            </button>
        </div>

        <div id="updateFinalExamMarksDivID" class='mt-5 mb-1 flex justify-end pr-5'>
            <button class='rounded-md text-white p-1 text-sm w-28 bg-gray-400 mr-5' type="submit"
                    name='cancelFinalExamMarksUpdate'>
                Cancel
            </button>

            <button class='rounded-md text-white p-1 text-sm w-28' id="updateFinalExamMarksUpdateID"
                    name='updateFinalExamMarksUpdate'>
                Update
            </button>
        </div>
    </form>

</div>

<div id="errorMessageDiv"
     class="hidden fixed bottom-0 right-0 z-50 w-1/5 flex p-4 mb-4 text-sm text-red-900 bg-red-100 rounded-lg">
    <div>
        <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0
         001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
        </svg>
    </div>
    <div id="errorID">
        <span class="font-medium"></span>
    </div>
</div>

</body>

<script>
    if (<?php echo json_encode($editingMode);?>) {
        $('#submitFinalExamMarksDivID').addClass('hidden')
    } else {
        $('#updateFinalExamMarksDivID').addClass('hidden')
    }
</script>

<script>

    //    Getting number of questions in the sessional
    let numberOfQuestions = <?php echo json_encode($numberOfFinalExamQuestion);?>;

    //Getting number of students in class
    let numberOfStudents = <?php echo json_encode($numberOfStudents);?>;

    //Getting registration numbers of students in class
    let studentRegistrationNumbers = <?php echo json_encode($regNumbers);?>;

    //Getting names of students in class
    let studentNames = <?php echo json_encode($names);?>;

    //Getting marks of each question
    let marksOfEachQuestion = <?php echo json_encode($marksOfFinalExamQuestions);?>;


    //Getting detail of each question
    let detailOfEachQuestion = <?php echo json_encode($detailOfFinalExamQuestions);?>;

    //Getting obtained marks of each question
    let studentMarksList = <?php echo json_encode($studentObtainedMarks); ?>;

    let teacherFinalExamStudentListTableHead = document.getElementById("teacherViewFinalExamStudentListTableHeadID")
    let teacherStudentMarksInputRow = document.getElementById("teacherStudentMarksInputRowID")
    let teacherFinalExamStudentListTableBody = document.getElementById("teacherViewFinalExamStudentListTableBodyID")
    let submitFinalExamMarksBtn = document.getElementById("submitFinalExamMarksBtnID")
    let updateFinalExamMarksUpdate = document.getElementById("updateFinalExamMarksUpdateID")
    let containsErrors = false;

    function createQuestionNumberHeaders(numberOfQuestions) {
        for (let i = 0; i < numberOfQuestions; i++) {
            teacherFinalExamStudentListTableHead.innerHTML += "<th>Q" + (i + 1) + "<br>" + detailOfEachQuestion[i] + "</th>"
        }
    }

    function createStudentRows(numberOfStudents) {
        let rowID = ""
        let finalExamRegNoID = ""
        for (let i = 0; i < numberOfStudents; i++) {
            rowID = "teacherStudentMarksInputRowID" + (i + 1);
            finalExamRegNoID = "teacherFinalExamListRegNo" + (i + 1);

            teacherFinalExamStudentListTableBody.innerHTML +=
                "<tr id='" + rowID + "' class='h-20 border-b border-gray-300 border-opacity-100 text-center'>"
                + "<td>"
                + "<label id='" + finalExamRegNoID + "'>" + studentRegistrationNumbers[i] + "</label>"
                + "</td>"
                + "<td>"
                + "<label>" + studentNames[i] + "</label>"
                + "</td>";

            // studentRegNo = document.getElementById(finalExamRegNoID).innerText; //returns F18-BCSE-018
            // let rollNo = studentRegNo.slice(studentRegNo.length - 3) //returns018

            let rollNo = document.getElementById(finalExamRegNoID).innerText;//returns F18-BCSE-018

            if (Array.isArray(studentMarksList)) {
                createInputsWithAutofilledMarks(rowID, numberOfQuestions, rollNo, studentMarksList[i]) + "</tr>"
            } else
                createQuestionNumberInputInaRow(rowID, numberOfQuestions, rollNo) + "</tr>";
        }
    }

    //function createQuestionNumberInputInaRow creates inputs for each question for all students
    //This function is called when we enter marks immediately after creating midterm
    function createQuestionNumberInputInaRow(rowID, numberOfQuestions, rollNo) {
        alert(marksOfEachQuestion)
        alert(detailOfEachQuestion)

        for (let i = 0; i < numberOfQuestions; i++) {
            document.getElementById(rowID).innerHTML += "<td class='mt-3 mb-2'>"
                + "<div class='textField-label-content' id='marksTextFields" + (i + 1) + rollNo + "DivID'>"
                + "<label class='hidden'>" + marksOfEachQuestion[i] + "</label>"
                + "<input class='textField' type='number' min='0' placeholder=' ' id='finalExam[" + rollNo + "][question" + (i + 1) + "]ID' name='finalExamObtainedMarks[" + rollNo + "][question" + (i + 1) + "]'>"
                + "<label class='textField-label'>Marks Out of " + marksOfEachQuestion[i] + "</label>"
                + "</div>"
                + "</td>"
        }
    }

    //This function is called when we edit marks, thi function gives autofilled marks
    function createInputsWithAutofilledMarks(rowID, numberOfQuestions, rollNo, studentMarksList) {


        for (let i = 0; i < numberOfQuestions; i++) {
            document.getElementById(rowID).innerHTML += "<td class='mt-3 mb-2'>"
                + "<div class='textField-label-content' id='marksTextFields" + rollNo + "DivID'>"
                + "<label class='hidden'>" + marksOfEachQuestion[i] + "</label>"
                + "<input class='textField' type='number' value='" + studentMarksList[i] + "'  placeholder=' ' id='finalExam[" + rollNo + "][question" + (i + 1) + "]ID' name='finalExamObtainedMarks[" + rollNo + "][question" + (i + 1) + "]'>"
                + "<label class='textField-label'>Marks Out of " + marksOfEachQuestion[i] + "</label>"
                + "</div>"
                + "</td>"
        }
    }


    window.onload = function () {
        createQuestionNumberHeaders(numberOfQuestions);
        createStudentRows(numberOfStudents)

        $(document).ready(function () {

            $(submitFinalExamMarksBtn).add(updateFinalExamMarksUpdate).click(function (event) {

                $("input").each(function (event) {
                    if ($(this).val() != "") {
                        containsErros = false
                    }
                })

                $("input").each(function (event) {
                    if ($(this).val() == "" || $(this).val() < 0 || $(this).val() > parseInt($(this).siblings('label').text())) {
                        containsErros = true
                        $(this).closest('div').addClass('textField-error-input')
                        showErrorBox("Please enter values in the specified range")
                    }
                })

                if (containsErros)
                    event.preventDefault()
            })
            //Remove errors from inputs if there are any,
            // there was no need to put an if statement for checking an error as the current code works fine
            $("input").on("input", function () {
                $(this).closest('div').removeClass('textField-error-input')
            })
        });

        function showErrorBox(message) {
            $('#errorID span').text(message)
            $("#errorMessageDiv").removeClass("hidden").animate({right: 34}, 1000, function () {
                $(this).delay(1000).fadeOut();
            });
        }

    };

</script>
</html>
