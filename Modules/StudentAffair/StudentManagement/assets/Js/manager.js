/** function is used to return list of options for program field for both classes. */
function createOptionsListForProgramField(currentValue, programList) {
    let optionsList = '';
    for (let i = 0; i < programList.length; i++) {
        if (currentValue === programList[i].departmentCode)
            optionsList += `<option value="${programList[i].programCode}">${programList[i].programSN}</option>`;
    }
    return optionsList;
}

/** function is used to create add more button. */
function createAddMoreBtn(value) {
    return ` <td colspan="12" class="py-5 text-center">
                     <button type="button" aria-label="add_clos_button_label" class="max-w-2xl rounded-full" id="add-clo-btn" aria-expanded="false" aria-haspopup="true">
                            <img id="addMoreBtn${-value}" class="h-8 w-8 rounded-full" src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" alt="">
                        </button>
            </td>`
}

function deleteStudentTableRecord(selectedTag, hasKey = false) {
    let $table = $(selectedTag).closest('table');
    let $tableBody = $(selectedTag).closest('table').children(':nth-child(2)');

    let size = $table.find('tbody tr').slice().length; // 8
    let perPage = 4;
    console.log("before mod : ", size % perPage)
    if (size % perPage === 0) {
        console.log("remove old and create new pagination")
        $table.next().remove(); // Deleting The Following Pagination...
        $tableBody.append(sampleNewTableRow(false));
        createPaginationBar($table.attr("id"));
    } else
        $tableBody.append(sampleNewTableRow(true));
}

function sampleNewTableRow(toDisplay) {
    // ${ (toDisplay ? 'style="display: none;"' : "")  }
    return `<tr >
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center"></span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" onkeydown="return IsNonNumeric(event)" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center"></span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" onkeydown="return IsNonNumeric(event)" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center"></span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" onkeydown="return isContactFormat(event)" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center"></span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" onkeydown="return isBloodGroupFormat(event)" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center"></span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" onkeydown="return IsNonNumeric(event)" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center"></span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center"></span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center"></span>
                            </td>
                    <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="true">
                                <span class="text-gray-700 flex justify-center items-center"></span>
                            </td>
             <td class="border-dashed px-2 py-3 border-t border-gray-200 text-center text-xs" contenteditable="false">
                            <div class="flex items-center justify-center gap-3">
                                <img class="h-10 w-6 cursor-pointer" alt="" src="../../../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" data-std-delete="remove">
                            </div>  
                                  </td></tr>`
}

function createPaginationBar(tableID) {
    $("#" + tableID).each(function () {
        let currentPage = 0;
        const numPerPage = 4;
        const $table = $(this);
        $table.bind('repaginate' + tableID, function () {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).fadeIn("fast").animate({}, "linear", function () {
                // $table.fadeIn();
            }).show().removeAttr("style");
            // $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).fadeIn("slow").show();
        });


        $table.trigger('repaginate' + tableID);
        const totalTableRows = $table.find('tbody tr').length;
        const NoOfPages = Math.ceil(totalTableRows / numPerPage);
        const $paginationContainer = $('<div class="bg-white px-4 py-3 flex items-center justify-center border-t border-gray-200 sm:px-6"></div>');
        for (let page = 0; page < NoOfPages; page++) {
            let cssClass = "bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"
            if (page === 0)
                cssClass = "bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium clickable z-10 bg-indigo-50 border-indigo-500 text-indigo-600"

            $(`<span class="${cssClass}" ></span>`).text(page + 1).bind('click', {
                newPage: page
            }, function (event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate' + tableID);

                $(this).fadeIn("slow").animate({}, "linear", function () {
                    $(this).fadeIn();
                }).addClass("z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium")
                    .removeAttr("style").siblings()
                    .removeClass().addClass('bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium');

            }).appendTo($paginationContainer).addClass('clickable');

        }
        $paginationContainer.insertAfter($table).find('span.page-number:first').addClass('active');
    });
}


function checkDuplication(TableContainer) {

    let values = [];
    let hasDuplication = false;
    $(TableContainer).children("table").each(function (index, value) {
        values[index] = [];
        const col = $(value).eq(0).find('th').length;
        for (let i = 0; i < col; i++) {
            values[index][i] = [];
        }
        $(value).children("tbody").children("tr").each(function (tIndex, tValue) {
            $(tValue).find('td').each(function (i) {
                if (i < 2 || i === 7 || i === 8) {
                    if (values[index][i].indexOf($(this).text().replace(/\s\s+/g, ' ')) > -1) {
                        console.log("excuse me ?")
                        $(this).addClass('bg-red-300 text-white');
                        hasDuplication = true;
                    }
                    values[index][i].push($(this).text().replace(/\s\s+/g, ' '));
                }
            });
        });
    });

    return hasDuplication;
}

function getRelatedKeyDownForTabularRow(index) {
    if (index === 2 || index === 3 || index === 6) { // for name and f name
        return 'onkeydown="return IsNonNumeric(event)"';
    } else if (index === 5) {
        return 'onkeydown="return isBloodGroupFormat(event)"';
    } else if (index === 4) {
        return 'onkeydown="return isContactFormat(event)"';
    }
}

// Redundant /  Tester Function for now..
function idkWorking(work_book, sheet_name) {
    /*var range = XLSX.utils.decode_range(worksheet['!ref']);
range.s.r = 1; // <-- zero-indexed, so setting to 1 will skip row 0
worksheet['!ref'] = XLSX.utils.encode_range(range);*/
    var range = XLSX.utils.decode_range(work_book.Sheets[work_book.SheetNames[0]]['!ref']);
    range.s.c = 3; // 0 == XLSX.utils.decode_col("A")
    range.e.c = 4; // 6 == XLSX.utils.decode_col("G")
    var new_range = XLSX.utils.encode_range(range);
    var excelInJSON = XLSX.utils.sheet_to_html(work_book.Sheets[work_book.SheetNames[0]], {
        blankRows: false,
        defval: '',
        range: new_range
    });
    document.getElementById('generatedTableContainer').innerHTML += excelInJSON;
    // console.log(excelInJSON);
}

function startProgressBarAnimation() {
    $(progressContainer).removeClass("hidden");
    event.loaded = 42;
    event.total = 100;

    let percent = Math.round((100 * event.loaded) / event.total);
    progressPercent.innerText = percent;
    const scaleX = `scaleX(${percent / 100})`;
    bgProgress.style.transform = scaleX;
    progressBar.style.transform = scaleX;
}
