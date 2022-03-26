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

    class Curriculum {
        plo_number = ''
        plo_description = ''

        set setploNumber(plo_number) {
            this.plo_number = plo_number;
        }

        set setploDescription(plo_description) {
            this.plo_description = plo_description;
        }
    }

    $(document).ready(function () {

        $(refreshCurriculumBtn).on('click', function (event) {
            event.stopPropagation();
            let assignYear = $(selectedCurriculumProgramYearField).val();
            if (assignYear !== "")
                refreshTableCurriculum(assignYear);
            else
                selectedCurriculumProgramYearField.parentElement.classList.add("select-error-input")
        });
        $(selectedCurriculumProgramYearField).on('input', function (e) {
            selectedCurriculumProgramYearField.parentElement.classList.remove("select-error-input")
        })
        $(document).on('click', "button[id^='viewCurriculum']", function (event) {

            const selectedCurriculumId = $(this).attr("id").match(/\d+/)[0];
            loadRespectivePloAjax(selectedCurriculumId, "view")
        })

        $(document).on('click', "button[id^='editCurriculum']", function (event) {
            selectedCurriculumToEditId = $(this).attr("id").match(/\d+/)[0];
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
                    var temp_curriculum = new Curriculum();
                    const hasId = $("#coc-r" + (index)).val();

                    // console.log("given row of curriculum : ", index, hasId, node);

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

            console.log("All Weekly Topics List : ", allCurriculumRecordValues)
            console.log("Updated  Weekly Topics List : ", updateCurriculum)


            // console.log("Recently Added Weekly Topics List : ", recentlyAddedCurriculum)
            // console.log("Deleted Weekly Topics List : ", deletedCurriculum)

            deleteCurriculumPLOAjaxCall(deletedCurriculum, Object.keys(updateCurriculum));

            // testingAJAX(updateCurriculum)
        });

        /** It is visible when ID is represent and user wants to delete . */
        $('#alertBtndeleteCurriculum').click(function (e) {
            e.stopImmediatePropagation();
            const id = $(event.target).closest('.learning-outcome-row').find(".bg-catalystBlue-l61").attr("id");
            // console.log("Show when Alert-Delete Button is clicked. ", dischargedIndex)
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


    function testingAJAX(updateCurriculumList) {
        $.ajax({
            type: "POST",
            url: "assets/CurriculumAjax.php",
            data: {
                testing: true,
                updateCurriculumList: updateCurriculumList,
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (serverResponse, status) {
                const responseText = JSON.parse(serverResponse);
                console.log(responseText);
            },
            complete: function (response) {
                console.log("Response Status of Curriculum Deletion on completion : ", response);
            }
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

    function refreshTableCurriculum(assignYear) {
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

    function initialRowChecker(plo) {
        let size = $(parentFormCurriculumContainer).children().length;
        curriculumCounter = size;
        (size === 1) ?
            $(parentFormCurriculumContainer).append(createAdditionalRow(1, plo)) : $(parentFormCurriculumContainer).append(createAdditionalRow(curriculumCounter, plo));

    }

    function deleteCurriculumRow(dischargedIndex, hasKeyFlag) {
        $(('#creationCurriculumRow-' + dischargedIndex)).remove();
        iterateCurriculumRow(parseInt(dischargedIndex), hasKeyFlag);
    }

    function iterateCurriculumRow(setFromIndex, hasKeyFlag) {
        // console.log("size :", curriculumCounter)
        --curriculumCounter;
        if (curriculumCounter !== 0) {
            $(parentFormCurriculumContainer).children().each(function (index) {
                if (index !== 0 && setFromIndex <= index) {
                    this.setAttribute("id", "creationCurriculumRow-" + index)
                    $(this).children().each(function (i) {
                        overrideCurriculumRow(index, i, this, hasKeyFlag)
                    });
                }
            });
        }
    }

    function overrideCurriculumRow(index, i, currentTag) {

        if (i === 0) {
            let input = currentTag.firstElementChild;
            input.setAttribute("id", "coc-r" + index)
        }

        if (i === 1) {
            currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index, (index + 1)));  // div us ka ID change ki hai.  coc-number-r1
            let label = currentTag.firstElementChild;
            let input = label.firstElementChild;
            label.setAttribute("for", "creationCurriculum-No-r-" + index)
            input.setAttribute("id", "creationCurriculum-No-r-" + index)
            input.value = "PLO-" + index;

        } else if (i === 2) { //
            currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index, (index + 1)));  // coc-description-r1
            let label = currentTag.firstElementChild;
            let textarea = label.firstElementChild;
            label.setAttribute("for", "detail-r-" + index)
            textarea.setAttribute("id", "detail-r-" + index)
            textarea.setAttribute("onkeyup", "autoHeight('detail-r-" + index + "')");
        }
    }

    function createAdditionalRow(currentCurriculumNo, plo) {
        if (plo === null) {
            plo = {
                "ploCode": "",
                "ploName": "",
                "ploDescription": "",
            }
        }


        const str = `<div id="creationCurriculumRow-${currentCurriculumNo}"
                             class="grid grid-cols-12 grid-rows-1 gap-0  w-auto learning-outcome-row h-auto overflow-hidden ">
                            <label for=""><input class="hidden" id="coc-r${currentCurriculumNo}" value="${plo.ploCode}"></label>
                            <div id="coc-number-r${currentCurriculumNo}"
                                 class="lweek-column border-l-0 bg-catalystBlue-l61 text-white col-start-1 col-span-1 border-b-0">
                                <label for="creationCurriculum-No-r-${currentCurriculumNo}">
                                    <input type="text" id="creationCurriculum-No-r-${currentCurriculumNo}" value="${plo.ploName}"
                                           class="text-black cell-input pt-4px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                                           placeholder="PLO-${currentCurriculumNo}">
                                </label>
                            </div>
                            <div id="coc-description-r${currentCurriculumNo}" class="lweek-column col-start-2 col-span-10 border-b-0">
                                <label for="detail-r-${currentCurriculumNo}">
                                            <textarea type="text"
                                                      class="cell-input py-4  px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                                                      value="" placeholder="write program outcome description here"
                                                      id="detail-r-${currentCurriculumNo}"
                                                      onkeyup="autoHeight('detail-r-${currentCurriculumNo}')">${plo.ploDescription}</textarea></label>
                            </div>
                            <div id="coc-status-r${currentCurriculumNo}" class="lweek-column border-r-0 col-start-12 col-span-1 border-b-0">
                                <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                    <img class="h-10 w-6 transform transition hover:scale-90 fill-current hover:text-green-300" alt=""
                                        src="/Assets/Images/vectorFiles/Icons/remove_circle_outline.svg"
                                         data-coc-remove="remove">
                                </div>
                            </div>
                        </div>`

        let fragment = document.createDocumentFragment();
        let element = document.createElement('div');
        element.innerHTML = str;
        while (element.childNodes[0])
            fragment.appendChild(element.childNodes[0]);

        if (currentCurriculumNo > 1) {
            $('div[id^="creationCurriculumRow-"]').each(function (index, node) {
                $(node).children().each(function (i, n) {
                    if (i !== 0) {
                        $(n).removeClass("border-b-0")
                    }
                });
            });
        }
        return fragment;
    }


}
