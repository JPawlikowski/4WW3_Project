<?php
session_start();
$param = $_REQUEST["param"];

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

$stmt = $conn->query("SELECT userName FROM `Users` WHERE password like '$param'");
$row = $stmt->fetch();

if (!empty($row[0])) {
    echo "true";
    // Add the username to the session object
    $_SESSION["userName"] = $row[0];
} else {
	echo "false";
}

?>