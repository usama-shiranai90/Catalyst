<?php

class CourseAdvisorRole extends UserRole
{
    protected $adminCode;
    protected $departmentCode;
    protected $programCode;
    protected $batchCode;
    protected $sectionCode;

    public function __construct($email, $password)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }

    public function login($email, $password): bool
    {
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
        /*select facultyCode, s.sectionCode, s2.semesterCode, sectionName ,programCode from courseadvisor join section s on s.sectionCode = courseadvisor.sectionCode inner join semester s2 on s.semesterCode = s2.semesterCode
    inner join batch b on s2.batchCode = b.batchCode*/
        /*select facultyCode, s.sectionCode, semesterCode, sectionName from courseadvisor join section s on
                 s.sectionCode = courseadvisor.sectionCode where facultyCode*/
        $flag = false;
        $temp = array(
            "hasRole" => false,
            "programCode" => 'none',
            "sectionCode" => 'none',
            "sectionName" => 'none',
        );

        if (strcasecmp($programCode, 'none') === 0 and strcasecmp($sectionCode, 'none') === 0)
            $sql = /** @lang text */
                "select facultyCode, s.sectionCode, s2.semesterCode, sectionName, batchName ,programCode from courseadvisor join section s on s.sectionCode = courseadvisor.sectionCode inner join semester s2 on s.semesterCode = s2.semesterCode
                 inner join batch b on s2.batchCode = b.batchCode where facultyCode = \"$facultyCode\"; ";

        else
            $sql = /** @lang text */
                "select facultyCode, s.sectionCode, s2.semesterCode, sectionName , batchName ,programCode from courseadvisor join section s on s.sectionCode = courseadvisor.sectionCode inner join semester s2 on s.semesterCode = s2.semesterCode
                 inner join batch b on s2.batchCode = b.batchCode where facultyCode = \"$facultyCode\"  and programCode = \"$programCode\" and s.sectionCode =  \"$sectionCode\" ";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) > 0) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $temp['hasRole'] = true;
                $temp['programCode'] = $row['programCode'];
                $temp['sectionCode'] = $row['sectionCode'];
                $temp['sectionName'] = $row['sectionName'];
                $temp['batchName'] = $row['batchName'];
                $respectiveRoles['CA'][] = $temp;
            }
            $flag = true;
        } else
            $respectiveRoles['CA'][] = $temp;

        return $flag;
    }

    public function assignCourseAdvisor($email, $password, $facultyCode, $sectionCode): bool
    {
        $sql = /** @lang text */
            "select facultyCode, sectionCode, officialEmail, password from courseadvisor where sectionCode = \"$sectionCode\"; ";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) > 0) {
            $secondSql = /** @lang text */
                "UPDATE courseadvisor  SET facultyCode =  \"$facultyCode\" , officialEmail = \"$email\", password = \"$password\"
            WHERE sectionCode = \"sectionCode\";  ";
            if ($this->databaseConnection->query($secondSql) === TRUE)
                return true;
        } else if (mysqli_num_rows($authenticationResult) === 0) {

            $sql = /** @lang text */
                "insert into courseadvisor(facultyCode, sectionCode, officialEmail, password)
            VALUES (\"$facultyCode\" , \"$sectionCode\" , \"$email\", \"$password\"  );";
            if ($this->databaseConnection->query($sql) === TRUE)
                return true;
        }
        return false;
    }

    public function retrieveAdminRole($departmentCode, &$respectiveRoles): bool
    {
        $temp = array("sectionCode" => '-', "facultyID" => '-', "name" => '-', "designation" => '-', "officialEmail" => '-', "roleName" => '-', 'ofOther' => '-');
        $sql = /** @lang text */
            "select ca.facultyCode,  ca.sectionCode, ca.officialEmail, name, designation, departmentCode , sectionName , batchName , semesterName
                from courseadvisor ca
                         join faculty f on ca.facultyCode = f.facultyCode  join section s on ca.sectionCode = s.sectionCode
                        join semester s2 on s.semesterCode = s2.semesterCode join batch b on s2.batchCode = b.batchCode
                where departmentCode  = \"$departmentCode\"; ";

        $authenticationResult = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($authenticationResult) > 0) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $temp['sectionCode'] = $row['sectionCode'];
                $temp['facultyID'] = $row['facultyCode'];
                $temp['name'] = $row['name'];
                $temp['designation'] = $row['designation'];
                $temp['officialEmail'] = $row['officialEmail'];
                $temp['roleName'] = "Course Advisor";
//                $temp['ofOther'] = $row['batchName']." for   of section ".$row['sectionName']." ";
                $temp['ofOther'] = $this->ordinal($row['semesterName']) . " semester " . $row['batchName'] . " of section: " . $row['sectionName'];
                $respectiveRoles['CA'][] = $temp;
            }
            return true;
        }
        $respectiveRoles['HOD'][] = $temp;
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


    public function deleteAdministrativeRole($facultyId, $sectionCode): bool
    {
        $sql = /** @lang text */
            "delete from courseadvisor where facultyCode = \"$facultyId\" and sectionCode =  \"$sectionCode\" ;";
        $result = $this->databaseConnection->query($sql);
        if ($result === TRUE)
            return true;
        else
            return false;
    }

}