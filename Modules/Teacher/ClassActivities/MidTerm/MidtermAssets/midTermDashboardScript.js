let teacherMidtermContainer = document.getElementById("teacherMidtermContainerID")

function createMidterm(numberOfMidterm, midtermTitle, midtermID, numberOfQuestionsInMidterm, midtermCLOList) {
if(numberOfMidterm == 1){
    teacherMidtermContainer.innerHTML +=
        "<div class='w-1/3 pl-10 pr-10 pt-5 pb-5 cursor-pointer'>\n" +
        "\n" +
        "                    <div name='midtermBox' id='teacherMidtermDivID' class='bg-gradient-to-b from-white to-blue-200 p-1.5 rounded-2xl text-gray-500'>\n" +
        "                        <div class='flex justify-end'>\n" +
        "\n" +
        "                            <img id='editTeacherMidtermIconID' name='editMidterm' class='mt-0.5' src='../../../../Assets/Images/vectorFiles/Icons/editIcon.svg'>\n" +
        "                            <img id='deleteTeacherMidtermIconID' name='deleteMidterm' class='mt-0.5' src='../../../../Assets/Images/vectorFiles/Icons/crossIcon.svg'>\n" +
        "                        </div>\n" +
        "\n" +
        "                        <div class='text-center cursor-pointer'>\n" +
        "                            <label name='midtermLabel' id='midtermLabelID' class='block text-lg text-gray-900 font-bold'>Midterm</label>\n" +
        "                            <label name='midtermID' class='hidden'>" + midtermID + "</label>\n" +
        "                            <label class='block text-base font-bold'>" + midtermTitle + "</label>\n" +
        "                            <div class='flex justify-center cursor-pointer'>\n" +
        "                                <div id='midtermQuestionsInsideBox' class='w-3/6'>\n" +
        "                                </div>\n" +
        "                            </div>\n" +
        "                        </div>\n" +
        "\n" +
        "                        <hr class='w-full text-blue-900'>\n" +
        "                        <div class='text-center font-bold'>\n" +
        "                            <label>Weightage:</label>\n" +
        "                            <label>25</label>\n" +
        "                        </div>\n" +
        "                    </div>\n" +
        "\n" +
        "                </div>\n"

    for (let j = 0; j < 3; j++) {
        if (j < numberOfQuestionsInMidterm) {
            // alert(midtermCLOList[j] + "jjjjjjjjj" + j)
            document.getElementById("midtermQuestionsInsideBox").innerHTML +=
                "<div class='flex justify-between cursor-pointer'>\n" +
                "<label>Question " + (j + 1) + "</label>\n" +
                "<label>" + midtermCLOList[j] + "</label>\n" +
                "</div>\n"

        } else {
            document.getElementById("midtermQuestionsInsideBox").innerHTML +=
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
    let teacherMidtermDashboard = document.getElementById("teacherMidtermDashboardID")
    if (deleteConfirmDialogueBox.classList.contains("hidden")) {
        deleteConfirmDialogueBox.classList.remove("hidden")
    } else {
        deleteConfirmDialogueBox.classList.add("hidden")
    }

    if (teacherMidtermDashboard.classList.contains("blurBackground")) {
        teacherMidtermDashboard.classList.remove("blurBackground")
    } else {
        teacherMidtermDashboard.classList.add("blurBackground")
    }

}
