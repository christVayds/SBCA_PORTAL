<?php

// this will show in dashboard popup
// show student's grades
if(isset($_POST['showPopup'])){
    include 'Class/Users.class.php';
    $student = findStudent($_POST['student']);

    $getCourse = Students::Course(substr($student->course, 0, -1));
    
    echo '
        <div class="info_popup">
            <div class="header">
                <div class="title">
                    <h3>Student</h3>
                </div>
                <div class="exit" id="exit_d_info_p">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
            <div class="profile">
                <div class="picture">
                    <img src="Resources/assets/default-profile-photo2.jpg" alt="">
                </div>
                <div class="student_name">
                    <p class="studentname" id="info_student_name">'. Students::FullName($student->fname, $student->lname, $student->mname) .'</p>
                    <p class="studentcourse" id="info_student_course">'. $getCourse .'</p>
                </div>
            </div>
            <div class="students_grade" id="students_grade">';
                
    DisplayGradesStudent($student);
    
    echo '<div class="total_grade">
                <p>Total Grade: </p>
                <input type="text" placeholder="Total" id="input_grade_from_admin_dashboard">
            </div>
        </div>';

} else if(isset($_POST['refresh'])){
    include '../../Model/usertable.inc.php';
    showUserData(50, $_POST['refresh']);
}

function findStudent($studentID){
    include '../../Model/db.inc.php';
    include '../../Class/Users.class.php';

    $stmt = mysqli_stmt_init($conn);

    $student = 'SELECT * FROM students WHERE userid=?';

    if(!mysqli_stmt_prepare($stmt, $student)){
        header('location: /dashboard.php?message=usernotfound');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt,'s', $studentID);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $student = $result->fetch_assoc();

        $studentInfo = new Students($student['fname'], $student['mname'], $student['lname'], $student['course'], $student['userid'], $student['email'], $student['password'], $student['bdate'], $student['gender'], $student['address'], $student['username']);

        return $studentInfo;
    }
}

function DisplayGradesStudent($student){
    $result = $student->showStudentGrades();

    if($result){
        while($row = $result->fetch_assoc()){
            echo '<div class="grade">
                    <p>'. $row['name'] .'</p>
                    <input type="text" placeholder="Grade" value='. $row['totalGrade'] .'>
                </div>';
        }
    }
}

?>
<script>
    // exit dashboard information pop up - dashboard tab
    $("#exit_d_info_p").click(function(){
        document.getElementById('open_info_popup').classList.remove('active_open_popup');
    });

    // student list popup (more information about student)
    $(".studentrow").click(function(){
        var stdinfo = document.getElementById('stdinfo_popup');
        stdinfo.classList.add('showSemPopup');

        $('#viewstudentinfo_popup').load('Resources/pages/studentinfo.html.php', {
            student_id: $(this).attr('id')
        });
    });

    // exit student info popup
    $('#exit_stdinfo_popup').click(function(){
        document.getElementById('stdinfo_popup').classList.remove('showSemPopup');
    });
</script>