<!-- admin's tabbars -->
<div class="tabs tabbar">
    <div class="option active" id="semestertab">
        <i class="fa-solid fa-table"></i>
        <p>Dashboard</p>
    </div>
    <div class="option" id="studentlisttab">
        <i class="fa-solid fa-graduation-cap"></i>
        <p>Students</p>
    </div>
    <div class="option" id="teacherlisttab">
        <i class="fa-solid fa-chalkboard-user"></i>
        <p>Teachers</p>
    </div>
    <div class="option" id="courselisttab">
        <i class="fa-solid fa-chalkboard"></i>
        <p>Courses</p>
    </div>
    <div class="option" id="scheduletab">
        <i class="fa-regular fa-calendar-days"></i>
        <p>Schedules</p>
    </div>
    <div class="option" id="announcementtab">
        <i class="fa-solid fa-newspaper"></i>
        <p>Announcements</p>
    </div>
    <div class="option" id="todotab">
        <i class="fa-solid fa-list"></i>
        <p>Todo List</p>
    </div>
</div>

<div class="tabs workspace">

<!-- THE MAIN DAHSBOARD IS THE SEMESTER PAGE -->
<!-- dashboard view -->
    <div class="workcard Dashboardview" id="_admindashboard">

        <div class="blurbg " id="select-level"> <!--- active: showSemPopup ---->
            <div class="view_select-level_popup" id="view_select-level_popup">
                <div class="header">
                    <div class="headertitle">
                        <p>Select level</p>
                    </div>
                    <div class="exit" id="exit_select-level_popup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                    </div>
                </div>
                <div class="drop-down-options">
                    <div class="popupOptions">
                        <div class="optionsContent">
                            <label for="select-courseList">Course</label>
                            <select name="listCourse" id="select-courseList">
                                <option value="bsit">BS Information Technology</option>
                                <option value="bsba">BS Business Ad</option>
                                <option value="bshm">BS Hospitality Management</option>
                                <option value="bspsych">BS Psychology</option>
                            </select>
                        </div>
                        <div class="optionsContent">
                            <label for="select-optionYear">Year</label>
                            <select name="optionYear" id="select-optionYear">
                                <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                                <option value="4">4th Year</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="open_info_popup " id="open_info_popup"> <!-- active: active_open_popup -->
            <!-- show dashboard contents -->
        </div>

        <div class="header">
            <div class="actionside">
                <div class="_actions">
                    <div class="actions" id="admindb_option">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    </div>
                    <!-- drop down for dashboard menu icon -->
                    <div class="dropdown">
                        <div class="selection">
                            <div class="label">
                                <i class="fa-solid fa-user-large"></i>
                                <p>Year</p>
                            </div>
                            <div class="q_dropdown">
                                <p>3rd</p>
                                <div class="q_selection">
                                    <p>1st</p>
                                    <p>2nd</p>
                                    <p>3rd</p>
                                    <p>4th</p>
                                </div>
                            </div>
                        </div>
                        <div class="selection">
                            <div class="label">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <p>Course</p>
                            </div>
                            <div class="q_dropdown">
                                <p>BS Information Technology</p>
                                <div class="q_selection">
                                    <p>BS Information Technology</p>
                                    <p>BS Hospitality Managemennt</p>
                                    <p>BS Business Ad</p>
                                    <p>BS Psychology</p>
                                </div>
                            </div>
                        </div>
                        <div class="selection">
                            <div class="label">
                                <i class="fa-solid fa-upload"></i>
                                <p>Export</p>
                            </div>
                            <div class="q_dropdown">
                                <p>Excel</p>
                                <div class="q_selection">
                                    <p>Excel</p>
                                    <p>CSV File</p>
                                </div>
                            </div>
                        </div>
                        <div class="selection">
                            <div class="label">
                                <i class="fa-solid fa-download"></i>
                                <p>Import</p>
                            </div>
                            <div class="q_dropdown">
                                <p>Excel</p>
                                <div class="q_selection">
                                    <p>Excel</p>
                                    <p>CSV File</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actions" id="refresh-enrolled">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
                </div>
                <div class="actions search" id="search-enrolled">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <div class="searchinput" id="searchinput-enrolled">
                        <input type="text" placeholder="Search" id="searchStudents-enrolled">
                    </div>
                </div>
            </div>
            <div class="controlside">
                <div class="controls" id="select-level-button">
                    <p id="label-for-selected-level-dashboard">Level: 1</p>
                </div>
                <div class="page">
                    <p>Read-Write</p>
                </div>
            </div>
        </div>

        <!-- table of enrolled students, only enrolled students -->
        <div class="content" id="listallenrolled-table"></div>
    </div>

    <!-- THIS IS THE NEW MAIN DASHBOARD NOW -->
    <!-- semester view -->
     <!-- viewpage - removed -->
    <div class="workcard Semesterview viewpage" id="semesterpage">
        <!-- add new semester popup -->
        <div class="blurbg" id="newsempopup">

            <!-- popups for creating new semester -->
            <div class="newsempopup">
                <div class="header">
                    <div class="headertitle">
                        <p>New Semester</p>
                    </div>
                    <div class="exit" id="exitsempopup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                    </div>
                </div>
                <div class="newsemform">
                    <div class="inputsem">
                        <label for="schoolyear">School Year</label>
                        <input type="text" placeholder="Ex. 2023-2024" id="schoolyear">
                    </div>
                    <div class="inputsem">
                        <label for="semester">Semester</label>
                        <input type="text" placeholder="0" id="semester_count">
                    </div>
                    <div class="inputsem">
                        <label for="semester">Start</label>
                        <input type="text" placeholder="Date Start" id="date_start">
                    </div>
                    <div class="inputsem">
                        <label for="semester">End</label>
                        <input type="text" placeholder="Date end" id="date_end">
                    </div>
                    <div class="savesemester">
                        <button id="savesemester">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of new semester pop up -->

        <div class="header">
            <div class="actionside">
                <div class="_actions">
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    </div>
                    <div class="dropdown" id="dropdown-dashboard-menu">
                        <div class="selection" id="addnewsemester-dropdown">
                            <div class="label">
                                <i class="fa-regular fa-calendar-plus"></i>
                                <p>New Semester</p>
                            </div>
                        </div>
                        <div class="selection">
                            <div class="label">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <p>History</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actions" id="addnewsemester">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-plus"><path d="M8 2v4"/><path d="M16 2v4"/><path d="M21 13V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"/><path d="M3 10h18"/><path d="M16 19h6"/><path d="M19 16v6"/></svg>
                </div>
            </div>
            <div class="controlside">
                <div class="page">
                    <p>Active</p>
                </div>
            </div>
        </div>

        <div class="content" id="update-dashboard">
            <?php
                include('Resources/pages/dashboardoverview.pages.html.php');
            ?>
        </div>
    </div>

    <!-- list students view -->
    <div class="workcard studentlistview" id="studentlistpage">

        <!-- view more information about student -->
        <div class="blurbg" id="stdinfo_popup">
            <div class="viewstudentinfo_popup" id="viewstudentinfo_popup"></div>
        </div>

        <div class="blurbg" id="error-message">
            <div class="view_error-message" id="view_error-message">
                <div class="header">
                    <h3>Enroll Error</h3>
                    <div class="exit" id="exit_error-message_popup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                    </div>
                </div>
                <div class="error-message-content">
                    <i class="fa-solid fa-triangle-exclamation" id="warning-sign"></i>
                    <p>Student may already enrolled or enrollment unavailable.</p>
                </div>
            </div>
        </div>

        <!-- enroll student popup showSemPopup-->
         <div class="blurbg" id="std_enroll_popup">
            <div class="viewenrollstudent_popup" id="viewenrollstudent_popup">
                <div class="header">
                    <div class="headertitle">
                        <p>Enroll Student</p>
                    </div>
                    <div class="exit" id="exit_std_enroll_popup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                    </div>
                </div>

                <div class="enrollment-user-photo">
                    <img src="https://i.pinimg.com/474x/53/7c/a7/537ca76aecdf594d0b3701b59bb8dc8f.jpg" alt="">
                </div>

                <div class="enrollment-config">
                    <div class="enrollment-info">
                        <p>Student's Name:</p>
                        <p>Bruce Banner</p>
                    </div>
                    <div class="enrollment-info">
                        <p>Userid:</p>
                        <p>7868439</p>
                    </div>
                    <div class="enrollment-info">
                        <p>School Year:</p>
                        <p>2024-2025</p>
                    </div>
                    <div class="enrollment-info">
                        <p>Semester level:</p>
                        <p>1st semester</p>
                    </div>
                </div>
                <div class="enrollment_btn">
                    <button id="enroll_student">Enroll this semester</button>
                </div>
            </div>
         </div>

        <!-- popup option (sorting) -->
        <div class="blurbg" id="stdlst_popup">
            <div class="studentOption">
                <div class="header">
                    <div class="headertitle">
                        <p>Option</p>
                    </div>
                    <div class="exit" id="exit_stdlst_popup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                    </div>
                </div>
                <div class="popupOptions">
                    <div class="optionsContent">
                        <label for="courseList">Course</label>
                        <select name="listCourse" id="courseList">
                            <option value="all">All</option>
                            <option value="bsit">BS Information Technology</option>
                            <option value="bsba">BS Business Ad</option>
                            <option value="bshm">BS Hospitality Management</option>
                            <option value="bspsych">BS Psychology</option>
                        </select>
                    </div>
                    <div class="optionsContent">
                        <label for="optionYear">Year</label>
                        <select name="optionYear" id="optionYear">
                            <option value="all">All</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="actionside">
                <div class="actions" id="adminstudentlist_option">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                </div>
                <div class="actions" id="refresh_studentlists">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
                </div>
                <div class="actions" id="addnewstudent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-plus"><path d="M2 21a8 8 0 0 1 13.292-6"/><circle cx="10" cy="8" r="5"/><path d="M19 16v6"/><path d="M22 19h-6"/></svg>
                </div>
                <div class="actions search" id="searchstudent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <div class="searchinput" id="searchinput">
                        <input type="text" placeholder="Search" id="searchStudents">
                    </div>
                </div>
            </div>
            <div class="controlside">
                <div class="controls" id="admin-select-level-popup">
                    <p id="label-for-select-level">Level: ALL</p>
                </div>
            </div>
        </div>

        <div class="content">
            <table class="adminlistofstudents" id="adminlistofstudents">
                <div class="listallstudents" id="listallstudents">
                    <!--  -->
                </div>
            </table>
        </div>
    </div>

    <!-- list teacher view -->
    <div class="workcard teacherlistview" id="teacherlistpage">
        <div class="header">
            <div class="actionside">
                <div class="actions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                </div>
                <div class="actions" id="refresh_facultylists">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
                </div>
                <div class="actions" id="addnewfaculty">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-plus"><path d="M2 21a8 8 0 0 1 13.292-6"/><circle cx="10" cy="8" r="5"/><path d="M19 16v6"/><path d="M22 19h-6"/></svg>
                </div>
                <div class="actions search" id="searchteacher">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <div class="searchinput" id="t_searchinput">
                        <input type="text" placeholder="Search" id="searchTeachers">
                    </div>
                </div>
            </div>
            <div class="controlside">
                <div class="page">
                    <p>Page: 1-1</p>
                </div>
                <div class="controls">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevrons-left"><path d="m11 17-5-5 5-5"/><path d="m18 17-5-5 5-5"/></svg>
                </div>
                <div class="controls">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevrons-right"><path d="m6 17 5-5-5-5"/><path d="m13 17 5-5-5-5"/></svg>
                </div>
            </div>
        </div>

        <div class="content">
            <table class="adminlistofstudents" id="adminlistofteacher">
                <div class="listallstudents" id="listallstudents">
                    <!-- table faculties data here -->
                </div>
            </table>
        </div>
    </div>

    <!-- list course view -->
    <div class="workcard courselistview" id="courselistpage">
        <!-- popup -->
        <div class="addnew_course" id="addnew_course">
            <div class="new_course">
                <div class="header">
                    <h3>New Course</h3>
                    <i class="fa-solid fa-xmark" id="exit_newcourse"></i>
                </div>
                <div class="content">
                    <div class="course_input">
                        <label for="courseid">Course ID</label>
                        <input type="text" placeholder="Course ID: ex. bsba3" id="courseid">
                    </div>
                    <div class="course_input">
                        <label for="coursename">Course Name</label>
                        <input type="text" placeholder="Course name: ex. BS Buesiness Ad" id="coursename">
                    </div>
                    <div class="course_input">
                        <p>Year</p>
                        <div class="year_selection">
                            <p id="selected">1st</p>
                            <div class="selections" id="selections">
                                <p class="course_year" id="1st">1st</p>
                                <p class="course_year" id="2nd">2nd</p>
                                <p class="course_year" id="3rd">3rd</p>
                                <p class="course_year" id="4th">4th</p>
                            </div>
                        </div>
                    </div>
                    <div class="course_input button">
                        <input type="submit" value="Add">
                    </div>
                </div>
            </div>
        </div>

        <!-- popup to show more info about the clicked course -->
        <div class="blurbg" id="courseinfo-popup">
            <div class="courseinfo">
                <div class="header">
                    <div class="headertitle">
                        <p id="selected_coursename">Course Name</p>
                    </div>
                    <div class="exit" id="exit_courseinfo_popup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- main content -->
        <div class="header">
            <div class="actionside">
                <div class="_actions">
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    </div>
                    <div class="dropdown">
                        <div class="selection">
                            <div class="label">
                                <i class="fa-solid fa-user-large"></i>
                                <p>Year</p>
                            </div>
                            <div class="q_dropdown">
                                <p>3rd</p>
                                <div class="q_selection">
                                    <p>1st</p>
                                    <p>2nd</p>
                                    <p>3rd</p>
                                    <p>4th</p>
                                </div>
                            </div>
                        </div>
                        <div class="selection" id="addnew_course_btn">
                            <div class="label">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <p>New Course</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actions" id="addnew_course_btn2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-plus"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                </div>
            </div>
            <div class="controlside">
                <div class="controls">
                    <p>Level: 1</p>
                </div>
            </div>
        </div>

        <!-- show table -->
        <div class="content" id="table-course-view"></div>
    </div>

    <!-- Edit student's subject page -->
    <div class="workcard studentsubjectsview" id="editstudentsubjects">
        <!-- Popups here -->

        <!-- header -->
        <div class="header">
            <div class="actionside">
                <div class="_actions">
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    </div>

                    <!-- filter dropdown -->
                    <div class="dropdown">
                        <div class="selection">
                            <div class="label">
                                <i class="fa-solid fa-user-large"></i>
                                <p>Year</p>
                            </div>
                            <div class="q_dropdown">
                                <p>3rd</p>
                                <div class="q_selection">
                                    <p>1st</p>
                                    <p>2nd</p>
                                    <p>3rd</p>
                                    <p>4th</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- other actions in left size -->
                <div class="actions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                </div>
            </div>

            <!-- actions in right side -->
            <div class="controlside">
                <div class="controls">
                    <p>Year: 4th</p>
                </div>
            </div>
        </div>

        <div class="content subject-content">
            <div class="subj-side sub-left">
                <div class="list-subjects">

                    <!-- monday -->
                    <div class="subj-day">
                        <i class="fa-regular fa-calendar"></i>
                        <h3>Monday</h3>
                    </div>

                    <div class="subject-item">
                        <div class="subj-header">
                            <h4>Intro to Programming 1</h4>
                            <div class="subj-option">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </div>
                        </div>
                        <div class="other-subj-info">
                            <p>Teacher: <span class="subj-holder">Tony Stark</span></p>
                            <p>Course: <span class="subj-holder">BSIT</span></p>
                            <p>Year/level: <span class="subj-holder">1st year, 1st semester</span></p>
                            <p>Time: <span class="subj-holder">1:00pm to 5:00pm</span></p>
                        </div>
                    </div>

                    <div class="subject-item">
                        <div class="subj-header">
                            <h4>Intro to Programming 2</h4>
                            <div class="subj-option">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </div>
                        </div>
                        <div class="other-subj-info">
                            <p>Teacher: <span class="subj-holder">Tony Stark</span></p>
                            <p>Course: <span class="subj-holder">BSIT</span></p>
                            <p>Year/level: <span class="subj-holder">1st year, 1st semester</span></p>
                            <p>Time: <span class="subj-holder">1:00pm to 5:00pm</span></p>
                        </div>
                    </div>

                    <!-- tuesday -->
                    <div class="subj-day">
                        <i class="fa-regular fa-calendar"></i>
                        <h3>Tuesday</h3>
                    </div>

                    <div class="subject-item">
                        <div class="subj-header">
                            <h4>English For You And Me</h4>
                            <div class="subj-option">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </div>
                        </div>
                        <div class="other-subj-info">
                            <p>Teacher: <span class="subj-holder">Tony Stark</span></p>
                            <p>Course: <span class="subj-holder">Elementary</span></p>
                            <p>Year/level: <span class="subj-holder">Grade 5</span></p>
                            <p>Time: <span class="subj-holder">1:00pm to 5:00pm</span></p>
                        </div>
                    </div>

                    <!-- saturday -->
                    <div class="subj-day">
                        <i class="fa-regular fa-calendar"></i>
                        <h3>Saturday</h3>
                    </div>

                    <div class="subject-item">
                        <div class="subj-header">
                            <h4>TLE</h4>
                            <div class="subj-option">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </div>
                        </div>
                        <div class="other-subj-info">
                            <p>Teacher: <span class="subj-holder">Tony Stark</span></p>
                            <p>Course: <span class="subj-holder">Elementary</span></p>
                            <p>Year/level: <span class="subj-holder">Grade 5</span></p>
                            <p>Time: <span class="subj-holder">1:00pm to 5:00pm</span></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="subj-side sub-right">
                <div class="user-info">
                    <div class="user-photo">
                        <img src="https://i.pinimg.com/236x/5e/66/36/5e663644d61131865371df79c5a3f9bf.jpg" alt="">
                    </div>
                    <div class="user-name-username">
                        <p>@<a href="#" id="username-link">username</a></p>
                    </div>
                    <div class="user-name">
                        <div>
                            <i class="fa-solid fa-user"></i>
                            <p id="user-name-fullname">Username</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-users-line"></i>
                            <p id="user-name-course">usercourse</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-id-card"></i>
                            <p id="user-name-userid">userid</p>
                        </div>
                    </div>

                    <div class="user-option">
                        <div class="u-option">
                            <i class="fa-solid fa-plus"></i>
                            <p>Enroll</p>
                        </div>
                        <div class="u-option">
                            <i class="fa-solid fa-minus"></i>
                            <p>Deactivate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Schedule view -->
    <div class="workcard scheduletview" id="schedulepage">
        <!-- popup -->

        <!-- end of popups -->

        <div class="header">
            <div class="actionside">
                <div class="_actions">
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    </div>
                    <div class="dropdown">
                        <div class="selection">
                            <div class="label">
                                <i class="fa-solid fa-user-large"></i>
                                <p>Year</p>
                            </div>
                            <div class="q_dropdown">
                                <p>3rd</p>
                                <div class="q_selection">
                                    <p>1st</p>
                                    <p>2nd</p>
                                    <p>3rd</p>
                                    <p>4th</p>
                                </div>
                            </div>
                        </div>
                        <div class="selection" id="addnew_course_btn">
                            <div class="label">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <p>New Course</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
                </div>
                <div class="actions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                </div>
                <div class="actions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                </div>
            </div>
            <div class="controlside">
                <div class="controls">
                    <p>Year: 3rd</p>
                </div>
            </div>
        </div>

        <div class="content">
            <?php
                include('showSchedule.html.php');
            ?>
        </div>
    </div>

    <!-- announcement view -->
    <div class="workcard announcementview" id="announcementpage">
        <!-- end of popup options -->
        <div class="header">
            <div class="actionside">
                <div class="_actions">
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    </div>
                    <div class="dropdown">
                        <div class="selection">
                            <div class="label">
                                <i class="fa-solid fa-filter"></i>
                                <p>Viewers</p>
                            </div>
                            <div class="q_dropdown">
                                <p>All</p>
                                <div class="q_selection">
                                    <div class="item">
                                        <i class="fa-solid fa-square-check"></i>
                                        <p>First Year</p>
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-square-check"></i>
                                        <p>Second Year</p>
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-square-check"></i>
                                        <p>Third Year</p>
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-square-check"></i>
                                        <p>Fourth Year</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="selection">
                            <div class="label">
                                <i class="fa-solid fa-heart"></i>
                                <p>Viewers can react</p>
                            </div>
                            <div class="switch" id="switch">
                                <div class="circle" id="circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                </div>
                <div class="actions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/></svg>
                </div>
            </div>
            <div class="controlside">
                <div class="controls post" id="publish_btn">
                    <p>Publish</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send-horizontal"><path d="m3 3 3 9-3 9 19-9Z"/><path d="M6 12h16"/></svg>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="entries">
                <input type="text" Placeholder="Title..." class="title" id="title_post">
                <textarea name="ann_body" id="ann_body" cols="30" rows="10" placeholder="Body..." class="ann_body"></textarea>
            </div>
            <div class="attachments">
                <!-- images and video -->
                <div class="files" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/></svg>
                    <p id="name_of_file">image.jpg</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x remove"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </div>
            </div>
        </div>
    </div>

    <!-- todo view -->
    <div class="workcard todoview" id="todopage">
        <div class="header">
            <div class="actionside">
                <div class="_actions">
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    </div>
                    <div class="dropdown">
                        <div class="selection">
                            <div class="label">
                                <i class="fa-solid fa-filter"></i>
                                <p>Show</p>
                            </div>
                            <div class="q_dropdown">
                                <p>All</p>
                                <div class="q_selection">
                                    <p>Done</p>
                                    <p>Undone</p>
                                </div>
                            </div>
                        </div>
                        <div class="selection">
                            <div class="label">
                                <i class="fa-solid fa-trash"></i>
                                <p>Clear</p>
                            </div>
                        </div>
                        <div class="selection">
                            <div class="label">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <p>History</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list-checks"><path d="m3 17 2 2 4-4"/><path d="m3 7 2 2 4-4"/><path d="M13 6h8"/><path d="M13 12h8"/><path d="M13 18h8"/></svg>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="todolist">
                <div class="newtodo">
                    <h3>New todo</h3>
                    <div class="newtodoinput">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pin"><line x1="12" x2="12" y1="17" y2="22"/><path d="M5 17h14v-1.76a2 2 0 0 0-1.11-1.79l-1.78-.9A2 2 0 0 1 15 10.76V6h1a2 2 0 0 0 0-4H8a2 2 0 0 0 0 4h1v4.76a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24Z"/></svg>
                        <input type="text" placeholder="Enter here..." id="todonameinput">
                        <button id="addtodo">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="todo_lists" id="todo_lists">
                <div class="lists" id="lists_all">

                    <?php
                        Admin();
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- new teacher/student view view -->
    <div class="workcard newuserview" id="newuserpage">
        <div class="header">
            <div class="actionside">
                <div class="actions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                </div>
                <div class="actions" id="save_student">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                </div>
            </div>
            <!-- no control actions -->
        </div>

        <div class="content">
            <div class="popup_message" id="popup_message">
                <!-- error message here -->
                <div class="header">
                    <div class="headertitle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
                        <p>New student</p>
                    </div>
                    <div class="exit" id="exitpopup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                    </div>
                </div>
                <div class="error_name">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                    <p id="error_name"></p>
                </div>
            </div>
            <div class="popup_message save" id="save">
                <!-- save message here -->
                <div class="header">
                    <div class="headertitle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
                        <p>New student</p>
                    </div>
                    <div class="exit" id="exitpopup_save">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                    </div>
                </div>
                <div class="error_name" id="error_label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                    <p id="error_name_msg"></p>
                </div>
            </div>
            
            <div class="title">
                <h3 id="_who">New Student</h3>
                <p>S.Y. 2023-2024 2nd Semester</p>
            </div>
            <div class="forms">
                <form action="Model/newstudent.inc.php" method="post" id="newstudentform" autocomplete="off">
                    <div class="user_name">
                        <div class="form">
                            <input type="text" placeholder="First name" required id="fname">
                        </div>
                        <div class="form">
                            <input type="text" placeholder="Middle name" required id="mname">
                        </div>
                        <div class="form">
                            <input type="text" placeholder="Last name" required id="lname">
                        </div>
                    </div>

                    <div class="user_name">
                        <div class="form">
                            <input type="text" placeholder="School ID no." required id="schoolid">
                        </div>
                        <div class="form">
                            <input type="text" placeholder="Email" required id="useremail">
                        </div>
                        <div class="form">
                            <input type="text" placeholder="Password" required id="password">
                        </div>
                    </div>
                    <div class="user_name">
                        <div class="picker">
                            <p>Gender</p>
                            <input type="checkbox" value="Male" name="gender1" id="gender1" onclick="checkbox(this.id)" checked>
                            <label for="gender1">Male</label>
                            <input type="checkbox" value="Female" name="gender2" id="gender2" onclick="checkbox(this.id)">
                            <label for="gender2">Female</label>
                        </div>
                        <div class="picker">
                            <p>Birthdate</p>
                            <input type="date" id="bdate" required>
                        </div>
                        <div class="selector" id="selector-courses">
                            <p>Course</p>
                            <div class="select">
                                <div class="selected" id="selector">
                                    <p id="course_options">Select Course</p>
                                    <i class="fa-solid fa-caret-down" id="down_icon"></i>
                                </div>
                                <div class="select_options" id="select_options">
                                    <div class="s_item">
                                        <p class="op_item" id="bsit">BS Information Technology</p>
                                    </div>
                                    <div class="s_item">
                                        <p class="op_item" id="bsba">BS Business Ad</p>
                                    </div>
                                    <div class="s_item">
                                        <p class="op_item" id="bshm">BS Hospitality Management</p>
                                    </div>
                                    <div class="s_item">
                                        <p class="op_item" id="bsp">BS Psychology</p>
                                    </div>
                                    <div class="s_item">
                                        <p class="op_item" id="bsme">BS Mechanical Engineer</p>
                                    </div>
                                    <div class="s_item">
                                        <p class="op_item" id="bscs">BS Computer Science</p>
                                    </div>
                                    <div class="s_item">
                                        <p class="op_item" id="bsce">BS Computer Engineer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="user_name">
                        <div class="address">
                            <p>Address</p>
                            <textarea name="address" id="address" cols="30" rows="10" placeholder="Home Address"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>