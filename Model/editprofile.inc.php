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
        'message' => $_POST['bdate'],
        'data' => []
    ];

    Students::Modify($imageType, $image, $_POST['bdate'], $_POST['address'], $username);

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
    }else if($_SESSION['usertype'] == 'teachers'){
        $response['data'] = [
            'fullname' => $_SESSION['fullname'],
            'imageLink' => $_SESSION['imageLink'] === '' ? $_SESSION['imageLink'] : 'Resources/assets/sbca.logo.5.jpg',
            'user' => 'teacher'
        ];
    } else {
        $response['data'] = [
            'fullname' => ucwords($_SESSION['name']),
            'imageLink' => 'Resources/assets/sbca.logo.5.jpg',
            'user' => ucwords($_SESSION['role'])
        ];
    }

    echo json_encode($response);
}

// update teacher's info
else if(isset($_POST['updateTeacherInfo'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => false,
        'message' => 'Failed to save changes, try later',
        'data' => []
    ];

    // check for roles
    if($_SESSION['role'] == 'accounting'){
        $response['message'] = 'Unable to update changes.';
        $response['success'] = false;
        echo json_encode($response);
        exit();
    }

    $datetime = new DateTime($_POST['data'][5]);
    $bdate = $datetime->format('Y-m-d H:i:s');
    
    if($_POST['user'] == 'student'){
        $query = $conn->prepare('UPDATE students SET fname=?, lname=?, mname=?, email=?, address=?, bdate=?, course=?, userid=? WHERE userid=?');
    } else {
        $query = $conn->prepare('UPDATE teachers SET fname=?, lname=?, mname=?, email=?, address=?, bdate=?, profession=?, userid=? WHERE userid=?');
    }
    $query->bind_param('sssssssss', $_POST['data'][0], $_POST['data'][1], $_POST['data'][2], $_POST['data'][3], $_POST['data'][4], $bdate, $_POST['data'][6], $_POST['data'][7], $_SESSION['selected-user']);
    
    if($query->execute()){
        $response['success'] = true;
        $response['message'] = 'Update Successfully';
    }

    echo json_encode($response);
}