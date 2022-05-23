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
// const curriculumField = document.getElementById('importCourseOfferingCurriculumSelectID');
// const batchField = document.getElementById('importCourseOfferingBatchSelectID');
// const semesterField = document.getElementById('importCourseOfferingSemesterSelectID');


/** Credit Hour Label. */
const totalCreditHourTab = document.getElementById('totalCreditHourTabID');
const totalCreditHourLabel = document.getElementById('totalCreditHourLabelID');

const courseOfferingTableContainer = document.getElementById('generatedTableContainer');
const saveCourseOfferingBtn = document.getElementById('saveCourseOfferingBtn');

$(document).ready(function () {
    /** Remove error color from selections */
    $('.textField , .select').on('input', function (e) {
        if (this.type === "text" || this.type === "date")
            $(this).parent().removeClass("textField-error-input");
        else if (this.type === "select-one")
            $(this).parent().removeClass("select-error-input");
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
            if (containsEmptyField([seasonField])) {
                const files = event.dataTransfer.files;
                if (files.length === 1) {
                    if (files[0].size < maxSizeAllowed) {
                        courseOfferingAndAllocationExcelField.files = files;
                        event.target.files = files;
                        uploadFileProcess()
                    } else
                        console.log("Max file size is 15MB")
                }
                dropAreaContainer.classList.remove("dragged");
            } else {
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
        if (containsEmptyField([seasonField])) {
            if (courseOfferingAndAllocationExcelField.files[0].size > maxSizeAllowed) {
                showToast("Max file size is 15");
                courseOfferingAndAllocationExcelField.value = ""; // reset the input
                return;
            }
            uploadFileProcess();
        } else {
            $(courseOfferingAndAllocationExcelField).val("");
        }
        dropAreaContainer.classList.remove("dragged");
    });

    const uploadFileProcess = () => {
        let uploadedFiles = event.target.files;
        let reader = new FileReader();
        reader.readAsArrayBuffer(uploadedFiles[0]);
        reader.onload = function (event) {
            let data = new Uint8Array(reader.result);
            let work_book = XLSX.read(data, {type: 'array'});
            console.log("WorkBook :", work_book, "\n");
            console.log(work_book.Sheets)

            sheetToJson(work_book);
            $("form.px-10.py-6").addClass("hidden");
        }
    };

    $(document).on('click', 'a[id^="importCourseOfferingSheetTabID-"]', function (event) {
        const panel = $(this).parent(); //.work-sheet-container
        let selectedID = this.id;
        $(panel).children().each(function (index, value) { // 0,1,2
            if (selectedID !== value.id) {
                $(value).removeClass().addClass("non-selected-tab-section tab-context-header")

                if (index % 2 === 0) { // for case i , iii.
                    if (index === 0) {
                        $(courseOfferingTableContainer).children()[0].classList.add("hidden");
                        $(courseOfferingTableContainer).children()[1].classList.add("hidden");
                    } else if (index > 0) { // for iii
                        let newIndex = index * 2;
                        $(courseOfferingTableContainer).children()[newIndex].classList.add("hidden");
                        $(courseOfferingTableContainer).children()[newIndex + 1].classList.add("hidden");
                    }
                } else {  // for case ii and iv.
                    if (index === 1) {
                        $(courseOfferingTableContainer).children()[2].classList.add("hidden");
                        $(courseOfferingTableContainer).children()[3].classList.add("hidden");
                    } else if (index > 0) { // for iii
                        let newIndex = index * 2;
                        $(courseOfferingTableContainer).children()[newIndex].classList.add("hidden");
                        $(courseOfferingTableContainer).children()[newIndex + 1].classList.add("hidden");
                    }
                }
            } else {
                $(value).removeClass().addClass("selected-tab-section tab-context-header")
                if (index % 2 === 0) { // for case i , iii.
                    if (index === 0) {
                        $(courseOfferingTableContainer).children()[0].classList.remove("hidden");
                        $(courseOfferingTableContainer).children()[1].classList.remove("hidden");
                    } else if (index > 0) { // for iii
                        let newIndex = index * 2;
                        $(courseOfferingTableContainer).children()[newIndex].classList.remove("hidden");
                        $(courseOfferingTableContainer).children()[newIndex + 1].classList.remove("hidden");
                    }
                } else {  // for case ii and iv.
                    if (index === 1) {
                        $(courseOfferingTableContainer).children()[2].classList.remove("hidden");
                        $(courseOfferingTableContainer).children()[3].classList.remove("hidden");
                    } else if (index > 0) { // for iii
                        let newIndex = index * 2;
                        $(courseOfferingTableContainer).children()[newIndex].classList.remove("hidden");
                        $(courseOfferingTableContainer).children()[newIndex + 1].classList.remove("hidden");
                    }
                }
                $("#importedTableContainer > div > div > h2").text(offeringTableHeaderName[parseInt(selectedID.match(/\d+/)[0]) - 1]);
            }
        });
    });

});

let offeringTableHeaderName = [];
let offeringPerSheetTotalCreditHour = [];

function sheetToJson(work_book) {
    let counter = 1
    work_book.SheetNames.forEach(function (sheetName) {
        let sheetCode = work_book.Sheets[sheetName];
        const excelFormatParameter = {
            editable: true,
            blankrows: false,
            raw: false, // Use raw values if true else formatted strings
            skipUndfendVale: false,
            defaultValue: "",
            defval: '', // Use specified value in place of null or undefined
            sheetStubs: false,  //  Create cell objects of type z for null values
            skipHeader: false,  // If true, do not include header row in output
            header: 1,
        }
        let offeringJsonFormatList = XLSX.utils.sheet_to_json(sheetCode, excelFormatParameter);
        let tableHeaderFormatter = work_book.Sheets[sheetName]['A1']['v'];
        console.log("offeringJsonFormatList : ", offeringJsonFormatList, tableHeaderFormatter, "counter : " + counter)
     createTabularDataFormatCourseOffering(tableHeaderFormatter, offeringJsonFormatList, sheetName, counter);
        createDifferentSheetWorkSection(sheetName, counter++);
        saveCourseOfferingBtn.classList.remove("hidden");
    });
}


function createTabularDataFormatCourseOffering(tableHeaderFormatter, offeringJsonFormatList, workSheetName, counter) {
    if (offeringJsonFormatList.length > 0) {

        /** Top Section Data */
        let headerName;
        if (offeringJsonFormatList[0].length !== null || offeringJsonFormatList[0].length > 0) {
            offeringJsonFormatList[0] = offeringJsonFormatList[0].filter(n => n); // removing empty
            headerName = (offeringJsonFormatList[0][0] === tableHeaderFormatter ? tableHeaderFormatter : "ERROR");
            if (headerName.length > 5) {
                let ref = headerName.split(/(\s+)/).filter(e => e.trim().length > 0) // ["BCSE-1" , "(Fall-2021" , "Batch") ]
                $("#importedTableContainer > div > div > h2").text("Course Offering For " + ref[0] + " of Batch " + removeBrackets(ref[1]));
                offeringTableHeaderName.push("Course Offering For " + ref[0] + " of Batch " + removeBrackets(ref[1]));
            } else {
                $("#importedTableContainer > div > div > h2").text("ERROR WHILE PERFORMING COURSE OFFERING FOR " + tableHeaderFormatter);
                return;
            }
        }

        let convertorOfHeader = headerName.split(/(\s+)/).filter(e => e.trim().length > 0) // ["BCSE-1" , "(Fall-2021" , "Batch") ]
        let programName = extractFirstString(convertorOfHeader[0]);
        let semesterNumber = extractFirstNumeric(convertorOfHeader[0]);
        let batchYear = removeBrackets(convertorOfHeader[1]);
        // console.log(programName, semesterNumber, batchYear);

        /** Header Content */
            // const tableSectionDivision = document.createElement('div');
            // $(tableSectionDivision).attr("class", "relative rounded w-full whitespace-no-wrap bg-white").attr("aria-disabled", "false").attr("aria-describedby", `table-sector-offering-${counter}`);
            // $(tableSectionDivision).append(`<h2 class="font-semibold text-2xl tracking-wider leading-relaxed p-2">Regular Course</h2>`);

        const table = document.createElement('table');
        $(table).addClass("table-auto border-collapse");
        const tableHeader = document.createElement('thead');
        table.append(tableHeader);
        let tableHeaderRow = document.createElement('tr');
        $(tableHeaderRow).addClass("text-center bg-catalystLight-f5");
        tableHeader.append(tableHeaderRow);
        let tableID = 'offeringTable-' + programName + counter;
        table.setAttribute("id", tableID);

        let maxLengthPerRow = Object.entries(offeringJsonFormatList[3]).length; // where the header lies.
        Object.entries(offeringJsonFormatList[3]).forEach(function (value, index) {
            if (value[1].toLowerCase().localeCompare('S.No'.toLowerCase())) { // value[1] !== 'S.No'
                $(tableHeaderRow).append(`<th class="capitalize px-4 py-3  tracking-wider font-medium text-sm">
                                ${value[1]}
                            </th>`);
            }
            if (maxLengthPerRow === index + 1) { // adding buttons.
                $(tableHeaderRow).append(`
             <td class="px-2 py-3 border-gray-200 text-center text-xs"> </td>`);
            }
        });
        // $(tableSectionDivision).append(table);
        $(courseOfferingTableContainer).append(table);

        /** Data Set Content */
        const tableBody = document.createElement('tbody');
        let totalCHIndex = regularCourseOffering(table, tableBody, offeringJsonFormatList, counter)
        // console.log("for total credit hour index : ", offeringJsonFormatList[totalCHIndex] , offeringJsonFormatList[totalCHIndex][2]);

        for (let i = totalCHIndex+1; i < offeringJsonFormatList.length; i++) {
            console.log(i, "NEXT : " , offeringJsonFormatList[i]);
        }


        /** pagination Design */
        createPaginationBar(tableID);

        if (counter !== 1) {
            $(table).addClass("hidden");
            $("#" + tableID).removeAttr("style");
            $("#" + tableID).next().addClass('hidden');
        }
    }
}

function regularCourseOffering(table, tableBody, offeringJsonFormatList, counter) {
    let totalCHIndex = -1;
    let c = 0;
    for (let row = 4; row < offeringJsonFormatList.length; row++) {
        let tableBodyRow = document.createElement('tr');
        // tableBodyRow.setAttribute("aria-valuetext", 'course-offered-t' + counter + "-" + Math.ceil(row / 4));
        c++;
        tableBodyRow.setAttribute("aria-valuetext", 'course-offered-t' + counter + "-" + c);
        tableBodyRow.setAttribute("aria-expanded", 'true');
        $(tableBodyRow).addClass("border-dashed border-b border-gray-200 text-center text-xs")
        tableBody.append(tableBodyRow);
        $(table).append(tableBody);
        let maxLengthPerRow = Object.entries(offeringJsonFormatList[row]).length;

        let BreakException = {};
        try {
            let emptyCounter = 0;
            offeringJsonFormatList[row].forEach(function (value, index) {
                // let relatedEvent = getRelatedKeyDownForTabularRow(index);
                // relatedEvent = (relatedEvent === undefined ? '' : relatedEvent)

                if ((index < (maxLengthPerRow / 2) && value.length === 0)) {
                    emptyCounter++;
                    if (emptyCounter === (index / maxLengthPerRow))
                        throw BreakException;
                } else {
                    if (value !== "__EMPTY" && maxLengthPerRow > index) { /** for creating allocation row. */
                        //border-dashed px-2 py-3 border-b border-gray-200 text-center text-xs
                        if (index === 4) { // for course coordinator column
                            $(tableBodyRow).append(`
                               <td class="px-2 py-3  text-center text-xs">
                               <select class="select" onclick="this.setAttribute('value', this.value);" 
                                onchange="this.setAttribute('value', this.value);"  id="${tableBodyRow.getAttribute('aria-valuetext')}">
                                <option value="" hidden=""></option>
                                ${makeOptionsForCoordinator()}
                                </select>
                            </td>`);

                        } else {

                            if (index > 4) {
                                let color = '';
                                if (!isFacultyExist(value)) {
                                    color = "text-red-600 font-semibold";
                                    tableBodyRow.setAttribute("aria-expanded", 'false');
                                }

                                $(tableBodyRow).append(`
                            <td class="px-2 py-3 text-center text-xs" contenteditable="true" data-faculty-id = "${fCode}">
                                <span class="text-gray-700 flex justify-center items-center ${color}" >${value}</span>
                            </td>`);

                            } else {
                                $(tableBodyRow).append(`
                            <td class="px-2 py-3 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center" >${value}</span>
                            </td>`);
                            }

                        }
                    }

                    if (maxLengthPerRow === index + 1) // adding delete button.
                    {
                        $(tableBodyRow).append(`
                         <td class="px-2 py-3 text-center text-xs " contenteditable="false">
                                           <img class="h-10 w-6 cursor-pointer" alt="" src="../../../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" 
                                           data-std-delete="remove">
                                        </td>`);

                        let coordinatorOptionList = document.querySelector("#"+tableBodyRow.getAttribute('aria-valuetext'));

                        if (!tableBodyRow.getAttribute("aria-expanded") === false){
                            $(coordinatorOptionList).attr("disabled", true).css('cursor', 'not-allowed')
                        }

                    }
                }
            });
        } catch (e) {
            if (e !== BreakException) throw e;
        }

        // check next is Total Credits hour.
        //nextRowFirstValue.search("total credits".toLowerCase()) || nextRowFirstValue.match(/total credits/i)
        let nextRowFirstValue = offeringJsonFormatList[row + 1][0].toLowerCase();
        if (nextRowFirstValue.match(/(Total|Credits|credit)+/ig)) {
            totalCHIndex = row + 1;
            break;
        }
    }
    $(table).append(createAddMoreBtn(counter));

    return totalCHIndex;
}


function createDifferentSheetWorkSection(sheetList, counter) {
    if (counter !== 1)
        $("#sheetNoId").append(` <a id="importCourseOfferingSheetTabID-${counter}" class="non-selected-tab-section tab-context-header">
                            ${sheetList} </a>`);
    else
        $("#sheetNoId").append(`  <a id="importCourseOfferingSheetTabID-${counter}" class="selected-tab-section tab-context-header">
                            ${sheetList}</a>`);
}

/** function is used to create add more button. */
function createAddMoreBtn(value) {
    return ` <td colspan="12" class="py-5 text-center">
                     <button type="button" aria-label="add_offer_button_label" class="max-w-2xl rounded-full" id="add-offering-btn-${value}" aria-expanded="false" aria-haspopup="true">
                            <img id="addMoreBtn${-value}" class="h-8 w-8 rounded-full" src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" alt="">
                        </button>
            </td>`
}

function createPaginationBar(tableID) {
    $("#" + tableID).each(function () {
        let currentPage = 0;
        const numPerPage = 8;
        const $table = $(this);
        $table.bind('cOfferingPaginate' + tableID, function () {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).fadeIn("fast").animate({}, "linear", function () {
                // $table.fadeIn();
            }).show().removeAttr("style");
            // $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).fadeIn("slow").show();
        });

        $table.trigger('cOfferingPaginate' + tableID);
        const totalTableRows = $table.find('tbody tr').length;
        const NoOfPages = Math.ceil(totalTableRows / numPerPage);
        const $paginationContainer = $('<div class="bg-white px-4 py-3 flex items-center justify-center border-t border-gray-200 sm:px-6"></div>');
        for (let page = 0; page < NoOfPages; page++) {
            let cssClass = "bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"
            if (page === 0)
                cssClass = "bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium clickable z-10 bg-indigo-50 border-indigo-500 text-indigo-600"

            $(`<span class="${cssClass}" ></span>`).text(page + 1).bind('click', {
                newPage: page
            }, function (event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate' + tableID);

                $(this).fadeIn("slow").animate({}, "linear", function () {
                    $(this).fadeIn();
                }).addClass("z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium")
                    .removeAttr("style").siblings()
                    .removeClass().addClass('bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium');

            }).appendTo($paginationContainer).addClass('clickable');

        }
        $paginationContainer.insertAfter($table).find('span.page-number:first').addClass('active');
    });
}

function makeOptionsForCoordinator() {
    if (facultyList.length > 0) {
        let optionsList = '';
        for (let i = 0; i < facultyList.length; i++) {
            let option = `<option value="${facultyList[i].facultyCode}">${facultyList[i].name}</option>`;
            optionsList += option;
        }
        return optionsList;
    }
    return '';
}

let nonExistenceFacultyList = [];
let fCode;

function isFacultyExist(name) {
    fCode = '';
    if (facultyList.length > 0) {
        let isFaculty = false;
        for (let i = 0; i < facultyList.length; i++) {
            // console.log(name.toUpperCase() , facultyList[i].name.toUpperCase())
            if (name.toUpperCase() == facultyList[i].name.toUpperCase()) { // name.localeCompare(facultyList[i].name, undefined, { sensitivity: 'accent' })
                isFaculty = true;
                fCode = facultyList[i].facultyCode;
            }
        }
        if (!isFaculty)
            nonExistenceFacultyList.push(name);

        return isFaculty;
    }
}

// APPROACH WHEN USER WANT TO CREATE OFFERING FOR ONLY ONE BATCH AT A TIME.
// CURRICULUM , BATCH FIELDS AS WELL.
/*$(seasonField).add(curriculumField).on('change', function (e) {
    if (seasonField.value.length !== 0 && curriculumField.value.length) {
        callAjaxForBatchDropDown(seasonField.value, curriculumField.value, programInstance.programCode);
    }
});*/
/*
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
}*/