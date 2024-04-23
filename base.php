<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Resources/styles/dashboard.css">
    <link rel="stylesheet" type="text/css" href="Resources/styles/widgets.css">
    <link rel="stylesheet" type="text/css" href="Resources/styles/account.css">
    <link rel="stylesheet" type="text/css" href="Resources/styles/messages.css">
    <link rel="stylesheet" type="text/css" href="Resources/styles/base.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/9515269a08.js" crossorigin="anonymous"></script>
    <script src="Resources/script/base.js"></script>
    <script src="Resources/script/widgets.js"></script>
    <title>SBCA Portal</title>
</head>
<body>
    <div class="navbar">
        <div class="navmenu">
            <img src="resources/assets/sbca.logo3.png">
            <img src="resources/assets/SBCA-text-nobg.png" alt="" id="textlogo">
        </div>
        <div class="navmenu">
            <a href="dashboard.php">
                <div class="nav" id="dashboard">
                    <i class="fa-solid fa-table-list"></i>
                </div>
                <div class="label">
                    <p>Dashboard</p>
                </div>
            </a>
            <a href="messages.php">
                <div class="nav" id="messages">
                    <i class="fa-regular fa-envelope" id="icon_messages"></i>
                </div>
                <div class="label">
                    <p>Messages</p>
                </div>
            </a>
            <a href="account.php">
                <div class="nav" id="account">
                    <i class="fa-regular fa-circle-user" id="icon_account"></i>
                </div>
                <div class="label">
                    <p>Account</p>
                </div>
            </a>
        </div>
    </div>