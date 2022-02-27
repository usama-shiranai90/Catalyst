<?php
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\ClassActivities\Midterm.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\Midterm.php";
require_once $_SERVER['DOCUMENT_ROOT']."\Modules\autoloader.php";

session_start();

$selectedCourse = $_SESSION['selectedCourse'];
$selectedSemester = $_SESSION['selectedSemester'];
$selectedSection = $_SESSION['selectedSection'];

$midterm = new midterm();
$retrievedMidterm = $midterm->getMidterm($selectedSection, $selectedCourse);

$midtermTitle = array();
$midtermID = array();
$numberOfQuestionsInMidterm = array();
$midtermCLOList = array();

if ($retrievedMidterm != null) {
    foreach ($retrievedMidterm as $currentMidterm) {
        array_push($midtermTitle, $currentMidterm->getTitle());
        array_push($midtermID, $currentMidterm->getActivityCode());
        array_push($numberOfQuestionsInMidterm, $currentMidterm->getNumberOfQuestions());
    }
    $midtermCLOList = $currentMidterm->getListOfMappedCLOs();
}

$totalProposedWeightageForMidterm = 25;
$accumulatedWeightageForMidterm = $midterm->getAccumulatedMidtermWeightage($selectedSection, $selectedCourse);

$showAddButton = "";
if($accumulatedWeightageForMidterm == 25){
    $showAddButton = "hidden";
}

?>

<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Catalyst - Midterm Dashboard</title>
    <link href='../../../../Assets/Stylesheets/Tailwind.css' rel='stylesheet'>
    <link href='MidtermAssets/MidtermStyles.css' rel='stylesheet'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

</head>
<body class='m-5'>

<div class="relative" id="teacherMidtermDashboardID">
    <div class='m-5 p-3'>

        <!--        Marks Shower-->
        <div class='bg-gradient-to-r from-blue-100 to-white flex justify-end items-center'>

            <label class='text-center'>Covered<br>Weightage</label>

            <div class='w-32 rounded-lg h-3.5 ml-2' style='background-color: #adb5bd'>
                <div id="midtermProgressBarID" class='w-14 h-3.5 rounded-lg' style='background-color: #3D85D8'></div>
            </div>
            <div class='text-center ml-2'>
                <label id="accumulatedWeightageForMidtermID"></label>
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

                <label>25</label>
            </div>
        </div>


        <!--        Assignments-->
        <div>
            <!--            Heading-->
            <div class='text-center text-2xl font-bold p-5'>
                <label>Mid Term</label>
            </div>


            <!--            Midterm Boxes-->
            <div class='flex justify-center' id='teacherMidtermContainerID'>
            </div>


            <!--            Adding Addition Button-->
            <div class='flex justify-center pt-8 pb-8 <?php echo $showAddButton;?>'>
                <img class="cursor-pointer" name="addNewMidtermBtn"
                     src="../../../../Assets/Images/vectorFiles/Icons/add-button.svg">
            </div>
        </div>
    </div>
</div>

<div id="deleteConfirmDialogueBoxID" class="flex justify-center fixed w-full hidden" style="top: 35%">
    <div class="w-1/3 rounded-xl p-5 border border-opacity-100 border-gray-300 bg-white">
        <div class="font-bold text-center">
            <label id="midtermDeletionLabel">Deleting Quiz</label>
        </div>
        <hr>
        <div class="mt-4 text-center">Are you sure you want to delete all of it's data?
        </div>

        <div class='mt-5 mb-1 flex justify-between'>
            <button class='rounded-md text-white p-1 text-sm w-28 bg-gray-400' id='cancelMidtermDeletionBtnID'>
                Cancel
            </button>
            <button class='rounded-md text-white p-1 text-sm w-28' id='deleteMidtermBtnID'
                    name='deleteMidterm'>
                Delete
            </button>
        </div>
    </div>
</div>

</body>
<script src='MidtermAssets/midTermDashboardScript.js' type='text/javascript'></script>

<script>
    /*jQuery*/
    $(document).ready(function () {

        let numberOfMidterm = <?php echo sizeof($retrievedMidterm);?>;
        let midtermTitle = <?php echo json_encode($midtermTitle);?>;
        let midtermID = <?php echo json_encode($midtermID);?>;
        let numberOfQuestionsInMidterm = <?php echo json_encode($numberOfQuestionsInMidterm);?>;
        let midtermCLOList = <?php echo json_encode($midtermCLOList);?>;

        createMidterm(numberOfMidterm, midtermTitle, midtermID, numberOfQuestionsInMidterm, midtermCLOList)

        //Shows dialoguebox
        $("img[name='deleteMidterm']").click(function (event) {
            event.stopPropagation();
            toggleDeleteConfirmDialogue()
            //Returns mentioned name of sessional, i.e. Assignment 1
            dialogeBoxLabel = $(this).closest("div[name='midtermBox']").find("label[name='midtermLabel']").text()
            $("#midtermDeletionLabel").text(dialogeBoxLabel)

            //Hannan's
            midtermIDToDelete = $(this).closest("div[name='midtermBox']").find("label[name='midtermID']").text() //Returns midterm id

            $('#deleteMidtermBtnID').click(function () {

                $.ajax({
                    type: "POST",
                    url: 'MidtermAssets/DeleteMidtermAJAX.php',
                    data: {midtermID: midtermIDToDelete},
                    success: function (result) {
                        console.log(result)
                        //once request is complete, AJAX would reload
                        location.reload()
                    }
                });
            })
        })

        //Getting the sessionalID so that I can use it later in database queries
        $("img[name='editMidterm']").click(function (event) {
            event.stopPropagation();
            midtermID = $(this).closest("div[name='midtermBox']").find("label[name='midtermID']").text() //Returns sessional id
            window.location.href = "midTermDivision.php?midtermID=" + midtermID;
        })

        $("#cancelMidtermDeletionBtnID").click(function () {
            toggleDeleteConfirmDialogue()
        })

        $("img[name='addNewMidtermBtn']").click(function () {
            var url = 'midTermDivision.php';
            $(location).prop('href', url);
        })

        $("div[name='midtermBox']").click(function () {
            midtermID = $(this).closest("div[name='midtermBox']").find("label[name='midtermID']").text() //Returns sessional id
            window.location.href = "viewMidterm.php?midtermID=" + midtermID;
        })

        let totalProposedWeightageForMidterm = <?php echo json_encode($totalProposedWeightageForMidterm);?>;
        let accumulatedWeightageForMidterm = <?php echo json_encode($accumulatedWeightageForMidterm);?>;

        $("#accumulatedWeightageForMidtermID").text(accumulatedWeightageForMidterm)

        let percentageofProgressBarforMidterm = (accumulatedWeightageForMidterm / totalProposedWeightageForMidterm) * 100;

        $("#midtermProgressBarID").width(percentageofProgressBarforMidterm + "%")


    })
</script>
</html>
