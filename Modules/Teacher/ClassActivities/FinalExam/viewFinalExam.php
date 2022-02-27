<?php
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\ClassActivities\FinalExam.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\FinalExam.php";
require_once $_SERVER['DOCUMENT_ROOT']."\Modules\autoloader.php";

session_start();

if (isset($_GET['finalExamID'])) {
//    perform a DB query and get details of the finalExam and store into arrays below
//    $finalExamData = ["Quiz", "Firebase", "Blahhh", "10", "5"];
//    $viewFinalExamQuestionData = [["Fill in the blanks", "5", "CLO 1"], ["Fill uhukjhkjhkin the blanks", "5", "CLO 1"]];


    $finalExamID = $_GET['finalExamID'];

    $finalExam = new FinalExam();
    $retrievedFinalExam = $finalExam->getActivity($finalExamID);


    $finalExamData = array();
    $viewFinalExamQuestionData = array();

    array_push($finalExamData, $retrievedFinalExam->getTopic());
    array_push($finalExamData, $retrievedFinalExam->getTitle());
    array_push($finalExamData, $retrievedFinalExam->getTotalMarks());
    array_push($finalExamData, $retrievedFinalExam->getWeightage());
    $viewFinalExamQuestionData = $retrievedFinalExam->getListOfQuestions();


    $marksOfQuestions = [];
    $detailOfQuestions = [];

    foreach ($viewFinalExamQuestionData as $finalExamQuestion) {
        array_push($detailOfQuestions, $finalExamQuestion[1]);
        array_push($marksOfQuestions, $finalExamQuestion[2]);
    }

    $_SESSION['marksOfFinalExamQuestions'] = $marksOfQuestions;
    $_SESSION['detailOfFinalExamQuestions'] = $detailOfQuestions;
    $_SESSION['numberOfFinalExamQuestions'] = sizeof($viewFinalExamQuestionData);
//    print_r($detailOfQuestions);

    if (isset($_POST["editFinalExamDetails"])) {
        header("Location: finalExamDivision.php?finalExamID=" . $_GET['finalExamID']);
    }
    elseif (isset($_POST["viewFinalExamMarks"])) {
        header("Location: viewFinalExamStudentList.php?finalExamID=" . $_GET['finalExamID']);
    }
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalyst - View Final Exam</title>
    <link href="../../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <link href="../../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="FinalExamAssets/FinalExamStyles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="FinalExamAssets/viewFinalExamScript.js"></script>
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
    let finalExamData = <?php echo json_encode($finalExamData);?>;
    let viewFinalExamQuestionData = <?php echo json_encode($viewFinalExamQuestionData);?>;
</script>

<body>

<div id="viewFinalExamDivID" class="m-5 border border-gray-300 border-opacity-100 rounded-md">
    <div class="p-3 text-center">
        <label class="font-bold text-lg p-5 block">Final Exam</label>
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
                                       id="viewFinalExamTopicID"></label>
                            </td>
                        </tr>

                        <!--                    Title-->
                        <tr>
                            <td>
                                <label class="font-sans text-md text-gray-500 font-bold font-bold m-2 text-left">Title</label>
                            </td>
                            <td>
                                <label class="m-2 font-sans text-md text-gray-500" id="viewFinalExamTitleID"></label>
                            </td>
                        </tr>

                        <!--                    Total Marks-->
                        <tr>
                            <td>
                                <label class=" font-sans text-md text-gray-500 font-bold font-bold m-2 text-left">Total
                                    Marks</label>
                            </td>
                            <td>
                                <label class="m-2 font-sans text-md text-gray-500"
                                       id="viewFinalExamTotalMarksID"></label>
                            </td>
                        </tr>

                        <!--                    Assign Weightage-->
                        <tr>
                            <td>
                                <label class="font-sans text-md text-gray-500 font-bold font-bold m-2 text-left">Weightage</label>
                            </td>
                            <td>
                                <label class="m-2 font-sans text-md text-gray-500"
                                       id="viewFinalExamWeightageID"></label>
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
                        <tbody class="font-sans text-md text-gray-500" id="finalExamViewQuestionsTBodyID">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--        Buttons-->
        <form method="post">

            <div class='mt-5 mb-1 flex justify-end pr-5'>
                <button class='rounded-md text-white p-1 text-sm w-28 mr-5 cursor-pointer' id='editFinalExamDetails'
                        name='editFinalExamDetails'>
                    Edit
                </button>
                <button class='rounded-md text-white p-1 text-sm w-28 cursor-pointer' id='viewFinalExamMarksBtnID'
                        name='viewFinalExamMarks'>
                    View Marks
                </button>
            </div>
        </form>

    </div>
</div>
</body>
</html>
<script>

    let editFinalExamMarksBtn = document.getElementById("editFinalExamMarksBtnID")
    let viewFinalExamMarksBtn = document.getElementById("viewFinalExamMarksBtnID")

    $(document).ready(function () {
        // $("#viewMTypeID").text(sessionalData[0])
        $("#viewFinalExamTopicID").text(finalExamData[0])
        $("#viewFinalExamTitleID").text(finalExamData[1])
        $("#viewFinalExamTotalMarksID").text(finalExamData[2])
        $("#viewFinalExamWeightageID").text(finalExamData[3])

    });
</script>
