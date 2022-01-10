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

    let backArrow = document.getElementsByClassName('mx-2 h-6')[0]

    const outcomeLearningContainer = document.getElementById("courseLearningDivID");
    const outcomeMapContainer = document.getElementById("courseMappingDivID");

    const cEssentialSection = document.getElementById('cpEssentialID');
    const cDetailSection = document.getElementById('cpDetaillID');
    const cDistributionSection = document.getElementById('cpDistributionID');

    const addOutcomeBtn = document.getElementById('add-clo-btn');

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

        })

        $("#coursepContinuebtn-1").on("click", function (e) {
            e.preventDefault();
            completeFlag = true;
            checkEmptyFields(fieldsArray, 1);
            checkBackArrow();
        });

        $('#coursepContinuebtn-2').on('click', function (e) {
            e.preventDefault();
            completeFlag = true;
            checkEmptyFields(fieldsArray_2, 2);
            checkBackArrow();
        });

        $('#coursepContinuebtn-3').on('click', function (e) {
            e.preventDefault();
            completeFlag = true;

            if (outcomeLearningContainer.children.length < 2) { // generate alert
                $("main").addClass("blur-filter");
                $("#alertContainer").removeClass("hidden");
                $("#alertBtnCLOCreation").add("#alertBtnCLOContinue").on('click', function () {
                    $("main").removeClass("blur-filter");
                    $("#alertContainer").addClass("hidden");
                })
            } else {
                let tempArray = ["nameCLO-1", "descriptionCLO-1", "undergraduateCLO-1", "btLevelCLO-1"];
                const array = new Array(incrementClo);
                /*for (let i = 0 ;  i < incrementClo ;  i++){

                    $("input:checkbox[name='clo "+(i+1)+"']:checked").each(function () {
                        // array.push($(this).val());
                        array[i].push($(this).val())
                    });
                }
                console.log(array)*/

            }
        });

        $(addOutcomeBtn).on('click', function (event) {
            addCLODetail_Mapping();

            $("img[data-clo-des='remove']").click(function (event) {
                event.stopImmediatePropagation()
                // const dischargedIndex = $(event.target).closest('.learning-outcome-row').attr('id').replace(/^\D+/g, '');  // clo-3 ya clo-2 us ma sa 3 ya 2 ko extract kary ga.
                const dischargedIndex = $(event.target).closest('.learning-outcome-row').index();

                $(event.target).closest('.learning-outcome-row').remove();
                $('#clo-map-div-' + dischargedIndex).remove();
                reindexingDetail_Mapping(parseInt(dischargedIndex));

                console.log(incrementClo , lastAvailableCLONumber)
            })
        });

        $(backArrow).on("click", function (e) {
            if (!$(cDetailSection).hasClass("hidden")) {                // 2nd section to move to 1st section.
                $(cEssentialSection).toggleClass("hidden");             // open first section.
                $(cDetailSection).toggleClass("hidden");                // close second section.
                checkBackArrow();
            } else if (!$(cDistributionSection).hasClass("hidden")) {     // if on third page then go to 2nd.
                $(cDistributionSection).toggleClass("hidden");
                $(cDetailSection).toggleClass("hidden");
                checkBackArrow();
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
    function addCLODetail_Mapping() {
        if (incrementClo === 0) {
            lastAvailableCLONumber = ++incrementClo;
            // outcomeLearningContainer.innerHTML += createFirstCLODetailRow();
            outcomeLearningContainer.append(createFirstCLODetailRow())

            createFirstCLOMapRow(12); // pass no of PLOs you have per curriculum.
        }
        else {
            const newCLORowDetail = document.getElementById('CourseLearningRow-' + lastAvailableCLONumber);
            outcomeLearningContainer.appendChild(createCLORow(newCLORowDetail, 1, lastAvailableCLONumber + 1));

            //Creates a CLO Mapping Row
            const newCLORowMapping = document.getElementById('clo-map-div-' + lastAvailableCLONumber);
            outcomeMapContainer.appendChild(createCLORow(newCLORowMapping, 2, lastAvailableCLONumber + 1));

            lastAvailableCLONumber = ++incrementClo;
            console.log(lastAvailableCLONumber , incrementClo)
        }
    }


    function reindexingDetail_Mapping(setFromIndex) {
        if (setFromIndex === lastAvailableCLONumber)
            lastAvailableCLONumber--;
        incrementClo--;
        // lastAvailableCLONumber--;

        // console.log( incrementClo, lastAvailableCLONumber , setFromIndex , $(outcomeLearningContainer).children())

        if (incrementClo !==0){

            $(outcomeLearningContainer).children().each(function(index)
            {
                if (index !==0 && setFromIndex <= index){
                    $(this).children().each(function (i) {
                        overrideCLODetail_Mapping_Row(index , i , this)
                    });
                }
            });

            $(outcomeMapContainer).children().each(function (index) {
                if (index !==0 && setFromIndex <= index){
                    this.setAttribute("id" , "clo-map-div-"+index)
                    $(this).children().each(function (i) {
                        if (i > 1){
                            const c_input = this.firstElementChild;
                            const c_label = this.lastElementChild;
                            console.log(c_input.getAttribute("name") ,  lastAvailableCLONumber)
                            c_input.setAttribute("name", "clo"+index );
                            c_input.setAttribute("id", ("clo-"+index+"-plo-"+(i-1) ));
                            c_input.setAttribute("value",("clo-"+index+"-plo-"+(i-1)) );
                            c_label.setAttribute("for", ("clo-"+index+"-plo-"+(i-1)) );
                        }else if ( i === 1){
                            this.innerHTML = "CLO-" + index;
                        }
                    });
                }


            })
        }
        else{
            $('#cloMapHeaderID').html(`<div class="cprofile-column h-10 w-1/6">
                                            <span class="cprofile-cell-data">PLOs</span>
                                        </div>`);
        }
    }

    function overrideCLODetail_Mapping_Row(index , i, currentTag) {
        if (i === 0) {
            currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index));  // div us ka ID change ki hai.
            let span = currentTag.firstElementChild;
            span.innerHTML = "CLO-" + index;
        } else if (i === 1 || i === 2) {
            let label = currentTag.firstElementChild;
            let input = currentTag.lastElementChild;
            label.setAttribute("for", uniqueName(input.getAttribute("id"), index));
            input.setAttribute("id", uniqueName(input.getAttribute("id"), index));
        } else if (i === 3) {
            let input = currentTag.firstElementChild.firstElementChild;
            input.setAttribute("id", uniqueName(input.getAttribute("id"), index));
            let label = currentTag.firstElementChild.childNodes[3];
            label.setAttribute("for" , uniqueName(input.getAttribute("id"), index))
        }
    }

    checkBackArrow();
    function checkBackArrow() {
        if (!cEssentialSection.classList.contains("hidden")) {
            backArrow.classList.add("hidden");

        } else {
            if (backArrow.classList.contains("hidden"))
                backArrow.classList.remove("hidden");
        }
    }

    function createCLORow(replicaNode, t, CLONumber) {

        const node = replicaNode.cloneNode(true);
        let cloColumn = [];
        setTagAttribute(node, CLONumber);

        if (t === 1) {
            for (let i = 0; i < node.childNodes.length; i++) {  // length will be total no of columns i.e. divs in that row.
                if (i % 2 !== 0)
                    cloColumn.push(node.childNodes[i]);
            }

            cloColumn.forEach(function (currentTag, index) {
                overrideCLODetail_Mapping_Row(CLONumber ,index  , currentTag)
                /*if (index === 0) {
                    currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id"), CLONumber));  // div us ka ID change ki hai.
                    let span = currentTag.firstElementChild;
                    span.innerHTML = "CLO-" + CLONumber;
                } else if (index === 1 || index === 2) {
                    let label = currentTag.firstElementChild;
                    let input = currentTag.lastElementChild;
                    label.setAttribute("for", uniqueName(input.getAttribute("id"), CLONumber));
                    input.setAttribute("id", uniqueName(input.getAttribute("id"), CLONumber));
                } else if (index === 3) {
                    let input = currentTag.firstElementChild.firstElementChild;
                    input.setAttribute("id", uniqueName(input.getAttribute("id"), CLONumber));
                    let label = currentTag.firstElementChild.childNodes[3];
                    label.setAttribute("for" , uniqueName(input.getAttribute("id"), CLONumber))
                }*/
            });
            // outcomeLearningContainer.appendChild(node);
            return node;

        }
        else {

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
    function uniqueName(str, CLONumber) {
        return str.replace(lastAvailableCLONumber, CLONumber);
    //  return str.replace(/1/g, incrementClo);
    }

    function uniquePLO(str, c, CLONumber) {
        return "clo-" + CLONumber + "-plo-" + c;
    }

    function checkEmptyFields(fieldsArray, counter) {  //textField-error-input
        for (let i = 0; i < fieldsArray.length; i++)
            iterate(fieldsArray[i]);

        if (counter === 1) {
            if (completeFlag) {
                $('#cpEssentialID').addClass("hidden");
                $('#cpDetaillID').removeClass("hidden");
            } else {
                showErrorBox("Please complete all fields to continue")
            }
        } else if (counter === 2) {
            if (completeFlag) {
                $('#cpDetaillID').addClass("hidden");
                $('#cpDistributionID').removeClass("hidden");

            } else showErrorBox("Please fill all fields to continue");
        }
    }

    function iterate(currentField) {
        if (currentField.value.length === 0) {
            completeFlag = false;
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
            {right: 0,}, 1000, function () {
                $(this).delay(3000).fadeOut();
            });
    }

    function createFirstCLODetailRow() {
        const data = "<div id=\"CourseLearningRow-1\" class=\"flex w-full learning-outcome-row\">\n" +
            "                                        <div class=\"cprofile-column h-10 w-24 bg-catalystBlue-l61 text-white\" id=\"nameCLO-1\">\n" +
            "                                            <span class=\"cprofile-cell-data\">CLO-1</span>\n" +
            "                                        </div>\n" +
            "                                        <div class=\"cprofile-column h-10 w-3/4\">\n" +
            "                                            <!-- <span class=\"cprofile-cell-data\">Understanding the role of Indesign and its major activities within the OO software</span>-->\n" +
            "                                            <label for=\"descriptionCLO-1\"></label>\n" +
            "                                            <input type=\"text\" class=\"cell-input min-w-full\" value=\"\" placeholder=\"Enter CLO description\" id=\"descriptionCLO-1\">\n" +
            "\n" +
            "                                        </div>\n" +
            "                                        <div class=\"cprofile-column h-10 w-1/6\">\n" +
            "                                            <label for=\"undergraduateCLO-1\"></label>\n" +
            "                                            <input type=\"text\" class=\"cell-input\" value=\"Undergraduate\" id=\"undergraduateCLO-1\" readonly=\"\">\n" +
            "                                        </div>\n" +
            "                                        <div class=\"cprofile-column h-10 w-1/6\">\n" +
            "                                            <div class=\"flex flex-row\">\n" +
            "                                                <input type=\"text\" class=\"cell-input h-10 min-w-0\" value=\"\" placeholder=\"Enter BT-Level\" id=\"btLevelCLO-1\">\n" +
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
                                <input class="clo-toggle hidden" id="clo-1-plo-${i}" value="clo-1-plo-${i}" name="clo1" type="checkbox" />
                                <label class="inside-label cprofile-cell-data" for="clo-1-plo-${i}">
                                <span> <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg> </span>
                                </label> 
                            </div>`
            clo_map_row_div.innerHTML += row_data;
        }
    }

    function setTagAttribute(newReplica, CLONmber) {
        if (newReplica.hasAttribute("id"))
            newReplica.setAttribute("id", uniqueName(newReplica.getAttribute("id"), CLONmber));
    }
}

jQuery.fn.textNodes = function () {
    return this.contents().filter(function () {
        return (this.nodeType === Node.TEXT_NODE && this.nodeValue.trim() !== "");
    });
}

/*    function createCLORow(replicaNode, t) {

        const node = replicaNode.cloneNode(true);
        let cloColumn = [];
        setTagAttribute(node);

        if (t === 1) {
            for (let i = 0; i < node.childNodes.length; i++) {  // length will be total no of columns i.e. divs in that row.
                if (i % 2 !== 0)
                    cloColumn.push(node.childNodes[i]);
            }

            cloColumn.forEach(function (currentTag, index) {
                if (index === 0) {
                    currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id")));  // div us ka ID change ki hai.
                    // let span = currentTag.childNodes[1];
                    let span = currentTag.firstElementChild;
                    span.innerHTML = "CLO-" + incrementClo;
                } else if (index === 1 || index === 2) {
                    let input = currentTag.lastElementChild;
                    input.setAttribute("id", uniqueName(input.getAttribute("id")));
                } else if (index === 3) {
                    let input = currentTag.firstElementChild.firstElementChild;
                    input.setAttribute("id", uniqueName(input.getAttribute("id")));
                }
            });
            // clo_row.parentNode.appendChild(replicaNode);
            outcomeLearningContainer.appendChild(node);


        } else {

            // console.log(node.childNodes[3])
            node.childNodes[3].innerHTML = "CLO-" + incrementClo;
            for (let i = 5; i < node.childNodes.length; i++) {  // length will be total no of columns i.e. divs in that row.
                cloColumn.push(node.childNodes[i]);
            }
            // console.log(cloColumn.length)
            // console.log(cloColumn)
            cloColumn.forEach(function (currentTag, index) {
                // console.log(incrementClo + "\t\t" + (index + 1))
                const c_input = currentTag.firstElementChild;
                const c_label = currentTag.lastElementChild;
                c_input.setAttribute("name", uniqueName(c_input.getAttribute("name")));
                c_input.setAttribute("id", uniquePLO(c_input.getAttribute("id"), (index + 1)));
                c_label.setAttribute("for", uniquePLO(c_label.getAttribute("for"), (index + 1)));
            });
            // map_clo_row.parentNode.appendChild(replicaNode);
            outcomeMapContainer.appendChild(node);
        }

    }*/
/*        $('#add-clo-btn').on('click', function (e) {


    if (incrementClo === 0) {
        ++incrementClo;
        outcomeLearningContainer.innerHTML += createFirstCLODetailRow();
        createFirstCLOMapRow(12); // pass no of PLOs you have per curriculum.

        /!*$('input[name="clo1"]').on('click', function () {
            // console.log(this);
        });
*!/

    } else {
        ++incrementClo;  // 2
        const ma1 = document.getElementById('CourseLearningRow-1');
        createCLORow(ma1, 1);

        //Creates a CLO Mapping Row
        const ma2 = document.getElementById('clo-map-div-1');
        createCLORow(ma2, 2);
    }
});*/
/*$(document).on('click', ".h-10 .w-6", function (e) {
    const toRemove_CLO = $(this).closest('.learning-outcome-row').attr('id').replace(/^\D+/g, '');
    $(this).closest('.learning-outcome-row').remove(); // CLO Detail i.e description , bt level , domain..
    $('#clo-map-div-' + toRemove_CLO).remove();
    console.log("here it is : "+ toRemove_CLO , "\t" , lastAvailableCLONumber +"\t" + incrementClo)
    if(toRemove_CLO === lastAvailableCLONumber){
        lastAvailableCLONumber--;
    }
    incrementClo--;
    console.log("CLOs After Removal: ", incrementClo)
    if (incrementClo === 0) {
        $('#cloMapHeaderID').html(`<div class="cprofile-column h-10 w-1/6">
                                    <span class="cprofile-cell-data">PLOs</span>
                                </div>`);   }
});*/
/*
    function setTagAttribute(newReplica) {
        if (newReplica.hasAttribute("id"))
            newReplica.setAttribute("id", uniqueName(newReplica.getAttribute("id")));
    }
*/
/*   $(window).on('beforeunload', function (e) {
       e.preventDefault();
       e.returnValue = '';
       //    Are you sure you want to navigate away from the Test Runner

   });

   $(window).on('onunload', function (e) {
       var r = confirm('Are you sure you want to stop the Test Runner?');
       if (r === true) {
           console.log('leaving');
       } else
           console.log("leaving unsaved");
   });*/