<div class="acc_header">
    <div class="_acc_actions">

        <!-- options -->
        <div class="acc_actions">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
        </div>
        <div class="dropdown">
            <div class="selection">
                <div class="label">
                    <i class="fa-solid fa-user-large"></i>
                    <p>Year</p>
                </div>
                <div class="q_dropdown">
                    <p id="accounting-selected_year">1st</p>
                    <div class="q_selection">
                        <p class="accounting_user_selection" value="1">1st</p>
                        <p class="accounting_user_selection" value="2">2nd</p>
                        <p class="accounting_user_selection" value="3">3rd</p>
                        <p class="accounting_user_selection" value="4">4th</p>
                    </div>
                </div>
            </div>
            <div class="selection">
                <div class="label">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <p>Course</p>
                </div>
                <div class="q_dropdown">
                    <p id="accounting-selected_course">BSIT</p>
                    <div class="q_selection">
                        <p class="accounting_course_selection" value="bsit">BSIT</p>
                        <p class="accounting_course_selection" value="bshm">BSHM</p>
                        <p class="accounting_course_selection" value="bsba">BSBA</p>
                        <p class="accounting_course_selection" value="bspsych">BSPsych</p>
                        <p class="accounting_course_selection" value="bsed">BSEE</p>
                        <p class="accounting_course_selection" value="bse">BSE</p>
                        <p class="accounting_course_selection" value="bsse">BSSE</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- refresh -->
    <div class="acc_actions" id="refresh-accounting-page">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
    </div>

    <!-- search -->
    <div class="acc_actions" id="search-student-account">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        <div class="search-account" id="search-account">
            <input type="text" id="search-student-account-input" placeholder="Search">
        </div>
    </div>
</div>


<div class="acc_table">
    <div class="acc_table_header">
        <h3 id="accounting-display-course">Loading...</h3>
        <p>S.Y. <span id="accounting-display-schoolyear">Loading...</span></p>
        <p>Semester Level: <span id="accounting-display-semesterLevel">Loading..</span></p>
    </div>

    <div class="acc_table_view">
        <table class="display-table" id="student-account-table">
            <thead class="table-row">
                <th class="table-header table-id">ID No.</th>
                <th class="table-header table-name">Name</th>
                <th class="table-header table-short">Course</th>
                <th class="table-header table-number">Total Fee</th>
                <th class="table-header table-num">Payment</th>
                <th class="table-header table-num">Balance</th>
                <th class="table-header table-num">No. unit</th>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<div class="blur" id="acc_popupmessage">
    <div class="acc_popupmessage">
        <div class="header">
            <h3 id="acc_popupHeader">Loading...</h3>
            <div class="exit" id="exit_acc-popup">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div class="content">
            <div class="content-message">
                <i id="acc_popupIcon" class="fa-regular fa-hand"></i>
                <p id="acc_popupContent">Loading...</p>
            </div>
        </div>
    </div>
</div>