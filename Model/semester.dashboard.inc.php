<?php

// fetching semester info
if(isset($_POST['semesterLevel'])){
    header('Content-Type: application/json');
    include 'db.inc.php';

    $response = [
        'success' => true,
        'message' => 'hello world',
        'data' => [], // num_enrolles, num_students, num_faculties, num_course
        'semesterLevel' => '0',
        'schoolYear' => 'XXXX-XXXX'
    ];

    $student_sql = "SELECT COUNT(*) AS count FROM students"; // number of students
    $enrolled_sql = "SELECT COUNT(*) AS count FROM Enrolled_Students"; // number of enrolled students
    $teacher_sql = "SELECT COUNT(*) AS count FROM teachers"; // number of teachers / faculties
    $avail_courses = "SELECT COUNT(*) AS count FROM Course"; // number of courses available

    $activeSem = 1;
    $seminfo = $conn->prepare("SELECT * FROM SchoolYear WHERE CURRENT = ?");
    $seminfo->bind_param('i', $activeSem);
    $seminfo->execute();
    $result = $seminfo->get_result();

    if($result->num_rows > 0){
        $rows = $result->fetch_assoc();
        $semesterlevel = $rows['semester'];
        $schoolyear = substr($rows['SY_ID'], 0, -2);

        $response['semesterLevel'] = semLevelName($semesterlevel);
        $response['schoolYear'] = $schoolyear;
    }

    $queries = [$student_sql, $enrolled_sql, $teacher_sql, $avail_courses];
    foreach($queries as $query){
        $result = $conn->query($query);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            array_push($response['data'], $row['count']);
        }
    }

    echo json_encode($response);
}

function semLevelName($semesterLevel){
    $name = '1st';

    switch($semesterLevel){
        case(1):
            $name = '1st';
            break;
        case(2):
            $name = '2nd';
            break;
    }

    return $name;
}