<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <link href="../../../Assets/Stylesheets/Tailwind.css" rel="stylesheet">
    <link href="../../../Assets/Stylesheets/Master.css" rel="stylesheet">
    <script src="../../../Assets/Scripts/Master.js" rel="script"></script>
    <script src="../../../Assets/Scripts/InterfaceUtil.js"></script>
    <script src="../../../node_modules/xlsx/dist/xlsx.full.min.js" rel="script"></script>
    <style>

        .icon-container {
            position: relative;
            width: 75px;
            height: 100px;
        }

        .icon-container img {
            width: 75px;
            position: absolute;
            transition: transform 0.25s ease-in-out;
            transform-origin: bottom;
        }

        .icon-container .center {
            z-index: 10;
        }

        .icon-container .right, .icon-container .left {
            filter: grayscale(0.5);
            transform: scale(0.9);
        }

        .dragged .left {
            transform: rotate(-10deg) scale(0.9) translateX(-20px);
        }

        .dragged .center {
            transform: translateY(-5px);
        }

        .dragged .right {
            transform: rotate(10deg) scale(0.9) translateX(20px);
        }

        /* uploading progress styles */
        .progress-container {
            border: 2px solid white;
            height: 70px;
            border-radius: 10px;
            margin: 15px 0;
            position: relative;
        }

        .progress-container .inner-container {
            margin: 10px 15px;
            z-index: 2;
            position: absolute;
            width: calc(100% - 30px);
        }

        .progress-container .percent-container {
            font-size: 14px;
            margin: 5px;
            opacity: 0.7;
        }

        .progress-container .bg-progress {
            position: absolute;
            background: var(--main-bg-color);
            width: 100%;
            height: 100%;
            z-index: 1;
            transition: transform 250ms linear;
            transform: scaleX(0);
            transform-origin: left;
        }

        .progress-container .progress-bar {
            width: 100%;
            height: 3px;
            border-radius: 2px;
            background: #03a9f4;
            transition: transform 200ms linear;
            transform: scaleX(0);
            transform-origin: left;
        }

    </style>
    <!-- BCSE , FALL-2021 , SECTION    -->
</head>
<body>
<div class="w-full min-h-full" style="background-color: #ECECF3">
    <main class="main-content-alignment min-h-full">
        <section>
            <div class="flex flex-col px-10 py-2 my-5 rounded-lg shadow bg-white">
                <h2 class="font-semibold text-2xl text-gray-700 capitalize">Import Box</h2>
                <p class="font-normal text-base text-gray-700 capitalize">
                    Please provide the necessary information to create new allocation of courses.
                </p>
                <p class="font-bold italic text-center">Note:
                    <label class="font-normal antialiased tracking-tight leading-loose">
                        Your can import one Batch Offering at a time to avoid collision or any other data mishape.
                    </label></p>

                <div class="inline-flex rounded" style="background-color: #F4F8F9">
                    <div class="flex flex-grow justify-center items-center pt-3 pb-2 text-white text-base font-medium ml-20 w-3/4">
                        <div class="textField-label-content w-3/12">
                            <label for="importCourseOfferingSeasonSelectID"></label>
                            <select class="select" name="importCourseOfferingSeasonSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="importCourseOfferingSeasonSelectID">
                                <option value="" hidden=""></option>

                                <?php
                                /*  $refineDepartmentList = array();
                                  foreach ($departmentList as $index => $role) {
                                      $currentDep = $role['departmentName'];
                                      if (!in_array($currentDep, $refineDepartmentList)) {
                                          print sprintf("<option  value=\"%s\" >%s</option>", $role['departmentCode'], $role['departmentSN']);
                                          $refineDepartmentList[] = $role['departmentName'];
                                      }
                                  }*/
                                ?>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Season</label>
                        </div>
                        <div class="textField-label-content w-3/12">
                            <label for="importCourseOfferingCurriculumSelectID"></label>
                            <select class="select" name="importCourseOfferingCurriculumSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="importCourseOfferingCurriculumSelectID">
                                <option value="" hidden=""></option>
                                <?php
                                /*  $refineDepartmentList = array();
                                  foreach ($departmentList as $index => $role) {
                                      $currentDep = $role['departmentName'];
                                      if (!in_array($currentDep, $refineDepartmentList)) {
                                          print sprintf("<option  value=\"%s\" >%s</option>", $role['departmentCode'], $role['departmentSN']);
                                          $refineDepartmentList[] = $role['departmentName'];
                                      }
                                  }*/
                                ?>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Curriculum</label>
                        </div>
                        <div class="textField-label-content w-3/12">
                            <label for="importCourseOfferingBatchSelectID"></label>
                            <select class="select" name="importCourseOfferingBatchSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="importCourseOfferingBatchSelectID">
                                <option value="" hidden=""></option>

                                <?php
                                /*  $refineDepartmentList = array();
                                  foreach ($departmentList as $index => $role) {
                                      $currentDep = $role['departmentName'];
                                      if (!in_array($currentDep, $refineDepartmentList)) {
                                          print sprintf("<option  value=\"%s\" >%s</option>", $role['departmentCode'], $role['departmentSN']);
                                          $refineDepartmentList[] = $role['departmentName'];
                                      }
                                  }*/
                                ?>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Batch</label>
                        </div>
                        <div class="textField-label-content w-3/12">
                            <label for="importCourseOfferingSemesterSelectID"></label>
                            <select class="select" name="importCourseOfferingSemesterSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="importCourseOfferingSemesterSelectID">
                                <option value="" hidden=""></option>

                                <?php
                                /*  $refineDepartmentList = array();
                                  foreach ($departmentList as $index => $role) {
                                      $currentDep = $role['departmentName'];
                                      if (!in_array($currentDep, $refineDepartmentList)) {
                                          print sprintf("<option  value=\"%s\" >%s</option>", $role['departmentCode'], $role['departmentSN']);
                                          $refineDepartmentList[] = $role['departmentName'];
                                      }
                                  }*/
                                ?>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Semester</label>
                        </div>
                    </div>

                    <div class="flex justify-center  items-center w-24">
                        <svg id="refreshAdministrativeRoleBtn" xmlns="http://www.w3.org/2000/svg" class="h-6 w-8 transform transition hover:scale-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div id="importedTableContainer"
                 class="bg-white outline-none ring-2 ring-catalystLight-e1 text-black rounded-md mt-2 my-5 h-1/2 weeklytopics-primary-border-n">

                <div class="db-table-header-topic items-center border-b-0 rounded-b-none pb-0"
                     style="background-color: #F4F8F9">
                    <div class="flex flex-row justify-center items-center">
                        <img class="mx-2 h-6 transition duration-800 ease-in-out hidden" width="25" height="20"
                             src="../../../Assets/Images/arrow-back.svg" alt="arrow-back-section">
                        <h2 class="flex items-center justify-center text-lg text-center font-semibold  text-gray-700 tracking-wide text-center capitalize">
                            Imported Program Courses and allocation information will be shown here.
                        </h2>
                    </div>

                    <div id="sheetNoId" class="flex mx-auto flex-wrap justify-center work-sheet-container">
                    </div>
                </div>

                <form class="px-10 py-6" enctype="multipart/form-data">
                    <div class="drop-zone py-10">
                        <div class="icon-container">
                            <img src="/Assets/Images/vectorFiles/Uploader/file.svg" draggable="false" class="center"
                                 alt="File Icon">
                            <img src="/Assets/Images/vectorFiles/Uploader/file.svg" draggable="false" class="left"
                                 alt="File Icon">
                            <img src="/Assets/Images/vectorFiles/Uploader/file.svg" draggable="false" class="right"
                                 alt="File Icon">
                        </div>
                        <input type="file" id="fileInput"
                               accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        <div class="text-base">Drop your Files here or,
                            <span id="browseBtn"
                                  class="capitalize cursor-pointer text-catalystBlue-dl3 transition transform hover:scale-75 hover:underline">browse</span>
                        </div>
                    </div>
                    <div id="progressPercentContainer" class="progress-container hidden">
                        <div class="bg-progress"></div>
                        <div class="inner-container">
                            <div class="status">Uploaded</div>
                            <div class="percent-container">
                                <span class="percentage" id="progressPercent">0</span>%
                            </div>
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                    <label>
                        <input type="checkbox" class="hidden" name="useworker" checked>
                    </label>
                    <label>
                        <input type="checkbox" class="hidden" name="userabs" checked>
                    </label>
                </form>

                <div id="generatedTableContainer"
                     class="bg-white rounded-t-none rounded-b-md border-solid px-5 pt-4 pb-4 border-t-0 transform transition ease-out duration-700">

                </div>

                <div class="text-right mx-10 my-0">
                    <button id="saveStudentRecordBtn" class="my-4 sm:mt-0 inline-flex
                     items-start justify-start px-10 py-2.5 bg-blue-500 hover:bg-blue-600
                        focus:outline-none rounded hidden">
                        <label class="text-sm font-medium leading-none text-white">Save</label>
                    </button>
                </div>

            </div>
        </section>
    </main>
</div>
</body>
</html>
