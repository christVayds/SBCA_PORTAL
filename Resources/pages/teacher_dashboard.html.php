<!-- for tabs (left side) -->
<div class="tabs tabbar">
    <div class="t_option active" id="t_dashboardtab">
        <i class="fa-solid fa-table"></i>
        <p>Dashboard</p>
    </div>
    <div class="t_option" id="t_scheduletab">
        <i class="fa-regular fa-calendar-days"></i>
        <p>Schedule</p>
    </div>
</div>

<!-- list contents (right side) -->
<div class="tabs workspace">

    <!-- dashboard page -->
    <div class="workcard Dashboardview viewpage" id="_t_admindashboard">

    <!-- popups -->
    <div class="blurbg" id="teacher_page-popup">
        <div class="teacher_popup">
            <div class="header">
                <div class="headertitle">
                    <p id="t_popup-label">Loading...</p>
                </div>
                <div class="exit" id="exit_teacher_page-popup">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minimize-2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" x2="21" y1="10" y2="3"/><line x1="3" x2="10" y1="21" y2="14"/></svg>
                </div>
            </div>

            <!-- Popup message -->
            <div class="t_popup_content" id="t_open_popupmessage">
                <div class="std-info popup-message">
                    <div class="popup-message-content">
                        <i class="fa-solid fa-check" id="t_popup_icon"></i>
                        <h2 id="t_popup_message">Reading message...</h2>
                    </div>
                </div>
            </div>

            <!-- input grade of student -->
            <div class="t_popup_content" id="input_grade_student">
                <div class="std-info">
                    <div class="side left">
                        <img src="Resources/assets/default-profile-photo2.jpg" alt="user" id="t_std-image">
                    </div>
                    <div class="side right">
                        <div class="info">
                            <h3 id="t_std-fullname">Peter Parker</h3>
                            <p id="t_std-coursename">BS in Information Technology</p>
                        </div>
                    </div>
                </div>
                <div class="input input-grade">
                    <p>Grade</p>
                    <input type="text" placeholder="Input grade" value="0" id="t_input-student-grade">
                </div>
                <div class="input submit-grade">
                    <button id="t_submit-grade">
                        <i class="fa-solid fa-arrow-down"></i>
                        <p>Submit</p>
                    </button>
                </div>
            </div>

            <!-- popup option (select course, year and subjects) -->
            <div class="t_popup_content" id="select_subjects_list">
                <div class="input input-grade">
                    <p>Select Course</p>
                    <select name="t_select-course" id="t_select-course">
                        <option value="bsit">BS in Information Technology</option>
                        <option value="bsba">BS in Business Ad</option>
                        <option value="bshm">BS in Hospitality Management</option>
                        <option value="bspsych">BS in Psychology</option>
                    </select>
                </div>
                <div class="input input-grade">
                    <p>Year level</p>
                    <select name="t_select-yearLevel" id="t_select-yearLevel">
                        <option value="1">1st year</option>
                        <option value="2">2nd year</option>
                        <option value="3">3rd year</option>
                        <option value="4">4th year</option>
                    </select>
                </div>
                <div class="input input-grade">
                    <p>Select subjects</p>
                    <select name="t_select-subjects" id="t_select-subjects">
                        <option value="ITE3">Intro to Programming</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <div class="header">
        <div class="actionside">
            <div class="actions" id="t_refresh-listStudents">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
            </div>
            <div class="actions search" id="t_search-enrolled-std">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                <div class="searchinput" id="t_page_searchinput">
                    <input type="text" placeholder="Search" id="t_page_searchStudents" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="controlside">
            <div class="controls" id="t_select-subject-action">
                <p>Subject: <span id="t_display_subjCode">Loading...</span></p>
            </div>
            <div class="page">
                <p id="t_display-ifreadOnly">Loading...</p>
            </div>
        </div>
    </div>
    
    <div class="content">
            <div class="titleContent">
                <h3 id="t_displaySubject-name">Introduction to Programming 1</h3>
                <p id="t_displaySubject-course">BS Information Technology</p>
                <p id="t_displaySubject-count">No. of Students: 40</p>
            </div>
        <!-- page content here -->
         <table class="display-table" id="t_display-studentTable">
            <!-- the th and td classname with id, name, long and number is the size name of the columns in table -->
            <thead class="table-row">
                <th class="table-header table-id">ID no.</th>
                <th class="table-header table-name">Name</th>
                <th class="table-header table-long">Course</th>
                <th class="table-header table-number">GPA</th>
            </thead>

            <tbody>
                <tr class="table-row table-user" value="peterusername">
                    <td class="table-data">09892</td>
                    <td class="table-data">Peter Parker</td>
                    <td class="table-data">BS Information Technology</td>
                    <td class="table-data table-input">
                        <input type="text" placeholder="N/A" disabled>
                    </td>
                </tr>
            </tbody>
         </table>
    </div>

    <!-- end of dashboard page -->
    </div> 

    <!-- teacher schedule -->
    <div class="workcard Dashboardview" id="_t_schedule">

    <div class="header">
        <div class="actionside">
            <div class="actions">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
            </div>
        </div>
        <div class="controlside">
            <!-- <div class="controls">
                <p>Level: <span id="teacher-schedule-showLevel">BSIT 1</span></p>
            </div> -->
        </div>
    </div>

    <div class="content">
        <div class="h_scroll">
        <div class="acc_table_header">
            <h3 id="teacher-schedule-SchoolYear">S.Y. 2023-2024</h3>
            <p id="teacher-schedule-semester">2nd Semester</p>
        </div>
        <!-- <div class="scroll"> -->
        <table class="display-table scroll" id="schedule-table-view-teacher">
            <thead class="table-row">
                <th class="table-header table-id" id="time">Time</th>
                <th class="table-header table-short" id="day">Day</th>
                <th class="table-header table-short" id="subcode">Code</th>
                <th class="table-header table-long" id="description">Description</th>
                <th class="table-header table-short" id="units">Units</th>
                <th class="table-header table-short" id="gclassCode">GC Code</th>
                <th class="table-header table-long" id="prof">Professors</th>
            </thead>
            <tbody></tbody>
        </table>
        </div>
    </div>

    <!-- end of teacher schedule tab -->
    </div>
</div>