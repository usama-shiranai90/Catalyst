<?php

class AdministrativeRole
{
    public static function authenticate($email, $password): HeadOfDepartmentRole|ProgramManagerRole|CourseAdvisorRole|null
    {
        $containsPattern = self::checkIfPatternMatches($email);
//        echo sprintf("Email: %s   ,   %d <br>", $email, $containsPattern);

        if ($containsPattern === 1)
            return new HeadOfDepartmentRole($email, $password);
        elseif ($containsPattern === 2)
            return new ProgramManagerRole($email, $password);
        elseif ($containsPattern === 3)
            return new CourseAdvisorRole($email, $password);

        return null;
    }


    static function checkIfPatternMatches($word): int
    {
        if (preg_match('/\bhod-\b/', $word, $f) == 1 || str_contains("hod-", $word)) {
            return 1;
        } else if (preg_match('/\bca-\b/', $word, $f) == 1 || str_contains("ca-", $word)) {
            return 3;
        } else if (preg_match('/\bpm-\b/', $word, $f) == 1 || str_contains("pm-", $word)) {
            return 2;
        }
        return -1;
    }

}