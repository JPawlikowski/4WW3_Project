<!DOCTYPE HTML>

<html lang="en">
 <?php
  session_start();
  $gasNum = (int)$_GET["name"];
  $servername = "localhost";
  $username = "root";
  $password = "dummyPassword";
  $database = "gasStationsMain";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connected";
    }
  catch(PDOException $e) {
    echo "failed" . $e->getMessage();
  }
 ?>
<head>

<meta charset="UTF-8"/>

<meta name="description" content="some html examples"/>

<meta name="keywords" content="examples"/>

<!-- used for icons such as the 5 star ratings-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="styles.css"/>

<meta name="viewport" content="width=device-width">

<link rel="shortcut icon" href="favicon.png" type="image/png" />

<script>
      var myLatLng = {lat: 52.233966, lng: 20.984920};

      function initMap() {
        map = new google.maps.Map(document.getElementById('individualMap'), {
          center: myLatLng,
          zoom: 14
        });
        var marker = new google.maps.Marker({
        position: myLatLng,
        map: map
      });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYWt_DkIlWbveDMzC_m7eZ8t4jKtmzxcQ&callback=initMap"
    async defer></script>


<title>Individual Information</title>

</head>
<body>
  <!-- Header with mobile scaling -->
  <div class="header">
    <a id="headerTitle" href="index.html" class="logo">Gas Station Reviews</a>
      <div class="headerRight">
        <a href="index.html">Search</a>
        <a href="registration.html">Register</a>
        <a href="submission.html">Submit a Review</a>
      </div>
  </div>

<!-- Content of individual details page -->
<div class="individualContent">
		<noscript>Please enable javascript</noscript>
		<h1 id="individualTitle">
      <?php
        $stmt = $conn->query("SELECT name FROM `gasStations` WHERE gasid = $gasNum");
        while ($row = $stmt->fetch()) {
          echo $row[0];
        }
      ?>  
    </h1>
    
    <h3 id="individualAddr">
      <?php
      $stmt = $conn->query("SELECT address FROM `gasStations` WHERE gasid = $gasNum");
      while ($row = $stmt->fetch()) {
        echo $row[0];
      }
      ?>
    </h3> 
    <div id="individualMap"></div>
    
    <p id = "individualDesc"> 
      <?php
      //query for review should be by address which is a variable*
      $stmt = $conn->query("SELECT description FROM `gasStations` WHERE gasid = $gasNum");
      while ($row = $stmt->fetch()) {
        echo $row[0];
      }
      ?> 
    </p>

    <table class="reviewsTable">
      <tr id="reviewsTableHeader">
        <th>Rating</th> 
        <th>User</th>
        <th>Description</th>
      </tr>
      <?php
      //query for review should be by address which is a variable*
      $stmt = $conn->query("SELECT rating, uid, review FROM `Reviews` WHERE gasid = $gasNum");
      while ($row = $stmt->fetch()) {
        $rate = (int)$row[0];
        $userNum = (int)$row[1];
	$review = $row[2];
       echo "<tr>";
         echo "<td>";
           for ($x = 0; $x < $rate; $x++) {
             echo '<span class="fa fa-star checked"></span>';
           }
         echo "</td>";
	$firstName = $conn->query("SELECT firstName from `Users` WHERE uid = $userNum");
	$queriedFirstName = $firstName -> fetch();
        echo "<td>" . $queriedFirstName[0] . "</td>";
	echo "<td>" . $review . "</td>";  
       echo "</tr>";
     }
      ?>
    </tr>

		</table>
	</div>

  <footer>
    <p>Gas Station Reviews - 4WW3</p>
  </footer>

</body>
</html>
