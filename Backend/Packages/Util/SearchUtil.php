<?php
/** Function is used to iterate the array and get the specific key=>value. */
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

/** Function is used to apply the standard deviation on given data set (array) i.e.
 *  implemented to find the average scoring of CLO per course , student average course score.
 */
function standardDeviation($scoreList): float
{
    $variance = 0.0;
    $totalScoreLength = count($scoreList);
    $average = array_sum($scoreList) / $totalScoreLength;
    foreach ($scoreList as $value)
        $variance += pow(($value - $average), 2);
    return number_format(sqrt($variance / $totalScoreLength), 4, '.', '');
}


/** Function is used to check the name of Program and convert it into its related Abbreviation. #Approach-1st */
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

/** Function is used to check the name of Program and convert it into its related Abbreviation. #Approach-2nd
 *  Excluded due to update in database schema */
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


/** Function is used to check the name of department and convert it into its related Abbreviation. #Approach-1st */
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


function checkAdministrativePattern($word): int
{
    if (preg_match('/\bhead of department\b/i', $word, $f) == 1) {
        return 0;
    } else if (preg_match('/\bprogram manager\b/i', $word, $f) == 1) {
        return 1;
    } else if (preg_match('/\bcourse advisor\b/i', $word, $f) == 1) {
        return 2;
    }
    return -1;
}



?>