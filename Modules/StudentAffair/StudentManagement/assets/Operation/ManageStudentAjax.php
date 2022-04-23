<?php
/**
 *  FOR HTTP Request Pattern Follow the ServerPerformance.PHP Class.
 *
 */

require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\ServerPerformance.php";

session_start();

$resultBackServer = array("status" => -1, "message" => 'no message', "errors" => 'no error');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sNewCreation']) and $_POST['sNewCreation']) {

        if (isset($_POST['departmentCode']) and isset($_POST['programCode'])) {
            $departmentCode = $_POST['departmentCode'];
            $programCode = $_POST['programCode'];
            $curriculumCode = $_POST['curriculumCode'];
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
                        $failedToCreated = array();
                        foreach ($studentArrayList as $key => $sectionList) {
                            // create new section.
                            $section = new Section();
                            $isSectionCreated = $section->createNewSection($semesterCode, $key);
                            if ($isSectionCreated) {
                                $sectionCode = $section->getSectionCode();
                                performOperations($sectionList, $seasonShortName, $programName, $sectionCode, 1, $failedToCreated);
                            } else
                                $resultBackServer = updateServer(500, "error while creating new section : " . $section->getDatabaseConnection()->error, "ERROR |" . SERVER_STATUS_CODES[500]);
                        }
                    } else
                        $resultBackServer = updateServer(500, "error while creating new semester : " . $semester->getDatabaseConnection()->error, "ERROR |" . SERVER_STATUS_CODES[500]);

                } else
                    $resultBackServer = updateServer(500, "error while creating new batch : " . $batch->getDatabaseConnection()->error, "ERROR |" . SERVER_STATUS_CODES[500]);
            } else
                $resultBackServer = updateServer(500, "error while creating new season : " . $season->getDatabaseConnection()->error, "ERROR |" . SERVER_STATUS_CODES[500]);

            $resultBackServer = updateServer(200, "Operation Performed successfully.", SERVER_STATUS_CODES[200] . "|" . SERVER_STATUS_CODES[201]);
        } else
            $resultBackServer = updateServer(400, "incorrect depCode or proCode," . json_encode($_POST['departmentCode'], $_POST['programCode']), "ALERT |" . SERVER_STATUS_CODES[400]);

        die(json_encode($resultBackServer));
    } else if (isset($_POST['refreshTable']) and $_POST['refreshTable']) {
        if (isset($_POST['sectionCode'])) {
            $sectionCode = $_POST['sectionCode'];
            $section = new Section();
            if (($studentList = $section->retrieveStudentList($sectionCode)) !== null)
                $resultBackServer = updateServer(200, $studentList, SERVER_STATUS_CODES[200] . "|" . SERVER_STATUS_CODES[201]);
            else
                $resultBackServer = updateServer(500, "Error While fetching record of student : " . $section->getDatabaseConnection()->error, "ERROR |" . SERVER_STATUS_CODES[500]);
        } else
            $resultBackServer = updateServer(400, "Incorrect SectionCode or empty." . json_encode($_POST['sectionCode']), "ALERT |" . SERVER_STATUS_CODES[400]);

        die(json_encode($resultBackServer));
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
            /*            print json_encode($newStudentList) . "  " . is_array($newStudentList) . "<br>\n";
            print json_encode($updateStudentList) . "  " . is_array($updateStudentList) . "<br>\n";
            print json_encode($deleteStudentList) . "  " . is_array($deleteStudentList) . "<br>\n";*/
            /** Perform Insertion First before Deletion and Update */
            if ($_POST['hasAddition']) {
                if (is_array($newStudentList) == 1 and $newStudentList != null) {
                    $duplicateList = array();
                    $student = new StudentRole();
                    foreach ($newStudentList as $key => $value) {
                        foreach ($value as $k => $v) {
                            $registrationNumber = $v['_reg'];
                            $student->checkDuplication($registrationNumber, $duplicateList);
                        }
                    }
                    $failedToCreated = array();
                    if (empty($duplicateList) and count($duplicateList) === 0) { // $duplicateList is empty
                        foreach ($newStudentList as $key => $studentRecord) {
                            performOperations($studentRecord, -1, -1, $sectionCode, 2, $failedToCreated);
                        }
                    } else {
                        $resultBackServer = updateServer(501, $duplicateList, "ERROR |" . SERVER_STATUS_CODES[501]);
                        die(json_encode($resultBackServer));
                    }
                }
            }

            if ($_POST['hasDeletion']) {
                $failedToDeletion = array();
                if (is_array($deleteStudentList) == 1 and $deleteStudentList != null) {
                    $student = new StudentRole();
                    foreach ($deleteStudentList as $key => $value)
                        if (!$student->deleteStudentRecord($value))
                            array_push($failedToDeletion, $value);
                }
            }

            if ($_POST['hasModification']) {
                $failedToModified = array();
                if (is_array($updateStudentList) == 1 and $updateStudentList != null) {
                    $student = new StudentRole();

                    foreach ($updateStudentList as $key => $studentRecord) {
                        performOperations($studentRecord, -1, -1, $sectionCode, 3, $failedToCreated);
                    }
                }
            }

            /** Check if any Operation failed to perform
             * if empty then return 1.
             */
            if (empty($failedToCreated) and empty($failedToModified) and empty($failedToDeletion))
                $resultBackServer = updateServer(200, "Operation performed successfully", SERVER_STATUS_CODES[200] . "|" . SERVER_STATUS_CODES[201]);
            elseif (!empty($failedToCreated) and !empty($failedToModified) and !empty($failedToDeletion))
                $resultBackServer = updateServer(207, sprintf(/** @lang text */ 'Failed to operate on following student list: <br>
                    New Students : %s <br> To Remove Students: %s <br>   Modified Students: %s <br>', json_encode($failedToCreated), json_encode($failedToDeletion), json_encode($failedToModified)),
                    SERVER_STATUS_CODES[207]);
            elseif (empty($failedToCreated) and !empty($failedToModified) and !empty($failedToDeletion))
                $resultBackServer = updateServer(207, sprintf(/** @lang text */ 'Failed to operate on following student list: <br>
                   To Remove Students: %s <br>   Modified Students: %s <br>', json_encode($failedToDeletion), json_encode($failedToModified)),
                    SERVER_STATUS_CODES[207]);
            elseif (empty($failedToCreated) and empty($failedToModified) and !empty($failedToDeletion))
                $resultBackServer = updateServer(207, sprintf(/** @lang text */ 'Failed to operate on following student list: <br>
                   To Remove Students: %s <br> ', json_encode($failedToDeletion)),
                    SERVER_STATUS_CODES[207]);
            elseif (empty($failedToCreated) and !empty($failedToModified) and empty($failedToDeletion))
                $resultBackServer = updateServer(207, sprintf(/** @lang text */ 'Failed to operate on following student list: <br>
                   To Modified Students: %s <br> ', json_encode($failedToModified)),
                    SERVER_STATUS_CODES[207]);
        } else
            $resultBackServer = updateServer(200, "Please check your section code ", SERVER_STATUS_CODES[200] . "|" . SERVER_STATUS_CODES[201]);
        die(json_encode($resultBackServer));
    }


//        $resultBackServer = updateServer(400, "Incorrect SectionCode or empty." . json_encode($_POST['sectionCode']), "ALERT |" . SERVER_STATUS_CODES[400]);
//        $resultBackServer = updateServer(500, "Error While fetching record of student : " . $section->getDatabaseConnection()->error, "ERROR |" . SERVER_STATUS_CODES[500]);
//        $resultBackServer = updateServer(200, $studentList, SERVER_STATUS_CODES[200] . "|" . SERVER_STATUS_CODES[201]);
}


function performOperations($studentList, $seasonShortName, $programName, $sectionCode, $CHECKER, &$failedToOperate)
{
    $oldRegKey = '';
    $student = new StudentRole();
    foreach ($studentList as $k => $v) {
        if ($CHECKER > 0 and $CHECKER < 3) {
            $registrationNumber = $v['_reg'];
            $name = $v['_name'];
            $fatherName = $v['_fname'];
            $contact = $v['_contact'];
            $bloodGroup = $v['_group'];
            $address = $v['_address'];
            $dob = $v['_dob'];
            $officialMail = $v['_oMail'];
            $personalMail = $v['_pMail'];
            $authenticateCode = -1;
            if ($CHECKER === 1 and $programName !== -1 and $seasonShortName !== -1)
                $authenticateCode = $seasonShortName . "-" . $programName . "-" . substr(preg_replace("/[^0-9]/", "", $registrationNumber), 2);
            elseif ($CHECKER === 2) {
                preg_match_all("/\d+/", $registrationNumber, $batchMatch);
                $authenticateCode = $batchMatch[0][1] . "-" . $programName . "-" . substr(preg_replace("/[^0-9]/", "", $registrationNumber), 2);
            }
            if ($authenticateCode !== -1 && !$student->createStudentData($sectionCode, $registrationNumber, $name, $fatherName, $contact, $bloodGroup, $address, $dob, $officialMail, $personalMail, $authenticateCode))
                array_push($failedToOperate, $registrationNumber);
        } elseif ($CHECKER === 3) {

            if ($k == 0)
                $oldRegKey = $v;
            else {
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
                if (!$student->modifiedStudentRecord($oldRegKey, $sectionCode, $registrationNumber, $name, $fatherName, $contact, $bloodGroup, $address, $dob, $officialMail, $personalMail, $authenticateCode))
                    array_push($failedToOperate, $registrationNumber);
            }
        }
    }
}

?>