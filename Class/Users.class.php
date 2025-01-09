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

    public static function getCurrentSchoolYear($getSem=false) {
        include '../Model/db.inc.php';

        $ActiveValue = 1;
        $query = $conn->prepare('SELECT * FROM SchoolYear WHERE CURRENT=?');
        $query->bind_param('i', $ActiveValue);
        $query->execute();
        $result = $query->get_result();

        if($result->num_rows > 0){
            $rows = $result->fetch_assoc();
            if($getSem){
                return $rows['semester'];
            }
            return $rows['SY_ID'];
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
    public $newStudent;

    public function __construct($fname, $mname, $lname, $course, $userid, $email, $password, $bdate, $gender, $homeaddress, $newStudent='None'){
        parent::__construct($fname, $lname, $mname, $userid, $email, $password, $homeaddress, $bdate, $gender);
        
        // if new student, generate new username
        if($newStudent == 'None'){
            $this->username = $this->generateUsername($this->fname, $this->mname, $this->lname);
        } else {
            $this->username = $newStudent; // else use username
        }
        $this->newStudent = $newStudent;
        $this->course = $course;
    }

    public static function Modify($imageType, $image, $bdate, $adddress, $username){
        include 'db.inc.php';
        session_start();

        $date = new DateTime($bdate);
        $newBdate = $date->format('Y-m-d H:i:s');

        $query = $conn->prepare('UPDATE students SET imageLink=?, address=?, bdate=? WHERE username=?');
        $query->bind_param('ssss', $image['link'], $adddress, $newBdate, $username);
        
        if($query->execute()){
            $_SESSION['imageLink'] = $image['link'];
            $_SESSION['address'] = $adddress;
            $_SESSION['bdate'] = $bdate;
            $query->close();
            return true;
        }

        $query->close();
        return false;
    }

    public static function FullName($fname, $lname, $mname='n/a'){
        if(strtolower($mname) != 'n/a'){
            return ucwords($fname . ' ' . $mname[0] . '. ' . $lname);
        } return ucwords($fname . ' ' . $lname);
    }

    public static function Course($course): string{
        $course = strtolower($course);
        switch($course){
            case("bsit"):
                $course = "BS in Information Technology";
                break;
            case("bsba"):
                $course = "BS in Business Ad";
                break;
            case("bshm"):
                $course = "BS in Hospitality Management";
                break;
            case("bspsych"):
                $course = "BS in Psychology";
                break;
            case('bsse'):
                $course = "BS in Secondary Education";
                break;
            case('bsee'):
                $course = "BS in Elementary Education";
                break;
            case('bsed'):
                $course = "BS in Elementary Education";
                break;
            case('bse'):
                $course = "BS in Entrepreneurship";
                break;
            default:
                $course = ucwords($course);
                break;
        };
    
        return $course;
    }

    public function save(): bool{
        include 'db.inc.php';

		if(parent::checkEmail($this->email) == false){
			$pwdHashed = parent::hashPassword($this->password);
			$newStudent = "INSERT INTO students (username, fname, lname, mname, email, userid, course, _password, bdate, address, gender, active) VALUES ('$this->username', '$this->fname', '$this->lname', '$this->mname', '$this->email', '$this->userid', '$this->course', '$pwdHashed', '$this->bdate', '$this->homeaddress', '$this->gender', 1)";
			$result = mysqli_query($conn, $newStudent);
            self::enrollStudent($this->username, $this->newStudent);
            // $data = self::prepareAccount($this->username);
            // self::addAccount($data);

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

    public static function prepareAccount($username): Array{
        $amount_assessment = 16000; // fix this later
        $num_units = 25;

        $data = [
            "username" => $username,
            "assessment" => $amount_assessment,
            "balance" => $amount_assessment,
            "num_units" => $num_units,
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

    static public function getStudentCourse($username): array|bool{
        include '../Model/db.inc.php';

        $query = $conn->prepare('SELECT course FROM students WHERE username=?');
        $query->bind_param('s', $username);
        $query->execute();
        $result = $query->get_result();

        if($result->num_rows > 0){
            $rows = $result->fetch_assoc();
            $course = substr($rows['course'], 0, -1); // course: bsit
            $year = substr($rows['course'], -1); // year: 1
            return [$course, $year];
        } 
        
        return false;
    }

    private static function updateCourse($username, $course){
        include '../Model/db.inc.php';

        if((int)$course[1] < 5){
            $year = (int)$course[1] + 1;
            $newCourse = $course[0] . $year;
        } else {
            return false;
        }

        $query = $conn->prepare('UPDATE students SET course=? WHERE username=?');
        $query->bind_param('ss', $newCourse, $username);
        if($query->execute()){
            return $course;
        }

        return false;
    }

    // enrolle the student here
    public static function enrollStudent($username, $newStudent){
        include '../Model/db.inc.php';

        // default gpa for new enrolled students
        $defaultGPA = 0;
        $currentSY = parent::getCurrentSchoolYear(); // get the current schoolyear (2024-2025_1)

        // return if no active School year
        if($currentSY == 'empty'){
            return false;
        }

        $enrollID = $currentSY . '_' . $username;

        // return if student is already enrolled
        if(self::checkEnrolledStudent($username)){
            return false;
        }

        $query = $conn->prepare('INSERT INTO Enrolled_Students (SSY_ID, S_ID, SY_ID, TOTAL_GPA) VALUES (?,?,?,?)');
        $query->bind_param('sssi', $enrollID, $username, $currentSY, $defaultGPA);
        
        if($query->execute()){ // execute query

            // update course
            if($newStudent != 'None'){ // if none: new student, else: old student
                $student_course = self::getStudentCourse($username);
                if(!self::updateCourse($username, $student_course)){
                    return false;
                }
            }

            // update account
            $accountData = self::prepareAccount($username);
            if(!self::addAccount($accountData)){
                return false; // if adding account fails, return false
            }

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

        $currentSY = parent::getCurrentSchoolYear();

        // check if student is enrolled in new semester or schoolyear
        $stmt = $conn->prepare('SELECT 1 FROM Enrolled_Students WHERE S_ID=? AND SY_ID=?');
        $stmt->bind_param('ss', $username, $currentSY);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0){
            $stmt->close();
            return true;
        }

        $stmt->close();
        return false;
    }

    // get user with image
    public static function getUser($username): array{  
        include 'db.inc.php';
        $data = [
            'fullname' => '',
            'imageLink' => '',
            'user' => 'Student',
            'course' => ''
        ];

        $query = $conn->prepare('SELECT * FROM students WHERE username=?');
        $query->bind_param('s', $username);
        $query->execute();

        $result = $query->get_result();

        if($result->num_rows > 0){
            $rows = $result->fetch_assoc();
            $data['fullname'] = self::FullName($rows['fname'], $rows['lname'], $rows['mname']);
            $data['imageLink'] = $rows['imageLink'];
            $data['course'] = self::Course(substr($rows['course'], 0, -1));
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
            $newUser = "INSERT INTO teachers (username, fname, lname, mname, email, userid, _password, bdate, address, gender, active) VALUES ('$this->username', '$this->fname', '$this->lname', '$this->mname', '$this->email', '$this->userid', '$pwdHashed', '$this->bdate', '$this->homeaddress', '$this->gender', 1);";
            $result = mysqli_query($conn, $newUser);
			return true;
        }

        mysqli_close($conn);
		return false;
    }

    public static function getUsernamebyUserid($userid): ?string{ // nullable string
        include '../Model/db.inc.php';

        $query = $conn->prepare('SELECT * FROM teachers WHERE userid=?');
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
}