<?php

class Users{
    public $username;
    public $fname;
    public $mname;
    public $lname;
    public $userid;
    public $email;
    public $password;
    public $homeaddress;
    public $bdate;
    public $gender;

    public function __construct($fname, $lname, $mname, $userid, $email, $password, $homeaddress, $bdate, $gender){
        // $this->username = $username;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->mname = $mname;
        $this->userid = $userid;
        $this->email = $email;
        $this->password = $password;
        $this->homeaddress = $homeaddress;
        $this->bdate = $bdate;
        $this->gender = $gender;
    }

    public function generateUsername($fname, $mname, $lname){
        $usrname = "";
        $count = 0;
        if($mname != "n/a"){
            $usrname = $fname[0] . $mname[0] . $lname;
        } else {
            $usrname = $fname[0] . $lname;
        }

        while(self::checkUsername($usrname)){
            $count++;
            $usrname = $usrname . $count;
        }
        return $usrname;
    }

    protected static function checkUsername($usrname){
		// here to check username if it is already exist in database
		include 'db.inc.php';

		$studentQuery = "SELECT * FROM students WHERE username = '$usrname';";
		$result = mysqli_query($conn, $studentQuery);

		if(mysqli_num_rows($result) > 0){
			mysqli_close($conn);
			return true;
		}

        mysqli_close($conn);
        return false;
	}

    // check email if it already exist in database
    protected static function checkEmail($email){
		include 'db.inc.php';

		$studentQuery = "SELECT * FROM students WHERE email = '$email';";
		$result = mysqli_query($conn, $studentQuery);

		if(mysqli_num_rows($result) > 0){
			mysqli_close($conn);
			return true;
		} else {
			mysqli_close($conn);
			return false;
		}
	}

    protected static function hashPassword($password){
		$hashpwd = password_hash($password, PASSWORD_DEFAULT);
		return $hashpwd;
	}
}

class Students extends Users{
    public $course;

    public function __construct($fname, $mname, $lname, $course, $userid, $email, $password, $bdate, $gender, $homeaddress, $newStudent='None'){
        parent::__construct($fname, $lname, $mname, $userid, $email, $password, $homeaddress, $bdate, $gender);
        // $this->fname = $fname;
        // $this->mname = $mname;
        // $this->lname = $lname;
        // $this->userid = $userid;
        // $this->email = $email;
        // $this->password = $password;
        // $this->bdate = $bdate;
        // $this->homeaddress = $homeaddress;
        // $this->gender = $gender;

        if($newStudent == 'None'){
            $this->username = $this->generateUsername($this->fname, $this->mname, $this->lname);
        } else {
            $this->username = $newStudent;
        }

        $this->course = $course;
    }

    public function FullName(){
        if($this->mname != 'n/a'){
            return ucwords($this->fname . ' ' . $this->mname[0] . '. ' . $this->lname);
        } return ucwords($this->fname . ' ' . $this->lname);
    }

    public function Course(){
        switch($this->course){
            case("bsit"):
                $course = "BS Information Technology";
                break;
            case("bsba"):
                $course = "BS Business Ad";
                break;
            case("bshm"):
                $course = "BS Hospitality Management";
                break;
            case("bsp"):
                $course = "BS Psychology";
                break;
            default:
                $course = "Unkown";
                break;
        };
    
        return $course;
    }

    public function save(): bool{
        include 'db.inc.php';

		if(parent::checkEmail($this->email) == false){
			$pwdHashed = parent::hashPassword($this->password);
			$newStudent = "INSERT INTO students (username, fname, lname, mname, email, userid, course, _password, bdate, address, gender) VALUES ('$this->username', '$this->fname', '$this->lname', '$this->mname', '$this->email', '$this->userid', '$this->course', '$pwdHashed', '$this->bdate', '$this->homeaddress', '$this->gender')";
			$result = mysqli_query($conn, $newStudent);
			return true;
		}

		mysqli_close($conn);
		return false;
    }

    public function showStudentGrades(){
        include '../../Model/db.inc.php';
        $stmt = mysqli_stmt_init($conn);

        $gradesquery = 'SELECT grades.totalGrade, Subjects.name FROM grades JOIN Subjects ON Subjects.subId = grades.subjectId WHERE grades.username=?';

        if(mysqli_stmt_prepare($stmt, $gradesquery)){

            mysqli_stmt_bind_param($stmt,'s', $this->username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            return $result;
        }
    }
}

class Teachers extends Users{

    public function __construct($fname, $lname, $mname, $userid, $email, $password, $homeaddress, $bdate, $gender){
        parent::__construct($fname, $lname, $mname, $userid, $email, $password, $homeaddress, $bdate, $gender);

        $this->username = $this->generateUsername($this->fname, $this->mname, $this->lname);
    }

    public function save(): bool{
        include 'db.inc.php';
        
        if(parent::checkEmail($this->email) == false){
            $pwdHashed = parent::hashPassword($this->password); // hash the password for teacher
            $newUser = "INSERT INTO teachers (username, fname, lname, mname, email, userid, _password, bdate, address, gender) VALUES ('$this->username', '$this->fname', '$this->lname', '$this->mname', '$this->email', '$this->userid', '$pwdHashed', '$this->bdate', '$this->homeaddress', '$this->gender');";
            $result = mysqli_query($conn, $newUser);
			return true;
        }

        mysqli_close($conn);
		return false;
    }
}