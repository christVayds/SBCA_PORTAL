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
function checkEmptyInput(formID, courseSelector, address){
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
        emptyInput.push(courseSelector);
    }
    var addr = document.getElementById(address);
    if(addr.value === ''){
        emptyInput.push(addr.id);
    }

    return emptyInput;
}

function clearDashboardPages(){
    var options = document.getElementsByClassName('option');
    var pages = document.getElementsByClassName('workcard');

    // clear tabs selected / active
    for(var i=0;i<options.length;i++){
        options[i].classList.remove("active");
    }

    // close / remove all active tabs
    for(var i=0;i<pages.length;i++){
        pages[i].classList.remove('viewpage');
    }
}

// JQUERY

// todo list
$(document).ready(function(){
    
    // admin navigation bar background color for active
    $(".option").click(function(){
        clearDashboardPages();
        // console.log($(this).attr('id'));
        document.getElementById($(this).attr('id')).classList.add("active");

        switch($(this).attr('id')){
            case('dashboardtab'):
                document.getElementById("_admindashboard").classList.add("viewpage");
                break;
            case('semestertab'):
                document.getElementById("semesterpage").classList.add("viewpage");
                break;
            case('studentlisttab'):
                document.getElementById('studentlistpage').classList.add("viewpage");
                break;
            case('teacherlisttab'):
                document.getElementById('teacherlistpage').classList.add("viewpage");
                break;
            case('courselisttab'):
                document.getElementById('courselistpage').classList.add("viewpage");
                break;
            case('announcementtab'):
                document.getElementById('announcementpage').classList.add("viewpage");
                break;
            case('todotab'):
                document.getElementById('todopage').classList.add("viewpage");
                break;
            // case('addnewstudent'):
            //     document.getElementById('newuserpage').classList.add("viewpage");
            //     break;
            default:
                console.log('page not found');
                break;
        }
    });

    // add new student page
    $("#addnewstudent").click(function(){
        // console.log('adding new student');
        clearDashboardPages();
        document.getElementById('newuserpage').classList.add('viewpage');
    });

    // dashboard information pop up - dashboard tab
    $(".enrolled_std").click(function(){
        document.getElementById('open_info_popup').classList.add('active_open_popup');
        var name = document.getElementById(this.id+'_name').textContent;
        document.getElementById('info_student_name').textContent = name;
    });

    // exit dashboard information pop up - dashboard tab
    $("#exit_d_info_p").click(function(){
        document.getElementById('open_info_popup').classList.remove('active_open_popup');
    });

    // students list popup option
    $("#adminstudentlist_option").click(function(){
        var stdpopup = document.getElementById("stdlst_popup");
        stdpopup.classList.add("showSemPopup");
    });

    // refresh student lists
    $("#refresh_studentlists").click(function(){
        $("#adminlistofstudents").load("Resources/data/refresh_stdlst.php", {
            refresh: 'showStudents'
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

    // remove todo by double clicking
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

    // show search input
    $("#searchstudent").click(function(){
        document.getElementById("searchinput").classList.add("showSearch");
        document.getElementById("searchStudents").focus();
    });

    // search student
    $("#searchStudents").keyup(function(){
        var search = $("#searchStudents").val();
        $("#adminlistofstudents").load("Resources/data/search.php", {
            searchstudent: 'student',
            search: search,
            count: 50
        });
    });

    // option popup for studen list, onchange of select
    $("#courseList").on('change', function(){
        $("#adminlistofstudents").load("Resources/data/search.php", {
            searchstudent: 'studentcourse',
            search: this.value,
            count: 50
        });
    });

    // get student data in table if click
    $(".studentrow").click(function(){
        console.log($(this).attr('id'));
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
        // var selectcourse = document.getElementById("course_option");
        // var course = selectcourse.options[selectcourse.selectedIndex].value;
        var address = document.getElementById("address").value;
        var course = document.getElementById('course_options'); // fix this

        // check if all input is not empty
        var allinput = checkEmptyInput("newstudentform", "course_options", "address");

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
            document.getElementById("save").classList.add("showError");
            document.getElementById("newstudentform").reset();
        }
    });

    // announcement page
    // click publish button
    $("#publish_btn").click(function(){
        document.getElementById("publish_event").classList.add("showSemPopup");
    });

    // exit publish popup
    $("#exit_publish").click(function(){
        document.getElementById("publish_event").classList.remove("showSemPopup");
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

    // show add new course popup
    $("#addnew_course_btn").click(function(){
        document.getElementById('addnew_course').classList.add('show_addnew_course');
    });
    $("#addnew_course_btn2").click(function(){
        document.getElementById('addnew_course').classList.add('show_addnew_course');
    });

    // exit add new course
    $("#exit_newcourse").click(function(){
        document.getElementById('addnew_course').classList.remove('show_addnew_course');
    });
});