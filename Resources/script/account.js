// for transition images in cover image background
var coverImagesLink = [];

// check for user to display in tab

function convertTo12HourFormat(time){
    const [hour, minute] = time.split(':');

    var formatHour = hour % 12 || 12;
    const period = hour >= 12 ? 'am' : 'pm';

    return `${formatHour}:${minute} ${period}`;
}

function allUsersTable(data=[]){
    var table = document.getElementById('allUsersTable');
    var tbody = table.querySelector('tbody');

    var newRow = document.createElement('tr');
    newRow.className = 'table-user';
    newRow.id = 'alluser-' + data.at(-1);

    for(var i = 0; i<5;i++){
        var newData = document.createElement('td');
        newData.className = 'table-data';
        newData.textContent = data[i];
        newRow.appendChild(newData);
    }

    tbody.appendChild(newRow);
}

function LoadSettings(data=[]){
    // console.log('hello world');
    var settings = document.getElementById('load-settings');
    var settingItem = document.createElement('div');
    var settingIconH2 = document.createElement('h2');
    var settingIcon = document.createElement('i');
    var settingsName = document.createElement('div');
    var settingsNameH3 = document.createElement('h3');
    var settingsDescription = document.createElement('div');
    var settingsDescriptionP = document.createElement('p');

    settingItem.id = data[3];
    settingItem.className = 'settingItem';
    settingIcon.className = data[2];
    settingsName.className = 'settingname';
    settingsNameH3.textContent = data[0];
    settingsDescriptionP.textContent = data[1];

    settingsDescription.appendChild(settingsDescriptionP);
    settingsName.appendChild(settingsNameH3);
    settingsName.appendChild(settingsDescription);
    settingIconH2.appendChild(settingIcon);
    settingItem.appendChild(settingIconH2);
    settingItem.appendChild(settingsName);
    settings.appendChild(settingItem);
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
                    document.getElementById('setting-user-name').textContent = response.data['fullname'];
                    document.getElementById('settings-user-photo').src = response.data['imageLink'];
                    document.getElementById('settings-user-role').textContent = response.data['user'];
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function fetchSettingsItems(){
        $.ajax({
            url: '../../Model/settings.inc.php',
            type: 'POST',
            data: {
                getUserSettings: true
            },
            success: function(response){
                if(response.success){
                    // console.log(response.message);
                    $('#load-settings div').remove();
                    response.data.forEach(data => {
                        LoadSettings(data);
                    })
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function fetchAllAccount(search=''){
        $.ajax({
            url: '../../Model/semester.inc.php',
            type: 'POST',
            data: {
                getAllAccounts: true,
                search: search
            },
            success: function(response){
                if(response.success){
                    $('#allUsersTable tbody tr').remove();
                    response.data.forEach(data => {
                        allUsersTable(data);
                    })
                } else {
                    console.log(response.message);
                }
            },
            error: function(error){
                console.log(error);
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
            // accounting tab
            case('acc_tab'):
                document.getElementById('acc_content').classList.add('content_active');
                break;

            // about page tab
            case("about_tab"):
                document.getElementById("about_content").classList.add("content_active");
                break;

            // theme page tabe
            case("theme_tab"):
                document.getElementById("theme_page").classList.add("content_active");
                break;

            // change password page tab
            case("pass_tab"):
                document.getElementById("change_pass_page").classList.add("content_active");
                break;

            // logout popup tab
            case("out_tab"):
                document.getElementById("logout_page").classList.add("content_active");
                document.getElementById("logout_popup").classList.add('show_logout');
                break;

            // settings page tab
            case("setting_tab"):
                fetchDataSettings();
                // LoadSettings(['Add themes', 'Description', 'fa-solid fa-brush', 'id-name']);
                fetchSettingsItems();
                document.getElementById('settings_page').classList.add('content_active');
                break;

            // default
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

    $('#load-settings').on('click', '.settingItem', function(){
        var ItemID = this.id;
        const show = 'showPopUp';

        switch(ItemID){
            case('costume-color'):
                document.getElementById('add-color_popup').classList.add(show);
                break;
            case('manage-database'):
                document.getElementById('manage-database_popup').classList.add(show);
                break;
            case('users-account'):
                var search = document.getElementById('search_users_acc').value;
                fetchAllAccount(search);
                document.getElementById('users_acc_popup').classList.add('showPopUp');
                break;
            case('add-admin-btn'):
                document.getElementById('add-admin_popup').classList.add('showPopUp');
                break;
            // add help and report a problem
            default:
                console.log('Item Not Found');
        }
    });

    $('#exit_add-color').click(function(){
        document.getElementById('add-color_popup').classList.remove('showPopUp');
    })

    $('#exit_manage-database').click(function(){
        document.getElementById('manage-database_popup').classList.remove('showPopUp');
    })

    // save new subject
    $('#addsubject-btn').click(function(){
        const subjName = document.getElementById('addsubject_name');
        const subjCode = document.getElementById('addsubject_code');
        const subjCourse = document.getElementById('addsubject_course');
        const subjYear = document.getElementById('addsubject_year');
        const subjSemester = document.getElementById('addsubject_semester');
        const units = document.getElementById('addsubject_unit');
        const major = document.getElementById('addsubject_major');

        if(subjCode.value && subjName.value){
            $.ajax({
                url: '../../Model/schedules.inc.php',
                type: 'POST',
                data: {
                    addNewSubject: true,
                    subjName: subjName.value,
                    subjCode: subjCode.value,
                    subjCourse: subjCourse.value,
                    subjYear: subjYear.value,
                    subjSemester: subjSemester.value,
                    units: units.value,
                    major: major.value
                },
                success: function(response){
                    if(response.success){
                        console.log(response.message);
                    } else {
                        console.log(response.message);
                    }
    
                    document.getElementById('manage-database_popup').classList.remove('showPopUp');
                },
                error: function(error){
                    console.log(error);
                }
            });
        } else {
            console.log('Empty credentials');
        }
    });

    // search users in all users account page
    $('#search_users_acc').keyup(function(){
        fetchAllAccount(this.value);
    });

    // select account in all users account table
    $('#allUsersTable').on('click', '.table-user', function(){
        var username = this.id.slice(8);
        document.getElementById('info_users_acc_popup').classList.add('showPopUp');

        $.ajax({
            url: '../../Model/semester.inc.php',
            type: 'POST',
            data: {
                getUser: username
            },
            success: function(response){
                if(response.success){
                    document.getElementById('getuserame_users_acc').textContent = response.data['fullname'];
                    // console.log(response.message);
                } else {
                    console.log(response.message);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    // get action to selected user
    $('.selected-userAcc-option').click(function(){
        var search = document.getElementById('search_users_acc').value;
        // console.log($(this).attr('value'));
        
        $.ajax({
            url: '../../Model/semester.inc.php',
            type: 'POST',
            data: {
                allUsersAccAction: $(this).attr('value')
            },
            success: function(response){
                if(response.success){
                    console.log(response.message);
                    fetchAllAccount(search);
                } else {
                    console.log(response.message);
                }
            },
            error: function(error){
                console.log(error);
            }
        });

        document.getElementById('info_users_acc_popup').classList.remove('showPopUp');
    });

    $('#exit_info_users_acc').click(function(){
        document.getElementById('info_users_acc_popup').classList.remove('showPopUp');
    }); 

    $('#exit_users_acc').click(function(){
        document.getElementById('users_acc_popup').classList.remove('showPopUp');
    });

    // edit user profile in settings

    // open card
    $('#show-edit-user-profile').click(function(){
        document.getElementById('settings-user-cardid').classList.add('showPopUp');
        // document.getElementById('settings-user-profile').classList.add('showPopUp');

        $.ajax({
            url: '../../Model/semester.inc.php',
            type: 'POST',
            data: {
                getUserInSession: true
            },
            success: function(response){
                if(response.success){
                    if(response.data.imageLink){
                        document.getElementById('card-user-photo').src = response.data.imageLink;
                    }
                    document.getElementById('card-user-id').textContent = response.data.username;
                    document.getElementById('user-name').textContent = response.data.fname;
                    document.getElementById('user-lname').textContent = response.data.lname;
                    document.getElementById('user-course').textContent = response.data.role;
                    document.getElementById('card-user-userid').textContent = response.data.id;
                    document.getElementById('card-user-email').textContent = response.data.email;
                    document.getElementById('card-user-bdate').textContent = response.data.bdate;
                    document.getElementById('card-user-address').textContent = response.data.address;
                } else {
                    console.log(response.message);
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    });

    // close card
    $('#settings-user-cardid').click(function(){
        this.classList.remove('showPopUp');
    });

    // open edit profile popup in settings
    $('#settings-user-photo').click(function(){
        document.getElementById('settings-user-profile').classList.add('showPopUp');

        $.ajax({
            url: '../../Model/settings.inc.php',
            type: 'POST',
            data: {
                getUserProfile: true
            },
            success: function(response){
                if(response.success){
                    document.getElementById('profile-user-username').textContent = response.data.username;
                    document.getElementById('profile-user-fullname').textContent = response.data.fullname;
                    document.getElementById('profile-user-role').textContent = response.data.role;
                    document.getElementById('proile-user-image').src = response.data.imageLink;
                    document.getElementById('profile-user-address').value = response.data.address;
                    document.getElementById('profile-user-bdate').value = response.data.bdate;
                    document.getElementById('linkImage').value = response.data.imageLink;
                } else {
                    console.log(response.message);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    $('#save-edit-profile').click(function(){
        document.getElementById('settings-user-profile').classList.remove('showPopUp');

        var filepicker = document.getElementById('upload-imgae-file');
        var imagelink  = document.getElementById('linkImage');
        const address = document.getElementById('profile-user-address').value;
        const bdate = document.getElementById('profile-user-bdate').value;

        var link = '';
        var typeImage = 'file';

        if(filepicker.value){
            console.log('file: ' + filepicker.value);
            typeImage = 'file';
            link = filepicker.value;
        } else if (imagelink.value){
            // console.log('link: ' + imagelink.value);
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
                link: link,
                address: address,
                bdate: bdate
            },
            success: function(response){
                if(response.success){
                    // console.log('responce: ' + response.message);
                }
            },
            error: function(){

            }
        });
    });

    $('#cancel-edit-profile').click(function(){
        document.getElementById('settings-user-profile').classList.remove('showPopUp');
    });
    
    // save new admin
    $('#addadmin-btn').click(function(){
        const username = document.getElementById('new_admin_username');
        const password = document.getElementById('new_admin_password');
        const email = document.getElementById('new_admin_email');
        const role = document.getElementById('new_admin_role');

        $.ajax({
            url: '../../Model/semester.inc.php',
            type: 'POST',
            data: {
                addnewAdmin: username.value,
                password: password.value,
                email: email.value,
                role: role.value
            },
            success: function(response){
                if(response.success){
                    username.value = '';
                    email.value = '';
                } else {
                    console.log(response.message);
                }
                document.getElementById('add-admin_popup').classList.remove('showPopUp');
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    // exit add new admin
    $('#exit_add-admin_popup').click(function(){
        document.getElementById('add-admin_popup').classList.remove('showPopUp');
    })

    // upload new profile picture
    $('#upload-image-file-box').click(function(){
        var filepicker = document.getElementById('upload-imgae-file');

        filepicker.click();
    });
});