<?php 
	$path = $_SERVER['DOCUMENT_ROOT'];
	$path .= "/test/includes/dbh.inc.php"; 
	include_once($path);
?>

<?php

$sql0 = [];

if(isset($_POST['partialPost'])) {
	$partialPost = (array) $_POST['partialPost'];
} else {
	$partialPost = (array) null;
}

if(isset($_POST['topFilterPost'])) {
	$topFilterPost = (array) $_POST['topFilterPost'];
} else {
	$topFilterPost = (array) null;
}

$count = 0;

if (isset($_POST['partialPost']) && $partialPost[0] != "" && !empty($partialPost[0])) {
    $count = $count + 1;
    print_r("<button id='newUsedButton' style='font-size:1em;' onclick='unSearchCurrentBids()'><span>Search:&nbsp;". $partialPost[0] ."&nbsp;<i class='fa fa-close'></i></span></button>");
}

?>





