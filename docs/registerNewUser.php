<?php

$firstn = $_REQUEST["firstn"];
$email = $_REQUEST["mail"];
$usern = $_REQUEST["usern"];
$lastn = $_REQUEST['lastn'];
$pass = $_REQUEST["pass"];

$servername = "localhost";
$username = "root";
$password = "dummyPassword";
$database = "mina";
try {
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connected";
}
catch(PDOException $e) {
    echo "failed" . $e->getMessage();
}

$res = $conn->exec("INSERT INTO `Users` (uid, email, userName, password, firstName, lastName) values (8, '$email', '$usern', '$pass', '$firstn', '$lastn')");

if ($res) {
	echo "true";
} else {
	echo "false";
}

?>