// check for active or current page
var url = window.location.href;
var page = url.substring(url.lastIndexOf('/')+1);

if(sessionStorage.length == 0 || sessionStorage.getItem('mode') === null){
    sessionStorage.setItem('mode', 'white');
}

$(document).ready(function(){

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
                    console.log(response.data);
                    document.getElementById('std-image').src = response.data['imageLink'];
                }
            },
            error: function(){

            }
        });
    }

    switch(page){
        case('dashboard.php'):
            document.getElementById('dashboard').classList.add('active');
            studentDashboard(); // fetch data in student's dashboard
            fetchsemesterData();
            break;
        case('accounting.php'):
            document.getElementById('accounting').classList.add('active');
            break;
        case('announcements.php'):
            document.getElementById('news-updates').classList.add('active');
            document.getElementById("icon_announce").classList.add('fa-solid');
            break;
        case('account.php'):
            document.getElementById('account').classList.add('active');
            document.getElementById("icon_account").classList.add('fa-solid');
            break;
    }

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
});