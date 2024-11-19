<?php

// enroll student here

if(isset($_POST['enrollstudent'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';

    session_start();
    
    // selected user from student list
    $userid = $_SESSION['selected-user'];

    $username = Students::getUsernamebyUserid($userid);
    if($username === null){
        $response = [
            'success' => true,
            'message' => 'username not found',
            'selected_user' => $userid
        ];

        echo json_encode($response);
        exit();
    }

    $enrollstudent = Students::enrollStudent($username);

    // check if student enrolled successfully
    if($enrollstudent){
        $response = [
            'success' => true,
            'message' => 'student enrolled successfully',
            'selected_user' => $userid
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'cannot enroll student',
            'selected_user' => $userid
        ];
    }

    echo json_encode($response);
} else if (isset($_POST['remove_selected_user'])){ // when exiting student info popup
    session_start();
    $_SESSION['selected-user'] = '';
}