window.onload = function (e) {
    const selectSessionalTab = document.querySelector(".py-0.assessment-type-bg");
    const sessionalAllAssessmentTable = document.getElementById("sessionalTableDivID");
    const courseSessionalInfoDiv = document.getElementById("courseSessionalInfoDivID");
    const studentListTable = document.getElementById('studentTableID'); // bottom left side student table list.
    const selectStudentAssessmentTable = document.getElementById('selectedStudentTableInfoID'); // right side student assessment table list.

    let v;
    fetchSessionalInfo(currentSectionAssessments, courseSessionalInfoDiv);  // for creating all assignment quiz and project box .

    document.querySelectorAll("span.h-10.py-2").forEach((value, key) => {

        // request ajax for current selected assessment list for all students.
        value.addEventListener("click", event => {
            let studentTableBody = document.getElementById('studentTableBodyID');
            studentTableBody.innerHTML = '';
            $.ajax({
                type: "POST",
                url: 'progressAjax.php',
                data: {
                    assessmentType: value.id,
                },
                success: function (studentList) {
                    let allStudents = JSON.parse(studentList)
                    if (Array.isArray(allStudents)) {
                        let studentRegNo = allStudents[0]
                        let description = allStudents[1]
                        let total = allStudents[2]
                        let studentAchievement = allStudents[3]
                        let rowID = ""

                        for (let i = 0; i < studentRegNo.length; i++) {
                            rowID = "studentRow-" + (i + 1);
                            let tableRow = document.createElement('tr');
                            tableRow.setAttribute("class","text-center hover:bg-catalystLight-e3 text-sm font-base tracking-tight");
                            tableRow.setAttribute("id", rowID);
                            for (let j = 0; j < 5; j++) {
                                let td = document.createElement('td');
                                td.setAttribute("class" , "px-1 py-1") // py-3
                                switch (j) {
                                    case 0:
                                        td.innerText = studentRegNo[i];
                                        break;
                                    case 1:
                                        td.innerText = description;
                                        break;
                                    case 2:
                                        td.innerText = total;
                                        break;
                                    case 3:
                                        td.innerText = studentAchievement["obtain"][i];
                                        break;

                                    case 4:
                                        td.innerText = studentAchievement["achieved"][i];
                                        break;

                                }
                                tableRow.appendChild(td)
                            }
                            studentTableBody.appendChild(tableRow);
                        }

                        // where to add this shit to return value ?
                        document.querySelectorAll("tr.text-center.text-sm.font-base").forEach((v, k, p) => {
                            v.addEventListener("click", evt => {
                                selectStudentAssessmentTable.classList.remove("hidden");
                            });
                        });

                    }
                }
            });

            if (!selectStudentAssessmentTable.classList.contains("hidden"))
                selectStudentAssessmentTable.classList.add("hidden");
            studentListTable.classList.remove("hidden");

        });
    });



    $(document).ready(function (e) {

        $(selectSessionalTab).on('click', function () {
            const act = $(sessionalAllAssessmentTable).hasClass("hidden");
            $(sessionalAllAssessmentTable).toggle("hidden").animate({right: 0,}, "slow", changeArrowPosition());
            function changeArrowPosition() {
                if (act)
                    selectSessionalTab.firstElementChild.lastElementChild.setAttribute("src", "../../../Assets/Images/bottom-arrow.svg");
                else{
                    selectSessionalTab.firstElementChild.lastElementChild.setAttribute("src", "../../../Assets/Images/left-arrow.svg");
                    studentListTable.classList.add("hidden");
                    selectStudentAssessmentTable.classList.add("hidden");
                }
                $(sessionalAllAssessmentTable).toggleClass("hidden");
                return "";
            }
        });

    });
}


function fetchSessionalInfo(totalAssessmentObject, courseSessionalInfo_Parent) {
    const size = Object.values(totalAssessmentObject).length;
    for (let i = 0; i < size; i++) {
        courseSessionalInfo_Parent.innerHTML += `<span id="${Object.keys(totalAssessmentObject)[i]}" class="h-10 py-2 font-medium text-gray-700 border
        hover:bg-catalystBlue-l6 transition duration-500 ease-in-out hover:border-transparent">${Object.values(totalAssessmentObject)[i]}</span>`
    }

}
