// address for the name is to ensure there is no whitespace or empty strings
// since names can vary it only checks that a name is present
const name_regex = /[a-zA-Z0-9_\.\-\,\s]+/;

// address regex checks for at least 3 strings seperated by whitespace.
// since addresses require a number, streetname, and cres/street/boulevard,
// that is the minimum requirement the user must input.
const address_regex = /([a-zA-Z0-9_\.\-\,]+)\s([a-zA-Z0-9_\.\-\,]+)\s([a-zA-Z0-9_\.\-\,]+)([\sa-zA-Z0-9_\.\-\,]+)?/;

// valid image upload types
const valid_img_types = /(\.jpg|\.jpeg|\.png)$/;

// global variables for callback functions
var rr = false;
var rrUser = false;
var isUserLoggedIn = false;

// validate that the address is a valid address
function validate_address() {
    var address = document.getElementById("address");

    // check if the submitted address matches the regexs
    if (address_regex.test(address.value)) {
        address.setAttribute("style", "background-color:white");
		return true;
    } else {

        // If the address does not match the regex, set the box color to pink and return false
        address.setAttribute("style", "background-color:pink");
        window.alert("Address format is incorrect, enter a valid address eg '1280 Main Street West, Hamilton Ontario'");
        return false;
    }
}

// validate that the name is not an empty string
function validate_name() {
    var name_sub = document.getElementById("name");

    // check if the submitted name matches the regex
    if (name_regex.test(name_sub.value)) {
        name_sub.setAttribute("style", "background-color:white");
		return true;
    } else{

        // If the name does not match the regex, set the box color to pink and return false
        name_sub.setAttribute("style", "background-color:pink");
        window.alert("Please enter a gas station name");
        return false;
    }
}

// validate that the review is not an empty string
function validate_review() {
    var review_sub = document.getElementById("review");

    // check if the submitted review matches the regex, we can use the name regex
    if (name_regex.test(review_sub.value)) {
        review_sub.setAttribute("style", "background-color:white");
		return true;
    } else{

        // If the review does not match the regex, set the box color to pink and return false
        review_sub.setAttribute("style", "background-color:pink");
        window.alert("Please enter a review");
        return false;
    }
}

// validate the that the image filetype is a jpeg or a png
function validate_img() {

    // get the uploaded image
    var uploaded_img = document.getElementById("imgupload");

    // check if the submitted name matches the regexs
    if (valid_img_types.test(uploaded_img.value)) {
        return true;
        
    } else{
        
        // returns a pop up instructing the user to enter a jpeg or a png
        window.alert("Please enter either a png or jpeg file");
        return false;
    }

}

// validate that the user actually selected a rating
function validate_rating() {
    var terrible = document.getElementById("terrible").checked;
    var bad = document.getElementById("bad").checked;
    var mediocre = document.getElementById("mediocre").checked;
    var good = document.getElementById("good").checked;
    var excellent = document.getElementById("excellent").checked;
    var buttons_checked = [terrible, bad, mediocre, good, excellent];

    // checks to see if at least one button is clicked
    if (buttons_checked.some(Boolean)){

        return true;

    } else {
        window.alert("Please select a rating")
        return false;
    }

}

// callback functions
function callBackFunction(xhttp) {
    document.getElementById("testButton").innerHTML = xhttp.responseText;
    if (xhttp.responseText == 'User is not logged in') {
        window.alert("Please log in before submitting a review.");
    }
    else if (xhttp.responseText == 'true') {
        rr = true;
    } else {
        rr = false;
    }
}

// Function is responsible for calling the php script, that stores the submission in the database
function store_submission(callBackFunction) {

    rr = false;

    var terrible = document.getElementById("terrible").checked;
    var bad = document.getElementById("bad").checked;
    var mediocre = document.getElementById("mediocre").checked;
    var good = document.getElementById("good").checked;
    var excellent = document.getElementById("excellent").checked;
    var buttons_checked = [terrible, bad, mediocre, good, excellent];

    // Create a new XMLhttpRequest
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //callback function passed as param
            callBackFunction(this);
        }
      };

    var payload = "submission_controller.php?name=" + document.getElementById("name").value + "&addr=" + document.getElementById("address").value + "&review=" + document.getElementById("review").value + "&img_name=" + document.getElementById("imgupload").value + "&rating=" + String(buttons_checked.indexOf(true)+1);
    console.log(payload);
    xhttp.open("POST", payload, false);
    xhttp.send(payload);

    return false;
    
}

function checkSession(userCallback) {

    rrUser = false;

    var terrible = document.getElementById("terrible").checked;
    var bad = document.getElementById("bad").checked;
    var mediocre = document.getElementById("mediocre").checked;
    var good = document.getElementById("good").checked;
    var excellent = document.getElementById("excellent").checked;
    var buttons_checked = [terrible, bad, mediocre, good, excellent];

    // Create a new XMLhttpRequest
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //callback function passed as param
            userCallback(this);
        }
    }

};



// validate the entire form
function validate_sub(){

    var name_valid = validate_name();
    var addr_valid = validate_address();
    var img_valid = validate_img();
    var rating_valid = validate_rating();
    var review_valid = validate_review();
    var check_array = [name_valid, addr_valid, img_valid, rating_valid, review_valid];

    if (check_array.every(Boolean)){

        window.alert("validation successful");

        return true;

    } else {

        return false;
    }
}

// Uses the html5 geolocation API to retrieve the users current position
function current_position() {

    // check if the user has location enabled
    if (navigator.geolocation) {
        // update the address field with the users location
        navigator.geolocation.getCurrentPosition(update_position);
        return true;
    } else {
        // if location is not enabled, notify the user
        window.alert("Location is not supported in your browser");
        return false;
    }
}

// Function is responsible for updating the address field with the users current location
function update_position(position) {

    // Store the latitude and logitude
    var lat = position.coords.latitude;

    var long = position.coords.longitude;

    // Create a google maps geocoder instance
    var google_geocoder = new google.maps.Geocoder();

    // create a new google maps lat long object
    var gmaps_pos = new google.maps.LatLng(lat, long);

    // geocode the users latitude and longitude into an address
    google_geocoder.geocode(
        {'latLng': gmaps_pos},
        function(results, status) {
            if (results[0] && status == google.maps.GeocoderStatus.OK) {
                document.getElementById('address').value = results[0].formatted_address;
            }
        }
    );
}