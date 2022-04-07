<?php
?>

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
    <script src=""></script>

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
            margin: 15px 0px;
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

</head>
<body>
<div class="w-full min-h-full" style="background-color: #ECECF3">

    <main class="main-content-alignment min-h-full">
        <section>
            <div class="flex flex-col px-10 py-2 my-5 rounded-lg shadow bg-white">
                <h2 class="font-semibold text-2xl text-gray-700 capitalize">Import Box</h2>
                <p class="font-normal text-base text-gray-700 capitalize">Please select the respective <span
                            class="capitalize font-semibold">Batch/Season , semester </span> along with the allocated
                    <span class="capitalize font-semibold">curriculum year</span></p>
                <div class="inline-flex rounded" style="background-color: #F4F8F9">
                    <div class="flex flex-grow justify-end items-center pt-3 pb-2 text-white text-base font-medium ml-20 w-3/4">

                        <div class="textField-label-content w-3/12">
                            <label for="importCourseOfferingBatchSelectId"></label>
                            <select class="select" name="importCourseOfferingBatchSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="importCourseOfferingBatchSelectId">
                                <option value="" hidden=""></option>
                                <?php

                                ?>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Batch/Season</label>
                        </div>
                        <div class="textField-label-content w-3/12">
                            <label for="importCourseOfferingSemesterSelectId"></label>
                            <select class="select" name="importCourseOfferingSemesterSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="importCourseOfferingSemesterSelectId">
                                <option value="" hidden=""></option>
                            </select>
                            <label class="select-label top-1/4 sm:top-3">Semester</label>
                        </div>
                        <div class="textField-label-content w-3/12">
                            <label for="importCourseOfferingCurriculumSelectId"></label>
                            <select class="select" name="importCourseOfferingCurriculumSelect"
                                    onclick="this.setAttribute('value', this.value);"
                                    onchange="this.setAttribute('value', this.value);" value=""
                                    id="importCourseOfferingCurriculumSelectId">
                                <option value="" hidden=""></option>
                            </select>

                            <label class="select-label top-1/4 sm:top-3">Curriculum</label>
                        </div>
                    </div>
                    <div class="flex justify-end items-center w-1/6">
                        <button type="button"
                                class="text-white rounded-md border-0  font-medium bg-catalystBlue-l2 px-8 mx-5 py-1"
                                name="importBoxCreateBtn" id="importBoxCreateBtnID">Create
                        </button>
                    </div>
                </div>
            </div>

            <div id="importedTableContainer"
                 class="bg-white outline-none ring-2 ring-catalystLight-e1 text-black rounded-md mt-2 my-5 h-1/2 weeklytopics-primary-border-n">
                <div class="db-table-header-topic border-b-0 rounded-b-none" style="background-color: #F4F8F9">
                    <h2 class="flex items-center justify-center text-lg text-center font-semibold  text-gray-700 h-14 tracking-wide text-center capitalize">
                        Imported
                        Program Courses and allocation information will be shown here.</h2>
                </div>

                <form action="" class="px-10 py-6">
                    <div class="drop-zone py-10">
                        <div class="icon-container">
                            <img src="/Assets/Images/vectorFiles/Uploader/file.svg" draggable="false" class="center"
                                 alt="File Icon">
                            <img src="/Assets/Images/vectorFiles/Uploader/file.svg" draggable="false" class="left"
                                 alt="File Icon">
                            <img src="/Assets/Images/vectorFiles/Uploader/file.svg" draggable="false" class="right"
                                 alt="File Icon">
                        </div>
                        <input type="file" id="fileInput">
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
                </form>

            </div>

        </section>
    </main>

</div>
</body>

<script>
    const dropAreaContainer = document.querySelector(".drop-zone");
    const inputFileField = document.querySelector("#fileInput");
    const browseBtnSpan = document.querySelector("#browseBtn");

    // progress bar section.
    const progressContainer = document.querySelector("#progressPercentContainer");
    const bgProgress = document.querySelector(".bg-progress");
    const status = document.querySelector(".status");
    const progressPercent = document.querySelector("#progressPercent");
    const progressBar = document.querySelector(".progress-bar");


    const maxSizeAllowed = 15 * 1024 * 1024;


    $(browseBtnSpan).on('click', function (event) {
        inputFileField.click();
    })

    dropAreaContainer.addEventListener("drop", (e) => {
        e.preventDefault();
        //   console.log("dropped", e.dataTransfer.files[0].name);
        const files = e.dataTransfer.files;
        if (files.length === 1) {
            if (files[0].size < maxSizeAllowed) {
                inputFileField.files = files;
                uploadFile();
            } else
                console.log("Max file size is 15MB")
        }
        dropAreaContainer.classList.remove("dragged");
    });


    dropAreaContainer.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropAreaContainer.classList.add("dragged");
        // console.log("dropping file");
    });
    dropAreaContainer.addEventListener("dragleave", (e) => {
        dropAreaContainer.classList.remove("dragged");
        console.log("drag ended");
    });

    // file input change and uploader
    inputFileField.addEventListener("change", () => {
        if (inputFileField.files[0].size > maxSizeAllowed) {
            showToast("Max file size is 15");
            inputFileField.value = ""; // reset the input
            return;
        }
        uploadFile();
    });

    const uploadFile = () => {
        files = fileInput.files;
        const formData = new FormData();
        formData.append("myfile", files[0]);
        console.log("FormData : ", formData)

        console.log(progressContainer)
        $(progressContainer).removeClass("hidden");

        event.loaded = 42;
        event.total = 100;

        let percent = Math.round((100 * event.loaded) / event.total);
        progressPercent.innerText = percent;
        const scaleX = `scaleX(${percent / 100})`;
        bgProgress.style.transform = scaleX;
        progressBar.style.transform = scaleX;

        /*
                // upload file
                const xhr = new XMLHttpRequest();

                // listen for upload progress
                xhr.upload.onprogress = function (event) {
                    // find the percentage of uploaded
                    let percent = Math.round((100 * event.loaded) / event.total);
                    progressPercent.innerText = percent;
                    const scaleX = `scaleX(${percent / 100})`;
                    bgProgress.style.transform = scaleX;
                    progressBar.style.transform = scaleX;
                };

                // handle error
                xhr.upload.onerror = function () {
                    showToast(`Error in upload: ${xhr.status}.`);
                    fileInput.value = ""; // reset the input
                };

                // listen for response which will give the link
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == XMLHttpRequest.DONE) {
                        onFileUploadSuccess(xhr.responseText);
                    }
                };

                xhr.open("POST", uploadURL);
                xhr.send(formData);
        */
    };
    const onFileUploadSuccess = (res) => {
        fileInput.value = ""; // reset the input
        status.innerText = "Uploaded";

        // remove the disabled attribute from form btn & make text send
        emailForm[2].removeAttribute("disabled");
        emailForm[2].innerText = "Send";
        progressContainer.style.display = "none"; // hide the box

        const {file: url} = JSON.parse(res);
        console.log(url);
        sharingContainer.style.display = "block";
        fileURL.value = url;
    };

</script>
</html>