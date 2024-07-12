<?php

if(isset($_POST['student'])){
    echo '
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
            <div class="students_grade" id="students_grade">
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
    ';
}

?>
<script src="Resources/script/dashboard.js"></script>