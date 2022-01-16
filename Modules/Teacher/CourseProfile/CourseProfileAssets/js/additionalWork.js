
function setLocalStorage(key, currentPageArray) {
    localStorage.setItem(key, JSON.stringify(currentPageArray));
}
function getLocalStorage(key) { // returns an array list for current page data.
    return JSON.parse(localStorage.getItem(key));
}
function clearAllStorage() {
    localStorage.clear();
}

function setJsonLocalStorage() {
    let simpleJson = {
        fruits: [
            {name: "Blueberries", color: "blue"},
            {name: "Kiwi", color: "green"},
            {name: "Lemon", color: "yellow"},
            {name: "Strawberries", color: "red"},
            {name: "Mango", color: "yellow"},
            {name: "Apple", color: "red"},
        ],
        vegetables: [
            {name: "Cucumber", color: "gree"},
            {name: "Carrot", color: "orange"},
            {name: "Cauliflower", color: "white"},
            {name: "Potato", color: "brown"},
        ]
    };

    console.log(simpleJson);
    localStorage.setItem("fruitsAndVeggies", JSON.stringify(simpleJson));
}
function getJsonLocalStorage() {
    let fromStorage = localStorage.getItem("fruitsAndVeggies");
    let backToJson = JSON.parse(fromStorage);
    console.log(fromStorage);
    console.log(backToJson);
    document.getElementById("localStorageValue").textContent = backToJson.fruits[4].name + ": " + backToJson.fruits[4].color;
}

function isNumeric(selectedInput) {
    return selectedInput.value = selectedInput.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
       // return selectedInput.value = selectedInput.value.replace(/[^0-9.]/g, '').replace(/(..?)\..*/g, '');
}

function functionExit(functionName) {
    if (typeof functionName == 'function') {
        return true;
    }
    return false;
}

function showTooltip(flag) {
    const toolid = 'tooltip' + flag;
    $(`div[id='${toolid}']`).removeClass('hidden');

}
function hideTooltip(flag) {
    const toolid = 'tooltip' + flag;
    $(`div[id='${toolid}']`).addClass('hidden');
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
    init: function() {
        this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
        this.version = this.searchVersion(navigator.userAgent) ||
            this.searchVersion(navigator.appVersion) ||
            "an unknown version";
        this.OS = this.searchString(this.dataOS) || "an unknown OS";
    },
    searchString: function(data) {
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
    searchVersion: function(dataString) {
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
function isNumeric_(a) {
    for (var b = "0123456789".split(""), d = !1, c = 0; c < b.length; c++)
        if (b[c] === a) {
            d = !0;
            break
        }
    return d
}
function needHelp(a) {
    $(".faqquestion").click(function(b) {
        $(this).parent().hasClass("viewall") || ($(this).siblings(".faqanswer").slideToggle("fast", function() {
            $(this).parent().hasClass("active") ? $(this).parent().removeClass("active") : $(this).parent().addClass("active")
        }), b.preventDefault(), void 0 != a && null != a && a())
    })
}
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
// var timer = setInterval(toggleSomething, 1000);

function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if(pair[0] === variable){return pair[1];}
    }
    return false;
}

/*window.onload = function () {
    HTMLTextAreaElement.prototype.getCaretPosition = function () { //return the caret position of the textarea
        return this.selectionStart;
    };
    HTMLTextAreaElement.prototype.setCaretPosition = function (position) { //change the caret position of the textarea
        this.selectionStart = position;
        this.selectionEnd = position;
        this.focus();
    };
    HTMLTextAreaElement.prototype.hasSelection = function () { //if the textarea has selection then return true
        if (this.selectionStart === this.selectionEnd) {
            return false;
        } else {
            return true;
        }
    };
    HTMLTextAreaElement.prototype.getSelectedText = function () { //return the selection text
        return this.value.substring(this.selectionStart, this.selectionEnd);
    };
    HTMLTextAreaElement.prototype.setSelection = function (start, end) { //change the selection area of the textarea
        this.selectionStart = start;
        this.selectionEnd = end;
        this.focus();
    };

    var textarea = document.getElementById('quizDetailID')
    console.log("textarea" , textarea)
    textarea.onkeydown = function(event) {

        //support tab on textarea
        if (event.keyCode === 9) { //tab was pressed
            var newCaretPosition;
            newCaretPosition = textarea.getCaretPosition() + "    ".length;
            textarea.value = textarea.value.substring(0, textarea.getCaretPosition()) + "    " + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
            textarea.setCaretPosition(newCaretPosition);
            return false;
        }
        if(event.keyCode == 8){ //backspace
            if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) === "    ") { //it's a tab space
                var newCaretPosition;
                newCaretPosition = textarea.getCaretPosition() - 3;
                textarea.value = textarea.value.substring(0, textarea.getCaretPosition() - 3) + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
                textarea.setCaretPosition(newCaretPosition);
            }
        }
        if(event.keyCode == 37){ //left arrow
            var newCaretPosition;
            if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                newCaretPosition = textarea.getCaretPosition() - 3;
                textarea.setCaretPosition(newCaretPosition);
            }
        }
        if(event.keyCode == 39){ //right arrow
            var newCaretPosition;
            if (textarea.value.substring(textarea.getCaretPosition() + 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                newCaretPosition = textarea.getCaretPosition() + 3;
                textarea.setCaretPosition(newCaretPosition);
            }
        }
    }
}*/
/*
function location(){
    // <button onClick="gmapController.addUserLocation()">

    var gmapController = (function () {
        // ************************************
        // Private Variables
        // ************************************
        let map = null;
        let infoWindow = null;
        let mapObjects = [];
        let addrMarker = null;
        let deliveryArea = null;
        let deliveryMeters = {
            "north": 400,
            "south": 1600,
            "east": 1600,
            "west": 1600
        }

        // ************************************
        // Private Functions
        // ************************************
        function initialize() {
            // Create new InfoWindow object
            infoWindow = new google.maps.InfoWindow();

            // Add pie shop object
            mapObjects.push({
                "lat": 36.036020,
                "lng": -86.787600,
                "marker": null,
                "title": "Bethany's Pie Shop",
                "infoContent": "<div class='info-window'><address>Bethany's Pie Shop<br/>117 Franklin Rd<br/>Brentwood, TN 37027</address></div>",
                "infoIcon": "images/cherrypie.jpg"
            });

            // Draw the map
            drawMap(mapObjects[0]);

            // Draw other map objects
            drawMapObjects();

            // Draw a geofence around pie shop
            drawFence(mapObjects[0]);
        }

        function drawMapObjects() {
            // Create a lat/lng boundary
            let bounds = new google.maps.LatLngBounds();
            let i;

            for (i = 0; i < mapObjects.length; i++) {
                // Add marker for map object
                mapObjects[i].marker = drawMarker(mapObjects[i]);
                // Add info window for map object
                addInfoWindow(mapObjects[i]);
                // Extend boundaries to encompass marker
                bounds.extend(mapObjects[i].marker.position);
            }

            // Fit the map to boundaries
            if (mapObjects.length > 1) {
                map.fitBounds(bounds);
            }
        }

        function drawMap(mapObject) {
            // Create map options
            let mapOptions = {
                center: new google.maps.LatLng(mapObject.lat, mapObject.lng),
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            // Create new google map
            map = new google.maps.Map(document.getElementById("map"), mapOptions);
        }

        function drawMarker(mapObject) {
            // Create a new marker since you may need more than one
            let marker = new google.maps.Marker({
                position: new google.maps.LatLng(mapObject.lat, mapObject.lng),
                map: map,
                title: mapObject.title,
                icon: mapObject.infoIcon
            });

            // Add marker to the map
            marker.setMap(map);

            return marker;
        }

        function drawFence(mapObject) {
            // Create boundaries based on coordinates and # of meters
            let bounds = makeDeliveryFence(
                new google.maps.LatLng(mapObject.lat, mapObject.lng),
                deliveryMeters);

            // Draw the rectangle on the map
            deliveryArea = new google.maps.Rectangle({
                map: map,
                bounds: bounds,
                strokeColor: 'red',
                strokeWidth: 2,
                fillOpacity: 0
            });

            // Make sure rectangle is displayed on the map
            map.fitBounds(bounds);
        }

        // Calculate boundaries around center point
        // NOTE: North = 0, East = 90, South = 180, West = -90
        function makeDeliveryFence(point, fence) {
            // Shorten the function name
            let computeOffset = google.maps.geometry.spherical.computeOffset;

            // Make a new point north
            var n = computeOffset(point, fence.north, 0);
            // Make a new point north-east
            var ne = computeOffset(n, fence.east, 90);

            // Make a new point south
            var s = computeOffset(point, fence.south, 180);
            // Make a new point west
            var sw = computeOffset(s, fence.west, -90);

            return new google.maps.LatLngBounds(sw, ne);
        }

        function addInfoWindow(mapObject) {
            // Add click event to marker
            google.maps.event.addListener(mapObject.marker, 'click', function () {
                // Add HTML content for window
                infoWindow.setContent(mapObject.infoContent);
                // Open the window
                infoWindow.open(map, mapObject.marker);
            });
        }

        function addUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (pos) {
                    mapObjects.push({
                        // "lat": pos.coords.latitude,
                        // "lng": pos.coords.longitude,
                        "lat": 36.0364274,
                        "lng": -86.7968576,
                        "marker": null,
                        "title": "Your Location",
                        "infoContent": "<div class='info-window'><p>This is your current location.</p></div>",
                        "infoIcon": "images/walking.jpg"
                    });

                    drawMapObjects();

                    getDirections(new google.maps.LatLng(mapObjects[1].lat, mapObjects[1].lng),
                        new google.maps.LatLng(mapObjects[0].lat, mapObjects[0].lng));
                });
            }
            else {
                displayError("Please update your browser to use Geolocation.");
            }
        }

        function getDirections(from, to) {
            let directionsService = new google.maps.DirectionsService();
            let directionsRenderer = new google.maps.DirectionsRenderer();

            // Set route of how to travel from point A to B
            directionsService.route(
                {
                    origin: from,
                    destination: to,
                    travelMode: 'DRIVING',
                    avoidHighways: true,
                    provideRouteAlternatives: true
                },
                function (response, status) {
                    if (status === 'OK') {
                        directionsRenderer.setDirections(response);
                        // Render directions on the map
                        directionsRenderer.setMap(map);

                        // Call setPanel() to display text directions
                        directionsRenderer.setPanel(
                            document.getElementById("directionsArea"));

                    } else {
                        displayError('Directions request failed due to ' + status);
                    }
                });
        }

        function setMarkerOnAddress(address) {
            var geocoder = new google.maps.Geocoder();

            if (address.length > 0) {
                geocoder.geocode({ 'address': address }, function (results, status) {
                    switch (status) {
                        case google.maps.GeocoderStatus.OK:
                            if (results[0]) {
                                let mapObject = {
                                    "lat": results[0].geometry.location.lat(),
                                    "lng": results[0].geometry.location.lng(),
                                    "marker": null,
                                    "title": address,
                                    "infoContent": null,
                                    "infoIcon": null
                                }
                                // Remove any previous address marker
                                if (addrMarker) {
                                    addrMarker.setMap(null);
                                }

                                // Set marker on map
                                addrMarker = drawMarker(mapObject);

                                // Get existing map boundaries
                                let bounds = map.getBounds();

                                // Extend boundaries to encompass new marker
                                bounds.extend(addrMarker.position);

                                // Make sure rectangle is displayed on the map
                                map.fitBounds(bounds);

                                // Check if marker is within delivery address
                                if (!deliveryArea.getBounds().contains(addrMarker.position)) {
                                    displayError("Address is NOT in delivery area");
                                }
                            }
                            else {
                                displayError("Could not locate address.");
                            }
                            break;

                        case google.maps.GeocoderStatus.ZERO_RESULTS:
                            displayError("No such address found.");
                            break;

                        case google.maps.GeocoderStatus.OVER_QUERY_LIMIT:
                            displayError("Query limit has been exceeded.");
                            break;

                        case google.maps.GeocoderStatus.REQUEST_DENIED:
                            displayError("Query request was denied.");
                            break;

                        case google.maps.GeocoderStatus.INVALID_REQUEST:
                            displayError("Query request was invalid.");
                            break;

                        default:
                            displayError("Unknown status: " + status);
                            break;
                    }
                });
            }
            else {
                displayError("Please enter an address.")
            }
        }

        function displayError(msg) {
            alert(msg);
        }

        // ************************************
        // Public Functions
        // ************************************
        return {
            "initialize": initialize,
            "addUserLocation": addUserLocation,
            "getDirections": function () {
                getDirections(document.getElementById("address").value,
                    "117 Franklin Rd, Brentwood TN 37027");
            },
            "setMarkerOnAddress": function () {
                setMarkerOnAddress(document.getElementById("address").value);
            }
        }
    })();
}
*/
/*function loadGoogleMaps() {
    // Set your Google Maps key here
    let key = "YOUR_KEY_HERE";
    // Set your callback function here
    let callback = "gmapController.initialize";

    // Create a new <script> element
    let elem = document.createElement("script");
    elem.type = "text/javascript";
    elem.src = "https://maps.googleapis.com/maps/api/js?key=" + key + "&callback=" + callback + "&libraries=geometry";
    document.body.appendChild(elem);
}*/
