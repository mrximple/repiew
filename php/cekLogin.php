<?php
session_start();
require_once('connect.php');
require_once('./loginTime.php');
require_once('./get_ip.php');
if($_SERVER['REQUEST_METHOD']==='POST'){
    //handle POST requests
    $error_msg=false;
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        //user want to login
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $av_char="/[^a-z0-9A-Z@._]/"; 
        if(preg_match($av_char, $email)===1){
            $_SESSION['error']="Use the right input!";
            $error_msg=true;
        }
        else if(preg_match($av_char, $password)===1){
            $_SESSION['error']="Use the right input!";
            $error_msg=true;
        }
        if($error_msg){
            header("Location: ../login.php");
            die;
        }
        if(strlen($email) < 10){
            $_SESSION['error']="The email is too short!";
            $error_msg=true;
        }
        else if(strlen($email) > 50){
            $_SESSION['error']="The email is too long!";
            $error_msg=true;
        }
        if(strlen($_POST['password']) < 7){
            $_SESSION['error']="The password is too short!";
            $error_msg=true;
        }
        else if(strlen($_POST['password']) > 50){
            $_SESSION['error']="The password is too long!";
            $error_msg=true;
        }
        if($error_msg){
            header("Location: ../login.php");
            die;
        }
        
        $sql="SELECT userID,userName,userPoint FROM user WHERE userEmail= ? AND userPass= ?";
        $query=$mysqli->prepare($sql);
        $hasil=$query->bind_param("ss",$email,$password);
        $query->execute();
        $query->bind_result($user_id,$username_data,$usr_point);
        $query->store_result();
        if($query->num_rows>0){
            //username or password is valid
            $query->fetch();
            $_SESSION['is_login']=true;
            $_SESSION['user_id']=$user_id;
            $_SESSION['username']=$username_data;
            $_SESSION['user_point']=$usr_point;
            $_SESSION['login_time']=login_time();
            $_SESSION['client_ip']=get_client_ip();
            //looking up the browser's information in the browscap.ini file.
            $user_browser=get_browser(null,true);
            //Returns false when no information can be retrieved, such as when the browscap configuration setting in php.ini has not been set.
            $_SESSION['user_agent']=$user_browser['parent']??"";
            
                $alamat="../index.php";
                header("location: $alamat");

            //header('location:../messages.php');
        }
        else{
            //username or password invalid
            $message="Your email or password are invalid!";
            header("Location: ../login.php?message=$message");
            $mysqli->close();
            session_destroy();
            unset($_SESSION);
            die;
        }
    }
    else{
        $_SESSION['error']="The email and password cannot be empty!";
        header("Location: ../login.php");
        die;
    }
}
?>