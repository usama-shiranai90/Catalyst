// const selectionBoxCurriculumPloContainer = document.getElementById('curriculumBoxPLOContainerID');
// const importBoxCreateBtn = document.getElementById('importBoxCreateBtnID')
/*       $(importBoxCreateBtn).on('click', function (event) {
           event.stopPropagation();
           $(selectionBoxCurriculumContainer).addClass("hidden");
           $(selectionBoxCurriculumPloContainer).removeClass("hidden");
       });

       $("img[data-curriculum-import]").on('click', function (e) {
           e.stopPropagation();
           $(selectionBoxCurriculumContainer).removeClass("hidden");
           $(selectionBoxCurriculumPloContainer).addClass("hidden");
       })*/
window.onload = function (e) {
    let curriculumCounter = 0;
    let recentlyCreatedCurriculumPloArray;
    let assignCurriculumYear;

    const selectedProgramField = document.getElementById('curriculumProgramId');
    const selectedCurriculumProgramYearField = document.getElementById('curriculumAllocationYearId');
    const selectedPloField = document.getElementById('noOfPLOsToCreateId')

    const selectionBoxCurriculumContainer = document.getElementById('curriculumBoxContainerID');
    const importBoxCreateBtn = document.getElementById('importBoxCreateBtnID'); // create.

    const parentFormCurriculumContainer = document.getElementById('curriculumFormCreationId');
    const creationCurriculumSection = document.getElementById('creationCurriculumSectionId');
    const curriculumContainerHeader = document.getElementById('cCurriculumHeaderId');

    const addMoreCurriculumBtn = document.getElementById('addMoreCurriculumBtn');
    const saveButtonCurriculumBtn = document.getElementById('saveNewlyCreatedCurriculumBtnId');

    $(document).ready(function () {

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
            dischargedIndex = $(event.target).closest('.learning-outcome-row.h-auto').attr("id").match(/\d+/)[0];
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
                        console.log("Data is :", $(curriculumRowRecordList[i]).val())
                    }
                }
            })


            console.log("All Curriculum List : ", recentlyCreatedCurriculumPloArray)

            createCurriculumAjaxCall(recentlyCreatedCurriculumPloArray, assignCurriculumYear);


        });
    });

    function deleteCurriculumRow(dischargedIndex, hasKeyFlag) {
        $(('#creationCurriculumRow-' + dischargedIndex)).remove();
        iterateCurriculumRow(parseInt(dischargedIndex), hasKeyFlag);
    }

    function iterateCurriculumRow(setFromIndex, hasKeyFlag) {
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
        if (i === 1) {
            currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index, (index + 1)));  // div us ka ID change ki hai.  coc-number-r1
            let label = currentTag.firstElementChild;
            let input = label.firstElementChild;
            label.setAttribute("for", "creationCurriculum-No-r-" + index)
            input.setAttribute("id", "creationCurriculum-No-r-" + index)
            input.placeholder = "PLO-" + index;

        } else if (i === 2) { //
            currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index, (index + 1)));  // coc-description-r1
            let label = currentTag.firstElementChild;
            let textarea = label.firstElementChild;
            label.setAttribute("for", "detail-r-" + index)
            textarea.setAttribute("id", "detail-r-" + index)
            textarea.setAttribute("onkeyup", "autoHeight('detail-r-" + index + "')");
        }
    }

    function initialRowChecker() {
        let size = $(parentFormCurriculumContainer).children().length;
        curriculumCounter = size;
        (size === 1) ? $(parentFormCurriculumContainer).append(createAdditionalRow(1))
            : $(parentFormCurriculumContainer).append(createAdditionalRow(curriculumCounter));

    }

    function createAdditionalRow(currentCurriculumNo) {

        let hasPlo = ""
        if (currentCurriculumNo === 1)
            hasPlo = "PLO-" + currentCurriculumNo;

        // console.log(curriculumCounter, hasPlo)
        const str = `<div id="creationCurriculumRow-${currentCurriculumNo}"
                             class="grid grid-cols-12 grid-rows-1 gap-0  w-auto learning-outcome-row h-auto overflow-hidden ">
                            <label for=""><input class="hidden" id="" value=""></label>
                            <div id="coc-number-r${currentCurriculumNo}"
                                 class="lweek-column border-l-0 bg-catalystBlue-l61 text-white col-start-1 col-span-1 border-b-0">
                                <label for="creationCurriculum-No-r-${currentCurriculumNo}">
                                    <input type="text" id="creationCurriculum-No-r-${currentCurriculumNo}" value="${hasPlo}"
                                           class="text-black cell-input pt-4px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                                           placeholder="PLO-${currentCurriculumNo}">
                                </label>
                            </div>
                            <div id="coc-description-r${currentCurriculumNo}" class="lweek-column col-start-2 col-span-10 border-b-0">
                                <label for="detail-r-${currentCurriculumNo}">
                                            <textarea type="text"
                                                      class="cell-input pt-4  px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                                                      value="" placeholder="write program outcome description here"
                                                      id="detail-r-${currentCurriculumNo}"
                                                      onkeyup="autoHeight('detail-r-${currentCurriculumNo}')"></textarea></label>
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

    function uniqueName(str, no, toReplace) {
        return str.replace((toReplace), no);
    }

    let isEmpty;

    function containsEmptyField(fieldsArray) {
        isEmpty = true;
        for (let i = 0; i < fieldsArray.length; i++)
            errorInputType(fieldsArray[i]);
        return isEmpty;
    }

    function errorInputType(currentField) {
        if (currentField.value.length === 0) {
            if (currentField.tagName === "SELECT")
                currentField.parentElement.classList.add("select-error-input")
            else if (currentField.tagName === "INPUT" || currentField.tagName === "TEXTAREA")
                currentField.parentElement.classList.add("textField-error-input")
            isEmpty = false;
        }
    }

    function createCurriculumAjaxCall(recentlyCreatedCurriculumArray, assignCurriculumYear) {
        $.ajax({
            type: "POST",
            url: 'assets/CurriculumAjax.php',
            timeout: 500,
            cache: false,
            data: {
                creation: true,
                curriculumPloArray: recentlyCreatedCurriculumArray,
                assignCurriculumYear: assignCurriculumYear,
            },
            beforeSend: function () {
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("not working fine" + jqXHR + "\n" + textStatus + "\n" + errorThrown)
            },
            success: function (data, status) {
                const reponseText = JSON.parse(data)
                console.log(reponseText)
                if (reponseText.status === 1 && reponseText.errors === 'none') {
                    const cgpa = reponseText.message.CGPA;
                    console.log(reponseText.message.CGPA)
                    let cgpaProgress = new ApexCharts(document.querySelector("#studentCGPA_ProgressCircle"), getCGPA_Progress(cgpa));
                    cgpaProgress.render();
                }
            },
            complete: function (data) {

            },
        });
    }


}
