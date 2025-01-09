<?php
    include 'base.php';
    include 'Resources/pages/pages.html.php';
?>

<div class="account accounting active">
    <div class="popup account_info_popup" id="account_info_popup">
        
        <div class="viewuseraccount">
            <div class="viewaccount">
                <div class="sides inputAccount">
                    <div class="page-header">
                        <h3>Update</h3>
                        <i class="fa-solid fa-xmark" id="exit_student_acc_popup"></i>
                    </div>
                    <div class="header">
                        <div class="user-info">
                            <img id="acc-user-image" src="https://i.pinimg.com/236x/ee/08/fb/ee08fbaca71d0084f7dd96780b0f9c52.jpg" alt="">
                            <p class="name" id="Acc_fullname">Loading...</p>
                            <p class="schoolid" id="Acc_schoolid">Loading...</p>
                            <p class="schoolid" id="Acc_usercourse">Loading...</p>
                        </div>
                    </div>
                    <div class="actions">
                        <div class="action" id="save-std-account">
                            <i class="fa-regular fa-floppy-disk"></i>
                            <p>Update</p>
                        </div>
                        <div class="action" id="history-std-account">
                            <i class="fa-solid fa-timeline"></i>
                            <p>Payments Made</p>
                        </div>
                    </div>
                    <div class="content-account">
                        <div class="line">
                            <p class="label">Balance:</p>
                            <p id="acc-balance">Loading...</p>
                        </div>
                        <div class="line">
                            <p class="label">Total Assessments:</p>
                            <p id="acc-total_ass">Loading...</p>
                        </div>
                        <div class="line">
                            <p class="label">Username:</p>
                            <input type="text" placeholder="Username" id="accounting-payment-username">
                        </div>

                        <div class="line">
                            <p class="label">Date:</p>
                            <input type="date" id="accounting_date-today">
                        </div>
                        <div class="line">
                            <p class="label">Amount:</p>
                            <input type="text" placeholder="0" id="accounting-payment-amount">
                        </div>
                        <div class="line">
                            <p class="label">Semester:</p>
                            <select name="accounting-payment-semesterLevel" id="accounting-payment-semesterLevel">
                            </select>
                        </div>
                        <div class="line">
                            <p class="label">Payment method:</p>
                            <input type="text" placeholder="Onsite" id="accounting-payment-pm" value="Onsite">
                        </div>
                        <div class="line note">
                            <p class="label">Note:</p>
                            <textarea name="note" id="accounting-payment-note" placeholder="Note..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="sides viewHistory" id="accounting-viewHistory">
                    <h3>Account Payments</h3>
                    <div class="display-payments" id="display-payments">
                        <div class="item">
                            <h4>Loading...</h4>
                            <div class="payment-info">
                                <p>Loading...</p>
                                <p>Amount: Loading...</p>
                                <p>Balance: Loading...</p>
                                <p>Payment method: Loading...</p>
                                <p>Note: Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="side acc_page acc_content content_active" id="acc_content">
        <?php
            // display account page
            AccountPage();
        ?>
    </div>
</div>
