<?php
  if(isset($_POST['submit'])) {
    include "../php/connection.php";

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $sql = "SELECT * FROM `accounts` WHERE `username` = '$username'";

    $result = mysqli_query($conn, $sql);
    $count_row = mysqli_num_rows($result);

    if($count_row == 0) {
      if($password == $confirm_password) {
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `accounts`(`username`, `password`, `email`) VALUES ('$username','$hash_password','$email')";

        if(mysqli_query($conn, $sql)) {
          session_start();

          $sql = "SELECT * FROM `accounts` WHERE `username` = '$username'";
          $result = mysqli_query($conn, $sql);

          $row = mysqli_fetch_assoc($result);


          $_SESSION['Logged_in'] = true;
          $_SESSION['user_id'] = $row['user_id'];
          
          echo "<script> alert('Registration Successful.');window.location.href='./gallery.php';</script>";
        }
        else {
          echo "Error" . mysqli_error($conn);
        }
      }
      else {
        echo "<script>alert('Passwords do not match!');window.location.href='./signup.php';</script></script>";
      }
    }
    else {
      echo "<script>alert('Username is already taken!');window.location.href='./signup.php';</script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litratos - Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="icon" href="../assets/images/litratos.png">
</head>
<body>
<div class="container-fluid ps-md-0">
        <div class="row g-0">
          <div class="d-none d-md-flex col-md-4 col-lg-6 signup-image"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <h3 class="login-heading mb-4">Let's get started!</h3>
      
                    <!-- Sign In Form -->
                    <form method="POST">
                      <div class="form-floating mb-3">
                        <input name="username" type="text" class="form-control" id="floatingInput" placeholder="juandelacruz" required>
                        <label for="floatingInput">Username</label>
                      </div>

                      <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="juandelacruz@gmail.com" required>
                        <label for="floatingInput">Email</label>
                      </div>

                      <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                      </div>

                      <div class="form-floating mb-3">
                        <input name="confirm_password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword" required>Confirm Password</label>
                      </div>
      
                      <div class="d-grid">
                        <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit" name="submit">Sign up</button>
                      </div>

                      <div class="d-grid">
                        <div class="text-center">
                            Already have an account? <a class="small signup" href="./login.php">Sign in</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>   
</body>
</html>