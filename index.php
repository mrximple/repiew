<?php
require_once("./php/general.php");

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
    <title>HiTech</title>
</head>
<body >
  <?php
    require_once("./php/header.php");
  ?>
    
    <main >
      <div class="row border-bottom border-3">
        <div class="col-sm-4">
          <img src="asset/Visi.jpg"  class="img-thumbnail"alt="our Vision" width="100%" height="auto">
        </div>
        <div class="col-sm-8 text-justify">
          <div class="d-flex justify-content-center">
            <div class="d-flex align-items-center">
              <div class="d-flex flex-column m-5" width="50%" height="auto">
                <p class="h1 p-3" style="color:#222020;font-family:'Arial Nova', Helvetica, sans-serif;"><u>Our Vision</u></p>
                <p class="h3 p-3" style="color:#222020;font-family:'Source Sans Pro Light', Helvetica, sans-serif;"><q>We want to provide IT repair services that are easy, fast, and also reliable so that it can help many people and companies in the future.</q></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row border-bottom border-3">
        <div class="col-sm-8 text-justify">
          <div class="d-flex justify-content-center">
            <div class="d-flex align-items-center">
              <div class="d-flex flex-column m-5" width="50%" height="auto">
                <p class="h1 p-3" style="color:#222020;font-family:'Arial Nova', Helvetica, sans-serif;"><u>Our Mission</u></p>
                <p class="h3 p-3" style="color: #222020;font-family:'Source Sans Pro Light', Helvetica, sans-serif;">
                <ol style="list-style-type: decimal;">
                  <li style="color: #222020;font-family:'Source Sans Pro Light', Helvetica, sans-serif;">
                    Gather technicians who are experts in their fields so that customers get reliable and quality services.
                  </li>
                  <li style="color: #222020;font-family:'Source Sans Pro Light', Helvetica, sans-serif;">
                    Creating a good, safe, and comfortable system for customers and technicians.
                  </li>

                </ol>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <img src="asset/Misi.jpeg"  class="img-thumbnail"alt="our Vision" width="100%" height="auto">
        </div>
      </div>
      <p class="p-3 h2 text-center" style="color:#222020;font-family:'Arial Nova', Helvetica, sans-serif;">
        <u>Features</u>
      </p>
      <div class="row">
        <div class="col-sm-4  border-end  border-3">
          <div class="d-flex">
            <div class="flex-column ">
              <p class="text-center">
                <img src="asset/Tech_Icon.png" alt="Technician" height="auto" width="50%" class="rounded-circle">
              </p>
              <p class="h3 text-center" style="color:#222020;font-family:'Arial Nova', Helvetica, sans-serif;box-sizing: border-box;">Find <br> Technician</p>
              <p class="h5 text-center p-2" style="color:#222020;font-family:'Source Sans Pro Light', Helvetica, sans-serif;box-sizing:border-box;">
                You can look for technicians according <br> to their respective fields to get IT repair <br> services that are guaranteed quality.
              </p>
            </div>
          </div>
        </div>

        <div class="col-sm-4  border-end  border-3">
          <div class="d-flex">
            <div class="flex-column ">
              <p class="text-center">
                <img src="asset/Forum_Icon.png" alt="Technician" height="auto" width="50%" class="rounded-circle">
              </p>
              <p class="h3 text-center" style="color:#222020;font-family:'Arial Nova', Helvetica, sans-serif;box-sizing: border-box;">Forum <br><br></p>
              <p class="h5 text-center p-2" style="color:#222020;font-family:'Source Sans Pro Light', Helvetica, sans-serif;box-sizing:border-box;">
                You can ask and discuss directly with <br> the technicians about the IT problems <br> that are being experienced.
              </p>
            </div>
          </div>
        </div>

        <div class="col-sm-4  border-end  border-3">
          <div class="d-flex">
            <div class="flex-column ">
              <p class="text-center">
                <img src="asset/Redeem_Icon.png" alt="Technician" height="auto" width="50%" class="rounded-circle">
              </p>
              <p class="h3 text-center" style="color:#222020;font-family:'Arial Nova', Helvetica, sans-serif;box-sizing: border-box;">Redeem <br>Point</p>
              <p class="h5 text-center p-2" style="color:#222020;font-family:'Source Sans Pro Light', Helvetica, sans-serif;box-sizing:border-box;">
                By making transactions, you will get <br> points that can be exchanged for <br> various products or services that have <br> been provided.
              </p>
            </div>
          </div>
        </div>

      </div>
    </main>
    <?php
    require_once("php/footer.php");
    ?>
    <!--<footer class="mt-4">
      <div class="text-white" >
        <div class="row text-white" style="background-color:#415252 ;">
        <div class="col-sm-6 p-4">
          <ul  class="nav flex-column "style="list-style-type: none;">
            <li class="nav-item"><a  class="nav-link text-white" href="index.php">Home</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#">Find Technician</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item text-black" href="/website/onsitetechnician.html">Onsite Technician</a></li>
                <li><a class="dropdown-item text-black" href="/website/onlinetechnician.html">Remote Technician</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link text-white " href="./forum.html">Forum</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="./redeem.html">Redeem</a></li>
          </ul>
        </div>
        <div class="col-sm-6 p-4">
          <p class="h5" style="font-family: 'DFGothic-EB',Helvetica, sans-serif;">Contact Us:</p>
          <p><i class="fa fa-instagram"></i><span class="px-2">Instagram</span></p>
          <p><i class="fa fa-twitter pe-2"></i><span class="px-2">Twitter</span></p>
          <p> <i class="fa fa-whatsapp pe-2"></i><span class="px-2">Whatsapp</span></p>
        </div>
      </div>
      <div class="text-white" style="background-color:#2B3636 ;">
        <p class="text-center">
          &copy Hi-Tech 2022
        </p>
      </div>
    </footer>-->
</body>
</html>