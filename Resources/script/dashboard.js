// tab bar

// gender checkbox - only 1 checkbox can be selected
function checkbox(id){
    for(var i = 1; i <= 2; i++){
        var gender = "gender" + i;
        document.getElementById(gender).checked = false;
    }
    document.getElementById(id).checked = true;
}

// save user
// document.getElementById("save_student").addEventListener("click", () =>{
//     document.getElementById("newstudentform").submit();
// });

// function to check email
function checkEmail(email){
    var emailRegex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;
    if(emailRegex.test(email)){
        return true;
    }
    return false;
}

// function to check all input in not empty
function checkEmptyInput(formID, courseSelector, address, toAdd='students'){
    var form = document.getElementById(formID);
    var emptyInput = [];

    var inputs = form.getElementsByTagName('input');
    for(var i = 0; i < inputs.length; i++){
        if(inputs[i].value.trim() === ''){
            emptyInput.push(inputs[i].id);
        }
    }
    var course = document.getElementById(courseSelector).textContent;
    if(course === '' || course === "Select Course"){
        if(toAdd == 'students'){ // only check the course if user is students
            emptyInput.push(courseSelector);
        }
    }
    var addr = document.getElementById(address);
    if(addr.value === ''){
        emptyInput.push(addr.id);
    }

    return emptyInput;
}

function clearDashboardPages(user='admin'){
    var pages = document.getElementsByClassName('workcard');

    // close / remove all active pages
    for(var i=0;i<pages.length;i++){
        pages[i].classList.remove('viewpage');
    }

    // check user before clearing all tabs
    if(user === 'admin'){
        var options = document.getElementsByClassName('option');

        // clear tabs selected / active
        for(var i=0;i<options.length;i++){
            options[i].classList.remove("active");
        }
    } else {
        // this is for faculty or teachers
        var t_options = document.getElementsByClassName('t_option');

        // clear tabes selected / active
        for(var i=0;i<t_options.length;i++){
            t_options[i].classList.remove('active');
        }
    }
}

// create schedule of subjects table here
function subjectTable(data=[], table='schedule-table-view'){
    var table = document.getElementById(table);
    var tbody = table.querySelector('tbody');

    var newRow = document.createElement('tr');
    newRow.className = 'table-user';
    newRow.id = 'subject-schedule_id_no'+data.at(-1);

    for(var i = 0; i < 7; i++){
        var newData = document.createElement('td');
        newData.className = 'table-data';
        newData.textContent = data[i];
        newRow.appendChild(newData);
    }

    tbody.appendChild(newRow);
}

function studentTable(usertable, data=[], enrolledstd=false, idname=''){
    // console.log(usertable);
    var table = document.getElementById(usertable);
    var tbody = table.querySelector('tbody');

    var newRow = document.createElement('tr');
    newRow.className = 'table-user';
    if(enrolledstd){
        newRow.classList.add('enrolled_std');
    }
    newRow.id = idname + data[0];

    for(var i=0;i<data.length;i++){
        var newData = document.createElement('td');
        newData.textContent = data[i];
        newData.className = 'table-data';
        newRow.appendChild(newData);
    }

    tbody.appendChild(newRow);
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

function displayToAppendSchedule(data=[], tablename='addsubject-showsubject', idCode=false){
    var subjcontainer = document.getElementById(tablename);

    var subjItem = document.createElement('div');
    subjItem.className = 'addsubject-subjectitem';

    if(idCode){
        subjItem.id = 'subject_item_no' + data[2].toLowerCase();
    }else{
        subjItem.id = 'subject_item_no' + data.at(-1);
    }

    var namesubject = document.createElement('h4');
    var codeSubject = document.createElement('p');
    var teacher = document.createElement('p');
    namesubject.textContent = data[3];
    codeSubject.textContent = data[2];
    teacher.textContent = data.at(-2);
    
    subjItem.appendChild(namesubject);
    subjItem.appendChild(codeSubject);
    subjItem.appendChild(teacher);
    subjcontainer.appendChild(subjItem);
}

// open popup message
function openPopupMessage(message, header, icon=''){
    document.getElementById('global-mpopup').classList.add('showSemPopup');
    document.getElementById('popupmessage-header').textContent = header;
    document.getElementById('popupmessage').textContent = message;
    
    if(icon !== ''){
        document.getElementById('popupmessage-icon').className = icon;
    }
}

function displayTask(data=[]){
    const task = document.getElementById('load-tasks');

    var newTask = document.createElement('div');
    newTask.className = 'taskitem';
    newTask.id = 'taskItem-' + data[0] + '.' + data[2];
    if(data[2] > 0){
        newTask.classList.add('done');
    }

    var name = document.createElement('p');
    var delbtn = document.createElement('i');
    name.textContent = data[1];
    delbtn.classList.add('fa-solid', 'fa-trash');
    delbtn.id = 'remove-' + data[0];

    newTask.appendChild(name);
    newTask.appendChild(delbtn);

    task.appendChild(newTask);
}

// JQUERY
$(document).ready(function(){
    var addUser = 'students'; // teporary, checking what type of user to add in database
    var selectedStudent_Subject = '';
    var addEvent = false;

    // functions for fetching data

    // fetch student's subject in student's subjects page
    function fetchStudentSubjects(student=''){
        $.ajax({
            url: '../../Model/schedules.inc.php',
            type: 'POST',
            data: {
                updateSubject: true,
                student: student
            },
            success: function(response){
                if(response.success){
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

    // fetch subject schedules
    function fetchSchedules(course, yearLevel, user='admin'){
        const show = course + yearLevel;
        $.ajax({
            url: '../../Model/schedules.inc.php',
            type: 'POST',
            data: {
                fetchSchedule: true,
                course: show
            },
            success: function(response){
                if(user=='admin'){
                    document.getElementById('schedule-selected-course-level').textContent = course.toUpperCase() + ' ' + yearLevel;
                    document.getElementById('edit-schedule-coursename').textContent = response.info.course;
                    document.getElementById('edit-schedule-SchoolYear').textContent = response.info.SchoolYear;
                    document.getElementById('edit-schedule-semester').textContent = response.info.SemesterLevel;
                    if(response.success){
                        response.data.forEach(element => {
                            subjectTable(element, 'schedule-table-view');
                        });
                    }
                } else {
                    document.getElementById('teacher-schedule-SchoolYear').textContent = response.info.SchoolYear;
                    document.getElementById('teacher-schedule-semester').textContent = response.info.SemesterLevel;
                    
                    if(response.success){
                        response.data.forEach(element => {
                            subjectTable(element, 'schedule-table-view-teacher');
                        });
                    }
                }
            },
            error: function(erorr){

            }
        });
    }

    function fetchEnrolledStudent(course='bsit', yearLevel=1, search=''){
        $.ajax({
            url: '../../Model/usertable.inc.php',
            type: 'POST',
            data: {
                enrolledStudents: true,
                course: course,
                yearLevel: yearLevel,
                search: search
            },
            success: function(response){
                if(response.success){
                    // console.log('data' + response.message);
                    response.data.forEach(data => {
                        studentTable('dashboard-enrolled_std', data, true);
                    })
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function fetchUserTable(user='student', course='', yearLevel='', search=''){
        $.ajax({
            url: '../../Model/usertable.inc.php',
            type: 'POST',
            data: {
                fetchusertable: true,
                user: user,
                course: course,
                yearLevel: yearLevel,
                search: search
            },
            success: function(response){
                // console.log(response.messages);
                if(response.success){
                    response.data.forEach(data => {
                        if(user == 'student'){
                            studentTable('adminlistofstudents', data);
                        } else {
                            studentTable('adminlistofteacher', data);
                        }
                    })
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    // fetch data of semester information here
    function fetchsemesterData(){
        $.ajax({
            url: '../../Model/semester.dashboard.inc.php',
            type: 'POST',
            data: {
                semesterLevel: 1,
                schoolYear: '2024-2025'
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

    // fetch teacher subjects
    function fetchTeacherSubjects(){
        $('#faculty-display-subjects tbody tr').remove();

        $.ajax({
            url: '../../Model/schedules.inc.php',
            type: 'POST',
            data: {
                teacherSubjects: true,
                teacher: false,
                course: '',
                yearLevel: ''
            },
            success: function(response){
                if(response.success){
                    // console.log(response.data);
                    response.data.forEach(data => {
                        studentTable('faculty-display-subjects', data, false, 'teacher-subjects-');
                    });
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function fetchtoAssignSub4teacher(course, yearLevel){
        // clear the list
        $('#assignsubject-teacher .addsubject-subjectitem').remove();
        const courseYear = course + yearLevel;
        console.log(courseYear);

        $.ajax({
            url: '../../Model/schedules.inc.php',
            type: 'POST',
            data: {
                fetchSchedule: true,
                course: courseYear,
            },
            success: function(response){
                if(response.success){
                    console.log(response.message);
                    response.data.forEach(data => {
                        displayToAppendSchedule(data, 'assignsubject-teacher', true);
                    })
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    // fetch subjects to add in student's schedules
    function fetchAppendSubjects(course){
        $.ajax({
            url: '../../Model/schedules.inc.php',
            type: 'POST',
            data: {
                fetchSchedule: true,
                course: course
            },
            success: function(response){
                if(response.success){
                    // clear the list
                    $('#addsubject-showsubject .addsubject-subjectitem').remove();
                    response.data.forEach(data => {
                        displayToAppendSchedule(data);
                    })
                    document.getElementById('student-subject-popup').classList.add('showSemPopup');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    // get list of todo list tasks
    function fetchAllTask(){
        $.ajax({
            url: '../Model/todo.inc.php',
            type: 'POST',
            data: {
                getAllTask: true
            },
            success: function(response){
                $('#load-tasks div').remove();
                if(response.success){
                    response.data.forEach(data => {
                        displayTask(data);
                    });
                } else {
                    var noTaskLabel = document.createElement('div');
                    var label = document.createElement('p');
                    noTaskLabel.className = 'emptyTaskLabel';
                    label.textContent = 'Empty, Add new task!';

                    noTaskLabel.appendChild(label);
                    document.getElementById('load-tasks').appendChild(noTaskLabel);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    // events handling here

    // semester / dashboard
    // check for semester/year level informations
    $(".seminfo").click(function(){
        var selected = $(this).attr('id');

        clearDashboardPages();

        switch(selected){
            case('enrolled_std_board'):

                // view the page of selected tab / card
                document.getElementById('_admindashboard').classList.add('viewpage');

                // remove student's info popup and teacher's popup from teacher and student's list
                document.getElementById('stdinfo_popup').classList.remove('showSemPopup');
                document.getElementById('fcltyinfo_popup').classList.remove('showSemPopup');

                var course = document.getElementById('select-courseList').value;
                var yearLevel = document.getElementById('select-optionYear').value;
                var searchname = document.getElementById('searchStudents-enrolled').value;
                $('#dashboard-enrolled_std tbody tr').remove();
                fetchEnrolledStudent(course, yearLevel, searchname);

                break;
            case('all_std_board'):

                // view the page of selected tab / card
                document.getElementById('studentlisttab').classList.add('active');
                document.getElementById('fcltyinfo_popup').classList.remove('showSemPopup');

                var course = document.getElementById('courseList').value;
                var yearLevel = document.getElementById('optionYear').value;

                // clear table
                $('#adminlistofstudents tbody tr').remove();
                fetchUserTable('student', course, yearLevel);
                
                document.getElementById('studentlistpage').classList.add("viewpage");
                break;
            case('graduating_std_board'):

                // view the page of selected tab / card
                document.getElementById('studentlisttab').classList.add('active');

                // clear table
                $('#adminlistofstudents tbody tr').remove();
                fetchUserTable('student', 'bsit', 1);
                
                document.getElementById('studentlistpage').classList.add("viewpage");
                break;
            case('faculties_board'):

                // view the page of selected tab / card
                document.getElementById('teacherlisttab').classList.add('active');
                document.getElementById('stdinfo_popup').classList.remove('showSemPopup');

                // clear table
                $('#adminlistofteacher tbody tr').remove();
                fetchUserTable('teacher');

                document.getElementById('teacherlistpage').classList.add("viewpage");
                break;
            case('courses_board'):

                // view the page of selected tab / card
                document.getElementById('courselisttab').classList.add('active');
                var yearLevel = document.getElementById('courselist-selected-yearlevel').textContent.at(0);
                // load the list of course
                $('#table-course-view').load('Resources/pages/courselist.pages.html.php', {
                    view_list_course: true,
                    yearLevel: yearLevel // change this later
                });

                document.getElementById('courselistpage').classList.add('viewpage');
                break;
            default:
                console.log('page not found hehe');
                break;
        }
    });

    $(".t_option").click(function(){
        clearDashboardPages('teacher');

        document.getElementById($(this).attr('id')).classList.add('active');

        switch($(this).attr('id')){
            case('t_dashboardtab'):
                document.getElementById('_t_admindashboard').classList.add('viewpage');
                break;
            case('t_scheduletab'):
                // clear table
                $('#schedule-table-view-teacher tbody tr').remove();

                // update table
                fetchSchedules('bsit', '1', 'teacher');
                document.getElementById('_t_schedule').classList.add('viewpage');
                break;
            default:
                console.log('page not found');
                break;
        }
    });
    
    // ADMIN TAB BARS
    // admin navigation bar background color for active
    $(".option").click(function(){
        clearDashboardPages();
        // console.log($(this).attr('id'));
        document.getElementById($(this).attr('id')).classList.add("active");

        switch($(this).attr('id')){
            // THIS IS THE NEW DASHBOARD 
            case('semestertab'):
                document.getElementById("semesterpage").classList.add("viewpage");
                fetchsemesterData();
                break;

            // call the refresh function when you click this
            case('studentlisttab'):
                // $("#adminlistofstudents").load("../../Model/usertable.inc.php", {
                //     refresh: 'students'
                // });

                var std_course = document.getElementById('courseList').value;
                var std_yearLevel = document.getElementById('optionYear').value;

                // clear table
                $('#adminlistofstudents tbody tr').remove();
                fetchUserTable('student', std_course, std_yearLevel);
                
                document.getElementById('studentlistpage').classList.add("viewpage");

                // close teacher info
                document.getElementById('fcltyinfo_popup').classList.remove('showSemPopup');
                break;

            // call the refresh function when you click this
            case('teacherlisttab'):
                // clear table
                $('#adminlistofteacher tbody tr').remove();
                fetchUserTable('teacher');

                document.getElementById('teacherlistpage').classList.add("viewpage");

                // close student info
                document.getElementById('stdinfo_popup').classList.remove('showSemPopup');
                break;
            
            // list of all course available tab
            case('courselisttab'):
                document.getElementById('courselistpage').classList.add("viewpage");
                var course_yearLevel = document.getElementById('courselist-selected-yearlevel').textContent.at(0);
                // console.log(yearLevel);

                // load the list of course
                $('#table-course-view').load('Resources/pages/courselist.pages.html.php', {
                    view_list_course: true,
                    yearLevel: course_yearLevel
                });

                break;
            case('scheduletab'):
                var schedule_course = document.getElementById('schedule-select-course').value;
                var schedule_yearLevel = document.getElementById('schedule-select-yearLevel').value;
                // clear table
                $('#schedule-table-view tbody tr').remove();
                // console.log(schedule_course);

                // update table
                fetchSchedules(schedule_course, schedule_yearLevel);
                document.getElementById('schedulepage').classList.add("viewpage");
                break;
            case('announcementtab'):
                document.getElementById('announcementpage').classList.add("viewpage");
                break;
            case('todotab'):
                fetchAllTask();
                document.getElementById('todopage').classList.add("viewpage");
                break;
            default:
                console.log('page not found');
                break;
        }
    });

    // add new student page - check this later
    $("#addnewstudent").click(function(){
        clearDashboardPages();
        document.getElementById('newuserpage').classList.add('viewpage');
        addUser = 'students';

        $.ajax({
            url: 'dashboard.php',
            method: 'POST',
            data: {signal: 'student'},
            success: function(response){
                document.getElementById('_who').textContent = 'New Student';
                document.getElementById('selector-courses').style.display = 'block';
                // console.log('good');
            },
            error: function(){
                console.error('error');
            }
        });
    });

    // add new faculty page - check this later
    $("#addnewfaculty").click(function(){
        clearDashboardPages();
        document.getElementById('newuserpage').classList.add('viewpage');
        addUser = 'teachers';
        
        $.ajax({
            // url: 'Resources/script/pract.php',
            url: 'dashboard.php',
            method: 'POST',
            data: {signal: 'faculty'},
            success: function(response){
                document.getElementById('_who').textContent = 'New Faculty';
                document.getElementById('selector-courses').style.display = 'none';
                // console.log(response);
            },
            error: function(){
                console.error('error');
            }
        });
    });

    $('#input_grade_from_admin_dashboard').keyup(function(){
        console.log(this.value);
    });

    // student list popup (more information about student)
    $(".studentrow").click(function(){ 
        var stdinfo = document.getElementById('stdinfo_popup');
        stdinfo.classList.add('showSemPopup');

        $('#viewstudentinfo_popup').load('Resources/pages/studentinfo.html.php', {
            student_id: $(this).attr('id')
        });
    });

    // students list popup option
    $("#adminstudentlist_option").click(function(){
        var stdpopup = document.getElementById("stdlst_popup");
        stdpopup.classList.add("showSemPopup");
    });

    // student list popup option / in right side ( for quick access )
    $('#admin-select-level-popup').click(function(){
        document.getElementById('stdlst_popup').classList.add('showSemPopup');
    });

    // refresh student lists
    $("#refresh_studentlists").click(function(){
        var course = document.getElementById('courseList').value;
        var yearLevel = document.getElementById('optionYear').value;

        yearLevel = (yearLevel !== 'all') ? yearLevel : '';
        course = (course !== 'all') ? course : '';

        $('#adminlistofstudents tbody tr').remove();
        fetchUserTable('student', course, yearLevel);
    });

    // refresh faculty(teachers) list - #refresh_faculty not yet used
    $('#refresh_facultylists').click(function(){
        // clear table
        $('#adminlistofteacher tbody tr').remove();
        fetchUserTable('teacher');
    });

    // refresh list of enrolled students in dashboard
    $('#refresh-enrolled').click(function(){
        var course = document.getElementById('select-courseList').value;
        var yearLevel = document.getElementById('select-optionYear').value;
        var searchname = document.getElementById('searchStudents-enrolled').value;

        $('#dashboard-enrolled_std tbody tr').remove();
        fetchEnrolledStudent(course, yearLevel, searchname);
    });

    // TODO actions
    $('#add_new_task').click(function(){
        const task = document.getElementById('new_task_description');

        if(task.value.length < 1){
            return;
        }

        $.ajax({
            url: '../Model/todo.inc.php',
            type: 'POST',
            data: {
                addnewtask: task.value
            },
            success: function(response){
                if(response.success){
                    fetchAllTask();
                } else {
                    openPopupMessage(response.message, 'Database Error');
                }

                task.value = '';
            },
            error: function(error){
                console.log(error);
            }
        })
    });

    function modifyTask(task, action='complete'){
        $.ajax({
            url: '../Model/todo.inc.php',
            type: 'POST',
            data: {
                modifyTask: action,
                task: task
            },
            success: function(response){
                if(response.success){
                    fetchAllTask();
                } else {
                    // console.log(response.message);
                    openPopupMessage(response.message, 'Error');
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    // complete task
    $('#load-tasks').on('dblclick', '.taskitem', function(){
        // console.log(this.id);
        modifyTask(this.id, 'complete');
    });

    // remove task
    $('#load-tasks').on('click', '.fa-trash', function(){
        // console.log(this.id);
        modifyTask(this.id, 'remove');
    });

    // adding new semester popup
    $("#addnewsemester").click(function(){
        document.getElementById("newsempopup").classList.add("showSemPopup");
        document.getElementById('popup-modify-sem').classList.remove('show-popup');
        document.getElementById('popup-addnew-sem').classList.add('show-popup');
    });
    // add new semester
    $("#addnewsemester-dropdown").click(function(){
        document.getElementById("newsempopup").classList.add("showSemPopup");
        document.getElementById('popup-modify-sem').classList.remove('show-popup');
        document.getElementById('popup-addnew-sem').classList.add('show-popup');
    });
    // modify semester
    $('#modifysemester-dropdown').click(function(){
        document.getElementById("newsempopup").classList.add("showSemPopup");
        document.getElementById('popup-modify-sem').classList.add('show-popup');
        document.getElementById('popup-addnew-sem').classList.remove('show-popup');

        $.ajax({
            url: '../Model/semester.inc.php',
            type: 'POST',
            data: {
                getSemesterModified: true
            },
            success: function(response){
                if(response.success){
                    document.getElementById('semester_active_submitGrade').value = response.data.submition;
                    document.getElementById('semester_active_submitGrade').click();
                    document.getElementById('extendDate').value = response.data.extend_date;
                    console.log(response.data.extend_date);

                } else {
                    openPopupMessage(response.message, "Error");
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    });
    // active submition of grade
    $('#sas_radiobtn').click(function(){
        const radio = document.getElementById('semester_active_submitGrade');
        if(radio.value == 'off'){
            radio.value = 'on';
        } else {
            radio.value = 'off';
        }
        radio.click();
    });
    $('#semester_active_submitGrade').on('change', function(){
        const radiobtn = document.getElementById('sas_radiobtn');
        if(this.value == 'on'){
            radiobtn.querySelector('.highlight').classList.add('active');
        } else {
            radiobtn.querySelector('.highlight').classList.remove('active');
        }
    });

    // save modified semester
    $('#savemodify').click(function(){
        const extend_date = document.getElementById('extendDate');
        const submitGrade = document.getElementById('semester_active_submitGrade');

        $.ajax({
            url: '../Model/semester.inc.php',
            type: 'POST',
            data: {
                saveModifiesSem: true,
                submitGrade: submitGrade.value,
                extend_date: extend_date.value
            },
            success: function(response){
                if(response.success){
                    document.getElementById("newsempopup").classList.remove("showSemPopup");
                    openPopupMessage(response.message, 'Success');
                } else {
                    openPopupMessage(response.message, 'Error');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    // show search input [students tab]
    $("#searchstudent").click(function(){
        document.getElementById("searchinput").classList.add("showSearch");
        document.getElementById("searchStudents").focus();
    });

    // show search input [teachers tab]
    $('#searchteacher').click(function(){
        document.getElementById('t_searchinput').classList.add('showSearch');
        document.getElementById('searchTeachers').focus();
    });

    // show search input [dashboard tab - enrolled students]
    $("#search-enrolled").click(function(){
        document.getElementById("searchinput-enrolled").classList.add("showSearch");
        document.getElementById("searchStudents-enrolled").focus();
    });

    // show search input [teacher's dashboard / teacher's page]
    $('#t_search-enrolled-std').click(function(){
        document.getElementById('t_page_searchinput').classList.add('showSearch');
    });

    // search student on keyup
    $("#searchStudents").keyup(function(){
        var course = document.getElementById('courseList').value;
        var yearLevel = document.getElementById('optionYear').value;

        yearLevel = (yearLevel !== 'all') ? yearLevel : '';
        course = (course !== 'all') ? course : '';

        $('#adminlistofstudents tbody tr').remove();
        fetchUserTable('student', course, yearLevel, this.value);
    });

    // search student on keyup - enrolled student
    $('#searchStudents-enrolled').keyup(function(){
        var course = document.getElementById('select-courseList').value;
        var yearLevel = document.getElementById('select-optionYear').value;

        $('#dashboard-enrolled_std tbody tr').remove();
        fetchEnrolledStudent(course, yearLevel, this.value);
    });

    // search faculties
    $('#searchTeachers').keyup(function(){

        // clear table
        $('#adminlistofteacher tbody tr').remove();
        fetchUserTable('teacher', '', '', this.value);
    });

    // option popup for studen list, onchange of select - to filter what to display
    $("#courseList").on('change', function(){
        console.log(this.value);
        var searchname = document.getElementById('searchStudents').value;
        var level = document.getElementById('optionYear').value;

        var course = (this.value !== 'all') ? this.value : '';
        var level = (level !== 'all') ? level : '';
        var search = course + level;

        // clear
        $('#adminlistofstudents tbody tr').remove();
        fetchUserTable('student', course, level, searchname);
    });

    // option popup for enrolled student, onchange of select - dasboard
    $('#select-courseList').on('change', function(){
        var yearLevel = document.getElementById('select-optionYear').value;
        var searchname = document.getElementById('searchStudents-enrolled').value;
        $('#dashboard-enrolled_std tbody tr').remove();
        fetchEnrolledStudent(this.value, yearLevel, searchname);
    });

    // year level select popup in student list
    $('#optionYear').on('change', function(){
        document.getElementById('label-for-select-level').textContent = 'Level: ' + this.value.toUpperCase();
        var course = document.getElementById('courseList').value;
        var searchname = document.getElementById('searchStudents').value;
        console.log(this.value);

        var yearLevel = (this.value !== 'all') ? this.value : '';
        var course = (course !== 'all') ? course : '';
        var search = course + yearLevel;

        // clear
        $('#adminlistofstudents tbody tr').remove();
        fetchUserTable('student', course, yearLevel, searchname);
    });

    // year level select popup - dashboard page / for enrolled student
    $('#select-optionYear').on('change', function(){
        var course = document.getElementById('select-courseList').value;
        var searchname = document.getElementById('searchStudents-enrolled').value;
        document.getElementById('label-for-selected-level-dashboard').textContent = 'Level: ' + this.value;

        $('#dashboard-enrolled_std tbody tr').remove();
        fetchEnrolledStudent(course, this.value, searchname);
    });

    // save new student data
    $("#save_student").click(function(){

        var fname = document.getElementById("fname").value;
        var mname = document.getElementById("mname").value;
        var lname = document.getElementById("lname").value;
        var schoolid = document.getElementById("schoolid").value;
        var email = document.getElementById("useremail").value;
        var password = document.getElementById("password").value;

        var gender = "";
        if(document.getElementById("gender1").checked){
            gender = "male";
        } else if(document.getElementById("gender2").checked){
            gender = "female";
        } else {
            gender = "none"; // to check if none of checkbox is checked
        }

        var bdate = document.getElementById("bdate").value;
        var address = document.getElementById("address").value;
        var course = document.getElementById('course_options');
        
        // console.log(bdate);
        // console.log(course.className);

        // check if all input is not empty
        var allinput = checkEmptyInput("newstudentform", "course_options", "address", addUser);

        if(allinput.length !== 0){
            document.getElementById("popup_message").classList.add("showError");
            document.getElementById("error_name").textContent = "Please fill all input";
        } else if(checkEmail(email) == false){
            document.getElementById("popup_message").classList.add("showError");
            document.getElementById("error_name").textContent = "invalid email";
        }
        else{
            // only proced if all input data are valid
            $("#error_name_msg").load("Model/newstudent.inc.php", {
                user: addUser, // check what type of user to add
                fname: fname,
                mname: mname,
                lname: lname,
                schoolid: schoolid,
                email: email,
                password: password,
                gender: gender,
                bdate: bdate,
                Course: course.className, // error
                address: address
            });

            // show the pop-up message
            document.getElementById("save").classList.add("showError");
            document.getElementById("newstudentform").reset();
        }
    });

    // new semester -- copy ( UNDER TESTING )
    $('#savesemester').click(function(){
        var getSY = $('#schoolyear');
        var getSemester = $('#semester_count');
        var start_date = $('#date_start');
        var end_date = $('#date_end');

        $.ajax({
            url: '../../Model/semester.inc.php',
            type: 'POST',
            data: {
                addSem: true,
                getSY_date: getSY.val(),
                getSem: getSemester.val(),
                getDate_start: start_date.val(),
                getDate_end: end_date.val()
            },
            success: function(response){
                if(response.success){
                    openPopupMessage(response.message, 'Added');
                    $(location).attr('href', 'dashboard.php');
                } else {
                    openPopupMessage(response.message, 'Canceled')
                }
            },
            error: function(xhr, status, error){
                console.error("AJAX Error:", status, error);
            }
        });
    });

    // dashboard select year level popup
    $('#select-level-button').click(function(){
        document.getElementById('select-level').classList.add('showSemPopup');
    });

    // course list on click items
    $('.course-data').click(function(){
        document.getElementById('courseinfo-popup').classList.add('showSemPopup');
    });

    // announcement page - i dont realy know why im adding this bullshit features
    // click publish button
    $("#publish_btn").click(function(){
        var title = document.getElementById('title_post');
        var body = document.getElementById('ann_body');
        var eventDate = document.getElementById('event_date');
        var imageFile = document.getElementById('announcement-attachment-file');
        var imagePath = '';
        console.log(imageFile.value);

        if(imageFile.value == ''){
            imagePath = false;
        } else {
            imagePath = imageFile.value.slice(12);
        }

        if(body.value.length > 0){
            $.ajax({
                url: '../../Model/announcements.inc.php',
                type: 'POST',
                data: {
                    postAnnouncement: true,
                    title: title.value,
                    content: body.value,
                    imagefile: imagePath,
                    addEvent: addEvent,
                    eventDate: eventDate.value + ' 00:00:00'
                },
                success: function(response){
                    if(response.success){
                        openPopupMessage(response.message, 'Posted!');
                        title.value = '';
                        body.value = '';
                        addEvent = false;
                        this.textContent = 'Add Event';
                        document.getElementById('open_add_event').classList.remove('highlight');
                        // $(location).attr('href', 'announcements.php');
                    } else {
                        openPopupMessage(response.message, 'Announcement');
                    }
                },
                error: function(xhr, status, error){
                    console.error("AJAX Error: ", status, error);
                }
            });
        }
    });

    // upload file button / open the file manager
    $('#upload-file-announcement-btn').click(function(){
        document.getElementById('announcement-attachment-file').click();
    });

    // open modify schedule - schedule tab
    $('#schedule-table-view').on('click', '.table-user', function(){
        const selectedScheduleItem = this.id.slice(22);
        // console.log(selectedScheduleItem);

        $.ajax({
            url: '../../Model/schedules.inc.php',
            type: 'POST',
            data: {
                modifySubjectSchedule: selectedScheduleItem
            },
            success: function(response){
                if(response.success){
                    // console.log(selectedScheduleItem);
                    document.getElementById('schedule-select-day').value = response.data['day'];
                    document.getElementById('time_start').value = response.data['time_start'];
                    document.getElementById('time_end').value = response.data['time_end'];
                    document.getElementById('schedule-gccode').value = response.data['schedule-gccode'];
                    document.getElementById('schedule-numunits').value = response.data['numunits'];
                    document.getElementById('schedule-select-withlab').value = response.data['withlab'];
                }
            },
            error: function(error){
                console.log(error);
            }
        });
        document.getElementById('schedule-modify-subject-popup').classList.add('showSemPopup');
    });

    // update subject list by selection input
    $('#schedule-select-course').on('change', function(){
        const course = document.getElementById('schedule-select-course').value;
        const yearLevel = document.getElementById('schedule-select-yearLevel').value;
        // clear table
        $('#schedule-table-view tbody tr').remove();
        console.log('selector: ' + course);

        // fetch schedules
        fetchSchedules(course, yearLevel);
    });
    $('#schedule-select-yearLevel').on('change', function(){
        const course = document.getElementById('schedule-select-course').value;
        const yearLevel = document.getElementById('schedule-select-yearLevel').value;
        // clear table
        $('#schedule-table-view tbody tr').remove();

        // fetch schedules
        fetchSchedules(course, yearLevel);
    });

    // select subject - schedule tab page
    $('#schedule-list-subject-selection').on('click', '.subject-item', function(){
        if(!this.classList.contains('disabled')){
            const selectedID = $(this).attr('id').slice(19);
            const defaultTime = '00:00:00';
            const yearLevel = document.getElementById('schedule-select-yearLevel').value;
            const course = document.getElementById('schedule-select-course').value;
            const selectCourse = course + yearLevel;
            const GCcode = '';
            const day = 'mon';
            const withLab = 0;

            // fetch data here
            $.ajax({
                url: '../../Model/schedules.inc.php',
                type: 'POST',
                data: {
                    addNewSubjectToSchedule: selectedID,
                    GCcode: GCcode,
                    selected_course: selectCourse,
                    time_start: defaultTime,
                    time_end: defaultTime,
                    day: day,
                    withLab: withLab
                },
                success: function(response){
                    if(response.success){
                        openPopupMessage(response.message, 'Added');
                    } else {
                        openPopupMessage(response.message, 'Error');
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });

            // clear table
            $('#schedule-table-view tbody tr').remove();

            // const course = document.getElementById('schedule-select-course').value;
            // const yearLevel = document.getElementById('schedule-select-yearLevel').value;

            // fetch schedules
            fetchSchedules(course, yearLevel);

            // close the popup
            document.getElementById('schedule-append-subject-popup').classList.remove('showSemPopup');
            // console.log(selectedID);
        }
    });

    // open add new subject in schedule tab page
    $('#schedule-add-subject-btn').click(function(){
        const listSubjectsDiv = document.getElementById('list-subjects-selection-major'); // for minor subjects
        const listSubjectsDivminor = document.getElementById('list-subjects-selection-minor'); // for minor subjects
        var selected_course = document.getElementById('schedule-select-course').value + document.getElementById('schedule-select-yearLevel').value;

        // show all available subjects
        $.ajax({
            url: '../../Model/schedules.inc.php',
            type: 'POST',
            data: {
                showSubjectByCourse: selected_course
            },
            success: function(response){
                if(response.success){
                    // create new element and append to parent element
                    $('#list-subjects-selection-minor div').remove();
                    $('#list-subjects-selection-major div').remove();

                    response.data.forEach(data => {
                        var newItem = document.createElement('div');
                        newItem.className = 'subject-item';
                        newItem.id = 'subject-selectid-no'+data[3];

                        var header = document.createElement('h4');
                        var numStudents = document.createElement('p');
                        var teacherName = document.createElement('p');

                        header.textContent = data[0];
                        numStudents.textContent = 'Enrolled: 20';
                        teacherName.textContent = data[1];

                        newItem.appendChild(header);
                        newItem.appendChild(numStudents);
                        newItem.appendChild(teacherName);
                        if(data[2] == 1){
                            listSubjectsDiv.appendChild(newItem);
                        } else {
                            listSubjectsDivminor.appendChild(newItem);
                        }
                    });
                }
            },
            error: function(error){
                console.log('error ' + error);
            }
        });

        document.getElementById('schedule-append-subject-popup').classList.add('showSemPopup');
    });

    // close add new subject in schedule tab page
    $('#exit_schedule-append-subject-popup').click(function(){
        document.getElementById('schedule-append-subject-popup').classList.remove('showSemPopup');
    });

    // show add new course popup - i really dont understand this yet
    $("#addnew_course_btn").click(function(){
        document.getElementById('addnew_course').classList.add('show_addnew_course');
    });

    $("#addnew_course_btn2").click(function(){
        document.getElementById('addnew_course').classList.add('show_addnew_course');
    });

    // delete subject in schedule tab
    $('#schedule-delete-subject').click(function(){

        $.ajax({
            url: '../../Model/schedules.inc.php',
            type: 'POST',
            data: {
                remove_subject_inSchedule: true
            },
            success: function(response){
                if(response.success){
                    const course = document.getElementById('schedule-select-course').value;
                    const yearLevel = document.getElementById('schedule-select-yearLevel').value;
                    // clear table
                    $('#schedule-table-view tbody tr').remove();

                    // fetch schedules
                    fetchSchedules(course, yearLevel);
                    openPopupMessage(response.message, 'Updated');
                } else {
                    openPopupMessage(response.message, 'Error');
                }
                document.getElementById('schedule-modify-subject-popup').classList.remove('showSemPopup');
            },
            error: function(erorr){

            }
        });
    });

    $('.course-yearLevel-dropdown').click(function(){
        // console.log($(this).attr('value'));
        var selectedYearLevel = $(this).attr('value');
        document.getElementById('courselist-selected-yearlevel').textContent = this.textContent;
        document.getElementById('yearLevel-selected-courseList').textContent = 'Level: ' + this.textContent;

        // load the list of course
        $('#table-course-view').load('Resources/pages/courselist.pages.html.php', {
            view_list_course: true,
            yearLevel: selectedYearLevel // change this later
        });
    });

    // save new course
    $('#course-submit-newcourse').click(function(){
        var coursename = document.getElementById('newcourse-coursename');
        var yearLevel = document.getElementById('selected-newcourse-yearLevel');

        $.ajax({
            url: '../../Model/course.inc.php',
            type: 'POST',
            data: {
                addnewcourse: true,
                coursename: coursename.value,
                yearLevel: yearLevel.value
            },
            success: function(response){
                if(response.success){

                    var yearLevel = document.getElementById('courselist-selected-yearlevel').textContent.at(0);

                    // load the list of course
                    $('#table-course-view').load('Resources/pages/courselist.pages.html.php', {
                        view_list_course: true,
                        yearLevel: yearLevel
                    });
                    openPopupMessage(response.message, 'Added');
                } else {
                    openPopupMessage(response.message, 'Error');
                }
                // remove the popup
                document.getElementById('addnew_course').classList.remove('show_addnew_course');
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    // show info of enrolled students in enrolled student's lists
    $('#dashboard-enrolled_std').on('click', '.table-user', function(){
        const student = this.id;

        // fetch data
        $.ajax({
            url: '../../Model/semester.inc.php',
            type: 'POST',
            data: {
                studentSched: true,
                student: student
            },
            success: function(response){
                if(response.success){
                    document.getElementById('username-link').textContent = response.data['username'];
                    document.getElementById('user-name-fullname').textContent = response.data['fullname'];
                    document.getElementById('user-name-course').textContent = response.data['course'];
                    document.getElementById('user-name-userid').textContent = response.data['userid'];

                    // fetch schedule here
                    fetchStudentSubjects(student);
                }
            },
            error: function(){
                console.log('error');
            }
        });

        // console.log('student: ' + student);
        // fetchStudentSubjects(student);

        // navigate to editing subjects for enrolled student
        clearDashboardPages(); // add selected user first
        document.getElementById('editstudentsubjects').classList.add('viewpage');
    });

    // show info of students in student's lists
    $('#adminlistofstudents').on('click', '.table-user', function(){
        // console.log(this.id);
        document.getElementById('stdinfo_popup').classList.add('showSemPopup');
        // console.log($(this).attr('id'));

        $('#viewstudentinfo_popup').load('Resources/pages/studentinfo.html.php', {
            student_id: $(this).attr('id')
        });
    });

    // show info of selected teacher in teacher's lists
    $('#adminlistofteacher').on('click', '.table-user', function(){
        var userid = this.id;
        $.ajax({
            url: '../../Model/semester.inc.php',
            type: 'POST',
            data: {
                teacherInfo: userid
            },
            success: function(response){
                if(response.success){
                    document.getElementById('teacher-header-fullname').textContent = response['data']['fullname'];
                    document.getElementById('teacher-fname').value = response['data']['fname'];
                    document.getElementById('teacher-mname').value = response['data']['mname'];
                    document.getElementById('teacher-lname').value = response['data']['lname'];
                    document.getElementById('teacher-email').value = response['data']['email'];
                    document.getElementById('teacher-address').value = response['data']['address'];
                    fetchTeacherSubjects();
                }
            },
            error: function(error){
                console.log(error);
            }
        });
        document.getElementById('fcltyinfo_popup').classList.add('showSemPopup');
    });

    // save teacher info
    $('#teacher-save-changes').click(function(){
        const fname = document.getElementById('teacher-fname');
        const lname = document.getElementById('teacher-lname');
        const mname = document.getElementById('teacher-mname');
        const email = document.getElementById('teacher-email');
        const address = document.getElementById('teacher-address');

        $.ajax({
            url: '../../Model/editprofile.inc.php',
            type: 'POST',
            data: {
                updateTeacherInfo: true,
                user: 'teacher',
                data: [fname.value, lname.value, mname.value, email.value, address.value]
            },
            success: function(response){
                if(response.success){
                    openPopupMessage(response.message, 'Saved!');
                } else {
                    openPopupMessage(response.message, 'Error');
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    });

    // add subjects to students in student's subjects page
    $('#student-add-subjects').click(function(){
        var selectedCourse = document.getElementById('selected-addSubject-course');
        var selectedYearlevel = document.getElementById('selected-addSubject-yearLevel');
        
        fetchAppendSubjects(selectedCourse.value + selectedYearlevel.value);
    });

    $('#selected-addSubject-course').on('change', function(){
        var course = this.value;
        var yearLevel = document.getElementById('selected-addSubject-yearLevel').value;
        fetchAppendSubjects(course+yearLevel);
    });

    $('#selected-addSubject-yearLevel').on('change', function(){
        var yearLevel = this.value;
        var course = document.getElementById('selected-addSubject-course').value;
        fetchAppendSubjects(course+yearLevel);
    });

    // select subject to assign to teacher's subject - teacher subject schedule
    $('#assignsubject-teacher').on('click', '.addsubject-subjectitem', function(){
        // console.log(this.id.slice(15));
        var idnum = this.id.slice(15);

        // update subject's teacher
        $.ajax({
            url: '../../Model/schedules.inc.php',
            type: 'POST',
            data: {
                updateScheduleTeacher: idnum
            },
            success: function(response){
                if(response.success){
                    fetchTeacherSubjects();
                    document.getElementById('fcltyinfo_add-subject').classList.remove('showSemPopup');
                    openPopupMessage(response.message, 'Updated');
                } else{
                    openPopupMessage(response.message, 'Error');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    // assign subject to teacher button
    $('#assignSubjectTeacher').click(function(){
        var course = document.getElementById('selected-assignSubjectTeacher-course').value;
        var yearLevel = document.getElementById('selected-assignSubjectTeacher-yearLevel').value;

        document.getElementById('fcltyinfo_add-subject').classList.add('showSemPopup');
        fetchtoAssignSub4teacher(course, yearLevel);
    });

    $('#selected-assignSubjectTeacher-course').on('change', function(){
        var yearLevel = document.getElementById('selected-assignSubjectTeacher-yearLevel').value; 
        fetchtoAssignSub4teacher(this.value, yearLevel);
    });

    $('#selected-assignSubjectTeacher-yearLevel').on('change', function(){
        var course = document.getElementById('selected-assignSubjectTeacher-course').value; 
        fetchtoAssignSub4teacher(course, this.value);
    });

    // select subject to append in student's schedule in student's schedule
    $('#addsubject-showsubject').on('click', '.addsubject-subjectitem', function(){
        var numSchedule = this.id.slice(15);
        console.log('subject code: ' + numSchedule);
        
        $.ajax({
            url: '../../Model/schedules.inc.php',
            type: 'POST',
            data: {
                addStudentSubject: numSchedule
            },
            success: function(response){
                if(response.success){
                    fetchStudentSubjects();
                    openPopupMessage(response.message, 'Saved');
                } else {
                    openPopupMessage(response.message, 'Error');
                }
                document.getElementById('student-subject-popup').classList.remove('showSemPopup');
            },
            error: function(error){
                console.log(error);
            }
        });
    })

    // select subject from student's schedule
    $('#addsubj-list-subjects').on('click', '.subject-item', function(){
        selectedStudent_Subject = this.id.slice(11);
        document.getElementById('student-seledtedSubject-popup').classList.add('showSemPopup');
    });

    // deactivate teacher here
    $('#deactivate-teacher').click(function(){
        $.ajax({
            url: '../../Model/semester.inc.php',
            type: 'POST',
            data: {
                deactivateUser: true,
                user: 'teacher'
            },
            success: function(response){
                if(response.success){
                    // clear table
                    $('#adminlistofteacher tbody tr').remove();
                    fetchUserTable('teacher');
                    openPopupMessage(response.message, 'Deactivated');
                } else {
                    openPopupMessage(response.message, 'Error');
                }
                document.getElementById('fcltyinfo_popup').classList.remove('showSemPopup');
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    // add event in announcement tab
    $('#open_add_event').click(function(){
        var date = new Date().toISOString().split('T')[0];
        document.getElementById('event_date').value = date;
        document.getElementById('add-event-popup').classList.add('showSemPopup');
    });

    // add event button
    $('#add-event-btn').click(function(){
        if(addEvent){
            addEvent = false;
            this.textContent = 'Add Event';
            document.getElementById('open_add_event').classList.remove('highlight');
        } else {
            addEvent = true;
            this.textContent = 'Remove';
            document.getElementById('open_add_event').classList.add('highlight');
        }
        document.getElementById('add-event-popup').classList.remove('showSemPopup');
    });

    // select student in teacher's dashboard
    $('#t_display-studentTable').on('click', '.table-user', function(){
        const username = $(this).attr('id');

        $.ajax({
            url: '../Model/semester.inc.php',
            type: 'POST',
            data: {
                getUser: username
            },
            success: function(response){
                if(response.success){
                    // console.log(response.data);
                    document.getElementById('teacher_page-popup').classList.add('showSemPopup');
                    document.getElementById('input_grade_student').classList.add('show');
                    document.getElementById('select_subjects_list').classList.remove('show');
                    document.getElementById('t_popup-label').textContent = username;
                    document.getElementById('t_std-fullname').textContent = response.data.fullname;
                    document.getElementById('t_std-coursename').textContent = response.data.course;
                    if(response.data.image){
                        document.getElementById('t_std-image').src = response.data.image;
                    }
                } else {
                    console.log(response.message);
                }
            },
            error: function(error){
                console.log('error: ' + error);
            }
        });
    });

    // close popup in teacher's page (dashboard)
    $('#exit_teacher_page-popup').click(function(){
        document.getElementById('t_std-image').src = 'Resources/assets/default-profile-photo2.jpg'
        document.getElementById('teacher_page-popup').classList.remove('showSemPopup');
        document.getElementById('t_input-student-grade').value = '0';

        document.getElementById('input_grade_student').classList.remove('show');
        document.getElementById('t_open_popupmessage').classList.remove('show');
        document.getElementById('select_subjects_list').classList.remove('show');
    });

    // exit add event popup
    $('#exit_add-event-popup').click(function(){
        document.getElementById('add-event-popup').classList.remove('showSemPopup');
    })

    // more on exit buttons here

    // close modify schedule and save changes - schedule tab
    $('#exit_schedule-modify-subject-popup').click(function(){
        var day = document.getElementById('schedule-select-day').value;
        var time_start = document.getElementById('time_start').value;
        var time_end = document.getElementById('time_end').value;
        var GCcode = document.getElementById('schedule-gccode').value;
        var num_units = document.getElementById('schedule-numunits').value;
        var withlab = document.getElementById('schedule-select-withlab').value;
        // console.log(withlab);

        $.ajax({
            url: '../../Model/schedules.inc.php',
            type: 'POST',
            data: {
                schedule_update: true,
                day: day,
                time_start: time_start,
                time_end: time_end,
                GCcode: GCcode,
                num_units: num_units,
                withlab: withlab
            },
            success: function(response){
                if(response.success){
                    openPopupMessage(response.message, 'Updated');
                } else {
                    openPopupMessage(response.message, 'Error');
                }
            },
            error: function(error){
                openPopupMessage('Database error', 'Error');
            }
        });

        const course = document.getElementById('schedule-select-course').value;
        const yearLevel = document.getElementById('schedule-select-yearLevel').value;

        // clear table
        $('#schedule-table-view tbody tr').remove();

        // fetch schedules
        fetchSchedules(course, yearLevel);
        document.getElementById('schedule-modify-subject-popup').classList.remove('showSemPopup');
    });

    // save or remove subject in schedule
    $('#stdsubject-quickaction').on('click', '.action', function(){
        const action = $(this).attr('value');
        const inputGrade = document.getElementById('subjectgrade-input');
        var selectedSubject = selectedStudent_Subject;

        $.ajax({
            url: '../../Model/schedules.inc.php',
            type: 'POST',
            data: {
                subjectAction: true,
                action: action,
                inputGrade: inputGrade.value,
                selectedSubject: selectedSubject
            },
            success: function(response){
                if(response.success){
                    openPopupMessage(response.message, 'Updated');
                    document.getElementById('student-seledtedSubject-popup').classList.remove('showSemPopup');
                    fetchStudentSubjects();
                    inputGrade.value = '';
                } else {
                    openPopupMessage(response.message, 'Error');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    // exit assign subject to teacher popup
    $('#exit_fcltyinfo_add-subject').click(function(){
        document.getElementById('fcltyinfo_add-subject').classList.remove('showSemPopup');
    })

    // open schedule selector popups
    $('#open_schedule-select-course-popup').click(function(){
        document.getElementById('schedule-select-course-popup').classList.add('showSemPopup');
    });

    // exit selected subject popup in student's subject list
    $('#exit_student-seledtedSubject-popup').click(function(){
        document.getElementById('student-seledtedSubject-popup').classList.remove('showSemPopup');
    })

    // exit course info
    $('#exit_courseinfo_popup').click(function(){
        document.getElementById('courseinfo-popup').classList.remove('showSemPopup');
    });

    // exit publish popup
    $("#exit_publish").click(function(){
        document.getElementById("publish_event").classList.remove("showSemPopup");
    });

    // exit warning in student list
    $('#exit_error-message_popup').click(function(){
        document.getElementById('error-message').classList.remove('showSemPopup');
    });

    // exit popup from new student form
    $("#exitpopup").click(function(){
        document.getElementById("popup_message").classList.remove("showError");
    });

    $("#exitpopup_save").click(function(){
        document.getElementById("save").classList.remove("showError");
    });

    $("#exitsempopup").click(function(){
        document.getElementById("newsempopup").classList.remove("showSemPopup");
    });
    $('#exitmodifysempopup').click(function(){
        document.getElementById("newsempopup").classList.remove("showSemPopup");
    })

    $("#exit_stdlst_popup").click(function(){
        document.getElementById("stdlst_popup").classList.remove("showSemPopup");
    });

    // exit add new course
    $("#exit_newcourse").click(function(){
        document.getElementById('addnew_course').classList.remove('show_addnew_course');
    });

    // exit dashboard information pop up - dashboard tab
    $("#exit_d_info_p").click(function(){
        document.getElementById('open_info_popup').classList.remove('active_open_popup');
    });

    // exit dashboard select level pop ups
    $('#exit_select-level_popup').click(function(){
        document.getElementById('select-level').classList.remove('showSemPopup');
    });

    // exit schedule selector popups
    $('#exit_schedule-select-course-popup').click(function(){
        document.getElementById('schedule-select-course-popup').classList.remove('showSemPopup');
    });

    // exit faculty info popup
    $('#exit_fcltyinfo_popup').click(function(){
        document.getElementById('fcltyinfo_popup').classList.remove('showSemPopup');
    });

    // exit add subject in student's subject page
    $('#exit_student-subject-popup').click(function(){
        document.getElementById('student-subject-popup').classList.remove('showSemPopup');
    });

    // global popup message
    $('#exit_global-mpopup').click(function(){
        document.getElementById('global-mpopup').classList.remove('showSemPopup');
    });
});