<?php
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\Sessional.php";
require_once $_SERVER['DOCUMENT_ROOT']."\Modules\autoloader.php";


session_start();

if (isset($_GET['sessionalID'])) {
//    perform a DB query and get details of the sessional and store into arrays below

    $sessionalID = $_GET['sessionalID'];

    $sessional = new Sessional();
    $retrievedSessional = $sessional->getActivity($sessionalID);


    $sessionalData = array();
    $viewSessionalQuestionData = array();

    array_push($sessionalData, $retrievedSessional->getActivitySubType());
    array_push($sessionalData, $retrievedSessional->getTopic());
    array_push($sessionalData, $retrievedSessional->getTitle());
    array_push($sessionalData, $retrievedSessional->getTotalMarks());
    array_push($sessionalData, $retrievedSessional->getWeightage());
//    array_push($sessionalData, $retrievedSessional->getNumberOfQuestions());
    $viewSessionalQuestionData = $retrievedSessional->getListOfQuestions();

//    $sessionalData = ["Quiz", "Firebase", "Blahhh", "10", "5"];
//    $viewSessionalQuestionData2 = [["Fill in the blanks", "5", "CLO 2"], ["Fill uhukjhkjhkin the blanks", "5", "CLO 1"]];


    $marksOfQuestions = [];
    $detailOfQuestions = [];

    foreach ($viewSessionalQuestionData as $sessionalQuestion) {
        array_push($marksOfQuestions, $sessionalQuestion[2]);
        array_push($detailOfQuestions, $sessionalQuestion[1]);
    }

    $_SESSION['marksOfQuestions'] = $marksOfQuestions;
    $_SESSION['detailOfQuestions'] = $detailOfQuestions;
    $_SESSION['numberOfQuestionsName'] = sizeof($viewSessionalQuestionData);

    if (isset($_POST["editSessionalDetails"])) {
        header("Location: addNewSessional.php?sessionalID=" . $_GET['sessionalID']);
    } elseif (isset($_POST["viewSessionalMarks"])) {
        header("Location: viewSessionalStudentList.php?sessionalID=" . $_GET['sessionalID']);
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalyst - View Sessional</title>
    <link href="../../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <link href="../../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="SessionalAssets/SessionalStyles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="SessionalAssets/ViewSessionalScript.js"></script>
    <style>
        label {
            display: block;
        }

        table tr td:first-child {
            width: 25%;
        }
    </style>

</head>
<!--//Hannan's Work-->
<script>
    let sessionalData = <?php echo json_encode($sessionalData);?>;
    let viewSessionalQuestionData = <?php echo json_encode($viewSessionalQuestionData);?>;
</script>

<body>
<div id="viewSessionalDivID" class="m-5 border border-gray-300 border-opacity-100 rounded-md">
    <div class="p-3 text-center">
        <label class="font-bold text-lg p-5 block">View Sessional</label>
        <div class="grid grid-cols-12">
            <div class="col-span-5 pt-5">
                <div class="mr-3">
                    <table class="w-full">
                        <!--                    Sessional Type-->
                        <tr>
                            <td>
                                <label class="font-sans text-md text-gray-500 font-bold m-2 text-left">Sessional
                                    Type</label>
                            </td>
                            <td>
                                <label class="m-2 font-sans text-md text-gray-500" id="viewSessionalTypeID"></label>
                            </td>
                        </tr>

                        <!--                    Topic-->
                        <tr>
                            <td>
                                <label class="font-sans text-md text-gray-500 font-bold font-bold m-2 text-left ">Topic</label>
                            </td>
                            <td>
                                <label class="m-2 font-sans text-md text-gray-500 text-left"
                                       id="viewSessionalTopicID"></label>
                            </td>
                        </tr>

                        <!--                    Title-->
                        <tr>
                            <td>
                                <label class="font-sans text-md text-gray-500 font-bold font-bold m-2 text-left">Title</label>
                            </td>
                            <td>
                                <label class="m-2 font-sans text-md text-gray-500" id="viewSessionalTitleID"></label>
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
                                       id="viewSessionalTotalMarksID"></label>
                            </td>
                        </tr>

                        <!--                    Assign Weightage-->
                        <tr>
                            <td>
                                <label class="font-sans text-md text-gray-500 font-bold font-bold m-2 text-left">Weightage</label>
                            </td>
                            <td>
                                <label class="m-2 font-sans text-md text-gray-500"
                                       id="viewSessionalWeightageID"></label>
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
                        <tbody class="font-sans text-md text-gray-500" id="sessionalViewQuestionsTBodyID">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--        Buttons-->
        <form method="post">
            <div class='mt-5 mb-1 flex justify-end pr-5'>
                <button class='rounded-full text-white p-1 text-sm w-28 mr-5 cursor-pointer'
                        id='editSessionalDetailsBtnID'
                        name='editSessionalDetails'>
                    Edit
                </button>
                <button class='rounded-full text-white p-1 text-sm w-28 cursor-pointer' id='viewSessionalMarksBtnID'
                        name='viewSessionalMarks'>
                    View Marks
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<script>

    let editSessionalMarksBtn = document.getElementById("editSessionalDetailsBtnID")
    let viewSessionalMarksBtn = document.getElementById("viewSessionalMarksBtnID")

    $(document).ready(function () {
        $("#viewSessionalTypeID").text(sessionalData[0])
        $("#viewSessionalTopicID").text(sessionalData[1])
        $("#viewSessionalTitleID").text(sessionalData[2])
        $("#viewSessionalTotalMarksID").text(sessionalData[3])
        $("#viewSessionalWeightageID").text(sessionalData[4])
    });
</script>