<?php
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\Midterm.php";


if (isset($_POST['midtermID'])  && isset($_POST['midtermData'])) {
    if (isset($_POST['insert']) && $_POST['insert'] === "true" && isset($_POST['addedQuestions'])) {
//        perform insertion query here
        $midterm = new Midterm();
        $midterm->updateActivity($_POST['midtermID'], $_POST['midtermData'],$_POST['addedQuestions'], "Insert");

        echo "insert";
        print_r($_POST['addedQuestions']);
    }
    if (isset($_POST['update']) and $_POST['update'] === "true" && isset($_POST['updatedQuestions'])) {
//        perform update query here

        $midterm = new Midterm();
        $midterm->updateActivity($_POST['midtermID'], $_POST['midtermData'],$_POST['updatedQuestions'], "Update");


        echo "update";
        print_r($_POST['updatedQuestions']);
    }
    if (isset($_POST['delete']) and $_POST['delete'] === "true" && isset($_POST['deletedQuestionIDs'])) {
//        perform delete query here

        $midterm = new Midterm();
        $midterm->updateActivity($_POST['midtermID'], $_POST['midtermData'],$_POST['deletedQuestionIDs'], "Delete");

        echo "delete";
        print_r($_POST['deletedQuestionIDs']);
    }
}

?>