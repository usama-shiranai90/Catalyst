<?php
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\Midterm.php";
//include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\OfferingAndAllocations\Course.php";
require_once $_SERVER['DOCUMENT_ROOT']."\Modules\autoloader.php";

session_start();

$selectedCourse = $_SESSION['selectedCourse'];
$selectedSemester = $_SESSION['selectedSemester'];
$selectedSection = $_SESSION['selectedSection'];

$selectedCurriculum = $_SESSION['selectedCurriculum'];
$selectedProgram = $_SESSION['selectedProgram'];
$selectedBatch = $_SESSION['selectedBatch'];

///************************ Getting Program code and curriculum code for displaying CLOs*****************************/
//
//$databaseConnection = DatabaseSingleton:: getConnection();
//$sql = /** @lang text */
//    "select programCode,b.batchCode, b.curriculumCode from section
//    join semester s on s.semesterCode = section.semesterCode
//    join batch b on s.batchCode = b.batchCode
//    join curriculum c on c.curriculumCode = b.curriculumCode
//    where sectionCode = \"$selectedSection\"";
//
//$result = $databaseConnection->query($sql);
//
//$selectedProgram = "";
//$selectedCurriculum = "";
//$selectedBatch = "";
//
//if (mysqli_num_rows($result) > 0) {
//    while ($row = $result->fetch_assoc()) {
//        $selectedProgram = $row['programCode'];
//        $selectedCurriculum = $row['curriculumCode'];
//        $selectedBatch = $row['batchCode'];
//    }
//} else
//    echo "No Curriculum Code found sectionCode: " . $selectedSection;

//$CLOList = ['CLO-1', 'CLO-2', 'CLO-3'];

$course = new Course();
$course->retreiveCourseCLOList($selectedCourse, $selectedProgram, $selectedCurriculum, $selectedBatch);

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
//following condition would be true when we are editing marks because only then we would have midtermID
if (isset($_GET['midtermID'])) {
//    Search the DB for data with this midtermID
    $editingMode = true;
    $title = "Edit";
    $midtermID = $_GET['midtermID'];

    //    Retrieving data for midterm
    $midterm = new Midterm();
    $retrievedMidterm = $midterm->getActivity($midtermID);


    $midtermData = array();
    $midtermQuestionsData = array();

    array_push($midtermData, $retrievedMidterm->getTopic());
    array_push($midtermData, $retrievedMidterm->getTitle());
    array_push($midtermData, $retrievedMidterm->getTotalMarks());
    array_push($midtermData, $retrievedMidterm->getWeightage());
    array_push($midtermData, $retrievedMidterm->getNumberOfQuestions());

    //    Data of midterm Questions
    $midtermQuestionsData = $retrievedMidterm->getListOfQuestions();

//    Basic data for midterm
//    $midtermData = ["Algorithms", "Title", "2", "2", "2"];

//    Data of midterm Questions
//    $midtermQuestionsData = [["1", "Detail Detail Detail", "2", "CLO-2"], ["2", "Detail Detail Detail", "3", "CLO-3"]];
    $dontShowInEditing = "hidden";
    $valueEnabled = "";

//  Getting list of selected CLOs on each question
    $selectedCLOs = array();
    $questionIDs = array();

    for ($x = 0; $x < sizeof($midtermQuestionsData); $x++) {
        array_push($selectedCLOs, $midtermQuestionsData[$x][3]);
        array_push($questionIDs, $midtermQuestionsData[$x][0]);
    }
}
else {
    $selectedCLOs = "";
    $midtermQuestionsData = "";
    $editingMode = false;
    $midtermData = null;
    $midtermID = null;
    $title = "Create New";
}


if (isset($_POST['createOnlyMidterm'])) {
    $midtermQuestion = $_POST['midtermQuestions'];

    /*foreach ($midtermQuestion as $sq) {
        echo "Detail: " . $sq['Detail'] . "   ";
        echo "Marks: " . $sq['Marks'] . "   ";
        echo "CLO: " . $sq['CLO'] . "</br>";
    }
    echo "Title: " . $_POST['newMidtermTitle'] . "   ";
    echo "Total Marks: " . $_POST['assignMarksforMidterm'] . "   ";
    echo "Weightage: 25";*/

    $midterm = new Midterm();
    $midterm->setActivityType("Midterm");
    $midterm->setTopic($_POST['newMidtermTopic']);
    $midterm->setTitle($_POST['newMidtermTitle']);
    $midterm->setTotalMarks($_POST['totalMarksForMidterm']);
    $midterm->setWeightage("25");
    $midterm->setNumberOfQuestions($_POST['numberOfQuestionsName']);
    $midterm->setListOfQuestions($_POST['midtermQuestions']);

//    $midterm->toString();

    $midterm->createActivity($midterm, $selectedSection, $selectedCourse);


//    header("Location: midTermDashboard.php");
}
else if (isset($_POST['setWithMarksMidterm'])) {

    /******************** Creating Midterm **********************/

    $midterm = new Midterm();
    $midterm->setActivityType("Midterm");
    $midterm->setTopic($_POST['newMidtermTopic']);
    $midterm->setTitle($_POST['newMidtermTitle']);
    $midterm->setTotalMarks($_POST['totalMarksForMidterm']);
    $midterm->setWeightage("25");
    $midterm->setNumberOfQuestions($_POST['numberOfQuestionsName']);
    $midterm->setListOfQuestions($_POST['midtermQuestions']);

    $createdSuccessfully = $midterm->createActivity($midterm, $selectedSection, $selectedCourse);


    if ($createdSuccessfully == 1) {

        $_SESSION['numberOfMidtermQuestions'] = $_POST['numberOfQuestionsName'];
        $midtermQuestion = $_POST['midtermQuestions'];
        $detailOfEachQuestion = array();
        $marksOfEachQuestion = array();

        foreach ($midtermQuestion as $sq) {
            array_push($detailOfEachQuestion, $sq['Detail']);
            array_push($marksOfEachQuestion, $sq['Marks']);
        }

        $_SESSION['marksOfMidtermQuestions'] = $marksOfEachQuestion;
        $_SESSION['detailOfMidtermQuestions'] = $detailOfEachQuestion;
        header("Location: midTermStudentList.php");

    } else
        echo "A problem occurred while creating midterm";


}

//    Following function is used to aid in setting midterm data
//    It simply returns an empty string when there is no midtermData
function getMidtermData($midtermData, $index)
{
    if (is_array($midtermData)) {
        return $midtermData[$index];
    } else
        return "";
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalyst - Midterm Division</title>
    <link href="../../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <link href="../../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="MidtermAssets/MidtermStyles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="MidtermAssets/midTermDivisionScript.js"></script>

    <script>
        //        Getting midtermData from PHP to JavaScript
        let midtermData = <?php echo json_encode($midtermData);?>;
        setCLONameList(<?php echo json_encode($CLONameList);?>);
        setCLOCodeList(<?php echo json_encode($CLOCodeList);?>);
    </script>
</head>
<body>

<div id="createMidtermID" class="m-5 border border-gray-300 border-opacity-100 rounded-md">
    <div class="p-3 text-center">
        <label class="font-bold text-lg p-5 block"><?php echo $title; ?> Midterm</label>
        <form method="post" id="newMidtermForm">
            <div class="grid grid-cols-12">
                <div class="col-span-5 pt-5">

                    <!--                Topic-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2 mb-0" id="midtermTopicDivID">
                            <input class="textField" type="text" placeholder=" " id="newMidtermTopicID"
                                   name="newMidtermTopic" value="<?php echo getMidtermData($midtermData, 0); ?>">
                            <label class="textField-label">Topic</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptyMidtermTopicError">Please enter the topic</label>
                    </div>

                    <!--                Title-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2 mb-0" id="midtermTitleDivID">
                            <input class="textField" type="text" placeholder=" " id="newMidtermTitleID"
                                   name="newMidtermTitle" value="<?php echo getMidtermData($midtermData, 1); ?>">
                            <label class="textField-label">Title</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptyMidtermTitleError">Please enter the title</label>
                    </div>


                    <!--                Assigned Marks-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2" id="midtermTotalMarksDivID">
                            <input class="textField" type="number" placeholder=" " id="totalMarksForMidtermID"
                                   name="totalMarksForMidterm" value="<?php echo getMidtermData($midtermData, 2); ?>">
                            <label class="textField-label">Total Marks</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptyMidtermTotalMarksError">Please enter total
                            marks</label>
                    </div>


                    <!--                Assigned Weightage-->
                    <div class="mt-3 flex flex-col items-center">
                        <div class="textField-label-content w-1/2" id="midtermWeightageDivID">
                            <input class="textField text-gray-400" type="number" placeholder=" " disabled
                                   id="assignWeightageID" name="assignWeightage" value="25">
                            <label class="textField-label">Weightage</label>
                        </div>
                        <label class="text-red-900 hidden" id="emptyMidtermWeightageError">Please enter
                            weightage</label>
                    </div>


                    <!--                Add Number of Questions-->
                    <div class="mt-3 flex flex-col items-center hidden">
                        <input class="textField" name="numberOfQuestionsName" id="numberOfMidtermQuestionsID"
                               value="<?php echo getMidtermData($midtermData, 3); ?>">
                    </div>

                </div>

                <!--            Questions Div-->
                <div class="col-span-7 rounded-2xl border-gray-400 border border-opacity-100">
                    <div class="rounded-t-2xl" style="background-color: #0184FC; color: white"> Details of Questions
                    </div>
                    <div id="midtermQuestionsBoxID">
                    </div>
                    <div class="flex justify-center pt-5 pb-8">
                        <img class="cursor-pointer" id="addNewMidtermQuestionBtnID" name="addNewMidtermQuestionBtn"
                             src="../../../../Assets/Images/vectorFiles/Icons/add-button.svg">
                    </div>
                </div>

            </div>
            <div class="mt-5 flex justify-end pr-5" name="createMidtermBtnDiv" id="createMidtermBtnDivID">
                <button class="rounded-full text-white p-1 text-sm w-28" id="createMidtermBtnID"
                        name="createMidterm">
                    Create
                </button>
            </div>

            <div class="mt-5 flex justify-end pr-5" id="editMidtermBtnsDivID" name="editMidtermBtnsDiv">
                <button class="rounded-full text-white p-1 text-sm w-28 bg-gray-400 mr-5" value="submit"
                        id="cancelMidtermBtnID"
                        name="cancelMidtermUpdate">
                    Cancel
                </button>
                <button class="rounded-full text-white p-1 text-sm w-28" value="submit" id="confirmMidtermBtnID"
                        name="confirmMidtermUpdate">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>

<div id="CreateMidtermConfirmDialogueBoxID" class="flex justify-center fixed w-full hidden" style="top: 35%">
    <div class="w-1/3 rounded-xl p-5 border border-opacity-100 border-gray-300 bg-white">
        <div class="font-bold text-center">
            <label id="midtermConfirmationlLabel">Confirm Midterm Creation</label>
        </div>
        <hr>
        <div class="mt-4 text-center">Please select your preferred option
        </div>

        <div class='mt-5 mb-1 flex justify-between'>
            <button class='rounded-md text-white p-1 text-sm w-28' id='cancelBtnID'>
                Cancel
            </button>
            <button class='rounded-md text-white p-1 text-sm w-28' type="submit" name="createOnlyMidterm"
                    form="newMidtermForm" id='createOnlyMidtermBtnID'>
                Create Only
            </button>
            <button class='rounded-md text-white p-1 text-sm w-28' type="submit" name="setWithMarksMidterm"
                    form="newMidtermForm" id='setWithMarksMidtermBtnID'>
                Enter marks
            </button>
        </div>
    </div>
</div>

<div id="updateMidtermConfirmDialogueBoxID" class="flex justify-center fixed w-full hidden" style="top: 35%">
    <div class="w-1/3 rounded-xl p-5 border border-opacity-100 border-gray-300 bg-white">
        <div class="font-bold text-center">
            <label id="midtermConfirmationlLabel">Confirm Midterm Update</label>
        </div>
        <hr>
        <div class="mt-4 text-center">Are you sure you want to update this midterm?<br>
            All student marks regarding this midterm would be deleted
        </div>

        <div class='mt-5 mb-1 flex justify-between'>
            <button class='rounded-md text-white p-1 text-sm w-28' id='cancelMidtermUpdateBtnID'>
                Cancel
            </button>
            <button class='rounded-md text-white p-1 text-sm w-28' type="submit" name="updateMidtermConfirm"
                    id='updateMidtermConfirmID'>
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
        $('#createMidtermBtnDivID').addClass('hidden')
    } else {
        $('#editMidtermBtnsDivID').addClass('hidden')
    }


</script>

<!--Hannan's Work-->
<script>

    let midtermID = <?php echo json_encode($midtermID);?>;
    let editingMode = <?php echo json_encode($editingMode);?>;
    //setCLOList(<?php //echo json_encode($CLOList);?>//);

    //This would only run when we are in editing mode
    if (editingMode == true) {
        midtermQuestionsBox = document.getElementById("midtermQuestionsBoxID")
        let numberOfQuestions = <?php echo json_encode(getMidtermData($midtermData, 4));?>;
        let questionDetail = <?php echo json_encode($midtermQuestionsData);?>;
        let selectedCLOsList = <?php echo json_encode($selectedCLOs);?>;
        let CLOCodeList = <?php echo json_encode($CLOCodeList);?>;
        let CLONameList = <?php echo json_encode($CLONameList);?>;

        for (let i = 0; i < numberOfQuestions; i++) {
            midtermQuestionsBox.append(createElement(questionDetail[i], selectedCLOsList[i]))
        }

        setNumberOfQuestion(numberOfQuestions)
    }


    function createElement(questionDetail, selectedCLOForEachQuestion) {
        //The following variable is declared in MidtermScripts, since that is imported first into this page, I can easily use it
        counterMidtermQuestions++;

        firstHalf = "<div class='grid grid-cols-7 items-center p-2'>\n" +
            "                        <div class='col-span-1 h-full flex items-center justify-center'>\n" +
            "                            <label name='questionLabel' >Question " + counterMidtermQuestions + " </label>\n" +
            "                            <div class='verticalLine ml-2 mr-2'></div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <!--                Question Detail-->\n" +
            "                        <div class='col-span-3 flex flex-col items-center'>\n" +
            "                            <div class='textField-label-content w-full mb-0' id='question" + counterMidtermQuestions + "DetailDivID'>\n" +
            "                            <label class='hidden' name='midtermQuestion'>" + questionDetail[0] + "</label>\n" +
            "                                <input class='textField m-1' type='text' placeholder=' ' value='" + questionDetail[1] + " ' id='question" + counterMidtermQuestions + "DetailID'\n" +
            "                                       name='midtermQuestions[" + counterMidtermQuestions + "][Detail]'>\n" +
            "                                <label class='textField-label'>Detail</label>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <!--                Marks-->\n" +
            "                        <div class='col-span-1'>\n" +
            "                            <div class='textField-label-content w-full mb-0' id='question" + counterMidtermQuestions + "MarksDivID'>\n" +
            "                                <input class='textField m-1' type='number' placeholder=' ' id='question" + counterMidtermQuestions + "MarksID'\n" +
            "                                       value='" + questionDetail[2] + "' name='midtermQuestions[" + counterMidtermQuestions + "][Marks]'>\n" +
            "                                <label class='textField-label'>Marks</label>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class='select-label-content col-span-1 mb-0' id='question" + counterMidtermQuestions + "CLODivID'>\n" +
            "                            <select class='select w-full m-1' name='midtermQuestions[" + counterMidtermQuestions + "][CLO]'\n" +
            "                                    value='" + questionDetail[3] + "' id='question" + counterMidtermQuestions + "CLOID'>\n" +
            "                                   <option value='' hidden></option>\n" +
            createDropdown(selectedCLOForEachQuestion) +
            "                            </select>\n" +
            "                            <label class='select-label'>CLO</label>\n" +
            "                        </div>\n" +
            "                        <div class='col-span-1 flex justify-center'>\n" +
            "                               <img class='cursor-pointer' name='deleteMidtermQuestion' src='../../../../Assets/Images/vectorFiles/Icons/minus-red.svg'>" +
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


    $("img[name='deleteMidtermQuestion']").click(function (event) {
        //using event.stopImmediatePropagation() to stop the code in this function from
        // executing on elements other than the clicked one but with same name
        event.stopImmediatePropagation()

        // Removing the question
        $(event.target).closest('div.grid.grid-cols-7.items-center.p-2').remove()

        //Decrementing the total questions counter
        counterMidtermQuestions--;

        //Updating Question Numbers
        let newQuestionNumbers = 1;
        $('label[name = "questionLabel"]').each(function () {
            $(this).text("Question " + newQuestionNumbers);
            newQuestionNumbers++;
        })
        //Again set number of questions on deletion
        setNumberOfQuestion(counterMidtermQuestions);
    })

    setInitialMidtermQuestions(<?php echo json_encode($midtermQuestionsData);?>)
    setInitialMidtermQuestionIDs(<?php echo json_encode($questionIDs);?>)

</script>