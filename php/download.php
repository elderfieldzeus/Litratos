<?php
    // echo '<script>alert("' . $_GET['id'] .'"); window.location.href="../pages/gallery.php";</script>';

    if(isset($_GET['photo'])) {
        $imagePath = "../assets/gallery/" . $_GET['photo'];

        if (file_exists($imagePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: image/jpeg');
            header('Content-Disposition: attachment; filename="' . basename($imagePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($imagePath));
            
            ob_clean();
            flush();
            readfile($imagePath);
            exit;
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "File not found.";
        }

        echo '<script>alert("Image successfuly downloaded!"); window.location.href="../pages/gallery.php"</script>.';
    }
    else {
        echo '<script>alert("Download Failed!"); window.location.href="../pages/gallery.php"</script>.';
    }
?>