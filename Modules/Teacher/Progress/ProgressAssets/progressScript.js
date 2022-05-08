let selectedAssessmentValue = '';
let averageScorePercent = 0;

let totalMarks = 0;
window.onload = function (e) {

    const selectSessionalTab = document.querySelector(".py-0.assessment-type-bg"); // Container of Sessional/ Mid-Term / Final-Term.
    const sessionalAllAssessmentTable = document.getElementById("sessionalTableDivID"); // Sub Assessment Type Container.
    const courseSessionalInfoDiv = document.getElementById("courseSessionalInfoDivID"); // assessment Table.
    const studentListTable = document.getElementById('studentTableID'); // bottom left side student table list.

    const assessmentTypeHeaderTable = document.getElementById('assessmentTypeHeaderID'); // right side student assessment table list header.
    const selectStudentAssessmentTable = document.getElementById('selectedStudentTableInfoID'); // right side student assessment table list.
    const selectedStudentAssessmentBodyTable = document.getElementById('studentSelectedAssessmentBodyID'); // right side student assessment table list body.

    $(document).ready(function (e) {
        $(selectSessionalTab).on('click', function () {
            const act = $(sessionalAllAssessmentTable).hasClass("hidden");
            $(sessionalAllAssessmentTable).toggle("hidden").animate({right: 0,}, "slow", changeArrowPosition());

            function changeArrowPosition() {
                if (act)
                    selectSessionalTab.firstElementChild.lastElementChild.setAttribute("src", "../../../Assets/Images/bottom-arrow.svg");
                else {
                    selectSessionalTab.firstElementChild.lastElementChild.setAttribute("src", "../../../Assets/Images/left-arrow.svg");
                    studentListTable.classList.add("hidden");
                    selectStudentAssessmentTable.classList.add("hidden");
                }
                $(sessionalAllAssessmentTable).toggleClass("hidden");
                return "";
            }
        });

        fetchSessionalInfo(sessionalAssessmentsArray, courseSessionalInfoDiv);  // for creating all assignment quiz and project box .

        document.querySelectorAll("div.transition.transform.relative span , div.py-0.assessment-type-bg.mx-0").forEach((value, key) => { //   span.h-10.py-2

            // request ajax for current selected (sessional) assessment list for all students.

            $(value).on('click', function (e) {
                let settingID;
                if (!isNum(value.id)) {
                    if (value.id === 'spmiddivID')
                        settingID = Object.keys(midAssessmentsArray)[0];
                    else if (value.id === 'spfinaldivID')
                        settingID = Object.keys(finalAssessmentsArray)[0];
                } else
                    settingID = value.id;

                selectedAssessmentValue = value.innerText;
                let studentTableBody = document.getElementById('studentTableBodyID'); // Bottom left side selected user assessment.
                studentTableBody.innerHTML = '';
                $(studentTableBody).css({display: 'none'});

                callAjaxForUserAssessment(settingID , studentTableBody);

                if (!selectStudentAssessmentTable.classList.contains("hidden"))
                    selectStudentAssessmentTable.classList.add("hidden");
                studentListTable.classList.remove("hidden");

            })


        });
    });

    function callAjaxForUserAssessment(settingID, studentTableBody) {
        $.ajax({
            type: "POST",
            url: 'progressAjax.php',
            cache: false,
            timeout:700,
            data: {
                assessmentTypeID: settingID,
                summaryReport: true
            },
            success: function (studentsList) {
                const studentsArray = JSON.parse(studentsList)
                console.log("Data set is :", studentsArray)
                if (Array.isArray(studentsArray)) {
                    let rowID = "";
                    for (let i = 0; i < studentsArray.length; i++) {
                        rowID = studentsArray[i]['regNumber'];
                        let tableRow = document.createElement('tr');
                        tableRow.setAttribute("class", "text-center hover:bg-catalystLight-e3 text-sm font-base tracking-tight");
                        tableRow.setAttribute("id", rowID);
                        tableRow.setAttribute("data-assessment", value.id);

                        Object.values(studentsArray[i]).forEach((studentIndexRecord, index) => {

                            console.log(studentIndexRecord, index)

                            let td = document.createElement('td');
                            td.setAttribute("class", "px-1 py-3 w-full") // py-3
                            switch (index) {
                                case 0:
                                    td.innerText = studentIndexRecord.toString();
                                    break;
                                case 1:
                                    td.innerText = studentIndexRecord.toString();
                                    break;
                                case 3:
                                    td.innerText = studentIndexRecord.toString();
                                    averageScorePercent = parseInt(studentIndexRecord.toString());
                                    break;
                                case 2:
                                    td.innerText = studentIndexRecord.toString()
                                    totalMarks = parseInt(studentIndexRecord.toString())
                                    break;
                                case 4:
                                    averageScorePercent = (averageScorePercent / totalMarks * 100).toFixed(2);
                                    tableAverageMarksColor(td, averageScorePercent);
                                    td.innerText = averageScorePercent + " %";
                                    break;
                            }
                            tableRow.appendChild(td)
                        });
                        studentTableBody.appendChild(tableRow);
                    }

                    $(studentTableBody).animate({right: 0}, "slow").css({display: 'table-row-group'}).slideDown();

                    document.querySelectorAll("tr.text-center.text-sm.font-base").forEach((v, k, p) => {
                        v.addEventListener("click", evt => {
                            selectStudentAssessmentTable.classList.remove("hidden");
                            const getRowID = v.id;
                            let studentAssessmentRecord = studentsArray.find(o => o['regNumber'] === getRowID);

                            setAssessmentRecordIntoTable(studentAssessmentRecord['assessmentQuestions'], selectStudentAssessmentTable
                                , assessmentTypeHeaderTable, selectedStudentAssessmentBodyTable);
                        });
                    });
                }
            }
        });
    }

}


function setAssessmentRecordIntoTable(studentAssessmentRecord, table, tableHeader, tableBody) {

    let tempStore = '';
    tableHeader.innerText = selectedAssessmentValue;
    $('#extQuestionDivisionTableBottom').empty().html(`<h2 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1 uppercase">Question Division</h2>
                                <a class="transition duration-500 transform text-indigo-500 self-end hover:font-extrabold hover:text-indigo-700 hover:underline hover:-translate-x-1/4">Learn More</a>`);
    $(tableBody).html("");

    studentAssessmentRecord.forEach((value, index) => {
            // console.log("the reference contains the following : ", value, index)

            let tableRow = document.createElement('tr');
            tableRow.setAttribute("class", "text-center hover:bg-catalystLight-e3 text-sm font-base tracking-tight");
            Object.values(value).forEach((v, i) => {
                if (i !== 0 && i !== 2) {
                    let td = document.createElement('td');
                    td.setAttribute("class", "px-4 py-3") // py-3
                    switch (i) {
                        case 1:
                            td.innerText = v;
                            tempStore = v;
                            break;
                        case 3:
                            td.innerText = v;
                            break;

                        case 4:
                            td.innerText = v;
                            break;

                        case 5:
                            td.innerText = v;
                            tableAverageMarksColor(td, v);
                            break;

                        case 6:
                            td.innerText = v;
                            break;
                    }
                    tableRow.appendChild(td)
                } else if (i === 2) {
                    $('#extQuestionDivisionTableBottom h2:first-child').after(questionDivision(tempStore, v));
                }
            });
            tableBody.appendChild(tableRow);
        }
    );
}

function questionDivision(questionNumber, questionDescription) {
    return `<p class="title-font text-base font-medium text-gray-900 mb-3">${questionNumber} :
                                    <span class="text-sm text-center font-normal leading-relaxed mb-3">${questionDescription}</span>
                                </p>`
}

function tableAverageMarksColor(tableData, averageScorePercent) {
    // averageScorePercent = String(averageScorePercent).replace( /^\D+/g, '');
    averageScorePercent = String(averageScorePercent).replace(' %', '');

    // console.log("changed numeric value is " , averageScorePercent )
    if (averageScorePercent < 50) {
        tableData.classList.add('font-medium', 'text-red-700');
    } else if (averageScorePercent > 50 && averageScorePercent < 79) {
        tableData.classList.add('font-medium', 'text-blue-500');
    } else if (averageScorePercent > 79) {
        tableData.classList.add('font-medium', 'text-green-500');
    }
}

function fetchSessionalInfo(totalAssessmentObject, courseSessionalInfo_Parent) {
    const size = Object.values(totalAssessmentObject).length;

    for (let i = 1; i <= size; i++) {
        let z_index = "";
        if (i % 4 === 1)
            z_index = "z-0";
        else if (i % 4 === 2)
            z_index = "z-10";
        else if (i % 4 === 3)
            z_index = "z-20";
        else
            z_index = "z-50";

        courseSessionalInfo_Parent.innerHTML += `<div class = "min-h-full min-w-full h-10 py-2 font-medium text-gray-700 border
                         hover:bg-catalystBlue-l6 transition duration-500 ease-in-out hover:border-transparent">
                    <div class="transition ${z_index} duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110
                                                    hover:text-indigo-700 hover:underline hover:text-base
                                                   focus:outline-none focus:ring-gray-300 relative "   onmouseover="showTooltip(${i})" onfocus="showTooltip(${i})" onmouseout="hideTooltip(${i})">
                                        <!-- tool-tip description section. -->
                                        <div id="tooltip${i}" role="tooltip" class="z-10 hidden w-64 fixed transition duration-150 ease-in-out top-3/4 right-2/3 ml-8 shadow-lg bg-white p-4 rounded">
                                            <p class="text-lg font-bold text-gray-800 pb-1">${Object.values(totalAssessmentObject)[i - 1][1]}</p>
                                            <p class="text-xs font-semibold leading-4 text-gray-600 pb-3">${Object.values(totalAssessmentObject)[i - 1][2]}</p>
                                               <p class="text-sm font-bold leading-4 text-gray-600 pb-3">Total Marks:
                                                <span class="text-xs font-normal mr-2 cursor-pointer">${Object.values(totalAssessmentObject)[i - 1][3]}</span>
                                               </p>
                                        </div>
                                 <span id="${Object.keys(totalAssessmentObject)[i - 1]}" class="z-0">${Object.values(totalAssessmentObject)[i - 1][0]}
                                    </div>
                         </span>
                    </div>`

        /*        courseSessionalInfo_Parent.innerHTML += `<span id="${Object.keys(totalAssessmentObject)[i]}" class="h-10 py-2 font-medium text-gray-700 border
                hover:bg-catalystBlue-l6 transition duration-500 ease-in-out hover:border-transparent">${Object.values(totalAssessmentObject)[i]}</span>`*/

    }
}