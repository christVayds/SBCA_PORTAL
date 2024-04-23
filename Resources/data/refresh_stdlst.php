<?php

    if(isset($_POST['refresh'])){
        if($_POST['refresh'] == "showStudents"){
            include '../../Model/students.inc.php';

            showStudents(50);
        }
    }
?>

<script>
    // get student data in table if click
    $(".studentrow").click(function(){
        console.log($(this).attr('id'));
    });
</script>