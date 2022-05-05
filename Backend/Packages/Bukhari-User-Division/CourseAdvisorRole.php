<?php

class CourseAdvisorRole extends UserRole
{
    protected $adminCode;
    protected $departmentCode;
    protected $programCode;
    protected $batchCode;
    protected $sectionCode;

    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password): bool
    {

        $this->email = $email;
        $this->password = $password;

        $sql = /** @lang text */
            " select ca.facultyCode,  ca.sectionCode, ca.officialEmail, ca.password, departmentCode , programCode , b.batchCode
                from courseadvisor ca
                         join faculty f on ca.facultyCode = f.facultyCode  join section s on ca.sectionCode = s.sectionCode
                        join semester s2 on s.semesterCode = s2.semesterCode join batch b on s2.batchCode = b.batchCode
                        where ca.officialEmail = \"$email\" and ca.password = \"$password\" ; ";
        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $this->adminCode = $row["facultyCode"];
                $this->departmentCode = $row["departmentCode"];
                $this->programCode = $row["programCode"];
                $this->batchCode = $row["batchCode"];
                $this->sectionCode = $row["sectionCode"];
                $this->setUserDataInstance(/** @lang text */ "select * from faculty where facultyCode = '$this->adminCode'", $this->adminCode);
                $this->setNavigationUrl("../CourseAdvisor/caPanel.php");
                return true;
            }
        }
        return false;
    }

    public function getAdminCode()
    {
        return $this->adminCode;
    }

    public function getSectionCode()
    {
        return $this->sectionCode;
    }


    public function getDepartmentCode()
    {
        return $this->departmentCode;
    }

    public function getProgramCode()
    {
        return $this->programCode;
    }

    public function getBatchCode()
    {
        return $this->batchCode;
    }


    public function getFacultyRole($facultyCode, &$respectiveRoles, $programCode = 'none', $sectionCode = 'none'): bool
    {
        $flag = false;
        $adminStat = array(
            "hasRole" => false,
            "programCode" => 'none',
            "sectionCode" => 'none',
            "sectionName" => 'none',
        );
        $prepareStatementSearchQuery = '';
        if (strcasecmp($programCode, 'none') === 0 and strcasecmp($sectionCode, 'none') === 0) {
            $prepareStatementSearchQuery = $this->databaseConnection->prepare(query: "select facultyCode, s.sectionCode, s2.semesterCode, sectionName, batchName ,programCode from courseadvisor join section s on s.sectionCode = courseadvisor.sectionCode inner join semester s2 on s.semesterCode = s2.semesterCode
                 inner join batch b on s2.batchCode = b.batchCode where facultyCode = ? ");
            $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($facultyCode, 'string'));
            $prepareStatementSearchQuery->bind_param('s', $sanitizeFacultyCode);
        } else
            if (FormValidator::validateItem($programCode, 'int') && FormValidator::validateItem($sectionCode, 'int')) {
                $prepareStatementSearchQuery = $this->databaseConnection->prepare(query: "select facultyCode, s.sectionCode, s2.semesterCode, sectionName , batchName ,programCode from courseadvisor join section s on s.sectionCode = courseadvisor.sectionCode inner join semester s2 on s.semesterCode = s2.semesterCode
                 inner join batch b on s2.batchCode = b.batchCode where facultyCode = ? and programCode = ? and s.sectionCode =  ? ");

                $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($facultyCode, 'string'));
                $sanitizeProgramCode = FormValidator::sanitizeUserInput($programCode, 'int');
                $sanitizeSectionCode = FormValidator::sanitizeUserInput($sectionCode, 'int');
                $prepareStatementSearchQuery->bind_param('sii', $sanitizeFacultyCode, $sanitizeProgramCode, $sanitizeSectionCode);
            }

        if ($prepareStatementSearchQuery->execute()) {
            $result = $prepareStatementSearchQuery->get_result();
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $adminStat['hasRole'] = true;
                    $adminStat['programCode'] = $row['programCode'];
                    $adminStat['sectionCode'] = $row['sectionCode'];
                    $adminStat['sectionName'] = $row['sectionName'];
                    $adminStat['batchName'] = $row['batchName'];
                    $respectiveRoles['CA'][] = $adminStat;
                }
                $flag = true;
            } else
                $respectiveRoles['CA'][] = $adminStat;
        }
        return $flag;
    }

    public function assignCourseAdvisor($email, $password, $facultyCode, $sectionCode): bool
    {
        $prepareStatementSearchQuery = $this->databaseConnection->prepare('select facultyCode, sectionCode, officialEmail, password
        from courseadvisor where sectionCode = ? ;');

        $sanitizeSectionCode = FormValidator::sanitizeUserInput($sectionCode, 'int');
        $prepareStatementSearchQuery->bind_param('i', $sanitizeSectionCode);
        if ($prepareStatementSearchQuery->execute()) {
            $result = $prepareStatementSearchQuery->get_result();

            $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($facultyCode, 'string'));
            $sanitizeEmail = FormValidator::sanitizeUserInput($email, 'email');

            if (mysqli_num_rows($result) > 0) {
                $prepareStatementUpdateQuery = $this->databaseConnection->prepare(query: "UPDATE courseadvisor SET facultyCode =  ? , officialEmail = ?, password = ?
                WHERE sectionCode = ? ;");
                $prepareStatementUpdateQuery->bind_param('sssi', $sanitizeFacultyCode, $sanitizeEmail, $password, $sanitizeSectionCode);
                return $prepareStatementUpdateQuery->execute() === TRUE;
            } else if (mysqli_num_rows($result) === 0) {
                $prepareStatementInsertionQuery = $this->databaseConnection->prepare(query: "insert into courseadvisor(facultyCode, sectionCode, officialEmail, password)
                values (? , ? ,? ,?);");
                $prepareStatementInsertionQuery->bind_param('siss', $sanitizeFacultyCode, $sanitizeSectionCode, $sanitizeEmail, $password);
                return $prepareStatementInsertionQuery->execute() === TRUE;
            }
        }
        return false;
    }

    public function retrieveAdminRole($departmentCode, &$respectiveRoles): bool
    {
        $adminStat = array("sectionCode" => '-', "facultyID" => '-', "name" => '-', "designation" => '-', "officialEmail" => '-', "roleName" => '-', 'ofOther' => '-');

        $prepareStatementSearchQuery = $this->databaseConnection->prepare('select ca.facultyCode,  ca.sectionCode, ca.officialEmail, name, designation, departmentCode , 
            sectionName , batchName , semesterName from courseadvisor ca join faculty f on 
            ca.facultyCode = f.facultyCode  join section s on ca.sectionCode = s.sectionCode
            join semester s2 on s.semesterCode = s2.semesterCode join batch b on s2.batchCode = b.batchCode
            where departmentCode  = ? ;');

        $sanitizeDepartmentCode = FormValidator::sanitizeUserInput($departmentCode, 'int');
        $prepareStatementSearchQuery->bind_param('i', $sanitizeDepartmentCode);
        if ($prepareStatementSearchQuery->execute()) {
            $result = $prepareStatementSearchQuery->get_result();
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $adminStat['sectionCode'] = $row['sectionCode'];
                    $adminStat['facultyID'] = $row['facultyCode'];
                    $adminStat['name'] = $row['name'];
                    $adminStat['designation'] = $row['designation'];
                    $adminStat['officialEmail'] = $row['officialEmail'];
                    $adminStat['roleName'] = "Course Advisor";
                    $adminStat['ofOther'] = $this->ordinal($row['semesterName']) . " semester " . $row['batchName'] . " of section: " . $row['sectionName'];
                    $respectiveRoles['CA'][] = $adminStat;
                }
                return true;
            }
        }
        $respectiveRoles['CA'][] = $adminStat;
        return false;
    }

    function ordinal($number): string
    {
        $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
        if ((($number % 100) >= 11) && (($number % 100) <= 13))
            return $number . 'th';
        else
            return $number . $ends[$number % 10];
    }


    public function deleteAdministrativeRole($facultyCode, $sectionCode): bool
    {
        $prepareStatementDeleteQuery = $this->databaseConnection->prepare(query: "delete from courseadvisor where  
                                   facultyCode = ? and sectionCode = ? ");

        $sanitizeSectionCode = FormValidator::sanitizeUserInput($sectionCode, 'int');
        $sanitizeFacultyCode = FormValidator::sanitizeStringWithNoSpace(FormValidator::sanitizeUserInput($facultyCode, 'string'));
        $prepareStatementDeleteQuery->bind_param('si', $sanitizeFacultyCode, $sanitizeSectionCode);
        return $prepareStatementDeleteQuery->execute() === TRUE;
    }

}