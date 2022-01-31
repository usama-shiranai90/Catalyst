let teacherFinalExamContainer = document.getElementById("teacherFinalExamContainerID")

function createFinalExam(numberOfFinalExam, finalExamTitle, finalExamID, numberOfQuestionsInFinalExam, finalExamCLOList) {
    if(numberOfFinalExam == 1){
        teacherFinalExamContainer.innerHTML +=
            "<div class='w-1/3 pl-10 pr-10 pt-5 pb-5 cursor-pointer'>\n" +
            "\n" +
            "                    <div name='finalExamBox' id='teacherFinalExamDivID' class='bg-gradient-to-b from-white to-blue-200 p-1.5 rounded-2xl text-gray-500'>\n" +
            "                        <div class='flex justify-end'>\n" +
            "\n" +
            "                            <img id='editTeacherFinalExamIconID' name='editFinalExam' class='mt-0.5' src='../../../../Assets/Images/vectorFiles/Icons/editIcon.svg'>\n" +
            "                            <img id='deleteTeacherFinalExamIconID' name='deleteFinalExam' class='mt-0.5' src='../../../../Assets/Images/vectorFiles/Icons/crossIcon.svg'>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class='text-center cursor-pointer'>\n" +
            "                            <label name='finalExamLabel' id='finalExamLabelID' class='block text-lg text-gray-900 font-bold'>Final Exam</label>\n" +
            "                            <label name='finalExamID' class='hidden'>" + finalExamID + "</label>\n" +
            "                            <label class='block text-base font-bold'>" + finalExamTitle + "</label>\n" +
            "                            <div class='flex justify-center cursor-pointer'>\n" +
            "                                <div id='finalExamQuestionsInsideBox' class='w-3/6'>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <hr class='w-full text-blue-900'>\n" +
            "                        <div class='text-center font-bold'>\n" +
            "                            <label>Weightage:</label>\n" +
            "                            <label>50</label>\n" +
            "                        </div>\n" +
            "                    </div>\n" +
            "\n" +
            "                </div>\n"

        for (let j = 0; j < 3; j++) {
            if (j < numberOfQuestionsInFinalExam) {
                document.getElementById("finalExamQuestionsInsideBox").innerHTML +=
                    "<div class='flex justify-between cursor-pointer'>\n" +
                    "<label>Question " + (j + 1) + "</label>\n" +
                    "<label>" + finalExamCLOList[j] + "</label>\n" +
                    "</div>\n"

            } else {
                document.getElementById("finalExamQuestionsInsideBox").innerHTML +=
                    "<div class='flex justify-between cursor-pointer invisible'>\n" +
                    "<label>Question " + (j + 1) + "</label>\n" +
                    "<label>CLO 1</label>\n" +
                    "</div>\n"
            }
        }

    }
}

function toggleDeleteConfirmDialogue() {
    let deleteConfirmDialogueBox = document.getElementById("deleteConfirmDialogueBoxID")
    let teacherFinalExamDashboard = document.getElementById("teacherFinalExamDashboardID")
    if (deleteConfirmDialogueBox.classList.contains("hidden")) {
        deleteConfirmDialogueBox.classList.remove("hidden")
    } else {
        deleteConfirmDialogueBox.classList.add("hidden")
    }

    if (teacherFinalExamDashboard.classList.contains("blurBackground")) {
        teacherFinalExamDashboard.classList.remove("blurBackground")
    } else {
        teacherFinalExamDashboard.classList.add("blurBackground")
    }

}
