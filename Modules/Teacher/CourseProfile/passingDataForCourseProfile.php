<?php
if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
    $_SESSION['recordExist'] = false;  /// will pass PLOlist , each field value to courseprofile View.
}

if ($_SESSION['recordExist']){ //
    $_SESSION['typeOfProfile'] = 2;

}else{
    $_SESSION['typeOfProfile'] = 1;
    header("Location: courseprofile.php");
}
?>