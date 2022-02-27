<?php
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\ClassActivities\FinalExam.php";
require_once $_SERVER['DOCUMENT_ROOT']."\Modules\autoloader.php";


if (isset($_POST['finalExamID']) && isset($_POST['finalExamData'])) {
    if (isset($_POST['insert']) && $_POST['insert'] === "true" && isset($_POST['addedQuestions'])) {
//        perform insertion query here
        $finalExam = new FinalExam();
        $finalExam->updateActivity($_POST['finalExamID'], $_POST['finalExamData'],$_POST['addedQuestions'], "Insert");

//        echo "insert";
        print_r($_POST['addedQuestions']);
    }
    if (isset($_POST['update']) and $_POST['update'] === "true" && isset($_POST['updatedQuestions'])) {
//        perform update query here
        $finalExam = new FinalExam();
        $finalExam->updateActivity($_POST['finalExamID'], $_POST['finalExamData'],$_POST['updatedQuestions'], "Update");

//        echo "update";
        print_r($_POST['updatedQuestions']);
    }
    if (isset($_POST['delete']) and $_POST['delete'] === "true" && isset($_POST['deletedQuestionIDs'])) {
//        perform delete query here

        $finalExam = new FinalExam();
        $finalExam->updateActivity($_POST['finalExamID'], $_POST['finalExamData'],$_POST['deletedQuestionIDs'], "Delete");

//        echo "delete";
        print_r($_POST['deletedQuestionIDs']);
    }
}

?>