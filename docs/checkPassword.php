<?php

$param = $_REQUEST["param"];

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

$stmt = $conn->query("SELECT uid FROM `Users` WHERE password like '$param'");
$row = $stmt->fetch();

if (!empty($row[0])) {
	echo "true";
} else {
	echo "false";
}

?>