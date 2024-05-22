<?php
  include "../php/connection.php";
  include "../php/signin.php";
  session_start();

  if(isset($_SESSION['Logged_in']) && $_SESSION['Logged_in'] == true) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `accounts` WHERE `user_id` = '$user_id'";
    $result = mysqli_query($conn, $sql);

    $account_row = mysqli_fetch_assoc($result);

    $username = $account_row['username'];
  }
  else {
    echo "<script>alert('Please log in.'); window.location.href = './login.php'</script>";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litratos - Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/svg.css">
    <link rel="stylesheet" href="../styles/gallery.css">
    <link rel="icon" href="../assets/images/litratos.png">
</head>
<body>

<!-- Modal -->
<dialog class="dialog">
    <div class="modal-header d-flex justify-content-between mb-3">
        <h5 class="modal-title" id="exampleModalLabel4">Add a Photo</h5>
        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn-close" data-mdb-dismiss="modal" onclick="hide()" aria-label="Close"></button>
    </div>

    <form method="POST" action="../php/upload.php" enctype="multipart/form-data">
      <div class="form-floating mb-3">
        <input name="photo_name" type="text" class="form-control" id="floatingInput" placeholder="photoname" required>
        <label for="floatingInput">Photo Name</label>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Select Image to Upload</label>
        <input name="image" class="form-control form-control-lg" id="image" type="file" accept=".jpg, .jpeg, .png" value="" required/>
      </div>

      <div class="d-grid">
        <button name="submit" class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Upload</button>
      </div>
    </form>
</dialog>

<!-- Page Content -->
<div class="container">

  <div class="d-flex justify-content-between align-items-center">
        <h1 class="fw-light text-center text-lg-start mt-4 mb-0"><?php echo $username . "'s Gallery"; ?></h1>
        <div class="right d-flex align-items-center justify-content-between">
            <button type="button" class="btn btn-primary" onclick="appear()">
              Add Photo
            </button>
            <a class="logout" href="../php/logout.php"></a>
        </div>
  </div>

  <hr class="mt-2 mb-5">

  <div class="row text-center text-lg-start">
    <?php
      include "../php/display.php";
    ?>
  </div>

</div>
<script src="../script/gallery.js"></script>
</body>
</html>