<?php

if (isset($_POST['first'])) {

    include_once 'dbh.inc.php';
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);

    //Error Handlers
    //check for empty fields
    if (empty($first) || empty($last)) {
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z]+/", $first) || !preg_match("/^[a-zA-Z]+/", $last)) {
            exit();
        }
    }

    $sql = "INSERT INTO users (user_first, user_last) VALUES ('$first', '$last');";
    mysqli_query($conn, $sql);
    header("Location: /index.php");

} else {
    header("Location: /index.php");
    exit();
}