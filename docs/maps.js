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

// Function to show the map+markers on the results_sample page
function show_results_map() {
    map = new google.maps.Map(document.getElementById('map'), {
    center: warsaw_coords,
    zoom: 12
    });

    // info windows - hardcoded since no backend
    var marker1_infowindow = new google.maps.InfoWindow({
        content: '<a href="individual_sample.html"> <b>Petro Poland</b> </a>  <br/>' + document.getElementById("gas_addr1").innerHTML
    });

    var marker2_infowindow = new google.maps.InfoWindow({
        content: '<b>Poland Esso</b> <br/>' + document.getElementById("gas_addr2").innerHTML
    });

    var marker3_infowindow = new google.maps.InfoWindow({
        content: '<b>Poland Shell</b> <br/>' + document.getElementById("gas_addr3").innerHTML
    });

    var marker4_infowindow = new google.maps.InfoWindow({
        content: '<b>Tylers Gas</b> <br/>' + document.getElementById("gas_addr4").innerHTML
    });

    var marker5_infowindow = new google.maps.InfoWindow({
        content: '<b>Poland Esso</b> <br/>' + document.getElementById("gas_addr5").innerHTML
    });

    var marker6_infowindow = new google.maps.InfoWindow({
        content: '<b>Poland Shell</b> <br/>' + document.getElementById("gas_addr6").innerHTML
    });

    var marker7_infowindow = new google.maps.InfoWindow({
        content: '<b>Tylers Gas</b> <br/>' + document.getElementById("gas_addr7").innerHTML
    });

    // Code for the markers
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

    // Code for the marker listeners, when the user clicks a marker
    // A pop up will display info about the gas station
    marker1.addListener('click', function() {
        marker1_infowindow.open(map, marker1);
      });

    marker2.addListener('click', function() {
        marker2_infowindow.open(map, marker2);
    });

    marker3.addListener('click', function() {
        marker3_infowindow.open(map, marker3);
    });

    marker4.addListener('click', function() {
        marker4_infowindow.open(map, marker4);
    });

    marker5.addListener('click', function() {
        marker5_infowindow.open(map, marker5);
    });

    marker6.addListener('click', function() {
        marker6_infowindow.open(map, marker6);
    });

    marker7.addListener('click', function() {
        marker7_infowindow.open(map, marker7);
    });
    
}