<!DOCTYPE HTML>

<html lang="en">
 <?php
  $servername = "localhost";
  $username = "root";
  $password = "dummyPassword";
  $database = "exampleUsers";
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
        $stmt = $conn->query("SELECT name FROM `gasStations` WHERE id = 5");
        while ($row = $stmt->fetch()) {
          echo $row[0];
        }
      ?>  
    </h1>
    
    <h3 id="individualAddr">
      <?php
      $stmt = $conn->query("SELECT address FROM `gasStations` WHERE id = 5");
      while ($row = $stmt->fetch()) {
        echo $row[0];
      }
      ?>
    </h3> 
    <div id="individualMap"></div>
    
    <p id = "individualDesc"> 
      <?php
      //query for review should be by address which is a variable*
      $stmt = $conn->query("SELECT review FROM `gasStations` WHERE id = 5");
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
      $stmt = $conn->query("SELECT rating FROM `gasStations` WHERE id >= 5");
      while ($row = $stmt->fetch()) {
        $rate = (int)$row[0];
       echo "<tr>";
         echo "<td>";
           for ($x = 0; $x < $rate; $x++) {
             echo '<span class="fa fa-star checked"></span>';
           }
         echo "</td>";
       //the below should also be based on db query, waiting on final tables   
         echo "<td>Piotr</td>";
         echo "<td>Dobra stacja, nic do powiedzienia</td>";
       echo "</tr>";
     }
      ?>
    </tr>

		</table>
		<!-- <table class="reviewsTable">
  			<tr id="reviewsTableHeader">
    			<th>Rating</th>	
    			<th>User</th>
    			<th>Description</th>
  			</tr>
  			<tr>
    			<td>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span> 
          </td>
   			 	<td>Piotr</td>
    			<td>Dobra stacja, nic do powiedzienia</td>
  			</tr>
  			<tr>
    			<td>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span> 
          </td>
    			<td>Zbyszek</td>
    			<td>Zła stacja, drogo i mało parkingu do tego</td>
  			</tr>
  			<tr>
  				<td>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>
            <span class="fa fa-star unchecked"></span> 
          </td>
  				<td>Lyudomir</td>
  				<td>Це було посередньо</td>
  			</tr>
		</table> -->

	</div>

  <footer>
    <p>Gas Station Reviews - 4WW3</p>
  </footer>

</body>
</html>
