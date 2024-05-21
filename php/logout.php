<?php
    session_start();
    $_SESSION['Logged_in'] = false;
    session_destroy();
    header("Location: ../pages/login.php");
?>