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
    <title>Registration</title>
</head>
<body class="d-flex flex-column">
    <header>
        <nav class="navbar navbar-expand-sm" style="background-color: #94AEAF;">
            <div class="container-fluid">
              
                <a class="navbar-brand" href="#">
                  <img src="asset/Hi-Tech-Icon.png" alt="Logo" style="width:50px;" class="rounded-pill">
                  Hi-Tech
                </a>
            </div>
          </nav>
    </header>
    <main class="m-3 d-block">
      <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 ">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
      
                      <form class="mx-1 mx-md-4 mb-3" method="post" action="php/register.php">
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" name="username" id="username" class="form-control" />
                            <label class="form-label" for="username">Your Name</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" name="email" id="email" class="form-control" />
                            <label class="form-label" for="email">Your Email</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" id="password" class="form-control" name="password" />
                            <label class="form-label" for="password">Password</label>
                          </div>
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
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
      
                      </form>
      
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
      
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                        class="img-fluid" alt="Sample image">
      
                    </div>
                  </div>
                </div>
              </div>
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