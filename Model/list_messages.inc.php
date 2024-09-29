<?php

// show the table of messages

/*
    open database of Messages
    look for username 
    get all messages from Messages table
    create table
    show
*/

if($_POST['message-refresh']){
    include 'db.inc.php';
    $username = $_POST['username'];
    $filtered = $_POST['filtered'];
    $seen = $_POST['seen'];

    if($filtered){
        $messagequery = 'SELECT * FROM Messages WHERE username=? AND seen=?';
    } else {
        $messagequery = 'SELECT * FROM Messages WHERE username=?';
    }
}