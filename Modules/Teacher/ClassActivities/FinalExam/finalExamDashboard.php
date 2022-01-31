<?php
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\FinalExam.php";

session_start();

$selectedCourse = $_SESSION['selectedCourse'];
$selectedSemester = $_SESSION['selectedSemester'];
$selectedSection = $_SESSION['selectedSection'];

$finalExam = new finalExam();
$retrievedFinalExam = $finalExam->getFinalExam($selectedSection, $selectedCourse);

$finalExamTitle = array();
$finalExamID = array();
$numberOfQuestionsInFinalExam = array();
$finalExamCLOList = array();

if ($retrievedFinalExam != null) {
    foreach ($retrievedFinalExam as $currentFinalExam) {
        array_push($finalExamTitle, $currentFinalExam->getTitle());
        array_push($finalExamID, $currentFinalExam->getActivityCode());
        array_push($numberOfQuestionsInFinalExam, $currentFinalExam->getNumberOfQuestions());
    }
    $finalExamCLOList = $currentFinalExam->getListOfMappedCLOs();
}

$totalProposedWeightageForFinalExam = 50;
$accumulatedWeightageForFinalExam = $finalExam->getAccumulatedFinalExamWeightage($selectedSection, $selectedCourse);

$showAddButton = "";
if($accumulatedWeightageForFinalExam == 50){
    $showAddButton = "hidden";
}
?>

<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Catalyst - Final Exam Dashboard</title>
    <link href='../../../../Assets/Stylesheets/Tailwind.css' rel='stylesheet'>
    <link href='FinalExamAssets/FinalExamStyles.css' rel='stylesheet'>
    <!--    <link href='FinalExamAssets/finalExamDashboardScript.js' rel='stylesheet'>-->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

</head>
<body class='m-5'>

<div class="relative" id="teacherFinalExamDashboardID">
    <div class='m-5 p-3'>

        <!--        Marks Shower-->
        <div class='bg-gradient-to-r from-blue-100 to-white flex justify-end items-center'>

            <label class='text-center'>Covered<br>Weightage</label>

            <div class='w-32 rounded-lg h-3.5 ml-2' style='background-color: #adb5bd'>
                <div id="finalExamProgressBarID" class='w-14 h-3.5 rounded-lg' style='background-color: #3D85D8'></div>
            </div>
            <div class='text-center ml-2'>
                <label id="accumulatedWeightageForFinalExamID"></label>
                <svg width='69' height='11' viewBox='0 0 69 11' fill='none' xmlns='http://www.w3.org/2000/svg'>
                    <path d='M67.9834 9.5C67.9834 9.5 65.2461 -0.810544 55.7461 1.50011C46.2461 3.81076 47.6636 10.0364 33.15 3.03038C18.6365 -3.9757 17.102 20.9999 1.00035 1.50011'
                          stroke='url(#paint0_linear_189_3981)' stroke-width='2' stroke-linecap='round'
                          stroke-linejoin='round'/>
                    <defs>
                        <linearGradient id='paint0_linear_189_3981' x1='-3.17485' y1='-5.31219' x2='2.16068'
                                        y2='26.5112' gradientUnits='userSpaceOnUse'>
                            <stop stop-color='#A330FF' stop-opacity='0.01'/>
                            <stop offset='1' stop-color='#F97298'/>
                        </linearGradient>
                    </defs>
                </svg>

                <label>50</label>
            </div>
        </div>


        <!--        Assignments-->
        <div>
            <!--            Heading-->
            <div class='text-center text-2xl font-bold p-5'>
                <label>Final Exam</label>
            </div>


            <!--            FinalExam Boxes-->
            <div class='flex justify-center' id='teacherFinalExamContainerID'>
            </div>


            <!--            Adding Addition Button-->
            <div class='flex justify-center pt-8 pb-8 <?php echo $showAddButton;?>'>
                <img class="cursor-pointer" name="addNewFinalExamBtn" src="../../../../Assets/Images/vectorFiles/Icons/plus.svg">
            </div>
        </div>
    </div>
</div>

<div id="deleteConfirmDialogueBoxID" class="flex justify-center fixed w-full hidden" style="top: 35%">
    <div class="w-1/3 rounded-xl p-5 border border-opacity-100 border-gray-300 bg-white">
        <div class="font-bold text-center">
            <label id="finalExamDeletionLabel">Deleting Quiz</label>
        </div>
        <hr>
        <div class="mt-4 text-center">Are you sure you want to delete all of it's data?
        </div>

        <div class='mt-5 mb-1 flex justify-between'>
            <button class='rounded-md text-white p-1 text-sm w-28 bg-gray-400' id='cancelFinalExamDeletionBtnID'>
                Cancel
            </button>
            <button class='rounded-md text-white p-1 text-sm w-28' id='deleteFinalExamBtnID'
                    name='deleteFinalExam'>
                Delete
            </button>
        </div>
    </div>
</div>

</body>
<script src='FinalExamAssets/finalExamDashboardScript.js' type='text/javascript'></script>

<script>
    /*jQuery*/
    $(document).ready(function () {

        let numberOfFinalExam = <?php echo sizeof($retrievedFinalExam);?>;
        let finalExamTitle = <?php echo json_encode($finalExamTitle);?>;
        let finalExamID = <?php echo json_encode($finalExamID);?>;
        let numberOfQuestionsInFinalExam = <?php echo json_encode($numberOfQuestionsInFinalExam);?>;
        let finalExamCLOList = <?php echo json_encode($finalExamCLOList);?>;


        createFinalExam(numberOfFinalExam, finalExamTitle, finalExamID, numberOfQuestionsInFinalExam, finalExamCLOList)

        //Shows dialoguebox
        $("img[name='deleteFinalExam']").click(function () {
            event.stopPropagation();
            toggleDeleteConfirmDialogue()
            //Returns mentioned name of FinalExam, i.e. Assignment 1
            dialogeBoxLabel = $(this).closest("div[name='finalExamBox']").find("label[name='finalExamLabel']").text()
            $("#finalExamDeletionLabel").text(dialogeBoxLabel)

            //Hannan's
            finalExamIDToDelete = $(this).closest("div[name='finalExamBox']").find("label[name='finalExamID']").text() //Returns finalExam id

            $('#deleteFinalExamBtnID').click(function () {

                $.ajax({
                    type: "POST",
                    url: 'FinalExamAssets/DeleteFinalExamAJAX.php',
                    data: {finalExamID: finalExamIDToDelete},
                    success: function (result) {
                        console.log(result)
                        //once request is complete, AJAX would reload
                        location.reload()
                    }
                });
            })

        })

        //Getting the finalExamID so that I can use it later in database queries
        $("img[name='editFinalExam']").click(function () {
            event.stopPropagation();
            finalExamID = $(this).closest("div[name='finalExamBox']").find("label[name='finalExamID']").text() //Returns FinalExam id
            window.location.href = "finalExamDivision.php?finalExamID=" + finalExamID;
        })

        $("#cancelFinalExamDeletionBtnID").click(function () {
            toggleDeleteConfirmDialogue()
        })

        $("img[name='addNewFinalExamBtn']").click(function () {
            var url = 'finalExamDivision.php';
            $(location).prop('href', url);
        })


        $("div[name='finalExamBox']").click(function () {
            finalExamID = $(this).closest("div[name='finalExamBox']").find("label[name='finalExamID']").text() //Returns sessional id
            window.location.href = "viewFinalExam.php?finalExamID=" + finalExamID;
        })

        let totalProposedWeightageForFinalExam = <?php echo json_encode($totalProposedWeightageForFinalExam);?>;
        let accumulatedWeightageForFinalExam = <?php echo json_encode($accumulatedWeightageForFinalExam);?>;

        $("#accumulatedWeightageForFinalExamID").text(accumulatedWeightageForFinalExam)

        let percentageofProgressBarforFinalExam =( accumulatedWeightageForFinalExam / totalProposedWeightageForFinalExam) * 100;

        $("#finalExamProgressBarID").width(percentageofProgressBarforFinalExam + "%")


    })
</script>
</html>
