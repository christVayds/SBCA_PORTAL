<?php
    if(isset($_POST['searchstudent'])){
        include '../../Model/db.inc.php';
        include '../../Model/usertable.inc.php';

        // get maximum number of data to show
        $count = $_POST['count'];

        $search = $_POST['search']; // string value to search in database
        $toSearch = $_POST['searchstudent'];

        // search student name
        if($toSearch == 'students'){
            $searchquery = "SELECT * FROM students WHERE userid LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%' OR mname LIKE '%$search%' OR CONCAT(fname, ' ', lname) LIKE '%$search%'";
        } 
        // filtered search
        else if($toSearch == 'studentcourse'){
            if($search !== 'all'){
                $searchquery = "SELECT * FROM students WHERE course = '$search'";
            } else {
                $searchquery = "SELECT * FROM students";
            }
        }
        // search teachers(faculties)
        else if($toSearch == 'teachers'){
            $searchquery = "SELECT * FROM teachers WHERE userid LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%' OR mname LIKE '%$search%' OR CONCAT(fname, ' ', lname) LIKE '%$search%'";
        }

        // get the result
        $result = mysqli_query($conn, $searchquery);
        
        // echo the table header

        // if students
        if(in_array($toSearch, ['students', 'studentcourse'])){
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
        } 
        // if faculties
        else if(in_array($toSearch, ['teachers', 'faculties'])){
            echo '<tr class="tb_header">
                <th id="userid">ID NO.</th>
                <th id="name">Name</th>
                <th id="course">Email</th>
                <th id="year">Course</th>
            </tr>';

            if(mysqli_num_rows($result) > 0){
                while($row = $result->fetch_assoc()){
                    $fullname = ucwords(Naming($row["fname"], $row["lname"], $row["mname"]));

                    if($count > 0){
                        // for teacher (faculty) data
                        echo '<tr id="'.$row['userid'].'" class="studentrow">
                            <td>' . $row['userid'] .' </td>
                            <td>' . $fullname . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['profession'] . '</td>
                            </tr>
                        ';
                    }
                    $count -= 1;
                }
            }
        }
        
        mysqli_close($conn);
    }
?>

<script>
// get student data in table if click
$(".studentrow").click(function(){
    console.log($(this).attr('id'));
});
</script>