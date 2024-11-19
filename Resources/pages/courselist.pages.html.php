<?php

if(isset($_POST['view_list_course'])){
    include '../../Model/db.inc.php';
    include '../../Class/Users.class.php';
    session_start();

    $semesterLevel = $_POST['semesterLevel'];
    $stmt = $conn->prepare('SELECT * FROM Course WHERE level=?');
    $stmt->bind_param('i', $semesterLevel);
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<table class="display-table"';
    echo '<tr class="table-header">
            <th class="table-header" id="coursename">Course</th>
            <th class="table-header" id="coursecode">Code</th>
            <th class="table-header" id="numstudents">Students</th>
            <th class="table-header" id="action">Graduating</th>
        </tr>';
    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            $name = $rows['name'];
            echo '<tr class="table-user course-data" id=course_'.$rows['course'].'>
                    <td class="table-data">'. Students::Course($name) .'</td>
                    <td class="table-data table-id">'.$rows['name'].'</td>
                    <td class="table-data table-num">310</td>
                    <td class="table-data table-num">50</td>
                </tr>';
        }
    }
    echo "</table>";
}

?>

<script>
    // course list on click items
    $('.course-data').click(function(){
        document.getElementById('courseinfo-popup').classList.add('showSemPopup');
        // console.log($(this).attr('id').slice(7));
        var courseSelected = $(this).attr('id').slice(7);

        $.ajax({
            url: '../../Model/course.inc.php',
            type: 'POST',
            data: {
                courseInfo: true,
                selectedCourse: courseSelected
            },
            success: function(response){
                console.log('response: ' + response.data['name']);
                document.getElementById('selected_coursename').textContent = response.data['name'];
            },
            error: function(){

            }
        });
    });
</script>