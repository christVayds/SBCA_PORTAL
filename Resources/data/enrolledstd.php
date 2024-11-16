<?php

if(isset($_POST['course'])){
    include '../../Model/usertable.inc.php';
    include '../../Class/Users.class.php';
    session_start();

    $course = $_POST['course'];
    $yearLevel = $_POST['yearLevel'];
    $search = $_POST['searchname'];
    $getSY = getSchoolYear();

    // header
    echo '<div class="titleContent">
                <h3 id="course_title">'. Students::Course($course) . ' ' . $yearLevel .'</h3>
                <p>S.Y. '. substr($getSY, 0, -2) .'</p>
                <p>No. of Students: ' . getnumberofStudentEnrolled($course, $yearLevel) . '</p>
            </div>';

    echo '<table class="display-table">';
    showStudentsByCourse($course, $yearLevel, $search);
    echo '</table>';
}

function getSchoolYear(){
    include '../../Model/db.inc.php';

    $active = 1;
    $query = $conn->prepare('SELECT * FROM SchoolYear WHERE CURRENT=?');
    $query->bind_param('i', $active);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $rows = $result->fetch_assoc();
        $schoolyear = $rows['SY_ID'];
        return $schoolyear;
    }

    return 'empty';
}

function getnumberofStudentEnrolled($course, $yearLevel){
    include '../../Model/db.inc.php';

    $course = $course.$yearLevel;

    $query = $conn->prepare("SELECT students.username, COUNT(Enrolled_Students.S_ID) AS count FROM Enrolled_Students JOIN students ON Enrolled_Students.S_ID = students.username WHERE students.course=?");
    $query->bind_param('s', $course);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $rows = $result->fetch_assoc();
        return $rows['count'];
    }

    return 'empty';
}

?>

<script>
    $(".enrolled_std").click(function(){
        document.getElementById('open_info_popup').classList.add('active_open_popup');
        console.log(this.id);
        if(this.id !== null){
            $("#open_info_popup").load("Resources/data/showStudentInfo.php", {
                showPopup: true,
                student: this.id
            });
        }
    });
</script>