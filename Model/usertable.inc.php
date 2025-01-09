<?php

if(isset($_POST['fetchusertable'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    $search = $_POST['search'];
    $course = $_POST['course'];
    $yearLevel = $_POST['yearLevel'];
    $usertype = $_POST['user'];

    if($course === 'all'){
        $course = '';
    } if ($yearLevel === 'all'){
        $yearLevel = '';
    }

    $courseyear = '%' . $course . $yearLevel . '%';
    $search_ = '%' . $search . '%';

    $response = [
        'success' => true,
        'message' => '',
        // student - id, name, course, email
        // faculty - id, name, email, profession
        'data' => []
    ];

    $active = 1;

    if($usertype == 'student'){
        $query = $conn->prepare('SELECT * FROM students WHERE CONCAT(fname, lname, mname, username, email, userid) LIKE ? AND course LIKE ? AND active=? LIMIT 50');
        $query->bind_param('ssi', $search_, $courseyear, $active);
    } else {
        $query = $conn->prepare('SELECT * FROM teachers WHERE CONCAT(fname, lname, mname, username, email, userid) LIKE ? AND active=? LIMIT 50');
        $query->bind_param('si', $search_, $active);
    }
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            // $response['message'] = $usertype;
            $fullname = Students::FullName($rows['fname'], $rows['lname'], $rows['mname']);
            if($usertype === 'student'){
                $coursename = Students::Course(substr($rows['course'], 0, -1));
            } else {
                $coursename = $rows['profession'];
            }
            $newData = [$rows['userid'], $fullname, $coursename, $rows['email']];
            array_push($response['data'], $newData);
        }
    }

    echo json_encode($response);
} else if(isset($_POST['enrolledStudents'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    $response = [
        'success' => true,
        'message' => '',
        'data' => [
            // userid, name, course, email, totalgpa
        ]
    ];

    $course = $_POST['course'];
    $yearLevel = $_POST['yearLevel'];
    $search = '%' . $_POST['search'] . '%';
    $courseyear = $course . $yearLevel;
    $active = 1;
    $currentSY = getCurrentSchoolYear();

    $query = $conn->prepare('SELECT Enrolled_Students.*, students.* FROM Enrolled_Students JOIN students ON Enrolled_Students.S_ID = students.username WHERE Enrolled_Students.SY_ID=? AND students.course=? AND CONCAT(students.fname, students.lname, students.username, students.userid) like ? AND active=? LIMIT 50');
    $query->bind_param('sssi', $currentSY, $courseyear, $search, $active);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $response['message'] = 'hello world';
        while($rows = $result->fetch_assoc()){
            $fullname = Students::FullName($rows['fname'], $rows['lname'], $rows['mname']);
            $coursename = Students::Course(substr($rows['course'], 0, -1));
            $newData = [$rows['userid'], $fullname, $coursename, $rows['email'], $rows['TOTAL_GPA']];
            array_push($response['data'], $newData);
        }
    } else{
        $response['message'] = 'hello mars';
    }

    echo json_encode($response);
}

// this will format date into string formate
function formatDate($date, $format='toString'): string{
    if($format === 'toString'){
        $date = explode(' ', $date);
        $formattedDate = DateTime::createFromFormat('Y-m-d', $date[0])->format('M d, Y');
    } else if($format === 'toInt'){
        $formattedDate = DateTime::createFromFormat('M d, Y', $date)->format('Y-m-d');
    }

    return $formattedDate;
}

function getCurrentSchoolYear(){
    include 'db.inc.php';

    $ActiveValue = 1;
    $query = $conn->prepare('SELECT * FROM SchoolYear WHERE CURRENT=?');
    $query->bind_param('i', $ActiveValue);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $rows = $result->fetch_assoc();
        $schoolyear = $rows['SY_ID'];
        return $schoolyear;
    }

    return 'empty';
}