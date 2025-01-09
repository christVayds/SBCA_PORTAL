<?php

if(isset($_POST['addnewtask'])){
    header('Content-Type: application/json');
    include '../Model/db.inc.php';
    session_start();

    $response = [
        'success' => false,
        'message' => 'Failed to add new task'
    ];

    $username = $_SESSION['username'];
    $task = $_POST['addnewtask'];
    $check = 0;
    $active = 1;
    $query = $conn->prepare('INSERT INTO todo_admin(username, name, checked, active) VALUES (?,?,?,?)');
    $query->bind_param('ssii', $username, $task, $check, $active);

    if($query->execute()){
        $response['success'] = true;
        $response['message'] = 'added successfully';
    }

    echo json_encode($response);
}

// get all task
else if(isset($_POST['getAllTask'])){
    header('Content-Type: application/json');
    include '../Model/db.inc.php';
    session_start();

    $response = [
        'success' => false,
        'message' => 'Failed to get task',
        'data' => []
    ];

    $active = 1;
    $query = $conn->prepare('SELECT * FROM todo_admin WHERE username=? AND active=?');
    $query->bind_param('si', $_SESSION['username'], $active);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $response['success'] = true;
        while($rows = $result->fetch_assoc()){
            $newdata = [$rows['todoid'], $rows['name'], $rows['checked'], $rows['active']];
            array_push($response['data'], $newdata);
        }
    }
    echo json_encode($response);
}

// complete or remove task
else if(isset($_POST['modifyTask'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => false,
        'message' => 'Failed to do actions'
    ];

    if($_POST['modifyTask'] == 'complete'){
        $complete = 1;
        $task = substr($_POST['task'], 9);
        $task = explode('.', $task);
        if((int)$task[1] > 0){
            $complete = 0;
        }
        $query = $conn->prepare('UPDATE todo_admin SET checked=? WHERE todoid=?');
        $query->bind_param('ii', $complete, $task[0]);
    } else {
        $deactive = 0;
        $task = substr($_POST['task'], 7);
        $query = $conn->prepare('UPDATE todo_admin SET active=? WHERE todoid=?');
        $query->bind_param('ii', $deactive, $task);
    }

    if($query->execute()){
        $response['success'] = true;
    }

    echo json_encode($response);
}
?>