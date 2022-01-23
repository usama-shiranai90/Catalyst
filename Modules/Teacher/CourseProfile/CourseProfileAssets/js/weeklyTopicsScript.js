window.onload = function (e) {

    // fetchWeeklyCoveredRows = Object.values(fetchWeeklyCoveredRows);
    // fetchedWeekRowInsertionTag(Object.values(fetchWeeklyCoveredRows).length)

    let weeklyRowCounter = 0; // counts total weekly records.
    const parentWeeklyContainer = document.getElementById('courseweekParentDivID'); // it contains the header as well as weekly-row data.
    const addWeeklyRowBtn = document.getElementById('createWeeklyBtn');  // generate new weekly record.

    let deletedWeeklyID = []; // stores the id for deleted rows by saving their ID.

    $(document).ready(function () {
        loadWeeklyData();

        $(addWeeklyRowBtn).on('click', function (event) {
            initialRowChecking();
        });

        $('#updateweeklyTopicbtn').on('click', function () {
            $(parentWeeklyContainer).children().each((index, node) => {
                if (index !== 0) {
                    const weeklyRowRecord = ['#detail-r-' + index, '#assessment-clo-' + index, '#wtc-clos-r' + index];

                    for (let i = 0; i < weeklyRowRecord.length; i++) {
                        if (i !== 2) { // for clo list

                            $().children().each((i, n) => {
                                let currentCLO = '#week' + index + '-clo-' + (i + 1) + 'ID';
                                $(currentCLO).prop('disabled', true);
                                $(currentCLO).children().attr("disabled", true);
                            })

                        } else {


                        }

                    }

                    $().attr('readonly', true).removeClass("italic").addClass("not-italic");
                    $().attr('readonly', true).removeClass("italic").addClass("not-italic");

                    $('.h-10.w-6.hidden').toggleClass("hidden");
                }
            })

            if (deletedWeeklyID.length !== 0) {
                console.log(deletedWeeklyID)
                // deleteWeekly();
                // updateWeeklyData();
            }

        });

        $(document).on('click', "img[data-wtc-remove='remove']", function (event) {
            event.stopImmediatePropagation()
            const dischargedIndex = $(event.target).closest('.learning-outcome-row.h-auto').index();
            deletedWeeklyID.push($(('#weeklyCoveredRow-' + dischargedIndex)));

            $(('#weeklyCoveredRow-' + dischargedIndex)).remove();
            iterateWeeklyTopicsRow(parseInt(dischargedIndex));
        });

        $(document).on('click', "img[data-wtc-modify='modify']", function (event) {
            event.stopImmediatePropagation()
            const pclass = '.grid.grid-cols-12.gap-0.learning-outcome-row';
            let modifiedIndex = $(event.target).closest(pclass).index()
            $(event.target).toggleClass("hidden")

            $(this).closest(pclass).children().each((index, node) => {
                console.log(index, node)
                if (index > 1) {
                    $('#detail-r-' + modifiedIndex).attr('readonly', false).removeClass("not-italic").addClass("italic");
                    $('#assessment-clo-' + modifiedIndex).attr('readonly', false).removeClass("not-italic").addClass("italic");
                    $('#wtc-clos-r' + modifiedIndex).children().each((i, n) => {
                        let currentCLOInput = '#week' + modifiedIndex + '-clo-' + (i + 1) + 'ID';
                        $(currentCLOInput).prop('disabled', false);
                        $(currentCLOInput).children().attr("disabled", false);
                        console.log("type of :", $(currentCLOInput).prop("tagName"), $(currentCLOInput).attr('type'))


                    })

                }
            });
        });

    });

    function errorInputType(currentField) {
        if (currentField.value.length === 0) {
            completeFlag = false;
            if (currentField.tagName === "CHECKBOX")
                currentField.parentElement.classList.add("select-error-input")
            else if (currentField.tagName === "INPUT" || currentField.tagName === "TEXTAREA")
                currentField.parentElement.classList.add("textField-error-input")
        }
    }

    function iterateWeeklyTopicsRow(setFromIndex) {
        --weeklyRowCounter;

        if (weeklyRowCounter !== 0) {
            $(parentWeeklyContainer).children().each(function (index) {
                // console.log("index : " , index)
                if (index !== 0 && setFromIndex <= index) {
                    console.log("Number of times executing")
                    this.setAttribute("id", "weeklyCoveredRow-" + index)
                    $(this).children().each(function (i) {
                        overrideWeeklyRow(index, i, this)
                    });
                }
            });

        } else {
        }
    }

    function overrideWeeklyRow(index, i, currentTag) {
        // skipping 0 index child because it stores row id as input.
        if (i === 1) {
            currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index, (index + 1)));  // div us ka ID change ki hai.
            let span = currentTag.firstElementChild;
            span.innerHTML = "week-" + index;
        } else if (i === 2 || i === 4) {
            currentTag.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index, (index + 1)));  //wct-wdescription-r1

            let label = currentTag.firstElementChild;
            let input = label.firstElementChild;
            label.setAttribute("for", uniqueName(input.getAttribute("id"), index, (index + 1)));
            input.setAttribute("id", uniqueName(input.getAttribute("id"), index, (index + 1)));

        } else if (i === 3) {
            currentTag.setAttribute("id", "wtc-clos-r" + index);
            // currentTag.firstElementChild.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index));  // wtc-clos-r2

            $(this).children().each((i1) => {
                this.setAttribute("id", "wtc-clo-r" + index + "-c" + (i1 + 1))  // wtc-clo-r2-c1
                let input = this.firstElementChild;

                input.setAttribute("id", "week" + index + "-clo-" + (i1 + 1) + "ID"); //week2-clo-1ID
                input.setAttribute("value", "week" + index + "-clo-" + (i1 + 1));  // week2-clo-1
                input.setAttribute("name", "week" + index + "-clo-" + (i1 + 1));

                let label = this.lastElementChild;
                label.setAttribute("for", "week" + index + "-clo-" + (i1 + 1));
            });
        }
    }

    function initialRowChecking() {

        if ($(parentWeeklyContainer).children().length === 1) {
            weeklyRowCounter++;
            parentWeeklyContainer.appendChild(createNewWeeklyRow(1))

        } else {
            weeklyRowCounter = $(parentWeeklyContainer).children().length;
            parentWeeklyContainer.appendChild(createNewWeeklyRow(weeklyRowCounter))
        }
    }


    function createNewWeeklyRow(currentWeekNo) {
        const str = `<div id="weeklyCoveredRow-${currentWeekNo}"
     class="grid grid-cols-12 grid-rows-1 gap-0  w-auto learning-outcome-row h-auto overflow-hidden">
     <input class="hidden" id="s-wtc-r-${currentWeekNo}-id" value="">
    <div id="wct-wno-r${currentWeekNo}"
         class="lweek-column bg-catalystBlue-l61 text-white col-start-1 col-end-2">
        <span class="wlearn-cell-data">Week-${currentWeekNo}</span>
    </div>
    <div id="wct-wdescription-r${currentWeekNo}" class="lweek-column col-start-2 col-end-7">
        <label for="detail-r-${currentWeekNo}">
            <textarea type="text" class="cell-input pt-4  px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                      value="" placeholder="Write weekly description here..."  
                      id="detail-r-${currentWeekNo}"  onkeyup="autoHeight('detail-r-${currentWeekNo}')" ></textarea></label>

    </div>
    <div class="lweek-column  col-start-7 col-end-8">
        <div id="wtc-clos-r${currentWeekNo}" class="flex flex-col overflow-y-visible ">
            <div id="wtc-clo-r${currentWeekNo}-c1">
            
                <input class="clo-toggle hidden" id="week${currentWeekNo}-clo-1ID" value="week1-clo-1"
                       name="week${currentWeekNo}-clo-1" type="checkbox"/>
                <label class="inside-label cprofile-cell-data" for="week${currentWeekNo}-clo-1ID">
                    CLO1<span><svg width="50px" height="15px"><use
                                    xlink:href="#check-tick"></use></svg> </span>
                </label>
            </div>
            <div id="wtc-clo-r${currentWeekNo}-c2">
                <input class="clo-toggle hidden" id="week${currentWeekNo}-clo-2ID" value="week1-clo-2"
                       name="week${currentWeekNo}-clo-2" type="checkbox"/>
                <label class="inside-label cprofile-cell-data" for="week${currentWeekNo}-clo-2ID">
                    CLO2<span><svg width="50px" height="15px"><use
                                    xlink:href="#check-tick"></use></svg> </span>
                </label>
            </div>
            <div id="wtc-clo-r${currentWeekNo}-c3">
                <input class="clo-toggle hidden" id="week${currentWeekNo}-clo-3ID" value="week${currentWeekNo}-clo-3"
                       name="week${currentWeekNo}-clo-3" type="checkbox"/>
                <label class="inside-label cprofile-cell-data" for="week${currentWeekNo}-clo-3ID">
                    CLO3<span><svg width="50px" height="15px"><use
                                    xlink:href="#check-tick"></use></svg> </span>
                </label>
            </div>

        </div>
    </div>
    <div id="wct-wassessment-r${currentWeekNo}" class="lweek-column  col-start-8 col-end-12">
        <label for="assessment-clo-${currentWeekNo}">
            <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm"
                      value="" placeholder="Write week assessment here..."
                      id="assessment-clo-${currentWeekNo}"></textarea></label>
    </div>
    <div class="lweek-column ">
           <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                <img class="h-10 w-6 hidden" alt=""
                     src="../../../../../Assets/Images/vectorFiles/Icons/add-button.svg" data-wtc-modify='modify'>
                <img class="h-10 w-6" alt="" 
                     src="../../../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" data-wtc-remove='remove'>
            </div>
    </div>
</div>`

        var frag = document.createDocumentFragment();
        var elem = document.createElement('div');
        elem.innerHTML = str;
        while (elem.childNodes[0]) {
            frag.appendChild(elem.childNodes[0]);
        }
        return frag;
    }

    function fetchedWeekRowInsertionTag(size) {
        weeklyRowCounter = size;
        for (let i = 0; i < size; i++) {
            let currentRow = `<div id="weeklyCoveredRow-1" class="grid grid-cols-12 grid-rows-1 gap-0  w-auto learning-outcome-row h-auto overflow-hidden">
                                <div id="wct-wno-r${(i + 1)}-c" class="lweek-column bg-catalystBlue-l61 text-white col-start-1 col-end-2">
                                    <span class="wlearn-cell-data">${fetchWeeklyCoveredRows[i][0]}</span>
                                </div>
                                <div id="wct-wdes-r${(i + 1)}-c" class="lweek-column col-start-2 col-end-7">
                                    <label for="detail-${(i + 1)}">
                                        <!--  cell-input-->
                              
     
                                
                                </div>
                                <div class="lweek-column  col-start-7 col-end-8">
                                    <div id="wtc-clos-r${(i + 1)}" class="flex flex-col overflow-y-visible ">
                                        
                                   
                                    </div>
                                </div>
                                <div id="wct-wassessment-r${(i + 1)}-c" class="lweek-column  col-start-8 col-end-12">
                                    <label for="assessment-clo-1">
                                        <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm" value="" placeholder="Write week assessment here..." id="assessment-clo-1">${fetchWeeklyCoveredRows[i][3]}</textarea></label>

                                </div>
                                <div class="lweek-column ">
                                       <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                        <svg data-wtcedit=\"edit\" xmlns="http://www.w3.org/2000/svg" className="text-blue-800 cursor-pointer"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" style="height: 40px;width: 24px;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                             </svg>
                                            <img class="h-10 w-6" alt="" src="../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" data-wtcremove=\"remove\">
                                        </div>
                                </div>
                            </div>`
            parentWeeklyContainer.innerHTML += currentRow;

            let rowCLList = document.getElementById('wtc-clos-r' + (i + 1))
            createRowClosList(i, rowCLList)
        }
    }

    function uniqueName(str, no, toReplace) {
        return str.replace((toReplace), no);
    }
}


function autoHeight(element) {
    const el = document.getElementById(element);
    el.style.height = "5px";
    el.style.height = (el.scrollHeight) + "px";
}


function loadWeeklyData() {
    $.ajax({
        type: "POST",
        url: "WeeklyTopic/record.php",
        success: function (data) {
            $('#courseweekParentDivID').html(data)
        }
    });
}

function updateWeeklyData() {
    $.ajax({
        type: "POST",
        url: "WeeklyTopic/record.php?actionType=UpdateData",
        data: {
            "id=": id
        },
        success: function (data) {
            $('#courseweekParentDivID').html(data)
        }
    });
}

function deleteWeekly() {
    $.ajax({
        type: "POST",
        url: "WeeklyTopic/record.php?actionType=DeleteData",
        data: {
            "deletedWeeklyID": deletedWeeklyID
        },
        success: function (data) {
            $('#courseweekParentDivID').html(data)
        }
    });
}


