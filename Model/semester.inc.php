<?php

// this to Model path

// CREATION OF NEW SEMESTER and SCHOOL YEAR LEVEL

if(isset($_POST['addSem'])){
    header('Content-Type: application/json');
    
    session_start();

    // responce data
    $response = [
        'success' => false,
        'message' => 'Unable to update changes',
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

    // check for roles
    if($_SESSION['role'] === 'accounting'){
        $response['message'] = 'Unable to update changes.';
        $response['success'] = false;
        echo json_encode($response);
        exit();
    }

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
    if($_POST['student'] != ''){
        $_SESSION['selected-user'] = $_POST['student'];
    }

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
// deactivate user
else if (isset($_POST['deactivateUser'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => true,
        'message' => 'Deactivated'
    ];

    // check for roles
    if($_SESSION['role'] === 'accounting'){
        $response['message'] = 'Unable to update changes.';
        $response['success'] = false;
        echo json_encode($response);
        exit();
    }

    $active = 1;
    $deactivate = 0;
    // $username = $_POST['deactivateUser'];
    if($_POST['user'] == 'student'){
        $username = Students::getUsernamebyUserid($_SESSION['selected-user']);
        $query = $conn->prepare('UPDATE students SET active = ? WHERE username=? and active=?');
    } else {
        $username = Teachers::getUsernamebyUserid($_SESSION['selected-user']);
        $query = $conn->prepare('UPDATE teachers SET active = ? WHERE username=? and active=?');
    }
    $query->bind_param('isi', $deactivate, $username, $active);
    
    if(!$query->execute()){
        $response['success'] = false;
        $response['message'] = 'Failed';
    }

    echo json_encode($response);
}
// CONFIRM STUDENT BEFORE ENROLLING
else if (isset($_POST['config_student'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => true,
        'message' => '',
        'data' => ''
    ];

    // $query = $conn->prepare("SELECT "); // wait a sec

    echo json_encode($response);
}

// get teacher's info
else if(isset($_POST['teacherInfo'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    include 'db.inc.php';
    session_start();

    $_SESSION['selected-user'] = $_POST['teacherInfo'];

    $response = [
        'success' => false,
        'message' => '',
        'data' => [
            'fullname' => '',
            'fname' => '',
            'lname' => '',
            'mname' => '',
            'email' => '@sbca.edu.ph',
            'address' => ''
        ]
    ];

    $query = $conn->prepare('SELECT * FROM teachers WHERE userid=?');
    $query->bind_param('s', $_SESSION['selected-user']);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $rows = $result->fetch_assoc();
        $response['success'] = true;
        $fullname = Students::FullName($rows['fname'], $rows['lname'], $rows['mname']);
        $response['data'] = [
            'fullname' => ucwords($fullname),
            'fname' => ucwords($rows['fname']),
            'lname' => ucwords($rows['lname']),
            'mname' => ucwords($rows['mname']),
            'email' => $rows['email'],
            'address' => $rows['address']
        ];
    }

    echo json_encode($response);
}

// get all accounts
else if(isset($_POST['getAllAccounts'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => false,
        'message' => 'Database Error',
        'data' => []
    ];

    $search = '%' . $_POST['search'] . '%';

    $query = $conn->prepare('SELECT fname, lname, mname, userid, username, active, email, course as userCourse FROM students WHERE CONCAT(fname, lname, mname, userid, username)  LIKE ? UNION ALL SELECT fname, lname, mname, userid, username, active, email, profession as userCourse FROM teachers WHERE CONCAT(fname, lname, mname, userid, username) LIKE ? LIMIT 20');
    $query->bind_param('ss', $search, $search);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $response['success'] = true;
        $response['message'] = 'Result found';
        while($rows = $result->fetch_assoc()){
            $fullname = Students::FullName($rows['fname'], $rows['lname'], $rows['mname']);
            $course = strtoupper(substr($rows['userCourse'], 0, -1));
            if($rows['active']){
                $active = 'Yes';
            } else {
                $active = 'No';
            }
            $newData = [$rows['userid'], $fullname, $course, $rows['email'], $active, $rows['username']];
            array_push($response['data'], $newData);
        }
    }

    echo json_encode($response);
}

// get the user and store in session selected user
else if(isset($_POST['getUser'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    include 'db.inc.php';
    session_start();

    $_SESSION['selected-user'] = $_POST['getUser'];

    $response = [
        'success' => false,
        'error' => 'not-found',
        'message' => 'Database error: user not found',
        'data' => []
    ];

    $query = $conn->prepare('SELECT fname, lname, mname, imageLink, course AS Course FROM students WHERE username=? UNION ALL SELECT fname, lname, mname, imageLink, profession AS Course FROM teachers WHERE username=?');
    $query->bind_param('ss', $_SESSION['selected-user'], $_SESSION['selected-user']);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $response['success'] = true;
        $response['message'] = 'Username '. $_SESSION['selected-user'] .'found';
        $rows = $result->fetch_assoc();
        $fullname = Students::FullName($rows['fname'], $rows['lname'], $rows['mname']);
        $course = Students::Course(substr($rows['Course'], 0, -1));
        $response['data'] = [
            'fullname' => $fullname,
            'fname' => $rows['fname'],
            'lname' => $rows['lname'],
            'mname' => $rows['mname'],
            'course' => $course,
            'image' => $rows['imageLink']
        ];
    } else {
        $response['error'] = 'not-found';
    }

    echo json_encode($response);
}

// actions for selected user in all users acccount page popup
else if(isset($_POST['allUsersAccAction'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => false,
        'message' => 'Database error: user not found'
    ];

    // check for role
    if($_SESSION['role'] !== 'superadmin'){
        $response['message'] = 'Restricted, failed to save changes';
        echo json_encode($response);
        exit();
    }

    $username = $_SESSION['selected-user'];
    $action = $_POST['allUsersAccAction'];

    if($action == 'reset-password'){
        $password = '123456789';
        $hashpwd = password_hash($password, PASSWORD_DEFAULT);
        $query = $conn->prepare('UPDATE students SET _password=? WHERE username=?');
        $query->bind_param('ss', $hashpwd, $username);
    } else {
        if($action === 'activate'){
            $activate = 1;
        } else {
            $activate = 0;
        }
        $query = $conn->prepare('UPDATE students SET active=? WHERE username=?');
        $query->bind_param('is', $activate, $username);
    }
    
    if($query->execute()){
        $response['success'] = true;
        $response['message'] = 'Updates Successfully';
    }

    echo json_encode($response);
}

// add new admin
else if(isset($_POST['addnewAdmin'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => true,
        'message' => ''
    ];

    if($_SESSION['role'] !== 'superadmin'){
        $response['success'] = false;
        $response['message'] = 'Restricted: unable to add new admin';
        echo json_encode($response);
        exit();
    }

    $name = 'st. bernadette college of alabang - ' . $_POST['role'];
    $username = $_POST['addnewAdmin'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $address = 'sbcaaddress';

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $query = $conn->prepare('INSERT INTO admin(username, name, email, _password, address, roles) VALUE (?,?,?,?,?,?)');
    $query->bind_param('ssssss', $username, $name, $email, $hashedPwd, $address, $role);

    if($query->execute()){
        $response['success'] = true;
        $response['message'] = 'New admin added!';
    } else {
        $response['success'] = false;
        $response['message'] = 'Error adding new admin, check for email or username';
    }

    echo json_encode($response);
}

// fetch student's grades
else if(isset(($_POST['updateStudentDashboard']))){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    $response = [
        'success' => false,
        'message' => 'Data not found',
        'data' => [],
        'gpa' => 0,
        'semester' => '',
        'SY' => '',
        'yearLevel' => '',
        'subjectGrades' => []
    ];

    $get_SY = Users::getCurrentSchoolYear();

    // Get all subjects of students ang grades
    $query = $conn->prepare('SELECT g.*, sched.*, sub.*, sub.name AS subjectname, tch.*, tch.fname AS tfname, tch.lname AS tlname FROM Schedule sched JOIN Subjects sub ON sched.subjectname=sub.subId JOIN teachers tch ON sub.username=tch.username JOIN grades g ON sched.Schedule=g.subjectId WHERE g.username=? AND g.sy_id=?');
    $query->bind_param('ss', $_SESSION['username'], $get_SY);
    $query->execute();
    $result = $query->get_result();

    $totalGrade = 0;
    if($result->num_rows > 0){
        $response['message'] = 'Success';
        $response['success'] = true;
        while($rows = $result->fetch_assoc()){
            $temp_time = '1:00pm - 2:00pm';
            if((int)$rows['viewgrades'] > 0){
                $totalGrade = $rows['totalGrade'];
            }
            $teachername = ucwords($rows['tfname'][0] . '. ' . $rows['tlname']);
            $subj = [$totalGrade, ucwords($rows['subjectname']), strtoupper($rows['subjCode']), ucwords($rows['day']), $temp_time, $rows['GCcode'], $teachername];
            array_push($response['subjectGrades'], $subj);
            $totalGrade = 0;
        }
    }

    // fetch students total GPA, and other information in Enrolled_Students table
    $query_gpa = $conn->prepare('SELECT enr_std.TOTAL_GPA, enr_std.SY_ID, std.course FROM Enrolled_Students enr_std JOIN students std ON enr_std.S_ID=std.username WHERE S_ID=? AND SY_ID=?');
    $query_gpa->bind_param('ss', $_SESSION['username'], $get_SY);
    $query_gpa->execute();
    $result = $query_gpa->get_result();

    if($result->num_rows > 0){
        $rows = $result->fetch_assoc();

        // get gpa
        if((int)$rows['TOTAL_GPA'] > 0){
            $response['gpa'] = $rows['TOTAL_GPA'];
        }

        // get semester
        $semester = $rows['SY_ID'][-1];
        switch($semester){
            case('1'):
                $semester = '1st';
                break;
            case('2'):
                $semester = '2nd';
                break;
            default:
                $semester = 'Unknown';
                break;
        }
        $response['semester'] = $semester;

        // get schoolyear
        $response['SY'] = substr($rows['SY_ID'], 0, -2);

        // get year level
        $response['yearLevel'] = substr($rows['course'], -1);
        switch(substr($rows['course'], -1)){
            case('1'):
                $response['yearLevel'] = '1st year';
                break;
            case('2'):
                $response['yearLevel'] = '2nd year';
                break;
            case('3'):
                $response['yearLevel'] = '3rd year';
                break;
            case('4'):
                $response['yearLevel'] = '4th year';
                break;
            default:
                $response['yearLevel'] = 'Unknown';
                break;
        }
    }

    echo json_encode($response);
}


// get user in session
else if(isset($_POST['getUserInSession'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    session_start();

    $response = [
        'success' => true,
        'message' => 'Good',
        'data' => []
    ];

    if($_SESSION['usertype'] == 'admin'){
        $response['data'] = [
            'fname' => 'St. Bernadette',
            'lname' => 'College of Alabang',
            'role' => ucwords($_SESSION['role']),
            'id' => $_SESSION['username'],
            'username' => $_SESSION['username'],
            'email' => $_SESSION['email'],
            'bdate' => '11/11/1990',
            'address' => $_SESSION['address'],
            'imageLink' => 'Resources/assets/sbca.logo.5.jpg'
        ];
    } else {
        $response['data'] = [
            'fname' => ucwords($_SESSION['fname']),
            'lname' => ucwords($_SESSION['lname']),
            'role' => Students::Course(substr($_SESSION['course'], 0, -1)),
            'id' => $_SESSION['schoolID'],
            'username' => $_SESSION['username'],
            'email' => $_SESSION['email'],
            'bdate' => $_SESSION['bdate'],
            'address' => $_SESSION['address'],
            'imageLink' => $_SESSION['imageLink']
        ];
        if($_SESSION['usertype'] == 'teachers'){
            $response['data']['role'] = ucwords($_SESSION['course']);
        }
    }

    echo json_encode($response);
}

// get all students grades group by SchoolYear
else if(isset($_POST['GetAllStudentGrades'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => true,
        'message' => 'nothing',
        'data' => [
            // [
            //     'SY' => '2024-2024 1st semester',
            //     'totalGPA' => 0,
            //     'units' => 25,
            //     'table' => []
            // ]
        ]
    ];

    $username = Students::getUsernamebyUserid($_SESSION['selected-user']);

    $schoolyear = getEnrolledSYStudent($username);
    if(sizeof($schoolyear) > 0){
        foreach($schoolyear as $data){
            $query = $conn->prepare('SELECT g.totalGrade, sub.name FROM grades g JOIN Subjects sub ON g.subjectId=sub.subId WHERE g.sy_id=? AND g.username=?');
            $query->bind_param('ss', $data[0], $username);
            $query->execute();
            $result = $query->get_result();
            if($result->num_rows > 0){
                $newData = [
                    'SY' => nameSchoolYear($data[0]),
                    'totalGPA' => $data[1],
                    'units' => 0,
                    'table' => [] 
                ];
                while($rows = $result->fetch_assoc()){
                    $newTable = [$rows['totalGrade'], ucwords($rows['name']), checkGrade($rows['totalGrade'])];
                    array_push($newData['table'], $newTable);
                }
                array_push($response['data'], $newData);
            }
        }
    }

    echo json_encode($response);
}

// update student's grade
else if(isset($_POST['updateStudentGrade'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => false,
        'message' => $_SESSION['selected-user'],
        'data' => []
    ];
    
    $totalGrade = $_POST['totalGrade'];
    $username = $_SESSION['selected-user'];
    $subjectID = $_POST['subject'];
    $schoolyear = Users::getCurrentSchoolYear(); 

    // check if submition of grade
    $canSubmit = getifGradeSubmition();
    if($canSubmit){
        $query = $conn->prepare('UPDATE grades JOIN Schedule sch ON grades.subjectId=sch.Schedule JOIN Subjects sub ON sch.subjectname=subId SET totalGrade=? WHERE sub.subjCode=? AND grades.username=? AND grades.sy_id=?');
        $query->bind_param('dsss', $totalGrade, $subjectID, $username, $schoolyear);

        if($query->execute()){
            $response['success'] = true;
            $response['message'] = 'Updated successfully';
        } else {
            $response['message'] = 'Unable to update grade, try again later';
        }
    } else {
        $response['message'] = 'Unable to update grade, try again later';
    }

    echo json_encode($response);
}

// get modified semester
else if(isset($_POST['getSemesterModified'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => false,
        'message' => '',
        'data' => [
            'submition' => 0,
            'extend_date' => ''
        ]
    ];

    $active = 1;
    $query = $conn->prepare('SELECT submitGrade, EXTEND_DATE FROM SchoolYear WHERE CURRENT=?');
    $query->bind_param('i', $active);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $response['success'] = true;
        $rows = $result->fetch_assoc();

        if((int)$rows['submitGrade'] > 0){
            $response['data']['submition'] = 'on';
        } else {
            $response['data']['submition'] = 'off';
        }

        $extend_date = $rows['EXTEND_DATE'];
        $newdate = new DateTime($extend_date);
        $response['data']['extend_date'] = $newdate->format('Y-m-d');
    }

    echo json_encode($response);
}

else if(isset($_POST['saveModifiesSem'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => false,
        'message' => 'Failed to update'
    ];

    $extendDate = $_POST['extend_date'];
    $submitGrade = $_POST['submitGrade'];
    $active = 1;

    if($submitGrade == 'on'){
        $submitGrade = 1;
    } else {
        $submitGrade = 0;
    }

    $query = $conn->prepare('UPDATE SchoolYear SET EXTEND_DATE=?, submitGrade=? WHERE CURRENT=?');
    $query->bind_param('sii', $extendDate, $submitGrade, $active);

    if($query->execute()){
        $response['success'] = true;
        $response['message'] = 'Updated Successfully';
    }

    echo json_encode($response);
}

// check if grade submition
function getifGradeSubmition(): bool{
    include 'db.inc.php';

    $active = 1;
    $query = $conn->prepare('SELECT submitGrade FROM SchoolYear WHERE CURRENT=? AND submitGrade=?');
    $query->bind_param('ii', $active, $active);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        return true;
    }

    return false;
}

// get schoolyear of student enrolled
function getEnrolledSYStudent($username): array{
    include 'db.inc.php';

    $query = $conn->prepare('SELECT SY_ID, TOTAL_GPA FROM Enrolled_Students WHERE S_ID=?');
    $query->bind_param('s', $username);
    $query->execute();
    $result = $query->get_result();

    $schoolyear = [];

    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            array_push($schoolyear, [$rows['SY_ID'], $rows['TOTAL_GPA']]);
        }
    }

    return $schoolyear;
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

function checkGrade($grade){
    if((int)$grade > 3){
        return 'pass';
    } else if((int)$grade == 0){
        return 'INC';
    } else {
        return 'Failed';
    }
}

function nameSchoolYear($schoolyear): string{
    $choolYear = explode('_', $schoolyear);

    switch($choolYear[1]){
        case(1):
            $schoolYear[1] = '1st';
            break;
        case(2):
            $choolYear[1] = '2nd';
            break;
        default:
            $choolyear[1] = 'unknown';
            break;
    }
    return $choolYear[0] . ' ' . $choolYear[1];
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