<?php
    session_start();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        $_SESSION['selected-user'] = '';
    } else {
        // if user not in session, go to login page
        header('location: login.php');
        exit(); // exit current page
    }

    function displayTabs($user): void{
        echo '<div class="nav-item mobile" id="menu-page">
                <div class="icon">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="label">
                    <p>Menu</p>
                </div>
            </div>';

        echo '<div class="nav-item" id="home-page">
                <div class="icon">
                    <i class="fa-solid fa-house"></i>
                </div>
                <div class="label">
                    <p>Home</p>
                </div>
            </div>';
        
        // display account page for sbca admin and students only
        if($user === 'sbca' || $user === 'student'){
            echo '<div class="nav-item" id="accounting-page">
                    <div class="icon">
                        <i class="fa-solid fa-receipt"></i>
                    </div>
                    <div class="label">
                        <p>Account</p>
                    </div>
                </div>';
        }

        echo '<div class="nav-item" id="news-page">
                <div class="icon">
                    <i class="fa-regular fa-newspaper"></i>
                </div>
                <div class="label">
                    <p>News</p>
                </div>
            </div>';

        echo '<div class="nav-item" id="users-page">
                <div class="icon">
                    <i class="fa-regular fa-user"></i>
                </div>
                <div class="label">
                    <p>User</p>
                </div>
            </div>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Resources/styles/base.css">
    <link rel="stylesheet" type="text/css" href="Resources/styles/dashboard.css">
    <link rel="stylesheet" type="text/css" href="Resources/styles/widgets.css">
    <link rel="stylesheet" type="text/css" href="Resources/styles/account.css">
    <link rel="stylesheet" type="text/css" href="Resources/styles/messages.css">
    <link rel="stylesheet" type="text/css" href="Resources/styles/announcements.css">
    <link rel="stylesheet" type="text/css" href="Resources/styles/table.style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/9515269a08.js" crossorigin="anonymous"></script>
    <script src="Resources/script/base.js" type="module"></script>
    <script src="Resources/script/dashboard.js"></script>
    <script src="Resources/script/widgets.js"></script>
    <script src="Resources/script/teacher.js"></script>
    <script src="Resources/script/students.js"></script>
    <script src="Resources/script/account.js"></script>
    <script src="Resources/script/accounting.js"></script>
    <script src="Resources/script/announcements.js"></script>
    <title>SBCA Portal</title>

    <!-- inline JavaScript to apply theme immediately -->
    <script>
        var theme = sessionStorage.getItem('mode');
        if(theme !== null){
            document.documentElement.classList.add(theme);
        }
    </script>
</head>
<body>
    <div class="navbar">
        <div class="navmenu" id="sbca">
            <img src="Resources/assets/sbca.logo3.png">
            <img src="Resources/assets/SBCA-text-nobg.png" alt="" id="textlogo">
        </div>
        <div class="navmenu">
            <?php
                displayTabs(user: $user);
            ?>
        </div>
    </div>