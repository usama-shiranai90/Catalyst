<?php
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DIM\UserInterface.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DIM\User.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DIM\Student.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DIM\Section.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\FinalExam.php";
require_once $_SERVER['DOCUMENT_ROOT']."\Modules\autoloader.php";

session_start();

$selectedCourse = $_SESSION['selectedCourse'];
$selectedSemester = $_SESSION['selectedSemester'];
$selectedSection = $_SESSION['selectedSection'];

/**************************************** Getting Students who are in the selected section and enrolled in selected course *******************************/
$section = new Section();
$listOfStudents = $section->setListOfStudentsInSectionInCourse($selectedSection, $selectedCourse);

//Getting registrationNumbers and names from database
//    run a query for studentsrollnumbers and names
//$regNumbers = ["F18-BCSE-001", "F18-BCSE-002", "F18-BCSE-003", "F18-BCSE-004"];
//$names = ["ABC", "DEF", "GHI", "JKL"];

$regNumbers = array();
$names = array();

foreach ($listOfStudents as $currentStudent) {
    array_push($regNumbers, $currentStudent->getStudentRegistrationCode());
    array_push($names, $currentStudent->getStudentName());
}

$numberOfStudents = sizeof($regNumbers);

$numberOfQuestion = $_SESSION['numberOfFinalExamQuestions'];
$marksOfQuestions = $_SESSION['marksOfFinalExamQuestions'];
$detailOfQuestions = $_SESSION['detailOfFinalExamQuestions'];
//print_r($detailOfQuestions);
//echo "<br>";

if (isset($_GET['finalExamID'])) {

//    Run a query to get marks of each student, it should return a 2D array of student roll numbers and marks in each question
//    $studentObtainedMarks = [[1, 2], [1, 2], [1, 2], [1, 2]];
    $studentObtainedMarks = array();
    $finalExam = new FinalExam();

    foreach ($listOfStudents as $currentStudent) {
//        echo "Student";
        array_push($studentObtainedMarks, $finalExam->getStudentMarksInActivity($_GET['finalExamID'], $currentStudent->getStudentRegistrationCode()));
//        print_r($studentObtainedMarks);
    }

} else {
    $studentObtainedMarks = "";
}

if (isset($_POST['editFinalExamMarks'])) {
    header("Location: finalExamStudentList.php?finalExamID=" . $_GET['finalExamID']);
}

?>

<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Catalyst - View Final Exam Student List</title>
    <link href='../../../../Assets/Stylesheets/Master.css' rel='stylesheet'>
    <link href='../../../../Assets/Stylesheets/Tailwind.css' rel='stylesheet'>
    <link href='FinalExamAssets/FinalExamStyles.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
<div class='m-5 border border-gray-300 border-opacity-100 rounded-md'>
    <div class='font-bold text-lg text-center mt-2 mb-2'>Final Exam Students Marks List</div>

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
    <form method="post">

        <div class='mt-5 mb-1 flex justify-end pr-5'>
            <button class='rounded-md text-white p-1 text-sm w-28 cursor-pointer' id='editFinalExamMarksBtnID'
                    name='editFinalExamMarks'>
                Edit
            </button>
        </div>
    </form>

</div>
</body>
<script>
    //    Getting number of questions in the sessional
    let numberOfQuestions = <?php echo json_encode($numberOfQuestion);?>;
    //Getting number of students in class
    let numberOfStudents = <?php echo json_encode($numberOfStudents);?>;

    //Getting registration numbers of students in class
    let studentRegistrationNumbers = <?php echo json_encode($regNumbers);?>;

    //Getting names of students in class
    let studentNames = <?php echo json_encode($names);?>;

    //Getting marks of each question
    let marksOfEachQuestion = <?php echo json_encode($marksOfQuestions); ?>;

    //Getting detail of each question
    let detailOfEachQuestion = <?php echo json_encode($detailOfQuestions); ?>;

    //Getting obtained marks of each question
    let studentMarksList = <?php echo json_encode($studentObtainedMarks); ?>;

    let teacherFinalExamStudentListTableHead = document.getElementById("teacherViewFinalExamStudentListTableHeadID")
    let teacherFinalExamStudentListTableBody = document.getElementById("teacherViewFinalExamStudentListTableBodyID")


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

            studentRegNo = document.getElementById(finalExamRegNoID).innerText; //returns F18-BCSE-018

            createQuestionNumberLabelsInaRow(rowID, numberOfQuestions, studentMarksList[i]) + "</tr>";
        }
    }

    function createQuestionNumberLabelsInaRow(rowID, numberOfQuestions, obtainedMarksOfStudent) {
        for (let i = 0; i < numberOfQuestions; i++) {
            document.getElementById(rowID).innerHTML += "<td class='mt-3 mb-2'>"
                + "<label>" + obtainedMarksOfStudent[i] + "</label>"
                + "</td>"
        }
    }

    window.onload = function () {
        createQuestionNumberHeaders(numberOfQuestions);
        createStudentRows(numberOfStudents)
    }

</script>
</html>
