<?php

  include "../php/signin.php";  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litratos - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="icon" href="../assets/images/litratos.png">
</head>
<body>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
          <div class="d-none d-md-flex col-md-4 col-lg-6 login-image"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <h3 class="login-heading mb-4">Welcome back!</h3>
      
                    <!-- Sign In Form -->
                    <form method="POST">
                      <div class="form-floating mb-3">
                        <input name="username" type="text" class="form-control" id="floatingInput" placeholder="juandelacruz" required>
                        <label for="floatingInput">Username</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                      </div>
      
                      <div class="d-grid">
                        <button name="submit" class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Sign in</button>
                      </div>

                      <div class="d-grid">
                        <div class="text-center">
                            Don't have an account? <a class="small signup" href="./signup.php">Sign up</a>
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