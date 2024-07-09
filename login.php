<?php 

session_start();
if(isset($_SESSION['username'])){
    header("location: dashboard.php");
    exit();
}
// yeah
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Resources/styles/login.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="users">
            <a href="login.php?user=student">
                <div class="user student active" id="student"><p>Student</p></div>
            </a>
            <a href="login.php?user=teacher">
                <div class="user teacher" id="teacher"><p>Teacher</p></div>
            </a>
            <a href="login.php?user=sbca">
                <div class="user admin" id="sbca"><p>SBCA</p></div>
            </a>
        </div>
        <div class="loginbox">
            <div class="side left">
                <div class="logo">
                    <img src="Resources/assets/sbca.logo2.png" alt="">
                </div>
                <div class="form">
                    <div class="forms">
                        <form action="Model/login.inc.php?user=<?php echo $_GET['user'] ?>" method="post" autocomplete="off" id="login_user">
                            <input type="text" placeholder="Username or Email" name="username">
                            <input type="password" placeholder="Password" name="password">
                            <input type="submit" value="Login" name="submit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="side right">
                <img src="Resources/assets/student.nobg.png" alt="user image" id="userImage" class='slide_img'>
            </div>
        </div>
        <div class="options">
            <a href="#">About</a>
            <p>•</p>
            <a href="#">Forgot Password</a>
            <p>•</p>
            <a href="#">Report a problem</a>
        </div>
    </div>

    <script src="Resources/script/login.js"></script>
</body>
</html>