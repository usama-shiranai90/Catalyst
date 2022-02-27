<?php
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DIM\UserInterface.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DIM\User.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DIM\Student.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DIM\Section.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\Midterm.php";
require_once $_SERVER['DOCUMENT_ROOT']."\Modules\autoloader.php";

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
    array_push($regNumbers, $currentStudent->getStudentRegistrationCode());
    array_push($names, $currentStudent->getStudentName());
}


$numberOfStudents = sizeof($regNumbers);
$numberOfMidtermQuestion = $_SESSION['numberOfMidtermQuestions'];
$marksOfMidtermQuestions = $_SESSION['marksOfMidtermQuestions'];
$detailOfMidtermQuestions = $_SESSION['detailOfMidtermQuestions'];

$editingMode = false;
//following condition would be true when we are editing marks because only then we would have sessionalID

if (isset($_GET['midtermID'])) {
    $editingMode = true;
//    Run a query to get marks of each student, it should return a 2D array of student roll numbers and marks in each question
    $studentObtainedMarks = array();
    $midterm = new Midterm();

    foreach ($listOfStudents as $currentStudent) {
        array_push($studentObtainedMarks, $midterm->getStudentMarksInActivity($_GET['midtermID'], $currentStudent->getStudentRegistrationCode()));
    }

//    print_r($studentObtainedMarks);


    if (isset($_POST['updateMidtermMarksUpdate'])) {
        $midtermObtainedMarks = $_POST['midtermObtainedMarks'];


        $midterm = new Midterm();
        foreach ($regNumbers as $singleStudentRegNum) {
//            echo "Student";
            $midterm->updateStudentMarksInActivity($singleStudentRegNum, $_GET['midtermID'], $midtermObtainedMarks[$singleStudentRegNum]);
        }

        header("Location: viewMidtermStudentList.php?midtermID=" . $_GET['midtermID']);
    }

} 

else {
    $studentObtainedMarks = "";
}


if (isset($_POST['submitMidtermMarks'])) {
    $midtermObtainedMarks = $_POST['midtermObtainedMarks'];

    //    We are getting the data in array, now we'll pass it into database
    $midterm = new Midterm();
    /********************* Getting code for latest inserted activity ******************/
    $latestActivityCode = $midterm->getLatestActivityCode();

//    print_r($midtermObtainedMarks);

    foreach ($regNumbers as $singleStudentRegNum) {
//        echo "Student";
        $midterm->enterStudentMarksForActivity($singleStudentRegNum, $latestActivityCode, $midtermObtainedMarks[$singleStudentRegNum]);
    }

    header("Location: midTermDashboard.php");
}


if (isset($_POST['cancelMidtermMarksUpdate'])) {
    header("Location: viewMidterm.php?midtermID=" . $_GET['midtermID']);
}


if (isset($_POST['cancelMidtermMarks'])) {
    header("Location: midTermDashboard.php");
}
?>

<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Catalyst - Midterm Student List</title>
    <link href='../../../../Assets/Stylesheets/Master.css' rel='stylesheet'>
    <link href='../../../../Assets/Stylesheets/Tailwind.css' rel='stylesheet'>
    <link href='MidtermAssets/MidtermStyles.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
<div class='m-5 border border-gray-300 border-opacity-100 rounded-md'>
    <div class='font-bold text-lg text-center mt-2 mb-2'>Midterm Students Marks List</div>

    <form method="post">
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

        <div id="submitMidtermMarksDivID" class='mt-5 mb-1 flex justify-end pr-5'>
            <button class='rounded-md text-white p-1 text-sm w-28 bg-gray-400 mr-5' type="submit"
                    id='cancelMidtermMarksBtnID'
                    name='cancelMidtermMarks'>
                Cancel
            </button>

            <button class='rounded-md text-white p-1 text-sm w-28' type="submit" id='submitMidtermMarksBtnID'
                    name='submitMidtermMarks'>
                Submit
            </button>
        </div>
        <div id="updateMidtermMarksDivID" class='mt-5 mb-1 flex justify-end pr-5'>
            <button class='rounded-md text-white p-1 text-sm w-28 bg-gray-400 mr-5' type="submit"
                    name='cancelMidtermMarksUpdate'>
                Cancel
            </button>

            <button class='rounded-md text-white p-1 text-sm w-28' type="submit" id="updateMidtermMarksUpdateID"
                    name='updateMidtermMarksUpdate'>
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
        $('#submitMidtermMarksDivID').addClass('hidden')
    } else {
        $('#updateMidtermMarksDivID').addClass('hidden')
    }
</script>

<script>

    //    Getting number of questions in the sessional
    let numberOfQuestions = <?php echo json_encode($numberOfMidtermQuestion);?>;

    //Getting number of students in class
    let numberOfStudents = <?php echo json_encode($numberOfStudents);?>;

    //Getting registration numbers of students in class
    let studentRegistrationNumbers = <?php echo json_encode($regNumbers);?>;

    //Getting names of students in class
    let studentNames = <?php echo json_encode($names);?>;

    //Getting marks of each question
    let marksOfEachQuestion = <?php echo json_encode($marksOfMidtermQuestions);?>;


    //Getting detail of each question
    let detailOfEachQuestion = <?php echo json_encode($detailOfMidtermQuestions);?>;

    //Getting obtained marks of each question
    let studentMarksList = <?php echo json_encode($studentObtainedMarks); ?>;

    let teacherMidtermStudentListTableHead = document.getElementById("teacherViewMidtermStudentListTableHeadID")
    let teacherStudentMarksInputRow = document.getElementById("teacherStudentMarksInputRowID")
    let teacherMidtermStudentListTableBody = document.getElementById("teacherViewMidtermStudentListTableBodyID")
    let submitMidtermMarksBtn = document.getElementById("submitMidtermMarksBtnID")
    let updateMidtermMarksUpdate = document.getElementById("updateMidtermMarksUpdateID")
    let containsErrors = false;

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

            // studentRegNo = document.getElementById(midtermRegNoID).innerText; //returns F18-BCSE-018
            // let rollNo = studentRegNo.slice(studentRegNo.length - 3) //returns 018
            let rollNo = document.getElementById(midtermRegNoID).innerText;//returns 018

            if (Array.isArray(studentMarksList)) {
                createInputsWithAutofilledMarks(rowID, numberOfQuestions, rollNo, studentMarksList[i]) + "</tr>"
            } else
                createQuestionNumberInputInaRow(rowID, numberOfQuestions, rollNo) + "</tr>";

        }
    }

    //function createQuestionNumberInputInaRow creates inputs for each question for all students
    //This function is called when we enter marks immediately after creating midterm
    function createQuestionNumberInputInaRow(rowID, numberOfQuestions, rollNo) {

        for (let i = 0; i < numberOfQuestions; i++) {
            document.getElementById(rowID).innerHTML += "<td class='mt-3 mb-2'>"
                + "<div class='textField-label-content' id='marksTextFields" + (i + 1) + rollNo + "DivID'>"
                + "<label class='hidden'>" + marksOfEachQuestion[i] + "</label>"
                + "<input class='textField' type='number' min='0' placeholder=' ' id='midterm[" + rollNo + "][question" + (i + 1) + "]ID' name='midtermObtainedMarks[" + rollNo + "][question" + (i + 1) + "]'>"
                + "<label class='textField-label'>Marks Out of " + marksOfEachQuestion[i] + "</label>"
                + "</div>"
                + "</td>"
        }
    }

    //This function is called when we edit marks, thi function gives autofilled marks
    function createInputsWithAutofilledMarks(rowID, numberOfQuestions, rollNo, studentMarksList) {
        // alert(marksOfEachQuestion)
        // alert(detailOfEachQuestion)


        for (let i = 0; i < numberOfQuestions; i++) {
            document.getElementById(rowID).innerHTML += "<td class='mt-3 mb-2'>"
                + "<div class='textField-label-content' id='marksTextFields" + rollNo + "DivID'>"
                + "<label class='hidden'>" + marksOfEachQuestion[i] + "</label>"
                + "<input class='textField' type='number' value='" + studentMarksList[i] + "'  placeholder=' ' id='midterm[" + rollNo + "][question" + (i + 1) + "]ID' name='midtermObtainedMarks[" + rollNo + "][question" + (i + 1) + "]'>"
                + "<label class='textField-label'>Marks Out of " + marksOfEachQuestion[i] + "</label>"
                + "</div>"
                + "</td>"
        }
    }

    window.onload = function () {
        createQuestionNumberHeaders(numberOfQuestions);
        createStudentRows(numberOfStudents)

        $(document).ready(function () {

            $(submitMidtermMarksBtn).add(updateMidtermMarksUpdate).click(function (event) {

                $("input").each(function (event) {
                    if ($(this).val() != "") {
                        containsErrors = false
                    }
                })

                $("input").each(function (event) {
                    if ($(this).val() == "" || $(this).val() < 0 || $(this).val() > parseInt($(this).siblings('label').text())) {
                        containsErrors = true
                        $(this).closest('div').addClass('textField-error-input')
                        showErrorBox("Please enter values in the specified range")
                    }
                })

                if (containsErrors)
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
