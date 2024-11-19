<?php

if(isset($_POST['imageType'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    session_start();

    $imageType = $_POST['imageType'];
    $image = [
        'link' => $_POST['link']
    ];
    $username = $_SESSION['username'];

    $response = [
        'success' => true,
        'message' => $image['link'],
        'data' => [

        ]
    ];

    Students::Modify($imageType, $image, $username);

    echo json_encode($response);
} else if (isset($_POST['updateStudentDashboard'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    session_start();

    $response = [
        'success' => true,
        'message' => '',
        'data' => []
    ];

    if($_SESSION['usertype'] === 'students'){
        $response['data'] = Students::getUser($_SESSION['username']);
    } else {
        $response['success'] = false;
    }

    echo json_encode($response);
}