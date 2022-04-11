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

// Fields
const generatedTableContainer = document.getElementById('generatedTableContainer');

$(document).ready(function () {
    $(browseBtnSpan).on('click', function (event) {
        studentInputExcelField.click();
    })
    $(dropAreaContainer).on('drop', function (e) {
        e.preventDefault();
        const files = e.dataTransfer.files;
        if (files.length === 1) {
            if (files[0].size < maxSizeAllowed) {
                studentInputExcelField.files = files;
                uploadFileProcess();
            } else
                console.log("Max file size is 15MB")
        }
        dropAreaContainer.classList.remove("dragged");
    });

    /** applying animation for dragover when a file is placed and when file is removed from the container. */
    dropAreaContainer.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropAreaContainer.classList.add("dragged");
    });
    dropAreaContainer.addEventListener("dragleave", (e) => {
        dropAreaContainer.classList.remove("dragged");
    });
    // file input change and uploader
    studentInputExcelField.addEventListener("change", () => {
        if (studentInputExcelField.files[0].size > maxSizeAllowed) {
            showToast("Max file size is 15");
            studentInputExcelField.value = ""; // reset the input
            return;
        }
        uploadFileProcess();
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
    };

    /**  */
    $(document).on('click', 'a[id^="importExcelSheetTabID-"]', function (event) {
        const panel = $(this).parent(); //.work-sheet-container
        let selectedID = this.id;
        $(panel).children().each(function (index, value) {
            if (selectedID !== value.id) {
                $(value).removeClass().addClass("sm:px-6 sm:w-auto cursor-pointer inline-flex justify-center items-center py-2 w-1/2  rounded-t border-b-2 text-gray-400 font-semibold tracking-normal leading-none student-profile-header-text my-0\n                     transform transition ease-out duration-300 hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black text-base")
                $(generatedTableContainer).children()[index].classList.add("hidden");
            } else {
                $(value).removeClass().addClass("sm:px-6 sm:w-auto sm:justify-start cursor-pointer inline-flex justify-center\n                   items-center py-2 w-1/2 rounded-t border-b-2 border-indigo-500 text-black\n                   tracking-wide leading-none student-profile-header-text my-0 text-base")
                $(generatedTableContainer).children()[index].classList.remove("hidden");
            }
        });

    });


});

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

/** Sample working of Different Util sheet import design. */
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
            console.log("KEY is : ", key);
            if (key.length > 1 && key === 'FURC')
                $("#importedTableContainer > div > h2").text(studentJsonFormatList[1][key] + " for " + studentJsonFormatList[2][key]);

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
        console.log("table id :", tableID);
        table.setAttribute("id", tableID);
        if (counter !== 1)
            $(table).addClass("hidden");


        let maxLengthPerRow = Object.entries(studentJsonFormatList[3]).length;
        Object.entries(studentJsonFormatList[3]).forEach(function (value, index) {
            if (value[1] !== 'S.No') {
                $(tableHeaderRow).append(`<th class="capitalize px-4 py-3  tracking-wider font-medium text-sm">
                                ${value[1]}
                            </th>`);
            }
            if (maxLengthPerRow === index + 1) { // adding buttons.
                $(tableHeaderRow).append(`
             <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="false"> </td>`);
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
                    $(tableHeaderRow).append(`
             <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                           <img class="h-10 w-6 cursor-pointer" alt="" 
                        src="../../../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" data-std-delete="remove">
                                        </td>`);
                }

            });
        }
        $(table).append(tableBody);
    }
}

function createDifferentSheetWorkSection(sheetList, counter) {
    if (counter !== 1)
        $("#importedTableContainer .db-table-header-topic div").append(` <a id="importExcelSheetTabID-${counter}" class="sm:px-6 sm:w-auto cursor-pointer inline-flex justify-center items-center py-2 w-1/2  rounded-t border-b-2 text-gray-400 font-semibold tracking-normal leading-none student-profile-header-text my-0
                     transform transition ease-out duration-300 hover:scale-100 hover:-translate-y-0 hover:translate-x-0 hover:text-black hover:font-normal hover:border-black text-base">
                            ${sheetList} </a>`);
    else
        $("#importedTableContainer .db-table-header-topic div").append(`  <a id="importExcelSheetTabID-${counter}" class="sm:px-6 sm:w-auto sm:justify-start cursor-pointer inline-flex justify-center
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

function idkWorking(work_book, sheet_name) {
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
    console.log(excelInJSON);
}

/*var range = XLSX.utils.decode_range(worksheet['!ref']);
range.s.r = 1; // <-- zero-indexed, so setting to 1 will skip row 0
worksheet['!ref'] = XLSX.utils.encode_range(range);*/