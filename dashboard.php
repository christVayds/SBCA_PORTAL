<?php
    // include the base / navigation bar of the page
    include "base.php";

    // include the Model packages
    include("Model/usertable.inc.php");
    include('Model/semester.dashboard.inc.php');
    include('Model/todo.inc.php');

    // what the hell is this?
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $signal = $_POST['signal'];
    }
?>

<!-- student's dashboard -->
<div class="dashboard" id="student">
    <!-- check for user -->
    <div class="view <?php if($_SESSION['user'] === 'student'){ echo 'active_user'; } ?>">
        <?php
            include('Resources/pages/student_dashboard.html.php');
        ?>
    </div>
</div>

<!-- Admin's dashboard -->

<div class="dashboard" id="admin">
    <!-- check for user -->
    <div class="view <?php if($_SESSION['user'] === 'sbca' || $_SESSION['user'] == 'admin'){ echo 'active_user'; } // uncomment  ?>">
        <?php
            include('Resources/pages/admin_dashboard.html.php');
        ?>
    </div>
</div>

<!-- teacher view -->
<div class="dashboard" id="teacher">
    <div class="view <?php if($_SESSION['user'] === 'teacher'){ echo 'active_user'; } // uncomment  ?>">
        <?php
            include('Resources/pages/teacher_dashboard.html.php');
        ?>
    </div>
</div>