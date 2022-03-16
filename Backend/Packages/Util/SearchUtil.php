<?php

function iterateAndSearchValue($array, $val, &$tempKeyReference, &$tempValueReference): bool
{
    //        if (isset($item[$key]) && $item[$key] == $val)
    foreach ($array as $item) {
        if (in_array($val, $item)) {
            $tempKeyReference = $item['code'];
            $tempValueReference = $item['year'];
            return true;
        }
    }
    return false;
}


function generateCurriculumYearSelector($earliestYear , $currentOnGoingYear , $curriculumList){
    foreach (range(date('Y', strtotime("+4 year")), $earliestYear) as $year) {
        if (array_key_exists($earliestYear, $curriculumList)) {
            echo($year == $currentOnGoingYear ? ' selected="selected"' : 'xx');
        }
    }
}

function compareProgramType($programType)
{
    $programType = strtolower($programType);
    $data = array(strtolower("Bachelors of Computer in Software Engineering"), strtolower("Bachelors of Computer in Computer Science"), strtolower("Bachelors in Social Science"));
    $toCompareWith = array(strtolower("BCSE"), strtolower("BCCS"), strtolower("IDK"));

    $counter = 0 ;
    foreach ($toCompareWith as $type) {
        if (str_contains($programType, $type)){
            return $data[$counter];
        }
        $counter++;
    }
    return "";
}


function updateServer($status, $message, $error): array
{
    $resultBackServer['status'] = $status;
    $resultBackServer['message'] = $message;
    $resultBackServer['errors'] = $error;
    return $resultBackServer;
}


?>