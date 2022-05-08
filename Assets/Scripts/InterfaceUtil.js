/** Notification or Issue generate section of functions */

/** NOTIFIER */
function popupErrorNotifier(header, container) {
    return `      <div id="errorMessageDiv"
                 class="hidden fixed bottom-0 right-0 z-50 flex p-4 mb-4 text-md font-sm text-red-700 bg-red-100 rounded-lg">
                <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0
                     001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <div id="errorID">
                    <span class="font-medium">${header}!</span><br>${container}
                </div>
            </div>`
}

function successfulMessageNotifier(header, message) {
    return `<div id="successNotifiedId" class="hidden fixed top-5 right-0 py-8 px-6 flex items-center w-2/6 shadow 
                        divide-x divide-gray-500 
                        text-gray-500 bg-green-50 border-l-4 border-green-400 rounded-lg rounded-r-lg gap-5" style="z-index: 999;">
                   
                   <?xml version="1.0"?>
                  
                   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Icons" class="h-6 w-10 fill-current text-green-300" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" xml:space="preserve"><style type="text/css">
\t.st0{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
\t.st1{fill:none;stroke:#000000;stroke-width:2;stroke-linejoin:round;stroke-miterlimit:10;}
</style><polyline class="st0" points="3,8 16,16 29,8 "/><polyline class="st0" points="27,22 23,26 21,24 "/><circle class="st0" cx="24" cy="24" r="7"/><path class="st0" d="M17.1,25H7c-2.2,0-4-1.8-4-4V7c0-2.2,1.8-4,4-4h18c2.2,0,4,1.8,4,4v12.1"/></svg>
                   
                  <div class="pl-4 font-normal flex flex-col text-sm">
                      <h3 class="text-gray-600 font-medium">${header}</h3>
                  ${message}
                    </div>
                </div>`
}


/** ALERT MESSAGE CONTAINERS */
function alertConfirmationMessage(header = 'Assign New Administrator Role', bodyContainer, extraMessage = '', extraMessageSecond = '', endOfContainer = '') {
    return `<div id="alertMessageContainer" class="shadow-lg rounded-2xl p-2 bg-white w-1/3 m-auto fixed top-1/3 left-1/3 z-5">
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    ${header}
                </h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">
                        ${bodyContainer}
                        <span class="font-semibold">${extraMessage}.<br /></span>
                        ${endOfContainer}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-50 px-4 gap-5 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button id="alertDeleteBtnId" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-nonesm:ml-3 sm:w-auto sm:text-sm">
            Delete
        </button>
        <button
            type="button" id="alertCancelBtnId"
            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
        </button>
    </div>
</div>
`
}

function alertConfirmationMessageCentricDesign() {
    return `<div id="alertContainer"
     class=" shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-800 w-80 m-auto fixed top-1/3 left-1/3 z-5">
    <div class="w-full h-full text-center">
        <div class="flex h-full flex-col justify-between">
            <img src="../../../Assets/Images/vectorFiles/Others/Dot-section.svg" alt="cross"
                 class="h-12 w-12 mt-4 m-auto" id="cmimageID">
            <p class="text-gray-600 dark:text-gray-100 text-md py-2 px-6">
                Do you wish to delete the selected <span
                        class="text-gray-800 dark:text-white font-bold">CLO</span> and map their respective <span
                        class="text-gray-800 dark:text-white font-bold">PLOs</span>?<br>
                <span class="text-gray-800 dark:text-white font-bold">Note : </span> It will be deleted from database.
            </p>
            <div id="aboxcontainer" class="flex items-center justify-between gap-4 w-full mt-8">
                <button id="alertBtnNo" type="button" class="loginButton py-2 px-4 hover:bg-indigo-700
                        text-white w-full transition ease-in duration-200 text-center text-base
                         font-semibold shadow-md rounded-lg">No
                </button>

                <button id="alertBtndeleteCLO" type="button" class="loginButton py-2 px-4 hover:bg-indigo-700
                        text-white w-full transition ease-in duration-200 text-center text-base
                         font-semibold shadow-md rounded-lg">Yes
                </button>

            </div>
        </div>
    </div>
</div>`
}

function alertConfirmationDesignP2() {
    return `  <div className="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
         aria-modal="true">
        <div className="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div className="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span className="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                className="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div className="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div className="sm:flex sm:items-start">
                        <div
                            className="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg className="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div className="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 className="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Deactivate account
                            </h3>
                            <div className="mt-2">
                                <p className="text-sm text-gray-500">
                                    Are you sure you want to deactivate your account? All of your data will be
                                    permanently
                                    removed. This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button"
                            className="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Deactivate
                    </button>
                    <button type="button"
                            className="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>`;
}

function p3() {
    return `<div x-show="modalOpen" x-transition="" class="bg-black bg-opacity-90 fixed top-0 left-0 w-full min-h-screen h-full flex items-center justify-center px-4 py-5">
    <div @click.outside="modalOpen = false" class="w-full max-w-[570px] rounded-[20px] bg-white py-12 px-8 md:py-[60px] md:px-[70px] text-center">
        <h3 class="font-bold text-dark text-xl sm:text-2xl pb-2">
            Your Message Sent Successfully
        </h3>
        <span class="inline-block bg-primary h-1 w-[90px] mx-auto rounded mb-6"></span>
        <p class="text-base text-body-color leading-relaxed mb-10">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
        </p>
        <div class="flex flex-wrap -mx-3">
            <div class="w-1/2 px-3">
                <button @click="modalOpen = false" class="block text-center w-full p-3 text-base font-medium rounded-lg text-dark border border-[#E9EDF9] hover:bg-red-600 hover:text-white hover:border-red-600 transition">
                    Cancel
                </button>
            </div>
            <div class="w-1/2 px-3">
                <button class="block text-center w-full p-3 text-base font-medium rounded-lg bg-primary text-white border border-primary hover:bg-opacity-90 transition">
                    View Details
                </button>
            </div>
        </div>
    </div>
</div>`
}

function p4() {
    return `<div class="w-full bg-warning bg-opacity-[15%] px-7 py-8 md:p-9 rounded-lg shadow-md flex border-l-[6px] border-warning">
    <div class="max-w-[36px] w-full h-9 flex items-center justify-center rounded-lg mr-5 bg-warning bg-opacity-30">
        <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1.50493 16H17.5023C18.6204 16 19.3413 14.9018 18.8354 13.9735L10.8367 0.770573C10.2852 -0.256858 8.70677 -0.256858 8.15528 0.770573L0.156617 13.9735C-0.334072 14.8998 0.386764 16 1.50493 16ZM10.7585 12.9298C10.7585 13.6155 10.2223 14.1433 9.45583 14.1433C8.6894 14.1433 8.15311 13.6155 8.15311 12.9298V12.9015C8.15311 12.2159 8.6894 11.688 9.45583 11.688C10.2223 11.688 10.7585 12.2159 10.7585 12.9015V12.9298ZM8.75236 4.01062H10.2548C10.6674 4.01062 10.9127 4.33826 10.8671 4.75288L10.2071 10.1186C10.1615 10.5049 9.88572 10.7455 9.50142 10.7455C9.11929 10.7455 8.84138 10.5028 8.79579 10.1186L8.13574 4.75288C8.09449 4.33826 8.33984 4.01062 8.75236 4.01062Z"
                fill="#FBBF24"
            ></path>
        </svg>
    </div>
    <div class="w-full">
        <h5 class="text-lg font-semibold mb-3 text-[#9D5425]">
            Attention needed
        </h5>
        <p class="text-base text-[#D0915C] leading-relaxed">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
        </p>
    </div>
</div>`
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
        else if (currentField.tagName === "INPUT" || currentField.tagName === "TEXTAREA" || currentField.tagName === "DATE")
            currentField.parentElement.classList.add("textField-error-input")
        isEmpty = false;
    }
}


/** When Loading Happens the following function is loaded. */
function processLoaderAnimation() {
    return `<div id="loader" class="hidden m-auto fixed top-1/4 left-1/2 z-5">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class=" transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- inline-block align-bottom bg-white rounded-lg text-center overflow-hidden-->
            <div class=" px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <svg class="animate-spin fill-current text-catalystBlue-d2 opacity-100"
                     xmlns="http://www.w3.org/2000/svg"
                     width="55" height="55" viewBox="0 0 24 24">
                    <path d="M13.75 22c0 .966-.783 1.75-1.75 1.75s-1.75-.784-1.75-1.75.783-1.75 1.75-1.75 1.75.784 1.75 1.75zm-1.75-22c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 10.75c.689 0 1.249.561 1.249 1.25 0 .69-.56 1.25-1.249 1.25-.69 0-1.249-.559-1.249-1.25 0-.689.559-1.25 1.249-1.25zm-22 1.25c0 1.105.896 2 2 2s2-.895 2-2c0-1.104-.896-2-2-2s-2 .896-2 2zm19-8c.551 0 1 .449 1 1 0 .553-.449 1.002-1 1-.551 0-1-.447-1-.998 0-.553.449-1.002 1-1.002zm0 13.5c.828 0 1.5.672 1.5 1.5s-.672 1.501-1.502 1.5c-.826 0-1.498-.671-1.498-1.499 0-.829.672-1.501 1.5-1.501zm-14-14.5c1.104 0 2 .896 2 2s-.896 2-2.001 2c-1.103 0-1.999-.895-1.999-2s.896-2 2-2zm0 14c1.104 0 2 .896 2 2s-.896 2-2.001 2c-1.103 0-1.999-.895-1.999-2s.896-2 2-2z"/>
                </svg>
                <span class=" text-lg font-medium antialiased tracking-tighter">Loading</span>
            </div>
        </div>

    </div>
</div>`
}


/** Function list to check whether the required input is character , numeric or letter.  */
function isNumeric(selectedInput) {
    return selectedInput.value = selectedInput.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
    // return selectedInput.value = selectedInput.value.replace(/[^0-9.]/g, '').replace(/(..?)\..*/g, '');
}

function isNum(val) { //function determines whether a value is NaN or not
    return !isNaN(val)
}

function isCharacterALetter(char) {
    return (/^[A-Za-z_ ]+$/gi).test(char);
}

function IsNonNumeric(providedEvent) {
    return /^[a-zA-Z\s]*$/.test(providedEvent.key);
}

function isBloodGroupFormat(providedEvent) {
    return /[A|B|AB|O+-]/i.test(providedEvent.key)   ///^(A|B|AB|O)[+-]*$/
}

function isContactFormat(providedEvent) {
    // return /^(?=.*\d)[\d ]+$/.test(providedEvent.key)
    // return /^(\s*[0-9]+\s*)*$/.test(providedEvent.key)

    const key = event.keyCode || event.charCode;
    if (key === 8)
        providedEvent.target.innerText = providedEvent.target.innerText.substr(0, providedEvent.target.innerText.length - 1);

    return /^[0-9._\b]+$/.test(providedEvent.key)
}

function extractFirstNumeric(text) {
    return text.match(/\d+/)[0];
}

function extractFirstString(text) {
    return text.replace(/[^A-Za-z]/g, '');
}

function removeBrackets(text) {
    return text.replace(/[()]/g, '');
}

function replaceSpaceByDash(text) {
    return text.replace(/\s+/g, '-');
}

function removeRedundantSpace(text) {
    return text.replace(/\s\s+/g, ' ');
}

function controlContactSize(current) {
    console.log(parseInt($(current).children('span').text().length))

    $(current).datePicker('dd/mm/yy');

    if (parseInt($(current).children('span').text().length) > 10) {
        current.innerText = current.innerText.replace(/^(\d{4})(\d{2})(\d{2}).{10}$/, '$1-$2-$3')
        event.preventDefault();
    } else
        $(current).children('span').text($(current).text().length);
}

/** Function List used to show and hide the tooltip when hover over section. */
function showTooltip(flag) {
    const getId = 'tooltip' + flag;
    $(`div[id='${getId}']`).removeClass('hidden');
}

function hideTooltip(flag) {
    const getId = 'tooltip' + flag;
    $(`div[id='${getId}']`).addClass('hidden');
}


/** Perform storage operation for Local storage section.  set , get and clear. */
function setLocalStorage(key, currentPageArray) {
    localStorage.setItem(key, JSON.stringify(currentPageArray));
}

function getLocalStorage(key) { // returns an array list for current page data.
    return JSON.parse(localStorage.getItem(key));
}

function clearAllStorage() {
    localStorage.clear();
}

/** use to check if the parameter is a function or not. */
function functionExit(functionName) {
    if (typeof functionName == 'function') {
        return true;
    }
    return false;
}


/** Function List used to check different input format for program learning outcome, generate unique name , password */
function uniquePLO(str, c, CLONumber) {
    return "clo-" + CLONumber + "_plo-" + c;
}

function uniqueName(str, no, toReplace) {
    return str.replace((toReplace), no);
}

/** To Generate Random Password. */
function makeRanPassword(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() *
            charactersLength));
    }
    return result;
}

const generateSize = (test) => {
    const size = Math.ceil(Math.random() * (Math.random() * 100));
    if (size < 8 || size > 31)
        test = generateSize(0);
    else
        test = size;
    return test;
}


/** Function List to control the height of provided DOM-input */
function autoHeight(element) {
    const inputField = document.getElementById('' + element);
    // console.log("working fine : " , inputField)
    inputField.style.height = "5px";
    inputField.style.height = (inputField.scrollHeight) + "px";
}

/** Custom Node text filter. */
$.fn.textNodes = function () {
    return this.contents().filter(function () {
        return (this.nodeType === Node.TEXT_NODE && this.nodeValue.trim() !== "");
    });
}