<?php
    include 'base.php';
    include 'Resources/pages/pages.html.php';
?>

<div class="account active">

    <div class="side acc_tabbar">
        <?php
            showTabs('accouting');
        ?>
    </div>

    <div class="side acc_page acc_content content_active" id="acc_content">
        <?php
            // display account page
            AccountPage();
        ?>
    </div>

</div>
