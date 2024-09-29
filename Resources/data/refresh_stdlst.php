<?php
if(isset($_POST['refresh'])){
    include '../../Model/usertable.inc.php';

    // for students
    if($_POST['refresh'] == "showStudents"){
        showUserData(50, 'students');
    } 
    // for faculties
    else if($_POST['refresh'] == 'showfaculties'){
        showUserData(50, 'teachers');
    }
}
?>

<script>
// get student data in table if click
$(".studentrow").click(function(){
    console.log($(this).attr('id'));
});
</script>