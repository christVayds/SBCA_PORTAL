<?php

function showTabs($tab='account'): void{
    session_start();
    $user = $_SESSION['user'];
    
    if($tab=='account'){
        include('acc_tabs.pages.html.php');
    } else {
        include('accounting_tabs.pages.html.php');
    }
}

function AccountPage(): void{
    session_start();

    if($_SESSION['user']){
        $user = $_SESSION['user'];

        if($user === 'student'){
            include('student_acc.page.html.php');
        } else if ($user === 'sbca') {
            include('admin_acc.page.html.php');
        } else {
            // error in teacher
            exit(); // exit here
        }
    }
}