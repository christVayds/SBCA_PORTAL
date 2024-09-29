<?php
    include 'base.php';
    include 'Model/semester.inc.php';
?>
    <input type="text" placeholder="SY" id="sy">
    <input type="text" placeholder="semester" id="semester">
    <input type="text">
    <input type="text">
    <input type="submit" id="newsem">
    
    <div id="geh"></div>

    <script>
        // for testing only
        console.log('<?php session_start(); echo $_SESSION["usertype"]; ?>');
    </script>
