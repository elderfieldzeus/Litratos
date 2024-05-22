<?php
    include "../php/connection.php";
    session_start();

    if(isset($_POST['submit']) && isset($_SESSION['Logged_in']) && isset($_SESSION['user_id'])) {

        if(!isset($_FILES["image"]) || $_FILES["image"]["error"] != UPLOAD_ERR_OK) {
            echo 
            "<script>
                alert('Image not found');
                window.location.href = '../pages/gallery.php'
            </script>";
        }
        else {
            $photo_name = $_POST['photo_name'];

            $photo = $_FILES["image"]["name"];
            $tmp_name = $_FILES["image"]["tmp_name"];
            $photo_size = $_FILES['image']['size'];

            $max_size = 5 * 1024 * 1024;

            $valid_format = ['jpg', 'jpeg', 'png'];
            $image_extension = explode('.', $photo);
            $image_extension = strtolower(end($image_extension));

            if(!in_array($image_extension, $valid_format)) {
                echo 
                "<script>
                    alert('Invalid format');
                    window.location.href = '../pages/gallery.php';
                </script>";
            }
            else if($photo_size > $max_size) {
                echo 
                "<script>
                    alert('Image size too Large');
                    window.location.href = '../pages/gallery.php';
                </script>";
            }
            else {
                $new_image = uniqid() . '.' . $image_extension;

                $upload_dir = "/opt/lampp/htdocs/Litratos/assets/gallery/";
                $destination = $upload_dir . $new_image;

                // Ensure the upload directory exists
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                    echo "<script>
                        alert('" . $new_image . "');
                    </script>";
                }
                
                if (move_uploaded_file($tmp_name, $destination)) {
                    chmod($destination, 0777);
                    

                    $user_id = $_SESSION['user_id'];

                    $sql = "INSERT INTO `gallery`(`photo_name`, `photo`, `user_id`) VALUES ('$photo_name','$new_image','$user_id')";

                    if (mysqli_query($conn, $sql)) {
                        header("Location: ../pages/gallery.php");
                    } else {
                        echo "<script>
                                alert('Database Insert Failed');
                                window.location.href = '../pages/gallery.php';
                            </script>";
                    }
                } else {
                    echo "<script>
                            alert('Failed to move uploaded file');
                            window.location.href = '../pages/gallery.php';
                        </script>";
                }

            }
        }
        
    }
    else {
        echo "<script>alert('Error'); window.location.href = '../pages/gallery.php'</script>";
    }
?>