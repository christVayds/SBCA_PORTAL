<i?php
    session_start();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    } else {
        exit();
    }
?>

<!-- this will show the tabs -->
<div class="acc_tabs active_tab" id="about_tab">
    <i class="fa-regular fa-lightbulb"></i>
    <p>About</p>
</div>
<div class="acc_tabs" id="theme_tab">
    <i class="fa-solid fa-moon"></i>
    <p>Theme</p>
</div>
<div class="acc_tabs" id="pass_tab">
    <i class="fa-solid fa-lock"></i>
    <p>Password</p>
</div>
<div class="acc_tabs" id="setting_tab">
    <i class="fa-solid fa-gear"></i>
    <p>Settings</p>
</div>
<div class="acc_tabs" id="out_tab">
    <i class="fa-solid fa-arrow-right-from-bracket"></i>
    <p>Logout</p>
</div>