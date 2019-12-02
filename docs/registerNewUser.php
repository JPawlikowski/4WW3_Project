<?php
session_start();
$firstn = $_REQUEST["firstn"];
$email = $_REQUEST["mail"];
$usern = $_REQUEST["usern"];
$lastn = $_REQUEST['lastn'];
$pass = $_REQUEST["pass"];

$servername = "localhost";
$username = "root";
$password = "minamina123";
$database = "mina";
try {
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connected";
}
catch(PDOException $e) {
    echo "failed" . $e->getMessage();
}

$res = $conn->exec("INSERT INTO `Users` (uid, userName, Email, lastName, firstName, password) values (4, '$usern', '$email', '$lastn', '$firstn', '$pass')");

if ($res) {
    echo "true";
    
    // Set the session variables for the newly created user. they will be logged in upon creation of a new account
    //$_SESSION["user_id"] = $;
    $_SESSION["userName"] = $usern;

} else {
	echo "false";
}

?>