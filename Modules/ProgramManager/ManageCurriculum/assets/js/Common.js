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

/** Remove error color from selections */
$('.textField , .select').on('input', function (e) {
    if (this.type === "text" || this.type === "date")
        $(this).parent().removeClass("textField-error-input");
    else if (this.type === "select-one")
        $(this).parent().removeClass("select-error-input");
});

/** Is use to change the row data of PLO-table.
 *  setFromIndex = dischargedIndex (3)
 * */
function iterateCurriculumRow(parentContainer, setFromIndex, curriculumCounter, hasKeyFlag) {
    --curriculumCounter; // 5
    if (curriculumCounter !== 0) {
        $(parentContainer).children().each(function (index, value) { // iterate ->  header and all curriculumRows
            if (index !== 0 && setFromIndex <= index) { // index !== 0 for skipping header and  setFromIndex <= index for skipping us sa chota row.
                this.setAttribute("id", "creationCurriculumRow-" + index)
                $(this).children().each(function (i) { //  label ,PNO , PDescription , DStatus
                    overrideCurriculumRow(index, i, this, hasKeyFlag)
                });
            }
        });
    }
    return curriculumCounter;
}

function overrideCurriculumRow(index, i, currentTag, hasKey) {

    if (i === 0 && hasKey) {
        let input = currentTag.firstElementChild;
        input.setAttribute("id", "coc-r" + index)
    }

    if (i === 1) { // Plo NO
        currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index, (index + 1)));  // div us ka ID change ki hai.  coc-number-r1
        let label = currentTag.firstElementChild;
        let input = label.firstElementChild;
        label.setAttribute("for", "creationCurriculum-No-r-" + index)
        input.setAttribute("id", "creationCurriculum-No-r-" + index)
        input.placeholder = "PLO-" + index;

    } else if (i === 2) { // PLO Description
        currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index, (index + 1)));  // coc-description-r1
        let label = currentTag.firstElementChild;
        let textarea = label.firstElementChild;
        label.setAttribute("for", "detail-r-" + index)
        textarea.setAttribute("id", "detail-r-" + index)
        textarea.setAttribute("onkeyup", "autoHeight('detail-r-" + index + "')");
    } else if (i === 3){
        currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index, (index + 1)));  // coc-description-r1
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
                                 class="lweek-column border-l-0 text-white col-start-1 col-span-1 border-b-0">
                                <label for="creationCurriculum-No-r-${currentCurriculumNo}">
                                    <input type="text" id="creationCurriculum-No-r-${currentCurriculumNo}" value="${plo.ploName}"
                                           class="bg-catalystBlue-l61 cell-input pt-4px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
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


// not used function .
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