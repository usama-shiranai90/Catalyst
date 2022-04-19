<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\ServerPerformance.php";

session_start();

$resultBackServer = array("status" => -1, "message" => 'no message', "errors" => 'no error');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sNewCreation']) and $_POST['sNewCreation']) {

        if (isset($_POST['departmentCode']) and isset($_POST['programCode'])) {
            $departmentCode = $_POST['departmentCode'];
            $programCode = $_POST['programCode'];
            $curriculumCode = 1;
            $programName = $_POST['programName'];
            $seasonFName = $_POST['seasonFullName']; // fall 2021
            $seasonName = $_POST['seasonName'];     //  fall 21
            $seasonShortName = $_POST['seasonShortName']; // fa21
            $studentArrayList = $_POST['studentSectionWiseList'];

            /**
             * Procedural action for performing newly imported data of student.
             * 1. create new season.
             * 2. assign programCode , CurriculumCode and SeasonCode  , AND create new batch.
             * 3. create new semester and provide batchCode with semester no i.e. 1
             * 4. create new section
             * 5. create new student
             */

            // for creation of new season.
            $season = new Season();
            $isSeasonCreated = $season->createNewSeason($seasonName);

            if ($isSeasonCreated) {
                $seasonCode = $season->getSeasonCode();
                $createdYear = filter_var($seasonFName, FILTER_SANITIZE_NUMBER_INT);
                // for creation of new batch.
                $batch = new Batch();
                $isBatchCreated = $batch->createNewBatch($curriculumCode, $programCode, $seasonCode, $seasonShortName, $createdYear);
                if ($isBatchCreated) {
                    $batchCode = $batch->getBatchCode();
                    // for creation of new semester.
                    $semester = new Semester();
                    $isSemesterCreated = $semester->createNewSemester($batchCode);
                    if ($isSemesterCreated) {
                        //  now create new section first then create respective Student.
                        $semesterCode = $semester->getSemesterCode();
                        foreach ($studentArrayList as $key => $sectionList) {
                            // create new section.
                            $section = new Section();
                            $isSectionCreated = $section->createNewSection($semesterCode, $key);
                            if ($isSectionCreated) {
                                $sectionCode = $section->getSectionCode();
                                foreach ($sectionList as $k => $v) {
                                    $student = new StudentRole();
                                    $registrationNumber = $v['_reg'];
                                    $name = $v['_name'];
                                    $fatherName = $v['_fname'];
                                    $contact = $v['_contact'];
                                    $bloodGroup = $v['_group'];
                                    $address = $v['_address'];
                                    $dob = $v['_dob'];
                                    $officialMail = $v['_oMail'];
                                    $personalMail = $v['_pMail'];
                                    // $seasonShortName . "-" . $programName . "-" . substr($v['_reg'], -3)."   ".$v['_reg'];
                                    $authenticateCode = $seasonShortName . "-" . $programName . "-" . substr(preg_replace("/[^0-9]/", "", $registrationNumber), 2);

//                                print sprintf("%s , %s , %s , %s , %s , %s , %s , %s , %s ,  %s ,  %s <br>\n", $sectionCode, $registrationNumber, $name, $fatherName, $contact, $bloodGroup, $address, $dob, $officialMail, $personalMail, $authenticateCode);
                                    $student->createStudentData($sectionCode, $registrationNumber, $name, $fatherName, $contact, $bloodGroup, $address, $dob, $officialMail, $personalMail, $authenticateCode);

                                }
                            } else
                                $resultBackServer = updateServer(0, "error while creating new section : " . $section->getDatabaseConnection()->error, "ERROR");
                        }
                    } else
                        $resultBackServer = updateServer(0, "error while creating new semester : " . $semester->getDatabaseConnection()->error, "ERROR");

                } else
                    $resultBackServer = updateServer(0, "error while creating new batch : " . $batch->getDatabaseConnection()->error, "ERROR");

            } else
                $resultBackServer = updateServer(0, "error while creating new season : " . $season->getDatabaseConnection()->error, "ERROR");

            $resultBackServer = updateServer(1, "No Error : ", "Fine");
            die(json_encode($resultBackServer));
        } else
            $resultBackServer = updateServer(0, "incorrect depCode or proCode," . json_encode($_POST['departmentCode'], $_POST['programCode']), "ERROR");

        die(json_encode($resultBackServer));
    } else if (isset($_POST['refreshTable']) and $_POST['refreshTable']) {
        if (isset($_POST['sectionCode'])) {
            $sectionCode = $_POST['sectionCode'];
            $section = new Section();
            $studentList = $section->retrieveStudentList($sectionCode);

            if ($studentList !== null)
                $resultBackServer = updateServer(1, $studentList, "OK");
            else
                $resultBackServer = updateServer(0, "Error : " . $section->getDatabaseConnection()->error, "ERROR");

            die(json_encode($resultBackServer));
        }
    } else if (isset($_POST['manipulateData']) and $_POST['manipulateData']) {
        if (isset($_POST['sectionCode'])) {
            $_POST['newStudentList'] = $_POST['newStudentList'] ?? null;
            $_POST['updateStudentList'] = $_POST['updateStudentList'] ?? null;
            $_POST['deleteStudentList'] = $_POST['deleteStudentList'] ?? null;

            $sectionCode = $_POST['sectionCode'];
            $programName = $_POST['programName'];
            $newStudentList = $_POST['newStudentList'];
            $updateStudentList = $_POST['updateStudentList'];
            $deleteStudentList = $_POST['deleteStudentList'];

//            print json_encode($newStudentList) . "  " . is_array($newStudentList) . "<br>\n";
//            print json_encode($updateStudentList) . "  " . is_array($updateStudentList) . "<br>\n";
//            print json_encode($deleteStudentList) . "  " . is_array($deleteStudentList) . "<br>\n";

            /** Perform Insertion First before Deletion and Update */
            if ($_POST['hasAddition']) {
                $duplicateList = array();
                $student = new StudentRole();
                foreach ($newStudentList as $key => $value) {
                    foreach ($value as $k => $v) {
                        $registrationNumber = $v['_reg'];
//                    $student->createStudentData($sectionCode, $registrationNumber, $name, $fatherName, $contact, $bloodGroup, $address, $dob, $officialMail, $personalMail, $authenticateCode , $duplicateList);
                        $student->checkDuplication($registrationNumber, $duplicateList);
                    }
                }
                if (empty($duplicateList) and count($duplicateList) === 0) { // $duplicateList is empty
                    foreach ($newStudentList as $key => $value) {
                        foreach ($value as $k => $v) {
                            $registrationNumber = $v['_reg'];
                            $registrationNumber = $v['_reg'];
                            $name = $v['_name'];
                            $fatherName = $v['_fname'];
                            $contact = $v['_contact'];
                            $bloodGroup = $v['_group'];
                            $address = $v['_address'];
                            $dob = $v['_dob'];
                            $officialMail = $v['_oMail'];
                            $personalMail = $v['_pMail'];
                            preg_match_all("/\d+/", $registrationNumber, $batchMatch);
                            $authenticateCode = $batchMatch[0][1] . "-" . $programName . "-" . substr(preg_replace("/[^0-9]/", "", $registrationNumber), 2);
                            $student->createStudentData($sectionCode, $registrationNumber, $name, $fatherName, $contact, $bloodGroup, $address, $dob, $officialMail, $personalMail, $authenticateCode);
                        }
                    }
                } else {
                    $resultBackServer = updateServer("-99", $duplicateList, "ERROR");
                    die(json_encode($resultBackServer));
                }
            } else {
                $resultBackServer = updateServer("-1", "Can not perform New Insertions", "ERROR");
                die(json_encode($resultBackServer));
            }

            if ($_POST['hasDeletion']) {
                $failedDeletion = array();
                if (is_array($deleteStudentList) == 1 and $deleteStudentList != null) {
                    $student = new StudentRole();
                    foreach ($deleteStudentList as $key => $value)
                        if (!$student->deleteStudentRecord($value))
                            array_push($failedDeletion, $value);
                }
            } else {
                $resultBackServer = updateServer("-1", "Can not perform deletion", "ERROR");
                die(json_encode($resultBackServer));
            }

            if ($_POST['hasModification']) {
                $failedToModified = array();
                if (is_array($updateStudentList) == 1 and $updateStudentList != null) {
                    $student = new StudentRole();
                    foreach ($newStudentList as $key => $value) {
                        foreach ($value as $k => $v) {
                            $registrationNumber = $v['_reg'];
                            $student->checkDuplication($registrationNumber, $duplicateList);
                        }
                    }

                    foreach ($updateStudentList as $key => $value)
                        if (!$student->deleteStudentRecord($value))
                            array_push($failedDeletion, $value);
                }

            } else {
                $resultBackServer = updateServer("-1", "Can not perform edition", "ERROR");
                die(json_encode($resultBackServer));
            }


        } else {
            $resultBackServer = updateServer("-1", "No Section Code found in post", "ERROR");
        }
        die(json_encode($resultBackServer));
    }

}
?>

