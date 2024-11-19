<?php

if(isset($_POST['courseInfo'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';

    $selectedCourse = $_POST['selectedCourse'];

    $response = [
        'success' => true,
        'message' => $selectedCourse,
        'data' => [
            'name' => Students::Course(substr($selectedCourse, 0, -1))
        ]
    ];

    echo json_encode($response);
}