let recentlyAddedCurriculum = [];
let updateCurriculum = {};
let deletedCurriculum = [];  // stores the id for deleted rows by saving their ID.
let allCurriculumRecordValues = [];

let selectToEditCurrciulumCode = -1; // variable will store curriculumCode and which to edit.
let curriculumCounter = 0;  // stores the total curriculum Counter i.e. table rows header and curriculumPLOsRows.
window.onload = function (e) {

    // view and load selected curriculum DOM:
    const programLearningOutcomeDetailListContainer = document.getElementById('selectedProgramOutcomeDetailDivId');
    const curriculumContainer = document.getElementById('curriculumTabularContainerID');
    const selectedProgramField = document.getElementById('curriculumProgramId');

    const selectedCurriculumProgramYearField = document.getElementById('curriculumAllocationYearId');
    const refreshCurriculumBtn = document.getElementById("refreshCurriculumBtn");

    // update Curriculum Related DOM:
    const editCurriculumSection = document.getElementById('editCurriculumSectionId');
    const parentFormCurriculumContainer = document.getElementById('curriculumFormUpdateId');
    const curriculumContainerHeader = document.getElementById('cCurriculumHeaderId');

    const backArrowBtn = document.getElementById('backArrowId');

    const addMoreCurriculumBtn = document.getElementById('addMoreCurriculumBtn');
    const updateButtonCurriculumBtn = document.getElementById('updateCurriculumBtnId');

    $(document).ready(function () {

        /** when refresh icon is clicked perform selected year operation */
        $(refreshCurriculumBtn).on('click', function (event) {
            event.stopPropagation();

            // if fields are not empty then go inside.
            if (containsEmptyField([selectedProgramField, selectedCurriculumProgramYearField])) {
                let assignYear = selectedCurriculumProgramYearField.value;
                refreshTableCurriculum(assignYear);
            }
        });


        /** when view Button is clicked call AJAX and fetch its related PLO List. */
        $(document).on('click', "button[id^='viewCurriculum']", function (e) {
            const curriculumCode = extractFirstNumeric(this.id); // viewCurriculum-5 extract only numeric i.e. 5
            loadRespectivePloAjax(curriculumCode, "view")
        })

        /** when edit Button is clicked call AJAX and fetch its related PLO List. */
        $(document).on('click', "button[id^='editCurriculum']", function (event) {
            selectToEditCurrciulumCode = extractFirstNumeric(this.id); // extract curriculumCode. editCurriculum-5 extract only numeric i.e. 5
            loadRespectivePloAjax(selectToEditCurrciulumCode, "edit")
        });

        $(backArrowBtn).on('click', function (e) {
            $("#curriculumSearchBoxSectionId").removeClass("hidden");
            $(editCurriculumSection).addClass("hidden");
            $(parentFormCurriculumContainer).children().slice(1).remove();// curriculum form creation:first child ( 0-index ) => header chor kr sb delete kr do...
        })

        // When User click on edit option:
        $(addMoreCurriculumBtn).on('click', function (e) {
            initialRowChecker(null);
        })


        /** when delete icon is pressed remove the row and reiterate for PLO number.
         *  if your record exist before ( i.e. label ploCode exist ) show confirm modal box.
         *  if newly created directly delete.
         * */
        let dischargedIndex = 0;
        let deletedPLOCode = 0;
        $(document).on('click', "img[data-coc-remove='remove']", function (event) {
            event.stopImmediatePropagation();

            dischargedIndex = $(this).closest('.learning-outcome-row.h-auto').attr("id").match(/\d+/)[0] // extract the numeric value. i.e. creationCurriculumRow-3 > 3
            deletedPLOCode = $(this).closest(".learning-outcome-row.h-auto").children(":first").children(":first").attr("value"); // label ploCode

            console.log(deletedPLOCode)
            if ((typeof deletedPLOCode != 'undefined' && deletedPLOCode !== null) && !isCharacterALetter(deletedPLOCode) && deletedPLOCode !== "") { // when ploCode exist.
                $("main").addClass("blur-filter");
                $("#alertContainer").removeClass("hidden");
            } else // PLOCode is not define/null/empty .
                deleteCurriculumRow(dischargedIndex, false); // 4 , false,
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
            deletedCurriculum.push(deletedPLOCode);
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

            $("tbody").children().remove(); // delete all children of curriculum table.

            let counter = 1;
            for (let i = 0; i < curriculumList.length; i++) {
                if (curriculumList[i].year === assignYear) {
                    const tableRow = `<tr>
                            <td class="border-dashed  w-1/4 border-t border-gray-200 ">
                                <span class="text-gray-700 px-6 py-3 flex justify-center items-center">${counter}</span>
                            </td>
                            <td class="border-dashed w-1/4 border-t border-gray-200 ">
                                <span class="text-gray-700  px-6 py-3 flex justify-center items-center">${curriculumList[i].programSName}</span>
                            </td>
                            <td class="border-dashed border-t w-2/4 border-gray-200">
                                <div class="">
                                    <span class="text-gray-700 px-6  py-3 flex justify-center items-center">${curriculumList[i].year}</span>
                                </div>
                            </td>
                            <td class="border-dashed w-1/4 border-t border-gray-200 ">
                                <div class="flex items-center justify-center gap-3">
                              <div class= "flex items-center justify-center gap-1" >
                             <button type="button" id="viewCurriculum-${curriculumList[i].code}">
                           <svg enable-background="new 0 0 32 32"  class="w-6 h-6 text-blue-500 hover:text-blue-600 cursor-pointer transform hover:scale-105" viewBox="0 0 32 32"
                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><polyline fill="none" points="   649,137.999 675,137.999 675,155.999 661,155.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><polyline fill="none" points="   653,155.999 649,155.999 649,141.999  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/><polyline fill="none" points="   661,156 653,162 653,156  " stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/></g><g><g><path d="M16,25c-4.265,0-8.301-1.807-11.367-5.088c-0.377-0.403-0.355-1.036,0.048-1.413c0.404-0.377,1.036-0.355,1.414,0.048    C8.778,21.419,12.295,23,16,23c4.763,0,9.149-2.605,11.84-7c-2.69-4.395-7.077-7-11.84-7c-4.938,0-9.472,2.801-12.13,7.493    c-0.272,0.481-0.884,0.651-1.363,0.377c-0.481-0.272-0.649-0.882-0.377-1.363C5.147,10.18,10.333,7,16,7    c5.668,0,10.853,3.18,13.87,8.507c0.173,0.306,0.173,0.68,0,0.985C26.853,21.819,21.668,25,16,25z"/></g><g><path d="M16,21c-2.757,0-5-2.243-5-5s2.243-5,5-5s5,2.243,5,5S18.757,21,16,21z M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3    s3-1.346,3-3S17.654,13,16,13z"/></g></g></svg>
                                </button>
                                 <button type="button" id="editCurriculum-${curriculumList[i].code}">
                                   <svg xmlns="http://www.w3.org/2000/svg" 
                                   class="w-6 h-6 text-blue-500 hover:text-blue-600 cursor-pointer transform hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"  />
                            </svg>
                                </button>
                                 <button type="button" id="deleteCurriculum-${curriculumList[i].code}">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-6 h-6 text-red-500 hover:text-red-600 cursor-pointer transform hover:scale-105"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                               
                            </td>
                        </tr>`
                    $("tbody").append(tableRow);
                    counter++;
                }
            }
            $(refreshCurriculumBtn).addClass("transform").removeClass("animate-spin")

            clearInterval(refreshIntervalId);
        }, 1000);
    }

    /** the function is used to create row of PLO table and an key/value of plo variable is used to set the ploCode into label.
     *  addMoreCurriculumBtn is clicked , plo is null because wo phely ka to nhai exsit kr raha na.
     *  successMessageLoadEdit function ka inder sa aa raha hai na ( database -> ploCode exist ) us ka format nechy likha hua hai...
     * */
    function initialRowChecker(plo) { // plo => {ploCode: 00 , ploName: 'PLO-N', ploDescription: 'xxxxx'}

        let size = $(parentFormCurriculumContainer).children().length; // 4, get size of containers children i.e. header and curriculumRows.
        curriculumCounter = size; // assign that into curriculumCounter
        if (size === 1) { // no curriculumRows , only header exist.
            $(parentFormCurriculumContainer).append(createAdditionalRow(1, plo));
        } else {
            $(parentFormCurriculumContainer).append(createAdditionalRow(curriculumCounter, plo));
        }
    }

    /** use to create delete row from curriclum table. */
    function deleteCurriculumRow(dischargedIndex, hasKeyFlag) {
        $(('#creationCurriculumRow-' + dischargedIndex)).remove();
        curriculumCounter = iterateCurriculumRow(parentFormCurriculumContainer, parseInt(dischargedIndex), curriculumCounter, hasKeyFlag);
    }

    function loadRespectivePloAjax(curriculumCode, type) {

        $.ajax({
            type: "POST",
            url: 'assets/CurriculumAjax.php',
            timeout: 500,
            cache: false,
            data: {
                requestPlo: true,
                curriculumCode: curriculumCode,
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
                        successMessageLoadView(responseText.message);
                    else if (type === "edit")
                        successMessageLoadEdit(responseText.message);
                }
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
                curriculumCode: selectToEditCurrciulumCode,
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
                curriculumCode: selectToEditCurrciulumCode
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

    /** function is used when ajax for view is called. */
    function successMessageLoadView(ploArray) {
        $(programLearningOutcomeDetailListContainer).removeClass("hidden");
        $(programLearningOutcomeDetailListContainer).children(":last-child").children().slice(1).remove();// (0-child is header) 1 sa less children are not deleted. baki sary deleted.

        for (let i = 0; i < ploArray.length; i++) {
            const ploData = `<div class="flex flex-row w-full bg-white border-solid border-b-2">
                                <div class="text-md text-gray-500 text-left font-semibold border-0 w-48 border-r-2">
                                    <span class="cprofile-cell-data">${ploArray[i].ploName}</span>
                                </div>
                                <div class="col-span-1 w-10/12 border-0 p-2">
                           <span class="w-full font-normal text-sm text-justify text-gray-900"
                                 id="smpStudentEmailId-view">${ploArray[i].ploDescription}
                           </span>
                                </div>
                            </div>`;
            $(programLearningOutcomeDetailListContainer).children(":last-child").append(ploData);
        }
    }

    /** function is used when ajax for edit is called.
     * i.e. edit icon is clicked and user wants to unhide the edit section and hide the view section.
     * also add rows in table of curriculum update. */
    function successMessageLoadEdit(ploArray) {
        $("#curriculumSearchBoxSectionId").addClass("hidden"); // hide curriculumSearchBoxSectionId
        $(editCurriculumSection).removeClass("hidden"); // unhidden edit section.

        for (let i = 0; i < ploArray.length; i++) {
            initialRowChecker(ploArray[i]);
        }

    }

}