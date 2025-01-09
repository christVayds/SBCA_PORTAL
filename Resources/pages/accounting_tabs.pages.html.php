<?php
    session_start();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    } else {
        exit();
    }
?>

<!-- this will show the tabs -->

<div class="acc_tabs active_tab" id="acc_tab"> <!--- default open --->
    <i class="fa-solid fa-receipt"></i>
    <p>Account</p>
</div>