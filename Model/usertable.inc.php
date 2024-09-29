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
function showStudentsByCourse($courseid, $year=3): void{
    include 'db.inc.php';
    $stmt = mysqli_stmt_init($conn);

    $studentsquery = 'SELECT * FROM students WHERE course=?';

    if(!mysqli_stmt_prepare($stmt, $studentsquery)){
        header('location: /dashboard.php?message=error');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt,'s', $courseid);
        mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

        // table header
        echo '
            <tr id="header">
                <th id="std_userid">ID NO.</th>
                <th id="std_name">Name</th>
                <th id="std_course">Course</th>
                <th id="std_year">Year</th>
                <th id="std_unit">Unit</th>
                <th id="std_gpa">GPA</th>
            </tr>
        ';

        while($row = $result->fetch_assoc()){
            // table of students
            $fullname = ucwords(Naming($row["fname"], $row["lname"], $row["mname"]));

            echo '
                <tr id="'. $row['userid'] .'" class="enrolled_std">
                    <td>'. $row['userid'] .'</td>
                    <td id="'. $row['userid'] .'_name">'. $fullname .'</td>
                    <td id="'. $row['userid'] .'_course">'. Coursename($row['course']) .'</td>
                    <td>3rd</td>
                    <td>12</td>
                    <td class="gpa_input">
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
        case("bsp"):
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