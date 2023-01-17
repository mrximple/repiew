
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Reedem</title>
</head>
<body>
  <?php
  require_once("./php/header.php");
  require_once('./php/validateSession.php');
    require_once("./php/connect.php");
    header_dynamic();
    if(isset($_SESSION['is_login'])&&isset($_SESSION['username'])&&isset($_SESSION['login_time'])&&isset($_SESSION['client_ip'])&&isset($_SESSION['user_agent'])&&isset($_SESSION['user_id'])){
        if(checkSessionValidity()===false){
            session_destroy();
            unset($_SESSION);
            $message="invalid user";
            header("location: ./login.php?message=$message");
        };
    }
    else{
        $message="user is not logged in";
        header("location: ./login.php?message=$message");
    }
  ?>
    <main >
      <p class="h1 text-center m-3 p-3" style="color: #2F767A;"><u>Redeem Point</u></p>
      <div class="container">
        <form class="d-flex" method="POST" action="redeem.php">
          <input class="form-control me-2" type="text" placeholder="Search" name="search" id="search">
          <button class="btn btn-primary" type="submit">Search</button>
        </form>
      </div>

      <?php
        if(!empty($_SESSION['error'])){
          echo'<div class="error-red">'; echo $_SESSION['error']; echo'</div>';
          unset($_SESSION['error']);
        }
      ?>
      <div class="error-red">
        
      </div>

      <div class="row p-3 m-3">
        <?php
        if($_SERVER['REQUEST_METHOD']==='POST'){
          if(isset($_POST['search'])&& !empty($_POST['search'])){
            require_once("./php/searchRedeem.php");
          }
        }
        else{
          require_once('./php/printAllItem.php');
        }
        ?>
        
      </div>
    </main>
    <?php
      require_once("php/footer.php");
    ?>
</body>
</html>