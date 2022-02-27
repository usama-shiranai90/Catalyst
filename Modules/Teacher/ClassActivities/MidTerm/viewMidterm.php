<?php
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\ClassActivities\Midterm.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\Midterm.php";

require_once $_SERVER['DOCUMENT_ROOT']."\Modules\autoloader.php";

session_start();

if (isset($_GET['midtermID'])) {
//    perform a DB query and get details of the midterm and store into arrays below
//    $midtermData = ["Quiz", "Firebase", "Blahhh", "10", "5"];
//    $viewMidtermQuestionData = [["Fill in the blanks", "5", "CLO 1"], ["Fill uhukjhkjhkin the blanks", "5", "CLO 1"]];

    $midtermID = $_GET['midtermID'];

    $midterm = new Midterm();
    $retrievedMidterm = $midterm->getActivity($midtermID);


    $midtermData = array();
    $viewMidtermQuestionData = array();

    array_push($midtermData, $retrievedMidterm->getTopic());
    array_push($midtermData, $retrievedMidterm->getTitle());
    array_push($midtermData, $retrievedMidterm->getTotalMarks());
    array_push($midtermData, $retrievedMidterm->getWeightage());
    $viewMidtermQuestionData = $retrievedMidterm->getListOfQuestions();



    $marksOfQuestions = [];
    $detailOfQuestions = [];

    foreach ($viewMidtermQuestionData as $midtermQuestion) {
        array_push($marksOfQuestions, $midtermQuestion[2]);
        array_push($detailOfQuestions, $midtermQuestion[1]);
    }

    $_SESSION['marksOfMidtermQuestions'] = $marksOfQuestions;
    $_SESSION['detailOfMidtermQuestions'] = $detailOfQuestions;
    $_SESSION['numberOfMidtermQuestions'] = sizeof($viewMidtermQuestionData);

    if (isset($_POST["editMidtermDetails"])) {
        header("Location: midTermDivision.php?midtermID=" . $_GET['midtermID']);
    } elseif (isset($_POST["viewMidtermMarks"])) {
        header("Location: viewMidtermStudentList.php?midtermID=" . $_GET['midtermID']);
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalyst - View Midterm</title>
    <link href="../../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <link href="../../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="MidtermAssets/MidtermStyles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="MidtermAssets/viewMidtermScript.js"></script>
    <style>
        label {
            display: block;
        }

        table tr td:first-child {
            width: 25%;
        }
    </style>

</head>
<script>
    let midtermData = <?php echo json_encode($midtermData);?>;
    let viewMidtermQuestionData = <?php echo json_encode($viewMidtermQuestionData);?>;
</script>

<body>

<div id="viewMidtermDivID" class="m-5 border border-gray-300 border-opacity-100 rounded-md">
    <div class="p-3 text-center">
        <label class="font-bold text-lg p-5 block">Midterm</label>
        <div class="grid grid-cols-12">
            <div class="col-span-5 pt-5">

                <div class="mr-3">
                    <table class="w-full">

                        <!--                    Topic-->
                        <tr>
                            <td>
                                <label class="font-sans text-md text-gray-500 font-bold font-bold m-2 text-left ">Topic</label>
                            </td>
                            <td>
                                <label class="m-2 font-sans text-md text-gray-500 text-left"
                                       id="viewMidtermTopicID"></label>
                            </td>
                        </tr>

                        <!--                    Title-->
                        <tr>
                            <td>
                                <label class="font-sans text-md text-gray-500 font-bold font-bold m-2 text-left">Title</label>
                            </td>
                            <td>
                                <label class="m-2 font-sans text-md text-gray-500" id="viewMidtermTitleID"></label>
                            </td>
                        </tr>

                        <!--                    Total Marks-->
                        <tr>
                            <td>
                                <label class=" font-sans text-md text-gray-500 font-bold font-bold m-2 text-left">Total
                                    Marks</label>
                            </td>
                            <td>
                                <label class="m-2 font-sans text-md text-gray-500" id="viewMidtermTotalMarksID"></label>
                            </td>
                        </tr>

                        <!--                    Assign Weightage-->
                        <tr>
                            <td>
                                <label class="font-sans text-md text-gray-500 font-bold font-bold m-2 text-left">Weightage</label>
                            </td>
                            <td>
                                <label class="m-2 font-sans text-md text-gray-500" id="viewMidtermWeightageID"></label>
                            </td>
                        </tr>

                    </table>
                </div>

            </div>

            <!--            Questions Div-->
            <div class="col-span-7 rounded-2xl border-gray-400 border border-opacity-100">
                <div class="rounded-t-2xl" style="background-color: #0184FC; color: white"> Details of Questions
                </div>
                <div class="p-3">
                    <table class="w-full">
                        <thead class="w-full font-sans font-bold text-md text-gray-500">
                        <th class="">Questions</th>
                        <th class="w-3/6">Details</th>
                        <th class="">Marks</th>
                        <th class="">CLO</th>
                        </thead>
                        <tbody class="font-sans text-md text-gray-500" id="midtermViewQuestionsTBodyID">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--        Buttons-->
        <form method="post">
            <div class='mt-5 mb-1 flex justify-end pr-5'>
                <button class='rounded-md text-white p-1 text-sm w-28 mr-5 cursor-pointer' id='editMidtermMarksBtnID'
                        name='editMidtermDetails'>
                    Edit
                </button>
                <button class='rounded-md text-white p-1 text-sm w-28 cursor-pointer' id='viewMidtermMarksBtnID'
                        name='viewMidtermMarks'>
                    View Marks
                </button>
            </div>
        </form>

    </div>
</div>
</body>
</html>
<script>

    let editMidtermMarksBtn = document.getElementById("editMidtermMarksBtnID")
    let viewMidtermMarksBtn = document.getElementById("viewMidtermMarksBtnID")

    $(document).ready(function () {
        // $("#viewMTypeID").text(sessionalData[0])
        // $("#viewMidtermTopicID").text(midtermData[1])
        // $("#viewMidtermTitleID").text(midtermData[2])
        // $("#viewMidtermTotalMarksID").text(midtermData[3])
        // $("#viewMidtermWeightageID").text(midtermData[4])
        $("#viewMidtermTopicID").text(midtermData[0])
        $("#viewMidtermTitleID").text(midtermData[1])
        $("#viewMidtermTotalMarksID").text(midtermData[2])
        $("#viewMidtermWeightageID").text(midtermData[3])
    });
</script>