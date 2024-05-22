<?php

    if(isset($_GET['id']) && isset($_GET['photo'])) {
        include "../php/connection.php";

        $id = $_GET['id'];
        $imagePath = "../assets/gallery/" . $_GET['photo'];
        
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        
        $sql = "DELETE FROM `gallery` WHERE `photo_id`='$id'";
        
        if($conn->query($sql)) {
            echo '<script>alert("Image deleted succesfully!"); window.location.href="../pages/gallery.php"</script>.';
        }
        else {
            echo '<script>alert("Failed to delete image!"); window.location.href="../pages/gallery.php"</script>.';
        }
    }

?>