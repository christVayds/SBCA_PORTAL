<?php

// to be delete
if(isset($_POST['refresh'])){
    include '../../Model/usertable.inc.php';
    showUserData(50, $_POST['refresh']);
}
?>

<script>
    // get student data if item in table is click - list of students
    $(".studentrow").click(function(){
        console.log($(this).attr('id'));
    });
</script>