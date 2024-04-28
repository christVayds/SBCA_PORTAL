<?php
    include "base.php";

    include "Model/students.inc.php";
    include 'Model/todo.inc.php';

    session_start();
    if(!isset($_SESSION['user'])){
        header('location: login.php');
        exit();
    }
    // uncomment later
?>

<!-- student's dashboard -->
<div class="dashboard" id="student">
    <!-- check for user -->
    <div class="view <?php if($_SESSION['user'] === 'student'){ echo 'active_user'; } ?>">
    <div class="sides userprofile">
        <div class="usercard">
            <div class="header">
                <div class="user_profile">
                    <div class="image">
                        <img src="Resources/assets/default-profile-photo2.jpg" alt="" id="image">
                    </div>
                    <div class="name">
                        <a id="name" href="#">Christian Vaydal</a>
                        <p id="course">BSIT</p>
                    </div>
                </div>
                <div class="options">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </div>
            </div>
            <div class="viewGPA">
                <div class="gpa">
                    <p id="grade">1.75</p>
                </div>
                <div class="sem">
                    <p>1st</p>
                    <p>Semester</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sides dashboardTable">
        <div class="header">
            <div class="head schoolyear">
                <p>S.Y. 2023-2024</p>
            </div>
            <div class="head semester">
                <p>1st Semester 3rd Year</p>
            </div>
        </div>
        <div class="timeupdate">
            <i class="fa-regular fa-clock"></i>
            <p>11/12/2023</p>
        </div>
        <div class="table">
            <table class="gradeTable">
                <tr id="header">
                    <th id="grade">Grade</th>
                    <th id="name">Subject</th>
                    <th id="code">Code</th>
                    <th id="teacher">Teacher</th>
                </tr>
                <tr>
                    <td id="grade">1.25</td>
                    <td id="name">Fundemental of Programming</td>
                    <td id="code">ITE-1</td>
                    <td id="teacher">Prof Stark</td>
                </tr>
                <tr>
                    <td id="grade">1.25</td>
                    <td id="name">System Integration and Architecture 1</td>
                    <td id="code">Elective-5</td>
                    <td id="teacher">Dr Banner</td>
                </tr>
            </table>
        </div>
    </div>
    </div>
</div>

<!-- Admin's dashboard -->

<div class="dashboard" id="admin">
    <!-- check for user -->
    <div class="view <?php if($_SESSION['user'] === 'sbca'){ echo 'active_user'; } // uncomment  ?>">
    <!-- admin's tabbars -->
    <div class="tabs tabbar">
        <div class="option active" id="dashboardtab">
            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 23 23" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-app-window"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M10 4v4"/><path d="M2 8h20"/><path d="M6 4v4"/></svg>
            <p>Dashboard</p>
        </div>
        <div class="option" id="semestertab">
            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-school"><path d="M14 22v-4a2 2 0 1 0-4 0v4"/><path d="m18 10 4 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8l4-2"/><path d="M18 5v17"/><path d="m4 6 8-4 8 4"/><path d="M6 5v17"/><circle cx="12" cy="9" r="2"/></svg>
            <p>Semester</p>
        </div>
        <div class="option" id="studentlisttab">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open-text"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/><path d="M6 8h2"/><path d="M6 12h2"/><path d="M16 8h2"/><path d="M16 12h2"/></svg>
            <p>Students</p>
        </div>
        <div class="option" id="teacherlisttab">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
            <p>Teachers</p>
        </div>
        <div class="option" id="courselisttab">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-align-start-vertical"><rect width="9" height="6" x="6" y="14" rx="2"/><rect width="16" height="6" x="6" y="4" rx="2"/><path d="M2 2v20"/></svg>
            <p>Courses</p>
        </div>
        <div class="option" id="announcementtab">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-check"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="m9 16 2 2 4-4"/></svg>
            <p>Announcements</p>
        </div>
        <div class="option" id="todotab">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list"><line x1="8" x2="21" y1="6" y2="6"/><line x1="8" x2="21" y1="12" y2="12"/><line x1="8" x2="21" y1="18" y2="18"/><line x1="3" x2="3.01" y1="6" y2="6"/><line x1="3" x2="3.01" y1="12" y2="12"/><line x1="3" x2="3.01" y1="18" y2="18"/></svg>
            <p>Todo List</p>
        </div>
    </div>

    <div class="tabs workspace">

    <!-- dashboard view -->
        <div class="workcard Dashboardview viewpage" id="_admindashboard">

            <div class="open_info_popup " id="open_info_popup"> <!-- active: active_open_popup -->
                <div class="info_popup">
                    <div class="header">
                        <div class="title">
                            <h3>Student</h3>
                        </div>
                        <div class="exit" id="exit_d_info_p">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </div>
                    <div class="profile">
                        <div class="picture">
                            <img src="Resources/assets/default-profile-photo2.jpg" alt="">
                        </div>
                        <div class="student_name">
                            <p class="studentname" id="info_student_name">Empty name</p>
                            <p class="studentcourse" id="info_student_course">Empty Course</p>
                        </div>
                    </div>
                    <div class="students_grade">
                        <div class="grade">
                            <p>Information Assurance</p>
                            <input type="text" placeholder="Grade">
                        </div>
                        <div class="grade">
                            <p>Application development</p>
                            <input type="text" placeholder="Grade">
                        </div>
                        <div class="grade">
                            <p>Capstone Project 1</p>
                            <input type="text" placeholder="Grade">
                        </div>
                        <div class="grade">
                            <p>Certfication review</p>
                            <input type="text" placeholder="Grade">
                        </div>
                        <div class="grade">
                            <p>Social And Professional</p>
                            <input type="text" placeholder="Grade">
                        </div>
                        <div class="grade">
                            <p>Fundamental of Business Outsourcing</p>
                            <input type="text" placeholder="Grade">
                        </div>
                        <div class="grade">
                            <p>Filipino gamit sa Pananaliksik</p>
                            <input type="text" placeholder="Grade">
                        </div>
                        <div class="grade">
                            <p>System Integration and Architecture</p>
                            <input type="text" placeholder="Grade">
                        </div>
                    </div>
                    <div class="total_grade">
                        <p>Total Grade: </p>
                        <input type="text" placeholder="Total">
                    </div>
                </div>
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
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
                    </div>
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    </div>
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    </div>
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    </div>
                </div>
                <div class="controlside">
                    <div class="controls">
                        <p>Year: 1</p>
                    </div>
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
                <div class="titleContent">
                    <h3 id="course_title">BS Information Technology 3</h3>
                    <p>S.Y. 2023-2024</p>
                    <p>No. of Students: 40</p>
                </div>
                <!-- table of enrolled students, only enrolled students -->
                <div class="tableofenrolled">
                    <table class="enrolled">
                        <tr id="header">
                            <th id="std_userid">ID NO.</th>
                            <th id="std_name">Name</th>
                            <th id="std_course">Course</th>
                            <th id="std_year">Year</th>
                            <th id="std_unit">Unit</th>
                            <th id="std_gpa">GPA</th>
                        </tr>
                        <tr id="rborbon" class="enrolled_std">
                            <td>C2021-29984</td>
                            <td id="rborbon_name">Ricky Borbon</td>
                            <td>BS Information Technology</td>
                            <td>3rd</td>
                            <td>12</td>
                            <td class="gpa_input">
                                <input type="text" class="total_gpa" placeholder="0">
                            </td>
                        </tr>
                        <tr id="cvaydal" class="enrolled_std">
                            <td>C2021-29985</td>
                            <td id="cvaydal_name">Christian Vaydal</td>
                            <td>BS Information Technology</td>
                            <td>3rd</td>
                            <td>12</td>
                            <td class="gpa_input">
                                <input type="text" class="total_gpa" placeholder="0">
                            </td>
                        </tr>
                        <tr id="jquito" class="enrolled_std">
                            <td>C2021-29974</td>
                            <td id="jquito_name">Jayson Quito</td>
                            <td>BS Information Technology</td>
                            <td>3rd</td>
                            <td>12</td>
                            <td class="gpa_input">
                                <input type="text" class="total_gpa" placeholder="0">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- semester view -->
        <div class="workcard Semesterview" id="semesterpage">
            <!-- add new semester popup -->
            <div class="blurbg" id="newsempopup">
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
                            <input type="text" placeholder="0" id="semester">
                        </div>
                        <div class="savesemester">
                            <button id="savesemester">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header">
                <div class="actionside">
                    <div class="_actions">
                        <div class="actions">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                        </div>
                        <div class="dropdown">
                            <div class="selection">
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
                            <div class="selection">
                                <div class="label">
                                    <i class="fa-solid fa-chart-simple"></i>
                                    <p>Grade Analysis</p>
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
                <div class="currentsem">
                    <p>Semester: 2nd</p>
                    <p>School Year: 2023-2024</p>
                </div>
                <div class="info">

                <!-- example of info cards -->
                    <a class="seminfo" href="#">
                        <div class="icon">
                            <i class="fa-solid fa-users-line"></i>
                        </div>
                        <div class="about">
                            <p>Enrolled:</p>
                            <p>1100</p>
                        </div>
                    </a>

                    <a class="seminfo" href="#">
                        <div class="icon">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="about">
                            <p>Students:</p>
                            <p>1500</p>
                        </div>
                    </a>

                    <a class="seminfo" href="#">
                        <div class="icon">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div class="about">
                            <p>Graduating:</p>
                            <p>501</p>
                        </div>
                    </a>

                    <a class="seminfo" href="#">
                        <div class="icon">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <div class="about">
                            <p>Teachers:</p>
                            <p>300</p>
                        </div>
                    </a>

                </div>
            </div>
        </div>

        <!-- list students view -->
        <div class="workcard studentlistview" id="studentlistpage">

            <!-- popup option -->
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
                                <option value="bsp">BS Psychology</option>
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
                    <div class="controls">
                        <p>Year: All</p>
                    </div>
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
                <table class="adminlistofstudents" id="adminlistofstudents">
                    <div class="listallstudents" id="listallstudents">
                        <?php
                            showStudents(50);
                        ?>
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
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
                    </div>
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-plus"><path d="M2 21a8 8 0 0 1 13.292-6"/><circle cx="10" cy="8" r="5"/><path d="M19 16v6"/><path d="M22 19h-6"/></svg>
                    </div>
                    <div class="actions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
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
                <table class="adminlistofstudents">
                    <tr class="tb_header">
                        <th id="name">Name</th>
                        <th id="course">Profession</th>
                        <th id="email">Email</th>
                        <th id="action">Actions</th>
                    </tr>
                    <tr>
                        <td>Tony Stark</td>
                        <td>Information Technology</td>
                        <td>tstark@sbca.edu.ph</td>
                        <td>
                            <div class="actions">
                                <i class="fa-solid fa-user-pen"></i>
                                <i class="fa-solid fa-trash"></i>
                            </div>
                        </td>
                    </tr>

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
                        <p>Year: 3rd</p>
                    </div>
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
                <table class="adminlistofstudents">
                    <tr class="tb_header">
                        <th id="coursename">Course</th>
                        <th id="coursecode">Code</th>
                        <th id="numstudents">Students</th>
                        <th id="action">Actions</th>
                    </tr>
                    <tr>
                        <td>BS Information Technology</td>
                        <td>BSIT</td>
                        <td>50</td>
                        <td>
                            <div class="actions">
                                <i class="fa-solid fa-file-pen"></i>
                                <i class="fa-solid fa-user-pen"></i>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>BS Business Ad</td>
                        <td>BSBA</td>
                        <td>72</td>
                        <td>
                            <div class="actions">
                                <i class="fa-solid fa-file-pen"></i>
                                <i class="fa-solid fa-user-pen"></i>
                            </div>
                        </td>
                    </tr>

                </table>

            </div>
        </div>

        <!-- announcement view -->
        <div class="workcard announcementview" id="announcementpage">
            <!-- popup option -->
            <!-- publish popup -->
                <div class="blurbg" id="publish_event">
                    <div class="publishPopup">
                        <div class="header">
                            <div class="actionside">
                                <div class="title">
                                    <p>New event</p>
                                </div>
                            </div>
                            <div class="controlside">
                                <div class="exit" id="exit_publish">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="date_time">
                            <div class="date_picker">
                                <div class="label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-days"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
                                    <p>Date</p>
                                </div>
                                <div class="date_display">
                                    <p>11/12/2023</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
                                </div>
                            </div>
                            <div class="time_picker">
                                <div class="start">
                                    <div class="label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alarm-clock"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M5 3 2 6"/><path d="m22 6-3-3"/><path d="M6.38 18.7 4 21"/><path d="M17.64 18.67 20 21"/></svg>
                                        <p>Start</p>
                                    </div>
                                    <div class="time_display">
                                        <p>09:30am</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
                                    </div>
                                </div>
                                <div class="start">
                                    <div class="label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alarm-clock-check"><circle cx="12" cy="13" r="8"/><path d="M5 3 2 6"/><path d="m22 6-3-3"/><path d="M6.38 18.7 4 21"/><path d="M17.64 18.67 20 21"/><path d="m9 13 2 2 4-4"/></svg>
                                        <p>End</p>
                                    </div>
                                    <div class="time_display">
                                        <p>09:30am</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" id="no_date">
                                <label for="no_date">No Date</label>

                                <input type="checkbox" id="no_time">
                                <label for="no_time">No Time</label>
                            </div>
                            <div class="publish">
                                <button id="publish">Publish</button>
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
                                    <p>Viewer's Reaction</p>
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
                    <input type="text" Placeholder="Title..." class="title">
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
                        <!-- <div class="item" id="01" value="Todo 1">
                            <div class="checkbox">
                                <input type="checkbox" id="01-check" name="Todo 1">
                                <label for="one">Todo 1</label>
                            </div>
                            <i class="fa-solid fa-trash"></i>
                        </div> -->
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
                    <h3>New Student</h3>
                    <p>S.Y. 2023-2023 2nd Semester</p>
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
                            <div class="selector">
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
    </div>
</div>

<!-- teacher view (jayson and reke) -->
<div class="dashboard" id="teacher">
    <div class="view">
        
    </div>
</div>

<!-- script for dashboard -->
<script src="Resources/script/userview.js"></script>
<script src="Resources/script/dashboard.js"></script>