function isNumeric(selectedInput) {
    return selectedInput.value = selectedInput.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
    // return selectedInput.value = selectedInput.value.replace(/[^0-9.]/g, '').replace(/(..?)\..*/g, '');
}

function isNum(val) {
    return !isNaN(val)
}

function isCharacterALetter(char) {
    return (/[a-zA-Z]/).test(char)
}


function showTooltip(flag) {
    const toolid = 'tooltip' + flag;
    $(`div[id='${toolid}']`).removeClass('hidden');
}

function hideTooltip(flag) {
    const toolid = 'tooltip' + flag;
    $(`div[id='${toolid}']`).addClass('hidden');
}

function setLocalStorage(key, currentPageArray) {
    localStorage.setItem(key, JSON.stringify(currentPageArray));
}

function getLocalStorage(key) { // returns an array list for current page data.
    return JSON.parse(localStorage.getItem(key));
}

function clearAllStorage() {
    localStorage.clear();
}

function functionExit(functionName) {
    if (typeof functionName == 'function') {
        return true;
    }
    return false;
}

function uniquePLO(str, c, CLONumber) {
    return "clo-" + CLONumber + "_plo-" + c;
}


function setJsonLocalStorage() {
    let simpleJson = {
        t: [
            {name: "x", color: "xo"},
        ],

    };

    console.log(simpleJson);
    localStorage.setItem("testing", JSON.stringify(simpleJson));
}

function getJsonLocalStorage() {
    let fromStorage = localStorage.getItem("");
    let backToJson = JSON.parse(fromStorage);
    console.log(fromStorage);
    console.log(backToJson);
    document.getElementById("testing").textContent = backToJson.t[0].name;
}


$.fn.textNodes = function () {
    return this.contents().filter(function () {
        return (this.nodeType === Node.TEXT_NODE && this.nodeValue.trim() !== "");
    });
}

// Extra Work-list:
function stripFullPath(tempFileName, lastDir) {
    var fileName = tempFileName;
    // anything before the last lastDir will be lost
    var filenameStart = 0;
    filenameStart = fileName.lastIndexOf(lastDir);
    if (filenameStart < 0) {
        return tempFileName;
    }
    var filenameFinish = fileName.length;
    fileName = fileName.substring(filenameStart + lastDir.length,
        filenameFinish);
    return fileName;
}

function stripIllegalChars(value) {
    var t = "";
    // first we need to escape any "\n" or "/" or "\"
    value = value.toLowerCase();
    for (var i = 0; i < value.length; i++) {
        if (value.charAt(i) != '\n' &&
            value.charAt(i) != '/' &&
            value.charAt(i) != "\\") {
            t += value.charAt(i);
        } else if (value.charAt(i) == '\n') {
            t += "n";
        }
    }
    return t;
}

var BrowserDetect = {
    init: function () {
        this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
        this.version = this.searchVersion(navigator.userAgent) ||
            this.searchVersion(navigator.appVersion) ||
            "an unknown version";
        this.OS = this.searchString(this.dataOS) || "an unknown OS";
    },
    searchString: function (data) {
        for (var i = 0; i < data.length; i++) {
            var dataString = data[i].string;
            var dataProp = data[i].prop;
            this.versionSearchString = data[i].versionSearch || data[i].identity;
            if (dataString) {
                if (dataString.indexOf(data[i].subString) != -1) {
                    return data[i].identity;
                }
            } else if (dataProp) {
                return data[i].identity;
            }
        }
    },
    searchVersion: function (dataString) {
        var index = dataString.indexOf(this.versionSearchString);
        if (index == -1) {
            return;
        }
        return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
    },
    dataBrowser: [{
        string: navigator.userAgent,
        subString: "Chrome",
        identity: "Chrome",
        id: 1
    },
        {
            string: navigator.userAgent,
            subString: "OmniWeb",
            versionSearch: "OmniWeb/",
            identity: "OmniWeb",
            id: 2
        },
        {
            string: navigator.vendor,
            subString: "Apple",
            identity: "Safari",
            versionSearch: "Version",
            id: 3
        },
        {
            prop: window.opera,
            identity: "Opera",
            id: 4
        },
        {
            string: navigator.vendor,
            subString: "iCab",
            identity: "iCab",
            id: 5
        },
        {
            string: navigator.vendor,
            subString: "KDE",
            identity: "Konqueror",
            id: 5
        },
        {
            string: navigator.userAgent,
            subString: "Firefox",
            identity: "Firefox",
            id: 6
        },
        {
            string: navigator.vendor,
            subString: "Camino",
            identity: "Camino",
            id: 7
        },
        { // for newer Netscapes (6+)
            string: navigator.userAgent,
            subString: "Netscape",
            identity: "Netscape",
            id: 8
        },
        {
            string: navigator.userAgent,
            subString: "MSIE",
            identity: "Explorer",
            versionSearch: "MSIE",
            id: 9
        },
        {
            string: navigator.userAgent,
            subString: "Gecko",
            identity: "Mozilla",
            versionSearch: "rv",
            id: 10
        },
        { // for older Netscapes (4-)
            string: navigator.userAgent,
            subString: "Mozilla",
            identity: "Netscape",
            versionSearch: "Mozilla",
            id: 11
        }
    ],
    dataOS: [{
        string: navigator.platform,
        subString: "Win",
        identity: "Windows"
    },
        {
            string: navigator.platform,
            subString: "Mac",
            identity: "Mac"
        },
        {
            string: navigator.userAgent,
            subString: "iPhone",
            identity: "iPhone/iPod"
        },
        {
            string: navigator.platform,
            subString: "Linux",
            identity: "Linux"
        }
    ]

};


function isSpecialChar(a, b) {
    var d = "`~,\\/.!@#$%^><?&*-_+=)([]\"';:{}|".split(""),
        c = !1;
    b || d.push(" ");
    for (var g = 0; g < d.length; g++)
        if (d[g] === a) {
            c = !0;
            break
        }
    return c
}

function validateIE7(a, b) {
    var d = !1,
        c = !1,
        g = !1,
        f = !1;
    8 <= a.length && 15 >= a.length && (g = !0);
    for (var e = 0; e < a.length; e++) isNumeric(a.charAt(e)) ? d = !0 : 65 < a.charAt(e).charCodeAt(0) && 90 > a.charAt(e).charCodeAt(0) || 97 < a.charAt(e).charCodeAt(0) && 122 > a.charAt(e).charCodeAt(0) ? c = !0 : isSpecialChar(a.charAt(e), b) && (f = !0);
    e = !1;
    g && d && c && !f && (e = !0);
    return e
}

function setFieldState(a, b) {
    b ? ($(a).removeAttr("disabled"), $(a).removeClass("inactive")) : ($(a).attr("disabled", "disabled"), $(a).addClass("inactive"))
}

function hasErrors(a, b, d) {
    var c = !1;
    a = getBasicFieldErrorMessages(2, 35, $(a).val(), b, d);
    null != a && 0 < a.length && (c = !0);
    setFieldState(!c);
    return c
}

function getValidateMessageListCheckSpaces(a, b, d, c, g) {
    var f = "",
        e = getBasicFieldSuccessMessages(b, d, $(a).val(), c, g);
    if (null != e && 0 < e.length)
        for (i = 0; i < e.length; i++) f += "<li class='ok'>" + e[i] + "</li>";
    a = getBasicFieldErrorMessages(b, d, $(a).val(), c, g);
    if (null != a && 0 < a.length)
        for (i = 0; i < a.length; i++) f += "<li class='error'>" + a[i] + "</li>";
    return f
}

function getValidateMessageList(a, b, d, c) {
    return getValidateMessageListCheckSpaces(a, b, d, c, !1)
}

function getBasicFieldErrorMessages(a, b, d, c, g) {
    c = [];
    var f = !1;
    (d.length < a || d.length > b) && c.push("Is between " + a + "-" + b + " characters");
    for (a = 0; a < d.length; a++) isSpecialChar(d.charAt(a), g) && (f = !0);
    f && c.push("Contains only letters and numbers");
    return c
}

function getBasicFieldSuccessMessages(a, b, d, c, g) {
    c = [];
    var f = !1;
    d.length >= a && d.length <= b && c.push("Is between " + a + "-" + b + " characters");
    for (a = 0; a < d.length; a++) isSpecialChar(d.charAt(a), g) && (f = !0);
    f || c.push("Contains only letters and numbers");
    return c
}

function isIE7() {
    var a = !1;
    if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
        var b = new Number(RegExp.$1);
        if (7 == b || 6 == b) a = !0
    }
    return a
}

function validatePasswordRules(a) {
    var b = [];
    /[0-9]/.test($(a).val()) || b.push("Includes at least one number");
    /[A-Za-z]/.test($(a).val()) || b.push("Includes at least one letter");
    (8 > $.trim($(a).val()).length || 15 < $.trim($(a).val()).length) && b.push("Is between 8-15 characters");
    isIE7() ? validateIE7($(a).val(), !1) || b.push("Contains only letters and numbers") : /^(?=.*[A-Za-z])(?!.*[`~,\\//\.!@#$%\>\<\?^&\*\-_+=\)\(])(?=.*[0-9])\S{8,15}$/.test($(a).val()) || b.push("Contains only letters and numbers");
    return b
}

function isEmpty(a) {
    return 0 == $.trim(a).length
}

function randRange(data) {
    var newTime = data[Math.floor(data.length * Math.random())];
    return newTime;
}

function toggleSomething() {
    var timeArray = [200, 300, 150, 250, 2000, 3000, 1000, 1500];

    // do stuff, happens to use jQuery here (nothing else does)
    $("#box").toggleClass("visible");

    clearInterval(timer);
    // timer = setInterval(toggleSomething, randRange(timeArray));
}

function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] === variable) {
            return pair[1];
        }
    }
    return false;
}

