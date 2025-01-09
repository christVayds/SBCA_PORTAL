<?php

if(isset($_POST['postAnnouncement'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Announcements.class.php';
    session_start();

    if($_SESSION['role'] == 'accounting'){
        $response = [
            'success' => false,
            'message' => 'Restricted, cant post announcement'
        ];
        echo json_encode($response);
        exit();
    }
    
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imagefile = $_POST['imagefile'];
    $author = $_SESSION['username']; // admin username
    $addEvent = $_POST['addEvent'];
    $eventDate = $_POST['eventDate'];

    $announcement = new Announcements($title, $content, $author, $addEvent, $eventDate, $imagefile);
    $announcement->postAnnouncement();

    echo json_encode($announcement->response);
} else if(isset($_POST['like_post'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Announcements.class.php';
    session_start();

    $post_address = $_POST['post_address'];
    $username = $_SESSION['username'];

    $response = [
        'success' => true,
        'message' => 'you liked this post'
    ];

    if(!Announcements::likePost($username, $post_address)){
        $response['success'] = false;
        $response['message'] = 'Invalid, cannot like this post';
    }

    echo json_encode($response);
} else if($_POST['input_comment']){ // post a comment
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Announcements.class.php';
    session_start();

    // check if user is a student * only student can comment to admin's post
    if($_SESSION['usertype'] !== 'students'){
        return false;
    }

    $username = $_SESSION['username'];
    $comment = $_POST['comment'];
    $post_address = $_POST['post_address'];

    $response = [
        "success" => true,
        "message" => "commented"
    ];

    if(!Announcements::createComment($username, $post_address, $comment)){
        $response['success'] = false;
        $response['message'] = 'unsuccessful, comment failed to post';
    }

    echo json_encode($response);
} else if($_POST['view_comments']){
    header('Content-Type: application/json');
    include 'db.inc.php';
    session_start();

    getCommentFromPost($_POST['post_address'], $_SESSION['username']);
}

// fetch events
else if(isset($_POST['fetchEventsInAnnouncements'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => false,
        'message' => 'Database error: Events not found',
        'data' => []
    ];

    $limit = 4;
    $query = $conn->prepare('SELECT Events.*, Announcement.* FROM Events JOIN Announcement ON Events.announcement = Announcement.post_id ORDER BY event_date DESC LIMIT ?');
    $query->bind_param('i', $limit);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $response['success'] = true;
        while($rows = $result->fetch_assoc()){
            $newData = [$rows['month_year'], $rows['day'], ucwords($rows['title'])];
            array_push($response['data'], $newData);
        }
    }

    echo json_encode($response);
}

function getCommentFromPost($post_address, $std_username){
    include 'db.inc.php';
    include '../Class/Announcements.class.php';
    include '../Class/Users.class.php';

    $post_id = Announcements::getPostID($post_address);
    $stmt = $conn->prepare('SELECT students.*, Comments.* FROM Comments JOIN students ON Comments.std_username = students.username WHERE post_id=?');
    $stmt->bind_param('i', $post_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            echo '<div class="user-comment">
                    <div class="user-comment-header">
                        <div class="user-image">
                            <img src="'. $rows['imageLink'] .'" alt="user-profile">
                        </div>
                        <div class="user-info">
                            <a href="#" class="name">'. Students::FullName($rows['fname'], $rows['lname'], $rows['mname']) .'</a>
                            <p class="time">'. $rows['comment_datetime'] .'</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        <p>'. $rows['comment_content'] .'</p>
                    </div>
                </div>';
        }
    }
}