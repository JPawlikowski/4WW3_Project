<!DOCTYPE html>

<html lang="en">
    <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "dummyPassword";
        $database = "gasStationsMain";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //additional echo for debugging
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

        <link rel="stylesheet" href="styles.css"/>

        <!-- used for icons such as the 5 star ratings-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta name="viewport" content="width=device-width">

        <link rel="shortcut icon" href="favicon.png" type="image/png" />

        <title>Search Results</title>

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

        <div class="results_title">
            <!-- this will be replaced with a search variables -->
            <strong>Search Results for Warsaw:</strong>
        </div>

        <!-- Starting a main body container -->
        <div class="results_container">

        <div class="map_div" id="map">
            <!--<img src="images/gas_map.png" alt="BEST POLAND GAS MAP" style="margin:auto;">-->
            <!-- Call the google maps API-->

            <!--<script src="maps.js"></script>-->
        </div>
        
        <!-- call the js script to display the map -->
        <script src="maps.js"></script>
      
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYWt_DkIlWbveDMzC_m7eZ8t4jKtmzxcQ&callback=show_results_map" async defer>
        </script>

        <div class="results_main">
            <ol>
                <?php
                //change this to based on search information
                $searchInput = $_SESSION["searchKey"];

                $stmt = $conn->query("SELECT * FROM `gasStations` WHERE (name like '$searchInput') OR (address like '$searchInput')");
                while ($row = $stmt->fetch()) {
                    $gasNum = (int)$row[0];
                    $name = $row[1];
                    $addr = $row[2];
                    $desc = $row[3];
                    $rate = (int)$row[4];
                    //echo $gasNum;
                    $substmt = $conn->query("SELECT imageLink FROM `Reviews` WHERE gasid = $gasNum");
                    //only gas stations which statisfy query conditions
                    while ($info = $substmt->fetch()) {
                        $imgLink = $info[0];
                        echo '<li>';
                            echo '<div>';
                                //name from DB
                                echo sprintf('<a href="individual_sample.php?name=%s">', $gasNum) . $name . '</a>';
                                //image from s3 bucket here specified by url
                                echo '<img class="results_imgs" src="https://4ww3a3.s3.us-east-2.amazonaws.com/'.$imgLink.'"'.' alt="BEST POLAND GAS">';
                            
                                echo '<br/>';
                                //number of stars based on 'rating' integer from DB
                                for ($x = 0; $x < $rate; $x++) {
                                    echo '<span class="fa fa-star checked"></span>';
                                }
                                echo '<br/>';
                                //address from DB
                                echo '<div class="address_text">'. $addr . '</div>';
                            echo '</div>';
                        echo '</li>';
                    }
                }
                ?>
            </ol>
        </div>
        <!-- Next and previous buttons-->
            <div class="results_nav" >
                <a class="red_button" >&laquo; Previous</a>
                <a class="red_next_button" >Next &raquo;</a>
            </div>

    </div>
    <!-- End of main container -->

    <footer>
        <p>Gas Station Reviews - 4WW3</p>
    </footer>
    </body>
</html>
