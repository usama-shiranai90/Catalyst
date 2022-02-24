<?php
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\FinalExam.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\OfferingAndAllocations\Course.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\ClassActivities\FinalExam.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\OfferingAndAllocations\Course.php";

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

//Following variable would be used to hide sessionalType dropdown in editing mode
$dontShowInEditing = "";

//Following variable would be used to aid in setting sessionalType value in editing mode
$valueEnabled = "value = ''";
$editingMode = false;
$questionIDs = [];
//following condition would be true when we are editing marks because only then we would have finalExamID
if (isset($_GET['finalExamID'])) {
//    Search the DB for data with this finalExamID
    $editingMode = true;
    $finalExamID = $_GET['finalExamID'];

//    Basic data for finalExam
//    $finalExamData = ["Algorithms", "Title", "2", "2", "2"];

//    Data of finalExam Questions
//    $finalExamQuestionsData = [["1","Detail Detail Detail", "2", "CLO-2"], ["2","Detail Detail Detail", "3", "CLO-3"]];


    //    Retrieving data for finalExam
    $finalExam = new FinalExam();
    $retrievedFinalExam = $finalExam->getActivity($finalExamID);


    $finalExamData = array();
    $finalExamQuestionsData = array();

    array_push($finalExamData, $retrievedFinalExam->getTopic());
    array_push($finalExamData, $retrievedFinalExam->getTitle());
    array_push($finalExamData, $retrievedFinalExam->getTotalMarks());
    array_push($finalExamData, $retrievedFinalExam->getWeightage());
    array_push($finalExamData, $retrievedFinalExam->getNumberOfQuestions());

    //    Data of finalExam Questions
    $finalExamQuestionsData = $retrievedFinalExam->getListOfQuestions();


    $dontShowInEditing = "hidden";
    $valueEnabled = "";

//  Getting list of selected CLOs on each question
    $selectedCLOs = array();
    $questionIDs = array();
    for ($x = 0; $x < sizeof($finalExamQuestionsData); $x++) {
        array_push($selectedCLOs, $finalExamQuestionsData[$x][3]);
        array_push($questionIDs, $finalExamQuestionsData[$x][0]);
    }
} else {
    $selectedCLOs = "";
    $finalExamQuestionsData = "";
    $editingMode = false;
    $finalExamData = null;
    $finalExamID = null;
}


if (isset($_POST['createOnlyFinalExam'])) {
    $finalExamQuestion = $_POST['finalExamQuestions'];

    $finalExam = new FinalExam();
    $finalExam->setActivityType("FinalExam");
    $finalExam->setTopic($_POST['newFinalExamTopic']);
    $finalExam->setTitle($_POST['newFinalExamTitle']);
    $finalExam->setTotalMarks($_POST['totalMarksForFinalExam']);
    $finalExam->setWeightage("50");
    $finalExam->setNumberOfQuestions($_POST['numberOfQuestionsName']);
    $finalExam->setListOfQuestions($_POST['finalExamQuestions']);

//    $finalExam->toString();

    $finalExam->createActivity($finalExam, $selectedSection, $selectedCourse);

    header("Location: finalExamDashboard.php");
}
else
    if (isset($_POST['setWithMarksFinalExam'])) {

        /******************** Creating FinalExam **********************/

        $finalExam = new FinalExam();
        $finalExam->setActivityType("FinalExam");
        $finalExam->setTopic($_POST['newFinalExamTopic']);
        $finalExam->setTitle($_POST['newFinalExamTitle']);
        $finalExam->setTotalMarks($_POST['totalMarksForFinalExam']);
        $finalExam->setWeightage("50");
        $finalExam->setNumberOfQuestions($_POST['numberOfQuestionsName']);
        $finalExam->setListOfQuestions($_POST['finalExamQuestions']);

        $createdSuccessfully = $finalExam->createActivity($finalExam, $selectedSection, $selectedCourse);

        if ($createdSuccessfully) {
            //    Getting the total number of questions so that I can generate inputs on the next page accordingly
            $_SESSION['numberOfFinalExamQuestions'] = $_POST['numberOfQuestionsName'];
            //    This array has the data of all questions
            $finalExamQuestion = $_POST['finalExamQuestions'];
            //    This array would hold marks of all the questions
            $marksOfEachQuestion = array();
            $detailOfEachQuestion = array();

            foreach ($finalExamQuestion as $sq) {
                array_push($marksOfEachQuestion, $sq['Marks']);
                array_push($detailOfEachQuestion, $sq['Detail']);
            }

            //    Storing the array which had marks of all the questions, in a session varaiable in order to pass to next page
            $_SESSION['marksOfFinalExamQuestions'] = $marksOfEachQuestion;
            $_SESSION['detailOfFinalExamQuestions'] = $detailOfEachQuestion;

            header("Location: finalExamStudentList.php");
        }
        else
            echo "A problem occurred while creating midterm";
    }


//    Following function is used to aid in setting finalExam data
//    It simply returns an empty string when there is no finalExamData
function getFinalExamData($finalExamData, $index)
{
    if (is_array($finalExamData)) {
        return $finalExamData[$index];
    } else
        return "";
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalyst - Final Exam Division</title>
    <link href="../../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <link href="../../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="FinalExamAssets/FinalExamStyles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="FinalExamAssets/finalExamDivisionScript.js"></script>

    <script>
        //        Getting sessionalData from PHP to JavaScript
        let finalExamData = <?php echo json_encode($finalExamData);?>;
        setCLONameList(<?php echo json_encode($CLONameList);?>);
        setCLOCodeList(<?php echo json_encode($CLOCodeList);?>);
    </script>
</head>
<body>

<div id="createFinalExamID" class="m-5 border border-gray-300 border-opacity-100 rounded-md">
    <div class="p-3 text-center">
        <label class="font-bold text-lg p-5 block">Add Final Exam</label>
        <form method="post" id="newFinalExamForm">
            <div class="grid grid-cols-12">
                <div class="col-span-5 pt-5">

                    <!--                Topic-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2 mb-0" id="finalExamTopicDivID">
                            <input class="textField" type="text" placeholder=" " id="newFinalExamTopicID"
                                   name="newFinalExamTopic" value="<?php echo getFinalExamData($finalExamData, 0); ?>">
                            <label class="textField-label">Topic</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptyFinalExamTopicError">Please enter the topic</label>
                    </div>

                    <!--                Title-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2 mb-0" id="finalExamTitleDivID">
                            <input class="textField" type="text" placeholder=" " id="newFinalExamTitleID"
                                   name="newFinalExamTitle" value="<?php echo getFinalExamData($finalExamData, 1); ?>">
                            <label class="textField-label">Title</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptyFinalExamTileError">Please enter the title</label>
                    </div>


                    <!--                Assigned Marks-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2" id="finalExamTotalMarksDivID">
                            <input class="textField" type="number" placeholder=" " id="totalMarksForFinalExamID"
                                   name="totalMarksForFinalExam"
                                   value="<?php echo getFinalExamData($finalExamData, 2); ?>">
                            <label class="textField-label">Total Marks</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptyFinalExamTotalMarksError">Please enter total
                            marks</label>
                    </div>


                    <!--                Assigned Weightage-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2" id="finalExamWeightageDivID">
                            <input class="textField text-gray-400" type="number" placeholder=" " disabled
                                   id="assignWeightageID"
                                   name="assignWeightage" value="50">
                            <label class="textField-label">Weightage</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptyFinalExamWeightageError">Please enter
                            weightage</label>
                    </div>


                    <!--                Add Number of Questions-->
                    <div class="mt-3 flex flex-col items-center hidden">
                        <input class="textField" name="numberOfQuestionsName" id="numberOfFinalExamQuestionsID"
                               value="<?php echo getFinalExamData($finalExamData, 3); ?>">
                    </div>
                </div>

                <!--            Questions Div-->
                <div class="col-span-7 rounded-2xl border-gray-400 border border-opacity-100">
                    <div class="rounded-t-2xl" style="background-color: #0184FC; color: white"> Details of Questions
                    </div>
                    <div id="finalExamQuestionsBoxID">
                    </div>
                    <div class="flex justify-center pt-5 pb-8">
                        <img class="cursor-pointer" id="addNewFinalExamQuestionBtnID" name="addNewFinalExamQuestionBtn"
                             src="../../../../Assets/Images/vectorFiles/Icons/add-button.svg">
                    </div>
                </div>
            </div>

            <div class="mt-5 flex justify-end pr-5" name="createFinalExamBtnDivID" id="createFinalExamBtnDivID">
                <button class="rounded-full text-white p-1 text-sm w-28" id="createFinalExamBtnID"
                        name="createFinalExam">
                    Create
                </button>
            </div>

            <div class="mt-5 flex justify-end pr-5" name="editFinalExamBtnsDiv" id="editFinalExamBtnsDivID">
                <button class="rounded-full text-white p-1 text-sm bg-gray-400 w-28" id="cancelFinalExamBtnID"
                        name="cancelFinalExamUpdate">
                    Cancel
                </button>
                <button class="rounded-full text-white p-1 text-sm w-28" id="confirmFinalExamBtnID"
                        name="confirmFinalExamUpdate">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>

<div id="CreateFinalExamConfirmDialogueBoxID" class="flex justify-center fixed w-full hidden" style="top: 35%">
    <div class="w-1/3 rounded-xl p-5 border border-opacity-100 border-gray-300 bg-white">
        <div class="font-bold text-center">
            <label id="finalExamConfirmationlLabel">Confirm FinalExam Creation</label>
        </div>
        <hr>
        <div class="mt-4 text-center">Please select your preferred option
        </div>

        <div class='mt-5 mb-1 flex justify-between'>
            <button class='rounded-md text-white p-1 text-sm w-28' id='cancelBtnID'>
                Cancel
            </button>
            <button class='rounded-md text-white p-1 text-sm w-28' type="submit" name="createOnlyFinalExam"
                    form="newFinalExamForm" id='createOnlyFinalExamBtnID'>
                Create Only
            </button>
            <button class='rounded-md text-white p-1 text-sm w-28' type="submit" name="setWithMarksFinalExam"
                    form="newFinalExamForm" id='setWithMarksFinalExamBtnID'>
                Enter marks
            </button>
        </div>
    </div>
</div>
<div id="updateFinalExamConfirmDialogueBoxID" class="flex justify-center fixed w-full hidden" style="top: 35%">
    <div class="w-1/3 rounded-xl p-5 border border-opacity-100 border-gray-300 bg-white">
        <div class="font-bold text-center">
            <label id="finalExamConfirmationlLabel">Confirm FinalExam Update</label>
        </div>
        <hr>
        <div class="mt-4 text-center">Are you sure you want to update this final exam?<br>
            All student marks regarding this final exam would be deleted
        </div>

        <div class='mt-5 mb-1 flex justify-between'>
            <button class='rounded-md text-white p-1 text-sm w-28' id='cancelFinalExamUpdateBtnID'>
                Cancel
            </button>
            <button class='rounded-md text-white p-1 text-sm w-28' type="submit" name="updateFinalExamConfirm"
                    form="newFinalExamForm" id='updateFinalExamConfirmID'>
                Update Only
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

<!--Maleeha's Work-->
<script>
    if (<?php echo json_encode($editingMode);?>) {
        $('#createFinalExamBtnDivID').addClass('hidden')
    } else {
        $('#editFinalExamBtnsDivID').addClass('hidden')
    }
</script>

<!--Hannan's Work-->
<script>

    let finalExamID = <?php echo json_encode($finalExamID);?>;
    let editingMode = <?php echo json_encode($editingMode);?>;
    //setCLOList(<?php //echo json_encode($CLOList);?>//);

    //This would only run when we are in editing mode
    if (editingMode == true) {
        finalExamQuestionsBox = document.getElementById("finalExamQuestionsBoxID")
        let numberOfQuestions = <?php echo json_encode(getFinalExamData($finalExamData, 4));?>;
        let questionDetail = <?php echo json_encode($finalExamQuestionsData);?>;
        let selectedCLOsList = <?php echo json_encode($selectedCLOs);?>;
        let CLOCodeList = <?php echo json_encode($CLOCodeList);?>;
        let CLONameList = <?php echo json_encode($CLONameList);?>;

        for (let i = 0; i < numberOfQuestions; i++) {
            finalExamQuestionsBox.append(createElement(questionDetail[i], selectedCLOsList[i]))
        }

        setNumberOfQuestion(numberOfQuestions)
    }


    function createElement(questionDetail, selectedCLOForEachQuestion) {
        //The following variable is declared in FinalExamScripts, since that is imported first into this page, I can easily use it
        counterFinalExamQuestions++;

        firstHalf = "<div class='grid grid-cols-7 items-center p-2'>\n" +
            "                        <div class='col-span-1 h-full flex items-center justify-center'>\n" +
            "                            <label name='questionLabel' >Question " + counterFinalExamQuestions + " </label>\n" +
            "                            <div class='verticalLine ml-2 mr-2'></div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <!--                Question Detail-->\n" +
            "                        <div class='col-span-3 flex flex-col items-center'>\n" +
            "                            <div class='textField-label-content w-full mb-0' id='question" + counterFinalExamQuestions + "DetailDivID'>\n" +
            "                            <label class='hidden' name='finalExamQuestion'>" + questionDetail[0] + "</label>\n" +
            "                                <input class='textField m-1' type='text' placeholder=' ' value='" + questionDetail[1] + " ' id='question" + counterFinalExamQuestions + "DetailID'\n" +
            "                                       name='finalExamQuestions[" + counterFinalExamQuestions + "][Detail]'>\n" +
            "                                <label class='textField-label'>Detail</label>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <!--                Marks-->\n" +
            "                        <div class='col-span-1'>\n" +
            "                            <div class='textField-label-content w-full mb-0' id='question" + counterFinalExamQuestions + "MarksDivID'>\n" +
            "                                <input class='textField m-1' type='number' placeholder=' ' id='question" + counterFinalExamQuestions + "MarksID'\n" +
            "                                       value='" + questionDetail[2] + "' name='finalExamQuestions[" + counterFinalExamQuestions + "][Marks]'>\n" +
            "                                <label class='textField-label'>Marks</label>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class='select-label-content col-span-1 mb-0' id='question" + counterFinalExamQuestions + "CLODivID'>\n" +
            "                            <select class='select w-full m-1' name='finalExamQuestions[" + counterFinalExamQuestions + "][CLO]'\n" +
            "                                    value='" + questionDetail[3] + "' id='question" + counterFinalExamQuestions + "CLOID'>\n" +
            "                                   <option value='' hidden></option>\n" +
            createDropdown(selectedCLOForEachQuestion) +
            "                            </select>\n" +
            "                            <label class='select-label'>CLO</label>\n" +
            "                        </div>\n" +
            "                        <div class='col-span-1 flex justify-center'>\n" +
            "                               <img class='cursor-pointer' name='deleteFinalExamQuestion' src='../../../../Assets/Images/vectorFiles/Icons/minus-red.svg'>" +
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

    $("img[name='deleteFinalExamQuestion']").click(function (event) {
        //using event.stopImmediatePropagation() to stop the code in this function from
        // executing on elements other than the clicked one but with same name
        event.stopImmediatePropagation()

        // Removing the question
        $(event.target).closest('div.grid.grid-cols-7.items-center.p-2').remove()

        //Decrementing the total questions counter
        counterFinalExamQuestions--;

        //Updating Question Numbers
        let newQuestionNumbers = 1;
        $('label[name = "questionLabel"]').each(function () {
            $(this).text("Question " + newQuestionNumbers);
            newQuestionNumbers++;
        })
        //Again set number of questions on deletion
        setNumberOfQuestion(counterFinalExamQuestions);
    })

    setInitialFinalExamQuestions(<?php echo json_encode($finalExamQuestionsData);?>)
    setInitialFinalExamQuestionIDs(<?php echo json_encode($questionIDs);?>)


</script>