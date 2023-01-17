<?php
require_once('general.php');
echo'<header>';
       echo' <nav class="navbar navbar-expand-sm" style="background-color: #94AEAF;">';
         echo'   <div class="container-fluid">';
              
              echo'<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">';
                echo'<span class="navbar-toggler-icon"></span>';
              echo'</button>';
              echo'<div class="collapse navbar-collapse" id="collapsibleNavbar">';
                echo'<a class="navbar-brand" href="#">';
                  echo'<img src="asset/Hi-Tech-Icon.png" alt="Logo" style="width:50px;" class="rounded-pill">';
                echo'</a>';
                echo'<ul class="navbar-nav">';
                  echo'<li class="nav-item">';
                    echo'<a class="nav-link" href="index.php">Home</a>';
                  echo'</li>';
                  echo'<li class="nav-item">';
                    echo'<a class="nav-link" href="service.php">Service</a>';
                  echo'</li>';
                  echo'<li class="nav-item">';
                    echo'<a class="nav-link" href="redeem.php">Redeem</a>';
                  echo'</li>';
                  
                    if($login===true){
                      echo'<li class="nav-item">';
                      echo'<a class="nav-link" href="php/logOut.php">Log Out</a>';
                      echo'</li>';
                    }
                    else{
                      echo'<li class="nav-item">';
                      echo'<a class="nav-link" href="login.php">Log In</a>';
                      echo'</li>';
                    }
                   
                echo'</ul>';
              echo'</div>';
               echo'<div class="d-flex justify-content-end text-white">';
                echo'<div class="d-flex flex-column justify-content-center">';
                    echo'<div class="container-fluid text-center">';
                        echo'<a class="navbar-brand" href="#">';
                           echo'<p class="text-center">';
                            echo'<img src="asset/User_Icon.png" alt="Avatar Logo" style="width:50px;" class="rounded-pill d-block">'; 
                          echo'</p>'; 
                          echo'</a>'; 
                    echo'</div>';
                    echo'<div class="container-fluid text-center">';
                        printf("%s",$username); 
                    echo'</div>';
                    echo'<div class="container-fluid text-center">';
                       printf("%d Point",$user_point);
                    echo'</div>';
                echo'</div>';
              echo'</div>';
            echo'</div>';
          echo'</nav>';
    echo'</header>';

?>