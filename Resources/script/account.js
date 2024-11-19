// for transition images in cover image background
var coverImagesLink = [];

// check for user to display in tab

function convertTo12HourFormat(time){
    const [hour, minute] = time.split(':');

    var formatHour = hour % 12 || 12;
    const period = hour >= 12 ? 'am' : 'pm';

    return `${formatHour}:${minute} ${period}`;
}

// tab bar
$(document).ready(function(){

    // fetch data functions
    function fetchDataSettings(){
        $.ajax({
            url: '../../Model/editprofile.inc.php',
            type: 'POST',
            data: {
                updateStudentDashboard: true
            },
            success: function(response){
                if(response.success){
                    document.getElementById('settings-user-photo').src = response.data['imageLink'];
                }
            },
            error: function(){

            }
        });
    }

    // auto on or off dark mode ??
    $("#end_time_theme").on('change', function(){
        document.getElementById('end_darkmode').textContent = convertTo12HourFormat(this.value); // add this to session or cookie data
    });

    $(".acc_tabs").click(function(){
        var tabs = document.getElementsByClassName(this.className);
        var pages = document.getElementsByClassName("acc_page");

        // remove all classlist in tabs
        for(var i=0;i<tabs.length;i++){
            tabs[i].classList.remove("active_tab");
        }
        // remove all classlist in pages
        for(var i=0;i<pages.length;i++){
            if(!(pages[i].id === 'logout_page')){
                pages[i].classList.remove("content_active");
            }
        }

        document.getElementById(this.id).classList.add("active_tab");

        switch(this.id){
            // case("acc_tab"):
            //     document.getElementById("acc_content").classList.add("content_active");
            //     break;
            case("about_tab"):
                document.getElementById("about_content").classList.add("content_active");
                break;
            case("theme_tab"):
                document.getElementById("theme_page").classList.add("content_active");
                break;
            case("pass_tab"):
                document.getElementById("change_pass_page").classList.add("content_active");
                break;
            case("out_tab"):
                document.getElementById("logout_page").classList.add("content_active");
                document.getElementById("logout_popup").classList.add('show_logout');
                break;
            case("setting_tab"):
                fetchDataSettings();
                document.getElementById('settings_page').classList.add('content_active');
                break;
            default:
                console.log("Page not available");
                break;
        }
    });

    // check new password if same
    $("#pass2").keyup(function(){
        var pass1 = $("#pass1").val();
        var pass2 = $(this).val();
        var oldpass = $('#oldpass').val();

        if(pass2 === pass1 && pass2.length >= 8 && oldpass){ // check if pass2 and pass 1 is equal and pass2.lenght >= 8 and old password entry is not empty
            document.getElementById('save_password').disabled = false;
        } else {
            document.getElementById('save_password').disabled = true;
        }
    });

    // check for old password entry
    $('#oldpass').keyup(function(){
        var pass1 = $('#pass1').val();
        var pass2 = $('#pass2').val();
        var oldpass = $(this).val();

        if(pass1 === pass2 && pass1.length >= 8 && oldpass){ // check if pass2 and pass 1 is equal and pass2.lenght >= 8 and old password entry is not empty
            document.getElementById('save_password').disabled = false;
        } else {
            document.getElementById('save_password').disabled = true;
        }
    });

    // also check for entry pass1 for changes
    $('#pass1').keyup(function(){
        var pass1 = $(this).val();
        var pass2 = $('#pass2').val();
        var oldpass = $('#oldpass').val();

        if(pass1 === pass2 && pass1.length >= 8 && oldpass){ // check if pass2 and pass 1 is equal and pass2.lenght >= 8 and old password entry is not empty
            document.getElementById('save_password').disabled = false;
        } else {
            document.getElementById('save_password').disabled = true;
        }
    });

    // save the password to database ( i dont think this one works haha)
    $('#save_password').click(function(){
        var password = $('#pass2').val(); // get the value of the second input password
        
        $.ajax({
            url: '../../Model/security.inc.php',
            type: 'POST',
            data: {submit: 'sbca'},
            success: function(response){
                // success
            },
            error: function(){
                // error
            }
        });
    });

    // exit logout
    $('#exit_logout').click(function(){
        document.getElementById('logout_page').classList.remove('content_active');
        document.getElementById('out_tab').classList.remove('active_tab');

        // fix this
        document.getElementById('about_tab').classList.add('active_tab');
        document.getElementById('about_content').classList.add('content_active');
    });

    // logout button
    $("#logout_btn").click(function(){
        sessionStorage.clear();
        window.location.href = 'Model/logout.inc.php';
    });

    // Settings
    $('#import').click(function(){
        document.getElementById('import_popup').classList.add('showPopUp');
    });

    $('#exit_import').click(function(){
        document.getElementById('import_popup').classList.remove('showPopUp');
    });

    $('#export').click(function(){
        document.getElementById('export_popup').classList.add('showPopUp');
    });

    $('#exit_export').click(function(){
        document.getElementById('export_popup').classList.remove('showPopUp');
    });

    // edit user profile in settings

    $('#show-edit-user-profile').click(function(){
        document.getElementById('settings-user-profile').classList.add('showPopUp');
    });

    $('#save-edit-profile').click(function(){
        document.getElementById('settings-user-profile').classList.remove('showPopUp');

        var filepicker = document.getElementById('upload-imgae-file');
        var imagelink  = document.getElementById('linkImage');

        var link = '';
        var typeImage = 'file';

        if(filepicker.value){
            console.log('file: ' + filepicker.value);
            typeImage = 'file';
            link = filepicker.value;
        } else if (imagelink.value){
            console.log('link: ' + imagelink.value);
            typeImage = 'link';
            link = imagelink.value;
        } else {
            typeImage = 'none';
        }

        $.ajax({
            url: '../../Model/editprofile.inc.php',
            type: 'POST',
            data: {
                imageType: typeImage,
                link: link
            },
            success: function(response){
                if(response.success){
                    console.log('responce: ' + response.message);
                }
            },
            error: function(){

            }
        });
    });

    $('#cancel-edit-profile').click(function(){
        document.getElementById('settings-user-profile').classList.remove('showPopUp');
    });

    // upload new profile picture
    $('#upload-image-file-box').click(function(){
        var filepicker = document.getElementById('upload-imgae-file');

        filepicker.click();
    });
});