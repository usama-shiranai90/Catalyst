window.onload = function (e) {

    fetchWeeklyCoveredRows = Object.values(fetchWeeklyCoveredRows);

    let weeklyRowCounter = 0;

    const parentWeeklyContainer = document.getElementById('courseweekParentDivID');
    const addWeeklyRowBtn = document.getElementById('createWeeklyBtn');

    $(document).ready(function () {

        $(addWeeklyRowBtn).on('click', function (event) {

            initialRowChecking();
        });
        $("img[data-wtcremove='remove']").click(function (event) {
            event.stopImmediatePropagation()

            const dischargedIndex = $(event.target).closest('.learning-outcome-row.h-auto').index();
            $(('#weeklyCoveredRow-' + dischargedIndex)).remove();
        });
    });

    function initialRowChecking() {
        if (weeklyRowCounter === 0){
            weeklyRowCounter++;
            parentWeeklyContainer.appendChild(createNewWeeklyRow(1))
        }
        else {
            parentWeeklyContainer.appendChild(createNewWeeklyRow(weeklyRowCounter))
        }
    }


    fetchedWeekRowInsertionTag(Object.values(fetchWeeklyCoveredRows).length)

    function fetchedWeekRowInsertionTag(size) {
        weeklyRowCounter = size;
        for (let i = 0; i < size; i++) {
            let currentRow = `<div id="weeklyCoveredRow-1" class="grid grid-cols-12 grid-rows-1 gap-0  w-auto learning-outcome-row h-auto overflow-hidden">
                                <div id="wct-wno-r${(i + 1)}-c" class="lweek-column bg-catalystBlue-l61 text-white col-start-1 col-end-2">
                                    <span class="wlearn-cell-data">${fetchWeeklyCoveredRows[i][0]}</span>
                                </div>
                                <div id="wct-wdes-r${(i + 1)}-c" class="lweek-column col-start-2 col-end-7">
                                    <label for="detail-${(i + 1)}">
                                        <textarea type="text" class="pt-4 px-2 h-auto cell-input w-full font-medium text-sm" value="" placeholder="Write weekly description here..." id="detail-${(i + 1)}">${fetchWeeklyCoveredRows[i][1]}</textarea></label>
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
                                    <label for="clo-1-bt-level">
                                        <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                                            <img class="h-10 w-6" alt="" src="../../../Assets/Images/vectorFiles/Icons/add-button.svg" data-wtcedit>
                                            <img class="h-10 w-6" alt="" src="../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg" data-wtcremove=\"remove\">
                                        </div>
                                    </label>
                                </div>
                            </div>`
            parentWeeklyContainer.innerHTML += currentRow;

            let rowCLList = document.getElementById('wtc-clos-r' + (i + 1))
            createRowClosList(i, rowCLList)
        }
    }

    function createRowClosList(currentIndex, clo_list) {
        console.log(fetchWeeklyCoveredRows[(currentIndex)][2].length)

        for (let i = 0; i < fetchWeeklyCoveredRows[(currentIndex)][2].length; i++) {  //weekclo${(i + 1)}
            let clo_no_row = `<div id="wtc-${currentIndex + 1}-clo-c${i + 1}-c">
                                            <input class="clo-toggle hidden" id="week${(i + 1)}-clo-${currentIndex + 1}" value="week${(currentIndex + 1)}-clo-${i + 1}" name="week${(currentIndex + 1)}-clos" type="checkbox">
                                            <label class="inside-label cprofile-cell-data" for="week1-clo-${currentIndex + 1}">
                                                CLO${i + 1}<span><svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg> </span>
                                            </label>
                                        </div>`

            const documentFragment = document.createDocumentFragment();
            const elem = document.createElement('div');
            elem.innerHTML = clo_no_row;
            while (elem.childNodes[0]) {
                documentFragment.appendChild(elem.childNodes[0]);
            }
            clo_list.appendChild(documentFragment)
        }
    }

    function createNewWeeklyRow() {
        const str = `<div id="weeklyCoveredRow-1"
     class="grid grid-cols-12 grid-rows-1 gap-0  w-auto learning-outcome-row h-auto overflow-hidden">
    <div id="wct-wno-r1-c"
         class="lweek-column bg-catalystBlue-l61 text-white col-start-1 col-end-2">
        <span class="wlearn-cell-data">01</span>
    </div>
    <div id="wct-wdes-r1-c" class="lweek-column col-start-2 col-end-7">
        <label for="detail-1">
            <textarea type="text" class="pt-4 h-auto cell-input w-full font-medium text-sm"
                      value="" placeholder="Write weekly description here..."
                      id="detail-1"></textarea></label>
    </div>
    <div class="lweek-column  col-start-7 col-end-8">
        <div id="wtc-clos-r1" class="flex flex-col overflow-y-visible ">
            <div id="wtc-clo-c1-c">
                <input class="clo-toggle hidden" id="week1-clo-1" value="week1-clo-1"
                       name="weekclo1" type="checkbox"/>
                <label class="inside-label cprofile-cell-data" for="week1-clo-1">
                    CLO1<span><svg width="50px" height="15px"><use
                                    xlink:href="#check-tick"></use></svg> </span>
                </label>
            </div>
            <div id="wtc-clo-c2-c">
                <input class="clo-toggle hidden" id="week1-clo-2" value="week1-clo-2"
                       name="weekclo1" type="checkbox"/>
                <label class="inside-label cprofile-cell-data" for="week1-clo-2">
                    CLO2<span><svg width="50px" height="15px"><use
                                    xlink:href="#check-tick"></use></svg> </span>
                </label>
            </div>
            <div id="wtc-clo-c3-c">
                <input class="clo-toggle hidden" id="week1-clo-3" value="week1-clo-3"
                       name="weekclo1" type="checkbox"/>
                <label class="inside-label cprofile-cell-data" for="week1-clo-3">
                    CLO3<span><svg width="50px" height="15px"><use
                                    xlink:href="#check-tick"></use></svg> </span>
                </label>
            </div>

        </div>
    </div>
    <div id="wct-wassessment-r1-c" class="lweek-column  col-start-8 col-end-12">
        <label for="assessment-clo-1">
            <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm"
                      value="" placeholder="Write week assessment here..."
                      id="assessment-clo-1"></textarea></label>

    </div>
    <div class="lweek-column ">
        <label for="clo-1-bt-level">
            <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                <img class="h-10 w-6" alt=""
                     src="../../../Assets/Images/vectorFiles/Icons/add-button.svg">
                <img class="h-10 w-6" alt=""
                     src="../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg">
            </div>
        </label>
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
}