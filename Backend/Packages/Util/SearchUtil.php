<?php

function iterateAndSearchValue($array, $val, &$tempKeyReference, &$tempValueReference): bool
{
    foreach ($array as $item) {
        if (in_array($val, $item)) {
            $tempKeyReference = $item['code'];
            $tempValueReference = $item['year'];
            return true;
        }
    }
    return false;
}

/** Program Name Abbreviation */
function checkProgramAbbreviation($value): ?string
{
    if (str_contains(strtolower($value), strtolower("Bachelors of Computer in Software Engineering")) !== false
        || (preg_match('/\bSoftware Engineering\b/', $value, $f) == 1)) {
        return 'BCSE';
    } elseif (str_contains(strtolower($value), strtolower("Bachelors of Computer in Computer Science")) !== false
        || preg_match('/\bComputer Science\b/', $value, $f) == 1) {
        return 'BCCS';
    } elseif (str_contains(strtolower($value), strtolower("Bachelors in Social Science")) !== false
        || preg_match('/\bSocial Science\b/', $value, $f) == 1) {
        return 'BCSS';
    }
    return null;
}

/** Program Name Abbreviation */
function checkDepartmentAbbreviation($value): ?string
{
    if (str_contains(strtolower($value), strtolower("Software Engineering")) !== false
        || (preg_match('/\bSoftware Engineering\b/', $value, $f) == 1)) {
        return 'SE';
    } elseif (str_contains(strtolower($value), strtolower("Electrical Engineering")) !== false
        || preg_match('/\bElectrical Engineering\b/', $value, $f) == 1) {
        return 'EE';
    } elseif (str_contains(strtolower($value), strtolower("Bachelors in Social Science")) !== false
        || preg_match('/\bEngineering Technology\b/', $value, $f) == 1) {
        return 'ET';
    }
    return null;
}


function generateCurriculumYearSelector($earliestYear, $currentOnGoingYear, $curriculumList)
{
    foreach (range(date('Y', strtotime("+4 year")), $earliestYear) as $year) {
        if (array_key_exists($earliestYear, $curriculumList)) {
            echo($year == $currentOnGoingYear ? ' selected="selected"' : 'xx');
        }
    }
}

function updateServer($status, $message, $error): array
{
    $resultBackServer['status'] = $status;
    $resultBackServer['message'] = $message;
    $resultBackServer['errors'] = $error;
    return $resultBackServer;
}


/** Excluded due to update in database schema */
function compareProgramType($programType)
{
    $programType = strtolower($programType);
    $data = array(strtolower("Bachelors of Computer in Software Engineering"), strtolower("Bachelors of Computer in Computer Science"), strtolower("Bachelors in Social Science"));
    $toCompareWith = array(strtolower("BCSE"), strtolower("BCCS"), strtolower("IDK"));

    $counter = 0;
    foreach ($toCompareWith as $type) {
        if (str_contains($programType, $type)) {
            return $data[$counter];
        }
        $counter++;
    }
    return "";
}

?>