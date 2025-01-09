<?php

if(isset($_POST['getUserSettings'])){
    header('Content-Type: application/json');
    session_start();

    $response = [
        'success' => true,
        'message' => '',
        'data' => []
    ];

    $userSettings = [
        "users" => [
            ["Add themes", 'Description', 'fa-solid fa-brush', 'costume-color'],
            ["Help", 'Description', 'fa-regular fa-life-ring', 'settings_help'],
            ["Report Problem", 'Description', 'fa-solid fa-flag', 'settings_report-problem']
        ],
        "admin" => [
            ["Add themes", 'Description', 'fa-solid fa-brush', 'costume-color'],
            ["Add Subjects", 'Add new subjects', 'fa-solid fa-database', 'manage-database'],
            ["Add Admin", 'Add new admin to manage SBCA Portal', 'fa-solid fa-user-tie', 'add-admin-btn'],
            ["Accounts", 'Modify all users accounts', 'fa-solid fa-user', 'users-account'],
            ["Help", 'Description', 'fa-regular fa-life-ring', 'settings_help'],
            ["Report Problem", 'Description', 'fa-solid fa-flag', 'settings_report-problem']
        ]
    ];

    $response['data'] = $userSettings['users'];
    $role = $_SESSION['role'];

    switch($role){
        case 'student':
        case 'teacher':
            $response['data'] = $userSettings['users'];
            break;
        case 'superadmin':
        case 'registration':
        case 'accounting':
            $response['data'] = $userSettings['admin'];
            break;
    }

    echo json_encode($response);
}

// get user profile in settings
else if(isset($_POST['getUserProfile'])){
    header('Content-Type: application/json');
    include '../Model/db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    $response = [
        'success' => false,
        'message' => '',
        'data' => [
            'fullname' => '',
            'role' => '',
            'imageLink' => '',
            'username' => '',
            'address' => '',
            'bdate' => ''
        ]
    ];

    $username = $_SESSION['username'];
    if($_SESSION['usertype'] == 'admin'){
        $query = $conn->prepare('SELECT name, username, roles, address FROM admin WHERE username=?');
    } else if($_SESSION['usertype'] == 'students'){
        $query = $conn->prepare('SELECT fname, lname, mname, username, course AS Course, imageLink, address, bdate FROM students WHERE username=?');
    } else if($_SESSION['usertype'] == 'teachers'){
        $query = $conn->prepare('SELECT fname, lname, mname, username, profession AS Course, imageLink, address, bdate FROM teachers WHERE username=?');
    } else {
        $response['message'] = 'Invalid type of user';
        echo json_encode($response);
        exit();
    }

    $query->bind_param('s', $username);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $response['success'] = true;
        $response['message'] = 'Found';
        $rows = $result->fetch_assoc();
        if($_SESSION['usertype'] == 'admin'){
            $response['data']['fullname'] = $rows['name'];
            $response['data']['role'] = $rows['role'];
            $response['data']['imageLink'] = 'Resources/assets/sbca.logo.5.jpg';
        } else {
            $response['data']['fullname'] = Students::FullName($rows['fname'], $rows['lname'], $rows['mname']);
            $response['data']['imageLink'] = $rows['imageLink'];

            // date
            $date = date_create($rows['date']);
            $response['data']['bdate'] = date_format($date, 'Y-m-d');

            if($_SESSION['usertype'] == 'students'){
                $response['data']['role'] = Students::Course(substr($rows['Course'], 0, -1));
            } else {
                $response['data']['role'] = ucwords($rows['Course']);
            }
        }
        $response['data']['username'] = $rows['username'];
        $response['data']['address'] = $rows['address'];
    }

    echo json_encode($response);
}