<?php

$firstn = $_REQUEST["firstn"];
$email = $_REQUEST["mail"];
$usern = $_REQUEST["usern"];
$lastn = $_REQUEST['lastn'];
$pass = $_REQUEST["pass"];
//$email = "chadi@mina.ca";

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

$res = $conn->exec("INSERT INTO `users` (id, name, age, Email, lastname, firstname, password) values (4, '$usern', 20, '$email', '$lastn', '$firstn', '$pass')");

if ($res) {
	echo "true";
} else {
	echo "false";
}

?>