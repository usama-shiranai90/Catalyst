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
        $this->mappedPLOs = array();
    }

    public function retrieveAllCLOPerCourse($curriculumID, $programID, $courseCode, $deleteFromMappingArray): array
    {
        $CLOlist = array();

        $this->databaseConnection = DatabaseSingleton::getConnection();
        $sql = /** @lang text */
            "select co.courseCode ,co.cloName ,co.description ,co.domain ,co.btLevel ,co.CLOCode  ,map.CLOCode,map.PLOCode , p.ploName , p.ploDescription
            from clo as co  join clotoplomapping map on co.CLOCode = map.CLOCode join plo p on map.PLOCode = p.PLOCode where 
            co.programCode = \"$programID\" and co.curriculumCode = \"$curriculumID\" and co.courseCode = \"$courseCode\" ORDER BY co.cloName;";

        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) > 0) {
            $tempArray = array(); //  plos.
            $currentCLO = '';
            while ($row = $result->fetch_assoc()) {
//                echo "counter  ". $row['cloName'] ."<br>";
                if ($currentCLO != $row["cloName"]) {
                    if (sizeof($tempArray) != 0) {
//                        echo "Inserting PLOs again CLO " . $currentCLO . "<br>";
                        sort($tempArray);
                        array_push($this->mappedPLOs, $tempArray);
//                        print_r("PLOs are :  " . json_encode($tempArray)."<br>");
                        $tempArray = array();
                    }
                    $currentCLO = $row["cloName"];
                    $CLOlist[] = [$row['CLOCode'], $row["cloName"], $row["description"], $row["domain"], $row["btLevel"]];
                }
                $tempArray[] = [$row['PLOCode'], $row["ploName"], $row["ploDescription"]];
            }
            sort($tempArray);
            array_push($this->mappedPLOs, $tempArray);

            echo "CLO list is :".json_encode($CLOlist);

        } else
            echo "Cant find clo : " . $this->databaseConnection->error;

        if (strcmp($deleteFromMappingArray, 'PLOCode') == 0) {
            $this->deleteFromMappedArray(0);
        } elseif (strcmp($deleteFromMappingArray, 'PLOName') == 0) {
            $this->deleteFromMappedArray(1);
        } elseif (strcmp($deleteFromMappingArray, 'PLODescription') == 0) {
            $this->deleteFromMappedArray(2);
        }

   /*   showing data on server page.
     foreach ($this->mappedPLOs as $what) {
            foreach ($what as $w) {
                print_r(json_encode($w) . "<br>");
            }
        }*/

        return $CLOlist;
    }

    private function deleteFromMappedArray($index)
    {
        for ($x = 0; $x < sizeof($this->mappedPLOs); $x++) {
            for ($y = 0; $y < sizeof($this->mappedPLOs[$x]); $y++) {
                array_splice($this->mappedPLOs[$x][$y], $index, 1);
//                unset($this->mappedPLOs[$x][$y][4]);
//                echo  json_encode($this->mappedPLOs[$x][$y])."<br> <br><br>";
            }

        }
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