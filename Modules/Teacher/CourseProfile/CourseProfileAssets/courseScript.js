window.onload = function () {

    let firstContinueBtn = document.getElementById("continue-btn");

    let courseTitleField = document.getElementById("courseTitleID");
    let courseCodeField = document.getElementById("courseCodeID");
    let CreditHourField = document.getElementById("creditHourID");
    let PreReqField = document.getElementById("preRequisiteID");
    let termField = document.getElementById("semesterTermID");
    let programLevelField = document.getElementById("ProgramLevelID");
    let programField = document.getElementById("programID");
    let CourseEffectiveField = document.getElementById("courseEffectiveID");

//    Jquery
    $(document).ready(function () {
        $(firstContinueBtn).click(function (event) {
            checkEmptyFields();
        });
    });

    function checkEmptyFields() {
        console.log(courseTitleField.value);
        console.log(courseTitleField.id + " this was the id");

    }

}