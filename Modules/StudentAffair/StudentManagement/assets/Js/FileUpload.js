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
const departmentField = document.getElementById('importCourseOfferingDepartmentSelectId');
const programField = document.getElementById('importCourseOfferingProgramSelectId');
const seasonField = document.getElementById('importCourseOfferingSeasonSelectId');

const backArrowBtn = document.getElementById('backArrowId');
const generatedTableContainer = document.getElementById('generatedTableContainer');

const saveStudentRecordBtn = document.getElementById('saveStudentRecordBtn');

$(document).ready(function () {
    /**  */
    $(departmentField).on('change', function (e) {
        const currentValue = this.value;
        if (currentValue.length !== 0 && (programList !== null)) {
            let optionsList = '';
            for (let i = 0; i < programList.length; i++) {
                if (currentValue === programList[i].departmentCode)
                    optionsList += `<option value="${programList[i].programCode}">${programList[i].programSN}</option>`;
            }
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
        console.log(this);
        let $table = $(this).closest('table');
        let $tableBody = $(this).closest('table').children(':nth-child(2)');

        let size = $table.find('tbody tr').slice().length; // 8
        let perPage = 4;
        console.log("before mod : ", size % perPage, perPage % size)
        if (size % perPage === 0) {
            console.log("inside the size value :")
            $table.next().remove(); // Deleting The Following Pagination...
            $tableBody.append(sampleNewTableRow());
            createPaginationBar($table.attr("id"));
        } else
            $tableBody.append(sampleNewTableRow());

    })

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

        let programName = $("#importCourseOfferingProgramSelectId option:selected").text().replace(/\s\s+/g, ''); // Saves BCSE, BCCS
        let seasonName = $("#importCourseOfferingSeasonSelectId option:selected").text().replace(/\s\s+/g, ''); //  Fall 24
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

        })

        if (isCorrectFormat) { // working fine
            let studentSectionWiseList = passIntoStudentList(sectionNameList);
            callAjaxForCreation(departmentCode, programCode, programName, seasonFullName, seasonName, seasonShortName, studentSectionWiseList)

        } else {
            $('body').append(popupErrorNotifier("Mismatch Provided Format", "Please check the parameters of Program or Season, wrong sheet is uploaded."));
            $("#errorMessageDiv").toggle("hidden").animate(
                {right: 0,}, 3000, function () {
                    $(this).delay(2000).fadeOut().remove();
                });
        }
    })

});


function passIntoStudentList(sectionNameList) {
    let studentSectionWiseList = {};
    console.log("sectionNameList ", sectionNameList)
    $(generatedTableContainer).children("table").each(function (index, value) {
        studentSectionWiseList[sectionNameList[index]] = []; // 0 []
        let temp = new Array();
        $(value).children("tbody").children("tr").each(function (tIndex, tValue) {
            let studentObject = new Student();
            studentObject.reg = getTableRowNthChild(tValue, 1);
            studentObject.name = getTableRowNthChild(tValue, 2);
            studentObject.fname = getTableRowNthChild(tValue, 3);
            studentObject.contact = getTableRowNthChild(tValue, 4);
            studentObject.group = getTableRowNthChild(tValue, 5);
            studentObject.address = getTableRowNthChild(tValue, 6);
            studentObject.dob = getTableRowNthChild(tValue, 7);
            studentObject.oMail = getTableRowNthChild(tValue, 8);
            studentObject.pMail = getTableRowNthChild(tValue, 9);
            temp.push(studentObject);
        });
        studentSectionWiseList[sectionNameList[index]] = temp;
    });

    return (studentSectionWiseList)
}

function getTableRowNthChild(currentTableRowData, i) {
    return $(currentTableRowData).children(`:nth-child(${i})`).text().replace(/\s\s+/g, '');
}

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
                if (value[0] !== "__EMPTY" && maxLengthPerRow > index) {
                    // console.log(value);
                    $(tableHeaderRow).append(`
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center">${value[1]}</span>
                            </td>`);
                }
                if (maxLengthPerRow === index + 1) { // adding buttons.
                    console.log("inside ????")
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

function createAddMoreBtn(value) {
    return ` <td colspan="12" class="py-5 text-center">
                     <button type="button" aria-label="add_clos_button_label" class="max-w-2xl rounded-full" id="add-clo-btn" aria-expanded="false" aria-haspopup="true">
                            <img id="addMoreBtn${-value}" class="h-8 w-8 rounded-full" src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" alt="">
                        </button>
            </td>`
}

function sampleNewTableRow() {
    return `<tr>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center">Enter Reg Code</span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center">Enter Name</span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center">Enter Father Name</span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center">Enter ContactNo</span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center">Enter BloodGroup</span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center">Enter DOB</span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center">Enter Address</span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center">Enter Official Mail</span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center">Enter Personal Mail</span>
                            </td>
             <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="false">
                                           <img class="h-10 w-6 cursor-pointer" alt="" src="../../../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" data-std-delete="remove">
                                        </td></tr>`
}

function createPaginationBar(tableID) {
    $("#" + tableID).each(function () {
        let currentPage = 0;
        const numPerPage = 4;
        const $table = $(this);
        $table.bind('repaginate' + tableID, function () {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).fadeIn("fast").animate({}, "linear", function () {
                // $table.fadeIn();
            }).show().removeAttr("style");
            // $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).fadeIn("slow").show();
        });


        $table.trigger('repaginate' + tableID);
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

class Student {
    /* constructor(reg, name, fname, contact, group, address, dob, oMail, pMail) {
         this.sRegNo = reg;
         this.fatherName = fname;
         this.contactNo = contact;
         this.bGroup = group;
         this.offEmail = oMail;
         this.personalEmail = pMail;
         this._reg = reg;
         this._name = name;
         this._fname = fname;
         this._contact = contact;
         this._group = group;
         this._address = address;
         this._dob = dob;
         this._oMail = oMail;
         this._pMail = pMail;
     }*/

    constructor() {
    }

    get reg() {
        return this._reg;
    }

    set reg(value) {
        this._reg = value;
    }

    get name() {
        return this._name;
    }

    set name(value) {
        this._name = value;
    }

    get fname() {
        return this._fname;
    }

    set fname(value) {
        this._fname = value;
    }

    get contact() {
        return this._contact;
    }

    set contact(value) {
        this._contact = value;
    }

    get group() {
        return this._group;
    }

    set group(value) {
        this._group = value;
    }

    get address() {
        return this._address;
    }

    set address(value) {
        this._address = value;
    }

    get dob() {
        return this._dob;
    }

    set dob(value) {
        this._dob = value;
    }

    get oMail() {
        return this._oMail;
    }

    set oMail(value) {
        this._oMail = value;
    }

    get pMail() {
        return this._pMail;
    }

    set pMail(value) {
        this._pMail = value;
    }
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
            console.log("responseText " , responseText)

        }
    });
}

// Redundant /  Tester Function for now..
function idkWorking(work_book, sheet_name) {
    /*var range = XLSX.utils.decode_range(worksheet['!ref']);
range.s.r = 1; // <-- zero-indexed, so setting to 1 will skip row 0
worksheet['!ref'] = XLSX.utils.encode_range(range);*/
    var range = XLSX.utils.decode_range(work_book.Sheets[work_book.SheetNames[0]]['!ref']);
    range.s.c = 3; // 0 == XLSX.utils.decode_col("A")
    range.e.c = 4; // 6 == XLSX.utils.decode_col("G")
    var new_range = XLSX.utils.encode_range(range);
    var excelInJSON = XLSX.utils.sheet_to_html(work_book.Sheets[work_book.SheetNames[0]], {
        blankRows: false,
        defval: '',
        range: new_range
    });
    document.getElementById('generatedTableContainer').innerHTML += excelInJSON;
    // console.log(excelInJSON);
}

function startProgressBarAnimation() {
    $(progressContainer).removeClass("hidden");
    event.loaded = 42;
    event.total = 100;

    let percent = Math.round((100 * event.loaded) / event.total);
    progressPercent.innerText = percent;
    const scaleX = `scaleX(${percent / 100})`;
    bgProgress.style.transform = scaleX;
    progressBar.style.transform = scaleX;
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

