<?php 

session_start();

if (isset($_POST['submitLogin'])) {

    include 'dbh.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck < 1){
    } else {
        if ($row = mysqli_fetch_assoc($result)) {
            $hashedPwdCheck == password_verify($pwd, $row['user_pwd']);
            if ($hashedPwdCheck = 1){
                //Login the user here
                $_SESSION['u_id'] = $row['user_id'];
                $_SESSION['u_first'] = $row['user_first'];
                $_SESSION['u_last'] = $row['user_last'];
                $_SESSION['u_email'] = $row['user_email'];
                $_SESSION['u_uid'] = $row['user_uid'];
                header("Location: ../index.php");
                exit();
            }
        }
    }
}