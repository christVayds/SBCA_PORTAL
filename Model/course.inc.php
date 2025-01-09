<?php

if(isset($_POST['courseInfo'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';

    $selectedCourse = $_POST['selectedCourse'];

    $response = [
        'success' => true,
        'message' => $selectedCourse,
        'info' => [
            'name' => Students::Course(substr($selectedCourse, 0, -1)),
        ],
        // subjectname, subject code, teacher fullname, course name
        'data' => []
    ];

    $query = $conn->prepare('SELECT Subjects.name AS subjectName, Course.name AS courseName, Subjects.*, Course.*, teachers.* FROM Subjects JOIN Course ON Subjects.course=Course.course JOIN teachers ON Subjects.username=teachers.username WHERE Subjects.course=?');
    $query->bind_param('s', $selectedCourse);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            if($rows['subId'] !== null){
                $fullname = Students::FullName($rows['fname'], $rows['lname'], $rows['mname']);
                $newData = [ucwords($rows['subjectName']), strtoupper($rows['subjCode']), $fullname, strtoupper($rows['courseName'])];
                array_push($response['data'], $newData);
            }
        }
    }

    echo json_encode($response);
} else if(isset($_POST['addnewcourse'])){
    // add new course
    header('Content-Type: application/json');
    include 'db.inc.php';
    // include '../Class/Users.class.php';
    session_start();

    $response = [
        'success' => true,
        'message' => 'New course added.',
        'data' => []
    ];

    // check for roles
    if($_SESSION['role'] === 'accounting'){
        $response['message'] = 'Unable to update changes.';
        $response['success'] = false;
        echo json_encode($response);
        exit();
    }

    $coursename = $_POST['coursename'];
    $yearLevel = $_POST['yearLevel'];
    $courseId = $coursename . $yearLevel;
    $coursename = strtoupper($coursename);

    $query = $conn->prepare('INSERT INTO Course(course, name, level) VALUES (?,?,?)');
    $query->bind_param('ssi', $courseId, $coursename, $yearLevel);
    
    if(!$query->execute()){
        $response['success'] = false;
        $response['message'] = 'Cannot create new Course';
    }

    echo json_encode($response);
}