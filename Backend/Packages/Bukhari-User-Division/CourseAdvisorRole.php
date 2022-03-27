<?php

class CourseAdvisorRole extends UserRole
{
    protected $adminCode;
    protected $sectionCode;

    public function __construct($email, $password)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }

    public function login($email, $password)
    {
        $sql = /** @lang text */
            "select facultyCode, sectionCode, officialEmail, password from courseadvisor where officialEmail = \"$this->email\" and password = \"$this->email\" ; ";
        $authenticationResult = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($authenticationResult) == 1) {
            while ($row = $authenticationResult->fetch_assoc()) {
                $this->adminCode = $row["facultyCode"];
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


}