<?php

$dbServername = "disc.market";
$dbUsername = "discmarket";
$dbPassword = "rMq-if9,4";
$dbName = "discmarket";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>