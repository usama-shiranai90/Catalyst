let updateProgramList = [];
let deletedProgramList = [];  // stores the id for deleted rows by saving their ID.

/** Fields for Program Creation */
const programNameInputField = document.getElementById('programNameFieldId');
const programAbbreviationNameInputField = document.getElementById('programAbbreviationNameFieldId');
const createProgramBtn = document.getElementById('createProgramBtnId');

/** Fields for Program Management */
const saveBtn = document.getElementById('saveProgramBtn');

$(document).ready(function () {
    /** Remove error color from selections */
    $('.textField , .select').on('input', function (e) {
        if (this.type === "text" || this.type === "date")
            $(this).parent().removeClass("textField-error-input");
        else if (this.type === "select-one")
            $(this).parent().removeClass("select-error-input");

    });

    $(createProgramBtn).on('click', function (e) {
        e.preventDefault();
        if (!containsEmptyField([programNameInputField, programAbbreviationNameInputField])) {
            e.preventDefault();
        } else {

            $("body").append(successfulMessageNotifier("created successfully", "New Program Has been created successfully."));
            $("#successNotifiedId").toggle("hidden").animate(
                {right: 10}, 60000, function () {
                    $(this).delay(4000).fadeOut().remove();
                });
            $(this).unbind('click').click();
        }
    });

    /** Checks if the program name or program abbreviation contains a numeric value or not. */
    $(programNameInputField).add(programAbbreviationNameInputField).on('focusout', function (e) {
        if (!isCharacterALetter(this.value)) // if it contains a numeric , special character.
            this.parentElement.classList.add("textField-error-input")
    })

    /** setting a prefixed value for program name.. */
    $(programNameInputField).bind({
        keydown: function (e) {
            let prefixedValue = $(this).val();
            let currentField = this;
            setTimeout(function () {
                if (currentField.value.indexOf('Bachelors ') !== 0) {
                    $(currentField).val(prefixedValue);
                }
            }, 1);
        },
        focusout: function (e) {
            // var str = value.toLowerCase().replace(/(^\w{1})|(\s{1}\w{1})/g, match => match.toUpperCase());
            let value = $(e.target).val();
            value = convertIntoAbb(value);
            $(programAbbreviationNameInputField).val(value);
        },
    });

    $(programAbbreviationNameInputField).bind({
        focusout: function (e) {
            let reference = $(e.target).val().charAt(0);
            let value = $(e.target).val();
            if (reference !== 'B') {
                value = 'B' + value.slice(1);
                $(e.target).val(value)
            }
        },
    });


    /** Section for Program Management. */
    $(document).on('click', 'button[id^=performRoleEdit-]', function (e) {
        // updateProgramList = $(this).closest("tr").attr("data-program-state");
        let programStateId = $(this).closest("tr").attr("data-program-state");
        updateProgramList.push(programStateId);

        $(this).closest('tr').removeClass("hover:bg-catalystLight-89").addClass("hover:bg-catalystLight-f1") // change background color when hover for selected Table-Row....
        $(this).closest('tr').children().each(function (index, value) {
            if (index > 0 && index < 3)
                // value.setAttribute("contenteditable", true).addClass("italic");
                $(value).attr("contenteditable", true).addClass("italic")
            else if (index === 3) {
                $(value).find('button[id^="performRoleEdit"]').addClass("hidden");
            }
        });


    });

    let deletionReferenceElement;
    $(document).on('click', 'button[id^=performRoleDeletion-]', function (e) {
        $("body").append(alertConfirmationMessage("Delete Program", "Please reconsider, as the following program name :<br>",
            $(this).closest("tr").children(".f-name-representation").children(":first-child").text(), "", " will be deleted and can effect students belonging to that program "));
        $("main").addClass("blur-filter");
        deletionReferenceElement = this
    });

    $(document).on('click', "#alertDeleteBtnId ,#alertCancelBtnId ", function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();
        $("main").removeClass("blur-filter");
        $("#alertMessageContainer").remove();
        if (this.id === 'alertDeleteBtnId') {
            let id = $(deletionReferenceElement).closest("tr").attr("data-program-state");
            $(deletionReferenceElement).closest('tr').remove();
            deletedProgramList.push(id);
        }
    });

    $(saveBtn).on('click', function (e) {
        e.preventDefault();
        // update program list array .
        updateMyProgramList();
        if (deletedProgramList.length > 0 && Object.entries(updateProgramList).length > 0) {
            callAjaxForProgramDeletion(deletedProgramList);
            callAjaxForProgramModify(updateProgramList);
        } else if (deletedProgramList.length > 0) {
            callAjaxForProgramDeletion(deletedProgramList)
        } else if (updateProgramList.length > 0)
            callAjaxForProgramModify(updateProgramList);

    })

});


function convertIntoAbb(name) {
    return name.split(' ')
        .map((splitText) => {
            let firstLetter = splitText.charAt(0);
            if (firstLetter === splitText.charAt(0).toUpperCase() && !/^(is|am|are|or|in|of)+$/i.test(splitText)) // check if letter is capital.
                return splitText.charAt(0).toUpperCase()
        }).join('');
}

function updateMyProgramList() {
    let tempList = {};
    console.log('updateProgramList : ', updateProgramList)
    console.log('deleteProgramList : ', deletedProgramList)
    if (Object.entries(updateProgramList).length !== 0) {
        $("tbody").children().each(function (tableRowIndex, tableRowValue) { // iterate for tr.
            let currentRowId = $(tableRowValue).attr("data-program-state");
            if (updateProgramList.includes(currentRowId)) {
                let pName, pShortName;
                $(tableRowValue).children().each(function (index, value) {
                    if (index === 1)
                        pName = $(value).first().text().replace(/\s\s+/g, ' ');
                    if (index === 2) {
                        pShortName = $(value).first().text().replace(/\s\s+/g, ' ');
                        tempList[currentRowId] = {programName: pName, shortName: pShortName};
                    }
                });
            }
        });
        updateProgramList = tempList;
    }
}

function callAjaxForProgramDeletion(programList) {
    $.ajax({
        type: "POST",
        url: "manageProgram.php",
        data: {
            deletion: true,
            programList: programList,
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
        },
        success: function (serverResponse, status) {

        },
        complete: function (response) {
            let responseText = JSON.parse(response.responseText)
            console.log("Well : ", responseText);
        }
    });
}


function callAjaxForProgramModify(programObject) {
    $.ajax({
        type: "POST",
        url: "manageProgram.php",
        data: {
            modify: true,
            programObjectList: programObject,
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
        },
        success: function (serverResponse, status) {

        },
        complete: function (response) {
            let responseText = JSON.parse(response.responseText)
            console.log("Well : ", responseText);
        }
    });
}