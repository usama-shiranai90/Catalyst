<?php

class CLO
{
    public $cloCode;
    public $cloName;
    public $cloDescription;
    public $cloDomain;
    public $cloBtLevel;
    public $mappedPLOs;
    public $databaseConnection;

//    public function __construct($cloCode,$cloName, $cloDescription)
//    {
//        $this->cloCode = $cloCode;
//        $this->cloName = $cloName;
//        $this->cloDescription = $cloDescription;
//        $this->MappedPLOs = array();
//    }
    public function __construct()
    {
        $this->mappedPLOs = array();
    }

    public function creation($cloCode, $cloName, $cloDescription, $cloDomain, $cloBtLevel)
    {
        $this->cloCode = $cloCode;
        $this->cloName = $cloName;
        $this->cloDescription = $cloDescription;
        $this->cloDomain = $cloDomain;
        $this->cloBtLevel = $cloBtLevel;
    }

    public function retrieveAllCLOPerCourse($curriculumID, $programID, $courseCode): array
    {
        $CLOlist = array();

        $this->databaseConnection = DatabaseSingleton::getConnection();
        $sql = /** @lang text */
            "select co.courseCode ,co.cloName ,co.description ,co.domain ,co.btLevel ,co.CLOCode  ,map.CLOCode,map.PLOCode , p.ploName , p.ploDescription
            from clo as co  join clotoplomapping map on co.CLOCode = map.CLOCode join plo p on map.PLOCode = p.PLOCode where 
            co.programCode = \"$programID\" and co.curriculumCode = \"$curriculumID\" and co.courseCode = \"$courseCode\" ORDER BY co.cloName;";

        $result = $this->databaseConnection->query($sql);
        //        if (mysqli_num_rows($result) > 0) {
        //            $cloNo = 1;
        //            $tempArray = array();
        //
        //            while ($row = $result->fetch_assoc()) {
        //                if ($row["cloName"] == "CLO-" . $cloNo) { // agr same class hai to.
        //                    $tempArray[] = [$row["ploName"], $row["ploDescription"]];
        //                    if ($flag != 1) {
        //                        $CLOlist[] = [$row["cloName"], $row["description"], $row["domain"], $row["btLevel"]];
        //                        $flag = 1;
        //                    }
        //                } else {
        //                    array_push($this->mappedPLOs, $tempArray);
        //                    $cloNo += 1;
        //                    $flag = 0;
        //                    $tempArray = array();
        //                    $tempArray[] = [$row["ploName"], $row["ploDescription"]];
        //                    array_push($this->mappedPLOs, $tempArray);
        ////                    $flag = 1;
        //                }
        //                if ($flag != 1) {
        //                    $CLOlist[] = [$row["cloName"], $row["description"], $row["domain"], $row["btLevel"]];
        //                    echo "are you printing :".json_encode($CLOlist);
        //                    $flag = 1;
        //                }
        //
        //                /* $fld = mysqli_fetch_field($result);
        //                 echo json_encode($row)."\n<br>". $row[];*/
        //            }
        ////            echo "Well the list is" . "         <br>\n" . json_encode($this->mappedPLOs);
        //        } else
        //            echo "Cant find clo : " . $this->databaseConnection->error;

        if (mysqli_num_rows($result) > 0) {
            $tempArray = array();
            $currentCLO = '';
            while ($row = $result->fetch_assoc()) {
                if ($currentCLO != $row["cloName"]) {
                    if (sizeof($tempArray) != 0) {
                        echo "Inserting PLOs again CLO " . $currentCLO;
                        sort($tempArray);
                        array_push($this->mappedPLOs, $tempArray);
                        $tempArray = array();
                    }
                    $currentCLO = $row["cloName"];
                    $CLOlist[] = [$row['CLOCode'], $row["cloName"], $row["description"], $row["domain"], $row["btLevel"]];
                }
                $tempArray[] = [$row["ploName"], $row["ploDescription"]];
            }
//            echo "Inserting PLOs again CLO " . $currentCLO;
            sort($tempArray);
            array_push($this->mappedPLOs, $tempArray);
        } else
            echo "Cant find clo : " . $this->databaseConnection->error;

        return $CLOlist;
    }


    public function retrieveCLOlist($curriculumID, $programID, $courseCode): array
    {
        $CLOlist = array();

        $this->databaseConnection = DatabaseSingleton::getConnection();
        $sql = /** @lang text */
            "select co.courseCode ,co.cloName ,co.description ,co.domain ,co.btLevel ,co.CLOCode  ,map.CLOCode,map.PLOCode , p.ploName , p.ploDescription
            from clo as co  join clotoplomapping map on co.CLOCode = map.CLOCode join plo p on map.PLOCode = p.PLOCode where 
            co.programCode = \"$programID\" and co.curriculumCode = \"$curriculumID\" and co.courseCode = \"$courseCode\" ORDER BY co.cloName;";

        $result = $this->databaseConnection->query($sql);
        if (mysqli_num_rows($result) > 0) {
            $currentCLO = '';
            while ($row = $result->fetch_assoc()) {
                if ($currentCLO != $row["cloName"]) {
                    $currentCLO = $row["cloName"];
                    $CLOlist[] = [$row['CLOCode'], $row["cloName"]];
                }
            }
//            echo "List Of Respective CLOs :<br>";
        } else
            echo "Cant retrieve clo : " . $this->databaseConnection->error;

        return $CLOlist;
    }

    public function toString()
    {
        echo "CLOName:" . $this->cloName . ", ";
        echo "CLODescription:" . $this->cloDescription . "<br> ";
    }
}

?>