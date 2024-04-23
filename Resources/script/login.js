
// get the user param
var url_str = window.location.href;
var userparam = new URLSearchParams(url_str.split('?')[1]);
var active_user = userparam.get('user');
if(active_user === null){
    window.location.href = 'login.php?user=student'; // default user is student
}

$(document).ready(function(){
    // remove active user tab
    var usersClass = document.getElementsByClassName('user');
    for(var i=0;i<usersClass.length;i++){
        usersClass[i].classList.remove('active');
    }

    var userImage = document.getElementById('userImage');
    userImage.classList.remove('slide_img'); // remove animation
    void userImage.offsetWidth; // trigger reflow
    userImage.classList.add('slide_img'); // add animation again

    switch(active_user){
        case('student'):
            document.getElementById(active_user).classList.add('active');
            userImage.src = 'Resources/assets/student.nobg.png';
            sessionStorage.setItem('user', 'student');
            break;
        case('teacher'):
            document.getElementById(active_user).classList.add('active');
            userImage.src = 'Resources/assets/teacher.nobg.png';
            sessionStorage.setItem('user', 'student');
            break;
        case('sbca'):
            document.getElementById(active_user).classList.add('active');
            userImage.src = 'Resources/assets/tom.nobg.png';
            sessionStorage.setItem('user', 'student');
            break;
        default:
            window.location.href = 'login.php?user=student';
            break;
    }
});