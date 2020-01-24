<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "discmarket";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql0 = [];
$partialPost = (array) $_POST['partialPost'];
$topFilterPost = $_POST['topFilterPost'];
$count = 0;

if ($partialPost[0] != "" && !empty($partialPost[0])) {
    $count = $count + 1;
    print_r("<button id='newUsedButton' style='font-size:1em;' onclick='unSearchMyPosts()'><span>Search:&nbsp;". $partialPost[0] ."&nbsp;<i class='fa fa-close'></i></span></button>");
}

?>





