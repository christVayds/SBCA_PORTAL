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

    $student = new Students($fname, $mname, $lname, $course, $schoolid, $email, $password, $bdate, $gender, $address);
    if($student->save()){
        echo "Saved";
    } else {
        echo "Email Already used";
    }
}

?>