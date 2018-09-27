<?php

if (isset($_POST['submitSignup'])) {

    include_once 'dbh.inc.php';
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Error Handlers
    //check for empty fields
    if (empty($first) || empty($first) || empty($last) || empty($uid) || empty($pwd)) {
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z]+/", $first) || !preg_match("/^[a-zA-Z]+/", $last)) {
            exit();
        }
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
    mysqli_query($conn, $sql);
    header("Location: ../index.php");

} else {
    header("Location: ../index.php");
    exit();
}