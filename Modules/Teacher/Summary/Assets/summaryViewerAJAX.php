<?php
$CLOList = ['CLO-1', 'CLO-2', 'CLO-3'];

$selectedCLO = $_POST['listOfCLOs'];
$status = $_POST['status'];
//    run a query for studentsrollnumbers and names
$regNumbers = ["F18-BCSE-001", "F18-BCSE-002", "F18-BCSE-003", "F18-BCSE-004"];
$names = ["ABC", "DEF", "GHI", "JKL"];
$numberOfStudents = sizeof($regNumbers);


if ($selectedCLO == "All") {
//    run a query for studentsrollnumbers, names, and their marks in all CLOs of that subject in that section/class
    $listOfCLOMarks = [["100", "99", "98"], ["100", "78", "68"], ["160", "97", "29"], ["160", "97", "29"]]; //Multiple CLO
} else {
//    run a query for marks in selectedCLO of that subject in that section/class
    $listOfCLOMarks = [["100"], ["78"], ["29"], ["97"]]; //Multiple CLO
}
echo json_encode(array($numberOfStudents, $regNumbers, $names, $listOfCLOMarks));

?>
