// window.onload = function () {

let teacherSessionalAssignmentsContainer = document.getElementById("teacherSessionalAssignmentsContainerID")
let teacherSessionalQuizzesContainer = document.getElementById("teacherSessionalQuizzesContainerID")
let teacherSessionalProjectsContainer = document.getElementById("teacherSessionalProjectsContainerID")

//Create boxes of Assignments
function createAssignments(numberOfAssignments, assignmentTitles, assignmentIDs, numberOfQuestionInEachAssignment, assignmentCLOList, assignmentWeightages) {
    for (let i = 0; i < numberOfAssignments; i++) {
        teacherSessionalAssignmentsContainer.innerHTML +=
            "<div class='col-span-4 pl-10 pr-10 pt-5 pb-5 cursor-pointer'>\n" +
            "\n" +
            "                    <div name='sessionalBox' id='teacherAssignment" + (i + 1) + "DivID' class='bg-gradient-to-b from-white to-blue-200 p-1.5 rounded-2xl text-gray-500'>\n" +
            "                        <div class='flex justify-end'>\n" +
            "\n" +
            "                            <img id='editTeacherAssignment" + (i + 1) + "IconID' name='editSessional' class='mt-0.5' src='../../../../Assets/Images/vectorFiles/Icons/editIcon.svg'>\n" +
            "                            <img id='deleteTeacherAssignment" + (i + 1) + "IconID' name='deleteSessional' class='mt-0.5' src='../../../../Assets/Images/vectorFiles/Icons/crossIcon.svg'>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class='text-center cursor-pointer'>\n" +
            "                            <label name='sessionalLabel' id='assignment" + (i + 1) + "LabelID' class='block text-lg text-gray-900 font-bold'>Assignment " + (i + 1) + "</label>\n" +
            "                            <label name='sessionalID' class='hidden'>" + assignmentIDs[i] + "</label>\n" +
            "                            <label class='block text-base font-bold'>" + assignmentTitles[i] + "</label>\n" +
            "                            <div class='flex justify-center cursor-pointer'>\n" +
            "                                <div id='assignmentsQuestionsInsideBox" + (i + 1) + "' class='w-3/6'>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <hr class='w-full text-blue-900'>\n" +
            "                        <div class='text-center font-bold'>\n" +
            "                            <label>Weightage:</label>\n" +
            "                            <label>" + assignmentWeightages[i] + "</label>\n" +
            "                        </div>\n" +
            "                    </div>\n" +
            "\n" +
            "                </div>\n"

        //Showing only 3 questions because we only need to show 3 in each sessional box at dashboard... though its our choice, looks good
        for (let j = 0; j < 3; j++) {
            //numberOfQuestionInEachAssignment[i] is array in which number of questions for each assignments are stored
            if (j < numberOfQuestionInEachAssignment[i]) {
                document.getElementById("assignmentsQuestionsInsideBox" + (i + 1) + "").innerHTML +=
                    "<div class='flex justify-between cursor-pointer'>\n" +
                    "<label>Question " + (j + 1) + "</label>\n" +
                    //i gives number Of current assignments and j gives number Of current Question in each assignment
                    "<label>" + assignmentCLOList[i][j] + "</label>\n" +
                    "</div>\n"

            }
            //It will add invisible labels just for the sake of alignment and maintaining the size of all boxes at equal
            else {
                document.getElementById("assignmentsQuestionsInsideBox" + (i + 1) + "").innerHTML +=
                    "<div class='flex justify-between cursor-pointer invisible'>\n" +
                    "<label>Question " + (j + 1) + "</label>\n" +
                    "<label>CLO 1</label>\n" +
                    "</div>\n"
            }
        }
    }
}

//Create boxes of Quizzes
function createQuizzes(numberOfQuizzes, quizTitles, quizIDs, numberOfQuestionInEachQuiz, quizCLOList, quizWeightages) {
    for (let i = 0; i < numberOfQuizzes; i++) {
        teacherSessionalQuizzesContainer.innerHTML +=
            "<div class='col-span-4 pl-10 pr-10 pt-5 pb-5 cursor-pointer'>\n" +
            "\n" +
            "                    <div name='sessionalBox' id='teacherQuiz" + (i + 1) + "DivID' class='bg-gradient-to-b from-white to-blue-200 p-1.5 rounded-2xl text-gray-500'>\n" +
            "                        <!--                        Putting icons-->\n" +
            "                        <div class='flex justify-end'>\n" +
            "                            <img id='editTeacherQuiz" + (i + 1) + "IconID' name='editSessional' class='mt-0.5' src='../../../../Assets/Images/vectorFiles/Icons/editIcon.svg'>\n" +
            "                            <img id='deleteTeacherQuiz" + (i + 1) + "IconID' name='deleteSessional' class='mt-0.5' src='../../../../Assets/Images/vectorFiles/Icons/crossIcon.svg'>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class='text-center cursor-pointer'>\n" +
            "                            <label name='sessionalLabel' id='quiz" + (i + 1) + "LabelID' class='block text-lg text-gray-900 font-bold'>Quiz " + (i + 1) + "</label>\n" +
            "                            <label name='sessionalID' class='hidden'>" + quizIDs[i] + " </label>\n" +
            "                            <label class='block text-base font-bold'>" + quizTitles[i] + "</label>\n" +
            "                            <div class='flex justify-center cursor-pointer'>\n" +
            "                                <div class='w-3/6' id='quizQuestionsInsideBox" + (i + 1) + "'>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <hr class='w-full text-blue-900'>\n" +
            "                        <div class='text-center font-bold'>\n" +
            "                            <label>Weightage: </label>\n" +
            "                            <label>" + quizWeightages[i] + "</label>\n" +
            "                        </div>\n" +
            "                    </div>\n" +
            "\n" +
            "                </div>"

        //Showing only 3 questions because we only need to show 3 in each sessional box at dashboard... though its our choice, looks good
        for (let j = 0; j < 3; j++) {
            //numberOfQuestionInEachQuiz[i] is array in which number of questions for each quizzes are stored
            if (j < numberOfQuestionInEachQuiz[i]) {
                document.getElementById("quizQuestionsInsideBox" + (i + 1) + "").innerHTML +=
                    "<div class='flex justify-between cursor-pointer'>\n" +
                    "<label>Question " + (j + 1) + "</label>\n" +
                    //i gives number Of current quizzes and j gives number Of current Question in each quiz
                    "<label>" + quizCLOList[i][j] + "</label>\n" +
                    "</div>\n"

            }
            //It will add invisible labels just for the sake of alignment and maintaining the size of all boxes at equal
            else {
                document.getElementById("quizQuestionsInsideBox" + (i + 1) + "").innerHTML +=
                    "<div class='flex justify-between cursor-pointer invisible'>\n" +
                    "<label>Question " + (j + 1) + "</label>\n" +
                    "<label>CLO 1</label>\n" +
                    "</div>\n"
            }
        }
    }
}

//Create boxes of Projects
function createProjects(numberOfProjects, projectTitles, projectIDs, numberOfQuestionInEachProject, projectCLOList, projectWeightages) {
    for (let i = 0; i < numberOfProjects; i++) {
        teacherSessionalProjectsContainer.innerHTML +=
            "<div class='col-span-4 pl-10 pr-10 pt-5 pb-5 cursor-pointer'>\n" +
            "\n" +
            "                    <div name='sessionalBox' id='teacherProject" + (i + 1) + "DivID' class='bg-gradient-to-b from-white to-blue-200 p-1.5 rounded-2xl text-gray-500'>\n" +
            "                        <!--                        Putting icons-->\n" +
            "                        <div class='flex justify-end'>\n" +
            "                            <img id='editTeacherProject" + (i + 1) + "IconID' name='editSessional' class='mt-0.5' src='../../../../Assets/Images/vectorFiles/Icons/editIcon.svg'>\n" +
            "                            <img id='deleteTeacherProject" + (i + 1) + "IconID' name='deleteSessional' class='mt-0.5' src='../../../../Assets/Images/vectorFiles/Icons/crossIcon.svg'>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class='text-center cursor-pointer'>\n" +
            "                            <label name='sessionalLabel' id='project" + (i + 1) + "LabelID' class='block text-lg text-gray-900 font-bold'>Project " + (i + 1) + "</label>\n" +
            "                            <label name='sessionalID' class='hidden'>" + projectIDs[i] + "</label>\n" +
            "                            <label class='block text-base font-bold'>" + projectTitles[i] + "</label>\n" +
            "                            <div class='flex justify-center cursor-pointer'>\n" +
            "                                <div id='projectQuestionsInsideBox" + (i + 1) + "' class='w-3/6'>\n" +
            "                                </div>\n" +
            "                            </div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <hr class='w-full text-blue-900'>\n" +
            "                        <div class='text-center font-bold'>\n" +
            "                            <label>Weightage: </label>\n" +
            "                            <label>" + projectWeightages[i] + "</label>\n" +
            "                        </div>\n" +
            "                    </div>\n" +
            "\n" +
            "                </div>"

        //Showing only 3 questions because we only need to show 3 in each sessional box at dashboard... though its our choice, looks good
        for (let j = 0; j < 3; j++) {
            //numberOfQuestionInEachProjectt[i] is array in which number of questions for each projects are stored
            if (j < numberOfQuestionInEachProject[i]) {
                document.getElementById("projectQuestionsInsideBox" + (i + 1) + "").innerHTML +=
                    "<div class='flex justify-between cursor-pointer'>\n" +
                    "<label>Question " + (j + 1) + "</label>\n" +
                    //i gives number Of current projects and j gives number Of current Question in each project
                    "<label>" + projectCLOList[i][j] + "</label>\n" +
                    "</div>\n"

            }
            //It will add invisible labels just for the sake of alignment and maintaining the size of all boxes at equal
            else {
                document.getElementById("projectQuestionsInsideBox" + (i + 1) + "").innerHTML +=
                    "<div class='flex justify-between cursor-pointer invisible'>\n" +
                    "<label>Question " + (j + 1) + "</label>\n" +
                    "<label>CLO 1</label>\n" +
                    "</div>\n"
            }
        }
    }
}

//Deletes the sessionals
function toggleDeleteConfirmDialogue() {
    let deleteConfirmDialogueBox = document.getElementById("deleteConfirmDialogueBoxID")
    let teacherSessionalDashboard = document.getElementById("teacherSessionalDashboardID")

    // if (deleteConfirmDialogueBox.classList.contains("hidden")) { //Confusion...
    //     deleteConfirmDialogueBox.classList.remove("hidden")
    // } else {
    //     deleteConfirmDialogueBox.classList.add("hidden")
    // }

    //If deleteConfirmDialogueBox
    deleteConfirmDialogueBox.classList.toggle("hidden")
    teacherSessionalDashboard.classList.toggle("blurBackground")

    // if (teacherSessionalDashboard.classList.contains("blurBackground")) {
    //     teacherSessionalDashboard.classList.remove("blurBackground")
    // } else {
    //     teacherSessionalDashboard.classList.add("blurBackground")
    // }
}
