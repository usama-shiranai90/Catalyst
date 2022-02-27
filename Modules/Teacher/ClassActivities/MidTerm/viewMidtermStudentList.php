<?php
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DIM\UserInterface.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DIM\User.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DIM\Student.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DIM\Section.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\ClassActivities\Midterm.php";
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

$numberOfQuestion = $_SESSION['numberOfMidtermQuestions'];
$marksOfQuestions = $_SESSION['marksOfMidtermQuestions'];
$detailOfQuestions = $_SESSION['detailOfMidtermQuestions'];


if (isset($_GET['midtermID'])) {

//    Run a query to get marks of each student, it should return a 2D array of student roll numbers and marks in each question
//    $studentObtainedMarks = [[1, 2], [1, 2], [1, 2], [1, 2]];
    $studentObtainedMarks = array();
    $midterm = new Midterm();

    foreach ($listOfStudents as $currentStudent) {
//        echo "Student";
        array_push($studentObtainedMarks, $midterm->getStudentMarksInActivity($_GET['midtermID'], $currentStudent->getStudentRegistrationCode()));
//        print_r($studentObtainedMarks);
    }

} else {
    $studentObtainedMarks = "";
}

if (isset($_POST['editMidtermMarks'])) {
    header("Location: midTermStudentList.php?midtermID=".$_GET['midtermID']);
}

?>

<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Catalyst - View Midterm Student List</title>
    <link href='../../../../Assets/Stylesheets/Master.css' rel='stylesheet'>
    <link href='../../../../Assets/Stylesheets/Tailwind.css' rel='stylesheet'>
    <link href='MidtermAssets/MidtermStyles.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
<div class='m-5 border border-gray-300 border-opacity-100 rounded-md'>
    <div class='font-bold text-lg text-center mt-2 mb-2'>Midterm Students Marks List</div>

    <div class='flex justify-evenly text-center' id='teacherMidtermStudentListDivID'>


        <table class='w-full' style='table-layout: fixed; width: 100%'>
            <thead id=''
                   class='h-12 border border-t-1 border-b-1 border-r-0 border-l-0 border-gray-400 border-opacity-100'
                   style='background-color: #F4F8F9'>
            <tr id='teacherViewMidtermStudentListTableHeadID'>
                <th>REG NO</th>
                <th>Name</th>
            </tr>

            </thead>
            <tbody id="teacherViewMidtermStudentListTableBodyID" class='w-full'
                   style='table-layout: fixed; width: 100%'>
            </tbody>

        </table>
    </div>
    <form method="post">

        <div class='mt-5 mb-1 flex justify-end pr-5'>
            <button class='rounded-md text-white p-1 text-sm w-28 cursor-pointer' id='editMidtermMarksBtnID'
                    name='editMidtermMarks'>
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

    let teacherMidtermStudentListTableHead = document.getElementById("teacherViewMidtermStudentListTableHeadID")
    let teacherMidtermStudentListTableBody = document.getElementById("teacherViewMidtermStudentListTableBodyID")


    function createQuestionNumberHeaders(numberOfQuestions) {
        for (let i = 0; i < numberOfQuestions; i++) {
            teacherMidtermStudentListTableHead.innerHTML += "<th>Q" + (i + 1) + "<br>" + detailOfEachQuestion[i] + "</th>"
        }
    }

    function createStudentRows(numberOfStudents) {
        let rowID = ""
        let midtermRegNoID = ""
        for (let i = 0; i < numberOfStudents; i++) {
            rowID = "teacherStudentMarksInputRowID" + (i + 1);
            midtermRegNoID = "teacherMidtermListRegNo" + (i + 1);

            teacherMidtermStudentListTableBody.innerHTML +=
                "<tr id='" + rowID + "' class='h-20 border-b border-gray-300 border-opacity-100 text-center'>"
                + "<td>"
                + "<label id='" + midtermRegNoID + "'>" + studentRegistrationNumbers[i] + "</label>"
                + "</td>"
                + "<td>"
                + "<label>" + studentNames[i] + "</label>"
                + "</td>";

            studentRegNo = document.getElementById(midtermRegNoID).innerText; //returns F18-BCSE-018

            createQuestionNumberLabelsInaRow(rowID, numberOfQuestions, studentMarksList[i]) + "</tr>";
        }
    }

    function createQuestionNumberLabelsInaRow(rowID, numberOfQuestions, obtainedMarksOfStudent) {
        for (let i = 0; i < numberOfQuestions; i++) {
            document.getElementById(rowID).innerHTML += "<td class='mt-3 mb-2'>"
                + "<label id='viewMidtermQuestionMarksLabelID'>" + obtainedMarksOfStudent[i] + "</label>"
                + "</td>"

        }
    }

    window.onload = function () {
        createQuestionNumberHeaders(numberOfQuestions);
        createStudentRows(numberOfStudents)
    }

</script>
</html>
