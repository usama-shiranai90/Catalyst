<?php
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\ClassActivities\Midterm.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\Midterm.php";

if (isset($_POST['midtermID'])) {
    echo $_POST['midtermID'];
//    Perform sessional deletion code here
    $midterm = new Midterm();
    $midterm->deleteActivity($_POST['midtermID']);

}
?>