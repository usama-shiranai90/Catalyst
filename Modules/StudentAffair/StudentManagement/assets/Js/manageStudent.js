let updateStudentRecordList = [];
let updateStudentTargetKList = [];
let deleteStudentRecordList = [];
let newlyAddedStudentRecordList = [];

/** Fields list.  */
const departmentField = document.getElementById('viewStudentDepartmentSelectId');
const programField = document.getElementById('viewStudentProgramSelectId');
// const seasonField = document.getElementById('viewStudentSeasonSelectId');
const batchField = document.getElementById('viewStudentBatchSelectId');
const sectionField = document.getElementById('viewStudentSectionSelectId');

const showStudentLoadedContainer = document.getElementById('showStudentLoaded');

const updateStudentRecordBtn = document.getElementById('updateStudentRecordBtn');

$(document).ready(function () {

    /** Department Field */
    $(departmentField).on('change', function (e) {
        const departmentFieldValue = this.value;
        if (departmentFieldValue.length != 0 && (programList !== null)) {
            let optionsList = createOptionsListForProgramField(departmentFieldValue, programList)

            $(programField).children().slice(1).remove();
            $(batchField).children().slice(1).remove();
            $(sectionField).children().slice(1).remove();
            $(programField).append(optionsList);
        }
    });

    /** program Field */
    $(programField).on('change', function (e) {
        let selectedSelection = this;
        if (selectedSelection.value.length != 0 && (programList !== null && batchList != null) &&
            (departmentField.value.length != 0 && programField.value.length != 0)) {
            let optionsList = '';
            for (let i = 0; i < batchList.length; i++) {
                console.log(programField.value  ,  batchList[i].programCode)
                if (programField.value == batchList[i].programCode) {
                    optionsList += `<option value="${batchList[i].batchCode}">${batchList[i].batchName}</option>`;
                }
            }
            $(batchField).children().slice(1).remove();
            $(sectionField).children().slice(1).remove();
            $(batchField).append(optionsList);
        }
    });

    /** batch Field */
    $(batchField).on('change', function (e) {
        if (containsEmptyField([departmentField, programField, batchField])) {
            let sectionList = callAjaxForSectionDropDown(batchField.value)
            // console.log(sectionList)
            if (sectionList[0] !== 0) {
                let selectedSelection = this;
                if (!(selectedSelection.value.length != 0 && (programList != null && batchList != null) &&
                    (departmentField.value.length != 0 && programField.value.length != 0 && batchField.value.length != 0))) {
                    return;
                }
                let optionsList = '';
                for (const item of sectionList) {
                    optionsList += `<option value="${item.sectionCode}">${item.sectionName}</option>`;
                }
                $(sectionField).children().slice(1).remove();
                $(sectionField).append(optionsList);
            }
        }
    });

    /** section Field */
    $(sectionField).on('change', function (e) {
        if (containsEmptyField([departmentField, programField, batchField, sectionField])) {
            callAjaxForTableUpdation()
        }
    });

    $(document).on('click', 'img[id="addMoreBtn-1"]', function (e) {
        let unqStdReg = -1;
        $('tbody').children(':last-child').each(function () {
            const findElement = $(this).find(':first-child')[0];
            let innerText;
            let lastThreeDigit;
            if (findElement === undefined)
                return
            else {
                innerText = findElement.innerText.replace(/\s\s+/g, '');
                lastThreeDigit = ('000' + (parseInt(innerText.match("(.{3})\s*$", "i")[0]) + 1)).slice(-3);
                unqStdReg = innerText.slice(0, -3) + lastThreeDigit;
            }
        });
        addStudentTableRecord(this, unqStdReg, true);
    });

    // delete record for newly inserted record.
    $(document).on('click', 'img[data-std-delete="remove"]', function (e) {
        e.stopPropagation();
        $(this).closest("tr").remove();
    });

    // delete for data based.
    let deletionReferenceElement;
    $(document).on('click', 'button[data-std-remove="remove"]', function (e) {
        e.stopPropagation();
        deletionReferenceElement = this
        $("body").append(alertConfirmationMessage("Delete Program", "The Following Student :<br>",
            $(this).closest("tr").children(".f-name-representation").children(":first-child").text(), "STUDENT-NAME", " will be deleted and can not be recovered!"));
        $("main").addClass("blur-filter");
    });

    $(document).on('click', "#alertDeleteBtnId ,#alertCancelBtnId ", function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();
        $("main").removeClass("blur-filter");
        $("#alertMessageContainer").remove();
        if (this.id === 'alertDeleteBtnId') {
            let extraID = $(deletionReferenceElement).closest("tr").attr("data-record-target");
            let id = $(deletionReferenceElement).closest("tr").children(":first").text().replace(/\s\s+/g, '');
            deleteStudentRecordList.push(id);
            $(deletionReferenceElement).closest('tr').remove();
        }
    });


    $(document).on('click', 'button[data-std-edit="remove"]', function (e) {
        $(this).addClass("hidden");
        updateStudentTargetKList.push($(this).closest("tr").children(":first").text().replace(/\s\s+/g, ''));
        updateStudentRecordList.push($(this).closest("tr").attr('data-record-target'));

        $(this).closest('tr').removeClass("hover:bg-catalystLight-89").addClass("hover:bg-catalystLight-f1");
        let size = $(this).closest('tr').children().length;
        $(this).closest('tr').children().each(function (index, value) {
            if (index > 0 && index < size - 1)
                $(value).attr("contenteditable", true).addClass("italic")
        });
    });

    $(document).on('input', 'tr > td', function (e) {
        $(this).removeClass('bg-red-300 text-white');
    });


    $(updateStudentRecordBtn).on('click', function (e) {
        newlyAddedStudentRecordList = Object.values(passIntoStudentList(null, null, false, 1));
        // updateStudentRecordList = Object.entries(passIntoStudentList(null, null, false, 2, updateStudentRecordList , updateStudentTargetKList));
        updateStudentRecordList = (passIntoStudentList(null, null, false, 2, updateStudentRecordList, updateStudentTargetKList));

        if (newlyAddedStudentRecordList.length === 0 && deleteStudentRecordList.length === 0 && Object.values(updateStudentRecordList).length === 0) {
            $('body').append(popupErrorNotifier("Nothing To Update", "Please provide some addition information or perform some sort of action."));
            $("#errorMessageDiv").toggle("hidden").animate(
                {right: 0,}, 5000, function () {
                    $(this).delay(1000).fadeOut().remove();
                });
        } else {
            let programName = $("#viewStudentProgramSelectId option:selected").text().replace(/\s\s+/g, '');
            let sectionCode = sectionField.value
            callAjaxForManipulation(programName, sectionCode);
        }

    })
});


function refreshTableContentStudent(studentRecord) {

    /** Top Section Data */
    let programName = $("#viewStudentProgramSelectId :selected").text();
    let batchName = $("#viewStudentBatchSelectId :selected").text();
    let sectionName = $("#viewStudentSectionSelectId :selected").text();

    $("#uploadedTableContainer > div > div > h2").text(programName + "  " + batchName + " for " + sectionName);

    /** Header Content */
    const table = document.createElement('table');
    $(table).addClass("border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative rounded");
    const tableHeader = document.createElement('thead');
    table.append(tableHeader);
    let tableHeaderRow = document.createElement('tr');
    $(tableHeaderRow).addClass("text-center bg-catalystLight-f5");
    tableHeader.append(tableHeaderRow);
    let tableID = "student-table-" + 1;
    table.setAttribute("id", tableID);

    // console.log("for table header file :")
    let maxLengthPerRow = Object.entries(studentRecord[0]).length - 2;
    Object.entries(studentRecord[0]).forEach(function (value, index) {
        // console.log(index, value)
        if (index < 9) {
            $(tableHeaderRow).append(`<th class="capitalize px-4 py-3  tracking-wider font-medium text-sm">
                                ${value[0]}
                            </th>`);
        }

        // for edit section.
        if (maxLengthPerRow === index + 1) {
            $(tableHeaderRow).append(`
             <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs"> </td>`);
        }

    });
    $(showStudentLoadedContainer).children().slice(0).remove();
    $(showStudentLoadedContainer).append(table);

    /** Data Set Content */
    const tableBody = document.createElement('tbody');
    for (let row = 0; row < studentRecord.length; row++) {
        let tableHeaderRow = document.createElement('tr');
        $(tableHeaderRow).addClass("cursor-default text-sm tracking-tight transition-all transform hover:bg-catalystLight-89 accordion-toggle collapsed");
        $(tableHeaderRow).attr("data-record-target", "#student-record-" + (row + 1))

        tableBody.append(tableHeaderRow);
        let maxLengthPerRow = Object.entries(studentRecord[row]).length - 2;

        Object.entries(studentRecord[row]).forEach(function (value, index) {
            if (index < 9) {
                let relatedEvent = getRelatedKeyDownForTabularRow(index);
                relatedEvent = (relatedEvent === undefined ? '' : relatedEvent)
                if (maxLengthPerRow > index) {
                    $(tableHeaderRow).append(`
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" ${relatedEvent} contenteditable="false">
                                <span class="text-gray-700 flex justify-center items-center" >${value[1]}</span>
                            </td>`);
                }
                if (maxLengthPerRow === index + 1) // adding buttons.
                    $(tableHeaderRow).append(`<td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="false">
                        <div class="flex items-center justify-center gap-3">
                                 <button type="button" data-std-edit="remove">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500 hover:text-blue-600 cursor-pointer transform hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                                </button>
                                 <button type="button" data-std-remove="remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500 hover:text-red-600 cursor-pointer transform hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                                        </td>`);
            }
            /**
             *  Commented code for extra table row for authentication and password.
             * */
            /* else if (index === 9) {
                // for creating extra table row to show info regarding password and authentication
                $(tableBody).append(`<tr> <td colspan="10" class=" py-5 text-center" id="student-record-${(row + 1)}" >
                             <div class="textField-label-content">
                            <input class="textField" type="text" placeholder=" " id="rollNo" name="rollNo" value="${studentRecord[row].password}">
                            <label class="textField-label">Student Password</label>
                            </div>
                           
                            <div class="textField-label-content">
                            <input class="textField" type="text" placeholder=" " id="rollNo" name="rollNo" value="${studentRecord[row].authCode}">
                            <label class="textField-label">Authentication Code</label>
                            </div>
                    </td></tr>`);
            }*/
        });
    }
    $(table).append(tableBody);
    $(table).append(createAddMoreBtn(1));

    $(updateStudentRecordBtn).removeClass("hidden")

    /** pagination Design */
    createPaginationBar(tableID);
}


function callAjaxForSectionDropDown(batchCode) {
    let returnValue;
    $.ajax({
        type: "POST",
        async: false,
        url: "manageStudentView.php",
        data: {
            fetchSections: true,
            batchCode: batchCode
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
        }
    });
    return returnValue;
}

function callAjaxForTableUpdation() {
    $.ajax({
        type: "POST",
        async: false,
        url: "assets/Operation/ManageStudentAjax.php",
        data: {
            refreshTable: true,
            sectionCode: sectionField.value
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
        },
        success: function (serverResponse, status) {
            let returnValue = JSON.parse(serverResponse);
        },
        complete: function (response) {
            let responseText = JSON.parse(response.responseText)
            if (responseText.status !== -1 || responseText.status !== 0) {
                let studentRecord = responseText.message;
                console.log(Object.keys(studentRecord[0]))
                refreshTableContentStudent(studentRecord)
            }
        }
    });


}


function callAjaxForManipulation(programName, sectionCode) {
    console.log(newlyAddedStudentRecordList)
    console.log(Object.entries(updateStudentRecordList))
    console.log(deleteStudentRecordList)

    $.ajax({
        type: "POST",
        async: false,
        url: "assets/Operation/ManageStudentAjax.php",
        data: {
            manipulateData: true,
            hasDeletion: true,
            hasAddition: true,
            hasModification: true,
            newStudentList: newlyAddedStudentRecordList,
            updateStudentList: Object.entries(updateStudentRecordList),
            deleteStudentList: deleteStudentRecordList,
            sectionCode: sectionCode,
            programName: programName,
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
        },
        success: function (serverResponse, status) {
            let returnValue = JSON.parse(serverResponse);
        },
        complete: function (response) {
            let responseText = JSON.parse(response.responseText)
            console.log("MY STATUS :", responseText);

            switch (responseText.status) {
                case 200:
                    // apply animation and reload the page.
                    console.log("successful");
                    break;

                case 207:
                    // Warning message as few records are unable to CRUD.
                    loadAlertMessage(responseText)
                    break;
                case 501:
                    // Warning message as few records are unable to CRUD.
                    loadAlertMessage(responseText)
                    break;
            }
        }
    });

}

function loadAlertMessage(responseText, timerS = 5000, timerE = 3000) {
    let duplicateList = responseText.message;
    console.log(duplicateList);

    if (responseText.status === 207)
        $('body').append(popupErrorNotifier("Alert " + responseText.errors, responseText.message));
    else if (responseText.status === 501)
        $('body').append(popupErrorNotifier("Duplication Founded", "The Following List Of Students already exist for different sections.<br>" + Object.values(duplicateList)));

    $("#errorMessageDiv").toggle("hidden").animate(
        {right: 0,}, timerS, function () {
            $(this).delay(timerE).fadeOut().remove();
        });
}


