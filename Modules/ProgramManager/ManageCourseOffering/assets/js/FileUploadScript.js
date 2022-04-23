/** Following are used for Design Upload File. */
// File upload container and button.
const dropAreaContainer = document.querySelector(".drop-zone");
const courseOfferingAndAllocationExcelField = document.getElementById("fileInput");
const browseBtnSpan = document.querySelector("#browseBtn");

// progress bar section.
const progressContainer = document.querySelector("#progressPercentContainer");
const bgProgress = document.querySelector(".bg-progress");
const status = document.querySelector(".status");
const progressPercent = document.querySelector("#progressPercent");
const progressBar = document.querySelector(".progress-bar");
const maxSizeAllowed = 15 * 1024 * 1024;

/** Fields list.  */
const seasonField = document.getElementById('importCourseOfferingSeasonSelectID');
const curriculumField = document.getElementById('importCourseOfferingCurriculumSelectID');
const batchField = document.getElementById('importCourseOfferingBatchSelectID');
// const semesterField = document.getElementById('importCourseOfferingSemesterSelectID');

const generatedTableContainer = document.getElementById('generatedTableContainer');
const saveCourseOfferingBtn = document.getElementById('saveCourseOfferingBtn');

$(document).ready(function () {
    /** Remove error color from selections */
    $('.textField , .select').on('input', function (e) {
        if (this.type === "text" || this.type === "date")
            $(this).parent().removeClass("textField-error-input");
        else if (this.type === "select-one")
            $(this).parent().removeClass("select-error-input");
    });

    $(seasonField).add(curriculumField).on('change', function (e) {
        if (seasonField.value.length !== 0 && curriculumField.value.length) {
            callAjaxForBatchDropDown(seasonField.value, curriculumField.value, programInstance.programCode);

        }
    });

    $(dropAreaContainer).bind({
        dragover: function (e) {
            e.preventDefault();
            dropAreaContainer.classList.add("dragged");
        },
        dragleave: function (e) {
            dropAreaContainer.classList.remove("dragged");
        },
        drop: function (e) {
            e.preventDefault();
            if (containsEmptyField([seasonField , curriculumField , batchField])) {
                const files = event.dataTransfer.files;
                if (files.length === 1) {
                    if (files[0].size < maxSizeAllowed) {
                        courseOfferingAndAllocationExcelField.files = files;
                        // method call here.
                    } else
                        console.log("Max file size is 15MB")
                }
                dropAreaContainer.classList.remove("dragged");
            } else {
                alert("please complete all fields to import file");
                dropAreaContainer.classList.remove("dragged");
                $(courseOfferingAndAllocationExcelField).val("");
            }
        }
    });

    /** Browse Button and Input Excel File... */
    $(browseBtnSpan).on('click', function (e) {
        courseOfferingAndAllocationExcelField.click();
    })

    courseOfferingAndAllocationExcelField.addEventListener("change", () => {
        if (containsEmptyField([seasonField , curriculumField , batchField])) {
            if (courseOfferingAndAllocationExcelField.files[0].size > maxSizeAllowed) {
                showToast("Max file size is 15");
                courseOfferingAndAllocationExcelField.value = ""; // reset the input
                return;
            }
            uploadFileProcess();
        } else {
            alert("please complete all fields to import file");
            $(courseOfferingAndAllocationExcelField).val("");
        }
        dropAreaContainer.classList.remove("dragged");
    });

});


function callAjaxForBatchDropDown(season, curriculum, program) {
    let returnValue;
    $.ajax({
        type: "POST",
        async: false,
        url: "assets/Operation/manageOfferingAjax.php",
        data: {
            fetchBatch: true,
            seasonCode: season,
            curriculumCode: curriculum,
            programCode: program,
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
        },
        success: function (serverResponse, status) {
            returnValue = JSON.parse(serverResponse);
        },
        complete: function (response) {
            let responseText = JSON.parse(response.responseText)
            returnValue = responseText;
            console.log("MY STATUS :", responseText);
            switch (responseText.status) {
                case 200:
                    createOptionForBatchDropDown(responseText.message);
                    break;
                case 500:
                    // Warning message as few records are unable to CRUD.
                    loadAlertMessage(responseText)
                    break;
            }

        }
    });
}

function createOptionForBatchDropDown(batchList) {
    let optionsList = '';
    for (let i = 0; i < batchList.length; i++) {
        optionsList += `<option value="${batchList[i].batchCode}">${batchList[i].batchName}</option>`;
    }
    $(batchField).children().slice(1).remove();
    $(batchField).append(optionsList);
}


function loadAlertMessage(responseText, timerS = 5000, timerE = 3000) {
    let duplicateList = responseText.message;
    console.log(duplicateList);

    if (responseText.status === 500)
        $('body').append(popupErrorNotifier("Alert " + responseText.errors, responseText.message));
    $("#errorMessageDiv").toggle("hidden").animate(
        {right: 0,}, timerS, function () {
            $(this).delay(timerE).fadeOut().remove();
        });
}