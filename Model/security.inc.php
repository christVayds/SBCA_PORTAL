<?php

// this will change user's password
if($_POST['save_password']){
    include 'db.inc.php';

    session_start();
    $user = $_SESSION['usertype'];
    $oldpassword = $_POST['oldpass'];
    $pass = $_POST['pass2'];
    $username = $_SESSION['username'];
    
    if(comparePassword($oldpassword, $user, $username)){
        $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

        $query = "UPDATE $user SET _password='$hashedPwd' WHERE username='$username';";
        $result = mysqli_query($conn, $query);

        header('location: ../account.php?message=success');
        return;
    }
    header('location: ../account.php?message=fail');

    // close mysql
    mysqli_close($conn);
    return;
}

// check if old password entered by the user is equal to current password in user's database
function comparePassword($oldpass, $usertype, $username): bool{
    include 'db.inc.php';

    $query = $conn->prepare("SELECT * FROM $usertype WHERE username=?");
    $query->bind_param('s', $username);
    $query->execute();
    $result = $query->get_result();

    # if there is result
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if(password_verify($oldpass, $row['_password'])){
            // echo 'password is correct';
            return true;
        } else {
            // echo 'password is incorrect';
            return false;
        }
    }

    # return false if no
    return false;
}

?>