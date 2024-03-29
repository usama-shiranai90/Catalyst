let recentlyAddedWeeklyTopics = [];
let updateWeeklyTopics = {};
let deletedWeeklyTopics = [];  // stores the id for deleted rows by saving their ID.
let allWeeklyRecordDescriptionValues = [];
let rowCLOsWithIDList = '';

window.onload = function (e) {
    let weeklyRowCounter;

    if (courseWeeklyTopicList.length !== 0) {
        weeklyRowCounter = courseWeeklyTopicList.length;
    } else
        weeklyRowCounter = 0; // counts total weekly records.

    const parentWeeklyContainer = document.getElementById('courseweekParentDivID'); // it contains the header as well as weekly-row data.
    const addWeeklyRowBtn = document.getElementById('createWeeklyBtn');  // generate new weekly record.

    $(document).ready(function () {

        $(addWeeklyRowBtn).on('click', function (event) {
            initialRowChecking();
        });

        $('#updateweeklyTopicbtn').on('click', function () {
            allWeeklyRecordDescriptionValues = new Array(weeklyRowCounter);
            for (let i = 0; i < weeklyRowCounter; i++) {
                allWeeklyRecordDescriptionValues[i] = [];
            }

            let counter = 0;
            let innerCounter = 0;
            $(parentWeeklyContainer).children().each((index, node) => {
                if (index !== 0) {
                    // console.log(index, node)
                    /** skipping 0 for header tag */
                    const hasID = $('#s-wtc-r' + (index)).val();

                    const weeklyRowRecord = ['#wct-wno-r' + index, '#detail-r-' + index, '#assessment-clo-' + index, '#wtc-clos-r' + index];
                    for (let i = 0; i < weeklyRowRecord.length; i++) {
                        if (i === 0) {
                            allWeeklyRecordDescriptionValues[counter][innerCounter] = "Week-" + (index);
                            // allWeeklyRecordDescriptionValues[counter][innerCounter] = $(weeklyRowRecord[i]).first().text();
                            innerCounter++;
                        } else {
                            if (i !== 3) // assessment and description.
                            {
                                $(weeklyRowRecord[i]).attr('readonly', true).removeClass("italic").addClass("not-italic");
                                allWeeklyRecordDescriptionValues [counter][innerCounter] = removeRedundantSpace($(weeklyRowRecord[i]).val());
                                innerCounter++;
                            } else {
                                let tempArray = [];
                                $(weeklyRowRecord[i]).children().each((ind, n) => { //for clo list
                                    let currentCLO = '#week' + index + '_clo-' + (ind + 1) + 'ID';

                                    $(currentCLO).prop('disabled', true);
                                    $(currentCLO).children().attr("disabled", true);
                                    // console.log("status check ", $(currentCLO).is(":checked"), $(currentCLO).is(":selected"))

                                    if ($(currentCLO).is(":checked")) {
                                        // console.log("please work", $(currentCLO));
                                        tempArray.push($(currentCLO).attr("name"));
                                    }
                                });

                                allWeeklyRecordDescriptionValues [counter][innerCounter] = tempArray;
                                if (hasID)
                                    updateWeeklyTopics[hasID] = allWeeklyRecordDescriptionValues[counter];
                                else {
                                    console.log(allWeeklyRecordDescriptionValues[counter])
                                    recentlyAddedWeeklyTopics.push(allWeeklyRecordDescriptionValues[counter])
                                }
                                innerCounter = 0;
                                counter++;
                            }
                        }
                    }
                    $('.h-10.w-6.hidden').toggleClass("hidden");
                }
            })

            console.log("All Weekly Topics List : ", allWeeklyRecordDescriptionValues)
            console.log("Recently Added Weekly Topics List : ", recentlyAddedWeeklyTopics)
            console.log("Updated  Weekly Topics List : ", updateWeeklyTopics, Object.keys(updateWeeklyTopics))
            console.log("Deleted Weekly Topics List : ", deletedWeeklyTopics,)

            if (deletedWeeklyTopics.length === 0 && (typeof updateWeeklyTopics === 'object' && Object.entries(updateWeeklyTopics).length === 0)) {
                createWeeklyTopicsAjaxCall(recentlyAddedWeeklyTopics);
            } else {
                deleteWeeklyTopicAjaxCall(deletedWeeklyTopics, Object.keys(updateWeeklyTopics));
                updateWeeklyTopicAjaxCall(updateWeeklyTopics, recentlyAddedWeeklyTopics);
            }

        });

        let dischargedIndex = 0;
        let deletedWeeklyID = 0;
        /** removes the Selected weekly topic. */
        $(document).on('click', "img[data-wtc-remove='remove']", function (event) {
            event.stopImmediatePropagation()
            dischargedIndex = $(event.target).closest('.learning-outcome-row.h-auto').attr("id").match(/\d+/)[0]; // weeklyCovered-1
            deletedWeeklyID = $(event.target).closest('.learning-outcome-row.h-auto').first().children(":first").val(); // attr("id")

            // console.log(dischargedIndex, deletedWeeklyID);

            if ((deletedWeeklyID !== "" && deletedWeeklyID !== null) && !isCharacterALetter(deletedWeeklyID)) { // If its
                $("main").addClass("blur-filter");
                $("body").append(alertConfirmationMessage("Delete Program", "Do you wish to delete the following Topic :<br>",
                    removeRedundantSpace($(event.target).closest('.learning-outcome-row.h-auto').children(":nth-child(2)").first().text()),
                    "", " <span class='italic font-semibold'>Note : </span> It will be deleted from database. "));

            } else // deletedOutcome ID is undefined.
                deleteWeeklyRow(dischargedIndex, false);
        });

        /**This is applied on both delete-btn and cancel-btn in weekly covered topic*/
        $(document).on('click', "#alertDeleteBtnId ,#alertCancelBtnId ", function (event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            $("main").removeClass("blur-filter");
            $("#alertMessageContainer").remove();

            if (this.id === 'alertDeleteBtnId') {
                // console.log("Show when Alert-Delete Button is clicked. ", dischargedIndex)
                deletedWeeklyTopics.push(deletedWeeklyID);
                deleteWeeklyRow(dischargedIndex, true);
            }
        });


        $(document).on('click', "img[data-wtc-modify='modify']", function (event) {
            event.stopImmediatePropagation()
            const pclass = '.grid.grid-cols-12.gap-0.learning-outcome-row';
            let modifiedIndex = $(event.target).closest(pclass).index()
            $(event.target).toggleClass("hidden")

            // console.log("My Modified Index is :", modifiedIndex, $(this).closest(pclass))

            $(this).closest(pclass).children().each((index, node) => {
                // console.log(index, node)
                if (index > 1) {
                    $('#detail-r-' + modifiedIndex).attr('readonly', false).removeClass("not-italic").addClass("italic");
                    $('#assessment-clo-' + modifiedIndex).attr('readonly', false).removeClass("not-italic").addClass("italic");
                    $('#wtc-clos-r' + modifiedIndex).children().each((i, n) => {
                        let currentCLOInput = '#week' + modifiedIndex + '_clo-' + (i + 1) + 'ID';
                        $(currentCLOInput).prop('disabled', false);
                        $(currentCLOInput).children().attr("disabled", false);
                    })

                }
            });
        });

    });

    function deleteWeeklyRow(dischargedIndex, hasKeyFlag) {
        $(('#weeklyCoveredRow-' + dischargedIndex)).remove();
        iterateWeeklyTopicsRow(parseInt(dischargedIndex), hasKeyFlag);
    }

    function iterateWeeklyTopicsRow(setFromIndex, hasKeyFlag) {
        --weeklyRowCounter;
        if (weeklyRowCounter !== 0) {
            $(parentWeeklyContainer).children().each(function (index) {
                // console.log("index : " , index)
                if (index !== 0 && setFromIndex <= index) {
                    console.log("Number of times executing")
                    this.setAttribute("id", "weeklyCoveredRow-" + index)
                    $(this).children().each(function (i) {
                        overrideWeeklyRow(index, i, this, hasKeyFlag)
                    });
                }
            });

        }
    }

    function overrideWeeklyRow(index, i, currentTag, hasKeyFlag = true) {

        // skipping 0 index child because it stores row id as input.
        if (i === 0) {
            if (!hasKeyFlag)
                currentTag.removeAttribute('value');
        }

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
            currentTag.firstElementChild.setAttribute("id", "wtc-clos-r" + index);
            // currentTag.firstElementChild.setAttribute("id", uniqueName(currentTag.getAttribute("id"), index));  // wtc-clos-r2

            $(currentTag.firstElementChild).children().each(function (i1, v) {

                console.log(i1 , v , courseLearningOutcomeList)

                this.setAttribute("id", "wtc-clo-r" + index + "-c" + (i1 + 1))  // wtc-clo-r2-c1
                let input = this.firstElementChild;
                input.setAttribute("id", "week" + index + "_clo-" + (i1 + 1) + "ID"); // week2_clo-1ID
                input.setAttribute("value", "week" + index + "_clo-" + (i1 + 1));  //   week2_clo-1
                input.setAttribute("name",  courseLearningOutcomeList[i1][0]  );
                // input.setAttribute("name", "week" + index + "_clo-" + (i1 + 1));

                let label = this.lastElementChild;
                label.setAttribute("for", input.id);



            });
        }
    }

    function initialRowChecking() {

        if ($(parentWeeklyContainer).children().length === 1) {
            weeklyRowCounter++;
            parentWeeklyContainer.appendChild(createNewWeeklyRow(1, courseLearningOutcomeList))
            weeklyRecordCheckBoxCreation(1);

        } else {
            weeklyRowCounter = $(parentWeeklyContainer).children().length;
            parentWeeklyContainer.appendChild(createNewWeeklyRow(weeklyRowCounter, courseLearningOutcomeList))
            weeklyRecordCheckBoxCreation(weeklyRowCounter);
        }
    }

    function createNewWeeklyRow(currentWeekNo, courseCLOList) {
        const str = `<div id="weeklyCoveredRow-${currentWeekNo}"
     class="grid grid-cols-12 grid-rows-1 gap-0  w-auto learning-outcome-row h-auto overflow-hidden">
     <input class="hidden" id="s-wtc-r-${currentWeekNo}-id" value="">
    <div id="wct-wno-r${currentWeekNo}"
         class="lweek-column bg-catalystBlue-l61 text-white col-start-1 col-end-2">
        <span class="wlearn-cell-data">Week-${currentWeekNo}</span>
    </div>
    <div id="wct-wdescription-r${currentWeekNo}" class="lweek-column col-start-2 col-end-7">
        <label for="detail-r-${currentWeekNo}">
            <textarea type="text" class="cell-input py-4  px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                      value="" placeholder="Write weekly description here..."  
                      id="detail-r-${currentWeekNo}"  onkeyup="autoHeight('detail-r-${currentWeekNo}')" ></textarea></label>

    </div>
    <div class="lweek-column  col-start-7 col-end-8">
     <div id="wtc-clos-r${currentWeekNo}" class="flex flex-col overflow-y-visible ">
        </div>
        
    </div>
    <div id="wct-wassessment-r${currentWeekNo}" class="lweek-column  col-start-8 col-end-12">
        <label for="assessment-clo-${currentWeekNo}">
            <textarea type="text" class="cell-input py-4  px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                      value="" placeholder="Write week assessment here..."
                      id="assessment-clo-${currentWeekNo}"></textarea></label>
    </div>
    <div class="lweek-column ">
           <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                <img class="h-10 w-6 transform transition hover:scale-90 fill-current hover:text-green-300 cursor-pointer hidden" alt=""
                     src="../../../../../Assets/Images/vectorFiles/Icons/edit-button.svg" data-wtc-modify='modify'>
                <img class="h-10 w-6 transform transition hover:scale-90 fill-current hover:text-green-300 cursor-pointer" alt="" 
                     src="../../../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" data-wtc-remove='remove'>
            </div>
    </div>
</div>`
        //id="wtc-clist-container-r${currentWeekNo}"
        var frag = document.createDocumentFragment();
        var elem = document.createElement('div');
        elem.innerHTML = str;
        while (elem.childNodes[0]) {
            frag.appendChild(elem.childNodes[0]);
        }
        return frag;
    }

    function weeklyRecordCheckBoxCreation(currentWeekNo) {
        let checkBoxParentContainer = document.getElementById('wtc-clos-r' + currentWeekNo);
        // console.log(checkBoxParentContainer, currentWeekNo)

        for (let i = 1; i <= courseLearningOutcomeList.length; i++) {
            let currentCloCheckBoxContainer = ` <div id="wtc-clo-r${currentWeekNo}-c${i}">
                <input class="clo-toggle hidden" id="week${currentWeekNo}_clo-${i}ID" value="week1_clo-${i}"
                       name="${courseLearningOutcomeList[i - 1][0]}" type="checkbox"/>
                <label class="inside-label cprofile-cell-data" for="week${currentWeekNo}_clo-${i}ID">
                    ${courseLearningOutcomeList[i - 1][1]}<span><svg width="50px" height="15px"><use
                                    xlink:href="#check-tick"></use></svg> </span>
                </label>
            </div>`
            checkBoxParentContainer.innerHTML += currentCloCheckBoxContainer;
        }

    }
}

function createWeeklyTopicsAjaxCall(recentlyAddedWeeklyTopics) {

    $.ajax({
        type: "POST",
        url: "CourseProfileAssets/Operation/WeeklyTopicAjax.php?actionType=add",
        timeout: 500,
        cache: false,
        async: false,
        data: {
            "arrayWeeklyTopics": recentlyAddedWeeklyTopics,
            creation: true
        },
        beforeSend: function () {
            $("main").toggleClass("blur-filter");
            $('body').append(processLoaderAnimation());
            $('#loader').toggleClass('hidden')
            $("#loader").fadeIn(3000);
        },
        success: function (data, status) {

        },
        error: function (xhr, desc, err) {
            console.log("not working fine" + xhr + "\n" + desc + "\n" + err)
        },
        complete: function (response) {
            let responseText = JSON.parse(response.responseText)
            console.log(responseText);
            switch (responseText.status) {
                case 200:
                    // apply animation and reload the page.
                    pauseLoaderAnimate(responseText, 2000);
                    break;
                case 400:
                    // Warning message as few records are unable to CRUD.
                    loadAlertMessage(responseText)
                    break;
                case 500:
                    // Warning message as few records are unable to CRUD.
                    loadAlertMessage(responseText)
                    break;
            }
        },
    });
}

function updateWeeklyTopicAjaxCall(updateWeeklyTopics, recentlyAddedWeeklyTopics) {
    $.ajax({
        type: "POST",
        url: "CourseProfileAssets/Operation/WeeklyTopicAjax.php?actionType=UpdateData",
        data: {
            updateWeeklyTopics: updateWeeklyTopics,
            recentlyAddedWeeklyTopics: recentlyAddedWeeklyTopics,
            updation: true
        },
        beforeSend: function () {
            $("main").toggleClass("blur-filter");
            $('body').append(processLoaderAnimation());
            $('#loader').toggleClass('hidden')
            $("#loader").fadeIn(3000);
        },
        success: function (data) {
        },
        complete: function (response) {
            let responseText = JSON.parse(response.responseText)
            console.log(responseText)
            switch (responseText.status) {
                case 200:
                    // apply animation and reload the page.
                    pauseLoaderAnimate(responseText, 2000);
                    break;
                case 400:
                    // Warning message as few records are unable to CRUD.
                    loadAlertMessage(responseText)
                    break;
                case 500:
                    // Warning message as few records are unable to CRUD.
                    loadAlertMessage(responseText)
                    break;

                case 501:
                    // Warning message as few records are unable to CRUD.
                    loadAlertMessage(responseText)
                    break;
            }
        },
    });
}

function deleteWeeklyTopicAjaxCall(deletedWeeklyTopics, remainingWeeklyID) {
    $.ajax({
        type: "POST",
        url: "CourseProfileAssets/Operation/WeeklyTopicAjax.php?actionType=DeleteData",
        data: {
            deletedWeeklyIdsArray: deletedWeeklyTopics,
            remainingWeeklyIds: remainingWeeklyID,
            deletion: true
        },
        success: function (data) {
            console.log(JSON.parse(data))
        }
    });
}

function pauseLoaderAnimate(responseText, requestTimeOut) {
    const interval = setInterval(function () {
        $("main").toggleClass("blur-filter");
        $('#loader').remove();
        loadAlertMessage(responseText);
        clearInterval(interval);
    }, requestTimeOut);
}

function loadAlertMessage(responseText, requestTimeStart = 4000, requestTimeEnd = 2000) {
    let message = responseText.message;

    if (responseText.status === 501) {
        $('body').append(popupErrorNotifier("SERVER Response Error", message));
        $("#errorMessageDiv").toggle("hidden").animate(
            {right: 0,}, requestTimeStart, function () {
                $(this).delay(requestTimeEnd).fadeOut().remove();
            }).removeAttr("style").removeClass("hidden");

    } else if (responseText.status !== 200) {
        $('body').append(popupErrorNotifier("SERVER Response Error", message));
        $("#errorMessageDiv").toggle("hidden").animate(
            {right: 0,}, requestTimeStart, function () {
                window.location.reload();
                $(this).delay(requestTimeEnd).fadeOut().remove();
            }).removeAttr("style").removeClass("hidden");

    } else if (responseText.status === 200) {
        $("body").append(successfulMessageNotifier(responseText.errors, message));
        $("#successNotifiedId").toggle("hidden").animate(
            {right: 0}, requestTimeStart, function () {
                window.location.reload();
                $(this).delay(requestTimeEnd).fadeOut().remove();
            }).removeAttr("style").removeClass("hidden");
    }
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

function loadWeeklyData() {
    $.ajax({
        type: "POST",
        // dataType: 'JSON',
        url: "CourseProfileAssets/WeeklyTopicAjax.php",
        success: function (data) {
            $('#courseweekParentDivID').html(data)
        }
    });
}