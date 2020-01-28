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
if(isset($_POST['partialPost'])) {
	$partialPost = (array) $_POST['partialPost'];
} else {
	$partialPost = (array) null;
}

if(isset($_POST['topFilterPost'])) {
	$topFilterPost = $_POST['topFilterPost'];
} else {
	$topFilterPost = "";
}

$count = 0;

if (isset($_POST['partialPost']) && $partialPost[0] != "" && !empty($partialPost[0])) {
    $count = $count + 1;
    print_r("<button id='newUsedButton' style='font-size:1em;' onclick='unSearchMyPosts()'><span>Search:&nbsp;". $partialPost[0] ."&nbsp;<i class='fa fa-close'></i></span></button>");
}

?>





