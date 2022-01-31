<?php
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\ClassActivities\Sessional.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\Sessional.php";
session_start();

$selectedCourse = $_SESSION['selectedCourse'];
$selectedSemester = $_SESSION['selectedSemester'];
$selectedSection = $_SESSION['selectedSection'];

/************************ Getting Program code and curriculum code for displaying CLOs*****************************/

$databaseConnection = DatabaseSingleton:: getConnection();
$sql = /** @lang text */
    "select programCode,b.batchCode, b.curriculumCode from section 
    join semester s on s.semesterCode = section.semesterCode 
    join batch b on s.batchCode = b.batchCode 
    join curriculum c on c.curriculumCode = b.curriculumCode 
    where sectionCode = \"$selectedSection\"";

$result = $databaseConnection->query($sql);

$selectedProgram = "";
$selectedCurriculum = "";
$selectedBatch = "";

if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
        $selectedProgram = $row['programCode'];
        $selectedCurriculum = $row['curriculumCode'];
        $selectedBatch = $row['batchCode'];
    }
} else
    echo "No Curriculum Code found sectionCode: " . $selectedSection;





$sessional = new Sessional();
$retrievedSessionals = $sessional->getSessionals($selectedSection, $selectedCourse, "Assignment");

/*for ($x = 0; $x < sizeof($retrievedSessionals); $x++) {
    $retrievedSessionals[$x]->toString();

}*/

$assignmentTitles = array();
$assignmentIDs = array();
$numberOfQuestionInEachAssignment = array();
$assignmentWeightages = array();
$assignmentCLOList = array();

if ($retrievedSessionals != null) {

    foreach ($retrievedSessionals as $currentSessional) {
        array_push($assignmentTitles, $currentSessional->getTitle());
        array_push($assignmentIDs, $currentSessional->getActivityCode());
        array_push($numberOfQuestionInEachAssignment, $currentSessional->getNumberOfQuestions());
        array_push($assignmentWeightages, $currentSessional->getWeightage());
        array_push($assignmentCLOList, $currentSessional->getListOfMappedCLOs());
    }
}
$totalProposedWeightageForAssignments = $sessional->getProposedWeightageForParticularSessional($selectedBatch, $selectedProgram, $selectedCourse, "Assignment");
$accumulatedWeightageForAssignments = $sessional->getAccumulatedWeightageForParticularSessional($selectedSection, $selectedCourse, "Assignment");

$showAssignmentAddButton = "";
if($accumulatedWeightageForAssignments == $totalProposedWeightageForAssignments){
    $showAssignmentAddButton = "hidden";
}


/*$assignmentTitles = ["a", "b", "c"];
$assignmentIDs = ["a", "b", "c"];
$numberOfQuestionInEachAssignment = [1, 2, 3];
$assignmentWeightages = ["5", "10", "15"];
$assignmentCLOList = [
    ['CLO 1'],
    ['CLO 2', 'CLO 2'],
    ['CLO 2', 'CLO 2', 'CLO 3']
];*/
$retrievedSessionals = $sessional->getSessionals($selectedSection, $selectedCourse, "Quiz");

/*for ($x = 0; $x < sizeof($retrievedSessionals); $x++) {
    $retrievedSessionals[$x]->toString();

}*/

$quizTitles = array();
$quizIDs = array();
$numberOfQuestionInEachQuiz = array();
$quizWeightages = array();
$quizCLOList = array();

if ($retrievedSessionals != null) {
    foreach ($retrievedSessionals as $currentSessional) {
        array_push($quizTitles, $currentSessional->getTitle());
        array_push($quizIDs, $currentSessional->getActivityCode());
        array_push($numberOfQuestionInEachQuiz, $currentSessional->getNumberOfQuestions());
        array_push($quizWeightages, $currentSessional->getWeightage());
        array_push($quizCLOList, $currentSessional->getListOfMappedCLOs());
    }
}
$totalProposedWeightageForQuizzes = $sessional->getProposedWeightageForParticularSessional($selectedBatch, $selectedProgram, $selectedCourse, "Quiz");
$accumulatedWeightageForQuizzes = $sessional->getAccumulatedWeightageForParticularSessional($selectedSection, $selectedCourse, "Quiz");

$showQuizAddButton = "";
if($accumulatedWeightageForQuizzes == $totalProposedWeightageForQuizzes){
    $showQuizAddButton = "hidden";
}



/*$quizTitles = ["a", "b", "c"];
$quizIDs = ["a", "b", "c"];
$numberOfQuestionInEachQuiz = [1, 2, 3];
$quizWeightages = ["5", "10", "15"];
$quizCLOList = [
    ['CLO 1'],
    ['CLO 2', 'CLO 2'],
    ['CLO 2', 'CLO 2', 'CLO 3']
];*/

//$sessional = new Sessional();
$retrievedSessionals = $sessional->getSessionals($selectedSection, $selectedCourse, "Project");

/*for ($x = 0; $x < sizeof($retrievedSessionals); $x++) {
    $retrievedSessionals[$x]->toString();

}*/

$projectTitles = array();
$projectIDs = array();
$numberOfQuestionInEachProject = array();
$projectWeightages = array();
$projectCLOList = array();

if ($retrievedSessionals != null) {
    foreach ($retrievedSessionals as $currentSessional) {
        array_push($projectTitles, $currentSessional->getTitle());
        array_push($projectIDs, $currentSessional->getActivityCode());
        array_push($numberOfQuestionInEachProject, $currentSessional->getNumberOfQuestions());
        array_push($projectWeightages, $currentSessional->getWeightage());
        array_push($projectCLOList, $currentSessional->getListOfMappedCLOs());
    }
}

$totalProposedWeightageForProjects = $sessional->getProposedWeightageForParticularSessional($selectedBatch, $selectedProgram, $selectedCourse, "Project");
$accumulatedWeightageForProjects = $sessional->getAccumulatedWeightageForParticularSessional($selectedSection, $selectedCourse, "Project");

$showProjectAddButton = "";
if($accumulatedWeightageForProjects == $totalProposedWeightageForProjects){
    $showProjectAddButton = "hidden";
}


/*$projectTitles = ["a", "b", "c"];
$projectIDs = ["a", "b", "c"];
$numberOfQuestionInEachProject = [1, 2, 3];
$projectWeightages = ["5", "10", "15"];
$projectCLOList = [
    ['CLO 1'],
    ['CLO 2', 'CLO 2'],
    ['CLO 2', 'CLO 2', 'CLO 3']
];*/

$totalProposedWeightageForSessionals = 25;
$accumulatedWeightageForSessionals = $sessional->getAccumulatedSessionalWeightage($selectedSection, $selectedCourse);


?>

<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Catalyst - Sessional Dashboard</title>
    <link href='../../../../Assets/Stylesheets/Tailwind.css' rel='stylesheet'>
    <link href='SessionalAssets/SessionalStyles.css' rel='stylesheet'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

</head>

<body class='m-5'>

<div class="relative" id="teacherSessionalDashboardID">
    <div class='m-5 p-3'>

        <!--        Marks Shower-->
        <div class='bg-gradient-to-r from-blue-100 to-white flex justify-end items-center'>

            <label class='text-center'>Covered<br>Weightage</label>

            <div class='w-32 rounded-lg h-3.5 ml-2' style='background-color: #adb5bd'>
                <div id="sessionalProgressBarID" class='h-3.5 rounded-lg' style='background-color: #3D85D8'></div>
            </div>
            <div class='text-center ml-2'>
                <label id="accumulatedWeightageForSessionalID"></label>
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
                <label>Assignments</label>
            </div>


            <!--            Assignment Boxes-->
            <div class='grid grid-cols-12' id='teacherSessionalAssignmentsContainerID'>
            </div>


            <!--            Adding Addition Button-->
            <div class='flex justify-center pt-8 pb-8 <?php echo $showAssignmentAddButton;?>'>
                <img class="cursor-pointer" name="addNewSessionalBtn"
                     src="../../../../Assets/Images/vectorFiles/Icons/plus.svg">
            </div>
        </div>

        <!--        Quizzes-->
        <div>
            <div class='text-center text-2xl font-bold p-5'>
                <label>Quizzes</label>
            </div>

            <!--            Quiz Boxes-->
            <div class='grid grid-cols-12' id='teacherSessionalQuizzesContainerID'>
            </div>

            <!--            Adding Addition Button-->
            <div class='flex justify-center pt-8 pb-8 <?php echo $showQuizAddButton?>'>
                <img class="cursor-pointer" name="addNewSessionalBtn"
                     src="../../../../Assets/Images/vectorFiles/Icons/plus.svg">
            </div>
        </div>

        <!--        Projects-->
        <div>
            <div class='text-center text-2xl font-bold p-5'>
                <label>Projects</label>
            </div>

            <!--            Project Boxes-->
            <div class='grid grid-cols-12' id='teacherSessionalProjectsContainerID'>
            </div>

            <!--            Adding Addition Button-->
            <div class='flex justify-center pt-8 pb-8 <?php echo $showProjectAddButton?>'>
                <img class="cursor-pointer" name="addNewSessionalBtn"
                     src="../../../../Assets/Images/vectorFiles/Icons/plus.svg">
            </div>
        </div>
    </div>
</div>

<div id="deleteConfirmDialogueBoxID" class="flex justify-center fixed w-full hidden" style="top: 35%">
    <div class="w-1/3 rounded-xl p-5 border border-opacity-100 border-gray-300 bg-white">
        <div class="font-bold text-center">
            <label id="sessionalDeletionLabel">Deleting Quiz</label>
        </div>
        <hr>
        <div class="mt-4 text-center">Are you sure you want to delete all of it's data?
        </div>

        <div class='mt-5 mb-1 flex justify-between'>
            <button class='rounded-md text-white p-1 text-sm w-28 bg-gray-400' id='cancelDeletionBtnID'>
                Cancel
            </button>
            <button class='rounded-md text-white p-1 text-sm w-28' type="submit" id='deleteSessionalBtnID'
                    name='deleteSessional'>
                Delete
            </button>
        </div>
    </div>
</div>

</body>
<script src='SessionalAssets/SessionalDashboardScripts.js' type='text/javascript'></script>

<script>
    /*jQuery*/
    $(document).ready(function () {

        let numberOfAssignments = <?php echo json_encode(sizeof($assignmentTitles), JSON_HEX_TAG); ?>;
        let assignmentTitles = <?php echo json_encode($assignmentTitles, JSON_HEX_TAG); ?>;
        let assignmentIDs = <?php echo json_encode($assignmentIDs, JSON_HEX_TAG); ?>;
        let numberOfQuestionInEachAssignment = <?php echo json_encode($numberOfQuestionInEachAssignment, JSON_HEX_TAG); ?>;
        let assignmentCLOList = <?php echo json_encode($assignmentCLOList, JSON_HEX_TAG); ?>;
        let assignmentWeightages = <?php echo json_encode($assignmentWeightages, JSON_HEX_TAG); ?>;

        createAssignments(numberOfAssignments, assignmentTitles, assignmentIDs, numberOfQuestionInEachAssignment, assignmentCLOList, assignmentWeightages)

        let numberOfQuizzes = <?php echo json_encode(sizeof($quizTitles), JSON_HEX_TAG); ?>;
        let quizTitles = <?php echo json_encode($quizTitles, JSON_HEX_TAG); ?>;
        let quizIDs = <?php echo json_encode($quizIDs, JSON_HEX_TAG); ?>;
        let numberOfQuestionInEachQuiz = <?php echo json_encode($numberOfQuestionInEachQuiz, JSON_HEX_TAG); ?>;
        let quizCLOList = <?php echo json_encode($quizCLOList, JSON_HEX_TAG); ?>;
        let quizWeightages = <?php echo json_encode($quizWeightages, JSON_HEX_TAG); ?>;

        createQuizzes(numberOfQuizzes, quizTitles, quizIDs, numberOfQuestionInEachQuiz, quizCLOList, quizWeightages)


        let numberOfProjects = <?php echo json_encode(sizeof($projectTitles), JSON_HEX_TAG); ?>;
        let projectTitles = <?php echo json_encode($projectTitles, JSON_HEX_TAG); ?>;
        let projectIDs = <?php echo json_encode($projectIDs, JSON_HEX_TAG); ?>;
        let numberOfQuestionInEachProject = <?php echo json_encode($numberOfQuestionInEachProject, JSON_HEX_TAG); ?>;
        let projectCLOList = <?php echo json_encode($projectCLOList, JSON_HEX_TAG); ?>;
        let projectWeightages = <?php echo json_encode($projectWeightages, JSON_HEX_TAG); ?>;

        createProjects(numberOfProjects, projectTitles, projectIDs, numberOfQuestionInEachProject, projectCLOList, projectWeightages)


        //Shows dialoguebox
        $("img[name='deleteSessional']").click(function (event) {
            event.stopPropagation();
            toggleDeleteConfirmDialogue()
            //Returns mentioned name of sessional, i.e. Assignment 1 and sets it into the dialogue box
            dialogeBoxLabel = $(this).closest("div[name='sessionalBox']").find("label[name='sessionalLabel']").text()
            $("#sessionalDeletionLabel").text(dialogeBoxLabel)

            //Hannan's
            sessionalIDToDelete = $(this).closest("div[name='sessionalBox']").find("label[name='sessionalID']").text() //Returns sessional id

            $('#deleteSessionalBtnID').click(function () {

                $.ajax({
                    type: "POST",
                    url: 'SessionalAssets/DeleteSessionalAJAX.php',
                    data: {sessionalID: sessionalIDToDelete},
                    success: function (result) {
                        console.log(result)
                        //once request is complete, AJAX would reload
                        location.reload()
                    }
                });
            })
        })

        //Getting the sessionalID so that I can use it later in database queries
        $("img[name='editSessional']").click(function (event) {
            event.stopPropagation();
            let sessionalID = $(this).closest("div[name='sessionalBox']").find("label[name='sessionalID']").text() //Returns sessional id
            window.location.href = "addNewSessional.php?sessionalID=" + sessionalID;
        })

        $("#cancelDeletionBtnID").click(function () {
            toggleDeleteConfirmDialogue()
        })

        $("img[name='addNewSessionalBtn']").click(function () {
            var url = 'addNewSessional.php';
            $(location).prop('href', url);
        })

        $("div[name='sessionalBox']").click(function () {
            let sessionalID = $(this).closest("div[name='sessionalBox']").find("label[name='sessionalID']").text() //Returns sessional id
            window.location.href = "ViewSessional.php?sessionalID=" + sessionalID
        })

        let totalProposedWeightageForSessionals = <?php echo $totalProposedWeightageForSessionals;?>;
        let accumulatedWeightageForSessionals = <?php echo $accumulatedWeightageForSessionals;?>;

        $("#accumulatedWeightageForSessionalID").text(accumulatedWeightageForSessionals)

        let percentageofProgressBarforSessional = (accumulatedWeightageForSessionals / totalProposedWeightageForSessionals) * 100;
        $("#sessionalProgressBarID").width(percentageofProgressBarforSessional + "%")
    })
</script>


<!--Hannan's-->
<script>

</script>

</html>