
function setLocalStorage(key , currentPageArray) {
    localStorage.setItem(key, currentPageArray);
}

function getLocalStorage(key) { // returns an array list for current page data.
    return  localStorage.getItem(key);
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

function loadGoogleMaps() {
    // Set your Google Maps key here
    let key = "YOUR_KEY_HERE";
    // Set your callback function here
    let callback = "gmapController.initialize";

    // Create a new <script> element
    let elem = document.createElement("script");
    elem.type = "text/javascript";
    elem.src = "https://maps.googleapis.com/maps/api/js?key=" + key + "&callback=" + callback + "&libraries=geometry";
    document.body.appendChild(elem);
}