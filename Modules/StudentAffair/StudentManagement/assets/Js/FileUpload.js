/** Following are used for Design Upload File. */
// File upload container and button.
const dropAreaContainer = document.querySelector(".drop-zone");
const studentInputExcelField = document.getElementById("fileInput");
const browseBtnSpan = document.querySelector("#browseBtn");

// progress bar section.
const progressContainer = document.querySelector("#progressPercentContainer");
const bgProgress = document.querySelector(".bg-progress");
const status = document.querySelector(".status");
const progressPercent = document.querySelector("#progressPercent");
const progressBar = document.querySelector(".progress-bar");
const maxSizeAllowed = 15 * 1024 * 1024;

/** Fields list.  */
const departmentField = document.getElementById('importStudentDepartmentSelectId');
const programField = document.getElementById('importStudentProgramSelectId');
const seasonField = document.getElementById('importStudentSeasonSelectId');

const backArrowBtn = document.getElementById('backArrowId');
const generatedTableContainer = document.getElementById('generatedTableContainer');

const saveStudentRecordBtn = document.getElementById('saveStudentRecordBtn');

$(document).ready(function () {
    /**  */
    $(departmentField).on('change', function (e) {
        const departmentFieldValue = this.value;
        if (departmentFieldValue.length !== 0 && (programList !== null)) {
            let optionsList = createOptionsListForProgramField(departmentFieldValue, programList)

            $(programField).children().slice(1).remove();
            $(programField).append(optionsList);
        }
    });

    /** applying animation for dragover when a file is placed and when file is removed from the container. */
    $(dropAreaContainer).bind({

        dragover: function (e) {
            e.preventDefault();
            dropAreaContainer.classList.add("dragged");
        },
        dragleave: function (e) {
            dropAreaContainer.classList.remove("dragged");
        },
        drop: function (e) {
            // console.log(event.files)
            // console.log(event.dataTransfer.files)
            e.preventDefault();

            if (departmentField.value.length !== 0 && programField.value.length !== 0 && seasonField.value.length !== 0) {
                const files = event.dataTransfer.files;
                if (files.length === 1) {
                    if (files[0].size < maxSizeAllowed) {
                        studentInputExcelField.files = files;
                        uploadFileProcess();
                    } else
                        console.log("Max file size is 15MB")
                }
                dropAreaContainer.classList.remove("dragged");
            } else {
                alert("please complete all fields to import file");
                dropAreaContainer.classList.remove("dragged");
                $(studentInputExcelField).val("");
            }
        }
    });

    $(document).on('input', 'tr > td', function (e) {
        $(this).removeClass('bg-red-300 text-white');
    })

    /** Browse Button and Input Excel File... */
    $(browseBtnSpan).on('click', function (e) {
        studentInputExcelField.click();
    })

    studentInputExcelField.addEventListener("change", () => {
        if (departmentField.value.length !== 0 && programField.value.length !== 0 && seasonField.value.length !== 0) {
            if (studentInputExcelField.files[0].size > maxSizeAllowed) {
                showToast("Max file size is 15");
                studentInputExcelField.value = ""; // reset the input
                return;
            }
            uploadFileProcess();
        } else {
            alert("please complete all fields to import file");
            $(studentInputExcelField).val("");
        }
        dropAreaContainer.classList.remove("dragged");
    });

    /** changing SheetTabs section.
     * i)   0 tab bind 0,1
     * ii)  1 tab bind 2,3
     * iii) 2 tab bind 4,5
     * iv)  3 tab bind 6,7
     *      4 tab bind 8,9
     *      5 tab bind 10,11
     *      6 tab bind 12,13
     *      7 tab bind 14,15
     *      8 tab bind 16,17
     * */
    $(document).on('click', 'a[id^="importExcelSheetTabID-"]', function (event) {
        const panel = $(this).parent(); //.work-sheet-container
        let selectedID = this.id;
        $(panel).children().each(function (index, value) { // 0,1,2
            if (selectedID !== value.id) {
                $(value).removeClass().addClass("sm:px-6 sm:w-auto cursor-pointer inline-flex justify-center items-center py-2 w-1/2  " +
                    "rounded-t border-b-2 text-gray-400 font-semibold tracking-normal leading-none student-profile-header-text my-0 transform transition " +
                    "ease-out duration-300 hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black text-base")

                if (index % 2 === 0) { // for case i , iii.
                    if (index === 0) {
                        $(generatedTableContainer).children()[0].classList.add("hidden");
                        $(generatedTableContainer).children()[1].classList.add("hidden");
                    } else if (index > 0) { // for iii
                        let newIndex = index * 2;
                        $(generatedTableContainer).children()[newIndex].classList.add("hidden");
                        $(generatedTableContainer).children()[newIndex + 1].classList.add("hidden");
                    }
                } else {  // for case ii and iv.
                    if (index === 1) {
                        $(generatedTableContainer).children()[2].classList.add("hidden");
                        $(generatedTableContainer).children()[3].classList.add("hidden");
                    } else if (index > 0) { // for iii
                        let newIndex = index * 2;
                        $(generatedTableContainer).children()[newIndex].classList.add("hidden");
                        $(generatedTableContainer).children()[newIndex + 1].classList.add("hidden");
                    }
                }
            } else {
                console.log("remove ", index, index % 2)
                $(value).removeClass().addClass("sm:px-6 sm:w-auto sm:justify-start cursor-pointer inline-flex justify-center items-center py-2 w-1/2 " +
                    "rounded-t border-b-2 border-indigo-500 text-black tracking-wide leading-none student-profile-header-text my-0 text-base")

                if (index % 2 === 0) { // for case i , iii.
                    if (index === 0) {
                        $(generatedTableContainer).children()[0].classList.remove("hidden");
                        $(generatedTableContainer).children()[1].classList.remove("hidden");
                    } else if (index > 0) { // for iii
                        let newIndex = index * 2;
                        $(generatedTableContainer).children()[newIndex].classList.remove("hidden");
                        $(generatedTableContainer).children()[newIndex + 1].classList.remove("hidden");
                    }
                } else {  // for case ii and iv.
                    if (index === 1) {
                        $(generatedTableContainer).children()[2].classList.remove("hidden");
                        $(generatedTableContainer).children()[3].classList.remove("hidden");
                    } else if (index > 0) { // for iii
                        let newIndex = index * 2;
                        $(generatedTableContainer).children()[newIndex].classList.remove("hidden");
                        $(generatedTableContainer).children()[newIndex + 1].classList.remove("hidden");
                    }
                }
                $("#importedTableContainer > div > div > h2").text(tableHeaderName[parseInt(selectedID.match(/\d+/)[0]) - 1]);
            }
        });
    });

    $(document).on('click', 'img[data-std-delete="remove"]', function (e) {
        e.stopPropagation();
        $(this).closest("tr").remove();
    });

    $(document).on('click', 'img[id^="addMoreBtn-"]', function (e) {
        addStudentTableRecord(this, false);
    });

    const uploadFileProcess = () => {
        files = fileInput.files;
        const formData = new FormData();
        formData.append("myfile", files[0]);
        let reader = new FileReader();
        reader.readAsArrayBuffer(event.target.files[0]);
        reader.onload = function (event) {
            let data = new Uint8Array(reader.result);
            let work_book = XLSX.read(data, {type: 'array'});
            console.log("WorkBook :", work_book, "\n");

            sheetToJson(work_book);
            // sheetToHtml(work_book , work_book.SheetNames);
            $("form.px-10.py-6").addClass("hidden");
        }
        $(saveStudentRecordBtn).removeClass("hidden")
    };

    $(saveStudentRecordBtn).on('click', function (e) {

        let isCorrectFormat = false;
        let departmentCode = departmentField.value.replace(/\s\s+/g, '');
        let programCode = programField.value.replace(/\s\s+/g, '');

        let programName = $("#importStudentProgramSelectId option:selected").text().replace(/\s\s+/g, ''); // Saves BCSE, BCCS
        let seasonName = $("#importStudentSeasonSelectId option:selected").text().replace(/\s\s+/g, ''); //  Fall 24
        let sectionNameList = [];

        let seasonShortName = seasonField.value; // FA24
        let seasonFullName = seasonField.getAttribute("data-season"); // Fall 2024


        $(tableHeaderName).each(function (k, text) {
            //  $("#importedTableContainer > div > div > h2").text()  STUDENTS DATA BCSE FALL 2021 For SECTION A
            let arrayList = text.replace(/(students|student|data|for|is|am)+/ig, '').trim().split(/\s+/); // BCSE FALL 2021 SECTION A
            sectionNameList.push(arrayList.pop())

            if (arrayList.length > 2) {
                let ref = arrayList[2].substr(2);
                if (programName === arrayList[0] && (seasonName.localeCompare((arrayList[1] + ' ' + ref), undefined, {sensitivity: 'base'}) === 0))
                    isCorrectFormat = true;
            }

        });

        let hasDuplication = checkDuplication(generatedTableContainer);

        if (isCorrectFormat && !hasDuplication) { // working fine
            let studentSectionWiseList = passIntoStudentList(generatedTableContainer, sectionNameList, true, 0);
            callAjaxForCreation(departmentCode, programCode, programName, seasonFullName, seasonName, seasonShortName, studentSectionWiseList)

        } else if (!isCorrectFormat) {
            $('body').append(popupErrorNotifier("Mismatch Provided Format", "Please check the parameters of Program or Season, wrong sheet is uploaded."));
            $("#errorMessageDiv").toggle("hidden").animate(
                {right: 0,}, 3000, function () {
                    $(this).delay(2000).fadeOut().remove();
                });
        } else if (hasDuplication) {
            $('body').append(popupErrorNotifier("Duplicate Match Registration", "Please recheck the highlight field."));
            $("#errorMessageDiv").toggle("hidden").animate(
                {right: 0,}, 3000, function () {
                    $(this).delay(2000).fadeOut().remove();
                });
        }
    })
});


/** Sample working of Different Util sheet import design. */
let tableHeaderName = [];

function sheetToJson(work_book) {
    let counter = 1
    work_book.SheetNames.forEach(function (sheetName) {
        let sheetCode = work_book.Sheets[sheetName];

        const excelFormatParameter = {
            editable: true,
            blankRows: true,
            raw: false,
            dateNF: 'dd"/"mm"/"yyyy', // <--- need dateNF in sheet_to_json options (note the escape chars)
            skipUndfendVale: true,
            defaultValue: "",
            defval: '',
            sheetStubs: true
        }
        let studentJsonFormatList = XLSX.utils.sheet_to_json(sheetCode, excelFormatParameter);
        // sheetCode['!ref'] = "B1:J58"; // change the sheet range to - to -.
        // console.log(studentJsonFormatList);

        createTabularStudentDataFormat(studentJsonFormatList, sheetName, counter);
        createDifferentSheetWorkSection(sheetName, counter++);

    });
}

function createTabularStudentDataFormat(studentJsonFormatList, workSheetName, counter) {
    if (studentJsonFormatList.length > 0) {
        let key;
        /** Top Section Data */
        if (Object.keys(studentJsonFormatList[1]) !== null) {
            key = Object.keys(studentJsonFormatList[1])[1];
            // console.log("KEY is : ", key);
            if (key.length > 1 && key === 'FURC' && counter === 1) {
                $("#importedTableContainer > div > div > h2").text(studentJsonFormatList[1][key] + " for " + studentJsonFormatList[2][key]);
            }
            tableHeaderName.push(studentJsonFormatList[1][key] + " for " + studentJsonFormatList[2][key]);
        }

        /** Header Content */
        const table = document.createElement('table');
        $(table).addClass("border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative rounded");
        const tableHeader = document.createElement('thead');
        table.append(tableHeader);
        let tableHeaderRow = document.createElement('tr');
        $(tableHeaderRow).addClass("text-center bg-catalystLight-f5");
        tableHeader.append(tableHeaderRow);
        // let set = workSheetName.match(/^(\S+)\s(.*)/).slice(1)[0];
        let tableID = "bachelors" + workSheetName.replace(/\s+/g, '-');
        // console.log("table id :", tableID);
        table.setAttribute("id", tableID);

        let maxLengthPerRow = Object.entries(studentJsonFormatList[3]).length;
        Object.entries(studentJsonFormatList[3]).forEach(function (value, index) {
            if (value[1] !== 'S.No') {
                $(tableHeaderRow).append(`<th class="capitalize px-4 py-3  tracking-wider font-medium text-sm">
                                ${value[1]}
                            </th>`);
            }
            if (maxLengthPerRow === index + 1) { // adding buttons.
                $(tableHeaderRow).append(`
             <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs"> </td>`);
            }
        });
        $(generatedTableContainer).append(table);

        /** Data Set Content */
        const tableBody = document.createElement('tbody');
        for (let row = 4; row < studentJsonFormatList.length; row++) {
            let tableHeaderRow = document.createElement('tr');
            tableBody.append(tableHeaderRow);

            let maxLengthPerRow = Object.entries(studentJsonFormatList[row]).length;
            Object.entries(studentJsonFormatList[row]).forEach(function (value, index) {

                let relatedEvent = getRelatedKeyDownForTabularRow(index);
                relatedEvent = (relatedEvent === undefined ? '' : relatedEvent)

                if (value[0] !== "__EMPTY" && maxLengthPerRow > index) {
                    $(tableHeaderRow).append(`
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" ${relatedEvent} contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center" >${value[1]}</span>
                            </td>`);
                }
                if (maxLengthPerRow === index + 1) { // adding buttons.
                    $(tableHeaderRow).append(`
             <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="false">
                                           <img class="h-10 w-6 cursor-pointer" alt="" 
                        src="../../../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" data-std-delete="remove">
                                        </td>`);
                }
            });
        }
        $(table).append(tableBody);
        $(table).append(createAddMoreBtn(counter));

        /** pagination Design */
        createPaginationBar(tableID);

        if (counter !== 1) {
            $(table).addClass("hidden");
            console.log("#" + tableID)
            $("#" + tableID).removeAttr("style");
            $("#" + tableID).next().addClass('hidden');
        }
    }
}

function createDifferentSheetWorkSection(sheetList, counter) {
    if (counter !== 1)
        $("#sheetNoId").append(` <a id="importExcelSheetTabID-${counter}" class="sm:px-6 sm:w-auto cursor-pointer inline-flex justify-center items-center py-2 w-1/2  rounded-t border-b-2 text-gray-400 font-semibold tracking-normal leading-none student-profile-header-text my-0
                     transform transition ease-out duration-300 hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black text-base">
                            ${sheetList} </a>`);
    else
        $("#sheetNoId").append(`  <a id="importExcelSheetTabID-${counter}" class="sm:px-6 sm:w-auto sm:justify-start cursor-pointer inline-flex justify-center
                   items-center py-2 w-1/2 rounded-t border-b-2 border-indigo-500 text-black
                   tracking-wide leading-none student-profile-header-text my-0 text-base">
                            ${sheetList}</a>`);
}

function sheetToHtml(work_book, sheet_name) {

    work_book.Sheets[work_book.SheetNames[0]]['!ref'] = "B1:J58";
    console.log("after : ", work_book.Sheets[work_book.SheetNames[0]])

    const tabular = XLSX.write(work_book, {
        sheet: work_book.SheetNames[0],
        type: 'string',
        bookType: 'html',
        editable: true,
        skipUndfendVale: false, defaultValue: '', blankRows: false, defval: '',
    });

    document.getElementById('generatedTableContainer').innerHTML += tabular;
    $("#generatedTableContainer table").addClass("border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative rounded");
    $("#generatedTableContainer table tbody").addClass("");
    $("#generatedTableContainer table tbody tr").addClass("");
    $("#generatedTableContainer table tbody tr td").addClass("border-dashed border-t border-gray-200 text-sm");
    $("#generatedTableContainer table tbody tr td span").addClass("text-gray-700  flex justify-center items-center text-sm");

}


function callAjaxForCreation(departmentCode, programCode, programName, seasonFullName, seasonName, seasonShortName, studentSectionWiseList) {

    console.log(studentSectionWiseList)

    $.ajax({
        type: "POST",
        url: "assets/Operation/ManageStudentAjax.php",
        data: {
            sNewCreation: true,
            departmentCode: departmentCode,
            programCode: programCode,
            programName: programName,
            seasonFullName: seasonFullName,
            seasonName: seasonName,
            seasonShortName: seasonShortName,
            studentSectionWiseList: studentSectionWiseList
        },
        beforeSend: function () {

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
        },
        success: function (serverResponse, status) {
        },
        complete: function (response) {
            /*     const refreshIntervalId = setInterval(function () {

                     $("tbody").children().slice(0).remove();
                     $("tbody").append(responseText.message);
                     $(refreshBtn).addClass("transform").removeClass("animate-spin")
                     clearInterval(refreshIntervalId);
                 }, 1000);*/
            let responseText = JSON.parse(response.responseText)
            console.log("responseText ", responseText)

        }
    });
}

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