<?php

class CLO implements JsonSerializable
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
        $this->databaseConnection = DatabaseSingleton::getConnection();
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

    /**OneEyeOwl */
    public function retrieveAllCLOPerCourse($curriculumID, $programID, $courseCode,$batchCode, $deleteFromMappingArray): array
    {
        $CLOlist = array();


        $sql = /** @lang text */
            "select co.courseCode ,co.cloName ,co.description ,co.domain ,co.btLevel ,co.CLOCode  ,map.CLOCode,map.PLOCode , p.ploName , p.ploDescription
            from clo as co  join clotoplomapping map on co.CLOCode = map.CLOCode join plo p on map.PLOCode = p.PLOCode where 
            co.programCode = \"$programID\" and co.curriculumCode = \"$curriculumID\" and co.courseCode = \"$courseCode\" and co.batchCode = \"$batchCode\" ORDER BY co.cloName;";

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

            echo "CLO list is :" . json_encode($CLOlist);

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

    public function retrieveCLOlist($curriculumID, $programID, $courseCode): ?array
    {
        $CLOlist = array();

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
                    $CLOlist[] = [$row['CLOCode'], $row["cloName"], $row['description']];
                }
            }
            return $CLOlist;
//            echo "List Of Respective CLOs :<br>";
        } else
            echo "Cant retrieve clo : " . $this->databaseConnection->error;
        return null;
    }

    public function retrieveCloName($cloCode)
    {
        $sql = /** @lang text */
            "select cloName from clo where CLOCode = \"$cloCode\"";

        $result = $this->databaseConnection->query($sql);

        if (mysqli_num_rows($result) == 1) {
            while ($row = $result->fetch_assoc()) {
                $this->cloName = $row['cloName'];
            }

        } else {
            echo "No cloName found with cloCode: " . $cloCode;

        }
        return $this->cloName;
    }

    public function retrieveCLOAveragePerCourse($courseCode, $sectionCode, $batchCode, $curriculumCode): ?array
    {
        $cloDataSet = array();
        $dbStatement = /** @lang text */
            "select cloName,
         sum(totalQuestionMarks)                                             as total,
         sum(obtainedMarks)                                                  as obtain,
         CAST(sum(obtainedMarks) / sum(totalQuestionMarks) * 100 as INTEGER) as result,
         sum(obtainedMarks) / count(totalQuestionMarks)                         avg
         from assessment as a
         join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode
         join assessmentquestionstudentmarks a3 on a2.questionCode = a3.questionCode
         join clo c on c.CLOCode = a2.cloCode
        where c.courseCode = \"$courseCode\" and sectionCode = \"$sectionCode\" and 
        c.batchCode = \"$batchCode\" and c.curriculumCode = \"$curriculumCode\" group by a2.cloCode;";

        $result = $this->databaseConnection->query($dbStatement);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp = array(
                    "cloName" => $row['cloName'],
                    "totalMarks" => $row['total'],
                    "obtainMarks" => $row['obtain'],
                    "result" => $row['result'],
                    "otherAvg" => $row['avg'],
                );
                array_push($cloDataSet, $temp);
            }
            return $cloDataSet;
        } else {
            echo "Error while fetching clo's average of course : " . $this->databaseConnection->error . "  wtf";
            return null;
        }
    }

    public function retrieveCLOAveragePerStudent($courseCode, $sectionCode): ?array
    {
        $cloDataSet = array();
        $dbStatement = /** @lang text */
            "select cloName, studentRegCode,
       sum(totalQuestionMarks)                                              tQMarks,
       sum(obtainedMarks)                                              obtainMarks,
       CAST(sum(obtainedMarks) / sum(totalQuestionMarks) * 100 as INTEGER) as result
        from assessment as a
         join assessmentquestion a2 on a.assessmentCode = a2.assessmentCode
         join assessmentquestionstudentmarks a3 on a2.questionCode = a3.questionCode
         join clo c on c.CLOCode = a2.cloCode
        where c.courseCode = \"$courseCode\"
          and sectionCode = \"$sectionCode\"
        group by a3.studentRegCode,a2.cloCode;";

        $result = $this->databaseConnection->query($dbStatement);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp = array(
                    "cloName"    => $row['cloName'],
                    "regNumber"  => $row['studentRegCode'],
                    "totalMarks" => $row['tQMarks'],
                    "ObtainMarks"=> $row['obtainMarks'],
                    "result"     => $row['result']
                );
                array_push($cloDataSet, $temp);
            }
            return $cloDataSet;
        } else {
            echo "Error while fetching clo's average of course : " . $this->databaseConnection->error . "  wtf";
            return null;
        }
    }


    public function retrieveCloCode($cloCode)
    {
        return $this->cloCode;
    }

    public function retrieveCloDescription($cloCode)
    {
        return $this->cloDescription;
    }

    public function getCloCode()
    {
        return $this->cloCode;
    }

    public function setCloCode($cloCode): void
    {
        $this->cloCode = $cloCode;
    }

    public function getCloName()
    {
        return $this->cloName;
    }

    public function setCloName($cloName): void
    {
        $this->cloName = $cloName;
    }

    public function getCloDescription()
    {
        return $this->cloDescription;
    }

    public function setCloDescription($cloDescription): void
    {
        $this->cloDescription = $cloDescription;
    }

    public function toString()
    {
        echo "CLOName:" . $this->cloName . ", ";
        echo "CLODescription:" . $this->cloDescription . "<br> ";
    }

    public function jsonSerialize()
    {
        return array(
            'cloCode' => $this->cloCode,
            'cloName' => $this->cloName,
            'cloDescription' => $this->cloDescription
        );
    }

}

?>