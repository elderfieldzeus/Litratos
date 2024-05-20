<?php
    include "../php/connection.php";
    session_start();

    if(isset($_POST['submit']) && isset($_SESSION['Logged_in']) && isset($_SESSION['user_id']))     {
        $photo_name = $_POST['photo_name'];
        $photo = $_POST['photo'];
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO `gallery`(`photo_name`, `photo`, `user_id`) VALUES ('$photo_name','$photo','$user_id')";

        if(mysqli_query($conn, $sql)) {
            echo "<script>alert('Upload Success'); </script>";
            echo "<img src='data:image/png;base64," . $photo . ">";
        }
        else {
            echo "<script>alert('Upload Failed!'); window.location.href = '../pages/gallery.php'</script>";
        }
    }
    else {
        echo "<script>alert('Error'); window.location.href = '../pages/gallery.php'</script>";
    }
?>