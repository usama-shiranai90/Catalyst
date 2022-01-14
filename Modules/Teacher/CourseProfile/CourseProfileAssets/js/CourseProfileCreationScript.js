let incrementClo = 0;
let completeFlag = true;
let lastAvailableCLONumber = 0;

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
        instrumentWeight.quizzsection.detail, instrumentWeight.quizzsection.weight,
        instrumentWeight.assignmentsection.detail, instrumentWeight.assignmentsection.weight,
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

    $(document).ready(function () {
        $('.textField , .select').on('input', function (e) {
            if (this.classList.contains("px-12"))
                $(this).parent().removeClass().addClass("textField-label-content w-2/3");
            else {
                if (this.type === "text" || this.type === "textarea")
                    $(this).parent().removeClass().addClass("textField-label-content w-full");
                else if (this.type === "select-one")
                    $(this).parent().removeClass().addClass("select-label-content w-full");
            }
        });

        $("#coursepContinuebtn-1").on("click", function (e) {
            e.preventDefault();
            // console.log(cEssentialField.getEssentialValue(cEssentialField.cTitleField))

            completeFlag = true;
            checkEmptyFields(fieldsArray, 1);
            arrowPositionCheck();
        });
        $('#coursepContinuebtn-2').on('click', function (e) {
            e.preventDefault();
            completeFlag = true;
            checkEmptyFields(fieldsArray_2, 2);
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
                } else if (extremeCounter === 1) { //  ungra
                    arrayCLO[cycle].push($(this).val())
                    extremeCounter++
                } else if (extremeCounter === 2) { // bt level.
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
            //courseEssentialFieldValue , courseDetailFieldValue ,
            creationAjaxCall(arrayCLO, arrayMapping);



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
            initialCreationCLODetail_Mapping();

            $("img[data-clo-des='remove']").click(function (event) {
                event.stopImmediatePropagation()
                // const dischargedIndex = $(event.target).closest('.learning-outcome-row').attr('id').replace(/^\D+/g, '');  // clo-3 ya clo-2 us ma sa 3 ya 2 ko extract kary ga.
                const dischargedIndex = $(event.target).closest('.learning-outcome-row').index();

                // $(event.target).closest('.learning-outcome-row').remove();
                $(('#CourseLearningRow-' + dischargedIndex)).remove();
                $('#clo-map-div-' + dischargedIndex).remove();
                iterateIndexDetail_Mapping(parseInt(dischargedIndex));
                // console.log("after deletion : ", incrementClo, lastAvailableCLONumber)
            })
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

        $(backArrow).click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("section").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({'left': left});
                    previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
                },
                duration: 500,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeOutQuint'
            });
        });

    });

    function checkEmptyFields(fieldsArray, counter) {  //textField-error-input
        for (let i = 0; i < fieldsArray.length; i++)
            errorInputType(fieldsArray[i]);

        if (counter === 1) {
            if (completeFlag) {
                $('#cpEssentialID').addClass("hidden");
                $('#cpDetaillID').removeClass("hidden");
                for (let i = 0; i < fieldsArray.length; i++) {
                    courseEssentialFieldValue.push(fieldsArray[i].value);
                }
                // console.log(courseEssentialFieldValue)

            } else {
                showErrorBox("Please complete all fields to continue")
            }
        } else if (counter === 2) {
            if (completeFlag) {
                $('#cpDetaillID').addClass("hidden");
                $('#cpDistributionID').removeClass("hidden");

                for (let i = 0; i < fieldsArray_2.length; i++) {
                    courseDetailFieldValue.push(fieldsArray[i].value);
                }
            } else showErrorBox("Please fill all fields to continue");
        }
    }

    function errorInputType(currentField) {
        if (currentField.value.length === 0) {
            completeFlag = false;
            if (currentField.tagName === "SELECT")
                currentField.parentElement.classList.add("select-error-input")
            else if (currentField.tagName === "INPUT" || currentField.tagName === "TEXTAREA")
                currentField.parentElement.classList.add("textField-error-input")
        }
    }

    function initialCreationCLODetail_Mapping() {
        if (incrementClo === 0) {
            lastAvailableCLONumber = ++incrementClo;
            // outcomeLearningContainer.innerHTML += createFirstCLODetailRow();
            outcomeLearningContainer.appendChild(createFirstCLODetailRow())
            createFirstCLOMapRow(12); // pass no of PLOs you have per curriculum.
        } else {
            const newCLORowDetail = document.getElementById('CourseLearningRow-' + lastAvailableCLONumber);
            // console.log("My new clo row : " , newCLORowDetail)
            outcomeLearningContainer.appendChild(createCLORow(newCLORowDetail, 1, lastAvailableCLONumber + 1));

            //Creates a CLO Mapping Row
            const newCLORowMapping = document.getElementById('clo-map-div-' + lastAvailableCLONumber);
            outcomeMapContainer.appendChild(createCLORow(newCLORowMapping, 2, lastAvailableCLONumber + 1));

            lastAvailableCLONumber = ++incrementClo;
            console.log("incremental Stage :", lastAvailableCLONumber, incrementClo)
        }

        console.log(incrementClo, lastAvailableCLONumber)
    }

    function createFirstCLODetailRow() {
        const data = "<div id=\"CourseLearningRow-1\" class=\"flex w-full learning-outcome-row\">\n" +
            "                                        <div class=\"cprofile-column h-10 w-24 bg-catalystBlue-l61 text-white\" id=\"nameCLO-1\">\n" +
            "                                            <span class=\"cprofile-cell-data\" data-clod-no ='c1-no'>CLO-1</span>\n" +
            "                                        </div>\n" +
            "                                        <div class=\"cprofile-column h-10 w-3/4\">\n" +
            "                                            <!-- <span class=\"cprofile-cell-data\">Understanding the role of Indesign and its major activities within the OO software</span>-->\n" +
            "                                            <label for=\"descriptionCLO-1\"></label>\n" +
            "                                            <input type=\"text\" class=\"cell-input min-w-full\" name='courseCLOs[CLO-1][Description]' data-clod-desc ='c1-desc'  value=\"\" placeholder=\"Enter CLO description\" id=\"descriptionCLO-1\">\n" +
            "\n" +
            "                                        </div>\n" +
            "                                        <div class=\"cprofile-column h-10 w-1/6\">\n" +
            "                                            <label for=\"undergraduateCLO-1\"></label>\n" +
            "                                            <input type=\"text\" class=\"cell-input\" name='courseCLOs[CLO-1][Domain]' data-clod-domain ='c1-domain' value=\"Undergraduate\" id=\"undergraduateCLO-1\" readonly=\"\">\n" +
            "                                        </div>\n" +
            "                                        <div class=\"cprofile-column h-10 w-1/6\">\n" +
            "                                            <div class=\"flex flex-row\">\n" +
            "                                                <input type=\"text\" class=\"cell-input h-10 min-w-0\" data-clod-bt ='c1-bt' name='courseCLOs[CLO-1][BTLevel]' value=\"\" placeholder=\"Enter BT-Level\" id=\"btLevelCLO-1\">\n" +
            "                                                <label for=\"btLevelCLO-1\"></label>\n" +
            "                                                <img class=\"h-10 w-6 cursor-pointer\" alt=\"\" src=\"../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg\" data-clo-des=\"remove\">\n" +
            "                                            </div>\n" +
            "                                        </div>\n" +
            "                                    </div>"

        var frag = document.createDocumentFragment();
        var elem = document.createElement('div');
        elem.innerHTML = data;
        while (elem.childNodes[0]) {
            frag.appendChild(elem.childNodes[0]);
        }
        return frag;
    }

    function createFirstCLOMapRow(totalPlo) {

        let container = '<div id="clo-map-div-1" class="flex w-full items-start text-black uppercase text-center text-md font-medium bg-gray-200 h-10">\n' +
            '                                        <svg class="hidden tick-icon">\n' +
            '                                            <symbol id="check-tick" viewbox="0 0 12 10">\n' +
            '                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>\n' +
            '                                            </symbol>\n' +
            '                                        </svg>\n' +
            '                                        <div class="cprofile-column h-10 bg-catalystBlue-l61 text-white w-1/6">\n' +
            '                                            <span class="cprofile-cell-data">CLO-1</span>\n' +
            '                                        </div>\n' +
            '                                    </div>';

        outcomeMapContainer.innerHTML += container;

        let header = document.getElementById('cloMapHeaderID');
        let clo_map_row_div = document.getElementById('clo-map-div-1');
        header.innerHTML = `<div class="cprofile-column h-10 w-1/6"> 
                                <span class="cprofile-cell-data">PLOs</span>
                            </div>`

        for (let i = 1; i <= totalPlo; i++) {
            let header_number = `<div class="cprofile-column h-10 w-1/6"> 
                                    <span class="cprofile-cell-data">${i}</span> 
                                </div>`
            header.innerHTML += header_number;

            let row_data = `<div class="cprofile-column h-10 w-1/6"> 
                                <input class="clo-toggle hidden" id="clo-1-plo-${i}" value="clo-1-plo-${i}" name="[clo-1][plo-${i}]" type="checkbox" />
                                <label class="inside-label cprofile-cell-data" for="clo-1-plo-${i}">
                                <span> <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg> </span>
                                </label> 
                            </div>`
            clo_map_row_div.innerHTML += row_data;
        }
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
        lastAvailableCLONumber = --incrementClo;

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

    function showErrorBox(message) {
        $('#errorID span').text("Empty Alert!")
        $('#errorID').textNodes().first().replaceWith(message);
        $("#errorMessageDiv").toggle("hidden").animate(
            {right: 0,}, 1000, function () {
                $(this).delay(3000).fadeOut();
            });
    }

    function uniqueName(str, CLONumber) {
        return str.replace(lastAvailableCLONumber, CLONumber);
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

jQuery.fn.textNodes = function () {
    return this.contents().filter(function () {
        return (this.nodeType === Node.TEXT_NODE && this.nodeValue.trim() !== "");
    });
}