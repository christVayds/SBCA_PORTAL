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
                        <p>1. Must not contain common words or substitute</p>
                        <p>2. It must not include your username or your name</p>
                        <p>3. It must contain more than 8 characters</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="side right_side">
            <div class="side_content">
                <div class="chpasspass-message-label">
                    <!-- temporary bitch -->
                    <?php
                        if($_GET['message'] === 'success'){
                            echo '<p id="success">Password change successfully</p>';
                        } else if($_GET['message'] === 'fail') {
                            echo '<p id="error">Error: You entered wrong old password</p>';
                        }
                    ?>
                </div>
                <div class="lockiconframe">
                    <img src="Resources/assets/lock.change.pass.png" alt="Change password lock icon">
                </div>
                <div class="form">
                    <form method="post" action="Model/security.inc.php" autocomplete="off">

                        <!-- entering old passworld -->
                        <div class="label">
                            <p>Enter your old password</p>
                        </div>
                        <input type="password" name="oldpass" placeholder="Old password" id="oldpass">
                        <div class="forgotpassLabel">
                            <p>If you forgot your old password, please report to school admin for assistance.</p>
                        </div>
                        <!-- entering new password -->
                        <div class="label">
                            <p>Enter your new password</p>
                        </div>
                        <input type="password" name="pass1" placeholder="New password" id="pass1">
                        <input type="password" name="pass2" placeholder="Re-enter password" id="pass2">
                        <input type="submit" value="Save" id="save_password" name="save_password" disabled>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>