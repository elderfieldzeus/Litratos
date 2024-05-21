<link rel="stylesheet" href="../styles/gallery.css">

<?php

    include "../php/connection.php";

    if(isset($_SESSION['Logged_in']) && $_SESSION['Logged_in'] == true) {
        $user_id = $_SESSION['user_id'];
        
        $sql = "SELECT * FROM `gallery` WHERE `user_id` = '$user_id'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0) {
            echo
            '<div class="d-flex justify-content-center">
                <h5 class="no_image">No images yet. Add a photo!</h5>
            </div>';
        };

        while($row = mysqli_fetch_assoc($result)) {
            echo
            '<div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="../assets/gallery/' . $row['photo'] . '" alt="' . $row['photo_name'] . '">
                </a>
            </div>';
        }
    }

?>