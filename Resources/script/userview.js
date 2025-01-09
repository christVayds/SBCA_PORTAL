var user = 'admin';

// dashboard page
var pages = document.getElementsByClassName('dashboard');

for(var i=0;i<pages.length;i++){
    document.getElementById(pages[i].id).classList.remove('active');
}

switch(user){
    case('student'):
        document.getElementById('student').classList.add('active');
        break;
    case('admin'):
        document.getElementById('admin').classList.add('active');
        break;
    default:
        console.log('Page not available');
        window.location.href = "login.php";
        break;
}