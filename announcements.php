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
                <p>November 2024</p>
            </div>
            <div class="calendar-table">
                <table>
                    <tr>
                        <th class="sunday">S</td>
                        <th class="monday">M</td>
                        <th class="tuesday">T</td>
                        <th class="wednesday">W</td>
                        <th class="thursday">T</td>
                        <th class="friday">F</td>
                        <th class="saturday">S</td>
                    </tr>
                    <tr>
                        <td class="sunday"></td>
                        <td class="monday"></td>
                        <td class="tuesday"></td>
                        <td class="wednesday"></td>
                        <td class="thursday"></td>
                        <td class="friday mark">1</td>
                        <td class="saturday mark">2</td>
                    </tr>
                    <tr>
                        <td class="sunday">3</td>
                        <td class="monday">4</td>
                        <td class="tuesday">5</td>
                        <td class="wednesday">6</td>
                        <td class="thursday">7</td>
                        <td class="friday">8</td>
                        <td class="saturday">9</td>
                    </tr>
                    <tr>
                        <td class="sunday mark bday">10</td>
                        <td class="monday">11</td>
                        <td class="tuesday">12</td>
                        <td class="wednesday">13</td>
                        <td class="thursday">14</td>
                        <td class="friday">15</td>
                        <td class="saturday">16</td>
                    </tr>
                    <tr>
                        <td class="sunday">17</td>
                        <td class="monday">18</td>
                        <td class="tuesday">19</td>
                        <td class="wednesday">20</td>
                        <td class="thursday">21</td>
                        <td class="friday">22</td>
                        <td class="saturday">23</td>
                    </tr>
                    <tr>
                        <td class="sunday">24</td>
                        <td class="monday">25</td>
                        <td class="tuesday">26</td>
                        <td class="wednesday">27</td>
                        <td class="thursday">28</td>
                        <td class="friday">29</td>
                        <td class="saturday mark">30</td>
                    </tr>
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
                <div class="com-image"></div>
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
    <div class="n_side news-tabs">
        <div class="events-tab">
            <h3>November 2024</h3>
            <div class="num-events">
                <h1>2</h1>
                <p>Upcomming events this month.</p>
            </div>
        </div>

        <div class="events-tab">
            <h3>December 2024</h3>
            <div class="num-events">
                <h1>3</h1>
                <p>Upcomming events.</p>
            </div>
        </div>
        <div class="events-tab">
            <h3>January 2025</h3>
            <div class="num-events">
                <h1>5</h1>
                <p>Upcomming events.</p>
            </div>
        </div>
    </div>
</div>