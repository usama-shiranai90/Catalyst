<?php
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\ClassActivities\Sessional.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\OfferingAndAllocations\Course.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\Sessional.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\OfferingAndAllocations\Course.php";

session_start();

$selectedCourse = $_SESSION['selectedCourse'];
$selectedSemester = $_SESSION['selectedSemester'];
$selectedSection = $_SESSION['selectedSection'];

//Getting Program code and curriculum code for displaying CLOs

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


//$CLOList = ['CLO-1', 'CLO-2', 'CLO-3'];
$course = new Course();
$course->setCourseCLOList($selectedCourse, $selectedProgram, $selectedCurriculum);

$CLONameList = array();
$CLOCodeList = array();
foreach ($course->getCourseCLOList() as $c) {
    array_push($CLONameList, $c->getCLOName());
    array_push($CLOCodeList, $c->getCLOCode());
}

/***************************************************************************************/

//Getting Accumulated and total weightages for sessionals which would be later used in validations checks
$sessional = new Sessional();
$accumulatedWeightageForQuizzes = $sessional->getAccumulatedWeightageForParticularSessional($selectedSection, $selectedCourse, "Quiz");
$accumulatedWeightageForAssignments = $sessional->getAccumulatedWeightageForParticularSessional($selectedSection, $selectedCourse, "Assignment");
$accumulatedWeightageForProjects = $sessional->getAccumulatedWeightageForParticularSessional($selectedSection, $selectedCourse, "Project");

$totalProposedWeightageForQuizzes = $sessional->getProposedWeightageForParticularSessional($selectedBatch, $selectedProgram, $selectedCourse, "Quiz");
$totalProposedWeightageForAssignments = $sessional->getProposedWeightageForParticularSessional($selectedBatch, $selectedProgram, $selectedCourse, "Assignment");
$totalProposedWeightageForProjects = $sessional->getProposedWeightageForParticularSessional($selectedBatch, $selectedProgram, $selectedCourse, "Project");


/******************************** Editing Part *****************************************/

//Following variables would be used to set the appropriate sessional type while editing
$project = "";
$assigment = "";
$quiz = "";

//Following variable would be used to hide sessionalType dropdown in editing mode
$dontShowInEditing = "";

//Following variable would be used to aid in setting sessionalType value in editing mode
$valueEnabled = "value = ''";
$editingMode = false;
$questionIDs = [];

//following condition would be true when we are editing marks because only then we would have sessionalID
if (isset($_GET['sessionalID'])) {
//    Search the DB for data with this sessionalID
    $editingMode = true;
    $sessionalID = $_GET['sessionalID'];
//    Retrieving data for sessional

    $retrievedSessional = $sessional->getActivity($sessionalID);


    $sessionalData = array();
    $sessionalQuestionsData = array();

    array_push($sessionalData, $retrievedSessional->getActivitySubType());
    array_push($sessionalData, $retrievedSessional->getTopic());
    array_push($sessionalData, $retrievedSessional->getTitle());
    array_push($sessionalData, $retrievedSessional->getTotalMarks());
    array_push($sessionalData, $retrievedSessional->getWeightage());
    array_push($sessionalData, $retrievedSessional->getNumberOfQuestions());

    //    Data of sessional Questions
    $sessionalQuestionsData = $retrievedSessional->getListOfQuestions();


//    $sessionalData = ["Quiz", "Algorithms", "Title", "2", "3", "3"];
//    Data of sessional Questions
//    $sessionalQuestionsData = [["1", "Detail Detail Detail", "2", "CLO-2"], ["2", "Detail Detail Detail", "3", "CLO-3"], ["3", "Detail Detail Detail", "3", "CLO-3"]];
    $dontShowInEditing = "hidden";
    $valueEnabled = "";

//  Getting list of selected CLOs of each question along with questionIDs
    $selectedCLOs = array();
    $questionIDs = array();
    for ($x = 0; $x < sizeof($sessionalQuestionsData); $x++) {
        array_push($selectedCLOs, $sessionalQuestionsData[$x][3]);
        array_push($questionIDs, $sessionalQuestionsData[$x][0]);
    }

/*    print_r($sessionalData);
    echo "<br>";
    print_r($sessionalQuestionsData);
    echo "<br>";
    print_r($selectedCLOs);*/


//    setting the value of sessionalType dropdown which is hidden in editing mode
    if ($sessionalData[0] == "Assignment")
        $assigment = "selected";
    elseif ($sessionalData[0] == "Quiz")
        $quiz = "selected";
    else
        $project = "selected";
} else {
    $selectedCLOs = "";
    $sessionalID = "";
    $sessionalQuestionsData = "";
    $editingMode = false;
    $sessionalData = null;
};

if (isset($_POST['createSessionalOnly'])) {
    $sessionalQuestions = $_POST['sessionalQuestions'];

    /*    foreach ($sessionalQuestions as $sq) {
            echo "Detail: " . $sq['Detail'] . "      ";
            echo "Marks: " . $sq['Marks'] . "      ";
            echo "CLO: " . $sq['CLO'] . "</br>";
        }
        echo "Selection Type: " . $_POST['newSessionalType'] . "      ";
        echo "Topic: " . $_POST['newSessionalTopic'] . "      ";
        echo "Title: " . $_POST['newSessionalTitle'] . "      ";
        echo "Total Marks: " . $_POST['totalMarksForSessional'] . "      ";
        echo "Weightage: " . $_POST['assignWeightage'] . "      ";
        echo "Number of Questions: " . $_POST['numberOfQuestionsName'] . "      ";*/

    $sessional = new Sessional();
    $sessional->setActivityType("Sessional");
    $sessional->setActivitySubType($_POST['newSessionalType']);
    $sessional->setTopic($_POST['newSessionalTopic']);
    $sessional->setTitle($_POST['newSessionalTitle']);
    $sessional->setTotalMarks($_POST['totalMarksForSessional']);
    $sessional->setWeightage($_POST['assignWeightage']);
    $sessional->setNumberOfQuestions($_POST['numberOfQuestionsName']);
    $sessional->setListOfQuestions($_POST['sessionalQuestions']);

//    $sessional->toString();

    $sessional->createActivity($sessional, $selectedSection, $selectedCourse);

//    header("Location: sessionalDashboard.php");
}
elseif (isset($_POST['createSessionalWithMarks'])) {

    //    Creating the sessional
    $sessional = new Sessional();
    $sessional->setActivityType("Sessional");
    $sessional->setActivitySubType($_POST['newSessionalType']);
    $sessional->setTopic($_POST['newSessionalTopic']);
    $sessional->setTitle($_POST['newSessionalTitle']);
    $sessional->setTotalMarks($_POST['totalMarksForSessional']);
    $sessional->setWeightage($_POST['assignWeightage']);
    $sessional->setNumberOfQuestions($_POST['numberOfQuestionsName']);
    $sessional->setListOfQuestions($_POST['sessionalQuestions']);

    $createdSuccessfully = $sessional->createActivity($sessional, $selectedSection, $selectedCourse);

    if ($createdSuccessfully == 1) {
//    Storing numberOfQuestions, details and marks of each question so that they can be used on marks page
        $_SESSION['numberOfQuestionsName'] = $_POST['numberOfQuestionsName'];
        $sessionalQuestions = $_POST['sessionalQuestions'];

        $detailOfEachQuestion = array();
        $marksOfEachQuestion = array();

        foreach ($sessionalQuestions as $sq) {
            array_push($detailOfEachQuestion, $sq['Detail']);
            array_push($marksOfEachQuestion, $sq['Marks']);
        }
        $_SESSION['marksOfQuestions'] = $marksOfEachQuestion;
        $_SESSION['detailOfQuestions'] = $detailOfEachQuestion;
        header("Location: SessionalStudentList.php");
    } else
        echo "A problem occurred while creating sessional";

} elseif (isset($_POST['cancelSessionalUpdate'])) {
    header("Location: ViewSessional.php?sessionalID=" . $_GET['sessionalID']);
}

//    Following function is used to aid in setting sessional data in editing mode
//    It simply returns an empty string when there is no sessionalData
function getSessionalData($sessionalData, $index)
{
    if (is_array($sessionalData)) {
        return $sessionalData[$index];
    } else
        return "";
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalyst - Add New Sessional</title>
    <link href="../../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <link href="../../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="SessionalAssets/SessionalStyles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="SessionalAssets/SessionalScripts.js"></script>

    <script>
        //        Getting sessionalData from PHP to JavaScript
        let sessionalData = <?php echo json_encode($sessionalData);?>;
        setAccumulatedWeightageForSessionals(<?php echo json_encode($accumulatedWeightageForAssignments);?>, <?php echo json_encode($accumulatedWeightageForQuizzes);?>,<?php echo json_encode($accumulatedWeightageForProjects);?>)
        setTotalProposedWeightageForSessionals(<?php echo json_encode($totalProposedWeightageForAssignments);?>, <?php echo json_encode($totalProposedWeightageForQuizzes);?>, <?php echo json_encode($totalProposedWeightageForProjects);?>)
        setCLONameList(<?php echo json_encode($CLONameList);?>);
        setCLOCodeList(<?php echo json_encode($CLOCodeList);?>)
    </script>

</head>
<body>

<div id="createSessionalID" class="m-5 border border-gray-300 border-opacity-100 rounded-md">
    <div class="p-3 text-center">
        <label class="font-bold text-lg p-5 block">Add New Sessional</label>
        <form method="post" id="newSessionalForm">
            <div class="grid grid-cols-12">
                <div class="col-span-5 pt-5">

                    <!--                    Sessional Type-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="select-label-content w-1/2 mb-0 <?php echo $dontShowInEditing ?>"
                             id="sessionalTypeDivID">
                            <select class="select" name="newSessionalType"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" <?php echo $valueEnabled ?>
                                    id="newSessionalTypeID">
                                <option value="" hidden></option>
                                <option value="Assignment" <?php echo $assigment; ?>>Assignment</option>
                                <option value="Quiz" <?php echo $quiz; ?>>Quiz
                                </option>
                                <option value="Project" <?php echo $project; ?>>Project
                                </option>

                            </select>
                            <label class="select-label mt-0.5">Sessional Type</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptySessionalTypeError">Please select a sessional
                            type</label>
                    </div>

                    <!--                Topic-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2 mb-0" id="sessionalTopicDivID">
                            <input class="textField" type="text" placeholder=" " id="newSessionalTopicID"
                                   name="newSessionalTopic" value="<?php echo getSessionalData($sessionalData, 1); ?>">
                            <label class="textField-label">Topic</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptySessionalTopicError">Please enter the topic</label>
                    </div>

                    <!--                Title-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2 mb-0" id="sessionalTitleDivID">
                            <input class="textField" type="text" placeholder=" " id="newSessionalTitleID"
                                   name="newSessionalTitle" value="<?php echo getSessionalData($sessionalData, 2); ?>">
                            <label class="textField-label">Title</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptySessionalTileError">Please enter the title</label>
                    </div>


                    <!--                Total Marks-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2" id="sessionalTotalMarksDivID">
                            <input class="textField" type="number" placeholder=" " id="totalMarksForSessionalID"
                                   name="totalMarksForSessional"
                                   value="<?php echo getSessionalData($sessionalData, 3); ?>">
                            <label class="textField-label">Total Marks</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptySessionalTotalMarksError">Please enter total
                            marks</label>
                    </div>


                    <!--                Assigned Weightage-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2" id="sessionalWeightageDivID">
                            <input class="textField" type="number" placeholder=" " id="assignWeightageID"
                                   name="assignWeightage" value="<?php echo getSessionalData($sessionalData, 4); ?>">
                            <label class="textField-label">Weightage</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptySessionalWeightageError">Please enter
                            weightage</label>
                    </div>


                    <!--                Add Number of Questions-->
                    <!--                    Following input is hidden and would only be used to retrieve number of questions in PHP-->
                    <div class="mt-3 flex flex-col items-center hidden">
                        <input class="textField" name="numberOfQuestionsName" id="numberOfQuestionsID"
                               value="<?php echo getSessionalData($sessionalData, 5); ?>">
                    </div>

                </div>

                <!--            Questions Div-->
                <div class="col-span-7 rounded-2xl border-gray-400 border border-opacity-100">
                    <div class="rounded-t-2xl" style="background-color: #0184FC; color: white"> Details of Questions
                    </div>
                    <div id="sessionalQuestionsBoxID">
                    </div>
                    <div class='flex justify-center pt-5 pb-8'>
                        <img class="cursor-pointer" id="addNewSessionalQuestionBtnID" name="addNewSessionalQuestionBtn"
                             src="../../../../Assets/Images/vectorFiles/Icons/plus.svg">
                    </div>
                </div>

            </div>
            <div class="mt-5 flex justify-end pr-5" id="createSessionalBtnDivID" name="createSessionalBtnDiv">
                <button class="rounded-full text-white p-1 text-sm w-28" value="submit" id="createSessionalBtnID"
                        name="createSessional">
                    Create
                </button>
            </div>

            <div class="mt-5 flex justify-end pr-5" id="editSessionalBtnsDivID" name="editSessionalBtnsDiv">
                <button class="rounded-full text-white p-1 text-sm w-28 bg-gray-400 mr-5" value="submit"
                        id="cancelSessionalBtnID"
                        name="cancelSessionalUpdate">
                    Cancel
                </button>
                <button class="rounded-full text-white p-1 text-sm w-28" value="submit" id="confirmSessionalBtnID"
                        name="confirmSessionalUpdate">
                    Update
                </button>
            </div>
        </form>

    </div>
</div>

<div id="CreateSessionalConfirmDialogueBoxID" class="flex justify-center fixed w-full hidden" style="top: 35%">
    <div class="w-1/3 rounded-xl p-5 border border-opacity-100 border-gray-300 bg-white">
        <div class="font-bold text-center">
            <label id="sessionaConfirmationlLabel">Confirm Sessional Creation</label>
        </div>
        <hr>
        <div class="mt-4 text-center">Please select your preferred option
        </div>

        <div class='mt-5 mb-1 flex justify-between'>
            <button class='rounded-md text-white p-1 text-sm w-28' id='cancelBtnID'>
                Cancel
            </button>
            <button class='rounded-md text-white p-1 text-sm w-28' name="createSessionalOnly" type="submit"
                    form="newSessionalForm" id='createOnlySessionalBtnID'>
                Create Only
            </button>
            <button class='rounded-md text-white p-1 text-sm w-28' name="createSessionalWithMarks" type="submit"
                    form="newSessionalForm" id='setWithMarksSessionalBtnID'>
                Enter Marks
            </button>
        </div>
    </div>
</div>


<div id="updateSessionalConfirmDialogueBoxID" class="flex justify-center fixed w-full hidden" style="top: 35%">
    <div class="w-1/3 rounded-xl p-5 border border-opacity-100 border-gray-300 bg-white">
        <div class="font-bold text-center">
            <label id="sessionaConfirmationlLabel">Confirm Sessional Update</label>
        </div>
        <hr>
        <div class="mt-4 text-center">Are you sure you want to update this sessional?<br>
            All student marks regarding this sessional would be deleted</div>

        <div class='mt-5 mb-1 flex justify-between'>
            <button class='rounded-md text-white p-1 text-sm w-28' id='cancelUpdateBtnID'>
                Cancel
            </button>
            <button class='rounded-md text-white p-1 text-sm w-28' name="updateSessionalConfirm" type="submit"
                    form="newSessionalForm" id='updateSessionalConfirmID'>
                Update
            </button>
        </div>
    </div>
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
</html>

<!--Maleeha-->
<script>
    if (<?php echo json_encode($editingMode);?>) {
        $('#createSessionalBtnDivID').addClass('hidden')
    } else {
        $('#editSessionalBtnsDivID').addClass('hidden')
    }
</script>

<!--Hannan's Work-->
<script>
    let sessionalID = <?php echo json_encode($sessionalID);?>;
    let editingMode = <?php echo json_encode($editingMode);?>;

    setEditingMode(editingMode);
    //This would only run when we are in editing mode
    if (editingMode == true) {

        sessionalQuestionsBox = document.getElementById("sessionalQuestionsBoxID")
        let numberOfQuestions = <?php echo json_encode(getSessionalData($sessionalData, 5));?>;
        let questionDetail = <?php echo json_encode($sessionalQuestionsData);?>;
        let selectedCLOsList = <?php echo json_encode($selectedCLOs);?>;
        let CLOCodeList = <?php echo json_encode($CLOCodeList);?>;
        let CLONameList = <?php echo json_encode($CLONameList);?>;
        for (let i = 0; i < numberOfQuestions; i++) {
            sessionalQuestionsBox.append(createElement(questionDetail[i], selectedCLOsList[i]))
        }

        setNumberOfQuestion(numberOfQuestions)

        function createElement(questionDetail, selectedCLONameForEachQuestion) {

            let selectedCLOCode = "";
            for (let i = 0; i < CLONameList.length; i++) {
                if (selectedCLONameForEachQuestion == CLONameList[i]) {
                    selectedCLOCode = CLOCodeList[i];
                }
            }

            //The following variable is declared in SessionalScripts, since that is imported first into this page, I can easily use it
            counterSessionalQuestions++;

            firstHalf = "<div class='grid grid-cols-7 items-center p-2'>\n" +
                "                        <div class='col-span-1 h-full flex items-center justify-center'>\n" +
                "                            <label name='questionLabel' >Question " + counterSessionalQuestions + " </label>\n" +
                "                            <div class='verticalLine ml-2 mr-2'></div>\n" +
                "                        </div>\n" +
                "\n" +
                "                        <!--                Question Detail-->\n" +
                "                        <div class='col-span-3 flex flex-col items-center'>\n" +
                "                            <div class='textField-label-content w-full mb-0' id='question" + counterSessionalQuestions + "DetailDivID'>\n" +
                "                            <label class='hidden' name='sessionalQuestion'>" + questionDetail[0] + "</label>\n" +
                "                                <input class='textField m-1' type='text' placeholder=' ' value='" + questionDetail[1] + " ' id='question" + counterSessionalQuestions + "DetailID'\n" +
                "                                       name='sessionalQuestions[" + counterSessionalQuestions + "][Detail]'>\n" +
                "                                <label class='textField-label'>Detail</label>\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "\n" +
                "                        <!--                Marks-->\n" +
                "                        <div class='col-span-1'>\n" +
                "                            <div class='textField-label-content w-full mb-0' id='question" + counterSessionalQuestions + "MarksDivID'>\n" +
                "                                <input class='textField m-1' type='number' placeholder=' ' id='question" + counterSessionalQuestions + "MarksID'\n" +
                "                                       value='" + questionDetail[2] + "' name='sessionalQuestions[" + counterSessionalQuestions + "][Marks]'>\n" +
                "                                <label class='textField-label'>Marks</label>\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "\n" +
                "                        <div class='select-label-content col-span-1 mb-0' id='question" + counterSessionalQuestions + "CLODivID'>\n" +
                "                            <select class='select w-full m-1' name='sessionalQuestions[" + counterSessionalQuestions + "][CLO]'\n" +
                "                                    value='" + selectedCLOCode + "' id='question" + counterSessionalQuestions + "CLOID'>\n" +
                "                                   <option value='' hidden></option>\n" +
                createDropdown(selectedCLONameForEachQuestion) +
                "                            </select>\n" +
                "                            <label class='select-label'>CLO</label>\n" +
                "                        </div>\n" +
                "                        <div class='col-span-1 flex justify-center'>\n" +
                "                               <img class='cursor-pointer' name='deleteSessionalQuestion' src='../../../../Assets/Images/vectorFiles/Icons/minus-red.svg'>" +
                "                        </div>\n" +
                "                    </div>\n"

            var frag = document.createDocumentFragment();

            var elem = document.createElement('div');

            elem.innerHTML = firstHalf;

            while (elem.childNodes[0]) {
                frag.appendChild(elem.childNodes[0]);
            }
            return frag;
        }

        //Used for creating CLO Dropdown in every question in CLO mode in editing mode
        //This function will be called while making every question in editing mode
        function createDropdown(selectedCLO) {
            let options = "";

            for (let i = 0; i < getCLOCodeList().length; i++) {
                if (getCLONameList()[i] == selectedCLO)
                    options += "<option value='" + getCLOCodeList()[i] + "' selected>" + getCLONameList()[i] + "</option>\n"
                else
                    options += "<option value='" + getCLOCodeList()[i] + "'>" + getCLONameList()[i] + "</option>\n"
            }
            return options;
        }

        $("img[name='deleteSessionalQuestion']").click(function (event) {
            //using event.stopImmediatePropagation() to stop the code in this function from
            // executing on elements other than the clicked one but with same name
            event.stopImmediatePropagation()

            //Removing the question
            $(event.target).closest('div.grid.grid-cols-7.items-center.p-2').remove()

            //Decrementing the total questions counter
            counterSessionalQuestions--;

            //Updating Question Numbers
            let newQuestionNumbers = 1;
            $('label[name = "questionLabel"]').each(function () {
                $(this).text("Question " + newQuestionNumbers);
                newQuestionNumbers++;
            })
            //Again set number of questions on deletion
            setNumberOfQuestion(counterSessionalQuestions);
        })

        setInitialSessionalQuestions(<?php echo json_encode($sessionalQuestionsData);?>)
        setInitialSessionalQuestionIDs(<?php echo json_encode($questionIDs);?>)
    }

</script>