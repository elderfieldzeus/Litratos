<?php
    if(isset($_POST['submit'])) {
        include "../php/connection.php";
    
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $sql = "SELECT * FROM `accounts` WHERE `username` = '$username'";
        $result = mysqli_query($conn, $sql);  
    
        $row = mysqli_fetch_assoc($result);
        
        if($row && password_verify($password, $row['password'])) {
          session_start();
          $_SESSION['Logged_in'] = true;
          $_SESSION['user_id'] = $row['user_id'];
          echo "<script>alert('Login Successful'); window.location.href = './gallery.php'</script>";
        }
        else {
          echo "<script>alert('Invalid Username or Password.'); window.location.href = './login.php'</script>";
        }
      }
?>