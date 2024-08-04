<?php
// fix this
if(isset($_POST['submit'])){
    include 'db.inc.php';
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = $_GET['user'];

    $_SESSION['user'] = $user; // add user to session

    if($user){
        if($user === 'student'){
            $studentQuery = "SELECT * FROM students WHERE username=? OR email=?";
        } else if($user === 'teacher'){
            $studentQuery = "SELECT * FROM teachers WHERE username=? OR email=?";
        } else if($user === 'sbca'){
            $studentQuery = "SELECT * FROM admin WHERE username=? OR email=?";
        }
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $studentQuery)){
            header("location: ../login.php?user=".$user."&message=sql_error");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
		    $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                // temporary
                if($user === 'student'){
                    if($pwdCheck == false){
                        header("location: ../login.php?user=".$user."&message=wrong_password");
                        exit();
                    } else if($pwdCheck === true) {
                        if($user === 'student'){
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION["fullname"] = ucwords($row['fname']) . " " . ucwords($row['lname']);
                            $_SESSION['course'] = $row['course'];
                            $_SESSION['schoolID'] = $row['userid'];
                            $_SESSION['gender'] = $row['gender'];
                            $_SESSION['bdate'] = $row['bdate'];
                            header("location: ../dashboard.php");
                            exit();
                        }
                    }
                } else if($user === 'sbca' || $user === 'teacher'){ // temporary
                    if($password === $row['_password']){
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['address'] = $row['address'];
                        header("location: ../dashboard.php");
                        exit();
                    } else {
                        header("location: ../login.php?user=".$user."&message=wrong_password");
                        exit();
                    }
                }
            } else {
                header("location: ../login.php?user=". $user ."&message=user_not_found");
                exit();
            }
        }
    }
}