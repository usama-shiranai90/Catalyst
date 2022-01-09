<?php

$currentAssessment = $_POST['assessmentType'];

// apply query to get specific assessment result in array.  will deal in object of array.
$regNumbers = array("F18-BCSE-001", "F18-BCSE-002", "F18-BCSE-003", "F18-BCSE-004");
$description = "To control the letter spacing of an element at a specific breakpoint";
$total = 10 ;
$achievement = array(
    "obtain"=>array (8,9,10,6),
    "achieved"=>array ("80%" , "90%" , "100%" , "60%" )
);

echo json_encode(array($regNumbers , $description , $total , $achievement));

?>