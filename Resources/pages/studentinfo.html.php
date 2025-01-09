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
    include('../../Class/Users.class.php');

    $userData = [];

    $query = $conn->prepare('SELECT * FROM students WHERE userid=?');
    $query->bind_param('s', $studentid);
    $query->execute();
    $result = $query->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $date = date_create($row['bdate']);
        $userData = [
            "fullname" => ucwords(Students::FullName($row['fname'], $row['lname'], $row['mname'])),
            "fname" => ucwords($row['fname']),
            "mname" => ucwords($row['mname']),
            "lname" => ucwords($row['lname']),
            "username" => $row['username'],
            "userid" => $row['userid'],
            "email" => $row['email'],
            "course" => Students::Course(substr($row['course'], 0, -1)),
            "yearLevel" => substr($row['course'],-1),
            "course-value" => substr($row['course'], 0, -1),
            "semester" => "1st semester",
            "bdate" => formatDate($row['bdate']),
            'input-bdate' => date_format($date, 'Y-m-d'),
            "address" => $row['address'],
            "user-image" => $row['imageLink']
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
        <h3><?php echo $userdata['course'] ?></h3>
    </div>
    <div class="side action-button">
        <button id="enroll-student" value="<?php echo $userdata['username'] ?>">
            <i class="fa-solid fa-plus"></i>
            <p>Enroll</p>
        </button>
        <button id="edit_info-student">
            <i class="fa-solid fa-pen-to-square"></i>
            <p>Edit Schedule</p>
        </button>
        <button id="deactivate-student">
            <i class="fa-solid fa-user-minus"></i>
            <p>Deactivate</p>
        </button>
    </div>
</div>
<div class="info-student">
    <div class="side left">
        <div class="student-bio">
            <div class="user-bio-photo">
                <img src="<?php if($userdata['user-image']){ echo $userdata['user-image']; } else { echo 'Resources/assets/default-profile-photo2.jpg'; } ?>" alt="">
            </div>
            <div class="user-name">
                <p>ID No.:</p>
                <input id="std-userid" type="text" placeholder="ID No." value="<?php echo $userdata['userid']; ?>">
            </div>
            <div class="user-name">
                <p>First Name:</p>
                <input id="std-fname" type="text" placeholder="First name" value="<?php echo $userdata['fname']; ?>">
            </div>
            <div class="user-name">
                <p>Middle Name:</p>
                <input id="std-mname" type="text" placeholder="Middle name" value="<?php echo $userdata['mname']; ?>">
            </div>
            <div class="user-name">
                <p>Last Name:</p>
                <input id="std-lname" type="text" placeholder="Last name" value="<?php echo $userdata['lname']; ?>">
            </div>
            <div class="user-name">
                <p>Email:</p>
                <input id="std-email" type="text" placeholder="Email" value="<?php echo $userdata['email']; ?>">
            </div>
            <div class="user-name">
                <p>Address:</p>
                <input id="std-address" type="text" placeholder="Address" value="<?php echo $userdata['address']; ?>">
            </div>
            <div class="user-name">
                <p>Birth date:</p>
                <input id="std-bdate" type="date" value="<?php echo $userdata['input-bdate']; ?>">
            </div>
            <div class="user-name">
                <p>Course:</p>
                <select name="std-course" id="std-select-course">
                    <option value="<?php echo $userdata['course-value']; ?>"> <?php echo $userdata['course'] ?></option>
                    <option value="bsit">BS in Information Technology</option>
                    <option value="bsba">BS in Business Ads</option>
                    <option value="bshm">BS in Hospitality Management</option>
                    <option value="bspsych">BS in Psychology</option>
                </select>
            </div>
            <div class="user-name">
                <p>Year:</p>
                <select name="std-yearLevel" id="std-select-yearLevel">
                    <option value="<?php echo $userdata['yearLevel']; ?>">Current Year Level</option>
                    <option value="1">1st year</option>
                    <option value="2">2nd year</option>
                    <option value="3">3rd year</option>
                    <option value="4">4th year</option>
                </select>
            </div>

            <div class="actions">
                <button id="save-student-info-changes">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <p>Save</p>
                </button>
            </div>
        </div>

        <!-- table of grades (all) -->
        <div class="table-of-grade-in-semester" id="table-of-grade-in-semester">
            <div class="table-item">
                <h3 class="title">S.Y 2023-2024 1st semester</h3>
                <p class="more-info">Date enrolled: Aug 24, 2023</p>
                <p class="more-info">Total GPA: 3.0</p>
                <p class="more-info">No. units: 25</p>

                <table class="display-table grade-table">
                    <thead class="table-header">
                        <th class="table-header table-num">Grade</th>
                        <th class="table-header">Subject</th>
                        <th class="table-header table-id">Status</th>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>
            </div>

            <div class="table-item">
                <h3 class="title">S.Y 2023-2024 1st semester</h3>
                <p class="more-info">Date enrolled: Aug 24, 2023</p>
                <p class="more-info">Total GPA: 3.0</p>
                <p class="more-info">No. units: 25</p>

                <table class="display-table grade-table">
                    <thead class="table-header">
                        <th class="table-header table-num">Grade</th>
                        <th class="table-header">Subject</th>
                        <th class="table-header table-id">Status</th>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- accounting table -->
    <div class="side right">
        <div class="account-info">
            <div class="item">
                <p>Remaining total balance</p>
                <p id="remainingBalance">Loading...</p>
            </div>
            <div class="item">
                <p>Total Assessments</p>
                <p id="totalAssessment">Loading...</p>
            </div>
            <div class="item">
                <p>Payments</p>
                <p>Monthly</p>
            </div>
        </div>
        <h3>All accounts balance:</h3>
        <div class="sem-balance-container" id="sem-balance-container">
            <div class="sem-balance">
                <h3>2024-2025 1st semester</h3>
                <p>Balance: <span id="semester-balance">2000</span></p>
            </div>
        </div>
    </div>
</div>

<script>

    // display tables of grades grouped by schoolyear
    function newtableOfGrades(data=[]){
        var group = document.getElementById('table-of-grade-in-semester');

        var newItem = document.createElement('div');
        newItem.className = 'table-item';

        var newheader = document.createElement('h3');
        newheader.className = 'title';
        newheader.textContent = "SY: " + data.SY;
        newItem.appendChild(newheader);

        const infos = {'GPA: ': data.totalGPA, 'Units: ': data.units};
        for(let key in infos){
            var newInfo = document.createElement('p');
            newInfo.className = 'more-info';
            newInfo.textContent = key + infos[key];
            newItem.appendChild(newInfo);
        }

        // create table here
        var newTable = document.createElement('table');
        newTable.className = 'display-table';
        var tableHeader = document.createElement('thead');
        tableHeader.className = 'table-row';
        const header = {'Grade': 'table-short', 'Subjects': 'table-name', 'Status': 'table-id'};
        for(let key in header){
            var newRow = document.createElement('th');
            newRow.classList.add('table-header', header[key]);
            newRow.textContent = key;
            tableHeader.appendChild(newRow);
        }

        var tbody = document.createElement('tbody');
        data.table.forEach(element => {
            newRow = document.createElement('tr');
            newRow.className='table-user';
            element.forEach(elem => {
                var newData = document.createElement('td');
                newData.className = 'table-data';
                newData.textContent = elem;
                newRow.appendChild(newData);
            })
            tbody.appendChild(newRow);
        });

        newTable.appendChild(tbody);
        newTable.appendChild(tableHeader);
        newItem.appendChild(newTable);

        group.appendChild(newItem);
    }

    // display student account balance by semester
    function newBalanceItem(data=[]){
        var container = document.getElementById('sem-balance-container');

        var newItem = document.createElement('div');
        newItem.className = 'sem-balance';

        var semester = document.createElement('h3');
        var balance = document.createElement('p');
        semester.textContent = data[1];
        balance.textContent = data[0];

        newItem.appendChild(semester);
        newItem.appendChild(balance);

        container.appendChild(newItem);
    }

    function fetchSemesterBalance(){
        $.ajax({
            url: '../Model/accounting.inc.php',
            type: 'POST',
            data: {
                GetAllSemesterBalance: true
            },
            success: function(response){
                $('#sem-balance-container div').remove();
                if(response.success){
                    console.log('good');
                    document.getElementById('remainingBalance').textContent = response.account.balance;
                    document.getElementById('totalAssessment').textContent = response.account.totalAssessment;
                    response.data.forEach(data => {
                        newBalanceItem(data);
                    });
                } else {
                    console.log('Error');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    // startup functions
    function fetchAllTableOfGrades(){
        $.ajax({
            url: '../Model/semester.inc.php',
            type: 'POST',
            data: {
                GetAllStudentGrades: true
            },
            success: function(response){
                if(response.success){
                    console.log(response.data);
                    $('#table-of-grade-in-semester div').remove();
                    response.data.forEach(data => {
                        newtableOfGrades(data);
                    });
                } else {
                    console.log(response.message);
                }
            },
            error: function(error){
                console.log(error)
            }
        });
    }

    // call fetch functions in startups
    fetchAllTableOfGrades();
    fetchSemesterBalance();

    // open popup message
    function openPopupMessage(message, header, icon=''){
        document.getElementById('global-mpopup').classList.add('showSemPopup');
        document.getElementById('popupmessage-header').textContent = header;
        document.getElementById('popupmessage').textContent = message;
        
        if(icon !== ''){
            document.getElementById('popupmessage-icon').className = icon;
        }
    }

    function displayStudentsSchedule(_day, data=[]){
        var listsubjects = document.getElementById('addsubj-list-subjects');

        var day = document.createElement('div');
        var dayicon = document.createElement('i');
        var dayname = document.createElement('h3');

        day.className = 'subj-day';
        dayicon.className = 'fa-regular fa-calendar';
        dayname.textContent = _day;

        // append day in day subj-day div
        day.appendChild(dayicon);
        day.appendChild(dayname);

        // append
        listsubjects.appendChild(day);
        // console.log(data.data);

        if(data.length > 0){
            data.forEach(schedule => {
                var subjectItem = document.createElement('div');
                var subjheader = document.createElement('div');
                var subjname = document.createElement('h4');
                subjectItem.className = 'subject-item';
                subjectItem.id = 'subjectItem'+schedule.at(2);
                subjheader.className = 'subj-header';
                subjname.textContent = schedule[0];

                var subjinfo = document.createElement('div');
                subjinfo.className = 'other-subj-info';
                var otherinfo = ['Teacher', 'Course', 'Yearl/Level', 'Time', 'Grade'];
                for(var i=0;i<5;i++){
                    var newp = document.createElement('p');
                    newp.textContent = otherinfo[i] + ': ' + schedule[i+1];

                    subjinfo.appendChild(newp);
                }
                // append
                subjectItem.appendChild(subjheader);
                subjheader.appendChild(subjname);
                subjectItem.appendChild(subjinfo);
                listsubjects.appendChild(subjectItem);
            });
        } else {
            var subjectItem = document.createElement('div');
            var subjheader = document.createElement('div');
            var subjname = document.createElement('p');
            subjectItem.className = 'subject-item';
            subjheader.className = 'subj-header empty';
            subjname.textContent = 'Empty';

            subjectItem.appendChild(subjheader);
            subjheader.appendChild(subjname);
            listsubjects.appendChild(subjectItem);
        }
    }

    // fetch student's subject in student's subjects page
    function fetchStudentSubjects(){
        $.ajax({
            url: '../../Model/schedules.inc.php',
            type: 'POST',
            data: {
                updateSubject: true
            },
            success: function(response){
                if(response.success){
                    console.log('username: ' + response.user);
                    $('#addsubj-list-subjects div').remove();
                    Object.entries(response.data).forEach(([day, data]) => {
                        displayStudentsSchedule(day, data);
                    });
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

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

    // enroll the student - show config
    $('#enroll-student').click(function(){
        console.log('here');
        // user ajax
        $.ajax({
            url: '../../Model/enroll_std.inc.php',
            type: 'POST',
            data: {
                enrollstudent: true
            },
            success: function(response){
                console.log('response ' + response.message);
                document.getElementById('stdinfo_popup').classList.remove('showSemPopup');

                if(response.success){
                    // fetch data
                    $.ajax({
                        url: '../../Model/semester.inc.php',
                        type: 'POST',
                        data: {
                            studentSched: true
                        },
                        success: function(response){
                            if(response.success){
                                // clear tabs
                                var options = document.getElementsByClassName('option');

                                // clear tabs selected / active
                                for(var i=0;i<options.length;i++){
                                    options[i].classList.remove("active");
                                }

                                // clear page
                                document.getElementById('studentlistpage').classList.remove('viewpage');
                                
                                document.getElementById('username-link').textContent = response.data['username'];
                                document.getElementById('user-name-fullname').textContent = response.data['fullname'];
                                document.getElementById('user-name-course').textContent = response.data['course'];
                                document.getElementById('user-name-userid').textContent = response.data['userid'];

                                // fetch schedule here
                                fetchStudentSubjects();

                                // navigate to editing subjects for enrolled student
                                clearDashboardPages();
                                document.getElementById('editstudentsubjects').classList.add('viewpage');
                                openPopupMessage('Student enrolled', 'Added');
                            }
                        },
                        error: function(){
                            openPopupMessage('Database error', 'Error');
                        }
                    });
                } else {
                    if(response.reason === 'not admin'){
                        openPopupMessage(response.message, 'Error');
                    } else {
                        document.getElementById('error-message').classList.add('showSemPopup');
                    }
                }
            },
            error: function(xhr, status, error){
                console.error("AJAX Error: ", status, error, xhr);
            }
        });
    });

    // deactivate student
    $('#deactivate-student').click(function(){

        $.ajax({
            url: '../../Model/semester.inc.php',
            type: 'POST',
            data: {
                deactivateUser: true,
                user: 'student'
            },
            success: function(response){
                if(response.success){
                    openPopupMessage(response.message, 'Deactivated');
                } else {
                    openPopupMessage(response.message, 'Error');
                }
            },
            error: function(){
                openPopupMessage('Error fetching data, please contact the administrator', 'Database error');
            }
        });
    });

    // edit student's subjects / schedule
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

                    fetchStudentSubjects();
                }
            },
            error: function(){
                console.log('error');
            }
        });

        // show subject schedule page
        document.getElementById('editstudentsubjects').classList.add('viewpage');
    });

    // save student info
    $('#save-student-info-changes').click(function(){
        const fname = document.getElementById('std-fname');
        const mname = document.getElementById('std-mname');
        const lname = document.getElementById('std-lname');
        const email = document.getElementById('std-email');
        const address = document.getElementById('std-address');
        const bdate = document.getElementById('std-bdate');
        const userid = document.getElementById('std-userid');

        const course = document.getElementById('std-select-course');
        const yearLevel = document.getElementById('std-select-yearLevel');
        const courseAndYearLevel = course.value + yearLevel.value;
        const user = 'student';

        // console.log([ fname.value, lname.value, mname.value, email.value, address.value, bdate.value, courseAndYearLevel ]);

        $.ajax({
            url: '../../Model/editprofile.inc.php',
            type: 'POST',
            data: {
                updateTeacherInfo: true,
                user: user,
                data: [ fname.value, lname.value, mname.value, email.value, address.value, bdate.value, courseAndYearLevel, userid.value ]
            },
            success: function(response){
                if(response.success){
                    openPopupMessage(response.message, 'Success');
                } else {
                    openPopupMessage(response.message, 'Error');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    })
</script>