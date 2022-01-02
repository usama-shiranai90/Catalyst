window.onload = function () {

    let firstContinueBtn = document.getElementById("continue-btn-1");

    const courseTitleField = document.getElementById("courseTitleID");
    const courseCodeField = document.getElementById("courseCodeID");
    const creditHourField = document.getElementById("creditHourID");
    const preReqField = document.getElementById("preRequisiteID");
    const termField = document.getElementById("semesterTermID");
    const programLevelField = document.getElementById("ProgramLevelID");
    const programField = document.getElementById("programID");
    const courseEffectiveField = document.getElementById("courseEffectiveID");
    const co_ordinatingUnitField = document.getElementById("coordinatingUnitID");
    const teachingMethodologyField = document.getElementById("teachingMethodologyID");
    const courseInteractionField = document.getElementById("courseInteractionModelID");

//    parent section for each field
    let parentNode_CourseTitle, parentNode_CourseCode, parentNode_creditHour, parentNode_Prereq, parentNode_term,
        parentNode_program, parentNode_courseEffective, parentNode_coordination, parentNode_teachingMethodology,
        parentNode_courseInteraction;

//    Jquery
    $(document).ready(function () {
        $(firstContinueBtn).click(function (event) {

            checkEmptyFields();
        });
    });

    function checkEmptyFields() {  //textField-error-input
        let fieldsArray = [courseTitleField, courseCodeField, creditHourField, preReqField,
            termField, programLevelField, programField, courseEffectiveField, co_ordinatingUnitField,
            teachingMethodologyField, courseInteractionField]

        if (courseTitleField.value.length === 0 || courseCodeField.value === "") {
            parentNode_CourseTitle = courseTitleField.parentElement;
            parentNode_CourseTitle.classList.toggle("textField-error-input");
        }
        if (courseCodeField.value.length === 0 || courseCodeField.value === "") {
            parentNode_CourseCode = courseCodeField.parentElement;
            parentNode_CourseCode.classList.toggle("textField-error-input");
        }
        if (creditHourField.value.length === 0 || creditHourField.value === "") {
            parentNode_creditHour = creditHourField.parentElement;
            parentNode_creditHour.classList.toggle("textField-error-input");
        }
        if (preReqField.value.length === 0 || preReqField.value === "") {
            parentNode_Prereq = preReqField.parentElement;
            parentNode_Prereq.classList.toggle("textField-error-input");
        }
        if (termField.value.length === 0 || termField.value === "") {
            parentNode_term = termField.parentElement;
            parentNode_term.classList.toggle("textField-error-input");
        }
        if (programLevelField.value.length === 0) {
            parentNode_program = programField.parentElement;
            parentNode_program.classList.toggle("textField-error-input");
        }
        if (courseEffectiveField.value.length === 0 || courseEffectiveField.value === "") {
            parentNode_courseEffective = courseEffectiveField.parentElement;
            parentNode_courseEffective.classList.toggle("textField-error-input");
        }
        if (co_ordinatingUnitField.value.length === 0) {
            parentNode_coordination = co_ordinatingUnitField.parentElement;
            parentNode_coordination.classList.toggle("textField-error-input");
        }
        if (teachingMethodologyField.value.length === 0 || teachingMethodologyField.value === "") {
            parentNode_teachingMethodology = teachingMethodologyField.parentElement;
            parentNode_teachingMethodology.classList.toggle("textField-error-input");
        }
        if (courseInteractionField.value.length === 0 || courseInteractionField.value === "") {
            parentNode_courseInteraction = courseInteractionField.parentElement;
            parentNode_courseInteraction.classList.toggle("textField-error-input");
        }
    }

    function iterateFields() {



    }

}