<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../Class/Users.class.php';

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $course = $_POST['Course'];
    $schoolid = $_POST['schoolid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $bdate = $_POST['bdate'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    if($_POST['user'] == 'students'){
        $new_user = new Students($fname, $mname, $lname, $course, $schoolid, $email, $password, $bdate, $gender, $address);
    } else if($_POST['user'] == 'teachers'){
        $new_user = new Teachers($fname, $lname, $mname, $schoolid, $email, $password, $address, $bdate, $gender);
    } else {
        echo "User not found";
        exit();
    }

    # save the new user (student or faculty)
    if($new_user->save()){
        echo "Saved";
    } else {
        echo "Email Already used";
    }
}

?>