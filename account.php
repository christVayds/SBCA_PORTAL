<?php
    include 'base.php';
?>

<!-- Account page Student -->
<div class="account" id="student">

</div>

<!-- Account page Admin -->
<div class="account active" id="admin">

    <!-- TAB BARS -->
    <div class="side acc_tabbar">
        <div class="acc_tabs active_tab" id="acc_tab">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-user-round"><path d="M18 20a6 6 0 0 0-12 0"/><circle cx="12" cy="10" r="4"/><circle cx="12" cy="12" r="10"/></svg>
            <p>Account</p>
        </div>
        <div class="acc_tabs " id="class_sched_tab">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
            <p>Class Schedule</p>
        </div>
        <div class="acc_tabs" id="event_tab">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
            <p>News</p>
        </div>
        <div class="acc_tabs" id="about_tab">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
            <p>About</p>
        </div>
        <div class="acc_tabs" id="theme_tab">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
            <p>Theme</p>
        </div>
        <div class="acc_tabs" id="pass_tab">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-key-round"><path d="M2 18v3c0 .6.4 1 1 1h4v-3h3v-3h2l1.4-1.4a6.5 6.5 0 1 0-4-4Z"/><circle cx="16.5" cy="7.5" r=".5" fill="currentColor"/></svg>
            <p>Password</p>
        </div>
        <div class="acc_tabs" id="setting_tab">
            <i class="fa-solid fa-gear"></i>
            <p>Settings</p>
        </div>
        <div class="acc_tabs" id="out_tab">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
            <p>Logout</p>
        </div>
    </div>

    <!-- Account content view  -->

    <div class="side acc_page acc_content content_active" id="acc_content"> 
        <div class="acc_header">
            <div class="_acc_actions">
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
                            <p>First year</p>
                            <div class="q_selection">
                                <p>First year</p>
                                <p>Second year</p>
                                <p>Third year</p>
                                <p>Fourth year</p>
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
            <div class="acc_actions">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
            </div>
            <div class="acc_actions">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
            </div>
            <div class="acc_actions">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </div>
        </div>
        <div class="acc_table">
            <div class="acc_table_header">
                <h3>BS Information Technology 3</h3>
                <p>S.Y. 2023-2024</p>
                <p>2nd Semester</p>
            </div>
            <div class="acc_table_view">
                <table class="acc_table_content">
                    <tr id="tbl_header">
                        <th id="userid">ID No.</th>
                        <th id="username">Name</th>
                        <th id="usercourse">Course</th>
                        <th id="usertotal">Total Fee</th>
                        <th id="usermonthly">Monthly Fee</th>
                        <th id="userreceivable">Total receivable</th>
                        <th id="userunit">No. unit</th>
                    </tr>
                    <tr>
                        <td>C2021-29984</td>
                        <td>
                            <a href="#">Peter Parker</a>
                        </td>
                        <td>BS Information Technology</td>
                        <td class="balance">10,000</td>
                        <td class="balance">2,000</td>
                        <td class="balance">3,000</td>
                        <td class="balance">12</td>
                    </tr>
                    <tr>
                        <td>C2021-29984</td>
                        <td>
                            <a href=""#>Johny Sins</a>
                        </td>
                        <td>BS Information Technology</td>
                        <td class="balance">10,000</td>
                        <td class="balance">2,000</td>
                        <td class="balance">3,000</td>
                        <td class="balance">12</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- class schedule content view -->
    <!-- hidden -->
    <div class="side acc_page class_content " id="class_content">
        <div class="acc_header">
            <div class="_acc_actions">
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
                            <p>First year</p>
                            <div class="q_selection">
                                <p>First year</p>
                                <p>Second year</p>
                                <p>Third year</p>
                                <p>Fourth year</p>
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
            <div class="acc_actions">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            </div>
            <div class="acc_actions">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
            </div>
        </div>

        <div class="acc_table">
            <div class="acc_table_header">
                <h3>BS Information Technology 3</h3>
                <p>S.Y. 2023-2024</p>
                <p>2nd Semester</p>
                <p>Students enrolled: 12</p>
            </div>
            <div class="acc_table_view">
                <table class="acc_table_content">
                    <tr id="tbl_header">
                        <th id="time">Time</th>
                        <th id="day">Day</th>
                        <th id="subcode">Code</th>
                        <th id="description">Description</th>
                        <th id="units">Units</th>
                        <th id="gclassCode">Google Classroom Code</th>
                        <th id="prof">Professors</th>
                    </tr>
                    <tr>
                    <td>10:00am-1:00pm</td>
                        <td>Mon</td>
                        <td>ITE Major5</td>
                        <td>Integrated Programming and Technologies W/Lab</td>
                        <td>3</td>
                        <td>y2rtcmg</td>
                        <td>Prof. Soriano</td>
                    </tr>
                    <tr>
                        <td>07:00am-10:00pm</td>
                        <td>Tue</td>
                        <td>ITE 5</td>
                        <td>Information Management W/Lab</td>
                        <td>3</td>
                        <td>y2rtcmg</td>
                        <td>Prof. Soriano</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Events -->
    <div class="side acc_page event_content" id="event_page">
        <div class="content">
            <div class="event_info">

                <!-- post example -->
                <div class="display_event">
                    <div class="title">
                        <div class="name">
                            <img src="Resources/assets/sbca.logo.5.jpg" alt="SBCA.jpg">
                            <p class="author">St. Bernadette College of Alabang Inc.</p>
                        </div>
                        <div class="time">
                            <p>on March 24, 2024</p>
                        </div>
                    </div>
                    <div class="event_body">
                        <div class="medias">
                            <img src="resources/assets/sbca.logo.5.jpg" alt="">
                        </div>
                        <div class="event_body">
                            <p>In celebration of the 41st Founding Anniversary of St. Bernadette College of Alabang and the National Women’s Month, the highly commendable SBCA theater arts group that brought you Bernice and Pag-ibig ni Rama proudly sets its 5th season offering entitled, “SUNDALA”, a play adaptation written and directed by SBCA alumna, Ms. Maureen Acosta-Layno with assistant stage direction by fellow SBCA alumni Mr. Ryan Computerich Montalbo and Mr. Er-lony Prudente.This stage play is based on Palanca Awardee Nicholas Pichay’s strong-willed character, Teresa Magbanua, who epitomizes the strength of a Filipina in a very male-domineering society.<br><br> The performances are set for March 22, 2024 with an advance opening show at 2:00 p.m., as well as on March 23 with 10:00 a.m., 2:00 p.m. and 6:00 p.m. shows. Featuring the performances of the Basic Ed Department students from grades 1-12, the play shall be staged at the South Park Ayala Malls, Cinema 1, Alabang.🥰<br><br> For ticket reservations pls call:02 88422139 or (0917) 6367332</p>
                        </div>
                    </div>
                    <div class="numberOfRections">
                        <p>Like: 1 Comments: 0</p>
                    </div>
                    <div class="reactions">
                        <div class="acc_actions like">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="acc_actions">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <div class="acc_actions">
                            <i class="fa-solid fa-share"></i>
                        </div>
                    </div>
                </div>

                <!-- post example -->
                <div class="display_event">
                    <div class="title">
                        <div class="name">
                            <img src="Resources/assets/sbca.logo.5.jpg" alt="SBCA.jpg">
                            <p class="author">St. Bernadette College of Alabang Inc.</p>
                        </div>
                        <div class="time">
                            <p>on March 24, 2024</p>
                        </div>
                    </div>
                    <div class="event_body">
                        <div class="medias">
                            <img src="Resources/assets/school.jpeg" alt="">
                        </div>
                        <div class="event_body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim rem atque asperiores dolor corporis magnam voluptas, distinctio et inventore eos exercitationem pariatur voluptates laudantium fuga cum, consequatur ratione totam reprehenderit!</p>
                        </div>
                    </div>
                    <div class="numberOfRections">
                        <p>Like: 0 Comments: 0</p>
                    </div>
                    <div class="reactions">
                        <div class="acc_actions like">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <div class="acc_actions">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <div class="acc_actions">
                            <i class="fa-solid fa-share"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event_lists">
                <div class="event_heading">
                    <div class="title">
                        <h3>March 2024</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
                    </div>
                    <div class="num_events">
                        <i class="fa-regular fa-calendar-check"></i>
                        <p>3 announcements</p>
                    </div>
                </div>
                <div class="list_of_events">
                    <div class="event" id="march24">
                        <div class="title">
                            <h4>March 24</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-chevron-down"><circle cx="12" cy="12" r="10"/><path d="m16 10-4 4-4-4"/></svg>
                        </div>
                        <div class="content_event" id="march24_cont">
                            <p>This the body of event...</p>
                        </div>
                    </div>

                    <div class="event" id="march25">
                        <div class="title">
                            <h4>March 25</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-chevron-down"><circle cx="12" cy="12" r="10"/><path d="m16 10-4 4-4-4"/></svg>
                        </div>
                        <div class="content_event" id="march25_cont">
                            <p>This the body of event...</p>
                        </div>
                    </div>

                    <div class="event" id="march30">
                        <div class="title">
                            <h4>March 30</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-chevron-down"><circle cx="12" cy="12" r="10"/><path d="m16 10-4 4-4-4"/></svg>
                        </div>
                        <div class="content_event" id="march30_cont">
                            <p>Black Friday</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- about content view -->
    <div class="side acc_page about_content" id="about_content">
        <div class="about_nav_bar">
            <div class="logo">
                <img src="Resources/assets/SBCA.jpg" alt="">
            </div>
            <div class="nav_items">
                <a href="#">About SBCA</a>
                <a href="#">About Portal</a>
                <a href="#">Contact</a>
            </div>
        </div>
        <div class="slide_images">
            <img src="https://scontent.fmnl4-3.fna.fbcdn.net/v/t39.30808-6/435878734_836744818468305_2320991333417518899_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGY3A7nXS3SXSzgw0nrKzIowyl0tgo0HtjDKXS2CjQe2Egci8aUV-hOqNDIw53oKf0glUVQZJv0tdwnGdXN9FnW&_nc_ohc=rcGSikLFqQYAb6xChg5&_nc_ht=scontent.fmnl4-3.fna&oh=00_AfA14WMVP3et_U2NEmP8i_YVswopmOtzlU-WlRb17GjQig&oe=662C199A" alt="">
        </div>
        <div class="news_about">
            <div class="side news_side">
                <div class="header">
                    <h3>News and Updates</h3>
                </div>
                <div class="news_content">
                    <img src="resources/assets/image.jpg" alt="">
                    <p>Hell word👊</p>
                </div>
            </div>
            <div class="side about_side">
                <!-- every about side content -->
                <div class="abt_side_content">
                    <div class="header">
                        <h3>Certificates and Ratings</h3>
                    </div>
                    <div class="award_content">
                        <img src="https://d3jmn01ri1fzgl.cloudfront.net/photoadking/webp_thumbnail/school-achievement-certificate-template-kxghkrb1003429.webp" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>

                <div class="abt_side_content">
                    <div class="header">
                        <h3>Certificates and Ratings</h3>
                    </div>
                    <div class="award_content">
                        <img src="https://d3jmn01ri1fzgl.cloudfront.net/photoadking/webp_thumbnail/school-achievement-certificate-template-kxghkrb1003429.webp" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="about_school">
            <div class="side left_side">
                <div class="side_content">
                    <img src="Resources/assets/sbca.logo2.png" alt="">
                    <h3>St. Bernadette College Of Alabang</h3>
                    <p>Since 1938</p>
                </div>
            </div>
            <div class="side right_side">
                <!-- mission and vision -->
                <div class="side_content">
                    <h3>Mission</h3>
                    <p>St. Bernadette College of Alabang is an educational institution that transforms the society by forming globally competitive individuals, inspired by the motto "Humble Thy Spirit". </p>
                </div>
                <div class="side_content">
                    <h3>Vision</h3>
                    <p>We are committed to the integral formation of our students in achieving their full potential as empowered members of the socienty.</p>
                </div>
                <div class="side_content">
                    <h3>Our Campus</h3>
                    <p>Located in the heart of the Tri-City area of Muntinlupa - Parañaque -Las Piñas, our campus is home to state-of-the-art facilities, cutting-edge technology, and world-class faculty.</p>
                </div>
                <div class="side_content">
                    <h3>Our History</h3>
                    <p>Founded in 1983, Saint Bernadette College of Alabang, Inc. has a rich history of academic excellence and a commitment to providing students with the skills they need to succeed in their careers.</p>
                </div>
            </div>
        </div>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
                        <p>Normal</p>
                    </div>
                </div>
                <div class="theme" id="dark">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                        <p>Dark</p>
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
        <div class="change_pass">
            <div class="header">
                <h2>SBCA</h2>
            </div>
            <div class="sides">
                <div class="side left_side">
                    <div class="side_content">
                        <div class="logo">
                            <img src="Resources/assets/sbca.logo2.png" alt="logo">
                        </div>
                        <div class="password_tips">
                            <h2>Change Password</h2>
                            <p>Password must:</p>
                            <div class="tips_list">
                                <p>Must not contain common words or substitute</p>
                                <p>It must not include your username or your name</p>
                                <p>It must contain more than 8 characters</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="side right_side">
                    <div class="side_content">
                        <div class="password_icon">
                            <img src="Resources/assets/security.png" alt="password">
                        </div>
                        <div class="form">
                            <h4>Enter new password</h4>
                            <form method="post" autocomplete="off">
                                <input type="password" placeholder="Enter password" id="pass1">
                                <input type="password" placeholder="Re-enter password" id="pass2">
                                <input type="submit" value="Save" id="save_password" disabled>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings -->
    <div class="side acc_page settings_content" id="settings_page">

        <!-- POPUP for SETTINGS -->
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

        <!-- END OF POPUP FOR SETTINGS -->
        <div class="content">
            <div class="side setting">
                <div class="settingbox">
                    <h1 class="header">
                        <i class="fa-solid fa-wrench"></i>
                        <p>Settings</p>
                    </h1>

                    <div class="settingItem" id="import">
                        <h2>
                            <i class="fa-solid fa-download"></i>
                        </h2>
                        <div class="settingname">
                            <h3>Import</h3>
                            <div class="description">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>

                    <div class="settingItem" id="export">
                        <h2>
                            <i class="fa-solid fa-upload"></i>
                        </h2>
                        <div class="settingname">
                            <h3>Export</h3>
                            <div class="description">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>

                    <div class="settingItem">
                        <h2>
                            <i class="fa-solid fa-timeline"></i>
                        </h2>
                        <div class="settingname">
                            <h3>User Timeline</h3>
                            <div class="description">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>

                    <div class="settingItem">
                        <h2>
                            <i class="fa-solid fa-heart"></i>
                        </h2>
                        <div class="settingname">
                            <h3>Viewers Reactions</h3>
                            <div class="description">
                                <p>Students and teachers can like and post a comment on SBCA posts.</p>
                            </div>
                        </div>
                    </div>

                    <div class="settingItem">
                        <h2>
                            <i class="fa-regular fa-life-ring"></i>
                        </h2>
                        <div class="settingname">
                            <h3>Help</h3>
                            <div class="description">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="side user">
                <div class="userbox">
                    <div class="header">
                        <img src="resources/assets/sbca.logo.5.jpg" alt="">
                        <div class="nameuser">
                            <!-- change this! -->
                            <a href="#">Christian Vaydal</a>
                            <p>SBCA</p>
                        </div>
                    </div>
                    <div class="actions">
                        <a class="action" href="#">
                            <i class="fa-solid fa-user-pen"></i>
                            <p>Edit profile</p>
                        </a>
                        <a class="action" href="#">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <p>History</p>
                        </a>
                        <a class="action" href="#">
                            <i class="fa-solid fa-users"></i>
                            <p>Other users</p>
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