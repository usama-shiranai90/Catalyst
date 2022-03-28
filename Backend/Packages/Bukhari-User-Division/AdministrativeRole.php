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

    public static function getAssociatedRoles($facultyCode, $programCode = 'none', $sectionCode = 'none'): array
    {
        /*foreach (array(new HeadOfDepartmentRole("", ""), new ProgramManagerRole("", ""),
                     new CourseAdvisorRole("", "")) as $index => $role) {
            $respectiveRoles[$index] = $role->getFacultyRole($facultyCode, $respectiveRoles);
        }*/
//        $respectiveRoles = array("HOD" => false, "PM" => false, "CA" => false);

        $respectiveRoles = array();
        for ($i = 0; $i < 3; $i++) {
            if ($i === 0) {
                self::forHeadOfDepartment($facultyCode, $respectiveRoles);
            }
            if ($i === 1) {
                self::forProgramManager($facultyCode, $programCode, $respectiveRoles);
            }
            if ($i === 2) {
                self::forCourseAdvisor($facultyCode, $programCode, $sectionCode, $respectiveRoles);
            }
        }

        return $respectiveRoles;
    }

    public static function forHeadOfDepartment($facultyCode, &$respectiveRoles)
    {
        $adminRole = new HeadOfDepartmentRole("", "");
        $adminRole->getFacultyRole($facultyCode, $respectiveRoles);
    }

    public static function forProgramManager($facultyCode, $programCode, &$respectiveRoles)
    {
        $adminRole = new ProgramManagerRole("", "");
        if (strcasecmp($programCode, "none") === 0) {
            $adminRole->getFacultyRole($facultyCode, $respectiveRoles);
        } else
            $adminRole->getFacultyRole($facultyCode, $respectiveRoles, $programCode);
    }

    public static function forCourseAdvisor($facultyCode, $programCode, $sectionCode, &$respectiveRoles)
    {
        $adminRole = new CourseAdvisorRole("", "");
        if (strcasecmp($sectionCode, "none") === 0)
            $adminRole->getFacultyRole($facultyCode, $respectiveRoles);
        else
            $adminRole->getFacultyRole($facultyCode, $respectiveRoles, $programCode, $sectionCode);
    }

}