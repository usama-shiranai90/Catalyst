<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
if (session_status() === PHP_SESSION_NONE || !isset($_SESSION))
    session_start();

$resultBackServer = array("status" => -1, "message" => 'no message', "errors" => 'no error');
$student = new StudentRole();

if (isset($_POST['update_student_p']) and $_POST['update_student_p']) {

    if (isset($_POST['stuName']) and isset($_POST['stuContact']) and isset($_POST['stuEmail'])) {
        $studentName = $_POST['stuName'];
        $studentEmail = $_POST['stuEmail'];
        $studentContact = $_POST['stuContact'];

        $flag = $student->updateProfileInfo($studentName, $studentEmail, $studentContact, $_SESSION['studentRegistrationCode']);
        if ($flag)
            $resultBackServer = updateServer(1, "Data Was Inserted Successfully ".$studentContact, "none");
        else
            $resultBackServer = updateServer(0, "Some-time went wrong ,try again.", "registration-error");

        die(json_encode($resultBackServer));
    }

} elseif (isset($_POST['update_p']) and $_POST['update_p']) {

    if (isset($_POST['oldpass']) and isset($_POST['newpass']) and isset($_POST['ops'])) {
        $encryptedPassword = $_POST['ops'];
        $oldPassword = $_POST['oldpass'];
        $password = $_POST['newpass'];

        if (password_verify($oldPassword, $encryptedPassword) === false)
            $resultBackServer = updateServer(0, "please check your old password , incorrect", "wrong-password");
        else {
            $flag = $student->updatePassword($password, $_SESSION['studentRegistrationCode']);
            if ($flag)
                $resultBackServer = updateServer(1, "Data Was Inserted Successfully", "none");
            else
                $resultBackServer = updateServer(0, "Some-time went wrong ,try again.", "updatePassword-function issue.");
        }
        die(json_encode($resultBackServer));
    }

} else
    die(json_encode(array("error" => "Could not established connection with ajax.")));


function updateServer($status, $message, $error): array
{
    $resultBackServer['status'] = $status;
    $resultBackServer['message'] = $message;
    $resultBackServer['errors'] = $error;
    return $resultBackServer;
}

?>