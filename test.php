<?php
    include 'base.php';
    include 'Model/semester.inc.php';
?>
    <p>1986-01-29 00:00:00</p>
    <input type="text" placeholder="SY" id="sy" value="2025-2026">
    <input type="text" placeholder="Semester (1, 2, 3...)" id="semester-count" value="1">
    <input type="text" placeholder="Start date" id="date-start" value="1986-01-29 00:00:00">
    <input type="text" placeholder="End date" id="date-end" value="1986-01-29 00:00:00">
    <input type="submit" id="newsem">
    
    <div id="geh"></div>

    <script>
        // for testing only
        console.log('<?php session_start(); echo $_SESSION["usertype"]; ?>');
    </script>
