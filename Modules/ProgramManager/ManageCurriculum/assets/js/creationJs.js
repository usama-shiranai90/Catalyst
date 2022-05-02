window.onload = function (e) {
    let curriculumCounter = 0; // use for counting number of rows a PLO is added.
    let recentlyCreatedCurriculumPloArray; // then create button is clicked , the variable stores the row data in array format.
    let assignCurriculumYear; //

    /** Fields list for curriculum */
    const selectedProgramField = document.getElementById('curriculumProgramId');
    const selectedCurriculumYearField = document.getElementById('curriculumAssignYearID');
    const selectedCurriculumSeasonNameField = document.getElementById('curriculumSeasonNameId')
    const selectedPloField = document.getElementById('noOfPLOsToCreateId')

    const importBoxCreateBtn = document.getElementById('importBoxCreateBtnID'); // create.

    /** container section for creation */
    const parentFormCurriculumContainer = document.getElementById('curriculumFormCreationId');
    const curriculumContainerHeader = document.getElementById('cCurriculumHeaderId');
    const creationCurriculumSection = document.getElementById('creationCurriculumSectionId');

    /** for adding more rows to creation section */
    const addMoreCurriculumBtn = document.getElementById('addMoreCurriculumBtn');
    const saveButtonCurriculumBtn = document.getElementById('saveNewlyCreatedCurriculumBtnId');

    $(document).ready(function () {
        $(document).ajaxSend(function () {
            $("#loader").fadeIn(1000);
        });

        /** when curriculum year is selected , firstly we remove old options list then we call createCurriculumSeasonDropDown to create newly years list. */
        $(selectedCurriculumYearField).on('change', function (e) {
            const value = this.value; // 2023
            if (value !== "" && value.length !== 0) {
                $(selectedCurriculumSeasonNameField).children().slice(1).remove(); // delete all previous children options.
                $(selectedCurriculumSeasonNameField).attr("value", "").append(createCurriculumSeasonDropDown(value));
            }
        });

        /** Create Button is clicked , check if all fields are completely filled.
         * if filled then PLO table row by calling  initialRowChecker */
        $(importBoxCreateBtn).on('click', function (event) {
            event.stopPropagation();

            let notEmptyField = containsEmptyField([selectedProgramField, selectedCurriculumYearField, selectedCurriculumSeasonNameField, selectedPloField]);
            if (notEmptyField) {
                // console.log($(parentFormCurriculumContainer).not(curriculumContainerHeader))
                // $(parentFormCurriculumContainer).not(curriculumContainerHeader).remove(); // if previously curriculums are added.

                let size = selectedPloField.value; // 3
                $(creationCurriculumSection).children(".h-60.text-center").addClass("hidden"); // Text: Limit for PLO not selected. hide
                $(creationCurriculumSection).children(":last-child").removeClass("hidden"); // section of PLO. unhidden
                $(parentFormCurriculumContainer).children().slice(1).remove();// curriculum form creation:first child ( 0-index ) => header chor kr sb delete kr do...

                for (let i = 0; i < size; i++) { // 3 is use to create table rows where size is noOfPLOs.
                    initialRowChecker();
                }
            }
        });

        /** Adding more PLO */
        $(addMoreCurriculumBtn).on('click', function (e) {
            initialRowChecker();
        })

        /** when delete icon is pressed remove the row and reiterate for PLO number. */
        let dischargedIndex = 0;
        $(document).on('click', "img[data-coc-remove='remove']", function (event) {
            event.stopImmediatePropagation();

            dischargedIndex = $(this).closest('.learning-outcome-row.h-auto').attr("id").match(/\d+/)[0]; // extract the numeric value. i.e. creationCurriculumRow-3 > 3
            deleteCurriculumRow(dischargedIndex, false);
        });


        $(saveButtonCurriculumBtn).on('click', function () {
            assignCurriculumYear = selectedCurriculumYearField.value; // assign year value. 2022
            const curriculumName = selectedCurriculumSeasonNameField.value; // spring 2022 ya fall 2022 jo bi selected ho ga.

            recentlyCreatedCurriculumPloArray = [];

            /** iterate over table all children including header and all rows. to store its PLO number and description in array. */
            $(parentFormCurriculumContainer).children().each((index, node) => {
                if (index !== 0) {
                    /** skipping 0 for header tag */

                    const curriculumObject = new Curriculum();
                    const curriculumRowRecordList = ['#creationCurriculum-No-r-' + index, '#detail-r-' + index];

                    for (let i = 0; i < curriculumRowRecordList.length; i++) {
                        if (i === 0) {
                            if ($(curriculumRowRecordList[i]).val() === '')
                                curriculumObject.setploNumber = $(curriculumRowRecordList[i]).attr("placeholder") // PLO-1 to PLO-n save curriculumObject.setploNumber.
                            else
                                curriculumObject.setploNumber = $(curriculumRowRecordList[i]).val()
                        } else { // PLO Description ...
                            curriculumObject.setploDescription = $(curriculumRowRecordList[i]).val()
                            recentlyCreatedCurriculumPloArray.push(curriculumObject)
                        }
                    }
                }
            })

            console.log("All Curriculum List : ", recentlyCreatedCurriculumPloArray, assignCurriculumYear, curriculumName)

            createCurriculumAjaxCall(recentlyCreatedCurriculumPloArray, assignCurriculumYear, curriculumName);
        });

    });

    /** use to create related year season drop down options. */
    function createCurriculumSeasonDropDown(value) { // value year no i.e. 2023
        let seasonList = ['Fall', 'Spring'];
        let options = '';
        for (let i = 0; i < seasonList.length; i++) {
            const temp = seasonList[i] + " " + value; // Fall 2023
            options += `<option value="${temp}">${temp}</option>`;
        }
        return options;
    }

    /** use to create delete row from curriclum table. */
    function deleteCurriculumRow(dischargedIndex, hasKeyFlag) {
        $(('#creationCurriculumRow-' + dischargedIndex)).remove(); // remove the selected row. i.e. #creationCurriculumRow-3

        curriculumCounter = iterateCurriculumRow(parentFormCurriculumContainer, parseInt(dischargedIndex), curriculumCounter, hasKeyFlag);
    }

    /** the function is used to create additional row of PLO. */
    function initialRowChecker() {
        let size = $(parentFormCurriculumContainer).children().length; // 2, get size of containers children i.e. header and curriculumRows.
        curriculumCounter = size; // assign that into curriculumCounter
        if (size === 1) { // no curriculumRows , only header exist.
            $(parentFormCurriculumContainer).append(createAdditionalRow(1, null));
        } else {
            $(parentFormCurriculumContainer).append(createAdditionalRow(curriculumCounter, null));
        }

        /*     (size === 1) ? $(parentFormCurriculumContainer).append(createAdditionalRow(1, null))
            : $(parentFormCurriculumContainer).append(createAdditionalRow(curriculumCounter, null));*/
    }

    function createCurriculumAjaxCall(recentlyCreatedCurriculumArray, assignCurriculumYear, curriculumName) {
        $.ajax({
            type: "POST", //  HTTP web server pr kn sa format ka data send kr rahy ho. POST
            url: 'assets/CurriculumAjax.php',
            // timeout: 500,
            // cache: false,
            data: {
                creation: true,// its an operation.
                curriculumPloArray: recentlyCreatedCurriculumArray,
                assignCurriculumYear: assignCurriculumYear, // $_POST['assignCurriculumYear'] -> 2022
                curriculumName: curriculumName
            },
            beforeSend: function () {
                $("body").append(addLoader());
                $("main").toggleClass("blur-filter")
                $('#loader').toggleClass('hidden') // remove hidden class.
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (data, status) {
                const responseText = JSON.parse(data)
                console.log(responseText) // responseText [status:1 , message : "" , error:"none"]

                if (responseText.status === 1 && responseText.errors === 'none') {
                    setInterval(function () {
                        $("main").toggleClass("blur-filter");
                        $('#loader').remove();
                        location.href = "manageCurriculum.php";
                    }, 2000);
                } else {
                    $('body').append(popupErrorNotifier("Server Response Failed", responseText.message));
                    $("#errorMessageDiv").toggle("hidden").animate(
                        {right: 0,}, 3000, function () {
                            $(this).delay(5000).fadeOut().remove();
                        });
                }

            },
        });
    }
}
