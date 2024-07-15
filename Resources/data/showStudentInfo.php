<?php

if(isset($_POST['student'])){
    $student = findStudent($_POST['student']);
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
                    <p class="studentname" id="info_student_name">'. $student->FullName() .'</p>
                    <p class="studentcourse" id="info_student_course">'. $student->Course() .'</p>
                </div>
            </div>
            <div class="students_grade" id="students_grade">';
                
    DisplayGradesStudent($student);
    echo '<div class="total_grade">
                <p>Total Grade: </p>
                <input type="text" placeholder="Total">
            </div>
        </div>';
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

        $studentInfo = new Students($student['fname'], $student['mname'], $student['lname'], $student['course'], $student['userid'], $student['email'], $student['password'], $student['bdate'], $student['gender'], $student['address'], false);

        return $studentInfo;
    }
}

function DisplayGradesStudent($student){
    $result = $student->showStudentGrades();

    if($result){
        while($row = $result->fetch_assoc()){
            echo '<div class="grade">
                    <p>Fundamental of Business Outsourcing</p>
                    <input type="text" placeholder="Grade">
                </div>';
        }
    }
}

?>
<script src="Resources/script/dashboard.js"></script>