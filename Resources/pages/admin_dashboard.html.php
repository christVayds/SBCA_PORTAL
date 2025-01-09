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

        <div class="blurbg" id="select-level">
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
                <div class="actions" id="refresh-enrolled">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
                </div>
                <div class="actions search" id="search-enrolled">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <div class="searchinput" id="searchinput-enrolled">
                        <input type="text" placeholder="Search" id="searchStudents-enrolled" autocomplete="off">
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
        <div class="content"> <!-- id="listallenrolled-table" --->
            <table class="display-table" id="dashboard-enrolled_std">
                <thead class="table-row">
                    <th class="table-header table-id">ID NO.</th>
                    <th class="table-header table-name">Name</th>
                    <th class="table-header table-long">Course</th>
                    <th class="table-header table-long">Email</th>
                    <th class="table-header table-input">GPA</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <!-- THIS IS THE NEW MAIN DASHBOARD NOW -->
    <!-- semester view -->
     <!-- viewpage - removed -->
    <div class="workcard Semesterview viewpage" id="semesterpage">
        <!-- add new semester popup -->
        <div class="blurbg" id="newsempopup">

            <!-- popups for creating new semester -->
            <div class="newsempopup show-popup" id="popup-addnew-sem">
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
                        <!-- <input type="text" placeholder="Date Start" id="date_start"> -->
                        <input type="date" id="date_start">
                    </div>
                    <div class="inputsem">
                        <label for="semester">End</label>
                        <input type="date" id="date_end">
                        <!-- <input type="text" placeholder="Date end" id="date_end"> -->
                    </div>
                    <div class="savesemester">
                        <button id="savesemester">Save</button>
                    </div>
                </div>
            </div>

            <!-- modify semester -->
            <div class="newsempopup show-popup" id="popup-modify-sem">
                <div class="header">
                    <div class="headertitle">
                        <p>Modify Semester</p>
                    </div>
                    <div class="exit" id="exitmodifysempopup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                    </div>
                </div>
                <div class="newsemform">
                    <div class="inputsem">
                        <label for="extedDate">Extend date</label>
                        <input type="date" id="extendDate">
                    </div>
                    <div class="inputsem radiobtn">
                        <input type="checkbox" id="semester_active_submitGrade" value="off" hidden>
                        <div class="radiobbutton" id=sas_radiobtn>
                            <!-- active -->
                            <div class="highlight">

                            </div>
                        </div>
                        <p>Active submition of grades</p>
                    </div>

                    <div class="savesemester">
                        <button id="savemodify">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of new semester pop up -->

        <div class="header">

            <!-- action side -->
            <div class="actionside">
                <div class="_actions">
                    
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    </div>

                    <!-- drop down options -->
                    <div class="dropdown" id="dropdown-dashboard-menu">
                        <div class="selection" id="addnewsemester-dropdown">
                            <div class="label">
                                <i class="fa-regular fa-calendar-plus"></i>
                                <p>New Semester</p>
                            </div>
                        </div>
                        <div class="selection" id="modifysemester-dropdown">
                            <div class="label">
                                <i class="fa-solid fa-sliders"></i>
                                <p>Modify</p>
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
                    <p>New Semester</p>
                </div>
            </div>

            <!-- control side -->
            <div class="controlside">
                <!-- <div class="page">
                    <p>Active</p>
                </div> -->
            </div>
        </div>

        <div class="content" id="update-dashboard">
            <?php
                include('Resources/pages/dashboardoverview.pages.html.php');
            ?>
        </div>
    </div>

    <!-- list students view -->
    <div class="workcard userlistview" id="studentlistpage">

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
                    <p>New Student</p>
                </div>
                <div class="actions search" id="searchstudent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <div class="searchinput" id="searchinput">
                        <input type="text" placeholder="Search" id="searchStudents" autocomplete="off">
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
            <table class="display-table" id="adminlistofstudents">
                <thead class="table-row">
                    <th class="table-header table-id">ID NO.</th>
                    <th class="table-header table-name">Name</th>
                    <th class="table-header table-long">Course</th>
                    <th class="table-header table">Email</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <!-- list teacher view -->
    <div class="workcard userlistview" id="teacherlistpage">
        <!-- popups here -->

        <!-- view more information about teacher -->
        <div class="blurbg" id="fcltyinfo_popup">
            <div class="viewstudentinfo_popup teacherview" id="viewfacultyinfo_popup">
                <div class="header">
                    <div class="headertitle">
                        <p id="teacher-header-fullname">Loading...</p>
                    </div>
                    <div class="exit" id="exit_fcltyinfo_popup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                    </div>
                </div>

                <div class="tabbars">
                    <div class="side other-label">
                        <p>BS Information Technology</p>
                    </div>
                    <div class="side action-button">
                        <button id="deactivate-teacher">
                            <i class="fa-solid fa-user-minus"></i>
                            <p>Deactivate</p>
                        </button>
                    </div>
                </div>

                <!-- show teacher's info -->
                 <div class="userinfolines">
                    <div class="line">
                        <div class="block">
                            <p>First name</p>
                            <input type="text" placeholder="First Name" id="teacher-fname">
                        </div>
                        <div class="block">
                            <p>Middle name</p>
                            <input type="text" placeholder="Middle Name" id="teacher-mname">
                        </div>
                        <div class="block">
                            <p>Last name</p>
                            <input type="text" placeholder="Last Name" id="teacher-lname">
                        </div>
                        <div class="block">
                            <p>Email</p>
                            <input type="email" placeholder="Email" id="teacher-email">
                        </div>
                        <div class="block">
                            <p>Address</p>
                            <input type="text" placeholder="Address" id="teacher-address">
                        </div>
                    </div>
                    <div class="line">
                        <div class="block">
                            <button id="teacher-save-changes">
                                <i class="fa-regular fa-floppy-disk"></i>
                            </button>
                        </div>
                    </div>
                 </div>

                <!-- table of schedules -->
                <div class="teacherSchedule">
                    <div class="teacherScheduleHeader">
                        <h3>Schedules</h3>
                        <div class="addSubjectBtn" id="assignSubjectTeacher">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                            <p>Add Subject</p>
                        </div>
                    </div>
                    <div class="scroll-table">
                        <table class="display-table" id="faculty-display-subjects">
                            <thead class="table-row">
                                <th class="table-header table-short">Code</th>
                                <th class="table-header table-name">Name</th>
                                <th class="table-header table-long">Course</th>
                                <!-- <th class="table-header table-short">Course</th> -->
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- add subject popup -->
        <div class="blurbg " id="fcltyinfo_add-subject">
            <div class="studentOption appendSub">
                <div class="header">
                    <div class="headertitle">
                        <p>Add Subject</p>
                    </div>
                    <div class="exit" id="exit_fcltyinfo_add-subject">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                    </div>
                </div>

                <div class="selection">
                    <p>Course</p>
                    <select name="addsubject-optionCourse" id="selected-assignSubjectTeacher-course">
                        <option value="bsit">BSIT</option>
                        <option value="bsba">BSBA</option>
                        <option value="bshm">BSHM</option>
                        <option value="bspsych">BSPSYC</option>
                    </select>
                </div>
                <div class="selection">
                    <p>Year</p>
                    <select name="addubject-optionYear" id="selected-assignSubjectTeacher-yearLevel">
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                    </select>
                </div>
                <div class="addsubject-showsubject" id="assignsubject-teacher">
                    <div class="addsubject-subjectitem">
                        <h4>Name of subject</h4>
                        <p>Subject code</p>
                        <p>Teacher's name</p>
                    </div>
                </div>
            </div>
        </div>

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
                    <p>New Faculty</p>
                </div>
                <div class="actions search" id="searchteacher">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <div class="searchinput" id="t_searchinput">
                        <input type="text" placeholder="Search" id="searchTeachers" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="controlside">
                <div class="page">
                    <p>Page: 1-1</p>
                </div>
            </div>
        </div>

        <div class="content">
            <table class="display-table" id="adminlistofteacher">
                <thead class="table-row">
                    <th class="table-header table-id">ID NO.</th>
                    <th class="table-header table-name">Name</th>
                    <th class="table-header table-id">Course</th>
                    <th class="table-header table-long">Email</th>
                </thead>
                <tbody></tbody>
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
                        <label for="coursename">Course Name</label>
                        <input type="text" placeholder="Course name: ex. BSBA" id="newcourse-coursename">
                    </div>

                    <!-- new course dropdown -->
                    <div class="course_input">
                        <p>Year</p>
                        <select name="optionYear" id="selected-newcourse-yearLevel">
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>
                    </div>
                    <div class="course_input button">
                        <input type="submit" value="Add" id="course-submit-newcourse">
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

                <!-- table of teachers -->
                <div class="contents">

                    <!-- table of subjects -->
                    <div class="viewTable">
                        <div class="label">
                            <h3>Subjects</h3>
                            <p id="courselist-number-of-subjects">Loading...</p>
                        </div>
                        <table class="display-table" id="courseList-display-subjects">
                            <thead class="table-row">
                                <th class="table-header table-name">Name</th>
                                <th class="table-header table-short">Code</th>
                                <th class="table-header table-long">Teacher</th>
                                <th class="table-header table-long">Course</th>
                            </thead>
                            <tbody>
                                <tr class="table-row table-user">
                                    <td class="table-data">Intro to Programming</td>
                                    <td class="table-data">Monday</td>
                                    <td class="table-data">hukhgy23</td>
                                    <td class="table-data">Tony Start</td>
                                </tr>
                                <tr class="table-row table-user">
                                    <td class="table-data">Intro to Programming</td>
                                    <td class="table-data">Monday</td>
                                    <td class="table-data">hukhgy23</td>
                                    <td class="table-data">Tony Stark</td>
                                </tr>
                            </tbody>
                        </table>
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
                                <p id="courselist-selected-yearlevel">1st</p>
                                <div class="q_selection">
                                    <p class="course-yearLevel-dropdown" value="1">1st</p>
                                    <p class="course-yearLevel-dropdown" value="2">2nd</p>
                                    <p class="course-yearLevel-dropdown" value="3">3rd</p>
                                    <p class="course-yearLevel-dropdown" value="4">4th</p>
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
                    <p>New course</p>
                </div>
            </div>
            <div class="controlside">
                <div class="page" id="yearLevel-selected-courseList">
                    <p>Level: 1st</p>
                </div>
            </div>
        </div>

        <!-- show table -->
        <div class="content" id="table-course-view"></div>
    </div>

    <!-- Edit student's subject page -->
    <div class="workcard studentsubjectsview" id="editstudentsubjects">
        <!-- Popups here -->

        <!-- popup for selected subject in list of schedule -->
        <div class="blurbg" id="student-seledtedSubject-popup">
            <div class="studentOption appendSub inputter">
                <div class="header">
                    <p class="headertitle">Subjects</p>
                    <i class="fa-solid fa-xmark exit" id="exit_student-seledtedSubject-popup"></i>
                </div>
                <div class="quick-action" id="stdsubject-quickaction">
                    <div class="action" value="save">
                        <i class="fa-regular fa-floppy-disk"></i>
                    </div>
                    <div class="action" value="remove">
                        <i class="fa-solid fa-trash"></i>
                    </div>
                </div>
                <div class="update">
                    <p>Grade</p>
                    <input type="text" step="0.01" placeholder="0" id="subjectgrade-input" autocomplete="off">
                </div>
            </div>
        </div>

        <!-- show available subjects for given course, year and semester -->
        <div class="blurbg" id="student-subject-popup">
            <div class="studentOption appendSub">
                <div class="header">
                    <p class="headertitle">Add subjects</p>
                    <i class="fa-solid fa-xmark exit" id="exit_student-subject-popup"></i>
                </div>
                <div class="selection">
                    <p>Course</p>
                    <select name="addsubject-optionCourse" id="selected-addSubject-course">
                        <option value="bsit">BSIT</option>
                        <option value="bsba">BSBA</option>
                        <option value="bshm">BSHM</option>
                        <option value="bspsych">BSPSYC</option>
                    </select>
                </div>
                <div class="selection">
                    <p>Year</p>
                    <select name="addubject-optionYear" id="selected-addSubject-yearLevel">
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                    </select>
                </div>
                <div class="addsubject-showsubject" id="addsubject-showsubject">
                    <div class="addsubject-subjectitem">
                        <h4>Name of subject</h4>
                        <p>Subject code</p>
                        <p>Teacher's name</p>
                    </div>
                </div>
            </div>
        </div>

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
                <div class="actions" id="student-add-subjects">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                </div>
            </div>

            <!-- actions in right side -->
            <!-- <div class="controlside">
                <div class="controls">
                    <p>Year: 4th</p>
                </div>
            </div> -->
        </div>

        <div class="content subject-content">

            <!-- display student's subjects -->
            <div class="subj-side sub-left">
                <div class="list-subjects" id="addsubj-list-subjects"></div>
            </div>

            <!-- info of student and actions to enroll and deactivate student -->
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

        <!-- popups -->

         <!-- popup for sort -->
        <div class="blurbg" id="schedule-select-course-popup">
            <div class="studentOption">
                <div class="header">
                    <p class="headertitle">Course</p>
                    <i class="fa-solid fa-xmark exit" id="exit_schedule-select-course-popup"></i>
                </div>
                <div class="popupOptions">
                    <div class="optionsContent">
                        <label for="courseList">Course</label>
                        <select name="listCourse" id="schedule-select-course">
                            <option value="bsit">BS Information Technology</option>
                            <option value="bsba">BS Business Ad</option>
                            <option value="bshm">BS Hospitality Management</option>
                            <option value="bspsych">BS Psychology</option>
                            <option value="bsee">BS Elementary Education</option>
                            <option value="bsse">BS Secondary Education</option>
                            <option value="bse">BS Entrepreneurship</option>
                        </select>
                    </div>
                    <div class="optionsContent">
                        <label for="optionYear">Year</label>
                        <select name="optionYear" id="schedule-select-yearLevel">
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- popup for adding subject to schedule -->
        <div class="blurbg " id="schedule-append-subject-popup">
            <div class="studentOption appendSub">
                <div class="header">
                    <p class="headertitle">Append Subject</p>
                    <i class="fa-solid fa-xmark exit" id="exit_schedule-append-subject-popup"></i>
                </div>

                <div class="popupOptions" id="schedule-list-subject-selection">
                    <h3>Major Subjects</h3>
                    <div class="list-subjects-selection" id="list-subjects-selection-major">
                        <div class="subject-item">Loading...</div>
                    </div>
                    <h3>Minor Subjects</h3>
                    <div class="list-subjects-selection" id="list-subjects-selection-minor">
                        <div class="subject-item">Loading...</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- popup for modifying subject in schedule -->
        <div class="blurbg " id="schedule-modify-subject-popup">
            <div class="studentOption modifySub">
                <div class="header">
                    <p class="headertitle">Modify Subject</p>
                    <i class="fa-solid fa-xmark exit" id="exit_schedule-modify-subject-popup"></i>
                </div>

                <div class="scheduleActions">
                    <div class="action" id="schedule-delete-subject">
                        <i class="fa-solid fa-trash"></i>
                    </div>
                </div>

                <div class="popupOptions">
                    <div class="optionsContent">
                        <label for="listDaySchedule">Day</label>
                        <select name="listDaySchedule" id="schedule-select-day">
                            <option value="mon">Monday</option>
                            <option value="tue">Tuesday</option>
                            <option value="wed">Wednesday</option>
                            <option value="thu">Thursday</option>
                            <option value="fri">Friday</option>
                            <option value="sat">Saturday</option>
                            <option value="sun">Sunday</option>
                        </select>
                    </div>

                    <div class="optionsContent">
                        <label for="time_start">Start</label>
                        <input type="time" name="time_start" id="time_start">
                    </div>
                    <div class="optionsContent">
                        <label for="time_end">End</label>
                        <input type="time" name="time_end" id="time_end">
                    </div>
                    <div class="optionsContent">
                        <label for="gccode">GC Code</label>
                        <input type="text" name="time_end" placeholder="Google Classroom Code" id="schedule-gccode" autocomplete="off">
                    </div>
                    <div class="optionsContent">
                        <label for="numunits">Units</label>
                        <input type="text" name="numunits" placeholder="Units" id="schedule-numunits" autocomplete="off">
                    </div>
                    <div class="optionsContent">
                        <label for="listWithLab">With Lab</label>
                        <select name="listWithLab" id="schedule-select-withlab">
                            <option value="lab">With Lab</option>
                            <option value="nolab">No Lab</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- end of popups -->

        <div class="header">
            <div class="actionside">
                <div class="actions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
                </div>
                <div class="actions" id="schedule-add-subject-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    <p>Add subject</p>
                </div>
            </div>
            <div class="controlside">
                <div class="controls" id="open_schedule-select-course-popup">
                    <p>Course: <span id="schedule-selected-course-level">BSIT 1</span></p>
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
        <!-- popups here -->

        <!-- create new event here -->
        <div class="blurbg" id="add-event-popup">
            <div class="studentOption">
                <div class="header">
                    <div class="headertitle">
                        <p>New Event</p>
                    </div>
                    <div class="exit" id="exit_add-event-popup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                    </div>
                </div>
                <div class="popupOptions">
                    <div class="optionsContent">
                        <label for="event_date">Date of Event</label>
                        <input type="date" id="event_date">
                    </div>
                    <div class="optionsContent">
                        <button id="add-event-btn">Add Event</button>
                    </div>
                </div>
            </div>
        </div>
        
        
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
                                <i class="fa-solid fa-comment-slash"></i>
                                <p>Turn off comments</p>
                            </div>
                            <div class="switch" id="switch">
                                <div class="circle" id="circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actions" id="open_add_event">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                    <p>New event</p>
                </div>
                <div class="actions" id="upload-file-announcement-btn">
                    <input type="file" id="announcement-attachment-file" accept="image/*" hidden>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/></svg>
                    <p>Attachments</p>
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
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <p>History</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="todolist_content">
                <div class="side left">
                    <div class="newTodo">
                        <h3>Add new task</h3>
                        <div class="newtask">
                            <input type="text" placeholder="New task" id="new_task_description" autocomplete="off">
                            <button id="add_new_task">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="side right" id="load-tasks">
                    <h1>Tasks</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- new teacher/student view view -->
    <div class="workcard newuserview" id="newuserpage">
        <div class="header">
            <div class="actionside">
                <div class="actions" id="save_student">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    <p>Save</p>
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

    <div class="blurbg" id="global-mpopup">
        <div class="popupmessage">
            <div class="header">
                <div class="headertitle">
                    <p id="popupmessage-header">Loading...</p>
                </div>
                <div class="exit" id="exit_global-mpopup">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                </div>
            </div>
            <div class="message">
                <div class="message-content">
                    <i class="fa-solid fa-circle-exclamation" id="popupmessage-icon"></i>
                    <p id="popupmessage">Loading...</p>
                </div>
            </div>
        </div>
    </div>
</div>