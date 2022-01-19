<?php
if (session_status() === PHP_SESSION_NONE || !isset($_SESSION)) {
    session_start();
    $_SESSION['recordExist'] = false;
}

if ($_SESSION['recordExist']){ //
    $_SESSION['typeOfProfile'] = 2;

}else{
    $_SESSION['typeOfProfile'] = 1;
    header("Location: courseprofile.php");
}
?>