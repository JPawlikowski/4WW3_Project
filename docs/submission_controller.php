<?php
session_start();
$servername = "localhost";
$database = "gasStationsMain";
$username = "root";
$password = "dummyPassword";

// get the args from the submission page
// $submission_info = $_REQUEST["submission_info"];
// echo var_dump($submission_info);
// // decode the json string from text to an array
// $decoded_info = json_decode($submission_info, true);
// echo $decoded_info['address'];

// retrieve the values from the json object
$address = $_REQUEST["addr"];
// echo var_dump($address);
$name = $_REQUEST["name"];
// echo var_dump($name);
$review = $_REQUEST["review"];
// echo var_dump($review);
$img_name = $_REQUEST["img_name"];
// echo var_dump($img_name);
$rating = $_REQUEST["rating"];
// echo var_dump($rating);

if (isset($_SESSION["userName"])){

    // Create and check connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "connected";
    }
    catch(PDOException $e) {
        echo "failed" . $e->getMessage();
    }

    // Query to check if the gas station exists in the database
    $exists = $conn->query("SELECT gasid FROM `gasStations` WHERE address like '$address'");
    $row = $exists->fetch();

    if (!empty($row[0])) {

        echo "gas station exists in database";

        // if the gas station exists in the database, only add a review in the review table
        $status = $conn->exec("INSERT INTO `Reviews` (uid, gasid, rating, review, imageLink) values (4, 20, '$rating', '$review', '$img_name')");

        if ($status) {
            echo "review entry successful";
        } else {
            echo "review entry failed";
        }

    // if the gas station does not exist, create a new entry in gasStations and then add a review for it
    } else {
        echo "gas station does not exist, creating a new entry in gasStations";

        // gasid has to be a unique identifier when a new table entry is created
        $gasStatus = $conn->exec("INSERT INTO `gasStations` (gasid, name, address, description, rating) values (19, '$name', '$address', '$review', '$rating')");

        if ($gasStatus) {
            echo "gas station entry created successfully";
        } else {
            echo "gas station entry failed";
            
        }

        $status = $conn->exec("INSERT INTO `Reviews` (uid, gasid, rating, review, imageLink) values (7, 20, '$rating', '$review', '$img_name')");

        if ($status) {
            echo "review entry successful";
        } else {
            echo "review entry failed";
        }
        
    }

} else{

    echo "User is not logged in";

}

?>
