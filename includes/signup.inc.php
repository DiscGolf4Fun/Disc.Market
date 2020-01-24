<?php

if (isset($_POST['user_firstname'])) {

    include_once 'dbh.inc.php';
    $first = mysqli_real_escape_string($conn, $_POST['user_firstname']);
    $last = mysqli_real_escape_string($conn, $_POST['user_lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $uid = mysqli_real_escape_string($conn, $_POST['user_name']);
    $pass = mysqli_real_escape_string($conn, $_POST['user_pass']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['user_pass2']);


    //Error Handlers
    //check for empty fields
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pass) || empty($pass2)) {
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z]+/", $first) || !preg_match("/^[a-zA-Z]+/", $last)) {
            exit();
        }
    }


    $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
  
   
    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, user_role, user_pic) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd', 3, '');";

    mysqli_query($conn, $sql);
    header("Location: /#NewAccount");
    exit();

} else {
    header("Location: /");
    exit();
}