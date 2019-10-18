var map;
var current_map;

// Main coordinates for Warsaw, Poland
var warsaw_coords = {lat: 52.237049, lng: 21.017532};

// Sample lat, long coordinates for each gas station in the results page
var result1_coords = {lat: 52.2334498, lng: 20.9815617};
var result2_coords = {lat: 52.2339691, lng: 20.9828541};
var result3_coords = {lat: 52.2334293, lng: 20.9815159};
var result4_coords = {lat: 52.2336364, lng: 20.9822168};
var result5_coords = {lat: 52.2334087, lng: 20.9814705};
var result6_coords = {lat: 52.2340621, lng: 20.981885};
var result7_coords = {lat: 52.2328443, lng: 20.9787933};

function show_results_map() {
    map = new google.maps.Map(document.getElementById('map'), {
    center: warsaw_coords,
    zoom: 12
    });

    var marker1 = new google.maps.Marker({
        position: result1_coords,
        map: map,
    });

    var marker2 = new google.maps.Marker({
        position: result2_coords,
        map: map,
    });

    var marker3 = new google.maps.Marker({
        position: result3_coords,
        map: map,
    });

    var marker4 = new google.maps.Marker({
        position: result4_coords,
        map: map,
    });

    var marker5 = new google.maps.Marker({
        position: result5_coords,
        map: map,
    });

    var marker6 = new google.maps.Marker({
        position: result6_coords,
        map: map,
    });

    var marker7 = new google.maps.Marker({
        position: result7_coords,
        map: map,
    });
    
}

//displays the users current position
function current_position(elementid) {
    current_map = new google.maps.Map(document.getElementById(elementid), {
        center: {},
        zoom: 8
    });

}