<<<<<<< Updated upstream
window.onload =function(){
    let referenceBooks_textfield = document.getElementById("referenceBooksID");
    let recommendedTextBooks_textfield = document.getElementById("recommendedTextbooksID");
    let courseDescription_textarea = document.getElementById("courseDescriptionID");
    let otherReferenceMaterial_textarea = document.getElementById("otherReferenceId")
    let name_textarea = document.getElementById("nameID");
    let designation_textarea = document.getElementById("designationID");
    let qualification_textarea = document.getElementById("qualificationID");
    let specialization_textarea = document.getElementById("specializationID");
    let contacts_textarea = document.getElementById("contactsID");
    let personalemail_textarea = document.getElementById("personalEmailID")

    function checkfileds(){
    //    checks all the fileds if anyone is empty
=======
window.onload = function () {
    let counter;
    // Course Essential:
    const cEssentialField = {
        cTitleField: document.getElementById("courseTitleID"),
        cCodeField: document.getElementById("courseCodeID"),
        cHoursField: document.getElementById("creditHourID"),
        cPreReqField: document.getElementById("preRequisiteID"),
        cTermField: document.getElementById("semesterTermID"),
        cProgramLevelField: document.getElementById("ProgramLevelID"),
        cProgramField: document.getElementById("programID"),
        cEffectiveField: document.getElementById("courseEffectiveID"),
        cCoordinationField: document.getElementById("coordinatingUnitID"),
        cMethodologyField: document.getElementById("teachingMethodologyID"),
        cModelField: document.getElementById("courseInteractionModelID"),
    }
    const instrumentWeight = {
        quizzsection: {
            detail: document.getElementById('quizDetailID'),
            weight: document.getElementById('quizWeightID')
        },
        assignmentsection: {
            detail: document.getElementById('assignmentDetailID'),
            weight: document.getElementById('assignmentWeightID')
        },
        projectsection: {
            detail: document.getElementById('projectDetailID'),
            weight: document.getElementById('projectWeightID')
        },
        midsection: {
            detail: document.getElementById('midTermDetailID'),
            weight: document.getElementById('midWeightID')
        },
        finalsection: {
            detail: document.getElementById('finalTermDetailID'),
            weight: document.getElementById('finalWeightID')
        },
    }
    let fieldsArray = [cEssentialField.cTitleField, cEssentialField.cCodeField, cEssentialField.cHoursField, cEssentialField.cPreReqField,
        cEssentialField.cTermField, cEssentialField.cProgramLevelField, cEssentialField.cProgramField, cEssentialField.cEffectiveField,
        cEssentialField.cCoordinationField, cEssentialField.cMethodologyField, cEssentialField.cModelField,
        instrumentWeight.assignmentsection.detail, instrumentWeight.assignmentsection.weight,
        instrumentWeight.quizzsection.detail, instrumentWeight.quizzsection.weight,
        instrumentWeight.projectsection.detail, instrumentWeight.projectsection.weight,
        instrumentWeight.midsection.detail, instrumentWeight.midsection.weight,
        instrumentWeight.finalsection.detail, instrumentWeight.finalsection.weight];

    // Course Detail:
    const cDetailField = {
        cReferenceField: document.getElementById("referenceBooksID"),
        cRecommendedBooksField: document.getElementById("recommendedTextbooksID"),
        cCourseDetailField: document.getElementById("courseDescriptionID"),
        cOtherReferenceMaterialField: document.getElementById("otherReferenceId"),
        cNameDetailField: document.getElementById("nameDetailID"),
        cDesignationField: document.getElementById("DesignationDetailID"),
        cQualificationField: document.getElementById("qualificationID"),
        cSpecializationFiled: document.getElementById("specializationID"),
        cContactsField: document.getElementById("contactsID"),
        cPersonalEmailFiled: document.getElementById("personalEmailID"),
    }
    let fieldsArray_2 = [
        cDetailField.cReferenceField, cDetailField.cRecommendedBooksField, cDetailField.cCourseDetailField
        , cDetailField.cOtherReferenceMaterialField, cDetailField.cNameDetailField, cDetailField.cDesignationField
        , cDetailField.cQualificationField, cDetailField.cSpecializationFiled, cDetailField.cContactsField, cDetailField.cPersonalEmailFiled
    ];

    let completeFlag = true;
    const clo_row  = document.getElementById('CourseLearningRow-1');
    const map_clo_row  = document.getElementById('clo-map-div-1');


//    Jquery
    $(document).ready(function () {
        $("#coursepContinuebtn-1").on("click", function (e) {
            completeFlag = true;
            e.preventDefault();
            checkEmptyFields(fieldsArray, 1);
        });

        $('#coursepContinuebtn-2').on('click', function (e) {
            completeFlag = true;
            e.preventDefault();
            checkEmptyFields(fieldsArray_2, 2);
        })

        $('#coursepContinuebtn-3').on('click', function (e) {
            e.preventDefault();
            // let totalRowsOfCLOs  = document.getElementsByClassName("flex w-full learning-outcome-row");
        })

        $('.textField , .select').on('input', function () {
            if (this.type === "text" || this.type === "textarea") {
                $(this).parent().removeClass().addClass("textField-label-content w-full");
            } else if (this.type === "select-one")
                $(this).parent().removeClass().addClass("select-label-content w-full");
        })

        $('#add-clo-btn').on('click', function (e) {
            counter++;
            createCLORow(clo_row ,  1 );
            createCLORow(map_clo_row , 2);
        });

        $('input[name="clo1"]').click(function() {
            const totalChecks = $("input[name=\"clo1\"]:checked").length;
            let flag;
            console.log(totalChecks)
            if (totalChecks !== 3){
                flag = false;
                $("input[name=\"clo1\"]:checkbox").not(":checked").attr("disabled",flag);
            }
            else{
                flag = true;
                showErrorBox("Maximum limit of CLO-1 is reached")
                $("input[name=\"clo1\"]:checkbox").not(":checked").attr("disabled",flag);
            }
        });
        // working for only first only.
        $('.h-10 .w-6').on('click' , function (e) {
            counter--;
            console.log(this)
            $(this).closest('.learning-outcome-row').remove();
        });

    });

    function    createCLORow(node , t) {
        const newReplica = node.cloneNode(true); // duplicate.
        let cloColumn = [] ;
        for (let i = 0; i < newReplica.childNodes.length; i++) {  // length will be total no of columns i.e. divs in that row.
            if (i%2 !== 0)
                cloColumn.push(newReplica.childNodes[i]);
        }
        setTagAttribute(newReplica);
        if (t === 1){
            cloColumn.forEach(function (currentTag, index) {
                if (index === 0) {
                    currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id")));  // div us ka ID change ki hai.
                    // let span = currentTag.childNodes[1];
                    let span = currentTag.firstElementChild;
                    span.innerHTML = "CLO-" + counter;
                }
                else if (index === 1 || index === 2){
                    let input =  currentTag.lastElementChild;
                    input.setAttribute("id" , uniqueName(input.getAttribute("id")));
                }
                else if (index === 3){
                    let input =  currentTag.firstElementChild.firstElementChild;
                    input.setAttribute("id" , uniqueName(input.getAttribute("id")));
                }
            });
        }
        else {
            cloColumn.forEach(function (currentTag, index) {

                if (index > 1 && index < 14){
                    let i = --index;
                    console.log(currentTag);
                    const c_input = currentTag.firstElementChild;
                    const c_label = currentTag.lastElementChild;
                    c_input.setAttribute("name" , uniqueName(c_input.getAttribute("name")));
                    c_input.setAttribute("id" , uniquePLO(c_input.getAttribute("id") , i));
                    c_label.setAttribute("for" , uniquePLO(c_label.getAttribute("for") , i));
                }

            })
        }
>>>>>>> Stashed changes




    }
}