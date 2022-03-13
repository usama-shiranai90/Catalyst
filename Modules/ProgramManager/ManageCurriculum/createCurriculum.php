<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\SearchUtil.php";

session_start();

$adminCode = $_SESSION['adminCode'];
//$personalDetails = array();
//$admin = unserialize($_SESSION['adminInstance']);
//$personalDetails = $admin->getPersonalDetails();


$curriculum = new Curriculum();
$curriculumList = $curriculum->getPreviousFewCurriculumYear();

$currentOnGoingYear = date('Y');
$earliestYear = ($curriculumList === null ? date('Y', strtotime("-4 year")) : reset($curriculumList)['year']); // 016

echo json_encode($curriculumList) . PHP_EOL . $currentOnGoingYear . PHP_EOL . $earliestYear . PHP_EOL . gettype($curriculumList) . PHP_EOL . gettype($curriculumList[0]) . "<br>";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Student Profile</title>
    <link href="/Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="/Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="/Assets/Scripts/Master.js" rel="script"></script>
    <script src="asset/js/uploader.js" type="text/javascript"></script>
    <script src="/Assets/Frameworks/jQuery/jquery.min.js" type="text/javascript"></script>
    <script src="/Assets/Scripts/MasterNavigationPanel.js" rel="script"></script>
</head>
<body>
<div class="w-full min-h-full " style="background-color: #ECECF3">
    <main class="main-content-alignment min-h-full">
        <!-- Import box section. -->
        <div id="curriculumBoxContainerID" class="flex flex-col px-10 py-2 my-5 rounded-lg shadow bg-white">
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
                                onchange="this.setAttribute('value', this.value);"
                                value="<?php echo $currentOnGoingYear = date('Y') ?>"
                                id="curriculumAllocationYearId">
                            <option value="" hidden=""></option>
                            <?php
                            $tempKeyReference = "";
                            $tempValueReference = "";
                            $earliestYear = ($curriculumList === null ? date('Y', strtotime("-4 year")) : reset($curriculumList)['year']); // 016
                            foreach (range(date('Y', strtotime("+4 year")), $earliestYear) as $year) {
                                if (iterateAndSearchValue($curriculumList, $year, $tempKeyReference, $tempValueReference)) {
                                    print sprintf("<option  value=\"%s\"%sdata-select-id=\"%s\">%s</option>", $year, $year == $currentOnGoingYear ? ' selected="selected"' : '', $tempKeyReference, $year);
                                } else
                                    print '<option value="' . $year . '"' . ($year == $currentOnGoingYear ? ' selected="selected"' : '') . '>' . $year . '</option>';
                            }
                            ?>
                        </select>
                        <label class="select-label top-1/4 sm:top-3">Assign Year</label>
                    </div>
                    <div class="textField-label-content w-3/12">
                        <label for="noOfPLOsToCreateId"></label>
                        <select class="select" name="noOfPLOsToCreate"
                                onclick="this.setAttribute('value', this.value);"
                                onchange="this.setAttribute('value', this.value);" value=""
                                id="noOfPLOsToCreateId">
                            <option value="" hidden=""></option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select>
                        <label class="capitalize select-label top-1/4 sm:top-3">No of PLO</label>
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
        <!--        <div id="curriculumBoxPLOContainerID" class="hidden flex flex-col py-2 my-5 rounded-lg shadow bg-white">
                    <img class="absolute mx-1 my-1" src="../../../Assets/Images/arrow-back.svg" width="25" height="25"
                         alt="back arrow" data-curriculum-import>
                    <div class="flex flex-col px-10">
                        <h2 class="font-semibold text-2xl text-gray-700">Import Box</h2>
                        <p class="font-normal text-base text-gray-700">Please select total number of <span
                                    class="capitalize font-semibold">program learning outcome</span> you want to create.

                        <div class="inline-flex ml-32">
                            <div class="flex justify-center items-center pt-3 pb-2 text-white text-base font-medium w-4/5">
                                <div class="textField-label-content w-3/12">
                                    <label for="noOfPLOsToCreateId"></label>
                                    <select class="select" name="noOfPLOsToCreate"
                                            onclick="this.setAttribute('value', this.value);"
                                            onchange="this.setAttribute('value', this.value);" value=""
                                            id="noOfPLOsToCreateId">
                                        <option value="" hidden=""></option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                    </select>
                                    <label class="capitalize select-label top-1/4 sm:top-3">No of PLO</label>
                                </div>
                            </div>
                            <div class="flex justify-end items-center w-1/5">
                                <button type="button"
                                        class="text-white rounded-md border-0  font-medium bg-catalystBlue-l2 px-8 mx-5 py-1"
                                        name="importBoxCreateBtn" id="importBoxCreateBtnID">Create
                                </button>
                            </div>
                        </div>
                    </div>
                </div>-->

        <div id="creationCurriculumSectionId"
             class="bg-white outline-none ring-2 ring-catalystLight-e1 text-black rounded-md mt-2 my-5 h-1/2 weeklytopics-primary-border-n">
            <div class="db-table-header-topic border-b-0 rounded-b-none bg-catalystBlue ">
                <h2 class="text-xl text-center font-bold text-white tracking-wide text-center capitalize">Creation Of
                    Curriculum</h2>
            </div>
            <div class="h-60 text-center font-medium text-2xl flex justify-center items-center"> Limit for program
                learning outcome not selected.
            </div>
            <section
                    class="hidden bg-white rounded-t-none rounded-b-md border-solid px-5 pt-4 pb-4 border-t-0 cprofile-grid">

<!--                <div class="ring-2 ring-catalystLight-e1 rounded-md shadow-none">-->
                    <form id="curriculumFormCreationId" method="post" class="flex flex-col overflow-hidden border-solid border-2 border-catalystLight-e1 rounded-md shadow-none">
                        <div id="cCurriculumHeaderId"
                             class="learning-outcome-head learning-week-header-dp overflow-hidden">
                            <div class="lweek-column border-l-0 bg-catalystLight-f5 col-start-1 col-span-1 rounded-tl-md">
                                <span class="wlearn-cell-data">PLO No</span>
                            </div>
                            <div class="lweek-column col-start-2 col-span-10">
                                <span class="wlearn-cell-data">Description</span>
                            </div>
                            <div class="lweek-column border-r-0 col-start-12 col-span-1">
                                <span class="wlearn-cell-data">Status</span>
                            </div>
                        </div>

                    </form>
<!--                </div>-->

                <div class="flex justify-center">
                    <button type="button" aria-label="add_clos_button_label" class="max-w-2xl rounded-full"
                            id="add-clo-btn" aria-expanded="false" aria-haspopup="true">
                        <img id="addMoreCurriculumBtn" class="h-8 w-8 rounded-full"
                             src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" alt="">
                    </button>
                </div>
                <div class="text-right mx-4">
                    <button type="button"
                            class="text-white rounded-md border-0  font-medium bg-catalystBlue-l2 px-8 mx-5 py-1"
                            name="saveNewlyCreatedCurriculumBtn" id="saveNewlyCreatedCurriculumBtnId">Save
                    </button>
                </div>
            </section>

        </div>

    </main>
</div>
<div class="hidden">

</div>
</body>
<script>

    /*   $.ajax({
            url: 'asset/xsadasd.csv',
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
        }*/

    function autoHeight(element) {
        const el = document.getElementById(element);
        el.style.height = "5px";
        el.style.height = (el.scrollHeight) + "px";
    }
</script>

</html>




