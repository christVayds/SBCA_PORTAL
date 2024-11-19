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
    protected static function checkEmail($email): bool{
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

    protected static function hashPassword($password): string {
		$hashpwd = password_hash($password, PASSWORD_DEFAULT);
		return $hashpwd;
	}

    public static function getCurrentSchoolYear() {
        include '../Model/db.inc.php';

        $ActiveValue = 1;
        $query = $conn->prepare('SELECT * FROM SchoolYear WHERE CURRENT=?');
        $query->bind_param('i', $ActiveValue);
        $query->execute();
        $result = $query->get_result();

        if($result->num_rows > 0){
            $rows = $result->fetch_assoc();
            $schoolyear = $rows['SY_ID'];
            return $schoolyear;
        }

        return 'empty';
    }
    
    // get all the subjects from the course, semester level and year level
    public static function getSubjects($yearlevel, $semester): Array{
        include '../../Model/db.inc.php';
        $subjects = [];

        $query = $conn->prepare("SELECT * FROM Subjects WHERE _year=? AND semester=?");
        $query->bind_param('ii', $yearlevel, $semester); // ?
        $query->execute();
        $result = $query->get_result();

        if($result->num_rows > 0){
            $rows = $result->fetch_assoc();
            array_push($subjects, [
                'name' => $rows['name'],
                'idnumber' => $rows['subid'],
                'proffesor' => $rows['username'] // username of the teacher
            ]);
        }

        return $subjects;
    }
}

class Students extends Users{
    public $course;

    public function __construct($fname, $mname, $lname, $course, $userid, $email, $password, $bdate, $gender, $homeaddress, $newStudent='None'){
        parent::__construct($fname, $lname, $mname, $userid, $email, $password, $homeaddress, $bdate, $gender);
        if($newStudent == 'None'){
            $this->username = $this->generateUsername($this->fname, $this->mname, $this->lname);
        } else {
            $this->username = $newStudent;
        }
        $this->course = $course;
    }

    public static function Modify($imageType, $image, $username){
        include 'db.inc.php';

        $query = $conn->prepare('UPDATE students SET imageLink=? WHERE username=?');
        $query->bind_param('ss', $image['link'], $username);
        
        if($query->execute()){
            $query->close();
            return true;
        }

        $query->close();
        return false;
    }

    public static function FullName($fname, $lname, $mname='n/a'){
        if($mname != 'n/a'){
            return ucwords($fname . ' ' . $mname[0] . '. ' . $lname);
        } return ucwords($fname . ' ' . $lname);
    }

    public static function Course($course): string{
        $course = strtolower($course);
        switch($course){
            case("bsit"):
                $course = "BS Information Technology";
                break;
            case("bsba"):
                $course = "BS Business Ad";
                break;
            case("bshm"):
                $course = "BS Hospitality Management";
                break;
            case("bspsych"):
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
            self::enrollStudent($this->username);
            $data = $this->prepareAccount(25);
            self::addAccount($data);

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

    public function prepareAccount($num_assessment=0): Array{
        $data = [
            "username" => $this->username,
            "assessment" => 16000,
            "balance" => 16000,
            "num_units" => $num_assessment,
            "schoolyear" => parent::getCurrentSchoolYear()
        ];

        return $data;
    }

    public static function getUsernamebyUserid($userid): ?string{ // nullable string
        include '../Model/db.inc.php';

        $query = $conn->prepare('SELECT * FROM students WHERE userid=?');
        $query->bind_param('s', $userid);
        $query->execute();

        $result = $query->get_result();

        if($result->num_rows > 0){
            $rows = $result->fetch_assoc();
            $username = $rows['username'];

            return $username;
        }

        return null;
    }

    public static function enrollStudent($username): bool{
        include '../Model/db.inc.php';

        $defaultLevel = 1;
        $defaultGPA = 0;
        $currentSY = parent::getCurrentSchoolYear();

        // return if no active School year
        if($currentSY === 'empty'){
            return false;
        }

        $enrollID = $currentSY . '_' . $username;

        // return if student is already enrolled
        if(self::checkEnrolledStudent($username)){
            return false;
        }

        $query = $conn->prepare('INSERT INTO Enrolled_Students (SSY_ID, S_ID, SY_ID, LEVEL, TOTAL_GPA) VALUES (?,?,?,?,?)');
        $query->bind_param('sssii', $enrollID, $username, $currentSY, $defaultLevel, $defaultGPA);
        
        if($query->execute()){ // execute query
            return true;
        }

        return false;
    }

    // add user's account in database
    public static function addAccount($data): bool{
        include '../Model/db.inc.php';

        // check if student is not null
        if(!$data['username']){
            return false;
        }

        $query = $conn->prepare('INSERT INTO account(student, assessment, balance, num_units, schoolyear) VALUES (?,?,?,?,?)');
        $query->bind_param('siiis', $data['username'], $data['assessment'], $data['balance'], $data['num_units'], $data['schoolyear']);
        
        if($query->execute()){
            return true;
        }

        return false;
    }

    // return true if student is already enrolled
    public static function checkEnrolledStudent($username): bool{
        include '../Model/db.inc.php';

        $stmt = $conn->prepare('SELECT 1 FROM Enrolled_Students WHERE S_ID=?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0){
            $stmt->close();
            return true;
        }

        $stmt->close();
        return false;
    }

    public static function getUser($username): array{  
        include 'db.inc.php';
        $data = [
            'fullname' => '',
            'imageLink' => ''
        ];

        $query = $conn->prepare('SELECT * FROM students WHERE username=?');
        $query->bind_param('s', $username);
        $query->execute();

        $result = $query->get_result();

        if($result->num_rows > 0){
            $rows = $result->fetch_assoc();
            $data['imageLink'] = $rows['imageLink'];
        }

        return $data;
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