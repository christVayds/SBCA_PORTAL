<?php
// not yet done
// fix the naming for faculty and students
// check for selecting student

// display the table    +
// display in refresh   +
// display in search    +

// show table of all users (students and faculties)

// show student grade info in dashboard(student/teacher tab) - popup

// show students in dashboard tab

function showStudentsByCourse($courseid, $year='1', $searchname=''): void{
    include 'db.inc.php';
    $stmt = mysqli_stmt_init($conn);
    $courseid = $courseid.$year;
    $searchname = '%'.$searchname.'%';

    // $studentsquery = 'SELECT * FROM students WHERE course=?';
    $studentsquery = 'SELECT Enrolled_Students.*, students.* FROM Enrolled_Students JOIN students ON Enrolled_Students.S_ID = students.username WHERE students.course=? AND CONCAT(students.fname, students.lname, students.username, students.userid) like ?';

    if(!mysqli_stmt_prepare($stmt, $studentsquery)){
        header('location: /dashboard.php?message=error');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt,'ss', $courseid, $searchname);
        mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

        // table header
        echo '
            <tr class="table-row">
                <th class="table-header table-id">ID NO.</th>
                <th class="table-header table-name">Name</th>
                <th class="table-header table-long">Course</th>
                <th class="table-header table-num">Year</th>
                <th class="table-header table-num">Unit</th>
                <th class="table-header table-input">GPA</th>
            </tr>
        ';

        while($row = $result->fetch_assoc()){
            // table of students
            $fullname = ucwords(Naming($row["fname"], $row["lname"], $row["mname"]));

            echo '
                <tr id="'. $row['userid'] .'" class="table-row table-user enrolled_std">
                    <td class="table-data">'. $row['userid'] .'</td>
                    <td class="table-data" id="'. $row['userid'] .'_name">'. $fullname .'</td>
                    <td class="table-data" id="'. $row['userid'] .'_course">'. Coursename($row['course']) .'</td>
                    <td class="table-data">3rd</td>
                    <td class="table-data">12</td>
                    <td class="table-data table-input">
                        <input type="text" class="total_gpa" placeholder="0">
                    </td>
                </tr>
            '; // end of tr

        }
    }
}

// no filter
function showUserData($count, $user){
    include 'db.inc.php';

    // $user = studets or teacher only
    $studentsquery = "SELECT * FROM ". $user ."";
    $result = mysqli_query($conn, $studentsquery);

    if(mysqli_num_rows($result) > 0){

        // echo the table header
        if($user == 'students'){
        echo '<tr class="tb_header">
                <th id="userid">ID NO.</th>
                <th id="name">Name</th>
                <th id="course">Course</th>
                <th id="year">Year</th>
                <th id="status">Status</th>
            </tr>';
        } else {
            echo '<tr class="tb_header">
                <th id="userid">ID NO.</th>
                <th id="name">Name</th>
                <th id="course">Email</th>
                <th id="year">Course</th>
            </tr>';
        }
            
        displayTable($result, $count, $user);

    }
    mysqli_close($conn);
}

function displayTable($result, $count, $userType='students'): void{
    
    while($row = $result->fetch_assoc()){
        $fullname = ucwords(Naming($row['fname'], $row['lname'], $row['mname']));

        // show data
        if($count > 0){
            // first check the type of user, teacher(faculty) or students - default is students
            if($userType == 'students'){
                // for students data
                echo '<tr id="'.$row['userid'].'" class="studentrow">
                            <td>' . $row['userid'] .' </td>
                            <td>' . $fullname . '</td>
                            <td>' . Coursename($row["course"]) . '</td>
                            <td>3rd</td>
                            <td>Regular</td>
                        </tr>
                    ';
            } else if($userType == 'teachers'){
                // for teacher (faculty) data
                echo '<tr id="'.$row['userid'].'" class="studentrow">
                            <td>' . $row['userid'] .' </td>
                            <td>' . $fullname . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['profession'] . '</td>
                        </tr>
                    ';
            }
        }
        $count -= 1;
    }
}

function Coursename($course){
    $course = substr($course, 0, -1);
    
    switch($course){
        case("bsit"):
            $course = "BS Information Technology";
            break;
        case("bsba"):
            $course = "BS Business Ad";
            break;
        case("bshm"):
            $course = "BS Hospitality Management";
            break;
        case("bspsych"):
            $course = "BS Psychology";
            break;
        default:
            $course = "Unkown";
            break;
    };

    return $course;
}

function Naming($fname, $lname, $mname){
    $fullname = "";
    if($mname != 'n/a'){
        $fullname = $fname . " " . $mname[0] . ". " . $lname;
    } else {
        $fullname = $fname . " " . $lname;
    }

    return $fullname;
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