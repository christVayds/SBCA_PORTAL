<?php

/*
    sender
    receiver
    message content
    message subject
    datetime, not yet done
    important
*/

class Messages {
    public $res_username; // receiver username
    public $sen_username; // sender username
    public $message; // message content
    public $subject; // subject of the message
    public $datetime; // date and time where the message sent
    public $usertype; // students(students), faculty(teacher) or admin(sbca)

    public function __construct($res_username, $sen_username, $message, $subject, $datetime) {
        $this->res_username = $res_username;
        $this->sen_username = $sen_username;
        $this->message = $message;
        $this->subject = $subject;
        $this->datetime = $datetime;
        $this->usertype = 'students'; // receiver user's type, change it to teacher or sbca(admin), default value is students
    }

    // check if user receiver exist in database
    private function findUser(): bool{
        include '../Model/db.inc.php';
        
        // usertype is the name of the database table
        $userquery = "SELECT * FROM $this->usertype WHERE username=$this->res_username";
        $result = mysqli_query($conn, $userquery);

        // if the result is more than 0, then return true
        if(mysqli_num_rows($result) > 0){
			mysqli_close($conn); // close the mysql
			return true;
		}

        mysqli_close($conn);
        return false; // return false if user not exist
    }

    public function Send(): bool{
        include '../Model/db.inc.php';
        $n_user = 0; // default 0 = students (temporary)

        if(!$this->findUser()){
            // user not found
            return false; // return false if message not sent successfully
        }

        // temporary
        if($this->usertype == 'teachers'){
            $n_user = 1;
        } 
        else if($this->usertype == 'sbca'){
            $n_user = 2;
        } // if usertype is student, the $n_user value is 0, no changes
        
        // insert data to database Messages if user exist
        // res_type - 0 = students, 1 = faculty(teacher) or 2 = admin(sbca)
        $messageQuery = "INSERT INTO Messages(sender, receiver, res_type, datesend, messagebody, messagesubject) VALUES ('$this->sen_username', '$this->res_username', '$n_user', '$this->datetime', '$this->message', '$this->subject')";
        $result = mysqli_query($conn, $messageQuery);

        /// close the mysql
        mysqli_close($conn);
        return true;
    }
}