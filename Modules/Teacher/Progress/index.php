<?php
$subject = $section = "";
$courseSessional = array("f18-os-a1"=>"Assignment 1", "f18-os-a2"=> "Assignment 2","f18-os-q1"=> "Quiz 1",
    "f18-os-a3"=> "Assignment 3", "f18-os-a4"=> "Assignment 4", "f18-os-q2"=>"Quiz 2", "f18-os-q3"=>"Quiz 3");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalyst | Student Progress</title>

    <link href="../../../Assets/Frameworks/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script rel="script" src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="ProgressAssets/progressInjection.css" rel="stylesheet">
    <link href="ProgressAssets/style.css" rel="stylesheet">
    <script src="ProgressAssets/progressScript.js" rel="script"></script>

</head>
<body>

<div class="w-full min-h-full">
    <main class="container mx-auto py-3 max-w-7xl px-5">
        <div class="border-2 border-solid text-black rounded-t-md rounded-b-md mt-2 h-full ">
            <!-- bg-catalystLight-f5  -->
            <h2 class="text-xl text-center my-2 font-bold">Overall Marks Distribution</h2>

            <section class="cprofile-content-box-border cprofile-grid mx-0 my-0 ">
                <div class="mx-2 p-4 clo-container ">
                    <!--  Sessional , Mids , Finals tab -->
                    <div class="mb-10 bg-white p-1 gap-5 grid lg:grid-cols-3">
                        <div class="py-0 assessment-type-bg">
                            <div class="min-h-full min-w-full flex flex-row py-2 justify-around assessment-type-bg-inside">
                                <p class="font-medium text-2xl text-gray-700 text-justify px-20">Sessional</p>
                                <img class="w-7" id="s-arrow-r" alt="" src="../../../Assets/Images/left-arrow.svg">
                            </div>
                        </div>
                        <div class="py-0 assessment-type-bg">
                            <div class="min-h-full min-w-full flex flex-row py-2 justify-around assessment-type-bg-inside">
                                <p class="font-medium text-2xl text-gray-700 text-justify px-20">Mid-Term</p>
                            </div>
                        </div>
                        <div class="py-0 assessment-type-bg">
                            <div class="min-h-full min-w-full flex flex-row py-2 justify-around assessment-type-bg-inside">
                                <p class="font-medium text-2xl text-gray-700 text-justify px-20">Final-Term</p>
                            </div>
                        </div>
                    </div>
                    <!--  if sessional selected then following will open  -->
                    <div id="sessionalTableDivID"
                         class="hidden border-solid border-2 rounded-md shadow-sm bg-catalystLight-f5">
                        <h2 class="table-head text-black">Assessment</h2>

                        <div id="courseSessionalInfoDivID" class="bg-white grid lg:grid-cols-4 text-center">

                        </div>
                    </div>

                    <!--  two columns grid for students detail.  -->
                    <div class="my-10 grid gap-5 sm:grid-cols-1 lg:grid-cols-2">
                        <div id="studentTableID" class="hidden border-solid border-2 rounded-md shadow-sm bg-white">
                            <h2 class="table-head text-black">Selected User Assessment</h2>
                            <div class="w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                    <tr class="text-center bg-catalystLight-f5">
                                        <th class="capitalize px-4 w-1/6 py-3 title-font tracking-wider font-medium text-sm rounded-tl rounded-bl">
                                            Registration no
                                        </th>
                                        <th class="capitalize px-4 py-3 w-3/4 title-font tracking-wider font-medium text-sm">
                                            Description
                                        </th>
                                        <th class="capitalize px-4 py-3 title-font tracking-wider font-medium text-sm">
                                            Obtain marks
                                        </th>
                                        <th class="capitalize px-4 py-3 title-font tracking-wider font-medium text-sm">
                                            Total Marks
                                        </th>
                                        <th class="capitalize px-4 py-3 title-font tracking-wider font-medium text-sm">
                                            achieved percentage
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody id="studentTableBodyID">

                                    <tr class="text-center hover:bg-catalystLight-e3 text-sm font-base tracking-tight">
                                        <td class="px-4 py-3">F18-BCSE-002</td>
                                        <td class="px-4 py-3 ">To control the letter spacing of an element at a specific
                                            breakpoint
                                        </td>
                                        <td class="px-4 py-3">8</td>
                                        <td class="px-4 py-3 ">10</td>
                                        <td class="px-4 py-3 ">80%</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="selectedStudentTableInfoID"
                             class="hidden border-solid border-2 rounded-md shadow-sm bg-white">
                            <h2 class="table-head text-black">Quizz 1 Description</h2>
                            <div class="w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                    <tr class="text-center bg-catalystLight-f5">
                                        <th class="capitalize px-4 py-3 title-font tracking-wider font-medium text-sm rounded-tl rounded-bl">
                                            Question#
                                        </th>
                                        <th class="capitalize px-4 py-3 title-font tracking-wider font-medium text-sm">
                                            Obtain marks
                                        </th>
                                        <th class="capitalize px-4 py-3 title-font tracking-wider font-medium text-sm">
                                            Total marks
                                        </th>
                                        <th class="capitalize px-4 py-3 title-font tracking-wider font-medium text-sm">
                                            achieved %
                                        </th>
                                        <th class="capitalize px-4 py-3 title-font tracking-wider font-medium text-sm">
                                            CLO Mapping
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="text-center hover:bg-catalystLight-e3 text-sm font-base tracking-tight">
                                        <td class="px-4 py-3">Question 1</td>
                                        <td class="px-4 py-3">8</td>
                                        <td class="px-4 py-3">10</td>
                                        <td class="px-4 py-3 ">80%</td>
                                        <td class="px-4 py-3 ">CLO-1</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>
</div>
<script>
    let currentSectionAssessments = <?php echo json_encode($courseSessional); ?>;

</script>

</body>
</html>