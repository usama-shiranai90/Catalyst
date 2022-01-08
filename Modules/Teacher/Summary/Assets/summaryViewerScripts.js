let statusEnabled; // tells whether the status field is being shown or not



function setCLOsInDropdown(idOfElement, listOfCLOs) {

    for (let i = 0; i < listOfCLOs.length; i++) {
        document.getElementById(idOfElement).innerHTML +=
            "<option value='" + listOfCLOs[i] + "'>" + listOfCLOs[i] + "</option>"
    }
}

function createTableHeader(listOfCLOs) {
    let svTableHeader = document.getElementById("teacherSVStudentListTableHeaderID");

    svTableHeader.innerHTML = "<th>" + "Registration Number" + "</th>" + "<th>" + "Name" + "</th>" + "</th>"
    if (Array.isArray(listOfCLOs)) {
        for (let i = 0; i < listOfCLOs.length; i++) {
            svTableHeader.innerHTML += "<th>" + listOfCLOs[i] + "</th>"
        }
    } else {
        svTableHeader.innerHTML += "<th>" + listOfCLOs + "</th>"
    }
    if (statusEnabled)
        svTableHeader.innerHTML += "<th> Status </th>"
}

function checkEmptyFilters() {
    let errors = false;
    //selects all the select boxes which are not disabled, check if they empty or not, then shows errors accordingly
    $('select:not(:disabled)').each(function () {
        if ($(this).val() == "") {
            $(this).closest('div').addClass('select-error-input')
            errors = true;
        }
    });
    return errors;
}

//Create rows in the table
function createTableRows(selectedCLO, status) {
    let data;
    $.ajax({
        type: "POST",
        url: 'Assets/summaryViewerAJAX.php',
        data: {listOfCLOs: selectedCLO, status: status},
        success: function (result) {
            data = JSON.parse(result)
            if (Array.isArray(data)) {
                let numberOfStudents = data[0]
                let studentRegistrationNumbers = data[1]
                let studentNames = data[2]
                let listOfCLOMarks = data[3]
                let rowID = ""
                let studentRegNoLabelID = ""
                let teacherSVStudentListTableBody = document.getElementById('teacherSVStudentListTableBodyID');
                teacherSVStudentListTableBody.innerHTML = ""

                //Vertical iteration
                for (let i = 0; i < numberOfStudents; i++) {
                    rowID = "teacherSVStudentListRowID" + (i + 1);
                    studentRegNoLabelID = "teacherQuizListRegNo" + (i + 1);

                    teacherSVStudentListTableBody.innerHTML +=
                        "<tr id='" + rowID + "' class='h-20 border-b border-gray-300 border-opacity-100 text-center'>"
                        + "<td>"
                        + "<label id='" + studentRegNoLabelID + "'>" + studentRegistrationNumbers[i] + "</label>"
                        + "</td>"
                        + "<td>"
                        + "<label>" + studentNames[i] + "</label>"
                        + "</td>";

                    getMarksAndStatusInaRow(rowID, listOfCLOMarks[i], status) + "</tr>";
                }
            }
        }
    });


}

//Shows marks in each row in other words, fills the rows
function getMarksAndStatusInaRow(rowID, CLOMarksOfStudent, status) {
    let row = document.getElementById(rowID);

    let statusColorClass;
    if (status == "Pass")
        statusColorClass = "text-green-500"
    else
        statusColorClass = "text-red-600"


    if (!Array.isArray(CLOMarksOfStudent)) {
        row.innerHTML += "<td class='mt-3 mb-2'>"
            + CLOMarksOfStudent + "/100"
            + "</td>"
            + "<td class='mt-3 mb-2'>"
            + status + "</td>"
    } else {
        //Horizontal Iteration
        for (let i = 0; i < CLOMarksOfStudent.length; i++) {
            row.innerHTML += "<td class='mt-3 mb-2'>"
                + CLOMarksOfStudent[i]
                + "</td>"
        }
        if (statusEnabled)
            row.innerHTML += "<td class='mt-3 mb-2 font-bold " + statusColorClass + "'>" + status + "</td>"
    }
}


window.onload = function () {


    $(document).ready(function () {

        //Remove Error when a value is selected in te dropdown
        $("select").change(function (event) {
            $(this).closest('div').removeClass('select-error-input')
        })

        $("#teacherSVCLODropdownID").change(function (event) {
            if ($(this).val() == "All") {
                $("#teacherSVStatusDropdownID").attr('disabled', true)
                $("#teacherSVStatusDropdownID").closest('div').removeClass('select-error-input')
                statusEnabled = false
            } else {
                $("#teacherSVStatusDropdownID").attr('disabled', false)
                statusEnabled = true
            }
        })


    })
}
