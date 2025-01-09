<?php
    include 'base.php';
    include 'Resources/pages/pages.html.php';
?>

<!-- Account page Admin -->
<div class="account active">

    <!-- TAB BARS -->

    <div class="side acc_tabbar">
        <?php
            showTabs();
        ?>
    </div>

    <!-- about content view -->
    <div class="side acc_page about_content content_active" id="about_content">
        <?php
            include('Resources/pages/about.page.html.php');
        ?>
    </div>

    <!-- theme page -->
    <div class="side acc_page theme_content" id="theme_page">
        <div class="select_theme">
            <div class="theme_header">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun-moon"><path d="M12 8a2.83 2.83 0 0 0 4 4 4 4 0 1 1-4-4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.9 4.9 1.4 1.4"/><path d="m17.7 17.7 1.4 1.4"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.3 17.7-1.4 1.4"/><path d="m19.1 4.9-1.4 1.4"/></svg>
                <h3>Select theme</h3>
            </div>
            <div class="themes_items">
                <div class="theme" id="normal">
                    <div class="icon">
                        <i class="fa-regular fa-sun"></i>
                        <p>Normal</p>
                    </div>
                </div>
                <div class="theme" id="dark">
                    <div class="icon">
                        <i class="fa-solid fa-moon"></i>
                        <p>Dark</p>
                    </div>
                </div>
                <div class="theme">
                    <div class="icon">
                        <i class="fa-solid fa-pencil"></i>
                        <p>Pencil</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- change password page -->
    <div class="side acc_page change_pass_content" id="change_pass_page">
        <?php
            include('Resources/pages/changepassword.html.php');
        ?>
    </div>

    <!-- Settings -->
    <div class="side acc_page settings_content" id="settings_page">

        <!-- POPUP for SETTINGS -->

         <!-- add colors -->
        <div class="popup" id="add-color_popup">
            <div class="popupbox">
                <div class="popupHeader">
                    <h3 class="label">
                        <i class="fa-solid fa-brush"></i> 
                        <p>Choose colors</p>
                    </h3>
                    <i id="exit_add-color" class="fa-solid fa-xmark exit"></i>
                </div>
                <div class="popupcontent">

                </div>
            </div>
        </div>

        <!-- add admin -->
        <div class="popup" id="add-admin_popup">
            <div class="popupbox">
                <div class="popupHeader">
                    <h3 class="label">
                        <i class="fa-solid fa-user-tie"></i>
                        <p>New admin</p>
                    </h3>
                    <i id="exit_add-admin_popup" class="fa-solid fa-xmark exit"></i>
                </div>

                <div class="popupcontent">
                    <div class="line">
                        <label for="new_admin_username">Admin username</label>
                        <input type="text" placeholder="Username" id="new_admin_username" autocomplete="off">
                    </div>
                    <div class="line">
                        <label for="new_admin_password">Admin password</label>
                        <input type="text" placeholder="Password" id="new_admin_password" autocomplete="off" value="sbcaeduph_admin">
                    </div>
                    <div class="line">
                        <label for="new_admin_email">Admin email</label>
                        <input type="email" placeholder="Email" id="new_admin_email" autocomplete="off">
                    </div>
                    <div class="line">
                        <label for="new_admin_role">Admin role</label>
                        <select name="new_admin_role" id="new_admin_role">
                            <option value="accounting">Accounting</option>
                            <option value="registration">Registration</option>
                            <option value="superadmin">Super admin</option>
                        </select>
                    </div>

                    <div class="line action">
                        <button id="addadmin-btn">Save admin</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- add subject -->
        <div class="popup" id="manage-database_popup">
            <div class="popupbox">
                <div class="popupHeader">
                    <h3 class="label">
                        <i class="fa-solid fa-database"></i> 
                        <p>Add new subject</p>
                    </h3>
                    <i id="exit_manage-database" class="fa-solid fa-xmark exit"></i>
                </div>

                <div class="popupcontent">
                    <div class="line">
                        <label for="addsubject_name">Subject Name</label>
                        <input type="text" placeholder="Subject Name" id="addsubject_name" autocomplete="off">
                    </div>
                    <div class="line">
                        <label for="addsubject_code">Subject Code</label>
                        <input type="text" placeholder="Subject Code" id="addsubject_code" autocomplete="off">
                    </div>
                    <div class="line">
                        <label for="addsubject_unit">Units</label>
                        <input type="text" placeholder="Units" id="addsubject_unit" autocomplete="off" value="3">
                    </div>
                    <div class="line">
                        <label for="addsubject_major">Major</label>
                        <select name="addsubject_major" id="addsubject_major">
                            <option value="1">Major subject</option>
                            <option value="0">Minor Subject</option>
                        </select>
                    </div>
                    <div class="line">
                        <label for="addsubject_course">Course</label>
                        <select name="addsubject_course" id="addsubject_course">
                            <option value="bsit">BSIT</option>
                            <option value="bsba">BSBA</option>
                            <option value="bshm">BSHM</option>
                            <option value="none">Minor subject</option>
                        </select>
                    </div>
                    <div class="line">
                        <label for="addsubject_year">Year</label>
                        <select name="addsubject_year" id="addsubject_year">
                            <option value="1">1st year</option>
                            <option value="2">2nd year</option>
                            <option value="3">3rd year</option>
                            <option value="4">4th year</option>
                        </select>
                    </div>
                    <div class="line">
                        <label for="addsubject_semester">Semester</label>
                        <select name="addsubject_semester" id="addsubject_semester">
                            <option value="1">1st semester</option>
                            <option value="2">2nd semester</option>
                        </select>
                    </div>
                    <div class="line action">
                        <button id="addsubject-btn">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- show all accounts -->
        <div class="popup" id="users_acc_popup">
            <div class="popupbox longer">
                <div class="popupHeader">
                    <h3 class="label">
                        <i class="fa-solid fa-user"></i>
                        <p>Accounts</p>
                    </h3>
                    <i id="exit_users_acc" class="fa-solid fa-xmark exit"></i>
                </div>

                <div class="popupcontent">
                    <div class="line action">
                        <div class="element">
                            <input type="text" placeholder="Search..." autocomplete="off" id="search_users_acc">
                        </div>
                    </div>
                    <div class="table">
                        <table class="display-table" id="allUsersTable">
                            <thead class="table-row">
                                <th class="table-header table-id">ID NO.</th>
                                <th class="table-header table-name">Name</th>
                                <th class="table-header table-id">Course</th>
                                <th class="table-header table-long">Email</th>
                                <th class="table-header table-short">Active</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- show actions for selected account -->
        <div class="popup" id="info_users_acc_popup">
            <div class="popupbox">
                <div class="popupHeader">
                    <h3 class="label">
                        <i class="fa-solid fa-user"></i>
                        <p id="getuserame_users_acc">Loading...</p>
                    </h3>
                    <i id="exit_info_users_acc" class="fa-solid fa-xmark exit"></i>
                </div>
                <div class="popupcontent">
                    <div class="line options selected-userAcc-option" value="reset-password">
                        <i class="fa-solid fa-rotate-left"></i>
                        <p>Reset password</p>
                    </div>
                    <div class="line options selected-userAcc-option" value="activate">
                        <i class="fa-solid fa-user-plus"></i>
                        <p>Activate account</p>
                    </div>
                    <div class="line options selected-userAcc-option" value="deactivate">
                        <i class="fa-solid fa-user-minus"></i>
                        <p>Deactivate account</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- user profile card version -->
        <div class="popup user-profile" id="settings-user-cardid">
            <div class="card">
                <div class="card-rotate">
                    <div class="usercard-content front">
                        <div class="card-header">
                            <h4>SBCA PORTAL</h4>
                        </div>
                        <div class="info-sides">
                            <div class="side image">
                                <div class="user">
                                    <img src="Resources/assets/sbca.logo.5.jpg" alt="userimage" id="card-user-photo">
                                    <p id="card-user-id">Loading...</p>
                                </div>
                            </div>
                            <div class="side info">
                                <div class="user-name">
                                    <p id="user-name">Christian</p>
                                    <h1 id="user-lname">Vaydal</h1>
                                    <p id="user-course">BS Information Technology</p>
                                </div>
                                <div class="line">
                                    <i class="fa-regular fa-user"></i>
                                    <p id="card-user-userid">Test-User-id</p>
                                </div>
                                <div class="line">
                                    <i class="fa-regular fa-envelope"></i>
                                    <p id="card-user-email">cvaydal@sbca.edu.ph</p>
                                </div>
                                <div class="line">
                                    <i class="fa-solid fa-child"></i>
                                    <p id="card-user-bdate">11/10/2000</p>
                                </div>
                                <div class="line">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p id="card-user-address">Pasay City, Metro Manila</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- back -->
                    <div class="usercard-content back">
                        <div class="info-sides">
                            <div class="side image">
                                <div class="user qr">
                                    <img src="Resources/assets/sbcaqrcode.svg" alt="www.sbca.edu.ph">
                                    <p>www.sbca.edu.ph</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit user profile -->
        <div class="popup user-profile" id="settings-user-profile">
            <div class="profile-content">
                <div class="sides">
                    <div class="side profile-box">
                        <div class="name-photo">
                            <img src="Resources/assets/sbca.logo.5.jpg" alt="user-profile" id="proile-user-image">
                            <p class="username" id="profile-user-username">@sbcaeduph</p>
                            <p id="profile-user-fullname">St. Bernadette College of Alabang</p>
                            <p class="username" id="profile-user-role">Registration</p>
                            <div class="actions">
                                <div class="button" id="save-edit-profile">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                    <p>Save</p>
                                </div>
                                <div class="button" id="cancel-edit-profile">
                                    <i class="fa-solid fa-xmark"></i>
                                    <p>Cancel</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="side edit-profile-box">
                        <div class="line">
                            <h3>Upload image file</h3>
                            <div class="upload-image">
                                <div class="image-uploader-box" id="upload-image-file-box">
                                    <i class="fa-regular fa-image"></i>
                                </div>
                            </div>
                        </div>
                        <div class="line">
                            <h3>Paste image link online</h3>
                            <input type="text" placeholder="Image link" id="linkImage">
                        </div>
                        <div class="line">
                            <h3>User information</h3>
                            <div class="edit-user-info">
                                <input type="text" placeholder="Current Home Address" id="profile-user-address">
                                <input type="file" class="hide" id="upload-imgae-file">
                            </div>
                            <div class="withlabelinput">
                                <p>Birthdate</p>
                                <input type="date" id="profile-user-bdate">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END OF POPUP FOR SETTINGS -->
        <div class="content">
            <div class="side setting">
                <div class="settingbox">
                    
                    <h1 class="header">
                        <i class="fa-solid fa-wrench"></i>
                        <p>Settings</p>
                    </h1>

                    <!-- load settings here -->
                    <div class="loadSettings" id="load-settings"></div>
                </div>
            </div>
            <div class="side user">
                <div class="userbox">
                    <div class="header">
                        <img src="Resources/assets/sbca.logo3.png" alt="user-photo" id="settings-user-photo">
                        <div class="nameuser">
                            <p class="name" id="setting-user-name">Loading.../p>
                            <p class="role" id="settings-user-role">Loading...</p>
                        </div>
                    </div>
                    <div class="actions">
                        <a class="action" id="show-edit-user-profile">
                            <i class="fa-solid fa-address-card"></i>
                            <p>Your SBCA PORTAL ID</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- logout page -->
    <div class="side acc_page logout_content" id="logout_page">
        <!-- popup for logout -->
        <div class="logout_popup" id="logout_popup">
            <div class="popup_box">
                <div class="header">
                    <p>Logout</p>
                    <i class="fa-solid fa-xmark" id="exit_logout"></i>
                </div>
                <div class="content">
                    <h3>Are you sure to logout?</h3>
                </div>
                <div class="action">
                    <button id="logout_btn" name="logout_btn">Logout</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script src="Resources/script/account.js"></script> -->