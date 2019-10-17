var map;
var current_map;

function show_map() {
    map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
    });
}

//displays the users current position
function current_position(elementid) {
    current_map = new google.maps.Map(document.getElementById(elementid), {
        center: {},
        zoom: 8
    });

}