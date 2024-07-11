<?php

function showStudents($count){
    include 'db.inc.php';

    $studentsquery = "SELECT * FROM students";
    $result = mysqli_query($conn, $studentsquery);

    if(mysqli_num_rows($result) > 0){

        // echo the table header
        echo '<tr class="tb_header">
                <th id="userid">ID NO.</th>
                <th id="name">Name</th>
                <th id="course">Course</th>
                <th id="year">Year</th>
                <th id="status">Status</th>
            </tr>';
        while($row = $result->fetch_assoc()){
            $fullname = ucwords(Naming($row["fname"], $row["lname"], $row["mname"]));

            // show all the data
            if($count > 0){
                echo '<tr id="'.$row['userid'].'" class="studentrow">
                        <td>' . $row['userid'] .' </td>
                        <td>' . $fullname . '</td>
                        <td>' . Coursename($row["course"]) . '</td>
                        <td>3rd</td>
                        <td>Regular</td>
                    </tr>
                ';
            }
            $count -= 1;
        }
    }
    mysqli_close($conn);
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

