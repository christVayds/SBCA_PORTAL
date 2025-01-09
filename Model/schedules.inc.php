<?php

// get array of schedule
if(isset($_POST['fetchSchedule'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    include 'db.inc.php';
    session_start();

    // $selected_course = $_POST['course'];
    $selected_course = $_POST['course'];
    $getSemesterLevel = Users::getCurrentSchoolYear(true); // get semester level
    $getSchoolYear = Users::getCurrentSchoolYear();

    $response = [
        'success' => false,
        'message' => '',
        'info' => [
            'course' => '',
            'SchoolYear' => '',
            'SemesterLevel' => ''
        ],
        'data' => [
            // ['10:00am - 1:00pm', 'Monday', 'ITE Major5', 'Integrated Programming and Technologies W/Lab', 3, 'yjhew2', 'Tony Stark', schedule]
        ]
    ];

    if($_SESSION['role'] == 'teacher'){
        $response['message'] = $_SESSION['username'] . ' ' . $getSemesterLevel . ' ' . $selected_course;
        $query = $conn->prepare('SELECT Schedule.*, Subjects.name AS subject_name, Subjects.*, teachers.* FROM Schedule JOIN Subjects ON Schedule.subjectname = Subjects.subId JOIN teachers ON Subjects.username = teachers.username WHERE Subjects.semester=? AND Subjects.username=?'); // add course in schedule table Schedule.course=?
        $query->bind_param('is', $getSemesterLevel, $_SESSION['username']);
    } else {
        $query = $conn->prepare('SELECT Schedule.*, Subjects.name AS subject_name, Subjects.*, teachers.* FROM Schedule JOIN Subjects ON Schedule.subjectname = Subjects.subId JOIN teachers ON Subjects.username = teachers.username WHERE Subjects.course=? AND Subjects.semester=?'); // add course in schedule table Schedule.course=?
        $query->bind_param('si', $selected_course, $getSemesterLevel);
    }
    $query->execute();
    $result = $query->get_result();

    $response['info']['course'] = Students::Course(substr($selected_course, 0, -1));
    $SchoolYearExpoloded = explode('_', $getSchoolYear);
    $response['info']['SchoolYear'] = 'SY: ' . $SchoolYearExpoloded[0];
    $response['info']['SemesterLevel'] = 'Semester Level: ' . $SchoolYearExpoloded[1];
    if($result->num_rows > 0){
        $response['success'] = true;
        $response['message'] = 'found';
        while($rows = $result->fetch_assoc()){
            $fullname = Students::FullName($rows['fname'], $rows['lname'], $rows['mname']);
            $timeFormat = $rows['time_start'] . ' - ' . $rows['time_end'];
            switch($rows['day']){
                case('mon'):
                    $day = 'Monday';
                    break;
                case('tue'):
                    $day = 'Tuesday';
                    break;
                case('wed'):
                    $day = 'Wednesday';
                    break;
                case('thu'):
                    $day = 'Thursday';
                    break;
                case('fri'):
                    $day = 'Friday';
                    break;
                case('sat'):
                    $day = 'Saturday';
                    break;
                case('sun'):
                    $day = 'Sunday';
                    break;
            }
            if($rows['withLab'] == 1){ $rows['subject_name'] = $rows['subject_name'] . ' /With LAB';}
            $newData = [$timeFormat, $day, strtoupper($rows['subjCode']), ucwords($rows['subject_name']), $rows['num_units'], $rows['GCcode'], $fullname, $rows['Schedule']];
            array_push($response['data'], $newData);
        }
    }

    echo json_encode($response);
}

// get allsubjects available by course
else if(isset($_POST['showSubjectByCourse'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => true,
        'message' => '',
        'data' => []
    ];

    $getSemester = Users::getCurrentSchoolYear(true);
    $getCourse = $_POST['showSubjectByCourse'];

    $query = $conn->prepare('SELECT Subjects.name AS subject_name, Course.name AS course_name, Subjects.*, Course.*, teachers.* FROM Subjects JOIN Course ON Subjects.course = Course.course JOIN teachers ON Subjects.username = teachers.username WHERE Subjects.semester=? AND Course.course=?');
    $query->bind_param('is', $getSemester, $getCourse);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            $fullname = Students::FullName($rows['fname'], $rows['lname'], $rows['mname']);
            $newData = [ucwords($rows['subject_name']), $fullname, $rows['Major'], $rows['subId']];
            array_push($response['data'], $newData);
        }
    }

    echo json_encode($response);
} else if(isset($_POST['addNewSubjectToSchedule'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    session_start();

    $selectedCourseID = $_POST['addNewSubjectToSchedule'];
    $GCcode = $_POST['GCcode'];
    $selectedCourse = $_POST['selected_course'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];
    $day = $_POST['day'];
    $num_units = 0;
    $withLab = $_POST['withLab'];

    $response = [
        'success' => true,
        'message' => 'Saved.',
        'data' => []
    ];

    // check for roles
    if($_SESSION['role'] === 'accounting'){
        $response['message'] = 'Unable to update changes.';
        $response['success'] = false;
        echo json_encode($response);
        exit();
    }

    $query = $conn->prepare('INSERT INTO Schedule(subjectname, withlab, GCcode, coursename, time_start, time_end, day, num_units) VALUE (?,?,?,?,?,?,?,?)');
    $query->bind_param('iisssssi', $selectedCourseID, $withLab, $GCcode, $selectedCourse, $time_start, $time_end, $day, $num_units);
    
    if(!$query->execute()){
        $response['success'] = false;
    }

    echo json_encode($response);
}

// modify schedule
else if(isset($_POST['modifySubjectSchedule'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    session_start();

    $selected_schedule = $_POST['modifySubjectSchedule'];
    $_SESSION['selectedSchedule'] = $selected_schedule;

    $response = [
        'success' => true,
        'message' => '',
        'data' => [
            'day' => 'sat',
            'time_start' => '00:00:00',
            'time_end' => '00:00:00',
            'schedule-gccode' => 'yeahBoy',
            'numunits' => '25',
            'withlab' => 1
        ]
    ];

    $query = $conn->prepare('SELECT * FROM Schedule WHERE Schedule=?');
    $query->bind_param('i', $selected_schedule);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $rows = $result->fetch_assoc();
        $response['data'] = [
            'day' => $rows['day'],
            'time_start' => $rows['time_start'],
            'time_end' => $rows['time_end'],
            'schedule-gccode' => $rows['GCcode'],
            'numunits' => $rows['num_units'],
            'withlab' => $rows['withLab'] == 1 ? 'lab' : 'nolab'
        ];
    }

    echo json_encode($response);
}

// update schedule
else if(isset($_POST['schedule_update'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    session_start();

    $selected_schedule = $_SESSION['selectedSchedule'];

    $response = [
        'success' => true,
        'message' => 'update successfully',
        'data' => [],
        'selected_schedule' => $selected_schedule
    ];

    // check for roles
    if($_SESSION['role'] === 'accounting'){
        $response['message'] = 'Unable to update changes.';
        $response['success'] = false;
        echo json_encode($response);
        exit();
    }

    $withLab = $_POST['withlab'] == 'lab' ? 1 : 0;

    $query = $conn->prepare('UPDATE Schedule SET GCcode=?, time_start=?, time_end=?, day=?, num_units=?, withLab=? WHERE Schedule=?');
    $query->bind_param('ssssiii', $_POST['GCcode'], $_POST['time_start'], $_POST['time_end'], $_POST['day'], $_POST['num_units'], $withLab, $selected_schedule);
    
    if(!$query->execute()){
        $response['success'] = false;
    }

    $_SESSION['selectedSchedule'] = '';
    echo json_encode($response);
}
// delete schedule
else if(isset($_POST['remove_subject_inSchedule'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => true,
        'message' => 'Removed.',
        'data' => []
    ];

    // check for roles
    if($_SESSION['role'] === 'accounting'){
        $response['message'] = 'Unable to update changes.';
        $response['success'] = false;
        echo json_encode($response);
        exit();
    }

    $query = $conn->prepare('DELETE FROM Schedule WHERE Schedule=?');
    $query->bind_param('i', $_SESSION['selectedSchedule']);

    if(!$query->execute()){
        $response['success'] = false;
    }

    $_SESSION['selectedSchedule'] = '';
    echo json_encode($response);
}

// update student's subject - view all student's subjects
else if(isset($_POST['updateSubject'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    if($_POST['student'] != ''){
        $_SESSION['selected-user'] = $_POST['student'];
    }

    $username = Students::getUsernamebyUserid($_SESSION['selected-user']);
    $getSY = Users::getCurrentSchoolYear();

    $response = [
        'success' => true,
        'message' => '',
        'data' => [
            //['Subject name 2', 'teacher name', 'subjcode', '1st year, 1st semester', '1:00pm - 5:00pm', 0]
            'Mon' => [],
            'Tue' => [],
            'Wed' => [],
            'Thu' => [],
            'Fri' => [],
            'Sat' => [],
            'Sun' => [],
        ],
        'user' => $username
    ];

    $query = $conn->prepare('SELECT g.*, sc.*, su.*, std.*, tch.fname AS tfname, tch.lname AS tlname, tch.mname AS tmname FROM grades g JOIN students std ON g.username=std.username JOIN Schedule sc ON g.subjectID=sc.Schedule JOIN Subjects su ON sc.subjectname=su.subId JOIN teachers tch ON su.username=tch.username WHERE g.username=? AND g.sy_id=?');
    $query->bind_param('ss', $username, $getSY);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            $day = ucwords($rows['day']);
            $teacher_fullname = Students::FullName($rows['tfname'], $rows['tlname'], $rows['tmname']);
            $yearSemester = '1st year, 1st semester';
            $time = $rows['time_start'] . ' - ' . $rows['time_end'];
            array_push($response['data'][$day], [ucwords($rows['name']), $teacher_fullname, strtoupper($rows['subjCode']), $yearSemester, $time, $rows['totalGrade']]);
        }
    }

    echo json_encode($response);
}

// add subject to student's schedule
else if(isset($_POST['addStudentSubject'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    $subject = $_POST['addStudentSubject'];
    $username = Students::getUsernamebyUserid($_SESSION['selected-user']);
    $defaultGrade = 0;
    $getSY = Users::getCurrentSchoolYear();

    $response = [
        'success' => true,
        'message' => 'Update Saved!',
        'data' => []
    ];

    // check for roles
    if($_SESSION['role'] === 'accounting'){
        $response['message'] = 'Unable to update changes.';
        $response['success'] = false;
        echo json_encode($response);
        exit();
    }

    $query = $conn->prepare('INSERT INTO grades(subjectId, username, totalGrade, sy_id) VALUES (?,?,?,?)');
    $query->bind_param('isis', $subject, $username, $defaultGrade, $getSY);

    if(!$query->execute()){
        $response['success'] = false;
        $response['message'] = 'failed to add subject to student, try again';
    }

    echo json_encode($response);
}

// action to selected subject in student's list of schedule
else if(isset($_POST['subjectAction'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    
    $response = [
        'success' => true,
        'message' => '',
        'data' => []
    ];

    // check for roles
    if($_SESSION['role'] === 'accounting'){
        $response['message'] = 'Unable to update changes.';
        $response['success'] = false;
        echo json_encode($response);
        exit();
    }
    
    $action = $_POST['action'];
    $inputGrade = $_POST['inputGrade'];
    $username = Students::getUsernamebyUserid($_SESSION['selected-user']);
    $selectedSubject = $_POST['selectedSubject'];

    if($action == 'save'){
        $response['message'] = 'Subject updated';
        $query = $conn->prepare('UPDATE grades JOIN Schedule sch ON grades.subjectId=sch.Schedule JOIN Subjects sub ON sch.subjectname=sub.subId SET grades.totalGrade=? WHERE sub.subjCode=? AND grades.username=?');
        $query->bind_param('dss', $_POST['inputGrade'], $selectedSubject, $username);
    } else if($action == 'remove') {
        $response['message'] = 'Subject removed';
        $query = $conn->prepare('DELETE grades FROM grades JOIN Schedule sch ON grades.subjectId = sch.Schedule JOIN Subjects sub ON sch.subjectname = sub.subId WHERE sub.subjCode = ? AND grades.username = ?');
        $query->bind_param('is', $selectedSubject, $username);
    } else {
        $response['success'] = false;
        $response['message'] = 'Action not found';
    }

    if(!$query->execute()){
        $response['success'] = false;
        $response['message'] = 'failed to save changes';
    }

    echo json_encode($response);
}

// fetch teacher's subject
else if(isset($_POST['teacherSubjects'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    $response = [
        'success' => false,
        'message' => 'Database Error',
        'data' => []
    ];

    if($_POST['teacher'] == 'true'){
        $username = $_SESSION['username'];
        $response['message'] = 'teacher ' . $username;
    } else {
        $username = $_SESSION['selected-user'];
        $response['message'] = 'admin ' . $username;
    }

    $semester = Users::getCurrentSchoolYear(true);
    $course = '%' . $_POST['course'] . $_POST['yearLevel'] . '%';

    $query = $conn->prepare('SELECT Subjects.*, teachers.*, Course.name AS coursename FROM Subjects JOIN teachers ON Subjects.username=teachers.username JOIN Course ON Subjects.course=Course.course WHERE teachers.userid=? OR teachers.username=? AND Subjects.course LIKE ? AND Subjects.semester=?');
    $query->bind_param('sssi', $username, $username, $course, $semester);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            $newData = [strtoupper($rows['subjCode']), ucwords($rows['name']), ucwords($rows['coursename'])];
            array_push($response['data'], $newData);
        }
        $response['success'] = true;
    }

    echo json_encode($response);
}

// update subject's teacher.username
else if(isset($_POST['updateScheduleTeacher'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    $response = [
        'success' => false,
        'message' => 'Update saved',
        'data' => []
    ];

    // check for roles
    if($_SESSION['role'] === 'accounting'){
        $response['message'] = 'Unable to update changes.';
        $response['success'] = false;
        echo json_encode($response);
        exit();
    }

    $teacher = Teachers::getUsernamebyUserid($_SESSION['selected-user']);

    $query = $conn->prepare('UPDATE Subjects SET username=? WHERE subjCode=?');
    $query->bind_param('ss', $teacher, $_POST['updateScheduleTeacher']);
    
    if($query->execute()){
        $response['success'] = true;
    }

    echo json_encode($response);
}

// add new subject - only super-admin
else if(isset($_POST['addNewSubject'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    $response = [
        'success' => false,
        'message' => 'Unable to add subject, please try again',
        'data' => []
    ];

    if($_SESSION['role'] !== 'superadmin'){
        $response['message'] = 'Restricted, only superadmin can add subjects';
        echo json_encode($response);
        exit();
    }

    $isMajor = 1;
    if($_POST['subjCourse'] == 'none'){
        $isMajor = 0;
    }

    $course = $_POST['subjCourse'] . $_POST['subjYear'];
    $test = 'tttest';

    $query = $conn->prepare('INSERT INTO Subjects(name, semester, Major, subjCode, course, username, units) VALUES (?,?,?,?,?,?,?)');
    $query->bind_param('siisssi', $_POST['subjName'], $_POST['subjSemester'], $_POST['major'], $_POST['subjCode'], $course, $test, $_POST['units']);

    if($query->execute()){
        $response['success'] = true;
        $response['message'] = 'New Subject Added';
    }

    echo json_encode($response);
}

// get student by subjects (for teacher's dashboard)
else if(isset($_POST['getStudentBySubject'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    if($_SESSION['usertype'] != 'teachers'){
        exit();
    }

    $response = [
        'success' => false,
        'message' => 'Good',
        'info' => [],
        'data' => []
    ];

    $teacher = $_SESSION['username'];
    $subject = $_POST['getStudentBySubject'];
    $course = $_POST['course'] . $_POST['yearLevel'];
    $schoolyear = Users::getCurrentSchoolYear();
    $search = '%' .$_POST['search'] . '%';

    $query = $conn->prepare("SELECT g.totalGrade, std.course, sched.coursename, subj.subjCode, subj.name AS subjectname, std.fname, std.lname, std.mname, std.userid, std.username FROM grades g 
                    JOIN Schedule sched ON g.subjectId=sched.Schedule
                    JOIN Subjects subj ON sched.subjectname=subj.subId
                    JOIN students std ON g.username=std.username
                    WHERE subj.username=? AND subj.subjCode=? AND sched.coursename=? AND g.sy_id=? AND CONCAT(std.fname, std.lname, std.mname, std.userid, std.username) LIKE ? LIMIT 20");
    $query->bind_param('sssss', $teacher, $subject, $course, $schoolyear, $search);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $response['success'] = true;
        while($rows = $result->fetch_assoc()){
            $fullname = Students::FullName($rows['fname'], $rows['lname'], $rows['mname']);
            $course = Students::Course(substr($rows['coursename'], 0, -1));
            $newdata = [$rows['username'], $rows['userid'], $fullname, $course, $rows['totalGrade']];
            array_push($response['data'], $newdata);
            $response['info'] = [
                'subject_name' => ucwords($rows['subjectname']),
                'coursename' => Students::Course(substr($course, 0, -1)),
                'code' => $rows['subjCode'],
                'canWrite' => ifCanWrite()
            ];
        }
    } else {
        $response['message'] = 'Database error';
    }

    echo json_encode($response);
}

function ifCanWrite(){
    include 'db.inc.php';

    $active = 1;
    $query = $conn->prepare('SELECT submitGrade FROM SchoolYear WHERE CURRENT=?');
    $query->bind_param('i', $active);
    
    if($query->execute()){
        $result = $query->get_result();
        if($result->num_rows > 0){
            $rows = $result->fetch_assoc();
            if((int)$rows['submitGrade'] > 0){
                return true;
            }
        }
    }

    return false;
}