window.onload = function (e) {

    const programLearningOutcomeContainer = document.getElementById('selectedProgramOutcomeDetailDivId');
    const curriculumContainer = document.getElementById('curriculumContainerId');
    const selectedProgramField = document.getElementById('curriculumProgramId');
    const selectedCurriculumProgramYearField = document.getElementById('curriculumAllocationYearId');
    const refreshCurriculumBtn = document.getElementById("refreshCurriculumBtn");

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
            loadRespectivePloAjax(selectedCurriculumId, $(selectedProgramField).attr("value"))
        })
    });

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

    function loadRespectivePloAjax(selectedCurriculumId, programName) {
        console.log(selectedCurriculumId, programName);
        $.ajax({
            type: "POST",
            url: 'assets/CurriculumAjax.php',
            timeout: 500,
            cache: false,
            data: {
                requestPlo: true,
                curriculumId: selectedCurriculumId,
                programType: programName,
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
            },
            complete: function (data) {

            },
        });
    }

}
