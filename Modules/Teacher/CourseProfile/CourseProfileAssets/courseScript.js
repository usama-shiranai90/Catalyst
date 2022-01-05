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
            if (this.type == "text" || this.type == "textarea") {
                $(this).parent().removeClass().addClass("textField-label-content w-full");
            } else if (this.type == "select-one")
                $(this).parent().removeClass().addClass("select-label-content w-full");
        })

        $('#add-clo-btn').on('click', function (e) {
            const MAXCLOS = 5;

            if (counter !== MAXCLOS){
                // section is for CLO row addition.
                const cloRow = document.getElementById('CourseLearningRow-1');
                const outcomeReplica = cloRow.cloneNode(true); // duplicate.
                let cloRow_columns = [];
                for (let i = 0; i < outcomeReplica.childNodes.length; i++) {
                    if (i % 2 !== 0) {
                        cloRow_columns.push(outcomeReplica.childNodes[i]);
                    }
                }
                updateRows_column_info(outcomeReplica, cloRow_columns);
                cloRow.parentNode.appendChild(outcomeReplica);


                // Section is for CLO to PLO Mapping.  i.e. row addition for CLO.
                const mapCloRow =  document.getElementById('clo-map-div-1');
                const  mapRowReplica = mapCloRow.cloneNode(true);



                mapCloRow.parentNode.appendChild(outcomeReplica);
                counter++;

            }else{
                showErrorBox("Maximum CLO's must be five!")
            }

        })
    });


    function updateRows_column_info(node, cloColumn) {
        if (node.hasAttribute("id")) {
            node["id"] = unqiueName(node["id"]);
        }
        cloColumn.forEach(function (currentTag, index) {
            if (index === 0) {
                currentTag.setAttribute("id", unqiueName(currentTag.getAttribute("id")));  // div us ka ID change ki hai.
                // let span = currentTag.childNodes[1];
                let span = currentTag.firstElementChild;
                span.innerHTML = "CLO-" + counter;
            }
            else if (index === 1 || index === 2){
              let input =  currentTag.lastElementChild;
              input.setAttribute("id" , unqiueName(input.getAttribute("id")));
            }
            else if (index === 3){
                let input =  currentTag.firstElementChild.firstElementChild;
                input.setAttribute("id" , unqiueName(input.getAttribute("id")));
            }
        })

    }

    counter = 1;

    function unqiueName(str) {
        return str.replace(/1/g, counter);
    }

    function duplicateNode(/*DOMNode*/sourceNode, /*Array*/attributesToBump) {
        counter++;
        var out = sourceNode.cloneNode(true);
        if (out.hasAttribute("id")) {
            out["id"] = unqiueName(out["id"]);
        }
        var nodes = out.getElementsByTagName("*");

        for (var i = 0, len1 = nodes.length; i < len1; i++) {
            var node = nodes[i];
            for (var j = 0, len2 = attributesToBump.length; j < len2; j++) {
                var attribute = attributesToBump[j];
                if (node.hasAttribute(attribute)) {
                    node[attribute] = unqiueName(node[attribute]);
                }
            }
        }
        return out;
    }


    function checkEmptyFields(fieldsArray, counter) {  //textField-error-input

        for (let i = 0; i < fieldsArray.length; i++) {
            iterate(fieldsArray[i]);
        }

        if (counter === 1) {
            if (completeFlag) {
                $('#cpEssentialID').toggleClass("hidden");
                $('#cpDetaillID').toggleClass("hidden");
                // $('#cpDetaillID').classList.toggle("hidden");
            } else {
                showErrorBox("Please complete all fields to continue")
            }
        } else if (counter === 2) {
            if (completeFlag) {
                $('#cpDetaillID').toggleClass("hidden");
                $('#cpDistributionID').toggleClass("hidden");
            } else showErrorBox("Please fill all fields to continue");
        }
    }

    function iterate(currentField) {
        if (currentField.value.length === 0) {
            completeFlag = false;
            // console.log(currentField)
            if (currentField.tagName === "SELECT")
                currentField.parentElement.classList.add("select-error-input")
            else if (currentField.tagName === "INPUT" || currentField.tagName === "TEXTAREA")
                currentField.parentElement.classList.add("textField-error-input")
        }
    }

    function showErrorBox(message) {
        $('#errorID span').text("Empty Alert!")
        $('#errorID').textNodes().first().replaceWith(message);
        $("#errorMessageDiv").toggle("hidden").animate(
            {
                right: 0,
            }, 1000,
            function () {
                $(this).delay(3000).fadeOut();
            });
    }

    jQuery.fn.textNodes = function () {
        return this.contents().filter(function () {
            return (this.nodeType === Node.TEXT_NODE && this.nodeValue.trim() !== "");
        });
    }

}