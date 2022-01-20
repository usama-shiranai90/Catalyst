
function checkEmptyFields(fieldsArray, counter , storeValue , instrumentWeight) {  //textField-error-input
    for (let i = 0; i < fieldsArray.length; i++)
        errorInputType(fieldsArray[i]);

    if (counter === 1) {
        if (completeFlag) {
            if (isWeightExceeded(instrumentWeight)) {
                $('#cpEssentialID').addClass("hidden");
                $('#cpDetaillID').removeClass("hidden");
                for (let i = 0; i < fieldsArray.length; i++) {
                    storeValue.push(fieldsArray[i].value);
                }
            } else {
                showErrorBox("Weight for assessment is exceeded");
            }

        } else {
            showErrorBox("Please complete all fields to continue")
        }
    } else if (counter === 2) {
        if (completeFlag) {
            $('#cpDetaillID').addClass("hidden");
            $('#cpDistributionID').removeClass("hidden");

            for (let i = 0; i < fieldsArray.length; i++) {
                storeValue.push(fieldsArray[i].value);
            }
        } else showErrorBox("Please fill all fields to continue");
    }
}

function errorInputType(currentField) {
    if (currentField.value.length === 0) {
        completeFlag = false;
        if (currentField.tagName === "SELECT")
            currentField.parentElement.classList.add("select-error-input")
        else if (currentField.tagName === "INPUT" || currentField.tagName === "TEXTAREA")
            currentField.parentElement.classList.add("textField-error-input")
    }
}

let totalWeight;
const isWeightExceeded = (instrumentWeight) => {
    totalWeight = 0;
    let flag = true;
    Object.keys(instrumentWeight).forEach(function (value, index) {

        $(this).on('change',function (e) {
            e.stopImmediatePropagation();
            totalWeight+= parseInt( e.target.value , 10);
            if (totalWeight > 99) {
                e.target.parentElement.classList.add("textField-error-input");

                flag = false;
                return flag;
            }
            console.log(typeof totalWeight, totalWeight)
        })

        if (!flag){
            this.target.parentElement.classList.add("textField-error-input");
            this.target.disabled = true;
        }
    });
    return flag;
}

function showErrorBox(header = 'Empty Alert!', message) {
    $('#errorID span').text(header)
    $('#errorID').textNodes().first().replaceWith(message);
    $("#errorMessageDiv").toggle("hidden").animate(
        {right: 0,}, 1000, function () {
            $(this).delay(3000).fadeOut();
        });
    // $('#errorMessageDiv').removeAttr("style");
}

function createFirstCLODetailRow() {
    const data = "<div id=\"CourseLearningRow-1\" class=\"flex w-full learning-outcome-row\">\n" +
        "                                        <div class=\"cprofile-column h-10 w-24 bg-catalystBlue-l61 text-white\" id=\"nameCLO-1\">\n" +
        "                                            <span class=\"cprofile-cell-data\" data-clod-no ='c1-no'>CLO-1</span>\n" +
        "                                        </div>\n" +
        "                                        <div class=\"cprofile-column h-10 w-3/4\">\n" +
        "                                            <!-- <span class=\"cprofile-cell-data\">Understanding the role of Indesign and its major activities within the OO software</span>-->\n" +
        "                                            <label for=\"descriptionCLO-1\"></label>\n" +
        "                                            <input type=\"text\" class=\"cell-input min-w-full\" name='courseCLOs[CLO-1][Description]' data-clod-desc ='c1-desc'  value=\"\" placeholder=\"Enter CLO description\" id=\"descriptionCLO-1\">\n" +
        "\n" +
        "                                        </div>\n" +
        "                                        <div class=\"cprofile-column h-10 w-1/6\">\n" +
        "                                            <label for=\"undergraduateCLO-1\"></label>\n" +
        "                                            <input type=\"text\" class=\"cell-input\" name='courseCLOs[CLO-1][Domain]' data-clod-domain ='c1-domain' value=\"Undergraduate\" id=\"undergraduateCLO-1\" readonly=\"\">\n" +
        "                                        </div>\n" +
        "                                        <div class=\"cprofile-column h-10 w-1/6\">\n" +
        "                                            <div class=\"flex flex-row\">\n" +
        "                                                <input type=\"text\" class=\"cell-input h-10 min-w-0\" oninput='isNumeric(this)' data-clod-bt ='c1-bt' name='courseCLOs[CLO-1][BTLevel]' value=\"\" placeholder=\"Enter BT-Level\" id=\"btLevelCLO-1\">\n" +
        "                                                <label for=\"btLevelCLO-1\"></label>\n" +
        "                                                <img class=\"h-10 w-6 cursor-pointer\" alt=\"\" src=\"../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg\" data-clo-des=\"remove\">\n" +
        "                                            </div>\n" +
        "                                        </div>\n" +
        "                                    </div>"

    var frag = document.createDocumentFragment();
    var elem = document.createElement('div');
    elem.innerHTML = data;
    while (elem.childNodes[0]) {
        frag.appendChild(elem.childNodes[0]);
    }
    return frag;
}

function createFirstCLOMapRow(totalPlo , outcomeMapContainer) {

    let container = '<div id="clo-map-div-1" class="flex w-full items-start text-black uppercase text-center text-md font-medium bg-gray-200 h-10">\n' +
        '                                        <svg class="hidden tick-icon">\n' +
        '                                            <symbol id="check-tick" viewbox="0 0 12 10">\n' +
        '                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>\n' +
        '                                            </symbol>\n' +
        '                                        </svg>\n' +
        '                                        <div class="cprofile-column h-10 bg-catalystBlue-l61 text-white w-1/6">\n' +
        '                                            <span class="cprofile-cell-data">CLO-1</span>\n' +
        '                                        </div>\n' +
        '                                    </div>';

    outcomeMapContainer.innerHTML += container;

    let header = document.getElementById('cloMapHeaderID');
    let clo_map_row_div = document.getElementById('clo-map-div-1');
    header.innerHTML = `<div class="cprofile-column h-10 w-1/6"> 
                                <span class="cprofile-cell-data">PLOs</span>
                            </div>`

    // CLO number header.
    for (let i = 1; i <= totalPlo; i++) {

        //onmouseover="this.classList.remove('hidden')" onfocus="this.classList.remove('hidden')" onmouseout="this.classList.add('hidden')"
        //onmouseover="showTooltip(${i})" onfocus="showTooltip(${i})" onmouseout="hideTooltip(${i})"
        let header_number = `<div class="cprofile-column h-10 w-1/6 hover:bg-catalystLight-e4
                               focus:outline-none focus:ring-gray-300 relative"
                               onmouseover="showTooltip(${i})" onfocus="showTooltip(${i})" onmouseout="hideTooltip(${i})" > 
                                      
                <!-- tool-tip description section. -->
                    <div id="tooltip${i}" role="tooltip" class="hidden z-20 w-64 fixed transition duration-150 ease-in-out top-1/2 right-14 ml-8 shadow-lg bg-white p-4 rounded">
                    <p class="text-sm font-bold text-gray-800 pb-1" id="plono-${i}">${ploArray[i - 1][0]}</p>
                    <p class="text-xs leading-4 text-gray-600 pb-3">${ploArray[i - 1][1]}</p>
                    <button class="focus:outline-none  focus:text-gray-400 text-xs text-gray-600 underline mr-2 cursor-pointer">Map view</button>  </div>
                                    <span class="cprofile-cell-data">${i}</span> 
                                </div>`
        header.innerHTML += header_number;

        let row_data = `<div class="cprofile-column h-10 w-1/6  "> 
                                <input class="clo-toggle hidden" id="clo-1-plo-${i}" value="clo-1-plo-${i}" name="[clo-1][plo-${i}]" type="checkbox" />
                                <label class="inside-label cprofile-cell-data" for="clo-1-plo-${i}">
                                <span> <svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg> </span>
                                </label> 
                       </div>`
        clo_map_row_div.innerHTML += row_data;
    }
}

