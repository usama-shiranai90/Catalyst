<?php
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\Sessional.php";

if (isset($_POST['sessionalID']) && isset($_POST['sessionalData'])) {
    if (isset($_POST['insert']) && $_POST['insert'] === "true" && isset($_POST['addedQuestions'])) {
//        perform insertion query here

        $sessional = new Sessional();
        $sessional->updateActivity($_POST['sessionalID'], $_POST['sessionalData'],$_POST['addedQuestions'], "Insert");

//        echo "inserted";
//        print_r($_POST['addedQuestions']);
    }


    if (isset($_POST['update']) and $_POST['update'] === "true" && isset($_POST['updatedQuestions'])) {
//        perform update query here

        $sessional = new Sessional();
        $sessional->updateActivity($_POST['sessionalID'], $_POST['sessionalData'],$_POST['updatedQuestions'], "Update");

//        echo "update";
//        print_r($_POST['updatedQuestions']);
//        print_r($_POST['sessionalData']);
    }


    if (isset($_POST['delete']) and $_POST['delete'] === "true" && isset($_POST['deletedQuestionIDs'])) {
//        perform delete query here

        $sessional = new Sessional();
        $sessional->updateActivity($_POST['sessionalID'], $_POST['sessionalData'],$_POST['deletedQuestionIDs'], "Delete");

//        echo "delete";
//        print_r($_POST['deletedQuestionIDs']);
    }

}

?>