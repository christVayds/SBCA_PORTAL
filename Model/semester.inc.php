<?php

// this to Model path

// CREATION OF NEW SEMESTER and SCHOOL YEAR LEVEL

if(isset($_POST['addSem'])){
    header('Content-Type: application/json');
    
    session_start();

    // responce data
    $response = [
        'success' => false,
        'message' => 'empty',
        'data' => [
            'SchoolYear' => $_POST['getSY_date'],
            'semester' => $_POST['getSem'],
            'start-date' => $_POST['getDate_start'],
            'end-date' => $_POST['getDate_end'],
            'enrollment' => true,
            'currentSY' => true,
            'extendDate' => $_POST['getDate_end']
        ]
    ];

    // check if schoolyear exist
    if(!Check_SchoolYear($response['data']['SchoolYear'], $response['data']['semester'])){
        // if schoolyear didnt exist, create new
        closeCurrentSY(); // testing
        if(createNewSemester($response['data']['SchoolYear'], $response['data']['start-date'], $response['data']['end-date'], $response['data']['semester'])){
            $response['message'] = 'Created Successfully!';
        } else {
            $response['message'] = 'Database Error: please contact the programmer.';
        }
    } else {
        $response['message'] = 'Already created';
    }

    // encode the data
    echo json_encode($response);
} 

// manage student's schedule
else if(isset($_POST['studentSched'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    // get user info

    $query = $conn->prepare('SELECT * FROM students WHERE userid=?');
    $query->bind_param('s', $_SESSION['selected-user']);
    $query->execute();
    $result = $query->get_result();

    $response = [
        'success' => true,
        'message' => '',
        'data' => [
            'username' => '',
            'fullname' => '',
            'course' => '',
            'userid' => ''
        ]
    ];

    if($result->num_rows > 0){
        $rows = $result->fetch_assoc();

        $response['data']['username'] = $rows['username'];
        $response['data']['userid'] = $rows['userid'];
        $response['data']['fullname'] = Students::FullName($rows['fname'], $rows['lname'], $rows['mname']);
        $response['data']['course'] = strtoupper($rows['course']);
    } else {
        $response['success'] = false;
    }

    echo json_encode($response);
}

// check School year
function Check_SchoolYear($schoolyear, $semester): bool{ // schoolyear e.g. 2023-2024
    include 'db.inc.php';

    $schoolyear = $schoolyear . '_' . $semester;

    $query = $conn->prepare("SELECT * FROM SchoolYear WHERE SY_ID=?");
    $query->bind_param("s", $schoolyear);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $query->close();
        return true;
    }
    $query->close();
    return false;
}

function createNewSemester($schoolyear, $s_date, $e_date, $semester): bool{
    include 'db.inc.php';
    $num = 1; // temporary
    $schoolyear = $schoolyear . '_' . $semester;

    $query = $conn->prepare("INSERT INTO SchoolYear (SY_ID, START_DATE, END_DATE, EXTEND_DATE, NUM_ENROLLED, OPEN, CURRENT, semester) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param("ssssiiis", $schoolyear, $s_date, $e_date, $e_date, $num, $num, $num, $semester);

    if($query->execute()){
        $query->close();
        return true;
    }

    $query->close();
    return false;
}

// this will close the current semester
function closeCurrentSY(): bool{
    include 'db.inc.php';
    $deactivate = 0;
    $active = 1;

    $query = $conn->prepare("UPDATE SchoolYear SET CURRENT = ? WHERE CURRENT = ?");
    $query->bind_param('ii', $deactivate, $active);

    if($query->execute()){
        $query->close();
        return true;
    }

    $query->close();
    return false;
}