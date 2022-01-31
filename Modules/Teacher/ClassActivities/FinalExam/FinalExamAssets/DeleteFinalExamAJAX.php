<?php
include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\ClassActivities\FinalExam.php";

if (isset($_POST['finalExamID'])) {
    echo $_POST['finalExamID'];
//    Perform finalExam deletion code here
    //    Perform sessional deletion code here
    $finalExam = new FinalExam();
    $finalExam->deleteActivity($_POST['finalExamID']);

}
?>