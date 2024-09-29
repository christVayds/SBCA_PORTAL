<?php

// this will change user's password
if($_POST['save_password']){
    include 'db.inc.php';

    session_start();
    $user = $_SESSION['usertype'];
    $pass = $_POST['pass2'];
    $username = $_SESSION['username'];

    $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

    $query = "UPDATE $user SET _password='$hashedPwd' WHERE username='$username';";
    $result = mysqli_query($conn, $query);

    header('location: ../account.php');
    mysqli_close($conn);
}

?>