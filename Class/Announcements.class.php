<?php

class Announcements{
    public $title;
    public $content;
    public $imagefile;
    public $author;
    public $response;
    public $addEvent;
    public $eventDate;

    public function __construct($title, $content, $author, $addEvent, $eventDate, $imagefile=false){
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->addEvent = $addEvent;
        $this->eventDate = $eventDate;
        $this->imagefile = $imagefile;
        $this->response = [
            "success" => false,
            "message" => "None"
        ];

    }

    // post the announcement or event
    public function postAnnouncement(){
        include '../Model/db.inc.php';

        if(!$this->verifyAuthor()){
            $this->response["success"] = false;
            $this->response['message'] = "Author not found";
            exit();
        }

        // get datetime
        $date = new DateTime();
        $datetime = $date->format('Y:m:d H:i:s');

        $postlink = $this->generateLink();
        if($this->imagefile !== 'false'){
            $uploadDir = '../Resources/uploads/';
            if(!is_dir($uploadDir)){
                mkdir($uploadDir, 0777, true);
            }

            $distination = $uploadDir . basename($this->imagefile);

            // move the upload file - wrong
            if(move_uploaded_file('C:/fakepath/', $distination)){
                $binary_image = addslashes(file_get_contents(htmlspecialchars($this->imagefile)));
                $stmt = $conn->prepare("INSERT INTO Announcement(title, content, addresslink, author, postDate, imagefile) VALUES (?,?,?,?,?,?)");
                $stmt->bind_param('ssssss', $this->title, $this->content, $postlink, $this->author, $datetime, $binary_image);
            }
        } else {
            $stmt = $conn->prepare("INSERT INTO Announcement(title, content, addresslink, author, postDate) VALUES (?,?,?,?,?)");
            $stmt->bind_param('sssss', $this->title, $this->content, $postlink, $this->author, $datetime);
        }

        if($stmt->execute()){
            if($this->addEvent == 'false'){
                $this->response["success"] = true;
                $this->response['message'] = "Posted";
            } else {
                $announcementID = $stmt->insert_id;
                $event_date = new DateTime($this->eventDate);
                $month_year = $event_date->format('F Y');
                $day = $event_date->format('j');
                $newStmt = $conn->prepare('INSERT INTO Events(month_year, day, announcement, event_date) VALUE (?,?,?,?)');
                $newStmt->bind_param('ssis', $month_year, $day, $announcementID, $this->eventDate);
                if($newStmt->execute()){
                    $this->response["success"] = true;
                    $this->response['message'] = "Posted with events";
                }
            }
        } else {
            $this->response["success"] = false;
            $this->response['message'] = "Database Error";
        }
    }

    // generating a unique link for a post
    private function generateLink(): string{
        // example: ?id=1&thread=11012024231102
        $date = new DateTime();
        $uniquepostid = $date->format('YmdHis');
        return $uniquepostid;
    }

    // check if author is authorized to create a post
    private function verifyAuthor(){
        include '../Model/db.inc.php';

        $stmt = $conn->prepare('SELECT 1 FROM admin WHERE username=?');
        $stmt->bind_param('s', $this->author);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0){
            $stmt->close();
            return true;
        }

        return false;
    }

    // create a comment to a post
    public static function createComment($username, $post_address, $comment, $db="../Model/db.inc.php"){
        include $db;

        if(!self::getPostIfExist($post_address)){
            return false;
        }

        $date = new DateTime();
        $getDate = $date->format('Y:m:d H:i:s');

        $post_id = self::getPostID($post_address);

        $stmt = $conn->prepare('INSERT INTO Comments(std_username, post_id, comment_content, comment_datetime) VALUES (?,?,?,?)');
        $stmt->bind_param('siss', $username, $post_id, $comment, $getDate);
        
        if($stmt->execute()){
            $stmt->close();
            return true;
        }
        
        $stmt->close();
        return false;
    }

    // like the post
    public static function likePost($username, $post_address, $db="../Model/db.inc.php"){
        include $db;
        session_start();

        if($_SESSION['usertype'] !== 'students'){
            return false;
        }

        if(!self::getPostIfExist($post_address)){
            return false;
        }

        $post_id = self::getPostID($post_address);

        $stmt = $conn->prepare('INSERT INTO Likes(std_username, post_id) VALUES (?,?)');
        $stmt->bind_param('si', $username, $post_id);
        
        if($stmt->execute()){
            $stmt->close();
            return true;
        }
        
        $stmt->close();
        return false;
    }

    public static function getPostID($post_address, $db="../Model/db.inc.php"){
        include $db;

        $stmt = $conn->prepare("SELECT * FROM Announcement WHERE addressLink=?");
        $stmt->bind_param('s', $post_address);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row['post_id'];
        }

        return "None";
    }

    // get if post exist in database
    public static function getPostIfExist($post_id, $db="../Model/db.inc.php"): bool{
        include $db;

        $stmt = $conn->prepare('SELECT 1 FROM Announcement WHERE post_id=? OR addressLink=?');
        $stmt->bind_param('is', $post_id, $post_id);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0){
            $stmt->close();
            return true;
        }

        $stmt->close();
        return false;
    }

    // return the number of likes in a post
    public static function getLikeCount($post_id, $db="Model/db.inc.php"){
        include $db;
    }

    // return the like icon
    private static function checkIfUserLiked($username, $post_link, $db="Model/db.inc.php"){
        include $db;
        session_start();

        if($_SESSION['usertype'] != 'students'){
            return false;
        }

        $post_id = self::getPostID($post_link, 'Model/db.inc.php');

        $stmt = $conn->prepare("SELECT * FROM Likes WHERE std_username=? AND post_id=?");
        $stmt->bind_param('si', $username, $post_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            return true;
        } 
        
        return false;
    }

    // get the list of comments
    public static function getCommentCount($post_id, $db="Model/db.inc.php"){
        include $db;
    }

    // get the latest post
    public static function getPost($db="Model/db.inc.php"){
        include $db;
        session_start();
        $username = $_SESSION['username'];

        $date = new DateTime();
        $datestamp = $date->format('Y:m:d H:i:s');
        $limit = 20;
        $orderbycolumn = 'datestamp';
        $result = $conn->query("SELECT * FROM Announcement ORDER BY post_id DESC LIMIT 20");

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $postDate = new DateTime($row['postDate']);
                echo '<div class="feed">
                    <div class="composer">
                        <div class="com-image">
                            <img src="Resources/assets/sbca.logo.5.jpg" alt="SBCA">
                        </div>
                        <div class="com-name">
                            <p class="com-name-p">St. Bernadette College of Alabang</p>
                            <p class="com-time-p">'. $postDate->format('F j, Y').' at ' . $postDate->format('h:iA') .'</p>
                        </div>
                    </div>
                    <div class="content-feed">
                        <h2>'.$row['title'].'</h2>
                        <p>'. $row['content'] .'</p>
                    </div>
                    <div class="reactions-feed">
                        ';
                // like button
                if(self::checkIfUserLiked($username, $row['addressLink'])){
                    echo '<div class="reaction react-like liked" id="like_'. $row['addressLink'] .'">
                            <i class="fa-solid fa-heart"></i>
                        </div>';
                } else {
                    echo '<div class="reaction react-like" id="like_'. $row['addressLink'] .'">
                            <i class="fa-regular fa-heart"></i>
                        </div>';
                }

                // comment and share button
                echo'<div class="reaction react-comment" id="comment_'. $row['addressLink'] .'">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <div class="reaction react-share" id="share_'. $row['addressLink'] .'">
                            <i class="fa-solid fa-share"></i>
                        </div>
                    </div>
                </div>';
            }
        }
    }
}