<?php
    if(isset($_POST['searchstudent'])){
        $count = $_POST['count'];
        include '../../Model/db.inc.php';

        $search = $_POST['search'];
        $toSearch = $_POST['searchstudent'];
        $searchquery = "";

        if($_POST['searchstudent'] == 'student'){
            $searchquery = "SELECT * FROM students WHERE userid LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%' OR mname LIKE '%$search%' OR CONCAT(fname, ' ', lname) LIKE '%$search%'";
        } else if($_POST['searchstudent'] == 'studentcourse'){
            if($search !== 'all'){
                $searchquery = "SELECT * FROM students WHERE course = '$search'";
            } else {
                $searchquery = "SELECT * FROM students";
            }
        }
        $result = mysqli_query($conn, $searchquery);

        // echo the table header
        echo '<tr class="tb_header">
                <th id="userid">ID NO.</th>
                <th id="name">Name</th>
                <th id="course">Course</th>
                <th id="year">Year</th>
                <th id="status">Status</th>
            </tr>';
        if(mysqli_num_rows($result) > 0){
			while($row = $result->fetch_assoc()){
                $fullname = ucwords(Naming($row["fname"], $row["lname"], $row["mname"]));

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
?>

<script>
    // get student data in table if click
    $(".studentrow").click(function(){
        console.log($(this).attr('id'));
    });
</script>