let incrementClo = 0;
let completeFlag = true;
// let lastAvailableCLONumber = 0;

window.onload = function (e) {
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

        getEssentialValue: function (field) {
            return $(field).val();
        }
    }
    const instrumentWeight = {
        quizz_weight: document.getElementById('quizWeightID'),
        assignment_weight: document.getElementById('assignmentWeightID'),
        project_weight: document.getElementById('projectWeightID'),
        mid_weight: document.getElementById('midWeightID'),
        final_weight: document.getElementById('finalWeightID')
    }
    let fieldsArray = [cEssentialField.cTitleField, cEssentialField.cCodeField, cEssentialField.cHoursField, cEssentialField.cPreReqField,
        cEssentialField.cTermField, cEssentialField.cProgramLevelField, cEssentialField.cProgramField, cEssentialField.cEffectiveField,
        cEssentialField.cCoordinationField, cEssentialField.cMethodologyField, cEssentialField.cModelField,
        instrumentWeight.quizz_weight,instrumentWeight.assignment_weight , instrumentWeight.project_weight ,
        instrumentWeight.mid_weight,instrumentWeight.final_weight];

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

    // Bottom progress:
    const progressSet = {
        pCircle1: document.getElementById('progressCircle-1'),
        pCircle2: document.getElementById('progressCircle-2'),
        pCircle3: document.getElementById('progressCircle-3'),
        pfillarray: document.querySelectorAll('.bg-gray-200.flex-1')
    }

    let backArrow = document.getElementsByClassName('mx-2 h-6')[0]

    const outcomeLearningContainer = document.getElementById("courseLearningDivID");
    const outcomeMapContainer = document.getElementById("courseMappingDivID");

    const cEssentialSection = document.getElementById('cpEssentialID');
    const cDetailSection = document.getElementById('cpDetaillID');
    const cDistributionSection = document.getElementById('cpDistributionID');

    const addOutcomeBtn = document.getElementById('add-clo-btn');

    let courseEssentialFieldValue = [];
    let courseDetailFieldValue = [];

    // isWeightExceeded(instrumentWeight)
    $(document).ready(function () {

        $('.textField , .select').on('input', function (e) {
            if (this.classList.contains("px-12")){
                $(this).parent().removeClass().addClass("textField-label-content w-2/5");
            }
            else {
                if (this.type === "text" || this.type === "textarea")
                    $(this).parent().removeClass().addClass("textField-label-content w-full");
                else if (this.type === "select-one")
                    $(this).parent().removeClass().addClass("select-label-content w-full");
            }
        });

        $("#coursepContinuebtn-1").on("click", function (e) {
            e.preventDefault();
            completeFlag = true;
            checkEmptyFields(fieldsArray, 1 , courseEssentialFieldValue , instrumentWeight);
            arrowPositionCheck();
        });
        $('#coursepContinuebtn-2').on('click', function (e) {
            e.preventDefault();
            completeFlag = true;
            checkEmptyFields(fieldsArray_2, 2 ,  courseDetailFieldValue, null);
            arrowPositionCheck();
        });
        $('#coursepContinuebtn-3').on('click', function (e) {
            e.preventDefault();
            completeFlag = true;
            const arrayCLO = new Array(incrementClo);
            for (let i = 0; i < arrayCLO.length; i++) {
                arrayCLO[i] = [];
            }

            $('#courseLearningDivID div.cprofile-column.bg-catalystBlue-l61 span').each(function (node, index) {
                // console.log(node)
                arrayCLO[node].push($(this).text())
            })
            let extremeCounter = 0;
            let cycle = 0;
            $('#courseLearningDivID input').each(function () {
                if (extremeCounter === 0) { // des
                    arrayCLO[cycle].push($(this).val())
                    extremeCounter++;
                } else if (extremeCounter === 1) {
                    arrayCLO[cycle].push($(this).val())
                    extremeCounter++
                } else if (extremeCounter === 2) {
                    arrayCLO[cycle].push($(this).val())
                    extremeCounter = 0;
                    cycle++;
                }
            })

            const arrayMapping = new Array(incrementClo);
            for (let i = 0; i < incrementClo; i++) {
                arrayMapping[i] = [];
                $("input:checkbox[name^='[clo-" + (i + 1) + "']:checked").each(function () {
                    arrayMapping[i].push($(this).val())
                });
            }
           creationAjaxCall(arrayCLO, arrayMapping, courseEssentialFieldValue, courseDetailFieldValue);

            /*if (outcomeLearningContainer.children.length < 2) { // generate alert
                $("main").addClass("blur-filter");
                $("#alertContainer").removeClass("hidden");
                $("#alertBtnCLOCreation").add("#alertBtnCLOContinue").on('click', function () {
                    $("main").removeClass("blur-filter");
                    $("#alertContainer").addClass("hidden");
                })
            }
            else {

            }*/
        });

        $(addOutcomeBtn).on('click', function (event) {
            if (incrementClo > 5)
                showErrorBox('CLO limit has exceed.')
            else
                initialCreationCLODetail_Mapping();
        });

        $(document).on('click', "img[data-clo-des='remove']", function (event) {
            event.stopImmediatePropagation();
            // const dischargedIndex = $(event.target).closest('.learning-outcome-row').attr('id').replace(/^\D+/g, '');  // clo-3 ya clo-2 us ma sa 3 ya 2 ko extract kary ga.
            const dischargedIndex = $(event.target).closest('.learning-outcome-row').index();

            // $(event.target).closest('.learning-outcome-row').remove();
            $(('#CourseLearningRow-' + dischargedIndex)).remove();
            $('#clo-map-div-' + dischargedIndex).remove();
            iterateIndexDetail_Mapping(parseInt(dischargedIndex));

        });

        $(backArrow).on("click", function (e) {
            if (!$(cDetailSection).hasClass("hidden")) {                // 2nd section to move to 1st section.
                $(cEssentialSection).toggleClass("hidden");             // open first section.
                $(cDetailSection).toggleClass("hidden");                // close second section.
                arrowPositionCheck();
            } else if (!$(cDistributionSection).hasClass("hidden")) {     // if on third page then go to 2nd.
                $(cDistributionSection).toggleClass("hidden");
                $(cDetailSection).toggleClass("hidden");
                arrowPositionCheck();
            }
        });

        /* $(document).click('\'input[name="^clo"]\'', function (e) {
     const totalChecks = $("input[name=\"clo1\"]:checked").length;
     let flag;
     if (totalChecks !== 3) {
         flag = false;
         $("input[name=\"clo1\"]:checkbox").not(":checked").attr("disabled", flag);
     } else {
         flag = true;
         showErrorBox("Maximum limit of CLO-1 is reached")
         $("input[name=\"clo1\"]:checkbox").not(":checked").attr("disabled", flag);
     }
 });*/

    });



    function initialCreationCLODetail_Mapping() {
        if (incrementClo === 0) {
            ++incrementClo;
            // outcomeLearningContainer.innerHTML += createFirstCLODetailRow();
            outcomeLearningContainer.appendChild(createFirstCLODetailRow())

            createFirstCLOMapRow(ploArray.length , outcomeMapContainer); // pass no of PLOs you have per curriculum.
        } else {
            const newCLORowDetail = document.getElementById('CourseLearningRow-' + incrementClo);
            // console.log("My new clo row : " , newCLORowDetail)
            outcomeLearningContainer.appendChild(createCLORow(newCLORowDetail, 1, incrementClo + 1));

            //Creates a CLO Mapping Row
            const newCLORowMapping = document.getElementById('clo-map-div-' + incrementClo);
            outcomeMapContainer.appendChild(createCLORow(newCLORowMapping, 2, incrementClo + 1));

            incrementClo++;
            // console.log("incremental Stage :", incrementClo)
        }

        console.log(incrementClo)
    }

    function createCLORow(replicaNode, t, CLONumber) {

        // console.log("CLO NUMBER : in creation of row : " ,  CLONumber)
        const node = replicaNode.cloneNode(true);
        let cloColumn = [];
        setTagAttribute(node, CLONumber);
        if (t === 1) {
            for (let i = 0; i < node.childNodes.length; i++) {  // length will be total no of columns i.e. divs in that row.
                if (i % 2 !== 0)
                    cloColumn.push(node.childNodes[i]);
            }
            cloColumn.forEach(function (currentTag, index) {
                overrideCLODetail_Mapping_Row(CLONumber, index, currentTag)
            });
            return node;
        } else {

            node.childNodes[3].innerHTML = "CLO-" + CLONumber;
            for (let i = 5; i < node.childNodes.length; i++) {  // length will be total no of columns i.e. divs in that row.
                cloColumn.push(node.childNodes[i]);
            }
            cloColumn.forEach(function (currentTag, index) {
                const c_input = currentTag.firstElementChild;
                const c_label = currentTag.lastElementChild;
                c_input.setAttribute("name", uniqueName(c_input.getAttribute("name"), CLONumber));
                c_input.setAttribute("id", uniquePLO(c_input.getAttribute("id"), (index + 1), CLONumber));
                c_input.setAttribute("value", uniquePLO(c_input.getAttribute("id"), (index + 1), CLONumber));
                c_label.setAttribute("for", uniquePLO(c_label.getAttribute("for"), (index + 1), CLONumber));

            });
            // map_clo_row.parentNode.appendChild(replicaNode);
            // outcomeMapContainer.appendChild(node);
            return node;
        }

    }

    function iterateIndexDetail_Mapping(setFromIndex) {
        --incrementClo;

        if (incrementClo !== 0) {
            $(outcomeLearningContainer).children().each(function (index) {
                if (index !== 0 && setFromIndex <= index) {
                    this.setAttribute("id", "CourseLearningRow-" + index)
                    $(this).children().each(function (i) {
                        overrideCLODetail_Mapping_Row(index, i, this)
                    });
                }
            });
            $(outcomeMapContainer).children().each(function (index) {
                if (index !== 0 && setFromIndex <= index) {
                    this.setAttribute("id", "clo-map-div-" + index)

                    $(this).children().each(function (i) {
                        if (i > 1) {
                            const c_input = this.firstElementChild;
                            const c_label = this.lastElementChild;
                            // console.log(c_input.getAttribute("name"), lastAvailableCLONumber)
                            c_input.setAttribute("name", "clo" + index);
                            c_input.setAttribute("id", ("clo-" + index + "-plo-" + (i - 1)));
                            c_input.setAttribute("value", ("clo-" + index + "-plo-" + (i - 1)));
                            c_label.setAttribute("for", ("clo-" + index + "-plo-" + (i - 1)));
                        } else if (i === 1) {
                            this.innerHTML = "CLO-" + index;
                        }
                    });
                }


            })
        } else {
            $('#cloMapHeaderID').html(`<div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">PLOs</span>
                                        </div>`);
        }
    }

    function overrideCLODetail_Mapping_Row(index, i, currentTag) {
        if (i === 0) {
            currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index));  // div us ka ID change ki hai.
            currentTag.setAttribute("data-clod-no", "c" + index + "-no");
            let span = currentTag.firstElementChild;
            span.innerHTML = "CLO-" + index;
        } else if (i === 1 || i === 2) {
            let label = currentTag.firstElementChild;
            let input = currentTag.lastElementChild;
            label.setAttribute("for", uniqueName(input.getAttribute("id"), index));
            input.setAttribute("id", uniqueName(input.getAttribute("id"), index));

            if (i === 1) {
                input.setAttribute("name", "courseCLOs[CLO-" + index + "][Description]");
                input.setAttribute("data-clod-desc", "c" + index + "-desc");
            } else {
                input.setAttribute("name", "courseCLOs[CLO-" + index + "][Domain]");
                input.setAttribute("data-clod-domain", "c" + index + "-domain");
            }


        } else if (i === 3) {
            let input = currentTag.firstElementChild.firstElementChild;
            input.setAttribute("id", uniqueName(input.getAttribute("id"), index));
            input.setAttribute("name", "courseCLOs[CLO-" + index + "][BTLevel]");
            input.setAttribute("data-clod-bt", "c" + index + "-bt");
            let label = currentTag.firstElementChild.childNodes[3];
            label.setAttribute("for", uniqueName(input.getAttribute("id"), index))
        }
    }

    arrowPositionCheck();
    function arrowPositionCheck() {
        if (!cEssentialSection.classList.contains("hidden")) {  // doesnt contain hidden class in essential section.
            backArrow.classList.add("hidden");
        } else {
            if (backArrow.classList.contains("hidden"))
                backArrow.classList.remove("hidden");
        }
    }


    function uniqueName(str, CLONumber) {
        return str.replace(incrementClo, CLONumber);
        //  return str.replace(/1/g, incrementClo);
    }

    function uniquePLO(str, c, CLONumber) {
        return "clo-" + CLONumber + "-plo-" + c;
    }

    function setTagAttribute(newReplica, CLONmber) {
        if (newReplica.hasAttribute("id"))
            newReplica.setAttribute("id", uniqueName(newReplica.getAttribute("id"), CLONmber));
    }

    function progressStart() {
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $("#coursepContinuebtn-1 ,  #coursepContinuebtn-2 , #coursepContinuebtn-3").click(function (e) {
            if (animating) return false;
            animating = true;

            if ($(this).closest(cEssentialSection).attr('id') === cEssentialSection.id) {
                current_fs = cEssentialSection;
                next_fs = cDetailSection;

                $(progressSet.pCircle1).children().remove();
                $(progressSet.pCircle1).append(progressType(3));

                $(progressSet.pCircle2).children().remove();
                $(progressSet.pCircle2).append(progressType(1));

                $('.bg-gray-200.flex-1').first()[0].setAttribute("class", "progress-circle-filled py-1 w-full")


                $(next_fs).show();

                $(current_fs).animate({right: 0}, {
                    step: function (now, mx) {
                        scale = 1 - (1 - now) * 0.2;
                        left = (now * 50) + "%";
                        opacity = 1 - now;
                        $(current_fs).css({'transform': 'scale(' + scale + ')'});
                        $(next_fs).css({'left': left, 'opacity': opacity});
                        $(next_fs).css({'display': "flex"});
                    },
                    duration: 500,
                    complete: function () {
                        $(current_fs).hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInSine'
                });
            } else if ($(this).closest(cDetailSection).attr('id') === cDetailSection.id) {
                current_fs = cDetailSection;
                next_fs = cDistributionSection;

                $(progressSet.pCircle2).children().remove();
                $(progressSet.pCircle2).append(progressType(3));

                $(progressSet.pCircle2).children().remove();
                $(progressSet.pCircle2).append(progressType(2));

                $(next_fs).show();

                $(current_fs).animate({right: 0}, {
                    step: function (now, mx) {
                        scale = 1 - (1 - now) * 0.2;
                        left = (now * 50) + "%";
                        opacity = 1 - now;
                        $(current_fs).css({'transform': 'scale(' + scale + ')'});
                        $(next_fs).css({'left': left, 'opacity': opacity});
                    },
                    duration: 500,
                    complete: function () {
                        $(current_fs).hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInSine'
                });

            } else if ($(this).closest(cDistributionSection).attr('id') === cDistributionSection.id) {
            }
        });
    }

    function progressType(c) {

        if (c === 1)
            return ' <div class="progress-circle progress-circle-filled bg-white rounded-full shadow -mr-3 animate-spin">\n' +
                '                            <span class="circular-span "><i class="fa fa-check"></i></span>\n' +
                '                            <!--                             <div class="h-3 w-3 bg-indigo-700 rounded-full animate-ping"></div>-->\n' +
                '                        </div>'
        else if (c === 2)
            return ' <div class="progress-circle progress-circle-unfilled">\n' +
                '                            <span class="circular-span">1</span>\n' +
                '                        </div>';
        else
            return ' <div class="progress-circle progress-circle-unfilled">\n' +
                '                            <span class="circular-span"> <i class="fa fa-check"></i></span>\n' +
                '                        </div>';
    }

}

$.fn.textNodes = function () {
    return this.contents().filter(function () {
        return (this.nodeType === Node.TEXT_NODE && this.nodeValue.trim() !== "");
    });
}