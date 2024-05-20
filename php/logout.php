<?php
    session_start();
    $_SESSION['Logged_in'] = false;
    session_destroy();
    echo "<script>alert('Logged out Successfully.'); window.location.href = '../pages/login.php'</script>";
?>