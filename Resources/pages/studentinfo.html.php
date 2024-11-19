<?php

if(isset($_POST['student_id'])){
    session_start(); // start session here

    $studenid = $_POST['student_id'];
    $userdata = getStudentInfo($studenid);
    $_SESSION['selected-user'] = $studenid; // add student id to selected user in session data
} else {
    exit();
}

function getStudentInfo($studentid): array{
    include('../../Model/db.inc.php');
    include('../../Model/usertable.inc.php');

    $userData = [];

    $query = $conn->prepare('SELECT * FROM students WHERE userid=?');
    $query->bind_param('s', $studentid);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $userData = [
            "fullname" => ucwords(Naming($row['fname'], $row['lname'], $row['mname'])),
            "userid" => $row['userid'],
            "username" => $row['username'],
            "email" => $row['email'],
            "phone" => "Empty",
            "course" => Coursename($row['course']),
            "semester" => "1st semester",
            "bdate" => formatDate($row['bdate']),
            "address" => $row['address']
        ];
    }

    $query->close();
    return $userData;
}

?>

<div class="header">
    <div class="headertitle">
        <p><?php echo $userdata['fullname']; ?></p>
    </div>
    <div class="exit" id="exit_stdinfo_popup">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
    </div>
</div>
<div class="tabbars">
    <div class="side other-label">
        <p><?php echo $userdata['course'] ?> 4 - Enrolled</p>
    </div>
    <div class="side action-button">
        <button id="enroll-student" value="<?php echo $userdata['username'] ?>">
            <i class="fa-solid fa-plus"></i>
            <p>Enroll</p>
        </button>
        <button id="edit_info-student" value="<?php echo $userdata['username'] ?>">
            <i class="fa-solid fa-pen-to-square"></i>
            <p>Edit Schedule</p>
        </button>
        <button id="deactivate-student" value="<?php echo $userdata['username'] ?>">
            <i class="fa-solid fa-user-minus"></i>
            <p>Deactivate</p>
        </button>
    </div>
</div>
<div class="info-student">
    <div class="side left">
        <div class="student-bio">
            <div class="user-bio-photo">
                <img src="https://i.pinimg.com/236x/69/03/ed/6903edcb7b58757f3628cf986ea1618d.jpg" alt="">
            </div>
            <div class="user-name">
                <p>Name:</p>
                <input type="text" placeholder="Full name" value="<?php echo $userdata['fullname']; ?>">
            </div>
            <div class="user-name">
                <p>ID:</p>
                <input type="text" placeholder="ID no." value="<?php echo $studenid; ?>">
            </div>
            <div class="user-name">
                <p>Email:</p>
                <input type="text" placeholder="Email" value="<?php echo $userdata['email']; ?>">
            </div>
            <div class="user-name">
                <p>Phone:</p>
                <input type="text" placeholder="Phone" value="<?php echo $userdata['phone']; ?>">
            </div>
            <div class="user-name">
                <p>Course:</p>
                <input type="text" placeholder="Course" value="<?php echo $userdata['course']; ?>" disabled>
            </div>
            <div class="user-name">
                <p>Semester:</p>
                <input type="number" placeholder="Semester" value="1" disabled>
            </div>
            <div class="user-name">
                <p>Birthdate:</p>
                <input type="text" placeholder="Birthdate" value="<?php echo $userdata['bdate']; ?>">
            </div>
            <div class="user-name">
                <p>Address:</p>
                <input type="text" placeholder="Address" value="<?php echo $userdata['address']; ?>">
            </div>

            <div class="actions">
                <button id="save-student-info-changes">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <p>Save</p>
                </button>
                <button id="clear-student-info-changes">
                    <i class="fa-solid fa-rotate-left"></i>
                    <p>Reset</p>
                </button>
            </div>
        </div>
        <div class="table-of-grade-in-semester">
            <p class="title">S.Y 2023-2024 1st semester</p>
            <p class="more-info">Date enrolled: Aug 24, 2023</p>
            <p class="more-info">Total GPA: 3.0</p>
            <p class="more-info">No. units: 25</p>
            <table class="display-table grade-table">
                <tr class="table-header">
                    <th class="table-header table-num">Grade</th>
                    <th class="table-header">Subject</th>
                    <th class="table-header table-id">Status</th>
                </tr>
                <tr class="table-user">
                    <td class="table-data">3.0</td>
                    <td class="table-data">Intro to programming</td>
                    <td class="table-data">Passed</td>
                </tr>
                <tr class="table-user">
                    <td class="table-data">3.0</td>
                    <td class="table-data">Intro to programming 2</td>
                    <td class="table-data">Passed</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="side right">
        <div class="account-info">
            <div class="item">
                <p>Total remaining balance</p>
                <p>10,000</p>
            </div>
            <div class="item">
                <p>Payment</p>
                <p>Monthly</p>
            </div>
        </div>
        <h3>Payment history</h3>
        <div class="payment-history">
            <h4>2023-2024 1st semester</h4>
            <div class="payment-info">
                <p class="date-payment">10/02/2023</p>
                <p class="amount-payment">5,000</p>
            </div>
            <div class="payment-info">
                <p class="date-payment">12/02/2023</p>
                <p class="amount-payment">5,500</p>
            </div>
        </div>

        <div class="payment-history">
            <h4>2023-2024 2nd semester</h4>
            <div class="payment-info">
                <p class="date-payment">10/02/2023</p>
                <p class="amount-payment">5,000</p>
            </div>
            <div class="payment-info">
                <p class="date-payment">12/02/2023</p>
                <p class="amount-payment">5,500</p>
            </div>
        </div>
    </div>
</div>

<script>
    // exit student info popup
    $('#exit_stdinfo_popup').click(function(){
        $.ajax({
            url: '../../Model/enroll_std.inc.php',
            type: 'POST',
            data: {
                remove_selected_user: true
            },
            success: function(response){
                document.getElementById('stdinfo_popup').classList.remove('showSemPopup');
            },
            error: function(xhr, status, error){
                console.error("AJAX Error: ", status, error);
            }
        });
    });

    $('#exit_std_enroll_popup').click(function(){
        document.getElementById('std_enroll_popup').classList.remove('showSemPopup');

    });

    // enroll the student
    $('#enroll-student').click(function(){
        var userid = $(this).attr('value');
        document.getElementById('std_enroll_popup').classList.add('showSemPopup');
    });

    // deactivate student
    $('#deactivate-student').click(function(){
        console.log($(this).attr('value'));

        $.ajax({
            url: '../../Model/semester.inc.php',
            type: 'POST',
            data: {
                deactivateUser: $(this).attr('value')
            },
            success: function(response){
                console.log(response.message);
            },
            error: function(){

            }
        });
    });

    // edit student's subjects
    $('#edit_info-student').click(function(){
        // clear tabs
        var options = document.getElementsByClassName('option');

        // clear tabs selected / active
        for(var i=0;i<options.length;i++){
            options[i].classList.remove("active");
        }

        // clear page
        document.getElementById('studentlistpage').classList.remove('viewpage');

        $.ajax({
            url: '../../Model/semester.inc.php',
            type: 'POST',
            data: {
                studentSched: true
            },
            success: function(response){
                if(response.success){
                    document.getElementById('username-link').textContent = response.data['username'];
                    document.getElementById('user-name-fullname').textContent = response.data['fullname'];
                    document.getElementById('user-name-course').textContent = response.data['course'];
                    document.getElementById('user-name-userid').textContent = response.data['userid'];
                }
            },
            error: function(){
                console.log('error');
            }
        });

        // show subject schedule page
        document.getElementById('editstudentsubjects').classList.add('viewpage');
    });
</script>