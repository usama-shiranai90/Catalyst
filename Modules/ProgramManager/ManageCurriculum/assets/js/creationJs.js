window.onload = function (e) {
    let curriculumCounter = 0; // use for counting number of rows a PLO is added.
    let recentlyCreatedCurriculumPloArray; // then create button is clicked , the variable stores the row data in array format.
    let assignCurriculumYear; //

    /** Fields list for curriculum */
    const selectedProgramField = document.getElementById('curriculumProgramId');
    const selectedCurriculumProgramYearField = document.getElementById('curriculumAllocationYearId');
    const selectedAssignCurriculumRevisedSeason = document.getElementById('curriculumRevisedSeasonId')
    const selectedPloField = document.getElementById('noOfPLOsToCreateId')

    const selectionBoxCurriculumContainer = document.getElementById('curriculumBoxContainerID');
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

        $(selectedCurriculumProgramYearField).on('change', function (e) {
            const value = this.value;
            if (value !== "") {
                $(selectedAssignCurriculumRevisedSeason).children().slice(1).remove();
                $(selectedAssignCurriculumRevisedSeason).attr("value", "").append(createCurriculumSeasonDropDown(value));
            }
        });

        $(importBoxCreateBtn).on('click', function (event) {
            event.stopPropagation();

            let hasEmptyField = containsEmptyField([selectedProgramField, selectedCurriculumProgramYearField, selectedPloField]);
            if (hasEmptyField) {
                let size = $(selectedPloField).val();
                $(creationCurriculumSection).children(".h-60.text-center").addClass("hidden");
                $(creationCurriculumSection).children(":last-child").removeClass("hidden");

                // $(parentFormCurriculumContainer).not(curriculumContainerHeader).remove(); // if previously curriculums are added.
                $(parentFormCurriculumContainer).children().slice(1).remove();

                console.log($(parentFormCurriculumContainer).not(curriculumContainerHeader))
                for (let i = 0; i < size; i++) {
                    initialRowChecker();
                }
            }
        });

        $(addMoreCurriculumBtn).on('click', function (e) {
            initialRowChecker();
        })

        let dischargedIndex = 0;
        $(document).on('click', "img[data-coc-remove='remove']", function (event) {
            event.stopImmediatePropagation();
            dischargedIndex = $(event.target).closest('.learning-outcome-row.h-auto').attr("id").match(/\d+/)[0]; // extract the numeric value.
            deleteCurriculumRow(dischargedIndex, false);
        });

        $(saveButtonCurriculumBtn).on('click', function () {
            assignCurriculumYear = $(selectedCurriculumProgramYearField).val();
            recentlyCreatedCurriculumPloArray = [];
            let counter = 0;
            $(parentFormCurriculumContainer).children().each((index, node) => {
                if (index !== 0) {
                    var temp = new Curriculum();
                    /** skipping 0 for header tag */
                    const curriculumRowRecordList = ['#creationCurriculum-No-r-' + index, '#detail-r-' + index];
                    for (let i = 0; i < curriculumRowRecordList.length; i++) {
                        if (i === 0) {
                            if ($(curriculumRowRecordList[i]).val() === '')
                                temp.setploNumber = $(curriculumRowRecordList[i]).attr("placeholder")
                            else
                                temp.setploNumber = $(curriculumRowRecordList[i]).val()
                        } else {
                            temp.setploDescription = $(curriculumRowRecordList[i]).val()
                            recentlyCreatedCurriculumPloArray.push(temp)
                            counter++;
                        }
                    }
                }
            })
            console.log("All Curriculum List : ", recentlyCreatedCurriculumPloArray, assignCurriculumYear)

            const curriculumName = selectedAssignCurriculumRevisedSeason.getAttribute("value");

            console.log(recentlyCreatedCurriculumPloArray, assignCurriculumYear, curriculumName )

            createCurriculumAjaxCall(recentlyCreatedCurriculumPloArray, assignCurriculumYear, curriculumName);
        });

    });

    /** use to create related year season drop down options. */
    function createCurriculumSeasonDropDown(value) {
        let seasonList = ['Fall', 'Spring'];
        let options = '';
        for (let i = 0; i < seasonList.length; i++) {
            const temp = seasonList[i] + " " + value;
            options += `<option value="${temp}">${temp}</option>`;
        }
        return options;
    }

    /** use to create delete row from curriclum table. */
    function deleteCurriculumRow(dischargedIndex, hasKeyFlag) {
        $(('#creationCurriculumRow-' + dischargedIndex)).remove();
        curriculumCounter =  iterateCurriculumRow(parentFormCurriculumContainer, parseInt(dischargedIndex) , curriculumCounter , hasKeyFlag);
    }

    function initialRowChecker() {
        let size = $(parentFormCurriculumContainer).children().length;
        curriculumCounter = size;
        (size === 1) ? $(parentFormCurriculumContainer).append(createAdditionalRow(1, null))
            : $(parentFormCurriculumContainer).append(createAdditionalRow(curriculumCounter, null));
    }

    function createCurriculumAjaxCall(recentlyCreatedCurriculumArray, assignCurriculumYear, curriculumName) {
        $.ajax({
            type: "POST",
            url: 'assets/CurriculumAjax.php',
            timeout: 500,
            cache: false,
            data: {
                creation: true,
                curriculumPloArray: recentlyCreatedCurriculumArray,
                assignCurriculumYear: assignCurriculumYear,
                curriculumName: curriculumName
            },
            beforeSend: function () {
                $("body").append(addLoader());
                $("main").toggleClass("blur-filter")
                $('#loader').toggleClass('hidden')
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (data, status) {
                const reponseText = JSON.parse(data)
                console.log(reponseText)
                if (reponseText.status === 1 && reponseText.errors === 'none') {
                }

            },
            complete: function (data) {
                setInterval(function () {
                    $("main").toggleClass("blur-filter");
                    $('#loader').remove();
                    location.href = "manageCurriculum.php";
                }, 2000);
            },
        });
    }
}
