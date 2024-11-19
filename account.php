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
                <div class="theme" id="christmas">
                    <div class="icon">
                        <i class="fa-solid fa-candy-cane"></i>
                        <p>Christmas</p>
                    </div>
                </div>
                <div class="theme" id="schedule">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hourglass"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg>
                        <p>Set Schedule</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="theme_schedule">
            <div class="time_to_off">
                <p>Darkmode turn off at <span id="end_darkmode">6:00am</span></p>

                <div class="time_picker">
                    <label for="start_time_theme">Start time</label>
                    <input type="time" value="20:00" id="start_time_theme">
                </div>
                <div class="time_picker">
                    <label for="end_time_theme">End time</label>
                    <input type="time" value="06:00" id="end_time_theme">
                </div>
                <div class="info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                    <p>Dark mode is conducive to focused work environments, enhancing productivity and reducing visual distractions, especially during nighttime tasks.</p>
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

        <!-- import data -->
        <div class="popup import" id="import_popup">
            <div class="popupbox">
                <div class="popupHeader">
                    <h3 class="label">
                        <i class="fa-regular fa-bell"></i>    
                        <p>Select File</p>
                    </h3>
                    <i id="exit_import" class="fa-solid fa-xmark"></i>
                </div>
                <div class="selectFile">
                    <div class="openFile">
                        <div class="file">
                            <i class="fa-solid fa-file"></i>
                            <p>Open file manager or drag your file here</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- export data -->
        <div class="popup export" id="export_popup">
            <div class="popupbox">
                <div class="popupHeader">
                    <h3 class="label">
                        <i class="fa-regular fa-bell"></i>    
                        <p>Export Data</p>
                    </h3>
                    <i id="exit_export" class="fa-solid fa-xmark"></i>
                </div>
                <div class="exportSet">
                    <div class="filename">
                        <p>File name:</p>
                        <input type="text" placeholder="Filename" id="filename">
                    </div>
                    <div class="filename">
                        <p>Export to:</p>
                        <div class="selectToExport">
                            <p id="selectedExport">Excel</p>
                            <div class="options">
                                <p>Excel</p>
                                <p>CSV File</p>
                            </div>
                        </div>
                    </div>
                    <div class="submit">
                        <button>Export</button>
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
                            <img src="https://i.pinimg.com/236x/24/93/21/2493217e597e1ea61077b1f42892effb.jpg" alt="">
                            <p class="username">@sbcaeduph</p>
                            <p>St. Bernadette College of Alabang</p>
                            <p class="username">Registration</p>
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
                                <input type="text" placeholder="First Name">
                                <input type="text" placeholder="Last Name">
                                <input type="text" placeholder="Middle Name">
                                <input type="text" placeholder="School ID no.">
                                <input type="text" placeholder="Current Home Address">
                                <input type="file" placeholder="Current Home Address" class="hide" id="upload-imgae-file">
                            </div>
                            <div class="withlabelinput">
                                <p>Birthdate</p>
                                <input type="date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END OF POPUP FOR SETTINGS -->
        <div class="content">
            <?php include 'Resources/pages/settings.html.php'; ?>
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