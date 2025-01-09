<?php

if(isset($_POST['getListOfAcc'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    if($_SESSION['usertype'] !== 'admin'){
        $response['success'] = false;
        echo json_encode($response);
        exit();
    }

    $select_course = $_POST['select_course']; // ex. bsit.1
    $search = '%'. $_POST['search'] . '%';
    $getschoolyear = Users::getCurrentSchoolYear();

    $response = [
        'success' => true,
        'message' => $_POST['search'],
        'label' => [
            'course' => Students::Course(strtoupper(substr($select_course, 0, -1))) . ' ' . substr($select_course, -1),
            'schoolYear' => substr($getschoolyear, 0, -2),
            'semesterLevel' => substr($getschoolyear, -1)
        ],
        'data' => []
    ];

    $query = $conn->prepare('SELECT account.*, students.* FROM account JOIN students ON account.student = students.username WHERE students.course=? AND CONCAT(fname, lname, mname, userid, username, course) LIKE ? AND account.schoolYear=? LIMIT 50');
    $query->bind_param('sss', $select_course, $search, $getschoolyear);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            $fullname = Students::FullName($rows['fname'], $rows['lname'], $rows['mname']);
            $course = strtoupper(substr($rows['course'], 0, -1));

            $newData = [$rows['userid'], $fullname, $course, $rows['assessment'], 'Monthly', $rows['balance'], $rows['num_units'], $rows['username']];
            array_push($response['data'], $newData);
        }
    }


    echo json_encode($response);
} else if(isset($_POST['updateAccount'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    $response = [
        'success' => true,
        'message' => '',
        'data' => [
            'balance' => 6000,
            'total_assessment' => 16000,
            'name' => 'no-name',
            'course' => 'no-course',
            'userid' => 'no-id',
            'profile-image' => 'https://i.pinimg.com/236x/21/c3/b6/21c3b6d7642f3c4faa724eed2ff6a05a.jpg',
            'semester_level' => 'null'
        ]
    ];

    $schoolYear = Users::getCurrentSchoolYear();

    $query = $conn->prepare("SELECT account.*, students.*, SchoolYear.* FROM account JOIN students ON account.student=students.username JOIN SchoolYear ON account.schoolyear=SchoolYear.SY_ID WHERE students.username=? AND account.schoolYear=?");
    $query->bind_param('ss', $_POST['updateAccount'], $schoolYear);
    $query->execute();

    $result = $query->get_result();

    if($result->num_rows > 0){
        $rows = $result->fetch_assoc();
        $response['data']['name'] = Students::FullName($rows['fname'], $rows['lname'], $rows['mname']);
        $response['data']['course'] = Students::Course(substr($rows['course'], 0, -1));
        $response['data']['userid'] = $rows['userid'];
        if($rows['imageLink'] !== null){
            $response['data']['profile-image'] = $rows['imageLink'];
        }
        $response['data']['balance'] = $rows['balance'];
        $response['data']['total_assessment'] = $rows['assessment'];
        $response['data']['semester_level'] = $rows['SY_ID'];
    }

    echo json_encode($response);
} 
// get list of account SY where student is enrolled
else if(isset($_POST['getStudentEnrolled'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';

    $response = [
        'success' => false,
        'message' => 'Student not found',
        'data' => []
    ];

    $query = $conn->prepare('SELECT * FROM account WHERE student=?');
    $query->bind_param('s', $_POST['getStudentEnrolled']);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $response['success'] = true;
        $response['message'] = 'Loaded';
        while($rows = $result->fetch_assoc()){
            $semester = explode('_', $rows['schoolyear']);
            $name = $semester[0] . ' ' . semesterFormat($semester[1]);
            $newData = [$name, $rows['b_id']];
            array_push($response['data'], $newData);
        }
    }

    echo json_encode($response);
}
// update student payment account
else if(isset($_POST['studentPayment'])){
    header('Content-Type: application/json');
    include 'db.inc.php';
    include '../Class/Users.class.php';
    session_start();

    $response = [
        'success' => false,
        'message' => 'Failed to save changes, please try again'
    ];

    // ech for role of admin
    if($_SESSION['role'] == 'registration'){
        echo json_encode($response);
        exit();
    }

    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $method = $_POST['method'];
    $notes = $_POST['note'];
    $payment_account = $_POST['payment_account']; // acc of student

    $query = $conn->prepare('INSERT INTO Payments(amount, paymentDate, notes, payment_account, method) VALUE (?,?,?,?,?)');
    $query->bind_param('issss', $amount, $date, $notes, $payment_account, $method);
    
    if($query->execute()){
        if(updateAccountBalance($payment_account, $amount)){
            $response['success'] = true;
            $response['message'] = 'Account payment saved!';
        }
    }

    echo json_encode($response);
}

// get list of payments of student
else if(isset($_POST['fetchStdPaymentMade'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    include 'db.inc.php';
    session_start();

    $username = $_POST['username'];

    $response = [
        'success' => false,
        'message' => 'Empty',
        'data' => []
    ];

    $query = $conn->prepare('SELECT p.*, a.* FROM Payments p JOIN account a ON p.payment_account=a.b_id WHERE a.student=?');
    $query->bind_param('s', $username);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $response['success'] = true;
        $response['message'] = 'Success'; 
        while($rows = $result->fetch_assoc()){
            $date = date_create($rows['paymentDate']);
            $schoolYear = explode( '_', $rows['schoolyear']);
            $schoolYear = $schoolYear[0] . ' ' . semesterFormat($schoolYear[1]);
            $newData = [$date->format('M d, Y'), $schoolYear, $rows['amount'], $rows['balance'], $rows['method'], $rows['notes']];
            array_push($response['data'], $newData);
        }
    }

    echo json_encode($response);
}

// get all students balance each semester to student info in registrar
else if(isset($_POST['GetAllSemesterBalance'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => false,
        'message' => '',
        'account' => [
            'balance' => 0,
            'totalAssessment' => 0
        ],
        'data' => []
    ];

    $username = Students::getUsernamebyUserid($_SESSION['selected-user']);
    $currentSY = Users::getCurrentSchoolYear();

    $query = $conn->prepare('SELECT * FROM account WHERE student=?');
    $query->bind_param('s', $username);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $response['success'] = true;
        while($rows = $result->fetch_assoc()){
            if($currentSY === $rows['schoolyear']){
                $response['account']['balance'] = $rows['balance'];
                $response['account']['totalAssessment'] = $rows['assessment'];
            }
            $newData = [$rows['balance'], nameSchoolYear($rows['schoolyear'])];
            array_push($response['data'], $newData);
        }
    } else {
        $response['message'] = 'Empty';
    }

    echo json_encode($response);
}

else if(isset($_POST['displayStudentAccount'])){
    header('Content-Type: application/json');
    include '../Class/Users.class.php';
    include 'db.inc.php';
    session_start();

    $response = [
        'success' => true,
        'message' => '',
        'data' => [],
        'otherBalance' => [],
        'std_info' => [
            'fullname' => $_SESSION['fullname'],
            'course' => $_SESSION['full-course'],
            'dateYear' => strtoupper(date('F Y'))
        ],
        'account_info' => [
            'balance' => '',
            'assessment' => '',
            'payment_account' => '',
            'totalBalance' => 0
        ]
    ];

    $username = $_SESSION['username'];
    $SchoolYear = Users::getCurrentSchoolYear();

    // get students account info
    $query = $conn->prepare('SELECT * FROM account WHERE student=? AND schoolyear=?');
    $query->bind_param('ss', $username, $SchoolYear);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $rows = $result->fetch_assoc();
        $response['account_info'] = [
            'balance' => $rows['balance'],
            'assessment' => $rows['assessment'],
            'payment_account' => $rows['b_id'],
            'miscFee' => $rows['misc_fee'],
            'labFee' => $rows['lab_fee'],
            'totalFee' => (int)$rows['balance'] + (int)$rows['misc_fee'] + (int)$rows['lab_fee']
        ];
    }

    // get student's account payment mades

    $query = $conn->prepare('SELECT acc.schoolyear, payment.amount, payment.paymentDate, payment.method FROM Payments payment JOIN account acc ON payment.payment_account=acc.b_id WHERE payment.payment_account=?');
    $query->bind_param('i', $response['account_info']['payment_account']);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            $date = date_create($rows['paymentDate']);
            $date = $date->format('m/d/Y');
            $newdata = [$date, nameSchoolYear($rows['schoolyear']), $rows['amount'], $rows['method']];
            array_push($response['data'], $newdata);
        }
    }

    $query = $conn->prepare('SELECT schoolyear, balance FROM account WHERE student=?');
    $query->bind_param('s', $username);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            $newData = [nameSchoolYear($rows['schoolyear']), $rows['balance']];
            $response['account_info']['totalBalance'] += (int)$rows['balance'];
            array_push($response['otherBalance'], $newData);
        }
    }

    echo json_encode($response);
}

function semesterFormat($semester){
    switch($semester){
        case(1):
            return '1st';
        case(2):
            return '2nd';
        default:
            return 'None';
    }
}

function nameSchoolYear($schoolyear): string{
    $choolYear = explode('_', $schoolyear);

    switch($choolYear[1]){
        case(1):
            $schoolYear[1] = '1st';
            break;
        case(2):
            $choolYear[1] = '2nd';
            break;
        default:
            $choolyear[1] = 'unknown';
            break;
    }
    return $choolYear[0] . ' ' . $choolYear[1] . ' semester';
}

function getStudentAccountBalance($account): int{
    include 'db.inc.php';
    $returnBalance = 0;

    // changed
    $query = $conn->prepare('SELECT balance FROM account WHERE b_id=?');
    $query->bind_param('i', $account);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $rows = $result->fetch_assoc();
        $returnBalance = $rows['balance'];
    }

    return $returnBalance;
}

function updateAccountBalance($account, $amount): bool{
    include 'db.inc.php';

    $balance = getStudentAccountBalance($account);
    if($balance > $amount){
        $balance = $balance - $amount;
    } else {
        return false;
    }

    $query = $conn->prepare('UPDATE account SET balance=? WHERE b_id=?');
    $query->bind_param('ii', $balance, $account);
    if($query->execute()){
        return true;
    }

    return false;

}