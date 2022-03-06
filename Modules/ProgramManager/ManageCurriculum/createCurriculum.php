<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
session_start();

$adminCode = $_SESSION['adminCode'];
//$batchCode = $_SESSION['batchCode'];
$programCode = $_SESSION['programCode'];
$personalDetails = array();
$admin = unserialize($_SESSION['adminInstance']);
$personalDetails = $admin->getPersonalDetails();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Student Profile</title>
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="../../../Assets/Scripts/Master.js" rel="script"></script>
    <script src="../../Teacher/CourseProfile/CourseProfileAssets/js/additionalWork.js"></script>

    <style>
        .form-bottom-design {
            background: linear-gradient(251.12deg, rgba(91, 176, 254, 90%) -4.41%, #016BDD 100%);
            box-shadow: 0px 4px 4px rgba(115, 96, 171, 0.6%)
        }
    </style>

    <script src="../../../Assets/Frameworks/jQuery/jquery.min.js" type="text/javascript"></script>
    <script src="../../../Assets/Frameworks/jQuery/jquery.fileuploader.min.js" type="text/javascript"></script>
    <script src="asset/js/uploader.js" type="text/javascript"></script>

</head>
<body>
<div class="w-full min-h-full " style="background-color: #ECECF3">
    <main class="main-content-alignment min-h-full">

        <!-- Import box section. -->
        <div class="hidden flex flex-col px-10 py-2 my-5 rounded-lg shadow bg-white">
            <h2 class="font-semibold text-2xl text-gray-700">Import Box</h2>
            <p class="font-normal text-base text-gray-700">Please select the respective <span
                        class="capitalize font-semibold">program</span> along with the allocated
                <span class="capitalize font-semibold">year</span></p>

            <div class="inline-flex">
                <div class="flex justify-end items-center pt-3 pb-2 text-white text-base font-medium w-3/4">
                    <div class="textField-label-content w-3/12">
                        <label for="curriculumProgramId"></label>
                        <select class="select" name="curriculumProgram"
                                onclick="this.setAttribute('value', this.value);"
                                onchange="this.setAttribute('value', this.value);" value="BCSE"
                                id="curriculumProgramId">
                            <option value="" hidden=""></option>
                            <option value="BCSE" selected disabled>BCSE</option>
                        </select>
                        <label class="select-label top-1/4 sm:top-3">Program</label>
                    </div>
                    <div class="textField-label-content w-3/12">
                        <label for="curriculumAllocationYearId"></label>
                        <select class="select" name="curriculumAllocationYear"
                                onclick="this.setAttribute('value', this.value);"
                                onchange="this.setAttribute('value', this.value);" value=""
                                id="curriculumAllocationYearId">
                            <option value="" hidden=""></option>
                            <option value="1"></option>
                        </select>
                        <label class="select-label top-1/4 sm:top-3">Assign Year</label>
                    </div>
                </div>

                <div class="flex justify-end items-center w-1/4">
                    <button type="button"
                            class="text-white rounded-md border-0  font-medium bg-catalystBlue-l2 px-8 mx-5 py-1"
                            name="importBoxCreateBtn" id="importBoxCreateBtnID">Create
                    </button>
                </div>
            </div>
        </div>

        <!-- Import file Detail Section. -->
        <div class=" grid grid-cols-12 gap-3 px-10 py-4 my-5 mb-12 rounded-lg rounded-b-none shadow bg-white items-center">
            <div class="flex flex-row gap-3 col-span-10 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <div class="flex flex-col gap-3 mx-5">
                    <span class="font-semibold text-base">File name here</span>
                    <span class="text-indigo-400 text-xs font-medium">Importing data of file.</span>
                </div>
            </div>

            <div class="col-span-2 text-right mx-0 my-2">
                <button type="button"
                        class="text-white rounded-md border-0  font-medium bg-catalystBlue-l2 px-5 py-1"
                        name="importBoxCreateBtn" id="importBoxCreateBtnID">Importing
                </button>
            </div>

            <!-- Import file loading animation. -->
            <div class="hidden absolute inset-x-24 ml-0 top-28 form-bottom-design rounded-b-full" style="width: 86.5%">
                <div class=" h-5 shadow-inner rounded-b-full  relative overflow-hidden flex flex-nowrap items-center justify-around lg:w-full"></div>
            </div>
        </div>

        <!-- Import file Detail Section. -->
        <div class=" cprofile-primary-border text-black rounded-t-md rounded-b-md mt-2 bg-catalystLight-f5">
            <!-- Import Tab Section -->
            <div class="flex mx-auto flex-wrap justify-center">
                <a id="importCsvTabID" class="sm:px-6 sm:w-auto sm:justify-start cursor-pointer inline-flex justify-center
                   items-center py-2 w-1/2 rounded-t border-b-2 border-indigo-500 text-black
                   tracking-wide leading-none student-profile-header-text my-0 text-base">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    Import CSV
                </a>
                <a id="importExcelSheetTabID" class="sm:px-6 sm:w-auto cursor-pointer inline-flex justify-center items-center py-2 w-1/2  rounded-t border-b-2 text-gray-400 font-semibold tracking-normal leading-none student-profile-header-text my-0
                     transform transition ease-out duration-300 hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black text-base">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                    Import Excel
                </a>
            </div>

            <div class="cprofile-content-box-border cprofile-grid mx-0 my-0 border-0 rounded-none ">

                <div class="container px-5 mx-auto flex flex-col items-center ">
                    <h2 class="px-3 font-bold text-2xl"> No Record Uploaded.</h2>
                </div>
                <div class="h-64 px-5 mx-auto">
                    <input type="file" name="files"/>
                </div>

            </div>
        </div>

    </main>
</div>

</body>
<script>
    $.ajax({
        url: 'asset/x.csv',
        dataType: 'text',
    }).done(successFunction);

    function successFunction(data) {
        var allRows = data.split(/\r?\n|\r/);
        var table = '<table>';
        for (var singleRow = 0; singleRow < allRows.length; singleRow++) {
            if (singleRow === 0) {
                table += '<thead>';
                table += '<tr>';
            } else {
                table += '<tr>';
            }
            var rowCells = allRows[singleRow].split(',');
            for (var rowCell = 0; rowCell < rowCells.length; rowCell++) {
                if (singleRow === 0) {
                    table += '<th>';
                    table += rowCells[rowCell];
                    table += '</th>';
                } else {
                    table += '<td>';
                    table += rowCells[rowCell];
                    table += '</td>';
                }
            }
            if (singleRow === 0) {
                table += '</tr>';
                table += '</thead>';
                table += '<tbody>';
            } else {
                table += '</tr>';
            }
        }
        table += '</tbody>';
        table += '</table>';
        $('body').append(table);
    }

    //var csv is the CSV file with headers
    function csvJSON(csv) {
        var lines = csv.split("\n");
        var result = [];
        var headers = lines[0].split(",");
        for (var i = 1; i < lines.length; i++) {
            var obj = {};
            var currentline = lines[i].split(",");
            for (var j = 0; j < headers.length; j++)
                obj[headers[j]] = currentline[j];
            result.push(obj);
        }
        return JSON.stringify(result); //JSON
    }
</script>

</html>




