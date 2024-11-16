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
    <div class="t_option" id="t_ptatab">
        <i class="fa-regular fa-file"></i>
        <p>PTA</p>
    </div>
    <div class="t_option" id="t_newstab">
        <i class="fa-solid fa-newspaper"></i>
        <p>Announcements</p>
    </div>
</div>

<!-- list contents (right side) -->
<div class="tabs workspace">

    <!-- dashboard page -->
    <div class="workcard Dashboardview viewpage" id="_t_admindashboard">
    
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

                    <!-- save as... -->
                    <div class="selection">
                        <div class="label">
                            <i class="fa-solid fa-download"></i>
                            <p>Save as...</p>
                        </div>
                        <div class="q_dropdown">
                            <p>Excel</p>
                            <div class="q_selection">
                                <p>Excel</p>
                                <p>PDF</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="actions">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
            </div>
            <div class="actions" id="t_search-enrolled-std">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </div>
        </div>
        <div class="controlside">
            <div class="controls">
                <p>Subject: ITE 1</p>
            </div>
            <div class="page">
                <p>Read-only</p>
            </div>
        </div>
    </div>
    
    <div class="content">
            <div class="titleContent">
                <h3>Introduction to Programming 1</h3>
                <p>BS Information Techbology</p>
                <p>No. of Students: 40</p>
            </div>
        <!-- page content here -->
         <table class="display-table">
            <!-- the th and td classname with id, name, long and number is the size name of the columns in table -->
            <tr class="table-row">
                <th class="table-header table-id">ID no.</th>
                <th class="table-header table-name">Name</th>
                <th class="table-header table-long">Course</th>
                <th class="table-header table-number">GPA</th>
            </tr>

            <tr class="table-row table-user">
                <td class="table-data table-id">09892</td>
                <td class="table-data table-name">Peter Parker</td>
                <td class="table-data table-long">BS Information Technology</td>
                <td class="table-data table-input">
                    <input type="text" placeholder="N/A" disabled>
                </td>
            </tr>
         </table>
    </div>

    <!-- end of dashboard page -->
    </div> 

    <!-- teacher schedule -->
    <div class="workcard Dashboardview" id="_t_schedule">

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

                    <!-- save as -->
                    <div class="selection">
                        <div class="label">
                            <i class="fa-solid fa-download"></i>
                            <p>Save as...</p>
                        </div>
                        <div class="q_dropdown">
                            <p>JPG</p>
                            <div class="q_selection">
                                <p>JPG</p>
                                <p>PDF</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="actions">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
            </div>
            <div class="actions">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </div>
        </div>
        <div class="controlside">
            <div class="controls">
                <p>Level: 1</p>
            </div>
        </div>
    </div>

    <div class="content">
        <?php
            include('showSchedule.html.php');
        ?>
    </div>

    <!-- end of teacher schedule tab -->
    </div>

    <!-- teacher pta -->
    <div class="workcard Dashboardview" id="_t_pta">

    <div class="header">
        <div class="actionside">
            <div class="_actions">
                <div class="actions" id="admindb_option">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                </div>
                <!-- drop down for dashboard menu icon -->
                <div class="dropdown">

                    <!-- save as... -->
                    <div class="selection">
                        <div class="label">
                            <i class="fa-solid fa-download"></i>
                            <p>Save as...</p>
                        </div>
                        <div class="q_dropdown">
                            <p>JPG</p>
                            <div class="q_selection">
                                <p>JPG</p>
                                <p>PDF</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="actions">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
            </div>
        </div>
        <div class="controlside">
            <div class="page">
                <p>Page: 1-1</p>
            </div>
        </div>
    </div>

    <!-- end of teacher pta page -->
    </div>

    <!-- teacher announcement page -->
    <div class="workcard Dashboardview" id="_t_announcement">

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
                </div>
            </div>
            <div class="actions">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
            </div>
        </div>
    </div>

    <!-- end of teacher announcement page -->
    </div>

</div>