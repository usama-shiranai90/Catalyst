window.onload = function () {
    /*    //    parent section for each field
        let parentNode_CourseTitle, parentNode_CourseCode, parentNode_creditHour, parentNode_Prereq, parentNode_term,
            parentNode_program, parentNode_courseEffective, parentNode_coordination, parentNode_teachingMethodology,
            parentNode_courseInteraction;*/
    const cEssentialField = {
        cTitleField : document.getElementById("courseTitleID"),
        cCodeField : document.getElementById("courseCodeID"),
        cHoursField : document.getElementById("creditHourID"),
        cPreReqField : document.getElementById("preRequisiteID"),
        cTermField : document.getElementById("semesterTermID"),
        cProgramLevelField : document.getElementById("ProgramLevelID"),
        cProgramField : document.getElementById("programID"),
        cEffectiveField : document.getElementById("courseEffectiveID"),
        cCoordinationField : document.getElementById("coordinatingUnitID"),
        cMethodologyField : document.getElementById("teachingMethodologyID"),
        cModelField : document.getElementById("courseInteractionModelID"),
    }
    let completeFlag = false;

//    Jquery
    $(document).ready(function () {
        $("#coursepContinuebtn-1").on("click", function (e) {
            let fieldsArray = [cEssentialField.cTitleField , cEssentialField.cCodeField ,  cEssentialField.cHoursField ,cEssentialField.cPreReqField,
                cEssentialField.cTermField , cEssentialField.cProgramLevelField , cEssentialField.cProgramField , cEssentialField.cEffectiveField ,
                cEssentialField.cCoordinationField , cEssentialField.cMethodologyField , cEssentialField.cModelField];
            e.preventDefault();
            checkEmptyFields(fieldsArray );
        });

    });

    function checkEmptyFields(fieldsArray) {  //textField-error-input

            for (let i = 0; i < fieldsArray.length; i++) {
                let currentfield = fieldsArray[i];
                if (currentfield.value.length === 0){
                    completeFlag = false;
                    if (currentfield.tagName === "SELECT")
                        currentfield.parentElement.classList.add("select-error-input" )
                    else if (currentfield.tagName === "INPUT")
                        currentfield.parentElement.classList.add("textField-error-input")
                }
             }
            if (completeFlag){
                $('#coursepContinuebtn-1').classList.add("hidden");
                $('#coursepContinuebtn-2').classList.toggle("hidden");
            }
            else{
              showErrorBox("Please complete all fields to continue")
            }
    }


    function showErrorBox(message) {
        $('#errorID span').text("Empty Alert!")
        $('#errorID').textNodes().first().replaceWith(message);
        $("#errorMessageDiv").toggle("hidden").animate(
            {right: 0,
            }, 1000,
            function () {
                $(this).delay(2000).fadeOut();
            });
    }

    jQuery.fn.textNodes = function() {
        return this.contents().filter(function() {
            return (this.nodeType === Node.TEXT_NODE && this.nodeValue.trim() !== "");
        });
    }

}