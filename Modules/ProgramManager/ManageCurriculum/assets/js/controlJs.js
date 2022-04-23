let recentlyAddedCurriculum = [];
let updateCurriculum = {};
let deletedCurriculum = [];  // stores the id for deleted rows by saving their ID.
let allCurriculumRecordValues = [];
let selectedCurriculumToEditId = -1;
let curriculumCounter = 0;
window.onload = function (e) {

    // view and load selected curriculum DOM:
    const programLearningOutcomeContainer = document.getElementById('selectedProgramOutcomeDetailDivId');
    const curriculumContainer = document.getElementById('curriculumContainerId');
    const selectedProgramField = document.getElementById('curriculumProgramId');
    const selectedCurriculumProgramYearField = document.getElementById('curriculumAllocationYearId');
    const refreshCurriculumBtn = document.getElementById("refreshCurriculumBtn");

    // update Curriculum Related DOM:
    const editCurriculumSection = document.getElementById('editCurriculumSectionId');
    const parentFormCurriculumContainer = document.getElementById('curriculumFormUpdateId');
    const curriculumContainerHeader = document.getElementById('cCurriculumHeaderId');

    const addMoreCurriculumBtn = document.getElementById('addMoreCurriculumBtn');
    const updateButtonCurriculumBtn = document.getElementById('updateCurriculumBtnId');

    $(document).ready(function () {

        /** when refresh icon is clicked perform selected year operation */
        $(refreshCurriculumBtn).on('click', function (event) {
            event.stopPropagation();
            let assignYear = $(selectedCurriculumProgramYearField).val();
            if (assignYear !== "")
                refreshTableCurriculum(assignYear);
            else
                selectedCurriculumProgramYearField.parentElement.classList.add("select-error-input")
        });

        /** when view button is clicked perform load related PLO operation. */
        $(document).on('click', "button[id^='viewCurriculum']", function (event) {
            const selectedCurriculumId = extractFirstNumeric($(this).attr("id"));
            loadRespectivePloAjax(selectedCurriculumId, "view")
        })

        $(document).on('click', "button[id^='editCurriculum']", function (event) {
            selectedCurriculumToEditId = extractFirstNumeric($(this).attr("id"));
            loadRespectivePloAjax(selectedCurriculumToEditId, "edit")
        });

        // When User click on edit option:
        $(addMoreCurriculumBtn).on('click', function (e) {
            initialRowChecker(null);
        })

        let dischargedIndex = 0;
        let deletedCurriculumID = 0;
        $(document).on('click', "img[data-coc-remove='remove']", function (event) {
            event.stopImmediatePropagation();
            dischargedIndex = $(event.target).closest('.learning-outcome-row.h-auto').attr("id").match(/\d+/)[0]
            deletedCurriculumID = $(event.target).closest(".learning-outcome-row.h-auto").children(":first").children(":first").attr("value");

            if ((typeof deletedCurriculumID != 'undefined' && deletedCurriculumID !== null) && !isCharacterALetter(deletedCurriculumID) && deletedCurriculumID !== "") {
                $("main").addClass("blur-filter");
                $("#alertContainer").removeClass("hidden");
            } else // deletedOutcome ID is undefined.
                deleteCurriculumRow(dischargedIndex, false);
        });

        $(updateButtonCurriculumBtn).on('click', function (e) {
            allCurriculumRecordValues = [];

            let counter = 0;
            $(parentFormCurriculumContainer).children().each((index, node) => {
                if (index !== 0) {
                    const temp_curriculum = new Curriculum();
                    const hasId = $("#coc-r" + (index)).val();
                    const curriculumRowRecordList = ['#creationCurriculum-No-r-' + index, '#detail-r-' + index];
                    for (let i = 0; i < curriculumRowRecordList.length; i++) {
                        if (i === 0) {
                            if ($(curriculumRowRecordList[i]).val() === '')
                                temp_curriculum.setploNumber = $(curriculumRowRecordList[i]).attr("placeholder")
                            else
                                temp_curriculum.setploNumber = $(curriculumRowRecordList[i]).val()
                        } else {
                            temp_curriculum.setploDescription = $(curriculumRowRecordList[i]).val()

                            allCurriculumRecordValues.push(temp_curriculum)
                            // console.log(allCurriculumRecordValues[counter])
                            if (hasId) {
                                // console.log("Adding to Update ARRAY : ID ", hasId)
                                updateCurriculum[hasId] = allCurriculumRecordValues[counter];
                            } else
                                recentlyAddedCurriculum.push(allCurriculumRecordValues[counter])
                            counter++;
                        }
                    }
                }
            })

            // console.log("All Weekly Topics List : ", allCurriculumRecordValues)
            // console.log("Updated  Weekly Topics List : ", updateCurriculum)
            // console.log("Recently Added Weekly Topics List : ", recentlyAddedCurriculum)
            // console.log("Deleted Weekly Topics List : ", deletedCurriculum)

            deleteCurriculumPLOAjaxCall(deletedCurriculum, Object.keys(updateCurriculum));
        });

        /** It is visible when ID is represent and user wants to delete . */
        $('#alertBtndeleteCurriculum').click(function (e) {
            // const id = $(event.target).closest('.learning-outcome-row').find(".bg-catalystBlue-l61").attr("id");
            // console.log("Show when Alert-Delete Button is clicked. ", deletedCurriculumID , id)
            e.stopImmediatePropagation();
            deletedCurriculum.push(deletedCurriculumID);
            deleteCurriculumRow(dischargedIndex, true);
            $("main").removeClass("blur-filter");
            $("#alertContainer").addClass("hidden");
        });

        /** It is visible when ID is represent and user does not want to delete. */
        $("#alertBtnNoCurriculum").on('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $("main").removeClass("blur-filter");
            $("#alertContainer").addClass("hidden");
        })
    });

    /** function is used to refresh the curriculum table according to selected year. */
    function refreshTableCurriculum(assignYear) {

        $(refreshCurriculumBtn).removeClass("transform").addClass("animate-spin")
        const refreshIntervalId = setInterval(function () {
            $("tbody").html("");
            for (let i = 0; i < curriculumArray.length; i++) {
                if (curriculumArray[i].year === assignYear) {
                    const tableRow = `<tr>
                            <td class="border-dashed  w-1/4 border-t border-gray-200 ">
                                <span class="text-gray-700 px-6 py-3 flex justify-center items-center">${i + 1}</span>
                            </td>
                            <td class="border-dashed w-1/4 border-t border-gray-200 ">
                                <span class="text-gray-700  px-6 py-3 flex justify-center items-center">BCSE</span>
                            </td>
                            <td class="border-dashed border-t w-2/4 border-gray-200">
                                <div class="">
                                    <span class="text-gray-700 px-6  py-3 flex justify-center items-center">${curriculumArray[i].year}</span>
                                </div>
                            </td>
                            <td class="border-dashed w-1/4 border-t border-gray-200 ">
                                <div class="flex items-center justify-center gap-3">
                                    <button id="viewCurriculum-${curriculumArray[i].code}" class="focus:ring-2 focus:ring-offset-2  focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">
                                        View
                                    </button>
                                    <button id="editCurriculum-${curriculumArray[i].code}" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                                        <p class="text-sm font-medium leading-none text-white">Edit</p>
                                    </button>
                                </div>
                            </td>
                        </tr>`
                    $("tbody").append(tableRow);
                }
            }
            $(refreshCurriculumBtn).addClass("transform").removeClass("animate-spin")
            clearInterval(refreshIntervalId);
        }, 1000);
    }

    function initialRowChecker(plo) {
        let size = $(parentFormCurriculumContainer).children().length;
        curriculumCounter = size;
        (size === 1) ?
            $(parentFormCurriculumContainer).append(createAdditionalRow(1, plo))
            : $(parentFormCurriculumContainer).append(createAdditionalRow(curriculumCounter, plo));
    }

    function deleteCurriculumRow(dischargedIndex, hasKeyFlag) {
        $(('#creationCurriculumRow-' + dischargedIndex)).remove();
        curriculumCounter = iterateCurriculumRow(parentFormCurriculumContainer, parseInt(dischargedIndex), curriculumCounter, hasKeyFlag);
    }

    function loadRespectivePloAjax(selectedCurriculumId, type) {

        $.ajax({
            type: "POST",
            url: 'assets/CurriculumAjax.php',
            timeout: 500,
            cache: false,
            data: {
                requestPlo: true,
                curriculumCode: selectedCurriculumId,
            },
            beforeSend: function () {
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (data, status) {
                const responseText = JSON.parse(data)
                console.log(responseText)
                // $("#selectedProgramOutcomeDetailDivId").children(":last-child").children(":first-child").slice(1).remove();
                if (responseText.status === 1 && responseText.errors === 'none') {
                    if (type === "view")
                        successMessageLoadView(responseText);
                    else if (type === "edit")
                        successMessageLoadEdit(responseText);

                }
            },
            complete: function (data) {
            },
        });
    }

    function deleteCurriculumPLOAjaxCall(deletedCurriculumOutcomeList, curriculumOutcomeKeyList) {
        $.ajax({
            type: "POST",
            url: "assets/CurriculumAjax.php",
            data: {
                deletionOutcome: true,
                deletedCurriculumOutcomeList: deletedCurriculumOutcomeList,
                // remainingCurriculumOutcomeKeyList: curriculumOutcomeKeyList, // redundant for now.
                curriculumCode: selectedCurriculumToEditId,
            },
            beforeSend: function () {
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (serverResponse, status) {
                const responseText = JSON.parse(serverResponse);
                if (responseText.status === 1 && responseText.errors === 'none')
                    updateCurriculumOutcomeAjaxCall(updateCurriculum, recentlyAddedCurriculum, curriculumOutcomeKeyList);
            },
            complete: function (response) {
                console.log("Response Status of Curriculum Deletion on completion : ", response);
            }
        });
    }

    function updateCurriculumOutcomeAjaxCall(updateCurriculumOutcomeList, recentlyAddedCurriculumOutcomeList, curriculumOutcomeKeyList) {
        $.ajax({
            type: "POST",
            url: "assets/CurriculumAjax.php",
            data: {
                modifyOutcome: true,
                updateCurriculumOutcomeList: updateCurriculumOutcomeList,
                recentlyAddedCurriculumOutcomeList: recentlyAddedCurriculumOutcomeList,
                curriculumOutcomeKeyList: curriculumOutcomeKeyList,
                curriculumCode: selectedCurriculumToEditId
            },
            beforeSend: function () {
                $("body").append(addLoader());
                $("main").toggleClass("blur-filter")
                $('#loader').toggleClass('hidden')
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (serverResponse, status) {

            },
            complete: function (response) {
                setInterval(function () {
                    $("main").toggleClass("blur-filter");
                    $('#loader').remove();
                    location.href = "manageCurriculum.php";
                }, 2000);
            }
        });
    }

    function successMessageLoadView(responseText) {
        $(programLearningOutcomeContainer).removeClass("hidden");
        $(programLearningOutcomeContainer).children(":last-child").children().slice(0).remove();
        const ploArray = responseText.message;
        for (let i = 0; i < ploArray.length; i++) {
            const ploData = ` <div class="flex flex-row w-full bg-white border-solid border-b-2">
                                <div class="text-md text-gray-500 text-left font-semibold border-0 w-48 border-r-2">
                                    <span class="cprofile-cell-data">${ploArray[i]['ploName']}</span>
                                </div>
                                <div class="col-span-1 w-10/12 border-0 p-2">
                           <span class="w-full font-normal text-sm text-justify text-gray-900"
                                 id="smpStudentEmailId-view">${ploArray[i]['ploDescription']}
                           </span>
                                </div>
                            </div>`;
            $(programLearningOutcomeContainer).children(":last-child").append(ploData);
        }
    }

    function successMessageLoadEdit(responseText) {
        $("#curriculumSearchBoxSectionId").addClass("hidden");
        $(editCurriculumSection).removeClass("hidden");

        const size = responseText.message.length;
        for (let i = 0; i < size; i++) {
            initialRowChecker(responseText.message[i]);
        }
    }

}