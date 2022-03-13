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

?>