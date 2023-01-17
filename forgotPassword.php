<?php
  session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm" style="background-color: #94AEAF;">
            <div class="container-fluid">
              
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <a class="navbar-brand" href="#">
                  <img src="asset/Hi-Tech-Icon.png" alt="Logo" style="width:50px;" class="rounded-pill">
                  Hi-Tech
                </a>
                
              </div>
               
            </div>
          </nav>
    </header>
    <main >
        <section class="vh-100 p-3 m-3">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6 text-black">
          
                  <div class="px-5 ms-xl-4 mt-3 ">
                    <a class="navbar-brand" href="#">
                        <img src="asset/Hi-Tech-Icon.png" alt="Logo" style="width:20%;" class="img-thumbnail">
                      </a>
                  </div>
          
                  <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
          
                    <form style="width: 23rem;" method="POST" action="php/resetUserPass.php">
          
                      <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Reset Password</h3>
          
                      <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control form-control-lg" />
                        <label class="form-label" for="email">Email address</label>
                      </div>
          
                      <div class="form-outline mb-4">
                        <input type="password" id="newPassword" name="newPassword" class="form-control form-control-lg" />
                        <label class="form-label" for="newPassword">New Password</label>
                      </div>
                      <div class="form-check d-flex justify-content-center mb-5">
                          <input class="form-check-input me-2" type="checkbox" value="ok" id="agree" name="agree"/>
                          <label class="form-check-label" for="agree">
                            I agree all statements in <a href="#!">Terms of service</a>
                          </label>
                      </div>

                      <?php
                        if(!empty($_SESSION['error'])){
                          echo'<div class="error-reg">'; echo $_SESSION['error']; echo'</div>';
                          unset($_SESSION['error']);
                        }
                      ?>

                      <div class="pt-1 mb-4">
                        <button class="btn btn-danger btn-lg btn-block text-white" type="submit">Reset</button>
                      </div>
          
                      
                      <p>Don't have an account? <a href="registration.php" class="link-info">Register here</a></p>
          
                    </form>
          
                  </div>
          
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
                    alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
              </div>
            </div>
          </section>
    </main>
    <?php
    require_once('./php/footerSignUp.php');
    ?>
</body>
</html>