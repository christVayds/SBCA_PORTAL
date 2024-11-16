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

// JQUERY
$(document).ready(function(){
    var addUser = 'students'; // teporary, checking what type of user to add in database

    // functions for fetching data

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

    // events handling here

    // semester / dashboard
    // check for semester/year level informations
    $(".seminfo").click(function(){
        var selected = $(this).attr('id');

        clearDashboardPages();

        switch(selected){
            case('enrolled_std_board'):
                document.getElementById('_admindashboard').classList.add('viewpage');

                var course = document.getElementById('select-courseList').value;
                var yearLevel = document.getElementById('select-optionYear').value;
                var searchname = document.getElementById('searchStudents-enrolled').value;

                // load the table here
                $('#listallenrolled-table').load("Resources/data/enrolledstd.php", {
                    course: course,
                    yearLevel: yearLevel,
                    searchname: searchname
                });

                break;
            case('all_std_board'):
                document.getElementById('studentlisttab').classList.add('active');
                    
                // refresh list
                $("#adminlistofstudents").load("Resources/data/showStudentInfo.php", {
                    refresh: 'students'
                });
                
                document.getElementById('studentlistpage').classList.add("viewpage");
                break;
            case('graduating_std_board'):
                document.getElementById('studentlisttab').classList.add('active');
                        
                // refresh list
                $("#adminlistofstudents").load("Resources/data/showStudentInfo.php", {
                    refresh: 'students'
                });
                
                document.getElementById('studentlistpage').classList.add("viewpage");
                break;
            case('faculties_board'):
                document.getElementById('teacherlisttab').classList.add('active');

                // refresh list
                $("#adminlistofteacher").load('Resources/data/showStudentInfo.php', {
                    refresh: 'teachers'
                });

                document.getElementById('teacherlistpage').classList.add("viewpage");
                break;
            case('courses_board'):
                document.getElementById('courselisttab').classList.add('active');

                // load the list of course
                $('#table-course-view').load('Resources/pages/courselist.pages.html.php', {
                    view_list_course: true,
                    semesterLevel: 1 // change this later
                });
                document.getElementById('courselistpage').classList.add('viewpage');
                break;
            default:
                console.log('page not found');
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
                document.getElementById('_t_schedule').classList.add('viewpage');
                break;
            case('t_ptatab'):
                document.getElementById('_t_pta').classList.add('viewpage');
                break;
            case('t_newstab'):
                document.getElementById('_t_announcement').classList.add('viewpage');
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
                $("#adminlistofstudents").load("Resources/data/showStudentInfo.php", {
                    refresh: 'students'
                });
                
                document.getElementById('studentlistpage').classList.add("viewpage");
                break;

            // call the refresh function when you click this
            case('teacherlisttab'):
                $("#adminlistofteacher").load('Resources/data/showStudentInfo.php', {
                    refresh: 'teachers'
                });

                document.getElementById('teacherlistpage').classList.add("viewpage");
                break;
            
            // list of all course available tab
            case('courselisttab'):
                document.getElementById('courselistpage').classList.add("viewpage");

                // load the list of course
                $('#table-course-view').load('Resources/pages/courselist.pages.html.php', {
                    view_list_course: true,
                    semesterLevel: 1 // change this later
                });
                break;
            case('scheduletab'):
                document.getElementById('schedulepage').classList.add("viewpage");
                break;
            case('announcementtab'):
                document.getElementById('announcementpage').classList.add("viewpage");
                break;
            case('todotab'):
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

    // dashboard information pop up - dashboard tab
    $(".enrolled_std").click(function(){
        document.getElementById('open_info_popup').classList.add('active_open_popup');
        console.log(this.id);
        if(this.id !== null){
            $("#open_info_popup").load("Resources/data/showStudentInfo.php", {
                showPopup: true,
                student: this.id
            });
        }
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
        $("#adminlistofstudents").load("Resources/data/showStudentInfo.php", { // replaced: refresh_stdlst.php
            refresh: 'students'
        });
    });

    // refresh faculty(teachers) list - #refresh_faculty not yet used
    $('#refresh_facultylists').click(function(){
        $('#adminlistofteacher').load('Resources/data/showStudentInfo.php', { // replaced: refresh_stdlst.php
            refresh: 'teachers'
        });
    });

    // refresh list of enrolled students in dashboard
    $('#refresh-enrolled').click(function(){
        var course = document.getElementById('select-courseList').value;
        var yearLevel = document.getElementById('select-optionYear').value;
        var searchname = document.getElementById('searchStudents-enrolled').value;

        $('#listallenrolled-table').load("Resources/data/enrolledstd.php", {
            course: course,
            yearLevel: yearLevel,
            searchname: searchname
        });
    });

    // adding new todo
    $("#addtodo").click(function(){
        var todoname = document.getElementById("todonameinput");

        // run data.php file from Resources/data
        $("#lists_all").load("Resources/data/data.php", {
            name: todoname.value,
            do: 'newtodo'
        });
        todoname.value = "";
    });

    // update database if checkbox is checked - todo
    $('input[type="checkbox"]').on('change', function(){
        var name = $(this).attr('name');
        var id = $(this).attr('id');
        var check = 0;
        if($(this).is(':checked')){
            check = 1;
        }
        console.log(name + " " + id + " " + check);

        $('#lists_all').load("Resources/data/data.php", {
            name: name,
            todoid: id,
            do: 'updatetodo',
            check: check
        });
    });

    // remove todo item by double clicking
    $(".item").dblclick(function(){
        var todoid = $(this).attr('id');
        var todoname = document.getElementById("todonameinput");
        $("#lists_all").load("Resources/data/data.php", {
            name: todoname.value,
            do: 'delete', 
            todoid: todoid
        });
    });

    // adding new semester popup
    $("#addnewsemester").click(function(){
        document.getElementById("newsempopup").classList.add("showSemPopup");
    });
    $("#addnewsemester-dropdown").click(function(){ // fix this soon
        document.getElementById("newsempopup").classList.add("showSemPopup");
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

    // search student on keyup
    $("#searchStudents").keyup(function(){
        var course = document.getElementById('courseList').value;
        var yearLevel = document.getElementById('optionYear').value;

        yearLevel = (yearLevel !== 'all') ? yearLevel : '';
        course = (course !== 'all') ? course : '';
        course = course + yearLevel;

        $("#adminlistofstudents").load("Resources/data/search.php", {
            searchstudent: 'students',
            search: this.value,
            course: course,
            count: 50
        });
    });

    // search student on keyup - enrolled student
    $('#searchStudents-enrolled').keyup(function(){
        var course = document.getElementById('select-courseList').value;
        var yearLevel = document.getElementById('select-optionYear').value;
        $('#listallenrolled-table').load("Resources/data/enrolledstd.php", {
            course: course,
            yearLevel: yearLevel,
            searchname: this.value
        });
    });

    // search faculties
    $('#searchTeachers').keyup(function(){
        $('#adminlistofteacher').load('Resources/data/search.php', {
            searchstudent: 'teachers',
            search: this.value,
            count: 50
        });
    });

    // option popup for studen list, onchange of select - to filter what to display
    $("#courseList").on('change', function(){
        console.log(this.value);
        var searchname = document.getElementById('searchStudents').value;
        var level = document.getElementById('optionYear').value;

        var course = (this.value !== 'all') ? this.value : '';
        var level = (level !== 'all') ? level : '';
        var search = course + level;

        $("#adminlistofstudents").load("Resources/data/search.php", {
            searchstudent: 'students',
            search: searchname,
            course: search,
            count: 50
        });
    });

    // option popup for enrolled student, onchange of select - dasboard
    $('#select-courseList').on('change', function(){
        var yearLevel = document.getElementById('select-optionYear').value;
        var searchname = document.getElementById('searchStudents-enrolled').value;
        $('#listallenrolled-table').load("Resources/data/enrolledstd.php", {
            course: this.value,
            yearLevel: yearLevel,
            searchname: searchname
        });
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

        $('#adminlistofstudents').load('Resources/data/search.php', {
            searchstudent: 'students',
            course: search,
            search: searchname,
            count: 50
        });
    });

    // year level select popup - dashboard page / for enrolled student
    $('#select-optionYear').on('change', function(){
        var course = document.getElementById('select-courseList').value;
        var searchname = document.getElementById('searchStudents-enrolled').value;
        document.getElementById('label-for-selected-level-dashboard').textContent = 'Level: ' + this.value;
        $('#listallenrolled-table').load("Resources/data/enrolledstd.php", {
            course: course,
            yearLevel: this.value,
            searchname: searchname
        });
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
                console.log('response ' + response.message);
                
                $(location).attr('href', 'dashboard.php');
            },
            error: function(xhr, status, error){
                console.error("AJAX Error:", status, error);
            }
        });
    });

    // enroll the student
    $('#enroll_student').click(function(){
        // user ajax
        $.ajax({
            url: '../../Model/enroll_std.inc.php',
            type: 'POST',
            data: {
                enrollstudent: true
            },
            success: function(response){
                console.log('response ' + response.selected_user);
                document.getElementById('std_enroll_popup').classList.remove('showSemPopup');
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

                    // navigate to editing subjects for enrolled student
                    clearDashboardPages();
                    document.getElementById('editstudentsubjects').classList.add('viewpage');
                } else {
                    document.getElementById('error-message').classList.add('showSemPopup');
                }
            },
            error: function(xhr, status, error){
                console.error("AJAX Error: ", status, error);
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

        $.ajax({
            url: '../../Model/announcements.inc.php',
            type: 'POST',
            data: {
                postAnnouncement: true,
                title: title.value,
                content: body.value,
                imagefile: 'none'
            },
            success: function(response){
                console.log(response.message);
                title.value = '';
                body.value = '';
                $(location).attr('href', 'announcements.php');
            },
            error: function(xhr, status, error){
                console.error("AJAX Error: ", status, error);
            }
        });
    });

    // show add new course popup - i really dont understand this yet
    $("#addnew_course_btn").click(function(){
        document.getElementById('addnew_course').classList.add('show_addnew_course');
    });

    $("#addnew_course_btn2").click(function(){
        document.getElementById('addnew_course').classList.add('show_addnew_course');
    });

    // more on exit buttons here

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
});