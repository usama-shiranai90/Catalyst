let incrementClo = 0;
let completeFlag = true;

/** Course Profile Container arrays */
let courseEssentialFieldValue = [];  // contains all Essential field values.
let courseDetailFieldValue = [];    // contains all Detail field values.

let allCourseCLOsDetailValues = [];   // contains CLO Distribution CLO values.
let allCourseCLOsMapValues = [];     // contains CLO Distribution CLO-PLO Mapping values.

let initialCLOsDescriptionIDs = []; //

let recentlyAddedDescriptionValues = [];
let recentlyAddedMappingValues = [];

let deletedCLOsDescriptionIDs = [];
let deletedCLOsPLOsMapIDs = [];

let updateCLOsDescription = {};
let updateCLOsToPLOsMap = {};

window.onload = function (e) {

    /** Course Profile Input Textarea and Selectors Fields */
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
    let courseEssentialFieldsArray = [cEssentialField.cTitleField, cEssentialField.cCodeField, cEssentialField.cHoursField, cEssentialField.cPreReqField,
        cEssentialField.cTermField, cEssentialField.cProgramLevelField, cEssentialField.cProgramField, cEssentialField.cEffectiveField,
        cEssentialField.cCoordinationField, cEssentialField.cMethodologyField, cEssentialField.cModelField,
        instrumentWeight.quizz_weight, instrumentWeight.assignment_weight, instrumentWeight.project_weight,
        instrumentWeight.mid_weight, instrumentWeight.final_weight];

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
    let courseDetailFieldsArray = [
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

    /** Course Profile Container ID's */
    const cEssentialSection = document.getElementById('cpEssentialID');
    const cDetailSection = document.getElementById('cpDetaillID');
    const cDistributionSection = document.getElementById('cpDistributionID');

    const outcomeLearningContainer = document.getElementById("courseLearningDivID");
    const outcomeMapContainer = document.getElementById("courseMappingDivID");

    /** Course Profile Container back arrow and  */
    const addOutcomeBtn = document.getElementById('add-clo-btn');
    let backArrow = document.getElementsByClassName('mx-2 h-6')[0]

    $(document).ready(function () {
        /**  Checks if fields and selectors are empty or not are empty   **/
        $('.textField , .select').on('input', function (e) {
            if (this.classList.contains("px-12")) {
                $(this).parent().removeClass().addClass("textField-label-content w-2/5");
            } else {
                if (this.type === "text" || this.type === "textarea")
                    $(this).parent().removeClass().addClass("textField-label-content w-full");
                else if (this.type === "select-one")
                    $(this).parent().removeClass().addClass("select-label-content w-full");
            }
        });

        /**  Course Essential Section Continue Button , checks empty fields and back-arrow pointer.   **/
        $("#coursepContinuebtn-1").on("click", function (e) {
            e.preventDefault();
            completeFlag = true;
            checkEmptyFields(courseEssentialFieldsArray, 1, courseEssentialFieldValue, instrumentWeight);
            arrowPositionCheck();
        });

        /**  Course Detail Section Continue Button , checks empty fields and back-arrow pointer   **/
        $('#coursepContinuebtn-2').on('click', function (e) {
            e.preventDefault();
            completeFlag = true;
            checkEmptyFields(courseDetailFieldsArray, 2, courseDetailFieldValue, null);
            arrowPositionCheck();
        });

        /**  Course Profile Creation create-button create   **/
        $('#coursepContinuebtn-3').on('click', function (e) {
            e.preventDefault();
            allCourseCLOsDetailValues = new Array(incrementClo);
            allCourseCLOsMapValues = new Array(incrementClo);
            storeDetailAndMappingToArray();
            // creationAjaxCall(allCourseCLOsDetailValues, allCourseCLOsMapValues, courseEssentialFieldValue, courseDetailFieldValue);

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

        /**  Course Profile Creation Update Button.   **/
        $('#courseProfileUpdationBtn').on('click', function (e) {
            e.preventDefault();
            allCourseCLOsDetailValues = new Array(incrementClo);
            allCourseCLOsMapValues = new Array(incrementClo);
            storeDetailAndMappingToArray();

            // updateAjaxCall(courseDetailFieldValue, courseCLOsMapValues, courseEssentialFieldValue, courseDetailFieldValue);
        });

        $(addOutcomeBtn).on('click', function (event) {
            if (incrementClo > 5)
                showErrorBox('CLO limit has exceed.')
            else
                initialCreationCLODetail_Mapping();
        });

        /** removes the Selected CLO along with its mapping. */
        $(document).on('click', "img[data-clo-des='remove']", function (event) {
            // const dischargedIndex = $(event.target).closest('.learning-outcome-row').index();
            // const dischargedIndex = $(event.target).closest('.learning-outcome-row').attr('id').replace(/^\D+/g, '');  // clo-3 ya clo-2 us ma sa 3 ya 2 ko extract kary ga.

            event.stopImmediatePropagation();
            const dischargedIndex = $(event.target).closest('.learning-outcome-row').attr("id").match(/\d+/)[0];

            if (viewType !== 1) {
                const deletedOutcomeID = $(event.target).closest('.learning-outcome-row').first().children(":first").attr("id");
                console.log("Deleted Index : ", dischargedIndex, " and S id :", deletedOutcomeID)

                if ((typeof deletedOutcomeID != 'undefined' && deletedOutcomeID !== null) && !isCharacterALetter(deletedOutcomeID)) { // If its
                    console.log("hello boi" + confirmationMessage());

                } else { // deletedOutcome ID is undefined.
                    $(('#CourseLearningRow-' + dischargedIndex)).remove();
                    $('#clo-map-div-' + dischargedIndex).remove();
                    iterateIndexDetail_Mapping(parseInt(dischargedIndex));
                }


            } else {
                $(('#CourseLearningRow-' + dischargedIndex)).remove();
                $('#clo-map-div-' + dischargedIndex).remove();
                iterateIndexDetail_Mapping(parseInt(dischargedIndex));
            }

        });

        /** It controls the visibility of section i.e. essential , detail and course distribution */
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

    });


    function storeDetailAndMappingToArray() {

        for (let i = 0; i < allCourseCLOsDetailValues.length; i++)
            allCourseCLOsDetailValues[i] = [];

        $('#courseLearningDivID div.cprofile-column.bg-catalystBlue-l61 span').each(function (node, index) {
            allCourseCLOsDetailValues[node].push($(this).text())
        })

        let extremeCounter = 0;
        let cycle = 0;
        $('#courseLearningDivID input').each(function () {
            if (extremeCounter === 0) { // des
                allCourseCLOsDetailValues[cycle].push($(this).val())
                extremeCounter++;
            } else if (extremeCounter === 1) {
                allCourseCLOsDetailValues[cycle].push($(this).val())
                extremeCounter++
            } else if (extremeCounter === 2) {
                allCourseCLOsDetailValues[cycle].push($(this).val())
                extremeCounter = 0;
                cycle++;
            }
        })

        for (let i = 0; i < incrementClo; i++) {
            allCourseCLOsMapValues[i] = [];
            $("input:checkbox[name^='[clo-" + (i + 1) + "']:checked").each(function () {
                allCourseCLOsMapValues[i].push($(this).val())
            });
        }

        // existingCLODescription

        if (viewType !== 1) {

            $('#courseLearningDivID div.cprofile-column.bg-catalystBlue-l61').each(function (node, index) {  // fetch IDs if exist.
                // if (isNum($(this).attr("id")))
                //     initialCLOsDescriptionIDs[node] = $(this).attr("id")
                if (isNum($(this).attr("id"))) {
                    // updateCLOsDescription.push(allCourseCLOsDetailValues[node]);
                    // iWillbeIDS.push(initialCLODescription[node][0]);
                    // allCourseCLOsDetailValues.splice(node, 1); // 2nd parameter means remove one item only
                    updateCLOsDescription['' + initialCLODescription[node][0]] = allCourseCLOsDetailValues[node];

                } else {
                    recentlyAddedDescriptionValues.push(allCourseCLOsDetailValues[node])
                    // console.log("hello Im not ID , " + this.id + this.target);
                }

            });

            console.log("After Fetching From outcomeContainer : ", allCourseCLOsDetailValues)
            console.log("After Fetching From MappingContainer : ", allCourseCLOsMapValues)

            console.log("Recently Added Description :", recentlyAddedDescriptionValues);
            console.log("Update Description  :", updateCLOsDescription);

            // console.log("DELETED ID", initialCLOsDescriptionIDs);
        }

    }

    function initialCreationCLODetail_Mapping() {
        if (incrementClo === 0) {
            ++incrementClo;
            // outcomeLearningContainer.innerHTML += createFirstCLODetailRow();
            outcomeLearningContainer.appendChild(createFirstCLODetailRow())

            createFirstCLOMapRow(ploArray.length, outcomeMapContainer); // pass no of PLO you have per curriculum.
        } else {
            const newCLORowDetail = document.getElementById('CourseLearningRow-' + incrementClo);
            // console.log("My new clo row : ", newCLORowDetail)
            outcomeLearningContainer.appendChild(createCLORow(newCLORowDetail, 1, incrementClo + 1));

            //Creates a CLO Mapping Row
            const newCLORowMapping = document.getElementById('clo-map-div-' + incrementClo);
            outcomeMapContainer.appendChild(createCLORow(newCLORowMapping, 2, incrementClo + 1));

            incrementClo++;
            // console.log("incremental Stage :", incrementClo)
        }
        // console.log(incrementClo)
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
                overrideCLODetail_Row(CLONumber, index, currentTag)
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

                $(c_input).attr('checked', false);

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
                        overrideCLODetail_Row(index, i, this)
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

    function overrideCLODetail_Row(index, i, currentTag) {
        if (i === 0) {
            // currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index));  // div us ka ID change ki hai.
            // currentTag.setAttribute("id", '');  // div us ka ID change ki hai.
            currentTag.removeAttribute('id');

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
                input.value = '';
            } else {
                input.setAttribute("name", "courseCLOs[CLO-" + index + "][Domain]");
                input.setAttribute("data-clod-domain", "c" + index + "-domain");
            }


        } else if (i === 3) {
            let input = currentTag.firstElementChild.firstElementChild;
            input.setAttribute("id", uniqueName(input.getAttribute("id"), index));
            input.setAttribute("name", "courseCLOs[CLO-" + index + "][BTLevel]");
            input.setAttribute("data-clod-bt", "c" + index + "-bt");
            input.value = '';
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

    function setTagAttribute(newReplica, clono) {
        if (newReplica.hasAttribute("id"))
            newReplica.setAttribute("id", uniqueName(newReplica.getAttribute("id"), clono));
    }

    function uniqueName(str, CLONumber) {
        return str.replace(incrementClo, CLONumber);
        //  return str.replace(/1/g, incrementClo);
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


    /** Course Profile Update  */
    if (viewType !== 1) {
        for (let i = 0; i < initialCLODescription.length; i++) {
            initialCreationCLODetail_Mapping();
        }
        updateValuesInCLODescriptionRow();
        updateCheckBoxInMappingRow();
    }

    function updateValuesInCLODescriptionRow() {
        let currentIndex = 0;
        $(outcomeLearningContainer).children().each(function (index) {
            if (index !== 0) {
                // $(this).attr("id", 'CourseLearningRow-' + existingCLODescription[currentIndex][0]);
                // incrementClo = existingCLODescription[currentIndex][0];
                $(this).children().each(function (i) {

                    if (i === 0) {
                        $(this).attr("id", initialCLODescription[currentIndex][0]);
                    } else if (i === 1) {
                        let input = this.lastElementChild;
                        $(input).val(initialCLODescription[currentIndex][i + 1]);


                    } else if (i === 3) {
                        let input = this.firstElementChild.firstElementChild;
                        $(input).val(initialCLODescription[currentIndex][i + 1]);
                        // console.log(existingCLODescription[currentIndex][i + 1])
                    }
                });
                currentIndex++;
            }
        });
    }

    function updateCheckBoxInMappingRow() {

        // let onlyMapping = [];
        // for (let i = 0; i < existingCLOMapping.length; i++) {
        //     console.log(existingCLOMapping[i])
        //     let temp = [];
        //     for (let j = 0; j < existingCLOMapping[i].length; j++) {
        //         temp.push(existingCLOMapping[i][j][1])
        //     }
        //     onlyMapping.push(temp)
        // }
        // console.log("Only mapping: ", onlyMapping)

        let counter = 0;
        $(outcomeMapContainer).children().each(function (index) { // all rows including left clo-number.
            if (index > 0) {  // mapping each row..
                // $(this).attr("id", 'clo-map-div-' + existingCLODescription[counter][0]);
                let childIndex = 0;
                $(this).children().each(function (secondIndex) {  // 8 blocks with 1 extra col.
                    if (secondIndex === 1) {
                        $(this).attr("id", 'c-' + initialCLODescription[counter][0]);
                    }
                    if (secondIndex > 1) { // skip extra-col
                        // console.log("size : ", onlyMapping[counter].length, secondIndex, $(this));

                        /** check the cprofile-column for checked box */
                        if (initialCLOMapping[counter].length !== childIndex) { //  3 !== 0
                            /*let getMappingNumber = onlyMapping[counter][childIndex].match(/\d+/)[0] //
                            let cloToPLOChecked_ID = this.firstElementChild.getAttribute("id")
                            console.log("the number is that ? " , getMappingNumber  ,  onlyMapping[counter])
                            if (getMappingNumber === cloToPLOChecked_ID.match(/\d+/g)?.[1]) {
                                this.setAttribute("id" , 'checked-'+onlyMapping[counter][childIndex])
                                let input = this.firstElementChild;
                                $(input).attr('checked', true);
                                childIndex++;
                            }*/

                            let getMappedNumber = initialCLOMapping[counter][childIndex][1].match(/\d+/)[0];
                            let cloToPLOChecked_ID = this.firstElementChild.getAttribute("id")

                            if (getMappedNumber === cloToPLOChecked_ID.match(/\d+/g)?.[1]) {
                                this.setAttribute("id", 'clo-' + initialCLODescription[counter][0] + "_plo-" + initialCLOMapping[counter][childIndex][0])
                                let input = this.firstElementChild;
                                $(input).attr('checked', true);
                                childIndex++;
                            }
                        }
                    }
                })
                counter++;
            }
        });
    }

}

$.fn.textNodes = function () {
    return this.contents().filter(function () {
        return (this.nodeType === Node.TEXT_NODE && this.nodeValue.trim() !== "");
    });
}

function creationAjaxCall(arrayCLO, arrayMapping, courseEssentialFieldValue, courseDetailFieldValue) {

    $.ajax({
        type: "POST",
        // dataType: "json",
        url: 'courseprofile_main.php?p=saved',
        data: {
            arrayCLO: arrayCLO, arrayMapping: arrayMapping,
            courseEssentialFieldValue: courseEssentialFieldValue, courseDetailFieldValue: courseDetailFieldValue,
            saved: true
        },
        success: function (data, textStatus) {
            console.log(data)
            location.href = "courseprofile_view.php";
        }
    });
}

function updateAjaxCall(arrayCLO, arrayMapping, courseEssentialFieldValue, courseDetailFieldValue) {

    console.log("Essential", courseEssentialFieldValue)
    console.log("detail", courseDetailFieldValue)
    console.log("clo", arrayCLO)
    console.log("mapping", arrayMapping)

    $.ajax({
        type: "POST",
        // dataType: "json",
        // url: 'CourseProfileCLOUpdate.php?p=update',
        data: {
            arrayCLO: arrayCLO,
            arrayMapping: arrayMapping,
            courseEssentialFieldValue: courseEssentialFieldValue,
            courseDetailFieldValue: courseDetailFieldValue,
            deletedCLODescriptionID: initialCLOsDescriptionIDs,
            update: true
        },
        success: function (data, textStatus) {
            console.log(data)
            // location.href = "courseprofile_view.php";
        }
    });
}

function deleteAjaxRow(currentCLOID) {
    $.ajax({
        type: "POST",
        url: 'CourseProfileCLODeletion.php?p=delete',
        data: {
            currentCLOID: currentCLOID,
            del: true
        },
        success: function (data, textStatus) {
            console.log(data)
            // location.href = "courseprofile_view.php";
        }
    });
}