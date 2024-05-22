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
            '<dialog class="pop_up_dialog">
                <div class="pop_up_main">
                    <div class="pop_up_left">
                        <img class="pop_up_image" src="../assets/gallery/' . $row['photo'] . '" alt="' . $row['photo_name'] . '">
                    </div>
                    <div class="pop_up_right">
                        <span class="pop_up_exit"></span>

                        <div class="content">
                            <h1>' . $row['photo_name'] . '</h1>
                            <p> Uploaded on: ' . $row['date_created'] . '</p>

                            <div class="buttons">
                                <a class="pop_up_delete" href="../php/delete.php?id=' . $row['photo_id'] .'"></a>

                                <a class="pop_up_download" href="../php/download.php?photo=' . $row['photo'] . '"></a>
                            </div>

                        </div>
                    </div>
                <div>
            </dialog>

            <div class="big_container col-lg-3 col-md-4 col-6">
                <div class="container d-block mb-4 h-100">
                    <img class="images img-fluid img-thumbnail" src="../assets/gallery/' . $row['photo'] . '" alt="' . $row['photo_name'] . '">
                </div>
            </div>';
        }
    }

?>