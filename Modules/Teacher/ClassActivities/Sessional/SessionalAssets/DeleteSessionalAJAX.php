<?php
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
//include "D:\University\FYP\Catalyst\Development\Catalyst\Backend\Packages\ClassActivities\Sessional.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\DatabaseConnection\DatabaseSingleton.php";
include $_SERVER['DOCUMENT_ROOT']."\Backend\Packages\ClassActivities\Sessional.php";

if (isset($_POST['sessionalID'])) {
    echo $_POST['sessionalID'];
    $sessional = new Sessional();
    $sessional->deleteActivity($_POST['sessionalID']);
}
?>