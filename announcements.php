<?php
    include 'base.php';
    session_start();
?>

<div class="announcements">

    <!-- comment pop up -->
    <div class="read-comments" id="read-comments">

        <div class="comment-section">
            <div class="comment-header">
                <h3>Comments</h3>
                <div class="exit-comments" id="exit-comments">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
            <div class="list-comments" id="list-comments">
                <!-- show list of comments here -->
            </div>

            <!-- type comment here -->
            <?php
                if($_SESSION['usertype'] === 'students'){
                    echo '<div class="type-comment">
                            <input type="text" placeholder="Enter comment" id="input-comment">
                            <button id="post-comment">Comment</button>
                        </div>';
                } else {
                    echo '<div class="type-comment">
                            <input type="text" placeholder="Only student can comment" id="input-comment" disabled>
                        </div>';
                }
            ?>
        </div>

    </div>

    <!-- calendar -->
    <div class="n_side news-calendar">
        <div class="calendar">
            <div class="calendar-header">
                <p id="month_year_calendar">Loading...</p>
            </div>
            <div class="calendar-table">
                <table id="calendar-table">
                    <tr>
                        <th class="sunday">S</td>
                        <th class="monday">M</td>
                        <th class="tuesday">T</td>
                        <th class="wednesday">W</td>
                        <th class="thursday">T</td>
                        <th class="friday">F</td>
                        <th class="saturday">S</td>
                    </tr>
                    <tbody class="calendar-days" id="calendar_days"></tbody>
                </table>
           </div>
        </div>
    </div>

    <!-- content -->
    <div class="n_side news-feeds">
        <div class="event-cover-photo">
            <img src="Resources/assets/cover2.png" alt="merry christmas" loading="lazy">
        </div>

        <?php
            include 'Class/Announcements.class.php';
            Announcements::getPost();
        ?>

        <div class="feed">
            <div class="composer">
                <div class="com-image">
                    <img src="Resources/assets/sbca.logo.5.jpg" alt="SBCA">
                </div>
                <div class="com-name">
                    <p class="com-name-p">St. Bernadette College of Alabang</p>
                    <p class="com-time-p">Nov. 3, 2024 at 11:04pm</p>
                </div>
            </div>
            <div class="content-feed">
                <div class="file-attached">
                    <img src="Resources/assets/image.jpg" alt="image" loading="lazy">
                </div>
                <h2>This is title</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, omnis? Rem quidem nostrum doloribus incidunt perferendis numquam voluptatibus praesentium magnam voluptatem eius repudiandae tempora nam dignissimos eligendi earum, deleniti alias.</p>
            </div>
            <div class="reactions-feed">
                <div class="reaction react-like" id="like_link1">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <div class="reaction react-comment" id="comment-link1">
                    <i class="fa-regular fa-comment"></i>
                </div>
                <div class="reaction react-share" id="share-link1">
                    <i class="fa-solid fa-share"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- upcomming events -->
    <div class="n_side news-tabs" id="list-events-announcements">
        <h2>Events</h2>
        <div class="events-tab">
            <h3>Loading...</h3>
            <div class="num-events">
                <h1>Loading...</h1>
                <p>Loading...</p>
            </div>
        </div>
    </div>
</div>