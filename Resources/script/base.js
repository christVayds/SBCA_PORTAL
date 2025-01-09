// check for active or current page
var url = window.location.href;
var page = url.substring(url.lastIndexOf('/')+1);

if(sessionStorage.length == 0 || sessionStorage.getItem('mode') === null){
    sessionStorage.setItem('mode', 'white');
}

function calendar(month=12, year=2024){
    const firstDay = new Date(year, month -1, 1).getDay();
    const daysInMonth = new Date(year, month, 0).getDate();

    var calendar = [];

    for(let i=0;i<firstDay;i++){
        calendar.push('');
    }

    for(let day=1;day<=daysInMonth;day++){
        calendar.push(day);
    }

    while(calendar.length % 7 !== 0){
        calendar.push('');
    }

    return calendar;
}

function displayEvents(data=[]){
    const eventLists = document.getElementById('list-events-announcements');

    var newEvent = document.createElement('div');
    newEvent.className = 'events-tab';

    var label = document.createElement('h3');
    label.textContent = data[0];

    var aboutEvent = document.createElement('div');
    aboutEvent.className = 'num-events';

    var date = document.createElement('h1');
    date.textContent = data[1];

    var description = document.createElement('p');
    description.textContent = data[2];

    aboutEvent.appendChild(date);
    aboutEvent.appendChild(description);

    newEvent.appendChild(label);
    newEvent.appendChild(aboutEvent);

    eventLists.appendChild(newEvent);
}

function studentDashboardTable(data=[]){
    const table = document.getElementById('student-dashboard-table');
    const tbody = table.querySelector('tbody');

    var newRow = document.createElement('tr');
    newRow.className = 'table-user';

    for(var i=0;i<7;i++){
        var newData = document.createElement('td');
        newData.className = 'table-data';
        newData.textContent = data[i];
        newRow.appendChild(newData);
    }

    tbody.appendChild(newRow);
}

function teacherTableOfStudent(data=[]){
    const table = document.getElementById('t_display-studentTable');
    const tbody = table.querySelector('tbody');

    var newItem = document.createElement('tr');
    newItem.className = 'table-user';
    newItem.id = data[0];

    for(var i=1;i<=4;i++){
        var newData = document.createElement('td');
        newData.textContent = data[i];
        newData.className = 'table-data';

        newItem.appendChild(newData);
    }

    tbody.appendChild(newItem);
}

$(document).ready(function(){

    var selected_course = 'bsit'; // bsit by default
    var yearLevel = '1';

    function fetchStudentGrades(){
        $('#student-dashboard-table tbody tr').remove();

        $.ajax({
            url: '../../Model/semester.inc.php',
            type: 'POST',
            data: {
                updateStudentDashboard: true
            },
            success: function(response){
                if(response.success){
                    // console.log(response.semester);
                    // console.log(response.SY);
                    // console.log(response.yearLevel);
                    response.subjectGrades.forEach(data => {
                        studentDashboardTable(data);
                    });
                    document.getElementById('std_display_schoolyear').textContent = response.SY;
                    document.getElementById('std_display_yearLevel').textContent = response.yearLevel;
                    document.getElementById('student-grade').textContent = response.gpa;
                    document.getElementById('std_display_semester').textContent = response.semester;
                    document.getElementById('student-grade-semLevel').textContent = response.semester;
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    // functions to create elements
    function newItemList(data=[]){
        var table = document.getElementById('student-account-table');

        var tbody = table.querySelector('tbody');

        // new table row
        var newRow = document.createElement('tr');
        newRow.className = "table-row table-user useraccinlist";
        newRow.id = data.at(-1);

        // array of data
        // ['userid', 'fullname', 'course', 'total-tf', 'montly-payment', 'balance', 'num-units', 'username];

        // create a loop
        for(var i = 0; i < 7; i++){
            var newData = document.createElement('td');
            newData.className = 'table-data';
            newData.textContent = data[i];
            newRow.appendChild(newData);
        }

        tbody.appendChild(newRow);
    }

    // functions to fetch datas
    function fetchsemesterData(){
        $.ajax({
            url: '../../Model/semester.dashboard.inc.php',
            type: 'POST',
            data: {
                updateAdminDashboard: true
            },
            success: function(response){
                if(response.success){
                    document.getElementById('sem_num_enrolled').textContent = response.data[1];
                    document.getElementById('sem_num_students').textContent = response.data[0];
                    document.getElementById('sem_num_faculties').textContent = response.data[2];
                    document.getElementById('sem_num_courses').textContent = response.data[3];
                    document.getElementById('semester-year-level').textContent = response['schoolYear'];
                    document.getElementById('semester-num-level').textContent = response['semesterLevel'];
                }
            },
            error: function(){
                console.log('Error fetching data in semester info');
            }
        });
    }

    // fetch data in student's dashboard
    function studentDashboard(){
        $.ajax({
            url: '../../Model/editprofile.inc.php',
            type: 'POST',
            data: {
                updateStudentDashboard: true
            },
            success: function(response){
                if(response.success){
                    // console.log(response.data);
                    document.getElementById('std-image').src = response.data['imageLink'];
                    document.getElementById('std-name').textContent = response.data['fullname'];
                    document.getElementById('std-course').textContent = response.data['course'];
                }
            },
            error: function(){
                console.log('error');
            }
        });
    }

    // calendar
    function updateCalendar(date_data=[]){
        // update calendar

        var date = new Date();
        var month = date.toLocaleString('default', {month: 'long'});
        var year = date.getFullYear();
        document.getElementById('month_year_calendar').textContent = month + ' ' + year;

        var calendarTable = document.getElementById('calendar-table');
        var calDays = calendarTable.querySelector('tbody');

        $('#calendar_days tr').remove();

        var line = 0;
        for(var i=0;i<date_data.length/7;i++){
            var weeks = document.createElement('tr');
            for(var j=0;j<7;j++){
                var newDate = document.createElement('td');
                newDate.textContent = date_data[line];
                if(j==0){
                    newDate.className = 'sunday';
                } else {
                    newDate.className = 'day';
                }
                weeks.appendChild(newDate);
                line++;
            }
            calDays.appendChild(weeks);
        }
    }

    // fetch data in accounting (for student account)
    function fetchstdaccStudent(){
        $.ajax({
            url: '../Model/accounting.inc.php',
            type: 'POST',
            data: {
                displayStudentAccount: true
            },
            success: function(response){
                if(response.success){
                    document.getElementById('display_acc_std-name').textContent = response.std_info.fullname;
                    document.getElementById('display_acc_std-course').textContent = response.std_info.course;
                    document.getElementById('display_acc_stmt-month').textContent = response.std_info.dateYear;
                    document.getElementById('display_acc_std-balance').textContent = response.account_info.balance;
                    document.getElementById('display_acc_std-totalAssessment').textContent = response.account_info.assessment;
                    
                    // clear payments made
                    $('#display_acc_table_paymentsMade tbody tr').remove();
                    $('#display_acc_other-balance div').remove();

                    document.getElementById('display_acc_current-balance').textContent = response.account_info.balance;
                    document.getElementById('display_acc_std-fee-balance').textContent = response.account_info.balance;
                    document.getElementById('display_acc_std-fee-misc').textContent = response.account_info.miscFee;
                    document.getElementById('display_acc_std-fee-lab').textContent = response.account_info.labFee;
                    document.getElementById('display_acc_std-fee-total').textContent = response.account_info.totalFee;
                    document.getElementById('display-acc_get-balance-bySemester').textContent = response.account_info.totalBalance;

                    // display payments mades
                    response.data.forEach(data => {
                        const table = document.getElementById('display_acc_table_paymentsMade');
                        const tbody = table.querySelector('tbody');

                        var newRow = document.createElement('tr');
                        newRow.className = 'table-user';

                        for(var i=0;i<data.length;i++){
                            var newData = document.createElement('td');
                            newData.textContent = data[i];
                            newData.className = 'table-data';
                            newRow.appendChild(newData);
                        }

                        tbody.appendChild(newRow);
                    });

                    response.otherBalance.forEach(data => {
                        const container = document.getElementById('display_acc_other-balance');

                        var newData = document.createElement('div');
                        newData.className = 'item';

                        var newp = document.createElement('p');
                        newp.textContent = '[Balance] ' + data[0] + ': ' + data[1];

                        newData.appendChild(newp);
                        container.appendChild(newData);
                    });
                } else {
                    console.log('Bad');
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    // fetch data in accounting table (for admin only)
    function fetchstdaccAdmin(search='', course='bsit1'){
        $.ajax({
            url: '../../Model/accounting.inc.php',
            type: 'POST',
            data: {
                getListOfAcc: true,
                select_course: course,
                search: search
            },
            success: function(response){
                if(response.success){
                    // console.log(response.message);
                    document.getElementById('accounting-display-course').textContent = response['label']['course'];
                    document.getElementById('accounting-display-schoolyear').textContent = response['label']['schoolYear'];
                    document.getElementById('accounting-display-semesterLevel').textContent = response['label']['semesterLevel'];
                    response.data.forEach(data => {
                        newItemList(data);
                    });
                }
            },
            error: function(){
                console.log('error');
            }
        });
    }

    // fetch list of events in announcements
    function fetchEvents(){

        $.ajax({
            url: '../../Model/announcements.inc.php',
            type: 'POST',
            data: {
                fetchEventsInAnnouncements: true
            },
            success: function(response){
                if(response.success){
                    $('#list-events-announcements div').remove();
                    response.data.forEach(data => {
                        displayEvents(data);
                    });
                } else {
                    console.log(response.message);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    // fetch list of student by subjects in teacher's dashboard
    function fetchStudentBySubject(search=''){
        let subject = document.getElementById('t_select-subjects');
        let course = document.getElementById('t_select-course');
        let yearLevel = document.getElementById('t_select-yearLevel');
        let canWrite = document.getElementById('t_display-ifreadOnly');
        // console.log(course.value, yearLevel.value, subject.value);

        $('#t_display-studentTable tbody tr').remove();
        $.ajax({
            url: '../Model/schedules.inc.php',
            type: 'POST',
            data: {
                getStudentBySubject: subject.value,
                course: course.value,
                yearLevel: yearLevel.value,
                search: search
            },
            success: function(response){
                if(response.success){
                    // console.log(response.info.canWrite);
                    document.getElementById('t_displaySubject-name').textContent = response.info.subject_name;
                    document.getElementById('t_displaySubject-course').textContent = response.info.coursename;
                    document.getElementById('t_displaySubject-count').textContent = 'No. of students: ' + response.data.length;
                    document.getElementById('t_display_subjCode').textContent = response.info.code;
                    if(response.info.canWrite){
                        canWrite.textContent = 'Read/Write';
                    } else {
                        canWrite.textContent = 'Read-Only';
                    }
                    response.data.forEach(data => {
                        teacherTableOfStudent(data);
                    });
                } else {
                    console.log('error: ' + response.message);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    // update teachers course selector in teacher's page
    function updateTeacherSubjectSelector(course, yearLevel){
        const selector = document.getElementById('t_select-subjects');
        $.ajax({
            url: '../Model/schedules.inc.php',
            type: 'POST',
            data: {
                teacherSubjects: true,
                teacher: true,
                course: course,
                yearLevel: yearLevel,
            },
            success: function(response){
                $('#t_select-subjects option').remove();
                if(response.success){
                    // console.log(response.data);
                    response.data.forEach(data => {
                        var newOption = document.createElement('option');
                        newOption.value = data[0];
                        newOption.textContent = data[1];
                        selector.appendChild(newOption);
                    });
                } else {
                    console.log('error: ' + response.message);
                }
                var search = document.getElementById('t_page_searchStudents').value;
                fetchStudentBySubject(search);
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    // siwtch case for navigation page
    switch(page){
        case('dashboard.php'):
            const user = sessionStorage.getItem('user');
            switch(user){
                case('admin'):
                    fetchsemesterData();
                    break;
                case('student'):
                    fetchStudentGrades();
                    studentDashboard();
                    break;
                case('teacher'):
                    fetchStudentBySubject();
                    break;
                default:
                    console.log('user not found');
                    break;
            }
            document.getElementById('home-page').classList.add('active');
            break;
        case('accounting.php'):
            if(sessionStorage.getItem('user') == 'student'){
                // console.log('wala pa');
                fetchstdaccStudent();
            } else if(sessionStorage.getItem('user') == 'admin') {
                fetchstdaccAdmin();
            }
            document.getElementById('accounting-page').classList.add('active');
            break;
        case('announcements.php'):
            var cal = calendar();
            updateCalendar(cal);
            fetchEvents();
            document.getElementById('news-page').classList.add('active');
            // document.getElementById("icon_announce").classList.add('fa-solid');
            break;
        case('account.php'):
            document.getElementById('users-page').classList.add('active');
            // document.getElementById("icon_account").classList.add('fa-solid');
            break;
    }

    // on click navigation bar
    $('.nav-item').click(function(){
        console.log(this.id);
        switch(this.id){
            case('home-page'):
                window.location.href = 'dashboard.php';
                break;
            case('accounting-page'):
                window.location.href = 'accounting.php';
                break;
            case('news-page'):
                window.location.href = 'announcements.php';
                break;
            case('users-page'):
                window.location.href = 'account.php';
                break;
        }
    });

    $("#sbca").click(function(){
        console.log("life is short, so take a risk always or lose a chance.");
    });

    // on click on theme page
    // select theme
    $('.theme').click(function(){
        var mode = $(this).attr('id');
        var lastTheme = sessionStorage.getItem('mode');

        if(lastTheme){ // remove prev theme first
            document.documentElement.classList.remove(lastTheme);
        }

        if(mode !== 'normal'){
            document.documentElement.classList.add(mode);
            sessionStorage.setItem('mode', mode);
        } else {
            sessionStorage.setItem('mode', null);
        }
    });

    // search bar in accouting page (just put it there haha)
    $('#search-student-account-input').keyup(function(){
        var search_course = selected_course + yearLevel;
        
        // clear table
        $('#student-account-table tbody tr').remove();

        fetchstdaccAdmin(this.value, search_course);
        // console.log('search: ' + this.value);
    });

    // get selected year
    $('.accounting_user_selection').click(function(){
        yearLevel = $(this).attr('value');
        document.getElementById('accounting-selected_year').textContent = this.textContent;
        const search = document.getElementById('search-student-account-input').value;

        const search_course = selected_course + yearLevel;

        // clear table
        $('#student-account-table tbody tr').remove();
        fetchstdaccAdmin(search, search_course);
    });

    // get selected course
    $('.accounting_course_selection').click(function(){
        selected_course = $(this).attr('value');
        document.getElementById('accounting-selected_course').textContent = this.textContent;
        const search = document.getElementById('search-student-account-input').value;

        const search_course = selected_course + yearLevel;

        // change course label in header

        //clear table
        $('#student-account-table tbody tr').remove();
        fetchstdaccAdmin(search, search_course);
    });

    // refresh accounting page - admin
    $('#refresh-accounting-page').click(function(){
        var search_course = selected_course + yearLevel;
        var search = document.getElementById('search-student-account-input').value;

        // clear table
        $('#student-account-table tbody tr').remove();

        fetchstdaccAdmin(search, search_course);
    });

    // refresh list of students - teacher's page
    $('#t_refresh-listStudents').click(function(){
        var search = document.getElementById('t_page_searchStudents').value;
        fetchStudentBySubject(search);
    });

    // search student in list of student - teacher's page
    $('#t_page_searchStudents').keyup(function(){
        fetchStudentBySubject(this.value);
        // console.log(this.value);
    });

    // on select subject
    $('#t_select-subjects').on('change', function(){
        var search = document.getElementById('t_page_searchStudents').value;
        fetchStudentBySubject(search);
    });

    // select subject in teacher's dashboard
    $('#t_select-subject-action').click(function(){
        document.getElementById('teacher_page-popup').classList.add('showSemPopup');
        document.getElementById('select_subjects_list').classList.add('show');
        document.getElementById('input_grade_student').classList.remove('show');
        document.getElementById('t_popup-label').textContent = 'Select subject';

        const course = document.getElementById('t_select-course');
        const yearLevel = document.getElementById('t_select-yearLevel');
        updateTeacherSubjectSelector(course.value, yearLevel.value); 
    });

    // onchange of teacher's subject selector - year Level
    $('#t_select-yearLevel').on('change', function(){
        const course = document.getElementById('t_select-course');
        updateTeacherSubjectSelector(course.value, this.value);
        // fetchStudentBySubject(search);
    })

    // onchange of teacher's subject selector - course name
    $('#t_select-course').on('change', function(){
        const yearLevel = document.getElementById('t_select-yearLevel');
        var search = document.getElementById('t_page_searchStudents').value;
        updateTeacherSubjectSelector(this.value, yearLevel.value);
        fetchStudentBySubject(search);
    })

    function teacherPopUpMessage(message='', success=true){
        document.getElementById('teacher_page-popup').classList.add('showSemPopup');
        document.getElementById('t_open_popupmessage').classList.add('show');
        const icon = document.getElementById('t_popup_icon');
        const msg = document.getElementById('t_popup_message');

        icon.className = '';
        if(success){
            icon.classList.add('fa-solid', 'fa-check');
            document.getElementById('t_popup-label').textContent = 'Success';
        } else {
            document.getElementById('t_popup-label').textContent = 'Error';
            icon.classList.add('fa-solid', 'fa-xmark');
        }
        msg.textContent = message;
    }

    // submit student's grade from teacher (teacher's dashboard)
    $('#t_submit-grade').click(function(){
        const grade = document.getElementById('t_input-student-grade');
        const subject = document.getElementById('t_select-subjects');
        const search = document.getElementById('t_page_searchStudents').value;
        
        document.getElementById('teacher_page-popup').classList.remove('showSemPopup');
        document.getElementById('t_std-image').src = 'Resources/assets/default-profile-photo2.jpg';

        document.getElementById('input_grade_student').classList.remove('show');
        document.getElementById('t_open_popupmessage').classList.remove('show');
        document.getElementById('select_subjects_list').classList.remove('show');

        // console.log(grade.value);
        $.ajax({
            url: '../Model/semester.inc.php',
            type: 'POST',
            data: {
                updateStudentGrade: true,
                totalGrade: grade.value,
                subject: subject.value
            },
            success: function(response){
                if(response.success){
                    // console.log('success: ' + response.message);
                    teacherPopUpMessage(response.message, true);
                    fetchStudentBySubject(search);
                } else {
                    teacherPopUpMessage(response.message, false);
                    // console.log(response.message);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });
});