<?php

if(isset($_POST['view_list_course'])){
    include '../../Model/db.inc.php';
    include '../../Class/Users.class.php';
    session_start();

    $yearLevel = $_POST['yearLevel'];
    $stmt = $conn->prepare('SELECT * FROM Course WHERE level=?');
    $stmt->bind_param('i', $yearLevel);
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

    function course_displaytable(data=[]){
        // console.log(data);
        var table = document.getElementById('courseList-display-subjects');
        var tbody = table.querySelector('tbody');

        var newRows = document.createElement('tr');
        newRows.className = 'table-row table-user';

        for(var i=0;i<data.length;i++){
            newData = document.createElement('td');
            newData.className = 'table-data';
            newData.textContent = data[i];
            newRows.appendChild(newData);
        }

        tbody.appendChild(newRows);
    }

    // course list on click items
    $('.course-data').click(function(){
        console.log($(this).attr('id').slice(7));
        var courseSelected = $(this).attr('id').slice(7);

        $.ajax({
            url: '../../Model/course.inc.php',
            type: 'POST',
            data: {
                courseInfo: true,
                selectedCourse: courseSelected
            },
            success: function(response){
                if(response.success && response.data.length > 0){
                    document.getElementById('courseinfo-popup').classList.add('showSemPopup');
                    document.getElementById('selected_coursename').textContent = response.info.name;
                    document.getElementById('courselist-number-of-subjects').textContent = response.data.length;
                    
                    // console.log('response: ' + response.data);
                    // clear table contents
                    $("#courseList-display-subjects tbody tr").remove();

                    // show table of subjects
                    response.data.forEach(data => {
                        // console.log(data);
                        course_displaytable(data);
                        
                    });
                }
            },
            error: function(error){

            }
        });
    });
</script>