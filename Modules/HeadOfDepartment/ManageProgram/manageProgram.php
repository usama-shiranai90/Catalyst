<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "\Modules\autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "\Backend\Packages\Util\ServerPerformance.php";

session_start();

$program = new Program();
$departmentCode = $_SESSION['departmentCode']; // 1
$deletedProgramList = $program->retrieveEntireProgramList();

print json_encode($deletedProgramList) . "<br><br><br>";

/** delete any irrelevant program which is not against our currently login department. */
foreach ($deletedProgramList as $index => $currentProgram) {
    print sprintf("index : %s   %s<br>", $index, json_encode($currentProgram));
    if ($departmentCode !== $currentProgram['departmentCode']) // 1 !== 1
        unset($deletedProgramList[$index]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST["createProgramBtn"])) {
//    print $_POST['programNameField'] . "  " . $_POST['programAbbreviationNameField'];

    $programName = $_POST['programNameField'];
    $programAbbName = $_POST['programAbbreviationNameField'];

    $FLAG = $program->createProgram($departmentCode, $programName, $programAbbName);
    unset($_POST['createProgramBtn']);
    header('Location: manageProgram.php');
}

$resultBackServer = array("status" => -1, "message" => 'no message', "errors" => 'no error');
if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['deletion'])) {
    if (isset($_POST['deletedProgramList'])) {
        $deletedProgramList = $_POST['deletedProgramList']; // array.  // [ 1,6,8,11,12,13 ,15]
        $notDeletedArray = array(); /** agr list empty ho gye ha , program codes successfully deleted*/

        foreach ($deletedProgramList as $programCode) {
            if (!$program->deleteProgram($programCode))
                array_push($notDeletedArray, $programCode);
        }
    } else
        $resultBackServer = updateServer(-1, "No program code found , try again.", "no-record");


    if (!empty($notDeletedArray))
        $resultBackServer = updateServer(0, "Could not delete some program. try again", "Failure");
    else
        $resultBackServer = updateServer(1, "Program list has been deleted successfully.", "OK");

    die(json_encode($resultBackServer));
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['modify'])) {
    if (isset($_POST['updateProgramList']) and $_POST['updateProgramList']) {
        $updateProgramList = $_POST['updateProgramList']; // 2 : { pname: name , pabb : abb }

        foreach ($updateProgramList as $programCode => $value) {
            $programName = $value['programName'];
            $programAbbreviation = $value['shortName'];
            if (($LET = !$program->modifyProgram($programCode, $programName, $programAbbreviation)) === TRUE) {
                $resultBackServer = updateServer(0, $LET, "ERROR");
                die(json_encode($resultBackServer));
            }

        }
    }
    $resultBackServer = updateServer(1, "successfully modified program list", "Modified");
    die(json_encode($resultBackServer));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Manage Program</title>

    <script src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="../../../Assets/Scripts/Master.js" rel="script"></script>
    <script src="../../../Assets/Scripts/InterfaceUtil.js"></script>
    <style>
        .textField-label {
            top: 10px;
        }
    </style>

</head>
<body>
<div class="w-full min-h-full" style="background-color: #ECECF3;">

    <main class="main-content-alignment">
        <div class="flex flex-col px-10 py-2 my-5 rounded-lg shadow bg-white">
            <h2 class="font-semibold text-2xl text-gray-700 capitalize">create program</h2>
            <p class="font-normal text-base text-gray-700 capitalize">
                please complete all the fields to create program.
            </p>

            <form method="post" autocapitalize="on" autocomplete="on" class="inline-flex rounded">
                <div class="flex flex-grow justify-center items-center pt-3 pb-2 text-white text-base font-medium ml-20 w-3/4">
                    <div class="textField-label-content w-3/12">
                        <label for="programNameFieldId"></label>
                        <input class="textField" type="text" placeholder="Enter Program Name"
                               name="programNameField" id="programNameFieldId" value="Bachelors in">
                        <label class="textField-label">Name</label>
                    </div>
                    <div class="textField-label-content w-3/12">
                        <label for="programAbbreviationNameFieldId"></label>
                        <input class="textField uppercase" type="text" placeholder="Software Engineering i.e BCSE"
                               name="programAbbreviationNameField"
                               maxlength="5"
                               id="programAbbreviationNameFieldId" value="">
                        <label class="textField-label">Abbreviation</label>
                    </div>
                </div>

                <div class="flex justify-end items-center w-1/6">
                    <button type="submit"
                            class="text-white rounded-md border-0  font-medium bg-catalystBlue-l2 px-8 py-1"
                            name="createProgramBtn" id="createProgramBtnId">Create
                    </button>
                </div>
            </form>
        </div>


        <div class="bg-white outline-none ring-2 ring-catalystLight-e1 text-black rounded-md mt-0.5 my-5 weeklytopics-primary-border-n">
            <section class=" bg-white rounded-t-none rounded-b-md border-solid px-5 pt-4 pb-4 border-t-0">
                <div class="flex flex-col px-6 py-1 mb-2">
                    <h2 class="font-semibold text-2xl text-gray-700  capitalize">Manage Program</h2>
                    <p class="font-normal text-base text-gray-700 capitalize">
                        select the respective program you want to edit.
                    </p>
                    <p class="font-bold italic text-center">Note:
                        <label class="font-normal antialiased tracking-tight leading-loose">By Deleting Program you may
                            effect all the respective batches ,
                            sections , student record and other Information</label></p>
                </div>


                <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative  rounded">
                    <thead>
                    <tr class="text-center bg-catalystLight-f5">
                        <th class="capitalize px-4 py-3 w-1/6 tracking-wider font-medium text-sm rounded-tl rounded-bl  sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs ">
                            No #
                        </th>
                        <th class="capitalize px-4 py-3 w-1/2 tracking-wider font-medium text-sm rounded-tl rounded-bl">
                            Program Name
                        </th>
                        <th class="capitalize px-4 py-3 w-1/2 tracking-wider font-medium text-sm">
                            Program Abbreviation
                        </th>
                        <th class="capitalize px-4 py-3 w-1/6 tracking-wider font-medium text-sm"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $iterate = 1;
                    foreach ($deletedProgramList as $key => $currentProgram) {
                        print sprintf("
                                 <tr data-record-target=\"\" aria-expanded=\"false\"
                        class=\"cursor-default text-sm tracking-tight transition-all transform hover:bg-catalystLight-89 accordion-toggle collapsed\"
                        data-program-state=\"%s\">
                        <td class=\"rounded-l rounded-t border-dashed border-t-2 border-b-2 w-1/6 border-gray-200\">
                            <span class=\"text-gray-700 py-3 flex justify-center items-center\">%d</span>
                        </td>
                        <td class=\"border-dashed border-t-2 border-b-2 w-1/2 border-gray-200 f-name-representation\" contenteditable=\"false\">
                            <span class=\"text-gray-700 py-3 flex justify-center items-center\">%s</span>
                        </td>
                        <td class=\"border-dashed border-t-2 border-b-2 w-1/2 border-gray-200 s-name-representation\">
                            <span class=\"text-gray-700 py-3 flex justify-center items-center\">%s</span>
                        </td>

                        <td class=\"rounded-r rounded-t border-dashed border-t-2 border-b-2 w-1/6 border-gray-200\">
                            <div class=\"flex items-center justify-center gap-3\">
                                 <button type='button' id=\"performRoleEdit-%d\">
                                   <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"w-6 h-6 text-blue-500 hover:text-blue-600 cursor-pointer transform hover:scale-105\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                              <path  stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z\"  />
                            </svg>
                                </button>
                                 <button type='button' id=\"performRoleDeletion-%d\">
                                    <svg xmlns=\"http://www.w3.org/2000/svg\"
                                         class=\"w-6 h-6 text-red-500 hover:text-red-600 cursor-pointer transform hover:scale-105\"
                                         fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\"
                                              d=\"M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16\"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>", $currentProgram['programCode'], $iterate, $currentProgram['programName'], $currentProgram['programSN'], $iterate, $iterate);
                        $iterate++;
                    }
                    ?>
                    </tbody>
                </table>

                <div class="text-right mx-4 my-5">
                    <button id="saveProgramBtn" class="mt-4 sm:mt-0 inline-flex
                     items-start justify-start px-10 py-2.5 bg-blue-500 hover:bg-blue-600
                        focus:outline-none rounded ">
                        <label class="text-sm font-medium leading-none text-white">Save</label>
                    </button>
                </div>
            </section>
        </div>

    </main>
</div>
</body>
<script src="asset/script.js"></script>
</html>
