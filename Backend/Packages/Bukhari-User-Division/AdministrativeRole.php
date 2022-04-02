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
        elseif ($containsPattern === 3){
            return new CourseAdvisorRole($email, $password);
        }
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


    // Function is used for getting the list of roles with respect to user belong to a specific department.
    public static function getAssociatedRoles($facultyCode, $programCode = 'none', $sectionCode = 'none'): array
    {
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
        if (is_array($programCode) and sizeof($programCode) > 1)
            foreach ($programCode as $value)
                self::operateProgram($facultyCode, $value->getProgramCode(), $respectiveRoles);
        else
            self::operateProgram($facultyCode, $programCode, $respectiveRoles);
    }

    protected static function operateProgram($facultyCode, $programCode, &$respectiveRoles)
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


    // Function is used for getting the list of all the associated Roles belong to a specific department or all departments.
    public static function retrieveListOfAdminRoles($departmentCode, $selected = 'none'): array
    {
        $respectiveRolesList = array();
        for ($i = 0; $i < 3; $i++) {
            if ($selected !== 'none')
                $i = $selected;

            if ($i === 0) {
                $adminRole = new HeadOfDepartmentRole("", "");
                $adminRole->retrieveAdminRole($departmentCode, $respectiveRolesList);
            }
            if ($i === 1) {
                $adminRole = new ProgramManagerRole("", "");
                $adminRole->retrieveAdminRole($departmentCode, $respectiveRolesList);
            }
            if ($i === 2) {
                $adminRole = new CourseAdvisorRole("", "");
                $adminRole->retrieveAdminRole($departmentCode, $respectiveRolesList);
            }
            if ($selected !== 'none')
                break;
        }
        return $respectiveRolesList;
    }

    public static function deleteAdministrativeRole($facultyId, $departmentCode, $programCode, $sectionCode): bool
    {
        $flag = false;
        if ($facultyId !== -1) {
            if ($departmentCode != -1) {
                $headOfDepartment = new HeadOfDepartmentRole("", "");
                $flag = $headOfDepartment->deleteAdministrativeRole($facultyId, $departmentCode);
            } elseif ($programCode != -1) {
                $programManager = new ProgramManagerRole("", "");
                $flag = $programManager->deleteAdministrativeRole($facultyId, $programCode);
            } elseif ($sectionCode != -1) {
                $courseAdvisor = new CourseAdvisorRole("", "");
                $flag = $courseAdvisor->deleteAdministrativeRole($facultyId, $sectionCode);
            }
        }
        return $flag;
    }

}