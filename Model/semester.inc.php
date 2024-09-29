<?php

// this to Model path

if($_POST['addSem']){
    $sy = $_POST['getSY_date'];     // get the date of the semester from js
    $sem = $_POST['getSem'];        // get the semester name from js

    $enrollment = true;
    $currentSY = true;
    $extendDate = "";

    echo "hi {$sy},";


}

function save(){
    include 'db.inc.php';

    
}

function get(){
    
}

function EnrollmentDone($enrollment){

    if($enrollment){
        $enrollment = false; // closing enrollment
    }
    
}

function SYDone($currentSY){
    if($currentSY){
        $currentSY = false; // closing SY
    }
    
}

// extendate semester
function ExtendDate($date, $extendDate){
    // check if date is valid
    $extendDate = $date;
}